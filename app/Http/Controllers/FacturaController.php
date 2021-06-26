<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFacturaRequest;
use App\Http\Requests\UpdateFacturaRequest;
use App\Repositories\FacturaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Tienda;
use App\User;
use App\Models\TipoProducto;
use App\Models\Producto;
use App\Models\FacturaDetalle;
use DB;
use PDF;

class FacturaController extends AppBaseController
{
    /** @var  FacturaRepository */
    private $facturaRepository;

    public function __construct(FacturaRepository $facturaRepo)
    {
        $this->facturaRepository = $facturaRepo;
    }

    /**
     * Display a listing of the Factura.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$facturas = $this->facturaRepository->all();
        $facturas=DB::select("
                            SELECT f.fac_id,
                            f.fac_descuento,
                            f.fac_iva , 
                            SUM(fd.facd_cant*fd.facd_vu) AS subt,
                            t.tie_razon_social,
                            p.per_apellidos,
                            p.per_nombres,
                            pd.pro_descripcion,
                            f.fac_numero_facturas,
                            f.fac_fecha
                            FROM factura f   
                            JOIN factura_detalle fd ON f.fac_id=fd.fac_id
                            JOIN persona p ON f.per_id=p.per_id 
                            JOIN tienda t ON f.tie_id=t.tie_id
                            JOIN producto pd ON f.pro_id=pd.pro_id
                            GROUP BY f.fac_id");

        return view('facturas.index')
            ->with('facturas', $facturas);
    }

    /**
     * Show the form for creating a new Factura.
     *
     * @return Response
     */
    public function create()
    {
        $tienda=Tienda::pluck('tie_nombre','tie_id');
        $persona=User::pluck('name','per_id');
        $tiproducto=TipoProducto::pluck('tpro_descripcion','tpro_id');
        $aux_fac=DB::select("SELECT * FROM factura ORDER BY fac_numero_facturas DESC LIMIT 1");
        $producto=Producto::pluck('pro_descripcion','pro_id');
        
        if(empty($aux_fac)){
            //$facNo='001-001-000000001';
            $facNo=1;
        }else{
            $facNo=($aux_fac[0]->fac_numero_facturas)+1;
        }
        return view('facturas.create')
        ->with('tienda',$tienda)
        ->with('persona',$persona)
        ->with('tiproducto',$tiproducto)
        ->with('facNo',$facNo)
        ->with('producto',$producto)
        ;
    }

    /**
     * Store a newly created Factura in storage.
     *
     * @param CreateFacturaRequest $request
     *
     * @return Response
     */
    public function store(CreateFacturaRequest $request)
    {
        $input = $request->all();
        $input['fac_fecha']=date('Y-m-d');//Incrementar campos
        $factura = $this->facturaRepository->create($input);//Guarda la factura
        
        //guardar el detalle de la factura 
        $Detalle=new FacturaDetalle;
        $Detalle->fac_id=$factura->fac_id;
        $Detalle->pro_id=$input['pro_id'];
        $Detalle->facd_cant=$input['facd_cant'];
        $Detalle->facd_vu=$input['facd_vu'];

        $Detalle->save();


        Flash::success('Factura guardada correctamente.');
        return redirect(route('facturas.edit',$factura->fac_id));
    }

    /**
     * Display the specified Factura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $facturas=DB::select("
                            SELECT f.fac_id,
                            f.fac_descuento,
                            f.fac_iva , 
                            SUM(fd.facd_cant*fd.facd_vu) AS subt,
                            t.tie_razon_social,
                            t.tie_direccion,
                            t.tie_telefono,
                            p.per_apellidos,
                            p.per_nombres,
                            p.per_direccion,
                            p.per_telefono,
                            p.per_cedula,
                            pd.pro_descripcion,
                            f.fac_numero_facturas,
                            f.fac_fecha
                            FROM factura f   
                            JOIN factura_detalle fd ON f.fac_id=fd.fac_id
                            JOIN persona p ON f.per_id=p.per_id 
                            JOIN tienda t ON f.tie_id=t.tie_id
                            JOIN producto pd ON f.pro_id=pd.pro_id
                            WHERE f.fac_id=$id
                            GROUP BY f.fac_id");
        $detalle=DB::select("SELECT * FROM factura_detalle fd 
            JOIN producto pr ON fd.pro_id=pr.pro_id  
            WHERE fd.fac_id=$id
");
        
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('facturas.show',['facturas'=>$facturas[0],'detalle'=>$detalle ]);
        return $pdf->stream();
        
        //return view('facturas.show')->with('facturas', $facturas[0]);
    }

    /**
     * Show the form for editing the specified Factura.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $factura = $this->facturaRepository->find($id);
        $tienda=Tienda::pluck('tie_nombre','tie_id');
        $persona=User::pluck('name','per_id');
        $tiproducto=TipoProducto::pluck('tpro_descripcion','tpro_id');
        $producto=Producto::pluck('pro_descripcion','pro_id');
        $facNo=$factura->facNo;
        $facturaDetalle=DB::select("SELECT * FROM factura_detalle fd
                                    JOIN producto fp ON fd.pro_id=fp.pro_id
                                    WHERE fd.fac_id=$id");
        //$facturaDetalle=FacturaDetalle::where(['fac_id',$id]);

        return view('facturas.edit')->with('factura', $factura)
        ->with('tienda',$tienda)
        ->with('persona',$persona)
        ->with('tiproducto',$tiproducto)
        ->with('producto',$producto)
        ->with('facNo',$facNo)
        ->with('facturaDetalle',$facturaDetalle)
        ;
    }

    /**
     * Update the specified Factura in storage.
     *
     * @param int $id
     * @param UpdateFacturaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacturaRequest $request)
    {
        $input=$request->all();
        $aux_factura = $this->facturaRepository->find($id);
        //Actualizo el encabezado
        if(isset($input['fac_iva']) ){
            $input['fac_iva']=1; ////0= no calcule el iva   1= va con iva
        }else{
            $input['fac_iva']=0;
        }
        $factura = $this->facturaRepository->update($input,$id);
        //Inserto el nuevo detalle
        if($input['facd_cant']!=null && $input['facd_vu']!=null){

        $Detalle=new FacturaDetalle;
        $Detalle->fac_id=$id;
        $Detalle->pro_id=$input['pro_id'];
        $Detalle->facd_cant=$input['facd_cant'];
        $Detalle->facd_vu=$input['facd_vu'];

        $Detalle->save();
        return redirect(route('facturas.edit',$id));
        }

        return redirect(route('facturas.index'));
    }

    /**
     * Remove the specified Factura from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        DB::select("DELETE FROM factura_detalle where fac_id=$id");
            DB::select("DELETE FROM factura where fac_id=$id");
            return redirect(route('facturas.index'));
        }
}

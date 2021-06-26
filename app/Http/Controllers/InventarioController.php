<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInventarioRequest;
use App\Http\Requests\UpdateInventarioRequest;
use App\Repositories\InventarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Producto;
use App\Models\Tienda;
use App\User;
use Auth;

class InventarioController extends AppBaseController
{
    /** @var  InventarioRepository */
    private $inventarioRepository;

    public function __construct(InventarioRepository $inventarioRepo)
    {
        $this->inventarioRepository = $inventarioRepo;
    }

    /**
     * Display a listing of the Inventario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $inventarios = $this->inventarioRepository->all();

        return view('inventarios.index')
            ->with('inventarios', $inventarios);
    }

    /**
     * Show the form for creating a new Inventario.
     *
     * @return Response
     */
    public function create()
    {
        $producto=Producto::pluck('pro_codigo','pro_id');
        $tienda=Tienda::pluck('tie_nombre','tie_id');
        return view('inventarios.create')
        ->with('producto',$producto)
        ->with('tienda',$tienda)
        ;
    }

    /**
     * Store a newly created Inventario in storage.
     *
     * @param CreateInventarioRequest $request
     *
     * @return Response
     */
    public function store(CreateInventarioRequest $request)
    {
        $input = $request->all();
        $input['per_id']=Auth::user()->per_id;
        //dd($input);

        $inventario = $this->inventarioRepository->create($input);

        Flash::success('Inventario saved successfully.');

        return redirect(route('inventarios.index'));
    }

    /**
     * Display the specified Inventario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inventario = $this->inventarioRepository->find($id);

        if (empty($inventario)) {
            Flash::error('Inventario not found');

            return redirect(route('inventarios.index'));
        }

        return view('inventarios.show')->with('inventario', $inventario);
    }

    /**
     * Show the form for editing the specified Inventario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $inventario = $this->inventarioRepository->find($id);
        $producto=Producto::pluck('pro_codigo','pro_id');
        $tienda=Tienda::pluck('tie_nombre','tie_id');

        if (empty($inventario)) {
            Flash::error('Inventario not found');

            return redirect(route('inventarios.index'));
        }

        return view('inventarios.edit')->with('inventario', $inventario)
        ->with('producto',$producto)
        ->with('tienda',$tienda)
        ;
    }

    /**
     * Update the specified Inventario in storage.
     *
     * @param int $id
     * @param UpdateInventarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInventarioRequest $request)
    {
        $inventario = $this->inventarioRepository->find($id);

        if (empty($inventario)) {
            Flash::error('Inventario not found');

            return redirect(route('inventarios.index'));
        }

        $inventario = $this->inventarioRepository->update($request->all(), $id);

        Flash::success('Inventario updated successfully.');

        return redirect(route('inventarios.index'));
    }

    /**
     * Remove the specified Inventario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inventario = $this->inventarioRepository->find($id);

        if (empty($inventario)) {
            Flash::error('Inventario not found');

            return redirect(route('inventarios.index'));
        }

        $this->inventarioRepository->delete($id);

        Flash::success('Inventario deleted successfully.');

        return redirect(route('inventarios.index'));
    }
}

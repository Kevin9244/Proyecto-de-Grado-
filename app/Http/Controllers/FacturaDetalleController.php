<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFacturaDetalleRequest;
use App\Http\Requests\UpdateFacturaDetalleRequest;
use App\Repositories\FacturaDetalleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FacturaDetalleController extends AppBaseController
{
    /** @var  FacturaDetalleRepository */
    private $facturaDetalleRepository;

    public function __construct(FacturaDetalleRepository $facturaDetalleRepo)
    {
        $this->facturaDetalleRepository = $facturaDetalleRepo;
    }

    /**
     * Display a listing of the FacturaDetalle.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $facturaDetalles = $this->facturaDetalleRepository->all();

        return view('factura_detalles.index')
            ->with('facturaDetalles', $facturaDetalles);
    }

    /**
     * Show the form for creating a new FacturaDetalle.
     *
     * @return Response
     */
    public function create()
    {
        return view('factura_detalles.create');
    }

    /**
     * Store a newly created FacturaDetalle in storage.
     *
     * @param CreateFacturaDetalleRequest $request
     *
     * @return Response
     */
    public function store(CreateFacturaDetalleRequest $request)
    {
        $input = $request->all();

        $facturaDetalle = $this->facturaDetalleRepository->create($input);

        Flash::success('Factura Detalle saved successfully.');

        return redirect(route('facturaDetalles.index'));
    }

    /**
     * Display the specified FacturaDetalle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        return $this->destroy($id);
    }

    /**
     * Show the form for editing the specified FacturaDetalle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facturaDetalle = $this->facturaDetalleRepository->find($id);

        if (empty($facturaDetalle)) {
            Flash::error('Factura Detalle not found');

            return redirect(route('facturaDetalles.index'));
        }

        return view('factura_detalles.edit')->with('facturaDetalle', $facturaDetalle);
    }

    /**
     * Update the specified FacturaDetalle in storage.
     *
     * @param int $id
     * @param UpdateFacturaDetalleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacturaDetalleRequest $request)
    {
        $facturaDetalle = $this->facturaDetalleRepository->find($id);

        if (empty($facturaDetalle)) {
            Flash::error('Factura Detalle not found');

            return redirect(route('facturaDetalles.index'));
        }

        $facturaDetalle = $this->facturaDetalleRepository->update($request->all(), $id);

        Flash::success('Factura Detalle updated successfully.');

        return redirect(route('facturaDetalles.index'));
    }

    /**
     * Remove the specified FacturaDetalle from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facturaDetalle = $this->facturaDetalleRepository->find($id);
        $this->facturaDetalleRepository->delete($id);
        return redirect(route('facturas.edit',$facturaDetalle->fac_id));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTiendaRequest;
use App\Http\Requests\UpdateTiendaRequest;
use App\Repositories\TiendaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TiendaController extends AppBaseController
{
    /** @var  TiendaRepository */
    private $tiendaRepository;

    public function __construct(TiendaRepository $tiendaRepo)
    {
        $this->tiendaRepository = $tiendaRepo;
    }

    /**
     * Display a listing of the Tienda.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tiendas = $this->tiendaRepository->all();

        return view('tiendas.index')
            ->with('tiendas', $tiendas);
    }

    /**
     * Show the form for creating a new Tienda.
     *
     * @return Response
     */
    public function create()
    {
        return view('tiendas.create');
    }

    /**
     * Store a newly created Tienda in storage.
     *
     * @param CreateTiendaRequest $request
     *
     * @return Response
     */
    public function store(CreateTiendaRequest $request)
    {
        $input = $request->all();

        $tienda = $this->tiendaRepository->create($input);

        Flash::success('Tienda saved successfully.');

        return redirect(route('tiendas.index'));
    }

    /**
     * Display the specified Tienda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tienda = $this->tiendaRepository->find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        return view('tiendas.show')->with('tienda', $tienda);
    }

    /**
     * Show the form for editing the specified Tienda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tienda = $this->tiendaRepository->find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        return view('tiendas.edit')->with('tienda', $tienda);
    }

    /**
     * Update the specified Tienda in storage.
     *
     * @param int $id
     * @param UpdateTiendaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTiendaRequest $request)
    {
        $tienda = $this->tiendaRepository->find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        $tienda = $this->tiendaRepository->update($request->all(), $id);

        Flash::success('Tienda updated successfully.');

        return redirect(route('tiendas.index'));
    }

    /**
     * Remove the specified Tienda from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tienda = $this->tiendaRepository->find($id);

        if (empty($tienda)) {
            Flash::error('Tienda not found');

            return redirect(route('tiendas.index'));
        }

        $this->tiendaRepository->delete($id);

        Flash::success('Tienda deleted successfully.');

        return redirect(route('tiendas.index'));
    }
}

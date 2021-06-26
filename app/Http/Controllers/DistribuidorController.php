<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistribuidorRequest;
use App\Http\Requests\UpdateDistribuidorRequest;
use App\Repositories\DistribuidorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Tienda;

class DistribuidorController extends AppBaseController
{
    /** @var  DistribuidorRepository */
    private $distribuidorRepository;

    public function __construct(DistribuidorRepository $distribuidorRepo)
    {
        $this->distribuidorRepository = $distribuidorRepo;
    }

    /**
     * Display a listing of the Distribuidor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $distribuidors = $this->distribuidorRepository->all();

        return view('distribuidors.index')
            ->with('distribuidors', $distribuidors);
    }

    /**
     * Show the form for creating a new Distribuidor.
     *
     * @return Response
     */
    public function create()
    {
        $tienda=Tienda::pluck('tie_nombre','tie_id');
        return view('distribuidors.create')
        ->with('tienda',$tienda)
        ;
    }

    /**
     * Store a newly created Distribuidor in storage.
     *
     * @param CreateDistribuidorRequest $request
     *
     * @return Response
     */
    public function store(CreateDistribuidorRequest $request)
    {
        $input = $request->all();

        $distribuidor = $this->distribuidorRepository->create($input);

        Flash::success('Distribuidor saved successfully.');

        return redirect(route('distribuidors.index'));
    }

    /**
     * Display the specified Distribuidor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distribuidor = $this->distribuidorRepository->find($id);

        if (empty($distribuidor)) {
            Flash::error('Distribuidor not found');

            return redirect(route('distribuidors.index'));
        }

        return view('distribuidors.show')->with('distribuidor', $distribuidor);
    }

    /**
     * Show the form for editing the specified Distribuidor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distribuidor = $this->distribuidorRepository->find($id);
        $tienda=Tienda::pluck('tie_nombre','tie_id');

        if (empty($distribuidor)) {
            Flash::error('Distribuidor not found');

            return redirect(route('distribuidors.index'));
        }

        return view('distribuidors.edit')->with('distribuidor', $distribuidor)
        ->with('tienda',$tienda)
        ;
    }

    /**
     * Update the specified Distribuidor in storage.
     *
     * @param int $id
     * @param UpdateDistribuidorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistribuidorRequest $request)
    {
        $distribuidor = $this->distribuidorRepository->find($id);

        if (empty($distribuidor)) {
            Flash::error('Distribuidor not found');

            return redirect(route('distribuidors.index'));
        }

        $distribuidor = $this->distribuidorRepository->update($request->all(), $id);

        Flash::success('Distribuidor updated successfully.');

        return redirect(route('distribuidors.index'));
    }

    /**
     * Remove the specified Distribuidor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distribuidor = $this->distribuidorRepository->find($id);

        if (empty($distribuidor)) {
            Flash::error('Distribuidor not found');

            return redirect(route('distribuidors.index'));
        }

        $this->distribuidorRepository->delete($id);

        Flash::success('Distribuidor deleted successfully.');

        return redirect(route('distribuidors.index'));
    }
}

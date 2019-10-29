<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePratoRequest;
use App\Http\Requests\UpdatePratoRequest;
use App\Repositories\PratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PratoController extends AppBaseController
{
    /** @var  PratoRepository */
    private $pratoRepository;

    public function __construct(PratoRepository $pratoRepo)
    {
        $this->pratoRepository = $pratoRepo;
    }

    /**
     * Display a listing of the Prato.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pratos = $this->pratoRepository->paginate(10);

        return view('pratos.index')
            ->with('pratos', $pratos);
    }

    /**
     * Show the form for creating a new Prato.
     *
     * @return Response
     */
    public function create()
    {
        return view('pratos.create');
    }

    /**
     * Store a newly created Prato in storage.
     *
     * @param CreatePratoRequest $request
     *
     * @return Response
     */
    public function store(CreatePratoRequest $request)
    {
        $input = $request->all();

        $prato = $this->pratoRepository->create($input);

        $this->pratoRepository->file($request, $prato);

        Flash::success('Prato saved successfully.');

        return redirect(route('pratos.index'));
    }

    /**
     * Display the specified Prato.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prato = $this->pratoRepository->find($id);

        if (empty($prato)) {
            Flash::error('Prato not found');

            return redirect(route('pratos.index'));
        }

        return view('pratos.show')->with('prato', $prato);
    }

    /**
     * Show the form for editing the specified Prato.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prato = $this->pratoRepository->find($id);

        if (empty($prato)) {
            Flash::error('Prato not found');

            return redirect(route('pratos.index'));
        }

        return view('pratos.edit')->with('prato', $prato);
    }

    /**
     * Update the specified Prato in storage.
     *
     * @param int $id
     * @param UpdatePratoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePratoRequest $request)
    {
        $prato = $this->pratoRepository->find($id);

        if (empty($prato)) {
            Flash::error('Prato not found');

            return redirect(route('pratos.index'));
        }

        $prato = $this->pratoRepository->update($request->all(), $id);
        $this->pratoRepository->file($request, $prato);

        Flash::success('Prato updated successfully.');

        return redirect(route('pratos.index'));
    }

    /**
     * Remove the specified Prato from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prato = $this->pratoRepository->find($id);

        if (empty($prato)) {
            Flash::error('Prato not found');

            return redirect(route('pratos.index'));
        }

        $this->pratoRepository->delete($id);

        Flash::success('Prato deleted successfully.');

        return redirect(route('pratos.index'));
    }
}

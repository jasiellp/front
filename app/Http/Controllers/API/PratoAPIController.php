<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePratoAPIRequest;
use App\Http\Requests\API\UpdatePratoAPIRequest;
use App\Models\Prato;
use App\Repositories\PratoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PratoController
 * @package App\Http\Controllers\API
 */

class PratoAPIController extends AppBaseController
{
    /** @var  PratoRepository */
    private $pratoRepository;

    public function __construct(PratoRepository $pratoRepo)
    {
        $this->pratoRepository = $pratoRepo;
    }

    /**
     * Display a listing of the Prato.
     * GET|HEAD /pratos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pratos = $this->pratoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pratos->toArray(), 'Pratos retrieved successfully');
    }

    /**
     * Store a newly created Prato in storage.
     * POST /pratos
     *
     * @param CreatePratoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePratoAPIRequest $request)
    {
        $input = $request->all();

        $prato = $this->pratoRepository->create($input);

        return $this->sendResponse($prato->toArray(), 'Prato saved successfully');
    }

    /**
     * Display the specified Prato.
     * GET|HEAD /pratos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Prato $prato */
        $prato = $this->pratoRepository->find($id);

        if (empty($prato)) {
            return $this->sendError('Prato not found');
        }

        return $this->sendResponse($prato->toArray(), 'Prato retrieved successfully');
    }

    /**
     * Update the specified Prato in storage.
     * PUT/PATCH /pratos/{id}
     *
     * @param int $id
     * @param UpdatePratoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePratoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Prato $prato */
        $prato = $this->pratoRepository->find($id);

        if (empty($prato)) {
            return $this->sendError('Prato not found');
        }

        $prato = $this->pratoRepository->update($input, $id);

        return $this->sendResponse($prato->toArray(), 'Prato updated successfully');
    }

    /**
     * Remove the specified Prato from storage.
     * DELETE /pratos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Prato $prato */
        $prato = $this->pratoRepository->find($id);

        if (empty($prato)) {
            return $this->sendError('Prato not found');
        }

        $prato->delete();

        return $this->sendResponse($id, 'Prato deleted successfully');
    }
}

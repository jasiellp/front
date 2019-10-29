<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstabelecimentoRequest;
use App\Http\Requests\UpdateEstabelecimentoRequest;
use App\Repositories\EstabelecimentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EstabelecimentoController extends AppBaseController
{
    /** @var  EstabelecimentoRepository */
    private $estabelecimentoRepository;

    public function __construct(EstabelecimentoRepository $estabelecimentoRepo)
    {
        $this->estabelecimentoRepository = $estabelecimentoRepo;
    }

    /**
     * Display a listing of the Estabelecimento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $estabelecimentos = $this->estabelecimentoRepository->paginate(10);

        return view('estabelecimentos.index')
            ->with('estabelecimentos', $estabelecimentos);
    }

    /**
     * Show the form for creating a new Estabelecimento.
     *
     * @return Response
     */
    public function create()
    {
        return view('estabelecimentos.create');
    }

    /**
     * Store a newly created Estabelecimento in storage.
     *
     * @param CreateEstabelecimentoRequest $request
     *
     * @return Response
     */
    public function store(CreateEstabelecimentoRequest $request)
    {
        $input = $request->all();

        $estabelecimento = $this->estabelecimentoRepository->create($input);

        Flash::success('Estabelecimento saved successfully.');

        return redirect(route('estabelecimentos.index'));
    }

    /**
     * Display the specified Estabelecimento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estabelecimento = $this->estabelecimentoRepository->find($id);

        if (empty($estabelecimento)) {
            Flash::error('Estabelecimento not found');

            return redirect(route('estabelecimentos.index'));
        }

        return view('estabelecimentos.show')->with('estabelecimento', $estabelecimento);
    }

    /**
     * Show the form for editing the specified Estabelecimento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estabelecimento = $this->estabelecimentoRepository->find($id);

        if (empty($estabelecimento)) {
            Flash::error('Estabelecimento not found');

            return redirect(route('estabelecimentos.index'));
        }

        return view('estabelecimentos.edit')->with('estabelecimento', $estabelecimento);
    }

    /**
     * Update the specified Estabelecimento in storage.
     *
     * @param int $id
     * @param UpdateEstabelecimentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstabelecimentoRequest $request)
    {
        $estabelecimento = $this->estabelecimentoRepository->find($id);

        if (empty($estabelecimento)) {
            Flash::error('Estabelecimento not found');

            return redirect(route('estabelecimentos.index'));
        }

        $estabelecimento = $this->estabelecimentoRepository->update($request->all(), $id);

        Flash::success('Estabelecimento updated successfully.');

        return redirect(route('estabelecimentos.index'));
    }

    /**
     * Remove the specified Estabelecimento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estabelecimento = $this->estabelecimentoRepository->find($id);

        if (empty($estabelecimento)) {
            Flash::error('Estabelecimento not found');

            return redirect(route('estabelecimentos.index'));
        }

        $this->estabelecimentoRepository->delete($id);

        Flash::success('Estabelecimento deleted successfully.');

        return redirect(route('estabelecimentos.index'));
    }
}

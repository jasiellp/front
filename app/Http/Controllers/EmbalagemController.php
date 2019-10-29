<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmbalagemRequest;
use App\Http\Requests\UpdateEmbalagemRequest;
use App\Repositories\EmbalagemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EmbalagemController extends AppBaseController
{
    /** @var  EmbalagemRepository */
    private $embalagemRepository;

    public function __construct(EmbalagemRepository $embalagemRepo)
    {
        $this->embalagemRepository = $embalagemRepo;
    }

    /**
     * Display a listing of the Embalagem.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $embalagems = $this->embalagemRepository->paginate(10);

        return view('embalagems.index')
            ->with('embalagems', $embalagems);
    }

    /**
     * Show the form for creating a new Embalagem.
     *
     * @return Response
     */
    public function create()
    {
        return view('embalagems.create');
    }

    /**
     * Store a newly created Embalagem in storage.
     *
     * @param CreateEmbalagemRequest $request
     *
     * @return Response
     */
    public function store(CreateEmbalagemRequest $request)
    {
        $input = $request->all();

        $embalagem = $this->embalagemRepository->create($input);

        Flash::success('Embalagem saved successfully.');

        return redirect(route('embalagems.index'));
    }

    /**
     * Display the specified Embalagem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $embalagem = $this->embalagemRepository->find($id);

        if (empty($embalagem)) {
            Flash::error('Embalagem not found');

            return redirect(route('embalagems.index'));
        }

        return view('embalagems.show')->with('embalagem', $embalagem);
    }

    /**
     * Show the form for editing the specified Embalagem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $embalagem = $this->embalagemRepository->find($id);

        if (empty($embalagem)) {
            Flash::error('Embalagem not found');

            return redirect(route('embalagems.index'));
        }

        return view('embalagems.edit')->with('embalagem', $embalagem);
    }

    /**
     * Update the specified Embalagem in storage.
     *
     * @param int $id
     * @param UpdateEmbalagemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmbalagemRequest $request)
    {
        $embalagem = $this->embalagemRepository->find($id);

        if (empty($embalagem)) {
            Flash::error('Embalagem not found');

            return redirect(route('embalagems.index'));
        }

        $embalagem = $this->embalagemRepository->update($request->all(), $id);

        Flash::success('Embalagem updated successfully.');

        return redirect(route('embalagems.index'));
    }

    /**
     * Remove the specified Embalagem from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $embalagem = $this->embalagemRepository->find($id);

        if (empty($embalagem)) {
            Flash::error('Embalagem not found');

            return redirect(route('embalagems.index'));
        }

        $this->embalagemRepository->delete($id);

        Flash::success('Embalagem deleted successfully.');

        return redirect(route('embalagems.index'));
    }
}

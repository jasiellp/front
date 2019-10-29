<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBuffetRequest;
use App\Http\Requests\UpdateBuffetRequest;
use App\Repositories\BuffetRepository;
use App\Repositories\PratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BuffetController extends AppBaseController
{
    /** @var  BuffetRepository */
    private $buffetRepository;

    /** @var  PratoRepository */
    private $pratoRepository;

    public function __construct(BuffetRepository $buffetRepo, PratoRepository $pratoRepo)
    {
        $this->buffetRepository = $buffetRepo;
        $this->pratoRepository = $pratoRepo;
    }

    /**
     * Display a listing of the Buffet.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $buffets = $this->buffetRepository->paginate(10);

        return view('buffets.index')
            ->with('buffets', $buffets);
    }

    /**
     * Show the form for creating a new Buffet.
     *
     * @return Response
     */
    public function create()
    {
        return view('buffets.create');
    }

    /**
     * Store a newly created Buffet in storage.
     *
     * @param CreateBuffetRequest $request
     *
     * @return Response
     */
    public function store(CreateBuffetRequest $request)
    {
        $input = $request->all();

        $buffet = $this->buffetRepository->create($input);

        Flash::success('Buffet saved successfully.');

        return redirect(route('buffets.index'));
    }

    /**
     * Display the specified Buffet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $buffet = $this->buffetRepository->find($id);

        $pratos = $this->pratoRepository->all();

        if (empty($buffet)) {
            Flash::error('Buffet not found');

            return redirect(route('buffets.index'));
        }

        return view('buffets.show', compact('buffet', 'pratos'));
    }

    /**
     * Show the form for editing the specified Buffet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $buffet = $this->buffetRepository->find($id);

        if (empty($buffet)) {
            Flash::error('Buffet not found');

            return redirect(route('buffets.index'));
        }

        return view('buffets.edit')->with('buffet', $buffet);
    }

    /**
     * Update the specified Buffet in storage.
     *
     * @param int $id
     * @param UpdateBuffetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuffetRequest $request)
    {
        $buffet = $this->buffetRepository->find($id);

        if (empty($buffet)) {
            Flash::error('Buffet not found');

            return redirect(route('buffets.index'));
        }

        $buffet = $this->buffetRepository->update($request->all(), $id);

        Flash::success('Buffet updated successfully.');

        return redirect(route('buffets.index'));
    }

    /**
     * Remove the specified Buffet from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $buffet = $this->buffetRepository->find($id);

        if (empty($buffet)) {
            Flash::error('Buffet not found');

            return redirect(route('buffets.index'));
        }

        $this->buffetRepository->delete($id);

        Flash::success('Buffet deleted successfully.');

        return redirect(route('buffets.index'));
    }
}

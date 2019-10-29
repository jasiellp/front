<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBuffetAPIRequest;
use App\Http\Requests\API\UpdateBuffetAPIRequest;
use App\Models\Buffet;
use App\Repositories\BuffetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BuffetController
 * @package App\Http\Controllers\API
 */

class BuffetAPIController extends AppBaseController
{
    /** @var  BuffetRepository */
    private $buffetRepository;

    public function __construct(BuffetRepository $buffetRepo)
    {
        $this->buffetRepository = $buffetRepo;
    }

    /**
     * Display a listing of the Buffet.
     * GET|HEAD /buffets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $buffets = $this->buffetRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($buffets->toArray(), 'Buffets retrieved successfully');
    }

    /**
     * Store a newly created Buffet in storage.
     * POST /buffets
     *
     * @param CreateBuffetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBuffetAPIRequest $request)
    {
        $input = $request->all();

        $buffet = $this->buffetRepository->create($input);

        return $this->sendResponse($buffet->toArray(), 'Buffet saved successfully');
    }

    /**
     * Display the specified Buffet.
     * GET|HEAD /buffets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Buffet $buffet */
        $buffet = $this->buffetRepository->find($id);

        if (empty($buffet)) {
            return $this->sendError('Buffet not found');
        }

        return $this->sendResponse($buffet->toArray(), 'Buffet retrieved successfully');
    }

    /**
     * Update the specified Buffet in storage.
     * PUT/PATCH /buffets/{id}
     *
     * @param int $id
     * @param UpdateBuffetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuffetAPIRequest $request)
    {
        $input = $request->all();

        // foreach($input as $c=>$field){

        //     if(is_array($field)){
        //         $values = $field['values'];

        //         foreach($values as $value){

        //             if(isset($value['referenceValue'])){




        //             }

        //             print_r($value['referenceValue']);
        //         }
        //     }
           
        // }

        // exit;

        /** @var Buffet $buffet */
        $buffet = $this->buffetRepository->find($id);

        if (empty($buffet)) {
            return $this->sendError('Buffet not found');
        }

        $buffet = $this->buffetRepository->update($input, $id);

        return $this->sendResponse($buffet->toArray(), 'Buffet updated successfully');
    }

    /**
     * Remove the specified Buffet from storage.
     * DELETE /buffets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Buffet $buffet */
        $buffet = $this->buffetRepository->find($id);

        if (empty($buffet)) {
            return $this->sendError('Buffet not found');
        }

        $buffet->delete();

        return $this->sendResponse($id, 'Buffet deleted successfully');
    }
}

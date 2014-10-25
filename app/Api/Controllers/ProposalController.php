<?php

namespace Api\Controllers;

use Api\Models\Proposal;
use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;
use Dingo\Api\Facades\API;
use exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ProposalController extends ApiController
{

    private $model;

    public function __construct(Proposal $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->paginate($this->model);

        return $items->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @throws StoreResourceFailedException
     * @return Response
     */
    public function create()
    {
        try
        {
            return $this->model->create(Input::all());
        }
        catch (exception $e)
        {
            // This should newer happen, but in this case something
            // went wrong while trying to save item to database
            throw new StoreResourceFailedException('Could not create new Proposal.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $item = $this->model->find($id);

        if (!$item) App::abort(404, 'Proposal not found');

        return $item;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @throws UpdateResourceFailedException
     * @return Response
     */
    public function messages($id)
    {
        $item = $this->model->find($id);

        if (!$item) App::abort(404, 'Proposal not found');

        return $item->messages();
    }

    /**
     * Updates the specified resource in storage.
     *
     * @param  int $id
     * @throws \Dingo\Api\Exception\UpdateResourceFailedException
     * @return Response
     */
    public function accept($id)
    {
        try
        {
            $item = $this->model->findOrFail($id);
            $item->update(Input::all());

            // We don't return any response just setup response code
            return Response::make(null, 204);
        }
        catch (exception $e)
        {
            // validation failed
            throw new UpddateResourceFailedException('Could not update Proposal.');
        }
    }

}

<?php

namespace Api\Controllers;

use Api\Models\Business;
use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;
use exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class BusinessController extends ApiController
{

    private $model;

    public function __construct(Business $model)
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
     * @throws \Dingo\Api\Exception\StoreResourceFailedException
     * @return Response
     */
    public function create()
    {
        try
        {
            return $this->model->create(Input::all);
        }
        catch (exception $e)
        {
            // This should newer happen, but in this case something
            // went wrong while trying to save item to database
            throw new StoreResourceFailedException('Could not create new Business.');
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

        if (!$item) App::abort(404, 'Business not found');

        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @throws \Dingo\Api\Exception\UpdateResourceFailedException
     * @return Response
     */
    public function update($id)
    {
        try
        {
            $item = $this->model->findOrFail($id);
            $item->update(Input::all());

            return $item;
        }
        catch (exception $e)
        {
            // This will happen in case when there is no item with that ID,
            // or something unexpected went wrong while saving item to database
            throw new UpdateResourceFailedException('Could not update Business.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @throws \Dingo\Api\Exception\DeleteResourceFailedException
     * @return Response
     */
    public function destroy($id)
    {
        try
        {
            $item = $this->model->findOrFail($id);
            $item->delete();

            // We don't return any response just setup response code
            return Response::make(null, 204);
        }
        catch (exception $e)
        {
            // validation failed
            throw new DeleteResourceFailedException('Could not delete Business.');
        }
    }

}

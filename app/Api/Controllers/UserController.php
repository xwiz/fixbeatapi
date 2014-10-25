<?php namespace Api\Controllers;

use Api\Models\User;
use Api\Validators\UserValidator;
use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;
use Dingo\Api\Facades\API;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class UserController extends ApiController {

    /**
     * @var User
     */
    private $model;

    /**
     * Class constructor
     *
     * @param User $model
     */
    public function __construct(User $model)
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
     *
     * @return Response
     */
    public function store()
    {
        $validator = new UserValidator();

        if($validator->validate(Input::all(), 'create'))
        {
            try
            {
                return $this->model->create($validator->data());
            }
            catch(Exception $e)
            {
                // This should newer happen, but in this case something
                // went wrong while trying to save item to database
                throw new StoreResourceFailedException('Could not create new user.');
            }
        }

        // validation failed
        throw new StoreResourceFailedException('Could not create new user.', $validator->errors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $item = $this->model->find($id);

        if( ! $item){
            App::abort(404, 'User not found');
        }

        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @throws UpdateResourceFailedException
     *
     * @return Response
     */
    public function update($id)
    {
        $validator = new UserValidator();

        if($validator->validate(Input::all(), 'update'))
        {
            try
            {
                $item = $this->model->findOrFail($id);
                $item->update(Input::all());

                return $item;
            }
            catch(Exception $e)
            {
                // This will happen in case when there is no item with that ID,
                // or something unexpected went wrong while saving item to database
                throw new UpdateResourceFailedException('Could not update user.');
            }
        }

        // validation failed
        throw new UpdateResourceFailedException('Could not update tag.', $validator->errors());
    }
    
    public function interests()
    {
        return $this->hasMany('Category');
    }
    
    public function roles()
    {
        return $this->hasMany('Role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @throws \Dingo\Api\Exception\DeleteResourceFailedException
     *
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
        catch(Exception $e)
        {
            // validation failed
            throw new DeleteResourceFailedException('Could not delete user.');
        }
    }

}

<?php namespace Api\Controllers;
use Illuminate\Support\Facades\Input;

/**
 * Base API controller
 * Every API controller should extend this one
 *
 * @package Api\Controllers
 */
class ApiController extends BaseController {
    // Here we can put logic that will affect only API controllers

    public function paginate($model)
    {
        $offset = Input::get('offset', false);
        $limit = Input::get('limit', false);

        if(is_numeric($limit))
        {
            $offset = is_numeric($offset) ? $offset : 0;
            return $model->skip($offset)->take($limit);
        }
        else
        {
            return $model;
        }
    }

}

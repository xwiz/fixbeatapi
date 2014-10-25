<?php namespace Api\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;


class User extends BaseModel implements UserInterface {

    use UserTrait;
    
    const CREATED_AT = 'added_date';
    const UPDATED_AT = 'modified_date';

    public $timestamps = true;
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'bio',
        'user_phone',
        'user_image',
        'created_date',
    ];


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

}

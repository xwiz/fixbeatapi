<?php namespace Api\Validators;

use Api\Sanitizers\UserSanitizer;

class UserValidator extends BaseValidator
{
    /**
     * Validation rules for this Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'email' => ['required|email'],
            'password' => ['required'],
        ],

        'update' => [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required|email'],
        ],

    ];

    /**
     * Attach a default sanitizer to this
     * validator instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->attachSanitizer(new UserSanitizer());
    }
}
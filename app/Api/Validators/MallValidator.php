<?php namespace Api\Validators;

use Api\Sanitizers\MallSanitizer;

class MallValidator extends BaseValidator
{
    /**
     * Validation rules for this Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            //'some' => ['required'],
        ],

        'update' => [
            //'some' => ['sometimes', 'required'],
        ],

    ];

    /**
     * Attach a default sanitizer to this
     * validator instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->attachSanitizer(new MallSanitizer());
    }
}
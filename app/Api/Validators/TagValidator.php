<?php namespace Api\Validators;

use Api\Sanitizers\TagSanitizer;

class TagValidator extends BaseValidator
{
    /**
     * Validation rules for this Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'product_id' => ['required'],
            'tag_name' => ['required'],
        ],

        'update' => [
            'product_id' => ['sometimes', 'required'],
            'tag_name' => ['sometimes', 'required'],
        ],

    ];

    /**
     * Attach a default sanitizer to this
     * validator instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->attachSanitizer(new TagSanitizer());
    }
}
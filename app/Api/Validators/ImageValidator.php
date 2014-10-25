<?php namespace Api\Validators;

use Api\Sanitizers\ImageSanitizer;

class ImageValidator extends BaseValidator
{
    /**
     * Validation rules for this Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'image' => ['required', 'max:2048', 'mimes:jpeg,bmp,png'],
            'attachment_link_table' => ['required'],
            'attachment_link_table_id' => ['required'],
        ],

        'update' => [
            'image' => ['sometimes', 'required', 'max:2048', 'mimes:jpgeg,bmp,png'],
            'attachment_mime_type' => ['sometimes', 'required'],
            'attachment_path' => ['sometimes', 'required'],
            'attachment_link_table' => ['sometimes', 'required'],
            'attachment_link_table_id' => ['sometimes', 'required'],
        ],

    ];

    /**
     * Attach a default sanitizer to this
     * validator instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->attachSanitizer(new ImageSanitizer());
    }
}
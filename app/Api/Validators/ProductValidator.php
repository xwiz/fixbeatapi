<?php namespace Api\Validators;

use Api\Sanitizers\ProductSanitizer;

class ProductValidator extends BaseValidator
{
    /**
     * Validation rules for this Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'merchant_id'       => ['required'],
            'category_id'       => ['required'],
            'code'              => ['required', 'max:15', 'regex:/^([ -a-z0-9#-])+$/'],
            'title'             => ['required', 'max:50'],
            'description'       => ['required'],
            'price'             => ['required', 'numeric'],
            'stock_quantity'    => ['required', 'numeric'],
            'min_order_qty'     => ['required', 'numeric'],
            'weight'            => ['required', 'numeric'],
        ],

        'update' => [
            'merchant_id'       => ['sometimes', 'required'],
            'category_id'       => ['sometimes', 'required'],
            'code'              => ['sometimes', 'required', 'max:15', 'regex:/^([ -a-z0-9#-])+$/'],
            'title'             => ['sometimes', 'required', 'max:50'],
            'description'       => ['sometimes', 'required'],
            'price'             => ['sometimes', 'required', 'numeric'],
            'stock_quantity'    => ['sometimes', 'required', 'numeric'],
        ],

    ];

    /**
     * Attach a default sanitizer to this
     * validator instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->attachSanitizer(new ProductSanitizer());
    }
}
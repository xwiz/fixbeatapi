<?php namespace Api\Transformers;

use Api\Models\Business;
use League\Fractal\TransformerAbstract;

/**
 * Class BusinessTransformer
 * @package Api\Transformers
 */
class BusinessTransformer extends TransformerAbstract
{
    public $availableIncludes = ['category'];

    public function transform(Business $item)
    {
        return [
            'id' => (int) $item->id,
            'business_name' => (string) $item->business_name,
            'business_address' => (string) $item->business_address,
            'business_phone' => (string) $item->business_phone,
            'business_logo' => (string) $item->business_logo,
            'business_bio' => (string) $item->business_bio,
            'business_email' => (string)($item->business_email),
            'added_date' => (string) $item->added_date,
            'modified_date' => (string) $item->modified_date,            
        ];
    }

    public function includeCategory(Business $item)
    {
        $category = $item->category;

        return $category ? $this->item($category, new CategoryTransformer): null;
    }
}
<?php namespace Api\Transformers;

use Api\Models\Product;
use League\Fractal\TransformerAbstract;

/**
 * Class ProductTransformer
 * @package Api\Transformers
 */
class ProductTransformer extends TransformerAbstract
{
    public $availableIncludes = ['category', 'tags', 'images'];
    public $defaultIncludes = ['images'];

    public function transform(Product $item)
    {
        return [
            'product_id' => (int) $item->product_id,
            'category_id' => (int) $item->category_id,
            'merchant_id' => (int) $item->merchant_id,
            'code' => (string) $item->code,
            'title' => (string) $item->title,
            'description' => (string) $item->description,
            'details' => (string) $item->details,
            'features' => (string) $item->features,
            'price' => floatval($item->price),
            'stock_quantity' => (int) $item->stock_quantity,
            'viewed' => (int) $item->viewed,
            'purchased' => (int) $item->purchased,
            'product_status' => (int) $item->product_status,
            'added_date' => (string) $item->added_date,
            'modified_date' => (string) $item->modified_date,
            'is_signup_item' => (int) $item->is_signup_item,
            'signup_type' => (string) $item->signup_type,
            'subscription_code' => (string) $item->subscription_code,
            'product_table_name' => (string) $item->product_table_name,
            'product_type' => (string) $item->product_type,
            'product_voucher_credits' => (int) $item->product_voucher_credits,
            'is_featured' => (int) $item->is_featured,
            'date_featured' => (string) $item->date_featured,
            'admin_featured' => (int) $item->admin_featured,
            'display_order' => (int) $item->display_order,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => url('api/v2/products', $item->product_id),
                ]
            ]
        ];
    }

    public function includeImages(Product $item)
    {
        return $this->collection($item->images, new ImageTransformer);
    }

    public function includeTags(Product $item)
    {
        return $this->collection($item->tags, new TagTransformer);
    }

    public function includeCategory(Product $item)
    {
        $category = $item->category;

        return $category ? $this->item($category, new CategoryTransformer): null;
    }
}
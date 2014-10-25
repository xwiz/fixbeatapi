<?php namespace Api\Transformers;

use Api\Models\Tag;
use League\Fractal\TransformerAbstract;

/**
 * Class TagTransformer
 * @package Api\Transformers
 */
class TagTransformer extends TransformerAbstract
{
    public $availableIncludes = ['product'];
    public $defaultIncludes = [];

    public function transform(Tag $item)
    {
        return [
            'tag_id' => (int) $item->tag_id,
            'product_id' => (int) $item->product_id,
            'tag_name' => (string) $item->tag_name,
            'tag_status' => (int) $item->tag_status,
            'added_date' => (string) $item->added_date,
            'modified_date' => (string) $item->modified_date,
            'display_order' => (int) $item->display_order,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => url('api/v2/tags', $item->tag_id),
                ]
            ]
        ];
    }

    public function includeProduct(Tag $item)
    {
        $product = $item->product;

        return $product ? $this->item($product, new ProductTransformer): null;
    }
}
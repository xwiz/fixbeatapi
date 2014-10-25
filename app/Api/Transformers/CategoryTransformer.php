<?php namespace Api\Transformers;

use Api\Models\Category;
use League\Fractal\TransformerAbstract;

/**
 * Class CategoryTransformer
 * @package Api\Transformers
 */
class CategoryTransformer extends TransformerAbstract
{
    public $availableIncludes = ['parent'];
    public $defaultIncludes = [];

    public function transform(Category $item)
    {
        return [
            'id' => (int) $item->id,
            'text' => (int) $item->text,
        ];
    }
}
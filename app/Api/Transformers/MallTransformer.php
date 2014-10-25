<?php namespace Api\Transformers;

use Api\Models\Mall;
use League\Fractal\TransformerAbstract;

/**
 * Class MallTransformer
 * @package Api\Transformers
 */
class MallTransformer extends TransformerAbstract
{
    public $defaultIncludes = [];

    public function transform(Mall $item)
    {
        return [
           // 'some' => 1,
        ];
    }
}
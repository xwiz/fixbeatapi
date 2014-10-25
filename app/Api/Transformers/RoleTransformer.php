<?php namespace Api\Transformers;

use Api\Models\Role;
use League\Fractal\TransformerAbstract;

/**
 * Class RoleTransformer
 * @package Api\Transformers
 */
class RoleTransformer extends TransformerAbstract
{
    public $defaultIncludes = [];

    public function transform(Role $item)
    {
        return [
            'id' => (int) $item->id,
            'text' => (int) $item->text,
        ];
    }
}
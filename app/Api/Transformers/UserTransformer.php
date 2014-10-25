<?php namespace Api\Transformers;

use Api\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 * @package Api\Transformers
 */
class UserTransformer extends TransformerAbstract
{
    public $availableIncludes = ['category'];
    
    public function transform(User $user)
    {
        return [
            'first_name'    => $user->first_name,
            'last_name'     => $user->last_name,
            'email'         => $user->email,
            'phone_number'  => $user->user_phone,
            'user_image'    => $user->user_image,
            'user_bio'      => $user->bio,
            'added_date'    => $user->added_date,
        ];
    }
    
    public function includeCategory(User $item)
    {
        $category = $item->category;

        return $category ? $this->item($category, new CategoryTransformer): null;
    }
}
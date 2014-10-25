<?php namespace Api\Transformers;

use Api\Models\Proposal;
use League\Fractal\TransformerAbstract;

/**
 * Class ProposalTransformer
 * @package Api\Transformers
 */
class ProposalTransformer extends TransformerAbstract
{
    public $availableIncludes = [];
    public $defaultIncludes = [];

    public function transform(Proposal $item)
    {
        return [
            'id' => (int) $item->id,
            'business_id' => (int) $item->business_id,
            'user_id' => (int) $item->user_id,
            'proposal' => (string) $item->proposal,
            'accepted' => (string) $item->accepted,
            'added_date' => (string) $item->added_date,
            'modified_date' => (string) $item->modified_date,
        ];
    }
}
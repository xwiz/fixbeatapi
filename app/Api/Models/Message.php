<?php

namespace Api\Models;

class Message extends BaseModel
{

    const CREATED_AT = 'added_date';
    const UPDATED_AT = 'modified_date';

    public $timestamps = true;

    protected $table = 'messages';
    protected $primaryKey = 'id';

    protected $fillable = ['proposal_id', 'sender_id', 'receiver_id', 'message', 'created_date', ];

    public function proposal()
    {
        return $this->belongsTo('Proposal');
    }
}

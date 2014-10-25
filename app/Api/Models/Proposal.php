<?php

namespace Api\Models;

class Proposal extends BaseModel
{

    const CREATED_AT = 'added_date';
    const UPDATED_AT = 'modified_date';

    public $timestamps = true;

    protected $table = 'proposals';
    protected $primaryKey = 'id';

    protected $fillable = ['business_id', 'user_id', 'proposal', 'created_date', ];

    public function messages()
    {
        return $this->hasMany('Message');
    }
}

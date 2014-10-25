<?php namespace Api\Models;

class Business extends BaseModel {

    const CREATED_AT = 'added_date';
    const UPDATED_AT = 'modified_date';

    public $timestamps = true;
    
    protected $table = 'businesses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'business_name',
        'business_address',
        'business_phone',
        'business_logo',
        'business_bio',
        'created_date',
    ];

    public function category()
    {
        return $this->hasMany('Api\Models\Category', 'category_id', 'business_id')->where('business_interests', $this->table);
    }
}
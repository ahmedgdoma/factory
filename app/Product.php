<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'p_id';
    public $filters = [];
    public $timestamps = false;
    protected $fillable = [
        'p_name', 'p_categoryid', 'p_price', 'p_description', 'p_code',
        'p_discount', 'p_addedby', 'p_created'
    ];
    public function filterv(){
        return $this->belongsToMany('App\FilterValue', 'productfilters', 'pf_productid', 'pf_filtervalueid');
    }
    public function user(){
        return $this->belongsTo('App\User', 'p_addedby');
    }
    public function cat(){
        return $this->belongsTo('App\Category', 'p_categoryid');
    }
}

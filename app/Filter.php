<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $table = 'filter';
    protected $primaryKey = 'filter_id';
    public $timestamps = false;

    protected $fillable = [
        'filter_name', 'filter_orderby', 'filter_addedby'
    ];
    public function fvalues(){
        return $this->hasMany('App\FilterValue', 'fv_filterid', 'filter_id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'filter_addedby');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilterValue extends Model
{
    protected $table = 'filtervalues';
    protected $primaryKey = 'fv_id';
    public $timestamps = false;
    protected $fillable = [
        'fv_value', 'fv_filterid', 'fv_addedby'
    ];
    public function filter(){
        return $this->belongsTo('App\Filter', 'fv_filterid');
    }
    public function user(){
        return $this->belongsTo('App\User', 'fv_addedby');
    }
}

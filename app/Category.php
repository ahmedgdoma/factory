<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cat_id';
    public $timestamps = false;
    protected $fillable = [
        'cat_name', 'cat_image', 'cat_status','cat_addedby', 'cat_created',
    ];
    public function user(){
        return $this->belongsTo('App\User', 'cat_addedby');
    }
}

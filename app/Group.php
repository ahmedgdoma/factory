<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'usergroups';
    protected $primaryKey = 'ug_id';
}

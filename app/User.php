<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $email = 'user_email';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_fullname', 'user_code', 'user_username', 'user_email', 'user_password','user_photo', 'user_phone',
        'user_gender', 'user_groupid', 'user_status', 'user_lastlogin', 'user_addedby', 'user_created', 'user_lastupdate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password',
    ];
    public function getAuthPassword()
    {
        return $this->user_password;
    }
    public function userAdd(){
        return $this->belongsTo("App\User", 'user_addedby');
    }
    public function group(){
        return $this->belongsTo("App\Group", 'user_groupid');
    }
}

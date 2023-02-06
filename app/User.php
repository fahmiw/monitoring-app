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
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function siswa()
    {
        return $this->hasOne('App\Siswa', 'user_id', 'id');
    }

    public function guru()
    {
        return $this->hasOne('App\Guru', 'user_id', 'id');
    }
}

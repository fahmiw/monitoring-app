<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'mata_pelajaran', 'umur', 'jenis_kelamin'
    ];
}

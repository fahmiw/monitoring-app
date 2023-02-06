<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'kelas', 'umur', 'jenis_kelamin'
    ];
}

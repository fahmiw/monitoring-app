<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'mata_pelajaran', 'nilai'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

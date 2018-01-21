<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota_kelas extends Model
{
    protected $fillable = [
    	'user_id','kelas_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function kelas()
    {
    	return $this->belongsTo('App\Kelas','kelas_id');
    }
}

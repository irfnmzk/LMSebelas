<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota_kelas extends Model
{
    protected $fillable = [
    	'user_id','kelas_id'
    ];

    public function creator()
    {
    	return $this->belongsTo('App\User','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
    	'name','code','creator_id'
    ];

    public function creator()
    {
    	return $this->belongsTo('App\User','creator_id');
    }

    public function anggota_kelas()
    {
        return $this->hasMany('App\Anggota_kelas');
    }

    public function materi()
    {
        return $this->hasMany('App\Materi');
    }

}

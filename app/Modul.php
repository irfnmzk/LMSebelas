<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
    	'judul', 'materi_id', 'acessable', 'link'
    ];

    public function materi()
    {
    	return $this->belongsTo('App\Materi','materi_id');
    }
}

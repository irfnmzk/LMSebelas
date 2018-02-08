<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
	protected $table = "modul";

    protected $fillable = [
    	'judul', 'materi_id', 'accessable', 'link'
    ];

    public function materi()
    {
    	return $this->belongsTo('App\Materi','materi_id');
    }
}

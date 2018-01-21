<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
    	'judul','deskripsi', 'kelas_id', 'creator_id', 'nilai_tugas', 'nilai_quiz', 'kkm'
    ];

    public function creator()
    {
    	return $this->belongsTo('App\User','id');
    }

    public function kelas()
    {
    	return $this->belongsTo('App\Kelas','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "materi";

    protected $fillable = [
    	'judul','deskripsi', 'kelas_id', 'creator_id', 'nilai_tugas', 'nilai_quiz', 'kkm'
    ];

    public function creator()
    {
    	return $this->belongsTo('App\Anggota_kelas','creator_id');
    }

    public function kelas()
    {
    	return $this->belongsTo('App\Kelas','kelas_id');
    }

    public function tugas()
    {
        return $this->hasMany('App\Tugas');
    }

    public function modul()
    {
        return $this->hasMany('App\Modul');
    }
}

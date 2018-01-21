<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = [
    	'judul','deskripsi', 'creator_id', 'materi_id', 'deadline', 'link'
    ];

    public function creator()
    {
    	return $this->belongsTo('App\Anggota_kelas','creator_id');
    }

    public function materi()
    {
    	return $this->belongsTo('App\Materi','materi_id');
    }

    public function jawaban_tugas()
    {
        return $this->hasMany('App\Jawaban_tugas');
    }
}

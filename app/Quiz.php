<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz';
    
    protected $fillable = [
    	'judul','deskripsi', 'materi_id', 'durasi','tanggal_mulai','tanggal_selesai', 'jumlah_soal', 'active', 'creator_id'
    ];

    public function soal()
    {
        return $this->hasMany('App\Soal');
    }

    public function creator()
    {
    	return $this->belongsTo('App\Anggota_kelas','creator_id');
    }

    public function materi()
    {
    	return $this->belongsTo('App\Materi','materi_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota_kelas extends Model
{
    protected $table = "anggota_kelas";
    
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

    public function materi()
    {
        return $this->hasMany('App\Materi');
    }

    public function tugas()
    {
        return $this->hasMany('App\Tugas');
    }

    public function jawaban_tugas()
    {
        return $this->hasMany('App\Jawaban_tugas','creator_id');
    }

    public function quiz()
    {
        return $this->hasMany('App\Quiz');
    }

    public function jawaban_user()
    {
        return $this->hasMany('App\Jawaban_user','creator_id');
    }

    public function hasil_quiz()
    {
        return $this->hasMany('App\Hasil_quiz','creator_id');
    }
}

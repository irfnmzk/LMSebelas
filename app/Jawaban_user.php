<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban_user extends Model
{
    protected $table = 'jawaban_user';

    protected $fillable = [
    	'soal_id','creator_id', 'hasil_id', 'jawaban_id', 'benar'
    ];

    public function creator()
    {
    	return $this->belongsTo('App\Anggota_kelas','creator_id');
    }

    public function jawaban()
    {
    	return $this->belongsTo('App\Jawaban','jawaban_id');
    }

    public function soal()
    {
    	return $this->belongsTo('App\Soal','soal_id');
    }

    public function hasil_quiz()
    {
        return $this->belongsTo('App\Hasil_quiz','hasil_id');
    }
}

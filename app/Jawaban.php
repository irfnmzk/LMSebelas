<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';

    protected $fillable = [
    	'soal_id','isi', 'benar'
    ];

    public function jawaban_user()
    {
        return $this->hasMany('App\Jawaban_user');
    }

    public function soal()
    {
    	return $this->belongsTo('App\Soal','soal_id');
    }
}

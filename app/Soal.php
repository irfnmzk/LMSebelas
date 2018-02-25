<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';

    protected $fillable = [
    	'quiz_id','pertanyaan', 'picture'
    ];

    public function jawaban()
    {
        return $this->hasMany('App\Jawaban');
    }

    public function jawaban_user()
    {
        return $this->hasMany('App\Jawaban_user');
    }

    public function quiz()
    {
    	return $this->belongsTo('App\Quiz','quiz_id');
    }
}

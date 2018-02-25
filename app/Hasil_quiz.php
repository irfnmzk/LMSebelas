<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil_quiz extends Model
{
    protected $table = 'hasil_quiz';
    
    protected $fillable = [
    	'creator_id', 'quiz_id', 'jumlah_benar', 'nilai', 'waktu_mulai', 'waktu_selesai', 'total_waktu', 
    	'status', 'ip_address', 'user_agent' 
    ];

    public function jawaban_user()
    {
        return $this->hasMany('App\Jawaban_user');
    }

    public function creator()
    {
    	return $this->belongsTo('App\Anggota_kelas','creator_id');
    }
    public function quiz()
    {
    	return $this->belongsTo('App\Quiz','quiz_id');
    }
}

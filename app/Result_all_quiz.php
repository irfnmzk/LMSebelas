<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result_all_quiz extends Model
{
    protected $table = "result_all_quiz";

    protected $fillable = [
    	'user_id', 'kelas_id', 'nilai', 'jumlah_nilai', 'waktu_mulai', 'waktu_selesai', 'total_waktu', 'quiz_id', 'name'
    ];
}

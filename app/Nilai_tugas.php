<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai_tugas extends Model
{
	protected $table = "nilai_tugas";

    protected $fillable = [
    	'jawaban_tugas_id','nilai', 'ket'
    ];

    public function jawaban_tugas()
    {
    	return $this->belongsTo('App\Jawaban_tugas','jawaban_tugas_id');
    }
}

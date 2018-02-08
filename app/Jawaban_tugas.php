<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban_tugas extends Model
{
    protected $table = "jawaban_tugas";

    protected $fillable = [
    	'link','tugas_id', 'creator_id'
    ];

    public function creator()
    {
    	return $this->belongsTo('App\Anggota_kelas','creator_id');
    }

    public function tugas()
    {
    	return $this->belongsTo('App\Tugas','tugas_id');
    }

    public function nilai_tugas()
    {
        return $this->hasMany('App\Nilai_tugas');
    }
}

<?php

namespace App;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";

    protected $fillable = [
    	'name','code','creator_id'
    ];

    protected static function boot()
    {
        
        parent::boot();

        static::creating(function ($model)
        {
            //use uuid as primary key
            $model->id = Uuid::uuid4()->toString();
        });
    }

    public function creator()
    {
    	return $this->belongsTo('App\User','creator_id');
    }

    public function anggota_kelas()
    {
        return $this->hasMany('App\Anggota_kelas');
    }

    public function materi()
    {
        return $this->hasMany('App\Materi');
    }

}

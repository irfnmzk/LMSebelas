<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
    	'name','code','creator_id'
    ];

    public function creator()
    {
    	return $this->belongsTo('App\User','id');
    }
}

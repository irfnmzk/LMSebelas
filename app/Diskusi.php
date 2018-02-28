<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    protected $table = 'diskusi';

    protected $fillable = [
        'text', 'creator_id', 'kelas_id'
    ];

    public function creator()
    {
    	return $this->belongsTo('App\User','creator_id');
    }
}

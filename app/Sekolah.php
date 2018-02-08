<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
	protected $table = "sekolah";

    protected $fillable = [
    	'nama'
    ];
}

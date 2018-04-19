<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result_tugas extends Model
{
    protected $table = "result_tugas";

    protected $fillable = [
    	'name', 'id', 'link', 'nilai', 'role'
    ];
}

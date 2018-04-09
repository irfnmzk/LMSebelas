<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'no_identitas', 'email', 'password','role','active','sekolah','jurusan', 'picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isActive()
    {
        return $this->active == 1;
    }

    public function isAdmin()
    {
        if($this->role == 3){
            return true;
        }else{
            return false;
        }
    }

    public function anggota_kelas()
    {
        return $this->hasMany('App\Anggota_kelas');
    }

    public function kelas()
    {
        return $this->hasMany('App\Kelas');
    }
}

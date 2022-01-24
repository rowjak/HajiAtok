<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'kd_user';

    protected $fillable = [
        'kd_user',
        'username',
        'password',
        'nama_pegawai',
        'role',
        'email',
        'email_verified_at',
        'theme',
        'remember_token'
    ];

    protected $hidden = [
        'password'
    ];


    function arsip(){
        return $this->hasMany('App\Models\Arsip','kd_user')->withDefault();
    }
}

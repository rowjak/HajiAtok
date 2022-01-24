<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeArsip extends Model
{
    use HasFactory;

    protected $table = 'tipe_arsip';
    protected $primaryKey = 'kd_tipe_arsip';

    protected $fillable = [
        'nama_tipe_arsip',
        'uri',
        'ordering'
    ];

    function arsip(){
        return $this->hasMany('App\Models\Arsip','kd_tipe_arsip');
    }
}

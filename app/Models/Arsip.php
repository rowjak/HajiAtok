<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidsTahuns;

class Arsip extends Model
{
    use HasFactory, UuidsTahuns;

    protected $table = 'arsip';
    protected $primaryKey = 'kd_arsip';
    public $incrementing = false;

    protected $fillable = [
        'kd_arsip',
        'nama_arsip',
        'kd_tipe_arsip',
        'tahun',
        'keterangan',
        'jenis',
        'nama_file',
        'kd_user'
    ];

    function tipe_arsip(){
        return $this->belongsTo('App\Models\TipeArsip','kd_tipe_arsip')->withDefault();
    }

    function user(){
        return $this->belongsTo('App\Models\User','kd_user')->withDefault();
    }
}

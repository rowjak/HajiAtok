<?php

namespace App\Traits;

trait Tahuns
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->tahun)) {
                $model->tahun = session()->get('tahun');
            }
        });
    }
}

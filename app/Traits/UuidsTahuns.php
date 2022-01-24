<?php

namespace App\Traits;

use Webpatser\Uuid\Uuid;

trait UuidsTahuns
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->tahun)) {
                $model->tahun = session()->get('tahun');
            }
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Uuid::generate(4);
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }


    public function getKeyType()
    {
        return 'string';
    }
}

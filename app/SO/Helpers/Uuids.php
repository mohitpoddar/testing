<?php
namespace App\SO\Helpers;
use Webpatser\Uuid\Uuid;
trait Uuids

{

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        //static::creating(function ($model) {
        //    $model->{$model->getKeyName()} = Uuid::generate()->string;
        //});

        static::saving(function ($model) {
            if($model->{$model->getKeyName()} != null) return;
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
    }
}
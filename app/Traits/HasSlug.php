<?php

namespace Spatie\Tags;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{

    public static function bootHasSlug()
    {
        static::saving(function (Model $model) {
            $model->slug = $model->generateSlug($model);
        });
    }

    protected function generateSlug(Model $model): string
    {
        return Str::slug($model->slug);
    }
}

<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public static function bootImageTrait(): void
    {
        static::creating(function ($model) {
            self::createMapper($model);
        });

        static::updating(function ($model) {
            self::updateMapper($model);
        });

        static::deleting(function ($model) {
            self::deleteMapper($model);
        });
    }


    public static function createMapper($model): void
    {
        if (!empty($model->image)) {
            $filename = self::getFileName($model);
            Storage::disk(config("filesystem.default"))->putFileAs($model->table, $model->image, $filename);
            $model->image = $filename;
            $model->image_url = config("app.url") . "/storage/" . $model->table . "/" . $filename;
        }
    }

    public static function updateMapper($model): void
    {
        if ($model->getAttribute("image") != $model->getOriginal("image") && $model->image) {
            Storage::delete($model->table . "/" . $model->getOriginal("image"));
            $filename = self::getFileName($model);
            Storage::disk(config("filesystem.default"))->putFileAs($model->table, $model->image, $filename);
            $model->image = $filename;
            $model->image_url = config("app.url") . "/storage/" . $model->table . "/" . $filename;
        }
    }

    public static function deleteMapper($model): void
    {
        if (!empty($model->image)) {
            Storage::disk(config("filesystem.default"))->delete($model->table . "/" . $model->getOriginal("image"));
            $model->image = null;
            $model->image_url = null;
        }
    }

    private static function getFileName($model): string
    {
        return Carbon::now()->timestamp . "." . $model->image->getClientOriginalExtension();
    }
}

<?php

namespace App\Models;

use App\Enums\SeoPrefix;
use App\Traits\ImageTrait;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, SeoTrait, ImageTrait;

    protected $table = "pages";

    protected string $prefix = SeoPrefix::PAGE->value;

    protected $fillable = [
        "title",
        "content",
        "status",
    ];

    protected static function booted(): void
    {
        static::updated(function ($model) {
            if ($model->isDirty("status")) {
                $model->status = true;
                $model->save();
            }
        });

        static::deleting(function ($model) {
            if ($model->permanent) {
                session()->flash('error', "Sabit sayfalar silinemez.");
                return false;
            }
        });
    }

}

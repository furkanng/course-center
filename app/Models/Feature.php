<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $table = "features";

    protected $fillable = [
        "name",
        "group_id",
        "status"
    ];

    protected static function booted(): void
    {
        static::deleting(function ($model) {
            $isMember = Feature::query()->where("group_id", $model->id)->exists();
            if ($model->group_id == 0 && $isMember) {
                session()->flash('error', "Bu öğeye ait alt öğe olduğu için silinemez.");
                return false;
            }
        });

        static::updating(function ($model) {
            if ($model->group_id == 0 && $model->isDirty('status') && $model->status == 0) {
                Feature::query()->where("group_id", $model->id)->update(["status" => false]);
            }
        });
    }
}

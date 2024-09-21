<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = "settings";

    public $timestamps = false;

    protected $fillable = [
        "title",
        "key",
        "value",
        "type",
        "group_key",
    ];

    public static function get($key): string
    {
        $model = Setting::query()->where("key", $key)->select("value")->firstOrFail();
        return data_get($model, "value");
    }

    public static function set($key, $value): void
    {
        foreach ($value as $item) {
            Setting::query()->where("key", $key)->update(["value" => $item]);
        }
    }
}

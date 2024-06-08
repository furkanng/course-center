<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = "settings";

    public $timestamps = false;

    protected $fillable = [
        "title",
        "key",
        "value",
        "type",
        "group_key",
    ];


    public function set($key, $value)
    {
        foreach ($value as $item) {
            Setting::where("key", $key)->update(["value" => $item]);
        }
    }
}

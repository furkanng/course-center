<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $table = "company_info";

    protected $fillable = [
        "about",
        "map",
        "facebook",
        "instagram",
        "twitter",
        "youtube"
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', "company_id");
    }

    public function setMapAttribute($value): void
    {
        if (!str_starts_with($value, "https://")) {
            preg_match('/src="([^"]+)"/', $value, $matches);

            if (isset($matches[1])) {
                $this->attributes['map'] = $matches[1];
            } else {
                $this->attributes['map'] = null;
            }
        }
    }
}

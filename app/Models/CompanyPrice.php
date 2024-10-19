<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyPrice extends Model
{
    use HasFactory;

    protected $table = "company_price_lists";

    protected $casts = [
        "price_title" => \App\Enums\CompanyPrice::class
    ];

    protected $fillable = [
        'price_title',
        'price',
        'discounted_price',
        'status'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', "id");
    }

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $existTitle = CompanyPrice::query()->where("company_id", $model->company_id)->where("price_title", $model->price_title)->exists();
            if ($existTitle) {
                session()->flash('error', "Zaten bu fiyat biriminden var.");
                return false;
            }
            if ($model->price <= $model->discounted_price) {
                session()->flash('error', "İndirimli fiyat normal fiyattan yüksek veya eşit olamaz.");
                return false;
            }
        });

        static::updating(function ($model) {
            $existTitle = CompanyPrice::query()->where("company_id", $model->company_id)->where("price_title", $model->price_title)->exists();
            if ($model->isDirty("price_title") && $existTitle) {
                session()->flash('error', "Zaten bu fiyat biriminden var.");
                return false;
            }
            if ($model->price <= $model->discounted_price) {
                session()->flash('error', "İndirimli fiyat normal fiyattan yüksek veya eşit olamaz.");
                return false;
            }
        });
    }
}

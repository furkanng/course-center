<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyPrice extends Model
{
    use HasFactory;

    protected $table = "company_price_lists";
/*
    protected $casts = [
        "price_title" => \App\Enums\CompanyPrice::class
    ];*/

    protected $fillable = [
        'price_field_id',
        'price',
        'discounted_price',
        'status'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', "id");
    }
    public function price_fields(): BelongsTo
    {
        return $this->belongsTo(PriceField::class, 'price_field_id', "id");
    }

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $existTitle = CompanyPrice::query()->where("company_id", $model->company_id)->where("price_field_id", $model->price_field_id)->exists();
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
            $existTitle = CompanyPrice::query()->where("company_id", $model->company_id)->where("price_field_id", $model->price_field_id)->exists();
            if ($model->isDirty("price_field_id") && $existTitle) {
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

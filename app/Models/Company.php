<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory, ImageTrait;

    protected $table = "companies";

    protected int $width = 800;
    protected int $height = 600;
    protected bool $watermark = true;

    protected $fillable = [
        "name",
        "address",
        "phone",
        "fax",
        "website",
        "company_type",
        "city",
        "district",
        "mernis",
        'status',
        "image"
    ];
    public function getCompanyTypeName()
    {
        $companyTypeCode = $this->getAttribute("company_type");

        if (!$companyTypeCode) {
            return null;
        }

        $companyType = CompanyType::query()
            ->where("code", $companyTypeCode)
            ->first();

        return $companyType?->getAttribute("name");
    }

    protected function setPhoneAttribute($value): void
    {
        $this->attributes['phone'] = preg_replace('/\D+/', '', $value);
    }

    protected function setFaxAttribute($value): void
    {
        $this->attributes['fax'] = preg_replace('/\D+/', '', $value);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'company_course');
    }

    public function images(): HasMany
    {
        return $this->hasMany(CompanyImage::class, 'company_id', "id");
    }

    public function info(): BelongsTo
    {
        return $this->belongsTo(CompanyInfo::class, 'id', "company_id");
    }

    public function features(): HasMany
    {
        return $this->hasMany(CompanyFeature::class, 'company_id', "id");
    }

    public function sss(): HasMany
    {
        return $this->hasMany(CompanySss::class, 'company_id', "id")
            ->orderBy("order");
    }

    public function price(): HasMany
    {
        return $this->hasMany(CompanyPrice::class, 'company_id', "id");
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'company_user', 'company_id', 'user_id');
    }
}

<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'city',
        'district',
        'phone',
        'role',
        'company_name',
        'company_type',
        'user_type',
        'status',
        'sms_approve',
        'email_approve',
        'kvkk_approve',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        "user_type" => UserType::class,
        "role" => UserRole::class,
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

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_user', 'user_id', 'company_id');
    }
}

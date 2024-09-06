<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    const USER_TYPE_STUDENT = 'student';
    const USER_TYPE_TEACHER = 'teacher';
    const USER_TYPE_GRADUATED = 'graduated';
    const USER_TYPE_PARENT = 'parent';

    // Tüm user_type enum değerlerini döndüren metod
    public static function getUserTypes()
    {
        return [
            self::USER_TYPE_STUDENT,
            self::USER_TYPE_TEACHER,
            self::USER_TYPE_GRADUATED,
            self::USER_TYPE_PARENT,
        ];
    }

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
        //'address',
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
    ];
}

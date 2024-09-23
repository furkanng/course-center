<?php

namespace App\Models;

use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstitutionalRegister extends Model
{
    use HasFactory;

    protected $table = "institutional_register";

    protected $casts = [
        "status" => UserStatus::class,
    ];

    protected $fillable = [
        "user_id",
        "status",
        "company_name",
        "company_type",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public static function booted(): void
    {
        static::updated(function ($model) {
            if ($model->isDirty("status") && $model->status === UserStatus::ACCEPTED) {
                $model->user->status = true;
                $model->user->save();
            }
        });

        static::deleted(function ($model) {
            $model->user->delete();
        });
    }

}

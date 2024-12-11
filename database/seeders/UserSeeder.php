<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->delete();

        $defaultData =
            [
                "id" => 1,
                "name" => "Sefa Çolakoğlu",
                "phone" => "5511074559",
                "email" => "sefa@admin.com",
                "city" => "İstanbul",
                "district" => "Anadolu",
                "password" => '$2y$10$6ks0bcef923EmvNfpgis5OoSCaKUGURwvnkBP20O/ktVkclH0Wz72',
                "role" => UserRole::ADMIN,
                "user_type" => UserType::ADMIN,
                "status" => true,
                "sms_approve" => true,
                "email_approve" => true,
                "kvkk_approve" => true,
            ];

        User::query()->insert($defaultData);
    }

}

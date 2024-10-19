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
                "name" => "Furkan Güzelgörür",
                "phone" => "5373664765",
                "email" => "admin@admin.com",
                "city" => "Kahramanmaraş",
                "district" => "onikişubat",
                "password" => '$2y$10$WGerOaCXGZy2rPNkQ6QYreHCKcp/FotVhwT7CE75L2PFb1Knh5KoO',
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

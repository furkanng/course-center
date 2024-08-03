<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("pages")->delete();

        $defaultData =
            [
                [
                    "title" => "Şartlar ve Koşullar",
                    "content" => "şartlar ve koşullar",
                    "permanent_name" => "sartlar_ve_kosullar",
                    "status" => 1,
                    "permanent" => 1,
                ]
            ];

        foreach ($defaultData as $data) {
            Page::query()->create($data);
        }
    }
}

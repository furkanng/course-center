<?php

namespace Database\Seeders;

use App\Models\FrontImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("front_images")->delete();

        $defaultData =
            [
                [
                    'key' => 'slider_resim',
                    'image' => 'searchIcon.png',
                    "image_url" => config("app.url") . "/images/dershaneslider1.jpg",
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    'key' => 'logo',
                    'image' => 'logo.png',
                    "image_url" => config("app.url") . "/images/logo.png",
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
            ];

        FrontImage::query()->insert($defaultData);
    }
}

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
                    'image' => 'slider.png',
                    "image_url" => config("app.url") . "/images/slider.png",
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    'key' => 'arastirma_resim',
                    'image' => 'research-bg.jpg',
                    "image_url" => config("app.url") . "/images/research-bg.jpg",
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
            ];

        FrontImage::query()->insert($defaultData);
    }
}

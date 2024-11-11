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
                    "title" => "Üyelik Sözleşmesi",
                    "content" => "Üyelik sözleşmesi",
                    "status" => true,
                    "permanent" => false,
                ],
                [
                    "title" => "Hakkımızda",
                    "content" => "Hakkkımızda içerik",
                    "key" => "hakkimizda",
                    "status" => true,
                    "permanent" => true,
                ],
                [
                    "title" => "Ön Bilgilendirme Formu",
                    "content" => "Ön bilgilendirme içerik",
                    "status" => true,
                    "permanent" => false,
                ],
                [
                    "title" => "Kvkk",
                    "content" => "Kvkk içerik",
                    "key" => "kvkk",
                    "status" => true,
                    "permanent" => true,
                ],
                [
                    "title" => "Şartlar ve Koşullar",
                    "content" => "Şartlar ve koşullar",
                    "key" => "sartlar_ve_kosullar",
                    "status" => true,
                    "permanent" => true,
                ],
                [
                    "title" => "Aydınlatma Metni",
                    "content" => "Aydınlatma metni içerik",
                    "key" => "aydinlatma_metni",
                    "status" => true,
                    "permanent" => true,
                ]
            ];

        foreach ($defaultData as $data) {
            Page::query()->create($data);
        }
    }
}

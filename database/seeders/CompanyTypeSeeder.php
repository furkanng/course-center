<?php

namespace Database\Seeders;

use App\Models\CompanyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("company_type")->delete();

        $defaultData = [
            [
                "code" => 1000,
                "name" => "Özel Yurt"
            ],
            [
                "code" => 523,
                "name" => "Özel Muhtelif Kurslar"
            ],
            [
                "code" => 564,
                "name" => "Özel Türk Ortaokulu"
            ],
            [
                "code" => 519,
                "name" => "Özel Eğitim ve Rehabilitasyon Merkezi"
            ],
            [
                "code" => 616,
                "name" => "Özel Öğretim Kursu"
            ],
            [
                "code" => 521,
                "name" => "Özel Motorlu Taşıt Sürücüleri Kursu"
            ],
            [
                "code" => 500,
                "name" => "Özel Türk Okul Öncesi Kurumu"
            ],
            [
                "code" => 529,
                "name" => "Özel Anadolu Lisesi"
            ],
            [
                "code" => 611,
                "name" => "Özel Mesleki ve Teknik Anadolu Lisesi"
            ]
        ];

        CompanyType::query()->insert($defaultData);
    }
}

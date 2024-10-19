<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("features")->delete();

        $defaultData =
            [
                [
                    'id' => 1,
                    'group_id' => 0,
                    'name' => 'Fiziksel İmkanlar',
                    "status" => true
                ],
                [
                    'id' => 2,
                    'group_id' => 1,
                    'name' => 'Yemekhane',
                    "status" => true
                ],
                [
                    'id' => 3,
                    'group_id' => 1,
                    'name' => 'Bilgisayar Laboratuvarı',
                    "status" => true
                ],
                [
                    'id' => 4,
                    'group_id' => 1,
                    'name' => 'Konferans Salonu',
                    "status" => true
                ],
                [
                    'id' => 5,
                    'group_id' => 1,
                    'name' => 'Laboratuvar',
                    "status" => true
                ],
                [
                    'id' => 6,
                    'group_id' => 1,
                    'name' => 'Sanat Atölyesi',
                    "status" => true
                ],
                [
                    'id' => 7,
                    'group_id' => 1,
                    'name' => 'Kantin',
                    "status" => true
                ],
                [
                    'id' => 8,
                    'group_id' => 1,
                    'name' => 'Kütüphane',
                    "status" => true
                ],
                [
                    'id' => 9,
                    'group_id' => 1,
                    'name' => 'Müzik Odası',
                    "status" => true
                ],
                [
                    'id' => 10,
                    'group_id' => 1,
                    'name' => 'Oyun Alanı',
                    "status" => true
                ],
                [
                    'id' => 11,
                    'group_id' => 1,
                    'name' => 'Revir',
                    "status" => true
                ],
                [
                    'id' => 12,
                    'group_id' => 1,
                    'name' => 'Bahçe',
                    "status" => true
                ],
                [
                    'id' => 13,
                    'group_id' => 1,
                    'name' => 'Akıllı Tahta',
                    "status" => true
                ],
                [
                    'id' => 14,
                    'group_id' => 1,
                    'name' => 'Sera',
                    "status" => true
                ],
                [
                    'id' => 15,
                    'group_id' => 1,
                    'name' => 'Spor Alanı',
                    "status" => true
                ],
                [
                    'id' => 16,
                    'group_id' => 0,
                    'name' => 'Dil Olanakları',
                    "status" => true
                ],
                [
                    'id' => 17,
                    'group_id' => 16,
                    'name' => 'Almanca',
                    "status" => true
                ],
                [
                    'id' => 18,
                    'group_id' => 16,
                    'name' => 'İngilizce',
                    "status" => true
                ],
                [
                    'id' => 19,
                    'group_id' => 0,
                    'name' => 'Hizmetler',
                    "status" => true
                ],
                [
                    'id' => 20,
                    'group_id' => 19,
                    'name' => 'Güvenlik',
                    "status" => true
                ],
                [
                    'id' => 21,
                    'group_id' => 19,
                    'name' => 'Rehberlik',
                    "status" => true
                ],
                [
                    'id' => 22,
                    'group_id' => 19,
                    'name' => 'Yaz Okulu',
                    "status" => true
                ],
                [
                    'id' => 23,
                    'group_id' => 19,
                    'name' => 'Servis',
                    "status" => true
                ],
                [
                    'id' => 24,
                    'group_id' => 19,
                    'name' => 'Organik Beslenme',
                    "status" => true
                ],
                [
                    'id' => 25,
                    'group_id' => 0,
                    'name' => 'Sportif & Sanatsal',
                    "status" => true
                ],
                [
                    'id' => 26,
                    'group_id' => 25,
                    'name' => 'Futbol',
                    "status" => true
                ],
                [
                    'id' => 27,
                    'group_id' => 25,
                    'name' => 'Fotoğrafçılık',
                    "status" => true
                ],
                [
                    'id' => 28,
                    'group_id' => 25,
                    'name' => 'Basketbol',
                    "status" => true
                ],
                [
                    'id' => 29,
                    'group_id' => 25,
                    'name' => 'Sinema',
                    "status" => true
                ],
                [
                    'id' => 30,
                    'group_id' => 25,
                    'name' => 'Dekoratif Sanatlar',
                    "status" => true
                ],
                [
                    'id' => 31,
                    'group_id' => 25,
                    'name' => 'Tenis',
                    "status" => true
                ],
                [
                    'id' => 32,
                    'group_id' => 25,
                    'name' => 'Atletizm',
                    "status" => true
                ],
                [
                    'id' => 33,
                    'group_id' => 25,
                    'name' => 'Okçuluk',
                    "status" => true
                ],
                [
                    'id' => 34,
                    'group_id' => 25,
                    'name' => 'Orkestra',
                    "status" => true
                ],
                [
                    'id' => 35,
                    'group_id' => 25,
                    'name' => 'Modern Dans',
                    "status" => true
                ],
                [
                    'id' => 36,
                    'group_id' => 25,
                    'name' => 'Drama',
                    "status" => true
                ],
                [
                    'id' => 37,
                    'group_id' => 25,
                    'name' => 'Görsel Sanatlar',
                    "status" => true
                ],
                [
                    'id' => 38,
                    'group_id' => 25,
                    'name' => 'Tiyatro',
                    "status" => true
                ],
                [
                    'id' => 39,
                    'group_id' => 25,
                    'name' => 'Ebru',
                    "status" => true
                ],
                [
                    'id' => 40,
                    'group_id' => 25,
                    'name' => 'Piyano',
                    "status" => true
                ],
                [
                    'id' => 41,
                    'group_id' => 25,
                    'name' => 'İngilizce Drama',
                    "status" => true
                ],
                [
                    'id' => 42,
                    'group_id' => 25,
                    'name' => 'Jimnastik',
                    "status" => true
                ],
                [
                    'id' => 43,
                    'group_id' => 25,
                    'name' => 'Halk Oyunları',
                    "status" => true
                ],
                [
                    'id' => 44,
                    'group_id' => 25,
                    'name' => 'Dans',
                    "status" => true
                ],
                [
                    'id' => 45,
                    'group_id' => 25,
                    'name' => 'El Sanatları',
                    "status" => true
                ],
                [
                    'id' => 46,
                    'group_id' => 25,
                    'name' => 'Gitar',
                    "status" => true
                ],
                [
                    'id' => 47,
                    'group_id' => 0,
                    'name' => 'Savunma Sanatları',
                    "status" => true
                ],
                [
                    'id' => 48,
                    'group_id' => 47,
                    'name' => 'Taekwondo',
                    "status" => true
                ],
                [
                    'id' => 49,
                    'group_id' => 0,
                    'name' => 'Kulüpler & Etkinlikler',
                    "status" => true
                ],
                [
                    'id' => 50,
                    'group_id' => 49,
                    'name' => 'Satranç',
                    "status" => true
                ],
                [
                    'id' => 51,
                    'group_id' => 49,
                    'name' => 'Yabancı Dil Kulübü',
                    "status" => true
                ],
                [
                    'id' => 52,
                    'group_id' => 49,
                    'name' => 'Gezi',
                    "status" => true
                ],
                [
                    'id' => 53,
                    'group_id' => 49,
                    'name' => 'Bilişim Kulübü',
                    "status" => true
                ],
                [
                    'id' => 54,
                    'group_id' => 49,
                    'name' => 'Akıl ve Zeka Oyunları',
                    "status" => true
                ],
                [
                    'id' => 55,
                    'group_id' => 49,
                    'name' => 'Değerler Eğitimi',
                    "status" => true
                ],
                [
                    'id' => 56,
                    'group_id' => 49,
                    'name' => 'Robotik',
                    "status" => true
                ],
                [
                    'id' => 57,
                    'group_id' => 49,
                    'name' => 'Kodlama',
                    "status" => true
                ]
            ];

        Feature::query()->insert($defaultData);
    }
}

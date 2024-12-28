<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PriceField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\Securities\Price;

class CompanyPriceTypes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("price_fields")->delete();

        $defaultData =
            [
                [
                    "price_title" => "Aylık Kurum Fiyatı Tam Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Aylık Kurum Fiyatı Yarım Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Yıllık Kurum Fiyatı Tam Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Yıllık Kurum Fiyatı Yarım Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Yıllık Yemek Masrafı Tam Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Yıllık Yemek Masrafı Yarım Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Aylık Yemek Masrafı Tam Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Aylık Yemek Masrafı Yarım Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Aylık Yaz Kursu Fiyatı Yarım Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Aylık Yaz Kursu Fiyatı Tam Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Yıllık Kırtasiye Masrafı Tam Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Aylık Kırtasiye Masrafı Tam Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Yıllık Kırtasiye Masrafı Yarım Gün",
                    "status" => true,
                ],
                [
                    "price_title" => "Aylık Kırtasiye Masrafı Yarım Gün",
                    "status" => true,
                ],

            ];

        foreach ($defaultData as $data) {
            PriceField::query()->create($data);
        }
    }
}

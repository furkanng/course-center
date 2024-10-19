<?php

namespace App\Enums;

enum CompanyPrice: string
{
    case MONTH_COMPANY_PRICE_FULL_TIME = "month_company_price_full_time";
    case MONTH_COMPANY_PRICE_PART_TIME = "month_company_price_part_time";
    case YEAR_COMPANY_PRICE_FULL_TIME = "year_company_price_full_time";
    case YEAR_COMPANY_PRICE_PART_TIME = "year_company_price_part_time";
    case YEAR_FOOD_PRICE_FULL_TIME = "year_food_price_full_time";
    case YEAR_FOOD_PRICE_PART_TIME = "year_food_price_part_time";
    case MONTH_FOOD_PRICE_FULL_TIME = "month_food_price_full_time";
    case MONTH_FOOD_PRICE_PART_TIME = "month_food_price_part_time";
    case MONTH_SUMMER_COMPANY_PART_TIME = "month_summer_company_part_time";
    case MONTH_SUMMER_COMPANY_FULL_TIME = "month_summer_company_full_time";
    case YEAR_STATIONERY_FULL_TIME = "year_stationery_full_time";
    case YEAR_STATIONERY_PART_TIME = "year_stationery_part_time";
    case MONTH_STATIONERY_FULL_TIME = "month_stationery_full_time";
    case MONTH_STATIONERY_PART_TIME = "month_stationery_part_time";

    public function label(): string
    {
        return match ($this) {
            self::MONTH_COMPANY_PRICE_FULL_TIME    => 'Aylık Kurum Fiyatı Tam Gün',
            self::MONTH_COMPANY_PRICE_PART_TIME    => 'Aylık Kurum Fiyatı Yarım Gün',
            self::YEAR_COMPANY_PRICE_FULL_TIME     => 'Yıllık Kurum Fiyatı Tam Gün',
            self::YEAR_COMPANY_PRICE_PART_TIME     => 'Yıllık Kurum Fiyatı Yarım Gün',
            self::YEAR_FOOD_PRICE_FULL_TIME        => 'Yıllık Yemek Masrafı Tam Gün',
            self::YEAR_FOOD_PRICE_PART_TIME        => 'Yıllık Yemek Masrafı Yarım Gün',
            self::MONTH_FOOD_PRICE_FULL_TIME       => 'Aylık Yemek Masrafı Tam Gün',
            self::MONTH_FOOD_PRICE_PART_TIME       => 'Aylık Yemek Masrafı Yarım Gün',
            self::MONTH_SUMMER_COMPANY_PART_TIME   => 'Aylık Yaz Kursu Fiyatı Yarım Gün',
            self::MONTH_SUMMER_COMPANY_FULL_TIME   => 'Aylık Yaz Kursu Fiyatı Tam Gün',
            self::YEAR_STATIONERY_FULL_TIME        => 'Yıllık Kırtasiye Masrafı Tam Gün',
            self::MONTH_STATIONERY_FULL_TIME       => 'Aylık Kırtasiye Masrafı Tam Gün',
            self::YEAR_STATIONERY_PART_TIME        => 'Yıllık Kırtasiye Masrafı Yarım Gün',
            self::MONTH_STATIONERY_PART_TIME       => 'Aylık Kırtasiye Masrafı Yarım Gün',
        };
    }
}

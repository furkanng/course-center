<?php

namespace App\Service;

use App\Models\Company;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function defaultSVG()
    {
        return '<icons width="30" height="30" viewBox="0 0 30 30" fill="none"
                     xmlns="http://www.w3.org/2000/icons">
                    <path
                        d="M28.733 3.71736C26.5787 9.08912 21.1789 16.3914 16.6605 20.0145L13.9047 22.2247C13.555 22.4765 13.2052 22.7004 12.8135 22.8542C12.8135 22.6024 12.7996 22.3227 12.7576 22.0569C12.6037 20.8818 12.0721 19.7907 11.1349 18.8534C10.1836 17.9022 9.02254 17.3426 7.83348 17.1887C7.5537 17.1747 7.27392 17.1468 6.99414 17.1747C7.14802 16.7411 7.38583 16.3354 7.6796 15.9997L9.86188 13.2438C13.471 8.7254 20.8012 3.29769 26.159 1.15738C26.9844 0.849623 27.7817 1.07345 28.2853 1.59104C28.8169 2.10863 29.0687 2.906 28.733 3.71736Z"
                        stroke="#4270FF" stroke-width="1.56" stroke-linecap="round"
                        stroke-linejoin="round"/>
                    <path
                        d="M12.8136 22.8543C12.8136 24.393 12.226 25.8619 11.1209 26.981C10.2676 27.8343 9.10649 28.4219 7.72158 28.6037L4.2803 28.9814C2.40578 29.1913 0.797051 27.5965 1.02087 25.694L1.39858 22.2527C1.73431 19.1891 4.29429 17.2307 7.00815 17.1747C7.28793 17.1608 7.58169 17.1747 7.84748 17.1887C9.03655 17.3426 10.1976 17.8882 11.1489 18.8534C12.0861 19.7907 12.6177 20.8818 12.7716 22.0569C12.7856 22.3227 12.8136 22.5885 12.8136 22.8543Z"
                        stroke="#4270FF" stroke-width="1.56" stroke-linecap="round"
                        stroke-linejoin="round"/>
                    <path
                        d="M18.1433 18.4477C18.1433 14.7966 15.1776 11.8309 11.5265 11.8309"
                        stroke="#4270FF" stroke-width="1.56" stroke-linecap="round"
                        stroke-linejoin="round"/>
                    <path
                        d="M26.3688 16.0137L27.404 17.0349C29.4884 19.1192 29.4884 21.1756 27.404 23.26L23.2633 27.4007C21.2069 29.4571 19.1225 29.4571 17.0662 27.4007"
                        stroke="#4270FF" stroke-width="1.56" stroke-linecap="round"/>
                    <path
                        d="M2.57353 12.9081C0.517156 10.8237 0.517156 8.76737 2.57353 6.68301L6.71426 2.54228C8.77064 0.485906 10.855 0.485906 12.9114 2.54228L13.9466 3.57747"
                        stroke="#4270FF" stroke-width="1.56" stroke-linecap="round"/>
                    <path d="M13.9606 3.59143L8.78467 8.76734" stroke="#4270FF"
                          stroke-width="1.56" stroke-linecap="round"/>
                    <path d="M26.3688 16.0137L22.228 20.1404" stroke="#4270FF"
                          stroke-width="1.56" stroke-linecap="round"/>
                            </icons>';
    }

    public static function getNoImage(): string
    {
        return asset("images/no_image_2.jpg");
    }

    public static function getNoProfileImage(): string
    {
        return asset("images/noprofile.webp");
    }

    public static function randSvg(): ?string
    {
        return Storage::disk('icons')->get(rand(1, 7) . ".svg");
    }

    public static function randColor(): array|int|string
    {
        $colors = [
            "pink-bg",
            "orange-bg",
            "purple-bg",
            "yellow-bg",
            "violet-bg",
            "blue-bg-2",
        ];

        $randomKey = array_rand($colors);
        return $colors[$randomKey];
    }

    public static function validatePhone($tel, $onek = 90): array|false|string|null
    {
        $tel = preg_replace('/[^0-9]/', '', $tel); //Rakam disinda herseyi temizle.

        if (substr($tel, 0, 2) == '00') //numaranın bası cift sifirla basliyorsa
            $tel = substr($tel, 2); //temizle
        elseif (substr($tel, 0, 1) == '0') //numaranın bası tek sifirla basliyorsa
            $tel = substr($tel, 1); //temizle

        $numara = substr($tel, 2); //onek ile basladigi varsayilan numaranin geri kalanini al
        if (substr($numara, 0, 1) == '0') //sifirla basliyormu kontrol et
            $numara = substr($numara, 1); //basliyorsa temizle

        if (strlen($tel) == '10') //telefon numarasi 10 karakterse
            return $onek . $tel; //basina onek ekle gonder
        if (substr($tel, 0, 2) != $onek) //telefon numarasi onek ile baslamiyorsa
            return $tel; //Ulke kodu TR degil //noyu geri
        if (strlen($numara) != '10') //son numara 10 karakter değilse
            return false; //'Gecersiz: TR telefon formatina uygun degil (901112223344)';//hata gonder
        return $onek . $numara; //sorun yoksa numarayı gonder
    }

    public static function parseUrl(string ...$urls): string
    {
        return collect($urls)->map(fn($url) => trim($url, '/'))->implode('/');
    }

    public static function formatTurkishString($string): string
    {
        // Türkçe'ye özel büyükten küçüğe harf dönüşüm tablosu
        $turkishToLower = [
            'I' => 'ı',
            'İ' => 'i',
            'Ç' => 'ç',
            'Ğ' => 'ğ',
            'Ö' => 'ö',
            'Ş' => 'ş',
            'Ü' => 'ü',
            'A' => 'a',
            'B' => 'b',
            'C' => 'c',
            'D' => 'd',
            'E' => 'e',
            'F' => 'f',
            'G' => 'g',
            'H' => 'h',
            'J' => 'j',
            'K' => 'k',
            'L' => 'l',
            'M' => 'm',
            'N' => 'n',
            'O' => 'o',
            'P' => 'p',
            'R' => 'r',
            'S' => 's',
            'T' => 't',
            'U' => 'u',
            'V' => 'v',
            'Y' => 'y',
            'Z' => 'z',
        ];

        $lowercaseString = strtr($string, $turkishToLower);

        $firstLetter = mb_strtoupper(mb_substr($lowercaseString, 0, 1, 'UTF-8'), 'UTF-8');
        $restOfString = mb_substr($lowercaseString, 1, null, 'UTF-8');

        return $firstLetter . $restOfString;
    }

    public static function getRemainingTimeAttribute($time): string
    {
        $now = Carbon::now();

        $remaining = $time ? Carbon::parse($time) : null;

        if (!$remaining) {
            return 'Süre belirlenmemiş';
        }

        if ($remaining->isPast()) {
            return 'Süre bitmiş';
        }

        return $remaining->diffForHumans($now, ['parts' => 3]);
    }


    public static function generateRandomCode($len = 12, $number = true, $upper = true, $lower = false, $allwOnlyNumeric = false): string
    {
        $charSet = '';
        if ($number) {
            $charSet .= '0123456789';
        }
        if ($upper) {
            $charSet .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($lower) {
            $charSet .= 'abcdefghijklmnopqrstuwxyz';
        }
        $max = strlen($charSet) - 1;
        $code = '';
        for ($i = 0; $i < $len; $i++) {
            $code .= substr($charSet, rand(0, $max), 1);
        }

        if ($allwOnlyNumeric === false && is_numeric($code)) {
            return self::generateRandomCode($len, $number, $upper, $lower, $allwOnlyNumeric);
        }

        return $code;
    }

    public static function calculateCompletionRate($companyId): int
    {
        $rating = 0;

        // Şirketi getirme
        $company = Company::findOrFail($companyId);

        // Şirket tablosunun kolonlarını al
        $columns = Schema::getColumnListing('companies');

        // Kolonları kontrol et
        foreach ($columns as $column) {
            if (!empty($company->$column)) {
                $rating++;
            }
        }

        // İlişkili verileri kontrol et
        $relations = ['users', 'price', 'sss', 'features', 'info', 'images', 'courses'];

        foreach ($relations as $relation) {
            if (method_exists($company, $relation) && $company->$relation()->exists()) {
                $rating++;
            }
        }

        // Maksimum doluluk oranını hesapla
        $maxRating = count($columns) + count($relations);

        // Yüzdelik oranı hesapla ve tam sayıya yuvarla
        $completionRate = ($rating / $maxRating) * 100;

        return (int)round($completionRate);
    }


}

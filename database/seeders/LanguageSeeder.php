<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultData =
            [
                [
                    'key' => 'text_1',
                    'value' => 'Aradığınız dershaneyi bulmanın en kolay yolu',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_2',
                    'value' => 'Abone Ol',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_3',
                    'value' => 'Hangiderslig.com bir RESEND İLETİŞİM markasıdır © Tüm hakları saklıdır.',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_4',
                    'value' => 'Şehrinde aramaya başla',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_5',
                    'value' => 'En Uygun Dershaneyi Bul',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_6',
                    'value' => 'örn: İstanbuldaki dershaneler',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_7',
                    'value' => 'İyi tercihler',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_8',
                    'value' => 'İyi gelecekler',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_9',
                    'value' => 'Popüler kategorileri keşfet',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_10',
                    'value' => 'Kendinize bakın, karşılığında başarınız olarak bir şey alın',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_11',
                    'value' => 'Tüm kategoriler',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_12',
                    'value' => 'Yadıma ihtiyacın var mı ?',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_13',
                    'value' => 'Ücretsiz Eğitim Danışmanı',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_14',
                    'value' => 'Bize Ulaşın',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_15',
                    'value' => 'Öne çıkan dershaneler',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_16',
                    'value' => 'Benzer Kurumlar',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_17',
                    'value' => 'Benzer kurumlara burdan ulaşabilirsiniz.',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_18',
                    'value' => 'Teşşekür Ederiz.',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_19',
                    'value' => 'Herhangi bir sorunuzda altta verilen mail adresinden bize ulaşabilirsiniz',
                    "language" => 'tr'
                ],
                [
                    'key' => 'text_20',
                    'value' => 'En Çok Tercih Edilen Eğitim Kurumu',
                    "language" => 'tr'
                ],
            ];

        foreach ($defaultData as $data) {
            if (!Language::query()->where('key', $data['key'])->exists()) {
                Language::query()->create($data);
            }
        }

    }
}

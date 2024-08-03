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
        DB::table("language")->delete();

        $defaultData =
            [
                ['key' => 'slider_ust_bilgi_yazisi', 'value' => 'Herhangi bir dershane değil, Hangi Dershane !', "language" => 'tr'],
                ['key' => 'slider_ana_bilgi_yazisi', 'value' => 'Şehrindeki en uygun dershaneyi bul', "language" => 'tr'],
                ['key' => 'slider_alt_bilgi_yazisi', 'value' => 'Şehrini seç,teklif al, %25 e varan oranlarda indirimi kap', "language" => 'tr'],
                ['key' => 'kategori_ust_bilgi_yazisi', 'value' => 'Kategoriler', "language" => 'tr'],
                ['key' => 'kategori_ana_bilgi_yazisi', 'value' => 'Sınavlar', "language" => 'tr'],
                ['key' => 'kategori_alt_bilgi_yazisi', 'value' => 'Girmek istediğiniz sınavları seçiniz', "language" => 'tr'],
                ['key' => 'arastirma_ust_bilgi_yazisi', 'value' => 'Araştırmayı Keşfedin', "language" => 'tr'],
                ['key' => 'arastirma_ana_bilgi_yazisi', 'value' => 'Öğrenmekten daha fazlası', "language" => 'tr'],
                ['key' => 'arastirma_alt_bilgi_yazisi', 'value' => 'Dünyanın her yerinden masaüstü veya internet bağlantısı olan cep telefonundan öğrenin.', "language" => 'tr'],
                ['key' => 'arastirma_bilgi_baslik_1', 'value' => 'Eduker Çevrimiçi Uzmanlardan Eğitim', "language" => 'tr'],
                ['key' => 'arastirma_bilgi_aciklama_1', 'value' => 'İnternet bağlantısı olan masaüstü cep telefonuyla dünyanın her yerinden öğrenin.', "language" => 'tr'],
                ['key' => 'arastirma_bilgi_baslik_2', 'value' => '2,4 binin üzerinde Video Kursu (tüm kurslar)', "language" => 'tr'],
                ['key' => 'arastirma_bilgi_aciklama_2', 'value' => 'İnternet bağlantısı olan masaüstü cep telefonuyla dünyanın her yerinden öğrenin.', "language" => 'tr'],
                ['key' => 'arastirma_bilgi_baslik_3', 'value' => 'Ara sıra Video güncellemeleri (2022)', "language" => 'tr'],
                ['key' => 'arastirma_bilgi_aciklama_3', 'value' => 'İnternet bağlantısı olan masaüstü cep telefonuyla dünyanın her yerinden öğrenin.', "language" => 'tr'],
            ];

        Language::query()->insert($defaultData);
    }
}

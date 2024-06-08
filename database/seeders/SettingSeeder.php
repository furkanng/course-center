<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("settings")->delete();

        $defaultData =
            [
                ['title' => 'Set Mailer Title', 'key' => 'mailer_from_name', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Driver', 'key' => 'mailer_driver', 'value' => 'smtp', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer From', 'key' => 'mailer_from_address', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Port', 'key' => 'mailer_port', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Password', 'key' => 'mailer_password', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Username', 'key' => 'mailer_username', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Encryption', 'key' => 'mailer_encryption', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Mailer Host', 'key' => 'mailer_host', 'value' => '', "type" => 'text', "group_key" => 'email_settings'],
                ['title' => 'Set Site Logo', 'key' => 'site_logo', 'value' => '', "type" => 'image', "group_key" => 'general_settings'],
                ['title' => 'Set Site Footer Logo', 'key' => 'site_footer_logo', 'value' => '', "type" => 'image', "group_key" => 'general_settings'],
                ['title' => 'Set Site Favicon', 'key' => 'site_favicon', 'value' => '', "type" => 'file', "group_key" => 'general_settings'],
                ['title' => 'Set Site Title', 'key' => 'site_title', 'value' => '', "type" => 'text', "group_key" => 'general_settings'],
                ['title' => 'Set Site Keywords', 'key' => 'site_keywords', 'value' => '', "type" => 'text', "group_key" => 'general_settings'],
                ['title' => 'Set Site Description', 'key' => 'site_description', 'value' => '', "type" => 'text', "group_key" => 'general_settings'],
                ['title' => 'Set Url Facebook', 'key' => 'media_facebook', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Url Instagram', 'key' => 'media_instagram', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Url Twitter', 'key' => 'media_twitter', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Url Linkedin', 'key' => 'media_linkedin', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Url Youtube', 'key' => 'media_youtube', 'value' => '', "type" => 'text', "group_key" => 'socialMedia_settings'],
                ['title' => 'Set Contact Phone', 'key' => 'contact_phone', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Contact Title', 'key' => 'contact_title', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Contact Fax', 'key' => 'contact_fax', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Contact Email', 'key' => 'contact_email', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Contact Address', 'key' => 'contact_address', 'value' => '', "type" => 'text', "group_key" => 'contact_settings'],
                ['title' => 'Set Api Whatsapp', 'key' => 'whatsapp_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Phone', 'key' => 'phone_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Analytics', 'key' => 'analytics_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Webmaster Tools', 'key' => 'webmaster_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Map', 'key' => 'map_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Live Support', 'key' => 'livesupport_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Set Api Google Rchaptha', 'key' => 'rcaptha_api', 'value' => '', "type" => 'text', "group_key" => 'api_settings'],
                ['title' => 'Üst Bilgi Yazısı', 'key' => 'slider_ust_bilgi_yazisi', 'value' => 'Herhangi bir dershane değil, Hangi Dershane !', "type" => 'text', "group_key" => 'slider_settings'],
                ['title' => 'Ana Bilgi Yazısı', 'key' => 'slider_ana_bilgi_yazisi', 'value' => 'Şehrindeki en uygun dershaneyi bul', "type" => 'text', "group_key" => 'slider_settings'],
                ['title' => 'Alt Bilgi Yazısı', 'key' => 'slider_alt_bilgi_yazisi', 'value' => 'Şehrini seç,teklif al, %25 e varan oranlarda indirimi kap', "type" => 'text', "group_key" => 'slider_settings'],
                ['title' => 'Orta Slider Resim (512 X 574)', 'key' => 'slider_orta_resim', 'value' => '/storage/uploads/slider.png', "type" => 'file', "group_key" => 'slider_settings'],
                ['title' => 'Üst Bilgi Yazısı', 'key' => 'category_ust_bilgi_yazisi', 'value' => 'Kategoriler', "type" => 'text', "group_key" => 'category_settings'],
                ['title' => 'Ana Bilgi Yazısı', 'key' => 'category_ana_bilgi_yazisi', 'value' => 'Sınavlar', "type" => 'text', "group_key" => 'category_settings'],
                ['title' => 'Alt Bilgi Yazısı', 'key' => 'category_alt_bilgi_yazisi', 'value' => 'Girmek istediğiniz sınavları seçiniz', "type" => 'text', "group_key" => 'category_settings'],
                ['title' => 'Üst Bilgi Yazısı', 'key' => 'research_ust_bilgi_yazisi', 'value' => 'Araştırmayı Keşfedin', "type" => 'text', "group_key" => 'research_settings'],
                ['title' => 'Ana Bilgi Yazısı', 'key' => 'research_ana_bilgi_yazisi', 'value' => 'Öğrenmekten daha fazlası', "type" => 'text', "group_key" => 'research_settings'],
                ['title' => 'Alt Bilgi Yazısı', 'key' => 'research_alt_bilgi_yazisi', 'value' => 'Dünyanın her yerinden masaüstü veya internet bağlantısı olan cep telefonundan öğrenin.', "type" => 'text', "group_key" => 'research_settings'],
                ['title' => 'Banner Resim (Yatay tercih ediniz)', 'key' => 'research_banner_resim', 'value' => '/storage/uploads/research-banner.jpg', "type" => 'file', "group_key" => 'research_settings'],
                ['title' => 'Modül 1 Başlık Yazısı', 'key' => 'research_info_title_1', 'value' => 'eduker Çevrimiçi Uzmanlardan Eğitim', "type" => 'text', "group_key" => 'research_settings'],
                ['title' => 'Modül 1 Açıklama Yazısı', 'key' => 'research_info_description_1', 'value' => 'İnternet bağlantısı olan masaüstü cep telefonuyla dünyanın her yerinden öğrenin.', "type" => 'text', "group_key" => 'research_settings'],
                ['title' => 'Modül 1 SVG', 'key' => 'research_info_svg_1', 'value' => '<svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M26 13.9961V15.1656C26 19.8436 24.8875 21 20.45 21H6.55C2.1125 21 1 19.8305 1 15.1656V6.83443C1 2.16951 2.1125 1 6.55 1H8.5"
                                        stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M13.5 21.5V25.5" stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M1 14.75H26" stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M7.875 26H19.125" stroke="#6151FB" stroke-width="1.6"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                        d="M20.825 10.2127H14.875C13.15 10.2127 12.575 9.0627 12.575 7.9127V3.5127C12.575 2.1377 13.7 1.0127 15.075 1.0127H20.825C22.1 1.0127 23.125 2.0377 23.125 3.31269V7.9127C23.125 9.1877 22.1 10.2127 20.825 10.2127Z"
                                        stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M24.6375 8.39985L23.125 7.33735V3.88735L24.6375 2.82485C25.3875 2.31235 26 2.62485 26 3.53735V7.69985C26 8.61235 25.3875 8.92485 24.6375 8.39985Z"
                                        stroke="#6151FB" stroke-width="1.6" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                 </svg>',
                    "type" => 'text', "group_key" => 'research_settings'
                ],
                ['title' => 'Modül 2 Başlık Yazısı', 'key' => 'research_info_title_2', 'value' => '2,4 binin üzerinde Video Kursu (tüm kurslar)', "type" => 'text', "group_key" => 'research_settings'],
                ['title' => 'Modül 2 Açıklama Yazısı', 'key' => 'research_info_description_2', 'value' => 'İnternet bağlantısı olan masaüstü cep telefonuyla dünyanın her yerinden öğrenin.', "type" => 'text', "group_key" => 'research_settings'],
                ['title' => 'Modül 2 SVG', 'key' => 'research_info_svg_2', 'value' => '<svg width="28" height="27" viewBox="0 0 28 27" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.4 19.746H6.47299C2.092 19.746 1 18.654 1 14.273V6.47299C1 2.092 2.092 1 6.47299 1H20.162C24.543 1 25.635 2.092 25.635 6.47299"
                                        stroke="#F4930E" stroke-width="1.7" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M11.3999 25.6218V19.7458" stroke="#F4930E" stroke-width="1.7"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 14.5459H11.4" stroke="#F4930E" stroke-width="1.7" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M7.16211 25.6218H11.4001" stroke="#F4930E" stroke-width="1.7"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path
                                        d="M26.9999 14.3509V21.7739C26.9999 24.8549 26.2329 25.6219 23.152 25.6219H18.537C15.456 25.6219 14.689 24.8549 14.689 21.7739V14.3509C14.689 11.2699 15.456 10.5029 18.537 10.5029H23.152C26.2329 10.5029 26.9999 11.2699 26.9999 14.3509Z"
                                        stroke="#F4930E" stroke-width="1.7" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M20.8179 21.4359H20.8296" stroke="#F4930E" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>',
                    "type" => 'text', "group_key" => 'research_settings'
                ],
                ['title' => 'Modül 3 Başlık Yazısı', 'key' => 'research_info_title_3', 'value' => 'ara sıra Video güncellemeleri (2022)', "type" => 'text', "group_key" => 'research_settings'],
                ['title' => 'Modül 3 Açıklama Yazısı', 'key' => 'research_info_description_3', 'value' => 'İnternet bağlantısı olan masaüstü cep telefonuyla dünyanın her yerinden öğrenin.', "type" => 'text', "group_key" => 'research_settings'],
                ['title' => 'Modül 3 SVG', 'key' => 'research_info_svg_3', 'value' => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.6185 23.8234H7.24516C3.5585 23.8234 2.3335 21.3734 2.3335 18.9118V9.08842C2.3335 5.40176 3.5585 4.17676 7.24516 4.17676H14.6185C18.3052 4.17676 19.5302 5.40176 19.5302 9.08842V18.9118C19.5302 22.5984 18.2935 23.8234 14.6185 23.8234Z"
                                        stroke="#20AD96" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M22.7736 19.9502L19.5303 17.6752V10.3135L22.7736 8.03849C24.3603 6.93015 25.6669 7.60682 25.6669 9.55515V18.4452C25.6669 20.3935 24.3603 21.0702 22.7736 19.9502Z"
                                        stroke="#20AD96" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M13.4165 12.8345C14.383 12.8345 15.1665 12.051 15.1665 11.0845C15.1665 10.118 14.383 9.33447 13.4165 9.33447C12.45 9.33447 11.6665 10.118 11.6665 11.0845C11.6665 12.051 12.45 12.8345 13.4165 12.8345Z"
                                        stroke="#20AD96" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                 </svg>',
                    "type" => 'text', "group_key" => 'research_settings'
                ],
            ];

        Setting::query()->insert($defaultData);
    }
}

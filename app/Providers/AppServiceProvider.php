<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\FrontImage;
use App\Models\Language;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->cacheLanguageData();
        $this->cacheImagesData();
        $this->cacheCourseData();
        $this->cacheSettingData();
        $this->cachePageData();
        $this->setMailConfig();
    }

    protected function setMailConfig(): void
    {
        $settingsConfigArray = DB::table('settings')->where("group_key", "=", "email_settings")->get();
        $settingsConfig = [];

        foreach ($settingsConfigArray as $config) {
            $settingsConfig[$config->key] = $config->value;
        }

        $mail = [
            "driver" => $settingsConfig['mailer_driver'],
            "host" => $settingsConfig['mailer_host'],
            "port" => (int)$settingsConfig['mailer_port'],
            "encryption" => $settingsConfig['mailer_encryption'],
            "username" => $settingsConfig['mailer_username'],
            "password" => $settingsConfig['mailer_password'],
            "from" => [
                "address" => $settingsConfig['mailer_from_address'],
                "name" => $settingsConfig['mailer_from_name'],
            ]
        ];

        Config::set('mail', $mail);
    }

    protected function cachePageData(): void
    {
        $cacheKey = 'pages';
        $cacheDuration = 60 * 60;

        $pages = Cache::remember($cacheKey, $cacheDuration, function () {
            return Page::query()->where('status', true)->get();
        });

        view()->share('pages', $pages);
    }

    protected function cacheCourseData(): void
    {
        $cacheKey = 'courses';
        $cacheDuration = 60 * 60;

        $courses = Cache::remember($cacheKey, $cacheDuration, function () {
            return Course::query()->where('status', true)->orderBy('order')->get();
        });
        view()->share('courses', $courses);
    }

    protected function cacheSettingData(): void
    {
        $cacheKey = 'settings';
        $cacheDuration = 60 * 60;

        $settings = Cache::remember($cacheKey, $cacheDuration, function () {
            $settings = Setting::query()->get(['key', 'value']);
            return $settings->pluck('value', 'key')->toArray();
        });

        view()->share('settings', $settings);
    }


    protected function cacheLanguageData(): void
    {
        $cacheKey = 'languages.tr';
        $cacheDuration = 60 * 60;

        $language = Cache::remember($cacheKey, $cacheDuration, function () {
            $languages = Language::query()->where('language', 'tr')->get(['key', 'value']);
            return $languages->pluck('value', 'key')->toArray();
        });
        view()->share('language', $language);
    }

    protected function cacheImagesData(): void
    {
        $cacheKey = 'images';
        $cacheDuration = 60 * 60;

        $image = Cache::remember($cacheKey, $cacheDuration, function () {
            $images = FrontImage::query()->get(['key', 'image_url']);
            return $images->pluck('image_url', 'key')->toArray();
        });

        view()->share('image', $image);
    }
}

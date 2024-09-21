<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\FrontImage;
use App\Models\Language;
use Illuminate\Support\Facades\Cache;
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
    }

    protected function cacheCourseData(): void
    {
        $cacheKey = 'courses';
        $cacheDuration = 60 * 60;

        $courses = Cache::remember($cacheKey, $cacheDuration, function () {
            return Course::query()->where('status', 1)->orderBy('order')->get();
        });
        view()->share('courses', $courses);
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

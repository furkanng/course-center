<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table("link_list")->truncate();

        $this->call([
            //UserSeeder::class,
            //SettingSeeder::class,
            //CoursesSeeder::class,
            //CompanyTypeSeeder::class,
            //PageSeeder::class,
            LanguageSeeder::class,
            //ImagesSeeder::class,
            //FeatureSeeder::class,
        ]);
    }
}

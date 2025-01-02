<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address'); // Ziyaretçinin IP adresi
            $table->string('url'); // Ziyaret edilen URL
            $table->string('referrer')->nullable(); // Geldiği referans (isteğe bağlı)
            $table->text('user_agent'); // Kullanıcı tarayıcı bilgisi
            $table->string('seo_link')->nullable();// seo_link sütunu
            $table->timestamp('visited_at'); // Ziyaret zamanı
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_visits');
    }
};

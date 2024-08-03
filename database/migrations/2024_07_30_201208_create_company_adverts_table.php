<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Firmaların blog veya kampanyalarının listesi
     */
    public function up(): void
    {
        Schema::create('company_adverts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->constrained()->onDelete('cascade');
            $table->string("image")->nullable();
            $table->string("image_url")->nullable();
            $table->longText("content")->nullable();
            $table->string("title")->nullable();
            $table->boolean("status")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_adverts');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Firmaların fiyatlarının listesi
     */
    public function up(): void
    {
        Schema::create('company_price_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->constrained()->onDelete('cascade');
            $table->string('price_title');
            $table->decimal('price', 10, 2);
            $table->string('learning_type')->comment("öğrenim türü");
            $table->decimal('discounted_price', 10, 2)->nullable();
            $table->boolean("status")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_price_lists');
    }
};

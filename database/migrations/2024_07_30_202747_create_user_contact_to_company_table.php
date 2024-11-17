<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Müşterilerin firmalardan teklif almasını sağlayan tablo
     */
    public function up(): void
    {
        Schema::create('user_contact_to_company', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->constrained()->onDelete('cascade');
            $table->string("customer_name");
            $table->string("customer_email");
            $table->string("customer_phone");
            $table->boolean("review")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_contact_to_company');
    }
};

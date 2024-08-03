<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Kullanıcıların firma talep tablosu
     */
    public function up(): void
    {
        Schema::create('user_company_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreignId("company_id")->constrained()->onDelete('cascade');
            $table->string('permit')->nullable();
            $table->string('id_card_front')->nullable();
            $table->string('id_card_back')->nullable();
            $table->string('proxy')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->boolean("approve")->default(false);
            $table->boolean("new_company")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_company_requests');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('company_type')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ["admin", "company", "student", "teacher"]);
            $table->string("user_type")->nullable()->comment("öğrenci, veli gibi enum değerler gelecek");
            $table->boolean("status")->default(true);
            $table->boolean("sms_approve")->default(true);
            $table->boolean("email_approve")->default(true);
            $table->boolean("kvkk_approve")->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

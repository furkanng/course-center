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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("course_ids")->nullable();
            $table->string("name");
            $table->text("address");
            $table->string("phone");
            $table->string("fax")->nullable();
            $table->string("website")->nullable();
            $table->integer("company_type");
            $table->string("city");
            $table->string("district");
            $table->string("mernis")->nullable();
            $table->boolean("status")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

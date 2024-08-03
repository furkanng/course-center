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
        Schema::create('activity', function (Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->longText("description");
            $table->string("location")->nullable();
            $table->date("date");
            $table->time("start_time");
            $table->time("end_time");
            $table->enum("review",[1,2,3,4,5])->default(1);
            $table->string('link');
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string("seo_keywords")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity');
    }
};

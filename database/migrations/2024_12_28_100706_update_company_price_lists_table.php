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
        Schema::table('company_price_lists', function (Blueprint $table) {

            $table->dropColumn('price_title');

            $table->foreignId('price_field_id')
                ->constrained('price_fields')
                ->onDelete('cascade')
                ->after('company_id');
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

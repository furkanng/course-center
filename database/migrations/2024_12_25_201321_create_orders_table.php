<?php

use App\Enums\PaymentStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('plan_id')->nullable();
            $table->string("plan_type");
            $table->text('shipping_address')->comment("fatura adresi");
            $table->string("payment_type")->comment("ödeme türü");
            $table->enum("payment_status",[\App\Enums\PaymentStatus::PAID->value,PaymentStatus::UNPAID->value])
                ->default(PaymentStatus::UNPAID->value)->comment("ödenme durumu");
            $table->text('payment_detail')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('code')->nullable()->comment("sipariş numarası");
            $table->boolean('viewed')->default(false)->comment("adminin görüp görmemesi olayı");
            $table->enum('status',[\App\Enums\OrderStatus::PENDING->value,\App\Enums\OrderStatus::PUBLISHED->value])
                ->default(\App\Enums\OrderStatus::PENDING->value)->comment("yayına alınma durumu");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

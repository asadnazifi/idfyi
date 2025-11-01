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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('order_number')->unique(); // شماره سفارش
            $table->enum('status', [
                'pending', 'processing', 'completed', 'cancelled', 'refunded'
            ])->default('pending');
            $table->decimal('total_price', 12, 2)->default(0);
            $table->string('payment_method')->nullable(); // مثلاً درگاه زرین‌پال
            $table->string('transaction_id')->nullable();
            $table->string('shipping_address')->nullable();
            $table->text('notes')->nullable();
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

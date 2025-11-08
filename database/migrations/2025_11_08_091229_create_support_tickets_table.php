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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title'); // موضوع تیکت
            $table->string('type')->default('general'); // 'general' یا 'paid'
            $table->foreignId('related_plan_id')->nullable()->constrained('support_plans')->onDelete('set null'); // فقط برای پلن‌های خریداری‌شده
            $table->enum('status', ['open', 'in_progress', 'answered', 'closed'])->default('open');
            $table->timestamp('last_reply_at')->nullable(); // آخرین زمان پاسخ برای مرتب‌سازی
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};

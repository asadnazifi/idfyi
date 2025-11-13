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
            $table->string('type')->default('general'); // نوع تیکت: 'general' یا 'paid'

            // 👇 اضافه‌کردن ستون قبل از تعریف foreign key
            $table->unsignedBigInteger('related_plan_id')->nullable(); // فقط برای پلن‌های خریداری‌شده

            $table->enum('status', ['open', 'in_progress', 'answered', 'closed'])->default('open');
            $table->timestamp('last_reply_at')->nullable(); // آخرین زمان پاسخ برای مرتب‌سازی
            $table->timestamps();

            // 👇 تعریف کلید خارجی بعد از ساخت ستون و جدول مقصد موجود
            $table->foreign('related_plan_id')
                ->references('id')
                ->on('support_plans')
                ->nullOnDelete(); // در صورت حذف پلن، null بشه
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

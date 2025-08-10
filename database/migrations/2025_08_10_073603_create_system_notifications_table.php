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
        Schema::create('system_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('notification_type', 100)->nullable();
            $table->string('notification_view', 100)->nullable();
            $table->datetime('publish_start_at')->nullable();
            $table->datetime('publish_end_at')->nullable();
            $table->string('status', 191)->default('activated');
            $table->unsignedBigInteger('sort_order')->default(1);
            $table->string('sku', 191)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('system_notification_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('system_notification_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title', 191)->nullable();
            $table->string('slug', 150);
            $table->text('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['locale', 'slug']);
            $table->unique(['system_notification_id', 'locale'], 'system_notification_id_locale');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_translations');
        Schema::dropIfExists('notifications');
    }
};

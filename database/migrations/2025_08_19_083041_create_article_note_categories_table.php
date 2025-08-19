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
        Schema::create('article_note_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('status')->default('activated');
            $table->timestamps();
        });

        Schema::create('article_note_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_note_category_id')->constrained(indexName: 'note_category_translation_foreign')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title');
            $table->string('locale')->index();
            $table->unique(['article_note_category_id', 'locale'], 'article_note_category_translation_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_note_category_translations');
        Schema::dropIfExists('article_note_categories');
    }
};

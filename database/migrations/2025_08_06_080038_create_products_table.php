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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('sort_order')->default(1);
            $table->string('status')->default('activated');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->string('locale')->index();
            $table->unique(['locale', 'slug']);
            $table->unique(['product_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_translations');
        Schema::dropIfExists('products');
    }
};

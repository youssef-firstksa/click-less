<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('color')->nullable();
            $table->string('logo')->nullable();
            $table->string('img')->nullable();
            $table->string('ai_key')->nullable();
            $table->string('status')->default('activated');
            $table->timestamps();
        });

        Schema::create('bank_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->text('details');
            $table->string('locale')->index();
            $table->unique(['bank_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_translations');
        Schema::dropIfExists('banks');
    }
}

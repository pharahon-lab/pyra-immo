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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();

            $table->string('promo_code');
            $table->boolean('use_code')->default(true);
            $table->boolean('use_percentage')->default(true);
            $table->integer('reduction')->default(0);

            $table->dateTime('start');
            $table->dateTime('end');
            
            $table->boolean('has_limit')->default(true);
            $table->boolean('is_used')->default(false);
            $table->smallInteger('usage_count')->default(0);
            $table->smallInteger('limit')->nullable();

            $table->morphs('promotionnable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};

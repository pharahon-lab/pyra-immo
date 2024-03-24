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
        Schema::create('abonnement_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->double('price');
            $table->double('user_price');
            $table->enum('type', ['personal', 'company']);
            $table->smallInteger('max_place');
            $table->smallInteger('max_image');
            $table->smallInteger('max_video');
            $table->smallInteger('max_video_second');
            $table->smallInteger('max_user')->default(1);
            $table->smallInteger('freeviews')->default(0);
            $table->boolean('has_freeview')->default(false);
            $table->boolean('is_active')->default(false);
            $table->integer('pourcentage_demarcheur')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnement_types');
    }
};

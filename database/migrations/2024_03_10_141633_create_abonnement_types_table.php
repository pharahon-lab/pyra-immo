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
            $table->string('price');
            $table->enum('type', ['personal', 'company']);
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

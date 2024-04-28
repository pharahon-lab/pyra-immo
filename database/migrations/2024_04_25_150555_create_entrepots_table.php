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
        Schema::create('entrepots', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();

            
            $table->integer('nombre_piece');
            $table->integer('nombre_salle_eau');
            $table->integer('superficie')->default(0);
            $table->integer('volume')->default(0);
            $table->integer('nombre_etage')->nullable();

            $table->boolean('basement')->nullable()->default(false);
            
            $table->boolean('securite')->nullable()->default(false);
            $table->boolean('parking')->nullable()->default(false);
            $table->integer('place_parking')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrepots');
    }
};

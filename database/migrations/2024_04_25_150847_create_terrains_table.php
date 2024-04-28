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
        Schema::create('terrains', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();

            
            $table->integer('superficie')->default(0);
            $table->integer('nombre_etage')->nullable();
            
            $table->boolean('acd')->nullable()->default(false);
            $table->boolean('permis_construire')->nullable()->default(false);
            $table->boolean('gym')->nullable()->default(false);
            $table->boolean('cuisine')->nullable()->default(false);
            $table->boolean('chauffe_eau')->nullable()->default(false);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terrains');
    }
};

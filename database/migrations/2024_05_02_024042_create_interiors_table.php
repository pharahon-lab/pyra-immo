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
        Schema::create('interiors', function (Blueprint $table) {
            
            $table->uuid('id')->primary()->unique()->index();
        
            $table->integer('nombre_piece');
            $table->integer('nombre_salle_eau');
            $table->integer('superficie')->default(0);
            $table->integer('volume')->default(0);
            
            $table->boolean('suite')->nullable()->default(false);
            $table->integer('etage')->nullable();
            $table->integer('nombre_etage')->nullable();

            $table->boolean('basement')->nullable()->default(false);
            $table->integer('nombre_etage_basement')->nullable();

            $table->boolean('open_space')->nullable()->default(false);
            $table->integer('numero_de_porte')->nullable();
            

            $table->boolean('salle_de_conf')->nullable()->default(false);
            $table->integer('nombre_salle_de_conf')->nullable()->default(0);
            
            $table->uuidMorphs('interiorsable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interiors');
    }
};

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
        Schema::create('studios', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();

            
            $table->integer('nombre_piece');
            $table->integer('nombre_salle_eau');
            $table->integer('superficie')->default(0);
            $table->integer('etage')->nullable();
            
            $table->boolean('meuble')->nullable()->default(false);
            $table->boolean('ascenseur')->nullable()->default(false);
            $table->boolean('gym')->nullable()->default(false);
            $table->boolean('cuisine')->nullable()->default(false);
            $table->boolean('chauffe_eau')->nullable()->default(false);
            $table->boolean('climatisation')->nullable()->default(false);

            $table->boolean('piscine')->nullable()->default(false);
            $table->boolean('piscine_is_interne')->nullable()->default(false);
            $table->boolean('securite')->nullable()->default(false);
            $table->boolean('garage')->nullable()->default(false);
            $table->integer('place_garage')->nullable();
            $table->boolean('jardin')->nullable()->default(false);
            $table->boolean('cours_avant')->nullable()->default(false);
            $table->boolean('cours_arriere')->nullable()->default(false);
            $table->boolean('balcon_avant')->nullable()->default(false);
            $table->boolean('balcon_arriere')->nullable()->default(false);
            $table->boolean('terrasse_avant')->nullable()->default(false);
            $table->boolean('terrasse_arriere')->nullable()->default(false);
            
            $table->morphs('studioable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studios');
    }
};

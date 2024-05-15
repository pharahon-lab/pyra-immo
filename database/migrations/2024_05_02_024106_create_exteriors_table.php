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
        Schema::create('exteriors', function (Blueprint $table) {
            
            $table->uuid('id')->primary()->unique()->index();

            $table->boolean('piscine')->nullable()->default(false);
            $table->boolean('piscine_is_interne')->nullable()->default(false);
            $table->boolean('securite')->nullable()->default(false);
            $table->boolean('parking')->nullable()->default(false);
            $table->integer('place_parking')->nullable();
            $table->boolean('jardin')->nullable()->default(false);
            $table->boolean('cours_avant')->nullable()->default(false);
            $table->boolean('cours_arriere')->nullable()->default(false);
            $table->boolean('balcon_avant')->nullable()->default(false);
            $table->boolean('balcon_arriere')->nullable()->default(false);
            $table->boolean('terrasse_avant')->nullable()->default(false);
            $table->boolean('terrasse_arriere')->nullable()->default(false);
            
            $table->uuidMorphs('exteriorsable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exteriors');
    }
};

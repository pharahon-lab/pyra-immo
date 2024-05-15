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
        Schema::create('comodities', function (Blueprint $table) {
            
            $table->uuid('id')->primary()->unique()->index();

            $table->boolean('refrigerateur')->nullable()->default(false);
            $table->boolean('micro_onde')->nullable()->default(false);
            $table->boolean('lave_linge')->nullable()->default(false);
            $table->boolean('bar')->nullable()->default(false);
            $table->boolean('boite')->nullable()->default(false);
            $table->boolean('meuble')->nullable()->default(false);
            $table->boolean('vestitaire')->nullable()->default(false);
            $table->boolean('ascenseur')->nullable()->default(false);
            $table->boolean('gym')->nullable()->default(false);
            $table->boolean('cuisine')->nullable()->default(false);
            $table->boolean('boisson')->nullable()->default(false);
            $table->boolean('nourriture')->nullable()->default(false);
            $table->boolean('chauffe_eau')->nullable()->default(false);
            $table->boolean('climatisation')->nullable()->default(false);
            $table->boolean('wifi')->nullable()->default(false);
            $table->boolean('ventilation')->nullable()->default(false);
            $table->boolean('groupe_electrogene')->nullable()->default(false); 
            $table->boolean('service_poubelle')->nullable()->default(false); 
            $table->boolean('service_menage')->nullable()->default(false);
            $table->boolean('service_linge')->nullable()->default(false);
            
            $table->uuidMorphs('comoditiesable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comodities');
    }
};

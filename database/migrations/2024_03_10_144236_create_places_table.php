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
        Schema::create('places', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->enum('offer', ['bureau', 'logement']);
            $table->enum('offer_type', ['sell', 'rent']);
            $table->enum('house_type', [
                'studio',
                'residence',
                'chambre', 
                'appartment', 
                'villa', 
                'duplex', 
                'magasin', 
                'entrepot', 
                'terrain', 
                'immeuble',
            ]);

            $table->string('price');
            $table->integer('nombre_piece');
            $table->integer('nombre_salle_eau');
            $table->string('proprio_name')->nullable();
            $table->string('proprio_telephone')->nullable();
            $table->string('photo_couverture')->nullable();
            $table->string('ref')->nullable();
            $table->longText('description')->default('');
            $table->integer('superficie')->default(0);
            $table->integer('nombre_etage')->nullable();
            $table->integer('place_garage')->nullable();
            
            $table->boolean('meuble')->nullable()->default(false);
            $table->boolean('ascenseur')->nullable()->default(false);
            $table->boolean('gym')->nullable()->default(false);
            $table->boolean('cuisine')->nullable()->default(false);
            $table->boolean('chauffe_eau')->nullable()->default(false);

            $table->boolean('piscine')->nullable()->default(false);
            $table->boolean('piscine_is_interne')->nullable()->default(false);
            $table->boolean('lux')->nullable()->default(false);
            $table->boolean('securite')->nullable()->default(false);
            $table->boolean('garage')->nullable()->default(false);
            $table->boolean('jardin')->nullable()->default(false);
            $table->boolean('cours_avant')->nullable()->default(false);
            $table->boolean('cours_arriere')->nullable()->default(false);
            $table->boolean('balcon_avant')->nullable()->default(false);
            $table->boolean('balcon_arriere')->nullable()->default(false);
            $table->boolean('terrqsse_avant')->nullable()->default(false);
            $table->boolean('terrqsse_arriere')->nullable()->default(false);

            $table->boolean('is_validated')->nullable()->default(false);
            $table->boolean('is_occupe')->nullable()->default(false);
            $table->boolean('is_rejected')->nullable()->default(false);

            $table->unsignedBigInteger('commune_id')->nullable();
            $table->foreign('commune_id')->references('id')
                ->on('communes');

            $table->foreignUuid('facade_id')->constrained('fascade_immos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};

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
        Schema::create('chambres', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();

            
            $table->integer('nombre_piece');
            $table->integer('nombre_salle_eau');
            $table->integer('superficie')->default(0);
            $table->integer('etage')->nullable();
            $table->integer('numero_de_porte')->nullable();
            
            $table->boolean('meuble')->nullable()->default(false);
            $table->boolean('cuisine')->nullable()->default(false);
            $table->boolean('chauffe_eau')->nullable()->default(false);
            $table->boolean('suite')->nullable()->default(false);
            $table->boolean('climatisation')->nullable()->default(false);


            $table->morphs('chambreable');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};

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

            $table->enum('offer_type', ['sell', 'rent']);
            $table->enum('rent_period', ['hourly', 'daily', 'weekly', 'mounthly', 'yearly'])->nullable();
            $table->string('price');
            $table->string('proprio_name')->nullable();
            $table->string('proprio_telephone')->nullable();
            $table->string('photo_couverture')->nullable();
            $table->string('ref')->nullable();
            $table->longText('conditions')->default('');
            $table->longText('description')->default('');
            $table->boolean('lux')->nullable()->default(false);

            $table->boolean('is_validated')->nullable()->default(false);
            $table->boolean('is_occupe')->nullable()->default(false);
            $table->boolean('is_rejected')->nullable()->default(false);

            $table->unsignedBigInteger('commune_id')->nullable();
            $table->foreign('commune_id')->references('id')
                ->on('communes');

            $table->foreignUuid('facade_id')->constrained('fascade_immos')->onDelete('cascade');
            

            $table->uuidMorphs('placeable');

            $table->timestamps();

            
            $table->bigInteger('views')->default(0);
            $table->bigInteger('visites')->default(0);
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

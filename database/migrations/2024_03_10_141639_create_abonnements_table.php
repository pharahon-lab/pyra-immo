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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_actif')->nullable()->default(true);
            $table->string('type')->nullable();


            $table->foreignUuid('facade_id')->constrained('fascade_immos')->onDelete('cascade');

            $table->foreignUuid('transaction_id')->constrained();

            $table->unsignedBigInteger('type_abonnement_id');
            $table->foreign('type_abonnement_id')->references('id')->on('abonnement_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};

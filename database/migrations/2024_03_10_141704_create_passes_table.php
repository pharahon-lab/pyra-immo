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
        Schema::create('passes', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();
            $table->string('transaction_number');
            $table->string('code')->unique();
            $table->dateTime('end_date');
            $table->integer('nb_visite');
            $table->boolean('is_expired')->nullable()->default(false);
            $table->boolean('is_confirmed')->nullable()->default(true);


            $table->foreignid('pass_type_id')->constrained('pass_types')->onDelete('cascade');

            // $table->foreignUuid('transactions_id')->constrained();

			$table->foreignUuid('transaction_id')->foreignUuid()->references('id')->on('transactions')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passes');
    }
};

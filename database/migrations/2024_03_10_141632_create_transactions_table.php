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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->prinary()->unique()->index();

            $table->string('transaction_number');
            $table->string('operation_id')->nullable();
            $table->date('date_transaction')->nullable();
            $table->string('amount');
            $table->string('transaction_way');
            $table->string('transaction_type');
            $table->id('promotion_id')->nullable();
            $table->boolean('is_promotion')->default(false);
            $table->boolean('is_validated')->nullable()->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

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
        Schema::create('fascade_immos', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique()->index();

            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('description');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->double('balance')->default(0.0);
            $table->integer('views')->default(0);
            $table->boolean('is_company')->default(false);
            
            $table->foreignId('country_id')->nullable();
            
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fascade_immos');
    }
};

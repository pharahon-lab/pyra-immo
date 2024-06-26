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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenoms')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique();
            $table->string('password')->nullable();
            $table->boolean('is_admin')->nullable()->default(false);
            $table->boolean('is_staff')->nullable()->default(false);
            $table->boolean('is_suspended')->nullable()->default(false);
            $table->rememberToken();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->foreignUuid('fascade_immo_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_token')->nullable();
            $table->string('provider_refresh_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

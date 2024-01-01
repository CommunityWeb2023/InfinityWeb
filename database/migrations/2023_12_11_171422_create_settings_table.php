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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slogan')->nullable();
            $table->string('description')->nullable();

            $table->string('logo')->nullable();
            $table->string('exp_rate')->default(0);
            $table->string('drop_rate')->default(0);
            $table->string('penya_rate')->default(0);

            $table->string('password_hash')->nullable();

            $table->string('discord')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitch')->nullable();

            $table->string('theme')->default('Classic');
            $table->string('language')->default('en');
            $table->string('timezone')->default('Europe/Paris');
            $table->boolean('maintenance')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

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
        Schema::create('vote_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site');
            $table->string('url');
            $table->boolean('need_username')->default(false);
            $table->string('url_parameter')->default('pingUsername');
            $table->string('ping_back_key')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedInteger('position')->default(0);
            $table->integer('votepoints')->default(0);
            $table->json('ping_back_ips')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote_settings');
    }
};

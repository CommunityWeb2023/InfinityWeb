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
        Schema::create('shop_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('index')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('donate_points')->default(0);
            $table->unsignedInteger('vote_points')->default(0);
            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedInteger('amount')->default(1);
            $table->boolean('tradable')->default(true);
            $table->boolean('stackable')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_items');
    }
};

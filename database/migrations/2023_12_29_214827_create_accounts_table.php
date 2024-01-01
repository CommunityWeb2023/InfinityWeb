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
        Schema::connection('account')->table('ACCOUNT_TBL', function (Blueprint $table) {
            $table->integer('webid')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('account')->table('ACCOUNT_TBL', function (Blueprint $table): void {
            $table->dropColumn('webid');
        });
    }
};

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
        Schema::table('job_offer_user', function (Blueprint $table) {
            $table->string('cv_path')->nullable()->after('stage');
            $table->text('cover_letter')->nullable()->after('cv_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_offer_user', function (Blueprint $table) {
            $table->dropColumn(['cv_path', 'cover_letter']);
        });
    }
};

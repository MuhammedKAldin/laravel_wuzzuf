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
        // Create job_offers table
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('responsibility');
            $table->string('qualifications');
            $table->string('benifits');
            $table->string('location');
            $table->string('availability');
            $table->enum('level', ['Intern', 'Junior', 'Mid', 'Senior', 'Principal', 'Manager']);
            $table->enum('job_type', ['Full-time', 'Part-time']);
            $table->enum('qualification', ['High School', 'Bachelor', 'Master', 'PhD']);
            $table->enum('gender', ['Male', 'Female', 'Any']);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });

        // creating pivot table between job offers and users
        Schema::create('job_offer_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_offer_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('stage')->default('screening');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offer_user');
        Schema::dropIfExists('job_offers');
    }
};

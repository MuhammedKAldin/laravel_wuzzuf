<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\CategoryType;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('type')->unsigned();
            $table->timestamps();
        });

        // Seed the categories
        $categories = CategoryType::getInstances();
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'id' => $category->value,
                'name' => $category->description,
                'type' => $category->value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop categories table
        Schema::dropIfExists('categories');
    }
}; 
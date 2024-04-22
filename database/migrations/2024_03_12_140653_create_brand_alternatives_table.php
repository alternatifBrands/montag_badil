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
        Schema::create('brand_alternatives', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('founder')->nullable();
            $table->string('owner')->nullable();
            $table->date('year')->nullable();
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->string('parent_company')->nullable();
            $table->string('industry')->nullable();
            $table->string('notes')->nullable();
            $table->string('barcode')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['pending','approved','rejected'])->default('pending');
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('country_id')->nullable()->constrained('countries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_alternatives');
    }
};

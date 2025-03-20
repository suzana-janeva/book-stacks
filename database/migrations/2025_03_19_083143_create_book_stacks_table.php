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
        Schema::create('book_stacks', function (Blueprint $table) {
            $table->id();
            $table->integer('grid_size'); 
            $table->json('grid_data')->nullable();
            $table->integer('visible_stacks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_stacks');
    }
};

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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable()->default('Unknown');
            $table->text('description')->nullable()->default('No description available.');
            $table->string('publisher')->nullable()->default('Unknown');
            $table->date('date_published')->nullable();
            $table->integer('price');
            $table->integer('page_count')->nullable()->default(0);
            $table->string('cover_url')->nullable()->default('https://via.placeholder.com/150');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

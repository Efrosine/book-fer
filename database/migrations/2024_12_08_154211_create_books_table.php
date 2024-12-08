<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('writer_id')->constrained('writers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('image_url')->nullable();
            $table->enum('genre', ['horror', 'comedy', 'drama', 'action', 'others'])->default('others');
            $table->text('description');
            $table->integer('price');
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

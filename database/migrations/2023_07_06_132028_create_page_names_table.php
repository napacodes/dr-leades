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
        Schema::create('page_names', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->unique();
            $table->enum('is_default', ['yes', 'no']);
            $table->enum('page_builder', ['yes', 'no']);
            $table->integer('segment_count')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_names');
    }
};

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
        Schema::create('fonts', function (Blueprint $table) {
            $table->id();
            $table->text('title_font_link')->nullable();
            $table->text('title_font_family')->nullable();
            $table->text('text_font_link')->nullable();
            $table->text('text_font_family')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonts');
    }
};

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
        Schema::create('color_options', function (Blueprint $table) {
            $table->id();
            $table->integer('color_option')->default(0);
            $table->string('main_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('scroll_button_color')->nullable();
            $table->string('bottom_button_color')->nullable();
            $table->string('bottom_button_hover_color')->nullable();
            $table->string('side_button_color')->nullable();
            $table->enum('type', ['default', 'customize'])->default('default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_options');
    }
};

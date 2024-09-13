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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->enum('style', ['style1'])->default('style1');
            $table->string('category_name');
            $table->integer('category_id');
            $table->enum('type', ['icon', 'image']);
            $table->string('icon')->nullable();
            $table->text('section_image')->nullable();
            $table->text('title');
            $table->text('short_description')->nullable();
            $table->text('career_slug');
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->text('button_name')->nullable();
            $table->text('button_url')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};

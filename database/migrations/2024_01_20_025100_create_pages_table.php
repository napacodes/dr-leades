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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('section_image')->nullable();
            $table->text('page_slug');
            $table->integer('order')->default(0);
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->enum('breadcrumb_status', ['yes', 'no'])->default('no');
            $table->text('custom_breadcrumb_image')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

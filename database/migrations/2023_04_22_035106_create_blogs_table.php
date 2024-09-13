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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('category_name');
            $table->integer('category_id');
            $table->string('author_name')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('section_image')->nullable();
            $table->text('section_image_2')->nullable();
            $table->enum('image_status', ['show', 'hide'])->default('show');
            $table->enum('type', ['with_this_account', 'anonymous']);
            $table->text('slug');
            $table->integer('view')->default(0);
            $table->integer('order')->default(0);
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->text('tag')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};

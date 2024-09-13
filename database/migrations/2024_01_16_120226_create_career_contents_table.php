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
        Schema::create('career_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('career_id');
            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
            $table->text('section_image')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('career_contents');
    }
};

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
        Schema::create('career_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->text('section_title')->nullable();
            $table->text('title')->nullable();
            $table->text('button_name')->nullable();
            $table->text('button_url')->nullable();
            $table->text('company_title')->nullable();
            $table->text('company_description')->nullable();
            $table->text('company_contact_title')->nullable();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('section_item')->default(6);
            $table->integer('paginate_item')->default(12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_sections');
    }
};

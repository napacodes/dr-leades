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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->text('name')->nullable();
            $table->text('tag')->nullable();
            $table->text('currency')->nullable();
            $table->text('price')->nullable();
            $table->text('extra_text')->nullable();
            $table->text('feature_list')->nullable();
            $table->text('non_feature_list')->nullable();
            $table->text('button_name')->nullable();
            $table->text('button_url')->nullable();
            $table->enum('recommended', ['yes', 'no'])->default('no');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};

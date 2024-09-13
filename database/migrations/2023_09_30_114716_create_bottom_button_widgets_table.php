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
        Schema::create('bottom_button_widgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('button_name')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status', ['enable', 'disable'])->default('enable');
            $table->string('button_name_2')->nullable();
            $table->string('whatsapp')->nullable();
            $table->enum('status_whatsapp', ['enable', 'disable'])->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bottom_button_widgets');
    }
};

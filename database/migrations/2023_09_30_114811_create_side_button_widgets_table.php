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
        Schema::create('side_button_widgets', function (Blueprint $table) {
            $table->id();
            $table->string('social_media');
            $table->string('link')->nullable();
            $table->enum('status', ['enable', 'disable'])->default('enable');
            $table->string('contact');
            $table->string('email_or_whatsapp')->nullable();
            $table->enum('status_whatsapp', ['enable', 'disable'])->default('enable');
            $table->string('phone')->nullable();
            $table->enum('status_phone', ['enable', 'disable'])->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('side_button_widgets');
    }
};

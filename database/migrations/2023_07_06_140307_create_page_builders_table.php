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
        Schema::create('page_builders', function (Blueprint $table) {
            $table->id();
            $table->string('page_uri')->unique();
            $table->string('page_name');
            $table->integer('page_name_id');
            $table->text('default_item')->nullable();
            $table->text('updated_item')->nullable();
            $table->text('breadcrumb_title')->nullable();
            $table->text('breadcrumb_item')->nullable();
            $table->enum('breadcrumb_status', ['yes', 'no'])->default('no');
            $table->text('custom_breadcrumb_image')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->integer('order')->default(0);
            $table->integer('segment_count')->default(1);
            $table->enum('is_default', ['yes', 'no'])->default('no');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_builders');
    }
};

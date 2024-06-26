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
            /** SEO FIELDS */
            $table->string('slug')->unique();
            $table->json('keyword')->nullable();
            $table->string('preview_image')->nullable();
            $table->string('description')->nullable();
            /** CONTENT FIELDS */
            $table->string('title');
            $table->foreignId('category_id')->nullable();
            $table->json('content');

            $table->boolean('is_published')->default(false);

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

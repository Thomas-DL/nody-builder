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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('site_name');
            $table->string('site_email');
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_description')->nullable();
            $table->string('site_default_preview_image')->nullable();

            $table->boolean('is_stripe_enabled')->default(false);
            $table->boolean('is_blog_enabled')->default(false);
            $table->boolean('is_page_builder_enabled')->default(false);
            $table->boolean('is_waitlist_enabled')->default(false);
            $table->boolean('can_user_create_account')->default(false);
            $table->boolean('can_user_post_comment')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

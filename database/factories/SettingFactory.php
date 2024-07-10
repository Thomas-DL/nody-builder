<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'site_name' => config('app.name'),
            'site_email' => config('mail.from.address'),
            'site_logo' => null,
            'site_favicon' => null,
            'site_description' => fake()->sentence(10),
            'site_default_preview_image' => null,
            'is_stripe_enabled' => false,
            'is_blog_enabled' => false,
            'is_page_builder_enabled' => false,
            'is_waitlist_enabled' => false,
            'can_user_create_account' => false,
            'can_user_post_comment' => false,
        ];
    }
}

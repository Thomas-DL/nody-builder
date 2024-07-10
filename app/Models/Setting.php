<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_email',
        'site_logo',
        'site_favicon',
        'site_description',
        'site_default_preview_image',
        'is_stripe_enabled',
        'is_blog_enabled',
        'is_page_builder_enabled',
        'is_waitlist_enabled',
        'can_user_create_account',
        'can_user_post_comment',
    ];

    protected function casts(): array
    {
        return [
            'is_stripe_enabled' => 'boolean',
            'is_blog_enabled' => 'boolean',
            'is_page_builder_enabled' => 'boolean',
            'is_waitlist_enabled' => 'boolean',
            'can_user_create_account' => 'boolean',
            'can_user_post_comment' => 'boolean',
        ];
    }
}

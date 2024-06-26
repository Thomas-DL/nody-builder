<?php

namespace App\Models;

use Countable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug',
        'keyword',
        'preview_image',
        'description',
        'title',
        'category_id',
        'content',
        'is_published',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'keyword' => 'array',
            'content' => 'array',
            'is_published' => 'boolean',
        ];
    }

    /**
     * Get the category that owns the page.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PageCategory::class);
    }
}

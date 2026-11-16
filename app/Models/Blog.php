<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'excerpt',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean',
    ];

    // Auto-generate slug & excerpt saat create
    protected static function booted(): void
    {
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title) . '-' . time();
            }
            if (empty($blog->excerpt)) {
                $blog->excerpt = Str::limit(strip_tags($blog->content), 150);
            }
        });
    }

    // URL pakai slug, bukan id
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
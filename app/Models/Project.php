<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'tagline',
        'description',
        'thumbnail',
        'category',
        'github_url',
        'website_url',
        'technologies',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'technologies' => 'array',
        'is_featured' => 'boolean',
    ];
}

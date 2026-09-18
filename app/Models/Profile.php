<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'tagline',
        'bio',
        'short_bio',
        'avatar',
        'location',
        'email',
        'phone',
        'github_url',
        'linkedin_url',
        'website_url',
        'twitter_url',
        'resume_url',
        'availability_status',
        'years_of_experience',
    ];
}

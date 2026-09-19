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
        'title_id',
        'tagline',
        'tagline_id',
        'bio',
        'bio_id',
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

    /**
     * Get the translated attribute based on the active locale.
     */
    public function trans(string $field): mixed
    {
        $locale = app()->getLocale();
        if ($locale === 'id' && !empty($this->{$field . '_id'})) {
            return $this->{$field . '_id'};
        }
        return $this->{$field};
    }
}

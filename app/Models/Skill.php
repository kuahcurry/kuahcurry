<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'name_id',
        'type', // 'technical' or 'soft'
        'category',
        'proficiency',
        'description',
        'description_id',
        'icon',
        'sort_order',
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

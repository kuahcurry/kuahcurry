<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'institution',
        'degree',
        'field_of_study',
        'start_year',
        'end_year',
        'grade',
        'description',
        'achievements',
        'sort_order',
    ];

    protected $casts = [
        'achievements' => 'array',
    ];
}

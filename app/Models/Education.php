<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'educations';
    protected $fillable = [
        'institution_name',
        'field_of_study',
        'start_date',
        'end_date',
        'education_logo',
    ];

    protected $casts = [
        'start_date' => 'date:Y-m',
        'end_date' => 'date:Y-m',
    ];
}

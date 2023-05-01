<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'start_date', 'end_date', 'paragraph'];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}

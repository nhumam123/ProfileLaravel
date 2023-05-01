<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profile_image_path',
        'summary',
        'expertise',
        'email',
        'birthday',
        'contact_number',
    ];
}

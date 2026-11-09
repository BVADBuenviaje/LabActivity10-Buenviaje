<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // LABEL: Models
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'email',
    ];
}

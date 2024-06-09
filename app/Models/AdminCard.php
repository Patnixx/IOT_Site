<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'route',
    ];
}

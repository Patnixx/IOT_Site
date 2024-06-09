<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{ //NOTE - This model is done
    use HasFactory;

    protected $fillable = [
        'class_num',
        'status',
        'teacher',
        'time',
    ];
}

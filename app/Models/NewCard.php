<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCard extends Model
{ //REVIEW - This model is being considered
    use HasFactory;

    protected $fillable = [
        'rfid'
    ];
}

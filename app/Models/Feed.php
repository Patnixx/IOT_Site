<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{ //NOTE - This model is done
    use HasFactory;

    protected $fillable = [
        'class_num',
        'user_id',
        'interaction',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

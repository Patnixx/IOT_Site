<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{ //NOTE - This model is done
    use HasFactory;

    protected $fillable = [
        'rfid',
        'owner_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $fillable = [
        'room_id',
        'sender',
        'seen',
        'text',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'sender');
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

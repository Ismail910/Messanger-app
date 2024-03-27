<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'is_group',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class , 'room_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'last_seen' => 'date:d-F-Y'
    // ];

    public function room()
    {
        return $this->belongsTo(RoomTypes::class, 'room_id');
    }
}

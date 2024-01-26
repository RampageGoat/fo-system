<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['room', 'customers'];

    public function room()
    {
        return $this->belongsTo(RoomTypes::class, 'room_id');
    }
    
    public function customers()
    {
        return $this->belongsTo(Customers::class);
    }


}

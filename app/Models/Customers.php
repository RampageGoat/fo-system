<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['keyword'] ?? false, function($query, $keyword){
            return $query->where('name', 'like', '%' . $keyword . '%')
                         ->orWhere('nik', 'like', '%' . $keyword . '%');
        });
    }
}

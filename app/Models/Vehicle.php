<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'vehicle_name',
        'vehicle_number',
        'vehicle_type',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    
    public function order()
    {
        return $this->hasMany(Order::class, 'vehicle_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'driver_name',
        'driver_phone',
        'driver_address',
        'driver_age',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'driver_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Vehicle extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'model',
        'brand',
        'year',
        'category',
        'driver_id',
        'price'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

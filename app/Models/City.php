<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'slug'
    ];

    /**
     * Get all of the boardingHouses for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boardingHouses(): HasMany
    {
        return $this->hasMany(BoardingHouse::class, 'city_id', 'id');
    }
}

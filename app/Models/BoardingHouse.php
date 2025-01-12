<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardingHouse extends Model
{
    /** @use HasFactory<\Database\Factories\BoardingHouseFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'city_id',
        'category_id',
        'description',
        'price',
        'address'
    ];

    /**
     * Get the city that owns the BoardingHouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /**
     * Get the category that owns the BoardingHouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get all of the rooms for the BoardingHouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'boarding_house_id', 'id');
    }

    /**
     * Get all of the bonuses for the BoardingHouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonuses(): HasMany
    {
        return $this->hasMany(Bonus::class, 'boarding_house_id', 'id');
    }

    /**
     * Get all of the testimonials for the BoardingHouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class, 'boarding_house_id', 'id');
    }

    /**
     * Get all of the transactions for the BoardingHouse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'boarding_house_id', 'id');
    }
}

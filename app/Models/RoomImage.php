<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomImage extends Model
{
    /** @use HasFactory<\Database\Factories\RoomImageFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'room_id',
        'image'
    ];

    /**
     * Get the room that owns the RoomImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}

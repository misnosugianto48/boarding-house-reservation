<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'boarding_house_id',
        'room_id',
        'name',
        'email',
        'phone_number',
        'payment_method',
        'payment_status',
        'start_date',
        'duration',
        'total_amount',
        'transaction_date'
    ];

    /**
     * Get the boardingHouse that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function boardingHouse(): BelongsTo
    {
        return $this->belongsTo(BoardingHouse::class, 'boarding_house_id', 'id');
    }

    /**
     * Get the room that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryTransition extends Model
{
    protected $fillable = [
        'date',
        'amount',
        'description',
        'from_wallet_id',
        'to_wallet_id',
    ];

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'from_wallet_id');
    }

//    public function toWallet(): BelongsTo
//    {
//        return $this->belongsTo(Wallet::class, 'to_wallet_id');
//    }
}

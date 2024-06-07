<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallet extends Model
{
    protected $fillable = [
        'balance',
        'user_id',
        'coin_crypto_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coinCrypto(): BelongsTo
    {
        return $this->belongsTo(CoinCrypto::class);
    }

    public function historyTransitions(): HasMany
    {
        return $this->hasMany(HistoryTransition::class, 'from_wallet_id');
    }
}

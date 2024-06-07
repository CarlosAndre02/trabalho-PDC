<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CoinCrypto extends Model
{
    public function wallet(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }
}

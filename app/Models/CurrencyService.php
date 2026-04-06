<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyService extends Model
{
    const Rates = [
        'usd' => [
            'eur' => 0.98
        ]
    ];

    public function convert(float $amount, string $currencyFrom, string $currencyTo)
    {
        $rate = self::Rates[$currencyFrom][$currencyTo] ?? 0;

        return round($amount * $rate, 2);
    }
}

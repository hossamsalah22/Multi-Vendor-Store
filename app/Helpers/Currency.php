<?php

namespace App\Helpers;

use NumberFormatter;

class Currency
{
    public static function format($number, $currency = 'EGP')
    {
        $baseCurrency = config('app.currency_code');
        $formatter = new NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);

        if ($currency != $baseCurrency) {
            $rate = session('currency_rate_' . $currency, 1);
            $number = $number * $rate;
        }
        return $formatter->formatCurrency($number, $currency);
    }
}

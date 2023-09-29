<?php

namespace App\Helpers;

use NumberFormatter;

class Currency
{
    public static function format($number, $currency = 'EGP')
    {
        $formatter = new NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($number, $currency);
    }
}

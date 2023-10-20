<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\CurrencyConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CurrencyConverterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'currency_code' => 'required|string|size:3',
        ]);

        $currencyCode = $request->currency_code;
        $baseCurrencyCode = config('app.currency_code');
        $cacheKey = "currency_rate_" . $currencyCode;
        $rate = Cache::get($cacheKey, 0);
        if ($rate) {
            $converter = app('currency_converter');
            $rate = $converter->convert($baseCurrencyCode, $currencyCode);
            Cache::put($cacheKey, $rate, now()->addHours(24));
        }

        Session::put('currency_code', $currencyCode);

        return redirect()->back();
    }
}

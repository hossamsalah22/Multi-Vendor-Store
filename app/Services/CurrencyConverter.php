<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyConverter
{
    protected $api_key;
    protected $base_url = 'https://free.currconv.com/api/v7';

    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;
    }

    public function convert($from, $to, $amount = 1)
    {
        $q = "{$from}_{$to}";
        $response = Http::baseUrl($this->base_url)
            ->get('/convert', [
                'q' => $q,
                'compact' => 'ultra',
                'apiKey' => $this->api_key,
            ])
            ->json();
        return $response[$q] * $amount;
    }
}

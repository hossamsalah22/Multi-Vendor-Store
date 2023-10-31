<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Order $order)
    {
        return view('website.payment.create', compact('order'));
    }

    public function createStripePaymentIntent(Order $order)
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $order->total,
            'currency' => 'usd',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);
        return [
            'clientSecret' => $paymentIntent->client_secret,
        ];
    }

    public function confirm(Request $request, Order $order)
    {
        dd($request->all());
    }
}

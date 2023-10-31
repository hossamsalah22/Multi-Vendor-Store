<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;

class MyFatoorahController extends Controller
{

    public $mfObj;

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * create MyFatoorah object
     */
    public function __construct()
    {
        $this->mfObj = new PaymentMyfatoorahApiV2(config('myfatoorah.api_key'), config('myfatoorah.country_iso'), config('myfatoorah.test_mode'));
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Create MyFatoorah invoice
     *
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function index()
    {
        try {
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode
            $orderId = request('orderId');
            $payment = Payment::where('order_id', $orderId)->first();
            $curlData = $this->getPayLoadData($orderId);
            $data = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        if ($payment && $payment->status == 'succeeded')
            return redirect()->route('website.home')->with('success', 'Invoice all ready paid.');

        return redirect($data['invoiceURL']);
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     *
     * @param int|string $orderId
     * @return RedirectResponse | array
     */
    private function getPayLoadData(int|string $orderId): array|RedirectResponse
    {
        $callbackURL = route('website.myfatoorah.callback');
        $order = Order::find($orderId);
        return [
            'CustomerName' => $order->user->name,
            'InvoiceValue' => $order->total,
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail' => $order->shippingAddress->email,
            'CallBackUrl' => $callbackURL,
            'ErrorUrl' => $callbackURL,
            'MobileCountryCode' => '+2',
            'CustomerMobile' => $order->shippingAddress->phone_number,
            'Language' => app()->getLocale(),
            'CustomerReference' => $orderId,
            'SourceInfo' => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION
        ];
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Get MyFatoorah payment information
     *
     * @return RedirectResponse
     */
    public function callback(): RedirectResponse
    {
        try {
            $paymentId = request('paymentId');
            $data = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');
            $order = Order::find($data->CustomerReference);
            $payment = Payment::where('order_id', $order->id)->first();
            if (!$payment) {
                $payment = Payment::create([
                    'order_id' => $order->id,
                    'amount' => $order->total,
                    'currency' => 'KWD',
                    'method' => 'myfatoorah',
                    'payment_id' => $paymentId,
                    'data' => json_encode($data),
                ]);
            }
            if ($data->InvoiceStatus == 'Paid') {
                $order->update([
                    'payment_status' => 'paid',
                    'payment_method' => 'myfatoorah',
                ]);
                $payment->update(['status' => 'succeeded']);
                $msg = 'Invoice is paid successfully.';
            } else if ($data->InvoiceStatus == 'Failed') {
                $payment->update(['status' => 'failed']);
                $msg = 'Invoice is not paid due to ' . $data->InvoiceError;
            } else if ($data->InvoiceStatus == 'Expired') {
                $msg = 'Invoice is expired.';
            }
            $response = ['IsSuccess' => 'true', 'Message' => $msg, 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }

//        return redirect($data->invoiceURL);
        return redirect()->route('website.home')->with('success', $response['Message']);
    }


//-----------------------------------------------------------------------------------------------------------------------------------------
}

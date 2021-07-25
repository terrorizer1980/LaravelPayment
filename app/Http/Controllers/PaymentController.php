<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Services\PayPalService;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function pay(PaymentStoreRequest $request)
    {       
        return resolve(PayPalService::class)->handlePayment($request->validated());    
    }
    
    public function approval()
    {
        return resolve(PayPalService::class)->handleApproval();
    }
    
    public function cancel()
    {
        return redirect()
                ->route('home')
                ->withErrors('You cancelled the payment');
    }
}

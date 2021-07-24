<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function pay(PaymentStoreRequest $request)
    {
        $validated = $request->validated();
        dd($validated);
    }
    
    public function approval(PaymentStoreRequest $request)
    {
//        $validated = $request->validated();
    }
    
    public function cancel(PaymentStoreRequest $request)
    {
//        $validated = $request->validated();
    }
}

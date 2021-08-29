<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use App\Contracts\PaymentService;
use Str;

class StripeService implements PaymentService
{
    use ConsumesExternalServices;
    
    protected $baseURI;
    protected $key;
    protected $secret;
    
    public function __construct()
    {
        $this->baseURI = config('services.stripe.base_uri');
        $this->key = config('services.stripe.key');
        $this->secret = config('services.stripe.secret');
    }
    
    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        //
    }
    
    public function decodeResponse($response)
    {
        return json_decode($response);
    }
    
    public function resolveAccessToken()
    {
        //
    }

    public function handlePayment(array $validated)
    {
        //
    }

    public function handleApproval()
    {
        //
    }
    
    public function resolveFactor($currency)
    {
        $zeroDecimalCurrencies = ['jpy'];
        
        if (in_array($currency, $zeroDecimalCurrencies)) {
            return 1;
        }
        
        return 100;
    }
}

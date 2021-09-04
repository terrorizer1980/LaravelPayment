<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use App\Contracts\PaymentService;
use Stripe\PaymentIntent;
use Stripe\Stripe;
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
    
    public function handlePayment(array $validated)
    {
        //
    }

    public function handleApproval()
    {
        //
    }

    protected function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    protected function decodeResponse($response)
    {
        return json_decode($response);
    }

    protected function resolveAccessToken()
    {
        return "Bearer {$this->secret}";
    }

    protected function createIntent($value, $currency, $paymentMethod )
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        return PaymentIntent::create([
            'amount' => $value * $this->resolveFactor($currency),
            'currency' => Str::lower($currency),
            'payment_method' => $paymentMethod,
            'confirmation_method' => 'manual',
            'payment_method_types' => ['card'],
        ]);
    }

    protected function resolveFactor($currency)
    {
        $zeroDecimalCurrencies = ['jpy'];
        
        if (in_array($currency, $zeroDecimalCurrencies)) {
            return 1;
        }
        
        return 100;
    }
}

<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class PayPalService
{
    use ConsumesExternalServices;
    
    protected $baseURI;
    protected $clientID;
    protected $clientSecret;
    
    public function __construct()
    {
        $this->baseURI = config('services.paypal.base_uri');
        $this->clientID = config('services.paypal.client_id');
        $this->clientSecret = config('services.paypal.client_secret');
    }
    
    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Authorization'] = $this->resolveAccessToken();
    }
    
    public function decodeResponse($response)
    {
        return json_decode($response);
    }
    
    public function resolveAccessToken()
    {
        $credentials = base64_encode("{$this->clientID}:{$this->clientSecret}");

        return "Basic {$credentials}";
    }
}

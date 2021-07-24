<?php

use App\Traits\ConsumesExternalService;

class PayPalService
{
    use ConsumesExternalService;
    
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
        //
    }
    
    public function decodeResponse($response)
    {
        //
    }
}

<?php

namespace App\Resolvers;

use App\Contracts\PaymentPlatformResolver as IPaymentPlatformResolver;
use App\Models\PaymentPlatform;
use Str;

class PaymentPlatformResolver implements IPaymentPlatformResolver
{
    protected $paymentPlatforms;
    
    public function __construct()
    {
        $this->paymentPlatforms = PaymentPlatform::all();
    }
    
    public function resolveService($paymentPlatformId)
    {
        $name = Str::lower($this->paymentPlatforms->firstWhere('id', $paymentPlatformId)->name);
        $service = config("services.{$name}.class");
        
        if ($service) {
            return resolve($service);
        }
        
        throw new \Exception('The selected platform is not in the configuration.');
    }
}

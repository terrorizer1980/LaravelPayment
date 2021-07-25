<?php

namespace App\Contracts;

interface PaymentPlatformResolver
{
    public function resolveService($paymentPlatformId);
}

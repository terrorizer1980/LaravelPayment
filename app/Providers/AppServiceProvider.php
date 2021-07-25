<?php

namespace App\Providers;

use App\Contracts;
use App\Resolvers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        Contracts\PaymentPlatformResolver::class => Resolvers\PaymentPlatformResolver::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

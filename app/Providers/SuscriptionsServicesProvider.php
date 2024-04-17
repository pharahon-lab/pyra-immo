<?php

namespace App\Providers;

use App\Services\AbonnementServices;
use App\Services\PassServices;
use App\Services\TransactionServices;
use Illuminate\Support\ServiceProvider;

class SuscriptionsServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AbonnementServices::class, function($app){
            return new AbonnementServices();
        });
        $this->app->singleton(TransactionServices::class, function($app){
            return new TransactionServices();
        });
        $this->app->singleton(PassServices::class, function($app){
            return new PassServices();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

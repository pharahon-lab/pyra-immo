<?php

namespace App\Providers;

use App\Services\FascadeServices;
use App\Services\FinanceServices;
use App\Services\PlaceServices;
use Illuminate\Support\ServiceProvider;

class PlacesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
        $this->app->singleton(FascadeServices::class, function($app){
            return new FascadeServices();
        });
        
        $this->app->singleton(PlaceServices::class, function($app){
            return new PlaceServices();
        });
        
        $this->app->singleton(FinanceServices::class, function($app){
            return new FinanceServices();
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

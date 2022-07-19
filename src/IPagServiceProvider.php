<?php

namespace Nozap\IPag;

use Illuminate\Support\ServiceProvider;
use Nozap\IPag\Contracts\IPagInterface;
use Nozap\IPag\Services\IPagBaseClient;

class IPagServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IPagInterface::class, function () {
            return new IPagBaseClient();
        });
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

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
            return new IPagBaseClient(
                config('ipag.endpoint'),
                config('ipag.username'),
                config('ipag.password')
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/ipag.php' => config_path('ipag.php')
        ]);
    }
}

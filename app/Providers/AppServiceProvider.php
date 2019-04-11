<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Repositories\AccountRepositoryInterface',
            'App\Repositories\AccountRepository'
        );
        $this->app->bind(
            'App\Contracts\Repositories\ProductRepositoryInterface',
            'App\Repositories\ProductRepository'
        );
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

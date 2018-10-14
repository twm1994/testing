<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.sidebar', function($view) {
            //
            $view->with('archives', \App\Post::archives());
        });
        // \view()->composer('name', function($view) {
        //     //
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // \App::bind('App\Billing\Stripe', function(){
        //     return new \App\Billing\Stripe(config('services.stripe.secret'));
        // });
        $this->app->singleton('App\Billing\Stripe', function(){
            return new \App\Billing\Stripe(config('services.stripe.secret'));
        });
    }
}

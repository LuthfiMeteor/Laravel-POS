<?php

namespace App\Providers;

use App\Models\Setting;
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
        view()->composer('layouts.navbars.auth.sidebar', function ($view) {
            $view->with('setting', Setting::first());
        });
        view()->composer('layouts.navbar.guest', function ($view) {
            $view->with('setting', Setting::first());
        });
        view()->composer('layouts.user_type', function ($view) {
            $view->with('setting', Setting::first());
        });
        view()->composer('layouts.app', function ($view) {
            $view->with('setting', Setting::first());
        });
        view()->composer('dashboard', function ($view) {
            $view->with('setting', Setting::first());
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

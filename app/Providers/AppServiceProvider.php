<?php

namespace English\Providers;

use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if(env('APP_ENV') == 'production') {
            \URL::forceScheme('https');
        }
        Validator::extend('password_hash_check', function ($attributes, $value, $parameters, $validator) {
            return Hash::check($value, $parameters[0]);
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}

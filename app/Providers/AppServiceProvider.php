<?php

namespace English\Providers;

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
        if (env('APP_ENV') === 'production') {
            \URL::forceScheme('https');
        }
        \Validator::extend('password_hash_check', function ($attributes, $value, $parameters, $validator) {
            return Hash::check($value, $parameters[0]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Notifications', \English\Facades\Notifications::class);
        $this->app->singleton('NotificationService', function ($app) {
            return app(\English\Services\NotificationService::class);
        });
    }
}

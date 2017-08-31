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
        //
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

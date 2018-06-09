<?php

namespace English\Providers;

use English\Tag;
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
        // Aliasing Components subdirectory
        // See https://laravel.com/docs/5.6/blade#components-and-slots
        \Blade::component('components.segment', 'segment');
        \View::composer('*', function ($view) {
            $view->with('tags', Tag::all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Blade::directive('render', function ($component) {
            return "<?php echo (app($component))->toHtml(); ?>";
        });
    }
}

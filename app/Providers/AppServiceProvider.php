<?php

namespace App\Providers;

use App\Services\LocationService;
use App\View\Components\ContentContainer;
use App\View\Components\IconLongButton;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LocationService::class, function ($app) {
            return new LocationService();
        });

        $this->app->singleton(DocumentsGeneratorService::class, function ($app) {
            return new DocumentsGeneratorService(
                $app->make(LocationService::class)
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
        // Typography
        Blade::component('components.typography.headline', 'headline');
        Blade::component('components.typography.title', 'title');
        Blade::component('components.typography.subtitle', 'subtitle');
        Blade::component('components.typography.body', 'body');
        Blade::component('components.typography.caption', 'caption');
        Blade::component('components.typography.timestamp', 'timestamp');

        Validator::extend('alpha_spaces', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[\pL\s]+$/u', $value);
        });
    
        Validator::replacer('alpha_spaces', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ':attribute must only contain letters and spaces.');
        });
    }
}

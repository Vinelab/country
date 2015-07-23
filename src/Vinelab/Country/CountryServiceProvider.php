<?php

namespace Vinelab\Country;

use Illuminate\Support\ServiceProvider;

class CountryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->package('vinelab/country');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('vinelab.country', function () {
            return new Guide($this->app['config']);
        });

        $this->app->booting(function () {

            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Country', 'Vinelab\Country\Facades\Guide');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}

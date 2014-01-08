<?php namespace Tesco;

use Illuminate\Support\ServiceProvider;

class TescoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->package('tesco', 'tesco');
    }

    public function register()
    {
        $this->app['tesco'] = $this->app->share(function($app)
        {
            $tesco = new Tesco($app['config']['tesco.devKey'], $app['config']['tesco.appKey']);

            return $tesco;
        });
    }
}
<?php
namespace StudentAffairsUwm\Shibboleth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Route;

class ShibalikeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/shibalike', 'shibalike');

        $this->publishes([
            __DIR__ . '/../../resources/views/shibalike/' => resource_path('views/vendor/shibalike'),
        ]);

        $this->loadRoutesFrom(__DIR__ . '/../../routes/shibalike.php');
    }
}

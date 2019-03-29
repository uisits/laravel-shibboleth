<?php
namespace StudentAffairsUwm\Shibboleth\Tests\Stubs;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(realpath(__DIR__ . '/../../../src/database/migrations'));
    }
}

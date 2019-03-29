<?php
namespace StudentAffairsUwm\Shibboleth\Tests\Stubs;

use StudentAffairsUwm\Shibboleth\ShibbolethServiceProvider;

trait Setup
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $_SERVER['isMemberOf'] = 'urn:mace:dir:entitlement:common-lib-terms;urn:mace:uark.edu:ADGroups:Computing Services:Something:Somesuch-WCOB;urn:mace:uark.edu:ADGroups:Walton College:Security Groups:Old Security Groups:WCOB-TechCenter;urn:mace:uark.edu:ADGroups:Exchange Resource Units:UITS (University IT Services):UITS: TechPartners;urn:mace:uark.edu:ADGroups:Walton College:Security Groups:WCOB-Intranet;urn:mace:uark.edu:ADGroups:walton:Groups:linux02_sudoers;urn:mace:uark.edu:ADGroups:Walton College:Security Groups:WCOB-Users;urn:mace:uark.edu:ADGroups:Exchange Resource Units:WCOB (Walton College):WCOB: Conference Team';

        $_SERVER['mail'] = 'user@example.org';
        $_SERVER['cn'] = 'user';
        $_SERVER['givenName'] = 'User';
        $_SERVER['sn'] = 'Test';
        $_SERVER['emplId'] = '100000001';

        parent::setUp();

        $this->artisan('migrate:refresh');
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('shibboleth', require __DIR__ . '/../../../src/config/shibboleth.php');

        $app['config']->set('auth', [
            'defaults' => [
                'guard' => 'web',
                'passwords' => 'users',
            ],
            'guards' => [
                'web' => [
                    'driver' => 'session',
                    'provider' => 'users',
                ],

                'api' => [
                    'driver' => 'token',
                    'provider' => 'users',
                ],
            ],
            'providers' => [
                'users' => [
                    'driver' => 'shibboleth',
                    'model' => \App\User::class,
                ],
            ],
        ]);

        $app['config']->set('database.default', env('DB_CONNECTION', 'sqlite'));

        $app['config']->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'travis'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);

        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
            ShibbolethServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.  In a normal app environment these would be added to
     * the 'aliases' array in the config/app.php file.  If your package exposes an
     * aliased facade, you should add the alias here, along with aliases for
     * facades upon which your package depends, e.g. Cartalyst/Sentry.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            //'Sentry'      => 'Cartalyst\Sentry\Facades\Laravel\Sentry',
            //'YourPackage' => 'YourProject\YourPackage\Facades\YourPackage',
        ];
    }
}

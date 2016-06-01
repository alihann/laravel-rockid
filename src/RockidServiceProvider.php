<?php

namespace Alihann\LaravelRockid;

use Illuminate\Support\ServiceProvider;
use Alihann\LaravelRockid\Commands\RockidGenerateCommand;

/**
 * Class RockidServiceProvider
 *
 * @author Ali Han <le3han@gmail.com>
 */
class RockidServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/rockid.php' => config_path('rockid.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rockid.php', 'rockid');

        $this->registerCommand();
        $this->registerService();
    }

    /**
     * Register the command class.
     *
     * @return void
     */
    protected function registerCommand()
    {
        $this->app->singleton('rockid.generate', function (){
            return new RockidGenerateCommand();
        });
        $this->commands('rockid.generate');
    }

    /**
     * Register the service class.
     *
     * @return void
     */
    protected function registerService()
    {
        $this->app->singleton('rockid', function () {
            return new Rockid();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'rockid',
            'rockid.generate'
        ];
    }

}

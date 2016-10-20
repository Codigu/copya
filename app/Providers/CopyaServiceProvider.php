<?php

namespace Copya\Providers;

use Copya\Console\CopyaMigration;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Copya\Console\CopyaInstallCommand;
use Laravel\Passport\Passport;
use Cviebrock\EloquentSluggable\ServiceProvider as SluggableService;


class CopyaServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Publish config files
        $this->publishes([
            __DIR__.'/../Config/copya.php' => config_path('copya.php'),
        ], 'copya-config');

        //publish resources

        $this->publishes([
            __DIR__.'/../../resources/assets/js' => base_path('resources/assets/js'),
            __DIR__.'/../../resources/assets/img' => base_path('public/assets/copya/img'),
            __DIR__.'/../../resources/assets/fonts' => base_path('public/assets/copya/fonts'),
            __DIR__.'/../../resources/assets/sass' => base_path('resources/assets/copya/sass'),
            __DIR__.'/../../resources/views' => base_path('resources/views/vendor'),
        ], 'copya-components');

        $this->publishes([
            __DIR__.'/../../resources/views' => base_path('resources/views/vendor'),
        ], 'copya-views');

        $this->publishes([
            __DIR__.'/../../resources/assets/js' => base_path('resources/assets/js'),
        ], 'copya-scripts');

        /*$this->app->booted(function () {

        });*/
        $this->defineRoutes();


        Passport::routes();
        //$this->defineResources();
    }

    /**
     * Define the Spark routes.
     *
     * @return void
     */
    protected function defineRoutes()
    {
        if (! $this->app->routesAreCached()) {
            $router = app('router');

            $router->group(['namespace' => 'Copya\Http\Controllers'], function ($router) {

                require __DIR__.'/../routes/console.php';
                require __DIR__.'/../routes/web.php';
            });

            $this->mapApiRoutes();


        }
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => 'Copya\Http\Controllers\API',
            'prefix' => 'api',
        ], function ($router) {
            require __DIR__.'/../routes/api.php';
        });
    }

    public function register()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([CopyaInstallCommand::class, CopyaMigration::class]);
        }

        $this->app->register('Laravel\Passport\PassportServiceProvider');
        $this->app->register(SluggableService::class);

    }
}
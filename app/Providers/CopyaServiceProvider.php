<?php

namespace Copya\Providers;

use Copya\Console\CopyaMigration;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Copya\Console\CopyaInstallCommand;
use Laravel\Passport\Passport;


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
        ]);

        //publish resources

        $this->publishes([
            __DIR__.'/../../resources/assets/js' => base_path('resources/assets/js'),
            __DIR__.'/../../resources/assets/plugins' => base_path('public/plugins'),
            __DIR__.'/../../resources/assets/img' => base_path('public/assets/copya/img'),
            __DIR__.'/../../resources/assets/fonts' => base_path('public/assets/copya/fonts'),
            __DIR__.'/../../resources/assets/pages' => base_path('public/assets/copya/js'),
            __DIR__.'/../../resources/assets/sass' => base_path('resources/assets/copya/sass'),
            __DIR__.'/../../resources/views' => base_path('resources/views'),
        ], 'copya-components');

        $this->publishes([
            __DIR__.'/../../resources/views' => base_path('resources/views'),
        ], 'copya-views');

        $this->publishes([
            __DIR__.'/../../resources/assets/js' => base_path('resources/assets/js'),
        ], 'copya-vue');

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
            $this->createModels();


            $this->app->register('Laravel\Passport\PassportServiceProvider');
        }
    }

    /**
     * Craete Necessary Model Classes
     */

    protected function createModels()
    {

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
        /*if (! defined('SPARK_PATH')) {
            define('SPARK_PATH', realpath(__DIR__.'/../../'));
        }
        if (! class_exists('Spark')) {
            class_alias('Laravel\Spark\Spark', 'Spark');
        }*/

        if ($this->app->runningInConsole()) {
            $this->commands([CopyaInstallCommand::class, CopyaMigration::class]);
        }
    }

    /**
     * Define the resources used by Spark.
     *
     * @return void
     */
    /*protected function defineResources()
    {
        $this->loadViewsFrom(SPARK_PATH.'/resources/views', 'spark');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                SPARK_PATH.'/resources/views' => base_path('resources/views/vendor/spark'),
            ], 'spark-full');

            $this->publishes([
                SPARK_PATH.'/resources/views/emails' => base_path('resources/views/vendor/spark/emails'),
                SPARK_PATH.'/resources/views/welcome.blade.php' => base_path('resources/views/vendor/spark/welcome.blade.php'),
                SPARK_PATH.'/resources/views/nav/guest.blade.php' => base_path('resources/views/vendor/spark/nav/guest.blade.php'),
                SPARK_PATH.'/resources/views/common/footer.blade.php' => base_path('resources/views/vendor/spark/common/footer.blade.php'),
                SPARK_PATH.'/resources/views/nav/authenticated.blade.php' => base_path('resources/views/vendor/spark/nav/authenticated.blade.php'),
                SPARK_PATH.'/resources/views/settings/tabs/profile.blade.php' => base_path('resources/views/vendor/spark/settings/tabs/profile.blade.php'),
                SPARK_PATH.'/resources/views/settings/tabs/security.blade.php' => base_path('resources/views/vendor/spark/settings/tabs/security.blade.php'),
                SPARK_PATH.'/resources/views/settings/team/tabs/owner.blade.php' => base_path('resources/views/vendor/spark/settings/team/tabs/owner.blade.php'),
                SPARK_PATH.'/resources/views/auth/registration/simple/basics.blade.php' => base_path('resources/views/vendor/spark/auth/registration/simple/basics.blade.php'),
                SPARK_PATH.'/resources/views/auth/registration/subscription/basics.blade.php' => base_path('resources/views/vendor/spark/auth/registration/subscription/basics.blade.php'),
                SPARK_PATH.'/resources/views/settings/team/tabs/membership/modals/edit-team-member.blade.php' => base_path('resources/views/vendor/spark/settings/team/tabs/membership/modals/edit-team-member.blade.php'),
            ], 'spark-basics');
        }
    }*/

    /**
     * Register any application services.
     *
     * @return void
     */
    /*public function register()
    {
        if (! defined('SPARK_PATH')) {
            define('SPARK_PATH', realpath(__DIR__.'/../../'));
        }

        if (! class_exists('Spark')) {
            class_alias('Laravel\Spark\Spark', 'Spark');
        }

        config([
            'auth.password.email' => 'spark::emails.auth.password.email',
        ]);

        $this->defineServices();

        if ($this->app->runningInConsole()) {
            $this->commands([Install::class]);
        }
    }*/

    /**
     * Bind the Spark services into the container.
     *
     * @return void
     */
    /*protected function defineServices()
    {
        $services = [
            RegistrarContract::class => Registrar::class,
            InvoiceNotifier::class => EmailInvoiceNotifier::class,
            UserRepositoryContract::class => UserRepository::class,
            TeamRepositoryContract::class => TeamRepository::class,
        ];

        foreach ($services as $key => $value) {
            $this->app->bindIf($key, $value);
        }
    }*/
}
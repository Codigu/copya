<?php

namespace Copya\Providers;

use Copya\Console\CopyaMigration;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Copya\Console\CopyaInstallCommand;
use Laravel\Passport\Passport;
use Cviebrock\EloquentSluggable\ServiceProvider as SluggableService;
use Copya\Shortcodes\FormShortcode;
use Webwizo\Shortcodes\Facades\Shortcode;


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
            __DIR__.'/../../resources/assets/img' => base_path('public/assets/copya/img'),
            __DIR__.'/../../resources/assets/fonts' => base_path('public/assets/copya/fonts'),
            __DIR__.'/../../resources/assets/sass' => base_path('resources/assets/copya/sass'),
            __DIR__.'/../../resources/views' => base_path('resources/views/vendor'),
        ], 'copya-components');

        $this->publishes([
            __DIR__.'/../../resources/views/auth' => base_path('resources/views/auth'),
            __DIR__.'/../../resources/assets/auth' => base_path('resources/assets/sass'),
        ], 'copya-auth');

        $this->publishes([
            __DIR__.'/../../resources/views' => base_path('resources/views/vendor'),
        ], 'copya-views');

        $this->publishes([
            __DIR__.'/../../resources/assets/js' => base_path('resources/assets/js'),
        ], 'copya-scripts');

        $this->publishes([
            __DIR__.'/../../resources/assets/js' => base_path('resources/assets/js'),
        ], 'copya-etc');

        /*$this->app->booted(function () {

        });*/

        Passport::routes();
    }



    public function register()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([CopyaInstallCommand::class, CopyaMigration::class]);
        }

        $this->app->register('Laravel\Passport\PassportServiceProvider');
        $this->app->register('Caffeinated\Menus\MenusServiceProvider');
        $this->app->register('Webwizo\Shortcodes\ShortcodesServiceProvider');
        $this->app->register('Kris\LaravelFormBuilder\FormBuilderServiceProvider');
        $this->app->register(SluggableService::class);

        /*
         * Register shortcodes
         */

        Shortcode::register('form', FormShortcode::class);
    }
}
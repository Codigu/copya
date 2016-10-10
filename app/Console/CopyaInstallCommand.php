<?php

namespace Copya\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\File;

class CopyaInstallCommand extends Command
{
    protected $signature = "copya:install {--force}";

    public function handle()
    {
        $this->setModels();
    }

    protected function setModels()
    {
        //(new Process('php artisan make:model Eloquent/\Page', base_path()))->setTimeout(null)->run();

        if(class_exists('App\Eloquent\Page') && !$this->option('force')){
            return false;
        }
        copy(__DIR__.'/stubs/model/Page.php', base_path('app/Eloquent/Page.php'));
        copy(__DIR__.'/stubs/model/Status.php', base_path('app/Eloquent/Status.php'));
        $this->line(PHP_EOL.'Copya Model Created');
    }

}
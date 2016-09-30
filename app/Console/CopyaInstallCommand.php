<?php

namespace Copya\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class CopyaInstallCommand extends Command
{
    protected $signature = "copya:install";

    public function handle()
    {
        $this->setModels();
    }

    protected function setModels()
    {
        (new Process('php artisan make:model Eloquent/\Page', base_path()))->setTimeout(null)->run();
        $this->line(PHP_EOL.'Pages Model Created');
    }

}
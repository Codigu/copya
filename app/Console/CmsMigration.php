<?php

namespace Copya\Console;

use Illuminate\Console\Command;

class CmsMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a migration for cms.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->makeMigration()) {
            $this->info('Created Migration: 2016_09_30_131452_create_cms_table.php');

            return;
        }
        $this->error('[InvalidArgumentException]');
        $this->error('A CreateCmsTable migration already exists.');

        return;
    }

    protected function makeMigration()
    {
        $path = substr(__DIR__, 0, -11) . "resources/database/CreateCmsTable.php";
        $migrationFile = base_path("/database/migrations") . "/2016_09_30_131452_create_cms_table.php";
        if (!file_exists($migrationFile) && $fs = fopen($migrationFile, 'x')) {
            fwrite($fs, file_get_contents($path));
            fclose($fs);

            return true;
        }

        return false;
    }
}

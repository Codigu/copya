<?php

namespace Copya\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class CopyaMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copya:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a migration for Copya.';

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
            $this->info('Migration successfully created!');

            return;
        }
        $this->error('[InvalidArgumentException]');
        $this->error('A CreateCmsTable migration already exists.');

        return;
    }

    protected function makeMigration()
    {
        $path = __DIR__ . "/stubs/migration/SetupCopyaTables.php";
        $migrationFile = base_path("/database/migrations") . "/".date('Y_m_d_His')."_setup_copya_tables.php";

        if(class_exists('SetupCopyaTables')){
            return false;
        }

        if (!file_exists($migrationFile) && $fs = fopen($migrationFile, 'x')) {
            fwrite($fs, file_get_contents($path));
            fclose($fs);

            return true;
        }

        return false;
    }


}

<?php

namespace Copya\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Exception;

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
        $copya_setup = __DIR__ . "/stubs/migration/SetupCopyaTables.php";
        $copyaSetupMigrationFile = base_path("/database/migrations") . "/" . date('Y_m_d_His') . "_setup_copya_tables.php";

        $form_setup = __DIR__ . "/stubs/migration/CopyaFormMigration.php";
        $copyaFormMigrationFile = base_path("/database/migrations") . "/" . date('Y_m_d_His') . "_copya_form_migration.php";

        $form_field_seeder = __DIR__ . "/stubs/seeder/FormFieldsSeeder.php";
        $copyaFormSeederFile = base_path("/database/seeds") . "/FormFieldsSeeder.php";

        try {
            if (!class_exists('SetupCopyaTables')) {
                if (!file_exists($copyaSetupMigrationFile) && $fs = fopen($copyaSetupMigrationFile, 'x')) {
                    fwrite($fs, file_get_contents($copya_setup));
                    fclose($fs);
                }
            }

            if (!class_exists('CopyaFormMigration')) {
                if (!file_exists($copyaFormMigrationFile) && $fs = fopen($copyaFormMigrationFile, 'x')) {
                    fwrite($fs, file_get_contents($form_setup));
                    fclose($fs);
                }
            }

            if (!class_exists('FormFieldsSeeder')) {
                if (!file_exists($copyaFormSeederFile) && $fs = fopen($copyaFormSeederFile, 'x')) {
                    fwrite($fs, file_get_contents($form_field_seeder));
                    fclose($fs);
                }
            }

        } catch (Exception $e) {
            return false;
        }

        return true;
    }


}

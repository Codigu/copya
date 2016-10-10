<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null($model = config('copya.models.status'))) {
            throw new RuntimeException('Unable to determine user model from configuration.');
        }

        $status = new $model;

        $
    }
}

<?php

use Illuminate\Database\Seeder;
use Copya\Eloquent\Field;

class FormFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['display_name' => 'Text'],
            ['display_name' => 'Email'],
            ['display_name' => 'Password'],
            ['display_name' => 'Hidden'],
            ['display_name' => 'Textarea'],
            ['display_name' => 'Number'],
            ['display_name' => 'File'],
            ['display_name' => 'Image'],
            ['display_name' => 'Url'],
            ['display_name' => 'Tel'],
            ['display_name' => 'Search'],
            ['display_name' => 'Color'],
            ['display_name' => 'Date'],
            ['display_name' => 'Datetime Local'],
            ['display_name' => 'Month'],
            ['display_name' => 'Range'],
            ['display_name' => 'Time'],
            ['display_name' => 'Week'],
            ['display_name' => 'Submit'],
            ['display_name' => 'Reset'],
            ['display_name' => 'Checkbox'],
            ['display_name' => 'Radio'],
            ['display_name' => 'Select'],
            ['display_name' => 'Choice'],
            ['display_name' => 'Choice'],
            ['display_name' => 'Repeated'],
            ['display_name' => 'Static'],
        );

        foreach($data as $field){
            $newField = new Field;
            $newField->display_name = $field['display_name'];
            $newField->save();
        }
    }
}

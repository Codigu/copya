<?php

namespace Copya\Forms;

use Kris\LaravelFormBuilder\Form;
use Copya\Eloquent\Form as CopyaEloquentForm;

class CopyaForm extends Form
{

    public function buildForm()
    {
        $form = CopyaEloquentForm::findBySlug($this->name);

        foreach($form->fields as $field){

            $this->add($field->display_name, $field->name, [
                'rules' => '',
            ]);
        }
    }
}
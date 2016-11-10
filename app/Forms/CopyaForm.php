<?php

namespace Copya\Forms;

use Kris\LaravelFormBuilder\Form;

class CopyaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'rules' => 'required|min:5'
            ])
            ->add('lyrics', 'textarea', [
                'rules' => 'max:5000'
            ])
            ->add('publish', 'checkbox');
    }
}
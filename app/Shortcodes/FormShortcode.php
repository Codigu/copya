<?php

namespace Copya\Shortcodes;

use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Contracts\Container\Container;


class FormShortcode {

    protected $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    public function register($shortcode, $content, $compiler, $name)
    {

        $form = $this->formBuilder->create(\Copya\Forms\CopyaForm::class, [
            'method' => 'POST',
            'name' => $shortcode->name,
        ]);

        return  $form->renderForm();

    }

}
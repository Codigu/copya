<?php

namespace Copya\Shortcodes;

class FormShortcode {

    public function register($shortcode, $content, $compiler, $name)
    {
        return sprintf('<strong class="%s">%s</strong>', $shortcode->class, $content);
    }

}
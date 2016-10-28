<?php


return [

    /*
     * default admin path
     */

    'admin_path' => 'admin',

    'models' => [
        'page' => Copya\Eloquent\Page::class,
        'navigation' => Copya\Eloquent\Navigation::class,
    ],

    'layouts' => 'resources/views/vendor/copya/layouts/frontend',
];
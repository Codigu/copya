<?php


return [

    /*
     * default admin path
     */

    'admin_path' => 'admin',

    /**
     *  A page slug to serve as url
     *
     */
    'base_page' => 'home',

    'models' => [
        'page' => Copya\Eloquent\Page::class,
        'navigation' => Copya\Eloquent\Navigation::class,
    ],

    'layouts' => 'resources/views/vendor/copya/layouts/frontend',
];
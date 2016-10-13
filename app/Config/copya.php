<?php


return [

    /*
     * default admin path
     */

    'admin_path' => 'admin',

    'models' => [
        'page' => Copya\Eloquent\Page::class,
        'status' => Copya\Eloquent\Status::class,
    ],

    'layouts' => 'resources/views/layout/frontend',
];
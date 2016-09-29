<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/* front end pages */
Route::get('/pages', function () {
    return "Return List of Pages";
});


Route::get('/page/{slug}', function () {
    return "Return List of Pages";
});


/* admin pages */

Route::group(['middleware' => ['web']], function ($router) {

    $router->get('/admin', function(){
        echo "admin here";
    });
});
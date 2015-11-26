<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

//Allow the view name to be used within the template
View::composer('*', function($view) {
    View::share('view_name', $view->getName());  
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'FixtureController@show');

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix'=>'api'],function()  use ($router){
    $router->group(['prefix'=>'queues'],function()  use ($router){
        $router->get('/', 'QueueController@index');
        $router->get('{key}', 'QueueController@show');
        $router->post('/', 'QueueController@store');
        $router->patch('/{id}/reset', 'QueueController@reset');
        $router->delete('/{id}', 'QueueController@destroy');
    });

    $router->group(['prefix'=>'items'],function()  use ($router){
        $router->get('/', 'QueueItemController@index');
        $router->get('{key}', 'QueueItemController@show');
        $router->post('/', 'QueueItemController@store');
    });

    $router->group(['prefix'=>'users'],function()  use ($router){
        $router->post('/', 'UserController@store');
        $router->patch('/{id}/reset', 'UserController@resetToken');
    });

});


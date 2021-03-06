<?php

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

$router->group([ 'prefix' => 'api' ], function () use ($router) {
    $router->group([ 'prefix' => 'products' ], function () use ($router) {
        $router->get('/', [ 'uses' => 'ProductController@readAll' ]);
        $router->get('/{id}', [ 'uses' => 'ProductController@readOne' ]);
    });

    $router->group([ 'prefix' => 'carts' ], function () use ($router) {
        $router->get('/{id}', [ 'uses' => 'CartController@readOne' ]);
        $router->get('/{id}/itemcount', [ 'uses' => 'CartController@getCount' ]);
        $router->post('/', [ 'uses' => 'CartController@create' ]);
        $router->put('/{id}', [ 'uses' => 'CartController@update' ]);
        $router->delete('/{id}', [ 'uses' => 'CartController@delete' ]);
    });

    $router->group([ 'prefix' => 'orders'], function () use ($router) {
        $router->post('/', [ 'uses' => 'OrderController@create' ]);
    });
});

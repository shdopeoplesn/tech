<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/event_list', Event_listController::class); //事件CRUD的路由
    $router->get('/event_list/{id}/process', 'Event_listController@process'); //完成處理事件的路由
    $router->resource('/user_list', User_listController::class); //使用者CRUD的路由
});

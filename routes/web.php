<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/application', 'AppController@applicate');
Route::post('/application_submit', 'AppController@submit');
Route::get('/receive_check', 'ReceiveController@receive_check');


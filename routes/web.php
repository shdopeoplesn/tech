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

//申請事件
Route::get('/application', 'AppController@applicate');
Route::post('/application_submit', 'AppController@submit');//申請事件的發送表單
//查看未領取的清單
Route::get('/receive_check', 'ReceiveController@receive_check');
//卡片發放頁面
Route::get('/receive_doublecheck/{id}', 'ReceiveController@receive_doublecheck');
//發放事件
Route::post('/receive_submit', 'ReceiveController@submit');

//資訊組登入畫面
Route::get('/login', 'LoginController@showloginpage');


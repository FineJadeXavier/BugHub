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
    return view('index.index');
});

//登录
Route::get('/login', 'LoginController@login')->name('login.login');
Route::post('/login', 'LoginController@post_login')->name('login.p_login');

//注册
Route::get('/register', 'LoginController@register')->name('login.register');
Route::post('/register', 'LoginController@p_register')->name('login.p_register');


//登录中间件
Route::middleware('login')->group(function(){

});
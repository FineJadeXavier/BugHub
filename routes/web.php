<?php

//首页
Route::get('/', function () { return view('index.index');});

//登录
Route::get('/login', 'LoginController@login')->name('login.login');
Route::post('/login', 'LoginController@post_login')->name('login.p_login');

//注册
Route::get('/register', 'LoginController@register')->name('login.register');
Route::post('/register', 'LoginController@p_register')->name('login.p_register');


//登录中间件
Route::middleware('login')->group(function(){

});
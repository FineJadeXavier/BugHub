<?php

Route::get('/', function () {
    return view('index.index');
});


Route::get('/content', function () {
    return view('content.index');
});

Route::get('/home', function () {
    return view('home.index');
});

//登录
Route::get('/signin', function () {
    return view('user.signin');
})->name('user.signin');
Route::post('/signin', 'UserController@signin')->name('user.signin.p');

//注册
Route::get('/signup', function () {
    return view('user.signup');
})->name('user.signup');
Route::post('/signup', 'UserController@signup')->name('user.signup.p');



//登录中间件
Route::middleware('signin')->group(function(){

    //编辑个人资料
    Route::get('/user/edit/', 'UserController@edit')->name('user.edit');


});
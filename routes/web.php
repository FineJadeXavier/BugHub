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
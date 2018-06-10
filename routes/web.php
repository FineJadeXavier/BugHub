<?php
use Illuminate\Support\Facades\Route;

//首页
Route::get('/', "TopicController@index")->name('index');
//搜索
Route::get('/search', "TopicController@search")->name('search');
//登录
Route::get('/signin', function () {return view('user.signin');})->name('user.signin');
Route::post('/signin', 'UserController@signin')->name('user.signin.p');
//注册
Route::get('/signup', function () {return view('user.signup');})->name('user.signup');
Route::post('/signup', 'UserController@signup')->name('user.signup.p');
//文章详情（内容页）
Route::get("/article/content/{id}", "TopicController@content")->name('article.content');

/*
 * 获取社区运行状况
 * 获取注册人数
 * 获取文章数
 */
Route::get('/api/members/get',"UserController@api");
Route::get('/api/articles/get',"TopicController@api");
//个人中心
Route::get("/user/home/{nickname}", "UserController@home")->name('user.home');

//登录中间件
Route::middleware('signin')->group(function(){



    //编辑个人资料
    Route::get('/user/edit',function () {return view('user.edit');} )->name('user.edit');
    Route::post('/user/edit_p','UserController@edit_pwd')->name('user.edit.pwd');
    Route::post('/user/edit_e','UserController@edit_email')->name('user.edit.email');

    //编辑文章
    Route::get('/article/edit',"TopicController@edit")->name('article.edit');
    Route::post('/article/edit',"TopicController@edit_post")->name('article.edit.post');

    //发布文章
    Route::get('/article/new',function () {return view('article.write');} )->name('article.new');
    Route::post('/article/new',"TopicController@write" )->name('article.new.post');

    //退出登录
    Route::get("signout",function(){ session()->flush() ; return redirect()->route('index'); })->name('signout');


});
<?php
use Illuminate\Support\Facades\Route;
use App\Models\Article;

//测试
Route::get('/test', function () { echo phpinfo(); });

/*
 *@title 全文分词搜索
 *
 *@methods 生成索引
 *         php artisan scout:import "App\Models\Article"
 */
Route::get('/search', function () {
    dump(Article::search('php')->get()->toArray());
    //    $first = Article::find(1);
});

//首页
Route::get('/', function () { return view('index.index');})->name('index');

//登录
Route::get('/signin', function () {return view('user.signin');})->name('user.signin');
Route::post('/signin', 'UserController@signin')->name('user.signin.p');

//注册
Route::get('/signup', function () {return view('user.signup');})->name('user.signup');
Route::post('/signup', 'UserController@signup')->name('user.signup.p');

//新文章
Route::get('/article/new',function () {return view('article.write');} )->name('article.new');
//编辑文章
Route::get('/article/edit',function () {return view('article.edit');} )->name('article.edit');

//编辑个人资料
Route::get('/user/edit/',function () {return view('user.edit');} )->name('user.edit');

//个人中心
Route::get("/user/home/{nickname}", "UserController@home")->name('user.home');

/*
 * 获取社区运行状况
 * 获取注册人数
 * 获取文章人数
 */
Route::get('/api/members/get',"UserController@api");

Route::get('/api/articles/get',"UserController@api");


//登录中间件
Route::middleware('signin')->group(function(){

    //编辑个人资料
//    Route::get('/user/edit/', 'UserController@edit')->name('user.edit');

    //写文章


});
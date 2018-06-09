<?php
use Illuminate\Support\Facades\Route;
use App\Models\Article;

/*
 *@title 全文分词搜索
 *
 *@methods 生成索引
 *         php artisan scout:import "App\Models\Article"
 */
Route::get('/search', function () {
    dump(Article::search('java')->get()->toArray());
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



//个人中心
Route::get("/user/home/{nickname}", "UserController@home")->name('user.home');

//文章详情（内容页）
Route::get("/article/content/{id}", "TopicController@content")->name('article.content');

/*
 * 获取社区运行状况
 * 获取注册人数
 * 获取文章数
 */
Route::get('/api/members/get',"UserController@api");
Route::get('/api/articles/get',"TopicController@api");
//获取文章数据
Route::get('/api/{type}/{orderby}/{order}',"TopicController@index_get" );

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
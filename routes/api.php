<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    // 返回 文章内容
    $api->get('article/content', 'App\Http\Controllers\Api\ArticleController@returnArticleContent');

    // 返回 置顶文章
    $api->get('article/sticky', 'App\Http\Controllers\Api\ArticleController@returnSticky');

    // 返回 文章专栏
    $api->get('column', 'App\Http\Controllers\Api\ArticleController@returnColumn');

    // 返回 回帖周榜
    $api->get('week/comment', 'App\Http\Controllers\Api\UsersController@weekComment');

    // 所有用户 每周 每月 每年 每人发帖 评论排行榜
    $api->get('allUserPostLeaderboard', 'App\Http\Controllers\Api\UsersController@allUserPostLeaderboard');
    

    // 返回分类文章
    $api->get('article', 'App\Http\Controllers\Api\ArticleController@returnArticle');

    // 返回 一周热议 文章
    $api->get('article/week', 'App\Http\Controllers\Api\ArticleController@articleWeek');


    $api->get('/',function(){ echo "<h2>欢迎使用BUGUB提供的优质API服务</h2><p>您的IP是<span style='color:red;'>".getIP()."</span></p>" ;});

    //  登录
    $api->post('login', 'App\Http\Controllers\Api\Auth\LoginController@login');

    // 注册
    $api->post('register', 'App\Http\Controllers\Api\Auth\RegisterController@register');

    // 用户主页
    $api->get('user', 'App\Http\Controllers\Api\UsersController@index');

    // 返回 用户签到活跃榜
    $api->get('user/clockon/rank', 'App\Http\Controllers\Api\UsersController@clockonRank');

    // 找回密码->发送密钥到邮箱
    $api->post('reset/email', 'App\Http\Controllers\Api\ForgetController@email');

    // 找回密码->重置密码
    $api->post('reset/password', 'App\Http\Controllers\Api\ForgetController@reset');

    // 获取用户IP
    $api->get('ip',function(){ return getIP();});

    // 根据IP获取用户地址
    $api->get('addr',function(){ 

        $addr = file_get_contents("http://ip.taobao.com/service/getIpInfo.php?ip=".getIP());

        if(json_decode($addr,true)["code"] == 1 )
        {
            return "未知";
        }

        return json_decode($addr,true)['data']['city'];

    });

$api->get('test', function (){ return bcrypt("Xavier") ;});

    $api->group(['middleware' => 'jwt.api.auth'], function ($api) {
        // 退出登录
        $api->post('signout', 'App\Http\Controllers\Api\UsersController@signout');

        // 修改密码
        $api->post('changepassword', 'App\Http\Controllers\Api\UsersController@changepassword');

        // 关注用户
        $api->post('user/follow', 'App\Http\Controllers\Api\UsersController@follow');

         // 打卡签到
        $api->post('user/clockon', 'App\Http\Controllers\Api\UsersController@clockon');

        // 判断用户是否签到
        $api->post('user/isclockon', 'App\Http\Controllers\Api\UsersController@isclockon');

        // 帖子->加精 删除 置顶
        $api->post("article/manage",'App\Http\Controllers\Api\ArticleController@articleManage');

        // 评论->删除 点赞 采纳
        $api->post("comment/manage",'App\Http\Controllers\Api\CommentController@commentManage');

        // 图片上传
        $api->post("upload/img",'App\Http\Controllers\Api\ArticleController@uploadImg');

        // 添加文章
        $api->post("article/new",'App\Http\Controllers\Api\ArticleController@newArticle');

        // 添加评论
        $api->post("comment/new",'App\Http\Controllers\Api\CommentController@newComment');

         // 删除评论
        $api->post("comment/del",'App\Http\Controllers\Api\CommentController@delComment');

        // 修改用户资料
        $api->post("user/edit",'App\Http\Controllers\Api\UsersController@userEdit');

    });

});



// 获取客户端真实IP地址
function getIP()
{
    $arr_ip_header = array(
        'HTTP_CDN_SRC_IP',
        'HTTP_PROXY_CLIENT_IP',
        'HTTP_WL_PROXY_CLIENT_IP',
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'REMOTE_ADDR',
    );
    $client_ip = 'unknown';
    foreach ($arr_ip_header as $key)
    {
        if (!empty($_SERVER[$key]) && strtolower($_SERVER[$key]) != 'unknown')
        {
            $client_ip = $_SERVER[$key];
            break;
        }
    }

    return $client_ip;
}
<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Clockon;
use App\Models\Follow;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    use AuthenticatesUsers;
    use Helpers;


    // 个人主页
    function index(Request $req)
    {
        $user = User::where("name",$req->name)->first();

        if(!$user){
            return [
                "errno"=>1,
                "errmsg"=>"用户不存在",
            ];
        }

        if(!$req->num)
            $req->num=15;
        if($req->num == "all")
            $req->num=999999;

        $article = Article::where("user_id",$user->id)->orderBy("created_at","desc")->select('id', 'title',"created_at","hits","comments","elite")->take($req->num)->get();

        $comment = DB::table('comments')->join("articles","articles.id","=","comments.article_id")
        ->where("comments.user_id",$user->id)
        ->select("comments.id","comments.article_id","articles.title as article_title","comments.content","comments.parent_id","comments.to_user","comments.created_at")
        ->take($req->num)->get();

        return [
            "errno"=>0,
            "successmsg"=>"获取成功",
            "user"=>[
                    "name"=>$user->name,
                    "sex"=>$user->sex,
                    "group_id"=>$user->group_id,
                    "avatar"=>$user->avatar,
                    "level"=>$user->level,
                    "vip"=>$user->vip,
                    "city"=>$user->city,
                    "credits"=>$user->credits,
                    "authentication"=>$user->authentication,
                    "signature"=>$user->signature,
                    "created_at"=>$user->created_at->format('Y-m-d H:i:s'),
                    "articles"=>$article,
                    "comments"=>$comment,
            ],
        ];
    }

    // 关注用户
    function follow(Request $req)
    {

        // 校验被关注方
        if(!$follow = User::where('name',$req->name)->first())
        {
            return [
                "errno"=>1,
                "errmsg"=>"非法请求，被关注的用户不存在！"
            ];
        }

        // 校验token
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();

        // 插入数据
        $relationship = new Follow();
        $relationship->user_id = $user->id;
        $relationship->follow_id = $follow->id;
        
        // 若 插入失败
        if(!$relationship->save())
        {
            return [
                "errno"=>1,
                "errmsg"=>"网络正忙，请稍后再试！"
            ];
        }

        // 若 插入成功
        return [
                "errno"=>0,
                "errmsg"=>"关注成功"
        ];
    }


    function changePassword(Request $req)
    {

        if($req->oldpassword == $req->password)
        {
            return [
                "errno"=>1,
                "errmsg"=>"新密码不允许和旧密码相同"
            ];
        }

        $rules = [
            "oldpassword"=>'required',
            "password"=>'required|max:32|min:6'
        ];

        $mes = [
            'oldpassword.required'    => '旧密码不能为空',
            'password.required'    => '新密码不能为空',
            'password.max'    => '新密码最多32位',
            'password.min'    => '新密码最少6位',
        ];


        $validator = Validator::make($req->all(), $rules, $mes);
        if($errors = $validator->errors()->first()){
            return [
                "errno"=>1,
                "errmsg"=>$errors
            ];
        };

        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();
        $user->password = bcrypt($req->password);
        $user->remember_token = "";
        if($user->save()){
            return [
                "errno"=>0,
                "successmsg"=>"修改成功",
            ];
        }
    }

    // 返回 回帖周榜
    function weekComment()
    {
        $weekComment = DB::table("comments")->join("users",'comments.user_id','=','users.id')
        ->where('comments.created_at', '>=', date("Y-m-d",strtotime('-8days')))
        ->select("users.name","users.avatar",DB::raw("count(user_id) as comments"))
        ->orderBy("comments",'desc')
        ->groupBy("comments.user_id")
        ->take(20)
        ->get();

        if(count($weekComment) == 0)
            return [
                "errno"=>1,
                "errmsg"=>"没有获取到数据"
            ];

        return [
            "errno"=>0,
            "successmsg"=>"获取成功",
            "users"=>$weekComment
        ];

    }


    // 用户 打卡签到
    function clockon()
    {
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();

        $clockon = Clockon::where("user_id",$user->id)->first();

        if(empty($clockon))
        {
            $clockon = new Clockon();
            $clockon->user_id = $user->id;
            $clockon->days = 1;
            if($clockon->save())
            {
                $days = $clockon->days;
            }else{
                return [
                    "errno"=>1,
                    "errmsg"=>"网络通信失败，请重试"
                ];
            }
        }else{
            $days = $clockon->days + 1;
            if(date("Y-m-d",strtotime("now"))<= $clockon->updated_at->format('Y-m-d'))
            {   
                return [
                    "errno"=>1,
                    "errmsg"=>"你已经签到过啦，兄dei~"
                ];
            }
            $clockon = Clockon::where("user_id",$user->id)->update(['days' => $days]);
            if(!$clockon)
            {
                return [
                    "errno"=>1,
                    "errmsg"=>"数据更新失败，请重试"
                ];
            }
        }

        if($days < 15)
            $credits = 2;
        if($days >= 365)
            $credits = 15;
        if($days >= 100)
            $credits = 10;
        if($days >= 30)
            $credits = 6;
        if($days >= 15)
            $credits = 4;

        $user->credits = $user->credits + $credits ;
        $user->save();

        return [
            "errno"=>0,
            "successmsg"=>"签到成功",
            "user_id"=>$user->id,
            "days"=> $days,
            "credits"=> $user->credits,
        ];
    }

    // 用户 打卡签到
    function isclockon()
    {
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();
        $clockon = Clockon::where("user_id",$user->id)->first();
        if(empty($clockon))
        {
            return [
                "errno"=>0,
                "successmsg"=>"你还没有签到过，兄dei~",
                "days"=>0
            ];
        }
        
        if(date("Y-m-d",strtotime("now"))<= $clockon->updated_at->format('Y-m-d'))
        {   
            return [
                "errno"=>1,
                "errmsg"=>"你已经签到过啦，兄dei~",
                "days"=>$clockon->days
            ];
        }else{
            return [
                "errno"=>0,
                "successmsg"=>"你还没有签到，兄dei~",
                "days"=>$clockon->days
            ];
        }
    }


    // 返回 用户签到活跃榜
    function clockonRank(Request $req)
    {
        if(!$req->num)
            $req->num = 20;

        $arr = ["newest","earliest","rank"];
        if(!in_array($req->by,$arr))
            $req->by = "newest";

        //最新签到
        if($req->by == "newest")
            $clockon = Clockon::join("users","clockons.user_id","=","users.id")
            ->orderBy("clockons.updated_at","desc")
            ->select("users.name","users.avatar","clockons.days","clockons.updated_at")
            ->take($req->num)
            ->get();

        //最早签到
        if($req->by == "earliest")
            $clockon = Clockon::join("users","clockons.user_id","=","users.id")
            ->where("clockons.updated_at",">=",date("Y-m-d",strtotime("now")))
            ->orderBy("clockons.updated_at")
            ->select("users.name","users.avatar","clockons.days","clockons.updated_at")
            ->take($req->num)
            ->get();

        //总签到榜
        if($req->by == "rank")
            $clockon = Clockon::join("users","clockons.user_id","=","users.id")
            ->orderBy("clockons.days","desc")
            ->select("users.name","users.avatar","clockons.days","clockons.updated_at")
            ->take($req->num)
            ->get();

        if(count($clockon)==0)
            return [
                "errno"=>1,
                "errmsg"=>"没有获取到数据"
            ];

        return [
            "errno"=>0,
            "successmsg"=>"获取成功",
            "users"=>$clockon
        ];
        

    }

    // 退出登录
    function signout(Request $req)
    {
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();
        if(!$user->remember_token)
        {
            return [
                "errno"=>1,
                "errmsg"=>"该用户还未登录"
            ];
        }

        $user->remember_token = "null";
        if($user->save())
        {
            return [
                "errno"=>0,
                "successmsg"=>"退出登录成功"
            ];
        }

    }

    // 修改用户资料
    function userEdit(Request $req)
    {
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();

        if(!$user->group_id > 0 )
        {
            return[
                "errno"=>1,
                "errmsg"=>"该用户是封禁用户"
            ];
        }

        if($user->name == $req->name && $user->email == $req->email)
        {
            $user->city = $req->city?: "" ;
            $user->signature = $req->signature?: "" ;
            if($user->save())
            {
                return[
                    "errno"=>0,
                    "successmag"=>"修改成功"
                ];
            }
        }
            
        if($user->email == $req->email && $user->name != $req->name)
        {
            $rules = [
                'name' => 'required|unique:users|max:20|min:2',
            ];
        }
        
        if($user->email != $req->email && $user->name == $req->name)
        {
            $rules = [
                'email' => 'required|email|unique:users',
            ];
        }
      
        $mes = [
            'name.required'    => '用户名不能为空',
            'name.unique'    => '用户名已被占用',
            'name.max'    => '用户名最多20位',
            'name.min'    => '用户名最少2位',
            'email.required'    => '邮箱地址不能为空',
            'email.email'    => '邮箱地址格式不正确',
            'email.unique'    => '邮箱地址已被占用',
        ];

        $validator = Validator::make($req->all(), $rules, $mes);
        if($errors = $validator->errors()->first())
        {
            return [
                "errno"=>1,
                "errmsg"=>$errors
            ];
        };

        $user->name = $req->name;
        $user->email = $req->email;
        $user->city = $req->city?: "" ;
        $user->signature = $req->signature?: "" ;
        if($user->save())
        {
            return[
                "errno"=>0,
                "successmag"=>"修改成功"
            ];
        }
        
    }

    // 获取指定日期内的评论榜
    function replyList($days=7)
    {
        return DB::table("comments")->join("users",'comments.user_id','=','users.id')
        ->where('comments.created_at', '>=', date("Y-m-d",strtotime('-{$days}days')))
        ->select("users.name","users.avatar",DB::raw("count(user_id) as comments"))
        ->orderBy("comments",'desc')
        ->groupBy("comments.user_id")
        ->take(20)
        ->get();
    }

    // 获取指定日期内的发帖榜
    function postList($days=7)
    {
        return DB::table("articles")->join("users",'articles.user_id','=','users.id')
        ->where('articles.created_at', '>=', date("Y-m-d",strtotime('-{$days}days')))
        ->select("users.name","users.avatar",DB::raw("count(user_id) as articles"))
        ->orderBy("articles",'desc')
        ->groupBy("articles.user_id")
        ->take(20)
        ->get();
    }


    // 所有用户 每周 每月 每年 每人发帖 评论排行榜
    function allUserPostLeaderboard()
    {
        // 每周评论榜
        $weekReplyList = self::replyList(7);
        // 每月评论榜
        $monthReplyList = self::replyList(30);
        // 每年评论榜
        $yearReplyList = self::replyList(365);
        // 每周发帖榜
        $weekPostList = self::postList(7);
        // 每月发帖榜
        $monthPostList = self::postList(30);
        // 每年发帖榜
        $yearPostList = self::postList(365);

        return [
            "errno"=>0,
            "replyList"=>[
                "weekReplyList"=>$weekReplyList,
                "monthReplyList"=>$monthReplyList,
                "yearReplyList"=>$yearReplyList,
            ],
            "postList"=>[
                "weekPostList"=>$weekPostList,
                "monthPostList"=>$monthPostList,
                "yearPostList"=>$yearPostList,
            ],

        ];


       
    }

    // 每个班级 每周 每月 每年 每人发帖 评论排行榜
    function eachClassPostLeaderboard()
    {
        
    }

   
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Column;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    // 返回置顶文章
    function returnSticky()
    {
        $sticky = DB::table("articles")->join("users","articles.user_id","=","users.id")
        ->where("articles.stick",1)
        ->select("articles.id","articles.title","articles.comments","articles.cost","articles.elite","articles.finished","articles.column","articles.created_at","users.id as user_id","users.name as user_name","users.avatar as user_avatar","users.vip as user_vip","users.authentication as user_authentication")
        ->take(10)
        ->get();

        // 检测 数据是否存在
        if(count($sticky)==0)
        {
            // 若 数据不存在
            return [
                "errno"=>1,
                "errmsg"=>"没有获取到置顶文章"
            ];
        }

        // 若 数据存在
        return [
            "errno"=>0,
            "successmsg"=>"获取成功",
            "articles"=>$sticky
        ];
    }

    // 返回分类文章
    function returnArticle(Request $req)
    {

        // 检测 参数是否正确
        $allColumn = Column::select('name')->get();
        $myColumn = array();
        for ($i=0; $i < count($allColumn); $i++) { 
            array_push($myColumn,$allColumn[$i]['name']);
        }
        
        // 匹配 查询参数
        $arr = array("综合","已结","未结","精华");
        $order = array("created_at","comments");
        if(!in_array($req->type,$arr))
            $req->type = "综合";
        if(!in_array($req->by,$order))
            $req->by = "created_at";
        

        // 设置 查询参数
        if(!$req->type == "综合" || $req->type == "精华")
        {
            if($req->type == "已结")
                $finished = 1;
            if($req->type == "未结")
                $finished = 0;
        if(!in_array($req->column,$myColumn))
            $article = DB::table("articles")->join("users","articles.user_id","=","users.id")
            ->where("articles.finished",$finished)
            ->orderBy("$req->by","desc")
            ->select("articles.id","articles.title","articles.comments","articles.cost","articles.elite","articles.finished","articles.column","articles.created_at","users.id as user_id","users.name as user_name","users.avatar as user_avatar","users.vip as user_vip","users.authentication as user_authentication")
            ->paginate(30);
        else
            $article = DB::table("articles")->join("users","articles.user_id","=","users.id")
            ->where("articles.finished",$finished)
            ->where("articles.column",$req->column)
            ->orderBy("$req->by","desc")
            ->select("articles.id","articles.title","articles.comments","articles.cost","articles.elite","articles.finished","articles.column","articles.created_at","users.id as user_id","users.name as user_name","users.avatar as user_avatar","users.vip as user_vip","users.authentication as user_authentication")
            ->paginate(30);
        }
        else
        {
            if(!in_array($req->column,$myColumn))
                $article = DB::table("articles")->join("users","articles.user_id","=","users.id")
                ->orderBy("$req->by","desc")
                ->select("articles.id","articles.title","articles.comments","articles.cost","articles.elite","articles.finished","articles.column","articles.created_at","users.id as user_id","users.name as user_name","users.avatar as user_avatar","users.vip as user_vip","users.authentication as user_authentication")
                ->paginate(30);
            else
                $article = DB::table("articles")->join("users","articles.user_id","=","users.id")
                ->where("articles.column",$req->column)
                ->orderBy("$req->by","desc")
                ->select("articles.id","articles.title","articles.comments","articles.cost","articles.elite","articles.finished","articles.column","articles.created_at","users.id as user_id","users.name as user_name","users.avatar as user_avatar","users.vip as user_vip","users.authentication as user_authentication")
                ->paginate(30);
        }

        // 若 没有数据
        if(count($article) == 0)
        {
            return [
                "errno"=>0,
                "errmsg"=>"没有获取到数据"
            ];  
        }

        // 若 取出数据
        return [
            "errno"=>0,
            "successmsg"=>"获取成功",
            "articles"=>$article
        ];
    }

    // 返回文章专栏
    function returnColumn()
    {
        $allColumn = Column::where("disabled",0)->get();
        if(count($allColumn) == 0)
        {
            return [
                "errno"=>1,
                "errmsg"=>"没有获取到数据"
            ];
        }
        return [
            "errno"=>0,
            "successmsg"=>"获取成功",
            "column"=>$allColumn
        ];
    }


    // 返回 一周热议 文章
    function articleWeek(Request $req)
    {
        if(!$req->num)
            $req->num = 15;

        $article = Article::where("created_at",'>=', date("Y-m-d",strtotime('-8days')))
        ->select("id","title","comments")
        ->orderBy("comments",'desc')->take($req->num)->get();

        if(!count($article))
        {
            return [
                "errno"=>1,
                "errmsg"=>"没有获取到数据"
            ];
        }

        return [
            "errno"=>0,
            "successmsg"=>"获取成功",
            "articles"=>$article
        ];
    }

    // 返回文章内容
    function returnArticleContent(Request $req)
    {
        if(!$req->id)
        {
            return [
                "errno"=>1,
                "errmsg"=>"缺少必要参数"
            ];
        }

        
        $article = DB::table("articles")
        ->join("users","articles.user_id","=","users.id")
        ->select("users.name","users.avatar","users.vip","users.authentication","users.group_id",
        "articles.id", "articles.title", "articles.content" ,"articles.column" ,"articles.tag","articles.cost","articles.hits","articles.comments",
        "articles.stick", "articles.elite", "articles.finished" ,"articles.comment_status" ,"articles.last_comments","articles.created_at")
        ->where("articles.id",$req->id)
        ->first();
        
        $comments = DB::table("comments")
        ->join("users","comments.user_id","=","users.id")
        ->where("comments.article_id",$req->id)
        ->select("comments.id","comments.content","comments.parent_id","comments.to_user","comments.adopted","comments.likes","comments.created_at","users.name as user_name","users.avatar as user_avatar","users.vip as user_vip","users.authentication as users_authentication","users.group_id as user_group_id")
        ->get();

        if(!$article)
        {
            return [
                "errno"=>1,
                "errmsg"=>"文章不存在"
            ];
        }

        Article::where("id",$req->id)->update(["hits"=>$article->hits+1]);

        return [
            "errno"=>0,
            "successmsg"=>"获取成功",
            "article"=>[
                "id"=>$article->id,
                "title"=>$article->title,
                "content"=>$article->content,
                "column"=>$article->column,
                "tag"=>$article->tag,
                "cost"=>$article->cost,
                "hits"=>$article->hits,
                "comments"=>$article->comments,
                "stick"=>$article->stick,
                "elite"=>$article->elite,
                "finished"=>$article->finished,
                "comment_status"=>$article->comment_status,
                "last_comments"=>$article->last_comments,
                "created_at"=>$article->created_at
            ],
            "user"=>[
                "name"=>$article->name,
                "avatar"=>$article->avatar,
                "vip"=>$article->vip,
                "authentication"=>$article->authentication,
                "group_id"=>$article->group_id,
            ],
            "comments"=>$comments
        ];

        
    }



    // 帖子 删除 置顶 加精
    function articleManage(Request $req)
    {

        // 校验token
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();

        

        // 必要参数 检测
        $arr = ["删除","置顶","加精"];
        if(!$req->id)
            return [
                    "errno"=>1,
                    "errmsg"=>"参数缺失"
            ];
        if(!in_array($req->action,$arr))
            return [
                "errno"=>1,
                "errmsg"=>"检测到非法参数"
            ];

        // 判断文章数据是否存在
        if(!$article = Article::where("id",$req->id)->first())
        {
            return [
                "errno"=>1,
                "errmsg"=>"没有获取到文章"
            ];
        }

        // 删除 
        if($req->action == "删除")
        {    
            // 判断用户身份
            if(!$user->id == $article->user_id )
            {
                // 判断用户等级
                if(!$user->group_id > 2)
                {
                    return [
                        "errno"=>1,
                        "errmsg"=>"没有权限进行此操作"
                    ];
                }else{
                    if($article->where("id",$req->id)->delete())
                        return [
                            "errno"=>0,
                            "successmsg"=>"文章{$req->action}成功"
                        ];
                }
            }else{
                if($article->where("id",$req->id)->delete())
                    return [
                        "errno"=>0,
                        "successmsg"=>"文章{$req->action}成功"
                    ];
            }
        }

        // 置顶
        if($req->action == "置顶")
            $action = "stick";
        // 加精 
        if($req->action == "加精 ")
            $action = "elite";
       
        if(!$user->group_id > 2)
        {
            return [
                "errno"=>1,
                "errmsg"=>"没有权限进行此操作"
            ];
        }
        if($article->where("id",$req->id)->update([$action => 1]))
            return [
                "errno"=>0,
                "successmsg"=>"文章{$req->action}成功"
            ];
    }

    // 图片上传
    function uploadImg(Request $req)
    {
        // 校验token
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();
        $url = array();
       for ($i=0; $i < count($req->img); $i++) { 
            $file = Storage::put('file', $req->img[$i]);
            array_push($url,"http://api.2video.cn".Storage::url($file))  ;
        }

        if($req->action == "avatar")
        {
            if(!$user->group_id > 0 )
            {
                return [
                    "errno"=>1,
                    "errmsg"=>"没有权限进行此操作"
                ];
            }
            $user->avatar = $url[0];

            if($user->save())
            {
                return [
                    "errno"=>0,
                    "successmsg"=>"头像上传成功",
                    "data"=>$url
                ];
            }
        }

        return [
            "errno"=>0,
            "data"=>$url
        ];

    }

    // 添加文章
    function newArticle(Request $req)
    {
        // 获取 用户信息
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();

        if(!$user->group_id > 0)
        {
            return [
                "errno"=>1,
                "errmsg"=>"你无权限发表文章"
            ];
        }

        // 参数 校验
        // return $req->all();
        if(!($req->title && $req->content && $req->column && $req->tag))
        {
            return [
                "errno"=>1,
                "errmsg"=>"参数不完整"
            ];
        }

        if($req->cost > $user->credits)
        {
            return [
                "errno"=>1,
                "errmsg"=>"兄dei~你的积分不够啦诶"
            ];
        }

        // 检测 字段
        $rules = [
            "title"=>'required|min:5|max:300',
            "column"=>'required',
            "content"=>'required|min:10'
        ];

        $mes = [
            'title.required'    => '标题不能为空',
            'column.required'    => '专栏不能为空',
            'content.required'    => '内容不能为空',
            'title.max'    => '标题最多长300',
            'title.min'    => '标题最少长5',
            'content.min'    => '内容最少长10'
        ];

        $validator = Validator::make($req->all(), $rules, $mes);
        if($errors = $validator->errors()->first()){
            return [
                "errno"=>1,
                "errmsg"=>$errors
            ];
        };

        $article = new Article();
        $article->user_id = $user->id;
        $article->title = $req->title;
        $article->content = $req->content;
        $article->column = $req->column;
        $article->tag = json_encode($req->tag,true);
        if(!$article->save())
        {
            return [
                "errno"=>1,
                "errmsg"=>"数据通信失败，请重试"
            ];
        }

        return [
            "errno"=>0,
            "successmsg"=>"文章发表成功"
        ];
    }
}

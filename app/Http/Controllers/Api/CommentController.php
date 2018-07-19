<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\CommentLike;
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

class CommentController extends Controller
{
    // 评论 点赞 删除 采纳
    function commentManage(Request $req)
    {
        if(!$req->id)
            return [
                "errno"=>1,
                "errmsg"=>"缺少参数"
            ];

        // 验证用户
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();

        // 判断评论是否存在
        if(!$comment = Comment::where("id",$req->id)->first())
            return [
                "errno"=>1,
                "errmsg"=>"评论不存在"
            ];


        // 评论点赞
        if($req->action == "like")
        {
            // 判断 是否点赞过
            $like = new CommentController();
            if($like->realIsLike($req->id)["errno"])
            {
                return [
                    "errno"=>1,
                    "errmsg"=>"已经点赞了"
                ];
            }
            Comment::where("id",$req->id)->update(["likes"=>$comment->likes+1]);
            $commentLike = new CommentLike();
            $commentLike->user_id = $user->id;
            $commentLike->comment_id = $comment->id;
            if($commentLike->save())
                return [
                    "errno"=>0,
                    "successmsg"=>"点赞成功"
                ];
        }


        // 评论删除
        if($req->action == "del")
        {

            // 判断用户权限
            if(!$user->group_id > 2 )
            {
                return [
                    "errno"=>1,
                    "errmsg"=>"用户权限不足"
                ];
            }

            if(Comment::where("id",$req->id)->delete())
            {
                return [
                    "errno"=>0,
                    "successmsg"=>"删除成功"
                ];
            }
        }



        // 评论采纳
        if($req->action == "adopt")
        {
            $article = Article::where("id",$comment->article_id)->first();
            if($article->user_id != $user->id)
            {
                return [
                    "errno"=>1,
                    "errmsg"=>"抱歉~你不是文章作者"
                ];
            }
            

            // 判断用户权限
            if(!$user->id > 0 )
            {
                return [
                    "errno"=>1,
                    "errmsg"=>"用户权限不足"
                ];
            }

            Article::where("id",$comment->article_id)->update(["adopt"=>1]);
            Comment::where("id",$req->id)->update(["adopted"=>1]);
            return [
                "errno"=>0,
                "successmsg"=>"采纳成功",
            ];
        }
            
    }


    // 评论

    function newComment(Request $req)
    {
        // 验证用户
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();

        // 用户组检测
        if(!$user->group_id > 0 )
            return [
                "errno"=>1,
                "errmsg"=>"没有权限进行评论"
            ];

        if(!$article = Article::where("id",$req->article_id)->first())
        {
            return [
                "errno"=>1,
                "errmsg"=>"文章不存在或者失效"
            ];
        }

        $rules = [
            "content"=>'required|min:2',
        ];

        $mes = [
            'content.required'    => '评论不能为空',
            'content.min'    => '评论最少两个字'
        ];

        $validator = Validator::make($req->all(), $rules, $mes);
        if($errors = $validator->errors()->first())
            return [
                "errno"=>1,
                "errmsg"=>$errors
            ];

        if(!$req->to_user)
            $req->to_user = "";

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->article_id = $req->article_id;
        $comment->to_user = $req->to_user;
        $comment->content = $req->content;

        if($comment->save())
        Article::where("id",$req->article_id)->update(["comments"=>$article->comments+1]);
            return [
                "errno"=>0,
                "successmsg"=>"发表评论成功"
            ];

        return [
            "errno"=>1,
            "errmsg"=>"服务器通信失败"
        ];
    }


    // 判断 是否点赞过
    public function realIsLike($id)
    {
        
        if(!$id)
            return [
                "errno"=>1,
                "errmsg"=>"缺少参数"
            ];
                
        // 验证用户
        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();
        if(!$comment = CommentLike::where("comment_id",$id)->first())
        {
           return [
                "errno"=>0,
                "successmsg"=>"还没有点赞"
            ]; 
        }

        if($user->id == $comment->user_id)
            return [
                "errno"=>1,
                "errmsg"=>"已经点赞了"
            ];
        else
            return [
                "errno"=>0,
                "successmsg"=>"还没有点赞"
            ];
    }
}

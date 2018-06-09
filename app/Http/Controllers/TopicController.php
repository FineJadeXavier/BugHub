<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;
use App\Models\Article;

class TopicController extends Controller
{
    //获取话题数量
    function api()
    {
        return Article::all()->count();
    }

    //获取文章
    function index_get(Request $req)
    {
        if($req->type == "all")
            return Article::orderBy($req->orderby,$req->order)->with("user")->paginate(15);

        return Article::where("sorts",$req->type)->orderBy($req->orderby,$req->order)->with("user")->paginate(15);
    }

    //文章详情页（内容页）
    public function content($id)
    {
        $article = Article::where('id',$id)->first();

        return view('article.content',['article' => $article]);
    }

    //发布文章
    function write(TopicRequest $req)
    {
        $qian=array(" ","　","\t","\n","\r");
        if(str_replace($qian, '', $req->content) == '<p>请尽量满足以下几点：<br><br>1.描述你的问题10-3000个字符<br><br>2.贴上相关代码<br><br>3.贴上报错信息<br><br>4.贴上相关截图<br><br>5.已经尝试过哪些方法仍然没解决（附上相关链接）</p><p><br></p>')
            return back()->withErrors('为什么要用我的内容！');
        $topic = new Article();
        $topic -> user_id = session('id');
        $topic -> sorts = $req->type;
        $topic -> title = $req->title;
        $topic -> content = $req->content;
        $topic -> save();
        return back()->with("success",'发布成功');
    }

    //编辑文章
    function edit_post(TopicRequest $req)
    {

    }
}

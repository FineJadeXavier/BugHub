<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;
use App\Models\Article;
use App\Models\Reply;
class TopicController extends Controller
{
    //获取话题数量
    function api()
    {
        return Article::all()->count();
    }

    //搜索文章
    function search(Request $req)
    {
        $articles =  Article::search($req->key)->paginate(10);
        return view('index.index',['articles'=>$articles]);
    }

    //获取文章
    function index(Request $req)
    {
        if(!$req->type)
            $articles =  Article::orderBy('created_at','desc')->with("user")->paginate(10);
        else
            $articles =  Article::where('sorts',$req->type)->orderBy('created_at','desc')->with("user")->paginate(10);
        return view('index.index',['articles'=>$articles]);
    }

    //文章详情页（内容页）
    public function content($id)
    {

        //判断文章是否存在
        if(!$article)
            return redirect()->route('index');

        return view('article.content',['article' => $article]);
        $article = Article::where('id',$id)->first();
        //加一次阅读
        $article->views = $article->views+1;
        $article -> save();
        //取出评论
        $reply = Reply::where("article_id",$article->id)->get();
        return view('article.content',['article' => $article,'reply'=>$reply]);
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

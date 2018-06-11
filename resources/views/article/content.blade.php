@extends('layouts.master')
@section('title',"标题")
@section('main')
        <div id="Main">
            <div class="sep20">
            </div>
            <div class="box" style="border-bottom: 0px;">
                <div class="header">
                    <div class="fr">
                        <a href="/user/home/{{ $article->user->nickname }}">
                            <img src="{{ $article->user->avatar }}" class="avatar" border="0" align="default"/></a>
                    </div>
                    <a href="/">DEBUG</a><span class="chevron"> › </span><a href="/search?key={{ $article->sorts}}">{{ $article->sorts}}</a>
                    <div class="sep10">
                    </div>
                    <h1>{{ $article->title}}</h1>
                     <small class="gray"><a href="/user/home/{{ $article->user->nickname }}">{{ $article->user->nickname }}</a>
                        · {{ $article->created_at }} · {{ $article->views }} 次点击   </small>
                </div>
                <div class="cell">
                    <div class="topic_content">
                        <div class="markdown_body">
                            {!! $article->content !!}
                        </div>
                    </div>
                    <div class="sep20">
                    </div>
                    <div class="sep20">
                    </div>
                </div>
                <div class="topic_buttons">
                    <div class="fr topic_stats" style="padding-top: 4px;">
                        3253 次点击  ∙  {{ $article->views }} 次点击 
                    </div>
                    {{--<a href="/favorite/topic/461227?t=sakngqhbhwvgodpilgsefrwrrblvvlxl" class="tb">加入收藏</a>  --}}
                    <a href="/" class="tb">DEBUG</a>  
                </div>
            </div>
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell">
                    <span class="gray">{{$reply->count()}} 回复  <strong class="snow"></strong></span>
                </div>
                <div id="r_5760702" class="cell">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="48" valign="top" align="center">
                                <img src="//cdn.v2ex.com/gravatar/30e86f9f5e3b40e038cddcbc5523d0af?s=48&d=retro" class="avatar" border="0" align="default"/>
                            </td>
                            <td width="10" valign="top">
                            </td>
                            <td width="auto" valign="top" align="left">
                                <div class="fr">
                                      <a href="#;" onclick="replyOne('wolfie');">
                                        <img src="//cdn.v2ex.com/static/img/reply.png" align="absmiddle" border="0" alt="Reply"/></a>   
                                    <span class="no">38</span>
                                </div>
                                <div class="sep3">
                                </div>
                                <strong><a href="/member/wolfie" class="dark">wolfie</a></strong>
                                <span class="ago">1 小时 34 分钟前</span>
                                <div class="sep5">
                                </div>
                                <div class="reply_content">
                                    `最好的语言` 记得是官方文档就这么说的。
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="sep20"></div>
            <div class="box">
                    <div class="cell"><div class="fr"><a href="#" onclick="goTop()"><strong>↑</strong> 回到顶部</a></div>
                        添加一条新回复
                    </div>
                    <div class="cell">
                        <form method="post" action="/reply/{{$article->id}}">
                            <textarea name="content" maxlength="10000" class="mll" id="reply_content"></textarea>
                            <div class="sep10"></div>
                            <div class="fr"><div class="sep5"></div>
                                <span class="gray">请尽量让自己的回复能够对别人有帮助</span>
                            </div>
                            <input type="submit" value="回复" class="super normal button" />
                            @csrf
                            <input type="text" hidden name="replyTo" val="">
                        </form>
                    </div>
                    <div class="inner">
                        <div class="fr"><a href="/">← DEBUG</a></div>
                        &nbsp;
                    </div>
            </div>
        </div>
@endsection()
@section('js')
    <script>
        function replyOne(name) {
            $('textarea[name=content]').text("@"+name+"  ");
            $('input[name=replyTo]').val(name);
        }
    </script>
@endsection()
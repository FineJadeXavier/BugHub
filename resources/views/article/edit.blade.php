@extends('layouts.master')
@section('title',"编辑")
@section('main')
    <style>
        .w-e-text-container {
            height: 700px !important;
        }
        #Rightbar > .box {
            display: none !important;
        }
        #Main {
            width: 100%;
        }
    </style>
        <div id="Main">
            <div class="sep20">
            </div>
            <div class="box" id="box">
                <div class="cell">
                    <a href="/">DEBUG</a><span class="chevron">&nbsp;›&nbsp;</span> 编辑
                </div>
                <form method="post" action="/new" id="compose">
                    <div class="cell">
                        <div class="fr fade" id="title_remaining">
                            120
                        </div>
                        主题标题
                    </div>
                    <div class="cell" style="padding: 0px;">
                        <textarea class="msl" rows="1" maxlength="120" id="topic_title" name="title" autofocus="autofocus" placeholder="请输入主题标题，如果标题能够表达完整内容，则正文可以为空"></textarea>
                    </div>
                    <div class="cell">
                        <div class="fr fade" id="content_remaining">
                            20000
                        </div>
                        正文
                    </div>
                    <div class="wangEdit">
                        {!! we_css() !!}
                        {!! we_js() !!}
                        {!! we_field('wangeditor', 'content', '<p style="text-align: left;color:#999;font-size:15px;">请尽量满足以下几点：<br />
                                                               <br />1. 描述你的问题<br />
                                                               <br />2. 贴上相关代码<br />
                                                               <br />3. 贴上报错信息<br />
                                                               <br />4. 贴上相关截图<br />
                                                               <br />5. 已经尝试过哪些方法仍然没解决（附上相关链接）</p>') !!}
                        {!! we_config('wangeditor') !!}
                    </div>
                    <div class="cell">
                    </div>
                    <div class="cell">
                        <select name="node_name" id="nodes" style="width: 300px; font-size: 14px;" >
                            <option value=0 disabled selected style='display:none;'>请选择一个类别</option>
                            <option value="PHP">PHP</option>
                        </select>
                    </div>
                </form>
                <div class="cell">
                    <div class="fr">
                        <span id="error_message"></span> &nbsp;
                        <button type="button" class="super normal button" onclick="publishTopic();">
                            <img src="/write.png" alt="" style="width: 16px; vertical-align: middle;  ">
                            &nbsp;发布主题
                        </button>
                    </div>
                    <div class="sep20"></div>
                    <div class="sep10"></div>
            </div>
        </div>
@endsection()
@section('js')
@endsection()
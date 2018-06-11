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
                <form  method="post" action="/article/edit/{{ $article->id }}" id="compose">
                    @csrf

                    <input type="text" hidden name="id" value="{{ $article->id }}">
                    <div class="cell">
                        <div class="fr fade" id="title_remaining">
                            120
                        </div>
                        主题标题
                    </div>
                    <div class="cell" style="padding: 0px;">
                        <textarea class="msl" rows="1" maxlength="120" id="topic_title" name="title" autofocus="autofocus" placeholder="请输入主题标题，如果标题能够表达完整内容，则正文可以为空">{{ $article->title }}</textarea>
                    </div>
                    <div class="cell">
                        <div class="fr fade" id="content_remaining">
                            20000
                        </div>
                        正文
                    </div>
                    <div class="wangEdit" style="text-align: left">
                        {!! we_css() !!}
                        {!! we_js() !!}
                        {!! we_field('wangeditor', 'content', $article->content) !!}
                        {!! we_config('wangeditor') !!}
                    </div>
                    <div class="cell">
                    </div>
                    <div class="cell">
                        <select name="node_name" id="nodes" style="width: 300px; font-size: 14px;" >
                            <option value=0 disabled selected style='display:none;'>请选择一个类别</option>
                            @foreach($sorts as $v)
                                @if($v->sort_name == $article->sorts)
                                    <option value="{{ $v->sort_name }}" selected>{{ $v->sort_name }}</option>
                                @else
                                <option value="{{ $v->sort_name }}">{{ $v->sort_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" hidden id="submit">
                </form>
                <div class="cell">
                    <div class="fr">
                        <button type="button" class="super normal button" id="btn">
                            <img src="/write.png" alt="" style="width: 16px; vertical-align: middle;  ">
                            &nbsp;修改主题
                        </button>

                    </div>
                    <div class="sep20"></div>
                    <div class="sep10"></div>
            </div>
        </div>
@endsection()
@section('js')
                <script>
                    $('#btn').click(function () {
                        let timerInterval
                        swal({
                            title: '发布中~~',
                            html: '正在上传数据 <span></span> KB.',
                            timer: 1500,
                            onOpen: () => {
                                swal.showLoading()
                                timerInterval = setInterval(() => {
                                    swal.getContent().querySelector('span')
                                        .textContent = swal.getTimerLeft()
                                }, 100)
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            if (
                                // Read more about handling dismissals
                                result.dismiss === swal.DismissReason.timer
                            ) {
                                $("#submit").click();
                            }
                        })
                    })
                </script>
@endsection()
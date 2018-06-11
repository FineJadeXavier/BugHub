@extends('layouts.master')
@section('title',"新问题")
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
                <a href="/">DEBUG</a><span class="chevron">&nbsp;›&nbsp;</span> 创作新主题
            </div>
            <form method="post" action="{{Route('article.new.post')}}" id="compose">
                <div class="cell">
                    <div class="fr fade" id="title_remaining">
                        120
                    </div>
                    主题标题
                </div>
                <div class="cell" style="padding: 0px;">
                    <textarea class="msl" rows="1" maxlength="120" id="topic_title" name="title" autofocus="autofocus"
                              placeholder="请输入主题标题，5-30个字符"></textarea>
                </div>
                <div class="cell">
                    <div class="fr fade" id="content_remaining">
                        30000
                    </div>
                    正文
                </div>
                <div class="wangEdit" style="text-align: left">
                    {!! we_css() !!}
                    {!! we_js() !!}
                    {!! we_field('wangeditor', 'content', '<p >请尽量满足以下几点：<br />
                                                           <br />1. 描述你的问题10-3000个字符<br />
                                                           <br />2. 贴上相关代码<br />
                                                           <br />3. 贴上报错信息<br />
                                                           <br />4. 贴上相关截图<br />
                                                           <br />5. 已经尝试过哪些方法仍然没解决（附上相关链接）</p>') !!}
                    {!! we_config('wangeditor') !!}
                </div>
                <div class="sep10"></div>
                <div class="cell">
                    <select name="type" id="nodes" style="width: 300px; font-size: 14px;">
                        <option value=0 disabled selected style='display:none;'>请选择一个类别</option>
                        @if(isset($sorts))
                            @foreach($sorts as $v)
                                <option value="{{ $v->name }}">{{ $v->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="fr">
                        <button type="button" class="super normal button" id="btn">
                            <img src="/write.png" alt="" style="width: 16px; vertical-align: middle;  ">
                            &nbsp;发布主题
                        </button>
                        <input type="submit" hidden id="submit">
                    </div>
                    <div class="sep20"></div>
                </div>
                @csrf
            </form>
        </div>
        <div class="sep20"></div>
        <div class="sep20"></div>
        <div class="sep20"></div>
        @endsection()
        @section('js')
            {{--发布文章--}}
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

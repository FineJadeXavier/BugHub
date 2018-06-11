@extends('layouts.master')
@section('title',"重置密码")
@section('main')
        <div id="Main">
            <div class="sep20">
            </div>
            <div class="box">
                <div class="header">
                    <a href="/">DEBUG</a><span class="chevron">&nbsp;›&nbsp;</span> 重置密码 &nbsp;
                    <img src="/suo.png" alt="" style="width: 16px;position: relative;top: 2px;left: -10px;">
                </div>
                <div class="cell">
                    <form method="post" action="{{ Route('resetpwd.p') }}">
                        @csrf
                        <input type="text" hidden name="email" value="{{ $email }}">
                        <table cellpadding="5" cellspacing="0" border="0" width="100%">
                            <tr>
                                <td width="120" align="right">
                                    KEY
                                </td>
                                <td width="auto" align="left">
                                    <input type="text" class="sl" name="key" value="" autofocus="autofocus" autocorrect="off" spellcheck="false" autocapitalize="off" placeholder="邮箱中的KEY"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    密码
                                </td>
                                <td width="auto" align="left">
                                    <input type="password" class="sl" name="password" value="" autocorrect="off" spellcheck="false" autocapitalize="off"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    确认密码
                                </td>
                                <td width="auto" align="left">
                                    <input type="password" class="sl" name="password_again" value="" autocorrect="off" spellcheck="false" autocapitalize="off"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    你是机器人么？
                                </td>
                                <td width="auto" align="left">
                                    <div title="点击刷新验证码" style=" background-repeat: no-repeat;cursor: pointer; width: 320px; height: 80px; border-radius: 3px; border: 1px solid #ccc;">
                                        <img src="{!! Captcha::src(); !!}"   onclick="javascript:this.src='/captcha/default?time='+Math.random()">
                                    </div>
                                    <div class="sep10">
                                    </div>
                                    <input type="text" class="sl" name="captcha" value="" autocorrect="off" spellcheck="false" autocapitalize="off" placeholder="请输入上图中的验证码"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                </td>
                                <td width="auto" align="left">
                                    <input type="submit" class="super normal button" value="重置密码"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
@endsection()
@section('js')
    {{--判断是否登录--}}
    @if(session('id'))
        {!!  redirect()->route('index'); !!}
    @endif()
    <script>
        swal("注意查收你的邮箱",'发送成功','success');
    </script>
@endsection()
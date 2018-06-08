@extends('layouts.master')
@section('title',"登录")
@section('main')
        <div id="Main">
            <div class="sep20">
            </div>
            <div class="box">
                <div class="header">
                    <a href="/">V2EX</a><span class="chevron">&nbsp;›&nbsp;</span> 登录 &nbsp;
                    <img src="/suo.png" alt="" style="width: 16px;position: relative;top: 2px;left: -10px;">
                </div>
                <div class="cell">
                    <form method="post" action="/signin">
                        <table cellpadding="5" cellspacing="0" border="0" width="100%">
                            <tr>
                                <td width="120" align="right">
                                    用户名
                                </td>
                                <td width="auto" align="left">
                                    <input type="text" class="sl" name="e30eee4abab8be6edb4e996f0aae9364734dbb84904161b760ee808eaebb015a" value="" autofocus="autofocus" autocorrect="off" spellcheck="false" autocapitalize="off" placeholder="用户名或电子邮箱地址"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    密码
                                </td>
                                <td width="auto" align="left">
                                    <input type="password" class="sl" name="65cbe7bae16756f439444c37963677837aff49059dbaea32de4285b3c4644c44" value="" autocorrect="off" spellcheck="false" autocapitalize="off"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    你是机器人么？
                                </td>
                                <td width="auto" align="left">
                                    <div style="background-image: url('/_captcha?once=53166'); background-repeat: no-repeat; width: 320px; height: 80px; border-radius: 3px; border: 1px solid #ccc;">
                                    </div>
                                    <div class="sep10">
                                    </div>
                                    <input type="text" class="sl" name="fb85c95e51084f4c49647ee055181c7262c1f0f08b60cfdf2207ea25610dd0b4" value="" autocorrect="off" spellcheck="false" autocapitalize="off" placeholder="请输入上图中的验证码"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                </td>
                                <td width="auto" align="left">
                                    <input type="hidden" value="53166" name="once"/><input type="submit" class="super normal button" value="登录"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                </td>
                                <td width="auto" align="left">
                                    <a href="/forgot">我忘记密码了</a>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" value="/" name="next"/>
                    </form>
                </div>
            </div>
        </div>
@endsection()
@section('js')
@endsection()
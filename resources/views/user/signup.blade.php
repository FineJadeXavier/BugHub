@extends('layouts.master')
@section('title',"注册")
@section('main')
        <div id="Main">
            <div class="sep20"></div>
            <div class="box">
                <div class="header"><a href="/">V2EX</a> <span class="chevron">&nbsp;›&nbsp;</span> 注册</div>
                <div class="inner">
                    <form method="post" action="/signup">
                        <table cellpadding="5" cellspacing="0" border="0" width="100%">
                            <tr>
                                <td width="120" align="right" valign="top"><div class="sep5"></div>用户名</td>
                                <td width="auto" align="left"><input type="text" class="sls" name="c559c7974e774885b1a13c2544f2372bf3ff7b3e652178aab337e534059afe09" value="" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" required="required" /><div class="sep5"></div><span class="fade">请使用半角的 a-z 或数字 0-9</span></td>
                            </tr>
                            <tr>
                                <td width="120" align="right">密码</td>
                                <td width="auto" align="left"><input type="password" class="sls" name="email" value="" autocomplete="new-password" autocorrect="off" spellcheck="false" autocapitalize="off" required="required" /></td>
                            </tr>
                            <tr>
                                <td width="120" align="right" valign="top"><div class="sep5"></div>电子邮件</td>
                                <td width="auto" align="left"><input type="email" class="sls" name="741ad6dec5e87aa2f1dd36e7c92e2e0672385de09f4fe8bc5b2d8d0fff067272" value="" autocorrect="off" spellcheck="false" autocapitalize="off" required="required" /><div class="sep5"></div><span class="fade">请使用真实电子邮箱注册，将用于找回密码。</span></td>
                            </tr>
                            <tr>
                                <td width="120" align="right">你是机器人么？</td>
                                <td width="auto" align="left"><div style="background-image: url('/_captcha?once=44349'); background-repeat: no-repeat; width: 320px; height: 80px; border-radius: 3px; border: 1px solid #ccc;"></div><div class="sep10"></div><input type="text" class="sl" name="dfab61b2233500646e2e581f92bd9627841693d2bee15268f5e29b40fe114eaa" value="" autocorrect="off" spellcheck="false" autocapitalize="off" placeholder="请输入上图中的验证码" required="required" /></td>
                            </tr>
                            <tr>
                                <td width="120" align="right"></td>
                                <td width="auto" align="left"><input type="hidden" name="once" value="44349" /><input type="submit" class="super normal button" value="注册" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

@endsection()
@section('js')
@endsection()
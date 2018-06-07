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
                                <td width="auto" align="left"><input type="password" class="sls" name="61ca39de5f7e3dadadfa76b0b6542f639ca0fe1f5627d5ff917b40c29ccee7c1" value="" autocomplete="new-password" autocorrect="off" spellcheck="false" autocapitalize="off" required="required" /></td>
                            </tr>
                            <tr>
                                <td width="120" align="right" valign="top"><div class="sep5"></div>电子邮件</td>
                                <td width="auto" align="left"><input type="email" class="sls" name="741ad6dec5e87aa2f1dd36e7c92e2e0672385de09f4fe8bc5b2d8d0fff067272" value="" autocorrect="off" spellcheck="false" autocapitalize="off" required="required" /><div class="sep5"></div><span class="fade">请使用真实电子邮箱注册，我们不会将你的邮箱地址分享给任何人</span></td>
                            </tr>
                            <tr>
                                <td width="120" align="right" valign="top"><div class="sep5"></div>国际电话区号</td>
                                <td width="auto" align="left"><select id="calling_code" name="calling_code" style="width: 200px;" required="required"><option value="86_CN">+86 中国 CN</option></select></td>
                            </tr>
                            <tr>
                                <td width="120" align="right" valign="top"><div class="sep5"></div>手机号</td>
                                <td width="auto" align="left"><input type="tel" class="sls" name="phone_number" value="" autocorrect="off" spellcheck="false" autocapitalize="off" required="required" /><div class="sep5"></div></td>
                            </tr>
                            <tr>
                                <td width="120" align="right">你是机器人么？</td>
                                <td width="auto" align="left"><div style="background-image: url('/_captcha?once=44349'); background-repeat: no-repeat; width: 320px; height: 80px; border-radius: 3px; border: 1px solid #ccc;"></div><div class="sep10"></div><input type="text" class="sl" name="dfab61b2233500646e2e581f92bd9627841693d2bee15268f5e29b40fe114eaa" value="" autocorrect="off" spellcheck="false" autocapitalize="off" placeholder="请输入上图中的验证码" required="required" /></td>
                            </tr>
                            <tr>
                                <td width="120" align="right">注册答题验证</td>
                                <td width="auto" align="left"><div class="challenge_container">下列哪个操作会获得 V2EX 铜币？<div class="sep10"></div><select name="a"><option value="KxeOyUxgNDAPPfWWLPTpIQ==">编辑主题</option><option value="PWiH9qzVJPCsy1f_f0lDoZFROjhDkgQoNlMmYYVh3h2rxJg1A6qE50tpzyfXgrCY">回复收到来自其他用户的感谢</option><option value="KN4kc1ddcTYVG0CG5um2xSj_sdP7IHnlvqLimBV8lcw=">主题被其他用户收藏</option><option value="uCA19c_1fMuBnxTf6S69Jw==">发布新主题</option><option value="UooWrGbW6I_prVT6g9DxsjzzoWscospc7Z8pK-SOq2U=">上传图片到图库</option></select></div></td>
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
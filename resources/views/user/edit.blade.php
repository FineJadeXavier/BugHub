@extends('layouts.master')
@section('title',session('nickname'))
@section('main')
        <div id="Main">
            <div class="sep20">
            </div>
            <div class="box">
                <div class="header">
                    <a href="/">DEBUG</a><span class="chevron">&nbsp;›&nbsp;</span> 设置
                </div>
                <div class="inner">
                    <form method="post" action="/settings">
                        <table cellpadding="5" cellspacing="0" border="0" width="100%">
                            <tr>
                                <td width="120" align="right">
                                    <img src="{{ session('avatar') }}" class="avatar" border="0" align="default" style="max-width: 24px; max-height: 24px;"/>
                                </td>
                                <td width="auto" align="left">
                                    DEBUG 第 {{ session('id') }} 号会员
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    用户名
                                </td>
                                <td width="auto" align="left">
                                    {{ session('nickname') }}
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    电子邮箱
                                </td>
                                <td width="auto" align="left">
                                    <code>{{ session('email') }}</code>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell">
                    头像上传
                </div>
                <div class="cell">
                    <table cellpadding="5" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="120" align="right">
                                当前头像
                            </td>
                            <td width="auto" align="left">
                                <img src="{{ session('avatar') }}" class="avatar" border="0" align="default"/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner markdown_body">
                    <p>
                        关于头像的规则和建议
                    </p>
                    <ul>
                        <li>DEBUG 禁止使用任何低俗或者敏感图片作为头像</li>
                        <li>如果你是男的，请不要用女人的照片作为头像，这样可能会对其他会员产生误导</li>
                        <li>建议请尽量不要使用真人头像，即使是自己的照片，使用别人的照片则是坚决被禁止的行为</li>
                        <li>目前不支持修改头像</li>
                    </ul>
                </div>
            </div>
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell">
                    <div class="fr">
                        <span class="fade">如果你不打算更改密码，请留空以下区域</span>
                    </div>
                    更改密码
                </div>
                <div class="inner">
                    <form method="post" action="{{ Route('user.edit.pwd') }}">
                        <table cellpadding="5" cellspacing="0" border="0" width="100%">
                            @csrf
                            <tr>
                                <td width="120" align="right">
                                    当前密码
                                </td>
                                <td width="auto" align="left">
                                    <input type="password" class="sl" name="password_current" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    新密码
                                </td>
                                <td width="auto" align="left">
                                    <input type="password" class="sl" name="password" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    再次输入密码
                                </td>
                                <td width="auto" align="left">
                                    <input type="password" class="sl" name="password_again" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                </td>
                                <td width="auto" align="left">
                                    <input type="hidden" value="58278" name="once"/><input type="submit" class="super normal button" value="更改密码"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell">
                    <div class="fr">
                        <span class="fade">如果你不打算更改邮箱地址，请留空以下区域</span>
                    </div>
                    更改邮箱地址
                </div>
                <div class="inner">
                    <form method="post" action="{{ Route('user.edit.email') }}">
                        <table cellpadding="5" cellspacing="0" border="0" width="100%">
                            @csrf
                            <tr>
                                <td width="120" align="right">
                                    当前邮箱地址
                                </td>
                                <td width="auto" align="left">
                                    <input type="text" class="sl" name="email_current" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    新邮箱地址
                                </td>
                                <td width="auto" align="left">
                                    <input type="text" class="sl" name="email" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                    再次输入邮箱地址
                                </td>
                                <td width="auto" align="left">
                                    <input type="text" class="sl" name="email_again" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120" align="right">
                                </td>
                                <td width="auto" align="left">
                                    <input type="hidden" value="58278" name="once"/><input type="submit" class="super normal button" value="更改邮箱地址"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="sep20">
        </div>
@endsection()
@section('js')
@endsection()
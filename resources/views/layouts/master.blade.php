<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN">
<head>
    <meta name="Content-Type" content="text/html;charset=utf-8" />
    <meta name="Referrer" content="unsafe-url" />
    <title>@yield('title') | DEBUG</title>
    <link rel="icon" sizes="192x192" href="/bug.png" />
    <link rel="shortcut icon" href="/bug.png" type="image/png" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://www.v2ex.com/css/basic.css?v=3.9.8.1" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://www.v2ex.com/static/css/style.css?v=4ce6cabaa6a9b16253b84f58c8ae008b" />
    <link rel="stylesheet" type="text/css" media="screen" href="https://www.v2ex.com/css/desktop.css?v=3.9.8.1" />
    <link rel="stylesheet" href="//cdn.v2ex.com/js/highlight/styles/tomorrow.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://www.v2ex.com/static/css/font-awesome.min.css?v=295235b28b6e649d99539a9d32b95d30" />
    <link href="https://www.v2ex.com/static/css/jquery.textcomplete.css?v=5a041d39010ded8724744170cea6ce8d" rel="stylesheet" />
    <link href="https://www.v2ex.com/static/js/select2/select2.css?v=2621fe97ae1aabca8661d60000147412" rel="stylesheet" />
    <link href="https://www.v2ex.com/static/js/selectboxit/selectboxit.css?v=5dc55d3860ef80ef1875d6800a5fbfa3" rel="stylesheet" >
</head>
<body>
<div id="Top">
    <div class="content">
        <div style="padding-top: 6px;">
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                    <td width="110" align="left"><a href="/" name="top" title="way to explore"><div id="Logo" style="background-image: url('/logo.png')"></div></a></td>
                    <td width="auto" align="left">
                        <div id="Search"><form action="https://www.google.com" onsubmit="return dispatch()" target="_blank"><div id="qbar"><input type="text" maxlength="40" name="q" id="q" value="" onfocus="$('#qbar').addClass('qbar_focus')" onblur="$('#qbar').removeClass('qbar_focus')"/></div></form></div>
                    </td>
                    @if(!session('id'))
                    <td width="570" align="right" style="padding-top: 2px;">
                        <a href="/" class="top">首页</a>&nbsp;&nbsp;&nbsp;
                        <a href="/signup" class="top">注册</a>&nbsp;&nbsp;&nbsp;
                        <a href="/signin" class="top">登录</a>
                    </td>
                    @else
                    <td width="570" align="right" style="padding-top: 2px;">
                        <a href="/" class="top">首页</a>&nbsp;&nbsp;&nbsp;
                        <a href="/member/FineJadeXavier" class="top">FineJadeXavier</a>&nbsp;&nbsp;&nbsp;
                        <a href="/settings" class="top">设置</a>&nbsp;&nbsp;&nbsp;
                        <a href="#;" onclick="if (confirm('确定要从 V2EX 登出？')) { location.href= '/signout?once=27533'; }" class="top">登出</a>
                    </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
</div>
<div id="Wrapper">
    <div class="content">
        <div id="Leftbar"></div>
        <div id="Rightbar">
            <div class="sep20"></div>
            @if(!session('id'))
            <div class="box">
                <div class="cell">
                    <strong>DEBUG = diss the bug</strong>
                    <div class="sep5"></div>
                    <span class="fade">DEBUG 是一个关于分享和探索的地方</span>
                </div>
                <div class="inner">
                    <div class="sep5"></div>
                    <div align="center"><a href="/signup" class="super normal button">现在注册</a>
                        <div class="sep5"></div>
                        <div class="sep10"></div>
                        已注册用户请 &nbsp;<a href="/signin">登录</a></div>
                </div>
            </div>
            @else
            <div class="box">
                <div class="cell">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="48" valign="top">
                                <a href="/member/FineJadeXavier"><img src="//cdn.v2ex.com/gravatar/2f7b329e7e4f8bfc774e6ef2ddfa2357?s=48&d=retro" class="avatar" border="0" align="default" style="max-width: 48px; max-height: 48px;"/></a>
                            </td>
                            <td width="10" valign="top">
                            </td>
                            <td width="auto" align="left">
                                <span class="bigger"><a href="/member/FineJadeXavier">FineJadeXavier</a></span>
                            </td>
                        </tr>
                    </table>
                    <div class="sep10">
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="33%" align="center">
                                <a href="/my/nodes" class="dark" style="display: block;"><span class="bigger">0</span>
                                    <div class="sep3">
                                    </div>
                                    <span class="fade">我的问答</span></a>
                            </td>
                            <td width="34%" style="border-left: 1px solid rgba(100, 100, 100, 0.4); border-right: 1px solid rgba(100, 100, 100, 0.4);" align="center">
                                <a href="/my/topics" class="dark" style="display: block;"><span class="bigger">0</span>
                                    <div class="sep3">
                                    </div>
                                    <span class="fade">问答收藏</span></a>
                            </td>
                            <td width="33%" align="center">
                                <a href="/my/following" class="dark" style="display: block;"><span class="bigger">0</span>
                                    <div class="sep3">
                                    </div>
                                    <span class="fade">特别关注</span></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="cell" style="padding: 5px;">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="32">
                                <a href="/new"><img src="/pen.png" width="32" border="0"/></a>
                            </td>
                            <td width="10">
                            </td>
                            <td width="auto" valign="middle" align="left">
                                <a href="/new">创作新主题</a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="cell" style="padding: 5px;">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="32">
                                <a href="/new"><img src="/msg.png" width="32" border="0"/></a>
                            </td>
                            <td width="10">
                            </td>
                            <td width="auto" valign="middle" align="left">
                                <a href="/new"><span>0</span>条未读消息</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif

            <div class="sep20"></div>
            <div class="box">
                <div class="cell"><span class="fade">社区运行状况</span></div>
                <div class="cell">
                    <table cellpadding="5" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="60" align="right"><span class="gray">注册会员</span></td>
                            <td width="auto" align="left"><strong>321174</strong></td>
                        </tr>
                        <tr>
                            <td width="60" align="right"><span class="gray">主题</span></td>
                            <td width="auto" align="left"><strong>461271</strong></td>
                        </tr>
                        <tr>
                            <td width="60" align="right"><span class="gray">回复</span></td>
                            <td width="auto" align="left"><strong>5760400</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="sep20"></div>
        </div>
        @yield('main')
    </div>
    <div class="c"></div>
    <div class="sep20"></div>
</div>
<div id="Bottom">
    <div class="content">
        <div class="inner" style="text-align: center">
            <div class="sep20"></div>
            <strong>
                <a href="/about" class="dark" target="_self">关于</a>
                <span> · </span>
                <a href="/about" class="dark" target="_self">反馈</a>
                <div class="sep20"></div>
                <p class="hitokoto" v-text="words"></p>
            </strong>
        </div>
    </div>
    <div class="sep20">
    </div>
    <div class="sep20">
    </div>
</div>
</body>
</html>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/vue/2.5.16/vue.min.js"></script>
<script>
    $(function () {
        let hitokoto = new Vue({
            el:'.hitokoto',
            data:{
                words:"",
            },
            created(){
                fetch("https://v1.hitokoto.cn/?c=d&encode=json")
                    .then(response=>response.json())
                    .then(json=>{
                        this.words = json.hitokoto
                    });
            }
        });
        @yield('js')
    })
</script>

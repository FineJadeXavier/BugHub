@extends('layouts.master')
@section('title','FineJadeXavier')
@section('main')
        <div id="Main">
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="73" valign="top" align="center">
                                <img src="//cdn.v2ex.com/avatar/dfa2/2bd5/274059_large.png?m=1517483107" class="avatar" border="0" align="default"/>
                                <div class="sep10">
                                </div>
                            </td>
                            <td width="10">
                            </td>
                            <td width="auto" valign="top" align="left">
                                <div class="fr">
                                    <input type="button" value="加入特别关注" onclick="if (confirm('确认要开始关注 salamanderMH？')) { location.href = '/follow/274059?once=27533'; }" class="super special button"/>
                                    <div class="sep10">
                                    </div>
                                    <input type="button" value="Block" onclick="if (confirm('确认要屏蔽 salamanderMH？')) { location.href = '/block/274059?t=1528370558'; }" class="super normal button"/>
                                </div>
                                <h1 style="margin-bottom: 5px;">salamanderMH</h1>
                                <span class="bigger">Salamander</span>
                                <div class="sep10">
                                </div>
                                <span class="gray">
							<li class="fa fa-time"></li>
							 &nbsp; DEBUG 第 274059 号会员，加入于 2017-12-12 17:13:17 +08:00，今日活跃度排名 <a href="/top/dau">2437</a></span>
                            </td>
                        </tr>
                    </table>
                    <div class="sep5">
                    </div>
                </div>
            </div>
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell_tabs">
                    <div class="fl">
                        <img src="//cdn.v2ex.com/avatar/dfa2/2bd5/274059_normal.png?m=1517483107" width="24" style="border-radius: 24px; margin-top: -2px;" border="0"/>
                    </div>
                    <a href="/member/salamandermh" class="cell_tab_current">salamanderMH 的所有提问</a>
                </div>
                <div class="cell item" style="">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="auto" valign="middle">
                                <span class="item_title"><a href="/t/461239#reply3">FTP client 发送 CWD 命令，故意让目录不正确，返回 550 错误，但是接下来其他命令也都不对了</a></span>
                                <div class="sep5">
                                </div>
                                <span class="topic_info">
							<div class="votes">
							</div>
							<a class="node" href="/go/programmer">程序员</a> &nbsp;•&nbsp; <strong><a href="/member/salamanderMH">salamanderMH</a></strong> &nbsp;•&nbsp; 1 小时 3 分钟前 &nbsp;•&nbsp; 最后回复来自 <strong><a href="/member/qiyuey">qiyuey</a></strong></span>
                            </td>
                            <td width="70" align="right" valign="middle">
                                <a href="/t/461239#reply3" class="count_livid">3</a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <span class="chevron">»</span><a href="/member/salamanderMH/topics">salamanderMH 创建的更多主题</a>
                </div>
            </div>
            <div class="sep20">
            </div>
        </div>
@endsection()
@section('js')
@endsection()
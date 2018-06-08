@extends('layouts.master')
@section('title',$user->nickname)
@section('main')
        <div id="Main">
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="73" valign="top" align="center">
                                <img src="{{ $user->avatar }}" class="avatar" border="0" align="default"/>
                                <div class="sep10">
                                </div>
                            </td>
                            <td width="10">
                            </td>
                            <td width="auto" valign="top" align="left">
                                {{--<div class="fr">--}}
                                    {{--<input type="button" value="加入特别关注" onclick="if (confirm('确认要开始关注 salamanderMH？')) { location.href = '/follow/274059?once=27533'; }" class="super special button"/>--}}
                                    {{--<div class="sep10">--}}
                                    {{--</div>--}}
                                    {{--<input type="button" value="Block" onclick="if (confirm('确认要屏蔽 salamanderMH？')) { location.href = '/block/274059?t=1528370558'; }" class="super normal button"/>--}}
                                {{--</div>--}}
                                <h1 style="margin-bottom: 5px;">{{ $user->nickname }}</h1>
                                <span class="bigger">小萌新</span>
                                <div class="sep10">
                                </div>
                                <span class="gray">
							        <li class="fa fa-time"></li>
							 &nbsp;     DEBUG 第 {{ $user->id }} 号会员，加入于 {{ $user->created_at }}
                                </span>
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
                    <p >{{$user->nickname}} 的所有提问</p>
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
                    <a href="/member/salamanderMH/topics">浏览 {{$user->nickname}} 创建的更多主题</a>
                </div>
            </div>
            <div class="sep20">
            </div>
        </div>
@endsection()
@section('js')
@endsection()
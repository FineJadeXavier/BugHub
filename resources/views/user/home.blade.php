@extends('layouts.master')
@section('title',$user->nickname)
@section('main')
    <style>
        .count_livid{
            background: #aab0c6 !important;
        }

        .pagination {
            display: -ms-flexbox;
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .page-link:hover {
            z-index: 2;
            color: #0056b3;
            text-decoration: none;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .page-link:focus {
            z-index: 2;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .page-link:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .page-item:first-child .page-link {
            margin-left: 0;
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

        .page-item:last-child .page-link {
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: auto;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
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
                <p>{{$user->nickname}} 的所有提问</p>
            </div>
            @foreach($articles as $v)
                <div class="cell item" style="">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="auto" valign="middle">
                                <span class="item_title">
                                    <a href="/article/content/{{ $v->id }}">{{ $v->title }}</a>
                                </span>
                                <div class="sep5">
                                </div>
                                <span class="topic_info">
							<div class="votes"></div>
							<a class="node" href="/?type={{ $v->sorts }}">{{ $v->sorts }}</a> &nbsp;•&nbsp;
                                    <strong><a href="/user/home/{{ $user->nickname }}">{{ $user->nickname }}</a></strong>&nbsp;•&nbsp; {{ $v->created_at }}
                                </span>
                            </td>
                            <td width="70" align="right" valign="middle">
                                <a href="/article/content/{{ $v->id }}" class="count_livid">{{ $v->reply }}</a>
                            </td>
                        </tr>
                    </table>
                </div>
            @endforeach
            <div class="inner">
                {{ $articles -> links() }}
            </div>
        </div>
        <div class="sep20">
        </div>
    </div>
@endsection()
@section('js')
@endsection()
@extends('layouts.master')
@section('title','首页')
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
        <div class="sep20"></div>
        <div class="box" id="article" >
            <div class="cell" id="SecondaryTabs">
                <a href="#" class="tab_current">最新主题</a> &nbsp; &nbsp;
            </div>
            @foreach($articles as $v)
            <div class="cell item" style="">
                <table cellpadding="0" cellspacing="0" border="0" width="100%"  >
                    <tr >
                        <td width="48" valign="top" align="center">
                            <a href="/user/home/{{ $v->user->nickname }}">
                                <img src="{{ $v->user->avatar }}" class="avatar" border="0" align="default" width="50"/>
                            </a>
                        </td>
                        <td width="10"></td>
                        <td width="auto" valign="middle">
                            <span class="item_title">
                                <a href="/article/content/{{ $v->id }}" >{{ $v->title }}</a>
                            </span>
                            <div class="sep5"></div>
                            <span class="topic_info">
                                <div class="votes"></div>
                                <a class="node" href="/go/gts">{{ $v->sorts }}</a> &nbsp;•&nbsp;
                                <strong>
                                    <a href="/user/home/{{ $v->user->nickname }}">{{ $v->user->nickname }}</a>
                                </strong>
                                &nbsp;•&nbsp; <span class="date">{{ $v->created_at }}</span>
                            </span>
                        </td>
                        <td width="70" align="right" valign="middle">
                            <a  href="/article/content/{{ $v->id }}" class="count_livid" >{{ $v->reply }}</a>
                        </td>
                    </tr>
                </table>
            </div>
            @endforeach
        <div class="sep5"></div>
                    {{ $articles->links() }}
        </div>
    </div>
@endsection()
@section('js')
@endsection()
@extends('layouts.master')
@section('title','首页')
@section('main')
    <style>
        .count_livid{
            background: #aab0c6 !important;
        }
    </style>
    <div id="Main">
        <div class="sep20"></div>
        <div class="box" id="article">
            <div class="inner" id="Tabs">
                <a href="/?tab=tech" class="tab_current">技术</a>
                <a href="/?tab=creative" class="tab">创意</a>
            </div>
            <div class="cell" id="SecondaryTabs">
                <a href="/go/nodejs" class="tab_current">最新问答</a> &nbsp; &nbsp;
                <a href="/go/cloud">热门问答</a> &nbsp; &nbsp;
                <a href="/go/bb">等待回答</a>
            </div>
            <div class="cell item" style=""    v-for="(article,index) in articles" :key="index">
                <table cellpadding="0" cellspacing="0" border="0" width="100%"  >
                    <tr >
                        <td width="48" valign="top" align="center">
                            <a :href="'/user/home/'+article.user.nickname">
                                <img :src="article.user.avatar" class="avatar" border="0" align="default" width="50"/>
                            </a>
                        </td>
                        <td width="10"></td>
                        <td width="auto" valign="middle">
                            <span class="item_title">
                                <a :href="'/article/content/' + article.id"  v-text="article.title"></a>
                            </span>
                            <div class="sep5"></div>
                            <span class="topic_info">
                                <div class="votes"></div>
                                <a class="node" href="/go/gts" v-text="article.sorts"></a> &nbsp;•&nbsp;
                                <strong>
                                    <a href="/member/183387594"  v-text="article.user.nickname"></a>
                                </strong>
                                &nbsp;•&nbsp; <span class="date">@{{ article.created_at | dateFilter }}</span>
                            </span>
                        </td>
                        <td width="70" align="right" valign="middle">
                            <a  :href="'/article/content/'+article.id" class="count_livid"  v-text="article.reply"></a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="inner">
                <span class="chevron">→</span><a href="/recent">更多新主题</a>
            </div>
        </div>
        <div class="sep20"></div>
    </div>
@endsection()
@section('js')
    <script src="/js/index.js"></script>
    <script>

    </script>
@endsection()
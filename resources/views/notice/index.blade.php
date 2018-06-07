@extends('layouts.master')
@section('title','首页')
@section('main')
        <div id="Main">
            <div class="sep20">
            </div>
            <div class="box">
                <div class="header">
                    <div class="fr f12">
                        <span class="snow">总共收到提醒&nbsp;</span><strong class="gray">0</strong>
                    </div>
                    <a href="/">V2EX</a><span class="chevron">&nbsp;›&nbsp;</span> 提醒系统
                </div>
                <div class="inner">
                    <div align="center">
                        <span class="fade">目前尚无任何提醒信息</span>
                    </div>
                </div>
            </div>
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell">
                    Atom Feed for Notifications
                </div>
                <div class="cell">
                    <input type="text" value="http://www.v2ex.com/n/159279686663692879a852b7cb9a3490c7fd5f79.xml" class="sll" onclick="this.select();" readonly="readonly"/>
                </div>
                <div class="inner" style="text-align: right;">
                    <a href="javascript:void();" onclick="if (confirm('你确认要重新生成 Notifications Token？')) { location.href = '/notifications/regenerate_token?t=1528370558'; }">重新生成 Token</a> ⟳
                </div>
            </div>
        </div>
@endsection()
@section('js')
@endsection()
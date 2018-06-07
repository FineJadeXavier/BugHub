@extends('layouts.master')
@section('title','首页')
@section('main')
        <div id="Main">
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td width="73" valign="top" align="center">
                                <img src="//cdn.v2ex.com/gravatar/18a0183d6c0576bb9644a66f32ec9ef3?s=73&d=retro" class="avatar" border="0" align="default"/>
                                <div class="sep10">
                                </div>
                            </td>
                            <td width="10">
                            </td>
                            <td width="auto" valign="top" align="left">
                                <div class="fr">
                                    <input type="button" value="加入特别关注" onclick="if (confirm('确认要开始关注 FabricPath？')) { location.href = '/follow/312675?once=27533'; }" class="super special button"/>
                                    <div class="sep10">
                                    </div>
                                    <input type="button" value="Block" onclick="if (confirm('确认要屏蔽 FabricPath？')) { location.href = '/block/312675?t=1528370558'; }" class="super normal button"/>
                                </div>
                                <h1 style="margin-bottom: 5px;">FabricPath</h1>
                                <div class="sep10">
                                </div>
                                <span class="gray">
							<li class="fa fa-time"></li>
							 &nbsp; V2EX 第 312675 号会员，加入于 2018-04-29 17:00:47 +08:00，今日活跃度排名 <a href="/top/dau">2275</a></span>
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
                        <img src="//cdn.v2ex.com/gravatar/18a0183d6c0576bb9644a66f32ec9ef3?s=48&d=retro" width="24" style="border-radius: 24px; margin-top: -2px;" border="0"/>
                    </div>
                    <a href="/member/fabricpath" class="cell_tab_current">FabricPath 创建的所有主题</a><a href="/member/fabricpath/qna" class="cell_tab">提问</a><a href="/member/fabricpath/tech" class="cell_tab">技术话题</a><a href="/member/fabricpath/play" class="cell_tab">好玩</a><a href="/member/fabricpath/jobs" class="cell_tab">工作信息</a><a href="/member/fabricpath/deals" class="cell_tab">交易信息</a><a href="/member/fabricpath/city" class="cell_tab">城市相关</a>
                </div>
            </div>
            <div class="sep20">
            </div>
            <div class="box">
                <div class="cell">
                    <span class="gray">FabricPath 最近回复了</span>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">1 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/Charkey">Charkey</a> 创建的主题 <span class="chevron">›</span><a href="/go/chongqing">重庆</a><span class="chevron">›</span><a href="/t/460895#reply3">想着端午节去重庆玩一波，但是不是不要在节假日出去凑热闹为好。。</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <div class="reply_content">
                        我在北京被热出 shi 了，准备回重庆避暑了
                    </div>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">1 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/photonvx">photonvx</a> 创建的主题 <span class="chevron">›</span><a href="/go/programmer">程序员</a><span class="chevron">›</span><a href="/t/460906#reply98">华为“吓人的技术”GPU Turbo 是啥原理</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <div class="reply_content">
                        AMD 更新了这么多鸡血驱动。。。
                        <br/>换句话说，如果软件更新能这么有用的话，大家还大力开发新硬件干嘛，
                        <br/>换句话说，华为就更新个软件就能超过 adreno 630，那高通是不是该把 GPU 硬件设计部门裁了
                    </div>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">1 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/xzg1993">xzg1993</a> 创建的主题 <span class="chevron">›</span><a href="/go/qna">问与答</a><span class="chevron">›</span><a href="/t/460902#reply5">华为这是用技术吊打其他手机厂商么</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <div class="reply_content">
                        AMD 更新了这么多年驱动，游戏性能超过 Nvidia 了吗？ <img src="https://ws4.sinaimg.cn/bmiddle/62e721e4gw1et02g5wksrj200k00k3y9.jpg" class="embedded_image"/><img src="https://ws1.sinaimg.cn/large/b64a58e3gy1fikr7bnfrmj200k00k0sh.jpg" class="embedded_image"/><img src="https://ws1.sinaimg.cn/large/b64a58e3gy1fikro1qf4lj200k00k3y9.jpg" class="embedded_image"/>
                    </div>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">14 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/niketwo">niketwo</a> 创建的主题 <span class="chevron">›</span><a href="/go/qna">问与答</a><span class="chevron">›</span><a href="/t/457438#reply27">通行电动滑板车推荐~目前看了小米的和 JACK HOT 的，预算 2K，一天也就四五公里、路况全公路，大家有什么推荐没。主要是想问问这东西有没有坑，毕竟第一次用。</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <div class="reply_content">
                        @<a href="/member/1010011010">1010011010</a> 气压低了内外胎摩擦增大，容易磨破，气压高就不会了，我现在基本上打到 40psi，巨硬，当然和气枪测量误差有关系。三个月没爆胎了。
                    </div>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">14 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/biaolab">biaolab</a> 创建的主题 <span class="chevron">›</span><a href="/go/jobs">酷工作</a><span class="chevron">›</span><a href="/t/457424#reply4">[成都][初创公司]招 Web 高级后端、前端</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <div class="reply_content">
                        mark 一下，两年后回成都再看看
                    </div>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">14 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/niketwo">niketwo</a> 创建的主题 <span class="chevron">›</span><a href="/go/qna">问与答</a><span class="chevron">›</span><a href="/t/457438#reply27">通行电动滑板车推荐~目前看了小米的和 JACK HOT 的，预算 2K，一天也就四五公里、路况全公路，大家有什么推荐没。主要是想问问这东西有没有坑，毕竟第一次用。</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <div class="reply_content">
                        小米滑板车贼容易爆胎，我买了不到一年，每天来回单程 3.6 公里，前后加起来爆了 5 个胎，我自行购买了外胎换过之后，这次坚持了 3 个月。
                        <br/>而且维修收费看师傅心情，收过两次费用。
                        <br/>
                        <br/>总的来说，气压一定要足，气压高不容易爆胎。
                        <br/>
                        <br/>如果路况较好的话，平衡车也不错
                    </div>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">20 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/ucun">ucun</a> 创建的主题 <span class="chevron">›</span><a href="/go/gts">全球工单系统</a><span class="chevron">›</span><a href="/t/455821#reply29">aria2 在 WSL 下令人窒息的操作</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <div class="reply_content">
                        @<a href="/member/smilekung">smilekung</a> 我试了一下，删掉了自己的 home
                    </div>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">20 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/ekko">ekko</a> 创建的主题 <span class="chevron">›</span><a href="/go/jobs">酷工作</a><span class="chevron">›</span><a href="/t/455902#reply10">面试完通知回复说公司招聘需求有变化，给推荐新的岗位，是委婉的拒绝还是真心邀请？</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <div class="reply_content">
                        反正就是，现在的岗位你去不了了，去不去他推荐的面试，就看你兴趣了。
                        <br/>而且你想太多了，hr 要拒绝你直接就拉黑或者直接不回了，不会给你废话这么多的。
                    </div>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">20 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/hdyl">hdyl</a> 创建的主题 <span class="chevron">›</span><a href="/go/fit">健康</a><span class="chevron">›</span><a href="/t/455624#reply14">公司刚装修完就得入驻，还得人体净化周边其他公司的装修气体，是不是太摧残了？</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="inner">
                    <div class="reply_content">
                        @<a href="/member/hdyl">hdyl</a> 我上家公司也是用的全环保材料，但是偶尔还是会出现甲醛超标的情况，可以众筹一个空气质量监控器，1k 左右。
                        <br/>
                        <br/>另外，不是说甲醛低于国家规定的安全标准就安全，只是说相对的没有那么大的影响。但是这都是概率问题，
                    </div>
                </div>
                <div class="dock_area">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 10px 15px 8px 15px; font-size: 12px; text-align: left;">
                                <div class="fr">
                                    <span class="fade">21 天前</span>
                                </div>
                                <span class="gray">回复了 <a href="/member/hdyl">hdyl</a> 创建的主题 <span class="chevron">›</span><a href="/go/fit">健康</a><span class="chevron">›</span><a href="/t/455624#reply14">公司刚装修完就得入驻，还得人体净化周边其他公司的装修气体，是不是太摧残了？</a></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="cell">
                    <div class="reply_content">
                        劝你离职，你可以直接百度搜 白血病 装修，多了去了
                        <br/>并且，甲醛是强烈致癌物
                    </div>
                </div>
                <div class="inner">
                    <span class="chevron">»</span><a href="/member/FabricPath/replies">FabricPath 创建的更多回复</a>
                </div>
            </div>
        </div>
    </div>
    <div class="c">
    </div>
    <div class="sep20">
    </div>
        @endsection()
        @section('js')
        @endsection()
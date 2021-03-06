<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>在线客服管理端</title>
    <link id="zuithumb" href="/Public/dist/css/zui.css" rel="stylesheet">
    <link href="/Public/dist/css/common.css" rel="stylesheet">
    <script src="/Public/dist/lib/jquery/jquery.js"></script>
    <script src="/Public/dist/js/zui.min.js"></script>
    <script src="/Public/dist/lib/cookie/jquery.cookie.js"></script>
    <script src="/Public/dist/lib/common/json.js"></script>
    <script src="/Public/dist/js/formvalid.js"></script>
    <script src="/Public/dist/lib/ZeroClipboard/ZeroClipboard.min.js"></script>
</head>
<body>
<!--[if lt IE 9]>
<div class="alert alert-danger">您正在使用 <strong>过时的</strong> 浏览器. 是时候 <a href="http://browsehappy.com/">更换一个更好的浏览器</a> 来提升用户体验.</div>
<![endif]-->

<nav class="navbar navbar-default header" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="javascript:;"><i class="icon icon-chat-dot"></i> 在线客服</a>
    </div>
    <div class="collapse navbar-collapse navbar-collapse-example">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-primary">&nbsp;</span> 换肤 <b class="caret"></b></a>
                <ul class="dropdown-menu themelist" role="menu">
                    <li><span class="label theme-black" data-t="black">&nbsp;</span></li>
                    <li><span class="label theme-bluegrey" data-t="bluegrey">&nbsp;</span></li>
                    <li><span class="label theme-indigo" data-t="indigo">&nbsp;</span></li>
                    <li><span class="label theme-yellow" data-t="yellow">&nbsp;</span></li>
                    <li><span class="label theme-brown" data-t="brown">&nbsp;</span></li>
                    <li><span class="label theme-purple" data-t="purple">&nbsp;</span></li>
                    <li><span class="label theme-green" data-t="green">&nbsp;</span></li>
                    <li><span class="label theme-red" data-t="red">&nbsp;</span></li>
                    <li><span class="label theme-blue" data-t="blue">&nbsp;</span></li>
                    <li><span class="label theme-default" data-t="default">&nbsp;</span></li>
                </ul>
            </li>
            <li><a href="http://www.duiler.com" target="_blank"><i class="icon icon-lightbulb"></i> 了解</a></li>
            <li><a href="<?php echo U('Chat/Index/index');?>"><i class="icon icon-exchange"></i> 切换为客服模式</a></li>
            <li><a><?php echo ($account); ?></a></li>
            <li><a href="<?php echo U('Manage/Login/loginout');?>">退出 <i class="icon icon-signout"></i></a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-xs-2 leftcon">
            <div class="leftpanel">
                <div class="list-group">
                    <a href="<?php echo U('Manage/Index/index');?>" class="list-group-item <?php if((CONTROLLER_NAME) == "Index"): ?>active<?php endif; ?>"><i class="icon-home"></i> 主页</a>
                    <a href="<?php echo U('Manage/History/index');?>" class="list-group-item <?php if((CONTROLLER_NAME) == "History"): ?>active<?php endif; ?>"><i class="icon-history"></i> 历史会话</a>
                    <a href="<?php echo U('Manage/Kefu/index');?>" class="list-group-item <?php if((CONTROLLER_NAME) == "Kefu"): ?>active<?php endif; ?>"><i class="icon-group"></i> 客服管理</a>
                    <a href="<?php echo U('Manage/Setting/index');?>" class="list-group-item <?php if((CONTROLLER_NAME) == "Setting"): ?>active<?php endif; ?>"><i class="icon-cog"></i> 设置</a>
                    <a href="http://chat.duiler.com/index.php/Client/Index/index/sysid/97b6e749ee9553c1b93cb8fdfdf47485.html" target="_blank" class="list-group-item"><i class="icon-comments-alt"></i> 联系我们</a>
                </div>
            </div>
        </div>
        <div class="col-xs-10 rightcon">
            <div class="rightpanel">
			
                <div class="infoline">
    <div class="row">
        <div class="col-xs-4">
            <div class="panel">
                <div class="panel-body">
                    <div class="pull-left bg-primary infotip">
                        <i class="icon icon-chat-dot icon-2x"></i>
                    </div>
                    <div class="pull-right infotxt text-right">
                        <h1><span id="client_chat_online_s">0</span> <br/><small>正在咨询人数</small></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="panel">
                <div class="panel-body">
                    <div class="pull-left bg-success infotip">
                        <i class="icon icon-headphones icon-2x"></i>
                    </div>
                    <div class="pull-right infotxt text-right">
                        <h1><span id="kf_online_s">0</span> <br/><small>在线客服人数</small></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="panel">
                <div class="panel-body">
                    <div class="pull-left bg-special infotip">
                        <i class="icon icon-user icon-2x"></i>
                    </div>
                    <div class="pull-right infotxt text-right">
                        <h1><span id="client_wait_online_s">0</span> <br/><small>当前等待人数</small></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<div class="panel">
    <div class="panel-body infochart">
        <p>接待会话数 <i class="icon icon-exclamation-sign huitip"  data-toggle="tooltip" title="以昨天为截止日期，前30天接待会话数"></i></p>
        <canvas id="myLineChart" ></canvas>
    </div>
</div>

<p class="lead">今日客服活动</p>
<div class="panel">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>客服</th>
                <th>在线状态</th>
                <th>当前接待量</th>
                <th>累计会话数</th>
                <th>累计消息数</th>
                <th>首次上线时间</th>
                <th>累计登录时间</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
-->
<script>
    //客服信息变量
    var msg = {},
            ws = {},
            uid = <?php echo ($uid); ?>,  //身份uid
            role = "admin",  //客服人员
            relation = "<?php echo ($companyid); ?>"; //所属系统标识
</script>
<script>
    $(function(){
        $b = $("body");
        sk_init();
        function sk_init() {
            ws = new WebSocket("ws://localhost:8585");
            ws.onopen = function () {
                msg = {};
                msg.type = "login"; //消息类型
                msg.uid = uid; //访客标识id
                msg.role = role; //访客身份
                msg.relation = relation; //所属客服系统
                ws.send(JSON.stringify(msg));
            };
            ws.onmessage = function (e) {
                msg = JSON.parse(e.data);
                if(msg.type == 'onlineNum'){
                    //在线访客和客服情况
                    $b.find("#kf_online_s").text(msg.list.kf_online_s);
                    $b.find("#client_wait_online_s").text(msg.list.client_wait_online_s);
                    $b.find("#client_chat_online_s").text(msg.list.client_chat_online_s);
                }
            }
        }
    });
</script>

            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        //默认主题引入
        var $themename = !!$.cookie("themename")?$.cookie("themename"):"default";
        $("<link>").attr({ rel: "stylesheet",type: "text/css",href: "/Public/dist/css/zui-"+$themename+"-theme.css"}).insertAfter("#zuithumb");
        //主题颜色切换
        $(".themelist").on("click","span",function(){
            $.cookie("themename",$(this).data("t"),{expires:7, path:'/'});
            window.location.reload(true);
        });
    });
</script>
</body>
</html>
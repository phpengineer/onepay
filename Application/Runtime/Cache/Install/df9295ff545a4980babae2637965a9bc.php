<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>弘讯一元云购 安装</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="/Public/Static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/Install/css/install.css" rel="stylesheet">
        <script src="/Public/Static/jquery.js"></script>
        <script src="/Public/Static/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top">
        	<div class="navbar-header">
				<button class="navbar-toggle collapsed" data-target="#nav_index" data-toggle="collapse" type="button">
					<span class="sr-only">导航</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="http://www.zuyihao.com" class="nav-logo"><img src="/Public/Install/images/logo.png" alt="lfdycms"></a>
			</div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li class="active"><a href="javascript:;">环境检测</a></li>
    <li class="active"><a href="javascript:;">创建数据库</a></li>
    <li class="active"><a href="javascript:;">安装</a></li>
    <li><a href="javascript:;">完成</a></li>

                </ul>
            </div>
        </div>
        <div class="jumbotron masthead">
            <div class="container">
                
    <h1><?php if(($_SESSION['update']) == "1"): ?>升级<?php else: ?>安装<?php endif; ?></h1>
    <div id="show-list" class="install-database">
    </div>
    <script type="text/javascript">
        var list   = document.getElementById('show-list');
        function showmsg(msg, classname){
            var li = document.createElement('p'); 
            li.innerHTML = msg;
            classname && li.setAttribute('class', classname);
            list.appendChild(li);
            document.scrollTop += 30;
        }
    </script>

            </div>
        </div>
        <footer class="footer navbar-fixed-bottom">
            <div class="container">
                <div>
                	
    <button class="btn btn-warning btn-large disabled">正在<?php if(($_SESSION['update']) == "1"): ?>升级<?php else: ?>安装<?php endif; ?>，请稍后...</button>

                </div>
            </div>
        </footer>
    </body>
</html>
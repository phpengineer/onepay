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
    <li><a href="javascript:;">安装</a></li>
    <li><a href="javascript:;">完成</a></li>

                </ul>
            </div>
        </div>
        <div class="jumbotron masthead">
            <div class="container">
                
    <?php
 defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_HOST_M', '127.0.0.1'); defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_PORT', '3306'); defined('SAE_MYSQL_DB') or define('SAE_MYSQL_DB', 'hxoneshop'); defined('SAE_MYSQL_USER') or define('SAE_MYSQL_USER', 'root'); ?>
    <h1>创建数据库</h1>
    <form action="/install.php?s=/install/step2" method="post" target="_self" class="form-horizontal">
            <div class="form-group">
            	<div class="col-xs-3">
                <select name="db[]" class="form-control">
	                <option>mysql</option>
                </select>
                </div>
                <span>数据库类型</span>
            </div>
            <div class="form-group">
            	<div class="col-xs-3">
                <input type="text" name="db[]" class="form-control" value="<?php if(defined("SAE_MYSQL_HOST_M")): echo (SAE_MYSQL_HOST_M); else: ?>127.0.0.1<?php endif; ?>">
                </div>
                <span>数据库服务器，数据库服务器IP，一般为127.0.0.1</span>
            </div>
            <div class="form-group">
            	<div class="col-xs-3">
                <input type="text" name="db[]" class="form-control" value="<?php if(defined("SAE_MYSQL_DB")): echo (SAE_MYSQL_DB); endif; ?>">
                </div>
                <span>数据库名</span>
            </div>
            <div class="form-group">
            	<div class="col-xs-3">
                <input type="text" name="db[]" class="form-control" value="<?php if(defined("SAE_MYSQL_USER")): echo (SAE_MYSQL_USER); endif; ?>">
                </div>
                <span>数据库用户名</span>
            </div>
            <div class="form-group">
            	<div class="col-xs-3">
                <input type="password" name="db[]" class="form-control" value="<?php if(defined("SAE_MYSQL_PASS")): echo (SAE_MYSQL_PASS); endif; ?>">
                </div>
                <span>数据库密码</span>
            </div>
            <div class="form-group">
            	<div class="col-xs-3">
                <input type="text" name="db[]" class="form-control" value="<?php if(defined("SAE_MYSQL_PORT")): echo (SAE_MYSQL_PORT); else: ?>3306<?php endif; ?>">
                </div>
                <span>数据库端口，数据库服务连接端口，一般为3306</span>
            </div>

            <div class="form-group">
            	<div class="col-xs-3">
                <input type="text" name="db[]" class="form-control" value="hx_">
                </div>
                <span>数据表前缀，同一个数据库运行多个系统时请修改为不同的前缀</span>
            </div>

            <h2>创始人帐号信息</h2>
            <div class="form-group">
            	<div class="col-xs-3">
                <input type="text" name="admin[]" class="form-control" value="admin">
                </div>
                <span>用户名</span>
            </div>
            <div class="form-group">
            	<div class="col-xs-3">
                <input type="password" name="admin[]" class="form-control" value="">
                </div>
                <span>密码</span>
            </div>
            <div class="form-group">
            	<div class="col-xs-3">
                <input type="password" name="admin[]" class="form-control" value="">
                </div>
                <span>确认密码</span>
            </div>
    </form>

            </div>
        </div>
        <footer class="footer navbar-fixed-bottom">
            <div class="container">
                <div>
                	
    <a class="btn btn-success btn-large" href="<?php echo U('Install/step1');?>">上一步</a>
    <button id="submit" type="button" class="btn btn-primary btn-large" onclick="$('form').submit();return false;">下一步</button>

                </div>
            </div>
        </footer>
    </body>
</html>
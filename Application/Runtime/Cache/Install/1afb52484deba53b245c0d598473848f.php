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
    <li><a href="javascript:;">创建数据库</a></li>
    <li><a href="javascript:;">安装</a></li>
    <li><a href="javascript:;">完成</a></li>

                </ul>
            </div>
        </div>
        <div class="jumbotron masthead">
            <div class="container">
                
    <h1>环境检测</h1>
    <table class="table">
        <caption><h2>运行环境</h2></caption>
        <thead>
            <tr>
                <th>项目</th>
                <th>所需配置</th>
                <th>当前配置</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($env)): $i = 0; $__LIST__ = $env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($item[0]); ?></td>
                    <td><?php echo ($item[1]); ?></td>
                    <td><i class="ico-<?php echo ($item[4]); ?>">&nbsp;</i><?php echo ($item[3]); ?></td>       
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <table class="table">
        <caption><h2>依赖性</h2></caption>
        <thead>
            <tr>
                <th>名称</th>
				<th>类型</th>
                <th>检查结果</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($func)): $i = 0; $__LIST__ = $func;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($item[0]); ?></td>
					<td><?php echo ($item[3]); ?></td>
                    <td><i class="ico-<?php echo ($item[2]); ?>">&nbsp;</i><?php echo ($item[1]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
	<?php if(isset($dirfile)): ?><table class="table">
        <caption><h2>目录/文件权限</h2></caption>
        <thead>
            <tr>
                <th>目录/文件</th>
                <th>所需状态</th>
                <th>当前状态</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($dirfile)): $i = 0; $__LIST__ = $dirfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($item[3]); ?></td>
                    <td><i class="ico-success">&nbsp;</i>可写</td>
                    <td><i class="ico-<?php echo ($item[2]); ?>">&nbsp;</i><?php echo ($item[1]); ?></td>   
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table><?php endif; ?>


            </div>
        </div>
        <footer class="footer navbar-fixed-bottom">
            <div class="container">
                <div>
                	
    <a class="btn btn-success btn-large" href="<?php echo U('Index/index');?>">上一步</a>
    <a class="btn btn-primary btn-large" href="<?php echo U('Install/step2');?>">下一步</a>

                </div>
            </div>
        </footer>
    </body>
</html>
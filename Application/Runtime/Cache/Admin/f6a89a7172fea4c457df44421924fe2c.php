<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="<?php echo C('WEB_SITE_KEYWORD');?>" name="keywords">
	<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>">
	<link rel="shortcut icon" href="/Public/Admin/images/favicon.png">
	<title><?php echo C('WEB_SITE_TITLE');?>--用户中</title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/bootstrap/dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Admin/fonts/font-awesome-4/css/font-awesome.min.css" />
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv-printshiv.js"></script>
		<![endif]-->
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/jquery.nanoscroller/nanoscroller.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/bootstrap.slider/css/slider.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/pygments.css" />
	<!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" />
	
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />

</head>
<body>
<!-- Fixed navbar -->
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="fa fa-gear"></span> </button>
			<a class="navbar-brand" href="#"><span>综合管理后台</span></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<ul class="nav navbar-nav navbar-right user-nav">
				<li class="dropdown profile_menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-2x"></i> <span><?php echo session('user_auth.username');?></span> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo U('Member/password');?>">修改密码</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo U('public/logout');?>">退出</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="cl-wrapper" class="fixed-menu">
	<div class="cl-sidebar">
		<div class="cl-toggle"><i class="fa fa-bars"></i></div>
		<div class="cl-navblock">
			<div class="menu-space">
				<div class="content">
					<!-- 子导航 -->
					
						<ul class="cl-vnavigation">
						<?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i; if(!empty($sub_menu)): if((count($sub_menu)) > "1"): ?><li><a href="#"><i class="<?php echo ($sub_menu[0]['icon']); ?>"></i><span><?php echo ($key); ?></span></a>
										<ul class="sub-menu"><?php endif; ?>
								<?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (u($menu["url"])); ?>"><?php if((count($sub_menu)) == "1"): ?><i class="<?php echo ($menu["icon"]); ?>"></i><span><?php endif; echo ($menu["title"]); if((count($sub_menu)) == "1"): ?></span><?php endif; ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								<?php if((count($sub_menu)) > "1"): ?></ul>
									</li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					
					<!-- /子导航 -->
				</div>
			</div>
			<div class="text-right collapse-button" style="padding:7px 9px;">
				<button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
			</div>
		</div>
	</div>
	
	<div class="page-head">
		<h2>统计</h2>
	</div>
	<div class="cl-mcont">
		<div class="row">
			<div class="col-md-12">
				<div class="block-flat">
					<div class="header">							
						<h3 class="hthin"><?php echo ($meta_title); ?></h3>
					</div>
					<div class="content">
						<div class="col-sm-12">
							<form action="<?php echo U();?>" class="form-horizontal"  method="post">
							<label class="pull-left control-label">开始日期</label>
							<div class="col-sm-3">
								<div class="input-group date starttime" data-min-view="2" data-date-format="yyyy-mm-dd">
									<input type="text" name="starttime" class="form-control" value="<?php echo ((isset($_POST['starttime']) && ($_POST['starttime'] !== ""))?($_POST['starttime']):time_format(NOW_TIME-24*60*60*30,'Y-m-d')); ?>"/>
									<span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
								</div>
							</div>
							<label class="pull-left control-label">结束日期</label>
							<div class="col-sm-3">
								<div class="input-group date endtime" data-min-view="2" data-date-format="yyyy-mm-dd">
									<input type="text" name="endtime" class="form-control" value="<?php echo ((isset($_POST['endtime']) && ($_POST['endtime'] !== ""))?($_POST['endtime']):time_format(NOW_TIME,'Y-m-d')); ?>"/>
									<span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
								</div>
							</div>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-success">确认</button>
							</div>
							</form>
						</div>	
						<table class="no-border blue">
							<thead class="no-border">
								<tr>
									<th>日期</th>
									<th>共计</th>
									<th>支出</th>
									<th>奖励</th>
									<th>实际</th>
								</tr>
							</thead>
							<tbody class="no-border-y">
								<?php if(is_array($income)): $i = 0; $__LIST__ = $income;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><?php echo ($vo['time']); ?></td>
									<td>￥<?php echo ((isset($vo['price']) && ($vo['price'] !== ""))?($vo['price']):0); ?></td>
									<td>￥<?php echo ((isset($vo['buy_price']) && ($vo['buy_price'] !== ""))?($vo['buy_price']):0); ?></td>
									<td>￥<?php echo ((isset($vo['payment']) && ($vo['payment'] !== ""))?($vo['payment']):0); ?></td>
									<td>￥<?php echo ($vo['price']-$vo['buy_price']-$vo['payment']); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>							
					</div>
				</div>				
			</div>
		</div>
	</div>

</div>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.ui/jquery-ui.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.select2/select2.min.js"></script>
<script type="text/javascript" src="/Public/Static/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/js/behaviour/web.js"></script>
<script type="text/javascript" src="/Public/Admin/js/bootstrap/dist/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="/Public/Admin/js/bootstrap.datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript" src="/Public/Admin/js/jquery.flot/jquery.flot.js"></script>
	<script type="text/javascript" src="/Public/Admin/js/jquery.flot/jquery.flot.pie.js"></script>

	<script type="text/javascript">  
		$(".starttime").datetimepicker({autoclose: true,language: 'zh-CN'});
		$(".endtime").datetimepicker({autoclose: true,language: 'zh-CN'});
		function showTooltip(x, y, contents) {
			$("<div id='tooltip'>" + contents + "</div>").css({
			position: "absolute",
			display: "none",
			top: y + 5,
			left: x + 5,
			border: "1px solid #000",
			padding: "5px",
			'color':'#fff',
			'border-radius':'2px',
			'font-size':'11px',
			"background-color": "#000",
			opacity: 0.80
			}).appendTo("body").fadeIn(200);
    	} 
	</script>

</body>
</html>
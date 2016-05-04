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
	
<div>
<div class="page-head">
	<h2>中奖</h2>
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
						<label class="pull-left control-label">产品名称(或用户ID)</label>
						<div class="col-sm-3">
							<input type="text" name="keyword" class="form-control">
						</div>
						<div class="col-sm-2">
							<button type="button" id="search" url="<?php echo U('index?category='.$_GET['category']);?>" class="btn btn-success">搜素</button>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<?php switch($_GET['express']): case "1": ?>已发货<?php break;?>    
									<?php case "2": ?>未发货<?php break;?>    
									<?php default: ?>所有记录<?php endswitch;?>
								<span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo U('index',array('type'=>I('get.type')));?>">所有记录</a></li>
								<li><a href="<?php echo U('index',array('express'=>1,'type'=>I('get.type')));?>">已发货</a></li>
								<li><a href="<?php echo U('index',array('express'=>2,'type'=>I('get.type')));?>">未发货</a></li>
							  </ul>
							</div>
							<div class="btn-group">
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<?php switch($_GET['type']): case "1": ?>系统中奖记录<?php break;?>    
									<?php case "2": ?>用户中奖记录<?php break;?>    
									<?php default: ?>所有中奖记录<?php endswitch;?>
								<span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo U('index',array('express'=>I('get.express')));?>">所有中奖记录</a></li>
								<li><a href="<?php echo U('index',array('type'=>1,'express'=>I('get.express')));?>">系统中奖记录</a></li>
								<li><a href="<?php echo U('index',array('type'=>2,'express'=>I('get.express')));?>">用户中奖记录</a></li>
							  </ul>
							</div>
						</div>
					</div>
					<table class="no-border blue">
						<thead class="no-border">
						<tr>
							<th style="width:30%;">商品</th>
							<th style="width:15%;">期号</th>
							<th style="width:20%;">开奖时间</th>
							<th style="width:10%;">开奖号码</th>
							<th style="width:15%;">中奖用户</th>
							<th class="text-right">操作</th>
						</tr>
						</thead>
						<?php if(!empty($_list)): ?><tbody class="no-border-y">
						<?php if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td style="width:30%;"><a href="/shop/over/id/<?php echo ($vo['id']); ?>" target="_blank"><?php echo ($vo['name']); ?></a></td>
							<td style="width:15%;"><?php echo ($vo["no"]); ?></td>
							<td style="width:20%;"><?php echo (time_format($vo["kaijang_time"])); ?></td>
							<td style="width:10%;"><?php echo ($vo["kaijang_num"]); ?></td>
							<td style="width:15%;"><a class="opiframe" href="#" url="<?php echo U('Period/user',array('uid'=>$vo['uid'],'pid'=>$vo['id']));?>"><?php echo ($vo["user"]["nickname"]); ?></a></td>
							<td class="text-right"><a data-placement="left" data-toggle="tooltip" target="_blank" data-original-title="购买链接" class="label label-warning" href="<?php echo ($vo['buy_url']); ?>"><i class="fa fa-chain"></i></a> <a data-placement="left" data-toggle="tooltip" data-original-title="发货" class="label <?php if(isset($vo['express_no'])): ?>label-default<?php else: ?>label-success<?php endif; ?> opiframe" href="#" url="<?php echo U('Period/edit?id='.$vo['id']);?>" id="pid_<?php echo ($vo['id']); ?>"><i class="fa fa-truck"></i></a> <a data-placement="left" data-toggle="tooltip" data-original-title="晒单" class="label <?php if(($vo['shared']) == "0"): ?>label-default<?php else: ?>label-primary<?php endif; ?> opiframe" href="#" url="<?php echo U('Period/shared?id='.$vo['id']);?>" id="shared_<?php echo ($vo['id']); ?>"><i class="fa fa-camera-retro"></i></a></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
						<?php else: ?>
						<td colspan="6"> aOh! 暂时还没有内容! </td><?php endif; ?>
					</table>
					<div class="content col-lg-12 pull-left">
                        <div class="panel-foot text-center">
                            <div class="page"><?php echo ($_page); ?></div>
                        </div>
					</div>
					<div class="clearfix"></div>
				</div>
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

	<script type="text/javascript" src="/Public/Admin/js/behaviour/weixin.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			highlight_subnav('<?php echo U('Period/index');?>');
			//搜索功能
			$("#search").click(function(){
				var url = $(this).attr('url');
				var query = $(this).parents().prev().children('input').serialize();
		        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
		        query = query.replace(/^&/g,'');
		        if( url.indexOf('?')>0 ){
		            url += '&' + query;
		        }else{
		            url += '?' + query;
		        }
				window.location.href = url;
			});
		});
	</script>

</body>
</html>
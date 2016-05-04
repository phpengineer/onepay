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
	
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/jquery.icheck/skins/square/blue.css" />

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
	<h2>数据备份</h2>
</div>
<div class="cl-mcont">
	<div class="row">
		<div class="col-md-12">
            <div id="top-alert" class="alert alert-success alert-white rounded hidden">
                <div class="icon"><i class="fa fa-check"></i></div>
            </div>
			<div class="block-flat">
                <form id="export-form" method="post" action="<?php echo U('export');?>">
				<div class="header">							
					<h3 class="hthin"><?php echo ($meta_title); ?></h3>
				</div>
				<div class="content">
					<div class="col-sm-12">
						<div>
							<input id="check-all" type="checkbox" name="checkall" style="position: absolute;">
							<a id="export" class="btn btn-success" href="<?php echo U('optimize');?>"><i class="fa fa-upload"></i> 立即备份</a>
							<a id="optimize" class="btn btn-success" href="<?php echo U('optimize');?>"><i class="fa fa-tachometer"></i> 优化表</a>
							<a id="repair" class="btn btn-success" href="<?php echo U('repair');?>"><i class="fa fa-wrench"></i> 修复表</a>
						</div>
					</div>
					<table class="no-border blue">
						<thead class="no-border">
						<tr>
							<th style="width:5%;">选择</th>
							<th style="width:25%;">表名</th>
							<th style="width:15%;">数据量</th>
							<th style="width:15%;">数据大小</th>
							<th style="width:20%;">创建时间</th>
							<th style="width:10%;">备份状态</th>
							<th class="text-right">操作</th>
						</tr>
						</thead>
						<tbody class="no-border-y">
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr>
							<td><input name="tables[]" type="checkbox" value="<?php echo ($table["name"]); ?>"></td>
							<td><?php echo ($table["name"]); ?></td>
							<td><?php echo ($table["rows"]); ?></td>
							<td><?php echo (format_bytes($table["data_length"])); ?></td>
							<td><?php echo ($table["create_time"]); ?></td>
							<td class="info">未备份</td>
							<td class="text-right">
                                <a data-placement="left" data-toggle="tooltip" data-original-title="优化表" class="label label-primary ajax-get no-refresh" href="<?php echo U('optimize?tables='.$table['name']);?>"><i class="fa fa-tachometer"></i></a>
                                <a data-placement="left" data-toggle="tooltip" data-original-title="修复表" class="label label-danger ajax-get no-refresh" href="<?php echo U('repair?tables='.$table['name']);?>"><i class="fa fa-wrench"></i></a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				</div>
                </form>
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

	<script type="text/javascript" src="/Public/Admin/js/jquery.icheck/icheck.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
        highlight_subnav('<?php echo U('Admin/Database/index/type/export');?>');
        var $form = $("#export-form"), $export = $("#export"), tables
            $optimize = $("#optimize"), $repair = $("#repair");
        $optimize.add($repair).click(function(){
            $.post(this.href, $form.serialize(), function(data){
                if(data.status){
                    layer.msg(data.info, {icon: 1});
                } else {
                    layer.msg(data.info, {icon: 2});
                }
            }, "json");
            return false;
        });

        $export.click(function(){
            $export.addClass("disabled");
            $export.html("正在发送备份请求...");
            $.post(
                $form.attr("action"),
                $form.serialize(),
                function(data){
                    if(data.status){
                        tables = data.tables;
                        $export.html(data.info + "开始备份，请不要关闭本页面！");
                        backup(data.tab);
                        window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
                    } else {
                        layer.msg(data.info, {icon: 2});
                        $export.removeClass("disabled");
                        $export.html("<i class='fa fa-upload'></i> 立即备份");
                    }
                },
                "json"
            );
            return false;
        });

        function backup(tab, status){
            status && showmsg(tab.id, "开始备份...(0%)");
            $.get($form.attr("action"), tab, function(data){
                if(data.status){
                    showmsg(tab.id, data.info);

                    if(!$.isPlainObject(data.tab)){
                        $export.removeClass("disabled");
                        $export.html("<i class='fa fa-upload'></i> 备份完成，点击重新备份");
                        window.onbeforeunload = function(){ return null }
                        return;
                    }
                    backup(data.tab, tab.id != data.tab.id);
                } else {
                    layer.msg(data.info, {icon: 2});
                    $export.removeClass("disabled");
                    $export.html("<i class='fa fa-upload'></i> 立即备份");
                }
            }, "json");

        }

        function showmsg(id, msg){
            $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
        }
		
    	$('input').iCheck({
            checkboxClass: 'icheckbox_square-blue checkbox',
            radioClass: 'icheckbox_square-blue'
        });
      
        $("#check-all").on('ifChanged',function(){
            var checkboxes = $("tr td").find(':checkbox');
            if($(this).is(':checked')) {
                checkboxes.iCheck('check');
            } else {
                checkboxes.iCheck('uncheck');
            }
        });
    });
    </script>

</body>
</html>
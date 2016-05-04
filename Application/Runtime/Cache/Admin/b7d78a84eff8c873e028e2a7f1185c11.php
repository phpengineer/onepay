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
	<h2>活动</h2>
</div>
<div class="cl-mcont">
	<div class="row">
		<div class="col-md-12">
			<div class="block-flat">
				<div class="header">							
					<h3 class="hthin"><?php echo ($meta_title); ?></h3>
				</div>
				<div class="content">
					<div class="tab-container">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#basics" data-toggle="tab">基础</a></li>
							<li><a href="#senior" data-toggle="tab">高级</a></li>
						</ul>
						<form action="<?php echo U('save');?>" class="form-horizontal"  method="post">
						<div class="tab-content">
							<div class="tab-pane active" id="basics">
								<div class="form-group">
									<label class="col-sm-2 control-label">活动标识</label>
									<div class="col-sm-6">
										<input type="text" name="name" class="form-control" value="<?php echo ((isset($data["name"]) && ($data["name"] !== ""))?($data["name"]):''); ?>" placeholder="活动标识"/>
										<small>（输入活动标识 英文字母）</small>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">活动名称</label>
									<div class="col-sm-6">
										<input type="text" name="title" class="form-control" value="<?php echo ((isset($data["title"]) && ($data["title"] !== ""))?($data["title"]):''); ?>" placeholder="活动名称"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">活动图片</label>
									<div class="col-sm-6">
										<input type="file" id="upload_picture">
										<input type="hidden" name="picurl" id="picurl" value="<?php echo ((isset($data["picurl"]) && ($data["picurl"] !== ""))?($data["picurl"]):''); ?>"/>
										<div id="shop-pic">
											<img src="<?php echo substr($data['picurl'], 1);?>" class="img-thumbnail" style="height:100px;"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">活动图标</label>
									<div class="col-sm-6">
										<input type="text" name="icon" class="form-control" value="<?php echo ((isset($data["icon"]) && ($data["icon"] !== ""))?($data["icon"]):''); ?>" placeholder="活动图标"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">活动类型</label>
									<div class="col-sm-6">
										<select name="type" class="form-control">
											<?php $_result=get_activity_type(null,true);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(($data['type']) == $key): ?>selected="selected"<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">活动描述</label>
									<div class="col-sm-6">
										<textarea name="remark" class="form-control" rows="5"><?php echo ($data["remark"]); ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">可见性</label>
									<div class="col-sm-6">
										<select class="form-control" name="display">
											<option value="1">可见</option>
											<option value="0">不可见</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">结束时间</label>
									<div class="col-sm-6">
									  <div class="input-group date datetime" data-min-view="2" data-date-format="yyyy-mm-dd">
										<input type="text" name="end_time" class="form-control" value="<?php echo (time_format($data["end_time"],'Y-m-d')); ?>"/>
										<span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
									  </div>					
									</div>
								</div>
							</div>
							<div class="tab-pane" id="senior">
								<div class="form-group">
									<label class="col-sm-2 control-label">活动规则</label>
									<div class="col-sm-8">
										<textarea name="rule" class="form-control" rows="5"><?php echo ($data["rule"]); ?></textarea>
										 <ul class="list-unstyle height text-gray">
											<li>（输入活动规则，不写则只记录日志）</li>
											<li>规则定义  table:$table|field:$field|condition:$condition|rule:$rule[|cycle:$cycle|max:$max][;......]</li>
											<li>table->要操作的数据表，不需要加表前缀</li>
											<li>field->要操作的字段</li>
											<li>condition->操作的条件，目前支持字符串，默认变量<?php echo ($self); ?>为执行活动的用户 <?php echo ($relf); ?></li>
											<li>rule->对字段进行的具体操作，目前支持四则混合运算，如：1+score*2/2-3</li>
											<li>cycle->执行周期，单位（小时），表示$cycle小时内最多执行$max次</li>
											<li>max->单个周期内的最大执行次数（$cycle和$max必须同时定义，否则无效）</li>
										</ul>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">日志规则</label>
									<div class="col-sm-8">
										<textarea name="log" class="form-control" rows="5"><?php echo ($data["log"]); ?></textarea>
										 <ul class="list-unstyle height text-gray">
											<li>（记录日志备注时按此规则来生成，支持[变量|函数]。目前变量有：user,time,model,record,data）</li>
											<li>user：触发活动的用户编号（uid）；time：触发活动的时间（NOW_TIME）；model：触发活动的模型；record：触发活动记录编号</li>
											<li>data：上述变量结合的一个数组array('user'=>$user_id,,'model'=>$model,'record'=>$record_id,'time'=>NOW_TIME)</li>
										</ul>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">web首页模板</label>
									<div class="col-sm-6">
										<input type="text" name="web_index_tpl" class="form-control" value="<?php echo ($data["web_index_tpl"]); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">wap首页模板</label>
									<div class="col-sm-6">
										<input type="text" name="wap_index_tpl" class="form-control" value="<?php echo ($data["wap_index_tpl"]); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">web列表模板</label>
									<div class="col-sm-6">
										<input type="text" name="web_list_tpl" class="form-control" value="<?php echo ($data["web_list_tpl"]); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">wap列表模板</label>
									<div class="col-sm-6">
										<input type="text" name="wap_list_tpl" class="form-control" value="<?php echo ($data["wap_list_tpl"]); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">web内容模板</label>
									<div class="col-sm-6">
										<input type="text" name="web_content_tpl" class="form-control" value="<?php echo ($data["web_content_tpl"]); ?>"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">wap内容模板</label>
									<div class="col-sm-6">
										<input type="text" name="wap_content_tpl" class="form-control" value="<?php echo ($data["wap_content_tpl"]); ?>"/>
									</div>
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button class="btn btn-primary ajax-post" type="submit" target-form="form-horizontal">提 交</button>
								</div>
							</div>
					 	</div>
						</form>
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

	<script type="text/javascript" src="/Public/Admin/js/bootstrap.datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript" src="/Public/Static/uploadify/jquery.uploadify.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".datetime").datetimepicker({autoclose: true,language: 'zh-CN'});
			setValue('display','<?php echo ($data["display"]); ?>');

			$("#upload_picture").uploadify({
				"height"          : 35,
				"swf"             : "/Public/Static/uploadify/uploadify.swf",
				"fileObjName"     : "download",
				"buttonClass"     :  "btn btn-success fa fa-upload no-padding",
				"buttonText"      : " 上传图片",
				"uploader"        : "<?php echo U('Activity/uploadPicture',array('session_id'=>session_id()));?>",
				"width"           : 100,
				'removeTimeout'	  : 1,
				'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
				"onUploadSuccess" : uploadPicture,
				'onFallback' : function() {
					alert('未检测到兼容版本的Flash.');
				}
			});
			function uploadPicture(file, data){
				var data = $.parseJSON(data);
				var src = '';
				if(data.status){
					src = data.url || '' + data.path
					$("#picurl").val(src);
					$("#shop-pic").html(
						'<img src="' + src + '" class="img-thumbnail" style="height:100px;"/>'
					);
				} else {
					layer.msg(data.info, {icon: 2});
				}
			}

			highlight_subnav('<?php echo U('Activity/add');?>');
		});
	</script>

</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>用户注册 - <?php echo ($web_title); ?></title>
    <meta name="description" content="<?php echo ($web_description); ?>" />
    <meta name="keywords" content="<?php echo ($web_keywords); ?>" />
    <link href="<?php echo ($web_tplpath); ?>css/login.css" rel="stylesheet">

    <!--[if lt IE 8]>
  <style type="text/css">
    .searchs {float:left;width:620px}
    .searchs>form {float:left;width:608px;height:35px;display:block}
    .searchs>.hot-search {float:left;display:block;width:608px}
  </style>
  <![endif]-->
  </head>
  <body>
  	<div class="top">
  		<div class="cent">
  			<div class="logo"><img src="<?php echo ($web_logo); ?>" /></div>
  		</div>
  	</div>
    <div class="cent">
    <div class="email">
      <div class="email-more"><h1><span class="icon icon-info-circled"></span>用户激活</h1></div>
      <div class="email-more">您的登录名为：<span class="red"><?php echo ($user); ?></span> 验证信息已发送至注册邮箱为了确保您账户的安全，请验证邮箱并完成注册。</div>
      <div class="email-more"><button class="btn btn-bigs btn-yellow ajax-get" url="<?php echo U('public/againmail?uid='.$uid);?>">再次发送</button></div>
    </div>
  </div>
  	
  <div class="footer">Copyright &copy; 2015 <?php echo ($web_title); ?> <?php echo ($web_url); ?> 版权所有 <?php echo ($web_icp); ?></div>
	
  <!--[if lt IE 9]>
  <script src="<?php echo ($web_tplpath); ?>js/jquery.pseudo.js"></script>
  <![endif]-->

  <script src="<?php echo ($web_tplpath); ?>js/jquery.min.js"></script>
  <script type="text/javascript">var tplpath='<?php echo ($web_tplpath); ?>'</script>
  <script src="/Public/Static/layer/layer.js"></script>
  <script src="<?php echo ($web_tplpath); ?>js/ajax.js"></script>

  </body>
</html>
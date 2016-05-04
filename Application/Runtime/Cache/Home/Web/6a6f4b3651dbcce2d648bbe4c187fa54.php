<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title><?php echo ($list_webtitle); ?></title>
    <meta name="description" content="<?php echo ($list_description); ?>" />
    <meta name="keywords" content="<?php echo ($list_keywords); ?>" />
    <link href="<?php echo ($web_tplpath); ?>css/oenpay.css" rel="stylesheet">
    <!--[if lt IE 8]>
	<style type="text/css">
		.searchs {float:left;width:620px}
		.searchs>form {float:left;width:608px;height:35px;display:block}
		.searchs>.hot-search {float:left;display:block;width:608px}
	</style>
	<![endif]-->
  </head>
  <body>
    
  	<!--[if lt IE 9]>
  	<div class="chrome">您的浏览器版本太低啦~请升级您的浏览器。本站推荐<a href="http://liulanqi.baidu.com/" class="a1" target="_blank">百度浏览器</a> <a href="http://liulanqi.baidu.com/" class="a1" target="_blank">点击下载</a></div>
<![endif]-->
<div class="top-line">
	<div class="g-wrap">
		<div class="tl-left">欢迎来到<?php echo ($web_title); ?>！</div>
		<div class="tl-right">
			<?php if(isset($_SESSION['hx_users']['user_auth'])): ?><a href="<?php echo U('user/index');?>"><?php echo session('user_auth')['username'];?></a> 
			<a href="<?php echo U('user/index');?>">我的夺宝</a>
			<a href="<?php echo U('public/logout');?>">[ 退出 ]</a>
			<?php else: ?>
			<a href="<?php echo U('public/login');?>">请登录</a> 
			<a href="<?php echo U('public/reg');?>">免费注册</a><?php endif; ?>
		</div>
	</div>
</div>
<div class="top-back">
	<!-- LOGO 开始 -->
  	<div class="container">
		<div class="logos">
			<div class="logo"><img src="<?php echo ($web_logo); ?>" /></div>
			<div class="top-qrcode">
				<?php if(isset($_GET['wid'])): ?><div class="qrcodes"></div>
				<?php else: ?>
					<div class="qrcodes"><img src="/Template/Web/images/qrcode.gif" /></div><?php endif; ?>
			</div>
			<div class="top-people"></div>
		</div>
  	</div>
	<!-- LOGO 结束 -->
	<!-- 导航开始 -->
	<div class="navbar category">
		<div class="container sNav">
			<div class="navbar-all-class class-hidden">
  				<a href="#">全部商品分类</a>
  				<div class="left-class left-cl-hidden">
	  				<a href="<?php echo U('list/index/');?>"><span class="icon icon-star-empty"></span>全部商品</a>
	  				<?php $_result=R('list/type');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('list/index/?id='.$vo['id']);?>"><span class="<?php echo ($vo['icon']); ?>"></span><?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
  			</div>
			<div class="navbar-class"><a href="<?php echo U('index/index');?>">首页</a></div>
			<div class="navbar-class"><a href="<?php echo U('user/announced');?>">最新揭晓</a></div>
			<div class="navbar-class"><a href="<?php echo U('user/displays');?>">晒单分享</a></div>
			<div class="navbar-class navbar-message"><a href="<?php echo U('activity/index');?>">发现</a></div>
			<div class="navbar-class"><a href="<?php echo U('user/guide');?>">新手引导</a></div>
			<?php if(isset($_GET['wid'])): if(!empty($menu_url)): ?><div class="navbar-class"><a href="<?php echo ($menu_url); ?>"><?php echo ($menu_name); ?></a></div><?php endif; endif; ?>
		</div>
	</div>
</div>
	  	<!-- 导航结束 -->
	<div class="top-backs">
	  	<div class="container">
			<!-- 所在位置 - 开始 -->
			<div class="w-dir"><a href="<?php echo U('index/index');?>">首页</a> &gt; <?php if(!empty($name)): echo ($ctitle); else: ?>所有商品<?php endif; ?></div>
			<!-- 所在位置 - 结束 -->


			<!-- 所有分类 - 开始 -->
			<div class="all-class">
				<div class="all-class-title">所有分类 </div>
				<div class="all-class-nav <?php if(empty($_GET['id'])): ?>active<?php endif; ?>">
					<a href="<?php echo U('list/index/');?>">
						<span>
							<i class="icon icon-star-empty first"></i>
							<i class="icon icon-star-empty second"></i>
						</span>
						<b>所有商品</b>
					</a>
				</div>
				<?php $_result=R('list/type');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="all-class-nav <?php if(($_GET['id']) == $vo['id']): ?>active<?php endif; ?>">
					<a href="<?php echo U('list/index/?id='.$vo['id']);?>">
						<span>
							<i class="<?php echo ($vo['icon']); ?> first"></i>
							<i class="<?php echo ($vo['icon']); ?> second"></i>
						</span>
						<b><?php echo ($vo['title']); ?></b>
					</a>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<!-- 所有分类 - 结束 -->
	  	</div>

  	</div>

  	<div class="container">
  		<div class="desc">
  			排序：
  			<a href="#" class="inline active" order="shop.hits|desc">人气商品</a>
  			<a href="#" class="inline" order="period.number/shop.price*100|desc">剩余人次</a>
  			<a href="#" class="inline" order="id|desc">最新商品</a>
  			<a href="#" class="inline" order="shop.price|asc">总需人次 <span class="icon icon-angle-down"></span></a>
  			<a href="#" class="inline" order="shop.price|desc">总需人次 <span class="icon icon-angle-up"></span></a>
  		</div>
  	</div>

  	<div class="container" id="shoplist">
  		<!-- 产品列表开始 -->
  		<?php if(is_array($shop)): $i = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="ls-product-list">
			<?php if(($vo['position']) == $pos): ?><div class="float-title">推荐夺宝</div><?php endif; ?>
			<div class="topimg"><a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["pic"]); ?>" /></a></div>
			<div class="reco-ls"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a></div>
			<div class="reco-ls huise">总需：<?php echo ($vo["price"]); ?> 人次</div>
				<div class="progress">
				    <span class="orange" style="width: <?php echo ($vo["jd"]); ?>%;"></span>
				</div>
			<div class="reco-nb huise">
				<div class="reco-lnb"><?php echo ($vo["number"]); ?><br>已参与人次</div>
				<div class="reco-rnb"><?php echo ($vo['surplus']); ?><br>剩余人次</div>
			</div>
			<form action="<?php echo U('pay/index');?>" method="post" target="_blank">
			<div class="reco-bottom">
				<div class="ro-goods">
					我要参与：
					<div class="ro-goods-inputs">
						<input value="<?php echo ($vo['pid']); ?>" name="pid" type="hidden">
						<input type="type" value="1" surplus="<?php echo ($vo['surplus']); ?>" name="number">
						<a href="javascript:;" class="ro-jia"><span class="icon icon-minus"></span></a>
						<a href="javascript:;" class="ro-jian"><span class="icon icon-plus"></span></a>
					</div> 
					人次
				</div>
				<div class="reco-ls-btn"><button class="btn btn-pink" type="submit">立即夺宝</button></div>
			</div>
			</form>
  		</div><?php endforeach; endif; else: echo "" ;endif; ?>
  		<!-- 产品列表结束 -->
  	</div>
  	<div class="message-fixed">
		<div>
			<div class="icons">
				<span class="wx"></span>
				<b>关注微信</b>
			</div>
			<div class="tanchu">
				<?php if(isset($_GET['wid'])): ?><div class="qrcodes"></div>
				<?php else: ?>
					<img src="<?php echo ($web_tplpath); ?>images/qrcode.jpg" width="160" height="160"><?php endif; ?>
				<span class="wxtxt">扫描上方二维码关注我们</span>
			</div>
		</div>
		<div id="moquu_top">
			<div class="icons">
				<span class="top"></span>
				<b>返回顶部</b>
			</div>
		</div>
	</div>
  	<div class="clear"></div>
  	<div class="bottom">
	<div class="container">
		<div class="bot-left">
			<h3>
				<span class="icon icon-leanpub"></span>
				新手指南
			</h3>
			<ul>
				<li><a href="<?php echo U('news/more/id/1');?>">了解<?php echo ($web_title); ?>平台</a></li>
				<li><a href="<?php echo U('news/more/id/2');?>">服务协议</a></li>
				<li><a href="<?php echo U('news/more/id/3');?>">常见问题</a></li>
				<li><a href="<?php echo U('news/more/id/4');?>">推广赚钱</a></li>
			</ul>
		</div>
		<div class="bot-left">
			<h3>
				<span class="icon icon-dunpai"></span>
				欢乐保障
			</h3>
			<ul>
				<li><a href="<?php echo U('news/more/id/5');?>">公平保障</a>
				</li>
				<li><a href="<?php echo U('news/more/id/6');?>">公正保障</a></li>
				<li><a href="<?php echo U('news/more/id/7');?>">公开保障</a></li>
				<li><a href="<?php echo U('news/more/id/8');?>">安全支付</a></li>
			</ul>
		</div>
		<div class="bot-left">
			<h3>
				<span class="icon icon-truck"></span>
				商品配送
			</h3>
			<ul>
				<li><a href="<?php echo U('news/more/id/9');?>">配送费用</a></li>
				<li><a href="<?php echo U('news/more/id/10');?>">商品验收与签收</a></li>
				<li><a href="<?php echo U('news/more/id/11');?>">发货未收到商品</a></li>
				<li><a href="<?php echo U('news/more/id/12');?>">商品配送</a></li>
			</ul>
		</div>
		<div class="bot-left">
			<h3>
				<span class="icon icon-github"></span>
				关于我们
			</h3>
			<ul>
				<li><a href="<?php echo U('news/more/id/13');?>">关于我们</a></li>
				<?php if(empty($_GET['wid'])): ?><li><a href="<?php echo U('news/more/id/14');?>">公司证件</a></li><?php endif; ?>
			</ul>
		</div>
		<div class="bot-right">
			<div class="bot-gongping">
				<span class="icon icon-zhngpin"></span> <i>100%正品保证</i>
			</div>
			<div class="bot-gongping">
				<span class="icon icon-gongpin"></span> <i>100%公平公正公开</i>
			</div>
			<div class="bot-gongping">
				<span class="icon icon-gongzheng"></span>
				<i>100%权益保障</i>
			</div>
		</div>
		<div class="bot-qrcode">
			<?php if(isset($_GET['wid'])): ?><div class="qrcodes"></div>
			<?php else: ?>
				<img src="<?php echo ($web_tplpath); ?>images/qrcode.jpg"><?php endif; ?>
			<span>关注微信随时随地来夺宝</span>
		</div>

		<div class="copyright">
			Copyright &copy; 2015 <?php echo ($web_title); ?> <?php echo ($web_url); ?> 版权所有 <?php echo ($web_icp); ?>
		</div>
	</div>
</div>
<div style="display: none">
<?php if(isset($_GET['wid'])): echo htmlspecialchars_decode($web_tongji); endif; ?>
</div>
  	<script type="text/javascript">
        var ThinkPHP = window.Think = {
			"APP"    : "/index.php",
			"PATTEM" : "<?php echo C('WEB_PATTEM');?>",
			"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>",
			"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
			"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        };
        var htmltype='shoplist',pos=<?php echo ($pos); ?>;
    </script>;
	<script src="<?php echo ($web_tplpath); ?>js/jquery.min.js"></script>
	<script src="<?php echo ($web_tplpath); ?>js/jquery.cxscroll.min.js"></script>
	<script src="/Public/Static/think.js"></script>
	<script src="<?php echo ($web_tplpath); ?>js/script.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo ($web_tplpath); ?>js/jquery.pseudo.js"></script>
	<![endif]-->
	<?php if(isset($_GET['wid'])): ?><script src="/Public/Static/qrcode.min.js"></script>
		<script type="text/javascript">
			$('.qrcodes').qrcode("http://www.1yuanjiang.com?wid=<?php echo ($_GET['wid']); ?>");
		</script><?php endif; ?>
  </body>
</html>
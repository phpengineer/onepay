<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>新手帮助 - <?php echo ($web_title); ?></title>
    <link href="<?php echo ($web_tplpath); ?>css/oenpay.css" rel="stylesheet">
    <link href="<?php echo ($web_tplpath); ?>css/news.css" rel="stylesheet" />

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
  	<div class="container">
  		<div class="newbei-top">
      <div class="newbei-text">— 30秒了解<?php echo ($web_title); ?> —</div>  
      </div>
  		<div class="newbei-cen">
  			<div class="o1">选择一款商品，点击“立即夺宝”</div>
  			<div class="o2">支付1元，购买1人次，获得1个“夺宝码”</div>
  			<div class="o3">当一件商品达到总参与人次，抽出1名商品获得者；</div>
  			<img src="<?php echo ($web_tplpath); ?>images/xinshou02.jpg" />
  			<img src="<?php echo ($web_tplpath); ?>images/xinshou03.jpg" />
  			<img src="<?php echo ($web_tplpath); ?>images/xinshou04.jpg" />
  			<h3><?php echo ($web_title); ?>规则</h3>
  			<div class="navser">
  				每件商品参考市场价平分成相应“等份”，每份1元，1份对应1个夺宝码。<br>
				同一件商品可以购买多次或一次购买多份。<br>
				当一件商品所有“等份”全部售出后计算出“幸运号码”，拥有“幸运号码”者即可获得此商品。
  			</div>
  			<h3>幸运号码计算方式</h3>
  			<div class="navser">
  				取该商品最后购买时间前网站所有商品50条购买时间记录（限时揭晓商品取截止时间前网站所有商品50条购买时间记录）。<br>
				时间按时、分、秒、毫秒依次排列组成一组数值。<br>
				将这50组数值之和除以商品总需参与人次后取余数，余数加上10,000,001即为“幸运号码”。
  			</div>
  		</div>
  		<div class="newbei-bot"></div>
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
	<script src="<?php echo ($web_tplpath); ?>js/jquery.min.js"></script>
	<!--[if lt IE 9]>
  <script src="<?php echo ($web_tplpath); ?>js/jquery.pseudo.js"></script>
  <![endif]-->
  <?php if(isset($_GET['wid'])): ?><script src="/Public/Static/qrcode.min.js"></script>
    <script type="text/javascript">
      $('.qrcodes').qrcode("http://www.1yuanjiang.com?wid=<?php echo ($_GET['wid']); ?>");
    </script><?php endif; ?>
  </body>
</html>
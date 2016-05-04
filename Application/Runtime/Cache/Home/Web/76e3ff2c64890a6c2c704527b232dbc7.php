<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>支付订单 - <?php echo ($web_title); ?></title>
    <meta name="description" content="<?php echo ($web_description); ?>" />
    <meta name="keywords" content="<?php echo ($web_keywords); ?>" />
    <link href="<?php echo ($web_tplpath); ?>css/oenpay.css" rel="stylesheet">
    <link href="<?php echo ($web_tplpath); ?>css/cart.css" rel="stylesheet" />

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
  	<div class="top-backs">
	  	<!-- 导航结束 -->
	  	<?php if(!empty($pay['order']['pid'])): ?><div class="container">
	  		<!-- 分步显示开始 -->
	  		<div class="step">
	  			<ul class="active">
	  				<i>1</i>
	  				<li></li>
	  				<b></b>
	  				<small>选择商品</small>
	  			</ul>
	  			<ul class="active">
	  				<i>2</i>
	  				<li></li>
	  				<b></b>
	  				<small>支付订单</small>
	  			</ul>
	  			<ul class="active">
	  				<i>3</i>
	  				<li></li>
	  				<b></b>
	  				<small>获得号码，等待开奖</small>
	  			</ul>
	  			<ul>
	  				<i>4</i>
	  				<li></li>
	  				<b></b>
	  				<small>揭晓幸运码</small>
	  			</ul>
	  			<ul>
	  				<i>5</i>
	  				<li></li>
	  				<b></b>
	  				<small>商品派发</small>
	  			</ul>
	  			<span></span>
	  		</div>
	  		<!-- 分步显示结束 -->
	  	</div>
	  	<?php else: ?>
	  	<div class="container">
	  		<!-- 分步显示开始 -->
	  		<div class="step">
	  			<ul class="active">
	  				<i>1</i>
	  				<li></li>
	  				<b></b>
	  				<small>充值数量</small>
	  			</ul>
	  			<ul class="active">
	  				<i>2</i>
	  				<li></li>
	  				<b></b>
	  				<small>支付订单</small>
	  			</ul>
	  			<ul class="active">
	  				<i>3</i>
	  				<li></li>
	  				<b></b>
	  				<small>充值完成</small>
	  			</ul>
	  			<ul>
	  				<i>4</i>
	  				<li></li>
	  				<b></b>
	  				<small>购买商品</small>
	  			</ul>
	  			<span></span>
	  		</div>
	  		<!-- 分步显示结束 -->
	  	</div><?php endif; ?>
  	</div>

  	<div class="container">
  		<div class="message">
  			<?php if(($pay['order']['code']) == "OK"): if(!empty($pay['order']['pid'])): ?><span class="ms-icon"><i class="icon icon-ok"></i></span>
		  			<h1>恭喜您，参与成功！请等待系统为您揭晓！</h1>
		  			<small><a href="<?php echo U('user/index');?>" class="a3">查看夺宝记录</a></small>
		  			<div class="mes">
		  				您现在可以 <a href="<?php echo U('index/index');?>" class="a3">返回首页</a><br>
		  				您成功参与了<span class="red"><?php echo ($pay['order']['number']); ?></span>人次夺宝，信息如下：
		  			</div>
	  			<?php else: ?>
		  			<span class="ms-icon"><i class="icon icon-ok"></i></span>
		  			<h1>恭喜您，充值成功！</h1>
		  			<div class="mes">
		  				您现在可以 <a href="<?php echo U('index/index');?>" class="a3">返回首页</a> <a href="<?php echo U('list/index');?>" class="a3">购买商品</a><br>
		  			</div><?php endif; ?>
  			<?php else: ?>
  				<span class="ms-icon"><i class="icon icon-cancel"></i></span>
		  		<h1>购买失败！</h1>
		  		<small><?php echo ($pay['order']['msg']); ?></small><?php endif; ?>
  		</div>
		<?php if(($pay['order']['code']) == "OK"): if(!empty($pay['order']['pid'])): ?><table class="w-table c-table">
			        <thead>
			            <tr>
			            	<th class="t-left">支付时间</th>
			                <th class="t-left">商品名称</th>
			                <th>商品期号</th>
			                <th>参与人次</th>
			            </tr>
			        </thead>
			        <tbody>
			            <tr>
			            	<td><?php echo time_format($pay['order']['create_time'],'Y-m-d H:i:s');?></td>
			                <td><a href="<?php echo ($pay['shop']['url']); ?>" class="a3"><?php echo ($pay['shop']['name']); ?></a></td>
			                <td class="t-center"><?php echo ($pay['shop']['no']); ?></td>
			                <td class="t-center"><?php echo ($pay['order']['number']); ?>人次</td>
			            </tr>
			        </tbody>
			    </table>
			    <table class="w-table c-table" style="width: 1170px;margin-top:0px;border-top:0px">
					<tbody>
			            <tr>
			            	<td width="10%" align="right">当期号码：</td>
			            	<td width="90%">
			            		<?php if(is_array($pay['record'])): $i = 0; $__LIST__ = $pay['record'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class="pay-nbs1"><?php echo ($vo); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
			            	</td>
			            </tr>
			        </tbody>
			    </table><?php endif; endif; ?>
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
	<script src="<?php echo ($web_tplpath); ?>js/pay.js"></script>
	<?php if(isset($_GET['wid'])): ?><script src="/Public/Static/qrcode.min.js"></script>
		<script type="text/javascript">
			$('.qrcodes').qrcode("http://www.1yuanjiang.com?wid=<?php echo ($_GET['wid']); ?>");
		</script><?php endif; ?>
	<!--[if lt IE 9]>
	<script src="j<?php echo ($web_tplpath); ?>s/jquery.pseudo.js"></script>
	<![endif]-->
  </body>
</html>
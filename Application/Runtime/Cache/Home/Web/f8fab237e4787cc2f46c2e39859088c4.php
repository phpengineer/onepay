<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title><?php echo ($name); ?> - <?php echo ($shop_webtitle); ?></title>
    <meta name="description" content="<?php echo ($shop_description); ?>" />
    <meta name="keywords" content="<?php echo ($shop_keywords); ?>" />
    <link href="<?php echo ($web_tplpath); ?>css/oenpay.css" rel="stylesheet">
    <link href="<?php echo ($web_tplpath); ?>css/jquery.mCustomScrollbar.css" rel="stylesheet" />
	<link href="<?php echo ($web_tplpath); ?>css/product.css" rel="stylesheet" />
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
	  	<div class="container">
			<!-- 所在位置 - 开始 -->
			<div class="w-dir"><a href="<?php echo U('index/index');?>">首页</a> &gt; <a href="<?php echo U('list/index');?>">全部商品</a> &gt;  <a href="<?php echo U('list/index?id='.$cid);?>"><?php echo ($ctitle); ?></a> &gt;  <?php echo ($name); ?> [期号：<?php echo ($no); ?>]</div>
			<!-- 所在位置 - 结束 -->
	  	</div>
  	</div>


  	<div class="container">
  		<div class="porduct-block">
  			<!-- 产品放大镜开始 -->
  			<div class="product-show">
  				<div class="preview">
					<div id="vertical" class="bigImg">
						<img src="<?php echo ($pic); ?>" width="400" height="400" alt="" id="midimg" />
						<div style="display:none;" id="winSelector"></div>
					</div>
					<!--bigImg end-->
				</div>
  			</div>
  			<!-- 产品放大镜结束 -->

  			<h1 class="porduct-h2"><?php echo ($name); ?> <span class="red">颜色随机 支持专柜验货</span></h1>
  			<div class="product-naving">
  				<div class="reco-ls huise">总需：<span class="big black"><?php echo ($price); ?></span> 人次</div>
				<div class="progress">
				    <span class="orange" style="width: <?php echo ($jd); ?>%;"></span>
				</div>
				<div class="reco-nb huise">
					<div class="reco-lnb"><span class="big black"><?php echo ($number); ?></span><br>已参与人次</div>
					<div class="reco-rnb"><span class="big black"><?php echo ($surplus); ?></span><br>剩余人次</div>
				</div>
				<div class="porduct-reco"><b class="blue"><?php echo ($number); ?></b>人次已参与，赶快去参加吧！剩余<b class="red"><?php echo ($surplus); ?></b>人次</div>
				<form action="<?php echo U('pay/index');?>" method="post">
				<div class="ro-goods reco-ing">
					我要参与：
					<div class="ro-goods-inputs">
						<input value="<?php echo ($pid); ?>" name="pid" type="hidden">
						<input type="type" value="1" surplus="<?php echo ($surplus); ?>" name="number">
						<a href="javascript:;" class="ro-jia"><span class="icon icon-minus"></span></a>
						<a href="javascript:;" class="ro-jian"><span class="icon icon-plus"></span></a>
					</div> 
					人次
					<div class="increase">最大参与<?php echo ($surplus); ?>人次，夺宝在望！</div>
				</div>
				<div class="reco-ls-btn product-nav-btn"><button class="btn btn-pink btn-big" type="submit">立即夺宝</button></div>
				</form>
				<div class="shareto">
					<div class="text">分享到：</div>
					<div class="bdsharebuttonbox">
						<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
						<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
						<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
						<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
						<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
					</div>
				</div>
  			</div>
  			<?php if(empty($_SESSION['hx_users']['user_auth'])): ?><div class="my-codes my-codes-long">
				<div class="no-login"><a href="<?php echo U('public/login');?>" class="a3">请登录</a>，查看你的夺宝号码！</div>
			</div>
			<?php else: ?>
				<div class="my-codes my-codes-long">
					<?php if(empty($user_no)): ?>您没有参与本次夺宝哦!
					<?php else: ?>
						您参与了：<span class="red"><?php echo (count($user_no)); ?></span>人次
						<div class="numbers">夺宝号码：</div>
						<?php if(is_array($user_no)): $i = 0; $__LIST__ = array_slice($user_no,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><span class="nb-list-my"><?php echo ($no); ?> </span><?php endforeach; endif; else: echo "" ;endif; ?>
						<span class="nb-list-my"><a href="javascript:;" class="user_num a3">查看所有号码</a></span><?php endif; ?>
  				</div><?php endif; ?>
  		</div>
  		<div class="porduct-rg-block">
  			<h3>开奖信息</h3>
  			<div class="por-block pro-block1 history" url="<?php echo U('shop/history?sid='.$sid);?>" no="<?php echo ($no); ?>" maxno="<?php echo ($count['maxno']); ?>" minno="<?php echo ($count['minno']); ?>">
  				<div class="pro-block-numbers" no="{{shop_no}}">
  					<a href="javascript:void(0)" class="pbn-left"><i class="icon icon-left-open"></i></a>
  					<span class="pbn-center">期号：{{shop_no}}</span>
  					<a href="javascript:void(0)" class="pbn-right"><i class="icon icon-right-open"></i></a>
  				</div>
  				<div class="user-img"><img class="notimg" src="{{shop_img}}"></div>
  				<div class="user-zj-name">恭喜 <a href="{{shop_user_url}}" class="a3">{{shop_name}}</a> <span class="green">({{shop_address}})</span> 获得了 <span class="red"><?php echo ($name); ?></span></div>
  				<hr>
  				<div class="user-zj-text">用户ID：{{shop_id}}(用户唯一不变标识)</div>
  				<div class="user-zj-text">幸运号码：<b class="red">{{shop_kaijang_num}}</b></div>
  				<div class="user-zj-text">本期参与：<b class="red">{{shop_count}}</b>人次</div>
  				<div class="user-zj-text">揭晓时间：<span class="huise">{{shop_time}}</span></div>
  				<div class="bottom-btn" style="padding-top:14px;padding-bottom: 16px">
  					<a href="{{shop_url}}" class="btn btn-yellow">查看详情</a>
  				</div>
  			</div>
  		</div>
  		<div class="clear"></div>
  	</div>

  	<div class="container">
		<div class="product-nav-t">
			<ul class="tabs-tab">
				<li class="current">商品详情</li>
				<li>所有参与记录</li>
				<li>晒单</li>
			</ul>
			<div class="product-content">
				<div class="tabs-panel-item">
					<div class="product-show-nav">
						<?php echo stripslashes(htmlspecialchars_decode($content));?>
					</div>

				</div>
				<div class="tabs-panel-item">
					<div class="recordlist recordScrollbar">
						<div class="clock">
							<i class="icon icon-clock"></i>
						</div>
						<div class="record-list" url="<?php echo U('shop/record?pid='.$pid);?>">
							<ul>
								<li>
									<div class="time">{{shop_time}}</div>
									<span class="time-dian"></span>
									<div class="avatar">
										<div class="record">
											<div class="userimgs"><img class="notimg" src="{{shop_img}}"></div>
											<a href="{{shop_user_url}}" class="a3">{{shop_name}}</a>
											({{shop_address}}) 参与了<span class="red">{{shop_count}}人次</span>
											<div class="mores">
												所有夺宝号码 <span class="icon icon-down-open"></span>
											</div>
											<div class="numbers each">
												<span>{{shop_number}}</span>
											</div>
											<div class="colse-nb"><span class="icon icon-cancel"></span></div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tabs-panel-item shareScrollbar">
					<div class="detail-shareList">
						<ul class="share-list" url="<?php echo U('user/displays?sid='.$sid);?>">
							<li class="user-images"><img class="notimg" src="{{shop_img}}"></li>
							<li class="sharenav">
								<h5><a href="{{shop_user_url}}">{{shop_name}}</a></h5>
								<div class="share-time">{{shop_time}}</div>
								<a href="{{shop_url}}" class="text">{{shop_content}}</a>
								<a href="{{shop_url}}">
								<div class="share-img each">
									<span class="share-center"></span><img class="notimg" src="{{shop_thumbpic}}">
								</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
  			<div class="clear"></div>
		</div>
  	</div>

  	<div class="back-black users" style="display: none;">
  		<div class="more-number">
  			<div class="monu-heard">
  				<i class="icon icon-cancel close users"></i>
  			</div>
  			<div class="monu-body">
  				<h3>您本期总共参与了<span class="red"><?php echo (count($user_no)); ?></span>人次</h3>
  				<dl class="content mCustomScrollbar light" data-mcs-theme="minimal-dark">
  					<?php if(is_array($user_no)): $i = 0; $__LIST__ = $user_no;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><dd class="nb-list-my"><?php echo ($no); ?> </dd><?php endforeach; endif; else: echo "" ;endif; ?>
  				</dl>
  			</div>
  		</div>
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
	<script src="<?php echo ($web_tplpath); ?>js/jquery.min.js"></script>
	<script src="<?php echo ($web_tplpath); ?>js/jquery.cxscroll.min.js"></script>
	<script src="<?php echo ($web_tplpath); ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript">var htmltype;</script>
	<script src="<?php echo ($web_tplpath); ?>js/script.js"></script>
	<?php if(isset($_GET['wid'])): ?><script src="/Public/Static/qrcode.min.js"></script>
		<script type="text/javascript">
			$('.qrcodes').qrcode("http://www.1yuanjiang.com?wid=<?php echo ($_GET['wid']); ?>");
		</script><?php endif; ?>
	<!--[if lt IE 9]>
	<script src="<?php echo ($web_tplpath); ?>js/jquery.pseudo.js"></script>
	<![endif]-->
	<script type="text/javascript">
		// 弹出层
		$(".user_num").click(function(){
			$(".back-black.users").show();
		});
		// 关闭弹出层.
		$(".close.users").click(function(){
			$(".back-black.users").hide();
		});
		var text="1元就买了个腰子6，不信你就往前走，别回头。只要1元，进来了就不后悔，进来了就不上当。大到家用电器，小到针头线脑一律只要1元。1元就能实现梦想，走向人生巅峰迎娶百富美。";
		window._bd_share_config={"common":{"bdSnsKey":{},"bdText":text,"bdDesc":text,"bdMini":"1","bdMiniList":false,"bdPic":"<?php echo ($web_url); ?>/wx-logo.png","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
	</script>
  </body>
</html>
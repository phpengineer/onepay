<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title><?php echo ($web_title); ?></title>
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
	  	<div class="container">
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
	  			<ul>
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
  	</div>

  	<div class="container">
  		<form action="" method="post">
  		<table class="w-table c-table">
	        <thead>
	            <tr>
	                <th class="t-left">商品名称</th>
	                <th>商品期号</th>
	                <th>总需人次</th>
	                <th>参与人次</th>
	                <th>小计</th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr>
	            	<td><a href="<?php echo ($shop["url"]); ?>" class="a3"><?php echo ($shop["name"]); ?></a></td>
	                <td class="t-center"><?php echo ($shop["no"]); ?></td>
	                <td class="t-center"><?php echo ($shop["price"]); ?>人次</td>
	                <td class="t-center"><?php echo ($price); ?>人次</td>
	                <td class="t-center red"><?php echo ($price); echo ($web_currency); ?></td>
	            </tr>
	            <tr>
	            	<td colspan="5" align="right" class="pay-nb">支付金额：<big class="red">￥<?php echo ($price); ?></big> 元</td>
	            </tr>
	            <tr>
	            	<td colspan="5">
	            		<div class="pay-table">
				        	<div class="pay-title">
				        		<b <?php if(($black) >= $price): ?>class="active"<?php endif; ?>>余额支付</b>
				        		<b <?php if(($black) < $price): ?>class="active"<?php endif; ?>>微信支付</b>
				        		<b>支付宝支付</b>
				        		<b>借记卡</b>
				        		<b>信用卡</b>
				        	</div>
				        	<div class="pay-nav">
				        		<h5>余额支付</h5>
				        		<label class="pay-label <?php if(($black) >= $price): ?>active<?php endif; ?>" title="余额支付">
				        			<span class="pays"><big class="red"><i class="icon icon-006 yellow"></i> <?php echo ($black); ?></big> <?php echo ($web_currency); ?>。</span>
				        		</label>
				        	</div>
				        	<?php if(!empty($wx_pay)): ?><div class="pay-nav">
					        		<h5>微信支付</h5>
					        		<label class="pay-label <?php if(($black) < $price): ?>active<?php endif; ?>" title="微信支付">
					        			<span class="wx" data-paytype="2"></span>
					        		</label>
					        	</div><?php endif; ?>
				        	<?php if(!empty($ali_pay)): ?><div class="pay-nav">
					        		<h5>支付宝支付</h5>
					        		<label class="pay-label <?php if(($black) < $price): ?>active<?php endif; ?>" title="支付宝支付">
					        			<span class="alipay" data-paytype="3"></span>
					        		</label>
					        	</div><?php endif; ?>
				        	<?php if(!empty($band_pay)): ?><div class="pay-nav">
					        		<h5>网银支付 <small>需要开通网上银行</small></h5>
					        		<label class="pay-label" title="中国工商银行">
					        			<span class="ICBC" data-paytype="1025"></span>
					        		</label>
					        		<label class="pay-label" title="中国建设银行">
					        			<span class="CCB" data-paytype="1051"></span>
					        		</label>
					        		<label class="pay-label" title="中国银行">
					        			<span class="BOC" data-paytype="104"></span>
					        		</label>
					        		<label class="pay-label" title="中国农业银行">
					        			<span class="ABC" data-paytype="103"></span>
					        		</label>
					        		<label class="pay-label" title="交通银行">
					        			<span class="BCM" data-paytype="3407"></span>
					        		</label>
					        		<label class="pay-label" title="中国邮政储蓄银行">
					        			<span class="PSBC" data-paytype="3230"></span>
					        		</label>
					        		<label class="pay-label" title="招商银行">
					        			<span class="CMB" data-paytype="3080"></span>
					        		</label>
					        		<label class="pay-label" title="中信银行">
					        			<span class="CITIC" data-paytype="313"></span>
					        		</label>
					        		<label class="pay-label" title="浦发银行">
					        			<span class="SPDB" data-paytype="314"></span>
					        		</label>
					        		<label class="pay-label" title="兴业银行">
					        			<span class="CIB" data-paytype="309"></span>
					        		</label>
					        		<label class="pay-label" title="中国民生银行">
					        			<span class="CMBC" data-paytype="305"></span>
					        		</label>
					        		<label class="pay-label" title="中国光大银行">
					        			<span class="CEB" data-paytype="312"></span>
					        		</label>
					        		<label class="pay-label" title="平安银行">
					        			<span class="PAB" data-paytype="307"></span>
					        		</label>
					        		<label class="pay-label" title="上海银行">
					        			<span class="BOS" data-paytype="326"></span>
					        		</label>
					        		<label class="pay-label" title="华夏银行">
					        			<span class="HXB" data-paytype="311"></span>
					        		</label>
					        		<label class="pay-label" title="北京银行">
					        			<span class="BOB" data-paytype="310"></span>
					        		</label>
					        		<label class="pay-label" title="广发银行">
					        			<span class="CGB" data-paytype="3061"></span>
					        		</label>
					        		<label class="pay-label" title="恒丰银行">
					        			<span class="EGB" data-paytype="344"></span>
					        		</label>
					        		<label class="pay-label" title="北京农商银行">
					        			<span class="BJRCB" data-paytype="335"></span>
					        		</label>
					        		<label class="pay-label" title="重庆农村商业银行">
					        			<span class="CQRCB" data-paytype="342"></span>
					        		</label>
					        		<label class="pay-label" title="渤海银行">
					        			<span class="CBHB" data-paytype="317"></span>
					        		</label>
					        		<label class="pay-label" title="上海农村商业银行">
					        			<span class="SRCB" data-paytype="343"></span>
					        		</label>
					        		<label class="pay-label" title="南京银行">
					        			<span class="NJCB" data-paytype="316"></span>
					        		</label>
					        		<label class="pay-label" title="宁波银行">
					        			<span class="NBCB" data-paytype="302"></span>
					        		</label>
					        		<label class="pay-label" title="杭州银行">
					        			<span class="HZB" data-paytype="324"></span>
					        		</label>
					        		<label class="pay-label" title="成都银行">
					        			<span class="BOCD" data-paytype="336"></span>
					        		</label>
					        		<label class="pay-label" title="青岛银行">
					        			<span class="QDCCB" data-paytype="3341"></span>
					        		</label>
					        		<label class="pay-label" title="厦门银行">
					        			<span class="BOXM" data-paytype="401"></span>
					        		</label>
					        		<label class="pay-label" title="浙江稠州商业银行">
					        			<span class="CZCB" data-paytype="403"></span>
					        		</label>
					        		<label class="pay-label" title="贵州省农村信用社">
					        			<span class="GZNX" data-paytype="404"></span>
					        		</label>
					        		<label class="pay-label" title="陕西农信">
					        			<span class="SHXNX" data-paytype="402"></span>
					        		</label>
					        		<h6><i class="icon icon-angle-down">展开更多银行</i></h6>
					        	</div>
					        	<div class="pay-nav">
					        		<h5>网银支付 <small>需要开通网上银行</small></h5>
					        		<label class="pay-label" title="中国工商银行">
					        			<span class="ICBC" data-paytype="1027"></span>
					        		</label>
					        		<label class="pay-label" title="中国建设银行">
					        			<span class="CCB" data-paytype="1054"></span>
					        		</label>
					        		<label class="pay-label" title="中国银行">
					        			<span class="BOC" data-paytype="106"></span>
					        		</label>
					        		<label class="pay-label" title="中国农业银行">
					        			<span class="ABC" data-paytype="1031"></span>
					        		</label>
					        		<label class="pay-label" title="交通银行">
					        			<span class="BCM" data-paytype="3011"></span>
					        		</label>
					        		<label class="pay-label" title="中国邮政储蓄银行">
					        			<span class="PSBC" data-paytype="3231"></span>
					        		</label>
					        		<label class="pay-label" title="招商银行">
					        			<span class="CMB" data-paytype="308"></span>
					        		</label>
					        		<label class="pay-label" title="中信银行">
					        			<span class="CITIC" data-paytype="3131"></span>
					        		</label>
					        		<label class="pay-label" title="浦发银行">
					        			<span class="SPDB" data-paytype="3141"></span>
					        		</label>
					        		<label class="pay-label" title="兴业银行">
					        			<span class="CIB" data-paytype="3091"></span>
					        		</label>
					        		<label class="pay-label" title="中国民生银行">
					        			<span class="CMBC" data-paytype="3051"></span>
					        		</label>
					        		<label class="pay-label" title="中国光大银行">
					        			<span class="CEB" data-paytype="3121"></span>
					        		</label>
					        		<label class="pay-label" title="平安银行">
					        			<span class="PAB" data-paytype="3071"></span>
					        		</label>
					        		<label class="pay-label" title="上海银行">
					        			<span class="BOS" data-paytype="3261"></span>
					        		</label>
					        		<label class="pay-label" title="华夏银行">
					        			<span class="HXB" data-paytype="3112"></span>
					        		</label>
					        		<label class="pay-label" title="北京银行">
					        			<span class="BOB" data-paytype="3101"></span>
					        		</label>
					        		<label class="pay-label" title="广发银行">
					        			<span class="CGB" data-paytype="306"></span>
					        		</label>
					        		<label class="pay-label" title="宁波银行">
					        			<span class="NBCB" data-paytype="303"></span>
					        		</label>
					        		<label class="pay-label" title="杭州银行">
					        			<span class="HZB" data-paytype="3241"></span>
					        		</label>
					        		<label class="pay-label" title="青岛银行">
					        			<span class="QDCCB" data-paytype="334"></span>
					        		</label>
					        		<label class="pay-label" title="浙江稠州商业银行">
					        			<span class="CZCB" data-paytype="4031"></span>
					        		</label>
					        		<h6><i class="icon icon-angle-down">展开更多银行</i></h6>
					        	</div><?php endif; ?>
				        </div>
	            	</td>
	            </tr>
	        </tbody>
	    </table>
	    <div class="pay-btn">
	    	<input value="<?php echo ($shop["id"]); ?>" name="pid" type="hidden">
        	<input value="<?php echo ($shop["name"]); ?>" name="name" type="hidden">
        	<input value="<?php echo ($price); ?>" name="price" type="hidden">
	    	<button class="btn btn-red btn-big paybut" id="paybut" type="button">立即支付</button>
	    </div>
	    </form>
	    <div class="pay-readme">
	    	<h3>付款遇到问题</h3>
	    	<p>1、如您未开通网上银行，即可以使用储蓄卡快捷支付轻松完成付款；</p>
			<p>2、如果您没有网银，可以使用银联在线支付，银联有支持无需开通网银的快捷支付和储值卡支付；</p>
			<p>3、如果您有财付通或快钱、手机支付账户，可将款项先充入相应账户内，然后使用账户余额进行一次性支付；</p>
			<p>4、如果银行卡已经扣款，但您的账户中没有显示，有可能因为网络原因导致，将在第二个工作日恢复。</p>
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
        }
    </script>;
	<script src="<?php echo ($web_tplpath); ?>js/jquery.min.js"></script>
	<script src="/Public/Static/think.js"></script>
	<script src="/Public/Static/layer/layer.js"></script>
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
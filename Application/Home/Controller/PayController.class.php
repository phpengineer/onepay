<?php
namespace Home\Controller;
use Com\WechatAuth;
use Com\Bankpay\Bankpay;
use Com\Alipay\AlipaySubmit;
use Com\Alipay\AlipayNotify;

class PayController extends WapController {

  public function _initialize(){
		parent::_initialize();
		if(!defined('UID') || UID==0){
			$this->error('请先登录！',U('public/login'));
		}
	}
	
  public function index(){
		$this->assign('shop',D("Shop")->detail(I('pid',0,'intval')));
		$this->assign('black',D("User")->getBlack());
		$this->assign('price',abs(I('number',0,'intval')));
    $this->display($this->tplpath."pay.html");
  }
	
	public function create_sn(){
   		mt_srand((double )microtime() * 1000000 );
    	return date("YmdHis" ).str_pad( mt_rand( 1, 99999 ), 5, "0", STR_PAD_LEFT );
 	}

  public function yuepay($pid,$price){
    $price=abs($price);
    if(!is_numeric($price)){
      $this->error('请输入数字');
    }
    if($price<=0){
      $this->error('购买数量必须大于0');
    }
    $res = D('Pay')->payadd(intval($pid),$this->create_sn(),$price,UID,1);
      if($res !== false){
        $this->success('支付完成！',U('Pay/pay_result?sn='.$res));
      }else{
        $this->error(D('Pay')->getError());
      }
  }

  public function pay_wx($code,$price,$no){
    $this->assign('code_url',urlencode($code));
    $this->assign('price',$price/100);
    $this->assign('no',$no);
    $this->display($this->tplpath."pay_wx.html");
  }
  
  public function pay_result($sn){
    $payResult=D('Pay')->pay_result($sn);
    if(IS_AJAX){
      if($payResult['order']['code']){
        $this->success($payResult['order']['code'],U('Pay/pay_result?sn='.$sn));
      }
    }else{
      $this->assign('pay',$payResult);
      if($payResult['order']['pid']){
        $this->title="支付结果";
      }else{
        $this->title="充值结果";
      }
      $this->display($this->tplpath."pay_result.html");
    }
  }

  public function recharge(){
    $this->display($this->tplpath."recharge.html");
  }

  public function pay_weixin(){
    $price=abs(I('price')*100);
    if(!is_numeric($price)){
      $this->error('请输入数字');
    }
    if($price<=0){
      $this->error('购买数量必须大于0');
    }
    $sn=$this->create_sn();
    $options['mch_id'] = C('WX_PAY_MCHID');
    $options['key'] = C('WX_PAY_KEY');
    $options['body'] = C("WEB_SITE_TITLE");
    $options['attach'] = intval(I('pid',0,'intval')).'|'.UID;
    $options['out_trade_no'] = $sn;
    $options['total_fee'] = $price;
    $options['notify_url'] = C('WEB_URL').U('Home/Api/pay_weixin_notify');
    if(is_weixin()){
      $options['trade_type'] = 'JSAPI';
      $options['openid'] = session('openid');
    }else{
      $options['trade_type'] = 'NATIVE';
    }
    $auth = new WechatAuth(C('WX_APPID'), C('WX_APPSECRET'));
    $rmsg=$auth->unifiedOrder($options);
    if(is_weixin()){
      $time = NOW_TIME;
      $jsApiObj["appId"] = C('WX_APPID');
      $jsApiObj["timeStamp"] = "$time";
      $jsApiObj["nonceStr"] = $auth->getNonceStr();
      $jsApiObj["package"] = "prepay_id=".$rmsg['prepay_id'];
      $jsApiObj["signType"] = "MD5";
      $jsApiObj["paySign"] = $auth->MakeSign($jsApiObj,C('WX_PAY_KEY'));
    }
    $this->success(array(
      'return_msg'=>$rmsg['return_msg'],
      'trade_type'=>$rmsg['trade_type'],
      'code_url'=>$rmsg['code_url'],
      'parameters'=>$jsApiObj,
      'pid'=>I('pid'),
      'no'=>$sn,
      'price'=>$price
      ),U('Pay/pay_result?sn='.$sn));
  }

  public function pay_bank(){
    $price=abs(I('price'));
    if(!is_numeric($price)){
      $this->error('请输入数字');
    }
    if($price<=0){
      $this->error('购买数量必须大于0');
    }
    $sn=$this->create_sn();
    $bankpay = new Bankpay(C('BAND_PAY_MID'),C('BANK_PAY_KEY'),C('WEB_URL').U('Pay/pay_result?sn='.$sn));
    $options['v_oid'] = $sn;
    $options['v_amount'] = $price;
    $options['v_moneytype'] = 'CNY';
    $options['v_md5info'] = $bankpay->MakeSign($options);
    $options['pmode_id'] = I('pay_type');
    $options['remark1'] = intval(I('pid')).'|'.UID;
    $options['remark2'] = '[url:='.C('WEB_URL').U('Home/Api/pay_bank_notify').']';
    $html_text = $bankpay->postForm($options);
    echo $html_text;
  }

  public function pay_alipay($price){
    $price=abs(I('price'));
    if(!is_numeric($price)){
      $this->error('请输入数字');
    }
    if($price<=0){
      $this->error('购买数量必须大于0');
    }
    $sn=$this->create_sn();
    $alipay_config['partner']   = C('ALI_PAY_PARTNER');
    $alipay_config['seller_email']  = C('ALI_PAY_SELLER_EMAIL');
    $alipay_config['key']     = C('ALI_PAY_KEY');
    $alipay_config['sign_type']    = strtoupper('MD5');
    $alipay_config['input_charset']= strtolower('utf-8');
    $alipay_config['cacert']    = getcwd().'\cacert\cacert.pem';
    $alipay_config['transport']    = 'http';
    $parameter = array(
        "service" => "create_direct_pay_by_user",
        "partner" => trim($alipay_config['partner']),
        "seller_email" => trim($alipay_config['seller_email']),
        "payment_type"  => '1',
        "notify_url"  => C('WEB_URL').U('Home/Api/pay_alipay_notify'),
        "return_url"  => C('WEB_URL').U('Pay/pay_alipay_notify'),
        "out_trade_no"  => $sn,
        "subject" => I('name'),
        "total_fee" => $price,
        "body"  => C("WEB_SITE_TITLE"),
        "show_url"  => $show_url,
        "extra_common_param" => intval(I('pid')).'|'.UID,
        "anti_phishing_key" => '',
        "exter_invoke_ip" => get_client_ip(),
        "_input_charset"  => trim(strtolower($alipay_config['input_charset']))
    );
    $alipaySubmit = new AlipaySubmit($alipay_config);
    $html_text = $alipaySubmit->buildRequestForm($parameter,"post", "确认");
    echo $html_text;
  }

  public function pay_alipay_notify(){
    $alipay_config['partner']   = C('ALI_PAY_PARTNER');
    $alipay_config['seller_email']  = C('ALI_PAY_SELLER_EMAIL');
    $alipay_config['key']     = C('ALI_PAY_KEY');
    $alipay_config['sign_type']    = strtoupper('MD5');
    $alipay_config['input_charset']= strtolower('utf-8');
    $alipay_config['cacert']    = getcwd().'\cacert\cacert.pem';
    $alipay_config['transport']    = 'http';
    $alipayNotify = new AlipayNotify($alipay_config);
    $verify_result = $alipayNotify->verifyReturn();
    if($verify_result) {
        if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
          $this->redirect(U('Pay/pay_result?sn='.I('get.out_trade_no')));
        }
    }else {
      $this->error('校验失败',U('Pay/index'));
    }
  }
}
<?php
namespace Home\Controller;
use Think\Controller;

class WapController extends Controller {
	public function _empty(){
		$this->redirect("./Web/index.html");
	}

    protected function _initialize(){
		$config =   S('DB_CONFIG_DATA');
        if(!$config){
            $config =  config_lists();
            S('DB_CONFIG_DATA',$config);
        }
        C($config);
		$this->web_path=__ROOT__."/";
		$this->web_title=C("WEB_SITE_TITLE");
		$this->web_logo="/".C('TMPL_PATH')."/Web/images/".C("WEB_LOGO");
		$this->web_keywords=C("WEB_SITE_KEYWORD");
		$this->web_description=C("WEB_SITE_DESCRIPTION");
		$this->web_icp=C("WEB_SITE_ICP");
		$this->web_url=C("WEB_URL");
		$this->web_currency=C("WEB_CURRENCY");
		$this->wx_pay=C('WX_PAY_MCHID');
        $this->ali_pay=C('ALI_PAY_PARTNER');
        $this->band_pay=C('BAND_PAY_MID');
		$this->web_time=NOW_TIME;
		$this->tplpath="./".C('TMPL_PATH')."/Web/";
		$this->web_tplpath=$this->web_path.C('TMPL_PATH')."/Web/";
		C('CACHE_PATH',RUNTIME_PATH."/Cache/".MODULE_NAME."/Web/");
		define('UID',is_login());
		activity(3,'',UID);
    }
}

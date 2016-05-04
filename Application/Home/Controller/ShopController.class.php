<?php
namespace Home\Controller;
class ShopController extends WapController {

    public function index(){
		$id=I('id',0,'intval');
		$info=D("Shop")->detail($id);
		if(!$info){
			$error = D("Shop")->getError();
        	$this->error(empty($error) ? '未知错误！' : $error);
		}
		$this->shop_webtitle=empty($info["meta_title"]) ? $this->web_title : $info["meta_title"];
		$this->shop_keywords=empty($info["keywords"]) ? $this->web_keywords : $info["keywords"];
		$this->shop_description=empty($info["description"]) ? $this->web_description :$info["description"];
		$this->hist($info['sid']);
		$this->assign('pos',1);
		$this->assign('user_no',D('Shop')->user_num(UID,$info['pid']));
		$this->assign('record',D('Shop')->record($info['pid'],1));
		$this->assign($info);
        $this->display($this->tplpath."product.html");
    }

    public function over(){
		$id=I('id',0,'intval');
		$info=D("Shop")->over($id);
		if(!$info){
			$error = D("Shop")->getError();
        	$this->error(empty($error) ? '未知错误！' : $error);
		}
		$this->shop_webtitle=empty($info["meta_title"]) ? $this->web_title : $info["meta_title"];
		$this->shop_keywords=empty($info["keywords"]) ? $this->web_keywords : $info["keywords"];
		$this->shop_description=empty($info["description"]) ? $this->web_description :$info["description"];
		$in=M('shop_period')->field('id,no')->where("sid=".$info['id']." and state=0")->find();
		$info['in_id']=$in['id'];
		$info['in_no']=$in['no'];
		$info['in_url']=U('shop/index?id='.$in['id']);
		$this->assign('user_no',D('Shop')->user_num(UID,$info['pid']));
		$this->assign('record',D('Shop')->record($info['pid'],1));
		$this->assign($info);
        $this->display($this->tplpath."product_over.html");
    }
	
	public function hist($id){
		D('Shop')->hits($id);
	}
	
	public function record($pid,$p){
		$this->ajaxReturn(D('Shop')->record($pid,$p));
	}

	public function more($id){
		$content=D("Shop")->more($id);
		$this->assign('content',$content);
        $this->display($this->tplpath."product_more.html");
	}

	public function history($sid,$p=1,$no=null){
		$history=D("Shop")->history($sid,$p,$no);
		if(IS_AJAX){
			$this->ajaxReturn($history);
		}else{
			$this->assign('history',$history);
        	$this->display($this->tplpath."history.html");
		}
	}

	public function calculate($pid){
		$calculate=D("Shop")->calculate($pid);
		if(IS_AJAX){
			$this->ajaxReturn($calculate);
		}
	}
}
<?php
namespace Home\Controller;

class IndexController extends WapController {

    public function index($p=1){
    	$shop=D('Shop')->period($p);
        $this->assign('pos',4);
        $map['status']=1;
        $map['display']=1;
        $map['category']=1;
        $news=M('News')->where($map)->order('id desc')->limit(5)->select();
        $period[0] = M('shop_period')->where('state=1')->field(true)->order('kaijang_time desc')->find();
        if(!$period[0]){
            $period = M('shop_period')->where('state=2')->field(true)->order('kaijang_time desc')->limit(2)->select();
        }else{
            $period[1] = M('shop_period')->where('state=2')->field(true)->order('kaijang_time desc')->find();
        }
        
        if($period[0] || $period[1]){
            foreach ($period as $k=>$v){
                $info = M('shop')->field(true)->find($v["sid"]);
                $period_list[$k]= D('Shop')->overChange($info,$v);
                $period_list[$k]['user']=get_user_name($v["uid"]);
                $period_list[$k]['count']=M('shop_record')->where("uid=".$v["uid"]." and pid=".$v["id"])->sum('number');
            }
        }
        $this->assign('list',$period_list);
        $this->assign('news',$news);
		$this->assign('lottery',D('User')->lottery('',1));
		$this->assign('slider',M('slider')->where('status=1')->order('id desc')->select());
		$this->assign('shop',$shop);
		$this->display($this->tplpath."index.html");
    }

    public function period($p,$cid,$num){
        return D('Shop')->period($p,$cid,$num);
    }

    public function shared($p,$uid,$num=20){
        return D('User')->displays($p,$uid,$num);
    }
}
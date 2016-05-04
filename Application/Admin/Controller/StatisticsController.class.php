<?php
namespace Admin\Controller;
use Think\Controller;

class StatisticsController extends WebController {
    public function index($starttime='',$endtime=''){
		$income=D('Statistics')->income($starttime,$endtime);
		$this->assign('income',$income);
    	$this->meta_title="盈利统计";
		$this->display();
    }
}
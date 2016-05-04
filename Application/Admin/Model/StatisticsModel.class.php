<?php
namespace Admin\Model;
use Think\Model;

class StatisticsModel extends Model {

	public function income($starttime,$endtime){
		$starttime=$starttime?$starttime:date('Y-m-d',strtotime('-1 month'));
		$endtime=$endtime?$endtime:date('Y-m-d',NOW_TIME);
		$subQuery=M('shop_period')->field("sid,FROM_UNIXTIME(kaijang_time,'%Y-%m-%d') as time")->where("FROM_UNIXTIME(kaijang_time,'%Y-%m-%d')>='".$starttime."' and FROM_UNIXTIME(kaijang_time,'%Y-%m-%d')<='".$endtime."' and state=2")->select(false);
		$income=M('Shop')->table($subQuery.' a,__SHOP__')->field('a.time as time,Sum(price) as price,Sum(buy_price) as buy_price')->where('id=a.sid')->group('a.time')->order('a.time desc')->select();
		foreach ($income as $key=>$value) {
			$income[$key]['payment']=$this->payment($value['time']);
		}
		return $income;
	}

	public function payment($time){
		return M('activity_log')->where("FROM_UNIXTIME(create_time,'%Y-%m-%d')='".$time."'")->sum('price');
	}
}
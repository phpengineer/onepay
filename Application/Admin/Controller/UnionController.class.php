<?php
namespace Admin\Controller;

class UnionController extends WebController {

    public function index(){
        $this->meta_title = '联盟网站列表';
        $this->display();
    }
	
	public function pay(){
        $this->meta_title = '提现管理';
        $this->display();
	}
}
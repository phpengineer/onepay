<?php
namespace Admin\Controller;

class MaterialController extends WebController {

	public function index(){
		$this->meta_title = '素材管理';
		$this->display();
	}
}
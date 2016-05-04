<?php
namespace Admin\Controller;

class MenuController extends WebController {

	public function index(){
		$this->meta_title = '自定义菜单';
		$this->display();

    }
}

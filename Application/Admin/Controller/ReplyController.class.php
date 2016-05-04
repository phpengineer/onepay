<?php
namespace Admin\Controller;

class ReplyController extends WebController {

	public function beadded(){
		$this->meta_title = '消息群发';
		$this->display();
    }

    public function group(){
		$this->meta_title = '消息群发';
		$this->display();
    }
}

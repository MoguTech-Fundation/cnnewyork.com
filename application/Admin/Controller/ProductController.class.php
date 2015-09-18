<?php

/**
 * 后台首页
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class ProductController extends AdminbaseController {
	
	function _initialize() {
		parent::_initialize();
		$this->initMenu();
	}
    //后台框架首页
    public function index() {
       	$this->display();
        
    }
	
	public function getlist() {
		$this->display('index');
	}
}
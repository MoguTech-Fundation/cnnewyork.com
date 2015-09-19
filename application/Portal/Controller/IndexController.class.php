<?php
// +----------------------------------------------------------------------
// | TCShop [ A SIMPLE SHOP ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.mogutech.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Jay Lynn <lwjct@hotmail.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class IndexController extends HomeBaseController {
	
    //首页
	public function index() {
    	$this->display(":index");
    }   

}



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
use Org\File; 
/**
 * 首页
 */
class FiletestController extends HomeBaseController {
	
    //首页
	public function index() {

		$dir = __UPLOAD__.'products';
		$dirArray = File::get_dirs($dir);
		var_dump($dirArray);
    }   

}



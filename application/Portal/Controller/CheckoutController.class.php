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
class CheckoutController extends HomeBaseController {
	protected $model_product;
	
	function _initialize() {
		parent::_initialize();
		$this->model_product = D("Product");
	}
	
	public function index() {
		$id = intval($_GET['id']);
		$products = $this->model_product->select();
		$this->assign('rows', $products);
    	$this->display();
    }
	public function step0() {
		$id = intval($_GET['id']);
		$product = $this->model_product->where(array('id'=>$id))->find();
		$this->assign("info", $product);
		$this->display();
	}
}
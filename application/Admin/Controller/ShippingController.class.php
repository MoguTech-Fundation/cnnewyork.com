<?php

/**
 * 后台首页
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class ShippingController extends AdminbaseController {
	protected $shipping_model;
	
	function _initialize() {
		parent::_initialize();
		//$this->initMenu();
		$this->shipping_model = D("shipping");
	}

    public function index() {
        $rows = $this->shipping_model->select();
		$this->assign('rows',$rows);
		$this->display();
    }
	public function edit_shipping() {
		
	}
	public function add_post() {
		if(IS_POST){
			if ($this->shipping_model->create()){
				if ($this->shipping_model->add()!==false) {
					$this->success("添加成功！", U("shipping/index"), 1);
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->shipping_model->getError());
			}
		}
	}
	public function delete() {
		$id = I("get.id",0,"intval");
		if ($this->shipping_model->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}
	public function update() {
		if (isset($_REQUEST['id'])) {
			$id = intval($_REQUEST['id']);
			switch ($_REQUEST['field']) {
				case 'visibility':
					if ($_REQUEST['value']) {
						$data['visibility'] = 1;
					} else {
						$data['visibility'] = 0;
					}
					break;
				default: 
					$data = $_POST;
			}
			if ($this->shipping_model->where("id =$id")->save($data)!==false) {
				$this->redirect(U("shipping/index"), 0);
			} else {
				$this->error("更新失败！");
			}
		}
	}
	public function add() {
		$this->display();
	}
	public function edit() {
		$id = intval($_REQUEST['id']);
		$info = $this->shipping_model->where(array('id'=>$id))->find();
		$this->assign('info',$info);
		$this->display();
	}
	
}
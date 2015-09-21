<?php

/**
 * 后台首页
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class ProductPatternController extends AdminbaseController {
	protected $model_prodcut_pattern;
	
	function _initialize() {
		parent::_initialize();
		//$this->initMenu();
		$this->model_prodcut_pattern = D("product_pattern");
	}

    public function index() {
        $rows = $this->model_prodcut_pattern->select();
		$this->assign('rows',$rows);
		$this->display();
    }
	public function edit_product() {
		
	}
	public function add_post() {
		if(IS_POST){
			if ($this->model_prodcut_pattern->create()){
				if ($this->model_prodcut_pattern->add()!==false) {
					$this->success("添加成功！", U("ProductPattern/index"), 1);
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->model_prodcut_pattern->getError());
			}
		}
	}
	public function delete() {
		$id = I("get.id",0,"intval");
		if ($this->model_prodcut_pattern->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}
	public function update() {
		if (isset($_REQUEST['id'])) {
			$id = intval($_REQUEST['id']);
			switch ($_REQUEST['field']) {
				case 'status':
					if ($_REQUEST['value']) {
						$data['status'] = 1;
					} else {
						$data['status'] = 0;
					}
					break;
				default: 
					$data = $_POST;
			}
			if ($this->model_prodcut_pattern->where("id =$id")->save($data)!==false) {
				$this->redirect(U("ProductPattern/index"), 0);
			} else {
				$this->error("更新失败！");
			}
		}
	}
	public function add() {
		$this->display();
	}
	public function edit() {
		$id = intval($_GET['id']);
		$this->info = $this->model_prodcut_pattern->where("id =$id")->find();
		$this->display();
	}
	
}
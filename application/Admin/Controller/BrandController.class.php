<?php

/**
 * 后台首页
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class BrandController extends AdminbaseController {
	protected $model_brand;
	
	function _initialize() {
		parent::_initialize();
		$this->model_brand = D("Brand");
	}

    public function index() {
        $rows = $this->model_brand->select();
		$this->assign('rows',$rows);
		$this->display();
    }
	public function edit_brand() {
		
	}
	public function add_post() {
		if(IS_POST){
			if ($this->model_brand->create()){
				if ($this->model_brand->add()!==false) {
					$this->success("添加成功！", U("brand/index"), 1);
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->model_brand->getError());
			}
		}
	}
	public function delete() {
		$id = I("get.id",0,"intval");
		if ($this->model_brand->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}
	public function update() {
		if (isset($_GET['id'])) {
			$id = intval($_GET['id']);
			switch ($_GET['field']) {
				case 'visibility':
					if ($_GET['value']) {
						$data['visibility'] = 1;
					} else {
						$data['visibility'] = 0;
					}
					break;
				default: 
					// do nothing...
			}
			if ($this->model_brand->where("id =$id")->save($data)!==false) {
				$this->redirect(U("brand/index"), 0);
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
		$info = $this->model_brand->where(array('id'=>$_GET['id']))->find();
		$this->info = $info;
		$this->display();
	}
	
}
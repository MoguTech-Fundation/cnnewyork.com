<?php
// +---------------------------------------------------------------------
// | TCShop [ A SIMPLE SHOP ]
// +---------------------------------------------------------------------
// | Copyright (c) 2015 http://www.mogutech.com All rights reserved.
// +---------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +---------------------------------------------------------------------
// | Author: Jay Lynn <lwjct@hotmail.com>
// +---------------------------------------------------------------------
namespace Common\Behavior;
use Think\Behavior;
use Think\Hook;

// 初始化钩子信息
class InitHookBehavior extends Behavior {

    // 行为扩展的执行入口必须是run
    public function run(&$content){
        if(isset($_GET['m']) && $_GET['m'] === 'Install') return;
        
        $data = S('hooks');
        if(!$data){
           $plugins = M('Plugins')->where("status=1")->getField("name,hooks");
           foreach ($plugins as $plugin => $hooks) {
                if($hooks){
                	$hooks=explode(",", $hooks);
                	foreach ($hooks as $hook){
                		Hook::add($hook,$plugin);
                	}
                }
            }
            S('hooks',Hook::get());
        }else{
           Hook::import($data,false);
        }
    }
}
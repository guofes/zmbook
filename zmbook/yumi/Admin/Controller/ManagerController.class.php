<?php
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends CommonController{
	public function index(){
        if($_SESSION['power']=="超级管理员")
        {
		$manager = M('teacher');
		$ma1 = $manager->order('id asc')->where('id<11')->select();
		$this->assign('ma1',$ma1);
		$ma2 = $manager->order('id asc')->where('id>10')->select();
		$this->assign('ma2',$ma2);
        $this->display();
    }
    else{
         E('页面不存在');
    }
    }
    public function ma_edit(){
    	$ma = M('teacher');
        $id=$_POST['mid'];
        $mane['name']=$_POST['name'];
        $ma->where(array('id'=>$id))->save($mane);
        $this->ajaxReturn("修改成功","eval");
    }
}
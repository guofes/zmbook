<?php
namespace Admin\Controller;
use Think\Controller;
class CornController extends CommonController{
    public function index(){
        if($_SESSION['power']=="超级管理员")
        {
        $corn=M('corn');
        $count=$corn->count();
        $page = new \Think\Page($count,8);
        $page->lastSuffix=false;
        $page->rollPage=5;
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');
        $page->setConfig('first','首页');
        $page->parameter=I('get.');
        $data=$corn->order('id asc')->limit($page->firstRow.','.$page->listRows)->select();
        $show=$page->show();
        $this->assign('data',$data);
        $this->assign('page',$show);
        $this->display();
    }
    else{
        E('页面不存在');
      } 
    }
    public function user_del(){
          $data = D('corn');
          $id=$_POST['id'];
          $vas =$data->where(array('id'=>$id))->find();
          $data->delete($id);
          $this->ajaxReturn("删除成功","eval");

    }
    public function user_add(){ 	
        if($_SESSION['power']=="超级管理员")
        {
    	$this->display();
    	}
    	else{
        E('页面不存在');
      	} 
    }
    public function useradd(){
    if(!IS_AJAx) E('页面不存在');
            else{
            $data = D('corn');
            $arr = array(
            array('user','require','请确保信息的完整性！！'),
            array('project','require','请确保信息的完整性！！'),//ps: require 意思是字段必须，就是不能为空
            array('corn','require','请确保信息的完整性！！'),
            array('line','require','请确保信息的完整性！！'),
            array('date1','require','请确保信息的完整性！！'),
            array('date2','require','请确保信息的完整性！！'),
            );
            if($data->validate($arr)->create()){
            $data->add();
            $this->ajaxReturn("添加成功","eval");
            }else{
            $this->ajaxReturn($data->getError(),"eval");
            }
        }
}
}
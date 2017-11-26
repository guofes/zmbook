<?php
namespace Admin\Controller;
use Think\Controller;
class StudentController extends CommonController{
    public function student_list(){ 
        $admin=M('student');
        if($_SESSION['power']=="超级管理员"){           
        $count=$admin->count();
        $page1 = new \Think\Page($count,8);
        $page->lastSuffix=false;
        $page->rollPage=5;
        $page1->setConfig('prev','上一页');
        $page1->setConfig('next','下一页');
        $page1->setConfig('last','末页');
        $page1->setConfig('first','首页');
        $page1->parameter=I('get.');
        $show=$page1->show();
            $data=$admin->order('id asc')->limit($page1->firstRow.','.$page1->listRows)->select();
        }
        if($_SESSION['power']=="普通管理员"){                       
        $count=$admin->where(array('tutor'=>$_SESSION['admin_name']))->count();
        $page2 = new \Think\Page($count,8);
        $page2->lastSuffix=false;
        $page2->rollPage=5;
        $page2->setConfig('prev','上一页');
        $page2->setConfig('next','下一页');
        $page2->setConfig('last','末页');
        $page2->setConfig('first','首页');
        $page2->parameter=I('get.');
        $show=$page2->show();
            $data=$admin->where(array('tutor'=>$_SESSION['admin_name']))->order('id asc')->limit($page2->firstRow.','.$page2->listRows)->select();
        }
        $this->assign('data',$data);
        $this->assign('page',$show);    
        $this->display("student_list");
    }
    public function student_del(){
          $data = D('student');
          $id=$_POST['id'];
          $data->delete($id); 
    } 
    public function student_reset(){
        $da = D('student');
        $id=$_POST['sid'];
        $da2 = M('student')->where(array('id'=>$id))->find();
        $da3=array();
        $da3['password']=$da2['id']; 
        $da->where(array('id'=>$id))->save($da3);   
        $this->ajaxReturn('重置成功',"eval");
    }
    public function student_activation(){
        $da = D('student');
        $id=$_POST['stuid'];
        $da2 = M('student')->where(array('id'=>$id))->find();
        if($da2['level']=="1"){
           $da2['level']="2";
           $da->where(array('id'=>$id))->save($da2);
           $this->ajaxReturn($da2['level'],"eval");
        }if($da2['level']=="2"){
           $da2['level']="1";
           $da->where(array('id'=>$id))->save($da2);
           $this->ajaxReturn($da2['level'],"eval");
        }
    }
}
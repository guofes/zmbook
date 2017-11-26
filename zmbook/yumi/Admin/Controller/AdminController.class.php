<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController{
    public function admin_powercheck(){
        $vo = M('admin')->where(array('id'=>$_SESSION['id']))->find();
        if($vo['power']!="超级管理员"){
           $this->ajaxReturn("权限不足","eval");
        }
        if($vo['power']=="超级管理员"){
        $this->ajaxReturn("权限足够","eval");
          }
        else{
        E('出现异常');     
        }
    }
    public function admin_list(){
        if($_SESSION['power']=="超级管理员")
        {$admin=M('admin');
        $count=$admin->count();
        $page = new \Think\Page($count,8);
        $page->lastSuffix=false;
        $page->rollPage=5;
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');
        $page->setConfig('first','首页');
        $page->parameter=I('get.');
        $show=$page->show();
        $data=$admin->order('id asc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('data',$data);
        $this->assign('page',$show);    
        $this->display("admin_list");
    }
    else{
        E('页面不存在');
      }  
    }
    public function admin(){
        $data = M('admin')->where(array('id'=>$_SESSION['id']))->find();      
        $this->assign('da',$data['project']);
        $this->display('admin');
    }
    public function admin_add(){
    if($_SESSION['power']=="超级管理员")
        {
        $this->display('admin_add');
    }
    else{
        E('页面不存在');
      } 
    }
    public function adminadd(){
            if(!IS_AJAx) E('页面不存在');
            else{
            $data = D('admin');
            $arr = array(
            array('admin_name','','帐号名称已经存在！',0,'unique',1),
            array('admin_name','require','用户名不能为空！！'),//ps: require 意思是字段必须，就是不能为空
            array('admin_email','email','邮箱格式不正确！！'),
            array('admin_email','','邮箱已被使用！',0,'unique',1),
            array('admin_password','require','请填写密码！！'),
            array('adminpassword','require','两次密码不一致！！'),
            );
            if($_POST['admin_password'] != $_POST['adminpassword']){
                $this->ajaxReturn('两次输入密码不一致！',"eval");
            }
            else if($data->validate($arr)->create()){
            $data->add();
            $this->ajaxReturn("注册成功","eval");
            }else{
            $this->ajaxReturn($data->getError(),"eval");
            }
        }
    }  
     public function admin_edit(){
            $data = D('admin'); 
            $data2 = M('admin')->where(array('id'=>$_SESSION['id']))->find();
            if($data2['admin_password'] != $_POST['password1']){
                $this->ajaxReturn('密码不正确！',"eval");
            }
            else if($_POST['password2']==Null||$_POST['password3']==NULL){ 
                $this->ajaxReturn('请确保信息完整！',"eval");
            }
            else if($_POST['password2'] != $_POST['password3']){
                $this->ajaxReturn('两次输入密码不一致！',"eval");
            }
            else{
             // $_POST['password2']->save();
            $data3=array();
            $data3['admin_password']=$_POST['password2'];
            // $data->create();
            $data->where(array('id'=>$_SESSION['id']))->save($data3);
             $this->ajaxReturn('修改成功',"eval");
            }
    }
    public function admin_reset(){
        $da = D('admin');
        $id=$_POST['wid'];
        $da2 = M('admin')->where(array('id'=>$id))->find();
        $da3=array();
        $da3['admin_password']=$da2['admin_email']; 
        $da->where(array('id'=>$id))->save($da3);   
        $this->ajaxReturn('重置成功',"eval");
    }

    //修改导师信息
    public function admin_change(){
     $id=$_GET['aid'];
     $change=M('admin');
     $data=$change->where("id=$id")->find();
     $this->assign('data',$data);
     $this->display();
    }
    public function admin_update(){
     $id=$_POST['id'];
     $update=M('admin');
     $up['admin_name'] = $_POST['admin_name'];
     $up['admin_email'] = $_POST['admin_email'];
     $up['project'] = $_POST['project'];
    $vv =$update->where("id=$id")->save($up);
    if($vv){
     $this->ajaxReturn('修改成功',"eval");     
    } 
    else{
     $this->ajaxReturn('修改失败',"eval");     
    } 
    }





    public function admin_del(){
          $data = D('admin');
          $id=$_POST['id'];
          $da2 = M('admin')->where(array('id'=>$id))->find();
          if($da2['power']=="超级管理员"){
            $this->ajaxReturn("error","eval");    
          }
          else if($da2['power']=="普通管理员"){
          $data->delete($id);            
          }
          else{
            E();
          }
    }
}
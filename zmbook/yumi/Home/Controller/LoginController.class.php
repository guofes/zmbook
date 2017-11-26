<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $Admin=D('admin');
        $where['power']='普通管理员';
        $data=$Admin->where($where)->select();
        $this->assign('data',$data);
        $this->display('login');
    }

    public function login(){
    	$User=D('student');
    	$where['id']=I('post.id');
    	$where['password']=I('post.password');
    	$result=$User->where($where)->find();
        $username=$result['username'];
        $tutor=$result['tutor'];
        $state=$result['level'];
        if($result){
            if($state==2){
        	 session('username',$username);
             session('tutor',$tutor);
        	$this->success('登录成功',U('Index/index'));
            } 
            else{
                 echo "<script>alert('你的帐号还没通过审核!');history.go(-1);</script>";
            }
        }
        else{
            echo "<script>alert('用户名不存在或者密码错误!');history.go(-1);</script>";
        }
    }

    public function reg(){
    	$User=M('student');
        $where['id']=I('post.id');
        if(!$User->where($where)->find()){
          $result=$User->create();
    	  if($result){
            $User->level='1';
            $User->regtime=date("y-m-d");
            $User->add();   
    		$this->success('注册成功,请等待审核','Index/index');
    	  }
    	  else{
            echo "<script>alert('注册失败!');history.go(-1);</script>";
    	 }
       }
       else{
          echo "<script>alert('此学号已被注册!');history.go(-1);</script>";
       }  
    }


    	
}

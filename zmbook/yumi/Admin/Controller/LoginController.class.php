<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
        $this->display('login');
    }

    public function login_login(){
      if(!IS_AJAX) E('页面不存在');

       $admin_email = $_POST['admin_email'];
       $pwd = $_POST['admin_password'];
       $manager = M('admin')->where(array('admin_email'=>$admin_email))->find();
       if(!$manager || $manager['admin_password'] != $pwd)
       {
         $this->ajaxReturn('邮箱或者密码出错',"eval");
       }
       else{
        // $data = array(
        //     'id' => $manager['id'],
        //     'logintime' => date('Y-m-d H-i-s'),
        //   );
        M('admin')->save($data);
        session_start();
        session('id',$manager['id']);
        session('admin_name',$manager['admin_name']);
        session('admin_email',$manager['admin_email']);
        session('power',$manager['power']); 
        session('logintime',$manager['logintime']);
        $this->ajaxReturn('登录成功',"eval");
       }
    } 
    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect('Login/index');
    }  
}
<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
   public function student(){
   	    $form=D('form');
   	    $where['booking_student']=I('session.username');
   	    $data=$form->join('__LAND__ ON __FORM__.landindex=__LAND__.index')->where($where)->order('sub_time desc')->select();
   	    $this->assign('data',$data);
   	    $this->display();
   }
  public function changepassword(){
  	 $student=D('student');
  	 $where['password']=I('post.password');
  	 $where['username']=session('username');
  	 $result=$student->where($where)->find();
  	 if($result){
  	 	 $data['password']=I('post.newpassword');
  	 	 $map['username']=session('username');
  	 	 $student->where($map)->save($data);
  	 	 $this->success('修改成功!','student');
  	 }
  	 else{
  	 	$this->error('错误的原始密码!','student');
  	 }
  }

  public function clear(){
      $form=D('form');
      $where['id']=I('post.id');
      $data['needclear']=2;
      $result=$form->where($where)->save($data);
      if($result){
        $this->ajaxreturn('清场成功');
      }else{
        $this->ajaxreturn('清场失败,服务器出错!');
      }
  }
}

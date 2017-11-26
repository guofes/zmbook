<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(session('?username')){
        $admin=D('admin');
        $user=D('student');
        $form=D('form');
        $corn=D('corn')->select();

        $where['username']=session('username');
        $map['admin_name']=$user->where($where)->getField('tutor');
        $project=$admin->where($map)->getField('project');
        $this->assign('project',$project);

         $clear=$form->distinct(true)->field('booking_student')->where('needclear = 1')->select();
         $this->assign('clear_info',$clear);

         $this->assign('corn',$corn);

        $this->display('index');
        }
        else{
        	$this->redirect('Login/index');
        }
    }

    public function placeState(){
    	   $place=D('land');
         $info=D('form');
         $teacher=D('teacher');
         $teacher_split_index=array();

         $where['index']=I('post.index');
         $where_1['landindex']=I('post.index');
         $where_1['form_state']=2;

         $teacher_index=$teacher->select();
         // $teacher_split_index=explode('|',$teacher_index[0]['index']);
          //$result['teacher']=$teacher_index[1]['name'];

         $result['state']=$place->where($where)->getField('state');
         foreach ($teacher_index as $key => $value) {
                $teacher_split_index=explode('|',$value['index']);
                if(in_array(I('post.index'),$teacher_split_index)){
                   $result['teacher']=$value['name'];
                }
         }
         if($result['state']==2){
            $result['info']=$info->where($where_1)->order('book_time asc')->select();
         }  
         $this->ajaxreturn($result);
    }

    public function logout(){
        session(null);
        $this->redirect('Index/index');
    }

    public function form(){
         $form=D('form');
         $land=D('land');
         $form->create();
         if($form->add()){
             $where['index']=I('post.landindex');
             if(I('post.state')==0){
                $data['state']=1;
                $result=$land->where($where)->save($data);
                if($result){
                $this->success('提交成功','index');
                }
                else{
                $this->error('出现错误,102','index');
                } 
             }//土地为绿时才改变状态
             else $this->success('提交成功','index');         
         }
         else{
            $this->error('出现错误,101','index');
         }
    }
}
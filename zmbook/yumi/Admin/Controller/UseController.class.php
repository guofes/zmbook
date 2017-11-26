<?php
namespace Admin\Controller;
use Think\Controller;
class UseController extends CommonController{
    public function index(){
        $this->display();
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
         if($result['state']!=0){
            $result['info']=$info->where($where_1)->order('book_time asc')->select();
         }  
         $this->ajaxreturn($result);
    }
     
     // public function landinfo(){
     // 	$info=D('form');
     // 	$where['index']=I('post.index');
     // }
}
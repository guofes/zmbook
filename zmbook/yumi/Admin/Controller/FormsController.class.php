<?php
namespace Admin\Controller;
use Think\Controller;
class FormsController extends CommonController{
    public function form_st1(){
        if($_SESSION['power']=="超级管理员"){
         E("页面不存在");
        }
        else{  
        $data = M('form');
        $count=$data->count();
        $page = new \Think\Page($count,8);
        $page->lastSuffix=false;
        $page->rollPage=5;
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');
        $page->setConfig('first','首页');
        $page->parameter=I('get.');
        $show=$page->show();
        $data2=M('land')->join('yumi_form ON yumi_land.index = yumi_form.landindex')->field('yumi_land.landname as landname,yumi_form.id as id,yumi_form.booking_student as booking_student,yumi_form.tutor as tutor,yumi_form.project as project,yumi_form.content as content,yumi_form.book_time as book_time,yumi_form.end_time as end_time,yumi_form.sub_time as sub_time,yumi_form.content as content,yumi_form.landindex as landindex,yumi_form.form_state as form_state')->where(array('tutor'=>$_SESSION['admin_name']))->order('id asc')->limit($page->firstRow.','.$page->listRows)->select();                 
        $this->assign('data',$data2);
        $this->assign('page',$show);    
        $this->display("form_st1");
        }

}
    public function form_st2(){
        if($_SESSION['power']=="超级管理员"){
            
        $data = M('form');
        $count=$data->count();
        $page = new \Think\Page($count,8);
        $page->lastSuffix=false;
        $page->rollPage=5;
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');
        $page->setConfig('first','首页');
        $page->parameter=I('get.');
        $show=$page->show();
        $data2=M('land')->join('yumi_form ON yumi_land.index = yumi_form.landindex')->field('yumi_land.landname as landname,yumi_form.id as id,yumi_form.booking_student as booking_student,yumi_form.tutor as tutor,yumi_form.project as project,yumi_form.content as content,yumi_form.book_time as book_time,yumi_form.end_time as end_time,yumi_form.content as content,yumi_form.sub_time as sub_time,yumi_form.landindex as landindex,yumi_form.form_state as form_state')->order('id asc')->limit($page->firstRow.','.$page->listRows)->select();                 
        $this->assign('data',$data2);
        $this->assign('page',$show);    
        $this->display("form_st2");
        }
       
}
    public function form_check(){
        if($_SESSION['power']!="超级管理员"){
           $this->ajaxReturn("权限不足","eval");
        }
        if($_SESSION['power']=="超级管理员"){
        $this->ajaxReturn("权限足够","eval");
          }
    }
        public function form_del(){
          $data = D('form');
          $id=$_POST['id'];
          $vas =$data->where(array('id'=>$id))->find();
          if($vas['form_state'] == 2 || $vas['form_state'] == 3){
            $this->ajaxReturn("此状态的表单不可删除","eval");
          }
          else if($vas['form_state'] == 0 || $vas['form_state'] == 1){
            $data->delete($id);
            $whe1['landindex'] = $vas['landindex'];
            $whe1['form_state'] = 1;
            $cou1 =$data->where($whe1)->find();
            $whe2['landindex'] = $vas['landindex'];
            $whe2['form_state'] = 1;
            $cou2 =$data->where($whe2)->find();
            $whe3['landindex'] = $vas['landindex'];
            $whe3['form_state'] = 1;
            $cou3=$data->where($whe3)->find();
            if($cou1&&$cou2&&$cou3){
            $this->ajaxReturn("删除成功","eval");
            }
            else{          
                $v['state']=0;
                M('land')->where(array('index'=>$vas['landindex']))->save($v);
                $this->ajaxReturn("删除成功","eval");
            }
          
        }
    }
        public function from_activation(){

        $da = D('form');
        $id=$_POST['fid'];
        $da2 = M('form')->where(array('id'=>$id))->find();
        if($da2['form_state']=="0"){
           $da2['form_state']="1";
           $da->where(array('id'=>$id))->save($da2);
           $this->ajaxReturn("审核成功","eval");
        }
        }
        public function from_activation2(){
        $da = M('form');
        $va = M('land');
        $id=$_POST['fid'];
        $landname = $_POST['landname'];
        $endtime = $_POST['end_time'];
        $booktime = $_POST['book_time'];
        $da2 = $da->where(array('id'=>$id))->find();
        $va2 = $va->where(array('landname'=>$landname))->find();
        if($va2['state']=="1"){
           $da2['form_state']="2";
           $va2['state']="2";
           $da2['pass_time']=date("Y-m-d");
           $va->where(array('landname'=>$landname))->save($va2);
           $da->where(array('id'=>$id))->save($da2);
            $this->ajaxReturn("审核成功","eval");  
           
        }
        else if($va2['state']=="2"){
            $yr =$va->where(array('landname'=>$landname))->find();
            $condition['landindex'] = $yr['index'];
            $condition['form_state'] = 2;
            $time = $da->where($condition)->select();
            $timec =$da->where($condition)->count();
            for($i=0;$i<$timec;$i++){
            if($booktime >= $time[$i]['end_time']||$endtime <= $time[$i]['book_time']){
                $yes = 1;
            }
            else{
                $yes = 0;
                break;
            }
            }
           if($yes == 1){
                $da2['form_state']="2";
                $da2['pass_time']=date("Y-m-d");
                $da->where(array('id'=>$id))->save($da2);
                $this->ajaxReturn("审核通过","eval");
            }
            else if($yes == 0){
                $this->ajaxReturn("时间冲突","eval");
            }  
            else{
            E("错误");
        }   
        }
        else{
            E("错误");
        }
    }
    }
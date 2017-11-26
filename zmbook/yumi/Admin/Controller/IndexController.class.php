<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController{
    public function index(){
    	$count = array();
    	$count['0'] =M('land')->where('state=0')->count();
    	$count['1'] =M('land')->where('state=1')->count();
    	$count['2'] =M('land')->where('state=2')->count();
    	$count['3'] =M('student')->count(); 
        $count['4'] =M('form')->where('form_state=2')->count();
    	$this->assign('data',$count);
        $data2=M('form') -> join('yumi_land ON yumi_land.index = yumi_form.landindex')->field('yumi_land.landname as landname,yumi_form.id as id,yumi_form.booking_student as booking_student,yumi_form.tutor as tutor,yumi_form.project as project,yumi_form.content as content,yumi_form.book_time as book_time,yumi_form.end_time as end_time,yumi_form.content as content,yumi_form.landindex as landindex,yumi_form.form_state as form_state')->where('form_state=2')->order('id asc')->select();                 
    	$this->assign('da',$data2);
        $this->display();
    }
}
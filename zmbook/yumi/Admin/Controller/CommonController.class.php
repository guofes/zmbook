<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller {
    public function _initialize(){
        if(!isset($_SESSION['id']) || !isset($_SESSION['admin_name'])) 
		{
			E('页面不存在');
		}
        if($_SESSION['power']=="超级管理员"){
        $dai =M('form')->where('form_state=1')->count();
        }
        if($_SESSION['power']=="普通管理员"){
        $condition['form_state'] = 0;
        $condition['tutor'] = $_SESSION['admin_name'];      
        $dai =M('form')->where($condition)->count();
        }
        $this->assign('dai',$dai);
        // $fstate=M('form');
        // $tate=$fstate->order('id asc')->select();
        // $j=$fstate->count();       
        // for($i=0;$i<$j;$i++){
        //     if($tate[$i]['form_state']=="2"){
        //     if($tate[$i]['end_time']<date("Y-m-d")){
        //        $tate[$i]['form_state'] = "3";
        //        $fstate->where(array('id'=>$tate[$i]['id']))->save($tate[$i]);
        //     }
        //     }
        // }
    }
}
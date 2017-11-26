<?php
namespace Admin\Controller;
use Think\Controller;
class MoneyController extends CommonController{
	public function index(){
		$money = M('form');
		$pa=$money->where('form_state>=2')->field('id,booking_student,count(booking_student),sum(time)')->group('booking_student')->select();
		$this->assign('pa',$pa);
		$this->display();

		// $count=$money->count();
  //       $page1 = new \Think\Page($count,8);
  //       $page->lastSuffix=false;
  //       $page->rollPage=5;
  //       $page1->setConfig('prev','上一页');
  //       $page1->setConfig('next','下一页');
  //       $page1->setConfig('last','末页');
  //       $page1->setConfig('first','首页');
  //       $page1->parameter=I('get.');
  //       $show=$page1->show();
  //           $data=$money->order('id asc')->limit($page1->firstRow.','.$page1->listRows)->select();
  //       $this->assign('data',$data);
  //       $this->assign('page',$show);    
  //       $this->display();
	}
}
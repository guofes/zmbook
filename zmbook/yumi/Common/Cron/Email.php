<?php 
  $now_time=time();
  $form=D('form');
  $land=D('land');
  $student=D('student');
  $form_row=$form->select();
  $land_state = array();
  $index = array();
   foreach ($form_row as $key=>$res) {	
    $cnt=strtotime($res['end_time'])-$now_time;
    $day=floor($cnt/(3600*24));
    $index[$key]=$res['landindex'];  
    //echo $index[$key];
    if($day<=2 && $cnt>=0 && $res['form_state'] == 2 && $res['needclear']==0){
           $data['needclear']=1;
           $map['id']=$res['id'];
           $form->where($map)->save($data);
           $where['username']=$res['booking_student'];
           $clear_student=$student->where($where)->find();
           $info='<h1>'.$res['booking_student'].'同学,你所使用的玉米温室将在 '.$res['end_time'].' 到期,请及时进入系统个人中心退场'.'</h1>';
           SendMail($clear_student['email'],'玉米温室及时退场通知',$info); 
    } 
    if($cnt < 0 && $res['needclear'] == 2 && $res['form_state'] == 2){
         $data['form_state']=3;
         $map['id']=$res['id'];
         $form->where($map)->save($data);
    }

    if($res['form_state'] == 2){
       $land_state[$index[$key]][0] = 1;
         //land_state which land need change :2-->0
    }else if($res['form_state'] == 0 || $res['form_state'] == 1){
       $land_state[$index[$key]][1] = 1;  //land_state  which land need change :2-->1
    };
    
  }
  
  foreach($index as $key=>$list){
    if($land_state[$list] == null){
     $where['index'] = $list;
     $data['state'] = 0;
     }else if($land_state[$list][0] == null){ 
          $where['index'] = $list;
          $data['state'] = 1;
     }
     $land->where($where)->save($data);
  }
 
?>
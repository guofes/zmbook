<?php  
   namespace Home\Model;
   use Think\Model;
   class FormModel extends Model{

   	  protected $_auto =array(
       array('booking_student','getName',1,'callback'),        
       array('tutor','getTutor',1,'callback') ,
       array('sub_time','getDate',1,'callback'),
     );

   	  protected function getTutor(){
        return I('session.tutor');
     } 

     protected function getName(){
        return I('session.username');
     } 
     protected function getDate(){
        return date("Y-m-d:h-m-s");
     } 

 }
?>
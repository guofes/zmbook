
$(document).ready(function(){
  $ajax_href = $(".ajax_href").val();



   // console.log(prg);
   // console.log(document.readyState);
  
  //获取当前时间

    $("td").each(function(){   
        //var $landchoose=0;

        if($(this).attr("index")){
            $(this).attr("choose","0"); 

            $.ajaxSetup({
              async: true
           });
            ajax($(this))();  

             
        }
    });
    

    function ajax($td){
      return function(){
      var $this=$td;
      $.post($ajax_href,{index:$this.attr("index")},function(data){
                $this.attr("state",data['state']);
                // console.log($td.attr("index"));
                // console.log($this.attr("index"));
                switch(data['state']){
                 case '0': {$this.css("background","#359D3E");
                              $teacher_name =data['teacher'];
                              if($teacher_name != undefined){
                              $this.append(
                              "<div class='landinfo'><p class='teacher_name'>责任老师:"
                              +$teacher_name
                              +"</p></div>");                           
                              } 
                              break;
                            }
                  //未订
                    case '1': {$this.css("background","rgb(44,130,201)");
                              $teacher_name =data['teacher'];
                              if($teacher_name != undefined){
                                $this.append(
                                "<div class='landinfo'><p class='teacher_name'>责任老师:"
                                +$teacher_name
                                +"</p></div>");
                              }  
                                break;
                            }
                  //待定
                  case '2': {
                  var $x;
                  var $string="";//初始化
                  for($x in data['info']){
                    if(data['info'][$x]['form_state']==2){
                    $string+=
                     "<div class='infonum' infonum='"+$x+"'>"

                       +"<p>已被预定的时间段("+Number(Number($x)+Number(1))+"):</p>"
                       +"<p>学生:"+data['info'][$x]['booking_student']+"</p>"
                       +"<p>起始时间:"+data['info'][$x]['book_time']+"</p>"
                       +"<p>结束时间:"+data['info'][$x]['end_time']+"</p></div>";
                    } 
                  }
                  $teacher_name =data['teacher'];
                  $student_name =data['info'][0]['booking_student'];
                  $this.append(
                  "<div class='landinfo'>"
                  +"<p>责任老师:"+$teacher_name+"</p>"
                  +"<p>责任学生:"+$student_name+"</p>"
                  +$string+"</div>"
                  );
                  $this.css("background","#FF0000");break;
                  //已定
                  }//case2
                };
   

               var $color = $this.css("background");

              

            });//返回状态;
      }
      
          
    }
 


      

        $("td,div.yumi1,div.yumi2").each(function(){
           if($(this).attr("index")||$(this).attr("type")=="fixed"){
             $(this).mouseenter(function(){
                    $(this).children('.landinfo').css('display','block');             });
             $(this).mouseleave(function(){
                 $(this).children('.landinfo').css('display','none');
             });
          } 
        });//显示土地的信息


   
  });  

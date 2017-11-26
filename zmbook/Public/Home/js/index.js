 window.onload = function(){
       window.setTimeout(function(){ 
        // 延迟了一秒再隐藏loading
           $(".loading").hide();
       }, 1500)
 }

  //console.log(prg);
  //console.log(document.readyState);
$(document).ready(function(){
  $ajax_href = $(".ajax_href").val();

  var prg = progress(0,100,5)();

   // console.log(prg);
   // console.log(document.readyState);
  
  function progress (prg, dist, speed) {
    prg += speed;
    if(prg+speed>dist){
      prg = dist;
      return function(){
        return dist;
      }
    }
    $(".progress").text( prg + "%...");
    return function(){
      return prg;
    }
  }

  $('#mydatepicker').dcalendarpicker({format:'yyyy-mm-dd'}); //初始化日期选择器
  $('#mydatepicker1').dcalendarpicker({format:'yyyy-mm-dd'}); //初始化日期选择器
  var $date=new Date();
  var data=new Array();
  var $landchoose = 0;
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

                       +"<p>预定的时间段("+Number(Number($x)+Number(1))+"):</p>"
                       +"<p>学生:"+data['info'][$x]['booking_student']+"</p>"
                       +"<p>起始时间:"+data['info'][$x]['book_time']+"</p>"
                       +"<p>结束时间:"+data['info'][$x]['end_time']+"</p></div>";
                    } 
                  }
                  $teacher_name =data['teacher'];
                  $student_name =data['info'][0]['booking_student'];
                  $this.append(
                  "<div class='landinfo'>"
                  +"<p class='teacher_name'>责任老师:"+$teacher_name+"</p>"
                  +"<p>责任学生:"+$student_name+"</p>"
                  +$string+"</div>"
                  );
                  $this.css("background","#FF0000");break;
                  //已定
                  }//case2
                };
                if(prg <=100){
                 prg=progress(prg,100,2)();
                 console.log(document.readyState);
                }     

               var $color = $this.css("background-color");

               $this.click(function(){             
                 var $name=$this.parent().parent().parent().parent().parent().parent().siblings("caption").text()+"-"+$this.parent().parent().parent().siblings(".caption").text()+"-"+$this.children('p').text();//存Name              

                 if($this.attr("choose")==0&&$landchoose==0){
                    alert("你选择的地区是:  ["+$name+"]");
                    $this.css("background","rgb(255,215,170)");
                    $(".choose").after("<p class='bechoose "+$this.attr("index")+"'>"+$name+"</p>"+"<input type='hidden' name='landindex' value='"+$this.attr("index")+"'></input>"+"<input type='hidden' name='state' value='"+$this.attr("state")+"'></input>");
                    $this.attr("choose","1");
                    $landchoose++;
                 }
                 else if($this.attr("choose")==1){
                     alert("你取消了对  ["+$name+"]  的选择");             
                     $(".bechoose").remove("."+$this.attr('index'));
                     $this.css("background",$color);
                     $this.attr("choose","0");
                     $landchoose--;
                 } 
                 else {
                  alert('一次只能选择一块地!');
                 }
               });
              

            });//返回状态;
      }
      
          
    }
 
      

      // $("td").each(function(){
      //   if($(this).attr("index")){ 
      //        var $color=$(this).css("background");//存当前颜色
      //        console.log($color);
             
      //     }
      // });//选择土地;      

       $('form').submit(function(){

          if($landchoose==0){
            alert("你还没有选择土地!");
            return false;
          }
          else if($("input[name='project']").val()==""){
             alert("你还没有选择项目组!");
             return false;
          }
           else if($("input[name='book_time']").val()==""){
             alert("你还没有选择起始时间!");
             return false;
           }
            else if($("input[name='end_time']").val()==""){
             alert("你还没有选择结束时间!");
             return false;
            }
             else if(!checktime()){
             return false;
             }
              else if($("textarea").val()==""){
                 alert("你还没有描述实验内容!");
                   return false;
              }
               else if($("textarea").val().length<10||$("textarea").val().length>200){
                  alert("你描述的内容过长或过短!");
                   return false;
               }
       });

       function checktime(){

           $book_time=$("input[name='book_time']").val();
           $end_time=$("input[name='end_time']").val();

           var $newbook=$book_time.split('-').join('');
           var $newend=$end_time.split('-').join('');

           var $bookdate = new Date(Date.parse($book_time.replace(/-/g, "/")));

           $dateGetMonth=$date.getMonth()+1;

            if($dateGetMonth<10){
                $dateGetMonth="0"+$dateGetMonth;
            }
           var $nowdate=$date.getFullYear()+""+$dateGetMonth+""+$date.getDate();
           if($newbook<$nowdate||$newbook>$newend){
             // console.log("if"+$newbook+","+$newend+","+$nowdate);
             alert("错误的时间选择!请检查!");
             return false;
           }
           if(($bookdate.getTime()-$date.getTime())/(1000*24*3600*30)>6){
              alert("预定时间过长(半年内)!");
              return false;
           }
           else{
               $time_result=true;
               $("td").each(function(){
                    if($(this).attr("choose")==1&&$(this).attr("state")==2){
                      $(this).children().children('.infonum').each(function(){                   
                      $form_book=$(this).children("p").eq(2).text().replace(/\D/g,"");
                      $form_end=$(this).children("p").eq(3).text().replace(/\D/g,"");
                      console.log($form_book);
                      if(!($newbook>$form_end||$newend<$form_book)){
                        alert("你选择的时间和该地已被预定的时间有冲突!");
                        $time_result=false;
                        return false;
                      }
                      });
                    }
               });

               return $time_result;
           }
       }

        $("td,div.head,div.footer").each(function(){
           if($(this).attr("index")||$(this).attr("type")=="fixed"){
             $(this).mouseenter(function(){
                    $(this).children('.landinfo').css('display','block');
             });
             $(this).mouseleave(function(){
                 $(this).children('.landinfo').css('display','none');
             });
          } 
        });//显示土地的信息

        $(".timeinput").each(function(){
             $(this).focus(function(){
                    setTimeout(function(){
                      var $calresult=calmoney();
                      $('.form-time').text($calresult);
                      $('.submit-time').val($calresult);
                    },300);

             });
             $(this).blur(function(){
                    setTimeout(function(){
                      var $calresult=calmoney();
                      $('.form-time').text($calresult);
                      $('.submit-time').val($calresult);
                    },300);
             });

        });

        function calmoney(){
           $book_time=$("input[name='book_time']").val();
           $end_time=$("input[name='end_time']").val();
           if($book_time&&$end_time){
           var $bookdate = new Date(Date.parse($book_time.replace(/-/g, "/")));
           var $enddate = new Date(Date.parse($end_time.replace(/-/g, "/")));
           var result=$enddate.getTime()-$bookdate.getTime();

             if(result>=0) {
               return Math.ceil((result/(1000*24*3600))/15);
             } 
             else return null;
          }
          else{
             return null;
          }
        }
   
  });  

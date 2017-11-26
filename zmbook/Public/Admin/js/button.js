$(document).ready(function(){ 
$(window).resize(function(){
   location=location;
  if($(window).width()>980){
  $(".content").css("width",$(window).width()-280);
  $(".content").css({"margin-left":"260px","margin-top":"120px","width":$(window).width()-280});
  $(".alert").css("width","100%");
  $(".count").css("width","100%");
  $(".greenhouse").css("width","48%");
  $(".system-description").css("width","48%");
  $(".side").css("height",$(window).height());
  $(".header").css("width",$(window).width()-244);
  $(".footer").css({"margin-left":"250px","width":$(window).width()-260});
    $(".side").slideUp(0);
    $(".side").css({"border-right":"#999999 solid 3px","width":"240px"});
    $(".side-head").css("width","233px");  
  $(".side").show(0);
  $(".header").show(0);
  $(".dis-menu").hide(0);
  }
   if($(window).width()<=980){
  $(".side").hide(0);
  $(".header").hide(0);
  $(".dis-menu").show(0);
  $(".content").css({"margin-left":"20px","margin-top":"65px","width":$(window).width()-40});
  if($(window).width()<=600){
  $(".content").css({"margin-left":"20px","margin-top":"65px","width":"680px"}); 
  }
  $(".alert").css("width","100%");
  $(".count").css("width","100%");
  $(".greenhouse").css("width","48%");
  $(".system-description").css("width","48%");
  $(".header").css("width",$(window).width());
  $(".footer").css({"margin-left":"10px","width":$(window).width()-20});
   }
  });
if($(window).width()>980){
  $(".content").css("width",$(window).width()-280);
  $(".side").css("height",$(window).height());
  $(".content").css({"margin-left":"260px","margin-top":"120px","width":$(window).width()-280});
  $(".alert").css("width","100%");
  $(".count").css("width","100%");
  $(".greenhouse").css("width","48%");
  $(".system-description").css("width","48%");
  $(".header").css("width",$(window).width()-244);
  $(".footer").css("width",$(window).width()-260);
  $(".side").show(0);
  $(".header").show(0);
  $(".dis-menu").hide(0);   
  }
   if($(window).width()<=980){  
  $(".side").hide(0);
  $(".header").hide(0);
  $(".dis-menu").show(0); 
  $(".dis-menu").click(function(){
    $(".side").slideToggle(300);
    $(".side").css({"border":"none","width":"150px"});
    $(".side-head").css("width","140px");
  });  
  $(".content").css({"margin-left":"20px","margin-top":"65px","width":$(window).width()-40});
  if($(window).width()<=600){
  $(".content").css({"margin-left":"20px","margin-top":"65px","width":"680px"}); 
  }
  $(".alert").css("width","100%");
  $(".count").css("width","100%");
  $(".greenhouse").css("width","48%");
  $(".system-description").css("width","48%");
  $(".header").css("width",$(window).width());
  $(".footer").css({"margin-left":"10px","width":$(window).width()-20});
   } 
$(".alert").find("i").click(function(){
    $(".alert").hide(100);
});

$(".button-1").click(function(){
    $(".dis-1").slideToggle(300);
    $(".dis-2").slideUp(300);
    $(".dis-3").slideUp(300);
    $(".dis-4").slideUp(300);
    $(".dis-5").slideUp(300);
    $(".dis-6").slideUp(300);
  });
$(".button-2").click(function(){
    $(".dis-2").slideToggle(300);
    $(".dis-1").slideUp(300);
    $(".dis-3").slideUp(300);
    $(".dis-4").slideUp(300);
    $(".dis-5").slideUp(300);
    $(".dis-6").slideUp(300);
  });
$(".button-3").click(function(){
    $(".dis-3").slideToggle(300);
    $(".dis-1").slideUp(300);
    $(".dis-2").slideUp(300);
    $(".dis-4").slideUp(300);
    $(".dis-5").slideUp(300);
    $(".dis-6").slideUp(300);
  });
$(".button-4").click(function(){
    $(".dis-4").slideToggle(300);
    $(".dis-1").slideUp(300);
    $(".dis-2").slideUp(300);
    $(".dis-3").slideUp(300);
    $(".dis-5").slideUp(300);
    $(".dis-6").slideUp(300);
  });
$(".button-5").click(function(){
    $(".dis-5").slideToggle(300);
    $(".dis-1").slideUp(300);
    $(".dis-2").slideUp(300);
    $(".dis-3").slideUp(300);
    $(".dis-4").slideUp(300);
    $(".dis-6").slideUp(300);
  }); 


    // alert(window.location.href); 
    // var t = window.location.href.indexOf('Admin/admin_list');
    // if(1==1){
    // $(".dis-4").slideToggle(300);
    // $(".dis-1").hide();
    // $(".dis-2").hide();
    // $(".dis-3").hide();
    // $(".dis-5").hide();
    // $(".dis-6").hide();

    // }
    // alert(t); 









$(".menu-2").click(function(){
    $(".manager").fadeToggle(0);   
});
$(".count-head").click(function(){
    $(".count-content").slideToggle(500);
  });
$(".greenhouse-head").click(function(){
    $(".greenhouse-content").slideToggle(500);
  });
$(".system-description").click(function(){
    $(".system-1").slideToggle(500);
    $(".system-2").slideToggle(500);
  });
$(".tutor-message").click(function(){
    $(".tutor-change-content").hide();
    $(".tutor-change").css("background","#fff");
    $(".tutor-message-content").show();
    $(".tutor-message").css("background","#eeeeee");
  });
$(".tutor-change").click(function(){
    $(".tutor-message-content").hide();
    $(".tutor-change-content").show();
    $(".tutor-message").css("background","#fff");
    $(".tutor-change").css("background","#eeeeee");
  });
        $(".btn-p").click(function(){
            $("#explain").show();
        });
        $(".explain_close").click(function(){
            $("#explain").hide();
        });

});
//script that hides optional content
jQuery(document).ready(function($){
  
  $(".colophon-button").click(function(){
      if($(".colophon-container").hasClass("show")) {
          $(".colophon-contaier").removeClass("show");
      } 
      else {
          $(".colophon-contaier").addClass("show");
      }
    
    if($(".colophon-button").hasClass("rotate")){
       $(".colophon-button").removeClass("rotate");
    } else {
        $(".colophon-button").addClass("rotate");
    };
    /*$(".button i").toggleClass('rotate');*/
  });
});
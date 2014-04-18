//script that hides optional content
jQuery(document).ready(function($){
  
  $(".colophon-button").click(function(){
      $(".colophon-container").slideToggle('slow');
          
    
    
    if($(".colophon-button i").hasClass("rotate")){
       $(".colophon-button i").removeClass("rotate");
    } else {
        $(".colophon-button i").addClass("rotate");
    };
    return false;
});
});
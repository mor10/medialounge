// Isotope settings
jQuery(document).ready(function ($) {
   
    // Clear all checkboxes
    $('#filter-clear a').click(function () {
        $('.filter-boxes input:checked').removeAttr('checked');
        var clear = '*';
        $container.isotope({ filter: clear });
        return false;
    });
    
    // cache container
    var $container = $('#film-list');//contains id name of box that holds posts & content
    $checkboxes = $('.filter-boxes input');//id of div that contains all check boxes
    // initialize isotope
    $container.isotope({
        // options...
        itemSelector : '.item'
    });
    
    $checkboxes.change(function () {
        var filters = [];
        // get checked checkboxes values
        $checkboxes.filter(':checked').each(function () {
            filters.push(this.value);
        });
        // ['.red', '.blue'] -> '.red, .blue'
        filters = filters.join('');
        $container.isotope({ filter: filters });
    });   
});

//------------------------------------------

// Script that hides the filter options
jQuery(document).ready(function ($) {
  $(".button a").click(function(){
    $("#the-optional-content").slideToggle('slow');
    
    if($(".button a").hasClass("rotate")){
     $(".button a").removeClass("rotate");
    }else{
     $(".button a").addClass("rotate"); 
    }
  
  });
});
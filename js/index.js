// Isotope settings
jQuery(document).ready(function ($) {
   
    // Clear all checkboxes
    $('#filter-clear a').click(function () {
        $('.filter-boxes input:checked').removeAttr('checked');
        var clear = '*';
        $container.isotope({ filter: clear });
        $('.tag-stack li:has(input:checkbox:not(:checked))').removeClass('active');
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
    
    if($(".button i").hasClass("rotate")){
     $(".button i").removeClass("rotate");
    }else{
     $(".button i").addClass("rotate"); 
    }
  
  });
    $('.tag-stack input:checkbox').click(function () {
        $('.tag-stack li:has(input:checkbox:checked)').addClass('active');
        $('.tag-stack li:has(input:checkbox:not(:checked))').removeClass('active');
    });

});


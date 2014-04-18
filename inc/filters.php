
<!--<div id="filterHide">
    <h3> FILTER BY:</h3>
    <div class="button clear">
        <a href="#" > ^ </a>
    </div>
</div>-->


<div id="filterHide">    

    <h3>FILTER BY:</h3>
    
    <div class="button clear">
        <a href="#" >^</a>  
    </div>
</div> 




<div id="the-optional-content">

<div id="formatBox" class="filter-boxes clear">
<h3>FORMAT</h3>
    
             <div class = "option-set singleColumn formBox" data-group="film-format">
    
                <?php

$terms = get_terms("film-format");
//var_dump($terms);
    if (!empty( $terms ) && !is_wp_error( $terms ) ){
       foreach( $terms as $term){
        ?>                 
      <input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" />
        
             <label for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label> 
      <?php
       }
        
    }

?>

</div>
    
  

</div> <!--CloseFormatBox-->

   <div id = "filterTitles">
    
            <h3>GENRE</h3>
            <h3 id="styleTitle">STYLE / TECHNIQUE</h3>       
            <h3>NATIONALITY</h3>        
            <h3 id="moodTitle">TAG</h3>
            <h3>DURATION</h3>
       
       
    </div>

<div id="filters" class="filter-boxes">

 

         <div class = "option-set" data-group="genre">

   <!-- <input type="checkbox" value=""        id="genre-all" class="all" checked /><label for="genre-all">All Genres</label><br>-->
      
      <?php

$terms = get_terms("genre");
//var_dump($terms);
    if (!empty( $terms ) && !is_wp_error( $terms ) ){
       foreach( $terms as $term){
        ?>
      <input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" />
        
             <label for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label>   <br> 
      <?php
       }
        
    }

?>

</div>
    

  <div class = "option-set" data-group="technique">
                             
   <!-- <input type="checkbox" value=""        id="technique-all" class="all" checked /><label for="technique-      all">All Techniques</label><br>-->

<?php

    $terms = get_terms("technique");
    //var_dump($terms);
    if (!empty( $terms ) && !is_wp_error( $terms ) ){
       foreach( $terms as $term){
        ?>
      <input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" /><label            for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label>    <br>
      <?php
       }
        
    }

?>

    </div>
        



     <div class = "option-set singleColumn nationalityBox" data-group="nationality">
                   

   <!-- <input type="checkbox" value=""        id="nationality-all" class="all" checked /><label for="nationality-all">All Nationalities</label><br>-->
    
      <?php

$terms = get_terms("nationality");
//var_dump($terms);
    if (!empty( $terms ) && !is_wp_error( $terms ) ){
       foreach( $terms as $term){
        ?>
      <input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" /><label for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label><br>
      <?php
       }
        
    }

?>


      </div>
    

     <div class = "option-set singleColumn moodBox" data-group="mood">

        
 <!--   <input type="checkbox" value=""        id="mood-all" class="all" checked /><label for="mood-all">All Moods</label><br>-->
            <?php

$terms = get_terms("post_tag");
//var_dump($terms);
    if (!empty( $terms ) && !is_wp_error( $terms ) ){
       foreach( $terms as $term){
        ?>
      <input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" /><label for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label><br>
      <?php
       }
    }

?>        
      </div>   
    
    
     <div class = "option-set noBorder singleColumn durationBox" data-group="duration">
         
         
          <!--   <input type="checkbox" value=""        id="mood-all" class="all" checked /><label for="mood-all">All Moods</label><br>-->
            <?php

$terms = get_terms("duration");
//var_dump($terms);
    if (!empty( $terms ) && !is_wp_error( $terms ) ){
       foreach( $terms as $term){
        ?>
      <input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" /><label for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label><br>
      <?php
       }
    }

?> 


</div>
    
    
    
    </div><!--close filters-->



<div id="selectionBox">    
    
    <div id="filter-clear">
        <a href="#" >clear all</a>  
    </div>
</div> 
        </div> <!--close optional content-->

<p id="filter-display"></p>

    

    


<!--<div id="filterHide">
    <h3> FILTER BY:</h3>
    <div class="button clear">
        <a href="#" > ^ </a>
    </div>
</div>-->


<div id="filterHide">    

    <h3>FILTER BY:</h3>
    
    <div class="button">
        <a href="#" ><i class="fa fa-chevron-up"></i></a>  
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


<div id="filters" class="filter-boxes">

    <div class="filter-stack">
        <h3 class="filter-title">GENRE</h3>

        <div class = "option-set" data-group="genre">
            <ul>
            <?php
            $terms = get_terms("genre");
            //var_dump($terms);
                if (!empty( $terms ) && !is_wp_error( $terms ) ){
                   foreach( $terms as $term){
                    ?>
                <li><input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" /><label for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label></li>
                  <?php
                   }
                }
            ?>
            </ul>
            </div>
    </div>
    
    <div class="filter-stack">
        <h3 class="filter-title">STYLE/TECHNIQUE</h3>
        <div class = "option-set" data-group="technique">
            <ul>
            <?php
                $terms = get_terms("technique");
                //var_dump($terms);
                if (!empty( $terms ) && !is_wp_error( $terms ) ){
                   foreach( $terms as $term){
                    ?>
                <li><input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" /><label            for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label></li>
                  <?php
                   }
                }
            ?>
            </ul>
        </div>
    </div>
        
    <div class="filter-stack">
        <h3 class="filter-title">NATIONALITY</h3>

        <div class = "option-set  nationalityBox" data-group="nationality">    
            <?php
            $terms = get_terms("nationality");
            
            echo '<ul>';
                if (!empty( $terms ) && !is_wp_error( $terms ) ){
                   foreach( $terms as $term){
                    ?>
                    <li><input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" /><label for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label></li>
                  <?php
                   }
                }
                echo '</ul>';
            ?>
        </div>
    </div>

    <div class="tag-stack">
        <h3 class="filter-title">TAGS</h3>
        <div class = "option-set singleColumn moodBox" data-group="mood">
            <ul>
            <?php
             $terms = get_terms( 'post_tag', array(
                'orderby'    => 'count',
                'hide_empty' => true
            ) );
            //var_dump($terms);
                if (!empty( $terms ) && !is_wp_error( $terms ) ){
                   foreach( $terms as $term){
                    ?>
                <li><input type="checkbox" value=".<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" /><label for="<?php echo $term->slug; ?>"><?php  echo $term->name; ?></label></li>
                  <?php
                   }
                }
            ?>   
            </ul>
        </div>   
    </div>
  
    
    
</div><!--close filters-->



<div id="selectionBox">    
    
    <div id="filter-clear">
        <a href="#" >clear all</a>  
    </div>
</div> 
        </div> <!--close optional content-->

<p id="filter-display"></p>

    

    

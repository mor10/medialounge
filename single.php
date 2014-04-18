<?php
/**
 * The Template for displaying all single posts.
 *
 * @package medialounge
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                               
                                <div class="movie-meta">
                                    <?php
                                    $genres = wp_get_object_terms($post->ID, 'genre');
                                    if ( $genres ) {
                                        echo '<ul class="tax-genre">';
                                        foreach($genres as $term){ 
                                            echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.' <span class="dividers">//</span></li>'; 
                                        }
                                        echo '</ul><!-- .tax-genre -->';
                                    }
                                    $techniques = wp_get_object_terms($post->ID, 'technique');
                                    if ( $techniques ) {
                                        echo '<ul class="tax-technique">';
                                        foreach($techniques as $term){ 
                                            echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.'<span class="dividers"> //</span></li>'; 
                                        }
                                        echo '</ul><!-- .tax-technique -->';
                                    }
                                    $durations = wp_get_object_terms($post->ID, 'duration');
                                    if ( $techniques ) {
                                        echo '<ul class="tax-duration">';
                                        foreach($durations as $term){ 
                                            echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.'<span class="dividers"> //</span></li>'; 
                                        }
                                        echo '</ul><!-- .tax-duration -->';
                                    }
                                    $nationalities = wp_get_object_terms($post->ID, 'nationality');
                                    if ( $nationalities ) {
                                        echo '<ul class="tax-nationality">';
                                        foreach($nationalities as $term){ 
                                            echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.'<span class="dividers"> //</span></li>'; 
                                        }
                                        echo '</ul><!-- .tax-nationality -->';
                                    }
                                    $moods = wp_get_object_terms($post->ID, 'post_tag');
                                    if ( $moods ) {
                                        echo '<ul class="tax-mood">';
                                        foreach($moods as $term){ 
                                            echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.'<span class="dividers"> //</span></li>'; 
                                        }
                                        echo '</ul><!-- .tax-mood -->';
                                    }
                                    ?>
                                </div>

                            </header><!-- .entry-header -->
                            
                            <div class="onehalf-container">
                             
                                <div class="video-player">
                                    <video id="video-movie" controls preload="metadata" 
                                           width="580" height="280"
                                        poster="http://upload.wikimedia.org/wikipedia/en/7/71/Finding_Nemo_Coverart.png" class=" video-js vjs-default-skin" >
                                        <source src='/medialounge/wp-content/videos/movie01.mp4' type="video/mp4" title="Oceans">
                                    </video> 
                                </div>
                            
                                 
                                
                                
                                <div class="excerpt">
                                    <?php the_excerpt(); ?>
                                </div><!-- .excerpt -->
                                <div class="collaboration">
                                 <div class="other-films">
                                  <h3 class="collab">This artist also collaborated in:</h3>
                                  
                                  
                                 
                                  
                                  
                                  
                                  
                                  <span class="collaborated-films">poster</span>
                                  <span class="collaborated-films">poster</span>
                                  <span class="collaborated-films">poster</span>
                                  <span class="collaborated-films">poster</span>
                                 </div>
                                  <div class="collaborators">
                                    <h3 class="collab">Collaborators in Film</h3>
                                    <?php
                                        // check if the repeater field has rows of data
                                        if( have_rows('collaborators') ):
                                            echo '<ul class="other-people">';
                                                // loop through the rows of data
                                            while ( have_rows('collaborators') ) : the_row();

                                                // display a sub field value
                                                $collaborator = get_sub_field('collaborator_name');
                                                echo '<li><a  class="peeps" href="' . get_site_url('/') . '?author=' . $collaborator[ID] . '" title="See movies by ' . $collaborator[display_name] . '">' . $collaborator[display_name] . '</a></li>';

                                            endwhile;
                                            echo '</ul>';
                                        else :

                                            // no rows found

                                        endif;

                                        ?>
                                  </div>

                                </div>
                            </div>
                             

                            
                             <div class="stills">
                                 
                                 <?php
                                // check if the repeater field has rows of data
                                if( have_rows('screenshots') ):

                                        // loop through the rows of data
                                    while ( have_rows('screenshots') ) : the_row();
                                        $image = get_sub_field('image');
                                        // display a sub field value
                                        echo '<figure class="still"><a href="' . $image['url'] . '"><img src="' . $image['url'] . '"></a></figure>';

                                    endwhile;

                                endif;

                                ?>
                                 <?php 
                                 $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); 
                                 ?>
                                 <figure class="still"><a href="<?php echo $large_image_url[0]; ?>"><?php echo get_the_post_thumbnail(); ?></a></figure>
                                <div class="control">
                                    <a href="#" class="movie-trigger" data-bind="/medialounge/wp-content/videos/movies/<?php echo the_field('video_slug'); ?>.mp4">Full Movie</a> 
                                    <a href="#" class="trailer-trigger" data-bind="/medialounge/wp-content/videos/trailers/<?php echo the_field('video_slug'); ?>trailer.mp4">Trailer</a>
                                </div>
                             </div>
                            
                           
                            <div class="artist-info ">
                              <div class="headshot"><?php userphoto_the_author_photo(); ?></div>
                                
                                <h1 class="artist-name"><?php echo esc_html( get_the_author() ); ?></h1>
                            </div>
                            <div class="onequarter-container"> 
                              <h2 class="bio">Bio</h2>
                                <p class="author-bio">
                                    <?php the_author_meta( 'description' )  ?>
                                </p>
                            </div>
                            <div class="entry-content onehalf-container">
                                <div class="as-title">Artist Statement (post content)</div>
                                    <p class="artist-statement"><?php the_content(); ?></p>
                            </div><!-- .entry-content -->
                            
                            

                            
                            

                            <footer class="entry-footer">
                                    <?php // This would be where the movies he/she has collaborated on goes I think ?>
                            </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
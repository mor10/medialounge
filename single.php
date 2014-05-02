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
                                    <?php //medialounge_display_tax_names(); 
                                    $tax_array = array(
                                        'film-format',
                                        'genre',
                                        'technique',
                                        'duration',
                                        'nationality',
                                        'post_tag'
                                    );
                                    echo get_the_term_list( $post->ID, $tax_array, '<ul><li>', '</li> <span class="dividers">//</span> <li>', '</li></ul>' );
                                    ?>
                                </div>
                            </header><!-- .entry-header -->
                            
                            <div class="single-left">
                                <div class="onehalf-container">
                                    <div class="video-player">
                                        <video id="video-movie" controls preload="metadata" 
                                               width="600" height="280"
                                            poster="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" class=" video-js vjs-default-skin" >
                                            <source src='/medialounge/wp-content/videos/movie01.mp4' type="video/mp4" title="Oceans">
                                        </video> 
                                    </div>

                                    <div class="excerpt">
                                        <?php the_excerpt(); ?>
                                    </div><!-- .excerpt -->
                                </div><!-- .onehalf-container -->
                                <div class="onehalf-right">
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
                                           <a href="#" class="movie-trigger" data-bind="/medialounge/wp-content/videos/movies/<?php echo the_field('video_slug'); ?>.mp4"><i class="fa fa-play"></i> Play Full Movie</a> 
                                           <a href="#" class="trailer-trigger" data-bind="/medialounge/wp-content/videos/trailers/<?php echo the_field('video_slug'); ?>trailer.mp4"><i class="fa fa-play"></i> Play Trailer</a>
                                       </div>
                                    </div><!-- .stills -->
                                </div><!-- .onehalf-right -->
                                    
                                
                                <div class="collaboration clear">
                                    <?php
                                    // args
                                    $args = array(
                                        'numberposts' => -1,
                                        'meta_query' => array(
                                            array(
                                                'key' => 'collaborators_%_collaborator_name',
                                                // value = author ID
                                                'value' => get_the_author_meta('id'),
                                            )
                                        )
                                    );

                                    // get results
                                    $collaboration_query = new WP_Query( $args );
                                    
                                    if ( $collaboration_query->have_posts()  ) {
                                        echo '<div class="other-films">';
                                        echo '<h3 class="collab">This artist also collaborated in:</h3>';
                                        echo '<ul class="poster-list">';
                                        while($collaboration_query->have_posts()): $collaboration_query->the_post(); 
                                                echo '<li class="collaborated-films">';
                                                echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . ' - Click to watch">';
                                                the_post_thumbnail('collaboration');
                                                echo '</a></li>';
                                        endwhile; 
                                        echo '</ul>';
                                        echo '</div>';
                                    }
                                    
                                    wp_reset_postdata(); 
                                    ?>
                                    
                                    <?php 
                                    if( have_rows('collaborators') ):
                                    ?>
                                        <div class="collaborators">
                                            <h3 class="collab">Collaborators in Film</h3>
                                            <?php
                                                // check if the repeater field has rows of data

                                                    echo '<ul class="other-people">';
                                                        // loop through the rows of data
                                                    while ( have_rows('collaborators') ) : the_row();

                                                        // display a sub field value
                                                        $collaborator = get_sub_field('collaborator_name');
                                                        echo '<li><a  class="peeps" href="' . get_site_url('/') . '?author=' . $collaborator[ID] . '" title="See movies by ' . $collaborator[display_name] . '">' . $collaborator[display_name] . '</a></li>';

                                                    endwhile;
                                                    echo '</ul>';
                                            ?>
                                        </div><!-- .collaborators -->
                                    <?php endif; ?>
                                </div><!-- .collaboration -->

                            </div><!-- .single-left -->
                            
                           <div class="single-right">
                               <?php 
                                if ( get_the_author_meta( 'description' ) ) { 
                                ?>
                               <div class="bio-container clear">
                                <?php } ?>
                                <div class="artist-info ">
                                    <div class="headshot"><?php userphoto_the_author_photo(); ?></div>
                                    <div class="artist-name"><?php echo esc_html( get_the_author() ); ?></div>
                                </div>
                                <?php 
                                if ( get_the_author_meta( 'description' ) ) { 
                                ?>
                                    <div class="artist-bio"> 
                                      <h2 class="bio">Bio</h2>
                                        <p class="author-bio">
                                            <?php the_author_meta( 'description' )  ?>
                                        </p>
                                    </div>
                               </div><!-- .bio-container -->
                                <?php } ?>
                                   
                                <div class="statement">
                                    <h2 class="bio">Artist Statement</h2>
                                        <?php the_content(); ?>
                                </div><!-- .entry-content -->

                           </div><!-- .single-right -->
                        </article><!-- #post-## -->

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


        
<?php get_footer(); ?>
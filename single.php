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
                                <div class="explanation">Movie title (post title)</div>
                                    <h1 class="entry-title"><?php the_title(); ?></h1>

                            </header><!-- .entry-header -->
                             
                            <div class="video-player">
                                <video id="video-movie" controls preload="metadata" 
                                       width="600" height="300"
                                    poster="http://upload.wikimedia.org/wikipedia/en/7/71/Finding_Nemo_Coverart.png" class=" video-js vjs-default-skin" >
                                    <source src='/medialounge/wp-content/videos/movie01.mp4' type="video/mp4" title="Oceans">
                                </video>     
                            </div>

                            <div class="control">
                                <a href="#" class="movie-trigger" data-bind="/medialounge/wp-content/videos/movie01.mp4">Full Movie</a> 
                                <a href="#" class="trailer-trigger" data-bind="/medialounge/wp-content/videos/trailer01.mp4">Trailer</a>
                            </div>
                            
                            
                            <div class="excerpt">
                                <div class="explanation">Short description (excerpt)</div>
                                <?php the_excerpt(); ?>
                            </div><!-- .excerpt -->
                            <div class="entry-content">
                                <div class="explanation">Artist statement (post content)</div>
                                    <?php the_content(); ?>
                            </div><!-- .entry-content -->
                            
                            <div class="movie-meta">
                                <div class="explanation">Taxonomy output</div>
                                <?php
                                $genres = wp_get_object_terms($post->ID, 'genre');
                                if ( $genres ) {
                                    echo '<ul class="tax-genre">';
                                    foreach($genres as $term){ 
                                        echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.'</li>'; 
                                    }
                                    echo '</ul><!-- .tax-genre -->';
                                }
                                $techniques = wp_get_object_terms($post->ID, 'technique');
                                if ( $techniques ) {
                                    echo '<ul class="tax-technique">';
                                    foreach($techniques as $term){ 
                                        echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.'</li>'; 
                                    }
                                    echo '</ul><!-- .tax-technique -->';
                                }
                                $durations = wp_get_object_terms($post->ID, 'duration');
                                if ( $techniques ) {
                                    echo '<ul class="tax-duration">';
                                    foreach($durations as $term){ 
                                        echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.'</li>'; 
                                    }
                                    echo '</ul><!-- .tax-duration -->';
                                }
                                $nationalities = wp_get_object_terms($post->ID, 'nationality');
                                if ( $nationalities ) {
                                    echo '<ul class="tax-nationality">';
                                    foreach($nationalities as $term){ 
                                        echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.'</li>'; 
                                    }
                                    echo '</ul><!-- .tax-nationality -->';
                                }
                                $moods = wp_get_object_terms($post->ID, 'mood');
                                if ( $moods ) {
                                    echo '<ul class="tax-mood">';
                                    foreach($moods as $term){ 
                                        echo '<li><span class="icon-'.$term->slug.'"></span>'.$term->name.'</li>'; 
                                    }
                                    echo '</ul><!-- .tax-mood -->';
                                }
                                ?>
                            </div>

                            <div class="artist-info">
                                <div class="explanation">Artist name (from profile)</div>
                                <h1 class="artist-name"><?php echo esc_html( get_the_author() ); ?></h1>
                                <p class="author-bio">
                                    <?php the_author_meta( 'description' )  ?>
                                </p>
                            </div>
                            <div class="collaborators">

                                <?php

                                // check if the repeater field has rows of data
                                if( have_rows('collaborators') ):
                                    echo '<ul>';
                                        // loop through the rows of data
                                    while ( have_rows('collaborators') ) : the_row();

                                        // display a sub field value
                                        $collaborator = get_sub_field('collaborator_name');
                                        echo '<li><a href="' . get_site_url('/') . '?author=' . $collaborator[ID] . '" title="See movies by ' . $collaborator[display_name] . '">' . $collaborator[display_name] . '</a></li>';

                                    endwhile;
                                    echo '</ul>';
                                else :

                                    // no rows found

                                endif;

                                ?>
                            </div>

                            <footer class="entry-footer">
                                    <?php // This would be where the movies he/she has collaborated on goes I think ?>
                            </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
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

                                    <div class="entry-meta">
                                            <?php medialounge_posted_on(); ?>
                                    </div><!-- .entry-meta -->
                            </header><!-- .entry-header -->
                             
                            <div class="excerpt">
                                <?php the_excerpt(); ?>
                            </div><!-- .excerpt -->
                            <div class="entry-content">
                                    <?php the_content(); ?>
                            </div><!-- .entry-content -->

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
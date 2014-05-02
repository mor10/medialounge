<?php
/**
 * Template Name: Artist Name List New
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                    <h1 class="entry-title"><?php the_title(); ?></h1>

                            </header><!-- .entry-header -->
                            
                            <div class="entry-content">
                                    <?php medialounge_list_users_alphabetically(); ?>
                            </div><!-- .entry-content -->
                            
                    </article>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

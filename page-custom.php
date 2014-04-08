<?php
/**
 * Template Name: Custom Video Page
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
            <div class="video-player">
                <video id="video-playlist" controls preload="metadata" 
                    poster="http://upload.wikimedia.org/wikipedia/en/7/71/Finding_Nemo_Coverart.png" class=" video-js vjs-default-skin" >
                    <source src='http://video-js.zencoder.com/oceans-clip.mp4' type="video/mp4" title="Oceans">
                    <source src="/medialounge/wp-content/videos/lynda_demo.mp4" type='video/mp4' title="Carrie Talks" />
                </video>     
            </div>
            
            <ul id="selector">
                <li><a href="#" class="Oceans">Oceans</a></li>
                <li><a href="#" class="Carrie">Carrie Talks</a></li>
            </ul>
            
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'medialounge' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'medialounge' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

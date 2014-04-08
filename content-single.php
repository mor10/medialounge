<?php
/**
 * @package medialounge
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php medialounge_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'medialounge' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
        
        <div class="collaborators">
            
            <?php
 
            // check if the repeater field has rows of data
            if( have_rows('collaborators') ):

                    // loop through the rows of data
                while ( have_rows('collaborators') ) : the_row();

                    // display a sub field value
                    $collaborator = get_sub_field('collaborator_name');
                    var_dump($collaborator);
                    echo '<a href="' . get_site_url('/') . '?author=' . $collaborator[ID] . '" title="See movies by ' . $collaborator[display_name] . '">' . $collaborator[display_name] . '</a>';

                endwhile;

            else :

                // no rows found

            endif;

            ?>
        </div>

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'medialounge' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'medialounge' ) );

			if ( ! medialounge_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'medialounge' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'medialounge' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'medialounge' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'medialounge' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'medialounge' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

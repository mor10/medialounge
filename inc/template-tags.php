<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package medialounge
 */

if ( ! function_exists( 'medialounge_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function medialounge_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'medialounge' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'medialounge' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'medialounge' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'medialounge_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function medialounge_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'medialounge' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'medialounge' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link',     'medialounge' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'medialounge_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function medialounge_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'medialounge' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function medialounge_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so medialounge_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so medialounge_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in medialounge_categorized_blog.
 */
function medialounge_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'medialounge_category_transient_flusher' );
add_action( 'save_post',     'medialounge_category_transient_flusher' );


/*
 * Create classes from every taxonomy term and author slub
 */

function medialounge_create_tax_classes() {
    $tax_array = array(
            'film-format',
            'genre',
            'technique',
            'duration',
            'nationality',
            'post_tag'
        );
    $terms = get_the_terms( get_the_ID(), $tax_array );
    $classes = array();
    
    if($terms) {
        foreach ($terms as $term) {
            $classes[] = $term->slug;
        }
        $the_classes = implode(' ', $classes);
        return $the_classes;   
    }
}


function medialounge_redirect_author() {
    if (is_author()) {
        global $wp_query;
        if ($wp_query->post_count == 1) {
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
        }
    }
}

add_action('template_redirect', 'medialounge_redirect_author');


function medialounge_list_users_alphabetically()
{
	$users = get_users( 'orderby=user_login&role=author' ); 
 
	$first_letter = '';
        $firstinstance = 0;
        echo '<ul class="artist-list">';
	foreach( $users as $user )
	{
		$space = strpos( $user->user_login, ' ' );
		$letter = substr( $user->user_login, 0, 1 );
		$letter = strtoupper( $letter );
		
		if ( $letter != $first_letter )
		{
                    $first_letter = $letter;
                    if ( $firstinstance != 0  ) { echo '</ul></li>'; }
                    echo "<li>$first_letter<ul>"; 
		}
		echo '<li><a href="' . get_author_posts_url( $user->ID, $user->user_nicename ) . '" title="' . $user->display_name . '">' . $user->display_name . '</a></li>';
                $firstinstance++;
	}
        echo '</ul>';
}   
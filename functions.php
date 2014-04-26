<?php
/**
 * medialounge functions and definitions
 *
 * @package medialounge
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'medialounge_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function medialounge_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
        add_image_size('index-thumb', '177', '275', true);
        add_image_size('collaboration', '64', '96', true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'medialounge' ),
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'medialounge_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // medialounge_setup
add_action( 'after_setup_theme', 'medialounge_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function medialounge_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'medialounge' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'medialounge_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function medialounge_scripts() {
	wp_enqueue_style( 'medialounge-style', get_stylesheet_uri(), array(), '20140412' );
        
        wp_enqueue_style( 'medialounge-open-sans', get_stylesheet_directory_uri() . '/fonts/opensans/opensans.css' );
        
        wp_enqueue_style('medialounge-fontawesome', get_stylesheet_directory_uri() . '/fonts/fontawesome/css/font-awesome.min.css' );
        
        wp_enqueue_style('mediaelement');
        
        wp_enqueue_style( 'mep-styles', get_template_directory_uri() . '/css/mep-feature-playlist.css' );
        
        wp_enqueue_script( 'colophon', get_template_directory_uri() . '/js/colophon.js', array('jquery'), '04162014');

	wp_enqueue_script( 'medialounge-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
        if (!is_single()) {
            wp_enqueue_script( 'medialounge-mediaelement-playlist', get_template_directory_uri() . '/js/mep-feature-playlist.js', array('wp-mediaelement','jquery'), '20120206', true );

            wp_enqueue_script( 'medialounge-playlist-settings', get_template_directory_uri() . '/js/playlist-settings.js', array('medialounge-mediaelement-playlist'), '20140331', true );
        }
        wp_enqueue_script('mediaelement-settings', get_stylesheet_directory_uri() . '/js/mediaelement-settings.js', array('wp-mediaelement','jquery'), '20140410', true );
	wp_enqueue_script( 'medialounge-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
        
        
        wp_enqueue_script( 'medialounge-javascript', get_template_directory_uri() . '/js/index.js', array('jquery'), '20130115', true );
        
        wp_enqueue_script( 'isotope-javascript', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '20130115', true );

}
add_action( 'wp_enqueue_scripts', 'medialounge_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom media taxonomies.
 */
require get_template_directory() . '/inc/mediataxonomy.php';

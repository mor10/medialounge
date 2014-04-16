<?php
/**
 * @package medialounge
 */
?>

<article id="post-<?php the_ID(); ?>" class="item poster <?php echo medialounge_create_tax_classes(); ?>">
    <?php
        echo '<div class="index-poster">';
        echo the_post_thumbnail('index-thumb');
        echo '</div>';
    ?>
    <div class="poster-content">
        <header class="poster-header">
            <a href="<?php echo esc_url( get_permalink() ); ?>" title="More info about <?php echo get_the_title(); ?>">
                <div class="poster-hero">
                    Creator
                </div>
                <h1 class="poster-artist"><?php echo esc_html( get_the_author() ); ?></h1>
                <div class="poster-excerpt"><?php the_excerpt(); ?></div>
            </a>
        </header><!-- .entry-header -->
        <footer class="poster-footer">
            <div class="poster-time"><?php echo get_field('movie_length'); ?> min</div>
            <div class="poster-nav control clear">
                <div class="poster-trailer"><a href="#" class="trailer-trigger" data-bind="/medialounge/wp-content/videos/trailers/<?php echo the_field('video_slug'); ?>trailer.mp4" title="Play trailer">Trailer</a></div>
                <div class="poster-full"><a href="#" class="movie-trigger" data-bind="/medialounge/wp-content/videos/movies/<?php echo the_field('video_slug'); ?>.mp4" title="Play full movie">Full</a></div>
            </div>
        </footer>
    </div>

</article><!-- #post-## -->

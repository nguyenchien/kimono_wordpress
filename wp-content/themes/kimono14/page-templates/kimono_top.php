<?php
/**
 * Template Name: Kimono Top Page Template
 * Links: /
 */
get_header();
wp_enqueue_style('top.css');
?>
    <div class="full-width">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; // end of the loop. ?>
    </div><!-- end content-yukata -->
<?php get_footer(); ?>
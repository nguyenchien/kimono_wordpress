<?php
/**
 * Template Name: Kimono Top Page Template
 * Links: /
 */
get_header('new-kimono');
wp_enqueue_style('top.css');
?>
    <div class="full-width">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; // end of the loop. ?>
    </div><!-- end content-yukata -->
<?php get_footer('new-kimono') ; ?>
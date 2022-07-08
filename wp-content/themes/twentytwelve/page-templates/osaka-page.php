<?php
/**
 * Template Name: Osaka Page Template
 * Links: /osaka
 */
get_header('new-kimono');
wp_enqueue_style('top.css');
?>
<div class="content-osaka">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div><!-- end content-osaka -->
<?php get_footer('new-kimono') ; ?>

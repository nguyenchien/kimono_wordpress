<?php
/**
 * Template Name: Asakusa Page Template
 * Links: /asakusa
 */
get_header(); 
wp_enqueue_style('top.css');
?>
<div class="content-asakusa">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div><!-- end content-osaka -->
<?php get_footer(); ?>

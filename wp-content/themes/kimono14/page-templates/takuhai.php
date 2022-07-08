<?php
/**
 * Template Name: Takuhai Template
 * Links: /takuhai
 */
get_header();
?>
    <div class="content toppage">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; // end of the loop. ?>
    </div><!-- end content-yukata -->
<?php get_footer(); ?>
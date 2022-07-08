<?php
/**
 * Template Name: Two column page howto, faq1
 */
get_header(); ?>
<div class="container clearfix">
    
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
    } ?>

    <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'page-two-column-howto-faq' ); ?>
            <?php // comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>		
    
</div><!-- end container -->
<?php get_footer(); ?>
<?php
/**
 * Template Name: One column Page Template - Kimono, No Sidebar
 */

wp_register_style( 'style-one-column', get_template_directory_uri()  . '/css/style-one-column.css');
wp_enqueue_style( 'style-one-column' );

get_header(); ?>
<div class="container clearfix">
    
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
    } ?>

    <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'page-one-column-kimono' ); ?>
            <?php comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>		
    
</div><!-- end container -->
<?php get_footer(); ?>
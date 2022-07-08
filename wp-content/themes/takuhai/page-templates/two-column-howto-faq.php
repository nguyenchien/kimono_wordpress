<?php
/**
 * Template Name: Two column page howto, faq
 * Links: /howto, /faq, /faq/book, /faq/dressing, /faq/hairset, /faq/henkyaku, /faq/contactwp
 */

wp_register_style('howto-faq', get_template_directory_uri() . '/css/takuhai-howto.css', array('twentytwelve-style'));
wp_enqueue_style('howto-faq');

global $post;
get_header();
?>
<div class="container clearfix">
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
    } ?>

    <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>		
    
</div><!-- end container -->
<?php get_footer(); ?>
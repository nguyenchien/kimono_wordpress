<?php
/**
 * Template Name: Two column page howto, faq
 */
get_header(); ?>
<div class="container clearfix">
    
    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
    } ?>

    <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'page-one-column' ); ?>
	    <?php Yii::app()->controller->widget('application.components.widgets.EventTrackingContactForm'); ?>
            <?php // comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>		
    
</div><!-- end container -->
<?php get_footer(); ?>
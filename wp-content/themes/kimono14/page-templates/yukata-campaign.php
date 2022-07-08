<?php
/**
 * Template Name: Yukata Campaign
 * Links: /yukata/campaign
 */
get_header(); 
wp_enqueue_style('top.css');
wp_register_style('style-yukata-campaign', get_template_directory_uri() . '/css/yukata-campaign.css', array('twentytwelve-style'));
wp_enqueue_style('style-yukata-campaign');
?>
<div>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div><!-- end content-yukata -->
<?php get_footer(); ?>
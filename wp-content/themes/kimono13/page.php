<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<script type="text/javascript" src="<?php echo get_bloginfo('url') ?>/js/jquery.simple-dtpicker.js"></script>
<link type="text/css" href="<?php echo get_bloginfo('url') ?>/css/jquery.simple-dtpicker.css" rel="stylesheet" />
<div class="container">
    
<?php if ( function_exists('yoast_breadcrumb') && !is_page('booking') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
    } ?>

<!--<div id="primary" class="site-content">
<div id="content" role="main">-->
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>
        <?php comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>
<!--</div>
</div>-->

<?php //get_sidebar(); ?>

</div><!-- end container -->
<script type="text/javascript">
$(function (){
    $('input#book-time').dtpicker({
        "locale": "ja"
    });
});
});
</script>
<?php get_footer(); ?>
<?php
/**
 * Template Name: FAQs Page Template, No Sidebar
 */

wp_register_style( 'style-one-column', get_template_directory_uri()  . '/css/style-one-column.css');
wp_enqueue_style( 'style-one-column' );

function theme_name_scripts() {
    //wp_enqueue_style( 'simple-dtpicker', get_template_directory_uri(). '/css/jquery.simple-dtpicker.css');
    //wp_enqueue_script( 'simple-dtpicker', get_template_directory_uri() . '/js/jquery.simple-dtpicker.js', array(), '1.0.0', true );
    wp_enqueue_style( 'contact-form7-confirm', get_template_directory_uri(). '/css/contact-form7-confirm.css');
    wp_enqueue_script( 'contact-form7-confirm', get_template_directory_uri() . '/js/contact-form7-confirm.js', array(), '1.0.0', true );

}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

get_header(); ?>

<!--script type="text/javascript" src="<?php echo get_bloginfo('url') ?>/js/jquery.simple-dtpicker.js"></script>
<link type="text/css" href="<?php echo get_bloginfo('url') ?>/css/jquery.simple-dtpicker.css" rel="stylesheet" /-->

<div class="container clearfix">
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">','</div>');
} ?>

<?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page-faqs' ); ?>
        <?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>      
</div>
<!--<script type="text/javascript">
jQuery( document ).ready(function() {
    //jQuery('input#book-time').hide();

    var $time_input = jQuery('input#book-time');
    $time_input.attr('readonly', true);

    $time_input.appendDtpicker({
        "inline":true,
        "locale": "ja",
        //"dateOnly: true"
        'dateFormat' : 'YYYY年MM月DD日 hh時mm分',
        "minTime":"10:00",
        "maxTime":"18:30",
        "timelistScroll":true,
        "autodateOnStart": false,
        "calendarMouseScroll": false,
    });
    jQuery('div.datepicker').addClass('wpcf7c-elm-step1');
    var now = new Date();
    now.setMinutes(Math.floor(now.getMinutes()/30)*30);
    console.log(now);
    $time_input.handleDtpicker('setDate', now);
    $time_input.val('');
});
</script>
-->
<?php get_footer(); ?>
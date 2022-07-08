<?php
/**
 * Template Name: New Formal FurisodeMaedori
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-formal-maedori-style', get_template_directory_uri() . '/css/new-formal-maedori.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-maedori-style');
wp_register_style('new-formal-furisodemaedori-style', get_template_directory_uri() . '/css/new-formal-furisodemaedori.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-furisodemaedori-style');
wp_enqueue_script('booking-js', WP_HOME . '/js/booking.js');
get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
?>
<div class="container-box clearfix">
    <?php
    if($post->post_name != "formal"){
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
    }
    ?>
    <div class="wrap-highend-v2">
        <?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
        ?>
    </div><!-- end wrap-highend-v2 -->

</div><!-- end container -->
<?php get_footer('formal') ;?>
<script>
    $(document).ready(function(){
        /* Begin: faqs */
        $(".box-faqs-item").click(function(){
            $(this).find(".icon-fa").toggleClass("icon-fa-collapsed-down-faqs icon-fa-collapsed-top-faqs")
            $(this).siblings(".box-faqs-item-content").slideToggle();
        });
        /* End: faqs */
    });
</script>

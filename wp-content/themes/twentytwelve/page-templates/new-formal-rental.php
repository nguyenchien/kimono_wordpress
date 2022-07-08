<?php
/**
 * Template Name: New Formal Rental
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

get_header('formal');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'), '202107060800');
wp_enqueue_style('new-formal-rental-style');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
?>
<div class="container-box clearfix">
    <?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
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
<script type="text/javascript">
    $(document).ready(function () {

        //Toggle shop list
        $('.search-list').click(function(){
            $(this).toggleClass('active');
            $(this).closest('.area-item').find('.list-shop').slideToggle('fast');
        })
    });
</script>
<?php get_footer('formal') ;?>

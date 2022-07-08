<?php
/**
 * Template Name: New Takuhai Howto
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
wp_register_style('new-takuhai-howto-style', get_template_directory_uri() . '/css/new-takuhai-howto.css', array('twentytwelve-style'));
wp_enqueue_style('new-takuhai-howto-style');
get_header('new-takuhai');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
?>
	<div class="container-box clearfix">
		<div class="wrap-highend-v2">
			<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
			?>
		</div><!-- end wrap-highend-v2 -->

	</div><!-- end container -->
<?php get_footer('new-takuhai') ;?>
<?php
/**
 * Template Name: Kimono Commemorative Photo Page
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
wp_register_style('kimono-commemorative-photo-style', get_template_directory_uri() . '/css/kimono_commemorative_photo.css', array('twentytwelve-style'));
wp_enqueue_style('kimono-commemorative-photo-style');

get_header();
global $post, $custom_post_type, $custom_taxonomies;
?>
<div class="container clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>
    <div class="<?php echo $post->post_name; ?>">
		<div class="content"><?php the_content(); ?></div>
		<div class="shop-instruction clearfix">
			<div class="title-access clearfix"><h2 class="access"><span class="icon-user"></span><?php echo Yii::t('wp_theme', 'Access<span>アクセスマップ</span>'); ?></h2></div>
			<div class="map shop left">
				<?php the_field('google_map'); ?>
			</div>
			<div class="instruction right">
				<?php the_field('shop_instruction'); ?>
			</div>
		</div>
	</div>
</div><!-- end container -->
<?php get_footer(); ?>
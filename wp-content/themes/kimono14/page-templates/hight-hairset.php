<?php
/**
 * Template Name: Hight Hairset
 * Links: /hairset
 */
global $post;

get_header(); 
wp_register_style('hairset', get_template_directory_uri() . '/css/hairset.css', array());
wp_register_style('option', get_template_directory_uri() . '/css/option.css', array());
wp_register_style('style-highend-furisode', get_template_directory_uri() . '/css/highend-furisode.css', array('twentytwelve-style'));
wp_enqueue_style('style-highend-furisode');
wp_enqueue_style('hairset');
wp_enqueue_style('option');
?>
<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/booking.js"></script>
	<div class="container hight-hairset clearfix">
		<?php if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		} ?>

		<?php while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h1 class="banner clearfix">
					<?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
					<p class="brief"><?php the_field('page_h1'); ?></p>
				</h1><!-- end .banner -->

				<div class="content clearfix">
					<?php echo the_content(); ?>
				</div><!-- end content -->

				<div class="entry-meta sixteen columns">
					<?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
				</div>
			</article><!-- #post -->

		<?php endwhile; // end of the loop. ?>

	</div><!-- end container.hairset-page -->
<?php //get_footer(); ?>
<?php echo get_render_template('footer_purple.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".list-products .product .list-image ul li").click(function(){
			$(this).parents('.wrap-product').find('.main-image img').attr('src',$(this).find('img').attr('data-src'));
			$(this).addClass('active').siblings().removeClass('active');
		});
		$(".list-products .product .list-image ul li:first-child").trigger('click');
	});
	// Set is_admin default value
	var is_admin = '';
</script>

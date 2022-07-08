<?php
/**
 * Template Name: New Kimono Group
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

// Get page parent's slug
global $post, $language;
$post_data = get_post($post->post_parent);
$parent_slug = $post_data->post_name;
$language = Yii::app()->language;
get_header('new-kimono');

wp_register_style('new-kimono-group-style', get_template_directory_uri() . '/css/new-kimono-group.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-group-style');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;
?>
<div class="container-box clearfix">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
	}
	?>

	<div class="wrap-highend-v2">
		<div class="wrap-content-v2">
			<div class="container-box">
				<div class="wrap-column-content flexbox">
					<div class="left-column-content">
						<div class="wrap-boths-column flexbox">
							<div class="left-column left-column-new-kimono hidden-sidebar">
								<?php get_sidebar('top-page-left-v3') ?>
							</div>

							<div class="right-column right-column-list right-column-list-new-kimono">
								<?php
								while (have_posts()) : the_post();
									the_content();
								endwhile;
								?>
							</div><!--end right-column-->

						</div><!--end wrap-boths-column-->

					</div><!--end left-column-content-->


				</div><!--end wrap-column-content-->
			</div>

		</div><!--end content-v2-->
	</div><!--end wrap-highend-v2-->

</div><!-- end container -->
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>



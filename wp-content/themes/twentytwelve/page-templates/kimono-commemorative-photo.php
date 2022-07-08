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

get_header('new-kimono');
global $post, $custom_post_type, $custom_taxonomies, $language;
$language = Yii::app()->language;
?>
	<div class="container-box clearfix">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
		?>
		<div class="wrap-highend-v2">
			<div class="wrap-content-v2">
				<div class="container-box">
					<div class="wrap-column-content flexbox">
						<div class="left-column-content">
							<div class="wrap-boths-column flexbox">
								<div class="left-column hidden-sidebar">
									<?php get_sidebar('top-page-left') ?>
								</div>
								<div class="right-column">
									<div class="container clearfix">
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->


<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
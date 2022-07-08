<?php
/**
 * Template Name: Yukata Campaign
 * Links: /yukata/campaign
 */
global $languag;
$language = Yii::app()->language;
get_header('new-kimono');
wp_enqueue_style('top.css');
wp_register_style('style-yukata-campaign', get_template_directory_uri() . '/css/yukata-campaign.css', array('twentytwelve-style'));
wp_enqueue_style('style-yukata-campaign');
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
										<?php while ( have_posts() ) : the_post(); ?>
											<?php the_content(); ?>
										<?php endwhile; // end of the loop. ?>
									</div><!-- end content-yukata -->
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
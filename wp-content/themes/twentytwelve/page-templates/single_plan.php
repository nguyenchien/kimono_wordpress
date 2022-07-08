<?php
/**
 * Template Name: Single Plan page
 * Pages apply: /seijin, /sotsugyou, /homongi, /shichigosan, /irotomesode,/kurotomesode
 */
global $post, $language;
$language = Yii::app()->language;
wp_register_style('style-single_plan', get_template_directory_uri() . '/css/single_plan.css', array('twentytwelve-style'));
wp_enqueue_style('style-single_plan');
get_header('new-kimono');
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
								<div class="container content-only clearfix <?php echo $post->post_name ?>">
									<?php while ( have_posts() ) : the_post();
										the_content();
									endwhile; // end of the loop. ?>
								</div><!-- end container.kimono-group -->
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

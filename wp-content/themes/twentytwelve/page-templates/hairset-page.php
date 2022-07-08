<?php
/**
 * Template Name: Hairset Page
 * Links: /kimono/hairset, /yukata/hairset
 */
global $post, $language;
$language = Yii::app()->language;
get_header('new-kimono');
wp_register_style('hairset', get_template_directory_uri() . '/css/hairset.css', array());
wp_register_style('option', get_template_directory_uri() . '/css/option.css', array());
wp_enqueue_style('hairset');
wp_enqueue_style('option');
?>
	<script>
		// Set is_admin default value
		var is_admin = '';
	</script>
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
									<div class="container hairset-page clearfix">
										<?php while (have_posts()) : the_post(); ?>
											<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
												<?php if(has_post_thumbnail()): ?>
													<div class="box-banner clearfix">
														<?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
														<h1 class="brief"><?php the_field('page_h1'); ?></h1>
													</div><!-- end box-banner -->
												<?php endif; ?>
												<div class="box-content-page hairset clearfix">
													<div class="cont-page-left clearfix">
														<?php
														$thecontent = strip_shortcodes(get_the_content());
														echo php_set_base_url($thecontent);
														get_template_part('temp-small/kimono-hairset');
														?>
													</div>
												</div><!-- end box-content-page -->
												<?php

												$baseUrl = Yii::app()->getBaseUrl(true);
												$curLang =  Yii::app()->language ;
												$url = $baseUrl . '/' . $curLang  . '/reserve';?>
												<div class="bnt-link-reserve-page"><a href="<?=$url?>"><?php echo Yii::t('wp_theme', '着物レンタルのご予約はこちら');?></a></div>
												<div class="entry-meta sixteen columns">
													<?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
												</div>

											</article><!-- #post -->

										<?php endwhile; // end of the loop. ?>

									</div><!-- end container.hairset-page -->
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
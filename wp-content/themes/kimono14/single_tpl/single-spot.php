<?php
/**
 * The Template for displaying SPOT category single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style( 'style-column', get_template_directory_uri() . '/css/column.css', array('twentytwelve-style'));
wp_enqueue_style( 'style-column' );
get_header();
?>
<style type="text/css">
	.acf-map {
		width: 606px;
		height: 444px;			
	}
</style>
<div class="container container-column-page clearfix">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
	}
	?>
	<div class="content-column-page content-course-page hd-page-template hd-column">

		<div class="box-title">
			<div class="wrap">
				<h1 class="title"><?php the_title(); ?></h1>
				<div class="desc-col"><?php the_excerpt(); ?></div>
				<div class="list-social-net">				
					<?php
					if (function_exists('wp_social_bookmarking_light_output_e')){
						wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));
					}
					?>
				</div>
			</div>
		</div><!-- end box-title -->

		<div class="wrap-con clearfix">
			<div class="con-left">

				<?php while (have_posts()) : the_post(); ?>
					
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- title -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					<div class="spot-custom-fields">
						<div class="h2-block h2-block-second">
							<?php
							$cfs = get_fields();
							$show_cfbasic = get_field('show_cfbasic');
							$image= get_field('image');
							$name = get_field('name');
							$time = get_field('time');
							$phone = get_field('phone');
							$access_from_kyoto_station = get_field('access_from_kyoto_station');
							$location = get_field('google_map');
							$show_cfmap = get_field('show_cfmap');
							?>
							<?php if ($show_cfbasic || !isset($cfs['show_cfbasic'])):?>
							<h2 class="h2-title-bar"><?php echo Yii::t('wp_theme','基本情報'); ?></h2>
							<div class="wrap-course clearfix" data-show_cfbasic="<?php echo $show_cfbasic ? $show_cfbasic : 'no_update';?>">
								<div class="imageleft" style="float: right; margin: 0px;">
									<?php if ($image){
										echo swe_wp_get_attachment_image($image, 'spot-thumb', false, array('alt' => strip_tags(get_the_title())));
									}else{
                                        swe_the_post_thumbnail($post, 'spot-thumb', array('alt' => strip_tags(get_the_title())));
									}
									?>
								</div>
								<div class="textright" style="float: left; margin: 0px 40px 0px 0px; width: 290px;">
									<ul>
										<?php if ($name): ?>
											<li class="name">
												<label>
													<?php echo Yii::t('wp_theme','住所'); ?>
												</label>
												<span>
													<?php echo $name; ?>
												</span>
											</li>
										<?php endif; ?>
										<?php if ($time): ?>
											<li class="time">
												<label>
													<?php echo Yii::t('wp_theme','拝観時間'); ?>
												</label>
												<span>
													<?php echo $time; ?>
												</span>
											</li>
										<?php endif; ?>
										<?php if ($phone): ?>
											<li class="phone">
												<label>
													<?php echo Yii::t('wp_theme','電話番号'); ?>
												</label>
												<span>
													<?php echo $phone; ?>
												</span>
											</li>
										<?php endif; ?>
										<?php if ($access_from_kyoto_station): ?>
											<li class="access_from_kyoto_station">
												<label>
													<?php echo Yii::t('wp_theme','京都駅からのアクセス'); ?>
												</label>
												<span>
													<?php echo $access_from_kyoto_station; ?>
												</span>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							</div>		
						</div>
						<?php endif?>

						<?php
						if ((!empty($location) && !empty($location['lat']) && !empty($location['lng'])) && ($show_cfmap || !isset($cfs['show_cfmap']))):
							?>
							<div class="h3-block" data-show_cfmap="<?php echo $show_cfmap ? $show_cfmap : 'no_update';?>">
								<h3 class="h3-title-bar">
									<?php echo Yii::t('wp_theme','アクセスマップ'); ?>
								</h3>
								<div class="google_map">
									<div class="acf-map">
										<div class="marker" id="spot-map" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
									</div>
								</div>
							</div>
						<?php endif;?>
					</div>
					<div class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-meta -->

				</article><!-- #post -->
				<?php endwhile; // end of the loop. ?>
				<?php addBannerInColumnPage();?>
			</div>

			<div class="con-right">
				<?php get_sidebar('spot'); ?>
			</div>
		</div><!-- end wrap-cont -->

	</div><!-- end content-column-page -->

</div><!-- end container -->
<?php get_footer(); ?>
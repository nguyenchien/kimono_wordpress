<?php
/**
 * Template Name: Test Access Child Page
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
wp_register_style('test-access-style', get_template_directory_uri() . '/css/test-access.css', array('twentytwelve-style'));
wp_enqueue_style('test-access-style');
wp_register_style('access-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));

wp_register_style('style-lightbox-style', get_template_directory_uri() . '/css/style-lightbox.css', array('twentytwelve-style'));
wp_enqueue_style('style-lightbox-style');

wp_register_style('top-style', get_template_directory_uri() . '/css/top.css', array('twentytwelve-style'));
wp_enqueue_style('top-style');
wp_register_style('access-style-flexslider', get_template_directory_uri() . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-flexslider');
wp_enqueue_script('access-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
get_header();
global $post, $custom_post_type, $custom_taxonomies;
$detect = Yii::app()->mobileDetect;
?>
	<div class="container clearfix">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
		?>
		<div class="access-child-page hd-access <?php echo $post->post_name; ?>">
			<div class="container top-shop">
				<div class="shop-page-title shop-icon <?php echo $post->post_name; ?> clearfix">
					<?php $arr_icon = array(
						'access/kyotostation', 'access/gion-shijo', 'access/shinkyogoku','access/kiyomizuzaka','access/ninenzaka','access/kinkakuji',
						'osaka/osaka-access/osaka-shinsaibashi',
						'/asakusa/asakusa-access/asakusa',
						'access/kamakura');
					?>
					<div class="left" >
						<div class="clearfix">
							<h1 class="page-title"><?php the_title(); ?></h1>
							<span class='shop-name-en'><?php the_field('shop_name_en'); ?></span>
						</div>
						<?php if(get_field('shop_detail_2')): ?>
							<p class="shop_detail_2 clearfix"><?php the_field('shop_detail_2'); ?></p>
						<?php endif; ?>
					</div>
					<div class='right list-icon-shop'>
						<?php foreach ($arr_icon as $v): $t = get_page_by_path($v); ?>
							<a class='icon-shop <?php echo $t->post_name . ($post->post_name == $t->post_name ? ' active ' : ""); ?>'
							   href='<?php echo ($post->post_name != $t->post_name ? get_permalink($t->ID)  : 'javascript:void(0)' ); ?>'
							   title='<?php echo strip_tags(get_the_title($t->ID)); ?>'><span><?php echo strip_tags(get_the_title($t->ID)); ?></span></a>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="shop-info clearfix">
					<?php
					$listGalery = getGaleryFromPost($post);
					if ($listGalery):
						foreach ($listGalery as $galery) : $galery = $galery['ids'];
							?>
							<div class="shop-list">
								<div class="slide-images">
									<div class="gallery-item">
										<div class="main-image">
											<div class="list-image">
												<ul class="clearfix">
													<?php
													if (!empty($galery) && count($galery) != 0) :
														$i = 0;
														foreach ($galery as $attachment_id):
															?>
															<?php
															$ok = wp_get_attachment_image($attachment_id);
															if (!empty($ok) && $i <=3) {
																$i = $i + 1;
																$image = wp_get_attachment_image_src($attachment_id, 'full', false);
																$thumb = swe_wp_get_attachment_image_src($attachment_id, array(475, 406));
																?>
																<li <?php if ($i % 5 == 0) echo "class='last'"; ?>>
																	<a href="<?php echo $image[0];?>" rel="lightbox">
																		<img onmouseover="document.getElementById('1_1_main').src = '<?php echo $image[0]; ?>';" src="<?php echo $thumb[0]; ?>" alt= "<?php echo strip_tags(get_the_title()) ?>" />
																	</a>
																</li>
															<?php } ?>
														<?php endforeach; ?>
													<?php endif; ?>
												</ul>
											</div>
										</div>
										<div class="page-excerpt left"><?php the_excerpt(); ?></div>
									</div><!-- gallery-item -->
								</div><!-- end slide-images -->
							</div><!-- end shop-list -->
							<?php
						endforeach; // end foreach ($listGalery as $galery) {
					else:
						if(!empty($post->post_excerpt)):
							?>
							<div class="page-excerpt no-gallery"><?php the_excerpt(); ?></div>
							<?php
						endif;
					endif; // end if($listGalery){
					?>
					<div class="shop-detail">
						<div class="title"><?php echo Yii::t('wp_theme', '店舗情報'); ?></div>
						<?php echo do_shortcode(get_field('shop_detail_3')); ?>
					</div>
					<?php if (Yii::app()->language === 'ja'): ?>
						<?php
						if (get_field('shop_blog')):
							$term = get_term_by('slug', get_field('shop_blog'), $custom_taxonomies['blog']);
							$data = get_category_data($term, $custom_taxonomies['blog']);

							// Restore original Post Data
							wp_reset_postdata();
							// WP_Query arguments
							$args = array(
								$custom_taxonomies['blog'] => get_field('shop_blog'),
								'post_type' => $custom_post_type['blog'],
								'post_status' => 'publish',
								'posts_per_page' => 4,
								'order' => 'DESC',
								'orderby' => 'date',
							);

							// The Query
							$my_query = new WP_Query($args);

							// The Loop
							if ($my_query->have_posts()) {
								$i = 1;
								?>
								<h2 class="blog"><?php echo yii::t('wp_theme', 'Blog<span>ブログ</span>') . '<span class="right">' . strip_tags(get_the_title()) . '</span>' ?></h2>
								<div class="blog-shop clearfix container">
									<?php
									while ($my_query->have_posts()) {
										$my_query->the_post();
										?>
										<div class="post-item <?php echo $i == 1 ? 'first' : "" ?>">
											<div class="featured-post">
												<?php if (get_post_thumbnail_id()): ?>
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
														<?php echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title()))); ?>
													</a>
												<?php endif; ?>
											</div>
											<p>
												<a class="shop_name" href="<?php echo get_term_link($data['id'], $custom_taxonomies['blog']); ?>"><span ><?php echo $data['shop']; ?></span></a>
												<span class="blog-date"><?php echo get_the_date(); ?></span>
											</p>
											<h3>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
											</h3>
										</div>
										<?php
										$i++;
									}
									?>
								</div>
								<?php
							} else {
								// no posts found
							}
							// Restore original Post Data
							wp_reset_postdata();
							?>
						<?php endif; //get_field('shop_blog')?>
					<?php endif; ?>
					<!-- banners -->
					<div class="topics clearfix">
						<ul class="topic-1 two-columns clearfix">
							<li>
								<a href="<?php echo esc_url(home_url('kimono/hairset'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_hairset');?>" src="<?php echo WP_HOME.'/images/topics/topic_banner_hairset'.(Yii::app()->language=='ja' ? '' : '_'.Yii::app()->language).'.png';?>"></a>
							</li>
							<li>
								<a href="<?php echo esc_url(home_url('group'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_group');?>" src="<?php echo WP_HOME.'/images/topics/topic_banner_group'.(Yii::app()->language=='ja' ? '' : '_'.Yii::app()->language).'.png';?>"></a>
							</li>
						</ul>
						<ul class="topic-2 three-columns clearfix">
							<li>
								<a href="<?php echo esc_url(home_url('kimono/tenimotsu'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_bring');?>" src="<?php echo WP_HOME.'/images/topics/access-topic-banner-tenimotsu.jpg';?>"></a>
							</li>
							<li>
								<a href="<?php echo esc_url(home_url('yukata'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_yukata');?>" src="<?php echo WP_HOME.'/images/topics/access-topic-banner-yukata.jpg';?>"></a>
							</li>
							<li>
								<a href="<?php echo esc_url(home_url('kimono/photo-studio'));?>"><img alt="<?php echo Yii::t('wp_theme.access','banner_photostudio');?>" src="<?php echo WP_HOME.'/images/topics/access-topic-banner-photostudio.jpg';?>"></a>
							</li>
						</ul>
					</div>
					<?php
					$shop_id = get_field('shop_id');
					if($shop_id){
						?>
						<div class="container section-booking-top-page">
							<section class="block-viewbooking-top-page">
								<div class="block-title-top-page-title bg-top-page-title booking">
									<h2><span class="icon-icon-booking"></span><?= Yii::t('access','<span class="en">Booking</span><span class="ja">予約状況</span>')?></h2>
								</div>
								<div id="box-calendar" class="sixteen columns row">
									<div class="description-plan-top clearfix">
										<ul>
											<li><?= Yii::t('access','空きのある日時からご予約が出来ます。ご来店を希望される日時を選択してください。')?></li>
										</ul>
									</div>
									<?php
									$clientScript = Yii::app()->clientScript;
									$baseUrl = Yii::app()->baseUrl;
									$detect = Yii::app()->mobileDetect;
									$clientScript->registerCssFile($baseUrl.'/css/booking.css');

									if ($detect->isSmartPhone()) {
										$clientScript->registerCssFile($baseUrl.'/css/booking_mobile.css');
										if(in_array(Yii::app()->language,array('en','vi','tw','th'))){
											$clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/multi_lang_'.Yii::app()->language.'.css');
										}
									}
									echo  ReserveStatus(array('shop_ids'=>array(get_field('shop_id'))));
									$region_name = get_field('region_name');
									?>
									<p class="des-call"><?php echo Yii::t('wp_theme.access','phone_contact_'.$region_name)?></p>
								</div>
							</section>
						</div>
						<?php
					}
					?>

				</div>
			</div>
			<div class="title-access"><h2 class="access"><span class="icon-user"></span><?php echo Yii::t('wp_theme', 'Access<span>アクセスマップ</span>'); ?></h2></div>
			<div class="container">
				<div class="shop-instruction clearfix">
					<div class="instruction_full_width">
						<?php
						$shop_distance_time = get_field('shop_distance_time');
						if(!empty($shop_distance_time)){
							the_field('shop_instruction');
						}
						?>
					</div>
					<div class="map shop left">
						<?php the_field('google_map'); ?>
					</div>
					<div class="instruction right">
						<?php
						if(!empty($shop_distance_time)){
							echo $shop_distance_time;
						}else{
							the_field('shop_instruction');
						}
						?>
					</div>
					<script type="text/javascript">
						$(function () {
							var carousel_option = {};
							var slider_option = {};
							<?php
                                if (!$detect->isSmartPhone()){ // pc ?>
							slider_option = {
								animation: "slide",
								animationLoop: false,
								slideshow: true,
								itemWidth: 50,
								itemMargin: 5,
								minItems:2,
								maxItems: 2,
								pausePlay: false,
								controlNav: true,
								slideshowSpeed: 4000,
								animationSpeed: 400,
								start: function ($slider) {
									$('.navNext').on('click', function () {
										$slider.flexAnimate($slider.getTarget("next"), true);
									});
									$('.navPrev').on('click', function () {
										$slider.flexAnimate($slider.getTarget("prev"), true);
									});
									$('.cus-flex-play').on('click', function () {
										if ($(this).hasClass('navPause')) {
											$(this).removeClass('navPause').addClass('navPlay');
											$slider.pause();
										} else if($(this).hasClass('navPlay')){
											$(this).removeClass('navPlay').addClass('navPause');
											$slider.play();
										}
									});
									$('body').removeClass('loading');
								},
								init: function () {
									setTimeout(function () {
										$('.tool').css('display', 'flex');
									}, 1000);
								}
							};
							$('#carousel').hide();
							<?php } else { ?>
							carousel_option = {
								animation: "slide",
								controlNav: false,
								animationLoop: true,
								slideshow: false,
								itemWidth: 100,
								itemMargin: 5,
								pausePlay: false,
								minItems:1,
								maxItems: 6,
								asNavFor: '#slider'
							};
							slider_option = {
								animation: "fade",
								animationLoop: true,
								slideshow: false,
								sync: "#carousel",
								pausePlay: false,
								controlNav: false,
								slideshowSpeed: 4000,
								animationSpeed: 400,
								start: function ($slider) {
									$('.navNext').on('click', function () {
										$slider.flexAnimate($slider.getTarget("next"), true);
									});
									$('.navPrev').on('click', function () {
										$slider.flexAnimate($slider.getTarget("prev"), true);
									});
									$('.cus-flex-play').on('click', function () {
										if ($(this).hasClass('navPause')) {
											$(this).removeClass('navPause').addClass('navPlay');
											$slider.pause();
										} else if($(this).hasClass('navPlay')){
											$(this).removeClass('navPlay').addClass('navPause');
											$slider.play();
										}
									});
									$('body').removeClass('loading');
								},
								init: function () {
									setTimeout(function () {
										$('.tool').css('display', 'flex');
									}, 1000);
								}
							};
							$('#carousel').flexslider(carousel_option);
							<?php } ?>
							$('#slider').flexslider(slider_option);
						});
					</script>
				</div>
				<?php the_field('access_instruction');?>
				<?php if (get_field('link_youtube') || get_field('link_youtube2')): ?>
					<div class="youtube clearfix">
						<h3><?php echo Yii::t('wp_theme', 'お店までの道順'); ?></h3>
						<?php if (get_field('link_youtube')): ?>
							<div class="youtube-1 left">
								<?php the_field('link_youtube'); ?>
							</div>
						<?php endif; ?>
						<?php if (get_field('link_youtube2')): ?>
							<div class="youtube-2 left">
								<?php the_field('link_youtube_2'); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if (get_field('google_map_see_inside')): ?>
					<div class="google_map_see_inside map images clearfix">
						<?php the_field('google_map_see_inside'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div><!-- end content-column-page -->

	</div><!-- end container -->

<?php get_footer(); ?>
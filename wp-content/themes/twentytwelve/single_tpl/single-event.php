<?php
	/**
	 * The template for displaying Category pages
	 *
	 * Used to display archive-type pages for posts in a category.
	 *
	 * @link http://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package WordPress
	 * @subpackage Twenty_Twelve
	 * @since Twenty Twelve 1.0
	 */
	//	wp_register_style( 'style-blog', get_template_directory_uri() . '/css/blog.css', array('twentytwelve-style'));
	//	wp_enqueue_style( 'style-blog' );
	wp_register_style('font-teko', 'https://fonts.googleapis.com/css?family=Teko', array('twentytwelve-style'));
	wp_enqueue_style('font-teko');
	wp_register_style('style-event', get_template_directory_uri() . '/css/event.css', array('twentytwelve-style'));
	wp_enqueue_style('style-event');
	wp_register_style('style-registration', get_template_directory_uri() . '/css/registration.css', array('twentytwelve-style'));
	wp_enqueue_style('style-registration');

	get_header('new-kimono');
	global $post, $kimono;
	$taxonomy = $kimono['taxonomy'];
	$cat_item = $kimono['current_cate'];
	$category_data = get_category_data($cat_item);
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
									<div class="layout-event-page container clearfix">
										<div class="event-page-detail">

											<div class="banner-top-registration">
												<div class="banner-top-event"><img src="<?=$category_data['img_src'];?>" alt=""></div>
												<div class="des-reg-bottom">
													<ul class="box-des-reg clearfix">
														<li class="clearfix">
															<h3 class="title-reg"><?php echo get_field('event_limit'); ?></h3>
															<p class="text-reg"><span class="text-date"><?php echo get_field('event_date'); ?></span><span class="text-time"><?php echo get_field('event_time'); ?></span>
															</p>
														</li>
														<li class="clearfix"><h3 class="title-r"><?php the_title(); ?></h3><p class="des-r"><?php echo get_field('sub_title'); ?></p>
														</li>
													</ul>
												</div>
											</div>

											<div class="detail-wrap">
												<div class="image-wrap">
													<div class="gallery">
														<div class="main-image">
															<?php
															$bannerImage = swe_get_field_image(get_field('main_picture'));
															$subImage[] = swe_get_field_image(get_field('sub_image_1'));
															$subImage[] = swe_get_field_image(get_field('sub_image_2'));
															$subImage[] = swe_get_field_image(get_field('sub_image_3'));
															?>
															<?php if (!empty($bannerImage)) {
																$banner_url = $bannerImage['url'];
																$banner_alt = $bannerImage['alt'];
																echo "<img src='$banner_url' alt='$banner_alt' />";
															}
															?>
														</div>
														<div class="thumb-image">
															<ul class="dp-flex">
																<?php
																if (!empty($subImage)) {
																	foreach ($subImage as $img) {
																		$img_url = $img['url'];
																		$img_alt = $img['alt'];
																		echo "<li><a href='$img_url' rel='lightbox'><img width='150px' height='100px' src='$img_url' alt='$img_alt' /></a></li>";
																	}
																}
																?>
															</ul>
														</div>
													</div>
													<div class="info">
														<ul>
															<li class="dp-flex">
																<div class="label">場　所</div>
																<div class="text dp-flex">
																	<p><?php echo get_field('address'); ?></p>
																</div>
															</li>
															<li class="dp-flex">
																<div class="label">日　時</div>
																<?php echo get_field('event_datetime_meta'); ?>
															</li>
															<li class="dp-flex">
																<div class="label">参加費/参加条件</div>
																<?php echo get_field('event_fee_and_condition'); ?>
															</li>
														</ul>
														<div class="wrap-link-more">
															<a class="link-more reserve" href="/event/registration?event_id=<?=get_field('event_id')?>"><?php echo Yii::t('event', 'このイベントに参加する'); ?></a>
														</div>
													</div>
												</div>
											</div>
											<?php the_content(); ?>
											<div class="wrap-link-more">
												<a class="link-more reserve" href="/event/registration?event_id=<?=get_field('event_id')?>"><?php echo Yii::t('event', 'このイベントに参加する'); ?></a>
											</div>

											<div class="banner-bottom-registration">
												<div class="wrap-area-reg clearfix">
													<div class="area-f-reg kamakura clearfix">
														<div class="map-area-reg" id="map-google-kamakura" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; background-color: rgb(229, 227, 223);"><div class="gm-err-container"><div class="gm-err-content"><div class="gm-err-icon"><img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" draggable="false" style="-webkit-user-select: none;"></div><div class="gm-err-title">エラーが発生しました。</div><div class="gm-err-message">このページでは Google マップが正しく読み込まれませんでした。JavaScript コンソールで技術情報をご確認ください。</div></div></div></div></div>
														<div class="area-info-reg">
															<div class="area-icon-reg"><span class="fa-icon icon-icon-kamakura"></span></div>
															<div class="info-reg">
																<h3>鎌倉小町店</h3>
																<h5>鎌倉駅徒歩2分</h5>
																<p class="text-reg">神奈川県鎌倉市小町1丁目5−13</p></div>
															<div class="time">09:30～18:00 ※最終返却は17:30までです。</div>
															<div class="info-bottom-reg">
																<p class="top-text-reg"><span class="fa-icon icon-dot-f"></span><span class="text-reg">お店への行き方</span></p>
																<p class="bottom-text-reg">鎌倉駅東口を出て左側、赤い鳥居をくぐって小町通に入ります。<br>
																	小町通の入り口から一本目の右側の路地を入り、右側です。</p>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->


<?php echo get_render_template('footer_purple.php'); ?>
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
										<div class="event-page">
											<div class="banner">
												<img src="<?=$category_data['img_src'];?>" alt="">
												<p><?=$category_data['description'];?></p>
											</div>
											<?php if (have_posts()) : ?>
												<?php while (have_posts()) : the_post();?>
													<div class="item">
														<div class="wrap-item">
															<div class="col-left">
																<div class="banner-image">
																	<?php
																	$bannerImage = swe_get_field_image(get_field('main_picture'));
																	?>
																	<img src="<?php echo $bannerImage['url']; ?>" alt="<?php echo $bannerImage['alt']; ?>" />
																</div>
															</div>
															<div class="col-right">
																<div class="event-title"><?php the_title(); ?></div>
																<div class="description">
																	<?php echo get_field('short_description'); ?>
																</div>
																<div class="detail-description">
																	<?php
																	$event_id = get_field('event_id');
																	if (!empty($event_id)) {
																		echo do_shortcode( "[EventScheduleDesciption event_id=$event_id]" );
																	}
																	?>
																</div>
															</div>
														</div>
														<div class="buttons dp-flex">
															<a class="link-more detail" href="<?php the_permalink(); ?>">詳細を見る</a>
															<a class="link-more reserve" href="/event/registration?event_id=<?=get_field('event_id')?>">このイベントに参加する</a>
														</div>
													</div>
													<?php
												endwhile;
												twentytwelve_content_nav('nav-below');
												?>
											<?php else : ?>
												<?php get_template_part('content', 'none'); ?>
											<?php endif; ?>
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
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->

<?php echo get_render_template('footer_purple.php'); ?>
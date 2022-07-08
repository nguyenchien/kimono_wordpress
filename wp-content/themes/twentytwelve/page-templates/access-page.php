<?php
/**
 * Template Name: Access Page
 * Link: /access
 */
wp_register_style('access-style', get_template_directory_uri() . '/css/access.css', array('twentytwelve-style'));
wp_enqueue_style('access-style');
get_header('new-kimono');
global $post;
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
										<!-- Kyoto kimono shops-->
										<div class="column-list-page access-page clearfix hd-page-template hd-column-list content-column-page newAccessPage">
											<div class="sectionLinkToShop">
												<ul class="list-shops-link">
													<li><a href="#kyoto-area"><?= Yii::t('wp_theme','京都エリア'); ?></a></li>
													<li><a href="#osaka-area"><?= Yii::t('wp_theme','大阪エリア'); ?></a></li>
													<li><a href="#tokyo-area"><?= Yii::t('wp_theme','関東エリア'); ?></a></li>
													<li><a href="#horiku-area"><?= Yii::t('wp_theme','北陸エリア'); ?></a></li>
												</ul>

												<div class="box-overview-page-howto-faq clearfix">
													<div class="image">
														<?php swe_the_post_thumbnail($post,'full', array('alt' => strip_tags(get_the_title()))); ?>
													</div><!-- end image -->
													<div class="info">
														<div class="wrap">
															<?php
															if (get_field('sub-title-page')) {
																echo '<h2>' . get_field('sub-title-page') . '</h2>';
															}
															?>
															<h1>
																<?php
																if (wp_nonce_field('page_h1')) {
																	the_title();
																} else {
																	the_field('page_h1');
																}
																?>
															</h1>
															<?php if (!empty($post->post_excerpt)): ?>
																<?php the_excerpt(); ?>
															<?php endif; ?>
														</div><!-- end wrap -->
													</div><!-- end info -->
												</div><!-- end box-overview-page-howto-faq -->

												<div class="region-footer-new first-region clearfix">
													<div class="col-r-footer">
														<div class="wrap-text">
															<div class="wrap-pink">
								<span class="pink-title">
									<?php echo Yii::t('wp_theme', '全国共通')?>
								</span>
																<span class="time"><?php echo Yii::t('footer', '全店共通コールセンター');?></span>
															</div>
															<div class="number clearfix">
																<span class="tel">☎<?php echo Yii::t('wp_theme', 'kyoto_tel_2');?></span>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="child-page regionShops clearfix">
												<?php
												//Meta Shop
												$shopTypeMeta = array(
													'1' => array('regular', 'disable'),
													'2' => array('regular'),
													'3' => array('regular', 'disable'),
													'4' => array('regular', 'disable'),
													'5' => array('regular','vip'),
													'6' => array('regular','vip'),
													'7' => array('regular'),
													'8' => array('regular','vip'),
													'9' => array('regular','vip'),
													'10' => array('regular'),
													'11' => array('regular'),
													'14' => array('petit'),
													'15' => array('petit'),
													'16' => array('regular'),
													'17' => array('regular'),
													'18' => array('regular')
												);

												$shopInKyoto = array(
													MasterValues::SHOP_KYOTO_STATION_ID,
													MasterValues::SHOP_GIONSIJO_ID,
													MasterValues::SHOP_KYOMIZUZAKA_ID,
													MasterValues::SHOP_ARASHIYAMA_ID
												);

												// Restore original Post Data
												wp_reset_postdata();
												// WP_Query arguments
												$args = array(
													'meta_key'   => '_wp_page_template',
													'meta_value' => 'page-templates/access-child-page.php',
													'post_type' => 'page',
													'post_status' => 'publish',
													'posts_per_page' => -1,
													'order' => 'ASC',
													'orderby' => 'menu_order',
												);

												$shopMeta = array(
													'kyoto' => array(),
													'osaka' => array(),
													'tokyo' => array(),
													'horiku' => array()
												);
												// The Query
												$my_query = new WP_Query($args);
												// The Loop
												if ($my_query->have_posts()) {
													while ($my_query->have_posts()) {
														$my_query->the_post();
//					var_dump(the_title());
														//Add class corresponding shop type
														$shopId = get_field('shop_id');
														$classTypeShop = '';
														if(!empty($shopId) && !empty($shopTypeMeta[$shopId])){
															$classTypeShop = implode(" ",$shopTypeMeta[$shopId]);
														}

														$regionName = get_field('region_name');
														$shopInf = array(
															'post' => $post,
															'post_name' => $post->post_name,
															'the_permalink' => get_the_permalink(),
															'title' => get_the_title(),
															'shop_detail' => get_field('shop_detail'),
															'has_post_gallery' => get_post_gallery($post, false),
															'has_post_thumbnail' => has_post_thumbnail(),
															'post_thumbnail_id' => get_post_thumbnail_id(),
															'classTypeShop' => $classTypeShop,
															'shop_id' => $shopId
														);

														if($regionName == 'kyoto'){
															$shopMeta['kyoto'][] = $shopInf;
														}elseif($regionName == 'osaka'){
															$shopMeta['osaka'][] = $shopInf;
														}elseif($regionName == 'tokyo'){
															$shopMeta['tokyo'][] = $shopInf;
														}elseif($regionName == 'horiku'){
															$shopMeta['horiku'][] = $shopInf;
														}

													}
												}



												//			var_dump($shopMeta);die;
												foreach ($shopMeta as $regionName => $shops){
													//Kyoto
													if ($regionName == 'kyoto' && !empty($shops)) {
														?>
														<div class="kyoto" id="kyoto-area">
															<h4 class="regionTitle"><?php echo Yii::t('footer', '京都');?></h4>
															<div class="regionWrap">
																<?php foreach ($shops as $shop_el) {
																	$flag_formal_kyoto = false;
																	if ('formal-kyototower' == $shop_el['post_name']) {
																		$flag_formal_kyoto = true;
																	}
																	?>
																	<div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
																		<div class="shop-title ">
																			<div class="wrap-shop-title">
																				<span class="fa-shop icon-fa-shop-<?= ($shop_el['shop_id'] < 10) ?'0'.$shop_el['shop_id']:$shop_el['shop_id']; ?>"></span>
																				<a href="<?= $shop_el['the_permalink']; ?>"
																				   title="<?= $shop_el['title']; ?>">
																					<h2><?= $shop_el['title']; ?></h2>
																				</a>
																			</div>
																			<span class="disable-shop-text"><?= Yii::t('wp_theme','改装中'); ?></span>
																		</div>
																		<div class="shop-address"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
																		<div class="shop-distance"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_distance_formal'); ?></div>
																		<div class="featured-post">
																			<a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
																				<?php swe_get_shop_access_image($shop_el); ?>
																			</a>
																		</div>
																		<div class="shop-detail shop-detail-1">
																			<?php echo do_shortcode($shop_el['shop_detail']); ?>
																		</div>
																		<div class="shop-type-meta">
																			<span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
																			<span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
																			<span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
																		</div>
																		<div class="link-to-shop">
																			<a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
																		</div>
																	</div>

																	<?php
																} ?>
															</div>
														</div>
													<?php }
													//Osaka
													elseif ($regionName == 'osaka' && !empty($shops)) {
														?>
														<div class="osaka" id="osaka-area">
															<h4 class="regionTitle"><?php echo Yii::t('footer', '大阪'); ?></h4>
															<div class="regionWrap">
																<?php foreach ($shops as $shop_el) { ?>
																	<div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
																		<div class="shop-title ">
																			<div class="wrap-shop-title">
																				<span class="fa-shop icon-fa-shop-<?= ($shop_el['shop_id'] < 10) ?'0'.$shop_el['shop_id']:$shop_el['shop_id']; ?>"></span>
																				<a href="<?= $shop_el['the_permalink']; ?>"
																				   title="<?= $shop_el['title']; ?>">
																					<h2><?= $shop_el['title']; ?></h2>
																				</a>
																			</div>
																			<span class="disable-shop-text"><?= Yii::t('wp_theme','改装中'); ?></span>
																		</div>
																		<div class="shop-address"><?php echo Yii::t('wp_theme','shop_address_'.$shop_el['shop_id'])?></div>
																		<div class="shop-distance"><?php echo Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id'])?></div>
																		<div class="wrap-featured-post">
																			<div class="featured-post">
																				<a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
																					<?php swe_get_shop_access_image($shop_el); ?>
																				</a>
																			</div>
																			<div class="shop-detail shop-detail-1">
																				<?php echo do_shortcode($shop_el['shop_detail']); ?>
																			</div>
																		</div>

																		<div class="shop-type-meta">
																			<span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
																			<span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
																			<span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
																		</div>
																		<div class="link-to-shop">
																			<a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
																		</div>
																	</div>
																	<?php
																} ?>
															</div>
														</div>
													<?php }
													//Tokyo
													elseif ($regionName == 'tokyo' && !empty($shops)) {
														?>
														<div class="tokyo" id="tokyo-area">
															<h4 class="regionTitle"><?php echo Yii::t('footer', '関東');?></h4>
															<div class="regionWrap">
																<?php foreach ($shops as $shop_el) { ?>
																	<div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
																		<div class="shop-title">
																			<div class="wrap-shop-title">
																				<span class="fa-shop icon-fa-shop-<?= ($shop_el['shop_id'] < 10) ?'0'.$shop_el['shop_id']:$shop_el['shop_id']; ?>"></span>
																				<a href="<?= $shop_el['the_permalink']; ?>"
																				   title="<?= $shop_el['title']; ?>">
																					<h2><?= $shop_el['title']; ?></h2>
																				</a>
																			</div>
																			<span class="disable-shop-text"><?= Yii::t('wp_theme','改装中'); ?></span>
																		</div>
																		<div class="shop-address"><?php echo Yii::t('wp_theme','shop_address_'.$shop_el['shop_id'])?></div>
																		<div class="shop-distance"><?php echo Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id'])?></div>
																		<div class="wrap-featured-post">
																			<div class="featured-post">
																				<a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
																					<?php swe_get_shop_access_image($shop_el); ?>
																				</a>
																			</div>
																			<div class="shop-detail shop-detail-1">
																				<?php echo do_shortcode($shop_el['shop_detail']); ?>
																			</div>
																		</div>
																		<div class="shop-type-meta">
																			<span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
																			<span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
																			<span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
																		</div>
																		<div class="link-to-shop">
																			<a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
																		</div>
																	</div>
																	<?php
																}?>
															</div>
														</div>
													<?php }
													//Kamakura
													elseif ($regionName == 'horiku' && !empty($shops)) {
														?>
														<div class="kamakura" id="horiku-area">
															<h4 class="regionTitle"><?php echo Yii::t('footer', '北陸'); ?></h4>
															<div class="regionWrap">
																<?php foreach ($shops as $shop_el) { ?>
																	<div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
																		<div class="shop-title ">
																			<div class="wrap-shop-title">
																				<span class="fa-shop icon-fa-shop-<?= ($shop_el['shop_id'] < 10) ?'0'.$shop_el['shop_id']:$shop_el['shop_id']; ?>"></span>
																				<a href="<?= $shop_el['the_permalink']; ?>"
																				   title="<?= $shop_el['title']; ?>">
																					<h2><?= $shop_el['title']; ?></h2>
																				</a>
																			</div>
																			<span class="disable-shop-text"><?= Yii::t('wp_theme','改装中'); ?></span>
																		</div>
																		<div class="shop-address"><?php echo Yii::t('wp_theme','shop_address_'.$shop_el['shop_id'])?></div>
																		<div class="shop-distance"><?php echo Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id'])?></div>
																		<div class="wrap-featured-post">
																			<div class="featured-post">
																				<a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
																					<?php swe_get_shop_access_image($shop_el); ?>
																				</a>
																			</div>
																			<div class="shop-detail shop-detail-1">
																				<?php echo do_shortcode($shop_el['shop_detail']); ?>
																			</div>
																		</div>
																		<div class="shop-type-meta">
																			<span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
																			<span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
																			<span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
																		</div>
																		<div class="link-to-shop">
																			<a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
																		</div>
																	</div>
																	<?php
																}?>
															</div>
														</div>
													<?php }
												}


												// Restore original Post Data
												wp_reset_postdata();
												?>
											</div>
											<!-- end of access-child-page-->
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

<?php get_footer('new-kimono') ?>
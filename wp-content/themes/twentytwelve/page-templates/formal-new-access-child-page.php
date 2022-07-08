<?php
/**
 * Template Name: Formal New Access Child Page
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
global $post, $custom_post_type, $custom_taxonomies, $is_yukata, $sites, $language;
$detect = Yii::app()->mobileDetect;
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_register_style('ctm-voice-top-100-widget-style', get_template_directory_uri() . '/css/ctm-voice-top-100-widget.css', array('twentytwelve-style'));
wp_enqueue_style('ctm-voice-top-100-widget-style');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');

get_header('formal');
if($isSmartPhone){
    wp_register_style('widget-top-shop-list-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-sp-style');
    wp_register_style('widget-top-shop-list-other-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-sp-style');
}else{
    wp_register_style('widget-top-shop-list-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-pc-style');
    wp_register_style('widget-top-shop-list-other-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-pc-style');
}
wp_register_style('new-access-style', get_template_directory_uri() . '/css/new-access.css', array('twentytwelve-style'));
wp_enqueue_style('new-access-style');
wp_register_style('new-formal-access-style', get_template_directory_uri() . '/css/new-formal-access.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-access-style');
wp_enqueue_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css');
if($language != "ja"){
    wp_register_style('new-access-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-access'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-access-style'.$cssLanguage);
}
wp_register_style('formal-letter-spacing-ja_pre-style', WP_HOME . '/css/formal-letter-spacing-ja_pre.css', array('twentytwelve-style'));
wp_enqueue_style('formal-letter-spacing-ja_pre-style');
$shopPetit = array(
	MasterValues::SHOP_GIONSHIRAKAWA_ID,
	MasterValues::SHOP_PETIT_KYOTOSTATION_ID
);
$shop_id = get_field('shop_id');
$shop_id_preview = array(21, 23);

// Customer Review By Shop
wp_enqueue_script('new-customer-review-script', get_template_directory_uri() . '/js/customer-review.js');
wp_register_style('style-customer-review', get_template_directory_uri() . '/css/customer-review.css', array('twentytwelve-style'));
wp_enqueue_style('style-customer-review');

wp_register_style('new-formal-product-detail', get_template_directory_uri() . '/css/new-formal-product-detail.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-detail');
wp_register_style('new-formal-popup', get_template_directory_uri() . '/css/new-formal-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-popup');

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
                                    <?php echo do_shortcode('[FormalSidebarLeft]'); ?>
								</div>
								<div class="right-column">
									<div class="new-access-child-page  hd-access <?php echo $post->post_name; ?>">
										<div class="container-box top-shop">
											<div class="shop-info">
												<?php
												$listGalery = getGaleryFromPost($post);
												if (!empty($post->post_content)):
													$content = strip_shortcode_gallery(get_the_content());
													?>
													<div class="shop-list">
														<div class="slide-images">
															<div class="gallery-item">
																<div class="main-image">
																	<?php echo php_set_base_url($content); ?>
																</div><!-- end main-image -->
																	<?php if(!in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)): ?>
																		<div class="list-image right">
																			<ul class="clearfix">
																				<?php
																				$shop_title = strip_tags(get_the_title());
																				if (!empty($listGalery) && is_array($listGalery)) :
																					foreach ($listGalery as $galery) :
																						$galery = $galery['ids'];

																						if (!empty($galery) && count($galery) != 0) :
																							$i = 0;
																							foreach ($galery as $attachment_id):

																								$ok = swe_wp_get_attachment_image_src($attachment_id);
																								if (!empty($ok)) {
																									$image = swe_wp_get_attachment_image_src($attachment_id, 'full', false);
																									$thumb = swe_wp_get_attachment_image_src($attachment_id, array(133, 100));
																								}
																								if (!empty($ok)) {
																									$i = $i + 1;
																									?><li <?php if ($i % 5 == 0) echo "class='last'"; ?>>
																									<a href="<?php echo $image[0]; ?>" rel="lightbox">
																										<img src="<?php echo $thumb[0]; ?>"
																											 alt="<?php echo $shop_title; ?>"/>
																									</a>
																									</li>
																								<?php } ?>
																							<?php endforeach; ?>
																						<?php endif; ?>
																					<?php endforeach; ?>
																				<?php endif; ?>
																			</ul>
																		</div><!-- end list-image -->
																	<?php
																	else:
																	wp_register_style('box-slider', get_template_directory_uri() . '/css/box-slider.css', array('twentytwelve-style'));
																	wp_enqueue_style('box-slider');
																	if (!$isSmartPhone) {
																		wp_register_style('box-slider-pc', get_template_directory_uri() . '/css/box-slider-pc.css', array('twentytwelve-style'));
																		wp_enqueue_style('box-slider-pc');
																	}
																	?>
																		<?php if(in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)){ ?>
																		<div class="shop-has-slide flexslider <?php echo (in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE_TEXT)?'shop-has-slide-text':'');?>" id="slide_shop_<?= $shop_id; ?>">
																			<ul class="slides">
																				<?php
																				if (!empty($listGalery) && is_array($listGalery)) :
																					foreach ($listGalery as $galery) :
																						$galery = $galery['ids'];

																						if (!empty($galery) && count($galery) != 0) :
																							$i = 0;
																							foreach ($galery as $attachment_id):
																								?>
																								<?php
																								$ok = swe_wp_get_attachment_image($attachment_id);
																								if(checkPostIDInSiteMedia($attachment_id)){
																									switch_to_blog($sites['blog_media']);
																									//Get title, description image
																									$attachment = get_post($attachment_id);
																									$title = get_the_title($attachment_id);
																									$description = getTranslateContent($attachment->post_content);
																									restore_current_blog();
																								} else {
																									//Get title, description image
																									$attachment = get_post($attachment_id);
																									$title = get_the_title($attachment_id);
																									$description = getTranslateContent($attachment->post_content);
																								}
																								if (!empty($ok)) {
																									$i = $i + 1;
																									$image = swe_wp_get_attachment_image_src($attachment_id, 'full', false);
																									$thumb = swe_wp_get_attachment_image_src($attachment_id, array(230, 173));
																									?>
																									<li <?php if ($i % 5 == 0) echo "class='last'"; ?>>
																										<a href="<?php echo $image[0]; ?>" rel="lightbox">
																											<img data-src="<?php echo $thumb[0]; ?>"
																												 alt="<?php echo strip_tags(get_the_title()) ?>"/>
																										</a>
																									</li>
																								<?php } ?>
																							<?php endforeach; ?>
																						<?php endif; ?>
																					<?php endforeach;
																				endif; ?>

																			</ul>
																		</div>
                                                                        <!-- Style and JS for slider banner access -->
                                                                        <style>
                                                                            .shop-has-slide .slides {
                                                                                opacity: 0;
                                                                                visibility: hidden;
                                                                                transition: opacity 0.3s ease;
                                                                            }
                                                                            .shop-has-slide .slides.slick-initialized {
                                                                                opacity: 1;
                                                                                visibility: visible;
                                                                            }
                                                                            .shop-has-slide .slick-slide {
                                                                                margin: 0 5px;
                                                                            }
                                                                            .shop-has-slide .slick-list {
                                                                                margin: 0 -5px;
                                                                            }
                                                                            .shop-has-slide .slick-dotted.slick-slider{
                                                                                margin-bottom: 50px;
                                                                            }
                                                                        </style>
                                                                        <?php if($isSmartPhone) : ?>
                                                                            <style>
                                                                                .shop-has-slide .slick-dots{
                                                                                    bottom: -35px;
                                                                                }
                                                                                .shop-has-slide .slick-dots li{
                                                                                    margin: 0;
                                                                                }
                                                                                .shop-has-slide .slick-dots li button:before{
                                                                                    font-size: 30px;
                                                                                }
                                                                            </style>
                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                //Slider banner
                                                                                var shopId = $(".shop-has-slide").attr("id");
                                                                                $('#' +  shopId  + ' .slides').slick({
                                                                                    arrows: false,
                                                                                    dots: true,
                                                                                    slidesToShow: 2,
                                                                                    slidesToScroll: 2
                                                                                });

                                                                                //Slider direction
                                                                                $('#slider .slides-access-shop').slick({
                                                                                    dots: true,
                                                                                    fade: true
                                                                                });
                                                                            });
                                                                        </script>
                                                                        <?php else: ?>
                                                                            <style>
                                                                                *{
                                                                                    min-width: 0;
                                                                                    min-height: 0;
                                                                                }
                                                                                .shop-has-slide .slick-slide img{
                                                                                    width: 100%;
                                                                                }
                                                                                .slides-access-shop .slick-slide {
                                                                                    margin: 0 5px;
                                                                                }
                                                                                .slides-access-shop .slick-list {
                                                                                    margin: 0 -5px;
                                                                                }
                                                                            </style>
                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                //Slider banner
                                                                                var shopId = $(".shop-has-slide").attr("id");
                                                                                $('#' +  shopId  + ' .slides').slick({
                                                                                    arrows: false,
                                                                                    slidesToShow: 4,
                                                                                    slidesToScroll: 4
                                                                                });

                                                                                //Slider direction
                                                                                $('#slider .slides-access-shop').slick({
                                                                                    dots: true,
                                                                                    slidesToShow: 2,
                                                                                    slidesToScroll: 2
                                                                                });
                                                                            });
                                                                        </script>
                                                                        <?php endif; ?>
                                                                    <?php } ?>
                                                                        <div class="shop-detail shop-detail-2">
                                                                            <?php echo php_set_base_url(get_field('shop_detail_2')); ?>
                                                                        </div>
                                                                        <?php if (in_array($shop_id, $shop_id_preview)) : ?>
                                                                        <div class="wrap-btn-v2 wrap-btn-v2-ginza-shop flexbox">
                                                                            <div class="btn-v2 btn-v2-01 formal-preview-popup-handle">
                                                                                <div class="btn-v2-reserve">
                                                                                    <div class="pattern ginza-honten"></div>
                                                                                    <div class="text">
                                                                                        <span class="text-link">下見を予約する</span>
                                                                                        <span class="icon-arrow-r-link"></span>
                                                                                    </div>
                                                                                    <div class="pattern ginza-honten last"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php else: ?>
                                                                        <div class="wrap-grid-booking-access-formal flexbox justify-content-center">
                                                                            <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="<?php echo home_url()?>/formal/preview"><?= Yii::t('access','下見を予約する')?></a></div>
                                                                            <?php if ($shop_id == 22):?>
                                                                            <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="<?php echo home_url()?>/formal/list?shop_id=22"><?= Yii::t('access','着物を見る')?></a></div>
                                                                            <?php else: ?>
                                                                            <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="<?php echo home_url()?>/formal"><?= Yii::t('access','着物を見る')?></a></div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <?php endif; ?>
																		<div class="shop-detail shop-detail-1">
																			<?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
																		</div>
																		<div class="shop-detail shop-detail-3">
																			<?php echo php_set_base_url(get_field('shop_detail_3')); ?>
																		</div>
																	<?php endif; ?>
															</div><!-- gallery-item -->
														</div><!-- end slide-images -->
													</div><!-- end shop-list -->
													<?php
												else:
													if (!empty($post->post_excerpt)):
														?>
														<div class="page-excerpt no-gallery"><?php the_excerpt(); ?></div>
														<?php
													endif;
												endif; // end if($listGalery){
												?>
												<?php if(!in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)): ?>
													<div class="shop-detail">
														<div class="title"><?php echo Yii::t('wp_theme', '店舗情報'); ?></div>
														<?php echo do_shortcode(get_field('shop_detail_3')); ?>
													</div>
												<?php endif; ?>

											</div>
										</div>
											<div class="container-box">
												<div class="shop-instruction">
													<div class="wrap-map-instruction flexbox">
														<div class="map shop">
															<?php the_field('google_map'); ?>
														</div>
														<div class="instruction">
                                                            <?php if($isSmartPhone) : ?>
                                                                <?php echo php_set_base_url(get_field('shop_distance_time')); ?>
                                                            <?php else: ?>
                                                                <?php echo php_set_base_url(get_field('shop_distance_time_pc')); ?>
                                                            <?php endif; ?>
														</div>
													</div>
												</div>
												<div class="instruction_full_width clearfix">
													<?php echo do_shortcode(the_field('shop_instruction')); ?>
												</div>
											</div>
                                        <?php if (in_array($shop_id, $shop_id_preview)) : ?>
                                            <div class="wrap-btn-v2 wrap-btn-v2-ginza-shop flexbox">
                                                <div class="btn-v2 btn-v2-01 formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern ginza-honten"></div>
                                                        <div class="text">
                                                            <span class="text-link">下見を予約する</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern ginza-honten last"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                        <div class="wrap-grid-booking-access-formal flexbox justify-content-center">
                                            <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="<?php echo home_url()?>/formal/preview"><?= Yii::t('access','下見を予約する')?></a></div>
                                            <?php if ($shop_id == 22):?>
                                                <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="<?php echo home_url()?>/formal/list?shop_id=22"><?= Yii::t('access','着物を見る')?></a></div>
                                            <?php else: ?>
                                                <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="<?php echo home_url()?>/formal"><?= Yii::t('access','着物を見る')?></a></div>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
										<?php echo php_set_base_url(get_field('access_instruction')); ?>

                                        <h2 class="title-general title-list text-center title-general-icon align-items-center"><span class="title-nextto-grid"><?php the_title(); ?><?= Yii::t('access','でレンタルできる商品を見る'); ?></span></h2>

                                        <?php
                                            $product_by_shop = get_field('product_by_shop');
                                            if(!empty($product_by_shop)){
                                                echo do_shortcode(php_set_base_url($product_by_shop));
                                            }
                                        ?>

                                        <?php if (get_field('banner_shop')) : ?>
                                            <div class="wrapper-banners-shop">
                                                <h3 class="sub-title"><span class="icon-prize"><img src="<?= WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><?= Yii::t('access','観光着物レンタル'); ?></h3>
                                                <?php echo php_set_base_url(get_field('banner_shop'));?>
                                            </div>
                                        <?php endif; ?>

										<?php
											if($shop_id){
												?>
												<div class="container-box section-booking-top-page">
													<section class="block-viewbooking-top-page">
														<div class="block-title-top-page-title bg-top-page-title booking">
                                                            <h2 class="title-general title-list text-center title-general-icon align-items-center"><span class="icon-title-general icon icon-formal-status-booking"></span><?= Yii::t('access','<span class="title-nextto-grid">ご予約状況</span>')?></h2>
														</div>
														<div class="wrap-text-obove-grid-booking"><?= Yii::t('access','text-above-grid-booking')?></div>
														<div id="box-calendar" class="sixteen columns row">
															<?php
															$shopId = get_field('shop_id');
															echo  NewReserveStatus(array('selected_shop'=>$shopId, 'list_plan_ids'=>$planList, 'is_formal' => '1'));
															?>
														</div>
													</section>
												</div>
												<?php
											}
										?>

                                        <?php
                                            $popular_product_by_groups = get_field('popular_product');
                                            if(!empty($popular_product_by_groups)):?>
                                                <div class="wrap-popular-product">
                                                    <h2 class="title-general title-list text-center title-general-icon align-items-center">
                                                        <span class="icon-title-general icon icon-formal-status-booking"></span><?= Yii::t('access','<span class="title-nextto-grid">冠婚葬祭着物レンタル情報</span>')?>
                                                    </h2>
                                                    <?php echo do_shortcode(php_set_base_url($popular_product_by_groups)); ?>
                                                </div>
                                        <?php endif ?>

                                        <div class="wrap-gallery-new-access">
                                            <h2 class="title-general title-list title-general-icon align-items-center title-general-new-arrival-pc">
                                                <span class="title-nextto-grid"><?= Yii::t('wp_theme.access', 'お客様ギャラリー')?></span>
                                            </h2>
                                            <?php echo php_set_base_url(do_shortcode(get_field('banner_plan')));?>
                                        </div><!-- End wrap-gallery-new-access -->

										<div class="customer-review-by-shop customer-review-by-shop-formal">
											<h2 class="title-general title-list text-center title-general-icon align-items-center">
												<span class="title-nextto-grid"><?= the_title() . Yii::t('review-by-shop', 'のお客様の声・口コミ情報'); ?></span>
											</h2>
											<?php  echo do_shortcode('[customer_review_content]'); ?>
											<div class="link-review-by-shop">
												<a href="<?= $post->post_name; ?>/review"> <?= Yii::t('review-by-shop','すべての口コミ情報を見る'); ?>></a>
											</div>
<!--											<div class="wrap-grid-booking wrap-grid-booking-access">-->
<!--												--><?php //if(isset($shop_id) && $shop_id != 22): ?>
<!--													<div class="wrap-reserve-kimono flexbox justify-content-center"><a id="reserve_button" href="--><?//= home_url()?><!--/formal" class="btn-formal btn-color-pink btn-reserve-popup reserve_button_review">--><?//= Yii::t('wp_theme','予約する')?><!--</a></div>-->
<!--												--><?php //elseif ($shop_id == ""): ?>
<!--													<div class="wrap-reserve-kimono flexbox justify-content-center"><button type="button" class="btn-formal btn-color-pink btn-reserve-popup">--><?//= Yii::t('wp_theme','予約する')?><!--</button></div>-->
<!--												--><?php //endif; ?>
<!--											</div>-->
										</div><!-- end .customer-review-by-shop -->

                                        <?php if(!$isSmartPhone): ?>
<!--                                            <div class="wrap-general-ctmvoice-top100">-->
<!--                                                <div class="box-general-ctmvoice-top100">-->
<!--                                                    --><?php // echo do_shortcode('[yesterday_customer_voices]') ?>
<!---->
<!--                                                    --><?php
//                                                        // Get listTopReserve by cache
//                                                        $listTopReserve = Yii::app()->cache->get("listTopReserve_{$language}");
//                                                        // Check if listTopReserve cache does not exist
//                                                        if ($listTopReserve == false) {
//                                                            // Get listTopReserve widget
//                                                            $listTopReserve = Yii::app()->controller->widget('application.components.widgets.ListTopReserve', array(), true);
//                                                            // Assign dependency by last update_time of book to listTopReserve cache
//                                                            $dependency = new CDbCacheDependency('SELECT MAX(book_id) FROM book');
//                                                            // Set listTopReserve cache
//                                                            Yii::app()->cache->set("listTopReserve_{$language}", $listTopReserve, 0, $dependency);
//                                                        }
//                                                        // Render listTopReserve
//                                                        echo $listTopReserve;
//                                                    ?>
<!--                                                </div>-->
<!--                                            </div>-->
                                            <?php //echo php_set_base_url(get_field('banner_options'));?>
                                        <?php endif; ?>

                                        <div class="wrap-blog-and-banner-plan">
                                            <h2 class="title-general title-list title-general-icon align-items-center title-general-new-arrival-pc">
                                                <span class="title-nextto-grid"><?= Yii::t('wp_theme.access', '新着コンテンツ')?></span>
                                            </h2>
                                            <?php if (Yii::app()->language === 'ja'): ?>
                                                <?php
                                                if ($shop_blog = get_field('shop_blog')):
                                                    $taxonomy = $custom_taxonomies['blog'];
                                                    $post_type = $custom_post_type['blog'];
                                                    $term = get_term_by('slug', $shop_blog, $taxonomy);
                                                    $data = get_category_data($term);
                                                    global $isSmartPhone;

                                                    // Restore original Post Data
                                                    wp_reset_postdata();
                                                    // WP_Query arguments
                                                    $args = array(
                                                        $taxonomy => $shop_blog,
                                                        'post_type' => $post_type,
                                                        'post_status' => 'publish',
                                                        'posts_per_page' => $isSmartPhone ? 2 : 4,
                                                        'order' => 'DESC',
                                                        'orderby' => 'date',
                                                    );

                                                    // The Query
                                                    $my_query = new WP_Query($args);

                                                    // The Loop
                                                    if ($my_query->have_posts()) {
                                                        $i = 1;
                                                        $title = $data['shop'];
                                                        ?>
                                                        <?php if ($isSmartPhone): ?>
                                                        <div class="sp title-general text-center title-general-icon"> <span class="icon-title-general icon icon-formal-search"></span> <span class="text-title-general">New Arrival<var class="sub-descript-title-general"><?php echo Yii::t('wp_theme.access', '新着コンテンツ')?></var></span> </div>
                                                        <?php endif; ?>
                                                        <div class="content-new-info wrap-wg-fm-information wrap-wg-fm-information-access">
                                                            <div class="item-info item-info-work">
                                                                <?php if ($isSmartPhone) : ?>
                                                                <h3 class="sp sub-title flexbox align-items-center justify-content-center"> <span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><?php echo Yii::t('wp_theme.access', '新着ブログ') ?></h3>
                                                                <?php else: ?>
                                                                <div class="pc text-above-list-product text-above-list-product-first">
                                                                    <h3 class="pc sub-title flexbox"><span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><?php echo Yii::t('wp_theme.access', '新着ブログ') ?></h3>
                                                                </div>
                                                                <?php endif; ?>
                                                                <ul class="list-info flexbox">
                                                                    <?php
                                                                    while ($my_query->have_posts()) {
                                                                        $my_query->the_post();
                                                                        ?>
                                                                        <li class="sub-item-info">
                                                                            <a href="<?php the_permalink(); ?>">
                                                                                <div class="image"><?php echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title()))); ?></div>
                                                                                <p class="date"><?php echo get_the_date(); ?></p>
                                                                                <p class="name"><?php echo  wp_trim_words(get_the_title(), 30); ?></p>
                                                                                <div class="status-view"> <a class="shop_name" href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><span class="text-view"><?php echo $data['shop']; ?></span></a> <span class="num-view" style="display:none;">29371 view</span></div>
                                                                                <p class="link-to"><a href="<?php the_permalink(); ?>"><?php echo Yii::t('wp_theme.access', '記事を読む >') ?></a></p>
                                                                            </a>
                                                                        </li>
                                                                        <?php
                                                                        $i++;
                                                                    }
                                                                    ?>
                                                                </ul>
                                                                <p class="link-more sp"><a href="<?php echo WP_HOME; ?>/blog"><?php echo Yii::t('wp_theme.access', 'ブログ一覧') ?></a></p>
                                                                <p class="link-more text-right pc"><a href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る>') ?></a></p>
                                                            </div>
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
                                            <?php //echo php_set_base_url(do_shortcode(get_field('banner_plan')));?>
                                        </div>

<!--                                        <div class="customer-review-by-shop-formal">-->
<!--                                            <div class="wrap-grid-booking wrap-grid-booking-access">-->
<!--                                                --><?php //if(isset($shopId) && $shopId != 22): ?>
<!--                                                    <div class="wrap-reserve-kimono flexbox justify-content-center"><a id="reserve_button" href="--><?//= home_url()?><!--/formal" class="btn-formal btn-color-pink btn-reserve-popup reserve_button_review">--><?//= Yii::t('wp_theme','予約する')?><!--</a></div>-->
<!--                                                --><?php //elseif($shopId == ""): ?>
<!--                                                    <div class="wrap-reserve-kimono flexbox justify-content-center"><button type="button" class="btn-formal btn-color-pink btn-reserve-popup">--><?//= Yii::t('wp_theme','予約する')?><!--</button></div>-->
<!--                                                --><?php //endif; ?>
<!--                                            </div>-->
<!--                                            --><?php //if($shopId == 22):?>
<!--                                            <div class="wrap-grid-booking-access-formal flexbox justify-content-center">-->
<!--                                                <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="--><?php //echo home_url()?><!--/formal/preview">--><?//= Yii::t('access','下見を予約する')?><!--</a></div>-->
<!--                                                <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="--><?php //echo home_url()?><!--/formal">--><?//= Yii::t('access','着物を見る')?><!--</a></div>-->
<!--                                            </div>-->
<!--                                            --><?php //endif;?>
<!--                                        </div>-->

                                        <div class="wrap-btn-v2 wrap-btn-v2-ginza-shop flexbox" style="margin-bottom: 30px">
                                            <div class="btn-v2 btn-v2-01 formal-preview-popup-handle">
                                                <div class="btn-v2-reserve">
                                                    <div class="pattern ginza-honten"></div>
                                                    <div class="text">
                                                        <span class="text-link">下見を予約する</span>
                                                        <span class="icon-arrow-r-link"></span>
                                                    </div>
                                                    <div class="pattern ginza-honten last"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap-btn-v2 wrap-btn-v2-ginza-shop flexbox">
                                            <a href="/yukata/plan?shop_id=<?= $shop_id; ?>">
                                                <div class="btn-v2 btn-v2-01">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern ginza-honten"></div>
                                                        <div class="text">
                                                            <span class="text-link">浴衣レンタルを予約する</span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern ginza-honten last"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <?php if(!$isSmartPhone): ?>
                                            <?php echo php_set_base_url(get_field('banner_options'));?>
                                        <?php endif; ?>

										<?php echo php_set_base_url(do_shortcode(get_field('banner_topics')))?>
									</div><!-- end new-access-child-page -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container-box -->

<div class="container-box clearfix">
</div><!-- end container-box -->

<?php get_footer('formal') ;?>
<script type="text/javascript">
	// Customer review by shop
	function changeReserveLink(shop_id) {
		if (shop_id == undefined || shop_id == '') {
			return;
		}
		if (shop_id == 20) {
			$(".reserve_button_review").attr("href", "<?= home_url()?>/yukata/plan?shop_id="+shop_id);
		} else if (shop_id == 14 || shop_id == 15) {
			$(".reserve_button_review").attr("href", "<?= home_url()?>/yukata/petit?shop_id="+shop_id);
		} else {
			$(".reserve_button_review").attr("href", "<?= home_url()?>/yukata/plan?shop_id="+shop_id);
		}
	}


	$(document).ready(function(){
		var shop_id = '<?php echo $shop_id; ?>';
		if (shop_id !== '') {
			changeReserveLink(shop_id);
		}

        //Toggle shoplist
        $('[data-sub-shop]').click(function(){
            var self    = this;
            var target  = $(self).data('sub-shop');
            var $other  = $('[data-sub-shop="'+target+'"]');
            if(target){
                $other.each(function(index, el){
                    if(el !== self){
                        $(el).siblings(target).slideUp();
                        $(el).parent().find('.text-shop-wg-dropdown').removeClass('active');
                    }else{
                        $(self).siblings(target).slideToggle();
                        $(self).parent().find('.text-shop-wg-dropdown').toggleClass('active');
                    }
                });
            }
        });

        //Customer Voice and Top 100
        var afterChange = function(slider,i) {
            var slideHeight = jQuery(slider.$slides[i] ).height();
            jQuery(slider.$slider ).height( slideHeight);
        };
        $('.wrap-ctmvoice-general-content').slick({
            vertical: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            centerMode: true,
            centerPadding: '6px',
            infinite: true,
            vertical: true,
            onAfterChange: afterChange,
            responsive: [{
                breakpoint: 750,
                settings: {
                    verticalSwiping: true
                }
            }]
        });
        $('.wrap-top100-general-content').slick({
            vertical: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            centerMode: true,
            centerPadding: '6px',
            infinite: true,
            vertical: true,
            onAfterChange: afterChange,
            responsive: [{
                breakpoint: 750,
                settings: {
                    verticalSwiping: true
                }
            }]
        });

        //Instagram gallery slider
        if($('.slider-gallery').length > 0){
            $('.slider-gallery').not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                lazyLoad: 'ondemand'
            });
        }

        //Show more instruction
        $('.show-more span').click(function(){
            $(this).toggleClass('show');
            $('.distance-time li:nth-last-child(-n + 4)').toggleClass('show');
            $(this).text() == "もっと見る" ? $(this).text("少なく表示") : $(this).text("もっと見る");
        });
    });

    /* Show formal popup - start */
    $('.formal-preview-popup-handle').click(function (event) {
        event.preventDefault();
        $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
        $('#formal-preview-popup').show(0, function () {
            $("html").addClass("modal-open");
            if(!$("#formal-preview-popup input.preview-shops:checked").length){
                $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
            }
        });
        $('#botDiv').hide();
    });

    $(document).on('click', '#closeStep, #backStep', function(){
        $("html").removeClass("modal-open");
    });
    /* Show formal popup - end */
</script>
<?php get_footer('formal') ;?>


<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
    'selectedShop' => $shop_id,
))
?>
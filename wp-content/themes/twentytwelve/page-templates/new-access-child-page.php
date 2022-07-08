<?php
/**
 * Template Name: New Access Child Page
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
$shopPetit = array(
    MasterValues::SHOP_GIONSHIRAKAWA_ID,
    MasterValues::SHOP_PETIT_KYOTOSTATION_ID
);
$shop_id = get_field('shop_id');
if (is_page('check-booking')) {
    $shop_id = 5;
}
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$styleCss = '';
if(!$isSmartPhone){
    $styleCss = '-pc';
}
$reserve_link_access = '';
if ($shop_id == 14 || $shop_id == 15) {
    $reserve_link_access = home_url() . '/petit';
} else{
    $reserve_link_access = home_url() . '/kimono';
}
if ($shop_id == 25) {
    $reserve_link_access = home_url() . '/formal';
}
$shop_id_formal = array(16,27);
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}
if($isSmartPhone){
    //Widget shop list
    wp_enqueue_style('kimono-top-sp-style', get_template_directory_uri() . '/css/kimono-top-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('kimono-gallery-picture-sp-style', get_template_directory_uri() . '/css/kimono-gallery-picture-sp.css', array('twentytwelve-style'));
} else{
    //Widget shop list
    wp_enqueue_style('kimono-top-pc-style', get_template_directory_uri() . '/css/kimono-top-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('kimono-gallery-picture-pc-style', get_template_directory_uri() . '/css/kimono-gallery-picture-pc.css', array('twentytwelve-style'));
}
$postName = $post->post_name;
if($postName=='gion-shijo' or $postName=='kiyomizuzaka'){
    $text_button = '浴衣レンタルを予約する';
    $reserve_link_access = home_url() . '/yukata/plan';
}else{
    $text_button = '着物レンタルを予約する';
}
?>
<?php
if($language != "ja"){
    wp_register_style('new-access-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-access'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-access-style'.$cssLanguage);
    wp_register_style('new-reserve-status-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-reserve-status'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-reserve-status-style'.$cssLanguage);
	wp_register_style('ctm-voice-top-100-widget-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/ctm-voice-top-100-widget'.$cssLanguage.'.css', array('twentytwelve-style'));
	wp_enqueue_style('ctm-voice-top-100-widget-style'.$cssLanguage);
}

// Customer Review By Shop
wp_register_style('style-customer-review', get_template_directory_uri() . '/css/customer-review.css' , array('twentytwelve-style'));
wp_enqueue_style('style-customer-review');
if($language !="ja"){
    wp_register_style('style-customer-review'.$cssLanguage.'', get_template_directory_uri() . '/css/customer-review'.$cssLanguage.'.css' , array('twentytwelve-style'));
    wp_enqueue_style('style-customer-review'.$cssLanguage);
}
?>
<link rel="preload" href="<?= get_template_directory_uri() ?>/css/font-icon-shop.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/font-icon-shop.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>

<?php if($shop_id == 16):?>
    <?php if($isSmartPhone):?>
        <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css"></noscript>
    <?php else: ?>
        <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css"></noscript>
    <?php endif; ?>
<?php endif; ?>

<?php
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('new-customer-review-script', get_template_directory_uri() . '/js/customer-review.js');
wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
wp_enqueue_script('jquery-lazy-iframe', WP_HOME . '/js/jquery.lazy.iframe.min.js');
wp_enqueue_script('jquery-visible', WP_HOME . '/js/jquery.visible.min.js');
?>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
	<div class="container-box clearfix">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
		?>
        <?php if($isSmartPhone) : ?>
            <?php if(get_field('main_banner_sp')):?>
                <?= php_set_base_url(get_field('main_banner_sp')) ?>
            <?php endif;?>
        <?php else: ?>
            <?php if(get_field('main_banner_pc')):?>
                <?= php_set_base_url(get_field('main_banner_pc')) ?>
            <?php endif;?>
        <?php endif; ?>
		<div class="wrap-highend-v2">
			<div class="wrap-content-v2">
				<div class="container-box">
					<div class="wrap-column-content flexbox">
						<div class="left-column-content">
							<div class="wrap-boths-column flexbox">
								<div class="left-column hidden-sidebar">
									<?php get_sidebar('top-page-left-v3') ?>
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
																									?>
                                                                                                    <li <?php if ($i % 5 == 0) echo "class='last'"; ?>>
																										<img class="lazy" data-src="<?php echo $thumb[0]; ?>" alt="<?php echo $shop_title; ?>"/>
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
//																	wp_register_style('box-slider', get_template_directory_uri() . '/css/box-slider.css', array('twentytwelve-style'));
//																	wp_enqueue_style('box-slider');
//																	if (!$isSmartPhone) {
//																		wp_register_style('box-slider-pc', get_template_directory_uri() . '/css/box-slider-pc.css', array('twentytwelve-style'));
//																		wp_enqueue_style('box-slider-pc');
//																	}
																	?>
																		<?php if(in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE) && !empty($listGalery)){ ?>
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

																								// Get image alt of gallery
                                                                                                $image_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);

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
																											<img class="lazy" data-src="<?php echo $thumb[0]; ?>"
																												 alt="<?php echo $image_alt; ?>"/>
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
                                                                        /*.shop-has-slide .slides {
                                                                            opacity: 0;
                                                                            visibility: hidden;
                                                                            transition: opacity 0.3s ease;
                                                                        }
                                                                        .shop-has-slide .slides.slick-initialized {
                                                                            opacity: 1;
                                                                            visibility: visible;
                                                                        }*/
                                                                        .shop-has-slide .slick-slide {
                                                                            margin: 0 5px;
                                                                        }
                                                                        .shop-has-slide .slick-list {
                                                                            margin: 0 -5px;
                                                                        }
                                                                        .shop-has-slide .slides{
                                                                            margin-bottom: 0 !important;
                                                                            padding-bottom: 20px !important;
                                                                        }
                                                                    </style>
                                                                <?php if($isSmartPhone) : ?>
                                                                    <style>
                                                                        .shop-has-slide .slides .slick-slide:before{
                                                                            content: "";
                                                                            position: absolute;
                                                                            top: 0;
                                                                            left: 0;
                                                                            display: block;
                                                                            background-color: #eee;
                                                                            width: 100%;
                                                                            min-height: 124px;
                                                                        }
                                                                        .shop-has-slide .slides.slick-initialized .slick-slide:before{
                                                                            background-color: unset;
                                                                            min-height: auto;
                                                                        }
                                                                        .shop-has-slide .slick-dots{
                                                                            bottom: 15px;
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
                                                                        <?php
                                                                            $arrLangClosedShop = array(
                                                                                    'en' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/en-page-add.jpg',
                                                                                    'tw' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/tw-page-add.jpg',
                                                                                    'cn' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/cn-page-add.jpg',
                                                                                    'ko' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/ko-page-add.jpg',
                                                                                    'vi' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/vi-page-add.jpg',
                                                                                    'id' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/id-page-add.jpg',
                                                                                    'fr' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/fr-page-add.jpg',
                                                                                    'th' => 'https://kyotokimono-rental.com/wp-content/uploads/sites/2/2020/09/th-page-add.jpg'
                                                                            );
                                                                            $arrClosedShop = array(6,8,9,11,18,21,23,24,26,29);
                                                                        ?>

                                                                        <?php if(array_key_exists($language, $arrLangClosedShop)): ?>
                                                                            <?php if(in_array($shop_id, $arrClosedShop)): ?>
                                                                                <div class="close-info" style="text-align:center;margin:15px 0;">
                                                                                    <img src="<?= $arrLangClosedShop[$language]; ?>">
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>

																		<div class="wrap-banner-new-yukata">
                                                                        <?php echo php_set_base_url(get_field('banner_new_yukata')); ?>
                                                                    </div>
                                                                    <div class="shop-detail shop-detail-2">
																			<?php echo php_set_base_url(get_field('shop_detail_2')); ?>
																		</div>
                                                                        <?php if($shop_id == 25): ?>
<!--                                                                            <div class="wrap-grid-booking-access-formal flexbox justify-content-center">-->
<!--                                                                                <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="--><?php //echo home_url()?><!--/formal/preview">--><?//= Yii::t('access','下見を予約する')?><!--</a></div>-->
<!--                                                                                <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="--><?php //echo home_url()?><!--/formal">--><?//= Yii::t('access','着物を見る')?><!--</a></div>-->
<!--                                                                            </div>-->
                                                                        <div class="wrap-btn-v2 wrap-btn-v2-ginza-shop flexbox">
                                                                            <div class="btn-v2 btn-v2-01 formal-preview-popup-handle">
                                                                                <div class="btn-v2-reserve">
                                                                                    <div class="pattern ginza-honten"></div>
                                                                                    <div class="text">
                                                                                        <span class="text-link"><?= Yii::t('access','下見を予約する')?></span>
                                                                                        <span class="icon-arrow-r-link"></span>
                                                                                    </div>
                                                                                    <div class="pattern ginza-honten last"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php elseif ($shop_id != 8): ?>
                                                                            <?php if($language == 'ja' && !in_array($shop_id,$shop_id_formal))  : ?>
                                                                                <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>
                                                                                <div class="wrap-btn-change flexbox sp" style="margin-top:20px;"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>

                                                                    <?php elseif ($language == 'ja' && in_array($shop_id,$shop_id_formal)):?>
                                                                        <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>
                                                                        <div class="wrap-btn-change flexbox sp" style="margin-top:20px;"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>
                                                                    <?php else: ?>
                                                                        <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access','予約する')?></a></div>
                                                                        <div class="wrap-btn-change flexbox sp" style="margin-top:20px;"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access','予約する')?></a></div>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <?php if($shop_id != 10): ?>
                                                                    <div class="shop-detail shop-detail-1">
                                                                        <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
                                                                    </div>

                                                                    <div class="shop-detail shop-detail-3">
																				<?php echo php_set_base_url(get_field('shop_detail_3')); ?>
																			</div>
                                                                        <?php if($shop_id != 25) { ?>
                                                                            <?php if($language == 'ja' && !in_array($shop_id,$shop_id_formal))  : ?>
                                                                                <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>
                                                                                <div class="wrap-btn-change flexbox sp"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>
                                                                            <?php elseif ($language == 'ja' && in_array($shop_id,$shop_id_formal)):?>
                                                                            <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>
                                                                            <div class="wrap-btn-change flexbox sp"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>
                                                                            <?php else: ?>
                                                                                <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access','予約する')?></a></div>
                                                                                <div class="wrap-btn-change flexbox sp"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access','予約する')?></a></div>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
																		<?php else: ?>
																			<div class="shop-instruction">
																				<div class="wrap-map-instruction flexbox">
																					<div class="map shop">
																						<?php the_field('google_map'); ?>
																					</div>
                                                                                    <?php
                                                                                    $info_direction = get_field('info_direction');
                                                                                    if ($info_direction) {
                                                                                        echo do_shortcode(php_set_base_url($info_direction));
                                                                                    }
                                                                                    ?>
																					<div class="instruction">
																						<?php if($isSmartPhone) : ?>
		                                                                                    <?php echo php_set_base_url(get_field('shop_distance_time')); ?>
		                                                                                <?php else: ?>
		                                                                                    <?php echo php_set_base_url(get_field('shop_distance_time_pc')); ?>
		                                                                                <?php endif; ?>
																					</div>
																				</div>
																			</div>
                                                                            <?php if($postName!='kiyomizuzaka'): ?>
																			<div class="instruction_full_width clearfix">
																				<?php echo do_shortcode(the_field('shop_instruction')); ?>
																			</div>
                                                                            <?php endif; ?>
																			<?php echo php_set_base_url(get_field('access_instruction')); ?>
                                                                            <?php if($language == 'ja') : ?>
                                                                                <?php if (!in_array($shop_id,$shop_id_formal)) : ?>
                                                                                <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>
                                                                                <div class="wrap-btn-change flexbox sp"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access',$text_button)?></a></div>
                                                                                <?php else: ?>
                                                                                <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo home_url()?>/kimono"><?= Yii::t('access',$text_button)?></a></div>
                                                                                <div class="wrap-btn-change flexbox sp"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo home_url()?>/kimono"><?= Yii::t('access',$text_button)?></a></div>
                                                                                <?php endif; ?>
                                                                            <?php else: ?>
                                                                             <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo home_url()?>/kimono"><?= Yii::t('access','予約する')?></a></div>
                                                                                <div class="wrap-btn-change flexbox sp"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo home_url()?>/kimono"><?= Yii::t('access','予約する')?></a></div>
                                                                            <?php endif; ?>

                                                                    <div class="shop-detail shop-detail-1">
                                                                        <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
                                                                    </div>

                                                                    <div class="shop-detail shop-detail-3">
																				<?php echo php_set_base_url(get_field('shop_detail_3')); ?>
																			</div>
																		<?php endif; ?>
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
													<?php if($shop_id != 10): ?>
														<div class="wrap-map-instruction flexbox">
															<div class="map shop">
																<?php the_field('google_map'); ?>
															</div>
                                                            <?php
                                                            $info_direction = get_field('info_direction');
                                                            if ($info_direction) {
                                                                echo do_shortcode(php_set_base_url($info_direction));
                                                            }
                                                            ?>
															<div class="instruction">
																<?php if($isSmartPhone) : ?>
                                                                <?php echo php_set_base_url(get_field('shop_distance_time')); ?>
                                                            <?php else: ?>
                                                                <?php echo php_set_base_url(get_field('shop_distance_time_pc')); ?>
                                                            <?php endif; ?>
															</div>
														</div>
													<?php endif; ?>
													<script type="text/javascript">

													</script>
													<script type="text/javascript">

													</script>
												</div>
												<?php if($shop_id != 10): ?>
													<div class="instruction_full_width clearfix">
														<?php echo do_shortcode(the_field('shop_instruction')); ?>
													</div>
												<?php endif; ?>
											</div>
											<?php if($shop_id != 10){
												echo php_set_base_url(get_field('access_instruction'));
											} ?>
                                        <?php if($shop_id == 25): ?>
<!--                                            <div class="wrap-grid-booking-access-formal flexbox justify-content-center">-->
<!--                                                <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="--><?php //echo home_url()?><!--/formal/preview">--><?//= Yii::t('access','下見を予約する')?><!--</a></div>-->
<!--                                                <div class="grid-booking-access-formal text-center"><a class="main-btn text-center btn-color-pink" href="--><?php //echo home_url()?><!--/formal">--><?//= Yii::t('access','着物を見る')?><!--</a></div>-->
<!--                                            </div>-->
                                            <div class="wrap-btn-v2 wrap-btn-v2-ginza-shop flexbox">
                                                <div class="btn-v2 btn-v2-01 formal-preview-popup-handle">
                                                    <div class="btn-v2-reserve">
                                                        <div class="pattern ginza-honten"></div>
                                                        <div class="text">
                                                            <span class="text-link"><?= Yii::t('access','下見を予約する')?></span>
                                                            <span class="icon-arrow-r-link"></span>
                                                        </div>
                                                        <div class="pattern ginza-honten last"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                        <?php if($shop_id != 7 && $shop_id != 10 && $shop_id != 17): ?>
                                                <?php if($language == 'ja' && !in_array($shop_id,$shop_id_formal)):?>
                                                    <div class="wrap-btn-change flexbox"><a href="<?php echo $reserve_link_access; ?>" class="btn-formal btn-new-rs btn-color-pink"><?= Yii::t('access',$text_button)?></a></div>
                                                <?php elseif ($language == 'ja' && in_array($shop_id,$shop_id_formal)):?>
                                                    <div class="wrap-btn-change flexbox"><a href="<?php echo $reserve_link_access; ?>" class="btn-formal btn-new-rs btn-color-pink"><?= Yii::t('access',$text_button)?></a></div>
                                                <?php else: ?>
                                                    <div class="wrap-btn-change flexbox"><a href="<?php echo $reserve_link_access; ?>" class="btn-formal btn-new-rs btn-color-pink"><?= Yii::t('access','予約する')?></a></div>
                                                <?php endif; ?>
                                        <?php endif; ?>

                                        <?php endif; ?>
                                        <?php if (get_field('banner_shop')) : ?>
                                            <div class="wrapper-banners-shop">
                                                <?php if($postName!='formal-kyototower'): ?>
                                                <h2 class="title-general title-list text-center title-general-icon align-items-center">
                                                    <span class="title-nextto-grid">
                                                         <?php if($shop_id == 20) : //Dazaifu?>
                                                             <?php if($language == 'ja') : ?>
                                                                 <?= Yii::t('access','太宰府の着物レンタルプラ一覧'); ?>
                                                             <?php else: ?>
                                                                 <?php the_title(); ?>
                                                                 <?= Yii::t('access','レンタルできる商品を見る'); ?>
                                                             <?php endif; ?>
                                                         <?php else: ?>
                                                             <?php if($postName=='tokyoskytree'): ?>
                                                                <?= Yii::t('access','東京スカイツリーでレンタルできる着物を見る'); ?>
                                                             <?php elseif($postName=='kiyomizuzaka'): ?>
                                                                 <?= Yii::t('access','清水坂店でレンタルできる着物を見る'); ?>
                                                             <?php else: ?>
                                                                 <?= Yii::t('access','レンタルできる商品を見る'); ?>
                                                             <?php endif; ?>
                                                         <?php endif; ?>
                                                    </span>
                                                </h2>
                                                <?php endif;?>
                                                <div class="wrap-banner-plan-v2" style="display: none">
                                                    <div class="banner-plan-v2 banner-plan-v2-kimono">
                                                        <h3 class="sub-title">
                                                            <span class="icon-prize"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span>
                                                            <?php if($shop_id == 20) : //Dazaifu?>
                                                                <?php if($language == 'ja') : ?>
                                                                    <?= Yii::t('access','観光で着る着物レンタルプラン'); ?>
                                                                <?php else: ?>
                                                                    <?= Yii::t('access','観光着物レンタル'); ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <?= Yii::t('access','観光着物レンタル'); ?>
                                                            <?php endif; ?>
                                                        </h3>
                                                        <?php echo php_set_base_url(get_field('banner_shop'));?>
                                                        <div class="wrap-btn-change flexbox pc"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access','着物・浴衣レンタルを予約する')?></a></div>
                                                        <div class="wrap-btn-change flexbox sp" style="margin-top:20px;"> <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo $reserve_link_access; ?>"><?= Yii::t('access','着物・浴衣レンタルを予約する')?></a></div>
                                                    </div><!--end banner-plan-v2-kimono-->
                                                </div><!--end wrap-banner-plan-v2-->
                                                <?php
                                                if($isSmartPhone) {
                                                    $plan_sp = get_field('plan_sp');
                                                    echo do_shortcode(php_set_base_url($plan_sp));
                                                }else{
                                                    $plan_pc = get_field('plan_pc');
                                                    echo do_shortcode(php_set_base_url($plan_pc));
                                                }
                                                ?>


												<!-- Plan section -->
												<?php
													$rental_plan_sp = get_field('rental_plan_sp');
													$rental_plan_pc = get_field('rental_plan_pc');
												?>
                                                <?php if(!empty($rental_plan_sp)) : ?>

												<?php endif ?>

                                                <?php if($isSmartPhone) : ?>
                                                    <?php if(!empty($rental_plan_sp)) : ?>
														<style>
															.plan-section .wrap-main-btn {
																margin: 0;
															}
															.plan-list {
																padding: 0 10px;
															}
															.plan-list li {
																margin-bottom: 30px;
															}
															.plan-list li .plan-img {
																margin-bottom: 8px;
																position: relative;
															}
															.plan-list li .plan-img img{
																width: 100%;
															}
															.plan-list li .plan-img .plan-info .plan-name {
																font-size: 20px;
															}
															.plan-list li .plan-img .plan-info .plan-price {
																display: -webkit-box;
																display: -ms-flexbox;
																display: flex;
																-webkit-box-pack: center;
																-ms-flex-pack: center;
																justify-content: center;
																-webkit-box-align: end;
																-ms-flex-align: end;
																align-items: flex-end;
																color: #ff0000;
																position: absolute;
																right: 10px;
																top: 50%;
																transform: translateY(-50%);
															}
															.plan-info .plan-price .sm-price{
																font-size: 10px !important;
																color: #000;
																padding: 0 0 2px 7px;
															}
															.plan-list li .plan-img .plan-info .plan-price span {
																text-shadow: 1px 1px 1px rgb(255 255 255);
																font-size: 40px;
																font-weight: bold;
															}
															.plan-list li .plan-img .plan-info .plan-price var {
																font-size: 20px;
																margin-left: 5px;
															}
															.plan-list li .plan-img {
																margin-bottom: 15px;
															}
															.plan-list li .plan-img .plan-info {
																display: flex !important;
																position: absolute;
																align-items: center;
																justify-content: space-between;
																padding: 0 10px;
																bottom: 0;
																background-color: rgba(255,255,255, 0.5);
																width: 100%;
																height: 30px;
															}
															.plan-list li .plan-img .plan-info .plan-name {
																font-size: 13px;
																font-family: "ten-mincho", serif;
																font-weight: bold;
																padding-top: 5px;
															}
															.plan-list li .plan-img .plan-info .plan-price {
																font-family: "ten-mincho", serif;
															}
															.plan-list li .plan-img .plan-info .plan-price span {
																font-size: 18px;
															}
														</style>
														<?php echo do_shortcode(php_set_base_url($rental_plan_sp)); ?>
                                                    <?php endif ?>
                                                <?php else: ?>
                                                    <?php if(!empty($rental_plan_pc)) : ?>
														<style>
															.plan-section .wrap-main-btn {
																margin: 0
															}

															.plan-section .plan-intro-desc {
																margin-bottom: 30px
															}

															.plan-section .plan-intro-desc p {
																font-size: 16px;
																line-height: 1.5
															}

															.plan-list {
																display: -webkit-box;
																display: -ms-flexbox;
																display: -moz-box;
																display: -webkit-flex;
																display: flex;
																display: -webkit-box;
																display: -ms-flexbox;
																display: flex;
																-ms-flex-wrap: wrap;
																flex-wrap: wrap;
																margin-left: -20px;
																margin-bottom: 20px
															}

															.plan-list li {
																margin-left: 20px;
																width: calc(100% * (1/2) - 20px)
															}

															.plan-list li {
																display: -webkit-box;
																display: -ms-flexbox;
																display: -moz-box;
																display: -webkit-flex;
																display: flex;
																-webkit-flex-direction: column;
																-moz-flex-direction: column;
																-ms-flex-direction: column;
																flex-direction: column;
																margin-bottom: 30px
															}

															.plan-list li .plan-img {
																margin-bottom: 12px
															}

															.plan-list li .plan-info {
																-webkit-box-flex: 1;
																-moz-box-flex: 1;
																-webkit-flex: 1;
																-ms-flex: 1;
																flex: 1
															}

															.plan-list li .plan-info .plan-intro {
																font-size: 20px;
																margin-bottom: 8px;
																text-align: center;
																-webkit-box-flex: 1;
																-moz-box-flex: 1;
																-webkit-flex: 1;
																-ms-flex: 1;
																flex: 1;
																font-family: "ten-mincho", serif
															}

															.plan-list li .plan-info .plan-name {
																font-size: 30px;
																font-weight: bold;
																margin-bottom: 15px;
																text-align: center;
																font-family: "ten-mincho", serif
															}

															.plan-list li .plan-info .plan-price {
																display: -webkit-box;
																display: -ms-flexbox;
																display: flex;
																-webkit-box-pack: center;
																-ms-flex-pack: center;
																justify-content: center;
																-webkit-box-align: end;
																-ms-flex-align: end;
																align-items: flex-end;
																color: #c90000;
																font-size: 45px;
																font-weight: bold;
																text-align: center;
																margin-bottom: 20px;
																font-family: "ten-mincho", serif
															}

															.plan-info .plan-price .sm-price {
																font-size: 20px;
																color: #000;
																padding: 0 0 5px 10px
															}

															.plan-list li .plan-info .show-desc {
																display: -webkit-box;
																display: -ms-flexbox;
																display: -moz-box;
																display: -webkit-flex;
																display: flex;
																-webkit-align-items: center;
																-moz-align-items: center;
																-ms-align-items: center;
																align-items: center;
																-webkit-justify-content: center;
																-moz-justify-content: center;
																-ms-justify-content: center;
																justify-content: center;
																-ms-flex-pack: center;
																text-align: center;
																font-size: 20px;
																font-weight: bold;
																cursor: pointer;
																padding-bottom: 12px;
																margin-bottom: 12px;
																border-bottom: 1px solid #000
															}

															.plan-list li .plan-info .show-desc:after {
																content: "";
																display: inline-block;
																margin-left: 20px;
																border-style: solid;
																border-width: 12px 9px 0 9px;
																border-color: #000 transparent transparent transparent
															}

															.plan-list li .plan-info .show-desc.active:after {
																-moz-transform: rotate(180deg);
																-o-transform: rotate(180deg);
																-ms-transform: rotate(180deg);
																-webkit-transform: rotate(180deg);
																transform: rotate(180deg)
															}

															.plan-list li .plan-info .plan-desc {
																font-size: 14px;
																letter-spacing: 1px;
																margin-bottom: 20px;
																display: none
															}

															.plan-list li .plan-btn {
																color: #fff;
																font-weight: bold;
																font-size: 18px;
																font-family: "ten-mincho", serif;
																display: -webkit-box;
																display: -ms-flexbox;
																display: -moz-box;
																display: -webkit-flex;
																display: flex;
																-webkit-align-items: center;
																-moz-align-items: center;
																-ms-align-items: center;
																align-items: center;
																-webkit-justify-content: center;
																-moz-justify-content: center;
																-ms-justify-content: center;
																justify-content: center;
																-ms-flex-pack: center;
																background-color: #c90000;
																padding: 15px
															}
															.wrap-link-btn .link-to {
																background-color: #eeb001;
																color: #fff;
																padding: 15px;
																font-size: 18px;
																font-weight: bold;
																width: 440px;
																text-align: center;
															}
														</style>
                                                        <?php echo do_shortcode(php_set_base_url($rental_plan_pc)); ?>
                                                    <?php endif ?>
                                                <?php endif; ?>


                                                <?php if(get_field('banner_photo_session')): ?>
                                                    <div class="section-banner-photo-session">
                                                        <?php echo php_set_base_url(get_field('banner_photo_session')); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php
                                                    $custom_faq = get_field('custom_faq');
                                                    echo do_shortcode(php_set_base_url($custom_faq));
                                                ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                        $product_by_shop = get_field('product_by_shop');
                                        if(!empty($product_by_shop)){
                                            echo do_shortcode(php_set_base_url($product_by_shop));
                                        }
                                        ?>
                                        <?php
                                        if($shop_id){
                                            ?>
                                            <div class="container-box section-booking-top-page">
                                                <section class="block-viewbooking-top-page">
                                                    <div class="block-title-top-page-title bg-top-page-title booking">
                                                        <?php
                                                        $title_booking = array(
                                                            10 => "金沢店の着物レンタルご予約状況", //Kanazawa
                                                            20 => "太宰府店の着物レンタル ご予約状況", //Dazaifu
                                                            27 => "７月からのご予約絶賛受付中！" //Kanazawa-kenrokuen
                                                        );
                                                        ?>
                                                        <h2 class="title-general title-list text-center title-general-icon align-items-center">
                                                            <span class="icon-title-general icon icon-formal-status-booking"></span>
                                                            <?php if($shop_id == 10 || $shop_id == 20|| $shop_id == 27) : ?>
                                                                <?php if($language == 'ja') : ?>
                                                                    <?= Yii::t('access','<span class="title-nextto-grid">'.$title_booking[$shop_id].'</span>')?>
                                                                <?php else: ?>
                                                                    <?= Yii::t('access','<span class="title-nextto-grid">ご予約状況</span>')?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <?php if($postName=='tokyoskytree'): ?>
                                                                    <?= Yii::t('access','<span class="title-nextto-grid">東京スカイツリーでレンタルできる着物を見る</span>')?>
                                                                <?php else: ?>
                                                                    <?= Yii::t('access','<span class="title-nextto-grid">ご予約状況</span>')?>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </h2>
                                                    </div>
                                                    <div class="wrap-text-obove-grid-booking"><?= Yii::t('access','text-above-grid-booking')?></div>
                                                    <div id="box-calendar" class="sixteen columns row"></div>
                                                </section>
                                            </div>
                                            <?php
                                        }
                                        ?>

<!--                                        <div class="wrap-general-ctmvoice-top100">-->
<!--                                            <div class="box-general-ctmvoice-top100">-->
<!--                                                --><?php // echo do_shortcode('[yesterday_customer_voices]') ?>
<!---->
<!--                                                --><?php
//                                                    // Get listTopReserve by cache
//                                                    $listTopReserve = Yii::app()->cache->get("listTopReserve_{$language}");
//                                                    // Check if listTopReserve cache does not exist
//                                                    if ($listTopReserve == false) {
//                                                        // Get listTopReserve widget
//                                                        $listTopReserve = Yii::app()->controller->widget('application.components.widgets.ListTopReserve', array(), true);
//                                                        // Assign dependency by last update_time of book to listTopReserve cache
//                                                        $dependency = new CDbCacheDependency('SELECT MAX(book_id) FROM book');
//                                                        // Set listTopReserve cache
//                                                        Yii::app()->cache->set("listTopReserve_{$language}", $listTopReserve, 0, $dependency);
//                                                    }
//                                                    // Render listTopReserve
//                                                    echo $listTopReserve;
//                                                ?>
<!--                                            </div>-->
<!--                                        </div>-->
                                        <?php
                                        $popular_product_by_groups = get_field('popular_product');
                                        if(!empty($popular_product_by_groups)):?>
                                            <div class="wrap-popular-product">
                                                <h2 class="title-general title-list text-center title-general-icon align-items-center">
                                                    <span class="icon-title-general icon icon-formal-status-booking"></span>
                                                    <?php if($shop_id == 10) : //Kanazawa?>
                                                        <?php if($language == 'ja') : ?>
                                                            <?= Yii::t('access','<span class="title-nextto-grid">金沢店の冠婚葬祭用着物レンタル情報</span>')?>
                                                        <?php else: ?>
                                                            <?= Yii::t('access','<span class="title-nextto-grid">冠婚葬祭着物レンタル情報</span>')?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if($shop_id == 16) : ?>
                                                            <?= Yii::t('access','<span class="title-nextto-grid">観光着物レンタル情報</span>')?>
                                                        <?php else: ?>
                                                            <?= Yii::t('access','<span class="title-nextto-grid">冠婚葬祭着物レンタル情報</span>')?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </h2>

                                                <?php if($shop_id == 16) : ?>
                                                    <p>観光用の着物・浴衣レンタルは３階の「京都駅前京都タワー店」で承っております。</p>
                                                    <a href="<?= WP_HOME ?>/kimono" class="btn-formal btn-color-pink" style="max-width: 440px;margin: 30px auto 50px auto;">観光用着物レンタルを予約する</a>
                                                <?php endif; ?>
                                                <?php //echo do_shortcode(php_set_base_url($popular_product_by_groups)); ?>
                                            </div>
                                        <?php endif ?>

										<div class="wrap-gallery-new-access">
                                            <?php
                                                $title_gallery = array(
                                                    10 => "金沢店で着物レンタルされたお客様ギャラリー", //Kanazawa
                                                    20 => "太宰府店で着物レンタルされたお客様ギャラリー" //Dazaifu
                                                );
                                            ?>
											<h2 class="title-general title-list title-general-icon align-items-center title-general-new-arrival-pc">
                                                <?php if($shop_id == 10 || $shop_id == 20) : ?>
                                                    <?php if($language == 'ja') : ?>
                                                        <span class="title-nextto-grid"><?= Yii::t('wp_theme.access', $title_gallery[$shopId])?></span>
                                                    <?php else: ?>
                                                        <span class="title-nextto-grid"><?= Yii::t('wp_theme.access', 'お客様ギャラリー')?></span>
                                                    <?php endif; ?>
                                                <?php elseif($shop_id == 26): ?>
                                                    <span class="title-nextto-grid"><?= Yii::t('wp_theme.access', '清水寺 茶わん坂店 お客様ギャラリー')?></span>
                                                <?php else: ?>
                                                    <span class="title-nextto-grid"><?= Yii::t('wp_theme.access', 'お客様ギャラリー')?></span>
                                                <?php endif; ?>
											</h2>
											<?php echo php_set_base_url(do_shortcode(get_field('banner_plan')));?>
										</div><!-- End wrap-gallery-new-access -->
										<div class="customer-review-by-shop">
                                            <h2 class="title-general title-list text-center title-general-icon align-items-center">
                                                <span class="title-nextto-grid"><?= the_title() .' '. Yii::t('review-by-shop', 'のお客様の声・口コミ情報'); ?></span>
                                            </h2>
                                            <?php  echo do_shortcode('[customer_review_content]'); ?>
                                            <div class="link-review-by-shop">
                                                <a href="<?= $post->post_name; ?>/review"> <?= Yii::t('review-by-shop','すべての口コミ情報を見る'); ?>></a>
                                            </div>
                                        </div><!-- end .customer-review-by-shop -->

										<div class="wrap-blog-and-banner-plan">
                                            <?php
                                                $title_blog = array(
                                                    10 => "金沢店の着物レンタルスタッフブログ", //Kanazawa
                                                    20 => "太宰府店の着物レンタルスタッフブログ" //Dazaifu
                                                );
                                            ?>
											<h2 class="title-general title-list title-general-icon align-items-center title-general-new-arrival">
                                                <?php if($shop_id == 10 || $shop_id == 20) : ?>
                                                    <?php if($language == 'ja') : ?>
                                                        <span class="title-nextto-grid"><?= Yii::t('wp_theme.access', $title_blog[$shop_id]); ?></span>
                                                    <?php else: ?>
                                                        <span class="title-nextto-grid"><?= the_title() .' '. Yii::t('wp_theme.access', 'のスタッフブログ'); ?></span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span class="title-nextto-grid"><?= the_title() .' '. Yii::t('wp_theme.access', 'のスタッフブログ'); ?></span>
                                                <?php endif; ?>
											</h2>
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
													$blogs = array(
														'ja'=>'blog',
														'en'=>'english-blog',
														'vi'=>'vietnamese-blog',
														'tw'=>'traditionalchinese-blog',
														'ko'=>'korean-blog',
														'ru'=>'russian-blog',
														'th'=>'thailand-blog',
														'id'=>'indonesia-blog',
														'ms'=>'malaysia-blog',
														'fr' => 'french-blog',
														'cn' => 'simplified-chinese-blog',
														'hi' => 'hindi-blog'
													);

													if ($postName == 'gion-nishiki'){
                                                        $args = array(
                                                            "tax_query" => array(
                                                                array(
                                                                    "taxonomy" => "shop-blog",
                                                                    "field" => "slug",
                                                                    "terms" => array( "gion-area", "gion-nishiki"),
                                                                )
                                                            ),
                                                            'post_type' => $post_type,
                                                            'post_status' => 'publish',
                                                            'posts_per_page' => $isSmartPhone ? 2 : 4,
                                                            'order' => 'DESC',
                                                            'orderby' => 'date',
                                                        );
                                                    }else{
                                                        $args = array(
                                                            $taxonomy => $language == "ja" ? $shop_blog : $blogs[$language],
                                                            'post_type' => $post_type,
                                                            'post_status' => 'publish',
                                                            'posts_per_page' => $isSmartPhone ? 2 : 4,
                                                            'order' => 'DESC',
                                                            'orderby' => 'date',
                                                        );
                                                    }

													// The Query
													$my_query = new WP_Query($args);

                                                // The Loop
                                                if ($my_query->have_posts()) {
                                                    $i = 1;
                                                    $title = $data['shop'];
                                                    ?>
                                                    <div class="content-new-info wrap-wg-fm-information wrap-wg-fm-information-access">
                                                        <div class="item-info item-info-work">
                                                            <?php if($isSmartPhone) : ?>
                                                                <p class="sp sub-title flexbox align-items-center justify-content-center"> <span class="icon-prize"><img class="lazy" data-src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><?php echo Yii::t('wp_theme.access', '新着ブログ') ?></p>
                                                            <?php else: ?>
                                                            <div class="pc text-above-list-product text-above-list-product-first">
                                                                <p class="pc sub-title flexbox"><span class="icon-prize"><img class="lazy" data-src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><?php echo Yii::t('wp_theme.access', '新着ブログ') ?></p>
                                                            </div><?php endif;?>
                                                            <ul class="list-info flexbox">
                                                                <?php
                                                                while ($my_query->have_posts()) {
                                                                    $my_query->the_post();
                                                                    ?>
                                                                    <li class="sub-item-info">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                            <div class="image">
                                                                                <?php if ( has_post_thumbnail() ) : ?>
                                                                                    <?php echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title()))); ?>
                                                                                <?php else : ?>
                                                                                    <img class="lazy" data-src="<?= WP_HOME; ?>/images/no-image.png" alt="">
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <p class="date"><?php echo get_the_date(); ?></p>
                                                                            <p class="name"><?php echo  wp_trim_words(get_the_title(), 30); ?></p>
                                                                            <?php if ($language == 'ja'){?><div class="status-view"> <a class="shop_name" href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><span class="text-view"><?php echo $data['shop']; ?></span></a> <span class="num-view" style="display:none;">29371 view</span></div><?php }?>
                                                                            <p class="link-to"><a href="<?php the_permalink(); ?>"><?php echo Yii::t('wp_theme.access', '記事を読む >') ?></a></p>
                                                                        </a>
                                                                    </li>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                                ?>
                                                            </ul>
                                                            <?php if($language == 'ja'){?>
                                                                <p class="link-more sp"><a href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><?php echo Yii::t('wp_theme.access', 'ブログ一覧') ?></a></p>
                                                                <p class="link-more text-right pc"><a href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る>') ?></a></p>
                                                            <?php }else { ?>
                                                                <p class="link-more sp"><a href="<?php echo home_url(); ?>/<?php echo $blogs[$language]; ?>"><?php echo Yii::t('wp_theme.access', 'ブログ一覧') ?></a></p>
                                                                <p class="link-more text-right pc"><a href="<?php echo home_url(); ?>/<?php echo $blogs[$language]; ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る>') ?></a></p>
                                                            <?php } ?>
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
                                        </div>
                                        <div class="wrap-grid-booking wrap-grid-booking-access">
                                            <?php if($shop_id != ""): ?>
                                                <?php if($language == 'ja' && !in_array($shop_id,$shop_id_formal)):?>
                                                    <div class="wrap-btn-change flexbox"><a id="reserve_button" href="<?php echo $reserve_link_access; ?>" class="btn-formal btn-formal-access btn-new-rs btn-color-pink"><?= Yii::t('wp_theme',$text_button)?></a></div>
                                                <?php elseif($language == 'ja' && in_array($shop_id,$shop_id_formal)):?>
                                                    <div class="wrap-btn-change flexbox"><a id="reserve_button" href="<?php echo $reserve_link_access; ?>" class="btn-formal btn-formal-access btn-new-rs btn-color-pink"><?= Yii::t('wp_theme',$text_button)?></a></div>
                                                <?php else: ?>
                                                    <div class="wrap-btn-change flexbox"><a id="reserve_button" href="<?php echo $reserve_link_access; ?>" class="btn-formal btn-formal-access btn-new-rs btn-color-pink"><?= Yii::t('wp_theme','予約する')?></a></div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if($language == 'ja' && !in_array($shop_id,$shop_id_formal)):?>
                                                    <div class="wrap-btn-change flexbox"><button type="button" class="btn-formal-access btn-formal btn-new-rs btn-color-pink"><?= Yii::t('wp_theme',$text_button)?></button></div>
                                                <?php elseif($language == 'ja' && in_array($shop_id,$shop_id_formal)):?>
                                                    <div class="wrap-btn-change flexbox"><button type="button" class="btn-formal-access btn-formal btn-new-rs btn-color-pink"><?= Yii::t('wp_theme',$text_button)?></button></div>
                                                <?php else: ?>
                                                    <div class="wrap-btn-change flexbox"><button type="button" class="btn-formal-access btn-formal btn-new-rs btn-color-pink"><?= Yii::t('wp_theme','予約する')?></button></div>
                                                <?php endif; ?>
                                            <?php endif; ?>
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
<div id="wrap-formal-preview-popup"></div>
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
<script type="text/javascript">
    $(function(){
        $('body').each(function(){
            $('.left-column,.main-banner-top-page').addClass('imagesLoaded');
        });
    });
    function changeReserveLink(shop_id) {
        if (shop_id == undefined || shop_id == '') {
            return;
        }
        if (shop_id == 20) {
            $(".reserve_button_review").attr("href", "<?= home_url()?>/kimono?shop_id="+shop_id);
        } else if (shop_id == 14 || shop_id == 15) {
            $(".reserve_button_review").attr("href", "<?= home_url()?>/petit?shop_id="+shop_id);
        } else {
            $(".reserve_button_review").attr("href", "<?= home_url()?>/kimono?shop_id="+shop_id);
        }
        if (shop_id == 25) {
            $(".reserve_button_review").attr("href", "<?= home_url()?>/formal");
        }
    }
	$(document).ready(function(){
	    // load iframe
        $('iframe#map').Lazy();

        var shop_id = '<?php echo $shop_id; ?>';
        if (shop_id !== '') {
            changeReserveLink(shop_id);
        }

        // Get grid booking
        var calendarLoaded = false;
        $(window).scroll(function () {
            if ($("#box-calendar").visible() && calendarLoaded == false) {
                calendarLoaded = true;
                console.log('box-calendar loaded');
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getCalendar/' + shop_id,
                    success: function(data) {
                        if (data != null && data != "") {
                            $("#box-calendar").html(data);
                        }
                    }
                });
            }
        });

        setTimeout(function(){
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
            /* show more instruction */
            $('.show-more span').click(function(){
                $(this).toggleClass('show');
                $('.distance-time li:nth-last-child(-n + 4)').toggleClass('show');
                $(this).text() == "もっと見る" ? $(this).text("少なく表示") : $(this).text("もっと見る");
            });
        }, 5000);

        function openPreviewPopup() {
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                } else {
                    $("#formal-preview-popup input.preview-shops:checked").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        }

        var shop_id = '<?php echo $shop_id; ?>';
        $(document).on('click', '.formal-preview-popup-handle', function(event){
            event.preventDefault();
            if ($("#wrap-formal-preview-popup").is(':empty')) {
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getFormalPreview?shop_id=' + shop_id,
                    success: function (data) {
                        if (data != null && data != "") {
                            $("#wrap-formal-preview-popup").html(data);
                            openPreviewPopup();
                        }							                        }
                });
            } else {
                openPreviewPopup();
            }
        });
        // Custom FAQ
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });
	});

    $(document).on('click', '#closeStep, #backStep', function(){
        $("html").removeClass("modal-open");
    });
    /* Show formal popup - end */
</script>
<?php //get_footer('new-kimono') ;?>

<?php //Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
//    'id' => 'formal-preview-popup',
//    'htmlOptions' => array(
//        'style' => 'display: none'
//    ),
//    'selectedShop' => $shop_id,
//))
//?>

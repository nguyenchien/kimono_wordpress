<?php
/**
 * Template Name: New Access Child Page v2
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
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$language = Yii::app()->language;
$cssLanguage = "";
$postName = $post->post_name;
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$shop_id = get_field('shop_id');
if (is_page('check-booking')) {
    $shop_id = 5;
}
$arrNotInPreview = array(
    'dazaifu',
    'kurashiki',
//    'osaka-shinsaibashi-opa'
);
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
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
?>
<?php if($isSmartPhone):?>
    <link rel="preload" href="<?= get_template_directory_uri()?>/css/grid-booking-status-new-sp.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/grid-booking-status-new-sp.css"></noscript>
<?php else: ?>
    <link rel="preload" href="<?= get_template_directory_uri()?>/css/grid-booking-status-new-pc.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/grid-booking-status-new-pc.css"></noscript>
<?php endif; ?>

<?php if(!in_array($postName, $arrNotInPreview)):?>
    <?php if($isSmartPhone):?>
        <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css"></noscript>
    <?php else: ?>
        <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css"></noscript>
    <?php endif; ?>
<?php endif; ?>

<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>

<link rel="preload" href="/css/searchform.css?v=21062020" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=21062020"></noscript>

<?php if($language == "ja") : ?>
<?php else: ?>
    <link rel="preload" href="<?= get_template_directory_uri() ?>/css/new-reserve-status<?php echo $cssLanguage;?>.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/new-reserve-status<?php echo $cssLanguage;?>.css"></noscript>
    <?php if($isSmartPhone): ?>
        <link rel="preload" href="<?= get_template_directory_uri() ?>/css/new-access-child-page-v2-sp<?php echo $cssLanguage;?>.css?ver=20211206" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/new-access-child-page-v2-sp<?php echo $cssLanguage;?>.css?ver=20211206"></noscript>
    <?php else: ?>
        <link rel="preload" href="<?= get_template_directory_uri() ?>/css/new-access-child-page-v2-pc<?php echo $cssLanguage;?>.css?ver=20211206" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/new-access-child-page-v2-pc<?php echo $cssLanguage;?>.css?ver=20211206"></noscript>
    <?php endif; ?>
<?php endif; ?>
<?php
//    if($language == "ja"){
//        wp_register_style('kimono-letter-spacing-style', get_template_directory_uri() . '/css/kimono-letter-spacing-ja.css', array('twentytwelve-style'));
//        wp_enqueue_style('kimono-letter-spacing-style');
//    } else {
//        wp_register_style('new-reserve-status-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-reserve-status'.$cssLanguage.'.css', array('twentytwelve-style'));
//        wp_enqueue_style('new-reserve-status-style'.$cssLanguage);
//        if($isSmartPhone){
//            wp_register_style('new-access-child-page-v2-sp-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-access-child-page-v2-sp'.$cssLanguage.'.css', array('twentytwelve-style'));
//            wp_enqueue_style('new-access-child-page-v2-sp-style'.$cssLanguage);
//        }else{
//            wp_register_style('new-access-child-page-v2-pc-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-access-child-page-v2-pc'.$cssLanguage.'.css', array('twentytwelve-style'));
//            wp_enqueue_style('new-access-child-page-v2-pc-style'.$cssLanguage);
//        }
//    }
    wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
    wp_enqueue_script('jquery-lazy-youtube', WP_HOME . '/js/jquery.lazy.youtube.min.js');
    wp_enqueue_script('jquery-lazy-iframe', WP_HOME . '/js/jquery.lazy.iframe.min.js');
    wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
    wp_enqueue_script('jquery-visible', 'https://kyotokimono-rental.com/js/jquery.visible.min.js');
?>
    <div class="container-box clearfix">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
        ?>
        <?php if($isSmartPhone) : ?>
            <?php if(get_field('title_list_cate_sp')): ?>
                <!--<h1 class="title-name-formal">
                    <?php /*the_field('title_list_cate_sp'); */?>
                </h1>-->
            <?php endif; ?>
        <?php else: ?>
            <?php if(get_field('title_list_cate_pc')): ?>
                <!--<h1 class="title-name-formal">
                    <?php /*the_field('title_list_cate_pc'); */?>
                </h1>-->
            <?php endif; ?>
        <?php endif; ?>
        <?php if($isSmartPhone) : ?>
            <?php
            $main_banner_sp = get_field('main_banner_sp');
            if ($main_banner_sp) {
                echo do_shortcode(php_set_base_url($main_banner_sp));
            }
            ?>
        <?php else: ?>
            <?php
            $main_banner_pc = get_field('main_banner_pc');
            if ($main_banner_pc) {
                echo do_shortcode(php_set_base_url($main_banner_pc));
            }
            ?>
        <?php endif; ?>
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
							<div class="wrap-boths-column flexbox">
								<?php if(!$isSmartPhone) : ?>
									<div class="left-column hidden-sidebar">
										<?php get_sidebar('top-page-left-v3') ?>
									</div>
								<?php endif; ?>
								<div class="right-column right-column-asakusa">
									<div class="padding-v2">
										<div class="new-access-child-page  hd-access asakusa <?php echo $post->post_name; ?>">
										<div class="container-box top-shop">
											<!-- Banner top + slider -->
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
																	<?php if ($isSmartPhone==false) echo php_set_base_url($content); ?>

                                                                    <?php if(!$isSmartPhone): ?>
																		<?php
																			$slider_popup_pc = get_field('slider_popup_pc');
																			if ($slider_popup_pc) {
																				echo do_shortcode(php_set_base_url($slider_popup_pc));
																			}
																		?>
                                                                    <?php endif; ?>
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
																								<a href="#">
																										<img class="lazy" data-hide-src="<?php echo $thumb[0]; ?>" width="214" height="160" alt="<?php echo $shop_title; ?>"/>
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
//                                                                wp_register_style('box-slider', get_template_directory_uri() . '/css/box-slider.css', array('twentytwelve-style'));
//                                                                wp_enqueue_style('box-slider');
//                                                                if (!$isSmartPhone) {
//                                                                    wp_register_style('box-slider-pc', get_template_directory_uri() . '/css/box-slider-pc.css', array('twentytwelve-style'));
//                                                                    wp_enqueue_style('box-slider-pc');
//                                                                }
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
																									<a href="#">
																										<img data-src="<?php echo $thumb[0]; ?>" width="214" height="160" alt="<?php echo $image_alt; ?>"/>
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
																		/*.shop-has-slide .slides {*/
																			/*opacity: 0;*/
																			/*visibility: hidden;*/
																			/*transition: opacity 0.3s ease;*/
																		/*}*/
																		/*.shop-has-slide .slides.slick-initialized {*/
																			/*opacity: 1;*/
																			/*visibility: visible;*/
																		/*}*/
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
																		.shop-has-slide .slides .slick-slide:before{
																			content: "";
																			position: absolute;
																			top: 0;
																			left: 0;
																			display: block;
																			background-color: #eee;
																			width: 100%;
																			min-height: 72px;
																		}
																		.shop-has-slide .slides.slick-initialized .slick-slide:before{
																			background-color: unset;
																			min-height: auto;
																		}
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
																<?php else: ?>
																	<style>
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
																<?php endif; ?>
																<?php } ?>

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

												<?php if(!in_array($shop_id, MasterValues::$SHOP_HAS_SLIDE)): ?>
													<div class="shop-detail">
														<div class="title"><?php echo Yii::t('wp_theme', '店舗情報'); ?></div>
														<?php echo do_shortcode(get_field('shop_detail_3')); ?>
													</div>
												<?php endif; ?>

											</div>
											<!-- Banner top sales -->
											<div class="banner-top-sales-okinawa">
												<?php
												if($isSmartPhone){
													$banner_top_sales_sp = get_field('banner_top_sales_sp');
													if ($banner_top_sales_sp) {
														echo do_shortcode(php_set_base_url($banner_top_sales_sp));
													}
												}
												else{
													$banner_top_sales_pc = get_field('banner_top_sales_pc');
													if ($banner_top_sales_pc) {
														echo do_shortcode(php_set_base_url($banner_top_sales_pc));
													}
												}
												?>
											</div>
											<!-- Shop intro -->
											<?php
												$shop_intro = get_field('shop_intro');
												if ($shop_intro) {
													echo do_shortcode(php_set_base_url($shop_intro));
												}
											?>
											<!-- Box circle -->
											<div class="wrap-top-plan-circle-fm-v2 asakusa <?= $postName; ?>">
												<?php
												$top_plan_circle = get_field('top_plan_circle');
												if ($top_plan_circle) {
													echo do_shortcode(php_set_base_url($top_plan_circle));
												}
												?>
											</div>
											<?php if($shop_id == 25 || $shop_id == 29){ ?>
												<div class="wrap-line-v2">
													<div class="line-v2 line-v2-double"></div>
												</div>

												<!-- Product list -->
												<div class="wrap-ginza-store wrap-products-shop-store asakusa <?= $postName; ?>">
													<?php
													$products_shop_store = get_field('products_shop_store');
													if ($products_shop_store) {
														echo do_shortcode(php_set_base_url($products_shop_store));
													}
													?>
												</div>
											<?php } ?>

											<!-- Access map -->
											<div class="wrap-google-map-fm-v2 asakusa <?= $postName; ?>">
												<?php
												$google_map = get_field('google_map');
												if ($google_map) {
													echo do_shortcode(php_set_base_url($google_map));
												}
												?>
											</div>
                                            <?php
                                            $info_direction = get_field('info_direction');
                                            if ($info_direction) {
                                                echo do_shortcode(php_set_base_url($info_direction));
                                            }
                                            ?>
                                            <?php if($isSmartPhone): ?>
                                                <?php
                                                $slider_popup_sp = get_field('slider_popup_sp');
                                                if ($slider_popup_sp) {
                                                    echo do_shortcode(php_set_base_url($slider_popup_sp));
                                                }
                                                ?>
                                            <?php endif; ?>

											<div class="wrap-general-google-map-btn asakusa flexbox <?= $postName; ?>">
												<?php
												$google_map_banner = get_field('google_map_banner');
												if ($google_map_banner) {
													echo do_shortcode(php_set_base_url($google_map_banner));
												}
												?>
											</div>

											<!-- Plan section -->
											<?php
											$rental_plan_sp = get_field('rental_plan_sp');
											$rental_plan_pc = get_field('rental_plan_pc');
											?>
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

											<!-- Banner photo session -->
											<div class="section-banner-photo-session asakusa <?= $postName; ?>">
												<?php if(get_field('banner_photo_session')): ?>
													<?php echo php_set_base_url(get_field('banner_photo_session')); ?>
												<?php endif; ?>
											</div>
                                            <?php
                                                $custom_faq = get_field('custom_faq');
                                                echo do_shortcode(php_set_base_url($custom_faq));
                                            ?>
											<?php if($shop_id != 25 && $shop_id != 29){ ?>
												<div class="wrap-line-v2">
													<div class="line-v2 line-v2-double"></div>
												</div>

												<!-- Product list -->
												<div class="wrap-ginza-store wrap-products-shop-store asakusa <?= $postName; ?>">
													<?php
													$products_shop_store = get_field('products_shop_store');
													if ($products_shop_store) {
														echo do_shortcode(php_set_base_url($products_shop_store));
													}
													?>
												</div>
											<?php } ?>
											<!-- Slider ranking -->
											<?php
											$product_by_shop_v2 = get_field('product_by_shop_v2');
											if(!empty($product_by_shop_v2)){

												echo do_shortcode(php_set_base_url($product_by_shop_v2));
											}
											?>

											<!-- Video experience -->
											<?= do_shortcode(get_field('video_experience')); ?>

											<!-- Grid booking -->
											<div id="grid-booking" class="wrap-reservation-status-fm-v2 asakusa <?= $postName; ?>">
												<div class="container-box section-booking-top-page">
													<section class="block-viewbooking-top-page">
														<div class="wrap-title-v2 flexbox">
															<span class="icon-circle"><img class="lazy" data-src="<?= WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle.svg" width="20" height="20" alt=""></span>
															<div class="wrap-text-title">
																<?php if($postName=='kyotostation' && $language == 'ja') { ?>
																<h2 class="lbl-title"><?= Yii::t('new-access-v2','京都タワー店 予約状況')?></h2>
																<?php } elseif($postName=='osaka-shinsaibashi-opa' && $language == 'ja') { ?>
																<h2 class="lbl-title"><?= Yii::t('new-access-v2','大阪心斎橋店 予約状況')?></h2>
																<?php } else { ?>
																<h2 class="lbl-title"><?= Yii::t('access-v2','店舗予約状況')?></h2>
																<?php } ?>
																<span class="des-sm-title"><?= Yii::t('access-v2','Reservation status')?></span>
															</div>
														</div>
														<div class="wrap-text-obove-grid-booking"><?= Yii::t('access','text-above-grid-booking')?></div>
														<div id="box-calendar" class="sixteen columns row lazy"></div>
													</section>
												</div>
											</div>

											<?php if(($shop_id == 9) || ($shop_id == 10) || ($shop_id == 24) || ($shop_id == 5)) { ?>
												<div class="wrap-line-v2 wrap-line-v2-kamakura">
													<div class="line-v2 line-v2-single"></div>
												</div>
											<?php } ?>

											<!-- Spots -->
											<div class="wrap-spots-shop-fm-v2 asakusa <?= $postName; ?>">
												<?php
												$spots_shop = get_field('spots_shop');
												if ($spots_shop) {
													echo do_shortcode(php_set_base_url($spots_shop));
												}
												?>
											</div>

											<!-- Columns -->

											<?php if($postName == 'asakusa') { ?>
												<div class="wrap-general-google-map-btn asakusa flexbox asakusa" style="margin-bottom: 15px;">
													<div class="wrap-item wrap-banner-map">
														<p class="text-banner">こちらも合わせてチェック！</p>
														<div class="map-banner">
															<a href="[base_url]/access/asakusa-area/tourist-spots">
																<img data-src="<?= WP_HOME;?>/images/new-kimono/access/banner-map-asakusa.png" width="564" height="172">
															</a>
														</div>
													</div>
												</div>
											<?php } ?>
											<div class="wrap-column-post wrap-column-post-<?= $postName; ?>">
												<?php if($isSmartPhone) : ?>
													<?php echo php_set_base_url(get_field('column_spot_title_sp')); ?>
												<?php else: ?>
													<?php echo php_set_base_url(get_field('column_spot_title_pc')); ?>
												<?php endif; ?>
												<div id="wrap_spots_shop"></div>
												<?php
													$spots_shop_mode_2 = get_field('spots_shop_mode_2');
													$spots_shop_mode_2 == '3' ? 3 : 2;
												?>
											</div>

											<!-- Access To Shop -->
											<?php
											$access_to_shop = get_field('access_to_shop');
											if ($access_to_shop) {
												echo do_shortcode(php_set_base_url($access_to_shop));
											}
											?>

											<?php if($shop_id == 25) { ?>
												<?php
												$instagram_gallery = get_field('instagram_gallery');
												echo do_shortcode(php_set_base_url($instagram_gallery));
												?>
											<?php } ?>

											<?php if($shop_id != 25) {?>
												<!-- Reason choose -->
												<div class="wrap-reason-choose wrap-reason-choose-fm-v2 asakusa <?= $postName; ?>">
													<div class="wrap-title-v2 flexbox">
														<span class="icon-circle"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" width="20" height="20" alt=""></span>
														<div class="wrap-text-title">
															<h2 class="lbl-title"><?= Yii::t('access-v2','選ばれる理由')?></h2>
															<span class="des-sm-title"><?= Yii::t('access-v2','Reason why people choose')?></span>
														</div>
													</div>
													<div class="wrap-order-reason wrap-order-reason-ginza-shop">
														<?php if($isSmartPhone) :?>
															<?php
															$reason_choose_sp = get_field('reason_choose_sp');
															if ($reason_choose_sp) {
																echo do_shortcode(php_set_base_url($reason_choose_sp));
															}
															?>
														<?php else: ?>
															<?php
															$reason_choose_pc = get_field('reason_choose_pc');
															if ($reason_choose_pc) {
																echo do_shortcode(php_set_base_url($reason_choose_pc));
															}
															?>
														<?php endif; ?>
													</div>
													<?php if($shop_id == 24 || $shop_id == 20 ) : ?>
														<div class="wrap-btn-v2 wrap-btn-v2-asakusa wrap-btn-asakusa-reason-end flexbox">
															<div class="btn-v2 btn-v2-01 btn-v2-asakusa btn-v2-<?= $postName ?>">
																<a href="/kimono?shop_id=<?=$shop_id?>" class="btn-v2-reserve">
																	<div class="pattern asakusa <?= $postName ?>"></div>
																	<div class="text">
																		<span class="text-link"><?= Yii::t('access-v2','きものレンタルを予約する')?></span>
																		<span class="icon-arrow-r-link"></span>
																	</div>
																	<div class="pattern asakusa <?= $postName ?> last"></div>
																</a>
															</div>
														</div>
													<?php elseif($shop_id == 8): ?>
														<div class="wrap-btn-v2 wrap-btn-v2-asakusa wrap-btn-asakusa-reason-end flexbox">
															<a href="<?= home_url()?>/kimono?shop_id=8" class="btn-v2 btn-v2-01 btn-v2-asakusa btn-v2-<?= $postName ?>">
																<div class="btn-v2-reserve">
																	<div class="pattern asakusa <?= $postName ?>"></div>
																	<div class="text">
																		<span class="text-link"><?= Yii::t('access-v2','きものレンタルを予約する')?></span>
																		<span class="icon-arrow-r-link"></span>
																	</div>
																	<div class="pattern asakusa <?= $postName ?> last"></div>
																</div>
															</a>
														</div>
													<?php else:?>
														<div class="wrap-btn-v2 wrap-btn-v2-asakusa wrap-btn-asakusa-reason-end flexbox">
															<div class="btn-v2 btn-v2-01 btn-v2-asakusa btn-v2-<?= $postName ?> formal-preview-popup-handle">
																<div class="btn-v2-reserve">
																	<div class="pattern asakusa <?= $postName ?>"></div>
																	<div class="text">
																		<span class="text-link"><?= Yii::t('access-v2','来店予約をする')?></span>
																		<span class="icon-arrow-r-link"></span>
																	</div>
																	<div class="pattern asakusa <?= $postName ?> last"></div>
																</div>
															</div>
														</div>
													<?php endif; ?>

												</div>
												<?php if($shop_id != 5) { ?>
													<!-- Instagram gallery -->
													<?php
													$instagram_gallery = get_field('instagram_gallery');
													echo do_shortcode(php_set_base_url($instagram_gallery));
													?>
												<?php } ?>

												<!-- Customer review -->
												<?php
													$review_shop = get_field('review_shop');
													if ($review_shop) {
												?>
													<div class="wrap-review wrap-review-ginza-honten <?= $shop_id != 29 ? 'wrap-review-asakusa' : '' ?> wrap-review-<?= $postName ?>">
														<?php echo do_shortcode(php_set_base_url($review_shop)); ?>
													</div>
												<?php } ?>

												<?php if($shop_id == 5) { ?>
													<!-- Instagram gallery -->
													<?php
													$instagram_gallery = get_field('instagram_gallery');
													echo do_shortcode(php_set_base_url($instagram_gallery));
													?>
												<?php } ?>

											<?php } ?>

											<!-- Blogs -->
											<div class="wrap-blog-shop-fm-v2 ginza-honten asakusa <?= $postName; ?>">
												<div class="wrap-blog-and-banner-plan">
													<div class="wrap-title-v2 flexbox"><span class="icon-circle"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" width="20" height="20" alt=""></span>
														<div class="wrap-text-title">
															<h2 class="lbl-title"><?= Yii::t('wp_theme.access', '新着ブログ')?></h2>
															<span class="des-sm-title"><?= Yii::t('access-v2', 'Blog')?></span>
														</div>
													</div>

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
															$args = array(
																$taxonomy => $language == "ja" ? $shop_blog : $blogs[$language],
																'post_type' => $post_type,
																'post_status' => 'publish',
																'posts_per_page' => $isSmartPhone ? 2 : 3,
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
																<div class="content-new-info wrap-wg-fm-information wrap-wg-fm-information-access">
																	<div class="item-info item-info-work">
																		<ul class="list-info flexbox">
																			<?php
																			while ($my_query->have_posts()) {
																				$my_query->the_post();
																				?>
																				<li class="sub-item-info">
																					<a href="<?php the_permalink(); ?>" style="display: block;">
																						<div class="image">
																							<?php
																								if ( has_post_thumbnail() ) {
																									echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(200, 267), false, array('alt' => strip_tags(get_the_title())));
																								} else {
																									echo '<img class="lazy" width="185" height="134" data-src="'.WP_HOME.'/images/no-image.png">';
																								}
																							?>
																						</div>
																						<p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
																						<p class="name"><?php echo  wp_trim_words(get_the_title(), 30); ?></p>
																					</a>
																					<?php if ($language == 'ja') : ?>
																					<div class="status-view"><a class="shop_name" href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><span class="text-view"><?php echo $data['name']; ?></span></a></div>
																					<?php endif; ?>
																					<div class="wrap-link-to"><span class="link-to"><a href="<?php the_permalink(); ?>"><?php echo Yii::t('wp_theme.access', 'つづきを見る') ?></a></span></div>
																				</li>
																				<?php
																				$i++;
																			}
																			?>
																			<?php if(!$isSmartPhone){?>
																				<li class="sub-item-info sub-item-info-other">
																					<div class="bg-item-outside">
																						<div class="bg-item-inside">
																							<?php if ($language == 'ja') : ?>
																								<a href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る') ?></a>
																							<?php else: ?>
																								<a href="<?php echo home_url(); ?>/<?php echo $blogs[$language]; ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る') ?></a>
																							<?php endif; ?>
																						</div>
																					</div>
																				</li>
																			<?php } ?>
																		</ul>
																		<?php if($isSmartPhone){?>
																			<li class="sub-item-info sub-item-info-other">
																				<div class="bg-item-outside">
																					<div class="bg-item-inside">
																						<?php if ($language == 'ja') : ?>
																							<a href="<?php echo get_term_link($term->term_id, $taxonomy); ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る') ?></a>
																						<?php else: ?>
																							<a href="<?php echo home_url(); ?>/<?php echo $blogs[$language]; ?>"><?php echo Yii::t('wp_theme.access', '店舗ブログを見る') ?></a>
																						<?php endif; ?>
																					</div>
																				</div>
																			</li>
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
													<?php //echo php_set_base_url(do_shortcode(get_field('banner_plan')));?>
												</div>
											</div>

											<?php if($isSmartPhone) :?>
												<?php
												$how_to_reserve_sp = get_field('how_to_reserve_sp');
												if ($how_to_reserve_sp) {
													echo do_shortcode(php_set_base_url($how_to_reserve_sp));
												}
												?>
											<?php else: ?>
												<?php
												$how_to_reserve_pc = get_field('how_to_reserve_pc');
												if ($how_to_reserve_pc) {
													echo do_shortcode(php_set_base_url($how_to_reserve_pc));
												}
												?>
											<?php endif; ?>

											<?php if($isSmartPhone) :?>
												<?php
												$set_content_sp = get_field('set_content_sp');
												if ($set_content_sp) {
													echo do_shortcode(php_set_base_url($set_content_sp));
												}
												?>
											<?php else: ?>
												<?php
												$set_content_pc = get_field('set_content_pc');
												if ($set_content_pc) {
													echo do_shortcode(php_set_base_url($set_content_pc));
												}
												?>
											<?php endif; ?>

											<?php
											$topic_banner_access = get_field('topic_banner_access');
											if ($topic_banner_access) {
												echo do_shortcode(php_set_base_url($topic_banner_access));
											}
											?>
											<?php
											$intro_bottom = get_field('intro_bottom');
											if ($intro_bottom) {
												echo do_shortcode(php_set_base_url($intro_bottom));
											}
											?>
										</div>
										</div><!-- end new-access-child-page -->
									</div>
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
<?php
$cs=Yii::app()->getClientScript();
ob_start();
?>
<?php if($isSmartPhone) : ?>
    <script>
        $(document).ready(function () {
            //Slider banner
            var shopId = $(".shop-has-slide").attr("id");
            if (shopId) {
                $('#' +  shopId  + ' .slides').not('.slick-initialized').slick({
                    infinite: false,
                    arrows: true,
                    dots: false,
                    slidesToShow: 2,
                    slidesToScroll: 2
                });
            }
        });
    </script>
<?php else: ?>
    <script>
        $(document).ready(function () {
            //Slider banner
            var shopId = $(".shop-has-slide").attr("id");
            $('#' +  shopId  + ' .slides').slick({
                arrows: false,
                slidesToShow: 4,
                slidesToScroll: 4
            });
        });
    </script>
<?php endif; ?>
    <script>
        $(function(){
            $('body').each(function(){
                $('.main-banner-top-page,.top-shop .shop-info,.left-column').addClass('imagesLoaded');
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
            } else if (shop_id == 29){
                $(".reserve_button_review").attr("href", "<?= home_url()?>/yukata/plan");
            }else {
                $(".reserve_button_review").attr("href", "<?= home_url()?>/kimono?shop_id="+shop_id);
            }
            if (shop_id == 25) {
                $(".reserve_button_review").attr("href", "<?= home_url()?>/formal");
            }
            <?php if($postName=='osaka-shinsaibashi-opa'): ?>
            $(".reserve_button_review,#wrap_access_to_shop .formal-preview-popup-handle").attr("href", "<?= home_url()?>/yukata/plan");
            <?php endif;?>
        }

        $(document).ready(function(){
            var shop_id = '<?php echo $shop_id; ?>';

            $('iframe#map').Lazy();

            if (shop_id !== '') {
                changeReserveLink(shop_id);
            }

            setTimeout(function(){
                //Instagram gallery slider
                if($('.slider-gallery').length > 0){
                    $('.slider-gallery').not('.slick-initialized').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        lazyLoad: 'ondemand'
                    });
                }

                // Slick slider product
                if ($('.sidebar-products-fm-v2').length > 0) {
                    $('.sidebar-products-fm-v2 .list').not('.slick-initialized').slick({
                        infinite: false,
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        arrows: true,
                        lazyLoad: 'ondemand',
                        responsive: [{
                            breakpoint: 750,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        }]
                    });
                }

                // Slider access shop
                if ($('#slider .list-access-shop').length > 0) {
                    $('#slider .list-access-shop').not('.slick-initialized').slick({
                        infinite: true,
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows: true,
                        lazyLoad: 'ondemand',
                        responsive: [{
                            breakpoint: 750,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                fade: true,
                            }
                        }]
                    });
                }
                <?php
	                if(
                		$postName=='kyotostation'||
		                $postName=='ninenzaka'||
		                $postName=='osaka-shinsaibashi-opa'||
		                $postName=='asakusa'||
		                $postName=='ginza-honten'||
		                $postName=='sendagaya'||
		                $postName=='hakata') :
	            ?>
                $('.instruction-shop,.shop-video').addClass('hidden');
                $('.wrap-info-direction .wrap-info-title').click(function(){
                    $('.instruction-shop,.shop-video').toggleClass('hidden');
                });
                <?php endif;?>

                var bannerOpen = $('.banner-customer-thanksgiving img').length;
                if(bannerOpen >= 1) {
                    $('.banner-customer-thanksgiving').slick({
                        dots: true,
                        arrows: true
                    });
                }
            }, 5000);

            // Checking in view and loading for calendar
            var calendarLoaded = false;
            $(window).scroll(function () {
                if ($("#box-calendar").visible() && calendarLoaded == false) {
                    calendarLoaded = true;
                    console.log('box-calendar loaded');
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getCalendar/' + shop_id,
                        success: function (data) {
                            if (data != null && data != "") {
                                $("#box-calendar").html(data);
                            }
                        }
                    });
                }
            });

            //Show more plan
            $('.plan-img').click(function(){
                var detail = $(this).next();
                detail.addClass('open');
            });

            $('.show-less').click(function(){
                $(this).closest('.plan-info').removeClass('open');
            });

            // Custom Field: Product By Shop V2
            <?php if ($postName == 'shinjuku-station') { ?>
                if ($("#box-product_by_shop_25_plan_group_5_6_7").visible() && $("#product_by_shop_25_plan_group_5_6_7").is(':empty') == false) {
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=5&plan_group=5,6,7&list_product_id=list_view_s_25_pg_5_6_7',
                        success: function (data) {
                            if (data != null && data != "") {
                                $("#product_by_shop_25_plan_group_5_6_7").html(data);
                            }
                        }
                    });
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=8&plan_group=8,18&list_product_id=list_view_s_25_pg_8_18',
                        success: function (data) {
                            if (data != null && data != "") {
                                $("#product_by_shop_25_plan_group_8_18").html(data);
                            }
                        }
                    });
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=10&plan_group=10,21&list_product_id=list_view_s_25_pg_10_21',
                        success: function (data) {
                            if (data != null && data != "") {
                                $("#product_by_shop_25_plan_group_10_21").html(data);
                            }
                        }
                    });
                }
            <?php } else if ($postName == 'okinawa-naha') { ?>
                if ($("#box-product_by_shop_29_plan_group_5_6_7").visible() && $("#product_by_shop_29_plan_group_5_6_7").is(':empty') == false) {
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=5&plan_group=5,6,7&list_product_id=list_view_s_29_pg_5_6_7',
                        success: function (data) {
                            if (data != null && data != "") {
                                $("#product_by_shop_29_plan_group_5_6_7").html(data);
                            }
                        }
                    });
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=8&plan_group=8,18&list_product_id=list_view_s_29_pg_8_18',
                        success: function (data) {
                            if (data != null && data != "") {
                                $("#product_by_shop_29_plan_group_8_18").html(data);
                            }
                        }
                    });
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=10&plan_group=10,21&list_product_id=list_view_s_29_pg_10_21',
                        success: function (data) {
                            if (data != null && data != "") {
                                $("#product_by_shop_29_plan_group_10_21").html(data);
                            }
                        }
                    });
                }
            <?php } else if ($postName == 'osaka-shinsaibashi-opa') { ?>
                if ($("#box-product_by_shop_28_plan_group_5_6_7_8_9_10_21_22_23_24").visible() && $("#product_by_shop_28_plan_group_5_6_7_8_9_10_21_22_23_24").is(':empty') == false) {
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getProductByShop?shop_id=' + shop_id + '&group=5&plan_group=5,6,7,8,9,10,21,22,23,24&list_product_id=list_view_s_28_pg_5_6_7_8_9_10_21_22_23_24',
                        success: function (data) {
                            if (data != null && data != "") {
                                $("#product_by_shop_28_plan_group_5_6_7_8_9_10_21_22_23_24").html(data);
                            }
                        }
                    });
                }
            <?php } ?>

			// Slider popup lightbox
            const popupOverlay = '<div id="popup-overlay" class="popup-overlay"></div>'
            if ($('#slider-content .item').length > 1) {
                $('#slider-content').not('.slick-initialized').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: true
                });
            };

            $('#slider-content .item').click(function() {
                if(!$('#popup-overlay').length) {
                    $('body').append(popupOverlay);
                } else {
                    $('#popup-overlay').show();
                }

                if (isSmartPhone()){
                    $('body, html').css('overflow', 'hidden');
				}


                $('.wrap-slider-popup').show().removeClass('zoomOut').addClass('animated zoomIn').delay(600).queue(function(){
                    $('.wrap-slider-popup').removeClass('animated zoomIn');
                });

                $('#slider-content .slick-arrow').hide();

                let index = $(this).index();

                if ($('#slider-popup .item').length > 1) {
                    if (!$('#slider-popup').hasClass('slick-initialized')) {
                        $('#slider-popup').not('.slick-initialized').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            dots: true,
                            adaptiveHeight: true
                        });
                    } else {
                        $('#slider-popup').slick('slickGoTo', index - 1);
                    }
                }
            });

            $('.wrap-slider-popup .close-popup').click(function(){
                $('.wrap-slider-popup').removeClass('zoomIn').addClass('animated zoomOut');
                setTimeout(function(){
                    $('.wrap-slider-popup').removeClass('animated zoomOut');
                    $('.wrap-slider-popup').hide();
				}, 600);
                $('#popup-overlay').hide();
                $('#slider-content .slick-arrow').show();
                $('body, html').removeAttr('style');
            });
            // Custom FAQ
            $('.box-faqs-item .box-faqs-title').click(function(){
                $(this).toggleClass('active');
                $(this).parent().next().slideToggle('fast');
            });
        });


        <?php if($isSmartPhone) : ?>
        $('.list-reason .item-reason').click(function(){
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            this.scrollIntoView();
        });
        <?php else: ?>
        $('.list-reason .item-reason').click(function(){
            var index = $(this).index();
            var target = $('.wrap-content-reason .content-reason').eq(index);
            target.siblings().hide();
            target.show();

            $(this).addClass('active');
            $(this).siblings().removeClass('active');
        });
        <?php endif; ?>

        <?php if(!in_array($postName, $arrNotInPreview)) : ?>
	    /* Show formal popup - start */
        var shop_id = '<?php echo $shop_id; ?>';
        $(document).on('click', '.formal-preview-popup-handle', function(){
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
        <?php endif; ?>

        // Ajax loading for Spot Column Section
        var spotColumnBox = $('#wrap_spots_shop');
        var spotColumnBoxLoaded = false;
        $(window).scroll(function () {
            if (spotColumnBox.visible() && spotColumnBoxLoaded == false) {
                spotColumnBoxLoaded = true;
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getSpotsColumn/<?=$postName?>?isSmartPhone=<?php echo $isSmartPhone ? 'true' : 'false'; ?>&layout_mode=<?=$spots_shop_mode_2?>',
                    success: function(data) {
                        if (data != null && data != "") {
                            spotColumnBox.html(data);
                            $("img").lazy();
                        }}
                });
            }
        });

        // Ajax loading for Spot Column Section
        var customerReviewBox = $('.wrap-box-review');
        var customerReviewBoxLoaded = false;
        $(window).scroll(function () {
            if (customerReviewBox.visible() && customerReviewBoxLoaded == false) {
                customerReviewBoxLoaded = true;
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getCustomerReviewShop/<?=$shop_id?>?isSmartPhone=<?php echo $isSmartPhone ? 'true' : 'false'; ?>&postName=<?=$postName?>',
                    success: function(data) {
                        if (data != null && data != "") {
                            customerReviewBox.html(data);
                            $("img").lazy();
                        }}
                });
            }
        });
        <?php
        $page_template_current = get_page_template();
        $page_template_name = basename($page_template_current, '.php');
        $count_number = ($page_template_name == 'new-access-child-page-v3-ginza' || $page_template_name == 'new-access-child-page-v3') ? 4 : 2;
?>
        // Ajax loading for Instagram Gallery Section
        var instagramGalleryBox = $('#wrap-slider-gallery-content');
        var instagramGalleryBoxLoaded = false;
        $(window).scroll(function () {
            if (instagramGalleryBox.visible() && instagramGalleryBoxLoaded == false) {
                instagramGalleryBoxLoaded = true;
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getInstagramGalleryShop/<?=$postName?>?isSmartPhone=<?php echo $isSmartPhone ? 'true' : 'false'; ?>&count_number=<?=$count_number?>',
                    success: function(data) {
                        if (data != null && data != "") {
                            instagramGalleryBox.html(data);
                            $("img").lazy();
                            //Instagram gallery slider
                            if($('.slider-gallery').length > 0){
                                $('.slider-gallery').not('.slick-initialized').slick({
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: true,
                                    lazyLoad: 'ondemand'
                                });
				}
                        }}
                });
            }
        });

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
        /* Show formal popup - end */

    </script>
<?php
$js = ob_get_contents();
$js = str_replace('<script>','',$js);
$js = str_replace('</script>','',$js);
ob_end_clean();
$cs->registerScript('kimono-page-v2',$js, CClientScript::POS_END);
?>
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
<div id="wrap-formal-preview-popup"></div>
<?php
if(!in_array($postName, $arrNotInPreview)){
/*    Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
        'id' => 'formal-preview-popup',
        'htmlOptions' => array(
            'style' => 'display: none'
        ),
        'selectedShop' => $shop_id,
));
 */
}
?>

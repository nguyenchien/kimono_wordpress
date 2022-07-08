<?php
/**
 * Template Name: New Top Page Kimono V2
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
global $post, $language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$baseUrl = Yii::app()->baseUrl;
$isLandingPage = is_page('kyotokimono-lp');
$subBannersKimonoSP = get_field('sub_banners_kimono_sp');
$subBannersKimonoPC = get_field('sub_banners_kimono_pc');
if ($isLandingPage) {
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}

wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
if(!$isLandingPage){
    wp_register_style('left-sidebar-new-kimono-v2-style', get_template_directory_uri() . '/css/left-sidebar-new-kimono-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('left-sidebar-new-kimono-v2-style');
}

if($isSmartPhone){
    //Widget shop list
    wp_enqueue_style('widget-top-shop-list-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-sp.css', array('twentytwelve-style'));
    wp_register_style('gallery-test-sp-style', get_template_directory_uri() . '/css/gallery-test-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('gallery-test-sp-style');
    wp_register_style('new-top-page-kimono-v2-sp-style', get_template_directory_uri() . '/css/new-top-page-kimono-v2-sp.css', array('twentytwelve-style'),'20210826');
    wp_enqueue_style('new-top-page-kimono-v2-sp-style');
}else{
    //Widget shop list
    wp_enqueue_style('widget-top-shop-list-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-pc.css', array('twentytwelve-style'));
    wp_register_style('gallery-test-pc-style', get_template_directory_uri() . '/css/gallery-test-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('gallery-test-pc-style');
    wp_register_style('new-top-page-kimono-v2-pc-style', get_template_directory_uri() . '/css/new-top-page-kimono-v2-pc.css', array('twentytwelve-style'),'20210826');
    wp_enqueue_style('new-top-page-kimono-v2-pc-style');
}
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');

?>
<?php
if($language != "ja"){
    if($isSmartPhone){
        wp_register_style('new-top-page-kimono-v2-sp-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-top-page-kimono-v2-sp'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('new-top-page-kimono-v2-sp-style'.$cssLanguage);
    }else{
        wp_register_style('new-top-page-kimono-v2-pc-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-top-page-kimono-v2-pc'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('new-top-page-kimono-v2-pc-style'.$cssLanguage);
    }

}
?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb') && !is_front_page()) {
        if(!$isLandingPage){
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
    }
    ?>
    <?php if($isLandingPage): ?>
		<div class="banner-top-highend-v2">
			<div class="container-box">
				<div class="slider-banner">
					<div id="sliderNewKimono" class="sliderNewKimono slider-new-highend slider-new-kimono-top">
						<ul class="list-slider-banner slides">
                            <?php // Begin: For Main Banner ?>
                            <?php if ( $isSmartPhone && get_field('main_banner_kimono_sp') ) : ?>
                                <?php echo php_set_base_url(get_field('main_banner_kimono_sp')); ?>
                            <?php endif; ?>
                            <?php if ( !$isSmartPhone && get_field('main_banner_kimono_pc') ) : ?>
                                <?php echo php_set_base_url(get_field('main_banner_kimono_pc')); ?>
                            <?php endif; ?>
                            <?php // End: For Main Banner ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<style>
			.sliderNewKimono .item-slider-banner img{
				width: 100%;
			}
			.sliderNewKimono .slick-prev:before,
			.sliderNewKimono .slick-next:before{
				content: '';
				font-size: 0;
			}
			.sliderNewKimono .slick-prev{
				left: 5px;
				z-index: 9;
			}
			.sliderNewKimono .slick-next{
				right: 5px;
				z-index: 9;
			}
			.sliderNewKimono .slick-prev:before,
			.sliderNewKimono .slick-next:before{
				width: 0;
				height: 0;
				border-top: 9px solid transparent;
				border-bottom: 9px solid transparent;
			}
			.sliderNewKimono .slick-prev:before{
				border-right: 12px solid #fff;
			}
			.sliderNewKimono .slick-next:before{
				border-left: 12px solid #fff;
			}
			.sliderNewKimono .item-slider-banner {
				display: none;
			}
			.sliderNewKimono .item-slider-banner:first-child {
				display: block;
			}
			.sliderNewKimono.slick-initialized .item-slider-banner {
				display: block;
			}
			.sliderNewKimono .slick-dotted.slick-slider{
				margin-bottom: 0;
			}
			.sliderNewKimono .slick-dots{
				bottom: 10px;
			}
			.sliderNewKimono .slick-dots{
				text-align: left;
				padding-left: 30px;
			}
			.sliderNewKimono .slick-dots li{
				margin: 0;
			}
			.sliderNewKimono .slick-dots li button:before{
				font-size: 25px;
			}
			@media (min-width: 750px){
				.sliderNewKimono .slick-prev:before,
				.sliderNewKimono .slick-next:before{
					border-top: 12px solid transparent;
					border-bottom: 12px solid transparent;
				}
				.sliderNewKimono .slick-prev:before{
					border-right: 15px solid #fff;
				}
				.sliderNewKimono .slick-next:before{
					border-left: 15px solid #fff;
				}
			}
		</style>
    <?php endif ?>
    <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php if($language == 'ja'): ?>
                                        <?php if($isLandingPage): ?>
                                            <?php if(!$isSmartPhone):?>
                                                <?php get_sidebar('top-page-left-v3') ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php get_sidebar('top-page-left-v2') ?>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <?php get_sidebar('top-page-left') ?>
                                    <?php endif ?>
                                </div>
                                <div class="right-column right-column-top-v2">
                                <div class="section-list-image row-padding">
                                    <?php
                                    $list_image = get_field('list_image');
                                    if ($list_image) {
                                        echo do_shortcode(php_set_base_url($list_image));
                                    }
                                    ?>
                                </div>
                                <div class="section-intro-top row-padding">
                                    <?php
                                    if($isSmartPhone){
                                        $intro_top_sp = get_field('intro_top_sp');
                                        if ($intro_top_sp) {
                                            echo do_shortcode(php_set_base_url($intro_top_sp));
                                        }
                                    }
                                    else{
                                        $intro_top_pc = get_field('intro_top_pc');
                                        if ($intro_top_pc) {
                                            echo do_shortcode(php_set_base_url($intro_top_pc));
                                        }
                                    }
                                    ?>
                                </div><!--end section-intro-top-->
                                <div class="section-news row-padding">
                                    <div class="title-news">News</div>
                                    <?php echo do_shortcode('[TopNewsHighEnd]'); ?>
                                </div><!--end section-news-->

								<?php
									$about_wargo = get_field('about_wargo');
								?>
								<?php if($about_wargo):?>
									<div class="section-about-wargo row-padding">
										<?php echo do_shortcode(php_set_base_url($about_wargo)); ?>
									</div><!--end section-about-wargo-->
								<?php endif?>

								<?php
									$reason_sp = get_field('reason_point_sp');
									$reason_pc = get_field('reason_point_pc');

									if($isSmartPhone){
										if ($reason_sp) {
											echo do_shortcode(php_set_base_url($reason_sp));
										}
									}
									else{
										if ($reason_pc) {
											echo do_shortcode(php_set_base_url($reason_pc));
										}
									}
								?>

								<?php if($reason_sp && $isSmartPhone):?>
									<style>
										.point-section{
											margin-bottom: 60px;
										}
										.point-section .banner-info{
											margin-bottom: 15px;
										}
										.point-section .banner-info .wrap-title{
											right: 10px;
										}
										.point-section .list-reason{
											margin-bottom: 30px;
										}
										.list-reason .item-reason{
											margin-bottom: 10px;
										}
										.list-reason .item-reason .title-item-reason{
											background-image: url(./images/new-access/bg-asakusa-prime-group-sp.png);
											background-repeat: repeat-x;
											background-size: auto;
											background-position: 0 -545px;
											padding: 15px 10px;
										}
										.list-reason .item-reason.active .title-item-reason{
											opacity: 0.8;
										}
										.item-reason .content-reason{
											display: none;
											padding: 20px 10px;
											background-color: #E6DEC8;
											position: relative;
										}
										.item-reason.active .content-reason{
											display: block;
										}
										.item-reason .reason-price{
											line-height: 1.6;
										}
										.item-reason .reason-name{
											margin-right: 10px;
											text-decoration: underline;
											font-family: "ten-mincho", serif;
											font-size: 11px;
										}
										.list-reason .title-item-reason{
											position: relative;
											display: -webkit-box;
											display: -ms-flexbox;
											display: flex;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
										}
										.list-reason .title-item-reason:after {
											position: absolute;
											content: '';
											right: 10px;
											top: 50%;
											-webkit-transform: translateY(-50%) rotate(45deg);
											-ms-transform: translateY(-50%) rotate(45deg);
											transform: translateY(-50%) rotate(45deg);
											width: 12px;
											height: 12px;
											border-right: 2px solid #000;
											border-bottom: 2px solid #000;
											cursor: pointer;
											bottom: 0;
										}
										.list-reason .active .title-item-reason:after{
											-webkit-transform: translateY(-50%) rotate(-135deg);
											-ms-transform: translateY(-50%) rotate(-135deg);
											transform: translateY(-50%) rotate(-135deg);
										}
										.item-reason .reason-desc .sm-txt{
											font-size: 13px;
											margin-bottom: 8px;
											font-weight: bold;
										}
										.item-reason .reason-desc .lg-txt{
											font-size: 24px;
											font-weight: bold;
											color: #724f20;
										}
										.content-reason .img{
											margin-bottom: 15px;
										}
										.content-reason .including-info{
											font-size: 12px;
											letter-spacing: 1px;
											line-height: 1.8;
											margin-bottom: 18px;
										}
										.content-reason .including-info p{
											line-height: 1.5;
										}
										.content-reason .list-including{
											margin-bottom: 20px;
										}
										.list-including .item-including{
											background-color: #fff;
											padding: 10px 5px;
											-webkit-box-orient: vertical;
											-webkit-box-direction: normal;
											-ms-flex-direction: column;
											flex-direction: column;
											-webkit-box-flex: 1;
											-ms-flex: 1;
											flex: 1;
										}
										.list-including .item-including.last{
											-webkit-box-flex: 2;
											-ms-flex: 2;
											flex: 2;
											border: 2px solid #A9811D;
										}
										.list-including .item-including:not(:last-child){
											margin-right: 7px;
										}
										.list-including .item-including .sub-including-name{
											font-size: 12px;
											text-align: center;
											margin-bottom: 5px;
											padding-bottom: 5px;
											font-weight: 500;
											line-height: 1.4;
											letter-spacing: 2px;
											border-bottom: 1px solid #000;
										}
										.list-including .item-including.last{
											color: #A9811D;
											position: relative;
										}
										.list-including .item-including.last .deal-tag{
											content: '';
											position: absolute;
											top: -36px;
											right: -12px;
											width: 47px;
											height: 45px;
											-webkit-transform: rotate(10deg);
											-ms-transform: rotate(10deg);
											transform: rotate(10deg);
											color: #fff;
											font-size: 12px;
											font-weight: bold;
											display: -webkit-box;
											display: -ms-flexbox;
											display: flex;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
											-webkit-box-pack: center;
											-ms-flex-pack: center;
											justify-content: center;
											background: url(./images/new-access/price-tag-asakusa.svg) no-repeat;
											background-size: 100% 100%;
										}
										.list-including .item-including.last .sub-including-name{
											border: none;
											line-height: 1;
											font-size: 9px;
											font-weight: bold;
										}
										.list-including .item-including.last .sub-including-name .lg{
											font-size: 15px;
										}
										.list-including .item-including.last .sub-including-price{
											display: flex;
											align-items: center;
											border-bottom: 2px solid #A9811D;
											position: relative;
											padding: 0 10px 10px 10px;
											margin: 0 auto 10px auto;
										}
										.list-including .item-including.last .sub-including-price:after{
											content: '';
											position: absolute;
											bottom: 2px;
											left: 0;
											width: 100%;
											height: 2px;
											background-color: #A9811D;
										}
										.list-including .item-including.last .des-sub-including{
											font-size: 10px;
											line-height: 1.5;
											text-align: center;
										}
										.list-including .item-including.last .sub-including-price .lg{
											font-size: 22px;
											font-weight: bold;
										}
										.sub-including-price .lg small{
											font-size: 12px;
										}
										.sub-including-price .icon-price {
											display: block;
											margin: 10px 0;
											font-size: 20px;
											-webkit-transform: rotate(
													90deg
											);
											-ms-transform: rotate(90deg);
											transform: rotate(
													90deg
											);
										}
										.list-including .item-including:not(.last) .sub-including-price{
											text-align: center;
										}
										.content-reason .including-bottom a {
											font-weight: bold;
											letter-spacing: 1px;
											-ms-flex-wrap: wrap;
											flex-wrap: wrap;
										}

										.content-reason .including-bottom a .txt {
											display: inline-block;
											color: #A9811D;
											margin-right: 7px;
											line-height: 1.4;
											font-size: 10px;
											font-weight: bold;
										}

										.including-bottom .arrow {
											display: inline-block;
											position: relative;
											-webkit-box-flex: 1;
											-ms-flex: 1;
											flex: 1;
										}

										.including-bottom .arrow span {
											position: absolute;
											color: #fff;
											font-weight: bold;
											font-size: 14px;
											left: 50%;
											top: 50%;
											-webkit-transform: translate(-50%,-50%);
											-ms-transform: translate(-50%,-50%);
											transform: translate(-50%,-50%);
										}
										.content-reason .title-including {
											border-bottom: 1px solid #252525;
											padding-bottom: 10px;
											margin-bottom: 15px;
											font-weight: bold;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
											line-height: 1.4;
											font-size: 14px;
										}
										.content-reason .title-including .including-name {
											font-size: 15px;
											font-weight: normal;
											color: #000;
											margin-left: -5px;
										}
										.item-reason .wrap-info-clo {
											-webkit-box-orient: vertical;
											-webkit-box-direction: normal;
											-ms-flex-direction: column;
											flex-direction: column;
										}
										.wrap-info-clo-right{
											margin: 20px 0;
										}
										.wrap-text-reason-03 .text-reason-03 {
											color: #f29544;
											font-size: 14px;
										}

										.txt-left .item-logo-confidence {
											margin: 3px 0;
											line-height: 1.2;
										}

										.wrap-text-reason-03 .txt-right .price {
											color: #f29544;
											font-size: 60px;
										}

										.detail-link {
											width: 100%;
											color: #fff;
											display: -webkit-box;
											display: -ms-flexbox;
											display: flex;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
											-webkit-box-pack: justify;
											-ms-flex-pack: justify;
											justify-content: space-between;
											margin: 0 auto 15px 0;
											font-size: 13px;
											padding: 20px 15px;
											border-radius: 36px;
											letter-spacing: 1px;
											line-height: 1;
											font-weight: bold;
											background-color: #f29544;
										}

										.detail-link span:first-child {
											-webkit-box-flex: 1;
											-ms-flex: 1;
											flex: 1;
											text-align: center;
										}
										.arrow-icon {
											height: 1px;
											width: 20px;
											background-color: #fff;
											position: relative;
											display: block;
										}
										.arrow-icon:after {
											content: "";
											position: absolute;
											background-color: #fff;
											width: 1px;
											height: 10px;
											bottom: -1px;
											right: 4px;
											-webkit-transform: rotate(
													-50deg
											);
											-ms-transform: rotate(-50deg);
											transform: rotate(
													-50deg
											);
										}
										.wrap-info-clo .wrap-link-btn {
											width: 100%;
										}
										@media (max-width: 360px){
											.including-bottom .arrow span{
												font-size: 7px;
											}
											.sub-including-price .lg small{
												font-size: 10px;
											}
											.list-including .item-including:not(.last) .sub-including-price{
												font-size: 18px;
											}
											.list-including .item-including.last .des-sub-including{
												font-size: 9px;
											}
										}
									</style>
									<script>
										$('.list-reason .item-reason').click(function(){
											$(this).addClass('active');
											$(this).siblings().removeClass('active');
											this.scrollIntoView();
										});
									</script>
								<?php endif?>
								<?php if($reason_pc && !$isSmartPhone):?>
									<style>
										.point-section{
											margin-bottom: 60px;
										}
										.point-section .list-reason{
											margin-bottom: 30px;
										}
										.list-reason .item-reason{
											margin-bottom: 15px;
										}
										.list-reason .item-reason .title-item-reason{
											background-repeat: repeat;
											background-size: auto;
											background-position: 0 -696px;
											padding: 30px;
										}
										.list-reason .item-reason.active .title-item-reason{
											opacity: 0.8;
										}
										.item-reason .content-reason{
											display: none;
											padding: 25px;
											background-color: #E6DEC8;
											position: relative;
										}
										.item-reason.active .content-reason{
											display: block;
										}
										.item-reason .reason-price{
											line-height: 1.6;
										}
										.item-reason .reason-name{
											font-family: "ten-mincho", serif;
											font-size: 30px;
											border-bottom: 1px solid #000;
											padding-bottom: 4px;
											margin-right: 40px;
										}
										.list-reason .title-item-reason{
											position: relative;
											display: -webkit-box;
											display: -ms-flexbox;
											display: flex;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
										}
										.list-reason .title-item-reason:after {
											position: absolute;
											content: '';
											right: 30px;
											top: 50%;
											-webkit-transform: translateY(-50%) rotate(45deg);
											-ms-transform: translateY(-50%) rotate(45deg);
											transform: translateY(-50%) rotate(45deg);
											width: 15px;
											height: 15px;
											border-right: 2px solid #000;
											border-bottom: 2px solid #000;
											cursor: pointer;
											bottom: 0;
										}
										.list-reason .active .title-item-reason:after{
											-webkit-transform: translateY(-50%) rotate(-135deg);
											-ms-transform: translateY(-50%) rotate(-135deg);
											transform: translateY(-50%) rotate(-135deg);
										}
										.item-reason .reason-desc .sm-txt{
											font-size: 24px;
											margin-bottom: 10px;
											font-weight: bold;
										}
										.item-reason .reason-desc .lg-txt{
											font-size: 40px;
											font-weight: bold;
											color: #724f20;
										}
										.content-reason .img{
											max-width: 580px;
										}
										.content-reason .title-including{
											border-bottom: 1px solid #252525;
											padding-bottom: 10px;
											margin-bottom: 15px;
											font-weight: bold;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
											line-height: 1.4;
										}
										.point-section.shin .content-reason .title-including {
											display: none;
										}
										.content-reason .title-including .including-name{
											font-size: 25px;
											font-weight: bold;
										}
										.content-reason .title-including .including-price{
											color: #B38B00;
											font-size: 16px;
										}
										.content-reason .including-info{
											font-size: 17px;
											font-weight: bold;
											letter-spacing: 1px;
											line-height: 1.8;
											margin-bottom: 20px;
										}
										.content-reason .including-info p{
											line-height: 1.5;
										}
										.content-reason .including-average{
											background-color: #5F3D16;
											padding: 5px 8px;
											color: #fff;
											font-size: 11px;
											margin-bottom: 18px;
											line-height: 1;
											letter-spacing: 1px;
											display: inline-block;
										}
										.content-reason .list-including{
											margin-bottom: 20px;
										}
										.list-including .item-including{
											background-color: #fff;
											padding: 35px;
											-webkit-box-orient: vertical;
											-webkit-box-direction: normal;
											-ms-flex-direction: column;
											flex-direction: column;
											-webkit-box-flex: 1;
											-ms-flex: 1;
											flex: 1;
										}
										.list-including .item-including.last{
											-webkit-box-flex: 1.7;
											-ms-flex: 1.7;
											flex: 1.7;
											border: 3px solid #A9811D;
										}
										.list-including .item-including:not(:last-child){
											margin-right: 20px;
										}
										.list-including .item-including .sub-including-name{
											font-size: 22px;
											text-align: center;
											margin-bottom: 30px;
											font-weight: 500;
											line-height: 1.4;
											letter-spacing: 2px;
											position: relative;
										}
										.list-including .item-including:not(.last) .sub-including-name:after{
											content: '';
											position: absolute;
											width: 100px;
											height: 1px;
											background-color: #000;
											bottom: -20px;
											left: 50%;
											-webkit-transform: translateX(-50%);
											-ms-transform: translateX(-50%);
											transform: translateX(-50%);
										}
										.list-including .item-including.last{
											color: #A9811D;
											position: relative;
											padding: 30px 20px;
										}
										.list-including .item-including.last .deal-tag{
											content: '';
											position: absolute;
											top: -60px;
											right: -12px;
											width: 95px;
											height: 95px;
											-webkit-transform: rotate(10deg);
											-ms-transform: rotate(10deg);
											transform: rotate(10deg);
											color: #fff;
											font-size: 22px;
											font-weight: bold;
											display: -webkit-box;
											display: -ms-flexbox;
											display: flex;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
											-webkit-box-pack: center;
											-ms-flex-pack: center;
											justify-content: center;
											background: url(./images/new-access/price-tag-asakusa.svg) no-repeat;
											background-size: 100% 100%;
										}
										.list-including .item-including.last .sub-including-name{
											line-height: 1;
											font-size: 20px;
											font-weight: bold;
											margin-bottom: 15px;
										}
										.list-including .item-including.last .sub-including-name .lg{
											font-size: 28px;
											margin-left: 2px;
										}
										.list-including .item-including.last .sub-including-price{
											display: flex;
											align-items: center;
											border-bottom: 3px solid #A9811D;
											position: relative;
											margin: 0 15px 20px 15px;
											padding: 0 15px 10px 15px;
											font-size: 25px;
										}
										.list-including .item-including.last .sub-including-price:after{
											content: '';
											position: absolute;
											bottom: -10px;
											left: 0;
											width: 100%;
											height: 3px;
											background-color: #A9811D;
										}
										.list-including .item-including.last .des-sub-including{
											font-size: 18px;
											line-height: 1.5;
											text-align: center;
											font-weight: 300;
										}
										.list-including .item-including.last .sub-including-price .lg{
											font-size: 38px;
											font-weight: bold;
										}
										.sub-including-price .lg small{
											font-size: 20px;
										}
										.wrap-rental-type .list-including .item-including .sub-including-name{
											margin-bottom: 0;
										}
										.wrap-rental-type .list-including .item-including{
											padding: 18px 10px;
											margin-bottom: 10px;
										}
										.list-including .item-including .line-including{
											position: relative;
											width: 80px;
											margin: 5px 0 10px;
										}
										.list-including .item-including .line-including:after,
										.list-including .item-including .line-including:before{
											border-bottom: 1px solid #8f8f8f;
											position: absolute;
											content: "";
											width: 70%;
										}
										.list-including .item-including .line-including:before{
											bottom: 0;
										}
										.list-including .item-including .line-including:after{
											bottom: -3px;
										}
										.list-including .item-including:not(.last) .sub-including-price{
											font-size: 38px;
											display: -webkit-box;
											display: -ms-flexbox;
											display: flex;
											-webkit-box-orient: vertical;
											-webkit-box-direction: normal;
											-ms-flex-direction: column;
											flex-direction: column;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
										}
										.sub-including-price .icon-price{
											margin: 10px 0;
											font-size: 35px;
											-webkit-transform: rotate(90deg);
											-ms-transform: rotate(90deg);
											transform: rotate(90deg);
										}
										.list-including .item-including .sub-including-price var{
											font-size: 40px;
											font-weight: bold;
											margin-left: auto;
										}
										.content-reason .including-bottom a{
											font-weight: bold;
											letter-spacing: 1px;
											-webkit-box-pack: justify;
											-ms-flex-pack: justify;
											justify-content: space-between;
										}
										.content-reason .including-bottom a .txt{
											display: inline-block;
											color: #A9811D;
											line-height: 1.4;
											font-size: 20px;
											font-weight: 500;
										}
										.including-bottom .arrow{
											display: inline-block;
											position: relative;
											width: 120px;
										}
										.including-bottom .arrow span{
											position: absolute;
											color: #fff;
											font-weight: bold;
											font-size: 22px;
											left: 20%;
											top: 50%;
											-webkit-transform: translate(0,-50%);
											-ms-transform: translate(0,-50%);
											transform: translate(0,-50%);
										}
										.arrow-icon {
											height: 1px;
											width: 30px;
											background-color: #fff;
											position: relative;
											display: block;
										}
										.arrow-icon:after {
											content: "";
											position: absolute;
											background-color: #fff;
											width: 1px;
											height: 10px;
											bottom: -1px;
											right: 4px;
											-webkit-transform: rotate(-50deg);
											-ms-transform: rotate(-50deg);
											transform: rotate(-50deg);
										}
										.item-reason .wrap-info-clo{
											-ms-flex-wrap: wrap;
											flex-wrap: wrap;
										}
										.wrap-info-clo .wrap-info-clo-left{
											width: 35%;
											margin-right: 20px;
										}
										.wrap-info-clo .wrap-info-clo-right{
											-webkit-box-flex: 1;
											-ms-flex: 1;
											flex: 1;
											text-align: center;
										}
										.wrap-info-clo-right img{
											width: 80%;
										}
										.wrap-info-clo-left .wrap-text-reason-03{
											-webkit-box-orient: vertical;
											-webkit-box-direction: normal;
											-ms-flex-direction: column;
											flex-direction: column;
										}
										.wrap-text-reason-03 .text-reason-03{
											color: #f29544;
											font-size: 15px;
										}
										.txt-left .item-logo-confidence{
											margin: 5px 0;
											width: 50%;
										}
										.wrap-text-reason-03 .txt-right{
											text-align: right;
										}
										.wrap-text-reason-03 .txt-right .price{
											color: #f29544;
											font-size: 100px;
											font-weight: bold;
											position: relative;
											top: -65px;
											left: 60px;
										}
										.wrap-text-reason-03 .txt-right .price var{
											font-size: 70px;
										}
										.detail-link span:first-child {
											text-align: center;
											margin-bottom: 10px;
										}
										.wrap-info-clo .wrap-link-btn {
											margin-top: -70px;
											display: block;
										}
										.wrap-link-btn .detail-link{
											width: 160px;
											height: 160px;
											background-color: #f29544;
											border-radius: 50%;
											display: -webkit-box;
											display: -ms-flexbox;
											display: flex;
											-webkit-box-pack: center;
											-ms-flex-pack: center;
											justify-content: center;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
											-webkit-box-orient: vertical;
											-webkit-box-direction: normal;
											-ms-flex-direction: column;
											flex-direction: column;
											padding: 10px;
											font-weight: bold;
											color: #fff;
											font-size: 16px;
											line-height: 1.3;
											letter-spacing: 1px;
										}
										.wrap-main-btn .main-btn {
											max-width: 520px;
											background-color: #b40000;
											border-color: #b40000;
											color: #fff;
											font-weight: bold;
											font-size: 18px;
											position: relative;
											display: -webkit-box;
											display: -ms-flexbox;
											display: flex;
											-webkit-box-align: center;
											-ms-flex-align: center;
											align-items: center;
											-webkit-box-pack: center;
											-ms-flex-pack: center;
											justify-content: center;
											padding: 10px 15px 10px 0;
											width: 100%;
											letter-spacing: 1px;
											border-style: solid;
											border-width: 1px;
											height: 65px;
										}
									</style>
									<script>
										$('.list-reason .item-reason').click(function(){
											var index = $(this).index();
											var target = $('.wrap-content-reason .content-reason').eq(index);
											target.siblings().hide();
											target.show();

											$(this).addClass('active');
											$(this).siblings().removeClass('active');
										});
									</script>
								<?php endif?>

                                <div class="section-plan-group kimono-plan-group row-padding">
                                    <?php
                                    if($isSmartPhone){
                                        $plan_group_kimono_sp = get_field('plan_group_kimono_sp');
                                        if ($plan_group_kimono_sp) {
                                            echo do_shortcode(php_set_base_url($plan_group_kimono_sp));
                                        }
                                    }
                                    else{
                                        $plan_group_kimono_pc = get_field('plan_group_kimono_pc');
                                        if ($plan_group_kimono_pc) {
                                            echo do_shortcode(php_set_base_url($plan_group_kimono_pc));
                                        }
                                    }
                                    ?>
                                </div><!--end section-plan-group yukata-plan-group-->

                                <div class="section-plan-group yukata-plan-group row-padding">
                                    <?php
                                    if($isSmartPhone){
                                        $plan_group_yukata_sp = get_field('plan_group_yukata_sp');
                                        if ($plan_group_yukata_sp) {
                                            echo do_shortcode(php_set_base_url($plan_group_yukata_sp));
                                        }
                                    }
                                    else{
                                        $plan_group_yukata_pc = get_field('plan_group_yukata_pc');
                                        if ($plan_group_yukata_pc) {
                                            echo do_shortcode(php_set_base_url($plan_group_yukata_pc));
                                        }
                                    }
                                    ?>
                                </div><!--end section-plan-group yukata-plan-group-->

                                <div class="section-banner-general section-options row-padding">
                                    <?php
                                    $banner_general = get_field('banner_general');
                                    if ($banner_general) {
                                        echo do_shortcode(php_set_base_url($banner_general));
                                    }
                                    ?>
                                </div><!--end section-banner-general section-options-->

                                <div class="section-shop-list row-padding">
                                    <?php
                                        $shop_list = get_field('shop_list');
                                            if ($shop_list) {
                                            echo do_shortcode(php_set_base_url($shop_list));
                                        }
                                    ?>
                                </div><!--end section-shop-list-->

                                <div class="section-photo-instagram row-padding">
                                    <?php
                                        $photo_instagram = get_field('photo_instagram');
                                            if ($shop_list) {
                                             echo do_shortcode(php_set_base_url($photo_instagram));
                                    }
                                    ?>
                                </div><!--end section-photo-instagram-->

                                    <div class="section-column-spot row-padding">
                                        <div class="wrap-column-post wrap-column-post-top-page">
                                            <div class="title">
                                                <?php if($isSmartPhone) : ?>
                                                    <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/title-spot-top<?php echo ($language == 'ja') ? "" : "-$language"?>.svg" alt="">
                                                    <h2 class="column-title"><?php echo Yii::t('new-top-page-v2', '着物レンタルwargoの<br/>京都おすすめコラムをご紹介！'); ?></h2>
                                                <?php else: ?>
                                                    <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/title-spot-top<?php echo ($language == 'ja') ? "" : "-$language"?>.svg" alt="">
                                                    <h2 class="column-title"><?php echo Yii::t('new-top-page-v2', '着物レンタルwargoの京都おすすめコラムをご紹介！'); ?></h2>
                                                <?php endif; ?>
                                            </div>
                                            <?php
                                            echo do_shortcode('[kimono_recommend_spot_v2]');
                                            ?>
                                        </div>
                                    </div><!--end section-column-spot-->

                                    <div class="section-sight-spot-ranking row-padding">
                                    <?php
                                    $sight_spot_ranking = get_field('sight_spot_ranking');
                                    if ($sight_spot_ranking) {
                                        echo do_shortcode(php_set_base_url($sight_spot_ranking));
                                    }
                                    ?>
                                </div><!--end section-sight-spot-ranking-->

                                <!-- QA Question -->

                                    <?php
                                    $qa_question = get_field('qa_question');
                                    if ($qa_question) {
                                        echo do_shortcode($qa_question);
                                    }
                                    ?>

                                <div class="section-column-spot row-padding">
                                        <div class="wrap-column-post wrap-column-post-top-page">
                                            <div class="title-column-top">
                                                <div class="wrap-main-title flexbox">
                                                    <div class="image image-left"><img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/title-column-top-left.svg" alt=""></div>
                                                    <h2 class="title-main"><?php echo Yii::t('new-top-page-v2', '着物の豆知識'); ?></h2>
                                                    <div class="image image-right"><img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/title-column-top-right.svg" alt=""></div>
                                                </div>
                                                <p class="sub-title"><?php echo Yii::t('new-top-page-v2', '〜正しく美しく着るために〜'); ?></p>
                                            </div>
                                            <?php
                                            echo do_shortcode('[kimono_column_v2]');
                                            ?>
                                        </div>
                                    </div><!--end section-column-spot-->

                                <div class="section-banner-general section-topics row-padding">
                                    <?php
                                            $topics = get_field('topics');
                                            if ($topics) {
                                         echo do_shortcode(php_set_base_url($topics));
                                            }
                                            ?>
                                </div><!--end section-banner-general section-topics-->

                                <div class="section-intro-bottom row-padding">
                                    <?php
                                        $intro_bottom = get_field('intro_bottom');
                                    if ($intro_bottom) {
                                    echo do_shortcode(php_set_base_url($intro_bottom));
                                        }
                                        ?>
                                </div><!--end section-intro-bottom-->

                                                                    <?php
                                                                    while (have_posts()) : the_post();
                                                                        the_content();
                                                                    endwhile;
                                                                    ?>
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
<?php
$cs=Yii::app()->getClientScript();
ob_start();
?>
<script>
    $(document).ready(function(){
        //Slider list img
        if(isSmartPhone()){
            $('.section-list-image .list-img').slick({
                infinite: false,
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true,
                arrows: false
            });
        }
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
        //Show more plan
        $('.plan-img').click(function(){
            var detail = $(this).next();
            detail.addClass('open');
        });

        $('.show-less').click(function(){
            $(this).closest('.plan-info').removeClass('open');
        });

        /* Begin: faqs */
        <?php if($isSmartPhone):?>
        $(".box-faqs-item").find(".icon-fa").addClass('icon-fa-collapsed-down-faqs').removeClass('icon-fa-collapsed-top-faqs');
        <?php endif?>
        $(".box-faqs-item").click(function(){
            $(this).find(".icon-fa").toggleClass("icon-fa-collapsed-down-faqs icon-fa-collapsed-top-faqs")
            $(this).siblings(".box-faqs-item-content").slideToggle();
        });
        /* End: faqs */

        <?php if ($isLandingPage ) : ?>
			// Add slider after 5s
			var subBannersKimonoSP = '<?php echo $subBannersKimonoSP; ?>';
			var subBannersKimonoPC = '<?php echo $subBannersKimonoPC; ?>';
			var slider = $('.sliderNewKimono .slides');

			setTimeout(function() {
				<?php if ($isSmartPhone) { ?>
				if ( subBannersKimonoSP ) {
					var els = $(subBannersKimonoSP);
					$.each(els, function () {
						slider.append($(this));
					});
				}
				<?php } else { ?>
				if ( subBannersKimonoPC ) {
					var els = $(subBannersKimonoPC);
					$.each(els, function () {
						slider.append($(this));
					});
				}
				<?php } ?>
				slider.slick({
					dots: true,
					arrows: true,
					responsive:[
						{
							breakpoint: 750,
							settings: {
								dots: false
							}
						}
					]
				});
			}, 2000);
		<?php endif ?>
    })

</script>


<?php
$js = ob_get_contents();
$js = str_replace('<script>','',$js);
$js = str_replace('</script>','',$js);
ob_end_clean();
$cs->registerScript('kimono-page-v2',$js, CClientScript::POS_END);
?>




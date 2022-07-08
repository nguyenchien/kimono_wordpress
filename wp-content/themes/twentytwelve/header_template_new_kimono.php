<?php
/**
 * Header template
 * Author: Loi Dang
 * Date: 10/5/2015
 * Time: 4:58 PM
 */
//wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
//wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
//wp_enqueue_style('new-formal-rental-style-flexslider');
//wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
//wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
//wp_enqueue_style('new-formal-rental-style-slick');
//wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
//wp_enqueue_style('new-formal-rental-style-slick-theme');
//wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'), '201803181649');
//wp_enqueue_style('new-formal-rental-style');

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
global $isSmartPhone, $language,$is_yukata, $post;
$lang = Yii::app()->language;
$isFrontPage = is_front_page();
$isTopPageYukata = is_page('yukata');
$isLandingPage = is_page('kyotokimono-lp');
$subBannersKimonoSP = get_field('sub_banners_kimono_sp');
$subBannersKimonoPC = get_field('sub_banners_kimono_pc');
?>
<?php if($isSmartPhone):?>
    <div class="wrap-overlay">
        <div class="wrap-relative-toggle">
            <?php $pathUrl = WP_HOME .((Yii::app()->language != 'ja')? '/'.Yii::app()->language:''); ?>
            <?php if($language == 'ja'): ?>
				<div class="wrap-toggle-left-sidebar"></div>
				<div class="close-sidebar sp"><span class="closed"></span></div>
			<?php else: ?>
				<div class="wrap-toggle-left-sidebar">
                    <?php if($language != 'ja'): ?>
                        <?php echo do_shortcode('[HowtoSidebarLeft sp="true"]'); ?>
                        <?php echo do_shortcode('[TopicsBannerSidebarLeft]'); ?>
                        <?php echo do_shortcode('[SightSeeingSidebarLeft]'); ?>
                        <?php echo do_shortcode('[CeremonialSidebarLeft]'); ?>
                        <?php echo do_shortcode('[ShopListNewKimono]'); ?>
                        <?php echo do_shortcode('[PopularOptionsSidebarLeft]'); ?>
                    <?php endif ?>
				</div>
				<style>
					.close-sidebar{
						top: 10px !important;
						right: -40px !important;
						z-index: 99;
						left: inherit !important;
						display: none !important;
					}
					.overlay-toggle .close-sidebar{
						display: block !important;
					}
				</style>
				<div class="close-sidebar"><span class="closed">&times;</span></div>
            <?php endif ?>
        </div>
    </div>
<?php endif?>
<style type="text/css">
    .wrap-ad-campaign{
        background-color: #a82127;
    }
    .wrap-ad-campaign img{
        position: relative;
        z-index: 9;
    }
    .breadcrumbs-kimono {
        padding-top: 4px;
        margin-bottom: 1px;
        overflow: hidden;
    }
</style>
<div class="header-highend-v2">
    <div class="num-height">
        <div class="top-header">
            <div class="container-box">
                <div class="box-header flexbox">
                    <?php if(!$isSmartPhone):?>
                        <div class="wrap-logo pc">
                            <?php if($isFrontPage || $isLandingPage): ?>
                                <div class="logo-formal">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo Yii::t('wp_theme', '京都着物レンタルwargo');?>" rel="home">
                                        <img src="<?php echo WP_HOME; ?>/images/new-kimono/logo-pc.svg" alt="<?php echo Yii::t('wp_theme', '京都着物レンタルwargo');?>" />
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="logo-formal">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo Yii::t('wp_theme', '京都着物レンタルwargo');?>" rel="home">
                                        <img src="<?php echo WP_HOME; ?>/images/new-kimono/logo-pc.svg" alt="<?php echo Yii::t('wp_theme', '京都着物レンタルwargo');?>" />
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div><!--end wrap-logo-->
                    <?php endif?>
                    <div class="wrap-top-header">
                        <div class="wrap-info flexbox">

                            <div class="wrap-congress-store">
                                <div class="top-text-cg-store"><?php echo Yii::t('new_header_highend', '日本最大級!'); ?></div>
                                <div class="number-store flexbox"><?php echo Yii::t('new_header_highend', '<p class="flexbox nation"><span>全</span><span>国</span></p><p class="num">13<var>店舗</var></p>'); ?></div>
                            </div><!--end wrap-congress-store-->

                            <div class="visitor flexbox align-items-center">
                                <div class="left-vst flexbox">
                                    <span class="year-vst"><?php echo Yii::t('new_header_highend', '2017年レンタル実績'); ?></span>
                                    <div class="box-vst flexbox align-items-center">
                                        <span class="icon-crown"><img src="<?php echo WP_HOME; ?>/images/new-kimono-v2/icon-crown-new.svg" alt="" /></span>
                                        <span class="text-vst"><?php echo Yii::t('new_header_highend', '祝'); ?></span>
                                        <span class="num-vst"><?php echo Yii::t('new_header_highend', '150,162'); ?><var><?php echo Yii::t('new_header_highend', '人!!'); ?></var></span>
                                    </div>
                                </div>
                            </div><!--end visitor-->

                        <div class="option-check flexbox align-items-center justify-content-center pc md-sp">
                            <ul class="list-opt-check flexbox">
                                <li class="item-opt-check flexbox align-items-center">
                                    <span class="icon icon-formal-checked-1"></span>
                                    <span class="text-opt-check"><?php echo Yii::t('new_header_highend', '手ぶらでOK!!'); ?></span>
                                </li>
                                <li class="item-opt-check flexbox align-items-center">
                                    <span class="icon icon-formal-checked-1"></span>
                                    <span class="text-opt-check"><?php echo Yii::t('new_header_highend', '着付け無料!!'); ?></span>
                                </li>
                            </ul>
                        </div><!--end option check-->
                        <div class="xs-hidden">&nbsp;</div>
                    </div><!--end wrap-info-->
                </div><!--end wrap-top-header-->
            </div>
        </div>
    </div><!--end top-header-->
    <div class="bottom-header">
        <div class="container-box">
            <div class="box-bt-header flexbox">
                        <div class="wrap-lang-social flexbox pc">
                            <div class="wrap-social flexbox">
                                <?php if($language == 'ja'): ?>
                                    <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-twitter.svg" alt="" /></a></span>
                                    <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-facebook.svg" alt="" /></a></span>
                                <?php else: ?>
                                    <?php if($language == 'th'): ?>
                                        <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorentalth/"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-facebook.svg" alt="" /></a></span>
                                    <?php else: ?>
		                                <span class="social twitter"><a target="_blank" href="https://twitter.com/kimono_wargo/"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-twitter.svg" alt="" /></a></span>
                                        <span class="social facebook"><a target="_blank" href="https://www.facebook.com/KyotoKimonoRentalWargo/"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-facebook.svg" alt="" /></a></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-instagram.svg" alt="" /></a></span>
                            </div><!--end wrap social-->
                        </div><!--end wrap-lang-social-->
                        <div class="wrap-languages">
                            <div class="text-lang"><?php echo Yii::t('new_header_highend', 'Languages'); ?></div>
                            <div class="dropdown-lang flexbox align-items-center justify-content-between">
                                <span class="icon icon-formal-globe"></span>
                                <span class="unit-lang"><?php echo Yii::t('new_header_highend', 'JP'); ?></span>
                                <span class="arrow-down-lang"></span>
                            </div>
                            <div class="wrap-list-lang">
                                {{language_item_menu}}
                            </div>
                        </div><!--end wrap languages-->
                        <?php if($isSmartPhone):?>
							<div class="wrap-logo flexbox">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                    <img src="<?php echo WP_HOME; ?>/images/new-kimono/logo-sp.svg" alt="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                                </a>
	                            <?php $isAreaPage = is_page_template('page-templates/new-top-page-kimono.php') && !($isFrontPage || $isTopPageYukata) ? true : false; ?>

							</div><!--end wrap-logo-->
                        <?php else: ?>
							<div class="wrap-logo flexbox">
                                <?php if($is_yukata):?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                            <img src="<?php echo WP_HOME; ?>/images/new-kimono/logo-other-yukata.svg" alt="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                                        </a>
                                    <?php else:?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                            <img src="<?php echo WP_HOME; ?>/images/new-kimono/logo-other.svg" alt="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                                        </a>
                                <?php endif;?>
	                            <?php $isAreaPage = is_page_template('page-templates/new-top-page-kimono.php') && !($isFrontPage || $isTopPageYukata) ? true : false; ?>
							</div><!--end wrap-logo-->
                        <?php endif; ?>
                <?php if ($isSmartPhone): ?>
                    <style>
                        .wrap-icon-toggle p{
                            width: 35px;
                            height: 3px;
                            background-color: #fff;
                            margin: 6px 0;
                        }
                    </style>
                    <div class="wrap-toggle-menu flexbox align-items-center justify-content-center sp">
                        <div class="wrap-icon-toggle">
                            <p></p>
                            <p></p>
                            <p></p>
                        </div>
                        <p class="text-menu"><?php echo Yii::t('new_header_highend', 'Menu'); ?></p>
                    </div><!--end wrap-toggle-menu-->
                <?php endif; ?>
                    <div class="wrap-box-common pc register-btn" style="display: none;">
                        <a href="<?php echo WP_HOME ?>/common/register" class="flexbox box-common align-items-center">
                            <span class="icon-common icon-formal-cm-add flexbox"></span>
                            <span class="name"><?php echo Yii::t('new_header_highend', '新規会員登録') ?></span>
                        </a>
                    </div><!--end wrap-favorite-->
                    <div class="wrap-box-common pc login-btn" style="display: none;">
                        <a href="<?php echo WP_HOME ?>/common/login" class="flexbox box-common align-items-center">
                            <span class="icon-common icon-formal-cm-login flexbox"></span>
                            <span class="name"><?php echo Yii::t('new_header_highend', 'ログイン') ?></span>
                        </a>
                    </div>
                    <div class="wrap-box-common pc common-btn" style="display: none;">
                        <a href="<?php echo WP_HOME ?>/common" class="flexbox box-common align-items-center">
                            <span class="icon-common icon-formal-mypage flexbox"></span>
                            <span class="name"><?php echo Yii::t('new_header_highend', 'マイページ') ?></span>
                        </a>
                    </div><!--end wrap-favorite-->
                    <div class="wrap-box-common pc logout-btn" style="display: none;">
						<a href="<?php echo WP_HOME ?>/common/do#/logout" class="flexbox box-common align-items-center">
							<span class="icon-common icon-formal-logout flexbox"></span>
							<span class="name"><?php echo Yii::t('new_header_highend', 'ログアウト') ?></span>
						</a>
                    </div>
                </div>
            </div>
        </div><!--end bottom-header-->
    </div>
    <div class="wraper-menu-banner flexbox">
        <?php
        if($is_yukata && $post->post_name == 'yukata' && !strpos($url, 'lesson')){?>
            <div class="banner-top-highend-v2">
                <div class="container-box">
                    <?php
                    if (is_page('yukata') && function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
                        echo "<div class='container-box wrap-title-top-kimono'><h1 class='title-top-kimono'>". Yii::t('wp-theme','格安浴衣レンタルならwargo｜フルセット2,900円!京都・浅草等全国19店舗!')."</h1></div>";
                    }?>
                    <div class="slider-banner <?= $is_yukata ? 'slider-banner-yukata' : ''; ?>">
                        <div id="sliderNewKimono" class="sliderNewKimono slider-new-highend slider-new-kimono-top">
                            <ul class="list-slider-banner slides">
                                <li class="item-slider-banner">
                                    <a href="<?php echo home_url(); ?>/yukata/plan">
                                        <?php if($language == 'ja'): ?>
                                            <?php if($isSmartPhone) : ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-toppage-yukata-sp.png" alt="<?php echo Yii::t('new-kimono-header', '京都で浴衣レンタルなら、京都きものレンタルwargo')?>"/>
                                            <?php else: ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-toppage-yukata-pc.png" alt="<?php echo Yii::t('new-kimono-header', '京都で浴衣レンタルなら、京都きものレンタルwargo')?>"/>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($isSmartPhone) : ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-toppage-yukata-sp-<?= $language; ?>.png" alt=""/>
                                            <?php else: ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-toppage-yukata-pc-<?= $language; ?>.png" alt=""/>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li class="item-slider-banner">
                                    <a href="<?php echo home_url(); ?>/yukata-girl-contest">
                                        <?php if($language == 'ja'): ?>
                                            <?php if($isSmartPhone) : ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-y-girl-contest-sp.png" alt="Yukata Girl Contest | 京都着物レンタルwargo"/>
                                            <?php else: ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-y-girl-contest-pc.png" alt="Yukata Girl Contest | 京都着物レンタルwargo"/>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($isSmartPhone) : ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-y-girl-contest-sp-<?= $language; ?>.png" alt=""/>
                                            <?php else: ?>
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-y-girl-contest-pc-<?= $language; ?>.png" alt=""/>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--end banner-top-highend-v2-->
        <?php }
        ?>
        <?php if($isFrontPage || $isLandingPage):?>
            <?php
            if ($isSmartPhone) {
                $title_top_sp = get_field('title_top_sp');
                if ($title_top_sp) {
                    echo do_shortcode(php_set_base_url($title_top_sp));
                }
            } else {
                $title_top_pc = get_field('title_top_pc');
                if ($title_top_pc) {
                    echo do_shortcode(php_set_base_url($title_top_pc));
                }
            }
            ?>
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

                                <?php // Begin: For Sub Banners ?>
                                <?php //if ( $isSmartPhone && get_field('sub_banners_kimono_sp') ) : ?>
                                <?php //echo php_set_base_url(get_field('sub_banners_kimono_sp')); ?>
                                <?php //endif; ?>
                                <?php //if ( !$isSmartPhone && get_field('sub_banners_kimono_pc') ) : ?>
                                <?php //echo php_set_base_url(get_field('sub_banners_kimono_pc')); ?>
                                <?php //endif; ?>
                                <?php // End: For Sub Banners ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--end banner-top-highend-v2-->
        <?php endif; ?>
        <?php if($is_yukata && $post->post_name == 'yukata' || $isFrontPage || $isLandingPage) : ?>
            <style>
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
        <?php endif; ?>

        <?php
        //Banner for area
        $slider_banner =  php_set_base_url(get_field('slider_banner'));
        $page_template_current = get_page_template();
        $page_template_name = basename($page_template_current, '.php');
        ?>
        <?php if( !empty($slider_banner) && $page_template_name != 'new-access-child-page') : ?>
            <div class="banner-top-highend-v2 area">
                <div class="container-box"><?php echo htmlspecialchars_decode($slider_banner); ?></div>
            </div>
        <?php endif; ?>
        <?php if(!$isSmartPhone ||  ($isSmartPhone && $isFrontPage || $isLandingPage)) : ?>

            <div class="wrap-header-menu-formal">
                <div class="container-box">
                    <?php
                    if($is_yukata){
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu'=>'MenuNewYukata',
                            'menu_class' => 'list-menu-formal list-menu-new-kimono flexbox',
                            'container_id' => 'ListMenuNewYukata',
                        ));
                    }else{
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu'=>'MenuNewKimono',
                            'menu_class' => 'list-menu-formal list-menu-new-kimono flexbox',
                            'container_id' => 'ListMenuNewKimono',
                        ));
                    }
                    ?>
                </div>
            </div>
        <?php endif ?>

    </div><!--end wraper-menu-banner flexbox-->
</div><!--end header-highend-v2-->

<script type="text/javascript">
    $(document).ready(function () {
        $(document).click(function(e) {
            if(!$(e.target).closest('.dropdown-lang').length) {
                $('.wrap-list-lang').slideUp();
            }
        });
        /* Begin: dropdown-lang */
        $(".dropdown-lang").click(function () {
            $(".wrap-list-lang").slideToggle();
        });
        $(".unit-lang").text("<?php echo $language; ?>");
        /* End: dropdown-lang */

        /* Begin: Fixed header */
        var numHeader = $(".top-header").outerHeight();
        $(window).on("scroll", function(){

            if(isSmartPhone()){
                if($(this).scrollTop() > numHeader){
                    $(".bottom-header").addClass("fixed-header");
                    //$(".wrap-top-header").hide();
                    $(".wrap-languages").hide();
                }else{
                    $(".bottom-header").removeClass("fixed-header");
                    //$(".wrap-top-header").show();
                    $(".wrap-languages").show();
                }
            } else{
                if($(this).scrollTop() > numHeader){
                    $(".bottom-header").addClass("fixed-header");
                    $(".wrap-header-menu-formal").addClass("fixed-menu");
                }else{
                    $(".bottom-header").removeClass("fixed-header");
                    $(".wrap-header-menu-formal").removeClass("fixed-menu");
                }
            }

        });
        /* End: fixed header */

        <?php if ($isSmartPhone) : ?>
            $(".list-menu-formal .item-menu-formal a").on('click', function(){
                $(this).parent().toggleClass('menu-active')
            });

            /* Begin: toggle left sidebar */
            //var numHeight = $(".num-height").outerHeight();
            var numHeight = 100;
            var langT = (curLang == "ja") ? '' : '/' + curLang;
            var wrapToggleLeftSidebar = $(".wrap-toggle-left-sidebar");
            $(".wrap-toggle-menu").click(function(){
                if (curLang == 'ja') {
                    if (wrapToggleLeftSidebar.is(':empty')) {
                        // Call ajax show content sidebar left for SmartPhone
                        jQuery.ajax({
                            type: 'GET',
                            url: '/api/booking/getSidebarKimonoTop',
                            success: function(data) {
                                if (data != null && data != "") {
                                    wrapToggleLeftSidebar.html(data);
                                    $('.wrap-toggle-left-sidebar img').lazy({
                                        appendScroll: $(".wrap-toggle-left-sidebar")
                                    });

                                    wrapToggleLeftSidebar.addClass("active").css("top", + numHeight);
                                    $("body, .wrap-overlay").addClass("fixed-scroll overlay-toggle");
                                    $(".closed").addClass("icon-formal-menu-toggle-close");
                                }
                            }
                        });
                    } else {
                        wrapToggleLeftSidebar.addClass("active").css("top", + numHeight);
                        $("body, .wrap-overlay").addClass("fixed-scroll overlay-toggle");
                        $(".closed").addClass("show");
                    }
				} else {
                    $("body, .wrap-overlay").addClass("fixed-scroll overlay-toggle");
                    setTimeout(function() {
                        wrapToggleLeftSidebar.addClass("active");
					}, 100);
				}
            });
            $('.wrap-overlay').click(function(e){
                if($(e.target).hasClass('closed') || $(e.target).closest('.wrap-toggle-menu, .wrap-toggle-left-sidebar').length !== 1){
                    $(".wrap-toggle-left-sidebar").removeClass("active");
                    setTimeout(function() {
                        $("body, .wrap-overlay, .closed").removeClass("fixed-scroll overlay-toggle show");
                    }, 250);
                }
            });
            /* End: toggle left sidebar */
        <?php endif; ?>

        <?php if ($isFrontPage ||$isLandingPage ) : ?>
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

    });
</script>

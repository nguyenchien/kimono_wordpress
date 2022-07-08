<?php
$isFrontPage = is_front_page();
$isLandingPage = is_page('kyotokimono-lp');
$pathUrl = WP_HOME .((Yii::app()->language != 'ja')? '/'.Yii::app()->language:'');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$class = $isSmartPhone ? 'sp' : 'pc';
?>
<link rel="preload" href="<?=get_template_directory_uri() . '/css/sidebar-left-v3-'.$class.'.css'?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?=get_template_directory_uri() . '/css/sidebar-left-v3-'.$class.'.css'?>"></noscript>
<?php echo do_shortcode('[HowtoSidebarLeft sp="true"]');?>
<!-- Begin: Sidebar Left for SP -->
<div class="wrap-menu-common sp">
    <ul class="list-mene-common flexbox">
        <li class="item register-btn">
            <a href="<?php echo $pathUrl ?>/common/register" class="flexbox align-items-center">
                <span class="icon-common icon-formal-cm-add flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', '新規会員登録') ?></span>
            </a>
        </li>
        <li class="item login-btn">
            <a href="<?php echo $pathUrl ?>/common/login" class="flexbox align-items-center">
                <span class="icon-common icon-formal-cm-login flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'ログイン') ?></span>
            </a>
        </li>
        <li class="item common-btn">
            <a href="<?php echo $pathUrl ?>/common" class="flexbox align-items-center">
                <span class="icon-common icon-formal-mypage flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'マイページ') ?></span>
            </a>
        </li>
        <li class="item logout-btn">
            <a href="<?php echo $pathUrl ?>/common/do#/logout" class="flexbox align-items-center">
                <span class="icon-common icon-formal-logout flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'ログアウト') ?></span>
            </a>
        </li>
        <li class="item">
            <a href="<?php echo $pathUrl ?>/newBooking/cart" class="flexbox align-items-center">
                <span class="icon-common icon-shopping-cart icon-formal-shopping-cart-2 flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'カート') ?></span>
                <span class="add-num-cart flexbox align-items-center justify-content-center">0</span>
            </a>
        </li>
        <li class="item">
            <a href="#" class="flexbox align-items-center">
                <span class="icon-common icon-formal-heart-3 flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'お気に入り') ?></span>
                <span class="add-num-cart flexbox align-items-center justify-content-center">0</span>
            </a>
        </li>
    </ul>
</div>
<?php echo do_shortcode('[SightSeeingSidebarLeft]');?>
<?php echo do_shortcode('[CeremonialSidebarLeft]');?>
<?php echo do_shortcode('[ShopListNewKimono]');?>
<?php if ($isFrontPage || $isLandingPage) : ?>
    <div class="wrap-category wrap-new-kimono-sidebar-left scene">
        <div class="title-general text-center title-general-new-style kimono" data-collapse-cate=".collapse-cate">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general">シーン</span>
                <span class="sub-text-title sub-text-title-new">で探す</span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="/kimono"><span class="text-category">観光・お散歩</span></a><span class="arrow"></span></div>
                </li>
                <li id="party" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/party"><span class="text-category">パーティー</span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="wedding" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/wedding"><span class="text-category">結婚式</span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="sotsugyoushiki" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/sotsugyoushiki"><span class="text-category">卒業式</span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="seijinshiki" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/seijinshiki"><span class="text-category">成人式</span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="shichigosan" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/shichigosan"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '七五三'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="/formal/nyugakushiki"><span class="text-category">入学式</span></a><span class="arrow"></span></div>
                </li>
                <li id="omiyamairi" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/omiyamairi"><span class="text-category">お宮参り</span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="wrap-category wrap-new-kimono-sidebar-left preview" >
        <?php defined('ENABLE_FORMAL_PREVIEW_POPUP') or define('ENABLE_FORMAL_PREVIEW_POPUP', true);?>
        <div class="title-general text-center title-general-new-style kimono-blur" data-collapse-cate=".collapse-cate">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general">下見</span>
                <span class="sub-text-title sub-text-title-new">で探す</span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center box-category-preview"><a href="<?=WP_HOME?>/formal/preview"><span class="text-category">お下見ガイド・ご予約</span></a><span class="arrow"></span></div>
                </li>
            </ul>
        </div>
    </div>
    <?php echo do_shortcode('[WidgetSearchFormalForTopPage]'); ?>
    <div class="wrap-topics-banner-widget wrap-topics-banner-kimono-widget">
        <div class="wrap-list-banner">
            <ul class="list-banner flexbox ">
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="<?= home_url(); ?>/recruitment"><img data-src="<?= WP_HOME; ?>/images/new-kimono/banner-recruitment-sidebar-left.jpg" alt="京都きものレンタルwargo求人情報"></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<?php else: ?>
    <?php echo do_shortcode('[PopularOptionsSidebarLeft]');?>
<?php endif; ?>
<!-- End: Sidebar Left for SP -->
<script>
    $(document).ready(function () {
        // show|hide header box (register, login, logout)
        if (typeof readCookie === 'function') {
            var token = readCookie('KIMONO_MEMBER_TOKEN');
        }
        if (!isSmartPhone()) { // pc
            var register_btn = $('.pc.register-btn');
            var login_btn = $('.pc.login-btn');
            var logout_btn = $('.pc.logout-btn');
            var common_btn = $('.pc.common-btn');
        } else { // smartphone
            var register_btn = $('.sp .register-btn');
            var login_btn = $('.sp .login-btn');
            var logout_btn = $('.sp .logout-btn');
            var common_btn = $('.sp .common-btn');
        }

        if (null === token) {  // show:register, login; hide: logout, common
            register_btn.show();
            login_btn.show();
            logout_btn.hide();
            common_btn.hide();
        } else {  // show logout, common; hide: register, login
            register_btn.hide();
            login_btn.hide();
            logout_btn.show();
            common_btn.show();
        }
    });
</script>
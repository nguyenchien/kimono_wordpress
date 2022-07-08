<?php

/**
 * The Header Luggage service
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isSmartPhone,$isTablet, $language;
$detect = Yii::app()->mobileDetect;
$isSmartPhone = $detect->isSmartPhone();
$isTablet = $detect->isMobile() && $detect->isTablet();

$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
wp_deregister_script( 'jquery' );

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)| !(IE 9)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="theme-color" content="#4e0037" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" type="image/x-icon" href="<?php echo WP_HOME; ?>/favicon.ico" />
<link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip76x76.png" sizes="76x76" />
<link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip112x112.png" sizes="112x112" />
<link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip120x120.png" sizes="120x120" />
<link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip152x152.png" sizes="152x152" />
<link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip180x180.png" sizes="180x180" />
<link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip180x180.png" />
<meta name="msapplication-TileImage" content="<?php echo WP_HOME; ?>/images/iconsite/webclip144x144.png">
<meta name="Referrer" content="origin">
<script>
    var base_url = "<?php echo Yii::app()->getBaseUrl() ?>";
    var baseUrl = "<?php echo Yii::app()->getBaseUrl(); ?>";
    var language = "<?php echo Yii::app()->language ;?>";
    var curLang = "<?php echo Yii::app()->language ;?>";
</script>
<script src="<?php echo WP_HOME; ?>/js/lib/lazyload.utils.js" type="text/javascript"></script>
<?php
if ($isSmartPhone) {
    wp_register_style('style-header-luggage-service-sp', get_template_directory_uri() . '/css/header-luggage-service-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('style-header-luggage-service-sp');
}
else{
    wp_register_style('style-header-luggage-service-pc', get_template_directory_uri() . '/css/header-luggage-service-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('style-header-luggage-service-pc');
}

    ?>
    <style>
        <?php include Yii::getPathOfAlias('webroot').'/css/lazyload.utils.css' ?>
    </style>
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php
    wp_head();
    ?>
</head>
<?php if($isSmartPhone):?>
    <div id="side-nav" class="side-nav">
        <div class="close-sb">
            <span class="closed">&times;</span>
        </div>
        <div class="nav-content">
            <ul class="list-menu-sp">
                <li class="item"><a href="/nimotsu#id-des-lug">手ぶら観光とは</a></li>
                <li class="item"><a href="/nimotsu#id-about-wargo">wargoについて</a></li>
                <li class="item"><a href="/nimotsu#id-offer-service">サービス一覧</a></li>
                <li class="item"><a href="/nimotsu#id-contact-us">お問い合わせ</a></li>
            </ul>
        </div>
    </div>
<?php endif; ?>
<header class="header">
    <div class="wrap-nav">
        <div class="container-box">
            <div class="row">
                <div class="wrap-logo-menu flexbox align-items-center justify-content-between">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo WP_HOME; ?>/images/luggage-service/logo-lg.svg" alt="<?php echo Yii::t('wp_theme', '京都着物レンタルwargo');?>"></a>
                    <?php if($isSmartPhone):?>
                        <span class="toggle-menu sp"><img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-menu.png"></span>
                    <?php endif; ?>
                    <?php if(!$isSmartPhone):?>
                        <ul class="list-menu flexbox">
                            <li class="item"><a href="/nimotsu#id-des-lug">手ぶら観光とは</a></li>
                            <li class="item"><a href="/nimotsu#id-about-wargo">wargoについて</a></li>
                            <li class="item"><a href="/nimotsu#id-offer-service">サービス一覧</a></li>
                            <li class="item"><a href="/nimotsu#id-contact-us">お問い合わせ</a></li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<body>





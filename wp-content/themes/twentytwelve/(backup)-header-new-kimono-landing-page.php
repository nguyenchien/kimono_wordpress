<?php

/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isSmartPhone,$isTablet, $language;
global $post;
$postName = $post->post_name;
$detect = Yii::app()->mobileDetect;
$isSmartPhone = $detect->isSmartPhone();
$isTablet = $detect->isMobile() && $detect->isTablet();
$isFrontPage = is_front_page();
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
wp_deregister_script( 'jquery' );
global $kimono;
global $is_yukata;

$classEx = $isSmartPhone ? 'sp' : 'pc';

Yii::import('application.controllers.RsrcController');
$rsrc = new RsrcController("header-new-kimono-landing-page");
$basePath = substr(Yii::app()->basePath,0,-9);

$kimono = getTermData();
$browser = $detect->getUserAgent();
$isFirefox = strpos($browser, 'Firefox') ? true : false;
// menu selection
$lang = array('tw','vi','en');
$header_menu = $is_yukata?'HeaderMenuYukataJA':'HeaderMenuJA';
$header_menu_sp = $is_yukata ? 'HeaderMenuForSmartphone_JA1': 'HeaderMenuForSmartphone_JA';
$isTopPage = is_front_page();
$isYukata = is_page('yukata');
$isYukataPlan = is_page('yukata/plan');
if(Yii::app()->language == 'ja'):
    $header_menu = $is_yukata?'HeaderMenuYukataNewPC':'HeaderMenuNewPC';
endif;

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
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
    <?php if ( is_singular('news')): ?>
        <meta name="robots" content="noindex">
    <?php endif; ?>
    <style>
        <?php include Yii::getPathOfAlias('webroot').'/css/lazyload.utils.css' ?>
        *{margin:0;padding:0;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}address,body,caption,cite,code,dd,dfn,dl,dt,form,h1,h2,h3,h4,h5,h6,li,ol,p,pre,table,td,th,ul,var{font-size:100%;font-style:normal;font-weight:400}h1,h2,h3,h4,h5,p,span,strong,var{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}table{border-collapse:collapse;border-spacing:0}a{color:#000;text-decoration:none}img{max-width:100%;height:auto;vertical-align:middle}input,select,textarea{border-radius:0;outline:0}input,textarea{border:1px solid #888}::-webkit-input-placeholder{color:#ccc}body{font-size:75%;font-family:"Noto Sans JP","メイリオ",Meiryo,"ヒラギノ角ゴ Pro W3",Arial,"Hiragino Kaku Gothic Pro","Lucida Grande",Verdana,"ＭＳ Ｐゴシック","MS PGothic",sans-serif}.container-box{width:100%;max-width:1200px;margin:0 auto;font-size:1.4rem}.row{padding:0 7px}.flexbox{display:-webkit-box;display:flex;display:-ms-flexbox}.align-items-center{-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-align-items:center}.align-items-start{-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-align-items:flex-start}.align-items-end{align-items:flex-end;-webkit-align-items:flex-end}.justify-content-center{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:center;-webkit-justify-content:center}.justify-content-between{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-webkit-justify-content:space-between}.text-left{text-align:left}.text-center{text-align:center}.text-right{text-align:right}.hidden-sidebar,.pc{display:none}.right-column-content,.wrap-boths-column .left-column{width:100%}.wrap-boths-column .right-column{-webkit-box-flex:1;-ms-flex:1;flex:1;max-width:900px}.fixed-body{overflow:hidden}.wrap-toggle-left-sidebar{display:none}#breadcrumbs{padding-top:4px;margin-bottom:5px}#breadcrumbs ol{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;line-height:1}#breadcrumbs ol .item-breadcrumbs,#breadcrumbs ol .item-breadcrumbs .separator{padding:0 7px}#breadcrumbs ol .item-breadcrumbs .link-breadcrumbs,#breadcrumbs ol .item-breadcrumbs .text-breadcrumbs,.separator{font-size:12px}.breadcrumbs-formal .separator,.breadcrumbs-formal ol .item-breadcrumbs .link-breadcrumbs,.breadcrumbs-formal ol .item-breadcrumbs .text-breadcrumbs{color:#c1a530}.breadcrumbs-kimono .separator,.breadcrumbs-kimono ol .item-breadcrumbs .link-breadcrumbs,.breadcrumbs-kimono ol .item-breadcrumbs .text-breadcrumbs{color:#000}@media (max-width:767px){.left-column-content,.wrap-boths-column .right-column{width:100%}.breadcrumbs-formal{font-size:12px;display:inline-block;padding:0;margin:5px 0}}@media (min-width:750px){.row{padding:0}.hidden-sidebar,.pc{display:block}.sp{display:none}.wrap-boths-column,.wrap-column-content{-ms-flex-wrap:nowrap;flex-wrap:nowrap}.right-column-content,.wrap-boths-column .left-column,.wrap-boths-column .left-column .wrap-list-banner .list-banner .image-banner{width:250px}#breadcrumbs{padding-top:15px;margin-bottom:5px}#breadcrumbs ol .item-breadcrumbs,#breadcrumbs ol .item-breadcrumbs .separator{display:flex}#breadcrumbs ol .item-breadcrumbs:first-of-type{padding-left:0}}
    </style>
<?php
	$date = date('Ymd');
	$page_template_current = get_page_template();
	$page_template_name = basename($page_template_current, '.php');
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

	if($isFrontPage || $isYukata || $isYukataPlan){
		$cssContent .= file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/kimono-top-page-first-view-'.$classEx.'.css');
	} elseif ($page_template_name == 'new-access-child-page-v3'){
		$cssContent .= file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-access-child-page-v3-first-view-'.$classEx.'.css');
	} elseif ($page_template_name == 'new-area-template') {
		$cssContent .= file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-area-template-first-view-' . $classEx . '.css');
		if($isSmartPhone){ ?>
			<link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_AREA_TEMPLATE_SP?>&ver=<?= $date ?>" rel="stylesheet" type="text/css" />
		<?php } else{ ?>
			<link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_AREA_TEMPLATE_PC?>&ver=<?= $date ?>" rel="stylesheet" type="text/css" />
		<?php }
	} else if($page_template_name == 'new-access-child-page') {
		$cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/header-kimono-v2-'.$classEx.'.css');
		$cssContent .= file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-access-first-view-'.$classEx.'.css');
		echo "<style>$cssContent</style>";
		if($isSmartPhone){?>
			<link rel="preload" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_ACCESS_CHILD_SP?>&ver=20210826" as="style" onload="this.onload=null;this.rel='stylesheet'">
			<noscript><link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_ACCESS_CHILD_SP?>&ver=20210826"></noscript>
			<?php
		} else{
			?>
			<link rel="preload" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_ACCESS_CHILD_PC?>&ver=20210826" as="style" onload="this.onload=null;this.rel='stylesheet'">
			<noscript><link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_ACCESS_CHILD_PC?>&ver=20210826"></noscript>
		<?php }
	} else if($page_template_name == 'new-access-child-page-v2'){
		$cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/header-kimono-v2-'.$classEx.'.css');
		$cssContent .= file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-access-child-page-v2-first-view-'.$classEx.'.css');
		$cssContent .= $isSmartPhone ? $rsrc->getCssContent(ResourceMasterValues::RM_ACCESS_CHILD_SP_V2) : $rsrc->getCssContent(ResourceMasterValues::RM_ACCESS_CHILD_PC_V2);
		echo "<style>$cssContent</style>";
	} else if($page_template_name == 'new-top-page-kimono' && strpos($url, 'access') !== false){
		$cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-kimono-common.css');
        if($isSmartPhone){?>
			<link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_COMMON_SP?>&ver=25022020" as="style" onload="this.onload=null;this.rel='stylesheet'">
			<noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_COMMON_SP?>&ver=25022020"></noscript>
            <?php
        } else{ ?>
			<link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_COMMON_PC?>&ver=25022020" as="style" onload="this.onload=null;this.rel='stylesheet'">
			<noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_COMMON_PC?>&ver=25022020"></noscript>
        <?php }
		echo "<style>$cssContent</style>";
	}
	if ($page_template_name == 'yukata-page-v3'){
		$cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/yukata-page-v3-first-view-'.$classEx.'.css');
	}else{
		//
	}

	$cssContent = $rsrc->minimizeCSSsimple($cssContent);
	echo "<style>$cssContent</style>";
?>

    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php
wp_head();
		wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
    //wp_enqueue_script('lazyloadxt', WP_HOME. '/js/jquery.lazyloadxt.js', array('jquery'));
    wp_enqueue_script('jquery-visible', WP_HOME . '/js/jquery.visible.min.js');
    ?>

	 <script type="text/javascript">
        var base_url = "<?php echo Yii::app()->getBaseUrl() ?>",
            baseUrl = "<?php echo Yii::app()->getBaseUrl() ?>",
            language = "<?php echo Yii::app()->language ;?>",
            curLang = "<?php echo Yii::app()->language ;?>",
            mainMap  = "<?php echo Yii::t('wp_theme','リセット');?>",
            message_progress_bar_popup = "<?php echo Yii::t('booking', '読み込み中です。少々お待ちください。');?>";
    </script>
    <?php
    if (Yii::app()->language != 'ja') {
        wp_enqueue_style('multi-lang', WP_HOME . '/css/multi_lang.css', array('twentytwelve-style'), '20150601');
    }
    ?>
    <!--<link rel="stylesheet" href="--><?php //echo WP_HOME; ?><!--/css/multi_lang.css" type="text/css" />-->

    <!-- style for /yukata -->

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '334135303674302'); // Insert your pixel ID here.
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=334135303674302&ev=PageView&noscript=1"
        /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->

    <!-- The search engine "Baidu". -->
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?9e84c22bb0f2f1a0c4b8ee39101c057c";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <!-- End The search engine "Baidu". -->

    <!-- Begin: Schema Markup -->
    <?php
    $schemamarkup = get_post_meta(get_the_ID(), 'schemamarkup', true);
    if(!empty($schemamarkup)) {
        echo $schemamarkup;
    }
    ?>
    <!-- End: Schema Markup -->
    <meta name="google-site-verification" content="X6O3Pxr1uXoKJF5SZfl98eFc0Jf8UY0XE9AnmJWk-Z4" />
    <?php if (in_array(basename($_SERVER['REQUEST_URI']),
		array('kanazawa-kenrokuen','kanazawa','asakusa','kyotostation','gion-nishiki','ninenzaka','kiyomizuzaka','ito',
			'osaka-shinsaibashi-opa','kyoto-area','osaka-area','shizuoka-area','kanazawa-area','tokyo-area'))) : ?>
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "FAQPage",
				"mainEntity": [{
					"@type": "Question",
					"name": "何か持っていくものはありますか？",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$回答内容$"
					}
				}, {
					"@type": "Question",
					"name": "キャンセルについて教えて下さい",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$回答内容$"
					}
				}, {
					"@type": "Question",
					"name": "髪はセットしてもらえますか？",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$回答内容$"
					}
				}, {
					"@type": "Question",
					"name": "どのくらいの時間がかかりますか",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$回答内容$"
					}
				}]
			}
		</script>
    <?php endif;?>

	<?php if($isFrontPage) : ?>
		<script type = "application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "FAQPage",
				"mainEntity": [{
					"@type": "Question",
					"name": "何か持っていくものはありますか",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$Answer text$"
					}
				}, {
					"@type": "Question",
					"name": "キャンセルについて教えて下さい",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$Answer text$"
					}
				}, {
					"@type": "Question",
					"name": "髪はセットしてもらえますか？",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$Answer text$"
					}
				}, {
					"@type": "Question",
					"name": "どのくらいの時間がかかりますか？",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$Answer text$"
					}
				}]
			}
		</script>
	<?php endif;?>

	<?php
		$shop_json_array = array (
			'kyotostation' => '{
				"@context": "http://schema.org",
				"@type": "LocalBusiness",
				"name": "京都着物レンタルwargo 京都タワーサンド店",
				"logo": "https://kyotokimono-rental.com/images/new-kimono/logo-sp.svg",
				"image": " https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/07/banner-kyotostation-202107-sp.jpg",
				"description": "京都駅から徒歩2分♪着物も浴衣も当日予約OK！『京都着物レンタルwargo』京都タワーサンド店は、京都タワーの階下にあります。人気のカップルプランをはじめ、着付けも簪もコミコミの格安価格で大変身！！重たい荷物はお店に預け西本願寺、東寺、足を伸ばして伏見稲荷へと、サクッと手ぶらの京都観光を満喫しましょう！",
				"telephone": "+81 3-4582-4864",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "京都府京都市下京区塩小路町721-1 京都タワービル2階",
					"addressRegion": "京都府",
					"postalCode": "600-8216",
					"addressCountry": "日本"
				},
				"brand": "着物レンタルwargo",
				"url": "https://kyotokimono-rental.com/access/kyoto-area/station-area/kyotostation",
				"sameAs": "https://www.instagram.com/kyotokimonorental.wargo/",
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+81 3-4582-4864",
					"contactType": "customer support"
				},
				"openingHoursSpecification": [{
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Monday",
						"Tuesday",
						"Wednesday",
						"Thursday",
						"Friday"
					],
					"opens": "10:00",
					"closes": "18:00"
				}, {
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Saturday",
						"Sunday",
						"PublicHolidays"
					],
					"opens": "10:00",
					"closes": "18:00"
				}]
			}',
			'kiyomizuzaka' => '{
				"@context": "http://schema.org",
				"@type": "LocalBusiness",
				"name": "京都着物レンタルwargo 祇園錦店",
				"logo": "https://kyotokimono-rental.com/images/new-kimono/logo-sp.svg",
				"image": "https://kyotokimono-rental.com/images/new-kimono/access/banner-access-kiyomizu-shop-sp.png",
				"description": "清水寺まで徒歩4分♪着物も浴衣も当日予約OK！『京都着物レンタルwargo』清水坂店は、五条坂の中程にあります。人気のカップルプランをはじめ、着付けも簪もコミコミの格安価格で大変身！！重たい荷物はお店に預け清水寺、二年坂、高台寺へと、サクッと手ぶらの東山観光を満喫しましょう☆",
				"telephone": "+81 3-4582-4864",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "京都府京都市東山区五条橋東6-583-104 2階",
					"addressRegion": "京都府",
					"postalCode": "605-0846",
					"addressCountry": "日本"
				},
				"brand": "着物レンタルwargo",
				"url": "https://kyotokimono-rental.com/access/kyoto-area/kiyomizu-area/kiyomizuzaka",
				"sameAs": "https://www.instagram.com/kyotokimonorental.wargo/",
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+81 3-4582-4864",
					"contactType": "customer support"
				},
				"openingHoursSpecification": [{
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Monday",
						"Tuesday",
						"Wednesday",
						"Thursday",
						"Friday"
					],
					"opens": "09:00",
					"closes": "18:00"
				}, {
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Saturday",
						"Sunday",
						"PublicHolidays"
					],
					"opens": "09:00",
					"closes": "18:00"
				}]
			}',
			'gion-nishiki' => '{
				"@context": "http://schema.org",
				"@type": "LocalBusiness",
				"name": "京都着物レンタルwargo 祇園錦店",
				"logo": "https://kyotokimono-rental.com/images/new-kimono/logo-sp.svg",
				"image": " https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/02/banner-gionnishiki-sp.jpg",
				"description": "鴨川まで徒歩10分♪着物も浴衣も当日予約OK！『京都着物レンタルwargo』祇園錦店は、烏丸駅と河原町駅から徒歩3分、繁華街のど真ん中にございます。人気のカップルプランをはじめ、着付けも簪もコミコミの格安価格で大変身！！重たい荷物はお店に預け八坂神社へと続く京都随一の街並みを、サクッと手ぶらの祇園観光を満喫しましょう！",
				"telephone": "+81 3-4582-4864",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "京都市中京区中魚屋町478-6 2階",
					"addressRegion": "京都府",
					"postalCode": "604-8125",
					"addressCountry": "日本"
				},
				"brand": "着物レンタルwargo",
				"url": "https://kyotokimono-rental.com/access/kyoto-area/gion-area/gion-nishiki",
				"sameAs": "https://www.instagram.com/kyotokimonorental.wargo/",
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+81 3-4582-4864",
					"contactType": "customer support"
				},
				"openingHoursSpecification": [{
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Monday",
						"Tuesday",
						"Wednesday",
						"Thursday",
						"Friday"
					],
					"opens": "10:00",
					"closes": "18:00"
				}, {
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Saturday",
						"Sunday",
						"PublicHolidays"
					],
					"opens": "10:00",
					"closes": "18:00"
				}]
			}',
			'ninenzaka' => '{
				"@context": "http://schema.org",
				"@type": "LocalBusiness",
				"name": "京都着物レンタルwargo 清水寺二年坂店",
				"logo": "https://kyotokimono-rental.com/images/new-kimono/logo-sp.svg",
				"image": "https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/03/Topbnn_2021_SP.jpeg",
				"description": "清水寺まで徒歩8分♪お洒落なアンティーク着物の専門店『京都着物レンタルwargo』清水寺二年坂店は、二年坂の中程にございます。着付けや簪、ヘアセットもコミコミの格安価格で大変身！！重たい荷物はお店に預け虫籠窓の町家が立ち並ぶ石畳の坂道を産寧坂から清水寺へ、サクッと手ぶらの清水寺観光を満喫しましょう！",
				"telephone": "+81 3-4582-4864",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "京都府京都市東山区桝屋町351-3 2階",
					"addressRegion": "京都府",
					"postalCode": "605-0826",
					"addressCountry": "日本"
				},
				"brand": "着物レンタルwargo",
				"url": "https://kyotokimono-rental.com/access/kyoto-area/kiyomizu-area/ninenzaka",
				"sameAs": "https://www.instagram.com/kyotokimonorental.wargo/",
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+81 3-4582-4864",
					"contactType": "customer support"
				},
				"openingHoursSpecification": [{
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Monday",
						"Tuesday",
						"Wednesday",
						"Thursday",
						"Friday"
					],
					"opens": "10:00",
					"closes": "18:00"
				}, {
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Saturday",
						"Sunday",
						"PublicHolidays"
					],
					"opens": "10:00",
					"closes": "18:00"
				}]
			}',
			'osaka-shinsaibashi-opa' => '{
				"@context": "http://schema.org",
				"@type": "LocalBusiness",
				"name": "着物レンタルwargo 大阪心斎橋店",
				"logo": "https://kyotokimono-rental.com/images/formal-rental/logo-ft-fm.svg",
				"image": "https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/07/banner-osaka-shinsaibashi-opa-202107-sp.jpg",
				"description": "心斎橋駅直結♪安くて高品質なお着物を取り揃える『着物レンタルwargo』大阪心斎橋店は、心斎橋OPAきれい館2階にございます。着付け無料で小物も一式レンタル！梅田や中之島、大阪各地へ着物や浴衣を着ての観光はもちろん！成人式、お宮参りなどの用途に合った着物を種類豊富にご用意しています。",
				"telephone": "+81 3-4582-4864",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "大阪府大阪市中央区西心斎橋1-9-2 心斎橋OPAキレイ館2階",
					"addressRegion": "大阪府",
					"postalCode": "542-0086",
					"addressCountry": "日本"
				},
				"brand": "着物レンタルwargo",
				"url": "https://kyotokimono-rental.com/access/osaka-area/osaka-shinsaibashi-opa",
				"sameAs": "https://www.instagram.com/kyotokimonorental.wargo/",
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+81 3-4582-4864",
					"contactType": "customer support"
				},
				"openingHoursSpecification": [{
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Monday",
						"Tuesday",
						"Wednesday",
						"Thursday",
						"Friday"
					],
					"opens": "11:00",
					"closes": "19:00"
				}, {
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Saturday",
						"Sunday",
						"PublicHolidays"
					],
					"opens": "11:00",
					"closes": "19:00"
				}]
			}',
			'asakusa' => '{
				"@context": "http://schema.org",
				"@type": "LocalBusiness",
				"name": "着物レンタルwargo 東京浅草店",
				"logo": "https://kyotokimono-rental.com/images/formal-rental/logo-ft-fm.svg",
				"image": "https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/07/banner-asakusa-202107-sp.jpg",
				"description": "浅草寺まで徒歩5分♪着物も浴衣も当日予約OK！『着物レンタルwargo』東京浅草店は、浅草駅から徒歩3分の新仲見世通り沿いにございます。人気のカップルプランをはじめ、着付けも簪もコミコミの格安価格で大変身！！重たい荷物はお店に預け花やしき、食べ歩きをしながら浅草寺へ、サクッと手ぶらの浅草観光を満喫しましょう！",
				"telephone": "+81 3-4582-4864",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "東京都台東区浅草1-30-2 2階",
					"addressRegion": "東京都",
					"postalCode": "111-0032",
					"addressCountry": "日本"
				},
				"brand": "着物レンタルwargo",
				"url": "https://kyotokimono-rental.com/access/asakusa-area/asakusa",
				"sameAs": "https://www.instagram.com/kyotokimonorental.wargo/",
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+81 3-4582-4864",
					"contactType": "customer support"
				},
				"openingHoursSpecification": [{
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Monday",
						"Tuesday",
						"Wednesday",
						"Thursday",
						"Friday"
					],
					"opens": "10:00",
					"closes": "17:00"
				}, {
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Saturday",
						"Sunday",
						"PublicHolidays"
					],
					"opens": "10:00",
					"closes": "17:00"
				}]
			}',
            'kanazawa-kenrokuen' => '{
            	"@context": "http://schema.org",
				"@type": "LocalBusiness",
				"name": "着物レンタルwargo 金沢兼六園店",
				"logo": "https://kyotokimono-rental.com/images/formal-rental/logo-ft-fm.svg",
				"image": "https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/03/top-banner-kanazawa-kenrokuen-sp.jpg",
				"description": "兼六園まで徒歩1分♪『着物レンタルwargo』金沢兼六園店は、紺屋坂沿いにございます。人気のカップルプランやレトロでアンティークのお着物が、着付けも簪もコミコミの格安価格で大変身！！重たい荷物はお店に預け兼六園、金沢城、アートを楽しめる金沢21世紀美術館へもサクッと手ぶらに金沢観光を満喫しましょう！",
				"telephone": "+81 3-4582-4864",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "石川県金沢市兼六町2-8 2F",
					"addressRegion": "石川県",
					"postalCode": "920-0936",
					"addressCountry": "日本"
				},
				"brand": "着物レンタルwargo",
				"url": "https://kyotokimono-rental.com/access/kanazawa-area/kanazawa-kenrokuen",
				"sameAs": "https://www.instagram.com/kyotokimonorental.wargo/",
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+81 3-4582-4864",
					"contactType": "customer support"
				},
				"openingHoursSpecification": [{
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Monday",
						"Tuesday",
						"Wednesday",
						"Thursday",
						"Friday"
					],
					"opens": "09:00",
					"closes": "17:00"
				}, {
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Saturday",
						"Sunday",
						"PublicHolidays"
					],
					"opens": "09:00",
					"closes": "17:00"
				}]
            }',
            'kanazawa' => '{
            	"@context": "http://schema.org",
				"@type": "LocalBusiness",
				"name": "着物レンタルwargo 金沢香林坊店",
				"logo": "https://kyotokimono-rental.com/images/formal-rental/logo-ft-fm.svg",
				"image": "https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/07/banner-kanazawa-202107-sp.jpg",
				"description": "武家屋敷跡まで徒歩5分♪尾山神社まで徒歩11分♪安くて高品質なお着物を取り揃える『着物レンタルwargo』金沢香林坊店は、香林坊東急スクエア1階にございます。着付け無料で小物も一式レンタル！！兼六園、金沢城へ着物や浴衣を着ての観光はもちろん！お宮参り、七五三などの用途に合った着物を種類豊富にご用意しています。",
				"telephone": "+81 3-4582-4864",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "石川県金沢市香林坊2-1-1",
					"addressRegion": "石川県",
					"postalCode": "920-0961",
					"addressCountry": "日本"
				},
				"brand": "着物レンタルwargo",
				"url": "https://kyotokimono-rental.com/access/kanazawa-area/kanazawa",
				"sameAs": "https://www.instagram.com/kyotokimonorental.wargo/",
				"contactPoint": {
					"@type": "ContactPoint",
					"telephone": "+81 3-4582-4864",
					"contactType": "customer support"
				},
				"openingHoursSpecification": [{
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Monday",
						"Tuesday",
						"Wednesday",
						"Thursday",
						"Friday"
					],
					"opens": "09:00",
					"closes": "17:00"
				}, {
					"@type": "OpeningHoursSpecification",
					"dayOfWeek": [
						"Saturday",
						"Sunday",
						"PublicHolidays"
					],
					"opens": "09:00",
					"closes": "17:00"
				}]
            }'
		);

		if (array_key_exists($postName, $shop_json_array)) {
			echo '<script type="application/ld+json">';
			echo $shop_json_array[$postName];
            echo '</script>';
		}
	?>
</head>

<?php
$class_lang = Yii::app()->language;
if(($class_lang == 'ru' && !empty(Yii::app()->params['booking_page']))
    || in_array($class_lang, array('th','id','ms', 'fr', 'hi'))){
    $class_lang .= ' en';
}elseif($class_lang == 'cn'){
    $class_lang .= ' tw';
}
$body_class = array($class_lang, 'ctrl-'.Yii::app()->controller->id, 'layout-kimono-sp');
if(is_page()){
    global $post;
    $body_class[] = 'page-slug-'.$post->post_name;
}
?>

<body <?php body_class($body_class); ?>>
<?php
wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri(), null, '201906121447' );
if($isFrontPage){
    if($isFirefox){
        if($isSmartPhone){ ?>
            <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_TOP_SP_V3?>&ver=<?= $date ?>" rel="stylesheet" type="text/css" />
            <?php
        } else{ ?>
            <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_TOP_PC_V3?>&ver=<?= $date ?>" rel="stylesheet" type="text/css" />
        <?php }
    }else{
        if($isSmartPhone){?>
            <link rel="preload" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_TOP_SP_V3?>&ver=20210810" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_TOP_SP_V3?>&ver=20210810"></noscript>
            <?php
        } else{
            ?>
            <link rel="preload" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_TOP_PC_V3?>&ver=20210810" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_TOP_PC_V3?>&ver=20210810"></noscript>
        <?php }
    }
} elseif ($page_template_name == 'new-access-child-page-v3'){
    if($isFirefox){
        if($isSmartPhone){ ?>
            <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_ACCESS_CHILD_SP_V3?>&ver=<?= $date ?>" rel="stylesheet" type="text/css" />
            <?php
        } else{ ?>
            <link href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_ACCESS_CHILD_PC_V3?>&ver=<?= $date ?>" rel="stylesheet" type="text/css" />
        <?php }
    }else{
        if($isSmartPhone){?>
            <link rel="preload" href="/rsrc?page=<?= ResourceMasterValues::RM_ACCESS_CHILD_SP_V3?>&ver=20200217" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="/rsrc?page=<?= ResourceMasterValues::RM_ACCESS_CHILD_SP_V3?>&ver=20200217"></noscript>
            <?php
        } else{ ?>
            <link rel="preload" href="/rsrc?page=<?= ResourceMasterValues::RM_ACCESS_CHILD_PC_V3?>&ver=20200217" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="/rsrc?page=<?= ResourceMasterValues::RM_ACCESS_CHILD_PC_V3?>&ver=20200217"></noscript>
        <?php }
    }

} elseif ($page_template_name == 'yukata-top-v2'){
    if($isSmartPhone){?>
        <link rel="preload" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_YUKATA_TOP_SP_V2?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_YUKATA_TOP_SP_V2?>&ver=20200804"></noscript>
        <?php
    } else{
        ?>
        <link rel="preload" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_YUKATA_TOP_PC_V2?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_YUKATA_TOP_PC_V2?>&ver=20200804"></noscript>
    <?php }
}
else {
}

$classEx = $isSmartPhone ? "sp" : "pc";
?>
<?php include(ABSPATH . 'gtag.php'); ?>
<div id="fb-root"></div>

<link rel="preload" href="<?= get_template_directory_uri()?>/css/header-kimono-landing-page-<?=$classEx?>.css?ver=20210809" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/header-kimono-landing-page-<?=$classEx?>.css?ver=20210831"></noscript>

<?php include ABSPATH.'ga.php'; ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/eventTrackingAnalytics.js', null, array("defer"=>1));?>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion_async.js"></script>
<div id="page" class="hfeed site">

    <div id="sb-site">
        <?php
        // Get Application language
        $lang = Yii::app()->language;
        // Get Language item menu
        $swe_generateLanguageCode = swe_generateLanguageCode();
        // Get header by cache
        //$header = Yii::app()->cache->get("header_new_kimono_{$lang}");
        // Detect if header by language cache does not exist
        //if ($header == false) {
        // Init header
        $header = get_header_template(__DIR__, 'header_template_new_kimono_landing_page');
        //	Yii::app()->cache->set("header_new_kimono_{$lang}", $header);
        //}

        // Add-more text image
        $addmoreen = '200text-'.$language;
        // Detect if is smartphone
        if($isSmartPhone){
            $addmoreen = '200text-mobile-'.$language;
        }
        // Replace header template params with values
        $search_array	= array("{{language_item_menu}}", "{{addmoreen}}");
        $replace_array	= array($swe_generateLanguageCode, $addmoreen);
        $header = str_replace($search_array, $replace_array, $header);

        $search_array	= array("{{before_logo}}", "{{after_logo}}");
        if (is_front_page() || is_page('yukata')) {
            // Replace header logo params with values
            $replace_array	= array("<h1>", "</h1>");
        } else {
            $replace_array	= array("", "");
        }
        $header = str_replace($search_array, $replace_array, $header);
        // Render header
	echo $header;
        ?>

        <?php
        // Render Menu if Device is PC
        if (!$isSmartPhone) {
            $main_menu = Yii::app()->cache->get("{$header_menu}_{$lang}");
            // Detect if main menu by language cache exist
            if ($main_menu == false) {
                // Init header
                $class_menu_new = ("HeaderMenuNewPC" == $header_menu) ? 'menu-top-kimono-new' : '';

                $nav_menu = wp_nav_menu(array('theme_location' => 'primary', 'menu' => $header_menu, 'menu_class' => 'nav-menu', 'echo' => false));

                $main_menu = <<<MAIN_MENU
	<div class="menu-top-kimono $class_menu_new clearfix">
		<div class="container clearfix">
			<div class="bg-left"></div>
			<nav id="site-navigation" class="columns sixteen main-navigation" role="navigation">
				<!--<h3 class="menu-toggle"><?php //_e( 'Menu', 'twentytwelve' ); ?></h3>-->
				<!--<a class="assistive-text" href="#content" title="<?php //esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php //_e( 'Skip to content', 'twentytwelve' ); ?></a>-->
				$nav_menu
			</nav><!-- #site-navigation -->
			<div class="bg-right"></div>
		</div><!-- end container -->
	</div><!-- end menu-top-kimono -->
MAIN_MENU;
                // Set main menu to cache
                Yii::app()->cache->set("{$header_menu}_{$lang}", $main_menu);
            }
            // Render main menu
            //echo $main_menu;
        }
        ?>


        <div id="main" class="main-content clearfix">


            <?php
            //	function get_header_template($lang) {
            //		ob_start();
            //		require('header_template_formal.php');
            //
            //		return ob_get_clean();
            //	}
            ?>
            <!-- Begin Bottom Bar -->
            <div id="bottomBar" style="display:none;">
                <!--			<a id="toCart" style="display:none;" href="/newBooking/cart">--><?php //echo Yii::t('wp_theme', '予約画面に戻る');?><!--</a>-->
                <img id="toTop" data-src="<?=Yii::app()->getBaseUrl(true);?>/img/top_button.png"/>
            </div>
            <!-- End Bottom Bar -->


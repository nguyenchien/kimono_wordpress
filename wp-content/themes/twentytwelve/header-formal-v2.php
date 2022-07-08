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
global $isSmartPhone,$isTablet, $language,$post;
$detect = Yii::app()->mobileDetect;
$isSmartPhone = $detect->isSmartPhone();
$isTablet = $detect->isMobile() && $detect->isTablet();

$post_name = isset($post->post_name) ? $post->post_name: '';
$post_parent = get_post($post->post_parent)->post_name;
$post_parent = isset( $post_parent ) ? $post_parent : '';

$language = Yii::app()->language;

wp_deregister_script( 'jquery' );
global $kimono;
global $is_yukata;

$kimono = getTermData();

// menu selection
$lang = array('tw','vi','en');
$header_menu = $is_yukata?'HeaderMenuYukataJA':'HeaderMenuJA';
$header_menu_sp = $is_yukata ? 'HeaderMenuForSmartphone_JA1': 'HeaderMenuForSmartphone_JA';

if(Yii::app()->language == 'ja'):
	$header_menu = $is_yukata?'HeaderMenuYukataNewPC':'HeaderMenuNewPC';
endif;
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
<meta name="theme-color" content="#733d6d " />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php if(is_page('formal/ubugi-lp')):?>
    <link rel="canonical" href="https://kyotokimono-rental.com/formal/ubugi">
<?php endif;?>
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
<script type="text/javascript">
    $(function() {
        var banner_section = $('.banner-section');
        if(banner_section.length && banner_section.find('img').length){
            $('body').addClass('banner-loaded');
        }
    });
</script>
<style type="text/css">
    *{margin:0;padding:0;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}address,body,caption,cite,code,dd,dfn,dl,dt,form,h1,h2,h3,h4,h5,h6,li,ol,p,pre,table,td,th,ul,var{font-size:100%;font-style:normal;font-weight:400}h1,h2,h3,h4,h5,p,span,strong,var{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}table{border-collapse:collapse;border-spacing:0}a{color:#000;text-decoration:none}img{max-width:100%;height:auto;vertical-align:middle}input,select,textarea{border-radius:0;outline:0}input,textarea{border:1px solid #888}::-webkit-input-placeholder{color:#ccc}body{font-size:75%;font-family:"Noto Sans JP","メイリオ",Meiryo,"ヒラギノ角ゴ Pro W3",Arial,"Hiragino Kaku Gothic Pro","Lucida Grande",Verdana,"ＭＳ Ｐゴシック","MS PGothic",sans-serif}.container-box{width:100%;max-width:1200px;margin:0 auto;font-size:1.4rem}.row{padding:0 7px}.flexbox{display:-webkit-box;display:flex;display:-ms-flexbox}.align-items-center{-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-align-items:center}.align-items-start{-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-align-items:flex-start}.align-items-end{align-items:flex-end;-webkit-align-items:flex-end}.justify-content-center{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:center;-webkit-justify-content:center}.justify-content-between{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-webkit-justify-content:space-between}.text-left{text-align:left}.text-center{text-align:center}.text-right{text-align:right}.hidden-sidebar,.pc{display:none}.right-column-content,.wrap-boths-column .left-column{width:100%}.wrap-boths-column .right-column{-webkit-box-flex:1;-ms-flex:1;flex:1;max-width:900px}.fixed-body{overflow:hidden}.wrap-toggle-left-sidebar{display:none}#breadcrumbs{padding-top:4px;margin-bottom:5px}#breadcrumbs ol{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;line-height:1}#breadcrumbs ol .item-breadcrumbs,#breadcrumbs ol .item-breadcrumbs .separator{padding:0 7px}#breadcrumbs ol .item-breadcrumbs .link-breadcrumbs,#breadcrumbs ol .item-breadcrumbs .text-breadcrumbs,.separator{font-size:12px}.breadcrumbs-formal .separator,.breadcrumbs-formal ol .item-breadcrumbs .link-breadcrumbs,.breadcrumbs-formal ol .item-breadcrumbs .text-breadcrumbs{color:#c1a530}.breadcrumbs-kimono .separator,.breadcrumbs-kimono ol .item-breadcrumbs .link-breadcrumbs,.breadcrumbs-kimono ol .item-breadcrumbs .text-breadcrumbs{color:#000}@media (max-width:767px){.left-column-content,.wrap-boths-column .right-column{width:100%}.breadcrumbs-formal{font-size:12px;display:inline-block;padding:0;margin:5px 0}}@media (min-width:750px){.row{padding:0}.hidden-sidebar,.pc{display:block}.sp{display:none}.wrap-boths-column,.wrap-column-content{-ms-flex-wrap:nowrap;flex-wrap:nowrap}.right-column-content,.wrap-boths-column .left-column,.wrap-boths-column .left-column .wrap-list-banner .list-banner .image-banner{width:250px}#breadcrumbs{padding-top:15px;margin-bottom:5px}#breadcrumbs ol .item-breadcrumbs,#breadcrumbs ol .item-breadcrumbs .separator{display:flex}#breadcrumbs ol .item-breadcrumbs:first-of-type{padding-left:0}}
</style>
<?php
function minimizeCSSsimple($css){
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css); // negative look ahead
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}

$date = date('Ymd');
$page_template_current = get_page_template();
$classEx = $isSmartPhone ? 'sp' : 'pc';
$page_template_name = basename($page_template_current, '.php');
if( $page_template_name == 'new-formal-product-cate-list-v3' or
    $page_template_name == 'new-formal-product-cate-list-ubugi' or
    $page_template_name == 'online-lesson' or
    $page_template_name == 'cancelpolicy-of-coronavirus' or
    $page_template_name == 'new-access-child-page-v3-ginza' ):
    $basePath = substr(Yii::app()->basePath,0,-9);

    $cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/header-formal-v2-first-view-'.$classEx.'.css');
    $cssContent = minimizeCSSsimple($cssContent);
    echo "<style>$cssContent</style>";
    ?>
    <?php else : ?>
<?php endif ?>
<?php
wp_enqueue_script('lazyload-utils', WP_HOME. '/js/lib/lazyload.utils.js');
if($page_template_name == 'new-formal-product-cate-list-v3'){
    $cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-formal-product-cate-list-v3-first-view-'.$classEx.'.css');
    $cssContent = minimizeCSSsimple($cssContent);
    echo "<style>$cssContent</style>";
    if($isSmartPhone){?>
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CATE_SP_V3?>&ver=20221102" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CATE_SP_V3?>&ver=20221102"></noscript>
        <?php
    } else{ ?>
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CATE_PC_V3?>&ver=20221102" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CATE_PC_V3?>&ver=20221102"></noscript>
    <?php }
} else if($page_template_name == 'new-formal-product-cate-list-ubugi'){
    $cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-formal-cate-list-v3-ubugi-first-view-'.$classEx.'.css');
    $cssContent = minimizeCSSsimple($cssContent);
    echo "<style>$cssContent</style>";
    if($isSmartPhone){?>
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CATE_UBUGI_SP?>&ver=20200513" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CATE_UBUGI_SP?>&ver=20200513"></noscript>
        <?php
    } else{ ?>
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CATE_UBUGI_PC?>&ver=20200513" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CATE_UBUGI_PC?>&ver=20200513"></noscript>
    <?php }
} else if($page_template_name == 'online-lesson'){
    if($isSmartPhone){?>
        <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/online-lesson-first-view-sp.css">
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_ONLINE_LESSON_SP?>&ver=25022020" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_ONLINE_LESSON_SP?>&ver=25022020"></noscript>
        <?php
    } else{ ?>
        <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/online-lesson-first-view-pc.css">
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_ONLINE_LESSON_PC?>&ver=25022020" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_ONLINE_LESSON_PC?>&ver=25022020"></noscript>
    <?php }
} else if($page_template_name == 'cancelpolicy-of-coronavirus'){
    if($isSmartPhone){?>
        <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/new-formal-corona-sp.css">
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CORONAVIRUS_SP?>&ver=20200513" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CORONAVIRUS_SP?>&ver=20200513"></noscript>
        <?php
    } else{ ?>
        <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()?>/css/new-formal-corona-pc.css">
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CORONAVIRUS_PC?>&ver=20200513" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_CORONAVIRUS_PC?>&ver=20200513"></noscript>
    <?php }
} else if($page_template_name == 'new-access-child-page-v3-ginza'){
    $cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-access-child-page-v3-ginza-first-view-'.$classEx.'.css');
    $cssContent = minimizeCSSsimple($cssContent);
    echo "<style>$cssContent</style>";
    if($isSmartPhone){?>
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_ACCESS_GINZA_SP?>&ver=20211206" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_ACCESS_GINZA_SP?>&ver=20211206"></noscript>
        <?php
    } else{ ?>
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_ACCESS_GINZA_PC?>&ver=20211206" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_FORMAL_ACCESS_GINZA_PC?>&ver=20211206"></noscript>
    <?php }
} else {
    if($isSmartPhone){?>
        <link rel="preload" href="<?= get_template_directory_uri()?>/css/header-formal-v2-sp.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/header-formal-v2-sp.css"></noscript>
        <?php
    } else{ ?>
        <link rel="preload" href="<?= get_template_directory_uri()?>/css/header-formal-v2-pc.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/header-formal-v2-pc.css"></noscript>
    <?php }
}

?>
<link rel="preload" href="<?= get_template_directory_uri()?>/css/icon-formal-rental.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/icon-formal-rental.css"></noscript>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
    wp_head();
?>
    <style>
        #toTop {
            width: 40px;
            bottom: 15px;
            cursor: pointer;
            font-size: 36px;
            position: fixed;
            right: 15px;
            text-align: center;
            z-index: 9999;
        }
    </style>
<script type="text/javascript">
    var base_url = "<?php echo Yii::app()->getBaseUrl() ?>",
	baseUrl = "<?php echo Yii::app()->getBaseUrl() ?>",
	language = "<?php echo Yii::app()->language ;?>",
	curLang = "<?php echo Yii::app()->language ;?>",
	mainMap  = "<?php echo Yii::t('wp_theme','リセット');?>",
    message_progress_bar_popup = "<?php echo Yii::t('booking', '読み込み中です。少々お待ちください。');?>";
</script>

<!-- style for /yukata -->

<?php if($is_yukata){
	/*
	<link rel="stylesheet" href="<?php echo get_template_directory_uri()  . '/css/booking_yukata.css' ?>" type="text/css" />
	*/
	wp_enqueue_style('yukata', get_template_directory_uri() . '/css/booking_yukata.css', array('twentytwelve-style'));

} ?>

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

    <?php if($postName == 'kurotomesode' or $postName == 'irotomesode') :?>
		<script type="text/javascript">
            if(!window._pt_sp_2){
                window._pt_lt = new Date().getTime();
                window._pt_sp_2 = [];
                _pt_sp_2.push("setAccount,505dxp43");
                var _protocol =(("https:" == document.location.protocol) ? " https://" : " http://");
                (function() {
                    var atag = document.createElement("script");
                    atag.type = "text/javascript";
                    atag.async = true;
                    atag.src = _protocol + "js.ptengine.jp/505dxp43.js";
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(atag, s);
                })();
            }
		</script>
    <?php endif;?>

	<?php if (in_array(basename($_SERVER['REQUEST_URI']), array('homongi', 'ubugi', 'kurotomesode', 'irotomesode', 'yukata', 'ginza-honten', 'sendagaya','hakata'))) : ?>
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

    <?php
    $shop_json_array = array (
        'ginza-honten' => '{
        	"@context": "http://schema.org",
			"@type": "LocalBusiness",
			"name": "着物レンタルwargo 銀座本店",
			"logo": "https://kyotokimono-rental.com/images/formal-rental/logo-ft-fm.svg",
			"image": "https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/07/banner-ginza-honten-202107-sp.jpg",
			"description": "銀座4丁目の交差点から徒歩1分♪安くて高品質なお着物を取り揃える『着物レンタルwargo』銀座本店は、GINZA SIX13階「THE GRAND GINZA」内にございます。着付け無料で小物も一式レンタル！!結婚式、七五三などの用途に合った着物からお好みなものをお選びいただけます。",
			"telephone": "+81 3-4582-4864",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "東京都中央区銀座6-10-1 GINZA SIX 13階「THE GRAND GINZA」内",
				"addressRegion": "東京都",
				"postalCode": "104-0061",
				"addressCountry": "日本"
			},
			"brand": "着物レンタルwargo",
			"url": "https://kyotokimono-rental.com/formal/access/tokyo-area/ginza-honten",
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
				"opens": "10:30",
				"closes": "17:30"
			}, {
				"@type": "OpeningHoursSpecification",
				"dayOfWeek": [
					"Saturday",
					"Sunday",
					"PublicHolidays"
				],
				"opens": "10:30",
				"closes": "17:30"
			}]
        }',
        'sendagaya' => '{
        	"@context": "http://schema.org",
			"@type": "LocalBusiness",
			"name": "着物レンタルwargo 明治神宮北参道店",
			"logo": "https://kyotokimono-rental.com/images/formal-rental/logo-ft-fm.svg",
			"image": "https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/03/top-banner-sp.jpg",
			"description": "明治神宮まで徒歩15分♪安くて高品質なお着物を取り揃える『着物レンタルwargo』明治神宮北参道店は、北参道駅から徒歩5分、鳩の森神社のそばにございます。着付け無料で小物も一式レンタル！七五三、お宮参り、お正月の初詣などの着物を種類豊富にご用意しています。原宿・千駄ヶ谷周辺の行事はお着物で素敵な思い出にしましょう。",
			"telephone": "+81 3-4582-4864",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "東京都渋谷区千駄ヶ谷3-20-12 1階",
				"addressRegion": "東京都",
				"postalCode": "151-0051",
				"addressCountry": "日本"
			},
			"brand": "着物レンタルwargo",
			"url": "https://kyotokimono-rental.com/formal/access/tokyo-area/sendagaya",
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
				"closes": "17:30"
			}, {
				"@type": "OpeningHoursSpecification",
				"dayOfWeek": [
					"Saturday",
					"Sunday",
					"PublicHolidays"
				],
				"opens": "10:00",
				"closes": "17:30"
			}]
        }',
        'hakata' => '{
        	"@context": "http://schema.org",
			"@type": "LocalBusiness",
			"name": "着物レンタルwargo 福岡博多店",
			"logo": "https://kyotokimono-rental.com/images/formal-rental/logo-ft-fm.svg",
			"image": "https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/04/banner-top-hakata-sp.jpg",
			"description": "櫛田神社まで徒歩7分♪安くて高品質なお着物を取り揃える『着物レンタルwargo』福岡博多店は、キャナルシティOPAセンターウォーク2階にございます。着付け無料で小物も一式レンタル！!七五三、成人式、結婚式のお呼ばれなどの用途に合った着物を種類豊富にご用意しております。大切な行事はお着物で素敵な思い出にしましょう。",
			"telephone": "+81 3-4582-4864",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "福岡県福岡市博多区住吉1-2 キャナルシティOPA「センターウォーク2階」",
				"addressRegion": "福岡県",
				"postalCode": "812-0018",
				"addressCountry": "日本"
			},
			"brand": "着物レンタルwargo",
			"url": "https://kyotokimono-rental.com/formal/access/tokyo-area/hakata",
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
				"opens": "10:30",
				"closes": "17:30"
			}, {
				"@type": "OpeningHoursSpecification",
				"dayOfWeek": [
					"Saturday",
					"Sunday",
					"PublicHolidays"
				],
				"opens": "10:30",
				"closes": "17:30"
			}]
        }'
    );

    if (array_key_exists($post_name, $shop_json_array)) {
        echo '<script type="application/ld+json">';
        echo $shop_json_array[$post_name];
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
	$body_class[] = 'ctrl-formal';
}
?>
<body <?php body_class($body_class); ?>>
<?php wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri(), null, '201906121447' ); ?>
<?php include(ABSPATH . 'gtag.php'); ?>
<div id="fb-root"></div>

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
        /*$header_cache_key = $isSmartPhone ? "header_formal_sp_{$lang}" : "header_formal_pc_{$lang}";
		$header = Yii::app()->cache->get($header_cache_key);
		// Detect if header by language cache does not exist
		if ($header == false) {
			// Init header
			$header = get_header_template(__DIR__, 'header_template_formal');
			Yii::app()->cache->set($header_cache_key, $header);
		}*/
        $header = get_header_template(__DIR__, 'header_template_formal_v2');

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
?>

<div id="bottomBar" style="display:none;">
    <img id="toTop" src="<?= WP_HOME ?>/images/formal-rental/top-btn-fm.svg"/>
</div>
<script>
            //Scroll top
            var t;
            $(function() {
                $(window).scroll(function() {
                    if($(this).scrollTop() != 0) {
                        $('#bottomBar').fadeIn();
                    }
                    else {
                        $('#bottomBar').fadeOut();
                    }
                });

                $('#toTop').click(function() {
                    $('body,html').animate({scrollTop:0},800);
                });

                $('#bottomBar').mouseover(function(){
                    clearTimeout(t);
                });
                $('#bottomBar').mouseout(function(){
                    setTimeout(function(){$('#bottomBar').fadeOut();}, 2500);
                });
                $(window).scroll(function() {
                    clearTimeout($.data(this, 'scrollTimer'));
                    t = $.data(this, 'scrollTimer', setTimeout(function(){$('#bottomBar').fadeOut();}, 2500));
                });

                <?php if ($isSmartPhone) : ?>
                $(".wrap-toggle-menu").click(function() {
                    if ($(".toggle-left-sidebar").is(':empty')) {
                        jQuery.ajax({
                            type: 'GET',
                            url: '/api/booking/getSidebar?is_sp=<?=$isSmartPhone ? 'true' : 'false'?>&post_name=<?=$post_name?>&post_parent=<?=$post_parent?>',
                            success: function (data) {
                                if (data != null && data != "") {
                                    $(".toggle-left-sidebar").html(data);
                                }
                            }
                        });
                    }
                });
                <?php endif; ?>

            }); </script>

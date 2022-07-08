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

$language = Yii::app()->language;


wp_deregister_script( 'jquery' );

global $kimono;
global $is_yukata;

$kimono = getTermData();

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
<script src="<?php echo WP_HOME; ?>/js/lib/lazyload.utils.js?v=12121" type="text/javascript"></script>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script defer src="<?php echo WP_HOME; ?>/js/jquery.lazyloadxt.js"></script>

<script type="text/javascript">
	var base_url = "<?php echo Yii::app()->getBaseUrl() ?>",
		baseUrl = "<?php echo Yii::app()->getBaseUrl() ?>",
		language = "<?php echo Yii::app()->language ;?>",
		curLang = "<?php echo Yii::app()->language ;?>",
		mainMap  = "<?php echo Yii::t('wp_theme','リセット');?>",
		shopTitleList = <?php echo json_encode(getListShopInAccess()) ?>,
        message_progress_bar_popup = "<?php echo Yii::t('booking', '読み込み中です。少々お待ちください。');?>";
</script>

<link rel="stylesheet" href="<?php echo WP_HOME; ?>/css/multi_lang.css" type="text/css" />

<!-- style for /yukata -->
<?php if($is_yukata){ ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri()  . '/css/booking_yukata.css' ?>" type="text/css" />
<?php } ?>

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

</head>
<?php
$class_lang = $language;
if(($language == 'ru' && !empty(Yii::app()->params['booking_page']))
    || in_array($language, array('th','id','ms', 'fr', 'hi'))){
    $class_lang .=' en';
}elseif($language == 'cn'){
    $class_lang .= ' tw';
}
$body_class = array($class_lang, 'ctrl-'.Yii::app()->controller->id, 'layout-kimono-sp');
if(is_page()){
	global $post; 
	$body_class[] = 'page-slug-'.$post->post_name;
}
ob_start();
Yii::app()->controller->widget('application.components.widgets.HeaderBooking', array());
$headerBooking =  ob_get_clean();
?>
<body <?php body_class($body_class); ?>>
<?php include(ABSPATH . 'gtag.php'); ?>
<div id="fb-root"></div>
<?php include ABSPATH.'ga.php';?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/eventTrackingAnalytics.js', null, array("defer"=>1));?>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion_async.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
		$('#arrowSmartphone').eventTrackingAnalytics({
			eventCategory: "ABTestKey",
			eventAction: "click navigation grid booking",
			eventLabel: 'B(trung)',
			unloaded: 'auto'
		});
		$('#footer_choose_date_sp').eventTrackingAnalytics({
			eventCategory: "ABTestKey",
			eventAction: "click navigation grid booking",
			eventLabel: 'A(Tu)',
			unloaded: 'auto'
		});
		// Track phone number clicks on a mobile website
		$('.tel, .phone, .calllink').eventTrackingPhoneNumber();
	});
</script>
<?php echo $headerBooking?>
<div id="page" class="hfeed site">
    <div id="sb-site">
	<div id="main" class="main-content clearfix">
		
		
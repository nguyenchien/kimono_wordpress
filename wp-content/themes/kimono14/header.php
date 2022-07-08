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
$detect = Yii::app()->mobileDetect;
$isSmartPhone = $detect->isSmartPhone();
$isTablet = $detect->isMobile() && $detect->isTablet();

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
<script src="<?php echo WP_HOME; ?>/js/lib/lazyload.utils.js" type="text/javascript"></script>
<style>
	<?php include Yii::getPathOfAlias('webroot').'/css/lazyload.utils.css' ?>
</style>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); /* ?>
<script defer src="<?php echo WP_HOME; ?>/wordpress/wp-content/plugins/wp-lightbox-2/wp-lightbox-2.min.js" type="text/javascript"></script>
<!--<script type='text/javascript' src='<?php //echo WP_HOME; ?>/wordpress/wp-content/plugins/bj-lazy-load/js/bj-lazy-load.js'></script>-->
<!--<script type='text/javascript' src='<?php //echo WP_HOME; ?>/wordpress/wp-content/plugins/bj-lazy-load/js/jquery.sonar.js'></script>-->
<script defer src="<?php echo WP_HOME; ?>/js/jquery.lazyloadxt.js"></script>
<?php */
	wp_enqueue_script('wp-lightbox', WP_HOME. '/wordpress/wp-content/plugins/wp-lightbox-2/wp-lightbox-2.min.js');
	wp_enqueue_script('lazyloadxt', WP_HOME. '/js/jquery.lazyloadxt.js');
	if (!$isSmartPhone){ // pc
		wp_enqueue_script('elevateZ', WP_HOME. '/js/jquery.elevateZoom-3.0.8.min.js#defer');
/*
	<script defer src="<?php echo WP_HOME; ?>/js/jquery.elevateZoom-3.0.8.min.js"></script>
*/ } ?>

<?php
	if($isSmartPhone){ //smartphone
?>

	<?php if (get_field('is_plan_page')):
        wp_enqueue_script('photoswipe', WP_HOME. '/js/photoswipe/photoswipe.min.js#defer');
        wp_enqueue_script('photoswipe-ui', WP_HOME. '/js/photoswipe/photoswipe-ui-default.min.js#defer');
        wp_enqueue_script('photoswipe-config', WP_HOME. '/js/photoswipe/photoswipe.config.js#defer');

        wp_enqueue_style('photoswipe',WP_HOME. '/css/photoswipe/photoswipe.css');
        wp_enqueue_style('default-skin',WP_HOME. '/css/photoswipe/default-skin.css');
	?>
	<?php endif;?>
<?php
	}
?>

<script type="text/javascript">
    var base_url = "<?php echo Yii::app()->getBaseUrl() ?>",
	baseUrl = "<?php echo Yii::app()->getBaseUrl() ?>",
	language = "<?php echo Yii::app()->language ;?>",
	curLang = "<?php echo Yii::app()->language ;?>",
	mainMap  = "<?php echo Yii::t('wp_theme','リセット');?>",
    shopTitleList = <?php echo json_encode(getListShopInAccess()) ?>,
    message_progress_bar_popup = "<?php echo Yii::t('booking', '読み込み中です。少々お待ちください。');?>";
</script>

	<?php wp_enqueue_style('multi-lang', WP_HOME . '/css/multi_lang.css', array('twentytwelve-style'), '20150601'); ?>
<!--<link rel="stylesheet" href="--><?php //echo WP_HOME; ?><!--/css/multi_lang.css" type="text/css" />-->

<!-- style for /yukata -->

<?php if($is_yukata){
	/*
	<link rel="stylesheet" href="<?php echo get_template_directory_uri()  . '/css/booking_yukata.css' ?>" type="text/css" />
	*/
	wp_enqueue_style('yukata', get_template_directory_uri() . '/css/booking_yukata.css', array('twentytwelve-style'));

} ?>
<script>
	$( document ).ready(function() {
		var $masthead = $('#masthead').clone();
		$masthead.find("#language_item_menu").html('{{language_item_menu}}');
	});
</script>

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
<?php include(ABSPATH . 'gtag.php'); ?>
<div id="fb-root"></div>

<script>
	$(function() {
		var theSubmenu = $('ul.sub-menu li ul.sub-menu').height();
		var theParentmenu = $('ul.sub-menu').height();
		if(theSubmenu >= theParentmenu)
		{
		$('.menu-top-kimono .container .main-navigation ul li.menu-kimono .sub-menu').css({
				'height' : theSubmenu,
			'padding-bottom': '15px'
		});
		}else{
			$('.menu-top-kimono .container .main-navigation ul li.menu-kimono .sub-menu.nav-submenu').css({
				'height' : theParentmenu,
				'padding-bottom': '15px'
			});
		}

		$('ul.sub-menu li ul.sub-menu').hover(function(){
			$(this).parent('li.ico-array').children('a').addClass('active');
		}, function(){
			$(this).parent('li.ico-array').children('a').removeClass('active');
		});
		//only touch device
		if(("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch)){
			//fix for layout ipad use menu PC
			var touch_menu = $('#menu-headermenuja, #menu-headermenuyukataja');
			touch_menu.on('touchstart','li.menu-item-has-children>a', function(e) {
				var now = new Date().getTime();
		       	var lastTouch = $(this).data('lastTouch') || now + 1; // get the last time user touch
		       	var delta = now - lastTouch;
		       	if(delta<300 && delta>0){ //if second touch > 300ms -> double touch
		            return true; // direct link
		       	}else{
		            e.preventDefault(); // return false link
					var current_tab = $(this).siblings('ul');
					var parent_tab = $(this).closest('.sub-menu');
					var parent_li = parent_tab.closest('li');
					var current_li = $(this).closest('li');
					//reset
					if(current_li.hasClass('menu_active')){
						if(!parent_li.hasClass('menu_active')){
							touch_menu.find('li.menu-item-has-children ul').css("visibility", "hidden");
							touch_menu.find('li').removeClass('menu_active');
						}else{
							current_tab.css("visibility", "hidden");
							current_li.removeClass('menu_active');
							parent_li.addClass('menu_active');
						}
					}else{
						touch_menu.find('li.menu-item-has-children ul').not(current_tab).css("visibility", "hidden");
						touch_menu.find('li').removeClass('menu_active');
						//color selector
						current_li.addClass('menu_active');
						parent_li.addClass('menu_active');
						//show tab
						parent_tab.css({"visibility": "visible"});
						current_tab.css({"visibility": "visible"});
					}

		       	}
		       	$(this).data('lastTouch', now); // save time
			});
			$( window ).scroll(function() {
				touch_menu.find('li.menu-item-has-children ul').css("visibility", "hidden");
				touch_menu.find('li').removeClass('menu_active');
			});
		}
	});

</script>
<?php include ABSPATH.'ga.php'; ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/eventTrackingAnalytics.js', null, array("defer"=>1));?>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion_async.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
		/*$('#arrowSmartphone').eventTrackingAnalytics({
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
		*/
	});
</script>
<div id="page" class="hfeed site">
    <div id="sb-site">
	<?php
		// Get Application language
		$lang = Yii::app()->language;
		// Get Language item menu
		$swe_generateLanguageCode = swe_generateLanguageCode();
		// Get header by cache
		$header = Yii::app()->cache->get("header_{$lang}");
		// Detect if header by language cache does not exist
		if ($header == false) {
			// Init header
			$tplName =  ($lang =='en' || $lang =='fr' || $lang =='id' || $lang =='th')?'_en':'';
			$header = get_header_template(__DIR__, "header_template$tplName" );
			Yii::app()->cache->set("header_{$lang}", $header);
		}

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
        echo $main_menu;
    }
	?>
        <div id="menu-wrap" class="clearfix">
			<div class="menu-top-kimono-sp clearfix" style="z-index: 10;">
				<?php
                //If SmartPhone Then render nav menu
                if ($isSmartPhone) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        //'menu'=>'HeaderMenuForSmartphone',
                        'menu' => $header_menu_sp,
                        'menu_class' => 'menu menu-left clearfix',
                        'container_class' => 'menu-lang-left clearfix'
                    ));
                }
				?>

            </div><!-- end menu-top-kimono-sp -->
        </div><!-- end menu-wrap -->

	<div id="main" class="main-content clearfix">


<?php
//	function get_header_template($lang) {
//		ob_start();
//		if($lang =='en' || $lang =='fr' || $lang =='id' || $lang =='th'){
//			require('header_template_en.php');
//		}else{
//			require('header_template.php');
//		}
//		return ob_get_clean();
//	}
?>
		<!-- Begin Bottom Bar -->
		<div id="bottomBar" style="display:none;">
			<a id="toCart" style="display:none;" href="/reserve/cart"><?php echo Yii::t('wp_theme', '予約画面に戻る');?></a>
        	<img id="toTop" src="<?=Yii::app()->getBaseUrl(true);?>/img/top_button.png"/>
		</div>
		<!-- End Bottom Bar -->
        <script type="text/javascript">
            //roll top
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
				// Check for Booking Session exist to display toCart button
				var isBookingSession = typeof readSessionCookie != "undefined" ? readSessionCookie('isBookingSession') : null;
				if (isBookingSession != null) {
					// Check for Cart relative page
					if (window.location.href.indexOf('/reserve/cart') !== -1 || window.location.href.indexOf('/highend/cart') !== -1 || window.location.href.indexOf('/payment') !== -1 || window.location.href.indexOf('/thankyou') !== -1) {
						// Not show in Cart relative page
						return;
					}
					// Change toCart button href for destination cart link
					var language = "<?php echo $language; ?>";
					$("#toCart").attr('href','/'+language+isBookingSession);
					// Display the toCart button
					$("#toCart").show();
				}

            }); </script>
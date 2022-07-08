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

$header_menu = 'MenuHeaderTakuhai';
$header_menu_sp = "MenuHeaderTakuhaiSP";

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

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
	
<script type="text/javascript">
    var base_url = "<?php echo WP_HOME; ?>",
	baseUrl = window.location.protocol + '//' + window.location.hostname,
	language = "<?php echo Yii::app()->language ;?>",
	curLang = "<?php echo Yii::app()->language ;?>",
	mainMap  = "<?php echo Yii::t('wp_theme','リセット');?>";
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
$body_class = array('ctrl-'.Yii::app()->controller->id, 'takuhai');
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
			var touch_menu = $('#menu-menuheadertakuhai');
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
<?php if ($_SERVER['SERVER_NAME']=='kyotokimono-rental.com') include ABSPATH.'ga.php';?>

<div id="page" class="hfeed site">
    <div id="sb-site">
	<?php
		// Get Application language
		$lang = Yii::app()->language;
		// Get Language item menu
		$swe_generateLanguageCode = swe_generateLanguageCode();
		// Get header by cache
		$header = Yii::app()->cache->get("header_takuhai_{$lang}");
		// Detect if header by language cache does not exist
		if ($header == false) {
			// Init header
			$header = get_header_template(__DIR__);
			Yii::app()->cache->set("header_takuhai_{$lang}", $header);
		}
		// Add-more text image
		$addmoretext = array('ja', 'vi', 'en', 'ko', 'ru');
		$addmoreen = '200text-'.$language;
		if(!in_array($language, $addmoretext)){
			$addmoreen = '200text-ja';
		}
		// Detect if is smartphone
		if($isSmartPhone){
			if(in_array($language, $addmoretext)){
				$addmoreen = '200text-mobile-'.$language;
			}
			else {
				$addmoreen = '200text-mobile-ja';
			}
		}
		// Replace header template params with values
		$search_array	= array("{{language_item_menu}}", "{{addmoreen}}");
		$replace_array	= array($swe_generateLanguageCode, $addmoreen);
		$header = str_replace($search_array, $replace_array, $header);
		// Render header
		echo $header;
	?>
	
	<?php
		// Get main menu by cache
//		$main_menu = Yii::app()->cache->get("{$header_menu}_{$lang}");
		// Detect if main menu by language cache exist
//		if ($main_menu == false) {
			// Init header
			$nav_menu  = wp_nav_menu( array('theme_location' => 'primary', 'menu' => $header_menu, 'menu_class' => 'nav-menu', 'echo' => false) );
			$main_menu = <<<MAIN_MENU
	<div class="menu-top-kimono clearfix">
		<div class="container clearfix">			
			<nav id="site-navigation" class="columns sixteen main-navigation" role="navigation">				
				$nav_menu
			</nav><!-- #site-navigation -->			
		</div><!-- end container -->
	</div><!-- end menu-top-kimono -->
MAIN_MENU;
		// Render main menu
		echo $main_menu;
	?>
	<div id="menu-wrap" class="clearfix">
		<div class="menu-top-kimono-sp" style="z-index: 10;">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu'=> $header_menu_sp,
				'menu_class' => 'menu menu-left',
				'container_class' => 'menu-lang-left'
			));
			?>
		</div><!-- end menu-top-kimono-sp -->
	</div><!-- end menu-wrap -->
	<div id="main" class="main-content clearfix">
          
<?php
//	function get_header_template() {
//		ob_start();
//		require('header_template.php');
//		return ob_get_clean();
//	}
?>
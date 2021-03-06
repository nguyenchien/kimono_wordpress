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
global $isSmartPhone,$isTablet, $language, $post;
$detect = Yii::app()->mobileDetect;
$isSmartPhone = $detect->isSmartPhone();
$isTablet = $detect->isMobile() && $detect->isTablet();

$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
wp_deregister_script( 'jquery' );
global $kimono;
global $is_yukata;

$kimono = getTermData();

$classEx = $isSmartPhone ? 'sp' : 'pc';

Yii::import('application.controllers.RsrcController');
$rsrc = new RsrcController(ResourceMasterValues::RM_KIMONO_TOP_SP_V3);
$basePath = substr(Yii::app()->basePath,0,-9);

// menu selection
$lang = array('tw','vi','en');
$header_menu = $is_yukata?'HeaderMenuYukataJA':'HeaderMenuJA';
$header_menu_sp = $is_yukata ? 'HeaderMenuForSmartphone_JA1': 'HeaderMenuForSmartphone_JA';
if(Yii::app()->language == 'ja'):
	$header_menu = $is_yukata?'HeaderMenuYukataNewPC':'HeaderMenuNewPC';
endif;
$currentLink = $_SERVER['REQUEST_URI'];
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

    <?php if($post && $post->post_type == "staff-blog" && is_single()): ?>
        <?php
        $shopTerms = wp_get_post_terms($post->ID, 'shop-blog');
        if ($shopTerms){
            foreach ($shopTerms as $shopTerm){
                if(!empty($shopTerm) && !empty($shopTerm->slug) && !empty(MasterValues::$MV_SHOP_SLUG_ID[$shopTerm->slug])){
                    $page = get_page_by_path(MasterValues::$MV_SHOP_SLUG[MasterValues::$MV_SHOP_SLUG_ID[$shopTerm->slug]], OBJECT, 'page');
                    $shopTile = getTranslateContent($page->post_title);
                    $shopTile = !empty($shopTile) ? strip_tags($shopTile) : Yii::t('wp_theme','shop_name_'.MasterValues::$MV_SHOP_SLUG_ID[$shopTerm->slug]);
                }
            }
        }
        $titleCustomShopBlog = $post->post_title.' | '.$shopTile.' | wargo';
        ?>
        <title><?php echo $titleCustomShopBlog; ?></title>
    <?php elseif($post && $post->post_type == "spot-post" && is_single()): ?>
        <?php
        $area_spot_map = array(
            'shizuoka-area-spot'=>'??????',

            'sendai-area-spot'=>'??????',

            'okayama-area-spot'=>'??????',
            'kurashiki-area-spot' => '??????',

            'kyoto-area-spot'=>'??????',
            'station-area-spot'=>'??????',
            'gion-area-spot'=>'??????',
            'kiyomizu-area-spot'=>'??????',
            'arashiyama-area-spot'=>'??????',
            'route-spot'=>'??????',

            'osaka-area-spot'=>'??????',

            'tokyo-area-spot'=>'??????',
            'asakusa-area-spot'=>'??????',
            'ginza-area-spot'=>'??????',
            'shinjuku-area-spot'=>'??????',

            'kanagawa-area-spot'=>'?????????',
            'kamakura-area-spot'=>'?????????',

            'kanazawa-area-spot'=>'??????',
            'fukuoka-area-spot'=>'??????',
            'sapporo-area-spot'=>'??????',
            'okinawa-area-spot'=>'??????',
        );

        // Get term primary
        $term_list = wp_get_post_terms($post->ID, 'spot-cate', ['fields' => 'all']);
        $term_primary = '';
        if($term_list){
            foreach($term_list as $term) {
                if( get_post_meta($post->ID, '_yoast_wpseo_primary_spot-cate',true) == $term->term_id ) {
                    $term_primary = $term->slug;
                }
                if($term_primary == ''){
                    $term_primary = $term->slug;
                }
            }
        }
        $bigAreaName = $area_spot_map[$term_primary] ? $area_spot_map[$term_primary] : '';

        $titleCustomSpotPost = $post->post_title.' | '.$bigAreaName.'??????????????????????????? | wargo';
        ?>
        <title><?php echo $titleCustomSpotPost; ?></title>
    <?php else: ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php endif; ?>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="icon" type="image/x-icon" href="<?php echo WP_HOME; ?>/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip76x76.png" sizes="76x76" />
    <link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip112x112.png" sizes="112x112" />
    <link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip120x120.png" sizes="120x120" />
    <link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip152x152.png" sizes="152x152" />
    <link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip180x180.png" sizes="180x180" />
    <link rel="apple-touch-icon" href="<?php echo WP_HOME; ?>/images/iconsite/webclip180x180.png" />
	<?php
        $url = parse_url($_SERVER['REQUEST_URI']);
        $url = $url['path'];
        $highgrade_url = '/'.$language.'/highgrade';
        if($language!='ja' && $url==$highgrade_url){
	?>
	<link rel="canonical" href="<?=WP_HOME.$highgrade_url;?>">
	<?php } ?>
    <meta name="msapplication-TileImage" content="<?php echo WP_HOME; ?>/images/iconsite/webclip144x144.png">
    <meta name="Referrer" content="origin">

    <?php
        $hasPost = wp_get_post_terms($post->ID, 'shop-blog');
    ?>
    <?php if($kimono['taxonomy'] && $kimono['taxonomy']=='shop-blog' && count($hasPost)==0) : ?>
    <meta name="robots" content="noindex" />
    <?php endif; ?>

    <?php if ( is_singular('news')): ?>
        <meta name="robots" content="noindex">
    <?php endif; ?>

    <?php if(strpos($currentLink, '/en/reserve') != -1 || strpos($currentLink, '/fr/reserve') != -1) : ?>
		<meta name="robots" content="noindex">
    <?php endif; ?>

    <script src="<?php echo WP_HOME; ?>/js/lib/lazyload.utils.js" type="text/javascript" defer="defer"></script>
<?php if ('kimono'==$post->post_name) : ?>
<script>
        var KimonoMessage = <?php echo json_encode(JsResources::jsMessage('booking_msg')); ?>;
    </script>
<?php endif; ?>
    <style>

        .bottom-header .wrap-lang-social.pc .wrap-social .social{
            width: 30px;
        }
        <?php include Yii::getPathOfAlias('webroot').'/css/lazyload.utils.css' ?>
        *{margin:0;padding:0;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}address,body,caption,cite,code,dd,dfn,dl,dt,form,h1,h2,h3,h4,h5,h6,li,ol,p,pre,table,td,th,ul,var{font-size:100%;font-style:normal;font-weight:400}h1,h2,h3,h4,h5,p,span,strong,var{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:'';content:none}table{border-collapse:collapse;border-spacing:0}a{color:#000;text-decoration:none}img{max-width:100%;height:auto;vertical-align:middle}input,select,textarea{border-radius:0;outline:0}input,textarea{border:1px solid #888}::-webkit-input-placeholder{color:#ccc}body{font-size:75%;font-family:"Noto Sans JP","????????????",Meiryo,"?????????????????? Pro W3",Arial,"Hiragino Kaku Gothic Pro","Lucida Grande",Verdana,"?????? ???????????????","MS PGothic",sans-serif}.container-box{width:100%;max-width:1200px;margin:0 auto;font-size:1.4rem}.row{padding:0 7px}.flexbox{display:-webkit-box;display:flex;display:-ms-flexbox}.align-items-center{-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-align-items:center}.align-items-start{-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-align-items:flex-start}.align-items-end{align-items:flex-end;-webkit-align-items:flex-end}.justify-content-center{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:center;-webkit-justify-content:center}.justify-content-between{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-webkit-justify-content:space-between}.text-left{text-align:left}.text-center{text-align:center}.text-right{text-align:right}.hidden-sidebar,.pc{display:none}.right-column-content,.wrap-boths-column .left-column{width:100%}.wrap-boths-column .right-column{-webkit-box-flex:1;-ms-flex:1;flex:1;max-width:100%}.fixed-body{overflow:hidden}.wrap-toggle-left-sidebar{display:none}#breadcrumbs{padding-top:4px;margin-bottom:5px}#breadcrumbs ol{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;line-height:1}#breadcrumbs ol .item-breadcrumbs,#breadcrumbs ol .item-breadcrumbs .separator{padding:0 7px}#breadcrumbs ol .item-breadcrumbs .link-breadcrumbs,#breadcrumbs ol .item-breadcrumbs .text-breadcrumbs,.separator{font-size:12px}.breadcrumbs-formal .separator,.breadcrumbs-formal ol .item-breadcrumbs .link-breadcrumbs,.breadcrumbs-formal ol .item-breadcrumbs .text-breadcrumbs{color:#c1a530}.breadcrumbs-kimono .separator,.breadcrumbs-kimono ol .item-breadcrumbs .link-breadcrumbs,.breadcrumbs-kimono ol .item-breadcrumbs .text-breadcrumbs{color:#000}@media (max-width:767px){.left-column-content,.wrap-boths-column .right-column{width:100%}.breadcrumbs-formal{font-size:12px;display:inline-block;padding:0;margin:5px 0}}@media (min-width:750px){.row{padding:0}.hidden-sidebar,.pc{display:block}.sp{display:none}.wrap-boths-column,.wrap-column-content{-ms-flex-wrap:nowrap;flex-wrap:nowrap}.right-column-content,.wrap-boths-column .left-column,.wrap-boths-column .left-column .wrap-list-banner .list-banner .image-banner{width:250px}#breadcrumbs{padding-top:15px;margin-bottom:5px}#breadcrumbs ol .item-breadcrumbs,#breadcrumbs ol .item-breadcrumbs .separator{display:flex}#breadcrumbs ol .item-breadcrumbs:first-of-type{padding-left:0}}
    </style>
    <?php
    $date = date('Ymd');
    $page_template_current = get_page_template();
    $page_template_name = basename($page_template_current, '.php');

    if($is_yukata){
        wp_enqueue_style( 'header-new-yukata-style' , get_template_directory_uri()  . '/css/header-new-yukata.css', array('twentytwelve-style'),$date);
        wp_register_style('footer-new-yukata-style', get_template_directory_uri() . '/css/footer-new-yukata.css', array('twentytwelve-style'));
        wp_enqueue_style('footer-new-yukata-style');
        wp_register_style('new-top-page-yukata-style', get_template_directory_uri() . '/css/new-top-page-yukata.css', array('twentytwelve-style'));
        wp_enqueue_style('new-top-page-yukata-style');
    }
    if($language != "ja"){
        wp_enqueue_style('header-new-kimono-style-'.$cssLanguage.'' , get_template_directory_uri()  . '/css/header-new-kimono'.$cssLanguage.'.css', array('twentytwelve-style'),$date);
        wp_register_style('footer-new-kimono-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/footer-new-kimono'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('footer-new-kimono-style'.$cssLanguage);
        wp_register_style('new-top-page-kimono-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-top-page-kimono'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('new-top-page-kimono-style'.$cssLanguage);
        wp_register_style('widget-top-shop-list-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/widget-top-shoplist'.$cssLanguage.'.css', array('twentytwelve-style'));
        wp_enqueue_style('widget-top-shop-list-style'.$cssLanguage);
    }
    //Inline Css if page is not common
    if(!strpos($currentLink, 'common')) {
        $cssContent = $isSmartPhone ? $rsrc->getCssContent(ResourceMasterValues::RM_KIMONO_TOP_SP_V3) : $rsrc->getCssContent(ResourceMasterValues::RM_KIMONO_TOP_PC_V3);
        echo "<style>$cssContent</style>";
    }
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
    wp_head();
	//wp_enqueue_script('lazyloadxt', WP_HOME. '/js/jquery.lazyloadxt.js');
?>
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
	mainMap  = "<?php echo Yii::t('wp_theme','????????????');?>",
    message_progress_bar_popup = "<?php echo Yii::t('booking', '??????????????????????????????????????????????????????');?>";
</script>

	<?php
        if(!is_front_page()){
            wp_enqueue_style('multi-lang', WP_HOME . '/css/multi_lang.css', array('twentytwelve-style'), '20150601');
        }
    ?>
<!--<link rel="stylesheet" href="--><?php //echo WP_HOME; ?><!--/css/multi_lang.css" type="text/css" />-->

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

<?php
$url = Yii::app()->request->url;
if (strpos($url, 'thankyou') == false) :
?>
<script>
if (!window.afblpcvLpConf) {
window.afblpcvLpConf = [];
}
window.afblpcvLpConf.push({
siteId: "2f997a87"
});
</script>
<script src="https://t.afi-b.com/jslib/lpcv.js?cid=2f997a87&pid=k10728E" async="async"></script>
<?php endif; ?>

<!-- Begin: Schema Markup -->
<?php
    $schemamarkup = get_post_meta(get_the_ID(), 'schemamarkup', true);
    if(!empty($schemamarkup)) {
        echo $schemamarkup;
    }
?>
<!-- End: Schema Markup -->

<!--Lucky Orange-->

<!--    --><?php
//    $isPageYukata = is_page('yukata');
//    $isPageYukataPlan = is_page('yukata/plan');
//    $isFrontPage = is_front_page();
//    $listPageTracking = array(
//    )
//    ?>
<!--    --><?php //if ($isPageYukataPlan):?>
<!--        <script type='text/javascript'>-->
<!--            window.__lo_site_id = 162815;-->
<!---->
<!--            (function() {-->
<!--                var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;-->
<!--                wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';-->
<!--                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);-->
<!--            })();-->
<!--        </script>-->
<!--    --><?php //endif;?>

<!--    End Lucky Orange-->
    <?php if (in_array(basename($_SERVER['REQUEST_URI']), array('kanazawa-kenrokuen','kanazawa','asakusa','kyotostation','gion-nishiki','ninenzaka','kiyomizuzaka','ito','osaka-shinsaibashi-opa','kyoto-area','osaka-area','shizuoka-area','kanazawa-area','tokyo-area'))) : ?>
		<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "FAQPage",
				"mainEntity": [{
					"@type": "Question",
					"name": "????????????????????????????????????????????????",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$????????????$"
					}
				}, {
					"@type": "Question",
					"name": "?????????????????????????????????????????????",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$????????????$"
					}
				}, {
					"@type": "Question",
					"name": "??????????????????????????????????????????",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$????????????$"
					}
				}, {
					"@type": "Question",
					"name": "?????????????????????????????????????????????",
					"acceptedAnswer": {
						"@type": "Answer",
						"text": "$????????????$"
					}
				}]
			}
		</script>
    <?php endif;?>
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
	$body_class[] = 'page-slug-'.$post->post_name;
}
?>
<body <?php body_class($body_class); ?>>
<?php include(ABSPATH . 'gtag.php'); ?>
<?php
wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri(), null, '201906121447' );
if($page_template_name == 'new-access-child-page-v2'){
    $cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/header-kimono-v2-'.$classEx.'.css');
    $cssContent .= file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-access-child-page-v2-first-view-'.$classEx.'.css');
    $cssContent .= $isSmartPhone ? $rsrc->getCssContent(ResourceMasterValues::RM_ACCESS_CHILD_SP_V2) : $rsrc->getCssContent(ResourceMasterValues::RM_ACCESS_CHILD_PC_V2);
    echo "<style>$cssContent</style>";
} else if($page_template_name == 'new-access-child-page') {
    $cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/header-kimono-v2-'.$classEx.'.css');
    $cssContent .= file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/new-access-first-view-'.$classEx.'.css');
    echo "<style>$cssContent</style>";
    if($isSmartPhone){?>
        <link rel="preload" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_ACCESS_CHILD_SP?>&ver=17022020" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_ACCESS_CHILD_SP?>&ver=17022020"></noscript>
        <?php
    } else{
        ?>
        <link rel="preload" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_ACCESS_CHILD_PC?>&ver=17022020" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true)?>/rsrc?page=<?php echo ResourceMasterValues::RM_ACCESS_CHILD_PC?>&ver=17022020"></noscript>
    <?php }
} else {
    wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'), '201803181649');
    wp_enqueue_style('new-formal-rental-style');
    wp_register_style('new-kimono-common-style', get_template_directory_uri() . '/css/new-kimono-common.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-common-style');
    $cssContent = file_get_contents($basePath . 'data/wordpress/wp-content/themes/twentytwelve/css/general-header-'.$classEx.'.css');
    echo "<style>$cssContent</style>";
    if($isSmartPhone){?>
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_COMMON_SP?>&ver=25022020" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_COMMON_SP?>&ver=25022020"></noscript>
        <?php
    } else{ ?>
        <link rel="preload" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_COMMON_PC?>&ver=25022020" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true)?>/rsrc?page=<?= ResourceMasterValues::RM_KIMONO_COMMON_PC?>&ver=25022020"></noscript>
    <?php }
}
if($language == 'ja' && $page_template_name != 'new-access-child-page-v2' && $page_template_name != 'new-access-child-page'){
    if(is_page('faq') || (!empty($parent_slug) && $parent_slug == 'faq') || is_page('howto')) {
        if (!is_front_page()) {
            wp_register_style('formal-letter-spacing-style', get_template_directory_uri() . '/css/formal-letter-spacing-ja.css', array('twentytwelve-style'));
            wp_enqueue_style('formal-letter-spacing-style');
        }
    }
    if(!is_front_page() && !$is_yukata && $post->post_name != 'kimono'){
        if($language == "ja") : ?>
            <link rel="preload" href="<?= get_template_directory_uri() ?>/css/kimono-letter-spacing-ja.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
            <noscript><link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/kimono-letter-spacing-ja.css"></noscript>
        <?php endif;
    }
}
?>
<?php
	    wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
?>
<div id="fb-root"></div>
<link rel="preload" href="<?= WP_HOME ?>/css/icon-formal-rental.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/icon-formal-rental.css"></noscript>
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
			$header = get_header_template(__DIR__, 'header_template_new_kimono');
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
<!--			<a id="toCart" style="display:none;" href="/newBooking/cart">--><?php //echo Yii::t('wp_theme', '?????????????????????');?><!--</a>-->
        	<img id="toTop" src="<?=Yii::app()->getBaseUrl(true);?>/img/top_button.png"/>
		</div>
		<!-- End Bottom Bar -->
        <script type="text/javascript">
            //roll top
            var t;
            $(function() {
                $('body').each(function(){
                    $('.left-column,.image-top-access').addClass('imagesLoaded');
                });
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
					if (window.location.href.indexOf('/reserve/cart') !== -1 || window.location.href.indexOf('/highend/cart') !== -1 || window.location.href.indexOf('/payment') !== -1 || window.location.href.indexOf('/thankyou') !== -1 || window.location.href.indexOf('/newBooking') !== -1) {
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

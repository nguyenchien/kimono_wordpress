<?php

define('SWE_PATH', get_template_directory_uri());
define('SERVER_PATH', get_template_directory());
define('COLUMN','column');
define('COURSE','course');
define('SPOT','spot');
define('OSAKA_SPOT','osaka-spot');
define('ASAKUSA_SPOT','asakusa-spot');
define('KAMAKURA_SPOT','kamakura-spot');
define('KANAZAWA_SPOT','kanazawa-spot');
define('COLUMN_YUKATA','column_yukata');
define('RESTAURANT','restaurant');
define('COLUMN_HAKAMA','column_hakama');
define('NOTATION','notation');
define('FAQ','faq');
define('MAMECHIYO','mamechiyo');
define('GALLERY','gallery');

define('HOWTOs','howto');
define('BLOG','blog');

define('SWE_HIDDEN_GROUP_MENU','--');



global $column_slugs, $homongi_slugs, $blogs, $blog_links, $column_links;
$blog_links = array("kimono","yukata",
    "january","february","march","april","may","june","july","august","september","october","november","december",
    "spring","summer","autumn","winter",
    "flowers","festivals","fireworks","autumn-leaves",
    "homongi","kurotomesode","irotomesode","furisode","hakama","iromuji","komon","obi",
    "wedding","coming-of-age","graduation","enter-school","753","shrine-visit-for-birth","tea-ceremony","theater-going");
$column_links = array(
    'kimono', 'homongi', 'tomesode', 'irotomesode', 'furisode', 'hakama', 'ubugi', 'mofuku', 'yukata',
    'kitsuke', 'obi', 'komono', 'hair-style', 'men',
    'wedding', 'coming-of-age', 'graduation', 'enter-school', '753', 'shrine-visit-for-birth', 'other'
);
$column_query_var = "";
$column_slugs = array(
	'category'=>array(COLUMN, COLUMN_YUKATA, COLUMN_HAKAMA),
	'spot-cate'=>array(SPOT, OSAKA_SPOT, ASAKUSA_SPOT,KAMAKURA_SPOT, KANAZAWA_SPOT),
	'page'=>array(COURSE, RESTAURANT)
);
$blogs = array(
	'ja'=>'blog',
	'en'=>'english-blog',
	'vi'=>'vietnamese-blog',
	'tw'=>'traditionalchinese-blog',
	'ko'=>'korean-blog',
	'ru'=>'russian-blog',
	'th'=>'thailand-blog',
	'id'=>'indonesia-blog',
    'ms'=>'malaysia-blog',
    'fr' => 'french-blog',
    'cn' => 'simplified-chinese-blog',
    'hi' => 'hindi-blog'
);

add_image_size( 'spot-thumb', 293, 218, true ); // (cropped)s

$homongi_slugs = array('homongi','kurotomesode','irotomesode','seijin','sotsugyou','shichigosan');

$temp_root = get_root_directory('include/plugin/shortcode-generator.php');
include_once($temp_root . 'include/plugin/shortcode-generator.php'); // shortcode

/*add_filter list*/
/*Source: http://wordpress.org/support/topic/mqtranslate-and-multilingual-seo-with-yoast-seo*/
// Enable qTranslate for WordPress SEO
if(defined("QT_MAX_SUPPORTED_WP_MAJOR_VERSION")) {
	function qtranslate_filter($text){
		return __($text);
	}
	add_filter('wpseo_title', 'qtranslate_filter', 10, 1);
	add_filter('wpseo_metadesc', 'qtranslate_filter', 10, 1);
	add_filter('wpseo_metakey', 'qtranslate_filter', 10, 1);
	add_filter('wpseo_opengraph_title', 'qtranslate_filter', 10, 1);
	add_filter('pop_most_viewed_content', 'qtranslate_filter', 10, 1);

}
// Enable qTranslate for acf
function theme_format_value_for_api($value) {
	return is_string($value) ? __($value) : $value;
}
add_filter('acf/format_value_for_api', 'theme_format_value_for_api');

function custom_excerpt_length($length) {
	if (get_blog_lang_code() == 'ja') {
		return 100;
	} else {
		return $length;
	}
}
add_filter('excerpt_length', 'custom_excerpt_length');

add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more( $more ) {
	return '';
}

/*action list*/
add_action('init', 'swe_add_excerpts_to_pages');
function swe_add_excerpts_to_pages() {
	add_post_type_support('page', 'excerpt');
}

//if(is_page('contactwp')||is_page('reserve')){
//	function theme_name_scripts() {		
		//wp_enqueue_style( 'simple-dtpicker', get_template_directory_uri(). '/css/jquery.simple-dtpicker.css');
		//wp_enqueue_script( 'simple-dtpicker', get_template_directory_uri() . '/js/jquery.simple-dtpicker.js', array(), '1.0.0', true );
//		wp_enqueue_style( 'contact-form7-confirm', get_template_directory_uri(). '/css/contact-form7-confirm.css');
//		wp_enqueue_script( 'contact-form7-confirm', get_template_directory_uri() . '/js/contact-form7-confirm.js', array(), '1.0.0', true );
		//die(111111);
//	}
//	add_action( 'wp_enqueue_scripts', 'theme_name_scripts' ,11);
	//}



/**
 *
 * @param type $post
 * @return boolean
 */
function isNewBlog($post) {
	$now = new DateTime();
	$post_date = new DateTime($post->post_date);
	$interval = $post_date->diff($now);
	//var_dump($post->post_date, $now);
	//echo $interval->format('%R%a days');
	$day = (int) $interval->format('%R%a');
	if ($day <= 3) {
		return true;
	}
	return false;
}
/**
 *
 * @param type $parent
 * @return type
 */
function getCategoriesInParent($parent) {
	$args = array(
		'type' => 'post',
		'child_of' => -1,
		'parent' => $parent,
		'orderby' => 'id',
		'order' => 'ASC',
		'hide_empty' => 0,
		'hierarchical' => 1,
		'exclude' => '',
		'include' => '',
		'number' => '',
		'taxonomy' => 'category',
		'pad_counts' => false
	);
	return $categories_child = get_categories($args);
}
/**
 * Get New posts of category_id
 * @param type $cate_id
 * @return type
 */
function getNewPostList($cate_id){
	$args = array(
		'numberposts' => 5,
		'offset' => 0,
		'category' => $cate_id,
//		'exclude' => get_the_ID(),
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish',
		'suppress_filters' => true);

	return $recent_posts = wp_get_recent_posts($args, OBJECT);
}
/**
 * Get child of page [column type]
 * @param type $parent_id
 * @param type $number
 * @return type
 */
function getChildPages($parent_id=-1, $number = "",$child_of = 0, $meta_key = "" , $meta_value = "" ){
	$args = array(
		'sort_column'   => 'menu_order',
		'sort_order' => 'ASC',
		//'sort_column' => 'post_date',
		'hierarchical' => $child_of ? 1 : 0,
		'exclude' => "",
		'include' => "",
		'meta_key' => $meta_key,
		'meta_value' => $meta_value,
		'authors' => '',
		'child_of' => $child_of ,
		'parent' => $child_of <= 0 ? $parent_id : -1,
		'exclude_tree' => '',
		'number' => $child_of > 0 ? "": $number,
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	);

	return get_pages($args);

}
function checkColumnPage($post = 0){

	if(empty($post)){
		if(!is_page()) return;
		global $post;
	}

	global $column_slugs;
	$current_page_id = $post->ID;
	$ancestors = get_ancestors($current_page_id, 'page');
	$slug = $post->post_name;
	$parent = $post->post_parent;

	if ($parent === 0) {
		// page level 1
		$parent = $current_page_id;
	} else {
		// page level 2
		if (count($ancestors) == 1) {
			$slug = get_page($ancestors[0])->post_name;
			if (count(getChildPages($current_page_id)) > 0) {
				$parent = $current_page_id;
			}

		} else {
			$slug = get_page($ancestors[1])->post_name;
			$parent = $ancestors[0];
		}
	}
	return array('slug'=>$slug, 'parent'=>$parent);
}

function the_h1($text = '', $class = ''){
	$h1 = '';
	if (is_page()){
		$the_h1 = 'is page';
		//$the_h1 = '<h1 class="'.$class.'">'.$text.'</h1>';
	}else{
		$the_h1 = $text;
	}
	return $the_h1;
}

//// hook social_broadcast_permalink
//add_action('social_broadcast_permalink', 'swe_social_broadcast_permalink');
//function swe_social_broadcast_permalink($url, $post, $obj) {
//    //var_dump($url, get_permalink($post->ID));die;
//    return $url;
//}


//function getGaleryFromPost($objpost) {
//	//    global $post;
//	$post_subtitrare = get_post($objpost->ID);
//	$content = $post_subtitrare->post_content;
//	$pattern = get_shortcode_regex();
//	preg_match("/$pattern/s", $content, $match);
//	if (isset($match[2]) && ( "gallery" == $match[2] )) {
//		$atts = shortcode_parse_atts($match[3]);
//		$attachments = isset($atts['ids']) ? explode(',', $atts['ids']) : get_children('post_type=attachment&post_mime_type=image&post_parent=' . $objpost->ID . '&order=ASC&orderby=menu_order ID');
//		return $attachments;
//		//var_dump($attachments);
//	}
//	return false;
//}
function getGaleryFromPost($post, $groupGallery = null) {
    $content = $post ? $post->post_content : get_the_content();
    $pattern = get_shortcode_regex();
    preg_match_all("/$pattern/s", $content, $match);
    $attachments = array();
    if(isset($match[2]) && $match[3]){
        foreach ($match[2] as $key => $m2) {
            if($m2 == "gallery"){
                $atts = shortcode_parse_atts($match[3][$key]);
				$att_group = !empty($atts['group']) ? $atts['group'] : '';
				$existGallery = is_array($atts) && count($atts) > 0 && (empty($groupGallery) || $att_group == $groupGallery);
				if ($existGallery) {
					$gallery = array();
					foreach ($atts as $katt => $vatt) {
						if ('ids' == $katt) {
							$gallery['ids'] = isset($atts['ids']) ? explode(',', $atts['ids']) : get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID . '&order=ASC&orderby=menu_order ID');
						} else {
							$gallery[$katt] = $vatt;
						}
					}
					$attachments[] = $gallery;
				}
            }
        }
    }
    return count($attachments)?$attachments:false;
}

//using: [ReserveStatus]
add_shortcode( 'ReserveStatus', 'ReserveStatus' );
function ReserveStatus($atts) {
    extract(shortcode_atts(array(
        'region' => 0,
        'shop_ids' => '',
	    'isPetit' => false,
	    'isPetitYukata' => false
    ), $atts));

    if(!empty($shop_ids)){
        if(!is_array($shop_ids)){
            $explodeIds = explode(',', $shop_ids);
            $shop_ids = array();
            foreach($explodeIds as $id){
                $id = (int) $id;
                if($id)
                    $shop_ids[] = $id;
            }
        }
    }else{
        $shop_ids = array();
    }

	$urlRedirect = null;
	global $pagename, $post;
	$isFormal = false;
	if($pagename == 'formal-kyototower'){
		$urlRedirect = 'reserve#travel';
		$isFormal = true;
	}
	$formalPage = get_page_by_path('formal');
	$isNewFormal = $formalPage->ID == $post->ID || $formalPage->ID == $post->post_parent;
    ob_start();
    Yii::app()->controller->widget('application.components.widgets.ReserveStatus', array(
        'region' => $region,
        'shop_ids' => $shop_ids,
	    'url_redirect' => $urlRedirect,
	    'isPetit' => $isPetit,
	    'isPetitYukata' => $isPetitYukata,
		'isFormal' => $isFormal,
        'isNewFormal' => $isNewFormal
    ));
	return ob_get_clean();
}

//using: [NewReserveStatus]
add_shortcode( 'NewReserveStatus', 'NewReserveStatus' );
function NewReserveStatus($atts) {
    extract(shortcode_atts(array(
        'selected_shop' => 0,
		'is_formal' => 0,
        'list_plan_ids' => ''
    ), $atts));
    if(empty($selected_shop)){
        return '';
    }else{
        if(!empty($list_plan_ids)){
	        $list_plan_ids = explode(',', $list_plan_ids);
        }else{
	        $list_plan_ids = array();
        }
	    if(!empty($listPlanIds)){
		    $list_plan_ids = explode(',', $listPlanIds);
	    }
        ob_start();
        Yii::app()->controller->widget('application.components.widgets.NewReserveStatus', array(
            'selectedShop' => (int) $selected_shop,
	        'isFormal' => $is_formal,
	        'listPlanIds' => $list_plan_ids,
        ));
        return ob_get_clean();
    }
}

//using: [NewReserveStatusCheckBooking]
add_shortcode( 'NewReserveStatusCheckBooking', 'NewReserveStatusCheckBooking' );
function NewReserveStatusCheckBooking($atts) {
    extract(shortcode_atts(array(
        'selected_shop' => 0,
        'is_formal' => 0,
        'list_plan_ids' => ''
    ), $atts));
    if(empty($selected_shop)){
        return '';
    }else{
        if(!empty($list_plan_ids)){
            $list_plan_ids = explode(',', $list_plan_ids);
        }else{
            $list_plan_ids = array();
        }
        if(!empty($listPlanIds)){
            $list_plan_ids = explode(',', $listPlanIds);
        }
        ob_start();
        Yii::app()->controller->widget('application.components.widgets.NewReserveStatusCheckBooking', array(
            'selectedShop' => (int) $selected_shop,
            'isFormal' => $is_formal,
            'listPlanIds' => $list_plan_ids,
        ));
        return ob_get_clean();
    }
}

//using: [PartyForm]
add_shortcode( 'PartyForm', 'PartyForm' );
function PartyForm($atts) {
	extract(shortcode_atts(array(
		'id' => null,
		'event_id' => null,
		'html_options' => array(),
		'thanks_you_url' => get_permalink(get_page_by_path('/event/thankyou'))
	), $atts));

	if(!empty($html_options)){
		$html_options = json_decode($html_options,true);
	}else{
        $html_options = array();
	}
	if(isset($_GET['event_id']))
		$event_id = (int) $_GET['event_id'];

	try{
		ob_start();
		Yii::app()->controller->widget('application.components.widgets.partyForm.PartyForm', array(
			'id' => !empty($id) ? $id : null,
			'htmlOptions' => $html_options,
			'eventId' => !empty($event_id) ? $event_id : null,
			'redirectToThanksYouUrl' => !empty($thanks_you_url) ? $thanks_you_url : null,
		));
		return ob_get_clean();
	}catch(Exception $e) {
		Yii::log('Shortcode [PartyForm] exception:'.$e->getMessage(), CLogger::LEVEL_ERROR);
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        get_template_part( 404 );
        exit();
	}

}

function stop_removing_tags($id){
	if($id > 0) {
		remove_filter('the_content', 'wpautop');
	}
}
add_shortcode( 'TopBlog_kimono', 'TopBlog_kimono' );
function TopBlog_kimono($attr,$content = null){
	$attr_shortcode = shortcode_atts(array(
		'customer_today' => 'on',
		'news' => 'on',
		'ranking' => 'on',
		'media' => 'on',
	),$attr);

	foreach ($attr_shortcode as $key => $item) {
		$shortcode[$key]=array(
			'display'=>$attr_shortcode[$key],
		);
	}
	// Set external content into shortcode's array
	$shortcode['topics'] = $content;

	ob_start();
	include(locate_template('include/top_blog.php'));
	//get_template_part('include/top_blog');
	return ob_get_clean();
}

/*
 *  Shortcode for Top News Highend
 * Use: [TopNewsHighEnd]
 */
add_shortcode('TopNewsHighEnd','TopNewsHighEndCode');
function TopNewsHighEndCode($attr,$content = null) {
    ob_start();
    include(locate_template('include/top_news_highend.php'));
    return ob_get_clean();
}

add_shortcode('TopNewsHighEndV3','TopNewsHighEndCodeV3');
function TopNewsHighEndCodeV3($attr,$content = null) {
    ob_start();
    include(locate_template('include/top_news_highend_v3.php'));
    return ob_get_clean();
}


/*
 *  Shortcode for Top News Takuhai
 * Use: [TopNewsTakuhai]
 */
add_shortcode('TopNewsTakuhai','TopNewsTakuhaiCode');
function TopNewsTakuhaiCode($attr,$content = null) {
    ob_start();
    include(locate_template('include/top_news_takuhai.php'));
    return ob_get_clean();
}

/*
 *  Shortcode for get top 5 product of formal category
 * Use:
 * [TopProductFormalCate id="5" plan_group=5 link="homongi" title="訪問着プラン"]
 * [TopProductFormalCate id="9" plan_group=9 link="hakama" title="袴・二尺袖プラン"]
 * [TopProductFormalCate id="8" plan_group=8 link="furisode" title="振袖プラン"]
 * [TopProductFormalCate id="6" plan_group=6 link="kurotomesode" title="黒留袖レンタル"]
 * [TopProductFormalCate id="7" plan_group=7 link="irotomesode" title="色留袖レンタル"]
 * [TopProductFormalCate id="10" plan_group=10 link="shichigosan" title="七五三プラン"]
 * [TopProductFormalCate id="21" plan_group=21 link="ubugi" title="産着プラン"]
 */
add_shortcode('TopProductFormalCate','TopProductFormalCateCode');
function TopProductFormalCateCode($attr,$content = null) {
    ob_start();
    $default = array(
        'id' => 'formal_search_form_'.time(),
        'plan_group' => null,
        'link'       => null,
        'title'      => null
    );
    $attrShortCode = shortcode_atts($default,$attr);
    include(locate_template('include/top_product_formal_cate.php'));
    return ob_get_clean();
}
add_shortcode('FormalTopPageCategories','FormalTopPageCategories');
function FormalTopPageCategories($attr,$content = null) {
    $default = array(
        'id' => 'formal_top_page_categories',
        'categories' => array(
            array( 'id'=>5,'plan_group'=>5,'title'=>"訪問着プラン",'link'=>'homongi'),
            //array( 'id'=>9,'plan_group'=>"9,17,18" ,'title'=>"袴・二尺袖プラン", 'link'=>"hakama"),
            array( 'id'=>8,'plan_group'=>8,'title'=>"振袖プラン",'link'=>'furisode'),
            array( 'id'=>21,'category_id'=>21,'title'=>"産着プラン",'link'=>'ubugi'),
            array( 'id'=>6,'plan_group'=>6,'title'=>"黒留袖レンタル",'link'=>'kurotomesode'),
            array( 'id'=>7,'plan_group'=>7,'title'=>"色留袖レンタル",'link'=>'irotomesode'),
            array( 'id'=>10,'plan_group'=>10,'title'=>"七五三プラン",'link'=>'shichigosan'),
            array( 'id'=>13,'plan_group'=>23,'title'=>"色無地レンタル",'link'=>'iromuji'),
            array( 'id'=>14,'plan_group'=>22,'title'=>"喪服・礼服レンタル",'link'=>'mofuku'),

        ),
        'productsPerCate' => Yii::app()->mobileDetect->isSmartPhone() ? 4 : 6,
        'enableLazyLoad' => false,
    );
    return Yii::app()->controller->widget( 'application.components.widgets.formal.FormalTopPageCategories', $default, true);
}

add_shortcode('TakuhaiTopPageCategories','TakuhaiTopPageCategories');
function TakuhaiTopPageCategories($attr,$content = null) {
    $default = array(
        'id' => 'formal_top_page_categories',
        'categories' => array(
            array( 'id'=>5,'plan_group'=>5,'title'=>"訪問着プラン",'link'=>'homongi'),
            //array( 'id'=>9,'plan_group'=>"9,17,18" ,'title'=>"袴・二尺袖プラン", 'link'=>"hakama"),
            array( 'id'=>8,'plan_group'=>8,'title'=>"振袖プラン",'link'=>'furisode'),
            array( 'id'=>24,'plan_group'=>24,'title'=>"浴衣プラン",'link'=>'yukata'),
            array( 'id'=>21,'category_id'=>21,'title'=>"産着プラン",'link'=>'ubugi'),
            array( 'id'=>7,'plan_group'=>7,'title'=>"色留袖レンタル",'link'=>'irotomesode'),
            array( 'id'=>10,'plan_group'=>10,'title'=>"七五三プラン",'link'=>'shichigosan'),
            array( 'id'=>13,'plan_group'=>23,'title'=>"色無地レンタル",'link'=>'iromuji'),
            array( 'id'=>14,'plan_group'=>22,'title'=>"喪服・礼服レンタル",'link'=>'mofuku'),
        ),
        'productsPerCate' => Yii::app()->mobileDetect->isSmartPhone() ? 4 : 6,
    );
    return Yii::app()->controller->widget( 'application.components.widgets.formal.FormalTopPageCategories', $default, true);
}

/*
 *  Short code for simple getting product of formal
 * Use:
 * [ProductsFormalSimpleWidget id="not_cate"] // filter all products
 * [ProductsFormalSimpleWidget id="6" plan_group=6 link="kurotomesode"] // filter by Kurotomesode 
 * [ProductsFormalSimpleWidget id="6_popup" plan_group=6 link="kurotomesode" is_popup=true] // product for popup
 */
add_shortcode('ProductsFormalSimpleWidget','ProductsFormalSimpleWidget');
function ProductsFormalSimpleWidget($attr) {
	ob_start();
	$default = array(
		'id' => 'formal_search_form_'.time(),
		'plan_group' => null,
		'link'       => null,
		'is_popup' => false
	);
	$attrShortCode = shortcode_atts($default,$attr);
	include(locate_template('include/product_formal_simple_widget.php'));
	return ob_get_clean();
}

/*
 *  Shortcode for get top 5 product of formal category
 * Use:
 * [TopProductFormalCate id="5" plan_group=5 link="homongi" title="訪問着プラン"]
 * [TopProductFormalCate id="9" plan_group=9 link="hakama" title="袴・二尺袖プラン"]
 * [TopProductFormalCate id="8" plan_group=8 link="furisode" title="振袖プラン"]
 * [TopProductFormalCate id="6" plan_group=6 link="kurotomesode" title="黒留袖レンタル"]
 * [TopProductFormalCate id="7" plan_group=7 link="irotomesode" title="色留袖レンタル"]
 * [TopProductFormalCate id="10" plan_group=10 link="shichigosan" title="七五三プラン"]
 */

/*
 *  Shortcode for TopNewFormalOptions
 * Use: [TopNewFormalOptions]
 */

add_shortcode('TopNewFormalOptions','TopNewFormalOptionsCode');
function TopNewFormalOptionsCode($attr,$content = null) {
	$default = array(
		'takuhai'=> null
	);
	$attrShortCode = shortcode_atts($default,$attr);
	ob_start();
	include(locate_template('include/top_new_formal_options.php'));
	return ob_get_clean();
}

/*
 *  Shortcode for FormalTopShoplist
 * Use: [FormalTopShoplist]
 */

add_shortcode('FormalTopShoplist','FormalTopShoplistCode');
function FormalTopShoplistCode($attr,$content = null) {
    $default = array(
        'takuhai'=> null
    );
    $attrShortCode = shortcode_atts($default,$attr);
    ob_start();
    include(locate_template('include/formal-shoplist-top.php'));
    return ob_get_clean();
}

/*
 *  Shortcode for New Kimono Top Topics
 * Use: [NewKimonoTopTopics]
 */
add_shortcode('NewKimonoTopTopics','NewKimonoTopTopicsCode');
function NewKimonoTopTopicsCode($attr,$content = null)
{
	ob_start();
	include(locate_template('include/new_kimono_top_topics.php'));
	return ob_get_clean();
}
/*
 *  Shortcode for Formal Sidebar Left
 * Use: [FormalSidebarLeft]
 * Use: [FormalSidebarLeft type=planlist]
 */
add_shortcode('FormalSidebarLeft','FormalSidebarLeftCode');
function FormalSidebarLeftCode($attr,$content = null) {
    ob_start();
    $isPlanList = isset($attr['type']) && $attr['type']=='planlist';
    include(locate_template('include/formal-sidebar-left.php'));
    return ob_get_clean();
}
add_shortcode('FormalSidebarLeftNewStyle','FormalSidebarLeftCodeNewStyle');
function FormalSidebarLeftCodeNewStyle($attr,$content = null) {
    ob_start();
    $isPlanList = isset($attr['type']) && $attr['type']=='planlist';
    include(locate_template('include/formal-sidebar-left-new-style.php'));
    return ob_get_clean();
}

add_shortcode('FormalSidebarLeftApi','FormalSidebarLeftApi');
function FormalSidebarLeftApi($attr,$content = null) {
    ob_start();
    $isPlanList = isset($attr['type']) && $attr['type']=='planlist';
    include(locate_template('include/formal-sidebar-left-api.php'));
    return ob_get_clean();
}

add_shortcode('KimonoSidebarLeftApi','KimonoSidebarLeftApi');
function KimonoSidebarLeftApi($attr,$content = null) {
    ob_start();
    include(locate_template('include/kimono-sidebar-left-api.php'));
    return ob_get_clean();
}

add_shortcode('KimonoTopSidebarLeftApi','KimonoTopSidebarLeftApi');
function KimonoTopSidebarLeftApi($attr,$content = null) {
    ob_start();
    include(locate_template('include/kimono-top-sidebar-left-api.php'));
    return ob_get_clean();
}

/*
 *  Shortcode for Howto Sidebar Left
 * Use: [HowtoSidebarLeft]
 */
add_shortcode('HowtoSidebarLeft','HowtoSidebarLeftCode');
function HowtoSidebarLeftCode($attr,$content = null) {
	ob_start();
	$default = array(
		'sp'=> null,
		'pc'=> null
	);
	$attrShortCode = shortcode_atts($default,$attr);
	include(locate_template('include/howto-sidebar-left.php'));
	return ob_get_clean();
}
/*
 *  Shortcode for Topics Banner Sidebar Left
 * Use: [TopicsBannerSidebarLeft]
 */
add_shortcode('TopicsBannerSidebarLeft','TopicsBannerSidebarLeftCode');
function TopicsBannerSidebarLeftCode($attr,$content = null) {
	ob_start();
	include(locate_template('include/topics-banner-sidebar-left.php'));
	return ob_get_clean();
}
/*
 *  Shortcode for Sightseeing Plan Sidebar Left
 * Use: [SightSeeingSidebarLeft]
 */
add_shortcode('SightSeeingSidebarLeft','SightseeingSidebarLeftCode');
function SightseeingSidebarLeftCode($attr,$content = null) {
	ob_start();
	include(locate_template('include/sight-seeing-sidebar-left.php'));
	return ob_get_clean();
}

/*
 *  Shortcode Shop List
 * Use: [ShopListNewKimono]
 */
add_shortcode('ShopListNewKimono','ShopListNewKimonoCode');
function ShopListNewKimonoCode($attr,$content = null) {
	ob_start();
	include(locate_template('include/shop-list-new-kimono.php'));
	return ob_get_clean();
}

/*
 *  Shortcode Widget Search Formal For Top Page
 * Use: [WidgetSearchFormalForTopPage]
 */
add_shortcode('WidgetSearchFormalForTopPage','WidgetSearchFormalForTopPageCode');
function WidgetSearchFormalForTopPageCode($attr,$content = null) {
    ob_start();
    include(locate_template('include/widget-search-formal-for-top-page.php'));
    return ob_get_clean();
}

/*
 *  Shortcode Widget Search Formal For Top Page V3
 * Use: [WidgetSearchFormalForTopPageV3]
 */
add_shortcode('WidgetSearchFormalForTopPageV3','WidgetSearchFormalForTopPageV3Code');
function WidgetSearchFormalForTopPageV3Code($attr,$content = null) {
    ob_start();
    include(locate_template('include/widget-search-formal-for-top-page-v3.php'));
    return ob_get_clean();
}

add_shortcode('WidgetSearchCategoryLandingPage','WidgetSearchCategoryLandingPage');
function WidgetSearchCategoryLandingPage($attr,$content = null) {
    ob_start();
    include(locate_template('include/widget-search-landing-category.php'));
    return ob_get_clean();
}

/*
 *  Shortcode Widget Search Formal For Kimono Landing Page
 * Use: [WidgetSearchFormalForKimonoLandingPage]
 */
add_shortcode('WidgetSearchFormalForKimonoLandingPage','WidgetSearchFormalForKimonoLandingPageCode');
function WidgetSearchFormalForKimonoLandingPageCode($attr,$content = null) {
    ob_start();
    include(locate_template('include/widget-search-formal-for-kimono-landing-page.php'));
    return ob_get_clean();
}

/*
 *  Shortcode for Ceremonial Sidebar Left
 * Use: [CeremonialSidebarLeft]
 */
add_shortcode('CeremonialSidebarLeft','CeremonialSidebarLeftCode');
function CeremonialSidebarLeftCode($attr,$content = null) {
	ob_start();
	include(locate_template('include/ceremonial-sidebar-left.php'));
	return ob_get_clean();
}
/*
 *  Shortcode for Popular Options Sidebar Left
 * Use: [PopularOptionsSidebarLeft]
 */
add_shortcode('PopularOptionsSidebarLeft','PopularOptionsSidebarLeftCode');
function PopularOptionsSidebarLeftCode($attr,$content = null) {
	ob_start();
	include(locate_template('include/popular-options-sidebar-left.php'));
	return ob_get_clean();
}
/*
 *  Shortcode New Kimono Options Sidebar
 * Use: [NewKimonoOptionsSidebar]
 */
add_shortcode('NewKimonoOptionsSidebar','NewKimonoOptionsSidebarCode');
function NewKimonoOptionsSidebarCode($attr,$content = null) {
	ob_start();
	include(locate_template('include/new-kimono-options-sidebar.php'));
	return ob_get_clean();
}
/*
 *  Shortcode Shop List Menu Access Top
 * Use: [ShopListMenuAccessTop]
 */
add_shortcode('ShopListMenuAccessTop','ShopListMenuAccessTopCode');
function ShopListMenuAccessTopCode($attr,$content = null) {
	ob_start();
	include(locate_template('include/shop-list-menu-access-top.php'));
	return ob_get_clean();
}

/*
 *  Shortcode Banner Topic Formal
 * Use: [FormalBannerTopic direction="left"]
 * Use: [FormalBannerTopic direction="left" custom="true"]
 * Use: [FormalBannerTopic direction="right"]
 */
add_shortcode('FormalBannerTopic','FormalBannerTopicCode');
function FormalBannerTopicCode($attr,$content = null) {
    ob_start();
    $default = array(
        'direction' => null,
        'custom'    => null
    );
    $attrShortCode = shortcode_atts($default,$attr);
    include(locate_template('include/formal-banner-topics.php'));
    return ob_get_clean();
}
/*
 *  Shortcode Banner Topic Formal
 * Use: [NewFormalBannerTopic direction="left"]
 * Use: [NewFormalBannerTopic direction="right"]
 */
add_shortcode('NewFormalBannerTopic','NewFormalBannerTopicCode');
function NewFormalBannerTopicCode($attr,$content = null) {
	ob_start();
	$default = array(
		'direction' => null,
		'device' => null,
		'menu-top-mobile'=> null
	);
	$attrShortCode = shortcode_atts($default,$attr);
	include(locate_template('include/new-formal-banner-topics.php'));
	return ob_get_clean();
}

/*
 *  Shortcode New Information Formal
 * Use: [NewInformationFormal]
 */
add_shortcode('NewInformationFormal','NewInformationFormalCode');
function NewInformationFormalCode($attr,$content = null) {
    ob_start();
    $default = array(
        'title' => null
    );
    $attrShortCode = shortcode_atts($default,$attr);
    include(locate_template('include/new-information-formal.php'));
    return ob_get_clean();
}

/*
 *  Shortcode New Arrival Formal
 * Use: [FormalNewArrival]
 */
add_shortcode('FormalNewArrival','FormalNewArrivalCode');
function FormalNewArrivalCode($attrs, $content = null) {
	$attrShortcode = shortcode_atts(array(
		'posts_per_page' => 6,
	), $attrs);

	$queryArgs = array(
		'post_type' => 'highend_info_notice',
		'pagination' => false,
		'post_status' => 'publish',
		'posts_per_page' => $attrShortcode['posts_per_page'],
		'order' => 'desc',
		'orderby' => 'date'
	);
	$query = new WP_Query($queryArgs);
	$posts = $query->posts;
	$productIds = array();
	$posts_tmp = array();
	// Get all product from all post contain product_id custom_field
	foreach($posts as $postItem) {
		$product_id = get_field('product_id', $postItem->ID);
		$posts_tmp[$product_id] = $postItem;
		if (!empty($product_id) && $product_id = (int)$product_id) {
			$productIds[] = $product_id;
		}
	}

	$productList = Product::getPublicProductsByIds($productIds,array(),false,array('planTypeHighend'));
	// Create product list
	$products = array();
	foreach ($posts as $postItem) {
		$product_id = get_field('product_id', $postItem->ID);

		foreach($productList as $product) {
            if ($product->product_id == $product_id) {
	            $products[]  = array(
		            'product_id' => $product_id,
		            'product_' => $product_id,
		            'main_image'       => $product->main_image,
		            'main_thumb_image' => $product->main_thumb_image,
		            'post' => $postItem
	            );
	            break;
            }
		}
	}

	ob_start();

	include(locate_template('include/formal-new-arrival.php'));
	$outputBuffer = ob_get_clean();

	return $outputBuffer;
}

/*
 *  Shortcode Column New Arrival
 * Use: [ColumnNewArrival]
 */
add_shortcode('ColumnNewArrival','ColumnNewArrivalCode');
function ColumnNewArrivalCode($attrs, $content = null) {

    //global $custom_post_type, $custom_taxonomies;
    $args = array();
    $defaults = array(
        'number_of_posts' => 5,
        'post_type' => array('post'),
        'order' => 'desc',
        'thumbnail_size' => 'thumbnail',
        'show_post_views' => true,
        'show_post_thumbnail' => false,
        'show_post_excerpt' => false,
        'no_posts_message' => __('No Posts', 'post-views-counter'),
        'item_before' => '',
        'item_after' => ''
    );

    $args = apply_filters('pvc_most_viewed_posts_args', wp_parse_args($args, $defaults));

    $args['show_post_views'] = (bool)$args['show_post_views'];
    $args['show_post_thumbnail'] = (bool)$args['show_post_thumbnail'];
    $args['show_post_excerpt'] = (bool)$args['show_post_excerpt'];

    $posts = pvc_get_most_viewed_posts(
        array(
            'posts_per_page' => (isset($args['number_of_posts']) ? (int)$args['number_of_posts'] : $defaults['number_of_posts']),
            'order' => (isset($args['order']) ? $args['order'] : $defaults['order']),
            'post_type' => (isset($args['post_type']) ? $args['post_type'] : $defaults['post_type']),
            'orderby' => 'post_date'
        )
    );

    ob_start();
    include(locate_template('include/column-new-arrival.php'));
    wp_reset_postdata();
    $outputBuffer = ob_get_clean();
    return $outputBuffer;
}

/*
 *  Shortcode Spot New Arrival
 * Use: [SpotNewArrival]
 */
add_shortcode('SpotNewArrival','SpotNewArrivalCode');
function SpotNewArrivalCode($attrs, $content = null) {

    //global $custom_post_type, $custom_taxonomies;
    $args = array();
    $defaults = array(
        'number_of_posts' => 5,
        'post_type' => array('spot-post'),
        'order' => 'desc',
        'thumbnail_size' => 'thumbnail',
        'show_post_views' => true,
        'show_post_thumbnail' => false,
        'show_post_excerpt' => false,
        'no_posts_message' => __('No Posts', 'post-views-counter'),
        'item_before' => '',
        'item_after' => ''
    );

    $args = apply_filters('pvc_most_viewed_posts_args', wp_parse_args($args, $defaults));

    $args['show_post_views'] = (bool)$args['show_post_views'];
    $args['show_post_thumbnail'] = (bool)$args['show_post_thumbnail'];
    $args['show_post_excerpt'] = (bool)$args['show_post_excerpt'];

    $posts = pvc_get_most_viewed_posts(
        array(
            'posts_per_page' => (isset($args['number_of_posts']) ? (int)$args['number_of_posts'] : $defaults['number_of_posts']),
            'order' => (isset($args['order']) ? $args['order'] : $defaults['order']),
            'post_type' => (isset($args['post_type']) ? $args['post_type'] : $defaults['post_type']),
            'orderby' => 'post_date'
        )
    );

    ob_start();
    include(locate_template('include/spot-new-arrival.php'));
    wp_reset_postdata();
    $outputBuffer = ob_get_clean();
    return $outputBuffer;
}

/*
 *  Shortcode List Product Popup
 * Use: [ListProductPopup]
 */
add_shortcode('ListProductPopup','ListProductPopupCode');
function ListProductPopupCode($attr,$content = null) {
	ob_start();
	include(locate_template('include/list-product-popup.php'));
	return ob_get_clean();
}

/*
 *  Shortcode List Banner Price Takuhai
 * Use: [ListBannerPriceTakuhai]
 */
add_shortcode('ListBannerPriceTakuhai','ListBannerPriceTakuhaiCode');
function ListBannerPriceTakuhaiCode($attr,$content = null) {
    ob_start();
    include(locate_template('include/list-banner-price-takuhai.php'));
    return ob_get_clean();
}

/*
 *  Shortcode Banner Topic Takuhai
 * Use: [TakuhaiBannerTopic]
 */
add_shortcode('TakuhaiBannerTopic','TakuhaiBannerTopicCode');
function TakuhaiBannerTopicCode($attr,$content = null) {
    ob_start();
    include(locate_template('include/takuhai-banner-topics.php'));
    return ob_get_clean();
}

/*
 *  Shortcode Widget Social Net Formal
 * Use: [SocialNetFormal]
 */
add_shortcode('SocialNetFormal','SocialNetFormalCode');
function SocialNetFormalCode($attr,$content = null) {
    ob_start();
    echo '<div class="wrap-social-net-fm">';
    if (function_exists('wp_social_bookmarking_light_output_e')){
        wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));
    }
    echo '</div>';
    return ob_get_clean();
}

/*
 *  Shortcode for Formal Sidebar Filter
 * Use: [FormalSidebarFilter]
 */
add_shortcode('FormalSidebarFilter','FormalSidebarFilterCode');
function FormalSidebarFilterCode($attr,$content = null) {
    ob_start();
    $isPlanList = isset($attr['type']) && $attr['type']=='planlist';
    include(locate_template('include/formal-sidebar-filter.php'));
    return ob_get_clean();
}
add_shortcode('Review_Furisode','Review_Furisode');
function Review_Furisode($attr,$content = null) {
	ob_start();
	include(locate_template('include/review_furisode.php'));
	return ob_get_clean();
}

add_shortcode('Hairset','Hairset');
function Hairset($attr,$content = null) {
	ob_start();
	include(locate_template('include/shortcode_hairset.php'));
	return ob_get_clean();
}

add_shortcode( 'TopBlog_yukata', 'TopBlog_yukata' );
function TopBlog_yukata($attr, $content = null){
	$attr_shortcode = shortcode_atts(array(
		'customer_today' => 'on',
		'news' => 'on',
		'ranking' => 'on',
		'media' =>'off'
	),$attr);

	foreach ($attr_shortcode as $key => $item) {
		$shortcode[$key]=array(
			'display'=>$attr_shortcode[$key],
		);
	}
	// Set external content into shortcode's array
	$shortcode['topics'] = $content;
	ob_start();
	include(locate_template('include/top_blog_yukata.php'));
	//get_template_part('include/top_blog_yukata');
	return ob_get_clean();
}

add_filter( 'wpseo_separator_options', 'yoast_add_sep' );
function yoast_add_sep() {
	return array('');
}


//die (get_site_url());
/*function qtranslate_menu_item( $menu_item ) {
//var_dump($menu_item);
    $menu_item->url = str_ireplace(array('http://localhost/kimono/data/','http://test.vtown.vn/dev/kimono/data/','/WP_HOME/'), WP_HOME . '/', $menu_item->url);
    if (stripos($menu_item->url, get_site_url()) !== false){
        $menu_item->url = qtrans_convertURL($menu_item->url);
    }
return $menu_item;
}
add_filter('wp_setup_nav_menu_item', 'qtranslate_menu_item', 0);*/

/* Menu filters */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	//var_dump($item);
	//$classes = array ();
	//if($item->url == get_permalink( get_option('page_on_front') )){ //Notice you can change the conditional from is_single() and $item->title
	//	$classes[] = "mnnav-icon-home";
	//}
	if($item->post_excerpt == SWE_HIDDEN_GROUP_MENU){ //Notice you can change the conditional from is_single() and $item->title
		$classes[] = "menu-group";
	}
	$language = Yii::app()->language;
	if ("ja" !== $language && $item->url == get_permalink( get_page_by_path( 'kimono' ))){ //Notice you can change the conditional from is_single() and $item->title
		$classes[] = "menu-kimono";
	}
	return $classes;
}

add_filter( 'wp_nav_menu_objects', 'submenu_limit', 10, 2 );
function submenu_limit( $items, $args ) {
	//var_dump($args, $items);
	if ( empty( $args->submenu ) ) {
		return $items;
	}
	$ids       = wp_filter_object_list( $items, array( 'url' => $args->submenu ), 'and', 'ID' );
	$parent_id = array_pop( $ids );
	$children  = submenu_get_children_ids( $parent_id, $items );

	if (!empty( $args->submenu_include_parent ) &&  $args->submenu_include_parent == true ) {
		$children = array_merge($children, array($parent_id));
	}

	foreach ( $items as $key => $item ) {
		if ( ! in_array( $item->ID, $children ) ) {
			unset( $items[$key] );
		}
	}
	return $items;
}

function submenu_get_children_ids( $id, $items ) {
	$ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );
	foreach ( $ids as $id ){
		$ids = array_merge($ids, submenu_get_children_ids( $id, $items ));
	}
	return $ids;
}

// Get column menu at footer (menu_name, class, link, get_menu_parent)
function get_menu_column_footer($menuname = 'primary', $menu_class = 'ft-getmenufollow', $submenu='', $submenu_include_parent){
	$args = array(
		'menu'      => $menuname,
		'menu_class'=> $menu_class,
		'submenu_include_parent'    => $submenu_include_parent,
		'submenu'   => $submenu
	);
	return wp_nav_menu( $args );
}


function override_mce_options($initArray) {

    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    //$initArray['custom_elements'] = $opts;
    //$initArray['indent'] = false;
    //$initArray['wpautop'] = true;
    //var_dump($initArray);die;
    return $initArray;
}

add_filter('tiny_mce_before_init', 'override_mce_options');

/*custom single post template
add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {		
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);*/

function getTemplatePart($slug = null, $name = null, array $params = array()) {
	global $wp_query;

	do_action("get_template_part_{$slug}", $slug, $name);

	$templates = array();
	if (isset($name)) {
		$templates[] = "{$slug}-{$name}.php";
	}
	$templates[] = "{$slug}.php";
	$_template_file = locate_template($templates, false, false);

	if (is_array($wp_query->query_vars)) {
		extract($wp_query->query_vars, EXTR_SKIP);
	}
	extract($params, EXTR_SKIP);

	require($_template_file);
}

function wpdbGetResults($query = null, $index = false, $output = OBJECT) {
	global $wpdb;
	$temp = $wpdb->get_results($query, $output);

	if ($index && $temp) {
		if ($output == OBJECT) {
			$results = array();
			foreach ($temp as $t) {
				$i = $t->$index;
				$results[$i] = $t;
			}
			return $results;
		} elseif ($output == ARRAY_A) {
			$results = array();
			foreach ($temp as $t) {
				$i = $t[$index];
				$results[$i] = $t;
			}
			return $results;
		}
		return $temp;
	}
	return $temp;
}
/*
function custom_field_seo_function($title, $sep = '|') {
	
	global $paged, $page, $post;
	$fieldSeo = get_post_meta($post->ID,'_yoast_wpseo_title');
	if(is_page() && !( is_home() || is_front_page() ))
	{
		$site_description = get_bloginfo( 'description', 'display' );
		if(!$fieldSeo){
			$title = get_the_title();
		}else{
			$title = $fieldSeo[0];
		}

		if ( $paged >= 2 || $page >= 2 ){
			$title .=" ".max($paged,$page);
		}

		if ( $site_description )
		{
			$title .=" $sep $site_description";
		}
	}
	return $title;
}

add_filter( 'wpseo_title', 'custom_field_seo_function', 11);*/

// wpseo_replacements - Allow hide page if first page of categories and pages
add_filter('wpseo_replacements' , 'category_pagein_title' );
function category_pagein_title($replacements){

	global $paged, $page;

	if(is_page() && !( is_home() || is_front_page() ) && max($paged, $page) > 1){
		$replacements['%%pagenumber%%'] = max($paged, $page);
	}

	if (!empty($replacements['%%pagenumber%%']) && $replacements['%%pagenumber%%'] == '1'){
		unset($replacements['%%pagenumber%%']);
	}

	return $replacements;
}

add_filter('rewrite_rules_array', 'mmp_rewrite_rules');
function mmp_rewrite_rules($rules) {
    $newRules  = array();
    // post_type spot-post
    $newRules['^blog/(.+)/(.+)\.html$'] = 'index.php?staff-blog=$matches[2]';
    $newRules['^blog/(.+)\.html$'] = 'index.php?staff-blog=$matches[1]';
    $newRules['^((english|vietnamese|traditionalchinese|simplified-chinese|korean|russian|thailand|indonesia|malaysia|french|hindi)-blog)/(.+)\.html$'] = 'index.php?staff-blog=$matches[3]';
    // taxonomy shop-blog
    $newRules['^((english|vietnamese|traditionalchinese|simplified-chinese|korean|russian|thailand|indonesia|malaysia|french|hindi)-blog)$'] = 'index.php?shop-blog=$matches[1]';
    $newRules['^blog/(.+)/page/?([0-9]{1,})/?$'] = 'index.php?shop-blog=$matches[1]&paged=$matches[2]';
    $newRules['^blog/page/?([0-9]{1,})/?$'] = 'index.php?shop-blog=blog,access&paged=$matches[1]';
    $newRules['^blog/(.+)/(feed|rdf|rss|rss2|atom)$'] = 'index.php?shop-blog=$matches[1]&feed=$matches[2]';
    $newRules['^blog/(feed|rdf|rss|rss2|atom)$'] = 'index.php?shop-blog=blog&feed=$matches[1]';
    $newRules['^blog/(.+)$'] = 'index.php?shop-blog=$matches[1]';
    $newRules['^blog$'] = 'index.php?shop-blog=blog,access';

    // new link for post_type staff-blog
    $newRules['^access/((.+)-area)/((.+)-area)/(.+)/blog/(.+)\.html$'] = 'index.php?staff-blog=$matches[6]';
    $newRules['^access/((.+)-area)/(.+)/blog/(.+)\.html$'] = 'index.php?staff-blog=$matches[4]';
    // Route for column page
//$newRules['^column/(feed|rdf|rss|rss2|atom)$'] = 'index.php?post_type=post&feed=$matches[1]';
//$newRules['^column/(feed|rdf|rss|rss2|atom)/rdf$'] = 'index.php?post_type=post&feed=rdf';
//    $newRules['^column/(.+)/page/?([0-9]{1,})/?$'] = 'index.php?s=$matches[1]&post_type=post&paged=$matches[2]';
//    $newRules['^column/((?!page)((?!\.html).)*)$'] = 'index.php?s=$matches[1]&post_type=post';

    // new link for taxonomy shop-blog with
    $newRules['^access/((.+)-area)/((.+)-area)/(.+)/blog$'] = 'index.php?shop-blog=$matches[5]';
    $newRules['^access/((.+)-area)/((.+)-area)/(.+)/blog/page/?([0-9]{1,})/?$'] = 'index.php?shop-blog=$matches[5]&paged=$matches[6]';
    $newRules['^access/((.+)-area)/((.+)-area)/(.+)/blog/(.+)/page/?([0-9]{1,})/?$'] = 'index.php?shop-blog=$matches[5]&s=$matches[6]&paged=$matches[7]&post_type=staff-blog';
    $newRules['^access/((.+)-area)/((.+)-area)/(.+)/blog/(feed|rdf|rss|rss2|atom)$'] = 'index.php?shop-blog=$matches[5]&feed=$matches[6]';
    $newRules['^access/((.+)-area)/((.+)-area)/(.+)/blog/(.+)$'] = 'index.php?shop-blog=$matches[5]&s=$matches[6]&post_type=staff-blog';
    $newRules['^access/((.+)-area)/(.+)/blog$'] = 'index.php?shop-blog=$matches[3]';
    $newRules['^access/((.+)-area)/(.+)/blog/page/?([0-9]{1,})/?$'] = 'index.php?shop-blog=$matches[3]&paged=$matches[4]';
    $newRules['^access/((.+)-area)/(.+)/blog/(.+)/page/?([0-9]{1,})/?$'] = 'index.php?shop-blog=$matches[3]&s=$matches[4]&paged=$matches[5]&post_type=staff-blog';
    $newRules['^access/((.+)-area)/(.+)/blog/(feed|rdf|rss|rss2|atom)$'] = 'index.php?shop-blog=$matches[3]&feed=$matches[4]';
    $newRules['^access/((.+)-area)/(.+)/blog/(.+)$'] = 'index.php?shop-blog=$matches[3]&s=$matches[4]&post_type=staff-blog';
    $newRules['^(.+)/blog$'] = 'index.php?shop-blog=$matches[1]';
    $newRules['^(.+)/blog/page/?([0-9]{1,})/?$'] = 'index.php?shop-blog=$matches[1]&paged=$matches[2]';

    // post_type spot-post
    $newRules['^spot/(.+)/(.+)/(.+)\.html$'] = 'index.php?spot-post=$matches[3]';
    $newRules['^spot/(.+)/(.+)\.html$'] = 'index.php?spot-post=$matches[2]';
    $newRules['^spot/(.+)\.html$'] = 'index.php?spot-post=$matches[1]';

    // taxonomy spot-cate
    $newRules['^spot/((.+)-area)/((.+)-area)/(.+)/(.+)/page/?([0-9]{1,})$'] = 'index.php?spot-cate=$matches[3]-spot&spot_meta_group=$matches[5]&spot_meta_child=$matches[6]&paged=$matches[7]';// paging - sub cate level 3, spot_filter level2
    $newRules['^spot/((.+)-area)/((.+)-area)/(.+)/page/?([0-9]{1,})$'] = 'index.php?spot-cate=$matches[3]-spot&spot_meta_group=$matches[5]&paged=$matches[6]';// paging - sub cate level 3, spot_filter level 1
    $newRules['^spot/((.+)-area)/((.+)-area)/page/?([0-9]{1,})$'] = 'index.php?spot-cate=$matches[3]-spot&paged=$matches[5]';// paging - sub cate level 3
    $newRules['^spot/((.+)-area)/(.+)/(.+)/page/?([0-9]{1,})$'] = 'index.php?spot-cate=$matches[1]-spot&spot_meta_group=$matches[3]&spot_meta_child=$matches[4]&paged=$matches[5]';// paging - sub cate level 3, spot_filter level2
    $newRules['^spot/((.+)-area)/(.+)/page/?([0-9]{1,})$'] = 'index.php?spot-cate=$matches[1]-spot&spot_meta_group=$matches[3]&paged=$matches[4]';// paging - sub cate level 3, spot_filter level 1
    $newRules['^spot/((.+)-area)/page/?([0-9]{1,})$'] = 'index.php?spot-cate=$matches[1]-spot&paged=$matches[3]';// paging - sub cate level 2
    $newRules['^spot/page/?([0-9]{1,})$'] = 'index.php?spot-cate=spot&paged=$matches[1]';// sub cate level 1
    $newRules['^spot/((.+)-area)/((.+)-area)/(.+)/(.+)$'] = 'index.php?spot-cate=$matches[3]-spot&spot_meta_group=$matches[5]&spot_meta_child=$matches[6]';// sub cate level 3, spot filter level 2
    $newRules['^spot/((.+)-area)/((.+)-area)/(feed|rdf|rss|rss2|atom)'] = 'index.php?spot-cate=$matches[3]-spot&feed=$matches[5]';// sub cate level 3, spot filter level 1
    $newRules['^spot/((.+)-area)/((.+)-area)/(.+)$'] = 'index.php?spot-cate=$matches[3]-spot&spot_meta_group=$matches[5]';// sub cate level 3, spot filter level 1
    $newRules['^spot/((.+)-area)/((.+)-area)$'] = 'index.php?spot-cate=$matches[3]-spot';// sub cate level 3
    $newRules['^spot/((.+)-area)/route/(feed|rdf|rss|rss2|atom)'] = 'index.php?spot-cate=route-spot&feed=$matches[3]';// sub cate level 2
    $newRules['^spot/((.+)-area)/(.+)/(.+)$'] = 'index.php?spot-cate=$matches[1]-spot&spot_meta_group=$matches[3]&spot_meta_child=$matches[4]';// sub cate level 2, spot filter level 2
    $newRules['^spot/((.+)-area)/route$'] = 'index.php?spot-cate=route-spot';// sub cate level 2
    $newRules['^spot/((.+)-area)/(feed|rdf|rss|rss2|atom)'] = 'index.php?spot-cate=$matches[1]&feed=$matches[3]';// sub cate level 2
    $newRules['^spot/((.+)-area)/(.+)$'] = 'index.php?spot-cate=$matches[1]-spot&spot_meta_group=$matches[3]';// sub cate level 2, spot filter level 1
    $newRules['^spot/((.+)-area)$'] = 'index.php?spot-cate=$matches[1]-spot';// sub cate level 2
    $newRules['^spot$'] = 'index.php?spot-cate=spot';// sub cate level 1

    // others
	$newRules['^lesson/news/(.+)\.html$'] = 'index.php?lesson-news=$matches[1]';
    // post_type event-post
	$newRules['^event/(.+)/(.+)\.html$'] = 'index.php?event-post=$matches[2]';
	$newRules['^event/(.+)\.html$'] = 'index.php?event-post=$matches[1]';

	$newRules['^event/(?!registration)(?!thankyou)(.+)/?$']      = 'index.php?event-cate=$matches[1]-event';
//	$newRules['^event/(.+)/?$']      = 'index.php?event-cate=$matches[1]-event';
//	$newRules['^blog/(.+)/?$']      = 'index.php?shop-blog=$matches[1]';
    // taxonomy event-cate
    return array_merge($newRules, $rules);
}
add_filter('term_link', 'term_link_filter', 10, 3);
function term_link_filter( $url, $term, $taxonomy ) {
	if(strpos($url, 'access')!== false && (substr($url,-4)==='area' || substr($url,-4)==='blog')){
		return $url;
	}elseif($taxonomy === 'spot-cate' && strpos($url, 'spot/')!== false){
        return str_replace('-spot','',$url);
    }else{
		$pattern = array('/\/event\/(.*)-event/i','/((.+)-area)\/(.*)/');
		$replacement = array('/event/$1','$1/$3/blog');
		$url = preg_replace($pattern, $replacement, $url);
		return $url;
	}
}
function post_type_link_filter( $url, $post ) {
	if ( 'event-post' == get_post_type( $post ) ) {
		$pattern = '/\/event\/(.*)-event\//i';
		$replacement = '/event/$1/';
		$url = preg_replace($pattern, $replacement, $url);
	}
	if ( 'staff-blog' == get_post_type( $post ) ) {
        $url = preg_replace(
                array('/\/access\/(.*)\/(.*).html/'),
                array('/access/$1/blog/$2.html'),
                $url);
    }if ( 'spot-post' == get_post_type( $post ) ) {
        $url = preg_replace(
            array('/\/spot\/((.*)-spot)\/((.*)-spot)\/(.*).html/', '/\/spot\/((.*)-spot)\/(.*).html/'),
            array('/spot/$2/$4/$5.html', '/spot/$2/$3.html'),
            $url);
    }return $url;
}
add_filter( 'post_type_link', 'post_type_link_filter', 10, 2 );
/* custom max 27 character for news */
function my_title_count(){
	global $post;
	$lang = get_blog_lang_code();
	if($post->post_type == 'staff-blog'):
	?>
<script>
	jQuery(document).ready(function () {
		setTimeout(limit_title, 2000);
		function limit_title() {
            if (jQuery("#limit_title").length == 0) {
                jQuery("#titlediv .inside").after("<div id=\"limit_title\" style=\"position:absolute;top:40px;right:-5px;\"></div>");
            }
            var lang = "<?=$lang;?>"; console.log(lang);
            var arr = {ja: 28, tw: 28, ko: 28, en: 60, vi: 28, ru: 28, th: 28, id: 60, ms: 60, fr: 60};
            if (jQuery("#limit_title").length) {
                jQuery('#limit_title').text("Max " + arr[lang] + " characters.");
            }
            jQuery("#title").attr('maxlength', arr[lang]);
		}
	});
</script>
<?php endif;

}
add_action( 'admin_head-post.php', 'my_title_count');
add_action( 'admin_head-post-new.php', 'my_title_count');
/* end custom max 27 character for news */
add_filter('rewrite_rules_array', 'remove_cate_rewrites');
function remove_cate_rewrites($rules){
    unset($rules["(osaka)/?$"]); // remove category route have slug 'osaka'
    unset($rules["(osaka)/?(:feed/)?(feed|rdf|rss|rss2|atom)/?$"]);

	unset($rules["(asakusa)/?$"]); // remove category route have slug 'osaka'
    unset($rules["(asakusa)/?(:feed/)?(feed|rdf|rss|rss2|atom)/?$"]);

	unset($rules["(event)/?$"]); // remove category route have slug 'osaka'
	unset($rules["(event)/?(:feed/)?(feed|rdf|rss|rss2|atom)/?$"]);

    foreach($rules as $k => $v){
		if(strpos($k,'(access')!== false){
			unset($rules[$k]);
		}
	}
	return $rules;

}
function getBlogsByOrder(){
	global $custom_taxonomies;
	$taxonomy = $custom_taxonomies['blog'];
	$blog = get_term_by('slug', 'blog', $taxonomy);
	$args = array('parent'=>$blog->term_id,'hide_empty'=>false );
	$shops = get_terms($taxonomy, $args);
	$re = array();
	foreach ($shops as $shop) {
		$order = get_field('blog_order', $shop);
		if($order){
			$re[$order] = $shop;
		}else{
			$re[] = $shop;
		}
	}
	ksort($re);
	unset($shops);
	return $re;
}
function get_cate_image_src($key, $term){
    global $sites;
    $cate_img = '';
    $cate_img_id = get_field($key, $term);
    $check_blog14 = $cate_img_id && checkPostIDInSiteMedia($cate_img_id);
    if($check_blog14) {
        switch_to_blog($sites['blog_media']);
    }
        $arr = swe_wp_get_attachment_image_src($cate_img_id, 'full');
        $cate_img = $arr[0];
    if($check_blog14) {
        restore_current_blog();
    }
    return $cate_img;
}
function getToppageTopics($html_id = 'topics', $echo = true){
	$id = get_option('page_on_front');
	$post = get_page($id);
	if($echo){
		echo swe_get_content_html($post->post_content,$html_id );
	}else{
		return swe_get_content_html($post->post_content,$html_id );
	}
}
function addBannerInColumnPage($echo=true, $show_in_lang = 'ja'){
	return false;
	/*$str = '<section class="banner clearfix"><a href="'. esc_url(home_url('reserve')).'" title="せっかくだから着物で観光!!京都・大阪・浅草で着物レンタルのご予約はこちら!"><img src="'. WP_HOME .'/images/column/column_banner.jpg'.'" alt="せっかくだから着物で観光!!京都・大阪・浅草で着物レンタルのご予約はこちら!" /></a></section>';
	if($show_in_lang != Yii::app()->language) return fasle;
	if($echo){
		echo $str;
	}
	else{
		return $str;
	}*/
}
function splitPostTitle($str, $echo = true){
	$arrStr = preg_split('/(?<!^)(?!$)/u', $str);
	$detect = Yii::app()->mobileDetect;
	$isSmartPhone = $detect->isSmartPhone();
	$isTablet = $detect->isTablet();
	if($isSmartPhone){
		if(mb_strlen($str) > 18){
			$str = implode('', array_slice($arrStr, 0, 17)).'…';
		}
	}else{
		if($isTablet){
			if(mb_strlen($str) > 21){
				$str = implode('', array_slice($arrStr, 0, 20)).'…';
			}
		}else{
			if(mb_strlen($str) > 28){
				$str = implode('', array_slice($arrStr, 0, 27)).'…';
			}
		}
	}
	if($echo){
		echo $str;
	}else{
		return $str;
	}
}
function getGroupBlog($page_slug= 'plan8', $title = false, $content="", $echo = true, $limit = 4) {
	ob_start();
	wp_reset_postdata();
    $language = Yii::app()->language;
	if(!$limit) $limit = 4;
	global $custom_post_type, $custom_taxonomies, $blogs;
	global $post;
	$taxonomy = $custom_taxonomies['blog'];
	$post_type = $custom_post_type['blog'];
	$args = array (
		'post_status'            => 'publish',
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'posts_per_page'		 => $limit
	);
	if($page_slug == 'plan_x') {//plan_x
		$cat_slug = 'planx_collaboration';
		$args['post_type'] = 'post';
		$args['category_name'] = $cat_slug;
	}
	else{
		$cat_slug = 'for'.$page_slug;
		$args['post_type'] = $post_type;
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => $cat_slug,
			),
			array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => $blogs[$language],
			),
		);
	}
	$the_query = new WP_Query($args);
	if ($the_query->have_posts()):
		?>
		<section class="block-for-top-page sec-blog wrapp-all-group-8">
			<?php echo $title!= false ? '<h3>'.$title.'</h3>' : ""; ?>
			<div class="wrap-blogtop">
				<?php
				$i = 1;
				while ($the_query->have_posts()):
					$the_query->the_post();
					$cats = wp_get_post_terms(get_the_ID(), $taxonomy, array("fields" => "all"));
					$re_cats = array();
					foreach($cats as $cat){
						$re_cats[] = $cat->slug;
					}
					?>
					<div data-cate="<?php echo implode(',',$re_cats); ?>" class="one-third column fl item-blog-top <?php echo ($i%4==0)?'last-pc':''; ?> <?php echo ($i%2==0)? 'last-sp' : '' ?>">
						<div class="image">
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
								<?php
								$attachment_id = get_post_thumbnail_id($post->ID);
								if (!empty($attachment_id)) {
									echo swe_wp_get_attachment_image($attachment_id, $size = array(367, 250), $icon = 1, $attr = array(
										'class' => 'attachment-block-top-blog wp-post-image '.$attachment_id,
										'id' => '',
										'alt' => get_the_title(),
									));
								}
								?>
							</a>
						</div>
						<div class="text">
							<p class="first-title clearfix">
								<?php if($cat_slug !== 'planx_collaboration' && $language=='ja'):
									$cate = get_category_permalink($post,$taxonomy);
									$category_data = get_category_data($cate) ;
								?>
								<a href='<?php echo get_term_link($cate->term_id, $taxonomy); ?>' title='<?php echo $category_data['name']; ?>' >
									<span class="shop-name <?php echo $category_data['class']; ?>"><?php echo $category_data['shop']; ?></span>
								</a>
								<?php endif; ?>
								<span class="date"><?php echo get_the_date('', $post->ID); ?></span>
							</p>
							<p class="title">
								<a href="<?php the_permalink() ?>" title="<?php the_title();?>"><?php splitPostTitle(get_the_title()); ?></a>
							</p>
						</div>
					</div><!-- end item -->
					<?php
					$i++;
				endwhile;
				?>
			</div>
			<div class="clearAll"></div>
			<?php echo $content ? $content : ""; ?>
			<div class="clearAll"></div>
		</section>
		<?php
	endif;
	wp_reset_postdata();
	$re = ob_get_clean();
	if ($echo) {
		echo $re;
	} else {
		return $re;
	}
}
//using: [GroupBlog cat_slug="" title=""][/GroupBlog]
add_shortcode( 'GroupBlog', 'GroupBlog' );
function GroupBlog($atts, $content) {
	extract(shortcode_atts(array(
		'title' => "",
	), $atts));
	$limit = 4;
	$echo = false;
	global $post;
	return getGroupBlog($post->post_name, $title, $content, $echo, $limit);
}
//using: [GroupBlogPlanx]
add_shortcode( 'GroupBlogPlanx', 'GroupBlogPlanx' );
function GroupBlogPlanx($attr, $content = null){
	global $post;
	//TODO: show list of blog of plan_x
	$args = shortcode_atts(array(
		'cat_slug' => 'planx_collaboration'
	),$attr);
	$cat_slug = $args['cat_slug'];
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$cat = get_category_by_slug($cat_slug);
	$category_limit = get_field('category_limit', $cat);
	ob_start();
	wp_reset_postdata();
	$args = array(
		'category_name' => $cat_slug,
		'post_type' => 'post',
		'posts_per_page'=>  $category_limit,
		'paged' => $paged
	);
	$blog_query = new WP_Query($args);
	if ($blog_query->have_posts()):?>
		<div class="sec-planx-blog">
			<p id="link-form-planx">これまでのコラボ事例をご紹介！</p>
			<?php while ($blog_query->have_posts()): $blog_query->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<p class="date forsp"><?php echo get_the_date(); ?></p>
						<h2 class="entry-title tn-blog-title">
							<?php echo (isNewBlog($post))? '<span>New</span>' : ''; ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>
					</header><!-- .entry-header -->
					<div class="entry-summary tn-blog-content-sort clearfix">
						<a href="<?php the_permalink(); ?>">
							<?php swe_the_post_thumbnail($post,'thumbnail', $attr = array('class'=>'forpc', 'alt'=>  strip_tags(get_the_title()))); ?>
							<?php swe_the_post_thumbnail($post,'full', $attr = array('class'=>'forsp','alt'=>  strip_tags(get_the_title()))); ?>
						</a>
						<p class="first-title">
							<?php echo get_the_date(); ?>
						</p>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" target="_blank" rel="bookmark">> <?php _e('続きを読む', 'twentytwelve'); ?></a>
						<div class="clearAll"></div>
					</div><!-- .entry-summary -->
				</article><!-- #post -->
				<?php
			endwhile;
			wp_pagenavi( array( 'query' => $blog_query ) );
			?>
			<p class="more-info">
				wargoと各企業・団体様とのコラボ事例、いかがでしたでしょうか？
				記念すべきイベントに着物をプラスすることにより、イベント全体に花が咲いたように明るく、華やかな雰囲気になります。話題づくりや思い出づくりに、ぜひお気軽に「プランX」をご利用ください。
			</p>
		</div>
		<?php
		wp_reset_postdata();
	endif;
	?>
	<div class="clearfix"></div>
	<?php
	$re = ob_get_clean();
	return $re;
}
add_filter( 'wpseo_breadcrumb_links', 'swe_wpseo_breadcrumb_links' );
function swe_wpseo_breadcrumb_links( $links ){
	global $post, $custom_post_type, $custom_taxonomies;

	if(is_single()&& get_post_type($post) === 'post'){
		$termData = getTermData();
		$taxonomy = $termData['taxonomy'];
		$cate = $termData['current_cate'];

		$is_planx_cate = false;
		if($cate->slug =='planx_collaboration'){
			$is_planx_cate = true;
		}
		foreach($links as $link){
			if(isset($link['term']) && $link['term']->term_id == $cate->term_id){
				if(!$is_planx_cate){
					return $links;
				}

			}
		}
		$new_links = array();
		$new_links[] = $links[0];
		if($is_planx_cate){
			$new_links[]['id'] = get_page_by_path('group')->ID;
			$new_links[]['id'] = get_page_by_path('group/plan_x')->ID;

		}else{
			if($cate -> parent > 0){
				$new_links[]['term'] = get_term($cate->parent, $taxonomy);
			}
			$new_links[]['term'] = $cate;
		}
		$new_links[] = end($links);
		$links = $new_links;

		return $links;
	}

	$planListSlug = MasterValues::planListSlug();

	// modify formal crumb_link
    if (!empty($post) && 'customer-remark' == $post->post_type) {
	    $termData = getTermData();
	    $cate = !empty($termData['current_cate'])? $termData['current_cate']: null;
        $customCrumbLinks = array();

        if (isset($planListSlug[$cate->slug])) {
            $newSlug = explode('-', $cate->slug);

            if(0 == count($newSlug)) {
                return $links;
            }

            $firstLink = $links[0];
            $firstLink['text'] = Yii::t('wp_them', '着物レンタルTOP');
            $firstLink['url'] = esc_url(home_url('formal'));
            $customCrumbLinks[] = $firstLink;
            $slug = end($newSlug);
            $customCrumbLinks[] = array(
                'text' => $planListSlug[$cate->slug],
                'url' => esc_url(home_url('formal/'.(('seijin' == $slug) ? 'furisode': $slug)))
            );
            $customCrumbLinks[] = array(
                'text' => $cate->name,
            );

            $links = $customCrumbLinks;
            return $links;
        }
    }

	global $blog_links;
    if ( (is_single() && !empty($post)&& get_post_type($post) == $custom_post_type['blog']) || ((is_search() || is_tax()) && get_query_var('taxonomy') === $custom_taxonomies['blog'] )) {
        $new_links = array();
        foreach ($links as $i => $link) {
            if (isset($link['term'])) {
                $term = $link['term'];
                $slug = $term->slug;
                $term_link = get_term_link($term);
                    if(strpos($term_link,'access')!== false){
                        if(substr($term_link,-4) === 'blog'){
                            $term_link = str_replace('/blog','',$term_link);
                        }
                        $new_links[] = array(
                            'text' => $term->name,
                            'url'=> $term_link,
                            'allow_html' => true
                        );
                    }else{
                        $new_links[] = $link;
                }
                if(strpos($term_link, 'access')!== false && substr($slug,-4) !=='area' && $slug !== 'access'){
                    $slug1 = str_replace('-','_', $slug);
                    $blog_name = Yii::t('wp_theme',$slug1.'_blog_name');
                    $allow_html = is_tax() ? false : true;
                    $new_links[] = array(
                        "text" => $blog_name,
                        "url" => get_term_link($term),
                        "allow_html" => $allow_html
                    );
                    if(is_search()){
                        $tax = get_query_var('taxonomy');
                        $shop = get_query_var($tax);
                        $uri = $_SERVER['REQUEST_URI'];
                        $blog_link = '';
                        foreach($blog_links as $v){
                            if(strpos($uri, $v) !== false){
                                $blog_link = $v;
                                break;
                            }
                        }
                        if(!empty($blog_link)){
                            $blog_name = Yii::t('wp_theme.blog',$shop.'_'.$blog_link.'_breadcrumbs_title');
                            $allow_html = is_search() ? false : true;
                            $new_links[] = array(
                                "text" => $blog_name,
                                "url" => get_term_link($term).'/'.$blog_link,
                                "allow_html" => $allow_html
                            );
                        }
                    }
                }
            }else{
                $new_links[] = $link;
            }
        }
        $links = $new_links;
    }

    // breadcrumbs for column page
    global $column_query_var;
    $column_parse_link = array(
        'kimono'=>'着物の豆知識',
        'homongi'=>'訪問着',
        'tomesode'=>'留袖',
        'irotomesode'=>'留袖',
        'furisode'=>'振袖',
        'hakama'=>'袴',
        'ubugi'=>'産着',
        'mofuku'=>'喪服',
        'yukata'=>'浴衣',
        'kitsuke'=>'着付け',
        'obi'=>'帯',
        'komono'=>'小物',
        'hair-style'=>'髪型',
        'men'=>'男性',
        'wedding'=>'結婚',
        'coming-of-age'=>'成人',
        'graduation'=>'卒業',
        'enter-school'=>'入学',
        '753'=>'七五三',
        'shrine-visit-for-birth'=>'宮参り',
        'other'=>'十三参り',
    );
    if (array_key_exists($column_query_var, $column_parse_link)) {
        if ( (is_single() && !empty($post)&& get_post_type($post) === 'post') || is_search()) {
            $new_links = array();
            $new_links[] = $links[0];
            $new_links[] = array(
                'text' => "着物の知識",
                'url'=> "/column",
                'allow_html' => true
            );
            if (array_key_exists($column_query_var, $column_parse_link)) {
                $new_links[] = array(
                    'text' => $column_parse_link[$column_query_var],
                    'url'=> "",
                    'allow_html' => true
                );
            }

            $links = $new_links;
        }
    }

    if(is_tax()){
        $taxonomy = 'spot-cate';
        $term = get_term_by('slug',get_query_var('spot-cate'), $taxonomy);
        $spot_cate = str_replace('-spot', '', get_query_var($taxonomy));
        $spot_meta_group = get_query_var('spot_meta_group');
        $spot_meta_child = get_query_var('spot_meta_child');
        if(!empty($spot_cate) && !empty($spot_meta_group)){
            if(!empty($spot_meta_group)){
                $links[] = array(
                    "text" => Yii::t('wp_theme.spot','spot_'.$spot_meta_group.'_name'),
                    "url" => get_term_link($term, $taxonomy).'/'.$spot_meta_group,
                    "allow_html" => !empty($spot_meta_child) ? true : false
                );
            }
            if(!empty($spot_meta_child)){
                $links[] = array(
                    "text" => Yii::t('wp_theme.spot','spot_'.$spot_meta_group.'_'.$spot_meta_child.'_name'),
                    "url" => get_term_link($term).'/'.$spot_meta_group.'/'.$spot_meta_child,
                    "allow_html" => false
                );
            }
        }
    }
    if(is_paged()){
        $paged = get_query_var('paged');
        $blog_name = Yii::t('wp_theme.blog','{paged}ページ目',array('{paged}' => $paged));
        $url = '';
        $allow_html = false;
        $links[] = array(
            "text" => $blog_name,
            "url" => $url,
            "allow_html" => $allow_html
        );
    }return $links;
}
function getColumnGroup($is_column = false){
	$column = get_category_by_slug(COLUMN);
	$cates = getCategoriesInParent($column->term_id);
	if($is_column){
		$re[] = $column->term_id;
	}
	foreach($cates as $cate){
		$re[]= $cate->term_id;
	}
	return $re;
}
function showColumnListInFooter($echo=true){
	global $homongi_slugs;
	global $post;
	ob_start();
	wp_reset_postdata();
//	 get 3 post column_yukata
	$html_yukata = '';
	$html_kimono = '';

//	if($cat = get_category_by_slug('column_yukata')){
//		$cat = $cat->cat_ID;
//		$args = array(
//			'cat' => $cat,
//			'showposts'=>3,
//			'post_status' => 'publish',
//			'orderby'   => 'date',
//			'order'    => 'DESC',
//		);
//
//		$the_query = new WP_Query( 'cat='.$cat.'&showposts=3' );
//
//		if ($the_query->have_posts()) {
//			while ($the_query->have_posts()) {
//			$the_query->the_post();
//			$html_yukata.= '<li>
//				<a href="'.get_the_permalink().'" title="'.get_the_title().'">
//					<p>'. get_the_title().'</p>
//				</a>
//			</li>';
//		}}
//	}


	wp_reset_postdata();
	// \column is page
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 5,
		'order' => 'DESC',
		'orderby' => 'date',
	);

	if(in_array($post->post_name, $homongi_slugs)){
		$args['category_name'] = $post->post_name.'-column';
	}
	elseif(is_single() && $post->post_type === 'post'){
		$args['category_name'] = COLUMN;
		$terms = wp_get_post_categories($post->ID);
		$cates = getColumnGroup(true);
		foreach($terms as $id){
			$cat = get_category($id);
			$arr = explode('-',$cat->slug);
			if(in_array($arr[0], $homongi_slugs)){
				$args['category_name'] = get_category($id)->slug;
				break;
			}
		}
	}
	if(empty($args['category_name'])){
		$args['category_name'] = COLUMN;
	}
	if (isset($args)){
		$my_query = new WP_Query($args);
		if($my_query->post_count == 0){
			$args['category_name'] = COLUMN;
			$my_query = new WP_Query($args);
		}
		if ($my_query->have_posts()) {
			while ($my_query->have_posts()) {
				$my_query->the_post();
				$html_kimono.= '<li>
				<a href="'.get_the_permalink().'" title="'.get_the_title().'">
					<p>'. get_the_title().'</p>
				</a>
			</li>';
			}
		}
	}

	?>
	<ul data-cat="<?php echo $args['category_name'];?>">
		<?php
		echo $html_yukata.$html_kimono;
		?>
	</ul>
<?php
	wp_reset_postdata();
	$re = ob_get_clean();
	if ($echo) {
		echo $re;
	} else {
		return $re;
	}
}

add_shortcode( 'hgprod', 'hgprod' );
function hgprod($attr){
	global $post;
	$attr_shortcode = shortcode_atts(array(
		'title' => null,
		'ids' => null,
		'color' => null,
		'material' => null,
		'limit' => null,
		'pagesize' => 12,
		'show_catalog' => null
	),$attr);
	$html = Yii::app()->controller->widget('application.components.widgets.highend.ListKimono', array(
		'args' => $attr_shortcode
	),true);

	$html = str_replace('wp/index',$post->post_name,$html);
	return $html;

}

add_shortcode( 'EventScheduleDesciption', 'getEventScheduleDesciption' );
function getEventScheduleDesciption($attr) {
	$attr_shortcode = shortcode_atts(array(
		'event_id'	=> null,
		'object'	=> 'scheduleDescription',
		'context'	=> 'list'
	),$attr);
	$html = Yii::app()->controller->widget('application.components.widgets.event.GetEvent', array(
		'args' => $attr_shortcode
	),true);

	return $html;
}

function showlistColumnBySlug($args = null)
{
	global $post, $column_slugs;
	ob_start();
	foreach ($column_slugs as $type => $arr) :
		foreach ($arr as $v) :
			if ($type === 'page') :
                if(is_single()):
                    $slug = $post->post_name;
                    $obj = get_page_by_path($v);
                    if ($obj && $slug !== $v) :
                        ?>
                        <li><a href="<?php echo get_permalink($obj->ID) ?>"
                               title="<?php echo get_the_title($obj->ID) ?>"><?php echo get_the_title($obj->ID) ?></a>
                        </li>
                        <?php
                    endif;
                endif;
			 else:
				$slug = !empty($args) ?  $args['current_cate']->slug : "";
				$obj = get_term_by('slug', $v, $type);
				if ($slug !== $v && $obj) :
					//Check lang current supported translate
                    $name = $obj->name;
                    ?>
                    <li>
                        <a href="<?php echo get_term_link($obj->term_id, $type) ?>" title="<?php echo $name;?>"><?php echo $name;?></a>
                    </li>
                    <?php
				endif;
			endif;
        endforeach;
	endforeach;
	$content = ob_get_clean();
	if (!empty($content)):
		?>
		<div class="links sidebar-item">
			<h3 class="title"><span><?php echo Yii::t('wp_theme', 'その他コラム') ?></span></h3>
			<div class="content">
				<ul>
					<?php echo $content; ?>
				</ul>
			</div>
		</div>
		<?php
	endif;
}
add_shortcode( 'imghgprod', 'imghgprod' );
function imghgprod($attr){
	$attr_shortcode = shortcode_atts(array(
		'ids' => null,
	),$attr);
	$html = Yii::app()->controller->widget('application.components.widgets.highend.ImgProducts', array(
		'args' => $attr_shortcode
	),true);

	return $html;

}

add_shortcode( 'filter_product', 'filter_product' );
function filter_product(){
	global $post;

	$map = array(
		5=>'homongi',
		6=>'kurotomesode',
		7=>'irotomesode',
		8=>'seijin',
		9=>'sotsugyou',
		10=>'shichigosan',
	);
	$map = array_flip($map);
//$_GET['group'] = $map[$post->post_name];
	$hasCart = HighendCart::hasCart();
//	var_dump($_GET['group'], $map[$post->post_name]);
	$html = Yii::app()->controller->widget( 'application.components.widgets.highend.SearchForm', array(
        'formHtmlOptions' => array(
            'id' => 'ajax_form',
        ),
		'hasBookingSession'=>$hasCart,//$hasBookingSession,
        'id' => 'highend_search_form',
		'enableAjax' => true,
		'idAjaxReturn'=>'ajaxListView', // id of the CListView
		'group' => array($map[$post->post_name])
	), true );
///wp/index?group=5
	$html = str_replace('wp/index',$post->post_name,$html);
	return $html;

}
//Product_by_shop
add_shortcode('product_by_shop','product_by_shop');
function product_by_shop ($attr){
    ob_start();
    $default = array(
        'id' => 'product_by_shop',
//        'plan_group' => null,
        'link'       => null,
        'title'      => null,
        'shop_id'    => null,
    );
    $attrShortCode = shortcode_atts($default,$attr);
    if(empty($attrShortCode['shop_id'])){
        return false;
    };
    include(locate_template('include/product_by_shop.php'));
    return ob_get_clean();
}

//Product_by_shop_v2
add_shortcode('product_by_shop_v2','product_by_shop_v2');
function product_by_shop_v2 ($attr){
    ob_start();
    $default = array(
        'id' => 'product_by_shop_v2',
        'plan_group' => null,
        'link'       => null,
        'title'      => null,
        'shop_id'    => null,
        'no_button'    => '',
    );
    $attrShortCode = shortcode_atts($default,$attr);
    if(empty($attrShortCode['shop_id'])){
        return false;
    };
    include(locate_template('include/product_by_shop_v2.php'));
    return ob_get_clean();
}

// [popular_product_by_groups group]
add_shortcode('popular_product_by_groups','popular_product_by_groups');
function popular_product_by_groups($attr){
    ob_start();
    $default = array(
        'shop_id'    => null,
        'groups'    => array(),
    );
    $attrShortCode = shortcode_atts($default,$attr);
    if(empty($attrShortCode['groups'])){
        return false;
    };
    if(is_string($attrShortCode['groups'])){
        $attrShortCode['groups'] = array_filter(explode(',', $attrShortCode['groups']));
    }else{
        $attrShortCode['groups'] = $default['groups'];
    }

    include(locate_template('include/popular_product_by_groups.php'));
    return ob_get_clean();
}

// [filter_formal_product planTypeIds='30,31']
add_shortcode( 'filter_formal_product', 'filter_formal_product' );
function filter_formal_product($attr){
    global $post;
    $default = array(
        'id' => 'formal_search_form',
        'search_result_container_id'=> null, // id of the CListView
        'plan_group' => array(),
        'plan_type_ids' => array(),
        'product_ids' => array(),
        'rental_takuhai_flag' => null,
        'rental_price' => array(),
        'product_periods' => array(),
        'product_season' => array(),
        'scene_id' => array(),
        'category_id' => array(),
        'pattern_id' => array(),
        'color' => array(),
        'product_size' => array(),
        'url' => get_page_uri($post),
        'enable_search_interface' => false,
        'limit' => null,
        'type' => null,
        'enable_lazy_load'=>false,
        'shop_id'=> null,
        'grades'=>array(),
        'sort' => null,
        'list_view_id' => 'ajaxListView',
        'display_preview'=>false,
        'show_filter' => 'true',
        'page_size' => 30,
        'hide_on_empty_container' => null,
	'display_pagination' => true,
	'from_height' => null
    );

    $attrShortCode = shortcode_atts($default,$attr);
    if(isset($attrShortCode['plan_group']) && is_string($attrShortCode['plan_group'])){
        $attrShortCode['plan_group'] = array_filter(explode(',', $attrShortCode['plan_group']));
    }else{
        $attrShortCode['plan_group'] = $default['plan_group'];;
    }
    if(isset($attrShortCode['plan_type_ids']) && is_string($attrShortCode['plan_type_ids'])){
        $attrShortCode['plan_type_ids'] = array_filter(explode(',', $attrShortCode['plan_type_ids']));
    }else{
        $attrShortCode['plan_type_ids'] = $default['plan_type_ids'];;
    }
    if(isset($attrShortCode['product_ids']) && is_string($attrShortCode['product_ids'])){
        $attrShortCode['product_ids'] = array_filter(explode(',', $attrShortCode['product_ids']));
    }else{
        $attrShortCode['product_ids'] = $default['product_ids'];
    }
    if(!isset($attrShortCode['rental_takuhai_flag'])){
        $attrShortCode['rental_takuhai_flag'] = $default['rental_takuhai_flag'];
    }
    if(isset($attrShortCode['rental_price']) && is_string($attrShortCode['rental_price'])){
        $attrShortCode['rental_price'] = array_filter(explode(',', $attrShortCode['rental_price']));
    }else{
        $attrShortCode['rental_price'] = $default['rental_price'];
    }
    if(isset($attrShortCode['product_periods']) && is_string($attrShortCode['product_periods'])){
        $attrShortCode['product_periods'] = array_filter(explode(',', $attrShortCode['product_periods']));
    }else{
        $attrShortCode['product_periods'] = $default['product_periods'];
    }
    if(isset($attrShortCode['product_season']) && is_string($attrShortCode['product_season'])){
        $attrShortCode['product_season'] = array_filter(explode(',', $attrShortCode['product_season']));
    }else{
        $attrShortCode['product_season'] = $default['product_season'];
    }

    if(!isset($attrShortCode['limit'])){
        $attrShortCode['limit'] = $default['limit'];
    }

    if(isset($attrShortCode['scene_id']) && is_string($attrShortCode['scene_id'])){
        $attrShortCode['scene_id'] = array_filter(explode(',', $attrShortCode['scene_id']));;
    }else{
        $attrShortCode['scene_id'] = $default['scene_id'];;
    }
    if(isset($attrShortCode['category_id']) && is_string($attrShortCode['category_id'])){
        $attrShortCode['category_id'] = array_filter(explode(',', $attrShortCode['category_id']));
    }else{
        $attrShortCode['category_id'] = $default['category_id'];
    }
    if(isset($attrShortCode['pattern_id']) && is_string($attrShortCode['pattern_id'])){
        $attrShortCode['pattern_id'] = array_filter(explode(',', $attrShortCode['pattern_id']));
    }else{
        $attrShortCode['pattern_id'] = $default['pattern_id'];
    }
    if(isset($attrShortCode['color']) && !is_string($attrShortCode['color'])){
        $attrShortCode['color'] = $default['color'];
    }
    if(isset($attrShortCode['product_size']) && is_string($attrShortCode['product_size'])){
        $attrShortCode['product_size'] = array_filter(explode(',', $attrShortCode['product_size']));
    } else {
        $attrShortCode['product_size'] = $default['product_size'];
    }
    if(isset($attrShortCode['id']) && !is_string($attrShortCode['id'])){
        $attrShortCode['id'] = $default['id'];
    }
    if(isset($attrShortCode['page_size']) && !is_string($attrShortCode['page_size'])){
        $attrShortCode['page_size'] = $default['page_size'];
    }
if(isset($attrShortCode['plan_type_id']) && !is_string($attrShortCode['plan_type_id'])){
        $attrShortCode['plan_type_id'] = $default['plan_type_id'];
    }
    if(isset($attrShortCode['search_result_container_id']) && !is_string($attrShortCode['search_result_container_id'])){
        $attrShortCode['search_result_container_id'] = $default['search_result_container_id'];
    }
    if(isset($attrShortCode['enable_search_interface'])){
        $attrShortCode['enable_search_interface'] = (boolean) $attrShortCode['enable_search_interface'];
    }
    if(isset($attrShortCode['grades']) && is_string($attrShortCode['grades'])){
        $attrShortCode['grades'] = array_filter(explode(',', $attrShortCode['grades']));
    }else{
        $attrShortCode['grades'] = $default['grades'];
    }
    if($attrShortCode['show_filter'] == 'false'){
        $attrShortCode['show_filter'] = (boolean) $attrShortCode['show_filter'];
    }
    if($attrShortCode['show_filter_new'] == 'false'){
        $attrShortCode['show_filter_new'] = (boolean) $attrShortCode['show_filter_new'];
    }
    if(isset($attrShortCode['display_pagination']) && $attrShortCode['display_pagination'] === 'false'){
        $attrShortCode['display_pagination'] = false;
    } else {
        $attrShortCode['display_pagination'] = true;
    }

    $widgetParams = array();
    foreach ($attrShortCode as $key => $value){
        $firstWord = substr($key, 0, 1);
        $key = str_replace(' ','',  ucwords(str_replace('_',' ',$key)));
        $key = substr_replace($key, $firstWord, 0, 1);
        if($key == 'color' && (int)$value != 0){
            $widgetParams[$key] = $value;
            $value = array_map('intval', explode(',', $value));
        }else{
            $widgetParams[$key] = $value;
        }
    }

//    var_dump($widgetParams);die;
    if ($attrShortCode['enable_lazy_load'] == true) {
        return Yii::app()->controller->widget('application.components.widgets.formal.FormalSearchForm', $widgetParams, true);
    } else {
        return Yii::app()->controller->widget('application.components.widgets.formal.FormalSearch', $widgetParams, true);
    }
}

add_shortcode( 'highend_custom_remark_posts', 'getHighendCustomRemarkPosts' );
function getHighendCustomRemarkPosts($attr){
	$attr_shortcode = shortcode_atts(array(
		'number' =>3,
		'cate_slug' => ''
	),$attr);

	$args_my_query = array(
		'post_type' => 'customer-remark',
		'posts_per_page' => $attr_shortcode['number'],
		'tax_query' => array( // filter following category slug
			array(
				'taxonomy' => 'customer-remark-tax', // taxonomy type
				'field' => 'slug', // filter following slug
				'terms' => $attr_shortcode['cate_slug'] // category slug name
			)
		)
	);

	$query = new WP_Query($args_my_query);

	ob_start();
	include(locate_template('include/customer_remark.php'));
	return ob_get_clean();
}

add_shortcode( 'highend_infor_notice_posts', 'getHighendInforNoticePosts' );
function getHighendInforNoticePosts($attr){
	$attr_shortcode = shortcode_atts(array(
		'number' =>4,
	),$attr);

	$args_my_query = array(
		'post_type' => 'highend-info-notice',
		'posts_per_page' => $attr_shortcode['number']
	);

	$query = new WP_Query($args_my_query);

	ob_start();
	include(locate_template('include/highend_information_notice.php'));
	return ob_get_clean();
}

/**
 * Move the posts count inside the link of the Archive and Category widgets of WordPress
 */
add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
	$links = str_replace('</a> (', ' (', $links);
	$links = str_replace(')', ')</a>', $links);
	return $links;
}

function customerRemarkTaxList($termIdCurrent = null){
	$args = array(
		'taxonomy' => 'customer-remark-tax'
	);
	$categories = get_categories($args);
	$sorted_cats = array();
	foreach($categories as $cat){
		$ordr = getTaxonomyField($cat, 'order'); // order must >= 1
		$sorted_cats[$ordr] = $cat;
	}
	ksort($sorted_cats);

	foreach ($sorted_cats as $key => $sorted_cat){
		$classCatCurrent = '';
		if($termIdCurrent == $sorted_cat->term_id){
			$classCatCurrent = ' current-cat';
		}
		echo '<li class="item-cate-right cat-item-' . $sorted_cat->term_id . $classCatCurrent. '">';
		echo '<a class="flexbox" href="'.get_term_link($sorted_cat).'"><span class="cate-name">'. $sorted_cat->name .'</span><span class="cate-number">('. $sorted_cat->count.')</span></a>';
		echo '</li>';
	}
}

add_shortcode( 'yesterday_customer_voices', 'getYesterdayCustomerVoices' );
function getYesterdayCustomerVoices($attr){
    global $post;
    $clientScript = Yii::app()->clientScript;
	$clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/mustache.js');
	$attr_shortcode = shortcode_atts(array(
		'number' =>0,
	),$attr);
    $shop_id = get_field( "shop_id", $post->ID);
	$args_my_query = array(
		'post_type' => 'yesterday-cust-voice',
		'meta_value' => $shop_id,
		'posts_per_page' => $attr_shortcode['number']
	);
	$query = new WP_Query($args_my_query);
	ob_start();
	include(locate_template('include/yesterday_customer_voice.php'));
	return ob_get_clean();
}
add_shortcode('sidebar_right_customer_voice','sideBarRightCustomerVoice');
function sideBarRightCustomerVoice($attr,$content = null){
        ob_start();
        include(locate_template('include/sidebar-right-customer-voice.php'));
        return ob_get_clean();
}
/*
 * Shortcode content for customer review by shop
 * Use: [customer_review_content]
 */
add_shortcode('customer_review_content','customer_review_content_func');
function customer_review_content_func($attr,$content = null){
    ob_start();
    include(locate_template('include/customer-review-content.php'));
    return ob_get_clean();
}
/*
* Shortcode content for customer review by shop FORMAL
* Use: [customer_review_content_formal]
*/
add_shortcode('customer_review_content_formal', 'customer_review_content_formal_func');
function customer_review_content_formal_func($attr,$content = null){
    global $post;
    $category_formal_name = array('homongi','irotomesode','furisode','hakama','shichigosan','monpuku', 'kurotomesode', 'ceremony');
    ob_start();
    if (in_array($post->post_name,$category_formal_name)) {
        include(locate_template('include/customer-review-content-formal-new.php'));
    } else {
        include(locate_template('include/customer-review-content-formal.php'));
    }
    return ob_get_clean();
}
/* Shortcode content for customer review v3 by shop FORMAL
* Use: [customer_review_content_formal_v3]
*/
add_shortcode('customer_review_content_formal_v3', 'customer_review_content_formal_func_v3');
function customer_review_content_formal_func_v3($attr,$content = null){
    ob_start();
    include(locate_template('include/customer-review-content-formal-v3.php'));
    return ob_get_clean();
}

/* Shortcode content for customer review shop
* Use: [customer_review_content_shop_v1]
*/
add_shortcode('customer_review_content_shop_v1', 'customer_review_content_shop_func_v1');
function customer_review_content_shop_func_v1($attr,$content = null){
    ob_start();
    include(locate_template('include/customer-review-shop-v1.php'));
    return ob_get_clean();
}

/*
* Shortcode content for customer review by shop SCENE
* Use: [customer_review_content_formal]
*/
add_shortcode('customer_review_content_scene', 'customer_review_content_scene_func');
function customer_review_content_scene_func($attr,$content = null){
    ob_start();
    include(locate_template('include/customer-review-content-scene.php'));
    return ob_get_clean();
}
/*
* Shortcode content for formal recommend spot
* Use: [formal_recommend_spot_v2]
*/
add_shortcode('formal_recommend_spot_v2', 'formal_recommend_spot_v2_func');
function formal_recommend_spot_v2_func($attr,$content = null){
    $attr_shortcode = shortcode_atts(array(
        'layout_mode' => ''
    ),$attr);
    ob_start();
    include(locate_template('include/formal-recommend-spot-v2.php'));
    return ob_get_clean();
}
/*
* Shortcode content for kimono recommend spot
* Use: [kimono_recommend_spot_v2]
*/
add_shortcode('kimono_recommend_spot_v2', 'kimono_recommend_spot_v2_func');
function kimono_recommend_spot_v2_func($attr,$content = null){
    $attr_shortcode = shortcode_atts(array(
        'layout_mode' => ''
    ),$attr);
    ob_start();
    include(locate_template('include/kimono-recommend-spot-v2.php'));
    return ob_get_clean();
}

add_shortcode('kimono_recommend_spot_v3', 'kimono_recommend_spot_v3_func');
function kimono_recommend_spot_v3_func($attr,$content = null){
    $attr_shortcode = shortcode_atts(array(
        'layout_mode' => ''
    ),$attr);
    ob_start();
    include(locate_template('include/kimono-recommend-spot-v3.php'));
    return ob_get_clean();
}
/*
* Shortcode content for kimono column
* Use: [kimono_column_v2]
*/
add_shortcode('kimono_column_v2', 'kimono_column_v2_func');
function kimono_column_v2_func($attr,$content = null){
    $attr_shortcode = shortcode_atts(array(
        'layout_mode' => ''
    ),$attr);
    ob_start();
    include(locate_template('include/kimono-column-v2.php'));
    return ob_get_clean();
}
add_shortcode('kimono_column_v3', 'kimono_column_v3_func');
function kimono_column_v3_func($attr,$content = null){
    $attr_shortcode = shortcode_atts(array(
        'layout_mode' => ''
    ),$attr);
    ob_start();
    include(locate_template('include/kimono-column-v3.php'));
    return ob_get_clean();
}

/*
 * Shortcode Group Category For Post
 * Use: [group_category_for_post]
 */
add_shortcode('group_category_for_post','group_category_for_post_func');
function group_category_for_post_func($attr,$content = null){
    ob_start();
    include(locate_template('include/group-category-for-post.php'));
    return ob_get_clean();
}

/*
 * Shortcode Group Category List Pages
 * Use: [group_category_list_pages]
 */
add_shortcode('group_category_list_pages','group_category_list_pages_func');
function group_category_list_pages_func($attr,$content = null){
    ob_start();
    include(locate_template('include/group-category-list-pages.php'));
    return ob_get_clean();
}

/*
 * Shortcode: Get list product formal from custom search column url
 * Use: [list_product_formal_from_column value={post_name}]
 */
add_shortcode('list_product_formal_from_column','list_product_formal_from_column_func');
function list_product_formal_from_column_func($attr,$content = null){

    $slugs = array(
        'hakama'=>'袴',
        'furisode'=>'振袖',
        'homongi'=>'訪問着',
        'ubugi'=>'産着',
        'irotomesode'=>'留袖',
    );

    $category_slugs = array(
        'homongi'=>'homongi-column',
        'ubugi'=>'ubugi-column',
        'furisode'=>'furisode-column',
        'hakama'=>'column_hakama',
        'irotomesode'=>array('irotomesode-column','kurotomesode-column'),
        'kurotomesode'=>'kurotomesode-column',
        'iro_tomesode'=>'irotomesode-column',
        'shichigosan'=>'shichigosan-column',
        'yukata'=>'column_yukata',
        'mofuku'=>'mofuku-column',
        'wedding'=>'kekkonshiki-column',
        'sotsugyoushiki'=>'sotsugyou-column',
        'seijinshiki'=>'seijin-column',
        'nyugakushiki'=>'nyugakushiki-column',
        'omiyamairi'=>'omiyamairi-column',
        'monpuku' => 'monpuku-column',
        'kids-hakama' => 'kids-hakama-column',
        'hairdressing' => 'hairdressing',
        'ceremony' => 'homongi-column',
    );

    $attr_shortcode = shortcode_atts(array(
        'value' => '',
        'category' => '',
    ),$attr);

    global $post;
    $arrayColumn = array(
        'homongi' => 4,
        'ubugi' => 4,
        'ubugi-lp' => 4,
        'kurotomesode' => 4,
        'irotomesode' => 4,
        'hakama' => 6,
        'furisode' => 6,
        'shichigosan' => 4,
        'kids-hakama' => 4,
        'ceremony' => 4,
    );
    $is_takuhai_yukata = is_page('takuhai/yukata');
    $is_yukata_plan = is_page('yukata/plan');
    $category = !empty($post->post_name) ? $post->post_name : $attr["category"];
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => ($is_takuhai_yukata || $is_yukata_plan) ? 6 : $arrayColumn[$category],
        'order' => 'DESC',
        'orderby' => 'date',
    );
    ob_start();
    if (!empty($attr_shortcode['value'])) {
        if (array_key_exists($attr_shortcode['value'], $category_slugs)) {
            $category = $category_slugs[$attr_shortcode['value']];
            $args['tax_query'] = array( // filter following category slug
                array(
                    'taxonomy' => 'category', // taxonomy type
                    'field' => 'slug', // filter following slug
                    'terms' => $category// category slug name
                )
            );
        }
        $my_query = pvc_get_most_viewed_posts($args);
        include(locate_template('include/list_product_formal_from_column.php'));
        wp_reset_postdata();
    }

    if (!empty($attr_shortcode['category'])) {
        $args['tax_query'] = array( // filter following category slug
            array(
                'taxonomy' => 'category', // taxonomy type
                'field' => 'slug', // filter following slug
                'terms' => $category_slugs[$attr_shortcode['category']]// category slug name
            )
        );
        $my_query = pvc_get_most_viewed_posts($args);
        include(locate_template('include/list_product_formal_from_column-new.php'));
        wp_reset_postdata();
    }


    return ob_get_clean();
}

	/**
	 * yesterday_customer_voices_full
	 */
add_shortcode( 'yesterday_customer_voices_full', 'getYesterdayCustomerVoicesFull' );
function getYesterdayCustomerVoicesFull($attr){
    global $post;
    $clientScript = Yii::app()->clientScript;
    $clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/mustache.js');
    $attr_shortcode = shortcode_atts(array(
        'number' =>0,
    ),$attr);

    $args = array(
        'post_type' => 'customer-remark',
        'posts_per_page' => $attr_shortcode['number'],
        'order'      => 'DESC',
        'orderby'    => 'date',
        'meta_query' => array(
	        'relation' => 'AND',
	        array(
		        'key' => 'product_id',
		        'value' => array(''),
		        'compare' => 'NOT IN'
	        )
        )
    );

	$query =  new WP_Query($args);
	$posts =  $query->posts;

	$productIds = array();

    // Get all product from all post contain product_id custom_field
	foreach($posts as $postItem) {
		$product_id = get_field('product_id', $postItem->ID);
		if (!empty($product_id) && $product_id = (int)$product_id) {
			$productIds[] = $product_id;
		}
	}

	$productModel = new Product();
	$productList = $productModel->with('planTypeHighend')->findAllByPk($productIds);

	foreach ($productList as $product) {
		$products[$product->product_id] = $product;
	}
    ob_start();
    include(locate_template('include/yesterday_customer_voice_full.php'));
    return ob_get_clean();
}

add_shortcode( 'yesterday_customer_voices_full_v2', 'getYesterdayCustomerVoicesFullV2' );
function getYesterdayCustomerVoicesFullV2($attr){
    global $post;
    $clientScript = Yii::app()->clientScript;
    $clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/mustache.js');
    $attr_shortcode = shortcode_atts(array(
        'number' =>0,
    ),$attr);

    $args = array(
        'post_type' => 'customer-remark',
        'posts_per_page' => $attr_shortcode['number'],
        'order'      => 'DESC',
        'orderby'    => 'date',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'product_id',
                'value' => array(''),
                'compare' => 'NOT IN'
            )
        )
    );

    $query =  new WP_Query($args);
    $posts =  $query->posts;

    $productIds = array();

    // Get all product from all post contain product_id custom_field
    foreach($posts as $postItem) {
        $product_id = get_field('product_id', $postItem->ID);
        if (!empty($product_id) && $product_id = (int)$product_id) {
            $productIds[] = $product_id;
        }
    }

    $productModel = new Product();
    $productList = $productModel->with('planTypeHighend')->findAllByPk($productIds);

    foreach ($productList as $product) {
        $products[$product->product_id] = $product;
    }
    ob_start();
    include(locate_template('include/yesterday_customer_voice_full_v2.php'));
    return ob_get_clean();
}

/* Begin: Yesterday Customer Voice Review */
// use: [yesterday_customer_voices_review shop_id=5]
add_shortcode( 'yesterday_customer_voices_review', 'getYesterdayCustomerVoicesReview' );
function getYesterdayCustomerVoicesReview($attr){
    $attr_shortcode = shortcode_atts(array(
        'number' => 100,
        'shop_id' => 0
    ),$attr);
    $args_my_query = array(
        'post_type' => 'yesterday-cust-voice',
	    'meta_query' => array(
		    array(
			    'key'     => 'shop_id',
			    'value'   => $attr_shortcode['shop_id'],
			    'compare' => 'IN',
		    ),
	    ),
        'posts_per_page' => $attr_shortcode['number']
    );
    $query = new WP_Query($args_my_query);
    ob_start();
    include(locate_template('include/yesterday_customer_voice_review.php'));
    return ob_get_clean();
}
/* End: Yesterday Customer Voice Review */

/* include lession function */
if (function_exists('get_root_directory')) {
	$temp_root = get_root_directory('include/include-script.php');
	include_once($temp_root . 'lesson/function.php');
}
/*get kimono/yukata/vip plan description translate*/
function get_plan_description($desc){
    return (preg_match('/plan_type_\d*/', $desc))?Yii::t('plan_type', $desc):$desc;
}
function set_blog_noindex($debug=false, $update){
    global $post, $wpdb;
    $args = array (
        'post_type'              => 'staff-blog',
        'post_status'            => 'publish',
        'shop-blog'            => 'blog',
        'date_query' => array(
            array(
                'column' => 'post_date',
                'before'    => array(
                    'year'  => 2017,
                    'month' => 1,
                    'day'   => 25,
                )
            ),
        ),
        'posts_per_page' => -1,
    );

    // The Query
    $the_query = new WP_Query( $args );
    $debug_str = 'SQL: '.$the_query->request.'<br>';
    $debug_str .= 'Post Count:'.$the_query->post_count.'<br>';
    $noindex_stt = "";
    // The Loop
    if ( $the_query->have_posts() ) {
        $i = 1;
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $id = get_the_ID();
            $_link = get_the_permalink();
            $link = str_replace(WP_HOMES,'',get_the_permalink()) ;
            $post_date = get_the_date('Y-m-d H:i:s');
            $sql = 'SELECT COUNT(*) FROM `blog_noindex_in` WHERE BINARY post_link = "'.$link.'"';
            $flag_index = $wpdb->get_var( $sql );
            //$debug_str .= 'Checking: '.$sql.'<br>';
            if($flag_index == 0){
                if($update){
                    update_post_meta( $id, '_yoast_wpseo_meta-robots-noindex', '1' );
                    $wpdb->insert('blog_noindex_out',array(
                        'post_id' => $id,
                        'post_link' => $link,
                        'post_date' => $post_date,
                        'flag_index' => true
                    ), array('%d', '%s', '%s', '%d' )
                    );
                    $noindex_stt = '<span style="background-color: green; color: white;">NO INDEX</span>';
                }
                $noIndex_number = $i;
                $debug_str .= '<strong>'.$i.'</strong> - <span style="background-color: yellow;">'.$post_date.'</span> - <a style="color: blue;" href="'.$_link.'" target="_blank">'.$link.'</a> '.$noindex_stt.'<br>';
                $i++;
            }else{
                $debug_str .= '<strong>#</strong> - <span style="background-color: yellow;">'.$post_date.'</span> - <a style="color: blue;" href="'.$_link.'" target="_blank">'.$link.'</a>  <span style="background-color: red; color: white;">EXIST</span><br>';
            }
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    }
    if($debug){ echo $debug_str;}
    if($update){ echo 'Done: Updated '.$noIndex_number.' blog to No Index<br>';}
    return true;
}
function swe_get_shop_access_image($shop_el, $echo = true){
    $html = '';
    if ($shop_el['has_post_gallery']) :
        $size = array(266, 150);
        $icon = 1;
        $listGalery = getGaleryFromPost($shop_el['post']);
        if (!empty($listGalery)):
            foreach ($listGalery as $galery) {
                $galery = $galery['ids'];
                if (!empty($galery) && count($galery) != 0) {
                    $attachment_id = $galery[0];
                    $attr = array(
                        'class' => 'attachment-' . implode('x', $size) . ' ' . $attachment_id,
                        'id' => '1_1_main',
                        'alt' => strip_tags($shop_el['title'])
                    );
                    $ok = swe_wp_get_attachment_image($attachment_id);
                    if (!empty($ok)) {
                        $html = swe_wp_get_attachment_image($attachment_id, $size, $icon, $attr);
                    }
                }
            }
        endif;
    else:
        if ($shop_el['has_post_thumbnail']) {
            $folder_name = 'access';
            $lang = yii::app()->language;
            $id = $shop_el['post_thumbnail_id'];
            $url_img = wp_get_attachment_url($id);
            $name_img = explode('/', $url_img);
            $name_img = explode('.', end($name_img));
            $img_ext = wp_check_filetype($url_img);
            if ($lang != 'ja') {
                $url_img = WP_HOME . "/images/" . $folder_name . "/{$name_img[0]}-{$lang}.{$img_ext['ext']}";
            }
            $html = '<img src="' . $url_img . '" alt = ' . strip_tags($shop_el['title']) . ' />';
        }
    endif;
    if($echo){
        echo $html;
    }else{
        return $html;
    }
}
function get_image_plan_by_order($post, $order=1, $size = 'thumbnail', $echo = false){
    $listGalery = getGaleryFromPost($post);
    if($listGalery[0]){
        foreach ($listGalery[0]['ids'] as $k => $galery) {
            if($k == $order){
                $icon = 1;
                $attr = array(
                    //	'src' => $src,
                    'class' => 'box-main-'. (is_array($size) ? implode('x', $size) : '').' attachment_id-'.$galery.' post_name-'. $post->name.' post_id-'.$post->ID,
                    'id'    => 'id_'.$galery,
//											'alt' => trim(strip_tags(get_post_meta($galery, '_wp_attachment_image_alt', true))),
                    'alt' => strip_tags(get_the_title()),
                );
                $re = swe_wp_get_attachment_image($galery, $size, $icon, $attr);
            }
        }
    }
    if($echo){
        echo $re;
    }else{
        return $re;
    }
}


//using: [datePickerC auto_filter = 1 date_picker_id = "" use_date = ""]
add_shortcode( 'datePickerC', 'datePickerC' );
function datePickerC($attr) {
	$attrShortcode = shortcode_atts(array(
		'auto_filter' => 0, // 0: not filter (submit), 1: filter (auto, not submit)
		'date_picker_id' => null,
		'use_date' => null,
		'on_select_event' => null
	),$attr);

	ob_start();
	include(locate_template('include/calendar_formal.php'));
	return ob_get_clean();
}

add_shortcode( 'searchBoxTopFormal', 'searchBoxTopFormal' );
function searchBoxTopFormal(){
    ob_start();
    include(locate_template('include/search_box_top_formal.php'));
    return ob_get_clean();
}

add_shortcode( 'searchBoxTopPageFormal', 'searchBoxTopPageFormal' );
function searchBoxTopPageFormal(){
	ob_start();
	include(locate_template('include/search_box_top_page_formal.php'));
	return ob_get_clean();
}

/**
 * Custom post type widget category
 */
if (true === class_exists('WP_Custom_Post_Type_Widgets_Categories')) {
	include_once 'widgets/we_custom_post_type_widgets_categories.php';
}

function we_categories_widget_register() {
	if (true === class_exists('WP_Custom_Post_Type_Widgets_Categories')) {
		unregister_widget('WP_Custom_Post_Type_Widgets_Categories');
		register_widget('We_Custom_Post_Type_Widgets_Categories');
	}
}

add_action( 'widgets_init', 'we_categories_widget_register');
add_filter('widget_display_callback','we_widget_custom_title',10,3);

function we_widget_custom_title($instance, $widget, $args) {
	$isModified = false;

    switch ($widget->id_base) {
        case 'custom-post-type-categories':
	        $args['before_title'] = $args['before_title'].wp_specialchars_decode('<span class="icon-prize"><img src="'.WP_HOME.'/images/formal-rental/icon-prize.svg"></span>'.$instance['title']);
	        $isModified = true;

            break;
        case 'custom-post-type-search':
	        $args['before_title'] = '';
	        $args['after_title'] = '';
	        $instance['title'] = '';

	        $isModified = true;

            break;
        case 'custom-post-type-archives':
	        $isModified = true;
	        $args['before_title'] = $args['before_title'].wp_specialchars_decode('<span class="icon-prize"><img src="'.WP_HOME.'/images/formal-rental/icon-prize.svg"></span>'.$instance['title']);

            break;
        case 'post_views_counter_list_widget':
        case 'custom-post-type-tag-cloud':
        case 'widget-count-posts':
            $isModified = true;
        $args['before_title'] = $args['before_title'].wp_specialchars_decode('<span class="icon-prize"><img src="'.WP_HOME.'/images/formal-rental/icon-prize.svg"></span>');

            break;
    }

    if ($isModified) {
	    $widget->widget($args, $instance);

	    return false;
    }

    return $instance;
}

/**
 * Post_Views_Counter_List_Widget
 */
if(file_exists(__DIR__ . '/widgets/we_post_views_counter_list_widget.php')) {
    require_once 'widgets/we_post_views_counter_list_widget.php';
    function we_post_views_counter_list_widget_register() {
        if (true === class_exists('WE_Post_Views_Counter_List_Widget')) {
            unregister_widget('Post_Views_Counter_List_Widget');
            register_widget('WE_Post_Views_Counter_List_Widget');
        }
    }
    add_action( 'widgets_init', 'we_post_views_counter_list_widget_register');
}
/**
 * Custom post type widget Search
 */
if(file_exists(__DIR__ . '/widgets/we_custom_post_type_search.php')) {
    include_once 'widgets/we_custom_post_type_search.php';
    function we_search_widget_register() {
        if (true === class_exists('We_Custom_Post_Type_Widgets_Search')) {
            unregister_widget( 'WP_Custom_Post_Type_Widgets_Search' );
            register_widget( 'We_Custom_Post_Type_Widgets_Search' );
        }
    }
    add_action( 'widgets_init', 'we_search_widget_register');
}
/**
 * Custom post type widget Archive
 */
if (true === class_exists('We_Custom_Post_Type_Widgets_Search')) {
	include_once 'widgets/we_custom_post_type_archive.php';
}
function we_custom_post_type_archive() {
	if (true === class_exists('We_Custom_Post_Type_Widgets_Search')) {
		unregister_widget( 'WP_Custom_Post_Type_Widgets_Archives' );
		register_widget( 'We_Custom_Post_Type_Widgets_Archives' );
	}
}

add_action( 'widgets_init', 'we_custom_post_type_archive');


add_shortcode( 'dynamic_new_formal_customer_voice', 'dynamic_new_formal_customer_voice' );
/**
 * Using: [dynamic_new_formal_customer_voice limit=5 taxonomy='' category = '' banner_url='']
 */
function dynamic_new_formal_customer_voice($atts) {
	global $post;
	global $wp;

	$postTitle = $post->post_title;
	$atts_shortcode = shortcode_atts(array(
		'banner_url'  => '',
		'taxonomy'  => 'customer-remark-tax',
		'category' => '',
		'limit' => 5,
        'order' => 'DESC',
		'orderby' => 'date',
	), $atts);

	$args = array(
        'post_status' => 'publish',
		'post_type' => array('customer-remark'),
		'pagination'	 => false,
		'posts_per_page' => $atts_shortcode['limit'],
		'order'          => 'DESC',
		'orderby'        => 'date',
	);

	$term_link = '';
	if (!empty($atts_shortcode['taxonomy']) && !empty($atts_shortcode['category'])) {
		$args['tax_query'] = array( // filter following category slug
			array(
				'taxonomy' => $atts_shortcode['taxonomy'], // taxonomy type
				'field' => 'slug', // filter following slug
				'terms' => $atts_shortcode['category']// category slug name
			)
		);
		$term_link = get_term_link($atts_shortcode['category'], $atts_shortcode['taxonomy']);
    }

	$the_query  = new WP_Query($args);
	$posts = $the_query->get_posts();

	$productIds = array();
    // Get all product from all post contain product_id custom_field
    foreach($posts as $postItem) {
        $product_id = get_field('product_id', $postItem->ID);

        if (!empty($product_id) && $product_id = (int)$product_id) {
            $productIds[] = $product_id;
        }
    }

    $productModel = new Product();
    $productList = $productModel->with('planTypeHighend')->findAllByPk($productIds);
    // Create product list
    $products = array();
    foreach ($productList as $product) {
        $products[$product->product_id] = $product;
    }

	ob_start();
	    include(locate_template('include/dynamic-formal-customer-voice.php'));

	$output = ob_get_clean();

	return $output;
}

/*
 * Get customer remark same product id
 *  Using: [dynamic_new_formal_customer_remark product_id='']
 */
function dynamic_new_formal_customer_remark($atts) {
    global $post;

    $atts_shortcode = shortcode_atts(array(
        'banner_url'  => '',
        'taxonomy'  => 'customer-remark-tax',
        'category' => '',
        'product_id' => '',
        'limit' => 5,
        'order' => 'DESC',
        'orderby' => 'date',
    ), $atts);

    $args = array(
        'post_status' => 'publish',
        'post_type' => array('customer-remark'),
        'pagination' => false,
        'posts_per_page' => $atts_shortcode['limit'],
        'meta_query' => array(
            //'relation' => 'AND',
            array(
                'key' => 'product_id',
                'value' => $atts_shortcode['product_id'],
            )
        ),
        'order' => 'DESC',
        'orderby' => 'date',
    );
    $the_query  = new WP_Query($args);

    $posts = $the_query->get_posts();
    $productIds = array();
    // Get all product from all post contain product_id custom_field
    foreach($posts as $postItem) {
        $product_id = get_field('product_id', $postItem->ID);

        if (!empty($product_id) && $product_id = (int)$product_id) {
            $productIds[] = $product_id;
        }
    }

    $term_link = '';
    if (!empty($atts_shortcode['taxonomy']) && !empty($atts_shortcode['category'])) {
        $args['tax_query'] = array( // filter following category slug
            array(
                'taxonomy' => $atts_shortcode['taxonomy'], // taxonomy type
                'field' => 'slug', // filter following slug
                'terms' => $atts_shortcode['category']// category slug name
            )
        );
        $term_link = get_term_link($atts_shortcode['category'], $atts_shortcode['taxonomy']);
    }

    $productModel = new Product();
    $productList = $productModel->with('planTypeHighend')->findAllByPk($productIds);
    // Create product list
    $products = array();
    foreach ($productList as $product) {
        $products[$product->product_id] = $product;
    }
    ob_start();
    include(locate_template('include/dynamic-formal-customer-remark.php'));
    return ob_get_clean();
}
add_shortcode( 'dynamic_new_formal_customer_remark', 'dynamic_new_formal_customer_remark' );


function new_formal_customer_voice($atts) {
		$atts_shortcode = shortcode_atts(array(
		'category_slug' => '',
		'limit' => 5,
        'order' => 'DESC',
		'orderby' => 'date',
	), $atts);

	ob_start();
	    include(locate_template('include/new-formal-product-customer-voice.php'));

	return ob_get_clean();
}
add_shortcode( 'new_formal_customer_voice', 'new_formal_customer_voice' );

/*
 * Change to load template for formal search
 * */
/*function load_search_template($template) {
    if (is_search()) {
	    $post_type = get_query_var('post_type') ? get_query_var('post_type'): null;

	    if (!empty($post_type)) {
		    $new_template = locate_template(array('formal_search.php'));

		    if (file_exists($new_template)) {
			    return $new_template;
		    }
        }
    }

    return $template;
}

add_filter( 'template_include', 'load_search_template', 100, 1);
*/
function swe_pvc_most_viewed_posts($args = array(), $display = true, $re_loop = false)
{
    global $custom_post_type, $custom_taxonomies;
    $defaults = array(
        'number_of_posts' => 5,
        'post_type' => array('post'),
        'order' => 'desc',
        'thumbnail_size' => 'thumbnail',
        'show_post_views' => true,
        'show_post_thumbnail' => false,
        'show_post_excerpt' => false,
        'no_posts_message' => __('No Posts', 'post-views-counter'),
        'item_before' => '',
        'item_after' => ''
    );

    $args = apply_filters('pvc_most_viewed_posts_args', wp_parse_args($args, $defaults));

    $args['show_post_views'] = (bool)$args['show_post_views'];
    $args['show_post_thumbnail'] = (bool)$args['show_post_thumbnail'];
    $args['show_post_excerpt'] = (bool)$args['show_post_excerpt'];

    $posts = pvc_get_most_viewed_posts(
        array(
            'posts_per_page' => (isset($args['number_of_posts']) ? (int)$args['number_of_posts'] : $defaults['number_of_posts']),
            'order' => (isset($args['order']) ? $args['order'] : $defaults['order']),
            'post_type' => (isset($args['post_type']) ? $args['post_type'] : $defaults['post_type'])
        )
    );

    if (!empty($posts)) {
        if($re_loop){
            return $posts;
        }
        $colors =  array( 1 => 'gold', 2 => 'silver', 3 => 'bronze' );
        if (in_array($custom_post_type['blog'], $args['post_type']) ) {
            $i = 1;
            $re = array();
            $taxonomy = $custom_taxonomies['blog'];
            foreach ($posts as $post) {
                setup_postdata($post);
                $format = '
                <li class="item-col-cate">
                    <div class="box-content-cate flexbox">
                        <div class="wrap-image-cate">
                            <a href="%2$s" title="%3$s">%4$s<span class="circle-num %7$s flexbox align-items-center justify-content-center"><var class="num">%1$d</var></span></a>
                        </div>
                        <div class="info-inner-cate">
                            <div class="box-title-inner-info flexbox">
                                <p class="title-inner-info-name"><a href="%2$s" title="%3$s">%3$s</a></p>
                            </div>
                            <div class="box-bottom-inner-info flexbox justify-content-between">
                                <div class="catname-info"><a href="%8$s" title="%5$s">%5$s</a></div>
                                <div class="catname-type">カテゴリ名</div>
                                <div class="sp post-date">%6$s</div>
                            </div>
                        </div>
                    </div>
                </li>';
                $term = get_category_permalink($post, $taxonomy);
                $term_link = get_term_link($term, $taxonomy);
                $category_data = get_category_data($term);
                $color = array_key_exists($i, $colors) ? $colors[$i] : '';
                $img = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                //$img = '<img src="'.WP_HOMES.'/images/formal-rental/img-blog-cat.jpg" alt="">';
                $re[] = sprintf($format,
                    $i,
                    get_permalink($post->ID),
                    get_the_title($post->ID),
                    $img,
                    $category_data['shop'],
                    get_the_date(),
                    $color,
                    $term_link
                );
                $i++;
            }
            $html = sprintf('<div class="container-rsb"><ul class="list-col-cate list-col-cate-blog list-col-cate-rsb pc flexbox">%s</ul><div class="view-more-article"><a href="'.esc_url(home_url('blog')).'">▼ もっと見る</a></div></div>', implode("\n", $re));
            wp_reset_postdata();
        } elseif (in_array('post', $args['post_type']) || in_array($custom_post_type['spot'], $args['post_type'])) {
            $i = 1;
            $re = array();
            foreach ($posts as $post) {
                setup_postdata($post);
                $format = '<li class="item-col-cate">
                            <div class="box-content-cate flexbox">
                                <div class="wrap-image-cate"><a href="%1$s" alt="%5$s"> %2$s <span class="circle-num %3$s flexbox align-items-center justify-content-center"><var class="num">%4$s</var></span> </a></div>
                                <div class="info-inner-cate">
                                    <div class="box-title-inner-info flexbox">
                                        <p class="title-inner-info-name"><a href="%1$s" alt="%5$s">%5$s</a></p>
                                    </div>
                                    <div class="box-bottom-inner-info flexbox justify-content-between">
                                        <div class="wrap-view-feature flexbox">
                                            <div class="wrap-feature">%8$s</div>
                                            <div class="wrap-num-view flexbox"><span class="num-view">%6$s</span><span class="name-view">view</span></div>
                                        </div>
                                        <div class="read-more-info"><a href="%1$s" alt="%5$s"><span>&gt;</span>%9$s</a></div>
                                    </div>
                                </div>
                            </div>
                        </li>';
                $color = array_key_exists($i, $colors) ? $colors[$i] : '';
                $img = has_post_thumbnail($post->ID) ? swe_get_the_post_thumbnail($post->ID) : '<img src="'.WP_HOME.'/images/no-image.png" alt="'.get_the_title().'">';
                //$img = '<img src="'.WP_HOMES.'/images/formal-rental/img-blog-cat.jpg" alt="">';
                $feature_text = Yii::t ('new_kimono_spot','特集');
                $read_article_text = Yii::t ('new_kimono_spot','記事を読む');
                $re[] = sprintf($format,
                    get_permalink($post->ID),
                    $img,
                     $color,
                     $i,
                    get_the_title($post->ID),
                    $args['show_post_views'] ? number_format_i18n(pvc_get_post_views($post->ID)) : '',
                    $color,
                    $feature_text,
                    $read_article_text
                );
                $i++;
            }
            $html = sprintf('<div class="container-rsb"><ul class="list-col-cate list-col-cate-blog list-col-cate-rsb pc flexbox">%s</ul><div class="view-more-article"><a href="'.esc_url(home_url('column')).'">▼ '.Yii::t ('new_kimono_spot','もっと見る').'</a></div></div>', implode("\n", $re));
            wp_reset_postdata();

        } else {
            $html = '
		<ul>';

            foreach ($posts as $post) {
                setup_postdata($post);

                $html .= '
		    <li>';

                $html .= apply_filters('pvc_most_viewed_posts_item_before', $args['item_before'], $post);

                if ($args['show_post_thumbnail'] && has_post_thumbnail($post->ID)) {
                    $html .= '
					<span class="post-thumbnail">
					' . get_the_post_thumbnail($post->ID, $args['thumbnail_size']) . '
					</span>';
                }

                $html .= '
					<a class="post-title" href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a>' . ($args['show_post_views'] ? ' <span class="count">(' . number_format_i18n(pvc_get_post_views($post->ID)) . ')</span>' : '');

                $excerpt = '';

                if ($args['show_post_excerpt']) {
                    if (empty($post->post_excerpt))
                        $text = $post->post_content;
                    else
                        $text = $post->post_excerpt;

                    if (!empty($text))
                        $excerpt = wp_trim_words(str_replace(']]>', ']]&gt;', strip_shortcodes($text)), apply_filters('excerpt_length', 55), apply_filters('excerpt_more', ' ' . '[&hellip;]'));
                }

                if (!empty($excerpt))
                    $html .= '
				
				<div class="post-excerpt">' . esc_html($excerpt) . '</div>';

                $html .= apply_filters('pvc_most_viewed_posts_item_after', $args['item_after'], $post);

                $html .= '
		    </li>';
            }

            wp_reset_postdata();

            $html .= '
		</ul>';
        }
    } else
        $html = $args['no_posts_message'];

    $html = apply_filters('pvc_most_viewed_posts_html', $html, $args);

    if ($display)
        echo $html;
    else
        return $html;
}
add_filter('wp_generate_tag_cloud', 'swe_tag_cloud',10,1);

function swe_tag_cloud($tag_string){
    return preg_replace('/style=("|\')(.*?)("|\')/', '', $tag_string);
}
//using [listproducts ids="6884,5368"]
function listproducts_func( $atts ) {
    $atts = shortcode_atts( array(
        'ids' => "6884,5368"
    ), $atts, 'listproducts' );
    $productIds = array_map('intval', explode(',',$atts['ids']));

    $productModel = new Product();
    $productList = $productModel->findAllByPk($productIds);
    // generate product list
    $item = array();
    $numberFormatter = Yii::app()->numberFormatter;
    $currencyFormat = DateTimeUtils::getCurrencyFormat();
    $currencySymbol = Yii::app()->locale->getCurrencySymbol('JPY');
    foreach ($productList as $product) {
        $product_id = $product->product_id;
        $productName = !empty($product->product_name) ? $product->product_name: '';
        $price = $numberFormatter->format($currencyFormat, $product->rental_price, $currencySymbol);
        $thumb = Utils::getImageUrl( $product->main_thumb_image, true, true);
        $img = CHtml::image($thumb['path'], $product->product_name, Utils::getHtmlOptions($thumb['size'], 135));
        $productDetailLink = Yii::app()->createAbsoluteUrl('formal/product', array('id' => $product_id));
        $item[] = '
            <div class="pd-reserve-item flexbox" data-id="'.$product_id.'">
                <div class="wrap-pd-reserve-img">'.$img.'</div>
                <div class="wrap-pd-reserve-inner flexbox">
                    <div class="pd-reserve-info">
                        <div class="pd-reserve-name">'.$productName.'</div>
                        <div class="pd-reserve-price">'.$price.' + <small>tax</small></div>
                    </div>
                    <div class="go-to-reserve"><a href="'.$productDetailLink.'" title="'.$productName.'" class="main-btn">予約画面へ進む</a></div>
                </div>
            </div>';
    }
    if(!empty($item)){
        $content = implode("\n", $item);
        return '<div class="wrap-pd-reserve">'.$content.'</div>';
    }
    return '';
}
add_filter( 'option_posts_per_rss', 'my_posts_per_rss' );
function my_posts_per_rss( $option ) {
    if( isset( $_GET['limit'] ) ) {
        return (int) $_GET['limit'] ?: $option;
    }
    return $option;
}
add_shortcode( 'listproducts', 'listproducts_func' );
function search_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ($query->is_search) {
            $search_query = get_search_query();
	if($search_query == 'feed') {
		return;
	}
            global $column_query_var;
            $column_query_var = $search_query;
            $post_type = get_query_var('post_type');
            if(isset($post_type)){
                if($post_type == 'staff-blog'){
                    $shop = get_query_var('shop-blog');
                    $query->set('shop-blog',$shop);
                    $slugs = array('kimono','yukata','festivals','fireworks','autumn-leaves',
                        'homongi','kurotomesode','irotomesode','furisode','hakama','iromuji','komon','obi',
                        'wedding','coming-of-age','enter-school','753','shrine-visit-for-birth');
                    $slugs_months = array('january','february','march','april','may','june','july','august','september','october','november','december');
                    $slugs_season = array('spring','summer','autumn','winter');
                    $slugs_2key = array('flowers','graduation','tea-ceremony','theater-going');
                    if(in_array($search_query, $slugs)){
                        /*
                         * searched by keyword 祭	/festivals
                         * searched by keyword 花火	/fireworks
                         * searched by keyword 紅葉	/autumn-leaves
                         * searched by keyword 着物	/kimono
                         * searched by keyword 浴衣	/yukata
                         * searched by keyword 訪問着	/homongi
                         * searched by keyword 黒留袖	/kurotomesode
                         * searched by keyword 色留袖	/irotomesode
                         * searched by keyword 振袖	/furisode
                         * searched by keyword 袴	/hakama
                         * searched by keyword 色無地	/iromuji
                         * searched by keyword 小紋	/komon
                         * searched by keyword 帯	/obi
                         * searched by keyword 結婚	/wedding
                         * searched by keyword 成人	/coming-of-age
                         * searched by keyword 入学	/enter-school
                         * searched by keyword 七五三	/753
                         * searched by keyword 宮参り	/shrine-visit-for-birth
                         * */
                        $slugs = array('kimono'=>'着物','yukata'=>'浴衣','festivals'=>'祭','fireworks'=>'花火','autumn-leaves'=>'紅葉',
                            'homongi'=>'訪問着','kurotomesode'=>'黒留袖','irotomesode'=>'色留袖','furisode'=>'振袖','hakama'=>'袴','iromuji'=>'色無地',
                            'komon'=>'小紋','obi'=>'帯',
                            'wedding'=>'結婚','coming-of-age'=>'成人','enter-school'=>'入学','753'=>'七五三','shrine-visit-for-birth'=>'宮参り');
                        foreach ($slugs as $k => $v){
                            if($search_query == $k){
                                $query->set('s', $v);
                                break;
                            }
                        }
                    }elseif(in_array($search_query, $slugs_months)){
                        /*
                         * if the date of release is in january	/january
                         * if the date of release is in february	/february
                         * if the date of release is in march	/march
                         * if the date of release is in april	/april
                         * if the date of release is in may	/may
                         * if the date of release is in june	/june
                         * if the date of release is in july	/july
                         * if the date of release is in august	/august
                         * if the date of release is in september	/september
                         * if the date of release is in october	/october
                         * if the date of release is in november	/november
                         * if the date of release is in december	/december
                         * */
                        $query->set('s', '');
                        foreach ($slugs_months as $k => $v){
                            if($search_query === $v){
                                $query->set('monthnum', $k+1);
                                break;
                            }
                        }
                    }elseif(in_array($search_query, $slugs_season)){
                        /*
                         * if the date of release is in march AND april AND may	/spring
                         * if the date of release is in june AND july AND august	/summer
                         * if the date of release is in september AND october AND november	/autumn
                         * if the date of release is in december AND january AND february	/winter
                        */
                        $query->set('s', '');
                        $slugs_season = array('spring'=>'3,4,5','summer'=>'6,7,8','autumn'=>'9,10,11','winter'=>'12,1,2');
                        foreach ($slugs_season as $k => $v){
                            if($search_query === $k){
                                $months = explode(',',$v);
                                $month_1 = $months[0];
                                $month_2 = $months[1];
                                $month_3 = $months[2];
                                $query->set('date_query', [['month' => $month_1],
                                   ['month' => $month_2],
                                    ['month' => $month_3],
                                    'relation' => 'OR']

                                );
                                break;
                            }
                        }
                    }elseif(in_array($search_query, $slugs_2key)){
                        /*
                         * searched by keyword 桜 OR 花見 OR 紫陽花 OR あじさい OR アジサイ	/flowers
                         * searched by keyword 卒業 OR 卒園	/graduation
                         * searched by keyword お茶 OR 踊り OR 日舞 OR お華	/tea-ceremony
                         * searched by keyword 観劇 OR 歌舞伎 OR　寄席 OR 落語 	/theater-going
                        */
                        foreach ($slugs_2key as $v){
                            if($search_query === $v){
                                $query->set('s', '');
                                break;
                            }
                        }
                    }
                } else if ($post_type == 'post') { // Search for column page
                    $slugs_column_simple = array(
                        'homongi', 'tomesode', 'irotomesode', 'furisode', 'hakama', 'mofuku', 'yukata',
                        'obi', 'men',
                        'wedding', 'coming-of-age', 'shrine-visit-for-birth',
                    );
                    $slugs_column_multi = array('ubugi','kitsuke','komono','hair-style','graduation','enter-school','753','other');
                    if (in_array($search_query, $slugs_column_simple)) {
                        $slugs = array(
                            'homongi'=>'訪問着',
                            'tomesode'=>'留袖',
                            'irotomesode'=>'留袖',
                            'furisode'=>'振袖',
                            'hakama'=>'袴',
                            'mofuku'=>'喪服',
                            'yukata'=>'浴衣',

                            'obi'=>'帯',
                            'men'=>'男性',

                            'wedding'=>'結婚',
                            'coming-of-age'=>'成人',
                            'shrine-visit-for-birth'=>'宮参り',
                        );
                    } elseif (in_array($search_query, $slugs_column_multi)){
                        foreach ($slugs_column_multi as $v){
                            if($search_query === $v){
                                $query->set('s', '');
                                break;
                            }
                        }
                    }
                }
            }
        }elseif($query->is_tax){
            $spot_cate = get_query_var('spot-cate');
            $spot_meta_group = get_query_var('spot_meta_group');
            $spot_meta_child = get_query_var('spot_meta_child');
            if(!empty($spot_cate) && !empty($spot_meta_group)){
                if(!empty($spot_meta_child)){
                    $key = 'list_cate_'.$spot_meta_group;
                    $value = $spot_meta_child;
                }else{
                    $key = 'cate_'.$spot_meta_group;
                    $value = $spot_meta_group;
                }
                $meta_query = array(
                    array(
                        'key'=>$key,
                        'value'=>$value,
                        'compare'=>'LIKE',
                    ),
                );

                $tax_query = array(
                    array(
                        'taxonomy' => 'spot-cate',
                        'field'    => 'slug',
                        'terms'    => $spot_cate,
                    ),
                );
                $query->set('meta_query',$meta_query);
                $query->set('post_type', 'spot-post');
                $query->set('tax_query',$tax_query);
            }
        }
    }
}
add_action('pre_get_posts','search_filter');
add_filter( 'posts_where', 'swe_posts_where', 10, 2 );
function swe_posts_where( $where, $query ){
    if ( !is_admin() && $query->is_main_query() ) {
	if(!empty($query->query['s']) && $query->query['s'] == 'feed') {
                return;
        }
        if ($query->is_search) {
            $post_type = get_query_var('post_type');
            /*
             * searched by keyword 桜 OR 花見 OR 紫陽花 OR あじさい OR アジサイ	/flowers
             * searched by keyword 卒業 OR 卒園	/graduation
             * //searched by keyword 茶会 OR 踊り OR 日舞 OR お華	/tea-ceremony
             * searched by keyword 観劇 OR 歌舞伎 OR　寄席 OR 落語 	/theater-going
            */
            $slugs_2key = array('flowers','graduation','tea-ceremony','theater-going');
            $slugs_column_multi = array('ubugi','kitsuke','komono','hair-style','graduation','enter-school','753','other');
            $uri = $_SERVER['REQUEST_URI'];
            global $table_prefix;if(isset($post_type) && $post_type == 'staff-blog' ){
                foreach($slugs_2key as $v){
                    if( strpos($uri, $v) !== false&& $v == 'flowers'){
                        $table_posts = $table_prefix.'posts';
                        //searched by keyword 桜 OR 花見 OR 紫陽花 OR あじさい OR アジサイ	/flowers
                        $mywhere = " ((($table_posts.post_title LIKE '%桜%') OR ($table_posts.post_excerpt LIKE '%桜%') OR ($table_posts.post_content LIKE '%桜%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%花見%') OR ($table_posts.post_excerpt LIKE '%花見%') OR ($table_posts.post_content LIKE '%花見%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%紫陽花%') OR ($table_posts.post_excerpt LIKE '%紫陽花%') OR ($table_posts.post_content LIKE '%紫陽花%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%あじさい%') OR ($table_posts.post_excerpt LIKE '%あじさい%') OR ($table_posts.post_content LIKE '%あじさい%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%アジサイ%') OR ($table_posts.post_excerpt LIKE '%アジサイ%') OR ($table_posts.post_content LIKE '%アジサイ%'))) ";
                    }
                    elseif(strpos($uri, $v) !== false && $v == 'graduation'){
                        $table_posts = $table_prefix.'posts';
                        //searched by keyword 卒業 OR 卒園	/graduation	卒業式
                        $mywhere = " ((($table_posts.post_title LIKE '%卒業%') OR ($table_posts.post_excerpt LIKE '%卒業%') OR ($table_posts.post_content LIKE '%卒業%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%卒園%') OR ($table_posts.post_excerpt LIKE '%卒園%') OR ($table_posts.post_content LIKE '%卒園%'))) ";
                    }
                    elseif(strpos($uri, $v) !== false && $v == 'tea-ceremony'){
                        $table_posts = $table_prefix.'posts';
                        //searched by keyword 茶会 OR 踊り OR 日舞 OR お華	/tea-ceremony
                        $mywhere = " ((($table_posts.post_title LIKE '%茶会%') OR ($table_posts.post_excerpt LIKE '%茶会%') OR ($table_posts.post_content LIKE '%茶会%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%踊り%') OR ($table_posts.post_excerpt LIKE '%踊り%') OR ($table_posts.post_content LIKE '%踊り%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%日舞%') OR ($table_posts.post_excerpt LIKE '%日舞%') OR ($table_posts.post_content LIKE '%日舞%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%お華%') OR ($table_posts.post_excerpt LIKE '%お華%') OR ($table_posts.post_content LIKE '%お華%'))) ";
                    }
                    elseif(strpos($uri, $v) !== false && $v == 'theater-going'){
                        $table_posts = $table_prefix.'posts';
                        //searched by keyword 観劇 OR 歌舞伎 OR　寄席 OR 落語 	/theater-going	観劇
                        $mywhere = " ((($table_posts.post_title LIKE '%観劇%') OR ($table_posts.post_excerpt LIKE '%観劇%') OR ($table_posts.post_content LIKE '%観劇%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%歌舞伎%') OR ($table_posts.post_excerpt LIKE '%歌舞伎%') OR ($table_posts.post_content LIKE '%歌舞伎%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%寄席%') OR ($table_posts.post_excerpt LIKE '%寄席%') OR ($table_posts.post_content LIKE '%寄席%')) ";
                        $mywhere .= " OR (($table_posts.post_title LIKE '%落語%') OR ($table_posts.post_excerpt LIKE '%落語%') OR ($table_posts.post_content LIKE '%落語%'))) ";
                    }
                }
            }
            if ( isset($post_type) && $post_type == 'post') { // Search for column page by multi keys
                $key_search = $query->query['s'];
                if (!empty($key_search)) {
                    if (in_array($key_search, $slugs_column_multi)) {
                        foreach ($slugs_column_multi as $v) {
                            if (strpos($uri, $v) !== false && $v == 'ubugi') {
                                $table_posts = $table_prefix.'posts';
                                // searched by keyword 産着 OR 初着 /ubugi
                                $mywhere = " ((($table_posts.post_title LIKE '%産着%') OR ($table_posts.post_excerpt LIKE '%産着%') OR ($table_posts.post_content LIKE '%産着%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%初着%') OR ($table_posts.post_excerpt LIKE '%初着%') OR ($table_posts.post_content LIKE '%初着%'))) ";
                            } elseif (strpos($uri, $v) !== false && $v == 'kitsuke') {
                                $table_posts = $table_prefix.'posts';
                                // searched by keyword 着付け OR 着方 /kitsuke
                                $mywhere = " ((($table_posts.post_title LIKE '%着付け%') OR ($table_posts.post_excerpt LIKE '%着付け%') OR ($table_posts.post_content LIKE '%着付け%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%着方%') OR ($table_posts.post_excerpt LIKE '%着方%') OR ($table_posts.post_content LIKE '%着方%'))) ";
                            } elseif (strpos($uri, $v) !== false && $v == 'komono') {
                                $table_posts = $table_prefix.'posts';
                                // searched by keyword 小物 OR 草履 OR 下駄 OR バッグ /komono
                                $mywhere = " ((($table_posts.post_title LIKE '%小物%') OR ($table_posts.post_excerpt LIKE '%小物%') OR ($table_posts.post_content LIKE '%小物%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%草履%') OR ($table_posts.post_excerpt LIKE '%草履%') OR ($table_posts.post_content LIKE '%草履%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%下駄%') OR ($table_posts.post_excerpt LIKE '%下駄%') OR ($table_posts.post_content LIKE '%下駄%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%バッグ%') OR ($table_posts.post_excerpt LIKE '%バッグ%') OR ($table_posts.post_content LIKE '%バッグ%'))) ";
                            } elseif (strpos($uri, $v) !== false && $v == 'hair-style') {
                                $table_posts = $table_prefix.'posts';
                                // searched by keyword 髪型 OR ヘアスタイル /hair-style
                                $mywhere = " ((($table_posts.post_title LIKE '%髪型%') OR ($table_posts.post_excerpt LIKE '%髪型%') OR ($table_posts.post_content LIKE '%髪型%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%ヘアスタイル%') OR ($table_posts.post_excerpt LIKE '%ヘアスタイル%') OR ($table_posts.post_content LIKE '%ヘアスタイル%'))) ";
                            } elseif (strpos($uri, $v) !== false && $v == 'graduation') {
                                $table_posts = $table_prefix.'posts';
                                // searched by keyword 卒業 OR 卒園 /graduation
                                $mywhere = " ((($table_posts.post_title LIKE '%卒業%') OR ($table_posts.post_excerpt LIKE '%卒業%') OR ($table_posts.post_content LIKE '%卒業%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%卒園%') OR ($table_posts.post_excerpt LIKE '%卒園%') OR ($table_posts.post_content LIKE '%卒園%'))) ";
                            } elseif (strpos($uri, $v) !== false && $v == 'enter-school') {
                                $table_posts = $table_prefix.'posts';
                                // searched by keyword 入学 OR 入園 /enter-school
                                $mywhere = " ((($table_posts.post_title LIKE '%入学%') OR ($table_posts.post_excerpt LIKE '%入学%') OR ($table_posts.post_content LIKE '%入学%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%入園%') OR ($table_posts.post_excerpt LIKE '%入園%') OR ($table_posts.post_content LIKE '%入園%'))) ";
                            } elseif (strpos($uri, $v) !== false && $v == '753') {
                                $table_posts = $table_prefix.'posts';
                                // searched by keyword 七五三 OR 被布 OR 四つ身 /753
                                $mywhere = " ((($table_posts.post_title LIKE '%七五三%') OR ($table_posts.post_excerpt LIKE '%七五三%') OR ($table_posts.post_content LIKE '%七五三%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%被布%') OR ($table_posts.post_excerpt LIKE '%被布%') OR ($table_posts.post_content LIKE '%被布%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%四つ身%') OR ($table_posts.post_excerpt LIKE '%四つ身%') OR ($table_posts.post_content LIKE '%四つ身%'))) ";
                            } elseif (strpos($uri, $v) !== false && $v == 'other') {
                                $table_posts = $table_prefix.'posts';
                                // searched by keyword 十三参り OR 二分の一 OR 2分の1 OR パーティ OR 葬式 OR 通夜 OR 茶会 /other
                                $mywhere = " ((($table_posts.post_title LIKE '%十三参り%') OR ($table_posts.post_excerpt LIKE '%十三参り%') OR ($table_posts.post_content LIKE '%十三参り%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%二分の一%') OR ($table_posts.post_excerpt LIKE '%二分の一%') OR ($table_posts.post_content LIKE '%二分の一%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%2分の1%') OR ($table_posts.post_excerpt LIKE '%2分の1%') OR ($table_posts.post_content LIKE '%2分の1%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%パーティ%') OR ($table_posts.post_excerpt LIKE '%パーティ%') OR ($table_posts.post_content LIKE '%パーティ%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%葬式%') OR ($table_posts.post_excerpt LIKE '%葬式%') OR ($table_posts.post_content LIKE '%葬式%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%通夜%') OR ($table_posts.post_excerpt LIKE '%通夜%') OR ($table_posts.post_content LIKE '%通夜%')) ";
                                $mywhere .= " OR (($table_posts.post_title LIKE '%茶会%') OR ($table_posts.post_excerpt LIKE '%茶会%') OR ($table_posts.post_content LIKE '%茶会%'))) ";
                            }
                        }
                    } elseif ($key_search == 'kimono') {
                        $table_posts = $table_prefix.'posts';
                        // searched by exclude keyword 浴衣 /kimono
                        $mywhere = " ((($table_posts.post_title NOT LIKE '%浴衣%') AND ($table_posts.post_excerpt NOT LIKE '%浴衣%') AND ($table_posts.post_content NOT LIKE '%浴衣%'))) ";
                    }
                }
            }
            if(!empty($mywhere)){
                if( '' != $where )
                {
                    $where .= ' AND'.$mywhere;
                }
                else
                {
                    $where .= ' '.$mywhere;
                }
            }
        }
    }
    return $where;
}
/**
 * Using: [sliderGallery] or [sliderGallery posts_per_page=1]
 * @param $attrs
 *
 * @return string
 */
function sliderGallery($attrs){
    $listShops = array(
        2 => '清水坂店',
        5 => '京都駅前店',
        6 => '祇園四条店',
        7 => '大阪大丸心斎橋店',
        8 => '浅草寺店',
        9 => '鎌倉小町店',
        10 => '金沢香林坊店',
        11 => '嵐山駅前店',
        14 => 'プチ祇園四条店',
        15 => 'プチ京都駅前店',
        18 => '嵐山渡月橋店',
        17 => '東京スカイツリータウンソラマチ店',
        20 => '太宰府店',
        24 => '倉敷店',
        22 => '銀座本店',
        25 => '新宿駅前店',
        16 => 'フォーマル京都タワー店',
        23 => '仙台PARCO2店',
        21 => '札幌すすきの店',
        26 => '清水茶わん坂店',
        27 => '金沢兼六園店'
    );

	$attrShortcode = shortcode_atts(array(
		'posts_per_page' => 24,
		'type_value' => MasterValues::MV_BOOK_TYPE_KIMONO,
        'shop_id' => 'all'
	), $attrs);

	$queryArgs = array(
		'post_type' => 'customer-gallery',
		'pagination' => false,
		'post_status' => 'publish',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'yukata_kimono_plan',
                'value' => $attrShortcode['type_value'],
            ),
        ),
		'posts_per_page' => $attrShortcode['posts_per_page'],
		'order' => 'DESC',
		'orderby' => 'date'
	);

	if ( isset($attrs['shop_id']) && $shop_id = $attrs['shop_id'] ) {
	    if (isset($listShops[$shop_id])) {
            $queryArgs['meta_query'][] = array(
                'key' => 'shop',
                'value' => $listShops[$shop_id],
            );
        }
    }

	$query = new WP_Query($queryArgs);

	ob_start();
	include(locate_template('include/slider_gallery.php'));
	$outputBuffer = ob_get_clean();

	return $outputBuffer;
}

add_shortcode( 'slider_gallery', 'sliderGallery');


/* Instagram gallery */
function instagramGallery(){
    ob_start();
    include(locate_template('include/instagram_gallery.php'));
    $outputBuffer = ob_get_clean();
    return $outputBuffer;
}

add_shortcode( 'instagram_gallery', 'instagramGallery');

function instagramGalleryApi($attr,$content = null){
    ob_start();
    include(locate_template('include/instagramGalleryApi.php'));
    $outputBuffer = ob_get_clean();
    return $outputBuffer;
}

add_shortcode( 'instagram_gallery_api', 'instagramGalleryApi');

/*
 *  Using: [gallery_for_plan_kimono posts_per_page=1 plan_type=""]
 */
add_shortcode( 'gallery_for_plan_kimono', 'galleryForPlanKimono');
function galleryForPlanKimono($attrs){
	$attrShortcode = shortcode_atts(array(
		'posts_per_page' => 4,
		'plan_type' =>'',
		'type' => 'kimono_plan_type',
        'plan_type_id' =>'',
	), $attrs);

	$queryArgs = array(
		'post_type' => 'customer-gallery',
		'meta_key'		=> $attrShortcode['type'],
		'meta_value'	=> $attrShortcode['plan_type'],
		'pagination' => false,
		'post_status' => 'publish',
		'posts_per_page' => $attrShortcode['posts_per_page'],
		'order' => 'DESC',
		'orderby' => 'date'
	);

	$query = new WP_Query($queryArgs);

	ob_start();
	include(locate_template('include/gallery_for_plan_kimono.php'));
	$outputBuffer = ob_get_clean();

	return $outputBuffer;
}

/*
 *  Using: [gallery_for_plan_yukata posts_per_page=1 plan_type=""]
 */
add_shortcode( 'gallery_for_plan_yukata', 'galleryForPlanYukata');
function galleryForPlanYukata($attrs){
    $attrShortcode = shortcode_atts(array(
        'posts_per_page' => 4,
        'plan_type' =>'',
        'type' => 'kimono_plan_type',
        'plan_type_id' =>'',
        'plan_type_name' =>'',
    ), $attrs);

    $queryArgs = array(
        'post_type' => 'customer-gallery',
        'meta_key'		=> $attrShortcode['type'],
        'meta_value'	=> $attrShortcode['plan_type'],
        'pagination' => false,
        'post_status' => 'publish',
        'posts_per_page' => $attrShortcode['posts_per_page'],
        'order' => 'DESC',
        'orderby' => 'date'
    );

    $query = new WP_Query($queryArgs);

    ob_start();
    include(locate_template('include/gallery_for_plan_yukata.php'));
    $outputBuffer = ob_get_clean();

    return $outputBuffer;
}

add_filter( 'nav_menu_link_attributes', 'we_filter_function_name', 10, 3 );
function we_filter_function_name( $atts, $item, $args ) {
    $atts['href'] = preg_replace('/^(\/)/', WP_HOMES.'/' , $atts['href']);
    return $atts;
}

/**
 * add script to header
 */
function registerScriptAdword() {
	$scriptAdword = <<<EOD
    <!-- Global site tag (gtag.js) - Google AdWords: 813453511 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-813453511"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'AW-813453511');
    </script>
    <!-- Event snippet for SâÄsç÷ remarketing page -->
    <script>
      gtag('event', 'conversion', {
          'send_to': 'AW-813453511/k-TuCNybwX4Qx6HxgwM',
          'value': 1.0,
          'currency': 'TWD',
          'aw_remarketing_only': true
      });
    </script>
EOD;
    echo $scriptAdword;
}
//add_action('wp_head', 'registerScriptAdword');

function get_shop_blog_terms($slug, $taxonomy){
    $parent = get_term_by('slug', $slug, $taxonomy);
    $args = array('parent' => $parent->term_id, 'hide_empty' => false);
    return get_terms($taxonomy, $args);
}

function insert_og_image() {
	$isPageYukata = is_page('yukata');
    $isFrontPage = is_front_page();
    $isPageYukataPlan = is_page('yukata/plan');
    $isPageGinzaHonten = is_page('ginza-honten');
    $isPageShinjuku = is_page('shinjuku-station');
    $isPageSendaiParco = is_page('sendai-parco2');
    $isPageKanazawa = is_page('kanazawa');
    $output = "";
	if ($isPageYukata) {
		$output .= '<meta property="og:image" content="'. WP_HOME . "/wordpress/wp-content/uploads/2019/05/banner-yukata-popup-sp-ja.jpg" .'" />';
		echo $output;
	}
	elseif($isFrontPage){
        $output .= '<meta property="og:image" content="'. WP_HOME . "/images/new-kimono/new-banner-toppage-kimono-01-sp.png" .'" />';
        echo $output;
    }
    elseif ($isPageYukataPlan){
        $output .= '<meta property="og:image" content="'. WP_HOME . "/wordpress/wp-content/uploads/2019/07/yukata_top_banner_SP-min.jpg" .'" />';
        echo $output;
    }
    elseif ($isPageGinzaHonten){
        $output .= '<meta property="og:image" content="'. WP_HOME . "/images/shop-formal-v2/main-banner-top-ginza-sp.jpg" .'" />';
        echo $output;
    }
    elseif ($isPageShinjuku){
        $output .= '<meta property="og:image" content="'. WP_HOME . "/images/new-kimono/access/main-banner-shinjuku-shop-sp.jpg" .'" />';
        echo $output;
    }
    elseif ($isPageSendaiParco){
        $output .= '<meta property="og:image" content="'. WP_HOME . "/images/new-kimono/access/banner-access-sendai-sp.jpg" .'" />';
        echo $output;
    }
    elseif ($isPageKanazawa){
        $output .= '<meta property="og:image" content="'. WP_HOME . "/images/new-kimono/access/banner-access-kanazawa-sp.png" .'" />';
        echo $output;
    }
}
add_action('wpseo_head', 'insert_og_image', 100);

function render_sidebar_blog_link($arr, $class, $term_link, $current_blog_link){
    $re = array();
    $re[] = '<div class="blog_links blog_links-'.$class.'">';
    $lastTermLink = substr($term_link, -4);
    if ($lastTermLink !== "blog") {
	    $term_link .= "/blog";
    }
    foreach($arr as $k => $v){
        $current_class = $current_blog_link == $k ? 'blog_link_current' : "";
        $blog_link = $term_link.'/'.$k;
        $re[] = '<a class="blog_link_item '.$current_class.'" href="'.$blog_link.'" title="'.$v.'">'.$v.'</a>';
    }
    $re[] = '</div>';
    return implode('',$re);
}
add_shortcode('links_blog',
    function ($atts) {
        $atts = shortcode_atts( array(
            'popular' => '0',
            'popular_formal' => '0',
            'season' => '0',
            'formal_event' => '0'
        ), $atts );
        $uri = ltrim($_SERVER['REQUEST_URI'],'/') ;
        $uri = explode('/',$uri);
        $current_blog_link = end($uri);
        $data = getTermData();

        if (!empty($data)) {
            $shop = $data['current_cate'];
            $taxonomy = $data['taxonomy'];
        }
        $term_link = get_term_link($shop, $taxonomy);
        if(strpos($term_link,'/access/')=== false) return '';
        $re = array();
        if($atts['popular']=='1'){
            $popular = array(
                'flowers'=>'花','festivals' => '祭り','fireworks' => '花火',
                'autumn-leaves' => '紅葉','kimono' => '着物','yukata' => '浴衣'
            );
           $re[] = render_sidebar_blog_link($popular, 'popular', $term_link, $current_blog_link);
        }
        if($atts['popular_formal']=='1'){
            $popular_formal = array('homongi'=>'訪問着','kurotomesode'=>'黒留袖','irotomesode'=>'色留袖',
                'furisode'=>'振袖','hakama'=>'袴','iromuji'=>'色無地','komon'=>'小紋','obi'=>'帯');
            $re[] = render_sidebar_blog_link($popular_formal, 'popular_formal', $term_link, $current_blog_link);
        }
        if($atts['formal_event']=='1'){
            $formal_event = array('wedding'=>'結婚式','coming-of-age'=>'成人式','graduation'=>'卒業式','enter-school'=>'入学式',
                '753'=>'七五三','shrine-visit-for-birth'=>'お宮参り','tea-ceremony'=>'お茶会','theater-going'=>'観劇');
            $re[] = render_sidebar_blog_link($formal_event, 'formal_event', $term_link, $current_blog_link);
        }
        if($atts['season'] =='1'){
            $season = array(
                'spring'=>'春','march' => '3月','april' => '4月','may' => '5月',
                'summer' => '夏','june' => '6月','july' => '7月','august' => '8月',
                'autumn' => '秋','september' => '9月','october' => '10月','november' => '11月',
                'winter' => '冬','december' => '12月','january' => '1月','february' => '2月'
            );
            $re[] = render_sidebar_blog_link($season, 'season', $term_link, $current_blog_link);
        }
        return implode('',$re);
    }
);
add_filter('wpseo_title', 'swe_filter_wpseo_title');
function swe_filter_wpseo_title($title) {
    if(  is_search() ) {
        global $blog_links, $column_links;
        $tax = get_query_var('taxonomy');
        $shop = get_query_var($tax);
        $uri = $_SERVER['REQUEST_URI'];
        $post_type = get_post_type();
        if ($post_type == 'staff-blog') {
            foreach($blog_links as $v){
                if(strpos($uri, $v) !== false){
                    $title = Yii::t('wp_theme.blog',$shop.'_'.$v.'_title');
                    break;
                }
            }
        } else if (!empty($column_links)) {
            // SEO title for column page
            foreach($column_links as $v){
                if(strpos($uri, $v) !== false){
                    $title = Yii::t('wp_theme.column', 'column_'.$v.'_title');
                    break;
                }
            }
        }
    }
    if(is_tax()){
        $mess = get_spot_yii_t_message();
        if($mess){
            $title = Yii::t('wp_theme.spot',$mess.'_seo_title');
        }
    }
    if(is_search() || is_tax() || is_paged()){
        global $paged;
        if ( $paged >= 2 ) {
            $title .= '（'.Yii::t('wp_theme.blog','{paged}ページ目',array('{paged}' => $paged)).'）';
        }
    }
    return $title;
}
// define the wpseo_metadesc callback
function swe_filter_wpseo_metadesc( $desc ) {
    if(  is_search() ) {
        global $blog_links, $column_links;
        $tax = get_query_var('taxonomy');
        $shop = get_query_var($tax);
        $uri = $_SERVER['REQUEST_URI'];
        $post_type = get_post_type();
        if ($post_type == 'staff-blog') {
            foreach($blog_links as $v){
                if(strpos($uri, $v) !== false){
                    $desc = Yii::t('wp_theme.blog',$shop.'_'.$v.'_desc');
                    break;
                }
            }
        } else if (!empty($column_links)) {
            // SEO description for column page
            foreach ($column_links as $v) {
                if (strpos($uri, $v) !== false) {
                    $desc = Yii::t('wp_theme.column', 'column_' . $v . '_desc');
                    break;
                }
            }
        }
    }
    if(is_tax()){
        $mess = get_spot_yii_t_message();
        if(!empty($mess)){
            $desc = Yii::t('wp_theme.spot',$mess.'_desc_p');
        }
    }
    if(is_search() || is_tax() || is_paged()){
        global $paged;
        if ( $paged >= 2 ) {
            $desc .= Yii::t('wp_theme.blog','{paged}ページ目',array('{paged}' => $paged));
        }
    }
    return $desc;
}
// add the filter
add_filter( 'wpseo_metadesc', 'swe_filter_wpseo_metadesc', 10, 1 );
function swe_yoast_add_keywords( $kw ) {
    if(is_tax()){
        $mess = get_spot_yii_t_message();
        if(!empty($mess)){
            $kw = Yii::t('wp_theme.spot',$mess.'_kw');
        }
    }
    return $kw;
}
add_filter( 'wpseo_metakey', 'swe_yoast_add_keywords', 10, 1 );
// define the wpseo_robots callback
function filter_wpseo_robots( $robotsstr ) {
    global $custom_post_type;
    $post_type = get_query_var('post_type');
    if(is_search() && $post_type == $custom_post_type['blog']){
        return "index, follow";
    }
    return $robotsstr;
};
// add the filter
add_filter( 'wpseo_robots', 'filter_wpseo_robots', 10, 1 );
add_shortcode('blogshoplist', function($atts){
    global $custom_taxonomies;
    $taxonomy = get_query_var('taxonomy');
    $shop_name = get_query_var($taxonomy);
    $taxonomy = $custom_taxonomies['blog'];
    $parent_slugs = array('blog', 'access');
    $arrs = get_blog_order($parent_slugs, $taxonomy);
    $kansai = $kanto = $hokuriku = array();
    foreach ($arrs as $child) {
        $order = get_field('blog_order', $child);
        $order = $order ? $order : $child->term_id;
        $region_name = get_field('region_name', $child);
        $region_name = $region_name ? $region_name : 'kansai';
        $region_title = array('kansai' => '関西地区', 'kanto' => '関東地区', 'hokuriku' => '北陸地区');
        if($region_name == 'kansai'){
            $kansai[$order] = $child;
        }
        if($region_name == 'kanto'){
            $kanto[$order] = $child;
        }
        if($region_name == 'hokuriku'){
            $hokuriku[$order] = $child;
        }
    }
    $childs = array('kansai' => $kansai, 'kanto' => $kanto, 'hokuriku' => $hokuriku);
    ob_start();
    if (count($childs) > 0):
        ?>
        <div class="right-sidebar-category archive">
            <h2 class="title-right-sidebar flexbox align-items-center">
                <span class="icon-prize"><img src="<?php echo WP_HOMES; ?>/images/formal-rental/icon-prize.svg"></span><?php echo Yii::t('wp_theme', '他店舗ブログ')  ?>
            </h2>
            <div class="container-rsb">
                <ul class="archive-list">
                    <?php foreach ($childs as $region_name => $shops): ?>
                        <?php
                        ksort($shops);
                        $title = $region_title[$region_name];
                        ?>
                        <li class="archive-list-item dropdown active">
                            <a href="#" class="title-dropdown"><?php echo $title?></a>
                            <ul class="archive-sub-list" style="display: block;">
                                <?php
                                foreach ($shops as $order => $shop):
                                    $class = '';
                                    if (isset($shop) && $shop->slug == $shop_name) {
                                        $class = 'active';
                                    }
                                    ?>
                                    <li class="<?php echo implode(' ', array($region_name, $order, $class, $shop->slug)); ?>">
                                        <a class="short_title <?php echo $shop->slug?>"
                                           href="<?php echo get_term_link($shop, $taxonomy); ?>"
                                           title="<?php echo $shop->name; ?>">
                                            <?php echo $shop->name. '(' . $shop->count . ')'; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php
        endif;
    $outputBuffer = ob_get_clean();
    return $outputBuffer;
});

function swe_template_redirect()
{
    if( is_single() && ! is_user_logged_in() )
    {
        global $post;
        $request_uri = $_SERVER['REQUEST_URI'];
        $match = preg_match("/^\/(access|blog)/", $request_uri);
        if(get_post_type($post) === 'staff-blog' && $match !== 0){
            $post_id = $post -> ID;
            swe_set_primary_term_link($post_id);
            $uri = strtolower(WP_HOMES.$request_uri);
            $post_link = strtolower(get_permalink($post_id));
            if(strcmp($post_link, $uri) !== 0){
                wp_redirect($post_link);
                exit;
            }
        }
    }
}
add_action( 'template_redirect', 'swe_template_redirect' );

// Add Style and Script for: Group Category For Post in Admin
add_action('admin_footer-post.php', 'group_category_post_admin'); // Fired on post edit page
add_action('admin_footer-post-new.php', 'group_category_post_admin'); // Fired on add new post page
function group_category_post_admin(){
    echo "<link rel='stylesheet' href='".get_template_directory_uri()."/css/group-category-post-admin.css' type='text/css' media='all'>";
    echo "<script type='text/javascript' src='".get_template_directory_uri()."/js/group-category-post-admin.js'></script>";
}

function swe_add_query_vars_filter( $vars ) {
    $vars[] = "spot_meta_group";
    $vars[] = 'spot_meta_child';
    return $vars;
}
add_filter( 'query_vars', 'swe_add_query_vars_filter' );

function render_sidebar_spot_link(){
    $arrs = array(
        array('childs' => array('spring','summer','autumn','winter','well-kept-secret'),
            'parent_key' => 'placesights'),
        array('childs' => array('kids','rainy-day','girls-group','couple'),
            'parent_key' => 'course'),
        array('childs' => array('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'),
            'parent_key' => 'event'),
        array('childs' => array('specialty','lunch', 'café'),
            'parent_key' => 'gourmet')
    );
    $data = getTermData();
    if (!empty($data)) {
        $cate = $data['current_cate'];
        $taxonomy = $data['taxonomy'];
        $term_link = get_term_link($cate, $taxonomy);
        if($cate->slug === 'route-spot' || $cate->slug === 'spot'){
            return '';
        }
    }
    $re = array();
    foreach ($arrs as $arr){
        $parent_key = $arr['parent_key'];
        $title = Yii::t('wp_theme.spot', 'spot_'.$parent_key.'_name');
        if(empty($title)){
            $title = $arr['title'];
        }
        $re[] = '<div class="sidebar_spot_link '.$parent_key.'"><h4>'.$title.'</h4><ul>';
        foreach ($arr['childs'] as $v) {
            $link = $term_link.'/'.$parent_key.'/'.$v;
            $name = Yii::t('wp_theme.spot','spot_'.$parent_key.'_'.urlencode($v).'_name');
            $re[] = '<li><a href="'.$link.'">'.$name.'</a></li>';
        }
        $re[] = '</ul></div>';
    }
    return implode('',$re);
}
add_shortcode('links_spot',
    function ($atts) {
        return render_sidebar_spot_link();
    }
);

/*
 * Adding Advertisement banner
 * Use: [advertisement_banner adv_sidebar=1] - for sidebar
 *      [advertisement_banner] - for other place
 */
add_shortcode( 'advertisement_banner', 'advertisementBanner');
function advertisementBanner($attr){
	$default = array(
		'adv_sidebar' => 0,
	);
	$attrShortCode = shortcode_atts($default,$attr);

	if(intval($attrShortCode['adv_sidebar']) == 1){
		$srcImage = WP_HOME.'/images/adv_banner_sidebar.png';
		$bannerList = array(
			array(
				'src_img' => $srcImage,
				'page_advertisement' => 'advertise-relay',
				'utm_source' => 'kyotokimono-rental.com',
				'utm_medium' => 'banner',
				'utm_campaign' => 'kyotokimono-banner-top',
				'page_param' => urlencode('https://www.airtrip.jp/?&source=wargo.airtrip.jp&utm_source=kyotokimono-rental.com&utm_medium=banner&utm_campaign=kyotokimono-banner-top')
			)
		);
	}else{
		if(Yii::app()->mobileDetect->isSmartPhone()){
			$srcImage = WP_HOME.'/images/adv_banner_normal_sp.png';
		}else{
			$srcImage = WP_HOME.'/images/adv_banner_normal_pc.png';
		}
		$bannerList = array(
			array(
				'src_img' => $srcImage,
				'page_advertisement' => 'advertise-relay',
				'utm_source' => 'kyotokimono-rental.com',
				'utm_medium' => 'banner',
				'utm_campaign' => 'kyotokimono-banner-complete',
				'page_param' => urlencode('https://www.airtrip.jp/?&source=wargo.airtrip.jp&utm_source=kyotokimono-rental.com&utm_medium=banner&utm_campaign=kyotokimono-banner-complete')
			)
		);
	}

	ob_start();
	include(locate_template('include/advertisement_banner.php'));
	return ob_get_clean();
}

function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


/*
 *  Blog For Group Page
 * Use: [BlogForGroup]
 */
add_shortcode('BlogForGroup','BlogForGroupCode');
function BlogForGroupCode($attr,$content = null) {
    $attr_shortcode = shortcode_atts(array(
        'number' => Yii::app()->mobileDetect->isSmartPhone() ? 2 : 4,
    ),$attr);
    $args_my_query = array(
        'post_type' => 'staff-blog',
        'meta_query' => array(
            array(
                'key'     => 'for_group_blog',
                'value'   => true,
            ),
        ),
        'posts_per_page' => $attr_shortcode['number'],
        'order' => 'DESC',
        'orderby' => 'date',
    );
    $query = new WP_Query($args_my_query);
    ob_start();
    include(locate_template('include/group-for-blog.php'));
    return ob_get_clean();
}

/*
 *  New Access Page Yukata
 * Use: [new_access_page_yukata]
 */
add_shortcode('new_access_page_yukata','New_Access_Page_Yukata');
function New_Access_Page_Yukata($attr,$content = null) {
    ob_start();
    include(locate_template('include/new-access-page-yukata.php'));
    return ob_get_clean();
}
//Disable Yoast Schema
function disable_yoast_schema_data($data){
    $data = array();
    return $data;
}
add_filter('wpseo_json_ld_output', 'disable_yoast_schema_data', 10, 1);


/*
 *  Widget Photo Gallery for Top Page V3
 * Use: [WidgetPhotoGalleryTopPageV3]
 */
add_shortcode('WidgetPhotoGalleryTopPageV3','WidgetPhotoGalleryTopPageV3Code');
function WidgetPhotoGalleryTopPageV3Code($attr,$content = null) {
    ob_start();
    include(locate_template('include/widget-photo-gallery-top-page-v3.php'));
    return ob_get_clean();
}

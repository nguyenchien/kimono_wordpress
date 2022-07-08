<?php
define('MEDIA_POST_ID_MAX',118764);
global $custom_post_type, $custom_taxonomies, $sites;
$sites = array('ja' => 1, 'en' => 2, 'vi' => 3, 'tw' => 4,'cn' => 5,
    'ko' => 6,'ru' => 7, 'th' => 8,'id' => 9, 'ms' => 10,
    'fr' => 11, 'hi' => 12, 'blog_media' => 14);
$custom_taxonomies = array('blog'=>'shop-blog','news'=>'news-category','news_feed'=>'news_feed','spot'=>'spot-cate','customer-gallery'=>'customer-gallery');
$custom_post_type = array('blog'=>'staff-blog','news'=>'news','spot'=>'spot-post');


add_filter('widget_text', 'php_set_base_url', 99);
add_filter( 'get_the_excerpt', 'php_set_base_url',99 );
add_filter( 'wpseo_twitter_image', 'php_set_base_url', 10, 1 );
add_filter( 'wpseo_opengraph_image', 'php_set_base_url', 10, 1 );
function php_set_base_url($text) {
	$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
	preg_match_all('/<img[^>]+>/i',$text, $result);
	$img = array();
	if (!empty($result[0])){
	foreach( $result[0] as $img_tag)
	{
		   preg_match_all('/(class)=("[^"]*")/i',$img_tag, $img[$img_tag]);
	}
	if (!empty($img)) {
		foreach ($img as $e=>$attr) {
			if (!isset($attr[2]) && !isset($attr[2][0])) {
				continue;
		}
			$class = str_replace('"', '', $attr[2][0]);
			$class = explode(" ", $class);
			$isRemove = $isSmartPhone && in_array("pc",$class) ? true : (!$isSmartPhone && in_array("sp",$class) ? true : false);
			if ($isRemove){
				$text = str_replace($e,'',$text);
			}
		}
	}
	}
	return $text = preg_replace(
        array('/((http|https):)?\/\/(localhost|test.vtown.vn)\/(dev\/)?kimono(_soon|_bring_group)*\/data\//','/\[base_url\]/'),
        array(WP_HOMES . '/',WP_HOMES ),
        $text);
}
function wp_translate_parse($text) {
	preg_match_all('{wp_mtranslate_[\w-]*}', $text, $list_param);
	if (!empty($list_param[0])) {
		foreach($list_param[0] as $param) {
			$text = str_replace("{".$param."}",Yii::t('wp_mtranslate', $param),$text);
		}
	}
	return $text;
}
add_filter('the_content', 'filter_the_content', 99);
function filter_the_content($text) {
	global $isSmartPhone;
	if (is_front_page()) {
		if ($isSmartPhone) {
			$text = str_replace("<pc>","<!--",$text);
			$text = str_replace("</pc>","-->",$text);
		} else {
			$text = str_replace("<sp>","<!--",$text);
			$text = str_replace("</sp>","-->",$text);
		}
	}
	return $text = preg_replace(
		array('/((http|https):)?\/\/(localhost|test.vtown.vn)\/(dev\/)?kimono(_soon|_bring_group)*\/data\//','/\[base_url\]/'),
		array(WP_HOMES . '/',WP_HOMES ),
		$text);
}

function get_group_image($image_id, $attr = '' ){
    global $sites;
    $detect = Yii::app()->mobileDetect;
    $isSmartphone = $detect->isSmartphone();
    $lang = Yii::app()->language;
    $image = swe_wp_get_attachment_image_src($image_id, 'full');
    $url = get_trans_banner($image[0], $isSmartphone, $lang);
    $attr = array();
    $attr['src'] = $url;
    $image = swe_wp_get_attachment_image($image_id, 'full', false, $attr);
    return $image;
}
function get_group_banner(){
	global $post;
	$args = array(
		'post_parent' => get_page_by_path('group')->ID, // page group
		'post_type' => 'page',
		'order' => 'asc',
		'orderby' => 'menu_order',
	);
	$the_query = new WP_Query($args);
	
	//$get_field = $detect->isSmartPhone() ? 'group_banner_mobile' : 'group_banner';
	$group_banner = array();

	while ( $the_query->have_posts() ) {
		$the_query->the_post();
        $image_id = get_field('group_banner');
        $image = get_group_image($image_id);
		$link = get_permalink($post->ID);
		$group_banner[] = array('img' => $image, 'link'=>$link);
	}
	return $group_banner;
}

function get_trans_banner($url_img, $isMobile=false, $lang='ja', $folder_name="group"){
	if ($isMobile){
		$url_img = substr_replace($url_img, '-mobile.', strrpos($url_img, '.'), 1);
		$url_img = str_ireplace('.jpg', '.png', $url_img);
	}
	$name_img = explode('/',$url_img);
		$name_img = explode('.',end($name_img));
	$img_ext=wp_check_filetype($url_img);
	if($lang != 'ja' || $isMobile){
		$url_img= WP_HOMES."/images/".$folder_name."/{$name_img[0]}-{$lang}.{$img_ext['ext']}";
	}
	return $url_img;
}

function getListShopInAccess(){
    $lang = Yii::app()->language;
//	delete_transient('getListShopInAccess_'.$lang);
	if ( false === ($re = get_transient('getListShopInAccess_'.$lang))) {
		$args = array( 
			'child_of' => get_page_by_path('access')->ID, 
			'sort_column' => 'menu_order', 
			'sort_order' => 'ASC' ) ;

		$mypages = get_pages($args);

		foreach($mypages as $page){
			$arr[$page->post_name] = array(
	//            'link' => get_permalink($page->ID),
				'region_name' => get_field('region_name', $page->ID),
				'link' => '#',
				'title' => Yii::t('wp_theme','Go to shop {shopname}', array('{shopname}'=>get_the_title($page->ID))),
				'shopname'=>Yii::t('wp_theme','{shopname} Store', array('{shopname}'=>get_the_title($page->ID)))
			); 
			
		}

		$re = $arr;
		set_transient( 'getListShopInAccess_'.$lang, $arr, 60*60*24*7 );
	}

    return $re;
}
function getshopList(){
//	delete_transient( 'footer-getshopList' );
	if ( false === ( $shopList = get_transient( 'footer-getshopList' ) ) ) {
//		$shopquery = "SELECT s.`shop_id`, TIME_FORMAT(SUBTIME(s.`open_time`, '1:0:0'), '%k:%i') AS `open_time`,";
		$shopquery = "SELECT s.`shop_id`, TIME_FORMAT(s.`open_time`, '%k:%i') AS `open_time`,";
		$shopquery .= " TIME_FORMAT(ADDTIME(s.`close_time`, '1:0:0'), '%k:%i') AS `close_time`,";		
		$shopquery .= " TIME_FORMAT(s.`close_time`, '%k:%i') AS `final_acceptance_time`,";
		$shopquery .= " s.`more_conf`,";
		$shopquery .= " TIME_FORMAT(ADDTIME(s.`close_time`, '0:30:0'), '%k:%i') AS `return_time` FROM `shop` s";
		$shopList = wpdbGetResults($shopquery, 'shop_id', ARRAY_A);
		
		// Put the results in a transient. Expire after 12 hours.
		set_transient( 'footer-getshopList', $shopList, 60*60*24*7 );
	}
	return $shopList;
}

function getShopInformationFromSlug(){
	$shop_information = array();
	foreach (MasterValues::$MV_SHOP_SLUG as $shop_id => $page_path){
		if ($post = get_page_by_path($page_path)) { // Get page by path
			//get Shop Information Custom field from cache
			$shop_information[$shop_id] = Yii::app()->cache->get('SHOP_INFORMATION_CUSTOM_FIELD_'.$shop_id);

			if(empty($shop_information[$shop_id])){
				$post_id = $post->ID; // Get ID of page
				$shop_information_key = 'shop_information';
				$shop_information_value = get_field($shop_information_key, $post_id); // get shop_information field (in WordPress) of this page
				$shop_information[$shop_id] = json_decode($shop_information_value, true);

				//set Shop Information Custom field into cache
				Yii::app()->cache->set('SHOP_INFORMATION_CUSTOM_FIELD_'.$shop_id, $shop_information[$shop_id]);
			}
		}
	}
	return $shop_information;
}

/**
 * 
 * @param type $atts
 * @return string|boolean
 * use in: /kimono/tenimotsu, /access, /access/{shop-slug}, /blog, /blog/{shop-slug}
 */
// [shop_time shop_detail="" shop_detail3="" shop=""]
add_shortcode('shop_time', 'shop_time');
function shop_time( $atts ) {
    $a = shortcode_atts( array(
		'get_time'=>'business_time',
        'shop_detail' => 'off',
		'shop_detail3' => 'off',
		'shop' => 'shinkyogoku'
    ), $atts );		
	$shopList = getShopInformationFromSlug();
	$shops = array(
		'shinkyogoku'=>1, 'kiyomizuzaka'=>2,'ninenzaka'=>3,'kinkakuji'=>4, 'kyotostation'=>5, 'gionsijo'=>6, 'gion-shijo'=>6,
		'osaka-shinsaibashi'=>7, 'asakusa'=>8, 'kamakura'=>9, 'kanazawa'=>10, 'petitkyotostation'=>15, 'formal-kyototower'=>5, 'tokyoskytree'=>17);
	$shop = $shopList[$shops[$a['shop']]];
	if($a['shop_detail']=='on'){				
		return $str ='
			<p><strong>'.Yii::t('wp_theme.access','営業時間').'</strong><br>'.$shop['open_time'].'～'.$shop['close_time'].'</p>			
			<p><strong>'.Yii::t('wp_theme.access','着付け最終受付時間').'</strong><br>'.$shop['final_acceptance_time'].'</p>
			<p><strong>'.Yii::t('wp_theme.access','返却締め切り時間').'</strong><br>'.$shop['return_time'].'</p>';		
	}
	elseif($a['shop_detail3']=='on'){		
		return $str ='
			<span class="icon clock time-open">'.$shop['open_time'].'～'.$shop['close_time'].'</span>
			<span class="violet time-return">※'.Yii::t('wp_theme.access','最終返却').' '.$shop['return_time'].'。</span>';
				
	}elseif($a['get_time']=='business_time'){		
		return $str ='<h6 class="time-open">'.$shop['open_time'].'-'.$shop['close_time'].'</h6>';		 		
	}else{
		return false;
	}
}
// [bottom_banner] used for seijin page
add_shortcode('bottom_banner', 'show_bottom_banner');
function show_bottom_banner($attributes) {
	global $post;
	$banners = '';

	if ($bottom_banner_field = get_field('bottom_banner', $post->ID)){
		$banners = $bottom_banner_field;
	}

	return $banners;
}
/**
 * Add checking for Yukata
 */
function detectYukata() {
	global $post;
	global $is_yukata;
	// Detect plan type is Yukata
    if(empty($post)) {
	    // Detect plans has plan yukata
	    if(BookingCart::hasCart()) {
		    $bookingCart = BookingCart::Cart();
		    $plans = $bookingCart->plans ? $bookingCart->plans: array();
		    $urlCurrent = yii::app()->request->url;
		    $newBookingLink = preg_match ( '/\/newBooking(\/)+?/', $urlCurrent);
		    
		    foreach ($plans as $plan) {
			    if (MasterValues::MV_GROUP_YUKATA == $plan->PlanType->for_group && $newBookingLink) {
				    $is_yukata = true;
				    break;
			    }
		    }
	    }

    	return;
    }

	// Detect Reserve page
	$reserve_check_link = preg_match ( '/^(\/(en|tw|vi|ko|ru|th|id|ms|fr|cn|hi)){0,2}\/reserve(\/)?/', str_replace(WP_HOMES,'',get_permalink( $post->ID )));
	if (!empty($_SESSION['selected_group']) && $reserve_check_link) {
		$selected_group = (int)$_SESSION['selected_group'];
		$is_yukata = $selected_group == MasterValues::MV_BOOK_TYPE_YUKATA ? true : false;
		return;
	}

	$cookie_enabled = true;
	// Check if Cookies are Enabled
	if (count($_COOKIE) <= 0) {
		$cookie_enabled = false;
	}
	// Check if is_yukata cookie is set
	if($cookie_enabled && !isset($_COOKIE['is_yukata'])) {
		// Set default value to is_yukata cookie
		setcookie('is_yukata', false, 0, "/");
	}
	// Get is_yukata cookie
	$is_yukata = isset($_COOKIE['is_yukata']) ? (bool)$_COOKIE['is_yukata'] : false;
	// Detect yukata link clicked
	$yukata_check_link = preg_match ( '/\/yukata/', str_replace(WP_HOMES,'',get_permalink( $post->ID )));
	// Detect kimono link clicked
	$kimono_check_link = preg_match ( '/^(\/(en|tw|vi|ko|ru|th|id|ms|fr|cn|hi)){0,2}\/(kimono|osaka|asakusa|petit)/', str_replace(WP_HOMES,'',get_permalink( $post->ID )));
	// Detect kimono homepage link
	$wp_home_pattern = '/^'.str_replace('/', '\/', WP_HOMES).'(\/)?(en|tw|vi|ko|ru|th|id|ms|fr|cn|hi){0,2}(\/)?$/';
	$kimono_check_link = $kimono_check_link == true ? $kimono_check_link : (preg_match($wp_home_pattern, get_permalink( $post->ID )) ? true : false);
	// Specify is_yukata value
	$is_yukata = $yukata_check_link ? true : false;
	// Set cookie for is_yukata
	if ($cookie_enabled) {
		setcookie('is_yukata', $is_yukata, 0, "/");
	}
}
add_action('get_header', 'detectYukata', 1);

/**
 * Add check area
 * @return bool|int
 */
function detectArea() {
	global $post;
	global $is_osaka;
	global $is_asakusa;

	if (empty($post)) {
		return false;
	}

	// Detect osaka page
	$is_osaka_link = preg_match ( '/^(\/(en|tw|vi|ko|ru|th|id|ms|fr|cn|hi)){0,2}\/osaka(\/)?/', str_replace(WP_HOMES,'',get_permalink($post->ID)));
	$is_osaka = $is_osaka_link ? true: false;

	// Detect asakusa page
	$is_asakusa_link = preg_match ( '/^(\/(en|tw|vi|ko|ru|th|id|ms|fr|cn|hi)){0,2}\/asakusa(\/)?/', str_replace(WP_HOMES,'',get_permalink($post->ID)));
	$is_asakusa = $is_asakusa_link ? true: false;

	return ($is_osaka || $is_asakusa);
}
// add checking area
add_action('get_header', 'detectArea', 2);

/*
 * Task #12019: SEO for language page content
 */
/**
 * Load template 404 if lang content is not translate
 */
function load_template_404() {
	// Add jquery to header
	add_action('wp_head',function() {
		echo '<script type="text/javascript"  src="'.WP_HOMES.'/js/jquery.min.js"></script>';
	}, 1);

	// Set Site Title
	add_filter('wpseo_title', function () {
		$site_description = get_bloginfo( 'description', 'display' );

		return  Yii::t('wp_theme','Page Not Found').' | '.$site_description;
	}, 11, 2);

	// Load 404-customize template
	load_template(dirname(dirname(__FILE__)) . '/twentytwelve/404-customize.php');
	// Exit the program
	exit();
}
/**
 * Process category supported in language_support defined
 */
/*function process_category_supported_lang() {
	// Get global parameters
	global $getLanguage;
    if(empty($getLanguage)){
        // Check is qtrans or qtranxf function exists
        $getLanguage = function_exists('qtrans_getLanguage') ? 'qtrans_getLanguage': (function_exists('qtranxf_getLanguage') ? 'qtranxf_getLanguage': null);
    }
	//Check is query if it's not category or singular return
	if (is_singular() or !is_category()) {
		return;
	}

	$cat = get_query_var('cat');
	$cat = get_category($cat);
	$language_support = get_field('language_support', $cat);
	$language_support = is_array($language_support) ? $language_support: array();

	//Check lang current supported translate
	if (in_array($getLanguage(), $language_support)) {
		return;
	}

	load_template_404();
}*/

/**
 * process taxonomy supported in language_support defined
 */
/*function process_taxonomy_supported_lang($taxonomies ) {
	global $getLanguage;
    if(empty($getLanguage)){
        // Check is qtrans or qtranxf function exists
        $getLanguage = function_exists('qtrans_getLanguage') ? 'qtrans_getLanguage': (function_exists('qtranxf_getLanguage') ? 'qtranxf_getLanguage': null);
    }
	if (empty($taxonomies)) {
		return false;
	}

	$language_support = getTaxonomyField($taxonomies, 'language_support');
	$language_support = is_array($language_support) ? $language_support: array();

	//Check lang current supported translate
	if (in_array($getLanguage(), $language_support)) {
		return true;
	}

	load_template_404();
}*/

/**
 * Detect content available in lang
 * @return bool
 */
/*function detectContentAvailableInLang() {
	// Get global parameters
	global $post;
	global $getLanguage;
	global $isAvailableIn;

	// Check if is 404 not found page
	if (is_404()) {
		return;
	}
	
	// Check if valid date field is set
	if (get_field('valid_date')) {
		// Get today date
		$today = date("Y/m/d");
		// Get valid date
		$valid_date = get_field('valid_date');
		// Parse valid date
		strtotime($valid_date);
		// Check if today greater than valid date
		if ($today > $valid_date) {
			// Render 404 template page
			global $wp_query;
			$wp_query->set_404();
			status_header(404);
			return;
		}
	}

	// Check is qtrans or qtranxf function exists
	$getLanguage = function_exists('qtrans_getLanguage') ? 'qtrans_getLanguage': (function_exists('qtranxf_getLanguage') ? 'qtranxf_getLanguage': null);
	// Check qtrans or qtranxf's isAvailable exists
	$isAvailableIn = function_exists('qtrans_isAvailableIn')  ? 'qtrans_isAvailableIn': (function_exists('qtranxf_isAvailableIn') ? 'qtranxf_isAvailableIn': null);

	// Check if category
//	if (!is_singular()) {
//		process_category_supported_lang();
//	}

	// Get current queried object
	$queried_obj = get_queried_object();
	
	if (!empty($queried_obj)) {
		if (is_single() ) {
			$taxonomies = get_post_taxonomies(); 
			$taxonomy = $taxonomies[0];
			$cat = get_category_permalink($queried_obj, $taxonomy);
			if (!empty($cat)) {
				if(process_taxonomy_supported_lang($cat)){
					if(strpos($post->post_content, Yii::t('wp_theme', 'Sorry, this entry is only available in')) === false){
						return;
					}else{
						load_template_404();
					}
				}
			}
			return;
		}
		elseif(is_tax() || is_category()){			
			$taxonomies = $queried_obj;
		}
		else{
			// Get current queried object's taxonomies
			$taxonomies = !empty($queried_obj->taxonomies) ? $queried_obj->taxonomies : null;
			$taxonomies = !empty($taxonomies) ? $taxonomies : (!empty($queried_obj->taxonomy) ? $queried_obj->taxonomy : null);			
		}
		// Check if taxonomy
		if (!empty($taxonomies)) {
			return process_taxonomy_supported_lang($taxonomies);
		}
	}
	
	if (!$getLanguage OR !$isAvailableIn) {
		return;
	}

	// Get current language
	$lang = $getLanguage();

	// Check is current post has target language
	if ($isAvailableIn($post->ID, $lang)) {
		return;
	}

	load_template_404();
}*/
//add_action('template_redirect', 'detectContentAvailableInLang', 1);

	/**
	 * Get Taxonomy fields
	 *
	 * @param string|array $taxonomies list of taxonomies
	 * @param string $field_name name of field to getting
	 * @return mixed|array list of fields items found, false of empty other wise.
	 */
function getTaxonomyField($taxonomies, $field_name) {
	$field_items = array();
	// Check current queried object's taxonomies empty
	if (empty($taxonomies)) {
		return false;
	}
	// Convert $taxonomies to array if not array
	if (!is_array($taxonomies)) {
		$taxonomies = array($taxonomies);
	}
	// Loop each of taxonomies
	foreach ($taxonomies as $taxonomy) {
		// Get terms of taxonomy
//		$terms = get_terms($taxonomy);
		// Check is get terms error
//		if ( is_wp_error($terms) ) {
//			continue;
//		}
		// Loop each of terms item
//		foreach ($terms as $term) {
			// Get field values of term
			$fields = get_field($field_name, $taxonomy);
			if(empty($fields) && $taxonomy->parent != 0){
				// Get terms of taxonomy
				$parent = get_term($taxonomy->parent, $taxonomy->taxonomy);
				$fields = get_field($field_name, $parent);
			}
			// Check fields empty or array
			if (!empty($fields)) {
				if (is_array($fields)) {
					// Merge to $field_items list
					$field_items = array_unique(array_merge($field_items, $fields));
				} else {
					$field_items = $fields;
				}
			}
//		}
	}

	return $field_items;
}

/**
 * Display language items menu
 */
function swe_generateLanguageCode() {
    if ( function_exists( 'get_the_msls' ) ) return get_the_msls();
}
// Task #12019: SEO for language page content

/*get term infomation and check current cate or single have term-slug = blog*/
function getTermData(){
	if(is_category() || is_tax() || is_single()){
		global $post, $custom_taxonomies;
		if(is_category()){
			$taxonomy = 'category';
			$cat = get_query_var('cat');
			$current_cate = get_category($cat);
		}
		if(is_tax()){
			$taxonomy = get_query_var('taxonomy');
			$term = term_exists(get_query_var('term'), $taxonomy);
			$current_cate = get_term($term['term_id'], $taxonomy);
		}
		if (is_single() ) {
			$taxonomies = get_post_taxonomies();
            if(empty($taxonomies))
                return false;
			$taxonomy = $taxonomies[0];
			if($taxonomy === $custom_taxonomies['news_feed'])
			    return false;
			$current_cate = get_category_permalink($post,$taxonomy);
		}
		return array(
			'taxonomy' => $taxonomy,
			'current_cate' => $current_cate,
			'parent' => $current_cate->parent != 0 ? get_term($current_cate->parent, $taxonomy) : $current_cate
		);
	}
}

function get_category_permalink($post, $taxonomy = 'category'){
    $cat = new WPSEO_Primary_Term($taxonomy, $post->ID);
    $cat_id = $cat->get_primary_term();
	$cat_id = !empty($cat_id) ? $cat_id : get_post_meta($post->ID, '_category_permalink', true);
	if($cat_id) {
		$cate = get_term($cat_id, $taxonomy);
	} elseif($post->post_type == 'post'){
		$cats = get_the_category($post->ID);
		if ( $cats ) {
            $cats = wp_list_sort($cats, array(
                'term_id' => 'ASC',
            ));

			/**
			 * Filter the category that gets used in the %category% permalink token.
			 *
			 * @since 3.5.0
			 *
			 * @param stdClass $cat  The category to use in the permalink.
			 * @param array    $cats Array of all categories associated with the post.
			 * @param WP_Post  $post The post in question.
			 */
			$category_object = apply_filters( 'post_link_category', $cats[0], $cats, $post );

			$cate = get_term( $category_object, 'category' );
		}
	}else{ // custom post type and custom taxonomy
		$terms = wp_get_post_terms($post->ID, $taxonomy, array('orderby' => 'term_id'));
		if ( $terms and ! is_wp_error( $terms ) ) {
			$parents  = array_map( function($term){
				if ( isset( $term->parent ) and $term->parent > 0 ) {
					return $term->parent;
				}
			}, $terms );
			$newTerms = array();
			foreach ( $terms as $key => $term ) {
				if ( ! in_array( $term->term_id, $parents ) ) {
					$newTerms[] = $term;
				}
			}
			$cate  = reset( $newTerms );
		}
	}
	return !empty($cate) ? $cate : false;
}
/**
 *
 * @param type $cate
 * @return string
 */
function get_category_data($cate, $taxonomy='category') {
    $data = array();
    $data['id'] = !empty($cate->term_id) ? $cate->term_id : '';
    $data['name'] = !empty($cate->name) ? $cate->name : '';
    $data['description'] = !empty($cate->description) ? $cate->description : '';
    $data['img_src'] = get_cate_image_src('cate_img_src',$cate);
    $data['shop'] = get_field('shop_name', $cate);
    $data['cate_h1'] = get_field('cate_h1', $cate);
    $data['cate_h1'] = ($data['cate_h1'] == '' ? $data['name'] : $data['cate_h1']);
    $data['class'] = 'shop-' . $cate->slug;
    return $data;
}
/**
 * Remove the slug from published post permalinks.
 */
function custom_remove_cpt_slug( $post_link, $post, $leavename ) {
	$get_post_types = get_post_types( array( '_builtin' => false, 'publicly_queryable' => true, 'show_ui' => true ) );
	unset($get_post_types['news']);
	
    if ( !in_array($post->post_type, $get_post_types) || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'custom_remove_cpt_slug', 10, 3 );
/**
 * Some hackery to have WordPress match postname to any of our public post types
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * Typically core only accounts for posts and pages where the slug is /post-name/
 */
/*function custom_parse_request_tricksy( $query ) {

    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;

    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
	$get_post_types = get_post_types( array( '_builtin' => false, 'publicly_queryable' => true, 'show_ui' => true ) );
	unset($get_post_types['news']);
    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array_merge($get_post_types, array( 'post', 'page' ) ));
    }
}
add_action( 'pre_get_posts', 'custom_parse_request_tricksy' );*/
function getTranslateContent($text){
    $split_regex = "#(\[:[a-z]{2}\]|\[:\])#ism";
    $blocks = preg_split($split_regex, $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
    if(count($blocks)<=1)//no language is encoded in the $text, the most frequent case
        return $text;
    $result = array();
    $current_language = false;
    foreach($blocks as $block) {
        if(preg_match("#^\[:([a-z]{2})\]$#ism", $block, $matches)) {
            $current_language = $matches[1];
            continue;
            // detect s-tags @since 3.3.6 swirly bracket encoding added
        }
        switch($block){
            case '[:]':
                $current_language = false;
                break;
            default:
                // correctly categorize text block
                if($current_language){
                    if(!isset($result[$current_language])) $result[$current_language]='';
                    $result[$current_language] .= $block;
                    $current_language = false;
                }
                break;
        }
    }
    //it gets trimmed later in qtranxf_use() anyway, better to do it here
    foreach($result as $lang => $text){
        $result[$lang]=trim($text);
    }
    $current_lang = Yii::app()->language;
    if(!empty($result[$current_lang])) return $result[$current_lang];
    return false;
}
/**
 * Detect price tag in plan menu and replace with plan's total price
 * 
 * @param $items
 * @param $args
 * @return mixed $items
 */
function render_plan_menu($items, $args){
	// Init list of parent items that has has-price
	$parent_hasprice_menu = array();
	// Loop each of nav menu items
	foreach ($items as $item) {
		// Lookup has-price class in item's classes
		if (in_array('has-price', $item->classes)){
			// Push to list of parent items
			$parent_hasprice_menu[] = $item->ID;
		};
		// Check if item's menu_item_parent in list of parent items
		if (in_array($item->menu_item_parent, $parent_hasprice_menu)){
			// List Menu Link support price tag
			$url_has_price_list = array(
				1	=>	'/reserve#Standard-Kimono',
				2	=>	'/reserve#Premium-Kimono',
				26	=>	'/reserve#High-end-Kimono',
				3	=>	'/reserve#Mamechiyo-Kimono',
				35	=>	'/reserve#Furisode-Hanhaba',
				36	=>	'/reserve#Furisode-Fukuro',
				4	=>	'/reserve#Men-Kimono',
				82	=>	'/reserve#Kimono-Girl',
				6	=>	'/reserve#Couple-Standard-Kimono',
				12	=>	'/reserve#Standard-Yukata',
				13	=>	'/reserve#Premium-Yukata',
				14	=>	'/reserve#High-end-Yukata',
				15	=>	'/reserve#Mamechiyo-Yukata',
				16	=>	'/reserve#Summer-Kimono',
				17	=>	'/reserve#Girl-Yukata',
				18	=>	'/reserve#Men-Yukata',
				20	=>	'/reserve#Couple-Standard-Yukata',
				79	=>	'/reserve#Brand-Yukata'
			);
			// Get Plan Type Id by Item link if support
			$plan_type_id = null;
			foreach ($url_has_price_list as $link_plan_type=>$link_pattern) {
				if (strpos($item->url, $link_pattern) !== false) {
					$plan_type_id = $link_plan_type;
				}
			}
			$price_type = '{for menu}';
			if (empty($plan_type_id)) {
				// Get Plan Type Id by Post's customer field if empty
				$plan_type_id = get_field('plan_type_id', $item->object_id);
			}
			// Create function for format price tag
			$format_price_tag = function( $matches ) use ( $plan_type_id, $price_type ) {
				// Format price tag with matched tag
				return format_price_tag($matches[0], $plan_type_id, $price_type);
			};
			// Format nav menu item title with parsed plan price.
			$item->title = preg_replace_callback(MasterValues::$price_tag_pattern, $format_price_tag, $item->title);
		}
	}
	
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'render_plan_menu', 11, 2 );
	
function format_price_tag($tag, $plan_type_id, $field_name = 'webprice') {
	// Init replace as empty string
	$replace = '';
	// Check matched tag and plan_type_id
	if (empty($tag) OR empty($plan_type_id)) {
		return $replace;
	}
	// Check param tag in list of allowed price tag list
	if (in_array(preg_replace('/{|}/', '', $tag), MasterValues::$price_tag_list)) {
		// Get plan price of price tag
		$plan_price = MasterValues::getPlanPrice("{price}-{$plan_type_id}", $field_name);
		// Replace plan price with price tag
		$replace = !empty($plan_price) ? $plan_price : $replace;
		// Check if still empty
		// Go to check for min price tag
		if (empty($replace)) {
			// Format min price tag to key
			$min_price_key = strtr($tag, MasterValues::$for_group_list);
			// Get plan's couple min price
			$min_price = MasterValues::getPlanPrice("{$min_price_key}", $field_name);
			// Replace plan's couple min price with price tag
			$replace = !empty($min_price) ? $min_price : $replace;
		}
	}

	return $replace;
}

/*
 * Custom post type for plan_type_id field that get from PlanType DB
 * 
 * @param array $field
 */
function acf_load_field_plan_type($field){
	global $wpdb;
	// Init field choices array
	$field['choices'] = array();
	// Get all Plan Types in DB
	$plan_types = $wpdb->get_results('SELECT plan_type_id, plan_type_name FROM plan_type WHERE delete_flag != 1', OBJECT);
	// Check empty of Plan Types
	if (empty($plan_types)) {
		// Return empty field
		return $field;
	}
	// Render Plan Types to field choices
	foreach ($plan_types as $plan_type) {
		$field['choices'][$plan_type->plan_type_id] = $plan_type->plan_type_name;
	}
	// Return field
	return $field;
}
add_filter('acf/load_field/name=plan_type_id', 'acf_load_field_plan_type', 11, 1);

/**
 * Re-format custom value field for price in Plan Type in case of price tag exist
 * 
 * @param string $value the raw value to be searching for price tag
 * @return string $value processed value with price tag replaced by plan type's price
 */
function acf_format_value_price($value, $post_id, $field) {
	// Check field name of price or webprice
	if ('price' != $field['name'] AND 'webprice' != $field['name']) {
		return $value;
	}
	// Get price tags
	preg_match_all("/{.*price.*}/", $value, $price_tags);
	// Get Plan Type ID
	$plan_type_id = get_field('plan_type_id');

	foreach ($price_tags[0] as $price_tag) {
		// Create function for format price tag
		$format_price_tag = function( $matches ) use ( $plan_type_id, $price_tag ) {
			// Format price tag with matched tag
			return format_price_tag($matches[0], $plan_type_id, $price_tag);
		};
		// Format custom type value with parsed plan price.
		$value = preg_replace_callback(MasterValues::$price_tag_pattern, $format_price_tag, $value);
	}
	return $value;
}
add_filter('acf/format_value_for_api', 'acf_format_value_price', 10, 3);

/*fix link post-type for sitemap*/
//add_filter( 'wpseo_xml_sitemap_post_url', 'filter_wpseo_xml_sitemap_post_url', 10, 2 );
// define the wpseo_xml_sitemap_post_url callback
/*function filter_wpseo_xml_sitemap_post_url( $url_loc, $p ){
	return qtranxf_convertURL($url_loc,'ja');		
}*/

/**
 * @param string $content_html, default $path_string = 'bring'
 * @param string $content_html
 * @return string
 */
function swe_get_content_html($content_html = '', $id_html) {
	$tagHtml = '';

	if (empty($content_html) || empty($id_html)) {

		return $tagHtml;
	}

	$content = $content_html;
	$content = php_set_base_url($content);
	// remove link to reserve#bring
	$content = preg_replace('/<\s*p\s*?\s*?(class)?="(link-bring)"?><\s*a\s*?(class)="(direction)".*\s*p>/i', '', $content);
	//Create object Dom
	$dom = new domDocument();
	// Enable user error handling
	libxml_use_internal_errors(true);
	$dom->preserveWhiteSpace = false;
	$dom->loadHTML("<?xml encoding='UTF-8'><html><body>".$content."</body></html>");
	$tag = $dom->getElementById($id_html);
	if(empty($tag)) return;

	$dom->encoding = 'UTF-8';
	// Clear libxml error buffer
	libxml_clear_errors();
	$tagHtml = $dom->saveHTML($tag);

	return $tagHtml;
}

/**
 * Pre process mail's content data in case of Japanese to using ISO-2022-JP standard.
 *
 * @param $content
 * @return mixed the processed mail's content.
 */
function zen_phpmailer_init($content) {
	// Detect Japanese character
	$isJapanese = isJapanese($content->Subject);
	if (!$isJapanese) {
		return $content;
	}
	$content->CharSet = 'ISO-2022-JP';
	$content->Encoding = 'base64';

	if (!empty($content->mailHeader)) {
		$content->mailHeader = mb_encode_mimeheader($content->mailHeader, "ISO-2022-JP", "B", "\n");
	}
	if (!empty($content->FromName)) {
		$content->FromName = mb_encode_mimeheader($content->FromName, "ISO-2022-JP", "B", "\n");
	}
	if (!empty($content->Subject)) {
		$content->Subject = mb_encode_mimeheader($content->Subject, "ISO-2022-JP", "B", "\n");
	}
	if (!empty($content->Body)) {
		$content->Body = mb_convert_encoding($content->Body, 'ISO-2022-JP', mb_detect_encoding($content->Body));
	}

	return $content;
}
add_filter('phpmailer_init', 'zen_phpmailer_init', 1, 99);

/**
 * Detect Japanese characters in string.
 *
 * @param $str the String to looking for.
 * @return bool TRUE if string is japanese, FALSE other wise.
 */
function isJapanese($str) {
	$isKatakana	= preg_match('/[\x{30A0}-\x{30FF}]/u', $str) > 0;
	$isHiragana	= preg_match('/[\x{3040}-\x{309F}]/u', $str) > 0;
	$isKanji	= preg_match('/[\x{4E00}-\x{9FBF}]/u', $str) > 0;
	return $isKanji || $isHiragana || $isKatakana;
}

add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );

function my_deregister_javascript() {
//	wp_deregister_script( 'contact-form-7' );
}

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
	wp_deregister_style( 'wp-pagenavi' );
	wp_deregister_style( 'contact-form-7' );
    if ( !is_user_logged_in() ) {
        wp_deregister_style('dashicons');
    }
}

/**
 * Add yii admin link into admin bar menu
 */
add_action( 'admin_bar_menu', 'addYiiAdminLink', 999);

function addYiiAdminLink($wp_admin_bar) {
	$args = array(
		'id'    => 'yii_admin',
		'title' => "<image style='float:left; width:20px;padding:6px 4px 0;' src='".admin_url()."images/reserve-icon.png'/>".'<span>Reserve Manage</span>',
		'href'  => WP_HOMES.'/'.get_blog_lang_code().'/admin',
		'meta'  => array( 'class' => 'wp-toolbar-page' )
	);

	$wp_admin_bar->add_node($args);
}

/**
 * Add language link into admin bar menu
 */
add_action( 'admin_bar_menu', 'addLanguageLink', 999);
function addLanguageLink($wp_admin_bar) {
    if ( class_exists( 'MslsBlogCollection' ) ) {
        $currentBlog     = MslsBlogCollection::instance()->get_current_blog();
        $currentLangCode = $currentBlog->get_language();
        $currentLang = $currentBlog->get_description();
        $currentLangImageSrc = MslsOptions::instance()->get_flag_url( $currentLangCode );
        $explodeUri = array_filter(explode('/',$_SERVER['REQUEST_URI']));
        $path = '';
        if(count($explodeUri)){
            $lastPartOfUri = end($explodeUri);
            $path = strpos($lastPartOfUri,'.php') !== false ? $lastPartOfUri : '';
        }
        $currentUri = get_admin_url($currentBlog->blog_id,$path);
        $args = array(
            'parent' => 'top-secondary',
            'id'    => 'language_link',
            'title' => "<img src='$currentLangImageSrc' style='float:left;padding:11px 4px 0;'/><span>$currentLang</span>",
            'href' => $currentUri,
        );
        $wp_admin_bar->add_node($args);

        $blogs = MslsBlogCollection::instance()->get_filtered();
        if ( $blogs ) {
            $wp_admin_bar->add_group( array(
                'parent' => 'language_link',
                'id'     => 'language_link_list',
            ) );
            foreach ($blogs as $blog){
                if($blog->blog_id != $currentBlog->blog_id){
                    $langCode = $blog->get_language();
                    $lang = $blog->get_description();
                    $langImageSrc = MslsOptions::instance()->get_flag_url( $langCode );
                    $uri = get_admin_url($blog->blog_id,$path);
                    $wp_admin_bar->add_menu( array(
                        'parent' => 'language_link_list',
                        'id'     => 'language_link_'.$langCode,
                        'title' => "<img src='$langImageSrc' style='float:left;padding:11px 4px 0;'/><span>$lang</span>",
                        'href' => $uri,
                    ) );
                }
            }
        }
    }
}

//add_filter( 'posts_where', 'columnQuery', 10, 2 );
/*function columnQuery( $where, $query )
{
	if(!is_admin() && ($query->is_category || $query->is_tax)){
		$var1 = '[:'.Yii::app()->language.']';
		$var2 = "<!--:".Yii::app()->language."-->";
		if( '' != $where )
		{
			$where .= ' AND ((wp_posts.post_content like "%'.$var1.'%" AND wp_posts.post_title like "%'.$var1.'%")
			OR (wp_posts.post_content like "'.$var2.'%" AND wp_posts.post_title like "%'.$var2.'%"))';
		}
		else
		{
			$where .= ' ((wp_posts.post_content like "%'.$var1.'%" AND wp_posts.post_title like "%'.$var1.'%")
			OR (wp_posts.post_content like "'.$var2.'%" AND wp_posts.post_title like "%'.$var2.'%"))';
		}
	}
	return $where;
}*/

/**
 * remove shortcode gallery
 * @param $content
 * @return mixed
 */
function strip_shortcode_gallery($content) {
	preg_match_all( '/'. get_shortcode_regex().'/s', $content, $matches, PREG_SET_ORDER);
	if (!empty($matches)) {
		foreach($matches as $shortcode ) {
			if ('gallery' === $shortcode[2]) {
				$pos = strpos($content, $shortcode[0]);

				if(false !== $pos) {
					$content = substr_replace($content, '', $pos, strlen($shortcode[0]));
				}
			}
		}
	}

	return $content;
}

/*
 * Custom choices for loading relative homongi columns
 *
 * @param array $field
 */
function acf_load_field_highendcolumn($field){
	$field_name = $field['name'];
	if(strpos($field_name,'_relative_columns') === false) {
		return $field;
	}
	$slug = str_ireplace("_relative_columns", "", $field_name);
	$id = get_page_by_path($slug)->ID;
	if(!empty($id)){
		$pages = get_pages(array('parent'=>$id, 'hierarchical'=>false));
		// Check empty of Plan Types
		if (empty($pages)) {
			// Return empty field
			return $field;
		}
		// Init field choices array
		$field['choices'] = array();
		if(!empty($pages)){
			foreach($pages as $page){
				// load choices
				$field['choices'][$page->ID]= $page->post_title;
			}
		}
	}
	// Return field
	return $field;
}
add_filter('acf/load_field/type=select', 'acf_load_field_highendcolumn', 11, 1);
// ADD NEW COLUMN
/*
function swe_columns_head($defaults) {
    $defaults['page_id'] = 'Page ID';
    $defaults['page_uri'] = 'Page URI';
    $defaults['page_template'] = 'Page Template';
    return $defaults;
}

function swe_columns_content($column_name, $post_id) {
    if ( $column_name == 'page_id' ) {
        echo '<span style="color:red;">'. $post_id.'</span>';
    }
    if ( $column_name == 'page_uri' ) {
        echo '<span style="color:red;">'. get_page_uri($post_id).'</span>';
    }
    if ( $column_name == 'page_template' ) {
        echo '<span style="color:red;">'. get_page_template_slug( $post_id ).'</span>';
    }
}
add_filter('manage_pages_columns', 'swe_columns_head');
add_action('manage_pages_custom_column', 'swe_columns_content', 10, 2);
*/
function swe_the_post_thumbnail($post, $size='post-thumbnail', $attr = ''){
    echo swe_get_the_post_thumbnail($post, $size, $attr);
}
function swe_get_the_post_thumbnail($post, $size = 'post-thumbnail', $attr = ''){
    $post_thumbnail_id = get_post_thumbnail_id( $post );
    return swe_wp_get_attachment_image($post_thumbnail_id, $size, false, $attr);
}

function get_header_template ($dir, $name='header_template'){
	ob_start();
	require($dir.DIRECTORY_SEPARATOR.$name.'.php');
	return ob_get_clean();
}
function checkPostIDInSiteMedia($post_id){
    return $post_id <= MEDIA_POST_ID_MAX;
}
function get_blog_lang_code(){
    global $sites;
    $re =array_flip($sites);
    $blog_id = get_current_blog_id();
    return $re[$blog_id];
}

/**
 * Adds one or more classes to the body tag in the dashboard.
 *
 * @param  String $classes Current body classes.
 * @return String          Altered body classes.
 */
function add_admin_body_class( $classes ) {
    if ( ! is_user_logged_in() || ! is_multisite() )
        return $classes;
    return $classes.' blog-'.get_current_blog_id();
}

add_filter( 'admin_body_class', 'add_admin_body_class' );

function css_for_admin_site_flag() {
    $blogs = MslsBlogCollection::instance()->get_objects();
    if ( $blogs ) {
        echo '<style type="text/css">
        #wpadminbar [id*="wp-admin-bar-blog"] .blavatar:before, [class*="blog-"] #wp-admin-bar-site-name .ab-item:before{
            background-position: 0 0;
            background-size: contain;
            background-repeat: no-repeat;
            color: rgba(0, 0, 0, 0) !important;
            width: 16px;
            margin-top: 6px;
        }'.PHP_EOL;
        foreach ($blogs as $blog){
            $langCode = $blog->get_language();
            $langImageSrc = MslsOptions::instance()->get_flag_url( $langCode );
            echo '#wpadminbar #wp-admin-bar-blog-'.$blog->blog_id.' .blavatar:before, .blog-'.$blog->blog_id.' #wp-admin-bar-site-name .ab-item:before {
               background-image: url(' . $langImageSrc . ') !important;
           }'.PHP_EOL;
        }
        echo '#wp-admin-bar-site-name .ab-item:before{margin-top: 9px !important;}
            #wpadminbar #wp-admin-bar-blog-13, #wpadminbar #wp-admin-bar-blog-14{ display: none; }
        </style>'.PHP_EOL;
    }
}
add_action('wp_before_admin_bar_render', 'css_for_admin_site_flag');

/**
 * @param string $language
 * @return string
 */
function swe_msls_head_hreflang( $language ) {
    if($language == 'us'){
        $language = 'en-US';
    }else{
        $language = str_replace('_','-',$language);
    }
    return $language;
}
add_filter( 'msls_head_hreflang', 'swe_msls_head_hreflang' );

function swe_get_field_image($attachment_id){
    $image['url'] = swe_wp_get_attachment_image_src($attachment_id, 'full')[0];
    if(checkPostIDInSiteMedia($attachment_id)){
        $image['alt'] = $alt = getTranslateContent(trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true))));
    }else{
        $image['alt'] = $alt = trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)));
    }
    return $image;
}
// Remove KSES if user has unfiltered_html cap
function um_kses_init() {
    kses_remove_filters();
}
add_action( 'init', 'um_kses_init', 11 );
add_action( 'set_current_user', 'um_kses_init', 11 );

add_filter('wpcf7_map_meta_cap', 'change_cf7_capabilities',10,1);
function change_cf7_capabilities($meta_caps) {

	$meta_caps = array(
		'wpcf7_edit_contact_form' => 'cf7_edit_forms',
		'wpcf7_edit_contact_forms' => 'cf7_edit_forms',
		'wpcf7_read_contact_forms' => 'cf7_read_forms',
		'wpcf7_delete_contact_form' => 'cf7_delete_forms',
		'wpcf7_manage_integration' => 'cf7_manage_integration' );

	return $meta_caps;

}

// Tags before body close
add_action( 'wp_footer', function (){
    include_once ABSPATH.'post-tags.php';
}, 100 );

/**
 * @param $name Ex: common-login will include js/vue/common-login.js
 * @param bool $debug
 * @return int
 */
function get_vue_js ($name, $debug=false) {
    if ( !(YII_DEBUG || $debug || WP_DEBUG) &&
        is_file(Yii::getPathOfAlias('webroot.js.vue-built')."/$name.js")){
        // if not debug mode and file existed
        return print "<script src=\"".WP_HOME."/js/vue-built/$name.js\" defer></script>";
    }
    echo "<script src=\"" . WP_HOME . "/js/vue/lib/require.js\" defer></script>";
    echo "<script src=\"" . WP_HOME . "/js/vue/$name.js\" defer></script>";
}

/* get shop blog list, return array of objects or slugs
 * */
function get_blog_order($parent_slugs, $taxonomy, $type = 'object'){
    $arrs = array();
    $slugs = array();
    foreach($parent_slugs as $v){
        $terms = get_shop_blog_terms($v, $taxonomy);
        foreach($terms as $k1 => $v1){// level 1
            if(substr($v1->slug,-4)==='area'){
                $terms2 = $terms = get_shop_blog_terms($v1->slug, $taxonomy);
                foreach($terms2 as $k2 => $v2){// level 2
                    if(substr($v2->slug,-4)==='area'){
                        $terms3 = $terms2 = $terms = get_shop_blog_terms($v2->slug, $taxonomy);
                        foreach($terms3 as $k3 => $v3){// level 3
                            $arrs[] = $v3;
                            $slugs[$v3->term_id] = $v3->slug;
                        }
                    }else{
                        $arrs[] = $v2;
                        $slugs[$v2->term_id] = $v2->slug;
                    }
                }
            }else{
                $arrs[] = $v1;
                $slugs[$v1->term_id] = $v1->slug;
            }
        }
    }
    if($type === 'slug'){
        return $slugs;
    }
    return $arrs;
}
/* for blog
check primary term and set the right primary term
 * */
function swe_set_primary_term_link($post_id){
    $request_uri = $_SERVER['REQUEST_URI'];
    $match = preg_match("/^\/(access|blog)/", $request_uri);
    if(get_post_type($post_id) === 'staff-blog' && $match !== 0){
        $taxonomy = 'shop-blog';
        $shop_blog_slugs = get_blog_order(array('blog','access'),$taxonomy,'slug');
        if(class_exists('WPSEO_Primary_Term')){
            $primary_term = new WPSEO_Primary_Term( $taxonomy, $post_id );
            $primary_term_id = $primary_term->get_primary_term();
            $set_primary_term = false;
            if(empty($primary_term_id)){
                $set_primary_term = true;
            }else{
                $primary_term_obj = get_term($primary_term_id, $taxonomy);
                $primary_term_obj_slug = $primary_term_obj->slug;
                if($primary_term_obj_slug === 'blog' || $primary_term_obj_slug === 'access' || strpos($primary_term_obj_slug, 'area') !== false){
                    $set_primary_term = true;
                }elseif(!in_array($primary_term_obj_slug, $shop_blog_slugs)){
                    $set_primary_term = true;
                }
            }
            if($set_primary_term){
                $terms = wp_get_post_terms( $post_id, $taxonomy, array( 'orderby' => 'term_id' ) );
                foreach ($terms as $k => $term){
                    $term_slug = $term->slug;
                    $term_id = $term->term_id;
                    if($term_slug === 'blog' || $term_slug === 'access' || strpos($term_slug, 'area') !== false){
                        continue;
                    }elseif(in_array($term_slug, $shop_blog_slugs)){
                        $primary_term->set_primary_term($term_id);
                        break;
                    }
                }
                return $term_id;
            }
        }
    }
    return false;
}

/**
 * customize canonical link for formal list page
 */
add_filter( 'wpseo_canonical', 'swe_wpseo_canonical' );
function swe_wpseo_canonical( $canonical ) {
    global $post, $custom_post_type;
    if(is_tax()){
        $mess = get_spot_yii_t_message();
        if(!empty($mess)){
            $canonical = WP_HOMES.$_SERVER['REQUEST_URI'];
        }
    }
    if(is_search()){
        if(get_post_type($post) == $custom_post_type['blog']){
            $canonical = WP_HOMES.$_SERVER['REQUEST_URI'];
        }
    }
    return $canonical;
}
function swe_rel_next_prev($link, $prev = true){
    global $paged, $custom_post_type;
    $paged = !empty($paged) ? $paged : 1;
    $mess = get_spot_yii_t_message();
    if((is_search() && get_query_var('post_type') == $custom_post_type['blog']) || (!empty($mess) && is_tax())){
        $uri = $_SERVER['REQUEST_URI'];
//        preg_match('/((\/access\/)((.+)-area\/)(.+)(\/blog\/)(.+))|((\/spot\/)((.+)area\/)(.+))/',$uri, $matches);
//        if(!empty($matches)){
        $uri  = preg_replace ("/(\/page\/)([1-9])$/",'', $uri);
        if($prev && get_previous_posts_link()){
            if($paged > 1){
                $link = WP_HOMES.$uri.'/page/'.( $paged - 1 );
                return '<link rel="prev" href="'.$link.'" />'."\n";
            }
        }elseif ( get_next_posts_link() ) {
            $link = WP_HOMES.$uri.'/page/'.( $paged + 1 );
            return '<link rel="next" href="'.$link.'" />'."\n";
        }
//        }
    }
    return $link;
}
add_filter( 'wpseo_next_rel_link', function($link){
    return swe_rel_next_prev($link, false);
});
add_filter( 'wpseo_prev_rel_link', function($link){
    return swe_rel_next_prev($link, true);
});

function get_spot_yii_t_message(){
    global $kimono;
    $spot_cate = get_query_var('spot-cate');
    $spot_meta_group = get_query_var('spot_meta_group');
    $spot_meta_child = get_query_var('spot_meta_child');
    if(!empty($spot_cate) && !empty($spot_meta_group)){
        $yii_t_mess = array('spot');
        if(empty($kimono)){
            $term = get_term_by('slug',$spot_cate, 'spot-cate');
            $term_parent = get_term($term->parent);
        }else{
            $term_parent = $kimono['parent'];
        }
        if($term_parent->slug !== 'spot'){
            $yii_t_mess[] = str_replace('-spot','', $term_parent->slug);
        }
        $yii_t_mess[] = str_replace('-spot','', get_query_var('spot-cate'));

        if(!empty($spot_meta_group)){
            $yii_t_mess[] = $spot_meta_group;
            if(!empty($spot_meta_child)){
                $yii_t_mess[] = $spot_meta_child;
            }
        }
        return implode('_',$yii_t_mess);
    }
    return false;
}

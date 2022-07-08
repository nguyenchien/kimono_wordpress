<?php

define('SWE_PATH', get_template_directory_uri());
define('SERVER_PATH', get_template_directory());
define('COLUMN','column');
define('COURSE','course');
define('SPOT','spot');
define('RESTAURANT','restaurant');
define('NOTATION','notation');
define('FAQ','faq');
define('MAMECHIYO','mamechiyo');
define('GALLERY','gallery');

define('HOWTOs','howto');

define('SWE_HIDDEN_GROUP_MENU','--');



global $column_slugs;
$column_slugs = array(COLUMN, COURSE, SPOT, RESTAURANT);

add_image_size( 'spot-thumb', 293, 218, true ); // (cropped)s


/* ------------------------------------------------------------------------- */

// get the path for the file ( to support child theme )
if (!function_exists('get_root_directory')) {

	function get_root_directory($path) {
		if (file_exists(get_stylesheet_directory() . '/' . $path)) {
			return get_stylesheet_directory() . '/';
		} else {
			return SERVER_PATH . '/';
		}
	}

}
$temp_root = get_root_directory('include/plugin/shortcode-generator.php');
include_once($temp_root . 'include/plugin/shortcode-generator.php'); // shortcode	
/* ------------------------------------------------------------------------- */


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
	if (qtrans_getLanguage() == 'ja') {
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
	//function theme_name_scripts() {
		//wp_enqueue_style( 'simple-dtpicker', get_template_directory_uri(). '/css/jquery.simple-dtpicker.css');
		//wp_enqueue_script( 'simple-dtpicker', get_template_directory_uri() . '/js/jquery.simple-dtpicker.js', array(), '1.0.0', true );
		wp_enqueue_style( 'contact-form7-confirm', get_template_directory_uri(). '/css/contact-form7-confirm.css');
		wp_enqueue_script( 'contact-form7-confirm', get_template_directory_uri() . '/js/contact-form7-confirm.js', array(), '1.0.0', true );
		//die(111111);
	//}

	//add_action( 'wp_enqueue_scripts', 'theme_name_scripts' ,11);
//}

/*function list*/


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
		'orderby' => 'term_id',
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

	if($post == 0){
		if(!is_page()) return;
		global $post;
	}

	global $column_slugs;
	$current_page_id = $post->ID;
	$ancestors = get_ancestors($current_page_id, 'page');
	$slug = $post->post_name;
	$parent = $post->post_parent;

	if ($parent === 0 && in_array($post->post_name, $column_slugs)) {
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


function getGaleryFromPost($post, $groupGallery = null) {
    $content = get_the_content($post->ID); 
    $pattern = get_shortcode_regex();
    preg_match_all("/$pattern/s", $content, $match);
    $attachments = array();
    if(isset($match[2]) && $match[3]){
        foreach ($match[2] as $key => $m2) {
            if($m2 == "gallery"){
                $atts = shortcode_parse_atts($match[3][$key]);
				$existGallery = is_array($atts) && count($atts) > 0 && (empty($groupGallery) || $atts['group'] == $groupGallery);
				if ($existGallery) {
					$gallery = array();
					foreach ($atts as $katt => $vatt) {
						if ('ids' == $katt) {
							$gallery['ids'] = isset($atts['ids']) ? explode(',', $atts['ids']) : get_children('post_type=attachment&post_mime_type=image&post_parent=' . $objpost->ID . '&order=ASC&orderby=menu_order ID');
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
function ReserveStatus() {
    extract(shortcode_atts(array(
        'region' => 0,
        'shop_ids' => ''
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
    ob_start();
    Yii::app()->controller->widget('application.components.widgets.ReserveStatus', array(
        'region' => $region,
        'shop_ids' => $shop_ids
    ));
    return ob_get_clean();
}

function stop_removing_tags($id){
	if($id > 0) {
		remove_filter('the_content', 'wpautop');
	}
}

add_shortcode( 'TopBlog_kimono', 'TopBlog_kimono' );
function TopBlog_kimono(){
	ob_start();
	get_template_part('include/top_blog');
	return ob_get_clean();
}

add_filter( 'wpseo_separator_options', 'yoast_add_sep' );
function yoast_add_sep() {
	return array('');
}


//die (get_site_url());
function qtranslate_menu_item( $menu_item ) {
//var_dump($menu_item);
    $menu_item->url = str_ireplace(array('http://localhost/kimono/data/','http://test.vtown.vn/dev/kimono/data/','/WP_HOME/'), WP_HOME . '/', $menu_item->url);
    if (stripos($menu_item->url, get_site_url()) !== false){
        $menu_item->url = qtrans_convertURL($menu_item->url);
    }
return $menu_item;
}
add_filter('wp_setup_nav_menu_item', 'qtranslate_menu_item', 0);


/* Menu filters */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	//var_dump($item);
	//$classes = array ();
	if($item->url == get_permalink( get_option('page_on_front') )){ //Notice you can change the conditional from is_single() and $item->title
		$classes[] = "mnnav-icon-home";
	}
	if($item->post_excerpt == SWE_HIDDEN_GROUP_MENU){ //Notice you can change the conditional from is_single() and $item->title
		$classes[] = "menu-group";
	}
	if($item->url == get_permalink( get_page_by_path( 'kimono' ))){ //Notice you can change the conditional from is_single() and $item->title
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
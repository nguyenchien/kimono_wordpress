<?php
add_shortcode( 'takuhai', 'takuhai' );
function takuhai($attr,$content = null){
	$attr_shortcode = shortcode_atts(array(
		'search_form' => 'on',
		'scene' => 'on',
		'category' => 'on',
		'new_products' => 'on',
		'column' => 'on',
		'news' => 'on',
		'blog'=>'on'
   ),$attr);
	
	foreach ($attr_shortcode as $key => $item) {
		$shortcode[$key]=array(
				'display'=>$attr_shortcode[$key],
			);
	}
	ob_start();
	include(locate_template('include/takuhai_shortcode.php'));
	//get_template_part('include/top_blog');
	return ob_get_clean();
}
//add_filter('rewrite_rules_array', 'remove_cate_rewrites');
function getColumnList($echo = true, $limit=4){
	global $post;
	ob_start();
	wp_reset_postdata();
	$cat_slug = 'column';
	if ($cat = get_category_by_slug($cat_slug)) {
		$args = array(
			'category_name' => $cat_slug,
			'showposts' => $limit,
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC',
		);
		$the_query = new WP_Query($args);
		if ($the_query->have_posts()) {?>
			<ul class="dp-flex">
			<?php
			while ($the_query->have_posts()) {
				$the_query->the_post();
				?>
				<li>
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php swe_the_post_thumbnail($post); ?></a>
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php  the_title(); ?></a>
				</li>
				<?php
			}?></ul><?php
		}
	}
	wp_reset_postdata();
	if($echo){
		echo ob_get_clean();
	}
	else{
		return ob_get_clean();
	}
}
function getTakuhaiPages($type='category'){
	$page_takuhai = get_page_by_path('takuhai');
	$args = array(
		'orderby'   => 'menu_order',
		'order' => 'ASC',
		'nopaging' => true,
		'posts_per_page'=> 8,
		'post_parent' => $page_takuhai->ID,
		'post_type' => 'page',
		'meta_query' => array(
			array(
				'key' => 'takuhai_type', // name of custom field
//				'value' => '"'.$type.'"', // matches exactly "red"
				'value' => $type, // matches exactly "red"
				'compare' => 'LIKE'
			)
		)
	);
	return new WP_Query($args);
}
function getImageUrl($imageFileName, $fromUploadDir=true) {
	$path = rtrim(ABSPATH,'/wordpress/');
	if($fromUploadDir) {
		$imageFullPath = implode('/', array($path, 'uploads', $imageFileName));
		$imageFullUrl = implode('/', array(WP_HOME, 'uploads', $imageFileName));
	} else {
		$imageFullPath = implode('/', array($path, $imageFileName));
		$imageFullUrl = implode('/', array(WP_HOME, $imageFileName));
	}
	$resultPath = false;
	if (isset($imageFileName) && !empty($imageFileName)) {
		if (preg_match('/^(http:\/\/)|^(https:\/\/)|^(www\.)/i', $imageFileName)) {
			$resultPath = $imageFileName;
		} elseif (file_exists(urldecode($imageFullPath))) {
			$resultPath = $imageFullUrl;
		}
	}
	return $resultPath;
}
function checkLinkProductDetail(){
	$uri_home = preg_replace('/(http|https)\:\/\/'.$_SERVER['SERVER_NAME'].'/', '', WP_HOME);
	$uri_home = str_replace($uri_home.'', '', $_SERVER['REQUEST_URI']);
	$uri_home = substr ($uri_home, -1) ==='/' ? substr ($uri_home,0, -1) : $uri_home;
	if (preg_match('#(\/takuhai/product/)#i', $uri_home)){
		$id = end(explode('/',$uri_home));
		$productModel = Product::model()->findAllByPk($id);
		return reset($productModel);
	}
	return false;
}
add_filter( 'wpseo_title', 'my_wpseo_title' , 10, 1 );
function my_wpseo_title($str){
	if(($productModel = checkLinkProductDetail())!= false) {
		return $productModel->longName.' | 宅配着物レンタルwargo';
	}
	return $str;
}
add_filter('wpseo_metadesc','my_wpseo_metadesc', 10, 1 );
function my_wpseo_metadesc($str){
	if(($productModel = checkLinkProductDetail())!= false) {
		$desc = $productModel->product_caption;
		$arrStr = preg_split('/(?<!^)(?!$)/u', $desc);
		if(mb_strlen($desc) > 171){
			$desc = implode('', array_slice($arrStr, 0, 170));
		}
		return $desc;
	}
	return $str;
}
add_filter( 'wpseo_canonical', 'my_wpseo_canonical' );
function my_wpseo_canonical( $canonical ) {
	if(($productModel = checkLinkProductDetail())!= false) {
		return add_query_arg( array() );
	}
	return $canonical;
}
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
	if((checkLinkProductDetail())!= false) {
//		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
		return $output. ' prefix="og: http://ogp.me/ns#"';
	}
}
add_filter('language_attributes', 'add_opengraph_doctype');
//Lets add Open Graph Meta Info
function insert_fb_in_head() {
//	global $post;
	if(($productModel = checkLinkProductDetail())!= false) {
//		echo '<meta property="fb:admins" content="YOUR USER ID"/>';
		echo '<meta property="og:locale" content="'.get_locale().'" />';
		echo "\n".'<meta property="og:type" content="article" />';
		echo "\n".'<meta property="og:title" content="' . $productModel->longName . ' | 宅配着物レンタルwargo"/>';
		echo "\n".'<meta property="og:description" content="' . $productModel->product_caption.'"/>';
		echo "\n".'<meta property="og:type" content="article"/>';
		echo "\n".'<meta property="og:url" content="'.esc_url(home_url('takuhai/product/'.$productModel->product_id)). '"/>';
		echo "\n".'<meta property="og:site_name" content="宅配着物レンタルwargo"/>';
		$main_image = 'main_image';
		if (!empty($productModel->$main_image)) {
			$image =getImageUrl($productModel->$main_image);
			echo $image != false ? "\n".'<meta property="og:image" content="' .$image . '"/>' : "";
			for($i = 1 ;$i<=6;$i++){
				$main_image = 'sub_product'.$i.'_image';
				if(!empty($productModel->$main_image)){
					$image =getImageUrl($productModel->$main_image);
					echo $image != false ? "\n".'<meta property="og:image" content="' .$image . '"/>' : "";
				}
			}
		} else {
			$page_takuhai = get_page_by_path('takuhai');
			$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $page_takuhai->ID ), 'medium' );
			echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
		}
		echo "\n";
	}
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
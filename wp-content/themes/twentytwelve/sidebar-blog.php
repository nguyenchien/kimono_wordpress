<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $post, $custom_post_type, $custom_taxonomies, $kimono;
$taxonomy = get_query_var('taxonomy');

if (!empty($kimono)) {
	$current_cate = $kimono['current_cate'];
	$parent = $kimono['parent'];
}
?>
<?php if ( (is_single() || (is_tax() && $taxonomy == $custom_taxonomies['blog'])) && !empty($current_cate) && $current_cate->slug != 'blog'): ?>
    <?php
    $cate_h1 = get_field('shop_name', $current_cate);
    $cate_img = get_cate_image_src('cate_img_src', $current_cate);
    $term_name = $current_cate->name;
    $shop_page_uri = get_field('shop_page_uri', $current_cate);
    if(empty($shop_page_uri)) {
        $term_link = get_term_link($current_cate);
        preg_match('/(access\/(.*))\//', $term_link, $matches);
        if(!empty($matches)){
            $shop_page_uri = $matches[1];
        }else{
            preg_match('/blog\/(.*)/', $term_link, $matches);
            if(!empty($matches)) {
                $shop_page_uri = 'access/' . $matches[1];
            }
        }
    }
    $page = get_page_by_path($shop_page_uri);
    $map = get_field('google_map', $page->ID);
	if(empty($map) === false ){
		preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $map, $matches);
		$map = $matches[0];
	}
    $cate_h1_html = is_tax() && !is_search() ? '<h1>'.$cate_h1.'</h1>' : '<h2>'.$cate_h1.'</h2>';
    ?>
    <div class="wrap-shop-info" data-shop_uri="<?php echo $shop_page_uri;?>">
        <?php echo $cate_img ? '<div class="shop-img"><img src="'.$cate_img.'" alt="'.$term_name.'"></div>' : ''; ?>
        <div class="shop-desc">
            <div class="shop-name">
                <a href="<?php echo get_permalink($page);?>" title="<?php echo strip_tags($cate_h1_html); ?>"><?php echo $cate_h1_html; ?></a>
            </div>
            <div class="shop-info"><?php echo do_shortcode(get_field('shop_info', $current_cate));?></div>
        </div>
        <div class="wrap-social flexbox">
            <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img src="<?php echo WP_HOMES; ?>/images/formal-rental/icon-twitter.svg" alt=""></a></span> <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img src="<?php echo WP_HOMES; ?>/images/formal-rental/icon-facebook.svg" alt=""></a></span> <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img src="<?php echo WP_HOMES; ?>/images/formal-rental/icon-instagram.svg" alt=""></a></span> </div>
        <?php echo $map ? '<div class="shop-map">' . $map . '</div>' : ''; ?>
    </div>
<?php endif;?>
<?php if (is_active_sidebar('sidebar-9')) : ?>
	<?php dynamic_sidebar('sidebar-9'); ?>
<?php endif; ?>
<?php if (is_active_sidebar('sidebar-5')) : ?>
	<?php dynamic_sidebar('sidebar-5'); ?>
<?php endif; ?>
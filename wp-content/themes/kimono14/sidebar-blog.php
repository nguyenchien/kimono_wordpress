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
	$term_slug = $current_cate->slug;
	$access_pages = array(
		'access/kyotostation', 'access/gion-shijo', 'access/shinkyogoku', 'access/kiyomizuzaka', 'access/ninenzaka', 'access/kinkakuji',
		'osaka/osaka-access/osaka-shinsaibashi',
		'/asakusa/asakusa-access/asakusa',
		'access/kamakura');
	if (in_array('access/' . $term_slug, $access_pages)) {
		$page = get_page_by_path('access/' . $term_slug);
	} elseif (in_array('osaka/osaka-access/' . $term_slug, $access_pages)) {
		$page = get_page_by_path('osaka/osaka-access/' . $term_slug);
	} elseif (in_array('asakusa/asakusa-access/' . $term_slug, $access_pages)) {
		$page = get_page_by_path('asakusa/asakusa-access/' . $term_slug);
	}
	$cate_h1_html = is_tax() ? '<h1>'.$cate_h1.'</h1>' : $cate_h1;
	?>
	<div class="wrap-shop-info">
		<div class="shop-img"> <img src="<?php echo $cate_img;?>" alt="<?php echo $term_name;?>"> </div>
		<div class="shop-desc">
			<div class="shop-name"><?php echo $cate_h1_html; ?></div>
			<div class="shop-info"><?php echo do_shortcode(get_field('shop_info', $current_cate));?></div>
		</div>
		<div class="wrap-social flexbox">
			<span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img src="<?php echo WP_HOMES; ?>/images/formal-rental/icon-twitter.svg" alt=""></a></span> <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img src="<?php echo WP_HOMES; ?>/images/formal-rental/icon-facebook.svg" alt=""></a></span> <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img src="<?php echo WP_HOMES; ?>/images/formal-rental/icon-instagram.svg" alt=""></a></span> </div>
		<?php echo isset($page) ? '<div class="shop-map">' . get_field('google_map', $page) . '</div>' : ''; ?>
	</div>
<?php endif;?>
<?php
	$taxonomy = $custom_taxonomies['blog'];
	$parent = get_term_by('slug', 'blog', $taxonomy);
	$args = array('parent' => $parent->term_id, 'hide_empty' => false);
	$arrs = get_terms($taxonomy, $args);
	$kansai = $kanto = $hokuriku = array();
	foreach ($arrs as $child) {
		$order = get_field('blog_order', $child);
		$order = $order ? $order : $child->term_id;
		$region_name = get_field('region_name', $child);
		$region_name = $region_name ? $region_name : 'kansai';
		$region_title = array('kansai' => '関西地区', 'kanto' => '関東地区', 'hokuriku' => '北陸地区');
		if($region_name== 'kansai'){
			$kansai[$order] = $child;
		}if($region_name == 'kanto'){
			$kanto[$order] = $child;
		}
		if($region_name == 'hokuriku'){
			$hokuriku[$order] = $child;
		}
	}
	$childs = array('kansai' => $kansai, 'kanto' => $kanto, 'hokuriku' => $hokuriku);
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
						$content = array();
						?>
						<li class="archive-list-item dropdown active">
							<a href="#" class="title-dropdown"><?php echo $title?></a>
							<ul class="archive-sub-list" style="display: block;">
						<?php
						foreach ($shops as $order => $shop):
							$class = '';
							if (isset($current_cate) && $shop->term_id == $current_cate->term_id) {
								$class = 'active';
							}
							?>
							<li class="<?php echo implode(' ', array($region_name, $order, $class, $child->slug)); ?>">
								<a class="short_title <?php echo $shop->slug?>"
								   href="<?php echo get_term_link($shop, $taxonomy); ?>"
								   title="<?php echo get_field('short_title', $shop); ?>">
									<?php echo get_field('short_title', $shop). '(' . $shop->count . ')'; ?>
								</a>
							</li>
							<?php endforeach; ?>
							</ul>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
<?php if (is_active_sidebar('sidebar-5')) : ?>
	<?php dynamic_sidebar('sidebar-5'); ?>
<?php endif; ?>
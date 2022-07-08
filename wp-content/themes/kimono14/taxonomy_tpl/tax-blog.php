<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
add_filter('wpseo_breadcrumb_single_link' ,'custom_breadcrumb_shop_blog_output', 10 ,2);
function custom_breadcrumb_shop_blog_output($link_output, $link ){
	global $post;
	if($post && $post->post_type == "staff-blog"){
		$shopTerms = wp_get_post_terms($post->ID, 'shop-blog');
		foreach ($shopTerms as $shopTerm){
			if(!empty($shopTerm) && !empty($shopTerm->slug) && !empty(MasterValues::$MV_SHOP_SLUG_ID[$shopTerm->slug])){
				$shopAccessLink = esc_url( home_url( '/' ).MasterValues::$MV_SHOP_SLUG[MasterValues::$MV_SHOP_SLUG_ID[$shopTerm->slug]]);
				$orgHref = esc_url( home_url( '/' ).'blog' );

				if($link['url'] == $orgHref){
					$page = get_page_by_path(MasterValues::$MV_SHOP_SLUG[MasterValues::$MV_SHOP_SLUG_ID[$shopTerm->slug]], OBJECT, 'page');
					$shopTile = getTranslateContent($page->post_title);
					$shopTile = !empty($shopTile) ? strip_tags($shopTile) : Yii::t('wp_theme','shop_name_'.MasterValues::$MV_SHOP_SLUG_ID[$shopTerm->slug]);

					$link_output = '<span typeof="v:Breadcrumb" class="item"><a href="'.$shopAccessLink.'" rel="v:url" property="v:title">'.$shopTile.'</a></span>';
					break;
				}
			}
		}
	}

	return $link_output;
}
wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_enqueue_script('new-formal-blog-script', get_template_directory_uri() . '/js/new-formal-blog.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-formal-blog-style', get_template_directory_uri() . '/css/new-formal-blog.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-blog-style');
get_header('formal');
global $post, $kimono, $custom_taxonomies;
$taxonomy = $kimono['taxonomy'];
$cat_item = $kimono['current_cate'];
$category_data = get_category_data($cat_item);
?>
<div class="container-box clearfix">
	<div class="wrap-highend-v2">
		<div class="wrap-content-v2">
			<div class="container-box">
				<div class="wrap-column-content flexbox">
					<div class="left-column-content">
						<div class="wrap-boths-column flexbox">
							<div class="right-column">
								<div class="section-new-formal wrap-formal-blog">
									<?php
									if (function_exists('yoast_breadcrumb')) {
										yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
									}
									?>
									<div class="wrap-banner-formal blog-banner">
										<div class="row">
											<img class="pc" src="<?php echo WP_HOMES; ?>/images/formal-rental/blog-banner-pc.jpg" alt="<?php echo $category_data['name']?>">
											<img class="sp" src="<?php echo WP_HOMES; ?>/images/formal-rental/blog-banner-sp.jpg" alt="<?php echo $category_data['name']?>">
										</div>
									</div>
									<div class="wrap-title-tabs">
										<ul class="tab-link">
											<li class="tab-item active"><a href="#news-article">新着</a></li>
											<li class="tab-item"><a href="#ranking-article">人気の記事</a></li>
										</ul>
										<div class="menu-toggle"><span id="toggle-sidebar" class="icon icon-formal-menu-toggle-open"></span>
										</div>
									</div>
									<div class="wrap-formal-content flexbox">
										<div class="wrap-blog-left-content">
											<div class="wrap-list-col-cate active" id="news-article">
												<?php if (have_posts()) : ?>
													<ul class="list-col-cate list-col-cate-blog list-col-cate-column flexbox active">
														<?php while (have_posts()) : the_post();
															get_template_part( 'content', 'blog' );
														endwhile;
														wp_reset_postdata();
														?>
													</ul>
													<?php wp_pagenavi(array('options' => array(
														'prev_text' => '<span class="paging-nav prev"></span>',
														'next_text' => '<span class="paging-nav next"></span>'))); ?>
												<?php else : ?>
													<?php echo Yii::t('wp_theme', 'No posts found.'); ?>
												<?php endif; ?>
											</div>
											<div class="wrap-list-col-cate" id="ranking-article">
												<?php get_template_part('include/blog_ranking');?>
											</div>
											<div class="about-blog">
												<h5 class="about-blog-title"><?php echo $category_data['name']?></h5>
												<p><?php echo $category_data['description'];?></p>
											</div>
										</div>
										<div class="wrap-sidebar-overlay">
											<div class="wrap-blog-right-content right-blog-sidebar"
												 id="right-blog-sidebar">
												<?php get_sidebar('blog'); ?>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer('formal'); ?>
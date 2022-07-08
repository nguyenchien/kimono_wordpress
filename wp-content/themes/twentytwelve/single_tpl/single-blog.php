<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
add_filter('wpseo_breadcrumb_single_link' ,'custom_breadcrumb_shop_blog_output', 10 ,2);
function custom_breadcrumb_shop_blog_output($link_output, $link ){
	if(is_single()){
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
get_header('new-kimono');
global $post, $kimono, $custom_taxonomies, $language;
$language = Yii::app()->language;
$taxonomy = $custom_taxonomies['blog'];
$current_cate = $kimono['current_cate'];
$parent_data = get_category_data($current_cate);
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
										<div class="wrap-formal-content formal-blog-detail flexbox">
											<div class="wrap-blog-left-content">
												<?php if (have_posts()) :
													while (have_posts()) : the_post();
														$img = '';
														if (has_post_thumbnail()):
															$img = swe_get_the_post_thumbnail($post);
														endif;
														$title = get_the_title();
														$date = get_the_date();
														$view_count = do_shortcode('[post-views]');
														$excerpt = get_the_excerpt();
														$cate_link = get_term_link($current_cate, $taxonomy);
													endwhile;
												endif; ?>
												<div class="wrap-pd-intro">
													<div class="wrap-pd-img"><?php echo $img; ?><div class="overlay-img"></div>
													</div>
													<div class="wrap-pd-content">
														<h1 class="wrap-pd-title"> <?php echo $title; ?> </h1>
														<div class="wrap-pd-info">
															<div class="wrap-feature">日記</div>
															<div class="post-date"><?php echo $date; ?></div>
															<div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count; ?></span><span class="name-view">view</span></div>
														</div>
													</div>
													<p><?php echo $excerpt; ?></p>
													<div class="reserve-list"><a href="<?php echo $cate_link; ?>" alt="<?php echo $parent_data['name']; ?>" class="main-btn"><?php echo Yii::t('wp_theme','着物日記アイテム一覧');?></a></div>
												</div>
												<div class="wrap-pd-details">
													<?php the_content(); ?>
												</div>
												<div class="wrap-reserve-bottom">
													<div class="social-widget">
														<?php
														if (function_exists('wp_social_bookmarking_light_output_e')) {
															wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));
														}
														?></div>
                                                    <div class="wrap-paging">
                                                        <nav class="nav-single nav-single-single clearfix">
                                                            <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '<', 'Previous post link', 'twentytwelve' ) . '</span> '. _x( '前の記事へ', 'Previous post link', 'twentytwelve' ) ,true , '',$taxonomy); ?></span>
                                                            <span class="nav-next"><?php next_post_link( '%link',  _x( '次の記事へ', 'Previous post link', 'twentytwelve' ) .' <span class="meta-nav">' . _x( '>', 'Next post link', 'twentytwelve' ) . '</span>',true ,'', $taxonomy); ?></span>
                                                        </nav><!-- .nav-single -->
                                                        <div class="reserve-list"><a href="<?php echo $cate_link; ?>" class="main-btn"><?php echo Yii::t('wp_theme','着物日記アイテム一覧');?></a></div>
                                                    </div>
												</div>
												<div class="wrap-pd-intro bottom">
													<div class="wrap-pd-img"><?php echo $img; ?><div class="overlay-img"></div></div>
													<div class="wrap-pd-content">
														<h2 class="wrap-pd-title"> <?php echo $title; ?> </h2>
														<div class="wrap-pd-info">
															<div class="wrap-feature">日記</div>
															<div class="post-date"><?php echo $date; ?></div>
															<div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count; ?></span><span class="name-view">view</span></div>
														</div>
													</div>
												</div>
											</div>
											<div class="wrap-sidebar-overlay">
												<div class="wrap-blog-right-content right-blog-sidebar" id="right-blog-sidebar">
													<?php get_sidebar('blog'); ?>
												</div>
											</div>
										</div>
									</div>
								</div><!--end right-column-->
							</div><!--end wrap-boths-column-->
						</div><!--end left-column-content-->
					</div><!--end wrap-column-content-->
				</div>
			</div><!--end content-v2-->
		</div><!--end wrap-highend-v2-->
	</div>
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
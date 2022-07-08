<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
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
global $post, $custom_taxonomies;
?>
<style>
    .wraper-menu-banner{
        display: none !important;
    }
</style>
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
									<div class="wrap-banner-formal column-banner">
										<div class="row">
											<img class="pc" src="<?php echo WP_HOMES; ?>/images/formal-rental/column-banner-pc.jpg" alt="">
											<img class="sp" src="<?php echo WP_HOMES; ?>/images/formal-rental/column-banner-sp.jpg" alt="">
										</div>
									</div>
									<div class="wrap-title-tabs">
										<ul class="tab-link">
											<li class="tab-item active"><a href="#news-article">新着</a></li>
											<li class="tab-item"><a href="#ranking-article">人気の記事</a></li>
										</ul>
										<div class="menu-toggle"><span id="toggle-sidebar" class="icon icon-formal-menu-toggle-open"></span></div>
									</div>
									<div class="wrap-formal-content flexbox">
										<div class="wrap-blog-left-content">
											<div class="wrap-list-col-cate active" id="news-article">
												<?php if (have_posts()) : ?>
													<header class="archive-header">
														<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'twentytwelve' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
														<?php if ( tag_description() ) : // Show an optional tag description ?>
															<div class="archive-meta"><?php echo tag_description(); ?></div>
														<?php endif; ?>
													</header><!-- .archive-header -->
													<ul class="list-col-cate list-col-cate-blog list-col-cate-column flexbox">
														<?php while (have_posts()) : the_post();
															get_template_part( 'content', 'column-ja' );
														endwhile; ?>
													</ul>
													<?php wp_pagenavi(array('options' => array(
														'prev_text' => '<span class="paging-nav prev"></span>',
														'next_text' => '<span class="paging-nav next"></span>'))); ?>
													<?php wp_reset_postdata(); ?>
												<?php else : ?>
													<?php echo Yii::t('wp_theme', 'No posts found.'); ?>
												<?php endif; ?>
											</div>
											<div class="wrap-list-col-cate" id="ranking-article">
												<?php get_template_part('include/column_ranking');?>
											</div>
										</div>
										<div class="wrap-sidebar-overlay">
											<div class="wrap-blog-right-content right-blog-sidebar" id="right-blog-sidebar">
												<?php get_sidebar('column-ja'); ?>
											</div>
										</div>
										<!--end right-column-->
									</div>
								</div>
							</div><!--end right-column-->
						</div><!--end wrap-boths-column-->
					</div><!--end left-column-content-->
				</div><!--end wrap-column-content-->
			</div>
		</div><!--end content-v2-->
	</div><!--end wrap-highend-v2-->
</div><!-- end container -->
<?php get_footer('formal'); ?>

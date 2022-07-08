<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style( 'style-blog', get_template_directory_uri() . '/css/blog.css', array('twentytwelve-style'));
wp_enqueue_style( 'style-blog' );
wp_register_style('style-lesson-group', get_template_directory_uri() . '/lesson/css/lesson-group.css', array('twentytwelve-style'));
wp_enqueue_style('style-lesson-group');
get_header('new-kimono');
global $post, $kimono;
$taxonomy = $kimono['taxonomy'];
$cat_item = $kimono['current_cate'];
?>
	<div class="container-box clearfix">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
		?>
		<div class="wrap-highend-v2">
			<div class="wrap-content-v2">
				<div class="container-box">
					<div class="wrap-column-content flexbox">
						<div class="left-column-content">
							<div class="wrap-boths-column flexbox">
								<div class="left-column hidden-sidebar">
									<?php get_sidebar('top-page-left') ?>
								</div>
								<div class="right-column">
									<div class="container clearfix">
										<div class="cate-blog-main detail-page">
											<section class="sect-cate-item <?php echo $term->slug; ?>">
												<div class="title-cate clearfix">
													<p>News<var>お知らせ</var></p>
												</div><!-- end title-cate -->
											</section>
										</div><!-- end cate-blog-main -->

										<div id="primary" class="site-content site-content-blog d-two-thirds d-column left">
											<div id="content" class="tn-blog-cat" role="main">
												<?php while (have_posts() ) : the_post(); ?>
													<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
														<header class="entry-header">
															<h2 class="entry-title tn-blog-title">
																<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
															</h2>
														</header><!-- .entry-header -->
														<div class="entry-summary tn-blog-content-sort clearfix">
															<a href="<?php the_permalink(); ?>">
																<img class="forpc" src="http://dummyimage.com/160x160/ccc/fff" alt="">
																<img class="forsp" src="http://dummyimage.com/624x416/ccc/fff" alt="">
																<!--								--><?php //the_post_thumbnail('thumbnail', $attr = array('class'=>'forpc', 'alt'=>  strip_tags(get_the_title()))); ?>
																<!--								--><?php //the_post_thumbnail('full', $attr = array('class'=>'forsp','alt'=>  strip_tags(get_the_title()))); ?>
															</a>
															<p class="first-title">
																<?php echo get_the_date(); ?>
															</p>
															<?php the_excerpt(); ?>
															<a href="<?php the_permalink(); ?>" target="_blank" rel="bookmark">> <?php _e('続きを読む', 'twentytwelve'); ?></a>
															<div class="clearAll"></div>
														</div><!-- .entry-summary -->
													</article><!-- #post -->
												<?php endwhile; // end of the loop.   ?>
												<!--				<nav class="nav-single nav-single-single clearfix">-->
												<!--					<span class="nav-previous">--><?php //previous_post_link( '%link', '<span class="meta-nav">' . _x( '<', 'Previous post link', 'twentytwelve' ) . '</span> '. _x( '前の記事へ', 'Previous post link', 'twentytwelve' ) ,true ); ?><!--</span>-->
												<!--					<span class="nav-next">--><?php //next_post_link( '%link',  _x( '次の記事へ', 'Previous post link', 'twentytwelve' ) .' <span class="meta-nav">' . _x( '>', 'Next post link', 'twentytwelve' ) . '</span>',true ); ?><!--</span>-->
												<!--				</nav><!-- .nav-single -->

											</div><!-- #content -->
										</div><!-- #primary -->
										<section id="sidebar-blog" class="d-one-third d-column flright">
											<!--			--><?php //get_sidebar('blog'); ?>
											<div style="border:1px solid #000">sidebar</div>
										</section>
									</div><!-- end container -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->

<?php get_footer('new-kimono') ?>
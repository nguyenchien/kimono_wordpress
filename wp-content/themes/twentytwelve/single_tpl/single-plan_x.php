<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_style('style-blog', get_template_directory_uri() . '/css/blog.css', array('twentytwelve-style'));
wp_enqueue_style('style-blog');
wp_enqueue_style('kimono-group', get_template_directory_uri() . '/css/kimono-group.css', array('twentytwelve-style'));
get_header('new-kimono');
global $post, $kimono;
$taxonomy = $kimono['taxonomy'];
$cat_item = $kimono['current_cate'];
$parent = $kimono['parent'];
$category_data = get_category_data($cat_item);
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
									<div class="container clearfix cat-<?php echo $cat_item->slug; ?>  ">
										<div class="cate-blog-main detail-page">
											<section class="sect-cate-item detail-page">
												<h2 class="cate-name"><?php echo get_field('short_title', $cat_item); ?></h2>
												<div class="image-cate">
													<?php if ($category_data['img_src']): ?>
														<img src="<?php echo $category_data['img_src']; ?>"
															 alt="<?php echo $category_data['name']; ?>"/>
													<?php endif; ?>
													<div class="text-img">
														<?php echo $category_data['cate_h1']; ?>
													</div><!-- end text-img -->
													<div class="text-pos">
														<p class="cate-desc">
															<?php echo $category_data['description']; ?>
														</p>
													</div><!-- end text-pos -->
												</div><!-- end image-cate -->
											</section>
										</div>
										<div id="primary"
											 class="site-content site-content-blog d-two-thirds d-column left">
											<div class="box-date-shop-name clearfix">
												<span class="date"><?php echo get_the_date(); ?></span>
											</div><!-- end box-date-shop-name -->
											<div id="content" class="cont-blog-detail" role="main">
												<?php while (have_posts()) : the_post(); ?>
													<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
														<header class="entry-header">
															<h2 class="entry-title tn-blog-title title-post">
																<?php echo (isNewBlog($post)) ? '<span>New</span>' : ''; ?>
																<?php the_title(); ?></h2>
															<div class="entry-content content-post">
																<?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve')); ?>
																<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
															</div><!-- .entry-content -->

														</header><!-- .entry-header -->
													</article><!-- #post -->
												<?php endwhile; // end of the loop.   ?>
												<nav class="nav-single nav-single-single clearfix">
													<span class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">' . _x('<', 'Previous post link', 'twentytwelve') . '</span> ' . _x(Yii::t('wp_theme', '前の記事へ'), 'Previous post link', 'twentytwelve'), true); ?></span>
													<span class="cate-link"><?php /*<a href="<?php echo get_term_link($cat_item->term_id, $taxonomy); ?>" title="<?php echo $cat_name; ?>"><span class="shop-name <?php echo $shop_class; ?>"><?php _ex('記事一覧へ', 'back to list', 'twentytwelve'); ?></span></a>*/ ?></span>
													<span class="nav-next"><?php next_post_link('%link', _x(Yii::t('wp_theme', '次の記事へ'), 'Previous post link', 'twentytwelve') . ' <span class="meta-nav">' . _x('>', 'Next post link', 'twentytwelve') . '</span>', true); ?></span>
												</nav><!-- .nav-single -->

											</div><!-- #content -->
										</div><!-- #primary -->
										<section id="sidebar-blog" class="d-one-third d-column flright">

											<?php
											$args = array(
												'post__not_in' => array($post->ID)
											);
											$args['cat'] = $kimono['parent']->term_id;

											// The Query
											$the_query = new WP_Query($args);

											// The Loop
											if ($the_query->have_posts()) {
												?>
												<div class="box-sb-blog">
													<h2 class="tn-title-cat-blog"><?php echo Yii::t('wp_theme.blog', 'その他の事例'); ?></h2>
													<ul class="swe_latest_blog" id="swe_latest_blog">
														<ul>
															<?php
															while ($the_query->have_posts()) {
																$the_query->the_post();
																echo '<li>'
																	. '<a href="' . get_permalink() . '" rel="bookmark" title="' . get_the_title() . '">'
																	. get_the_title()
																	. '</a> </li> ';
															}
															?>
														</ul>
													</ul>
												</div>
												<?php
											}
											/* Restore original Post Data */
											wp_reset_postdata();
											?>
											<?php
											$lang = Yii::app()->language;
											if (!in_array($lang, array('fr', 'cn', 'hi'))):
												$lang = $lang == 'ja' ? '' : '-' . $lang;
												?>
												<div class="banner-square-blog">
													<ul>
														<li>
															<a href="<?php echo esc_url(home_url('/access/gion-shijo')); ?>">
																<img
																		src="<?php echo WP_HOME . '/images/square-banner/square-banner-gionshijyou' . $lang . '.png'; ?>"
																		alt="<?php echo Yii::t('wp_theme.blog', '1/4(月)京都祇園四条店4F増床OPEN'); ?>"/>
															</a></li>
														<li>
															<a href="<?php echo esc_url(home_url('/access/kyotostation')); ?>">
																<img
																		src="<?php echo WP_HOME . '/images/square-banner/square-banner-kyotostation' . $lang . '.png'; ?>"
																		alt="<?php echo Yii::t('wp_theme.blog', '京都駅近徒歩2分、75坪京都最大級!京都タワー店京都タワービル3F') ?>"/>
															</a></li>
														<li><a href="<?php echo esc_url(home_url('/bring')); ?>">
																<?php if (Yii::app()->language == 'ja'): ?>
																	<img src="<?php echo WP_HOME . '/images/square-banner/square-banner-motikomi.jpg'; ?>"
																		 alt="<?php echo Yii::t('wp_theme.blog', '着物持ち込みプランは上級師範のみが行う着付けで1900円(税別)から'); ?>"/>
																<?php else: ?>
																	<img
																			src="<?php echo WP_HOME . '/images/square-banner/square-banner-motikomi' . $lang . '.png'; ?>"
																			alt="<?php echo Yii::t('wp_theme.blog', '着物持ち込みプランは上級師範のみが行う着付けで1900円(税別)から'); ?>"/>
																<?php endif; ?>
															</a></li>
														<li>
															<a href="<?php echo esc_url(home_url('/kimono/photo-studio')); ?>">
																<?php if (Yii::app()->language == 'ja'): ?>
																	<img src="<?php echo WP_HOME . '/images/square-banner/square-banner-photostudio.jpg'; ?>"
																		 alt="<?php echo Yii::t('wp_theme.blog', '本格写真撮影始めました。フルセット1500円(税別)!'); ?>"/>
																<?php else: ?>
																	<img src="<?php echo WP_HOME . '/images/square-banner/square-banner-photostudio' . $lang . '.png'; ?>"
																		 alt="<?php echo Yii::t('wp_theme.blog', '本格写真撮影始めました。フルセット1500円(税別)!'); ?>"/>
																<?php endif; ?>
															</a></li>
													</ul>
												</div><!-- end banner-square-blog -->
											<?php endif; ?>
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

<?php get_footer('new-kimono') ; ?>
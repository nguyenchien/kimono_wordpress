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
global $language ;
$language = Yii::app()->language;
wp_register_style('news', get_template_directory_uri() . '/css/news.css', array('twentytwelve-style'));
wp_enqueue_style('news');
get_header('new-kimono');
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
									<div class="container">
										<section class="columns row">
											<?php
											/* get category news */
											wp_reset_postdata();
											$paged = get_query_var('paged') ? get_query_var('paged') : 1;
											// Get current queried object
											$queried_obj = get_queried_object();
											// Get current queried object's taxonomies
											$taxonomies = $queried_obj->taxonomies;
											$taxonomies = !empty($taxonomies) ? $taxonomies : $queried_obj->taxonomy;
											// Check if taxonomy
											if (!empty($taxonomies)) {
												$limit = getTaxonomyField($taxonomies, 'category_limit');
											}else{
												$limit = 10;
											}
											if(empty($limit) || !is_numeric($limit) || $limit <= 0)
											{
												$limit = 10;
											}
											$args=array(
												'post_status'			=> 'publish',
												'post_type'			  => 'news',
												'pagination'			 => true,
												'paged'					 => $paged,
												'posts_per_page'		 => $limit,
												'order'				  => 'DESC',
												'orderby'				=> 'date',
											);
											$the_query  = new WP_Query($args);
											if(empty($the_query->max_num_pages))
											{
												wp_redirect(network_site_url( 'news'));
											}
											if ( $the_query->have_posts() ) { ?>
												<div class="box-news-top" style="padding-bottom: 10px;">
													<div class="block-title-top-page-title bg-top-page-title news">
														<h2><span class="en">News</span><span class="ja">
					<?php if(Yii::app()->language ==='ja'): ?>
					<?php echo Yii::t('wp_theme', 'お知らせ'); ?></span>
															<?php endif; ?>
														</h2>
													</div>
												</div>

												<?php if(Yii::app()->language ==='ja'): ?>
													<div class="news">
														<ul>
															<?php while ($the_query->have_posts()) {
																$the_query->the_post();
																?>
																<li>
																	<div class="news-item">
																		<div class="image"><?php

																			$thumbId = get_post_thumbnail_id($post->ID);
																			if(empty($thumbId))
																			{
																				$url=WP_HOME.'/images/news-noimage.jpg';
																				echo '<img data-src="'.$url.'" width="130" height="130" class="attachment-block-top-blog wp-post-image" />';
																			}
																			else
																			{
																				$html = swe_wp_get_attachment_image($thumbId, $size = array(130,130), $icon = 1, $attr = array(
																					'class' => 'attachment-'.implode('x', $size) . ' '.$thumbId,
																					'alt' => trim(strip_tags(get_post_meta($thumbId, '_wp_attachment_image_alt', true))),
																				));
																				if(empty($html))
																				{
																					$url=WP_HOME.'/images/news-noimage.jpg';
																					echo '<img data-src="'.$url.'" width="130" height="130" class="attachment-block-top-blog wp-post-image" />';
																				}
																				else{
																					echo $html;
																				}
																			}

																			?></div>
																		<div class="news-box-content">
																			<p>
																				<span class="date"><?php the_date() ?></span>
																			</p>
																			<h2><?php the_title(); ?></h2>
																			<p><?php the_excerpt(); ?></p>
																		</div>
																	</div>
																</li>
															<?php } // end of the loop. ?>
														</ul>
													</div>
													<div class="news-paging">
														<?php wp_pagenavi(array('query' => $the_query)); ?>
													</div>
												<?php else: ?>
													<div class="news-message">
														<p><?php echo Yii::t('wp_theme', '<p>This is somewhat embarrassing, isn’t it?</p><p>It seems we can’t find what you’re looking for.</p>') ?></p>
														<p><?php echo Yii::t('wp_theme', 'Sorry, this entry is only available in') ; ?> <a href="<?php echo network_site_url( 'news'); ?>"><?php echo Yii::t('wp_theme','日本語'); ?>.</a></p>
														<?php //get_template_part(404); ?>
													</div>
												<?php endif; ?>

												<?php
											}
											/* end category news */
											?>
										</section>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->
<?php //get_sidebar(); ?>
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
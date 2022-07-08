<?php
/**
 * The Template for displaying SPOT category single posts
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
get_header('new-kimono');
global $post, $custom_taxonomies, $kimono, $language;
$language = Yii::app()->language;
$current_cate = $kimono['current_cate'];
$taxonomy = $kimono['taxonomy'];
$parent = $kimono['parent'];
$parent_data = get_category_data($parent);
?>
	<style type="text/css">
		.acf-map {
			width: 606px;
			height: 444px;
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
													 <div class="wrap-formal-content formal-blog-detail flexbox">
														  <div class="wrap-blog-left-content ">
																<?php if (have_posts()) :
																	 while (have_posts()) : the_post();
																		  $img = has_post_thumbnail() ? swe_get_the_post_thumbnail($post) : "<img src='".WP_HOME."/images/no-image.png'>";
																		  $title = get_the_title();
																		  $date = get_the_date();
																		  $view_count = do_shortcode('[post-views]');
																		  $excerpt = get_the_excerpt();
																		  $cate_link = get_category_link($current_cate);

																	 endwhile;
																endif; ?>
																<div class="wrap-pd-intro">
																	 <div class="wrap-pd-img"><?php echo $img; ?><div class="overlay-img"></div>
																	 </div>
																	 <div class="wrap-pd-content">
																		  <h1 class="wrap-pd-title"> <?php echo $title; ?> </h1>
																		  <div class="wrap-pd-info">
																				<div class="wrap-feature">特集</div>
																				<div class="post-date"><?php echo $date; ?></div>
																				<div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count; ?></span><span class="name-view">view</span></div>
																		  </div>
																	 </div>
																</div>
																<div class="wrap-pd-details"><?php the_content(); ?></div>
                                                              <?php if ($current_cate->slug === 'route-spot'):
                                                                  $args = array(
                                                                      'posts_per_page'   => 4,
                                                                      'spot-cate'        => $current_cate->slug,
                                                                      'exclude'          => get_the_ID(),
                                                                      'post_type'        => 'spot-post',
                                                                      'post_status'      => 'publish'
                                                                  );
                                                                  $myposts = get_posts( $args );?>
                                                                  <div class="other_pages h2-block h2-block-second">
                                                                      <h2 class="h2-title-bar"><?php echo Yii::t('wp_theme', '関連トピック'); ?></h2>
                                                                      <ul class="clearfix">
                                                                          <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                                                                              <li>
                                                                                  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
                                                                                      swe_the_post_thumbnail($post, 'thumbnail', array('alt' => strip_tags(get_the_title())));
                                                                                      ?></a>
                                                                                  <p>
                                                                                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title();?></a>
                                                                                  </p>
                                                                              </li>
                                                                          <?php endforeach; wp_reset_postdata();?>
                                                                      </ul>
                                                                  </div>
                                                              <?php endif;?>
                                                                <?php
                                                                $cfs = get_fields();
                                                                $show_cfbasic = get_field('show_cfbasic');
                                                                $image = get_field('image');
                                                                $name = get_field('name');
                                                                $time = get_field('time');
                                                                $phone = get_field('phone');
                                                                $access_from_kyoto_station = get_field('access_from_kyoto_station');
                                                                $location = get_field('google_map');
                                                                $show_cfmap = get_field('show_cfmap');
                                                                ?>
                                                                <?php if ($current_cate->slug !== 'route-spot' && ($show_cfbasic || !isset($cfs['show_cfbasic']))): ?>
                                                                <div class="spot-custom-fields">
                                                                  <div class="h2-block h2-block-second">
                                                                      <h2 class="h2-title-bar"><?php echo Yii::t('wp_theme', '基本情報'); ?></h2>
                                                                      <div class="wrap-course clearfix" data-show_cfbasic="<?php echo $show_cfbasic ? $show_cfbasic : 'no_update'; ?>">
                                                                            <div class="imageleft" style="float: right; margin: 0px;">
                                                                                 <?php if ($image) {
                                                                                      echo swe_wp_get_attachment_image($image, 'spot-thumb', false, array('alt' => strip_tags(get_the_title())));
                                                                                 } else {
                                                                                      swe_the_post_thumbnail($post, 'spot-thumb', array('alt' => strip_tags(get_the_title())));
                                                                                 }
                                                                                 ?>
                                                                            </div>
                                                                            <div class="textright" style="float: left; margin: 0px 40px 0px 0px; width: 290px;">
                                                                                 <ul>
                                                                                      <?php if ($name): ?>
                                                                                            <li class="name">
                                                                                                 <label>
                                                                                                      <?php echo Yii::t('wp_theme', '住所'); ?>
                                                                                                 </label>
                                                                                                 <span> <?php echo $name; ?></span>
                                                                                            </li>
                                                                                      <?php endif; ?>
                                                                                      <?php if ($time): ?>
                                                                                            <li class="time">
                                                                                                 <label>
                                                                                                      <?php echo Yii::t('wp_theme', '拝観時間'); ?>
                                                                                                 </label>
                                                                                                 <span><?php echo $time; ?></span>
                                                                                            </li>
                                                                                      <?php endif; ?>
                                                                                      <?php if ($phone): ?>
                                                                                            <li class="phone">
                                                                                                 <label>
                                                                                                      <?php echo Yii::t('wp_theme', '電話番号'); ?>
                                                                                                 </label>
                                                                                                 <span><?php echo $phone; ?></span>
                                                                                            </li>
                                                                                      <?php endif; ?>
                                                                                      <?php if ($access_from_kyoto_station): ?>
                                                                                            <li class="access_from_kyoto_station">
                                                                                                 <label>
                                                                                                      <?php echo Yii::t('wp_theme', '京都駅からのアクセス'); ?>
                                                                                                 </label>
                                                                                                 <span><?php echo $access_from_kyoto_station; ?></span>
                                                                                            </li>
                                                                                      <?php endif; ?>
                                                                                 </ul>
                                                                            </div>
                                                                      </div>
                                                                 </div>
                                                                 <?php if ((!empty($location) && !empty($location['lat']) && !empty($location['lng']))):?>
                                                                      <div class="h3-block" data-show_cfmap="<?php echo $show_cfmap ? $show_cfmap : 'no_update'; ?>">
                                                                            <h3 class="h3-title-bar">
                                                                                 <?php echo Yii::t('wp_theme', 'アクセスマップ'); ?>
                                                                            </h3>
                                                                            <div class="google_map">
                                                                                 <div class="acf-map">
                                                                                      <div class="marker" id="spot-map" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                                                                 </div>
                                                                            </div>
                                                                      </div>
                                                                 <?php endif; ?>
                                                                </div>
                                                                <?php endif ?>
																<!-- end of class="spot-custom-fields" -->
																<div class="wrap-reserve-bottom">
																	 <div class="reserve-list"><a href="<?php echo $cate_link;?>" class="main-btn">記事掲載アイテム一覧</a></div>
																	 <div class="social-widget">
																		  <?php
																		  if (function_exists('wp_social_bookmarking_light_output_e')) {
																				wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false));
																		  }
																		  ?></div>
																</div>
																<div class="wrap-pd-intro bottom">
																	 <div class="wrap-pd-img"><?php echo $img; ?>
																		  <div class="overlay-img"></div>
																	 </div>
																	 <div class="wrap-pd-content">
																		  <h2 class="wrap-pd-title"> <?php echo $title;?> </h2>
																		  <div class="wrap-pd-info">
																				<div class="wrap-feature">特集</div>
																				<div class="post-date"><?php echo $date; ?></div>
																				<div class="wrap-num-view flexbox"><span class="num-view"><?php echo $view_count; ?></span><span class="name-view">view</span></div>
																		  </div>
																	 </div>
																</div>

														  </div>
														  <div class="wrap-sidebar-overlay">
																<div class="wrap-blog-right-content right-blog-sidebar" id="right-blog-sidebar">
																	 <?php if (is_active_sidebar('sidebar-1')) : ?>
																		  <?php dynamic_sidebar('sidebar-1'); ?>
																	 <?php endif; ?>
																</div>
														  </div>
													 </div>
												</div>
										  </div> <!--end right-column-->
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
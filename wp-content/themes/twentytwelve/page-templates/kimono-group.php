<?php
/**
 * Template Name: Kimono group
 * Links: /group, /group/plan8, /group/plan20,/group/plan_x,
 */
global $post, $language, $sites;
wp_register_style('top-style', get_template_directory_uri() . '/css/top.css', array('twentytwelve-style'));
wp_enqueue_style('top-style');
wp_enqueue_style('kimono-group', get_template_directory_uri() . '/css/kimono-group.css', array('twentytwelve-style'));
get_header('new-kimono');
?>
<?php
if($post->post_name =='plan20'):?>
	<script defer type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.datetimepicker.js"></script>
	<link type="text/css" href="<?php echo get_template_directory_uri();?>/css/jquery.datetimepicker.css" rel="stylesheet" />
<?php endif;?>
<?php if(!empty($language)){
    include('new-kimono-group.php');
}else{
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

									<div class="container kimono-group clearfix">
										<?php
										if (is_page('group')) {
											?>
											<h1 class="title-main">
												<?php the_field('page_h1'); ?>
											</h1>
											<?php
											$args = array(
												'post_parent' => $post->ID,
												'post_type' => 'page',
												'order' => 'asc',
												'orderby' => 'menu_order',
											);
											// The Query
											$the_query = new WP_Query($args);

											// The Loop
										if ($the_query->have_posts()) {
											$group_banner = array();
										while ($the_query->have_posts()) {
											$the_query->the_post();
											?>
											<div class="item <?php echo $post->post_name; ?>">
												<?php
												$image_id = get_field('group_banner');
												$image = get_group_image($image_id, array('class'=>'image-group-pc'));
												$link = get_permalink($post->ID);
												$group_banner[] = array('img' => $image, 'link'=>$link);
												?>
												<div class="box-group-name clearfix">
													<div class="wrap-name">
														<div class="name clearfix">
															<?php the_field('group_name', $post->ID);?>
														</div><!-- end name -->
													</div><!-- end wrap-name -->
													<span class="bg-arrow"></span>
													<div class="image">
														<a href="<?php echo $link; ?>">
															<?= $image ?>
														</a>
													</div><!-- end image -->
												</div><!-- end box-group-name -->
												<p class="text-h1">
													<?php the_field('page_h1', $post->ID); ?>
												</p>
												<div class="box-info clearfix">
													<div class="b-image">
														<?php swe_the_post_thumbnail($post); ?>
													</div>
													<div class="b-text">
														<h2 class="text-h2 clearfix">
															<?php the_field('sub-title-page', $post->ID); ?>
														</h2><!-- end text-h2 -->
														<div class="text-excerpt">
															<?php the_excerpt(); ?>
															<p class="red"><?php the_field('group_text', $post->ID); ?></p>
														</div><!-- end text-excerpt -->
													</div>
												</div><!-- end box-info -->
												<?php
												getGroupBlog($post->post_name);
												?>
											</div><!-- end item -->
											<?php
										}?>

											<ul class="list-group-name clearfix">
												<?php
												foreach ($group_banner as $banner) {
													?>
													<li>
														<a href="<?php echo $banner['link']; ?>">
															<?= $banner['img']; ?>
														</a>
													</li>
													<?php
												}?>
											</ul>
										<?php
										} else {
											// no posts found
										}
										/* Restore original Post Data */
										wp_reset_postdata();
										} else {// single page

										?>
											<div class="group detail">
												<div class="item <?php echo $post->post_name; ?>">
													<div class="box-group-name clearfix">
														<div class="wrap-name">
															<div class="name clearfix">
																<?php the_field('group_name', $post->ID);?>
															</div><!-- end name -->
														</div><!-- end wrap-name -->
														<?php /*<span class="bg-arrow"></span>
					<div class="image">
						<?php
							$image = get_field('group_banner', $post->ID);
						?>
						<a href="<?php echo WP_HOME . '/' . $link ?>">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" >
						</a>
					</div><!-- end image --> */ ?>
													</div><!-- end box-group-name -->

													<p class="text-h1">
														<?php the_field('page_h1', $post->ID); ?>
													</p>

													<div class="box-info clearfix">
														<div class="b-image">
															<?php swe_the_post_thumbnail($post,'post-thumbnail'); ?>
														</div>
														<div class="b-text">
															<h2 class="text-h2 clearfix">
																<?php the_field('sub-title-page', $post->ID); ?>
															</h2><!-- end text-h2 -->
															<div class="text-excerpt">
																<?php the_excerpt(); ?>
																<p class="red"><?php the_field('group_text', $post->ID); ?></p>
															</div><!-- end text-excerpt -->
														</div>
													</div><!-- end box-info -->
												</div><!-- end item -->
												<div class="clearfix"></div>
												<div class="content">
													<?php the_content(); ?>
												</div><!-- end content -->

												<?php
												$args = array(
													'post_parent' => get_page_by_path('group')->ID,
													'post_type' => 'page',
													'order' => 'asc',
													'orderby' => 'menu_order',
													'post__not_in' => array($post->ID)
												);
												// The Query
												$the_query = new WP_Query($args);

												// The Loop
												if ($the_query->have_posts()) {
													?>
													<div class="clearfix"></div>
													<div id="classroom_banner" class="main-content">
														<div class="container clearfix">
															<?php
															$i=1;
															while ($the_query->have_posts()) {
																$the_query->the_post();
																$image_id = get_field('group_banner');
																$image = get_group_image($image_id, array('class'=>'image-group-pc'));
																$link = get_permalink($post->ID);
																$class = $i===1?'i-left':'i-right';
																?>

																<div class="item <?php echo $class?> item-group-8">
																	<a href="<?php echo $link; ?>">
																		<?= $image ?>
																	</a>
																</div>
																<?php
																$i++;
															}
															?>
														</div>
													</div>
													<?php
												}
												/* Restore original Post Data */
												wp_reset_postdata();
												$lang = yii::app()->language;
												?>
											</div><!-- end group.detail -->
											<script type="text/javascript">
												$(document ).ready(function() {
													var $time_input = jQuery('input#book-time-group');

													if ($time_input.length > 0) {
														$time_input.attr('readonly', true);
														$time_input.datetimepicker({
															format:'<?php echo yii::t('js_msg','Y年m月d日 H時i分') ?>',
															lang:'<?php echo ( $lang == 'tw') ? 'zh-TW' : (($lang == 'ms') ? 'en' : (( $lang == 'cn') ? 'zh' : $lang)); ?>',
															minTime:'07:00',
															maxTime:"18:00",
															minDate:0,
															step:30
														});
													}
												});
											</script>

											<?php Yii::app()->controller->widget('application.components.widgets.EventTrackingContactForm'); ?>
											<?php
										}
										?>
									</div><!-- end container.kimono-group -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->
<?php }?>
<?php //get_footer('new-kimono') ; ?>

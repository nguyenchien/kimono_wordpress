<?php
/**
 * The Template for displaying SPOT category single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header('new-kimono');
global $post;
//wp_register_style( 'style-column', get_template_directory_uri() . '/css/column.css', array('twentytwelve-style'));
//wp_enqueue_style( 'style-column' );
wp_register_style( 'style-highend-customer-remark-single', get_template_directory_uri() . '/css/highend-customer-remark-single.css', array('twentytwelve-style'));
wp_enqueue_style( 'style-highend-customer-remark-single' );
wp_register_style('footer-formal-style', get_template_directory_uri() . '/css/footer-formal.css', array('twentytwelve-style'));
wp_enqueue_style('footer-formal-style');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
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
									<div class="container single-highend-customer-remark clearfix">
										<div class="content-highend-customer-remark">
											<?php if(Yii::app()->language ==='ja'): ?>
												<div class="main-posts">
													<div class="baner-cus-voice">
														<img src="<?php echo get_template_directory_uri(); ?>/images/baner-cus-voice.png" alt="" />
													</div>
													<div class="post">
														<h1 class="title-post"><?php the_title() ?></h1>
														<div class="content-post"><?php the_content(); ?></div>
														<p class="feat-img">
															<?php
															if (has_post_thumbnail()){
																swe_the_post_thumbnail($post);
															}
															?>
														</p>
														<p class="customer_remark_image">
															<?php
															$customer_remark_image = get_field("customer_remark_image");
															if(!empty($customer_remark_image)):
																?>
																<img src="<?php echo $customer_remark_image['url']; ?>" alt="<?php echo $customer_remark_image['alt']; ?>" />
															<?php endif; ?>
														</p>
														<p class="date-post">
															<span class="cus-info"><?php the_field('customer_info'); ?></span>
															<span class="separator">|</span>
															<span class="date">date: <?php the_date(); ?></span>
														</p>
													</div>
												</div>

												<div class="list-cate-post">
													<h2 class="title-cate">カテゴリ</h2>
													<ul>
														<?php
														$termIdCurrent = get_queried_object()->term_id;
														customerRemarkTaxList($termIdCurrent);
														?>
													</ul>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->

<?php get_footer('formal'); ?>
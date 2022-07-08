<?php
/**
 * Template Name: Review Page
 * Links: /access/kyotostation/kyotostation-review, '/access/gion-shijo/gionshijo-review', '/access/shinkyogoku/shinkyogoku-review'
 * '/access/kinkakuji/kinkakuji-review', '/access/kiyomizuzaka/kiyomizuzaka-review',
 * '/osaka/osaka-access/osaka-shinsaibashi/shinsaibashi-review',
 * '/access/kamakura/kamakura-review', '/asakusa/asakusa-access/asakusa/asakusa-review'
 */

wp_register_style('review-page', get_template_directory_uri() . '/css/review-page.css', array('twentytwelve-style'));
wp_enqueue_style('review-page');

global $post, $language;
$language = Yii::app()->language;
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
									<div class="container clearfix">
                                        <style>
                                            .section-top .img{
                                                position: relative;
                                            }
                                            .section-top .img img{
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                opacity: 0;
                                                visibility: hidden;
                                            }
                                            .section-top .img:after {
                                                display: block;
                                                content: '';
                                                background: url('../../../../../images/loading.gif') no-repeat center center #f1ebf0;
                                                padding-bottom: calc(187/400 * 100%);
                                            }
                                            .section-top .img.imagesLoaded img{
                                                position: static;
                                                opacity: 1;
                                                visibility: visible;
                                            }
                                            .section-top .img.imagesLoaded:after{
                                                background: unset;
                                                padding-bottom: 0;
                                            }
                                        </style>
										<?php while (have_posts()) : the_post(); ?>

											<article
													id="post-<?php the_ID(); ?>" <?php is_page(FAQ) ? post_class('page-faqs') : post_class(); ?>>

												<div class="box-overview-page-howto-faq">
													<div class="section-top">
                                                        <div class="img">
                                                            <?php swe_the_post_thumbnail($post, 'full', array('alt' => strip_tags(get_the_title()))); ?>
                                                        </div>
                                                        <div class="wrap-content">
                                                            <h1>
                                                                <?php
                                                                if (wp_nonce_field('page_h1')) {
                                                                    the_title();
                                                                } else {
                                                                    the_field('page_h1');
                                                                }
                                                                ?>
                                                            </h1>
                                                            <?php if (get_field('sub-title-page') && get_field('sub-title-page') != 'null') {
                                                                echo '<h2>' . get_field('sub-title-page') . '</h2>';
                                                            } ?>
                                                            <?php if (!empty($post->post_excerpt)): ?>
                                                                <?php the_excerpt(); ?>
                                                            <?php endif; ?>
                                                        </div>
													</div>
												</div><!-- end box-overview-page-howto-faq -->

												<div class="box-content-page cont-page-review clearfix">
													<div class="cont-page-left">
														<?php
														the_content(); ?>
													</div><!-- end cont-page-left -->

													<div class="cont-page-right">
														<?php //get_sidebar('review-page');?>
                                                        <div class="page-childs-howto-faq">
                                                            <?php echo get_field('menu_region_name'); ?>
                                                        </div>
													</div><!-- end cont-page-right -->

													<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
												</div><!-- .box-content-page -->

												<div class="entry-meta sixteen columns">
													<?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
												</div><!-- .entry-meta -->

											</article><!-- #post -->
										<?php endwhile; // end of the loop. ?>
                                        <script>
                                            $(document).ready(function () {
                                                setTimeout(function() {
                                                    if($('.box-overview-page-howto-faq .img').length){
                                                        $('.box-overview-page-howto-faq .img').addClass('imagesLoaded');
                                                    }
                                                }, 1000);
                                            });
                                        </script>
									</div><!-- end container -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end wrap-highend-v2 -->
	</div><!-- end container -->

<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>

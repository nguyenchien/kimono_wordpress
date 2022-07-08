<?php
/**
 * Template Name: Recruitment contact page
 * Links: /recruitment
 */
global $post, $language;
$language = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');

//wp_register_style('howto-faq', get_template_directory_uri() . '/css/howto-faq.css', array('twentytwelve-style'));
//wp_enqueue_style('howto-faq');

wp_register_style('recruitment', get_template_directory_uri() . '/css/recruitment.css', array('twentytwelve-style'));
wp_enqueue_style('recruitment');

include_once(ABSPATH . 'wp-admin/includes/plugin.php');
$plugin = 'contact-form-7/wp-contact-form-7.php';
if (is_plugin_active($plugin)) {
	wp_enqueue_style('contact-form-7', wpcf7_plugin_url('includes/css/styles.css'), array(), WPCF7_VERSION, 'all');
}

?>

<script type="text/javascript">
	$(document).on('ready', function() {
		if(isSmartPhone()){

//            $('.wrap-pic-introduction').on('init reInit', function(event, slick, currentSlide, nextSlide){
//                var prevItem = $('.slick-current').prev();
//                var nextItem = $('.slick-current').next();
//                $(prevItem).addClass('slick-prev-item');
//                $(nextItem).addClass('slick-next-item');
//            });

			$('.wrap-pic-introduction').slick({
				centerMode: true,
				slidesToShow: 1,
                arrows: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
			});

		}
	})
</script>


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
								<?php get_sidebar('top-page-left-v3') ?>
							</div>
							<div class="right-column">
								<div class="container-box clearfix">
									<?php while (have_posts()) : the_post(); ?>
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!--											<div class="recruitment clearfix">-->
<!--												<div class="info">-->
<!--													--><?php
//													echo (get_field('sub-title-page') && get_field('sub-title-page') != 'null') ? '<h1>' . get_field('sub-title-page') . '</h1>' : ''
//													?>
<!--													<h2>--><?php //the_title(); ?><!--	</h2>-->
<!--													<p>-->
<!--														--><?php //!empty($post->post_excerpt) ? the_excerpt() : ''; ?>
<!--													</p>-->
<!--												</div>-->
<!--											</div>-->

											<div class="box-content-page page-<?php echo basename(get_permalink()); ?> clearfix">

												<?php
												the_content();
												?>

												<script>
													$(document).ready(function () {
														$('ul.recruitment').each(function () {
															var $active, $content, $links = $(this).find('a');
															$active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
															$active.addClass('active');
															$content = $($active[0].hash);
															$links.not($active).each(function () {
																$(this.hash).hide();
															});
															$('#jobtitle').val($active.text());
															$(this).on('click', 'a', function (e) {
																$active.removeClass('active');
																$content.hide();
																$active = $(this);
																$content = $(this.hash);
																$active.addClass('active');
																$content.show();
																e.preventDefault();
																$('#jobtitle').val($active.text());
															});
														});
													});
												</script><!-- end script -->
												<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
											</div><!-- end div.box-content-page -->

											<?php Yii::app()->controller->widget('application.components.widgets.EventTrackingContactForm'); ?>

											<div class="entry-meta sixteen columns">
												<?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
											</div><!-- .entry-meta -->

										</article><!-- #post -->
									<?php endwhile; // end of the loop. ?>

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

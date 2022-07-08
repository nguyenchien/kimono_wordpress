<?php
/**
 * Template Name: Photo Session
 * Links: /photo-session
 */
wp_register_style('access-style-flexslider', get_template_directory_uri() . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-flexslider');
wp_enqueue_script('access-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('photo-session', get_template_directory_uri() . '/css/photo-session.css', array('twentytwelve-style'));
wp_enqueue_style('photo-session');
global $post, $language;
$language = Yii::app()->language;
if($language == "ja"){
    get_header('new-kimono-landing-page');
} else {
    get_header('new-kimono');
}
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
								<?php get_sidebar('top-page-left-v3') ?>
							</div>
							<div class="right-column">
								<div class="container clearfix">
									<?php while (have_posts()) : the_post(); ?>
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<div class="box-content-page page-<?php echo basename(get_permalink()); ?> clearfix">
												<?php
												the_content();
												?>
												<script type="text/javascript">
//													$(window).load(function(){
//														var containerWidth = $('#carousel').width()
//														var itemWidthPhotoSession = containerWidth <=  640 ? (containerWidth -10)/3: (containerWidth-20)/4;
//														var itemMarginWidthPhotoSession = 10;
//														var minItemsPhotoSession = 3;
//														var maxItemsPhotoSession = 4;
//														$('#carousel').flexslider({
//															animation: "slide",
//															controlNav: false,
//															animationLoop: true,
//															slideshow: false,
//															itemWidth: itemWidthPhotoSession,
//															itemMargin: itemMarginWidthPhotoSession,
//															minItems: minItemsPhotoSession,
//															maxItems: maxItemsPhotoSession,
//															move: 2,
//															startAt: 0,
//															asNavFor: '#slider'
//														});
//														var _pos = $("#slider .slides li").length - 1;
//														$("#slider").flexslider({
//															slideshowSpeed: 2500,
//															animationSpeed: 1000,
//															pauseOnAction: false,
//															after: function(slider) {
//																/* auto-restart player if paused after action */
//																if (!slider.playing) {
//																	slider.play();
//																}
//															},
//															initDelay: 0,
//															animation: "slide",
//															controlNav: false,
//															animationLoop: false,
//															slideshow: true,
//															startAt: _pos,
//															sync: "#carousel"
//														})
//													});
													$(document).ready(function () {

                                                        var containerWidth = $('#carousel').width()

                                                        if(isSmartPhone()){
                                                            var itemWidthSliderProduct = containerWidth <=  640 ? (containerWidth -10)/6: (containerWidth-20)/6;
                                                            var minItemsSliderProduct = 6;
                                                            var maxItemsSliderProduct = 6;
                                                            var itemMarginWidthSliderProduct = 0;
                                                        } else{
                                                            var itemWidthSliderProduct = containerWidth <=  640 ? (containerWidth -10)/4: (containerWidth-20)/4;
                                                            var minItemsSliderProduct = 4;
                                                            var maxItemsSliderProduct = 4;
                                                            var itemMarginWidthSliderProduct = 10;
                                                        }

                                                        $('#carousel').flexslider({
                                                            animation: "slide",
                                                            controlNav: false,
                                                            animationLoop: false,
                                                            slideshow: false,
                                                            slideshowSpeed: 3000,
                                                            asNavFor: '#slider',
                                                            itemMargin: itemMarginWidthSliderProduct,
                                                            itemWidth: itemWidthSliderProduct,
                                                            minItems: minItemsSliderProduct,
                                                            maxItems: maxItemsSliderProduct
                                                        });



                                                        $('#slider').flexslider({
                                                            animation: "slide",
                                                            controlNav: false,
                                                            directionNav: false,
                                                            slideshowSpeed: 3000,
                                                            animationLoop: false,
                                                            slideshow: true,
                                                            sync: "#carousel"
                                                        });

														$(".title-photo-session-gallery").click(function () {
															var targetToggle = $(this).find(".collapsed-down-highgrade");
															targetToggle.toggleClass('icon-fa-collapsed-down');
															targetToggle.toggleClass('icon-fa-collapsed-top');
															$(this).next().slideToggle();
														});
													});
												</script>
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
<script type="text/javascript">
	$(window).load(function() {
		$('.flexsliderphoto').flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 210,
			itemMargin: 15,
			minItems: 2,
			maxItems: 3
		});
	});
</script>

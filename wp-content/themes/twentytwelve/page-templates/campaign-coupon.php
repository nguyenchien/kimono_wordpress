<?php
/**
 * Template Name: Campaign coupon
 * Links: /campaign
 */


wp_enqueue_style('campaign-coupon', get_template_directory_uri() . '/css/campaign-coupon.css', array('twentytwelve-style'));



global $post, $language;
$language = Yii::app()->language;
get_header('new-kimono');

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
								<?php get_sidebar('top-page-left') ?>
							</div>
							<div class="right-column">
								<div class="container-box clearfix">
                                    <?php while ( have_posts() ) : the_post(); ?>
                                        <?php the_content(); ?>
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


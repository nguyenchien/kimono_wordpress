<?php
/**
 * Template Name: Tourist Spots
 * Links: /tourist-spots
 */
wp_register_style('access-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-slick');
wp_register_style('access-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-slick-theme');
wp_enqueue_script('access-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('tourist-spots', get_template_directory_uri() . '/css/tourist-spots.css', array('twentytwelve-style'));
wp_enqueue_style('tourist-spots');
global $post;
get_header();
?>
	<div class="container clearfix">

		<?php if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		} ?>
		<?php while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="box-content-page page-<?php echo basename(get_permalink()); ?> clearfix">
					<?php
						the_content();
					?>
                    <script type="text/javascript">
                        $(document).ready(function(){

                            var list = $('.slick-slider-tourist .slick-item');

                            $('.slick-slider-tourist').on('init reInit', function(event, slick, currentSlide, nextSlide){
                                var prevItem = $('.slick-current').prev();
                                var nextItem = $('.slick-current').next();
                                $(prevItem).addClass('slick-prev-item');
                                $(nextItem).addClass('slick-next-item');

                                var currentHeight = $('.slick-active').height();
                                $('.slick-arrow').height(currentHeight);

                            });

                            $('.slick-slider-tourist').slick({
                                centerMode: true,
                                centerPadding: '60px',
                                slidesToShow: 1,
                                vertical: true,
                                speed: 300,
                                draggable: false,
                                appendArrows: $('.slick-slider-tourist'),

                                responsive: [
                                    {
                                        breakpoint: 768,
                                        settings: {
                                            vertical: false,
                                            arrows: true,
                                            centerMode: false,
                                            centerPadding: '40px',
                                            slidesToShow: 1,
                                            draggable: true,
                                            adaptiveHeight: true
                                        }
                                    },
                                    {
                                        breakpoint: 480,
                                        settings: {
                                            vertical: false,
                                            arrows: true,
                                            centerMode: false,
                                            centerPadding: '40px',
                                            slidesToShow: 1,
                                            draggable: true,
                                            adaptiveHeight: true
                                        }
                                    }
                                ]
                            });

                            $('.slick-slider-tourist')
                                .on('beforeChange', function(event, slick, currentSlide, nextSlide){
                                    //console.log('Before change');

                                    $(document).on('click', '.slick-next', function(){
                                        $('.slick-item').removeClass('slick-prev-item slick-next-item');
                                        $('.slick-slider-tourist').slick('slickNext');
                                        $(list[currentSlide]).addClass('slick-prev-item');
                                        $(list[nextSlide]).next().addClass('slick-next-item');
                                    });

                                    $(document).on('click', '.slick-prev', function(){
                                        $('.slick-item').removeClass('slick-prev-item slick-next-item');
                                        $('.slick-slider-tourist').slick('slickPrev');
                                        $(list[nextSlide]).next().addClass('slick-next-item');
                                        $(list[nextSlide]).prev().addClass('slick-prev-item');
                                    });

                                    var currentHeight = $('.slick-next-item').height();
                                    $('.slick-arrow').height(currentHeight);

                                })
                                .on('afterChange', function(event, slick, currentSlide, nextSlide){
                                    //console.log('After change');

                                    if(currentSlide == 0){
                                        $(list[currentSlide]).prev().addClass('slick-prev-item');
                                    }
                                });

                            //Link to top
                            $('#toCart').html('きものレンタルを予約する');
                            $('#toCart').attr('href', '/reserve');
                            $('#toCart').fadeIn();

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
<?php get_footer(); ?>

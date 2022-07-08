<?php
/**
 * Template Name: Tourist Spots
 * Links: /tourist-spots
 */
global $post, $language;
$language = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();

get_header('new-kimono');
wp_register_style('access-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-slick');
wp_register_style('access-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('access-style-slick-theme');
wp_enqueue_script('access-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('tourist-spots', get_template_directory_uri() . '/css/tourist-spots.css', array('twentytwelve-style'), '20201029');
wp_enqueue_style('tourist-spots');
wp_enqueue_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css');
//Widget shop list
if($isSmartPhone){
    wp_enqueue_style('widget-top-shop-list-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-sp.css', array('twentytwelve-style'));
} else{
    wp_enqueue_style('widget-top-shop-list-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-pc.css', array('twentytwelve-style'));
}
?>
    <div class="container-box clearfix">
        <?php if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        } ?>
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <?php the_excerpt(); ?>
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php get_sidebar('top-page-left') ?>
                                </div>
                                <div class="right-column">
                                    <div class="container clearfix">
                                        <?php while (have_posts()) : the_post(); ?>
                                            <?php
                                                the_content();
                                            ?>
                                            <script type="text/javascript">
                                                $(document).ready(function(){
                                                    var list = $('.slick-slider-tourist .slick-item');
                                                    var centerPadding = $('.slick-slider-tourist').attr('data-center');

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
                                                        centerPadding: centerPadding ? centerPadding : "60px",
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

                                                    $('.slick-slider-tourist').on('beforeChange', function(event, slick, currentSlide, nextSlide){
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
                                                    }).on('afterChange', function(event, slick, currentSlide, nextSlide){
                                                        if(currentSlide == 0){
                                                            $(list[currentSlide]).prev().addClass('slick-prev-item');
                                                        }
                                                    });

                                                    //Link to top
                                                    $('#toCart').html('きものレンタルを予約する');
                                                    $('#toCart').attr('href', '/reserve');
                                                    $('#toCart').fadeIn();
                                                })

                                                $(".slick-slider-tourist .slick-slide").each(function( index ) {
                                                    $( this ).css('margin-top',
                                                        ($('.slider').height()-$(this).height())/2+'px' );
                                                });

                                            </script>
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

<?php if($language == "ja"): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
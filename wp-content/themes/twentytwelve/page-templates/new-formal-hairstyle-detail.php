<?php
/**
 * Template Name: New Formal HairStyle Detail
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $language;
get_header('formal');
wp_register_style('new-formal-product-detail', get_template_directory_uri() . '/css/new-formal-product-detail.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-detail');
wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_register_style('new-formal-hairstyle-style', get_template_directory_uri() . '/css/new-formal-hairstyle.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-hairstyle-style');

if($language == "ja"){
    wp_register_style('kimono-letter-spacing-style', get_template_directory_uri() . '/css/kimono-letter-spacing-ja.css', array('twentytwelve-style'));
    wp_enqueue_style('kimono-letter-spacing-style');
}

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;

//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
?>
<?php if($isSmartPhone):?>
    <div class="wrap-overlay-filter">
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar toggle-filter-list-sidebar">
                <div class="box-filter-list-sidebar">
                    <div class="toggle-filter-sidebar sp">
                        <?php echo do_shortcode('[FormalSidebarFilter]'); ?>
                    </div>
                </div>
            </div>
            <div class="close-sidebar sp">
                <span class="closed-filter"></span>
            </div>
        </div>
    </div>
<?php endif;?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal">', '</div>');
    }
    ?>

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
                                if($isSmartPhone){
                                    echo FormalSidebarLeftCode(array());
                                }else{
                                    if($postName != 'list'){
                                        echo FormalSidebarLeftCode(array('type'=>'planlist'));
                                        echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                    }else if($postName == 'list'){
                                        echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list right-column-hairstyle right-column-hairstyle-detail">
                                <div class="wrap-furisode-hairstyle wrap-furisode-hairstyle-detail">
                                    <h1 class="main-title"><?php the_title(); ?></h1>
                                    <div class="wrap-hairstyle-detail flexbox">
                                        <div class="wrap-hairstyle-gallery">
                                            <?php
                                                if (get_field('hair_style_tags')) {
                                                    the_field('hair_style_tags');
                                                }
                                            ?>
                                            <div class="hairstyle-gallery">
                                                <?php
                                                    $hair_style_gallery = php_set_base_url(get_field('hair_style_gallery'));
                                                    if ($hair_style_gallery) {
                                                        echo $hair_style_gallery;
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="wrap-hairstyle-info">
                                            <h2 class="sub-title">この髪型の特徴</h2>
                                            <?php if (has_excerpt()) : ?>
                                            <div class="hairstyle-description">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end right-column-->

                        </div><!--end wrap-boths-column-->
                    </div><!--end left-column-content-->
                </div><!--end wrap-column-content-->
            </div>
        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->
</div><!-- end container -->
<?php get_footer('formal'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        <?php
        if($isSmartPhone):
        ?>
        var num_scroll = $(".closed-filter").outerHeight();
        $(window).on("scroll", function(){
            if($(this).scrollTop() > num_scroll){
                $(".closed-filter").addClass("fixed-icon-filter");
                $(".wrap-header").hide();
            }else{
                $(".closed-filter").removeClass("fixed-icon-filter");
                $(".wrap-header").show();
            }
        });
        var numHeight = $(".num-height").outerHeight();
        $(".icon-toggle-filter-sidebar").on('click', function () {
            $(".toggle-filter-list-sidebar").addClass("active").css("top", + numHeight);
            $("body, .wrap-overlay-filter").addClass("fixed-scroll overlay-toggle-filter");
            $(".closed-filter").addClass("icon-formal-check-ok");
        });
        $(".close-sidebar .closed-filter").on("click", function(){
            $("body, .toggle-filter-list-sidebar, .wrap-overlay-filter, .closed-filter").removeClass("active fixed-scroll overlay-toggle-filter icon-formal-check-ok");
        });

        var calendarWidth = $(window).width();
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').width(calendarWidth - 10);

        var calendarLeftPos = $('.item-nav-top-search').width() - 3;
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').css('left', "-" + calendarLeftPos + 'px');

        <?php endif?>

        // Slider
        if ( $('#carousel').length ) {
            var containerWidth = $('#carousel').width();
            var itemWidthSliderProduct = containerWidth <=  640 ? (containerWidth -10)/4: (containerWidth-20)/4;
            var itemMarginWidthSliderProduct = 10;
            var minItemsSliderProduct = 4;
            var maxItemsSliderProduct = 4;
            $('#carousel').flexslider({
                slideshowSpeed  : 4000,
                animationSpeed  : 400,
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                prevText: "",
                nextText : "",
                itemWidth: itemWidthSliderProduct,
                itemMargin: itemMarginWidthSliderProduct,
                minItems: minItemsSliderProduct,
                maxItems: maxItemsSliderProduct,
                asNavFor: '#slider'
            });

            $('#slider').flexslider({
                slideshowSpeed  : 4000,
                animationSpeed  : 400,
                animation: "slide",
                controlNav: true,
                animationLoop: false,
                slideshow: true,
                sync: "#carousel",
                prevText: "",
                nextText : "",
            });
        }
    });
</script>

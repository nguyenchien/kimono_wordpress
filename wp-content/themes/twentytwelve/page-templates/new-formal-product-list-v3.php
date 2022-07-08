<?php
/**
 * Template Name: New Formal Product List V3
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
//wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
//wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
//wp_enqueue_style('new-formal-rental-style-flexslider');
//wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'), '201802021658');
wp_enqueue_style('new-formal-rental-style');
get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;

//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;

// Detect formal page
$is_page_homongi_awase = is_page('formal/homongi/awase');
$is_page_homongi_ro_sya = is_page('formal/homongi/ro-sya');
$is_page_homongi_pink = is_page('formal/homongi/pink');
$is_page_homongi_green = is_page('formal/homongi/green');
$is_page_homongi_yellow = is_page('formal/homongi/yellow');
$is_page_homongi_blue = is_page('formal/homongi/blue');
?>
<link rel="preload" href="/css/searchform.css?v=21062021" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=21062021"></noscript>
<script defer type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/qtip2/imagesloaded.pkg.min.js"></script>
<?php if($isSmartPhone):?>
    <style>
        .wrap-overlay-filter{
            display: none !important;
        }
    </style>
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
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
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
//                                if($postName == 'list'){
//                                    if(!$isSmartPhone)
//                                        echo do_shortcode('[FormalSidebarFilter]');
//                                }else{
//                                    echo do_shortcode('[FormalSidebarLeft]');
//                                }

                                if($isSmartPhone){
                                    echo FormalSidebarLeftCode(array());
                                }else{
                                    if($postName != 'list'){
                                        echo FormalSidebarLeftCodeNewStyle(array('type'=>'planlist'));
                                        echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                    }else if($postName == 'list'){
                                        echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list new-right-sub-page">
                                <?php if (!empty($postName)): ?>
                                    <?php
                                        $post_thumbnail = get_post_thumbnail_id();
                                        if($post_thumbnail != ""){
                                    ?>
                                        <div class="new-banner-top-highend-v2">
                                            <div class="container-box">
                                                <?php
                                                    echo swe_wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array('alt' => get_the_title()));
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php endif; ?>
                                <?php the_excerpt() ?>
                                <div class="wrap-des-homongi-awase">
                                    <?php
                                    $title_des_newpage = get_field('title_des_newpage');
                                    if ($title_des_newpage) {
                                        echo do_shortcode(php_set_base_url($title_des_newpage));
                                    }
                                    ?>
                                </div>
                                <div class="wrap-banner-topics">
                                    <div class="wrap-new-sub-title-list title-general title-list text-center flexbox margin-bt10">
                                        <span class="icon-title-general icon icon-formal-search"></span>
                                        <?php if ($is_page_homongi_awase || $is_page_homongi_ro_sya || $is_page_homongi_yellow || $is_page_homongi_pink || $is_page_homongi_green || $is_page_homongi_blue) : ?>
                                            <div class="sub-title-list new-sub-title-list flexbox">
                                                <?php
                                                $title_h1 = get_field('title_h1');
                                                if ($title_h1) {
                                                    echo do_shortcode(php_set_base_url($title_h1));
                                                }
                                                ?>
                                            </div>
                                        <?php else: ?>
                                            <h1 class="sub-title-list new-sub-title-list flexbox">
                                                <?php
                                                $title_h1 = get_field('title_h1');
                                                if ($title_h1) {
                                                    echo do_shortcode(php_set_base_url($title_h1));
                                                }
                                                ?>
                                            </h1>
                                        <?php endif; ?>
                                    </div>
                                    <div class="wrap-list-formal-product">
                                        <div class="row">
                                            <?php
                                            while (have_posts()) : the_post();
                                                the_content();
                                            endwhile;
                                            ?>
                                        </div>
                                    </div><!--end wrap-list-formal-product-->
                                 </div><!--end wrap-list-product-->

                                <?php
                                $intro_bottom = get_field('intro_bottom');
                                if ($intro_bottom) {
                                    echo do_shortcode(php_set_base_url($intro_bottom));
                                }
                                ?>
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
        console.log(num_scroll);
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
    })
</script>

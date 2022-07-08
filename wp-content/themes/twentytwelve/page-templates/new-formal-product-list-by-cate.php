<?php
/**
 * Template Name: New Formal Product List By Cate
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
global $post;
$postName = $post->post_name;

//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
$h1 = 'レンタル着物 検索結果一覧';
if($postName == 'list' && $parent_slug_name == 'formal' && !empty($_GET['shop_id'])){
    global $formalListShopId;
    $formalListShopId = $_GET['shop_id'];
    $h1 = Yii::t('formal','h1-formal-list-shop-'.$_GET['shop_id']);
    add_filter( 'wpseo_title', 'my_wpseo_title' , 10, 1 );
    function my_wpseo_title($str){
        global $formalListShopId;
        return Yii::t('formal','title-formal-list-shop-'.$formalListShopId);
    }
}

wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');

get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
$topBannerShopByCate = get_field('top_banner_shop_by_cate');
$bottomBannerShopByCate = get_field('bottom_banner_shop_by_cate');
$introShopByCate = get_field('intro_shop_by_cate');
?>
<link rel="preload" href="/css/searchform.css?v=21062021" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=21062021"></noscript>
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
    <style>
        .main-banner-top-page{
            position: relative;
            padding-bottom: calc(737/751* 100%);
            min-height: unset;
            background: url('../../../../../images/loading.gif') no-repeat center center #eee;
        }
        .main-banner-top-page img {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            visibility: hidden;
        }
        .main-banner-top-page.imagesLoaded{
            padding-bottom: 0 !important;
            background: unset !important;;
        }
        .main-banner-top-page.imagesLoaded img{
            position: static;
            opacity: 1 !important;;
            visibility: visible !important;
        }
        .main-banner-top-page.clearfix:after{
            content: "";
            display: none !important;
        }
        /*Searchform product list*/
        .widget-list-product-highend ul.list{
            position: relative;
        }
        .widget-list-product-highend ul.list:after{
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            max-width: 940px;
            padding-bottom: calc(100% + 50px);
            padding-left: 100%;
            background: url('../../../../../images/loading.gif') no-repeat center center #eee;
            z-index: 9;
        }
        .widget-list-product-highend .list.imagesLoaded:after{
            padding-bottom: 0;
            background: unset;
        }
        .widget-list-product-highend ul.list li{
            transition: none;
        }

        @media (min-width: 768px) {
            .main-banner-top-page{
                padding-bottom: calc(341/930* 100%);
            }
        }
    </style>
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
                                        echo FormalSidebarLeftCode(array('type'=>'planlist'));
                                        echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                    }else if($postName == 'list'){
                                        echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list">
                                <?php if ($topBannerShopByCate) echo php_set_base_url($topBannerShopByCate); ?>
                                <?php the_excerpt() ?>
                                <div class="wrap-banner-topics">
                                    <div class="title-general title-list text-center flexbox margin-bt10">
                                        <span class="icon-title-general icon icon-formal-search"></span>
                                        <h1 class="sub-title-list">
                                            <?php if($parent_slug_name == "color"): ?>
                                                <span class="text-title-general"><?= the_title() ?></span>
                                            <?php elseif($postName == "list"): ?>
                                                <span class="text-title-general"><?= $h1?></span>
                                            <?php else: ?>
<!--                                                <span class="text-title-general">--><?//= the_title() ?><!--</span>-->
                                            <?php endif; ?>
                                        </h1>
                                        <span class="icon-toggle-filter-sidebar icon-formal-filter-filled sp"></span>
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
                                    if ($bottomBannerShopByCate) echo php_set_base_url($bottomBannerShopByCate);
                                    if ($introShopByCate) echo php_set_base_url($introShopByCate);
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

        setTimeout(function() {
            $('.main-banner-top-page').addClass('imagesLoaded');
            $('#formal_search_form .list').addClass('imagesLoaded');
        }, 1000);
    })
</script>

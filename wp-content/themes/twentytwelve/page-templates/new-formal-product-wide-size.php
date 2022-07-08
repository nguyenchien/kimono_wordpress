<?php
/**
 * Template Name: New Formal Product Wide Size
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
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'), '201802021658');
wp_enqueue_style('new-formal-rental-style');
get_header('formal');
if($isSmartPhone){
    wp_register_style('new-formal-product-wide-size-sp-style', get_template_directory_uri() . '/css/new-formal-product-wide-size-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-product-wide-size-sp-style');
    wp_register_style('new-formal-popup-preview-sp-style', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp-style');
}else{
    wp_register_style('new-formal-product-wide-size-pc-style', get_template_directory_uri() . '/css/new-formal-product-wide-size-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-product-wide-size-pc-style');
    wp_register_style('new-formal-popup-preview-pc-style', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc-style');
}

//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
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
                                        echo FormalSidebarLeftCodeNewStyle(array('type'=>'planlist'));
                                        echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                    }else if($postName == 'list'){
                                        echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div><!--end left-column-->
                            <div class="right-column right-column-list right-column-wide-size">
                                <div class="banner-top-highend-v2">
                                    <div class="container-box">
                                        <?php if($isSmartPhone) :?>
                                            <?php
                                            $main_banner_cate_sp = get_field('main_banner_cate_sp');
                                            if ( $main_banner_cate_sp) {
                                                echo do_shortcode(php_set_base_url( $main_banner_cate_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $main_banner_cate_pc = get_field('main_banner_cate_pc');
                                            if ( $main_banner_cate_pc) {
                                                echo do_shortcode(php_set_base_url( $main_banner_cate_pc));
                                            }
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="wrap-des-wide-size">
                                    <div class="container-box">
                                        <div class="row">
                                            <?php if($isSmartPhone) :?>
                                                <?php
                                                $box_des_wide_size_sp = get_field('box_des_wide_size_sp');
                                                if ( $box_des_wide_size_sp) {
                                                    echo do_shortcode(php_set_base_url( $box_des_wide_size_sp));
                                                }
                                                ?>
                                            <?php else: ?>
                                                <?php
                                                $box_des_wide_size_pc = get_field('box_des_wide_size_pc');
                                                if ( $box_des_wide_size_pc) {
                                                    echo do_shortcode(php_set_base_url( $box_des_wide_size_pc));
                                                }
                                                ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-banner-topics">
                                    <div class="title-general title-list text-center flexbox margin-bt10">
                                        <span class="icon-title-general icon icon-formal-search"></span>
                                        <div class="sub-title-list">
                                            <h2 class="text-title-general">大きいサイズの訪問着 商品一覧</h2>
                                        </div>
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
                                <div class="intro-top-general">
                                        <h3 class="title-intro-top"><?php echo Yii::t('new_formal','きものレンタルwargoのご紹介'); ?></h3>
                                        <div class="content-intro-top">
                                            <p class="intro-text"><?php echo Yii::t('new_formal','きものレンタルwargoは、京都・大阪・東京・金沢に全国11店舗を展開する、日本最大級の着物レンタルサービスです。<br>着物の総在庫数は9,120着(2018年3月1日現在)、お客様に着物のレンタルを楽しんで頂けるよう、作家物、ブランド品、アンティークなど、豊富な種類のお着物をご用意しております。<br>店舗でお着付けする着物レンタルの他、宅配での着物レンタルも取り扱っております。'); ?></p>
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

<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
))
?>

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

        $('.formal-preview-popup-handle').click(function (event) {
            event.preventDefault();
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        });

    })
</script>
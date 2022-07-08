<?php
/**
 * Template Name: New Kimono Hairset V2
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
// Get page parent's slug
global $post, $language;
$language = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;

get_header('formal');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('new-formal-product-detail', get_template_directory_uri() . '/css/new-formal-product-detail.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-detail');
if (!$isSmartPhone) {
    wp_register_style('new-formal-cate-list-v2-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-pc-style');
    wp_register_style('new-kimono-hairset-v2-pc-style', get_template_directory_uri() . '/css/new-kimono-hairset-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-hairset-v2-pc-style');
}
else{
    wp_register_style('new-formal-cate-list-v2-sp-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-sp-style');
    wp_register_style('new-kimono-hairset-v2-sp-style', get_template_directory_uri() . '/css/new-kimono-hairset-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-hairset-v2-sp-style');
}
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
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
    }
    ?>
    <?php if(get_field('title_h1')): ?>
            <h1 class="title-name-corporation">
                <?php the_field('title_h1'); ?>
            </h1>
    <?php endif; ?>
    <?php if($isSmartPhone) : ?>
        <?php
        $main_banner_sp = get_field('main_banner_sp');
        if ($main_banner_sp) {
            echo do_shortcode(php_set_base_url($main_banner_sp));
        }
        ?>
    <?php else: ?>
        <?php
        $main_banner_pc = get_field('main_banner_pc');
        if ($main_banner_pc) {
            echo do_shortcode(php_set_base_url($main_banner_pc));
        }
        ?>
    <?php endif; ?>

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
                                if($isSmartPhone){
                                    echo FormalSidebarLeftCodeNewStyle(array());
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
                            <div class="right-column right-column-list right-column-list-new-kimono right-kimono-hairset-v2">
                                <div class="wrap-new-hairset-v2">
                                    <div class="wrap-content-hairset-v2">
                                        <?php
                                        $des_bottom_banner = get_field('des_bottom_banner');
                                        if ($des_bottom_banner) {
                                            echo do_shortcode(php_set_base_url($des_bottom_banner));
                                        }
                                        ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $content_dummy_sp = get_field('content_dummy_sp');
                                            if ($content_dummy_sp) {
                                                echo do_shortcode(php_set_base_url($content_dummy_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $content_dummy_pc = get_field('content_dummy_pc');
                                            if ($content_dummy_pc) {
                                                echo do_shortcode(php_set_base_url($content_dummy_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $content_hairset_plan_sp = get_field('content_hairset_plan_sp');
                                            if ($content_hairset_plan_sp) {
                                                echo do_shortcode(php_set_base_url($content_hairset_plan_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $content_hairset_plan_pc = get_field('content_hairset_plan_pc');
                                            if ($content_hairset_plan_pc) {
                                                echo do_shortcode(php_set_base_url($content_hairset_plan_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $list_plan_hairset_sp = get_field('list_plan_hairset_sp');
                                            if ($list_plan_hairset_sp) {
                                                echo do_shortcode(php_set_base_url($list_plan_hairset_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $list_plan_hairset_pc = get_field('list_plan_hairset_pc');
                                            if ($list_plan_hairset_pc) {
                                                echo do_shortcode(php_set_base_url($list_plan_hairset_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $hairset_list_sp = get_field('hairset_list_sp');
                                            if ($hairset_list_sp) {
                                                echo do_shortcode(php_set_base_url($hairset_list_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $hairset_list_pc = get_field('hairset_list_pc');
                                            if ($hairset_list_pc) {
                                                echo do_shortcode(php_set_base_url($hairset_list_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $hairset_halle_day_sp = get_field('hairset_halle_day_sp');
                                            if ($hairset_halle_day_sp) {
                                                echo do_shortcode(php_set_base_url($hairset_halle_day_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $hairset_halle_day_pc = get_field('hairset_halle_day_pc');
                                            if ($hairset_halle_day_pc) {
                                                echo do_shortcode(php_set_base_url($hairset_halle_day_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $slider_product_list_sp = get_field('slider_product_list_sp');
                                            if ($slider_product_list_sp) {
                                                echo do_shortcode(php_set_base_url($slider_product_list_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $slider_product_list_pc = get_field('slider_product_list_pc');
                                            if ($slider_product_list_pc) {
                                                echo do_shortcode(php_set_base_url($slider_product_list_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $content_the_ichi_sp = get_field('content_the_ichi_sp');
                                            if ($content_the_ichi_sp) {
                                                echo do_shortcode(php_set_base_url($content_the_ichi_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $content_the_ichi_pc = get_field('content_the_ichi_pc');
                                            if ($content_the_ichi_pc) {
                                                echo do_shortcode(php_set_base_url($content_the_ichi_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $hairset_halle_day_sp_02 = get_field('hairset_halle_day_sp_02');
                                            if ($hairset_halle_day_sp_02) {
                                                echo do_shortcode(php_set_base_url($hairset_halle_day_sp_02));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $hairset_halle_day_pc_02 = get_field('hairset_halle_day_pc_02');
                                            if ($hairset_halle_day_pc_02) {
                                                echo do_shortcode(php_set_base_url($hairset_halle_day_pc_02));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $content_bags_option_sp = get_field('content_bags_option_sp');
                                            if ($content_bags_option_sp) {
                                                echo do_shortcode(php_set_base_url($content_bags_option_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $content_bags_option_pc = get_field('content_bags_option_pc');
                                            if ($content_bags_option_pc) {
                                                echo do_shortcode(php_set_base_url($content_bags_option_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $plan_group_kimono_sp = get_field('plan_group_kimono_sp');
                                            if ($plan_group_kimono_sp) {
                                                echo do_shortcode(php_set_base_url($plan_group_kimono_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $plan_group_kimono_pc = get_field('plan_group_kimono_pc');
                                            if ($plan_group_kimono_pc) {
                                                echo do_shortcode(php_set_base_url($plan_group_kimono_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $content_pp_sp = get_field('content_pp_sp');
                                            if ($content_pp_sp) {
                                                echo do_shortcode(php_set_base_url($content_pp_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $content_pp_pc = get_field('content_pp_pc');
                                            if ($content_pp_pc) {
                                                echo do_shortcode(php_set_base_url($content_pp_pc));
                                            }
                                            ?>
                                        <?php endif; ?>
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-single"></div>
                                        </div>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $hairset_halle_day_sp_03 = get_field('hairset_halle_day_sp_03');
                                            if ($hairset_halle_day_sp_03) {
                                                echo do_shortcode(php_set_base_url($hairset_halle_day_sp_03));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $hairset_halle_day_pc_03 = get_field('hairset_halle_day_pc_03');
                                            if ($hairset_halle_day_pc_03) {
                                                echo do_shortcode(php_set_base_url($hairset_halle_day_pc_03));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $slider_product_list_sp_02 = get_field('slider_product_list_sp_02');
                                            if ($slider_product_list_sp_02) {
                                                echo do_shortcode(php_set_base_url($slider_product_list_sp_02));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $slider_product_list_pc_02 = get_field('slider_product_list_pc_02');
                                            if ($slider_product_list_pc_02) {
                                                echo do_shortcode(php_set_base_url($slider_product_list_pc_02));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <div class="wrap-knowledge wrap-knowledge-hairset">
                                            <div class="wrap-title-v2 flexbox">
                                                <span class="icon-circle">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                                </span>
                                                 <div class="wrap-text-title">
                                                     <h2 class="lbl-title">ヘアスタイルについての基礎知識</h2>
                                                </div>
                                            </div>
                                            <div class="des-knowledge">
                                                <p>お着物自体、TPOに併せた知識が必要だと難しく考えていませんか？</p>
                                                <p>必要な知識はプロに任せて、着られるご本人は楽しんで着物を着ることが一番！</p>
                                                <p>着物に合わせたヘアスタイルももちろんお任せください！</p>
                                                <p>あなたの気分がアップする、素敵なヘアスタイルをご提案いたします。</p>
                                            </div>
                                            <div class="wrap-topics-knowledge">
                                                <?php echo do_shortcode('[list_product_formal_from_column category=hairdressing]'); ?>
                                            </div><!--end wrap-topics-knowledge-->
                                            <div class="text-bottom-knowledge">
                                                <p>着物に関するコラムが充実！</p>
                                            </div>
                                            <div class="wrap-btn-v2 wrap-btn-v2-hairset flexbox">
                                                <div class="btn-v2 btn-non-link">
                                                    <a href="<?= home_url(); ?>/column/hair-style">
                                                        <div class="text">
                                                            <span class="text-link">その他のコラムを見る</span>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div>
                                        </div><!-- End wrap knowledge -->

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $introduce_company_sp = get_field('introduce_company_sp');
                                            if ($introduce_company_sp) {
                                                echo do_shortcode(php_set_base_url($introduce_company_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $introduce_company_pc = get_field('introduce_company_pc');
                                            if ($introduce_company_pc) {
                                                echo do_shortcode(php_set_base_url($introduce_company_pc));
                                            }
                                            ?>
                                        <?php endif; ?>

                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $list_shop_access_sp = get_field('list_shop_access_sp');
                                            if ($list_shop_access_sp) {
                                                echo do_shortcode(php_set_base_url($list_shop_access_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $list_shop_access_pc = get_field('list_shop_access_pc');
                                            if ($list_shop_access_pc) {
                                                echo do_shortcode(php_set_base_url($list_shop_access_pc));
                                            }
                                            ?>
                                        <?php endif; ?>
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
<style>
    *{
        min-height: 0;
        min-width: 0;
    }
</style>
<script>
    $(document).ready(function(){
        //Show more plan
        $('.plan-img').click(function(){
            var detail = $(this).next();
            detail.addClass('open');
        });

        $('.show-less').click(function(){
            $(this).closest('.plan-info').removeClass('open');
        });

        //Replace thumnail img
        $(".wrap-overlay-popup-hairset .hairset-item .thumn-img ul li").click(function(){
            $(this).parents('.hairset-item').find('.main-image img').attr('src',$(this).find('img').attr('data-src'));
            $(this).addClass('active').siblings().removeClass('active');
        });
        $(".wrap-overlay-popup-hairset .hairset-item .thumn-img ul li:first-child").trigger('click');
        //end Replace thumnail img

        //Popup Open
        /*$('.wrap-banner-pattern-halle').click(function(event){
            event.preventDefault();
            var $li = $(this).closest('li.items-pattern-halle');
            if ($li.length && $li.find('.wrap-overlay-popup-hairset').length) {
                $li.find('.wrap-overlay-popup-hairset').fadeIn('fast');
                $('html').addClass('modal-open');
                $('body').append('<div class="modal-backdrop show"></div>');
            }
        });
        //Popup close
        $('.closed-popup-hairset').click(function(event){
            event.preventDefault();
            $(this).closest('.wrap-overlay-popup-hairset').fadeOut('fast');
            $('html').removeClass('modal-open');
            $('body .modal-backdrop').remove();
        });
        $('.wrap-overlay-popup-hairset').click(function(event){
            event.preventDefault();
            if(!$(event.target).closest('.wrap-popup-hairset').length){
                $(this).fadeOut('fast');
                $('html').removeClass('modal-open');
                $('body .modal-backdrop').remove();
            }
        });/*

        /*==slider product==*/
        if ($('.slider-ranking').length > 0) {
            $('.slider-ranking .list').not('.slick-initialized').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows: true,
                    }
                }]
            });
        }

        /* Show formal popup - start */
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

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
        /* Show formal popup - end */

        /*==slider product==*/
        if ($('.slider-ranking').length > 0) {
            $('.slider-ranking .list').not('.slick-initialized').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }]
            });
        }

    })

</script>

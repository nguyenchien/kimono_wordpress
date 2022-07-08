<?php
/**
 * Template Name: New Formal Product List
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
wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js');
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

$formalPlanSlugs = array(
    'homongi',
    'kurotomesode',
    'irotomesode',
    'furisode',
    'hakama',
    'shichigosan'
);
?>
    <?php if($isSmartPhone):?>
    <div class="toggle-filter-list-sidebar">
        <div class="box-filter-list-sidebar flexbox">
            <div class="close-sidebar sp">
                <span class="closed-filter">
                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-check-ok.svg" alt="">
                </span>
            </div>
            <div class="toggle-filter-sidebar sp">
                <?php echo do_shortcode('[FormalSidebarFilter]'); ?>
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
            <?php if (!empty($postName) && in_array($postName, $formalPlanSlugs)): ?>
                <div class="banner-top-highend-v2">
                    <div class="container-box">
                        <?php
                            echo swe_wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array('alt' => strip_tags(get_the_title())));
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php
//                                        if($postName == 'list'){
//                                            if(!$isSmartPhone)
//                                                echo do_shortcode('[FormalSidebarFilter]');
//                                        }else{
//                                            echo do_shortcode('[FormalSidebarLeft]');
//                                        }

                                        if($isSmartPhone){
                                            echo FormalSidebarLeftCode(array());
                                        }else{
                                            if($parent_slug_name == 'formal' && $postName != 'list'){
                                                echo FormalSidebarLeftCode(array('type'=>'planlist'));
                                                echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                            }else if($postName == 'list'){
                                                echo FormalSidebarFilterCode(array());
                                            }else{
                                                echo FormalSidebarLeftCode(array());
                                            }
                                        }
                                    ?>
                                </div>

                                <div class="right-column right-column-list">
<!--                                    <div class="wrap-dropdown-booking list">-->
<!--                                        <div class="dropdown-booking-toggle flexbox align-items-center">-->
<!--                                            <span class="icon icon-formal-checked"></span>-->
<!--                                            <span class="text-booking-toggle">予約状況を見る</span>-->
<!--                                            <span class="toggle-icon-arrow"></span>-->
<!--                                        </div>-->
<!--                                        <section class="block-viewbooking-top-page">-->
<!--                                            <div class="box-calendar">--><?php //echo do_shortcode(' [ReserveStatus shop_ids="16,6,7,8,9"] '); ?><!--</div>-->
<!--                                        </section>-->
<!--                                    </div><!--end wrap-dropdown-booking-->
                                    <div class="wrap-banner-topics">
                                        <div class="title-general title-list text-center flexbox margin-bt10">
                                            <span class="icon-title-general icon icon-formal-search"></span>
                                            <h1 class="sub-title-list">
                                                <?php if($parent_slug_name == "color"): ?>
                                                    <span class="text-title-general"><?= the_title() ?></span>
                                                <?php elseif($postName == "list"): ?>
                                                     <span class="text-title-general">レンタル着物 検索結果一覧</span>
                                                <?php else: ?>
                                                    <span class="text-title-general"><?= the_title() ?></span>
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

        $(".icon-toggle-filter-sidebar").on('click', function () {
            $(".toggle-filter-list-sidebar").addClass("active");
            $("body").addClass("fixed-scroll");
        });
        $(".close-sidebar .closed-filter").on("click", function(){
            $(".toggle-filter-list-sidebar").removeClass("active");
            $("body").removeClass("fixed-scroll");
        });

        var calendarWidth = $(window).width();
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').width(calendarWidth - 10);

        var calendarLeftPos = $('.item-nav-top-search').width() - 3;
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').css('left', "-" + calendarLeftPos + 'px');

        <?php endif?>
    })
</script>

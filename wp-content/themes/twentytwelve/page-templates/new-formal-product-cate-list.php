<?php
/**
 * Template Name: New Formal Product Cate List
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

wp_register_style('new-formal-cate-list-style', get_template_directory_uri() . '/css/new-formal-cate-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-cate-list-style');

if($language !="ja"){
    wp_register_style('style-customer-review'.$cssLanguage.'', get_template_directory_uri() . '/css/customer-review'.$cssLanguage.'.css' , array('twentytwelve-style'));
    wp_enqueue_style('style-customer-review'.$cssLanguage);
}
if($language == "ja"){
    wp_register_style('kimono-letter-spacing-style', get_template_directory_uri() . '/css/kimono-letter-spacing-ja.css', array('twentytwelve-style'));
    wp_enqueue_style('kimono-letter-spacing-style');
}
get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;

//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
?>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
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
              <?php if(in_array($post->post_name, array("furisode","hakama","homongi","irotomesode","shichigosan","ubugi"))) : ?>
              <div class="main-baner-fm">
                <h1 style="font-size:12px;padding:10px 5px;">
                                                      <?php echo !empty(get_field('page_h1')) ? get_field('page_h1') : ""; ?>
                                                  </h1>
                  <div>
                      <?php if($isSmartPhone):?>
                        <img alt="<?= get_the_title();?>" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2019/02/new_banner_<?= $post->post_name; ?>_sp.jpg">
                      <?php else:?>
                        <?php if ($post->post_name == 'ubugi') : ?>
                          <img alt="<?= get_the_title();?>" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2018/04/new_banner_<?= $post->post_name; ?>.jpg">
                        <?php elseif ($post->post_name == 'irotomesode') : ?>
                          <img alt="<?= get_the_title();?>" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2018/01/new_banner_<?= $post->post_name; ?>.png">
                        <?php else : ?>
                          <img alt="<?= get_the_title();?>" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2018/01/new_banner_<?= $post->post_name; ?>.jpg">
                        <?php endif; ?>
                      <?php endif;?>
                  </div>
              </div>
              <?php endif; ?>
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
                                // new add shortcode style will hide shortcode handle so we need extract
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

                            <div class="right-column right-column-list right-cate-list">
                                <?php if (!empty($postName)): ?>
                                    <div class="banner-top-highend-v2">
                                        <div class="container-box">
                                            <?php
                                            //echo swe_wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array('alt' => the_title()));
                                            ?>
                                            <div class="wrap-main-banner-fm">
                                              <?php if(!in_array($post->post_name, array("furisode","hakama","homongi","irotomesode","shichigosan","ubugi"))) : ?>
                                                <div class="main-baner-fm">
                                                    <div>
                                                        <?php if($isSmartPhone) : ?>
                                                            <img alt="<?= get_the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/main-banner-fm-sp-<?= $post->post_name; ?>.jpg">
                                                        <?php else: ?>
                                                            <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/formal-rental/main-banner-fm-<?= $post->post_name; ?>.jpg">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                              <?php endif; ?>
                                                <ul class="sub-banner-fm flexbox">
                                                    <li><a href="#box-access"><img src="<?= WP_HOME; ?>/images/formal-rental/sub-banner-1-fm-<?= $post->post_name; ?>.jpg" alt="<?=Yii::t('new-formal', '???????????????????????????????????????');?>"></a></li>
                                                    <li><a href="#box-howto"><img src="<?= WP_HOME; ?>/images/formal-rental/sub-banner-2-fm-<?= $post->post_name; ?>.jpg" alt="<?=Yii::t('new-formal', '???????????????????????????');?>"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php //the_excerpt() ?>
                                <?php if (is_page('furisode')){?>
                                   <div class="wrap-banner-furisode">
                                       <a href="<?= WP_HOME ?>/formal/furisode/furisodemaedori"><img src="<?= WP_HOME ?>/images/formal-rental/access/banner-furisode.png" alt=""></a>
                                   </div>
                                <?php } ?>

                                <div class="wrap-list-cate-wg">
                                    <h2 class="title-general title-general-catelist text-center title-general-icon">
                                        <span class="icon-title-general icon icon-formal-search"></span>
                                        <span class="text-title-general"><?= Yii::t('new-formal', $post->post_name); ?>?????????????????????</span>
                                    </h2>
                                    <?php
                                        $category_scene_child = array(
                                            'homongi' => array(
                                                'kekkonshiki_hiroen',
                                                'omiyamairi_shichigosan',
                                                'nyugakushiki_sotsugyoshiki',
                                                'osakai_pati'
                                            ),
                                            'furisode' => array(
                                                'kekkonshiki_yuino',
                                                'seijin_shiki',
                                                'retoro_gara_furisode',
                                                'modan_gara_furisode'
                                            ),
                                            'hakama' => array(
                                                'sotsugyoshiki_hakama_shogakusei',
                                                'seijin_shiki_hakama_dansei',
                                                'sotsugyoshiki_hakama_daigakusei',
                                                //'otegoro_hakama_retoro_hakama'
                                            ),
                                            'ubugi' => array(
                                                'otokonoko_yo_ubugi',
                                                'onnanoko_yo_ubugi',
                                                'okasama_no_o_kimono',
                                                //'kinen_shashin_shashin_satsuei'
                                            ),
                                            'irotomesode' => array(
                                                'kuro_tomesode',
                                                'iro_tomesode'
                                            ),
                                            'shichigosan' => array(
                                                'girl',
                                                'shichigosan5years'
                                            )
                                        )
                                    ?>
                                    <ul class="list-cate-wg list-cate-wg-<?php echo $post->post_name;?> flexbox">
                                        <?php foreach ($category_scene_child as $name => $items) : ?>
                                            <?php if ($post->post_name == $name) : ?>
                                                <?php foreach ($items as $key => $item) : ?>
                                                    <li class="item"><a href="<?= $name; ?>/<?= $item; ?>"><img src="<?= WP_HOME; ?>/images/formal-rental/banner-cate-wg-<?= $key+1; ?>-<?= $name; ?>.jpg" alt="<?= Yii::t('new-formal-cate-scene', 'category-scene-child-'.$item); ?>"></a></li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div><!--end wrap-list-cate-wg-->

                                <?php
                                    $bannerLowPrice = get_field('banner_low_price');
                                    if ( $bannerLowPrice ) {
                                        echo php_set_base_url($bannerLowPrice);
                                    }
                                ?>

                                <?php if (!empty($postName)): ?>
                                    <div class="wrap-btn-detail">
                                        <a href="<?=$postName?>/list"><?=Yii::t('wp_theme','View list page of ' . $postName);?></a>
                                    </div>
                                <?php endif; ?>


                                <?php if ($post->post_name != 'shichigosan') : ?>
                                <div class="wrap-price-table">
                                    <h2 class="title-general title-general-catelist text-center title-general-icon">
                                        <span class="icon-title-general icon icon-formal-search"></span>
                                        <span class="text-title-general"><?= Yii::t('new-formal', $post->post_name); ?>???????????????</span>
                                    </h2>
                                    <?php if($isSmartPhone) : ?>
                                        <?php if(get_field('price_table_sp')): ?>
                                            <div class="box-price-table box-price-table-sp">
                                                <?php the_field('price_table_sp'); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(get_field('price_table_pc')): ?>
                                            <div class="box-price-table box-price-table-pc">
                                                <?php the_field('price_table_pc'); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <?php endif ?>

                                <div class="wrap-banner-topics wrap-banner-topics-cate-list">
                                    <div class="title-general title-list text-center flexbox margin-bt10">
                                        <span class="icon-title-general icon icon-formal-search"></span>
                                        <div class="sub-title-list">
                                            <?php if($parent_slug_name == "color"): ?>
                                                <span class="text-title-general"><?= the_title() ?></span>
                                            <?php elseif($postName == "list"): ?>
                                                <span class="text-title-general">?????????????????? ??????????????????</span>
                                            <?php else: ?>
                                                <span class="text-title-general"><?=Yii::t('wp_theme', 'Formal Category Top Title - ' . $postName);?></span>
                                            <?php endif; ?>
                                        </div>
                                        <span class="icon-toggle-filter-sidebar icon-formal-filter-filled sp"></span>
                                    </div>
                                    <div class="wrap-list-formal-product">
                                        <div class="row">
                                            <?php
//                                            while (have_posts()) : the_post();
//                                                the_content();
//                                            endwhile;
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                        $list_product_1 = get_field('list_product_1');
                                        $list_product_2 = get_field('list_product_2');
                                        $list_product_3 = get_field('list_product_3');
                                    ?>
                                    <?php if ($list_product_1) : ?>
                                        <div class="wrap-list-formal-product">
                                            <?php echo do_shortcode(php_set_base_url($list_product_1)); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($list_product_2) : ?>
                                        <div class="wrap-list-formal-product">
                                            <?php echo do_shortcode(php_set_base_url($list_product_2)); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($list_product_3) : ?>
                                        <div class="wrap-list-formal-product">
                                            <?php echo do_shortcode(php_set_base_url($list_product_3)); ?>
                                        </div>
                                    <?php endif; ?>

                                    </div><!--end wrap-list-product-->

                                    <div id="box-access" class="box-new-pro-list">
                                        <?php include('list-shop-formal.php');?>

                                        <div class="wrap-list-product-from-column">
                                            <h2 class="title-general title-general-catelist text-center title-general-icon">
                                                <span class="icon-title-general icon icon-formal-search"></span>
                                                <span class="text-title-general"><?= Yii::t('new-formal', $post->post_name); ?>???????????????????????????</span>
                                            </h2>
                                            <?php echo do_shortcode('[list_product_formal_from_column value='.$postName.']'); ?>
                                            <div class="link-to-list">
                                                <div class="wrap-btn-detail">
                                                    <?php if ( !empty($postName) && $postName == 'irotomesode' ) : ?>
                                                        <a href="<?= home_url(); ?>/column/tomesode">??????????????????????????????</a>
                                                    <?php else: ?>
                                                        <a href="<?= home_url(); ?>/column/<?= $postName; ?>">??????????????????????????????</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <?php echo do_shortcode('[customer_review_content_formal]'); ?>
                                        <?php
                                        $slugNameRemark = array(
                                            'hakama' => '-sotsugyou',
                                            'furisode' => '-seijin',
                                            'homongi' => '-homongi',
                                            'ubugi' => '',
                                            'shichigosanscene' => '-shichigosan'
                                        )
                                        ?>
                                        <?php if($postName == 'irotomesode') :?>
                                        <div class="link-to-list">
                                            <div class="wrap-btn-detail">
                                                <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-kurotomesode">????????????????????????????????????????????????</a>
                                            </div>
                                        </div>
                                        <div class="link-to-list">
                                            <div class="wrap-btn-detail">
                                                <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-irotomesode">????????????????????????????????????????????????</a>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="link-to-list">
                                            <div class="wrap-btn-detail">
                                                <?php if($postName == 'ubugi') :?>
                                                    <a href="<?= home_url(); ?>/customer-remark<?= $slugNameRemark[$postName]; ?>"><?= Yii::t('new-formal', $post->post_name); ?>???????????????????????????????????????</a>
                                                <?php else: ?>
                                                    <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark<?= $slugNameRemark[$postName]; ?>"><?= Yii::t('new-formal', $post->post_name); ?>???????????????????????????????????????</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div><!--end box-new-pro-list-->

                                    <div id="box-howto" class="wrap-rental-step">
                                        <h2 class="title-general text-center title-general-icon">
                                            <span class="icon-title-general icon icon-formal-search"></span>
                                            <span class="text-title-general"><?= Yii::t('new-formal', $post->post_name); ?> ???????????????????????????</span>
                                        </h2>
                                        <div class="step-content">
                                            <div class="step-content-img">
                                                <?php if($isSmartPhone) : ?>
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/rental-step-img-sp.jpg" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/rental-step-img-pc.jpg" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <?php if($isSmartPhone) : ?>
                                                <div class="step-text">
                                                    <p>????????????????????????wargo???????????????????????????????????????????????????</p>
                                                    <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                    <p>???????????????????????????????????????????????????????????????????????????????????????</p>
                                                    <p>????????????????????????????????????????????????????????????????????????????????????</p>
                                                    <p>??????2??????????????????????????????????????????????????????????????????????????????</p>
                                                    <p>??????????????????????????????????????????????????????</p>
                                                </div>
                                            <?php else: ?>
                                                <div class="step-text">
                                                    <p>
                                                        ????????????????????????wargo????????????????????????
                                                        ??????????????????????????????????????????????????????
                                                        ?????????????????????????????????????????????????????????
                                                        ?????????????????????????????????????????????????????????
                                                        ?????????????????????????????????????????????????????????
                                                        ?????????????????????????????????????????????????????????
                                                        ?????????2??????????????????????????????????????????
                                                        ?????????????????????????????????????????????????????????
                                                        ?????????????????????????????????
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($postName != 'shichigosan') { ?>
                                        <div class="set-content">
                                            <h3 class="set-title">
                                                <span class="icon"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg" alt=""></span>
                                                <span class="text">???????????????</span>
                                            </h3>
                                            <div class="wrap-content">
                                                <div class="left-content">
                                                    <p class="info">
                                                        ?????????????????????????????????????????????<br class="sp">?????????<br class="pc">
                                                        ???????????????????????????????????????????????????<br class="pc">???????????????????????????????????????<br class="sp">????????????????????????
                                                    </p>
                                                    <div class="set-img">
                                                        <img src="<?php echo WP_HOME; ?>/images/formal-rental/set-<?php echo $post->post_name;?>.svg?v=20190307" alt="">
                                                    </div>
                                                </div>
                                                <div class="right-content">
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/rental-step-<?php echo $post->post_name;?>.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <?php } else { ?>
                                            <div class="set-content">
                                                <h3 class="set-title">
                                                    <span class="icon"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg" alt=""></span>
                                                    <span class="text">???????????????</span>
                                                </h3>
                                                <div class="wrap-content">
                                                    <div class="step-text">
                                                        <p class="description">??????????????????????????????????????????????????????<br>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                                                    </div>
                                                    <div class="set-image">
                                                        <img src="<?php echo WP_HOME; ?>/images/formal-rental/rental-step-<?php echo $post->post_name;?>.jpg" alt="">
                                                    </div>
                                                    <div class="set-option">
                                                        <img src="<?php echo WP_HOME; ?>/images/formal-rental/set-<?php echo $post->post_name;?>.svg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="wrap-rental-payment">
                                        <h2 class="title-general text-center title-general-icon">
                                            <span class="text-title-general">???????????????????????????</span>
                                        </h2>
                                        <div class="rental-payment-container">
                                            <div>
                                                <h4 class="payment-name">Web????????????</h4>
                                                <p>????????????????????????wargo????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br>???????????????????????????????????????????????????????????????</p>
                                            </div>
                                            <div>
                                                <h4 class="payment-name">?????????????????????</h4>
                                                <p>????????????????????????wargo ??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br><a href="/formal/preview">?????????30??????????????????????????????????????????</a>???????????????????????????????????????????????????????????????????????????????????????????????????????????? ???????????????????????????????????????????????????????????????????????????????????????</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-rental-calendar">
                                        <h2 class="title-general text-center">
                                            <span class="text-title-general">???????????????</span>
                                        </h2>
                                        <div class="rental-calendar-container">
                                            <p>??????????????????3???4????????????????????????2????????????????????????????????????</p>
                                            <table class="payment-calendar">
                                                <tr>
                                                    <th>5/8</th>
                                                    <th>5/9</th>
                                                    <th>5/10</th>
                                                    <th>5/11</th>
                                                </tr>
                                                <tr>
                                                    <td>??????????????????</td>
                                                    <td></td>
                                                    <td>????????????</td>
                                                    <td>????????????</td>
                                                </tr>
                                            </table>
                                            <div>
                                                <h4 class="calendar-title"> ??????????????????</h4>
                                                <p>???????????????5???10????????????</p>
                                            </div>
                                            <div>
                                                <h4 class="calendar-title">?????????????????????</h4>
                                                <p>????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????1????????????1,000??????????????????????????????</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-btn-detail">
                                        <a href="/takuhai/howto">??????????????????????????????????????????????????????</a>
                                    </div>
                                    <?php if($post->post_name == 'ubugi') : ?>
                                        <div class="bt-banner-shop bt-banner-shop-<?php echo $post->post_name;?>">
                                            <a href="/formal/homongi">
                                                <?php if($isSmartPhone) : ?>
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/banner-bottom-shop-ubugi-sp.jpg" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/banner-bottom-shop-ubugi.jpg" alt="">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(get_field('intro_top')): ?>
                                        <div class="wrap-into-plan">
                                            <?php the_field('intro_top'); ?>
                                        </div>
                                    <?php endif; ?>
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

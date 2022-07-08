<?php
/**
 * Template Name: Kimono VIP List
 */
global $post, $is_yukata, $language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}

get_header('new-kimono');
if ($isSmartPhone) {
    wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-rental-style-slick');
    wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-rental-style-slick-theme');
    wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
}
wp_enqueue_script('google-map', get_template_directory_uri() . '/js/google-map.js');
wp_register_style('new-kimono-plan-list-style', get_template_directory_uri() . '/css/new-kimono-plan-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-plan-list-style');
wp_register_style('new-kimono-vip-list-style', get_template_directory_uri() . '/css/new-kimono-vip-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-vip-list-style');
wp_register_style('new-formal-popup', get_template_directory_uri() . '/css/new-formal-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-popup');
wp_register_style('new-kimono-popup', get_template_directory_uri() . '/css/new-kimono-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-popup');
wp_register_style('new-formal-product-cart', get_template_directory_uri() . '/css/new-formal-product-cart.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-cart');
wp_register_style('new-kimono-reserve-cart', get_template_directory_uri() . '/css/new-kimono-reserve-cart.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-reserve-cart');
wp_enqueue_script('new-formal-product-booking-script', get_template_directory_uri() . '/js/new-formal-product-booking.js');
wp_register_script('qtip-js', WP_HOME . '/js/qtip2/jquery.qtip.js');
wp_enqueue_script('qtip-js');
wp_register_style('qtip-css', WP_HOME . '/css/qtip2/jquery.qtip.css', array('twentytwelve-style'));
wp_enqueue_style('qtip-css');
wp_register_style('option-hotel-vip', get_template_directory_uri() . '/css/option-hotel-vip.css', array('twentytwelve-style'));
wp_enqueue_style('option-hotel-vip');

if($language != "ja"){
    wp_register_style('new-kimono-plan-list-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-plan-list'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-plan-list-style'.$cssLanguage);
    wp_register_style('new-kimono-vip-list-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-vip-list'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-vip-list-style'.$cssLanguage);
    wp_register_style('new-kimono-popup'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-popup'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-popup'.$cssLanguage);
    wp_register_style('new-kimono-reserve-cart'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-reserve-cart'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-reserve-cart'.$cssLanguage);
}

/* Get meta Plans from database - start */
$modelMetaPlans = PlanType::getMetaPlans();
$groupedMetaPlans = array();
$YUKATA_GROUP_MERGE = MasterValues::$YUKATA_GROUP_MERGE;
$KIMONO_GROUP_MERGE = MasterValues::$KIMONO_GROUP_MERGE;
foreach ($modelMetaPlans as $metaPlan) {
    //remove
    if($metaPlan->plan_type_id == MasterValues::PLAN_PETIT_LADIES_ASSOCIATION_KIMONO_ID || $metaPlan->plan_type_id == MasterValues::PLAN_NEW_PETIT_LADIES_ASSOCIATION_KIMONO_ID){
        continue;
    }
    //Soften plan price via pattern
    PricePattern::planPriceViaPattern('A', $metaPlan);

    //prepare plan price for couple
    $metaPlan->preparePriceForCouple();

    // if plan exist in merge meta
    if( array_key_exists($metaPlan->plan_type_id, $YUKATA_GROUP_MERGE) || array_key_exists($metaPlan->plan_type_id, $KIMONO_GROUP_MERGE) ){
        $mergintoId = array_key_exists($metaPlan->plan_type_id, $YUKATA_GROUP_MERGE) ? $YUKATA_GROUP_MERGE[$metaPlan->plan_type_id] : $KIMONO_GROUP_MERGE[$metaPlan->plan_type_id];
        // check if merged id had add into groupedMeta
        if(isset($groupedMetaPlans[$metaPlan->for_group][$mergintoId])){
            // append groupMergeIds
            $groupedMetaPlans[$metaPlan->for_group][$mergintoId]->groupMergeIds[$metaPlan->plan_type_id] = $metaPlan;
        }else {
            $metaPlan->groupMergeIds[$metaPlan->plan_type_id] = $metaPlan;
            $metaPlan->plan_type_id = $mergintoId;
            $groupedMetaPlans[$metaPlan->for_group][$mergintoId] = $metaPlan;
        }
    }else{
        $groupedMetaPlans[$metaPlan->for_group][$metaPlan->plan_type_id] = $metaPlan;
    }
}

//var_dump($groupedMetaPlans[MasterValues::MV_GROUP_KIMONO]);
/* Get meta Plans from database - end */

$SEX_AGE_TYPE = array(
    'women' => 1, // Women's kimono
    'men' => 2, // Men's kimono
    'kids' => 3, // Kids kimono
    'couple' => 4 // Couple kimono
);
$SHOP_FILTER = MasterValues::normalShopList();
$planShopList = MasterValues::planShopList();
$planTypeKimonoMap = array(
    'all-kimono-plan' => '全てのスラン',
    'standard-kimono' => 'スタンダード着物',
    'premium-kimono' => 'プレミアム着物',
    'mamechiyo-kimono' => '豆千代モダン着物',
    'men-kimono' => 'メンズ着物',
    'high-end-kimono' => 'ハイエンド着物',
    'furisode-hanhaba' => '振袖お散歩半幅帯',
    'furisode-fukuro' => '振袖お散歩袋帯',
    'antique-kimono' => 'アンティーク着物',
    'kimono-girl' => '子供着物',
    'couple-standard-kimono' => 'カップル着物',
);

?>
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
                            <div class="right-column right-column-list right-column-list-new-kimono">

                                <div class="wrap-new-plan-list wrap-new-vip-list">
                                    <?php while (have_posts()) : the_post(); ?>
                                        <div class="wrap-banner-top-vip">
                                            <div class="box-banner-top-vip">
                                                <img class="vip-image-banner pc" src="<?php echo WP_HOME . '/images/VIPbanner_PC-min-' . $language . '.png'; ?>" alt="<?= Yii::t('kimono-vip-list','最高級のおもてなし VIP着物レンタルプラン') ?>"/>
                                                <img class="vip-image-banner sp" src="<?php echo WP_HOME . '/images/VIPbanner_mobile-min-' . $language . '.png'; ?>" alt="<?= Yii::t('kimono-vip-list','最高級のおもてなし VIP着物レンタルプラン') ?>"/>
                                            </div>
                                            <div class="section-des-banner-vip">
                                                <div class="row">
                                                    <h1 class="title-banner-vip"><?php the_title(); ?></h1>
                                                    <div class="des-banner-vip"><?php the_excerpt(); ?></div>
                                                </div>
                                            </div>
                                        </div><!-- end wrap-banner-top-vip-->

                                        <div class="wrap-option-vip-list">
                                            <?php the_content(); ?>
                                        </div>

                                        <?php
//                                        if (is_page(array('kimono','plan'))) :
                                            getTemplatePart('temp-small/kimono-list-vip-template', null, array('groupedMetaKimonoPlans' => $groupedMetaPlans[MasterValues::MV_GROUP_KIMONO], 'sexAgeType' => $SEX_AGE_TYPE, 'planShopList'=>$planShopList, 'planTypeKimonoMap'=>$planTypeKimonoMap));
//                                        endif;
                                        ?>

                                        <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
                                        <div class="wrap-banner-bt-pl">
                                            <ul class="list-banner-bt-pl flexbox">
                                                <?php if($language == 'ja'): ?>
<!--                                                    <li class="item-banner-bt-pl"> <a href="--><?//= home_url(); ?><!--/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01.png" alt="--><?//= Yii::t('kimono-vip-list','女子会割引・学割ありのプチ着物レンタルプラン') ?><!--"></a></li>-->
                                                    <li class="item-banner-bt-pl"> <a href="<?= home_url(); ?>/kimono#Standard-Kimono"><img style="width: 100%;" src="<?= WP_HOME; ?>/images/new-kimono/banner-1.png" alt="スタンダード着物レンタルプラン" ></a> </li>
                                                    <li class="item-banner-bt-pl"> <a href="<?= home_url(); ?>/kimono#Men-Kimono"><img style="width: 100%;" src="<?= WP_HOME; ?>/images/new-kimono/banner-5.png" alt="男性用・メンズ着物レンタルプラン" ></a> </li>
                                                    <li class="item-banner-bt-pl"> <a href="<?= home_url(); ?>/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03.png" alt="<?= Yii::t('kimono-vip-list','フォーマル・冠婚葬祭用 着物レンタルプラン') ?>"></a></li>
                                                <?php else: ?>
<!--                                                    <li class="item-banner-bt-pl"> <a href="--><?//= home_url(); ?><!--/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01---><?//= $language; ?><!--.png" alt=""></a></li>-->
                                                    <li class="item-banner-bt-pl"> <a href="<?= home_url(); ?>/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03-<?= $language; ?>.png" alt=""></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="intro-top-general intro-top-general-vip pc">
                                            <h3 class="title-intro-top"><?php echo Yii::t('new-kimono-pl-vip', 'キモノで観光 きものレンタルwargoVIPプランのご紹介') ?></h3>
                                            <div class="content-intro-top">
                                                <p class="intro-text"><?php echo Yii::t('new-kimono-pl-vip', 'content-intro-top-vip'); ?></p>
                                            </div>
                                        </div>
                                        <div class="entry-meta sixteen columns">
                                            <?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
                                        </div>
                                    <?php endwhile; // end of the loop.  ?>
                                </div>

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

<?php Yii::app()->controller->widget('application.components.widgets.newBooking.QuickBooking', array('id'=>'quick_booking', 'showPlans' => false, 'isPreview' => false));?>
<?php if ($isSmartPhone) : // Style custom slider gallery SP ?>
    <style type="text/css">
        .kimono-plan-gallery-slider .slick-slide {
            margin: 0 5px
        }
        .kimono-plan-gallery-slider .slick-dots{
            text-align: left;
            bottom: -35px;
        }
        .kimono-plan-gallery-slider .slick-dots li{
            margin: 0;
        }
        .kimono-plan-gallery-slider .slick-dots li button:before{
            font-size: 25px;
        }
    </style>
<?php endif; ?>
<script>
    $(document).ready(function(){
        if(isSmartPhone()){
            $('.kimono-plan-gallery-slider .slides').slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true
            });
        }

//        $('#shops-by-plan-close').click(function (event) {
//            event.preventDefault();
//            $("#shops-by-plan").hide();
//            $("html").removeClass("modal-open");
//        })
        $('.wrap-new-plan-list .btn-reserve').click(function (event) {
            $('#botDiv').hide();
            event.preventDefault();
            var selectedPlan = {};
            var hasPlan = false;
            var bookingPlanData = [];
            $('.wrap-new-plan-list').find('.list-plan-filter').each(function () {
                var $warpPlan = $(this);
                var planName = $warpPlan.attr('data-plan-name');
                $warpPlan.find('select.list_plans').each(function () {
                    var planTypeId = $(this).attr('data-plan_type_id');
                    var femaleAllow = $(this).data('femaleAllow') ? true : false;
                    var maleAllow = $(this).data('maleAllow') ? true : false;
                    var val = parseInt($(this).val());
                    if(planTypeId && val){
                        for(var i = 1; i <= val; i++){
                            if(femaleAllow && maleAllow){
                                bookingPlanData.push({
                                    plan_type_id: planTypeId,
                                    plan_name: planName,
                                    count_person: 2,
                                    persons: {
                                        1: {sex:1, options:{}},
                                        2: {sex:2, options:{}},
                                    },
                                });
                            }else if(femaleAllow){
                                bookingPlanData.push({
                                    plan_type_id: planTypeId,
                                    plan_name: planName,
                                    count_person: 1,
                                    persons: {
                                        1: {sex:1, options:{}},
                                    },
                                });
                            }else if(maleAllow){
                                bookingPlanData.push({
                                    plan_type_id: planTypeId,
                                    plan_name: planName,
                                    count_person: 1,
                                    persons: {
                                        2: {sex:2, options:{}},
                                    },
                                });
                            }
                        }
                        selectedPlan[planTypeId] = val;
                        hasPlan = true;
                    }
                })
            })
            console.log(hasPlan, selectedPlan);
            if (!hasPlan || $.isEmptyObject(selectedPlan)) {
                alert('<?php echo Yii::t('js_msg','Just only male or female can zero!')?>');
                return false;
            }
            if(typeof PopupTab == 'undefined') {
                BarPopup.init();
                BarPopup.enable(true);
                window.templockForAddPlan = true;
                window.tempBackStep = true;
                window.tempArgumentInput = {
                    'isVipPlan' : true
                };
                window.tempBookingPlanData = bookingPlanData;
                window.templistPlanIds = selectedPlan;
                return false;
            }else{
                NewReserveStatus.clearSelected();
                NewReserveStatus.listPlanIds = selectedPlan;
                if (prepareChooseShopTab(bookingPlanData)) {
                    PopupTab.current_tab = CONFIG_POPUP.two_step;
                    /*remove back step button*/
                    $('#backStep').remove();
                    var argumentInput = {
                        'isVipPlan' : true
                    };
                    PopupTab.showPopup(CONFIG_POPUP.two_step, argumentInput);
                }
            }
        });

        $('#opt-hotel').qtip({
            content: {
                text: $('.wrap-option-hotel')
            },
            position: {
                my: 'top center',  // Position my top left...
                at: 'bottom center', // at the bottom right of...
                target: $('#opt-hotel') // my target
            },
            hide: {
                fixed: true,
                delay: 300
            },
            show: {
                effect: function (offset) {
                    $(this).addClass('qtip-hotel').show();
                }
            }
        });

    });

</script>
<div class="wrap-option-hotel" style="display: none;">
    <?php echo Yii::t('qtip-hotel-vip', 'qtip-hotel-content'); ?>
</div>

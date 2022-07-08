<?php
/**
 * Template Name: New Kimono Landing Page
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
$language = Yii::app()->language;
$baseUrl = Yii::app()->baseUrl;
global $post;
get_header('new-kimono-landing-page');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');

//wp_register_style('new-kimono-common-style', get_template_directory_uri() . '/css/new-kimono-common.css', array('twentytwelve-style'));
//wp_enqueue_style('new-kimono-common-style');
//if($isSmartPhone){?>
<!--    <link href="--><?php //echo Yii::app()->getBaseUrl(true)?><!--/resource?page=--><?php //echo ResourceMasterValues::RM_KIMONO_COMMON_SP?><!--&ver=20190529143900" rel="stylesheet" type="text/css" />-->
<!--    --><?php
//} else{ ?>
<!--    <link href="--><?php //echo Yii::app()->getBaseUrl(true)?><!--/resource?page=--><?php //echo ResourceMasterValues::RM_KIMONO_COMMON_PC?><!--&ver=20190410135400" rel="stylesheet" type="text/css" />-->
<?php //}
//wp_register_style('left-sidebar-new-kimono-v2-style', get_template_directory_uri() . '/css/left-sidebar-new-kimono-v2.css', array('twentytwelve-style'));
//wp_enqueue_style('left-sidebar-new-kimono-v2-style');
if($isSmartPhone){
    wp_register_style('new-kimono-landing-page-sp-style', get_template_directory_uri() . '/css/new-kimono-landing-page-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-landing-page-sp-style');
}else{
    wp_register_style('new-kimono-landing-page-pc-style', get_template_directory_uri() . '/css/new-kimono-landing-page-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-landing-page-pc-style');
}
?>
<?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
<section class="banner-top-landing">
    <?php if($isSmartPhone):?>
        <img src="<?php echo WP_HOME ;?>/images/landing-page/banner-top-landing-sp.jpg" alt="">
    <?php else: ?>
        <img src="<?php echo WP_HOME ;?>/images/landing-page/banner-top-landing-pc.jpg" alt="">
    <?php endif; ?>
</section><!--end banner-top-landing-->
<section class="section-6-point section-general-landing section-bg-pattern">
    <div class="wrap-6-point">
        <div class="container-box">
            <div class="row">
                <div class="wrap-title-6-point">
                    <p class="title-6-point">wargoを選ぶ<var class="big-number-point">6</var>つの理由</p>
                </div>
                <ul class="list-items-option-point flexbox">
                    <li class="items-option-point items-option-point-01 flexbox">
                        <p class="icon-option-point option-point-01"></p>
                        <p class="infor-option-point flexbox">
                            <span class="infor-top">日本最大級</span>
                            <span class="infor-bottom color-yellow">全国<var class="text-biger-bottom">20</var>店舗</span>
                        </p>
                    </li>
                    <li class="items-option-point items-option-point-02 flexbox">
                        <p class="icon-option-point option-point-02"></p>
                        <p class="infor-option-point flexbox">
                            <span class="infor-top">最新着物</span>
                            <span class="infor-bottom color-yellow"><var class="text-biger-bottom">20,000</var>着以上</span>
                        </p>
                    </li>
                    <li class="items-option-point items-option-point-03 flexbox">
                        <p class="icon-option-point option-point-03"></p>
                        <p class="infor-option-point flexbox">
                            <span class="infor-top">着物の着付け</span>
                            <span class="infor-bottom color-yellow"><var class="text-biger-bottom">無料!</var></span>
                        </p>
                    </li>
                    <li class="items-option-point items-option-point-04 flexbox">
                        <p class="icon-option-point option-point-04"></p>
                        <p class="infor-option-point flexbox">
                            <span class="infor-top">最安プランが</span>
                            <span class="infor-bottom color-yellow"><var class="text-biger-bottom">￥2,980～</var></span>
                        </p>
                    </li>
                    <li class="items-option-point items-option-point-05 flexbox">
                        <p class="icon-option-point option-point-05"></p>
                        <p class="infor-option-point flexbox">
                            <span class="infor-top">フルセット</span>
                            <span class="infor-bottom color-yellow">小物8点無料</span>
                        </p>
                    </li>
                    <li class="items-option-point items-option-point-06 flexbox">
                        <p class="icon-option-point option-point-06"></p>
                        <p class="infor-option-point flexbox">
                            <span class="infor-top">手ぶらで</span>
                            <span class="infor-bottom color-yellow"><var class="text-biger-bottom">OK!!</var></span>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div><!--end wrap-6-point-->
    <div class="wrap-info-landing flexbox">
        <div class="pic-info-landing">
            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-landing-infomation.jpg" alt="">
        </div>
        <div class="info-landing">
            <h3 class="title-info-landing">information</h3>
            <div class="info-overlay-landing">
                <div class="lg-text-info">
                    京都最大級 ! 圧倒的低価格で種類豊<br/>
                    富に格安レンタル可能♪
                </div>
                <div class="sm-text-info">
                    <p class="pra-text">観光、ショッピングに便利な好立地！！関東関西・北陸に全 20 店舗を展開している京都きものレンタル wargo が“着物で散策”、そんな夢 2980 円で叶います！和小物のショップを展開する当社だからこそできる圧倒的低価格。</p>
                    <p class="pra-text">もちろん品質は一流、プロの着付けまでセットにコミコミの着物レンタルを、格安価格でご提供いたします !</p>
                </div>
            </div>
        </div>
    </div><!--end wrap-info-landing-->
</section><!-- End section-6-point -->
<section class="section-shoplist-landing section-general-landing">
    <div class="container-box">
        <div class="row">
            <?php if($isSmartPhone):?>
                <div class="wrap-shop-list-kimono-landing">
                    <h2 class="title-landing-general title-landing-general-other">
                        <p class="title-en">shop list</p>
                        <p class="title-sm">全国20店舗で展開中！お近くの店舗を簡単検索♪</p>
                    </h2>
                    <div class="choose-store">
                        <div class="choose-tab flexbox justify-content-between">
                            <p class="text-choose">お近くの店舗をお選びください。</p>
                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                        </div>
                    </div>
                    <div class="wrap-tab-shop">
                        <ul class="list-shop flexbox">
                            <li class="item-shop tablinks">
                                <div class="lbl-item-shop flexbox">
                                    <span class="name">京都駅から近い店舗</span>
                                    <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                </div>
                                <div class="wrap-content-tab">
                                    <div class="detail-content-tab tabcontent">
                                        <div class="title-wrap-content tabcontent" >
                                            京都駅から近い店舗
                                            <div class="line-shop-list">
                                                <span class="line"></span>
                                            </div>
                                        </div>
                                        <div class="item-detail flexbox">
                                            <div class="img-item">
                                                <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-kyotostation.jpg" alt="">
                                            </div>
                                            <div class="content-item flexbox">
                                                <div class="text-content">
                                                    <p class="title-content-item">
                                                        京都駅前京都タワー店
                                                    </p>
                                                    <div class="list-des">
                                                        <p class="des-red">京都駅徒歩2分京都タワービル3F</p>
                                                        <p>営業時間：09：00 ～ 19：00</p>
                                                        <p>着付け最終受付時間：18：00</p>
                                                        <p>返却締め切り時間：18：30</p>
                                                    </div>
                                                </div>
                                                <div class="group-button">
                                                    <div class="button-map" data-target="kyotostation">
                                                        地図を<br>見る
                                                    </div>
                                                    <div class="button-info-store">
                                                        <a href="<?php echo WP_HOME ;?>/access/kyoto-area/station-area/kyotostation">店舗<br>情報</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop tablinks">
                                <div class="lbl-item-shop flexbox">
                                    <span class="name">京都祇園から近い店舗</span>
                                    <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                </div>
                                <div class="wrap-content-tab" id="kyoto-gion">
                                    <div class="detail-content-tab tabcontent">
                                        <div class="title-wrap-content tabcontent" >
                                            京都祇園から近い店舗
                                            <div class="line-shop-list">
                                                <span class="line"></span>
                                            </div>
                                        </div>
                                        <div class="item-detail flexbox">
                                            <div class="img-item">
                                                <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-gionshijo.jpg" alt="">
                                            </div>
                                            <div class="content-item flexbox">
                                                <div class="text-content">
                                                    <p class="title-content-item">
                                                        祇園四条店
                                                    </p>
                                                    <div class="list-des">
                                                        <p class="des-red">祇園四条駅徒歩1分</p>
                                                        <p>営業時間：09：00 ～ 19：00</p>
                                                        <p>着付け最終受付時間：18：00</p>
                                                        <p>返却締め切り時間：18：30</p>
                                                    </div>
                                                </div>
                                                <div class="group-button">
                                                    <div class="button-map" data-target="gionshijo">
                                                        地図を<br>
                                                        見る
                                                    </div>
                                                    <div class="button-info-store">
                                                        <a href="<?php echo WP_HOME ;?>/access/kyoto-area/gion-area/gion-shijo">
                                                            店舗<br>情報
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop tablinks">
                                <div class="lbl-item-shop flexbox">
                                    <span class="name">京都嵐山から近い店舗</span>
                                    <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                </div>
                                <div class="wrap-content-tab" id="kyoto-arashiyama">
                                    <div class="detail-content-tab tabcontent">
                                        <div class="title-wrap-content tabcontent" >
                                            京都嵐山から近い店舗
                                            <div class="line-shop-list">
                                                <span class="line"></span>
                                            </div>
                                        </div>
                                        <div class="item-detail flexbox">
                                            <div class="img-item">
                                                <img src="<?php echo WP_HOME ;?>/images/landing-page/img-shoplist-landing-02.jpg" alt="">
                                            </div>
                                            <div class="content-item flexbox">
                                                <div class="text-content">
                                                    <p class="title-content-item">
                                                        嵐山駅前店
                                                    </p>
                                                    <div class="list-des">
                                                        <p class="des-red">嵯峨嵐山駅前徒歩30秒</p>
                                                        <p>営業時間：09：00 ～ 18：00</p>
                                                        <p>着付け最終受付時間：17：00</p>
                                                        <p>返却締め切り時間：17：30</p>
                                                    </div>
                                                </div>
                                                <div class="group-button">
                                                    <div class="button-map" data-target="arashiyama">
                                                        地図を<br>
                                                        見る
                                                    </div>
                                                    <div class="button-info-store">
                                                        <a href="<?php echo WP_HOME ;?>/access/kyoto-area/arashiyama-area/arashiyama">
                                                            店舗<br>情報
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-detail flexbox">
                                            <div class="img-item">
                                                <img src="<?php echo WP_HOME ;?>/images/landing-page/img-shoplist-landing-01.jpg" alt="">
                                            </div>
                                            <div class="content-item flexbox">
                                                <div class="text-content">
                                                    <p class="title-content-item">
                                                        嵐山渡月橋店
                                                    </p>
                                                    <div class="list-des">
                                                        <p class="des-red">嵐電嵐山駅すぐそば！<span class="button-map-sm">MAP</span></p>
                                                        <p>営業時間：09：00 ～ 18：00</p>
                                                        <p>着付け最終受付時間：17：00</p>
                                                        <p>返却締め切り時間：17：30</p>
                                                    </div>
                                                </div>
                                                <div class="group-button">
                                                    <div class="button-map" data-target="chawanzaka">
                                                        地図を<br>
                                                        見る
                                                    </div>
                                                    <div class="button-info-store">
                                                        <a href="<?php echo WP_HOME ;?>/access/kyoto-area/kiyomizu-area/chawanzaka">
                                                            店舗<br>
                                                            情報
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop tablinks">
                                <div class="lbl-item-shop flexbox">
                                    <span class="name">清水寺から近い店舗</span>
                                    <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                </div>
                                <div class="wrap-content-tab" id="kiyomizu-temple">
                                    <div class="detail-content-tab tabcontent">
                                        <div class="title-wrap-content tabcontent" >
                                            清水寺から近い店舗
                                            <div class="line-shop-list">
                                                <span class="line"></span>
                                            </div>
                                        </div>
                                        <div class="item-detail flexbox">
                                            <div class="img-item">
                                                <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-kiyomizuzaka.jpg" alt="">
                                            </div>
                                            <div class="content-item flexbox">
                                                <div class="text-content">
                                                    <p class="title-content-item">
                                                        嵐山駅前店
                                                    </p>
                                                    <div class="list-des">
                                                        <p class="des-red">嵯峨嵐山駅前徒歩30秒</p>
                                                        <p>営業時間：09：00 ～ 18：00</p>
                                                        <p>着付け最終受付時間：17：00</p>
                                                        <p>返却締め切り時間：17：30</p>
                                                    </div>
                                                </div>
                                                <div class="group-button">
                                                    <div class="button-map" data-target="kiyomizuzaka">
                                                        地図を<br>
                                                        見る
                                                    </div>
                                                    <div class="button-info-store">
                                                        <a href="<?php echo WP_HOME ;?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">
                                                            店舗<br>情報
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-detail flexbox">
                                                <div class="img-item">
                                                    <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-chawanzaka.jpg" alt="">
                                                </div>
                                                <div class="content-item flexbox">
                                                    <div class="text-content">
                                                        <p class="title-content-item">
                                                            嵐山渡月橋店
                                                        </p>
                                                        <div class="list-des">
                                                            <p class="des-red">嵐電嵐山駅すぐそば！<span class="button-map-sm">MAP</span></p>
                                                            <p>営業時間：09：00 ～ 18：00</p>
                                                            <p>着付け最終受付時間：17：00</p>
                                                            <p>返却締め切り時間：17：30</p>
                                                        </div>
                                                    </div>
                                                    <div class="group-button">
                                                        <div class="button-map" data-target="arashiyama-togetsukyo">
                                                            地図を<br>
                                                            見る
                                                        </div>
                                                        <div class="button-info-store">
                                                            <a href="<?php echo WP_HOME ;?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">
                                                                店舗<br>情報
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop tablinks">
                                <div class="lbl-item-shop flexbox">
                                    <span class="name">大阪の店舗</span>
                                    <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                </div>
                                <div class="wrap-content-tab" id="osaka">
                                    <div class="detail-content-tab tabcontent">
                                        <div class="title-wrap-content tabcontent" >
                                            大阪の店舗
                                            <div class="line-shop-list">
                                                <span class="line"></span>
                                            </div>
                                        </div>
                                        <div class="item-detail flexbox">
                                            <div class="img-item">
                                                <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-osaka-shinsaibashi-opa.jpg" alt="">
                                            </div>
                                            <div class="content-item flexbox">
                                                <div class="text-content">
                                                    <p class="title-content-item">
                                                        清水坂店店
                                                    </p>
                                                    <div class="list-des">
                                                        <p class="des-red">清水寺徒歩５分</p>
                                                        <p>営業時間：09：00 ～ 18：00</p>
                                                        <p>着付け最終受付時間：17：00</p>
                                                        <p>返却締め切り時間：17：30</p>
                                                    </div>
                                                </div>
                                                <div class="group-button">
                                                    <div class="button-map" data-target="osaka">
                                                        地図を<br>見る
                                                    </div>
                                                    <div class="button-info-store">
                                                        <a href="<?php echo WP_HOME ;?>/access/kyoto-area/kiyomizu-area/chawanzaka">
                                                            店舗<br>情報
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop tablinks other">
                                <a href="<?= home_url()?>/access" class="lbl-item-shop flexbox">
                                    <span class="name">その他の</span>
                                    <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="wrap-shoplist-popup" id="wrap-shoplist-popup">
                    <div class="shop-info-content" data-shop="kyotostation">
                        <div class="flexbox wrap-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-05"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">きものレンタルwargo</span>
                                        <span class="shop-txt">京都駅前京都タワー店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 京都府京都市下京区（烏丸通七条下ル）塩小路町７２１－１京都タワービル３階 <br>
                                    営業時間：09:00～19:00（＊最終返却18：30）
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="kyotostation shop location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.7667818770387!2d135.759521!3d34.987505999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108afaeb40191%3A0x6aec2bdbd4a76261!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ2_kuqzpg73pp4XliY3kuqzpg73jgr_jg6_jg7zlupc!5e0!3m2!1sen!2sjp!4v1440470968676" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="gionshijo">
                        <div class="flexbox wrap-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-06"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">祇園着物・浴衣レンタル</span>
                                        <span class="shop-txt">祇園四条店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒605-0802　京都府京都市東山区大和町７祇園モーリヤビル３階<br>
                                    営業時間：09:00～19:00 (※最終返却 18:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">フォーマル着物</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">プチプラン</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">観光着物</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">VIPプラン</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">ヘアセット</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">着付け教室</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">スタジオセット</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">アンティーク着物</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">簡易スタジオ</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">豆千代モダン着物</span> </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="gion-shijo-location" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.13356926634!2d135.770546!3d35.0033614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108c0384c9c11%3A0x74d0f0f4cf17e285!2z552A54mp44Os44Oz44K_44OrIHdhcmdvIOelh-WckuWbm-adoeW6lw!5e0!3m2!1sja!2s!4v1554969885627!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="arashiyama">
                        <div class="flexbox wrap-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-11"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">嵐山着物・浴衣レンタル</span>
                                        <span class="shop-txt">嵐山駅前店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒616-8373　京都府京都市右京区嵯峨天龍寺車道町９－２－２階<br>
                                    営業時間：09:00～18:00 (※最終返却 17:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="arashiyama shop location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.552242646899!2d135.67893601524065!3d35.017912080354265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001a9fc2aa5637d%3A0xba3490117d1fa05c!2z5Lqs6YO9552A54mp44Os44Oz44K_44Ord2FyZ28g5bWQ5bGx6aeF5YmN5bqX!5e0!3m2!1sja!2s!4v1554970037632!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="arashiyama-togetsukyo">
                        <div class="flexbox wrap-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-18"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">嵐山着物・浴衣レンタル</span>
                                        <span class="shop-txt">嵐山渡月橋店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒616-8384　京都府京都市右京区嵯峨天龍寺造路町１１－４<br>
                                    営業時間：09:00～18:00 (※最終返却 17:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="arashiyama togetsukyo shop location" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3267.5891396643588!2d135.67762!3d35.0169887!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001a9ffb241ec69%3A0x599f8306ca8cb748!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5bWQ5bGx5rih5pyI5qmL5bqX!5e0!3m2!1sja!2s!4v1554970117637!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="kiyomizuzaka">
                        <div class="flexbox wrap-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-02"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">清水寺着物・浴衣レンタル</span>
                                        <span class="shop-txt">清水坂店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒605-0846　京都府京都市東山区（五条通東大路東入ル南側）五条橋東６－５８３－１０４かんざし屋wargo清水坂店２階<br>
                                    営業時間：09:00～18:00 (※最終返却 17:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="kiyomizuzaka shop location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.4430469735985!2d135.77714231524013!3d34.99561298035985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108ce47f344d3%3A0xbfd21c88eaa1748!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5riF5rC05Z2C5bqX!5e0!3m2!1sja!2s!4v1554969977558!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="chawanzaka">
                        <div class="flexbox wrap-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-26">
                                        <img src="<?= WP_HOME ?>/images/new-kimono/icon-shop-26.svg" alt="">
                                    </span>
                                    <div class="shop-name">
                                        <span class="sub-txt">清水寺着物・浴衣レンタル</span>
                                        <span class="shop-txt">清水寺茶わん坂店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 京都府京都市東山区五条橋東６丁目５３９－３５北斎グラフィック 京都茶わん坂店 2F<br>
                                    営業時間：09:00～18:00 (※最終返却 17:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="chawanzaka shop location" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.465770121249!2d135.780176!3d34.995044!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa29b5203ac8a311b!2z5Lqs6YO95riF5rC06Iy244KP44KT5Z2CIOWMl-aWjuOCsOODqeODleOCo-ODg-OCrw!5e0!3m2!1sja!2s!4v1555650595354!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="osaka">
                        <div class="flexbox wrap-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-28">
                                        <img src="<?= WP_HOME ?>/images/new-kimono/icon-shop-26.svg" alt="">
                                    </span>
                                    <div class="shop-name">
                                        <span class="sub-txt">清水寺着物・浴衣レンタル</span>
                                        <span class="shop-txt">大阪心斎橋店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒542-0086 大阪府大阪市中央区西心斎橋1丁目９-２ 心斎橋OPAキレイ館2階エスカ脇<br>
                                    営業時間：11:00～19:00 （※最終返却18:30）
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="osaka-shinsaibashi-opa shop location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.2634638495233!2d135.49704661523148!3d34.6732994804416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x595cfcc58da49b9d!2z44GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5aSn6Ziq5b-D5paO5qmLT1BB44GN44KM44GE6aSo5bqX!5e0!3m2!1sen!2s!4v1566397986080!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                </div><!--end thao-->
            <?php else: ?>
            <div class="wrap-shop-list-kimono-landing">
                <h2 class="title-landing-general title-landing-general-other">
                    <p class="title-en">shop list</p>
                    <p class="title-sm">全国20店舗で展開中！</p>
                </h2>
                <div class="wrap-tab-shop">
                    <ul class="list-shop flexbox">
                        <li class="item-shop tablinks" data-id="kyoto-station">
                            京都駅<br>
                            から近い店舗
                        </li>
                        <li class="item-shop tablinks" data-id="kyoto-gion">
                            京都祇園<br>
                            から近い店舗
                        </li>
                        <li class="item-shop tablinks" data-id="kyoto-arashiyama">
                            京都嵐山<br>
                            から近い店舗
                        </li>
                        <li class="item-shop tablinks" data-id="kiyomizu">
                            清水寺<br>
                            から近い店舗
                        </li>
                        <li class="item-shop tablinks" data-id="osaka">
                            大阪<br>
                            の店舗
                        </li>
                        <li class="item-shop tablinks" data-id="other">
                            <a href="<?php echo WP_HOME ;?>/access">
                                その他の<br>地域の店舗
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="wrap-content-tab" id="kyoto-station">
                    <div class="detail-content-tab tabcontent">
                        <div class="title-wrap-content tabcontent" >
                            京都駅から近い店舗
                            <div class="line-shop-list">
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="item-detail flexbox">
                            <div class="img-item">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-kyotostation.jpg" alt="">
                            </div>
                            <div class="content-item">
                                <p class="title-content-item">
                                    京都駅前京都タワー店
                                </p>
                                <div class="list-des">
                                    <p class="des-red">京都駅徒歩2分京都タワービル3F</p>
                                    <p>営業時間：09：00 ～ 19：00</p>
                                    <p>着付け最終受付時間：18：00</p>
                                    <p>返却締め切り時間：18：30</p>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="button-map" data-target="kyotostation">
                                    地図を<br>見る
                                </div>
                                <div class="button-info-store">
                                    <a href="<?php echo WP_HOME ;?>/access/kyoto-area/station-area/kyotostation">店舗<br>情報</a>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-button-link-page flexbox">
                            <div class="wrap-button-link wrap-button-link-left">
                                <a class="text-button-link-page" href="<?php echo WP_HOME ;?>/check-booking">まずは空き状況をチェックする！</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-content-tab" id="kyoto-gion">
                    <div class="detail-content-tab tabcontent">
                        <div class="title-wrap-content tabcontent" >
                            京都祇園から近い店舗
                            <div class="line-shop-list">
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="item-detail flexbox">
                            <div class="img-item">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-gionshijo.jpg" alt="">
                            </div>
                            <div class="content-item">
                                <p class="title-content-item">
                                    祇園四条店
                                </p>
                                <div class="list-des">
                                    <p class="des-red">祇園四条駅徒歩1分</p>
                                    <p>営業時間：09：00 ～ 19：00</p>
                                    <p>着付け最終受付時間：18：00</p>
                                    <p>返却締め切り時間：18：30</p>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="button-map" data-target="gionshijo">
                                    地図を<br>
                                    見る
                                </div>
                                <div class="button-info-store">
                                    <a href="<?php echo WP_HOME ;?>/access/kyoto-area/gion-area/gion-shijo">
                                        店舗<br>情報
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-button-link-page flexbox">
                            <div class="wrap-button-link wrap-button-link-left">
                                <a class="text-button-link-page" href="<?php echo WP_HOME ;?>/check-booking">まずは空き状況をチェックする！</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-content-tab" id="kyoto-arashiyama">
                    <div class="detail-content-tab tabcontent">
                        <div class="title-wrap-content tabcontent" >
                            京都嵐山から近い店舗
                            <div class="line-shop-list">
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="item-detail flexbox">
                            <div class="img-item">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/img-shoplist-landing-02.jpg" alt="">
                            </div>
                            <div class="content-item">
                                <p class="title-content-item">
                                    嵐山駅前店
                                </p>
                                <div class="list-des">
                                    <p class="des-red">嵯峨嵐山駅前徒歩30秒</p>
                                    <p>営業時間：09：00 ～ 18：00</p>
                                    <p>着付け最終受付時間：17：00</p>
                                    <p>返却締め切り時間：17：30</p>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="button-map" data-target="arashiyama">
                                    地図を<br>
                                    見る
                                </div>
                                <div class="button-info-store">
                                    <a href="<?php echo WP_HOME ;?>/access/kyoto-area/arashiyama-area/arashiyama">
                                        店舗<br>情報
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item-detail flexbox">
                            <div class="img-item">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/img-shoplist-landing-01.jpg" alt="">
                            </div>
                            <div class="content-item">
                                <p class="title-content-item">
                                    嵐山渡月橋店
                                </p>
                                <div class="list-des">
                                    <p class="des-red">嵐電嵐山駅すぐそば！<span class="button-map-sm">MAP</span></p>
                                    <p>営業時間：09：00 ～ 18：00</p>
                                    <p>着付け最終受付時間：17：00</p>
                                    <p>返却締め切り時間：17：30</p>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="button-map" data-target="arashiyama-togetsukyo">
                                    地図を<br>
                                    見る
                                </div>
                                <div class="button-info-store">
                                    <a href="<?php echo WP_HOME ;?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">
                                        店舗<br>
                                        情報
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-button-link-page flexbox">
                            <div class="wrap-button-link wrap-button-link-left">
                                <a class="text-button-link-page" href="<?php echo WP_HOME ;?>/check-booking">まずは空き状況をチェックする！</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-content-tab" id="kiyomizu">
                    <div class="detail-content-tab tabcontent">
                        <div class="title-wrap-content tabcontent" >
                            清水寺から近い店舗
                            <div class="line-shop-list">
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="item-detail flexbox">
                            <div class="img-item">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-kiyomizuzaka.jpg" alt="">
                            </div>
                            <div class="content-item">
                                <p class="title-content-item">
                                    清水坂店店
                                </p>
                                <div class="list-des">
                                    <p class="des-red">清水寺徒歩５分</p>
                                    <p>営業時間：09：00 ～ 18：00</p>
                                    <p>着付け最終受付時間：17：00</p>
                                    <p>返却締め切り時間：17：30</p>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="button-map" data-target="kiyomizuzaka">
                                    地図を<br>見る
                                </div>
                                <div class="button-info-store">
                                    <a href="<?php echo WP_HOME ;?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">
                                        店舗<br>情報
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item-detail flexbox">
                            <div class="img-item">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-chawanzaka.jpg" alt="">
                            </div>
                            <div class="content-item">
                                <p class="title-content-item">
                                    清水茶わん坂店
                                </p>
                                <div class="list-des">
                                    <p class="des-red">清水寺まで徒歩５分！<span class="button-map-sm">MAP</span></p>
                                    <p>営業時間：09：00 ～ 18：00</p>
                                    <p>着付け最終受付時間：17：00</p>
                                    <p>返却締め切り時間：17：30</p>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="button-map" data-target="chawanzaka">
                                    地図を<br>
                                    見る
                                </div>
                                <div class="button-info-store">
                                    <a href="<?php echo WP_HOME ;?>/access/kyoto-area/kiyomizu-area/chawanzaka">
                                        店舗<br>情報
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-button-link-page flexbox">
                            <div class="wrap-button-link wrap-button-link-left">
                                <a class="text-button-link-page" href="<?php echo WP_HOME ;?>/check-booking">まずは空き状況をチェックする！</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-content-tab" id="osaka">
                    <div class="detail-content-tab tabcontent">
                        <div class="title-wrap-content tabcontent" >
                            大阪の店舗
                            <div class="line-shop-list">
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="item-detail flexbox">
                            <div class="img-item">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/shop-list-osaka-shinsaibashi-opa.jpg" alt="">
                            </div>
                            <div class="content-item">
                                <p class="title-content-item">
                                    大阪心斎橋店
                                </p>
                                <div class="list-des">
                                    <p class="des-red">心斎橋駅徒歩５分！</p>
                                    <p>営業時間：11：00 ～ 19：00</p>
                                    <p>着付け最終受付時間：18：00</p>
                                    <p>返却締め切り時間：18：30</p>
                                </div>
                            </div>
                            <div class="group-button">
                                <div class="button-map" data-target="osaka">
                                    地図を<br>
                                    見る
                                </div>
                                <div class="button-info-store">
                                    <a href="<?php echo WP_HOME ;?>/access/osaka-area/osaka-shinsaibashi-opa">
                                        店舗<br>情報
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-button-link-page flexbox">
                            <div class="wrap-button-link wrap-button-link-left">
                                <a class="text-button-link-page" href="<?php echo WP_HOME ;?>/check-booking">まずは空き状況をチェックする！</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap-shoplist-popup" id="wrap-shoplist-popup">
                    <div class="shop-info-content" data-shop="kyotostation">
                        <div class="flexbox box-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-05"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">きものレンタルwargo</span>
                                        <span class="shop-txt">京都駅前京都タワー店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 京都府京都市下京区（烏丸通七条下ル）塩小路町７２１－１京都タワービル３階 <br>
                                    営業時間：09:00～19:00（＊最終返却18：30）
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="kyotostation shop location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.7667818770387!2d135.759521!3d34.987505999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108afaeb40191%3A0x6aec2bdbd4a76261!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ2_kuqzpg73pp4XliY3kuqzpg73jgr_jg6_jg7zlupc!5e0!3m2!1sen!2sjp!4v1440470968676" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox pc">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="gionshijo">
                        <div class="flexbox box-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-06"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">祇園着物・浴衣レンタル</span>
                                        <span class="shop-txt">祇園四条店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒605-0802　京都府京都市東山区大和町７祇園モーリヤビル３階<br>
                                    営業時間：09:00～19:00 (※最終返却 18:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">フォーマル着物</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">プチプラン</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">観光着物</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">VIPプラン</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">ヘアセット</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">着付け教室</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">スタジオセット</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">アンティーク着物</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-uncheck"></span> <span class="name-check">簡易スタジオ</span> </li>
                                    <li class="item-check"> <span class="icon-checkbox icon-formal-checked-1"></span> <span class="name-check">豆千代モダン着物</span> </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="gion-shijo-location" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.13356926634!2d135.770546!3d35.0033614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108c0384c9c11%3A0x74d0f0f4cf17e285!2z552A54mp44Os44Oz44K_44OrIHdhcmdvIOelh-WckuWbm-adoeW6lw!5e0!3m2!1sja!2s!4v1554969885627!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox pc">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="arashiyama">
                        <div class="flexbox box-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-11"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">嵐山着物・浴衣レンタル</span>
                                        <span class="shop-txt">嵐山駅前店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒616-8373　京都府京都市右京区嵯峨天龍寺車道町９－２－２階<br>
                                    営業時間：09:00～18:00 (※最終返却 17:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="arashiyama shop location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.552242646899!2d135.67893601524065!3d35.017912080354265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001a9fc2aa5637d%3A0xba3490117d1fa05c!2z5Lqs6YO9552A54mp44Os44Oz44K_44Ord2FyZ28g5bWQ5bGx6aeF5YmN5bqX!5e0!3m2!1sja!2s!4v1554970037632!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox pc">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="arashiyama-togetsukyo">
                        <div class="flexbox box-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-18"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">嵐山着物・浴衣レンタル</span>
                                        <span class="shop-txt">嵐山渡月橋店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒616-8384　京都府京都市右京区嵯峨天龍寺造路町１１－４<br>
                                    営業時間：09:00～18:00 (※最終返却 17:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="arashiyama togetsukyo shop location" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3267.5891396643588!2d135.67762!3d35.0169887!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001a9ffb241ec69%3A0x599f8306ca8cb748!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5bWQ5bGx5rih5pyI5qmL5bqX!5e0!3m2!1sja!2s!4v1554970117637!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox pc">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="kiyomizuzaka">
                        <div class="flexbox">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-02"></span>
                                    <div class="shop-name">
                                        <span class="sub-txt">清水寺着物・浴衣レンタル</span>
                                        <span class="shop-txt">清水坂店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒605-0846　京都府京都市東山区（五条通東大路東入ル南側）五条橋東６－５８３－１０４かんざし屋wargo清水坂店２階<br>
                                    営業時間：09:00～18:00 (※最終返却 17:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="kiyomizuzaka shop location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.4430469735985!2d135.77714231524013!3d34.99561298035985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108ce47f344d3%3A0xbfd21c88eaa1748!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5riF5rC05Z2C5bqX!5e0!3m2!1sja!2s!4v1554969977558!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox pc">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="chawanzaka">
                        <div class="flexbox box-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-26">
                                        <img src="<?= WP_HOME ?>/images/new-kimono/icon-shop-26.svg" alt="">
                                    </span>
                                    <div class="shop-name">
                                        <span class="sub-txt">清水寺着物・浴衣レンタル</span>
                                        <span class="shop-txt">清水寺茶わん坂店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 京都府京都市東山区五条橋東６丁目５３９－３５北斎グラフィック 京都茶わん坂店 2F<br>
                                    営業時間：09:00～18:00 (※最終返却 17:30)
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="chawanzaka shop location" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.465770121249!2d135.780176!3d34.995044!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa29b5203ac8a311b!2z5Lqs6YO95riF5rC06Iy244KP44KT5Z2CIOWMl-aWjuOCsOODqeODleOCo-ODg-OCrw!5e0!3m2!1sja!2s!4v1555650595354!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox pc">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                    <div class="shop-info-content" data-shop="osaka">
                        <div class="flexbox box-info-popup">
                            <div class="info">
                                <div class="wrap-shop-name">
                                    <span class="fa-shop icon-fa-shop-28">
                                        <img src="<?= WP_HOME ?>/images/new-kimono/icon-shop-26.svg" alt="">
                                    </span>
                                    <div class="shop-name">
                                        <span class="sub-txt">清水寺着物・浴衣レンタル</span>
                                        <span class="shop-txt">大阪心斎橋店</span>
                                    </div>
                                </div>
                                <p class="shop-desc">
                                    住所: 〒542-0086 大阪府大阪市中央区西心斎橋1丁目９-２ 心斎橋OPAキレイ館2階エスカ脇<br>
                                    営業時間：11:00～19:00 （※最終返却18:30）
                                </p>
                                <ul class="list-opt-check flexbox">
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">上級着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">プチプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">観光着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">VIPプラン</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">ヘアセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">着付け教室</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">スタジオセット</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-checked-1"></span>
                                        <span class="name-check">アンティーク着物</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">簡易スタジオ</span>
                                    </li>
                                    <li class="item-check">
                                        <span class="icon-checkbox icon-formal-uncheck"></span>
                                        <span class="name-check">豆千代モダン着物</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="map">
                                <iframe title="osaka-shinsaibashi-opa shop location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.2634638495233!2d135.49704661523148!3d34.6732994804416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x595cfcc58da49b9d!2z44GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5aSn6Ziq5b-D5paO5qmLT1BB44GN44KM44GE6aSo5bqX!5e0!3m2!1sen!2s!4v1566397986080!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>                            </div>
                        </div>
                        <div class="wrap-btn-change flexbox pc">
                            <a class="btn-formal btn-new-rs btn-color-pink" href="<?php echo WP_HOME ;?>/kimono">着物レンタルを予約する</a>
                        </div>
                        <div class="button-close">
                            <p class="icon-close">
                                <img src="<?php echo WP_HOME ;?>/images/landing-page/icon-close-lading.svg" alt="">
                            </p>
                        </div>
                    </div>
                </div><!--end thao-->
                <?php endif; ?>
            </div>
        </div>
</section><!--end section-shoplist-landing-->
<section class="section-kimono-plan-landing section-general-landing">
    <?php if($isSmartPhone) :?>
        <div class="container-box">
            <div class="row">
                <div class="section-kimono-ldp sp">
            <div class="wrap-title-kimono-ldp">
                <div class="lg-title">kimono plan</div>
                <div class="sm-title">9000着の着物は着付け無料！足袋無料！かんざしレンタル無料！着付け小物込2,980円～。</br>
                    簡単ネット即日予約･お得な事前WEB決済あり。カップル様用のレンタルプランもご用意して</br>
                    おりますので、お着物での京都スポットデートもおすすめ!!予約なし当日ご来店申込もOKです!!</br>
                </div>
            </div>
            <ul class="list-plan-ldp flexbox">
                <li class="item-plan-ldp">
                    <div class="img-plan">
                        <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-sp-01.jpg" alt="アンティーク着物プラン">
                    </div>
                    <div class="lint-to-plan">
                        <a href="<?= home_url(); ?>/kimono#Antique-Kimono">このプランを予約する</a>
                    </div>
                </li>
                <li class="item-plan-ldp">
                    <div class="img-plan">
                        <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-sp-02.jpg" alt="カップルプラン">
                    </div>
                    <div class="lint-to-plan">
                        <a href="<?= home_url(); ?>/kimono#Couple-Standard-Kimono">このプランを予約する</a>
                    </div>
                </li>
                <li class="item-plan-ldp">
                    <div class="img-plan">
                        <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-sp-03.jpg" alt="スタンダード着物プラン">
                    </div>
                    <div class="lint-to-plan">
                        <a href="<?= home_url(); ?>/kimono#Standard-Kimono">このプランを予約する</a>
                    </div>
                </li>
                <li class="item-plan-ldp">
                    <div class="img-plan">
                        <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-sp-04.jpg" alt="VIP プラン">
                    </div>
                    <div class="lint-to-plan">
                        <a href="<?= home_url(); ?>/vip">このプランを予約する</a>
                    </div>
                </li>
                <li class="item-plan-ldp">
                    <div class="img-plan">
                        <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-sp-05.jpg" alt="メンズプラン">
                    </div>
                    <div class="lint-to-plan">
                        <a href="<?= home_url(); ?>/kimono#Men-kimono">このプランを予約する</a>
                    </div>
                </li>
                <li class="item-plan-ldp">
                    <div class="img-plan">
                        <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-sp-06.jpg" alt="お子様着物プラン">
                    </div>
                    <div class="lint-to-plan">
                        <a href="<?= home_url(); ?>/kimono#Kimono-Girl">このプランを予約する</a>
                    </div>
                </li>
            </ul>
        </div>
            </div>
        </div>
    <?php else: ?>
        <div class="section-kimono-ldp pc">
            <div class="wrap-title-kimono-ldp">
                <div class="lg-title">kimono plan</div>
                <div class="sm-title">9000着の着物は着付け無料！足袋無料！かんざしレンタル無料！着付け小物込2,980円～。</br>
                    簡単ネット即日予約･お得な事前WEB決済あり。カップル様用のレンタルプランもご用意しておりますので、お着物での京</br>
                    都スポットデートもおすすめ!!予約なし当日ご来店申込もOKです!!</br>
                </div>
            </div>
            <div class="container-box">
                <ul class="list-plan-ldp flexbox">
                    <li class="item-plan-ldp">
                        <div class="title-item-plan">
                            <div class="sm-title">迷ったらこのプラン！</div>
                            <div class="lg-title">スタンダード着物プラン</div>
                        </div>
                        <div class="img-plan">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-pc-01.jpg" alt="スタンダード着物プラン">
                        </div>
                        <div class="wrap-des-item-plan">
                            <div class="sub-title-item-plan">
                                <div class="sub-sm-title">価格</div>
                                <div class="sub-lg-title">￥2,980-</div>
                            </div>
                            <div class="des-item-plan">
                                学生さん一番人気のプチプラ最安プラン。初めて着物をレンタルする、安く手軽に着物を体験したいというお客様におすすめです。「着
                                物」らしいベーシックなデザインと、可愛らしくも落ち着いた雰囲気にもなれる幅広い色展開が特徴です。帯や小物の組み合わせで、
                                ピリッと挿し色の効いたコーディネートを楽しみたい方にも人気です。
                            </div>
                        </div>
                        <div class="lint-to-plan">
                            <a href="<?= home_url(); ?>/kimono#Standard-Kimono">プラン詳細</a>
                        </div>
                    </li>
                    <li class="item-plan-ldp">
                        <div class="title-item-plan">
                            <div class="sm-title">カップルでお得に♪</div>
                            <div class="lg-title">カップルプラン</div>
                        </div>
                        <div class="img-plan">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-pc-02.jpg" alt="カップルプラン">
                        </div>
                        <div class="wrap-des-item-plan">
                            <div class="sub-title-item-plan">
                                <div class="sub-sm-title">価格</div>
                                <div class="sub-lg-title">￥5,760-</div>
                            </div>
                            <div class="des-item-plan">
                                「着物」らしいベーシックなデザイン＆プチプラで女子学生さん一番人気の女性向けスタンダード着物プランと、メンズ着物プランがセットになったカップルさん人気の専用プラン。
                                普段のデートで、週末旅行で、誕生日や結婚 記念日でと、様々なデートシーンをより一層 楽しく演出したいカップルさんにおすすめです。
                            </div>
                        </div>
                        <div class="lint-to-plan">
                            <a href="<?= home_url(); ?>/kimono#Couple-Standard-Kimono">プラン詳細</a>
                        </div>
                    </li>
                    <li class="item-plan-ldp">
                        <div class="title-item-plan">
                            <div class="sm-title">個性派揃いの本格着物</div>
                            <div class="lg-title">アンティーク着物プラン</div>
                        </div>
                        <div class="img-plan">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-pc-03.jpg" alt="アンティーク着物プラン">
                        </div>
                        <div class="wrap-des-item-plan">
                            <div class="sub-title-item-plan">
                                <div class="sub-sm-title">価格</div>
                                <div class="sub-lg-title">￥5,980-</div>
                            </div>
                            <div class="des-item-plan">
                                着明治 24 年創業、和装本美術出版社『芸艸堂』の和配色･アンティーク調デザイン着物を中心に、正絹のアンティーク着物を含む地域限定特別プラン。
                                金糸銀糸の入った豪華な半幅帯と組み合わせますが、名古屋帯のオプションご利用も人気です。同窓会やお誕生日の会食などドレスアップしたい外出予定のお客様にもおすすめです。
                            </div>
                        </div>
                        <div class="lint-to-plan">
                            <a href="<?= home_url(); ?>/kimono#Antique-Kimono">プラン詳細</a>
                        </div>
                    </li>
                    <li class="item-plan-ldp">
                        <div class="title-item-plan">
                            <div class="sm-title">心づくしのプランで極上の一時</div>
                            <div class="lg-title">VIP プラン</div>
                        </div>
                        <div class="img-plan">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-pc-04.jpg" alt="VIP プラン">
                        </div>
                        <div class="wrap-des-item-plan">
                            <div class="sub-title-item-plan">
                                <div class="sub-sm-title">価格</div>
                                <div class="sub-lg-title">￥23,000-</div>
                            </div>
                            <div class="des-item-plan">
                                大人気のブランド着物「豆千代モダン」を始め、正絹やアンティーク着物など、当プランだけ の特別な一枚もご用意しております。
                                専属の美容師がお客様と着物のイメージに似合うようにお見立て・ヘアセットし、美しい姿を専用のスタジオで撮影したら、心ゆくまでお出 かけください。
                                そのままホテルにおかえりい ただき、返却できるサービスもございます。1日を有意義にお過ごしください。
                            </div>
                        </div>
                        <div class="lint-to-plan">
                            <a href="<?= home_url(); ?>/vip">プラン詳細</a>
                        </div>
                    </li>
                    <li class="item-plan-ldp">
                        <div class="title-item-plan">
                            <div class="sm-title">いなせに決める男子着物プラン</div>
                            <div class="lg-title">メンズプラン</div>
                        </div>
                        <div class="img-plan">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-pc-05.jpg" alt="メンズプラン">
                        </div>
                        <div class="wrap-des-item-plan">
                            <div class="sub-title-item-plan">
                                <div class="sub-sm-title">価格</div>
                                <div class="sub-lg-title">￥2,980-</div>
                            </div>
                            <div class="des-item-plan">
                                表面に筋の入った紬生地の色無地を中心に、着物と羽織をお好きな色味で組合せていただく男性のお客様向けのセットプラン。
                                様々な年代のお客様に着物男子気分を楽しんでいただけるよう、日本人のお客様におすすめの着物らしい渋めの色合いほか、外国人のお客様に人気のハッキリした赤や青など、幅広い色味を取り揃えております。
                            </div>
                        </div>
                        <div class="lint-to-plan">
                            <a href="<?= home_url(); ?>/kimono#Men-kimono">プラン詳細</a>
                        </div>
                    </li>
                    <li class="item-plan-ldp">
                        <div class="title-item-plan">
                            <div class="sm-title">子供でもおしゃれ！</div>
                            <div class="lg-title">お子様着物プラン</div>
                        </div>
                        <div class="img-plan">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-kimono-plan-landing-pc-06.jpg" alt="お子様着物プラン">
                        </div>
                        <div class="wrap-des-item-plan">
                            <div class="sub-title-item-plan">
                                <div class="sub-sm-title">価格</div>
                                <div class="sub-lg-title">￥10,000</div>
                            </div>
                            <div class="des-item-plan">
                                外国人のお子さまにも大人気！男の子も女の子も大人顔負けのレトロやモダンなテイストの着物と羽織のアンサンブルで、3 歳から 10 歳（身長 90-130cm）くらいまでのお子さま向けセットのプラン。
                                兵児帯タイプの帯は苦しくならず長く着ていただけ、丸 1 日おでかけのお客様にもおすすめです。
                            </div>
                        </div>
                        <div class="lint-to-plan">
                            <a href="<?= home_url(); ?>/kimono#Kimono-Girl">プラン詳細</a>
                        </div>
                    </li>
                </ul>
                <div class="wrap-button-link-page flexbox">
                    <div class="wrap-button-link wrap-button-link-right">
                        <a class="text-button-link-page" href="<?php echo WP_HOME; ?>/kimono">その他のプランを見る</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section><!--end section-kimono-plan-landing-->
<section class="section-option-landing section-general-landing">
    <div class="container-box">
        <div class="row">
            <div class="wrap-slider-option-landing">
                <h2 class="title-landing-general title-landing-general-other">
                    <p class="title-en">option</p>
                    <p class="title-sm">人気のオプションをご紹介♪</p>
                </h2>
                <ul class="slider-option landing-slide" id="slider-option">
                    <li class="item">
                        <div class="img">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-option-landing-01.jpg" alt="">
                        </div>
                        <p class="img-opt-desc">思い出づくりに写真は欠かせません！綺麗なお召し物と一緒に観光の思い出を残しませんか？
                        </p>
                    </li>
                    <li class="item">
                        <div class="img">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-option-landing-02.jpg" alt="">
                        </div>
                        <p class="img-opt-desc">着物も可愛く着るならヘアセットも可愛くアレンジしたい！プロのセット師があなたに似合うヘアをご提案！</p>
                    </li>
                    <li class="item">
                        <div class="img">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-option-landing-03.jpg" alt="">
                        </div>
                        <p class="img-opt-desc">思い出づくりに写真は欠かせません！綺麗なお召し物と一緒に観光の思い出を残しませんか？
                        </p>
                    </li>
                    <li class="item">
                        <div class="img">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-option-landing-04.jpg" alt="">
                        </div>
                        <p class="img-opt-desc">着物での素敵な思い出を形に残しませんか？京都きものレンタルwargoではプロのカメラマンと提携！</p>
                    </li>
                    <li class="item">
                        <div class="img">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-option-landing-05.jpg" alt="">
                        </div>
                        <p class="img-opt-desc">wargoだけの特別特典！着物レンタルをご予約時に人力車をお申し込みいただけば、お店までお迎えにあがります！</p>
                    </li>
                    <li class="item">
                        <div class="img">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-option-landing-06.jpg" alt="">
                        </div>
                        <p class="img-opt-desc">wargoでは、帯やバッグのオプションも種類豊富にご用意しております！<br/>
                            お着物を、もっとお洒落に着こなしたい方におすすめ！</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section><!--end section-option-landing-->
<?php if($isSmartPhone){ ?>
    <section class="section-category-landing section-category">
        <div class="container-box">
            <div class="row">
                <h2 class="title-landing-general title-landing-general-other">
                    <p class="title-en">category</p>
                    <p class="title-sm">カテゴリーからお客様にピッタリなもの選択！</p>
                </h2>
                <?php get_sidebar('landing-page') ?>
            </div>
        </div>
    </section><!-- End section-category-landing -->
<?php } ?>
<section class="section-gallery-landing section-general-landing section-bg-pattern">
    <div class="container-box">
        <div class="row">
            <h2 class="title-landing-general title-landing-general-other">
                <p class="title-en">photo<br class="sp"> gallery</p>
                <?php if($isSmartPhone): ?>
                    <p class="title-sm">ご利用いただいたお客様のコーデをご紹介♪</p>
                <?php else: ?>
                    <p class="title-sm title-sm-white">きものレンタル wargo をご利用 いただお客様や<br/>コーディネートをご紹介いたします。</p>
                <?php endif; ?>
            </h2>
        </div>
    </div>
    <?php if($isSmartPhone): ?>
        <div class="container-box">
            <div class="row">
                <div class="wrap-slider-gallery-landing">
                    <?php echo do_shortcode('[WidgetPhotoGalleryTopPageV3]'); ?>
                    <div class="wrap-btn-gallery-landing flexbox justify-content-center">
                        <a class="link-to" href="<?php home_url(); ?>/gallery">お客様のコーディネートをもっと見る</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="wrap-slider-gallery-landing">
            <?php echo do_shortcode('[WidgetPhotoGalleryTopPageV3]'); ?>
            <div class="wrap-btn-gallery-landing flexbox justify-content-center">
                <a class="link-to" href="<?php home_url(); ?>/gallery">お客様のコーディネートをもっと見る</a>
            </div>
        </div>
    <?php endif; ?>
</section><!--end section-gallery-landing-->
<section class="section-spot-ranking section-general-landing">
    <div class="container-box">
        <div class="row">
            <h2 class="title-landing-general title-landing-general-other">
                <p class="title-en">kyoto spot ranking</p>
                <p class="title-sm title-sm-other">着物で散策なら絶対に外せない！</p>
            </h2>
            <div class="wrap-info-spot-ranking">
                <div class="wrap-items-spot-ranking wrap-spot-ranking-01 flexbox">
                    <div class="wrap-img-spot-ranking">
                        <img src="<?php echo WP_HOME; ?>/images/landing-page/img-ranking-landing-01.jpg?ver=10012020" alt="">
                    </div>
                    <div class="wrap-content-spot-ranking">
                        <div class="wrap-title-content-spot flexbox">
                            <div class="ranking-icon ranking-icon-01"><p class="icon-fa icon-fa-01"></p></div>
                            <div class="ranking-sub-title">八坂庚申堂<var class="sm-text-ranking">(やさかこうしんどう)</var></div>
                        </div>
                        <div class="wrap-des-spot-ranking">
                            <p class="des-spot-ranking">祇園で今一番アツいSNSスポット!カラフルなお手玉のような「くくり猿」 という願掛けのお守りがたくさん連なるスポットが、この八坂庚申堂(やさかこうしんどう)カラフルなくくり猿に囲まれて写真を撮るだけでインスタ映え間違いなし!?</p>
                        </div>
                        <div class="wrap-relate-spot-ranking">
                            <p class="text-relate">八坂庚申堂から近い店舗</p>
                            <ul class="list-button-relate flexbox">
                                <li class="items-button-relate">
                                    <a href="<?php echo WP_HOME; ?>/access/kyoto-area/gion-area/gion-shijo"><p class="text-link-shop">祇園四条店</p></a>
                                </li>
                                <?php if(!$isSmartPhone){?>
                                    <li class="items-button-relate color-red">
                                        <a href="/#"><p class="text-link-shop">その他の店舗</p></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="wrap-items-spot-ranking wrap-spot-ranking-02 flexbox">
                    <?php if($isSmartPhone) { ?>
                        <div class="wrap-img-spot-ranking">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-ranking-landing-02.jpg?ver=10012020" alt="">
                        </div>
                    <?php } ?>
                    <div class="wrap-content-spot-ranking">
                        <div class="wrap-title-content-spot flexbox">
                            <div class="ranking-icon ranking-icon-02"><p class="icon-fa icon-fa-02"></p></div>
                            <div class="ranking-sub-title">キモノフォレスト</div>
                        </div>
                        <div class="wrap-des-spot-ranking">
                            <p class="des-spot-ranking">嵐山駅を降りた所に広がる、キモノフォレスト。このポールの中には京友禅 の生地が入っており色鮮やかな景色があなたをお迎え!夜はライトアップも されるので、昼でも夜でも楽しめるのが魅力。ゆったり着物を着て散歩をしてみてはいかがでしょうか。</p>
                        </div>
                        <div class="wrap-relate-spot-ranking">
                            <p class="text-relate">キモノフォレストから近い店舗</p>
                            <ul class="list-button-relate flexbox">
                                <li class="items-button-relate">
                                    <a href="<?php echo WP_HOME; ?>/access/kyoto-area/arashiyama-area/arashiyama"><p class="text-link-shop">嵐山駅前店</p></a>
                                </li>
                                <li class="items-button-relate">
                                    <a href="<?php echo WP_HOME; ?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo"><p class="text-link-shop">嵐山渡月橋店</p></a>
                                </li>
                                <?php if(!$isSmartPhone){?>
                                    <li class="items-button-relate color-red">
                                        <a href="/#"><p class="text-link-shop">その他の店舗</p></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php if(!$isSmartPhone) { ?>
                        <div class="wrap-img-spot-ranking">
                            <img src="<?php echo WP_HOME; ?>/images/landing-page/img-ranking-landing-02.jpg?ver=10012020" alt="">
                        </div>
                    <?php } ?>
                </div>
                <div class="wrap-items-spot-ranking wrap-spot-ranking-03 flexbox">
                    <div class="wrap-img-spot-ranking">
                        <img src="<?php echo WP_HOME; ?>/images/landing-page/img-ranking-landing-03.jpg" alt="">
                    </div>
                    <div class="wrap-content-spot-ranking">
                        <div class="wrap-title-content-spot flexbox">
                            <div class="ranking-icon ranking-icon-03"><p class="icon-fa icon-fa-03"></p></div>
                            <div class="ranking-sub-title">清水寺<var class="sm-text-ranking">(きよみずでら)</var></div>
                        </div>
                        <div class="wrap-des-spot-ranking">
                            <p class="des-spot-ranking">京都でも屈指の人気観光スポット！一年中多くの人が訪れています。清水寺自体ももちろんのこと、近年では周辺にもおしゃれカフェやスイーツ店が多く賑わってます♪<br>定番スポットだからこそ、着物でばっちりおめかししちゃおう！</p>
                        </div>
                        <div class="wrap-relate-spot-ranking">
                            <p class="text-relate">清水寺から近い店舗</p>
                            <ul class="list-button-relate flexbox">
                                <li class="items-button-relate">
                                    <a href="<?php echo WP_HOME; ?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka"><p class="text-link-shop">京都清水坂店</p></a>
                                </li>
                                <li class="items-button-relate">
                                    <a href="<?php echo WP_HOME; ?>/access/kyoto-area/kiyomizu-area/chawanzaka"><p class="text-link-shop">清水寺茶わん坂店店</p></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End section-spot-ranking -->
<section class="section-faq-landing section-general-landing">
    <div class="container-box">
        <div class="row">
            <h2 class="title-landing-general title-landing-general-other">
                <p class="title-en">faq</p>
                <p class="title-sm">皆様からいただけるよくあるご質問</p>
            </h2>
            <div class="wrap-faq-landing-page">
                <div class="content-fm-maedori">
                    <div class="box-faqs-item-container items one">
                        <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                            <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">何か持っていくものはありますか？</p>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                            </div>
                        </div>
                        <div class="box-faqs-item-content first"><p class="text-item-content">特にございません。 着物用の下着や足袋、 草履などはプランに含まれています。 京都の冬は大変冷え込みます、 ご心配の方は襟元の開いた薄手のTシャツをお持ちいただければその上から着付けさせていただきます。</p></div>
                    </div>
                    <div class="box-faqs-item-container items">
                        <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                            <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">キャンセルについて教えてください</p>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                            </div>
                        </div>
                        <div class="box-faqs-item-content">
                            <p class="text-item-content">
                                キャンセルの場合はご来店予定日の二日前までご予約確認メールにある項目3「ご予約プランの詳細」リンクからキャンセルをお願い致します。<br/>
                                ただし下記のキャンセル料金が発生いたしますのでご了承ください。<br/>
                                ご利用日］から2日前までのキャンセル：キャンセル料無料<br/>
                                ※事務手数料500円(税別)のみ頂きます<br/>
                                ［ご利用日］の前日および当日のキャンセル：ご利用料金の100％
                            </p>
                        </div>
                    </div>
                    <div class="box-faqs-item-container items">
                        <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                            <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">髪はセットしてもらえますか？</p>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                            </div>
                        </div>
                        <div class="box-faqs-item-content"><p class="text-item-content">かんざしを用いた簡単なヘアアレンジを無料で、編みこみで華やかさを演出できるヘアアレンジを有料で承っております。詳しくは、<a href="<?php echo WP_HOME; ?>/kimono/hairset">着物の髪型・ヘアセット</a>をご覧ください。</p></div>
                    </div>
                    <div class="box-faqs-item-container items">
                        <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                            <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">どれくらいの時間がかかりますか？</p>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                            </div>
                        </div>
                        <div class="box-faqs-item-content"><p class="text-item-content">通常、所要時間は1時間程度です。ただし、春や秋の混雑時期は少しお待ちいただく場合がありますので予めご了承ください。当日の流れは<a href="<?php echo WP_HOME; ?>/howto">『レンタルの流れ』</a>をご覧ください</p></div>
                    </div>
                    <div class="box-faqs-item-container items">
                        <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                            <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">どのプランにするか決められません</p>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                            </div>
                        </div>
                        <div class="box-faqs-item-content"><p class="text-item-content">当日にプランの変更が可能です。お悩みでしたら1番お安いプランでご予約頂き、変更された場合は差額分のお支払いを店頭にてお願い致します。</p></div>
                    </div>
                </div>
                <div class="wrap-button-link-page flexbox">
                    <div class="wrap-button-link wrap-button-link-left">
                        <a class="text-button-link-page" href="<?php echo WP_HOME; ?>/kimono">着物レンタルプラン一覧</a>
                    </div>
                    <div class="wrap-button-link wrap-button-link-right">
                        <a class="text-button-link-page" href="#">店舗別の空き状況をチェック</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--end section-faq-top-->
<section class="section-search-landing section-general-landing">
    <div class="container-box">
        <div class="row">
            <div class="wrap-search-landing">
                <h2 class="title-landing-general title-landing-general-other white-title-color">
                    <p class="title-en">search</p>
                    <p class="title-sm">冠婚葬祭など、人生の大切なシーンにお着物を。<br/>カンタン検索でお気に入りのお着物を探そう</p>
                </h2>
                <div class="widget-search-products-landing-page" style="background-color: #fff;">
                    <?php echo do_shortcode('[WidgetSearchFormalForKimonoLandingPage]'); ?>
                </div>
            </div>
        </div>
    </div>
</section><!--end section-search-landing-->

<?php if($isSmartPhone): ?>
    <div class="wrap-btn-bottom flexbox">
        <a class="btn-bottom btn-01" href="<?= home_url() ?>/kimono">
            <span class="icon"></span>
            <p class="txt">
                <span class="sm-txt">手ぶらで気軽に♪</span>
                <span class="lg-txt">レンタルプラン</span>
            </p>
        </a>
        <a class="btn-bottom btn-02" href="<?= home_url() ?>/kimono">
            <span class="icon"></span>
            <p class="txt">
                <span class="sm-txt">今すぐカンタン！</span>
                <span class="lg-txt">Web予約</span>
            </p>
        </a>
    </div>
<?php else: ?>
    <a class="btn-bottom" href="<?= home_url() ?>/kimono">
        <span class="icon"></span>
        <p class="txt">
            <span class="sm-txt">今すぐカンタン！</span>
            <span class="lg-txt">Web予約</span>
        </p>
    </a>
<?php endif; ?>

<?php get_footer('new-kimono-landing-page'); ?>
<script>
    $(document).ready(function(){
        //Slider option
        $('#slider-option').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            autoplay: false,
            responsive: [
                {
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: false,
                        centerMode: true,
                        centerPadding: '60px',
                        dots: true,
                        arrows: true,
                    }
                }
            ]
        });

        //Slider photo gallery
        if(isSmartPhone()){
            $('#slider-photo-gallery').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '20%',
                autoplay: false,
                dots: true,
                arrows: false
            });
        }
        if(isSmartPhone()){
            $('.section-list-image .list-img').slick({
                infinite: false,
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true,
                arrows: false
            });
        }
        $('[data-sub-shop]').click(function(){
            var self    = this;
            var target  = $(self).data('sub-shop');
            var $other  = $('[data-sub-shop="'+target+'"]');
            if(target){
                $other.each(function(index, el){
                    if(el !== self){
                        $(el).siblings(target).slideUp();
                        $(el).parent().find('.text-shop-wg-dropdown').removeClass('active');
                    }else{
                        $(self).siblings(target).slideToggle();
                        $(self).parent().find('.text-shop-wg-dropdown').toggleClass('active');
                    }
                });
            }
        });

        //Toggle faq
        $('.box-faqs-item .box-faqs-title').click(function(){
        	$(this).toggleClass('active');
        	$(this).parent().next().slideToggle('fast');
        });

		// Category default close
		$('.section-category').find('.wrap-category, .title-general').addClass('active');
		$('.section-category .wrap-category:not(.conditions) .box-category').hide();

        //Toggle shop list
        if(isSmartPhone()){
			$('.wrap-shop-list-kimono-landing .choose-store').click(function(){
			    var contentShop = $(this).parent().find('.wrap-tab-shop');
				$(this).toggleClass('active');
                contentShop.slideToggle('fast');
                //Open close default
                contentShop.find('.lbl-item-shop').removeClass('active');
                contentShop.find('.wrap-content-tab').slideUp();
			});
			$('.item-shop:not(.other) .lbl-item-shop').click(function(){
				$(this).toggleClass('active');
				$(this).parent().find('.wrap-content-tab').slideToggle('fast');
			});
        } else {
        	$('.list-shop .item-shop').click(function(){
                var shop = $(this).attr('data-id')
                var activeShop = $(this).closest('.wrap-shop-list-kimono-landing').find('#' + shop);
                activeShop.show();
                activeShop.siblings('.wrap-content-tab').hide();
				$(this).addClass('active');
				$(this).siblings().removeClass('active');
			});
			$('.list-shop .item-shop:first').click();

		}

        //Show shop info popup
        $('.button-map').click(function(){
            var shopTarget = $(this).attr('data-target');
			$('html').addClass('fixed-body');
            $('#wrap-shoplist-popup').find('.shop-info-content[data-shop="'+ shopTarget + '"]').addClass('show');
			$('#wrap-shoplist-popup').find('.shop-info-content[data-shop!="'+ shopTarget + '"]').removeClass('show');
			$('#wrap-shoplist-popup').fadeIn('fast');
        });
		$(document).click(function(e){
			if(!$(e.target).closest('.button-map, .shop-info-content').length){
				$('html').removeClass('fixed-body');
				$('#wrap-shoplist-popup').fadeOut('fast');
				$('#wrap-shoplist-popup').find('.shop-info-content').removeClass('show');
			}
		});
        $('.button-close').click(function(){
            $('html').removeClass('fixed-body');
            $('#wrap-shoplist-popup').fadeOut('fast');
            $('#wrap-shoplist-popup').find('.shop-info-content').removeClass('show');
        });

    })

</script>






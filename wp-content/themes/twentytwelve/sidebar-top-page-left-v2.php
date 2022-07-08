<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 2/28/2018
 * Time: 3:52 PM
 */
?>
<?php
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
?>
<div class="left-column hidden-sidebar">
    <?php echo do_shortcode('[HowtoSidebarLeft pc="true"]'); ?>
    <?php echo do_shortcode('[TopicsBannerSidebarLeft]'); ?>
    <?php echo do_shortcode('[SightSeeingSidebarLeft]'); ?>
    <?php echo do_shortcode('[CeremonialSidebarLeft]'); ?>
    <?php echo do_shortcode('[ShopListNewKimono]'); ?>
    <div class="wrap-category wrap-new-kimono-sidebar-left scene">
        <div class="title-general text-center title-general-new-style kimono yukata-contest" data-collapse-cate=".collapse-cate">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img class="lazy" data-src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', 'シーン'); ?></span>
                <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?= home_url()?>/kimono"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '観光・お散歩'); ?></span></a><span class="arrow"></span></div>
                </li>
                <li id="party" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/party"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', 'パーティー'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="wedding" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/wedding"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '結婚式'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="sotsugyoushiki" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/sotsugyoushiki"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '卒業式'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="seijinshiki" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/seijinshiki"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '成人式'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="shichigosan" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/shichigosan"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '七五三'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/nyugakushiki"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '入学式'); ?></span></a><span class="arrow"></span></div>
                </li>
                <li id="omiyamairi" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/omiyamairi"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', 'お宮参り'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="wrap-category wrap-new-kimono-sidebar-left preview" >
        <?php defined('ENABLE_FORMAL_PREVIEW_POPUP') or define('ENABLE_FORMAL_PREVIEW_POPUP', true);?>
        <div class="title-general text-center title-general-new-style kimono-blur yukata-contest" data-collapse-cate=".collapse-cate">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img class="lazy" data-src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '下見'); ?></span>
                <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center box-category-preview"><a href="<?=WP_HOME?>/formal/preview"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', 'お下見ガイド・ご予約'); ?></span></a><span class="arrow"></span></div>
                </li>
            </ul>
        </div>
    </div>
    <?php echo do_shortcode('[WidgetSearchFormalForTopPage]'); ?>
    <div class="wrap-topics-banner-widget wrap-topics-banner-kimono-widget">
        <div class="wrap-list-banner">
            <ul class="list-banner flexbox ">
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="<?= WP_HOME; ?>/recruitment"><img class="lazy" data-src="<?= WP_HOME; ?>/images/new-kimono/banner-recruitment-sidebar-left<?php echo ($language == 'ja') ? "" : "-$language"?>.jpg" alt="<?php echo Yii::t('new-sidebar-left-v2', '京都きものレンタルwargo求人情報'); ?>"></a>
                    </div>
                </li>
                <li class="item-banner">
                    <div class="wrap-text-banner-araibar">
                        <a class="link-top-araibar"  target="_blank" href="https://araiba.net/cleaning">
                            <img class="lazy" data-src="<?= WP_HOME ?>/images/new-kimono-v3/araibabanner-kimono-min.jpg?ver=20200305" alt="着物クリーニング＆保管サービス「アライバ」OPEN!">
                            <p class="text-araibar">着物クリーニング＆保管サービス「アライバ」OPEN!</p>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
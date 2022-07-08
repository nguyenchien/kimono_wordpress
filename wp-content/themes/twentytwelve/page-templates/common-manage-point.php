<?php
/**
 * Template Name: New Common Manage Point
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
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}

get_header('new-kimono');
wp_register_style('new-common-style', get_template_directory_uri() . '/css/new-common.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-style');
wp_register_style('new-common-manage-style', get_template_directory_uri() . '/css/new-common-manage.css', array('twentytwelve-style'), time());
wp_enqueue_style('new-common-manage-style');
//wp_enqueue_script('new-common-script', get_template_directory_uri() . '/js/new-common.js');
wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;

// check login, if member did't logged redirect to login page
if (Yii::app()->member_user->isGuest) {
    $loginUrl = home_url().'/common/login';
    wp_redirect($loginUrl);
}
?>

<div id="app">
    <div class="cm-loading">
        <span class="loader"></span>
    </div>
</div>
<template id ="manage-point-vue" style ="display:none">
    <div class="container-box clearfix">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
        }
        ?>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box rendered">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column left-column-new-kimono  pc">
                                    <?php include("common-sidebar.php"); ?>
                            </div><!--end left-column-->

                            <div class="right-column right-column-list right-column-list-new-kimono">

                                    <div class="wrap-cm-user">
                                        <div class="wrap-user-content" data-view-source="wargo-point">
                                            <div class="box-user-content point-box" id="manage-point">
                                                <div class="main-page-title flexbox">
                                                    <span class="icon">
                                                        <img src="<?php echo WP_HOME;?>/images/icon-user.svg">
                                                    </span>
                                                    <span class="lg-txt">My Page</span>
                                                    <span class="sm-txt">マイページ</span>
                                                </div>
                                                <?php if($isSmartPhone):?>
                                                    <div class="wrap-show-content sp" style="display: block;">
                                                        <?php include("common-sidebar.php"); ?>
                                                    </div>
                                                <?php endif?>
                                                <h2 class="title-cm-user">
                                                    <?php echo Yii::t('new-common', 'wargoポイントの確認') ?>
                                                </h2>
                                                <div class="box-info-item available-point">
                                                    <h3 class="user-name-info"><?php echo Yii::t('new-common', 'ご利用可能ポイント') ?></h3>
                                                    <ul class="list-info-content">
                                                        <li><span class="pt">{{totalPoint}}pt</span></li>
                                                    </ul>
                                                </div>
                                                <div class="box-info-item used-point">
                                                    <h3 class="user-name-info"><?php echo Yii::t('new-common', '使用履歴') ?></h3>
                                                    <ul class="list-info-content">

                                                        <li v-for="history in formatedHistory">
                                                            <p class="left-point-text">
                                                                <span>{{history.create_time_display}}</span>
                                                                <span><a :href="history.book_detail_href" style="color: #5f9bc4;"><?php echo Yii::t('new-common', '【予約ID】') ?>{{history.book_id}}（{{history.book.total_plan_money|formatMoney}}）</a></span>
                                                            </p>
                                                            <p class="right-point-text">{{history.points}}<?php echo Yii::t('new-common', 'ポイント') ?></p>
                                                        </li>
                                                        <button type="button" v-on:click="loadMoreItems()" v-show="canLoadMore"><?php echo Yii::t('new-common', 'Load more') ?></button>
                                                    </ul>
                                                    <div class="wrap-link-btn">
                                                        <a id="btn-point" href="javascript:void(0)" class="btn-cm cm-color-pink link" v-on:click="showPopupPoint()">
                                                            <?php echo Yii::t('new-common', 'wargoポイントとは?') ?>
                                                        </a>
                                                        <p v-bind:class="flagShowPopupPoint ? 'bubble show' : 'bubble' ">
                                                            <?php echo Yii::t('new-common', '会員のお客様には、お買上金額の5%を還元いたします。1ポイント1円引きとしてご利用いただけます。') ?>
                                                            <span class="arrow-before"></span>
                                                            <span class="arrow-after"></span>
                                                        </p>
                                                    </div>
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
</template>
<!-- <script src="<?=WP_HOME?>/js/vue/lib/require.js"></script> -->
<!-- <script src="<?=WP_HOME?>/js/vue/common-mange-point.js"></script> -->
<?php get_vue_js('common-manage-point'); ?>
<?php get_footer('new-kimono'); ?>



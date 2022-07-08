<?php
/**
 * Template Name: New Common History Booking
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

// Get page parent's slug
global $post, $language;
$language = Yii::app()->language;
$cssLanguage = "";
$otherLanguage="";
if($language != "ja"){
    $cssLanguage = "-".$language;
    $otherLanguage='/'.$language;
}
$baseUrl = Yii::app()->baseUrl.$otherLanguage;
get_header('new-kimono');
wp_register_style('new-common-style', get_template_directory_uri() . '/css/new-common.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-style');
wp_register_style('new-common-manage-style', get_template_directory_uri() . '/css/new-common-manage.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-manage-style');
wp_enqueue_script('new-common-script', get_template_directory_uri() . '/js/common-history-tab.js');
wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');

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
<template id="history-booking" style="display:none">
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
                                <div class="left-column left-column-new-kimono hidden-sidebar">
                                    <?php include("common-sidebar.php"); ?>
                                </div><!--end left-column-->

                                <div class="right-column right-column-list right-column-list-new-kimono">
                                    <div class="wrap-cm-user">
                                        <div class="wrap-user-content">
                                            <div class="main-page-title flexbox">
                                            <span class="icon">
                                                <img src="<?php echo WP_HOME;?>/images/icon-user.svg">
                                            </span>
                                                <span class="lg-txt">My Page</span>
                                                <span class="sm-txt">マイページ</span>
                                            </div>
                                            <?php if($isSmartPhone):?>
                                                <div class="wrap-show-content sp" style="display: block">
                                                    <?php include("common-sidebar.php"); ?>
                                                </div>
                                            <?php endif ?>
                                            <h2 class="title-cm-user">
                                                <?php echo Yii::t('new-common', 'レンタル履歴') ?>
                                            </h2>
                                            <div class="wrap-filter flexbox">
                                                <div class="tab-order flexbox">
                                                    <a class="tab-item history-booking active" href="#ordered"><?php echo Yii::t('new-common', 'ご注文済み商品') ?></a>
                                                    <a class="tab-item history-booking" href="#order"><?php echo Yii::t('new-common', 'ご予約中の商品') ?></a>
                                                </div>
                                                <div class="wrap-pd-search flexbox align-items-center">
                                                    <div class="pd-search-form flexbox justify-content-center">
                                                        <input type="text" class="search-input plan-type-name" placeholder="<?php echo Yii::t('new-common', 'フリーワード検索') ?>">
                                                        <button type="submit" class="submit-btn free-search-booking" :class="hisBookingHash">
                                                            <span class="icon-formal-search"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-user-content history-box" id="history">
                                                <historybookingordered></historybookingordered>
                                                <template id="history-booking-ordered-el">
                                                    <div class="box-info-item" id="ordered">
                                                        <div class="box-info-header">
                                                            <ul class="flexbox">
                                                                <li><?php echo Yii::t('new-common', 'Booking Time') ?></li>
                                                                <li><?php echo Yii::t('new-common', '商品写真') ?></li>
                                                                <li><?php echo Yii::t('new-common', '商品') ?></li>
                                                                <li><?php echo Yii::t('new-common', 'オプション') ?></li>
                                                                <li><?php echo Yii::t('new-common', '小計') ?></li>
                                                            </ul>
                                                        </div>
                                                        <div class="wrap-order-content">
                                                            <?php if($isSmartPhone) : ?>
                                                                <ul class="list-info-content">
                                                                    <li v-for="item in historyBookDataOrderedFormated" class="cm-order-item">
                                                                        <div class="wrap-pd-img">
                                                                            <a v-if="item.product_id == -1" class="wrap-pd">
                                                                                <img src="<?php echo WP_HOME;?>/images/no-image.png">
                                                                            </a>
                                                                            <a v-else class="wrap-pd">
                                                                                <img :src="`${item.product.main_thumb_image}`"/>
                                                                            </a>
                                                                            <div class="wrap-link-btn">
                                                                                <a v-if="item.product_id == -1" href="<?php echo $baseUrl?>/kimono" class="link view-detail" target="_blank"><?php echo Yii::t('new-common', 'もう一度注文する') ?></a>
                                                                                <a v-else :href="`<?php echo $baseUrl?>/formal/product/${item.product_id}`" class="link view-detail" target="_blank"><?php echo Yii::t('new-common', 'もう一度注文する') ?></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-product-desc">
                                                                            <div class="wrap-time flexbox">
                                                                                <div class="title-time"><?php echo Yii::t('new-common', 'Booking Time') ?></div>
                                                                                <div v-if="item.plan.book.book_type == 2" class="info-time flexbox">
                                                                                    <span><?php echo Yii::t('new-common', 'お届け日:') ?></span>
                                                                                    <span>{{item.arrival_date|date}}</span>
                                                                                    <br/>
                                                                                    <span><?php echo Yii::t('new-common', '予約日時:') ?></span>
                                                                                    <span>{{item.taku_booking_date|date}}</span>
                                                                                </div>
                                                                                <div v-else class="info-time flexbox">
                                                                                    <span><?php echo Yii::t('new-common', '予約日時:') ?></span>
                                                                                    <span>{{item.booking_hour|date}}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div v-if="item.plan.book.book_type == 2" class="wrap-pd-name">
                                                                                <h3 class="cm-pd-name">{{item.plan.plan_type.plan_type_name}}</h3>
                                                                            </div>
                                                                            <div v-else class="wrap-pd-name">
                                                                                <h3 class="cm-pd-name">{{item.plan.plan_type.plan_type_name}}</h3>
                                                                                <span v-if="item.plan.book.payment_method == 0" class="cm-pd-price">{{(item.plan_price)|formatMoney}}+tax</span>
                                                                                <span v-else class="cm-pd-price">{{(item.plan_price_reduced)|formatMoney}}+tax</span>
                                                                            </div>
                                                                            <ul class="cm-option-list">
                                                                                <li v-for="option_item in item.cus_option">
                                                                                    <span class="option-name">{{option_item.option_data.option_name}}</span>
                                                                                    <span class="cm-pd-price">{{option_item.total_price|formatMoney}}+tax</span>
                                                                                </li>
                                                                                <li v-for="extra_item in item.cus_extra_fee">
                                                                                    <span class="option-name">{{extra_item.extra_fee_name}}</span>
                                                                                    <span class="cm-pd-price">{{extra_item.total_price|formatMoney}}+tax</span>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="wrap-total-price">
                                                                                <span class="total-text"><?php echo Yii::t('new-common', '小計') ?></span>
                                                                                <div class="total-price-column flexbox">
                                                                                    <span v-if="item.plan.book.payment_method == 0" class="cm-total-price">{{item.total_price_cus|formatMoney}}+tax</span>
                                                                                    <span v-else class="cm-total-price">{{item.total_price_reduced_cus|formatMoney}}+tax</span>
                                                                                    <span v-if="item.plan.book.booking_status == 2" class="cm-total-price booking-cancel"><?php echo Yii::t('new-common', '(canceled)') ?></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="wrap-order-btn">
                                                                                <a v-if="item.plan.book.book_type == 2" :href="`<?php echo $baseUrl?>/formal/takuhaiOrderDetail?token=${item.plan.book.secret_key}`" class="re-order" target="_blank"><?php echo Yii::t('new-common', '詳細を見る') ?></a>
                                                                                <a v-else-if="item.plan.book.book_type == 1 && item.plan.book.flow_type == 2" :href="`<?php echo $baseUrl?>/formal/orderDetail?token=${item.plan.book.secret_key}`" class="re-order" target="_blank"><?php echo Yii::t('new-common', '詳細を見る') ?></a>
                                                                                <a v-else :href="`<?php echo $baseUrl?>/newBooking/orderDetail?token=${item.plan.book.secret_key}`" class="re-order" target="_blank"><?php echo Yii::t('new-common', '詳細を見る') ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            <?php else: ?>
                                                                <ul class="list-info-content">
                                                                    <li v-for="item in historyBookDataOrderedFormated" class="cm-order-item">
                                                                        <div v-if="item.plan.book.book_type == 2" class="wrap-ct-time flexbox">
                                                                            <span><?php echo Yii::t('new-common', 'お届け日:') ?></span>
                                                                            <span>{{item.arrival_date|date}}</span>
                                                                            <br/>
                                                                            <span><?php echo Yii::t('new-common', '予約日時:') ?></span>
                                                                            <span>{{item.taku_booking_date|date}}</span>
                                                                        </div>
                                                                        <div v-else class="wrap-ct-time flexbox">
                                                                            <span><?php echo Yii::t('new-common', '予約日時:') ?></span>
                                                                            <span>{{item.booking_hour|date}}</span>
                                                                        </div>
                                                                        <div class="wrap-pd-img">
                                                                            <a v-if="item.product_id == -1" class="wrap-pd">
                                                                                <img src="<?php echo WP_HOME;?>/images/no-image.png">
                                                                            </a>
                                                                            <a v-else class="wrap-pd">
                                                                                <img :src="`${item.product.main_thumb_image}`"/>
                                                                            </a>
                                                                            <div class="wrap-order-btn">
                                                                                <a v-if="item.product_id == -1" href="<?php echo $baseUrl?>/kimono" class="re-order" target="_blank"><?php echo Yii::t('new-common', 'もう一度注文する') ?></a>
                                                                                <a v-else :href="`<?php echo $baseUrl?>/formal/product/${item.product_id}`" class="re-order" target="_blank"><?php echo Yii::t('new-common', 'もう一度注文する') ?></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-product-desc flexbox">
                                                                            <div v-if="item.plan.book.book_type == 2" class="wrap-pd-name">
                                                                                <h3 class="cm-pd-name">{{item.plan.plan_type.plan_type_name}}</h3>
                                                                            </div>
                                                                            <div v-else class="wrap-pd-name">
                                                                                <h3 class="cm-pd-name">{{item.plan.plan_type.plan_type_name}}</h3>
                                                                                <span v-if="item.plan.book.payment_method == 0" class="cm-pd-price">{{(item.plan_price)|formatMoney}}+tax</span>
                                                                                <span v-else class="cm-pd-price">{{(item.plan_price_reduced)|formatMoney}}+tax</span>
                                                                            </div>
                                                                            <ul class="cm-option-list">
                                                                                <li v-for="option_item in item.cus_option">
                                                                                    <span class="option-name">{{option_item.option_data.option_name}}</span>
                                                                                    <span class="cm-pd-price">{{option_item.total_price|formatMoney}}+tax</span>
                                                                                </li>
                                                                                <li v-for="extra_item in item.cus_extra_fee">
                                                                                    <span class="option-name">{{extra_item.extra_fee_name}}</span>
                                                                                    <span class="cm-pd-price">{{extra_item.total_price|formatMoney}}+tax</span>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="wrap-total-price total-price-column">
                                                                                <span v-if="item.plan.book.payment_method == 0" class="cm-total-price">{{item.total_price_cus|formatMoney}}+tax</span>
                                                                                <span v-else class="cm-total-price">{{item.total_price_reduced_cus|formatMoney}}+tax</span>
                                                                                <span v-if="item.plan.book.booking_status == 2" class="cm-total-price booking-cancel"><?php echo Yii::t('new-common', '(canceled)') ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-link-btn">
                                                                            <a v-if="item.plan.book.book_type == 2" :href="`<?php echo $baseUrl?>/formal/takuhaiOrderDetail?token=${item.plan.book.secret_key}`" class="link view-detail" target="_blank"><?php echo Yii::t('new-common', '詳細を見る') ?></a>
                                                                            <a v-else-if="item.plan.book.book_type == 1 && item.plan.book.flow_type == 2" :href="`<?php echo $baseUrl?>/formal/orderDetail?token=${item.plan.book.secret_key}`" class="link view-detail" target="_blank"><?php echo Yii::t('new-common', '詳細を見る') ?></a>
                                                                            <a v-else :href="`<?php echo $baseUrl?>/newBooking/orderDetail?token=${item.plan.book.secret_key}`" class="link view-detail" target="_blank"><?php echo Yii::t('new-common', '詳細を見る') ?></a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            <?php endif; ?>
                                                            <div class="wrap-link-btn">
                                                                <button type="button" v-on:click="loadMoreItems()" v-show="canLoadMore" class="link see-more-orders"><?php echo Yii::t('new-common', 'もっと見る') ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                                <historybookingorder></historybookingorder>
                                                <template id="history-booking-order-el">
                                                    <div class="box-info-item closed" id="order">
                                                        <div class="box-info-header">
                                                            <ul class="flexbox">
                                                                <li><?php echo Yii::t('new-common', 'Booking Time') ?></li>
                                                                <li><?php echo Yii::t('new-common', '商品写真') ?></li>
                                                                <li><?php echo Yii::t('new-common', '商品') ?></li>
                                                                <li><?php echo Yii::t('new-common', 'オプション') ?></li>
                                                                <li><?php echo Yii::t('new-common', '小計') ?></li>
                                                            </ul>
                                                        </div>
                                                        <div class="wrap-order-content">
                                                            <ul class="list-info-content">
                                                                <li v-for="item in historyBookDataOrderFormated" class="cm-order-item">
                                                                    <div v-if="item.plan.book.book_type == 2" class="wrap-ct-time flexbox">
                                                                        <span><?php echo Yii::t('new-common', 'お届け日:') ?></span>
                                                                        <span>{{item.arrival_date|date}}</span>
                                                                        <br/>
                                                                        <span><?php echo Yii::t('new-common', '予約日時:') ?></span>
                                                                        <span>{{item.taku_booking_date|date}}</span>
                                                                    </div>
                                                                    <div v-else class="wrap-ct-time flexbox">
                                                                        <span><?php echo Yii::t('new-common', '予約日時:') ?></span>
                                                                        <span>{{item.booking_hour|date}}</span>
                                                                    </div>
                                                                    <div class="wrap-pd-img">
                                                                        <a v-if="item.product_id == -1" class="wrap-pd">
                                                                            <img src="<?php echo WP_HOME;?>/images/no-image.png">
                                                                        </a>
                                                                        <a v-else class="wrap-pd">
                                                                            <img :src="`${item.product.main_thumb_image}`"/>
                                                                        </a>
                                                                        <div class="wrap-order-btn">
                                                                            <a v-if="item.product_id == -1" href="<?php echo $baseUrl?>/kimono" class="re-order" target="_blank"><?php echo Yii::t('new-common', 'もう一度注文する') ?></a>
                                                                            <a v-else :href="`<?php echo $baseUrl?>/formal/product/${item.product_id}`" class="re-order" target="_blank"><?php echo Yii::t('new-common', 'もう一度注文する') ?></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="wrap-product-desc flexbox">
                                                                        <div v-if="item.plan.book.book_type == 2" class="wrap-pd-name">
                                                                            <h3 class="cm-pd-name">{{item.plan.plan_type.plan_type_name}}</h3>
                                                                        </div>
                                                                        <div v-else class="wrap-pd-name">
                                                                            <h3 class="cm-pd-name">{{item.plan.plan_type.plan_type_name}}</h3>
                                                                            <span v-if="item.plan.book.payment_method == 0" class="cm-pd-price">{{(item.plan_price)|formatMoney}}+tax</span>
                                                                            <span v-else class="cm-pd-price">{{(item.plan_price_reduced)|formatMoney}}+tax</span>
                                                                        </div>
                                                                        <ul class="cm-option-list">
                                                                            <li v-for="option_item in item.cus_option">
                                                                                <span class="option-name">{{option_item.option_data.option_name}}</span>
                                                                                <span class="cm-pd-price">{{option_item.total_price|formatMoney}}+tax</span>
                                                                            </li>
                                                                            <li v-for="extra_item in item.cus_extra_fee">
                                                                                <span class="option-name">{{extra_item.extra_fee_name}}</span>
                                                                                <span class="cm-pd-price">{{extra_item.total_price|formatMoney}}+tax</span>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="wrap-total-price total-price-column">
                                                                            <span v-if="item.plan.book.payment_method == 0" class="cm-total-price">{{item.total_price_cus|formatMoney}}+tax</span>
                                                                            <span v-else class="cm-total-price">{{item.total_price_reduced_cus|formatMoney}}+tax</span>
                                                                            <span v-if="item.plan.book.booking_status == 2" class="cm-total-price booking-cancel"><?php echo Yii::t('new-common', '(canceled)') ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="wrap-link-btn">
                                                                        <a v-if="item.plan.book.book_type == 2" :href="`<?php echo $baseUrl?>/formal/takuhaiOrderDetail?token=${item.plan.book.secret_key}`" class="link view-detail" target="_blank"><?php echo Yii::t('new-common', '詳細を見る') ?></a>
                                                                        <a v-else-if="item.plan.book.book_type == 1 && item.plan.book.flow_type == 2" :href="`<?php echo $baseUrl?>/formal/orderDetail?token=${item.plan.book.secret_key}`" class="link view-detail" target="_blank"><?php echo Yii::t('new-common', '詳細を見る') ?></a>
                                                                        <a v-else :href="`<?php echo $baseUrl?>/newBooking/orderDetail?token=${item.plan.book.secret_key}`" class="link view-detail" target="_blank"><?php echo Yii::t('new-common', '詳細を見る') ?></a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <div class="wrap-link-btn">
                                                                <button type="button" v-on:click="loadMoreItems()" v-show="canLoadMore" class="link see-more-orders"><?php echo Yii::t('new-common', 'もっと見る') ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
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

    </div>
</template>
<?php get_vue_js('common-history-booking'); ?>
<?php get_footer('new-kimono'); ?>



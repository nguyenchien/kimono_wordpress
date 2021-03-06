<?php
/**
 * Template Name: New Kimono Popup
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
get_header('new-kimono');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('google-map', get_template_directory_uri() . '/js/google-map.js');
wp_register_style('new-kimono-plan-list-style', get_template_directory_uri() . '/css/new-kimono-plan-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-plan-list-style');
wp_register_style('new-formal-popup', get_template_directory_uri() . '/css/new-formal-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-popup');
wp_register_style('new-kimono-popup', get_template_directory_uri() . '/css/new-kimono-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-popup');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post, $language;
$postName = $post->post_name;
$language = Yii::app()->language;
?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
    }
    ?>

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column left-column-new-kimono hidden-sidebar">
                                <?php get_sidebar('top-page-left') ?>
                            </div>

                            <div class="right-column right-column-list right-column-list-new-kimono">

                                <!-- Template Popup Choose Plan -->
                                <div id="wrapBookingFlow" class="wrap-booking-flow wrap-booking-flow-overflow wrap-booking-flow-new-kimono" style="display: flex !important;">
                                    <form id="formBookingFlow" class="form-booking-flow" action="#">
                                        <div class="booking-flow-inner">
                                            <div class="booking-flow-title">
                                                <a id="backStep" class="btn-link-step btn-back-step" href="javascript:void(0);"><span class="icon icon-formal-arrow-back"></span>?????????</a>
                                                <h3 class="title-step">?????????????????????</h3>
                                                <a id="closeStep" class="btn-link-step btn-close-step" href="javascript:void(0);"><span class="icon icon-formal-popup-close"></span>?????????</a>
                                            </div>
                                            <div class="wrap-content-popup">
                                                <div class="wrap-choosing-breadcrumb">
                                                    <div class="choosing-status">
                                                        <p class="choosing-text pc">????????????</p>
                                                        <ul class="list-choosing flexbox">
                                                            <li class="plan flexbox align-items-center"><span class="icon icon-formal-checked-1"></span>???????????????????????????</li>
                                                            <li class="num-person flexbox align-items-center"><span class="icon icon-formal-checked-1"></span>2???</li>
                                                            <li class="shop flexbox align-items-center"><span class="icon icon-formal-checked-1"></span>????????????????????????????????????????????????</li>
                                                            <li class="time flexbox align-items-center"><span class="icon icon-formal-checked-1"></span><p class="wrap-time"><span class="date">3/9</span><span class="hour">12:00~</span></p></li>
                                                        </ul>
                                                    </div>
                                                    <div class="booking-flow-breadcrumb">
                                                        <span class="step-breadcrumb active">????????????????????????</span>
                                                        <span class="step-breadcrumb">???????????????????????????</span>
                                                        <span class="step-breadcrumb">?????????????????????</span>
                                                    </div>
                                                </div>
                                                <div class="booking-flow-content">

                                                    <div class="wrap-filter-widget-pl section-search-plans">
                                                        <div class="row">
                                                            <h2 class="title-filter-wg-pl">??????????????????</h2>
                                                            <div class="box-filter-wg-pl">
                                                                <ul class="list-filter-wg-pl flexbox">
                                                                    <li class="item-shop flexbox justify-content-center align-items-center"> <input type="checkbox" name="shop" class="hidden"> <label class="shop-name flexbox">?????????????????????</label></li>
                                                                    <li class="item-shop flexbox justify-content-center align-items-center"> <input type="checkbox" name="shop" class="hidden"> <label class="shop-name flexbox">???????????????</label></li>
                                                                    <li class="item-shop flexbox justify-content-center align-items-center"> <input type="checkbox" name="shop" class="hidden"> <label class="shop-name flexbox">????????????</label></li>
                                                                    <li class="item-shop flexbox justify-content-center align-items-center"> <input type="checkbox" name="shop" class="hidden"> <label class="shop-name flexbox">??????????????????</label></li>
                                                                    <li class="item-shop item-search">
                                                                        <div class="wrap-search-wg-pl flexbox">
                                                                            <select name="plan_group" class="sl-search-plan-group">
                                                                                <option value="">???????????????</option>
                                                                                <option value="0">??????????????????????????????</option>
                                                                                <option value="1">?????????????????????</option>
                                                                                <option value="2">??????????????????</option>
                                                                                <option value="3">?????????????????????</option>
                                                                                <option value="4">??????????????????????????????</option>
                                                                            </select>
                                                                            <button type="submit" class="btn-search-wg-pl"><span class="icon icon-formal-search"></span></button>
                                                                        </div>
                                                                    </li>
                                                                    <li class="item-shop no-border item-show-total-plan">14plans</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="section-plans-list">
                                                        <p class="notice-about-plans">???????????????????????????????????? ??? ??? ??? ??? ??? ??? ????????? ??? ??? ??? ??? ??? ??? ??????</p>
                                                        <div class="wrap-plans-list-new-kimono">
                                                            <div class="plan-item">
                                                                <div class="plan-image">
                                                                    <img src="<?= WP_HOME; ?>/images/new-kimono/img-plan-01.jpg" alt="" />
                                                                </div>
                                                                <div class="wrap-plan-info">
                                                                    <p class="plan-name">???????????????????????? ???</p>
                                                                    <div class="wg-webpirce-box wrap-plan-prices flexbox">
                                                                        <div class="box-webprice">
                                                                            <p class="web">web</p>
                                                                            <p class="bt-text"><span class="lg-text">??????</span><span class="sm-text">???</span></p>
                                                                        </div>
                                                                        <div class="box-price">
                                                                            <p class="sm-price">??3,500- ???</p>
                                                                            <p class="lg-pirce">??2,900-<span class="sm-sub-price">??????</span></p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="plan-description">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????</p>
                                                                    <div class="wrap-corresponding-store-wg wrap-correspond-store">
                                                                        <h3 class="title-corresponding-store">????????????</h3>
                                                                        <div class="wrap-link-more-wg"> <a href="#" class="btn-link-more">????????????????????????</a></div>
                                                                    </div>
                                                                    <div class="wrap-choose-sl-wg wrap-choose-person flexbox">
                                                                        <div class="wraper-sl flexbox">
                                                                            <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                                                <div class="wraper-sl-choose-pepple flexbox">
                                                                                    <select name="" class="sl-choose-people">
                                                                                        <option value="0">0</option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                    </select>
                                                                                    <p></p>
                                                                                    <div class="name-sl-people flexbox align-self-end"> ???</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink">??????</button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="plan-item">
                                                                <div class="plan-image">
                                                                    <img src="<?= WP_HOME; ?>/images/new-kimono/img-plan-02.jpg" alt="" />
                                                                </div>
                                                                <div class="wrap-plan-info">
                                                                    <p class="plan-name">???????????????????????? ???</p>
                                                                    <div class="wg-webpirce-box wrap-plan-prices flexbox">
                                                                        <div class="box-webprice">
                                                                            <p class="web">web</p>
                                                                            <p class="bt-text"><span class="lg-text">??????</span><span class="sm-text">???</span></p>
                                                                        </div>
                                                                        <div class="box-price">
                                                                            <p class="sm-price">??3,500- ???</p>
                                                                            <p class="lg-pirce">??2,900-<span class="sm-sub-price">??????</span></p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="plan-description">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????</p>
                                                                    <div class="wrap-corresponding-store-wg wrap-correspond-store">
                                                                        <h3 class="title-corresponding-store">????????????</h3>
                                                                        <div class="wrap-link-more-wg"> <a href="#" class="btn-link-more">????????????????????????</a></div>
                                                                    </div>
                                                                    <div class="wrap-choose-sl-wg wrap-choose-person flexbox">
                                                                        <div class="wraper-sl flexbox">
                                                                            <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                                                <div class="wraper-sl-choose-pepple flexbox">
                                                                                    <select name="" class="sl-choose-people">
                                                                                        <option value="0">0</option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                    </select>
                                                                                    <p></p>
                                                                                    <div class="name-sl-people flexbox align-self-end"> ???</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink">??????</button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="plan-item">
                                                                <div class="plan-image">
                                                                    <img src="<?= WP_HOME; ?>/images/new-kimono/img-plan-03.jpg" alt="" />
                                                                </div>
                                                                <div class="wrap-plan-info">
                                                                    <p class="plan-name">???????????????????????? ???</p>
                                                                    <div class="wg-webpirce-box wrap-plan-prices flexbox">
                                                                        <div class="box-webprice">
                                                                            <p class="web">web</p>
                                                                            <p class="bt-text"><span class="lg-text">??????</span><span class="sm-text">???</span></p>
                                                                        </div>
                                                                        <div class="box-price">
                                                                            <p class="sm-price">??3,500- ???</p>
                                                                            <p class="lg-pirce">??2,900-<span class="sm-sub-price">??????</span></p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="plan-description">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????</p>
                                                                    <div class="wrap-corresponding-store-wg wrap-correspond-store">
                                                                        <h3 class="title-corresponding-store">????????????</h3>
                                                                        <div class="wrap-link-more-wg"> <a href="#" class="btn-link-more">????????????????????????</a></div>
                                                                    </div>
                                                                    <div class="wrap-choose-sl-wg wrap-choose-person flexbox">
                                                                        <div class="wraper-sl flexbox">
                                                                            <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                                                <div class="wraper-sl-choose-pepple flexbox">
                                                                                    <select name="" class="sl-choose-people">
                                                                                        <option value="0">0</option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                    </select>
                                                                                    <p></p>
                                                                                    <div class="name-sl-people flexbox align-self-end"> ???</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink">??????</button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="plan-item">
                                                                <div class="plan-image">
                                                                    <img src="<?= WP_HOME; ?>/images/new-kimono/img-plan-04.jpg" alt="" />
                                                                </div>
                                                                <div class="wrap-plan-info">
                                                                    <p class="plan-name">???????????????????????? ???</p>
                                                                    <div class="wg-webpirce-box wrap-plan-prices flexbox">
                                                                        <div class="box-webprice">
                                                                            <p class="web">web</p>
                                                                            <p class="bt-text"><span class="lg-text">??????</span><span class="sm-text">???</span></p>
                                                                        </div>
                                                                        <div class="box-price">
                                                                            <p class="sm-price">??3,500- ???</p>
                                                                            <p class="lg-pirce">??2,900-<span class="sm-sub-price">??????</span></p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="plan-description">????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????wargo???????????????????????????????????????????????????????????????????????????????????????</p>
                                                                    <div class="wrap-corresponding-store-wg wrap-correspond-store">
                                                                        <h3 class="title-corresponding-store">????????????</h3>
                                                                        <div class="wrap-link-more-wg"> <a href="#" class="btn-link-more">????????????????????????</a></div>
                                                                    </div>
                                                                    <div class="wrap-choose-sl-wg wrap-choose-person flexbox">
                                                                        <div class="wraper-sl flexbox">
                                                                            <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                                                <div class="wraper-sl-choose-pepple flexbox">
                                                                                    <select name="" class="sl-choose-people">
                                                                                        <option value="0">0</option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                    </select>
                                                                                    <p></p>
                                                                                    <div class="name-sl-people flexbox align-self-end"> ???</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink">??????</button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="wrapBookingFlow" class="wrap-booking-flow wrap-booking-flow-overflow wrap-booking-flow-correspond-store" style="display: none !important;">
                                    <form id="formBookingFlow" class="form-booking-flow" action="#">
                                        <div class="booking-flow-inner">
                                            <div class="booking-flow-title">
                                                <h3 class="title-step">????????????</h3>
                                                <a id="closeStep" class="btn-link-step btn-close-step" href="javascript:void(0);"><span class="icon icon-formal-popup-close"></span>?????????</a>
                                            </div>
                                            <div class="wrap-content-popup">
                                                <div class="booking-flow-content">
                                                    <div class="wrap-correspond-store-list">
                                                        <ul class="store-lists">
                                                            <li class="store-item flexbox">
                                                                <p class="store-area">???????????????</p>
                                                                <p class="store-list">??????????????????????????????/???????????????/???????????????/????????????/??????????????????/?????????????????????/???????????????????????????</p>
                                                            </li>
                                                            <li class="store-item flexbox">
                                                                <p class="store-area">???????????????</p>
                                                                <p class="store-list">????????????????????????</p>
                                                            </li>
                                                            <li class="store-item flexbox">
                                                                <p class="store-area">???????????????</p>
                                                                <p class="store-list">???????????????/???????????????/????????????????????????????????????????????????</p>
                                                            </li>
                                                            <li class="store-item flexbox">
                                                                <p class="store-area">???????????????</p>
                                                                <p class="store-list">??????????????????</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- Template Popup Choose Shop and Time -->
                                <div id="wrapBookingFlow" class="wrap-booking-flow wrap-booking-flow-overflow wrap-booking-flow-new-kimono" style="display: none !important;">
                                    <form id="formBookingFlow" class="form-booking-flow" action="#">
                                        <div class="booking-flow-inner">
                                            <div class="booking-flow-title">
                                                <a id="backStep" class="btn-link-step btn-back-step" href="javascript:void(0);"><span class="icon icon-formal-arrow-back"></span>?????????</a>
                                                <h3 class="title-step">?????????????????????</h3>
                                                <a id="closeStep" class="btn-link-step btn-close-step" href="javascript:void(0);"><span class="icon icon-formal-popup-close"></span>?????????</a>
                                            </div>
                                            <div class="wrap-content-popup">
                                                <div class="wrap-choosing-breadcrumb">
                                                    <div class="choosing-status">
                                                        <p class="choosing-text pc">????????????</p>
                                                        <ul class="list-choosing flexbox">
                                                            <li class="plan flexbox align-items-center"><span class="icon icon-formal-checked-1"></span>???????????????????????????</li>
                                                            <li class="num-person flexbox align-items-center"><span class="icon icon-formal-checked-1"></span>2???</li>
                                                            <li class="shop flexbox align-items-center"><span class="icon icon-formal-checked-1"></span>????????????????????????????????????????????????</li>
                                                            <li class="time flexbox align-items-center"><span class="icon icon-formal-checked-1"></span><p class="wrap-time"><span class="date">3/9</span><span class="hour">12:00~</span></p></li>
                                                        </ul>
                                                    </div>
                                                    <div class="booking-flow-breadcrumb">
                                                        <span class="step-breadcrumb active">????????????????????????</span>
                                                        <span class="step-breadcrumb">???????????????????????????</span>
                                                        <span class="step-breadcrumb">?????????????????????</span>
                                                    </div>
                                                </div>
                                                <div class="booking-flow-content">
                                                    <div class="wrap-kimono-booking section-choose-shops-times">
                                                        <?php Yii::app()->controller->widget('application.components.widgets.NewReserveStatus', array());?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div><!--end right-column-->

                        </div><!--end wrap-boths-column-->

                    </div><!--end left-column-content-->


                </div><!--end wrap-column-content-->
            </div>

        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

</div><!-- end container -->
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>

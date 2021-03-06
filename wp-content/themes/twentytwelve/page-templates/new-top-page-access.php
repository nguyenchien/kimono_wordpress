<?php
/**
 * Template Name: New Top Page Access
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
get_header('new-kimono');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_register_style('new-top-page-kimono-style', get_template_directory_uri() . '/css/new-top-page-kimono.css', array('twentytwelve-style'));
wp_enqueue_style('new-top-page-kimono-style');

wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js');
wp_enqueue_script('new-top-page-kimono-script', get_template_directory_uri() . '/js/new-top-page-kimono.js');
wp_enqueue_script('google-map', get_template_directory_uri() . '/js/google-map.js');


$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post, $language;
$language = Yii::app()->language;
?>
    <div class="container-box clearfix">
        <?php if (is_active_sidebar('sidebar-8')) : ?>
            <?php dynamic_sidebar('sidebar-8'); ?>
        <?php endif; ?>

        <!--ASAKUSA TOP--->
        <div class="widget-top-page-new-kimono top-page-other top-asakusa">
            <div class="title-new-shop-list">
                <div class="circle-shop-list">
                    <div class="banner-circle">
                        <img class="pc" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-pc.svg" />
                        <img class="sp" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-sp.svg" />
                    </div>
                </div>
            </div>
            <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page">
                <li class="item-shop-list flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border">???????????????</div>
                        <div class="text-no-border">???????????????3???!</br>????????????????????? !</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <div class="wrap-new-text-shop-list">
                        <div class="new-text-shop-list">NEW!</div>
                    </div>
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border">???????????????????????? ????????????????????????</div>
                        <div class="text-no-border">???????????????1???</br>??????????????????????????? 1F !</div>
                    </a>
                </li>
                <li class="item-shop-list item-shop-list-last flexbox wrap-column-content">
                    <div class="wrap-text-width-border">
                        <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                            <div class="text-no-link text-with-border">?????????????????????????????????????????????</div>
                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                        </div>
                        <div class="list-text-shop-list">
                            <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                        </div>
                    </div>
                    <div class="text-no-border">?????????????????????????????????????????????</div>
                </li>
            </ul>
        </div>
        <!--END ASAKUSA TOP--->

        <!--OSAKA TOP--->
        <div class="widget-top-page-new-kimono top-page-other top-osaka">
            <div class="title-new-shop-list">
                <div class="circle-shop-list">
                    <div class="banner-circle">
                        <img class="pc" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-pc.svg" />
                        <img class="sp" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-sp.svg" />
                    </div>
                </div>
            </div>
            <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page">
                <li class="item-shop-list main-shop flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border"><span class="fa-shop icon-fa-shop-07"></span>????????????????????????</div>
                        <div class="text-no-border">???????????????????????????0???!????????????????????????????????????2F</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border">????????????????????????</div>
                        <div class="text-no-border">?????????????????????</br>????????????????????????????????? ???</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <div class="wrap-text-width-border">
                        <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                            <div class="text-no-link text-with-border">???????????????????????????</div>
                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                        </div>
                        <div class="list-text-shop-list">
                            <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                        </div>
                    </div>
                    <div class="text-no-border">????????????????????????????????????</div>
                </li>
            </ul>
        </div>
        <!--END OSAKA TOP--->

        <!--KANAZAWA TOP--->
        <div class="widget-top-page-new-kimono top-page-other top-kanazawa">
            <div class="title-new-shop-list">
                <div class="circle-shop-list">
                    <div class="banner-circle">
                        <img class="pc" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-pc.svg" />
                        <img class="sp" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-sp.svg" />
                    </div>
                </div>
            </div>
            <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page">
                <li class="item-shop-list main-shop flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border"><span class="fa-shop icon-fa-shop-10"></span>??????????????????</div>
                        <div class="text-no-border">???????????????8?????????????????????????????????5??????</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border">???????????????</br>??????????????????</div>
                        <div class="text-no-border">???????????????????????????????????????</br>???????????????????????????</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <div class="wrap-text-width-border">
                        <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                            <div class="text-no-link text-with-border">?????????????????????</br>??????</div>
                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                        </div>
                        <div class="list-text-shop-list">
                            <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                        </div>
                    </div>
                    <div class="text-no-border">????????????????????????????????????</div>
                </li>
            </ul>
        </div>
        <!--END KANAZAWA TOP--->

        <!--KAMAKURA TOP--->
        <div class="widget-top-page-new-kimono top-page-other top-kamakura">
            <div class="title-new-shop-list">
                <div class="circle-shop-list">
                    <div class="banner-circle">
                        <img class="pc" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-pc.svg" />
                        <img class="sp" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-sp.svg" />
                    </div>
                </div>
            </div>
            <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page">
                <li class="item-shop-list main-shop flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border"><span class="fa-shop icon-fa-shop-09"></span>???????????????</div>
                        <div class="text-no-border">???????????? ??? ??? ??? 2???!</br>??????????????????????????????</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border">????????????????????????</div>
                        <div class="text-no-border">???????????????</br>??????????????????????????????</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <div class="wrap-text-width-border">
                        <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                            <div class="text-no-link text-with-border">?????????????????????</br>??????</div>
                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                        </div>
                        <div class="list-text-shop-list">
                            <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                        </div>
                    </div>
                    <div class="text-no-border">????????????????????????????????????</div>
                </li>
            </ul>
        </div>
        <!--END KAMAKURA TOP--->

        <!--KYOTOSTATION TOP--->
        <div class="widget-top-page-new-kimono top-page-other top-kyotostation">
            <div class="title-new-shop-list">
                <div class="circle-shop-list">
                    <div class="banner-circle">
                        <img class="pc" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-pc.svg" />
                        <img class="sp" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-sp.svg" />
                    </div>
                </div>
            </div>
            <div class="wrap-list-shop flexbox">
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page list-main-shop">
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-16">
                                     <span class="floor-num">3F</span>
                                </span>
                                <h2 class="shop-title-text">????????????</br>??????????????????</h2>
                            </div>
                            <div class="text-no-border">???????????????2???!???????????????3F</div>
                        </a>
                    </li>
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-16">
                                    <span class="floor-num">2F</span>
                                </span>
                                <h2 class="shop-title-text">???????????????</br>??????????????????</h2>
                            </div>
                            <div class="text-no-border">??? ??? ?????????????????????????????? ! ??????????????? 2F</div>
                        </a>
                    </li>
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border"><span class="fa-shop icon-fa-shop-15"></span>
                                <h2 class="shop-title-text">??????</br>???????????????</h2>
                            </div>
                            <div class="text-no-border">??????&??????????????????!??1,900????????????????????????</div>
                        </a>
                    </li>
                </ul>
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page col-2">
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">??????</br>????????????????????????</div>
                            <div class="text-no-border">?????????????????????1???!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">??????</br>???????????????</div>
                            <div class="text-no-border">????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">??????</br>???????????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">??????</div>
                        </div>
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">????????????????????????</div>
                            <div class="text-no-border">???????????????????????????0???!</div>
                        </a>
                    </li>
                    <li class="item-shop-list item-shop-list-last flexbox wrap-column-content">
                        <div class="wrap-text-with-bg bigger full">
                            <div class="text-with-bg">??????</br>??????</br>??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">
                                    <h2 class="shop-title-text">????????????</br>???????????????</h2>
                                </div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">?????????????????????????????????????????????</div>
                    </li>
                </ul>
            </div>

        </div>
        <!--END KYOTOSTATION TOP--->

        <!--KIYOMIZU TOP--->
        <div class="widget-top-page-new-kimono top-page-other top-kiyomizu">
            <div class="title-new-shop-list">
                <div class="circle-shop-list">
                    <div class="banner-circle">
                        <img class="pc" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-pc.svg" />
                        <img class="sp" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-sp.svg" />
                    </div>
                </div>
            </div>
            <div class="wrap-list-shop flexbox">
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page list-main-shop col-1">
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-02"></span>
                                <h2 class="shop-title-text">??????</br>????????????</h2>
                            </div>
                            <div class="text-no-border">?????????????????????1???</div>
                        </a>
                    </li>
                </ul>
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page col-4">
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">??????????????????????????????</div>
                            <div class="text-no-border">???????????????2???!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">?????????????????????????????????</div>
                            <div class="text-no-border">????????????????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">?????????????????????</div>
                            <div class="text-no-border">???????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">???????????????????????????</div>
                            <div class="text-no-border">?????????????????????3??????</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">?????????????????????</div>
                            <div class="text-no-border">??1,900????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">??????</div>
                        </div>
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">????????????????????????</div>
                            <div class="text-no-border">???????????????????????????0???!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">????????????</br>???????????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-with-bg bigger">
                            <div class="text-with-bg">??????</br>??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">????????????</br>???????????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????????????????</div>
                    </li>
                </ul>
            </div>

        </div>
        <!--END KIYOMIZU TOP--->

        <!--GION TOP--->
        <div class="widget-top-page-new-kimono top-page-other top-gion">
            <div class="title-new-shop-list">
                <div class="circle-shop-list">
                    <div class="banner-circle">
                        <img class="pc" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-pc.svg" />
                        <img class="sp" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-sp.svg" />
                    </div>
                </div>
            </div>
            <div class="wrap-list-shop flexbox">
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page list-main-shop col-2">
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-06"></span>
                                <h2 class="shop-title-text">??????</br>???????????????</h2>
                            </div>
                            <div class="text-no-border">???????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-14"></span>
                                <h2 class="shop-title-text">???????????????????????????</h2>
                            </div>
                            <div class="text-no-border">??1,900????????????????????????</div>
                        </a>
                    </li>
                </ul>
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page">
                    <li class="item-shop-list flexbox wrap-column-content pc">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">?????????<br>?????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content pc">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">????????????<br>?????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">??????????????????????????????</div>
                            <div class="text-no-border">???????????????2???!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">??????<br>????????????????????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">?????????????????????1???!</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">?????????????????????????????????</div>
                            <div class="text-no-border">????????????????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">?????????????????????</div>
                            <div class="text-no-border">??1,900????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">??????????????????</div>
                            <div class="text-no-border">?????????????????????1???!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">??????</br>???????????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">????????????????????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">???????????????????????????0???!</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content pc">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">????????????????????????</div>
                            </div>
                        </div>
                        <div class="text-no-border">???????????????????????????0???!</div>
                    </li>
                    <li class="item-shop-list item-shop-list-last flexbox wrap-column-content">
                        <div class="wrap-text-with-bg bigger full">
                            <div class="text-with-bg">??????</br>??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">
                                    <h2 class="shop-title-text">????????????</br>???????????????</h2>
                                </div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????????????????</div>
                    </li>
                </ul>
            </div>

        </div>
        <!--END GION TOP--->

        <!--ARASHIYAMA TOP--->
        <div class="widget-top-page-new-kimono top-page-other top-arashiyama">
            <div class="title-new-shop-list">
                <div class="circle-shop-list">
                    <div class="banner-circle">
                        <img class="pc" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-pc.svg" />
                        <img class="sp" src="http://localhost/custom_highend/data/images/new-kimono/icon-shop-list-sp.svg" />
                    </div>
                </div>
            </div>
            <div class="wrap-list-shop flexbox">
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page list-main-shop col-2">
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-11"></span>
                                <h2 class="shop-title-text">??????</br>???????????????</h2>
                            </div>
                            <div class="text-no-border">???????????????????????????30???!????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-18"></span>
                                <h2 class="shop-title-text">????????????</br>????????????</h2>
                            </div>
                            <div class="text-no-border">???????????????????????????????????????????????????5??????</div>
                        </a>
                    </li>
                </ul>
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page">
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">?????????<br>?????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">??????????????????????????????</div>
                            <div class="text-no-border">???????????????2???!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">?????????????????????????????????</div>
                            <div class="text-no-border">????????????????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">?????????????????????</div>
                            <div class="text-no-border">??1,900????????????????????????</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">??????????????????</div>
                            <div class="text-no-border">?????????????????????1???!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">??????</br>???????????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">????????????????????????</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">???????????????????????????0???!</div>
                    </li>
                    <li class="item-shop-list item-shop-list-last flexbox wrap-column-content">
                        <div class="wrap-text-with-bg bigger full">
                            <div class="text-with-bg">??????</br>??????</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">
                                    <h2 class="shop-title-text">????????????</br>???????????????</h2>
                                </div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">???????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">??????????????????</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">???????????????</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">????????????????????????????????????</div>
                    </li>
                </ul>
            </div>

        </div>
        <!--END ARASHIYAMA TOP--->


        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php get_sidebar('top-page-left') ?>
                                </div>
                                <div class="right-column">
                                    <?php
                                    while (have_posts()) : the_post();
                                        the_content();
                                    endwhile;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="right-column-content">
                            <?php get_sidebar('top-page-right') ?>
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
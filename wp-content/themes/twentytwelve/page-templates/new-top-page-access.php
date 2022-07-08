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
                        <div class="text-with-border">東京浅草店</div>
                        <div class="text-no-border">浅草駅徒歩3分!</br>浅草寺すぐそば !</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <div class="wrap-new-text-shop-list">
                        <div class="new-text-shop-list">NEW!</div>
                    </div>
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border">東京スカイツリー タウンソラマチ店</div>
                        <div class="text-no-border">押上駅徒歩1分</br>スカイツリータウン 1F !</div>
                    </a>
                </li>
                <li class="item-shop-list item-shop-list-last flexbox wrap-column-content">
                    <div class="wrap-text-width-border">
                        <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                            <div class="text-no-link text-with-border">鎌倉、京都、大阪、金沢で観光♪</div>
                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                        </div>
                        <div class="list-text-shop-list">
                            <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                        </div>
                    </div>
                    <div class="text-no-border">鎌倉、京都、大阪、金沢で観光♪</div>
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
                        <div class="text-with-border"><span class="fa-shop icon-fa-shop-07"></span>大阪大丸心斎橋店</div>
                        <div class="text-no-border">心斎橋駅直結、徒歩0分!アクセス便利な心斎橋大丸2F</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border">京都エリアの店舗</div>
                        <div class="text-no-border">京都駅、祇園、</br>清水・東山、嵐山で観光 ♪</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <div class="wrap-text-width-border">
                        <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                            <div class="text-no-link text-with-border">その他の地域の店舗</div>
                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                        </div>
                        <div class="list-text-shop-list">
                            <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                        </div>
                    </div>
                    <div class="text-no-border">京都、大阪、金沢で観光♪</div>
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
                        <div class="text-with-border"><span class="fa-shop icon-fa-shop-10"></span>金沢香林坊店</div>
                        <div class="text-no-border">兼六園徒歩8分！長町武家屋敷跡徒歩5分！</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border">京都・大阪</br>エリアの店舗</div>
                        <div class="text-no-border">京都駅、祇園、清水・東山、</br>嵐山、大阪で観光♪</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <div class="wrap-text-width-border">
                        <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                            <div class="text-no-link text-with-border">その他の地域の</br>店舗</div>
                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                        </div>
                        <div class="list-text-shop-list">
                            <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                        </div>
                    </div>
                    <div class="text-no-border">京都、大阪、金沢で観光♪</div>
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
                        <div class="text-with-border"><span class="fa-shop icon-fa-shop-09"></span>鎌倉小町店</div>
                        <div class="text-no-border">鎌倉駅か ら 徒 歩 2分!</br>鶴岡八幡宮すぐそば！</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                        <div class="text-with-border">東京エリアの店舗</div>
                        <div class="text-no-border">東京浅草、</br>スカイツリーで観光♪</div>
                    </a>
                </li>
                <li class="item-shop-list flexbox wrap-column-content">
                    <div class="wrap-text-width-border">
                        <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                            <div class="text-no-link text-with-border">その他の地域の</br>店舗</div>
                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                        </div>
                        <div class="list-text-shop-list">
                            <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                            <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                        </div>
                    </div>
                    <div class="text-no-border">京都、大阪、金沢で観光♪</div>
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
                                <h2 class="shop-title-text">京都駅前</br>京都タワー店</h2>
                            </div>
                            <div class="text-no-border">京都駅徒歩2分!京都タワー3F</div>
                        </a>
                    </li>
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-16">
                                    <span class="floor-num">2F</span>
                                </span>
                                <h2 class="shop-title-text">フォーマル</br>京都タワー店</h2>
                            </div>
                            <div class="text-no-border">フ ォ ーマル用お着物専門店 ! 京都タワー 2F</div>
                        </a>
                    </li>
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border"><span class="fa-shop icon-fa-shop-15"></span>
                                <h2 class="shop-title-text">プチ</br>京都駅前店</h2>
                            </div>
                            <div class="text-no-border">学生&女子会でお得!¥1,900で着物レンタル♪</div>
                        </a>
                    </li>
                </ul>
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page col-2">
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">京都</br>清水・東山エリア</div>
                            <div class="text-no-border">清水寺より徒歩1分!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">京都</br>嵐山エリア</div>
                            <div class="text-no-border">京都嵐山で観光♪</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">京都</br>祇園エリア</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">京都祇園で観光♪</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">大阪</div>
                        </div>
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">大阪大丸心斎橋店</div>
                            <div class="text-no-border">心斎橋駅直結、徒歩0分!</div>
                        </a>
                    </li>
                    <li class="item-shop-list item-shop-list-last flexbox wrap-column-content">
                        <div class="wrap-text-with-bg bigger full">
                            <div class="text-with-bg">大阪</br>関東</br>北陸</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">
                                    <h2 class="shop-title-text">その他の</br>地域の店舗</h2>
                                </div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">大阪、浅草、鎌倉、金沢で観光♪</div>
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
                                <h2 class="shop-title-text">京都</br>清水坂店</h2>
                            </div>
                            <div class="text-no-border">清水寺より徒歩1分</div>
                        </a>
                    </li>
                </ul>
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page col-4">
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">京都駅前京都タワー店</div>
                            <div class="text-no-border">京都駅徒歩2分!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">フォーマル京都タワー店</div>
                            <div class="text-no-border">フォーマル用お着物専門店</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">京都祇園四条店</div>
                            <div class="text-no-border">八坂神社すぐそば♪</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">プチ京都祇園四条店</div>
                            <div class="text-no-border">祇園四条駅徒歩3分♪</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">プチ京都駅前店</div>
                            <div class="text-no-border">¥1,900で着物レンタル♪</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">大阪</div>
                        </div>
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">大阪大丸心斎橋店</div>
                            <div class="text-no-border">心斎橋駅直結、徒歩0分!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">京都</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">その他の</br>京都の店舗</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">京都嵐山で観光♪</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-with-bg bigger">
                            <div class="text-with-bg">関東</br>北陸</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">その他の</br>地域の店舗</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">浅草、鎌倉、金沢で観光♪</div>
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
                                <h2 class="shop-title-text">京都</br>祇園四条店</h2>
                            </div>
                            <div class="text-no-border">八坂神社すぐそば♪</div>
                        </a>
                    </li>
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-14"></span>
                                <h2 class="shop-title-text">プチ京都祇園四条店</h2>
                            </div>
                            <div class="text-no-border">¥1,900で着物レンタル♪</div>
                        </a>
                    </li>
                </ul>
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page">
                    <li class="item-shop-list flexbox wrap-column-content pc">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">京都駅<br>エリア</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">京都駅すぐ近く！</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content pc">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">京都嵐山<br>エリア</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">京都嵐山で観光♪</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">京都駅前京都タワー店</div>
                            <div class="text-no-border">京都駅徒歩2分!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">京都<br>清水・東山エリア</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">清水寺より徒歩1分!</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">フォーマル京都タワー店</div>
                            <div class="text-no-border">フォーマル用お着物専門店</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">プチ京都駅前店</div>
                            <div class="text-no-border">¥1,900で着物レンタル♪</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">京都清水坂店</div>
                            <div class="text-no-border">清水寺より徒歩1分!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">京都</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">京都</br>嵐山エリア</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">京都嵐山で観光♪</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">大阪</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">大阪大丸心斎橋店</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">心斎橋駅直結、徒歩0分!</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content pc">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">大阪</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">大阪大丸心斎橋店</div>
                            </div>
                        </div>
                        <div class="text-no-border">心斎橋駅直結、徒歩0分!</div>
                    </li>
                    <li class="item-shop-list item-shop-list-last flexbox wrap-column-content">
                        <div class="wrap-text-with-bg bigger full">
                            <div class="text-with-bg">関東</br>北陸</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">
                                    <h2 class="shop-title-text">その他の</br>地域の店舗</h2>
                                </div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">浅草、鎌倉、金沢で観光♪</div>
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
                                <h2 class="shop-title-text">京都</br>嵐山駅前店</h2>
                            </div>
                            <div class="text-no-border">嵯峨嵐山駅より徒歩30秒!天龍寺すぐそば！</div>
                        </a>
                    </li>
                    <li class="item-shop-list main-shop flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">
                                <span class="fa-shop icon-fa-shop-18"></span>
                                <h2 class="shop-title-text">京都嵐山</br>渡月橋店</h2>
                            </div>
                            <div class="text-no-border">嵐電嵐山駅すぐそば！渡月橋まで徒歩5分♪</div>
                        </a>
                    </li>
                </ul>
                <ul class="text-center flexbox wrap-column-content justify-content-between list-shop-list-top-page">
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">京都駅<br>エリア</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">京都駅すぐ近く！</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">京都駅前京都タワー店</div>
                            <div class="text-no-border">京都駅徒歩2分!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">フォーマル京都タワー店</div>
                            <div class="text-no-border">フォーマル用お着物専門店</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">プチ京都駅前店</div>
                            <div class="text-no-border">¥1,900で着物レンタル♪</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <a class="link-shop-list-new-kimono flexbox wrap-column-content" href="#">
                            <div class="text-with-border">京都清水坂店</div>
                            <div class="text-no-border">清水寺より徒歩1分!</div>
                        </a>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content sp">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">京都</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">京都</br>嵐山エリア</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">京都嵐山で観光♪</div>
                    </li>
                    <li class="item-shop-list flexbox wrap-column-content">
                        <div class="wrap-text-with-bg">
                            <div class="text-with-bg">大阪</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">大阪大丸心斎橋店</div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">心斎橋駅直結、徒歩0分!</div>
                    </li>
                    <li class="item-shop-list item-shop-list-last flexbox wrap-column-content">
                        <div class="wrap-text-with-bg bigger full">
                            <div class="text-with-bg">関東</br>北陸</div>
                        </div>
                        <div class="wrap-text-width-border">
                            <div class="text-with-border text-with-border-last" data-list=".list-text-shop-list-content">
                                <div class="text-no-link text-with-border">
                                    <h2 class="shop-title-text">その他の</br>地域の店舗</h2>
                                </div>
                                <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-shop-list"></span></div>
                            </div>
                            <div class="list-text-shop-list">
                                <div class="text-with-border-top text-with-border"><a href="/access/kamakura">鎌倉小町店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/access/kanazawa">金沢香林坊店</a></div>
                                <div class="text-with-border-top text-with-border"><a href="/asakusa/asakusa-access/asakusa">東京浅草店</a></div>
                            </div>
                        </div>
                        <div class="text-no-border">浅草、鎌倉、金沢で観光♪</div>
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
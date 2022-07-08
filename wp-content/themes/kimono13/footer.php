<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

global $is_yukata, $isSmartPhone, $isTablet, $language;

if ($is_yukata) {
//	$depend = wp_style_is( 'top.css')? array('top.css'): array();
    wp_register_style('top-yukata', get_template_directory_uri() . '/css/top_yukata.css');
    wp_enqueue_style('top-yukata');
}
?>
</div><!-- #main -->

<?php
$current_link = $_SERVER['REQUEST_URI']; //get_permalink();
$is_blog_cate = strpos($current_link, "/blog/") !== false;
$is_group_blog = strpos($current_link, "/group/") !== false;
if (!is_page('reserve') && !$is_blog_cate && !$is_group_blog):
    ?>
    <div id="classroom_banner" class="main-content">
        <div class="container clearfix">
            <div class="item i-left">
                <?php if ($language == 'ja') {
                    $banner_link = 'party';
                    $img_src = WP_HOME . '/images/classroom_banner/banner-party-ja.jpg';
                } else{
                    $banner_link = 'kimono';
                    $img_src = WP_HOME . '/images/classroom_banner/banner-recruit-'  . $language . '.jpg';
                }?>
                <a href="<?php echo esc_url(home_url($banner_link)); ?>">
                    <img src="<?php echo $img_src; ?>" alt="<?php echo Yii::t('wp_theme', '着物レンタルはこちらへ!') ?>"/>
                </a>
            </div>
            <div class="item i-right">
                <?php if ($language == 'ja') {
                    $banner_link = 'recruitment';
                    $img_src = WP_HOME . '/images/classroom_banner/banner-reserve-yukata-' . $language . '.jpg';
                } else if ($language == 'tw') {
                    $banner_link = 'yukata';
                    $img_src = WP_HOME . '/images/classroom_banner/banner-reserve-yukata-tw.jpg';
                } else {
                    $banner_link = 'kimono/hairset';
                    $img_src = WP_HOME . '/images/classroom_banner/banner-hairset-' . $language . '.jpg';
                }
                ?>
                <a href="<?php echo esc_url(home_url($banner_link)); ?>">
                    <img src="<?php echo $img_src; ?>" alt="<?php echo Yii::t('wp_theme', '「着物が好き」それだけで仕事になる!') ?>"/>
                </a>
            </div>
        </div>
        <!-- end container -->
    </div><!-- div#classroom_banner -->
<?php endif; ?>
<?php if (!is_page('reserve') && !$is_blog_cate && !$is_group_blog && !is_page('group')): ?>
    <div class="main-content">
        <ul class="container list-group-banner clearfix">
            <?php

            $group_banner = get_group_banner();

            foreach ($group_banner as $banner) {
                ?>
                <li>
                    <a href="<?php echo $banner['link']; ?>">
                        <img src="<?php echo $banner['img']['url']; ?>" alt="<?php echo $banner['img']['alt']; ?>">
                    </a>
                </li>
                <?php
            } ?>
        </ul>
    </div>
<?php endif; ?>

<?php
global $is_osaka;
global $is_asakusa;
?>
<footer id="colophon" class="tn-main-footer section-footer" role="contentinfo">
    <div class="colophon-zone-top">
        <div class="container ps_re box-widget-maps">
            <div id="box-footer" class="sixteen columns clearfix">
                <?php
                if (!is_page('access') && !is_page('osaka-access')) {
                    ?>
                    <div class="logo-footer logo-footer-new one-third column alpha phone-num clearfix">
                        <h2 class="title-footer-new">
                            <span class="icon-icon-store"></span>
                            <span class="name"><?php echo Yii::t('wp_theme', 'Store Information') ?></span>
                            <span class="text-new"><?php echo Yii::t('wp_theme', '店舗のご案内') ?></span>

                        </h2>
                    </div><!-- end logo-footer -->
                    <?php
                    /**
                     * Check page is osaka go list osaka shop
                     */
                    if ($is_osaka) { // is osaka page
                        // Start show list shop in Osaka
                        $osaka_shops = Yii::app()->cache->get("osaka_shops_{$language}");
                        // Detect if list osaka shop by language cache does not exist
                        if ($osaka_shops == false) {
                            // Init list shop
                            $osaka_shops = get_render_template('list_osaka_shop.php');
                            Yii::app()->cache->set("osaka_shops_{$language}", $osaka_shops);
                        }
                        // Render osaka shops
                        echo $osaka_shops;
                        /* End show list shop in Osaka*/

                        /* Start show list shop in kyoto*/
                        // Get list shop by cache
                        $list_shop = Yii::app()->cache->get("list_shop_{$language}");

                        // Detect if list shop by language cache does not exist
                        if ($list_shop == false) {
                            // Init list shop
                            $list_shop = get_render_template('list_kyoto_shop.php');
                            Yii::app()->cache->set("list_shop_{$language}", $list_shop);
                        }
                        // Render list shop
                        echo $list_shop;
                        /* End show list shop in kyoto*/

                        /* Start show list others shop */
                        $list_others_shop_osaka_page = Yii::app()->cache->get("list_others_shop_osaka_page_{$language}");
                        // Detect if list shop others by language cache does not exist
                        if ($list_others_shop_osaka_page == false) {
                            // Init list shop
                            $list_others_shop_osaka_page = get_render_template('list_others_shop_osaka_page.php');
                            Yii::app()->cache->set("list_others_shop_osaka_page_{$language}", $list_others_shop_osaka_page);
                        }
                        // Render list others shop
                        echo $list_others_shop_osaka_page;
                        /* End show list others shop */

                    } else if ($is_asakusa) { // is asakusa page
                        /* Start show list shop in asakusa*/
                        $asakusa_shops = Yii::app()->cache->get("asakusa_shops_{$language}");
                        // Detect if list osaka shop by language cache does not exist
                        if ($asakusa_shops == false) {
                            // Init list shop
                            $asakusa_shops = get_render_template('list_asakusa_shop.php');
                            Yii::app()->cache->set("asakusa_shops_{$language}", $asakusa_shops);
                        }
                        // Render osaka shops
                        echo $asakusa_shops;
                        /* End show list shop in asakusa*/

                        /* Start show list shop in kyoto*/
                        // Get list shop by cache
                        $list_shop = Yii::app()->cache->get("list_shop_{$language}");

                        // Detect if list shop by language cache does not exist
                        if ($list_shop == false) {
                            // Init list shop
                            $list_shop = get_render_template('list_kyoto_shop.php');
                            Yii::app()->cache->set("list_shop_{$language}", $list_shop);
                        }
                        // Render list shop
                        echo $list_shop;
                        /* End show list shop in kyoto*/

                        /* Start show list others shop */
                        $list_others_shop_asakusa_page = Yii::app()->cache->get("list_others_shop_asakusa_page_{$language}");
                        // Detect if list shop others by language cache does not exist
                        if ($list_others_shop_asakusa_page == false) {
                            // Init list shop
                            $list_others_shop_asakusa_page = get_render_template('list_others_shop_asakusa_page.php');
                            Yii::app()->cache->set("list_others_shop_asakusa_page_{$language}", $list_others_shop_asakusa_page);
                        }
                        // Render list others shop
                        echo $list_others_shop_asakusa_page;
                        /* End show list others shop */

                    } else { // is home page
                        /* Start show list kyoto shop */
                        // Get list shop by cache
                        $list_shop = Yii::app()->cache->get("list_shop_{$language}");
                        // Detect if list shop by language cache does not exist
                        if ($list_shop == false) {
                            // Init list shop
                            $list_shop = get_render_template('list_kyoto_shop.php');
                            Yii::app()->cache->set("list_shop_{$language}", $list_shop);
                        }
                        // Render list shop
                        echo $list_shop;
                        /* End show list kyoto shop */

                        /* Start show list others shop */
                        $list_others_shop_homepage = Yii::app()->cache->get("list_others_shop_homepage_{$language}");
                        // Detect if list others shop by language cache does not exist
                        if ($list_others_shop_homepage == false) {
                            // Init list shop
                            $list_others_shop_homepage = get_render_template('list_others_shop_homepage.php');
                            Yii::app()->cache->set("list_others_shop_homepage_{$language}", $list_others_shop_homepage);
                        }
                        // Render list others shop
                        echo $list_others_shop_homepage;
                        /* End show list others shop */
                    }
                } ?>
                <div class="link-button-sp clearfix">
                    <div class="wrap-all" clearfix>
                        <div class="left-sp">
                            <a class="for-sp" href="https://line.me/ti/p/%40lvv9152n">
                                <?php echo Yii::t('wp_theme', '友達追加'); ?></a>
                        </div>
                        <div class="right-sp">
                            <p class="name">
                                <?php echo Yii::t('wp_theme', 'LINEでお問い合わせ♪トーク画面でお気軽にお問い合わせください!!'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box-social-net-footer clearfix">
                    <div class="sec-facebook">
                        <div class="fb-page" data-href="https://www.facebook.com/kyotokimonorental/" data-tabs="timeline, events, messages" data-width="500px" data-height="530px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kyotokimonorental/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kyotokimonorental/">京都着物（きもの）レンタルwargo</a></blockquote></div>
                    </div>
                    <!-- end sec-facebook -->

                    <div class="sec-twitter">
                        <a class="twitter-timeline" width="500" height="530" href="https://twitter.com/kyotokimonorent"
                           data-widget-id="530550680360980480">@kyotokimonorent からのツイート</a>
                        <script>!function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = p + "://platform.twitter.com/widgets.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, "script", "twitter-wjs");</script>
                    </div>
                    <!-- end sec-twitter -->
                </div>
                <!-- end box-social-net-footer -->
                <?php
                // Get listTopReserve by cache
                $listTopReserve = Yii::app()->cache->get("listTopReserve_{$language}");
                // Check if listTopReserve cache does not exist
                if ($listTopReserve == false) {
                    // Get listTopReserve widget
                    $listTopReserve = Yii::app()->controller->widget('application.components.widgets.ListTopReserve', array(), true);
                    // Assign dependency by last update_time of book to listTopReserve cache
                    $dependency = new CDbCacheDependency('SELECT MAX(book_id) FROM book');
                    // Set listTopReserve cache
                    Yii::app()->cache->set("listTopReserve_{$language}", $listTopReserve, 0, $dependency);
                }
                // Render listTopReserve
                echo $listTopReserve;
                ?>
                <!-- end wrap-menu-footer
            </div>end box-footer -->
            </div>
            <!-- end container -->
            <div class="clearAll"></div>
        </div>
        <!-- end div.colophon-zone-top -->

        <?php if (($language) == 'ja') { ?>
        <?php
            $shop_link_list = MasterValues::$MV_SHOP_SLUG;
        ?>
        <div class="footer-links">
            <div class="container">
                <div class="box-item access clearfix">
                    <h5 class="title clearfix"><span class="icon-fa icon-icon-store"></span><a href="#"><?= Yii::t('wp_theme','店舗一覧'); ?></a></h5>
                    <div class="content clearfix">
                        <div class="wrap left">
                            <div class="shop clearfix">
                                <h6><span class="icon-fa icon-icon-kyoto"></span><span class="name"><?= Yii::t('wp_footer','京都'); ?></span></h6>
                                <ul>
                                    <li><a href="/<?php echo $shop_link_list[MasterValues::SHOP_KYOTO_STATION_ID] ?>"><?= Yii::t('wp_theme','京都駅前京都タワー店'); ?></a></li>
                                    <li><a href="/<?php echo $shop_link_list[MasterValues::SHOP_GIONSIJO_ID] ?>"><?= Yii::t('highend','祇園四条店'); ?></a></li>
                                    <li><a href="/<?php echo $shop_link_list[MasterValues::SHOP_SHINKYOGOKU_ID] ?>"><?= Yii::t('wp_theme','新京極店'); ?></a></li>
                                    <li><a href="/<?php echo $shop_link_list[MasterValues::SHOP_KYOMIZUZAKA_ID] ?>"><?= Yii::t('wp_theme','清水坂店'); ?></a></li>
                                    <li><a href="/<?php echo $shop_link_list[MasterValues::SHOP_NINENZAKA_ID] ?>"><?= Yii::t('wp_theme','二年坂店'); ?></a></li>
                                    <li><a href="/<?php echo $shop_link_list[MasterValues::SHOP_KINKAKUJI_ID] ?>"><?= Yii::t('wp_theme','金閣寺店'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="wrap right">
                            <div class="shop clearfix">
                                <h6><span class="icon-fa icon-icon-osaka"></span><span class="name"><?= Yii::t('wp_theme','大阪'); ?></span></h6>
                                <ul>
                                    <li><a href="/<?php echo $shop_link_list[MasterValues::SHOP_SHINSAIBASHI_ID] ?>"><?= Yii::t('highend','大阪大丸心斎橋店'); ?></a></li>
                                </ul>
                            </div>
                            <div class="shop clearfix">
                                <h6><span class="icon-fa icon-icon-ninenzaka"></span><span class="name"><?= Yii::t('wp_footer','東京'); ?></span></h6>
                                <ul>
                                    <li><a href="/<?php echo $shop_link_list[MasterValues::SHOP_ASAKUSA_ID] ?>"><?= Yii::t('wp_footer','東京浅草店'); ?></a></li>
                                </ul>
                            </div>
                            <div class="shop clearfix">
                                <h6><span class="icon-fa icon-icon-kamakura"></span><span class="name"><?= Yii::t('wp_footer','神奈川'); ?></span></h6>
                                <ul>
                                    <li><a href="/<?php echo $shop_link_list[MasterValues::SHOP_KOMACHI_ID] ?>"><?= Yii::t('wp_theme','鎌倉小町店'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- end .box-item.access -->

                <div class="box-item temp-01 services clearfix">
                    <h5 class="title clearfix"><span class="icon-fa icon-icon-news-footer-2"></span><a href="#"><?= Yii::t('wp_footer','サービス一覧'); ?></a></h5>
                    <div class="content clearfix">
                        <ul class="clearfix">
                            <div class="wrap left">
                                <li class="clearfix"><p><span class="icon-fa icon-camera"></span><a href="/kimono/photo-studio"><?= Yii::t('wp_footer','写真スタジオ'); ?></a></p></li>
                                <li class="clearfix"><p><span class="icon-fa icon-hair"></span><a href="/kimono/hairset"><?= Yii::t('wp_footer','ヘアセット'); ?></a></p></li>
                                <li class="clearfix"><p><span class="icon-fa icon-group"></span><a href="/group"><?= Yii::t('wp_footer','団体着物'); ?></a></p></li>
                            </div>
                            <div class="wrap right">
                                <li class="clearfix"><p><span class="icon-fa icon-luggage"></span><a href="/kimono/tenimotsu"><?= Yii::t('wp_footer','荷物預かり'); ?></a></p></li>
                                <li class="clearfix"><p><span class="icon-fa icon-accessories"></span><a href="/kimono/option"><?= Yii::t('wp_footer','オプション小物'); ?></a></p></li>
                                <li class="clearfix"><p><span class="icon-fa icon-bring"></span><a href="/bring"><?= Yii::t('wp_footer','持ち込みプラン'); ?></a></p></li>
                            </div>
                        </ul>
                    </div>
                </div><!-- end .box-item.services -->

                <div class="box-item topics clearfix">
                    <h5 class="title clearfix"><span class="icon-fa icon-diamond"></span><a href="#"><?= Yii::t('wp_footer','人気トピック'); ?></a></h5>
                    <div class="content clearfix">
                        <ul class="clearfix">
                            <div class="wrap left">
                                <li><a href="/takuhai"><?= Yii::t('wp_footer','宅配レンタル'); ?></a></li>
                                <li><a href="http://www.wargo.jp/products/list718.html" target="_blank"><?= Yii::t('wp_footer','浴衣販売'); ?></a></li>
                            </div>
                            <div class="wrap right">
                                <li><a href="/party"><?= Yii::t('wp_footer','隅田川船上クルージング'); ?></a></li>
                                <li><a href="/recruitment"><?= Yii::t('wp_footer','求人情報'); ?></a></li>
                            </div>
                        </ul>
                    </div>
                </div><!-- end .box-item.topics -->

                <div class="box-item contact clearfix">
                    <h5 class="title clearfix"><span class="icon-fa icon-phone-1"></span><a href="#"><?= Yii::t('wp_footer','お問い合わせ'); ?></a></h5>
                    <div class="content clearfix">
                        <ul class="clearfix">
                            <li>
                                <p class="text"><var class="break"><?= Yii::t('footer','京都エリア'); ?></var><?= Yii::t('wp_footer','コールセンター'); ?><var>（10:00 - 15:00）</var></p>
                                <p class="num"><span class="icon-fa icon-icon-phone"></span><a href="tel:0756002830">075-600-2830</a></p>
                            </li>
                            <li>
                                <p class="text"><?= Yii::t('wp_theme','大阪'); ?><var>（10:30 - 19:30）</var></p>
                                <p class="num"><span class="icon-fa icon-icon-phone"></span><a href="tel:0664845960">06-6484-5960</a></p>
                            </li>
                            <li>
                                <p class="text"><?= Yii::t('wp_footer','浅草'); ?><var>（9:00 - 18:00）</var></p>
                                <p class="num"><span class="icon-fa icon-icon-phone"></span><a href="tel:0358307735">03-5830-7735</a></p>
                            </li>
                            <li>
                                <p class="text"><?= Yii::t('wp_theme','鎌倉'); ?><var>（9:00 - 18:00）</var></p>
                                <p class="num"><span class="icon-fa icon-icon-phone"></span><a href="tel:0467388818">0467-38-8818</a></p>
                            </li>
                        </ul>
                    </div>
                </div><!-- end .box-item.contact -->

                <div class="box-item temp-01 reserve clearfix">
                    <h5 class="title clearfix"><span class="icon-fa icon-icon-reserve"></span><a href="#"><?= Yii::t('wp_theme','予約する'); ?></a></h5>
                    <div class="content clearfix">
                        <?php if($isSmartPhone): ?>
                            <ul class="clearfix">
                                <div class="wrap left">
                                    <li class="clearfix"><p><a href="/reserve#yukata"><?= Yii::t('wp_footer','観光浴衣レンタル'); ?></a></p></li>
                                    <li class="clearfix"><p><a href="/reserve#shichigosan"><?= Yii::t('wp_footer','七五三'); ?></a></p></li>
                                    <li class="clearfix"><p><a href="/reserve#homongi"><?= Yii::t('wp_footer','訪問着'); ?></a></p></li>
                                </div>
                                <div class="wrap right">
                                    <li class="clearfix"><p><a href="/reserve#kimono"><?= Yii::t('wp_footer','観光着物レンタル'); ?></a></p></li>
                                    <li class="clearfix"><p><a href="/reserve#seijin"><?= Yii::t('wp_footer','成人式振袖'); ?></a></p></li>
                                    <li class="clearfix"><p><a href="/reserve#sotsugyou"><?= Yii::t('wp_footer','卒業式袴'); ?></a></p></li>
                                </div>
                            </ul>
                        <?php else: ?>
                            <ul class="clearfix">
                                <div class="wrap left">
                                    <li class="clearfix"><p><a href="/reserve#yukata"><?= Yii::t('wp_footer','観光浴衣レンタル'); ?></a></p></li>
                                    <li class="clearfix"><p><a href="/reserve#kimono"><?= Yii::t('wp_footer','観光着物レンタル'); ?></a></p></li>
                                    <li class="clearfix"><p><a href="/reserve#shichigosan"><?= Yii::t('wp_footer','七五三'); ?></a></p></li>
                                </div>
                                <div class="wrap right">
                                    <li class="clearfix"><p><a href="/reserve#seijin"><?= Yii::t('wp_footer','成人式振袖'); ?></a></p></li>
                                    <li class="clearfix"><p><a href="/reserve#homongi"><?= Yii::t('wp_footer','訪問着'); ?></a></p></li>
                                    <li class="clearfix"><p><a href="/reserve#sotsugyou"><?= Yii::t('wp_footer','卒業式袴'); ?></a></p></li>
                                </div>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div><!-- end .box-item.reserve -->
            </div><!-- end .container -->

            <div class="copy-right">
                <div class="container">
                    <ul class="clearfix">
                        <li><a href="/blog"><?= Yii::t('wp_theme','スタッフブログ'); ?></a></li>
                        <li class="ds">/</li>
                        <li><a href="/course"><?= Yii::t('wp_footer','オススメ散策コース'); ?></a></li>
                        <li class="ds">/</li>
                        <li><a href="/spot"><?= Yii::t('wp_footer','観光スポットランキング'); ?></a></li>
                        <li class="ds">/</li>
                        <li><a href="/policy"><?= Yii::t('wp_theme','プライバシーポリシー'); ?></a></li>
                        <li class="ds">/</li>
                        <li><a href="/notation"><?= Yii::t('wp_theme','特定商取引法に基づく表記'); ?></a></li>
                    </ul>
                    <p>Copyright © 2016 京都きものレンタル wargo.All Rights Reserved.</p>
                </div>
            </div><!-- end .copy-right -->
        </div><!-- end .footer-links -->
        <?php } ?>

</footer><!-- #colophon -->

</div><!-- #end sb-site -->


<?php

if ($language === 'tw') {
    $header_menu = 'menu-sp-kimono-tw';
} else {
    $header_menu = $is_yukata ? 'menu-sp-yukata' : 'menu-sp-kimono';
}

?>
<!-- end .sb-left -->
</div><!-- #page -->
<?php wp_footer(); ?>

<!-- Slidebars -->
<script defer src="<?php echo WP_HOME; ?>/js/slidebars.js"></script>
<script defer src="<?php echo WP_HOME; ?>/js/slidebars-custom.js"></script>
<div class="sb-slidebar sb-right">
    <div id="menu-close" class=""><a href="javascript:void(0);" id="btn-close" title="Close">Close</a></div>
    <?php
    // Get sp menu by cache
    $sp_menu = Yii::app()->cache->get("{$header_menu}_{$language}");
    // Check if sp menu cache does not exist
    if ($sp_menu == false) {
        // Get sp menu from DB
        $sp_menu = wp_nav_menu(array(
            'theme_location' => 'primary',
            //'menu'=>'HeaderMenu',
            'menu' => $header_menu,
            'menu_class' => 'sub-menu nav-list',
            'container_id' => 'wrap-sub-menu',
            'echo' => false
        ));
        // Set sp menu cache
        Yii::app()->cache->set("{$header_menu}_{$language}", $sp_menu, 0);
    }
    // Render sp menu
    echo $sp_menu;
    ?>
</div>
</body>
</html>
<?php
function get_list_shop_template()
{
    ob_start();
    require('list_shop_template.php');
    return ob_get_clean();
}

?>
<?php
$detect = Yii::app()->mobileDetect;
$isSmartPhone = $detect->isSmartPhone();
$isTablet = $detect->isTablet();
if (!$isSmartPhone) {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $num = 0;
            $('.ft-leftzone-footer').each(function (index, el) {
                $height = $(this).innerHeight();
                if ($height > $num) {
                    $num = $height;
                }
            });
            $('.ft-leftzone-footer').css('height', $num);
        });
    </script>
<?php } ?>

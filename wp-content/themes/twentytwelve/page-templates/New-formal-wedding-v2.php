<?php
/**
 * Template Name: New Formal Wedding V2
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
global $language, $post, $custom_taxonomies, $custom_post_type;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
$postName = $post->post_name;
//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
if($language == 'ja'){get_header('formal');}
else{ get_header('new-kimono');}
if($isSmartPhone){
    wp_register_style('new-formal-wedding-v2-sp-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-formal-wedding-v2-sp.css', array('twentytwelve-style'), '20210122');
    wp_enqueue_style('new-formal-wedding-v2-sp-style'.$cssLanguage);
}else{
    wp_register_style('new-formal-wedding-v2-pc-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-formal-wedding-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-wedding-v2-pc-style'.$cssLanguage);
}
if($isSmartPhone){
    wp_register_style('new-formal-popup-preview-sp', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp');
}else{
    wp_register_style('new-formal-popup-preview-pc', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc');
}
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
?>
<?php if($isSmartPhone && $language == 'ja'):?>
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
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
    }
    ?>
    <?php if($isSmartPhone) : ?>
        <?php
            $title_h1_sp = get_field('title_h1_sp');
            if ($title_h1_sp) {
                echo do_shortcode(php_set_base_url($title_h1_sp));
            }
        ?>
    <?php else: ?>
        <?php
            $title_h1_pc = get_field('title_h1_pc');
            if ($title_h1_pc) {
                echo do_shortcode(php_set_base_url($title_h1_pc));
            }
        ?>
    <?php endif; ?>
    <div class="main-baner-top-v2">
        <?php if($isSmartPhone) : ?>
            <?php
            $main_banner_top_sp = get_field('main_banner_top_sp');
            if ($main_banner_top_sp) {
                echo do_shortcode(php_set_base_url($main_banner_top_sp));
            }
            ?>
        <?php else: ?>
            <?php
            $main_banner_top_pc = get_field('main_banner_top_pc');
            if ($main_banner_top_pc) {
                echo do_shortcode(php_set_base_url($main_banner_top_pc));
            }
            ?>
        <?php endif; ?>
    </div><!--end main-baner-top-v2-->
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
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

                            <div class="right-column right-column-list right-cate-list-v2 right-new-shop-formal-v2 right-new-formal-wedding">
                                <div class="padding-v2">
                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $des_list_cate_sp = get_field('des_list_cate_sp');
                                        if ($des_list_cate_sp) {
                                            echo do_shortcode(php_set_base_url($des_list_cate_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $des_list_cate_pc = get_field('des_list_cate_pc');
                                        if ($des_list_cate_pc) {
                                            echo do_shortcode(php_set_base_url($des_list_cate_pc));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $list_people_sp_01 = get_field('list_people_sp_01');
                                        if ($list_people_sp_01) {
                                            echo do_shortcode(php_set_base_url($list_people_sp_01));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $list_people_pc_01 = get_field('list_people_pc_01');
                                        if ($list_people_pc_01) {
                                            echo do_shortcode(php_set_base_url($list_people_pc_01));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $wedding_shiki_sp_01 = get_field('wedding_shiki_sp_01');
                                        if ($wedding_shiki_sp_01) {
                                            echo do_shortcode(php_set_base_url($wedding_shiki_sp_01));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $wedding_shiki_pc_01 = get_field('wedding_shiki_pc_01');
                                        if ($wedding_shiki_pc_01) {
                                            echo do_shortcode(php_set_base_url($wedding_shiki_pc_01));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $list_people_sp_02 = get_field('list_people_sp_02');
                                        if ($list_people_sp_02) {
                                            echo do_shortcode(php_set_base_url($list_people_sp_02));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $list_people_pc_02 = get_field('list_people_pc_02');
                                        if ($list_people_pc_02) {
                                            echo do_shortcode(php_set_base_url($list_people_pc_02));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $wedding_shiki_sp_02 = get_field('wedding_shiki_sp_02');
                                        if ($wedding_shiki_sp_02) {
                                            echo do_shortcode(php_set_base_url($wedding_shiki_sp_02));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $wedding_shiki_pc_02 = get_field('wedding_shiki_pc_02');
                                        if ($wedding_shiki_pc_02) {
                                            echo do_shortcode(php_set_base_url($wedding_shiki_pc_02));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php
                                    $ranking_wedding = get_field('ranking_wedding');
                                    if ($ranking_wedding) {
                                        echo do_shortcode(php_set_base_url($ranking_wedding));
                                    }
                                    ?>
                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-single"></div></div>

                                    <?php
                                    $ranking_wedding_kurotomesode = get_field('ranking_wedding_kurotomesode');
                                    if ($ranking_wedding_kurotomesode) {
                                        echo do_shortcode(php_set_base_url($ranking_wedding_kurotomesode));
                                    }
                                    ?>
                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-single"></div></div>

                                    <?php
                                    $ranking_wedding_furisode = get_field('ranking_wedding_furisode');
                                    if ($ranking_wedding_furisode) {
                                        echo do_shortcode(php_set_base_url($ranking_wedding_furisode));
                                    }
                                    ?>
                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-single"></div></div>

                                    <?php
                                    $special_event = get_field('special_event');
                                    if ($special_event) {
                                        echo do_shortcode(php_set_base_url($special_event));
                                    }
                                    ?>

                                    <div class="wrap-shop-list-v2">
                                        <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                            <div class="wrap-text-title">
                                                <h2 class="lbl-title">店舗一覧</h2>
                                                <span class="des-sm-title">Shop list</span>
                                            </div>
                                        </div>
                                        <div class="wrap-shoplist wrap-shoplist-wedding">
                                            <div class="shoplist-intro">
                                                <div class="shoplist-img">
                                                    <div class="img">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-01.jpg" width="328" height="228" alt="">
                                                    </div>
                                                    <div class="img">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-02.jpg" width="328" height="228" alt="">
                                                    </div>
                                                    <div class="img">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-03.jpg" width="328" height="228" alt="">
                                                    </div>
                                                    <div class="img">
                                                        <img data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/img-shop-list-04.jpg" width="328" height="228" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-intro">
                                                    <p>きものレンタルwargoは、フォーマル・観光着物など、</p>
                                                    <p>お気軽に着物を楽しんでいただけるよう全国で19店舗を展開中。</p>
                                                    <p>日本最大級のきものレンタルサービスです。</p>
                                                </div>
                                            </div>
                                            <div class="wrap-list-area">
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="list-item list-01">
                                                        <h3 class="area-name">関東エリア</h3>
                                                        <ul class="list-shop">
                                                            <li>
                                                                <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                    <span class="shop-name">銀座本店</span>
                                                                    <span class="arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                    <span class="shop-name">新宿駅前店</span>
                                                                    <span class="arrow mofuku"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                    <span class="shop-name">東京スカイツリータウンソラマチ店</span>
                                                                    <span class="arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                    <span class="shop-name">鎌倉小町店</span>
                                                                    <span class="arrow"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="list-item list-02">
                                                        <h3 class="area-name">京都エリア</h3>
                                                        <ul class="list-shop">
                                                            <li>
                                                                <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                    <span class="shop-name">フォーマル京都タワー店</span>
                                                                    <span class="arrow"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="list-item list-03">
                                                        <h3 class="area-name">東日本エリア</h3>
                                                        <ul class="list-shop">
                                                            <li>
                                                                <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                    <span class="shop-name">札幌すすきの駅前店</span>
                                                                    <span class="arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                    <span class="shop-name">仙台駅前店</span>
                                                                    <span class="arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                    <span class="shop-name">金沢香林坊店</span>
                                                                    <span class="arrow"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="list-item list-04">
                                                        <h3 class="area-name">西日本エリア</h3>
                                                        <ul class="list-shop">
                                                            <li>
                                                                <a href="<?= home_url(); ?>/access/okinawa-area/okinawa-naha">
                                                                    <span class="shop-name">大阪心斎橋店</span>
                                                                    <span class="arrow"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="left-list">
                                                        <div class="list-item list-01">
                                                            <h3 class="area-name">関東エリア</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                        <span class="shop-name">銀座本店</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                        <span class="shop-name">新宿駅前店</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                        <span class="shop-name">東京スカイツリータウンソラマチ店</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                        <span class="shop-name">鎌倉小町店</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-03">
                                                            <h3 class="area-name">東日本エリア</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                        <span class="shop-name">札幌すすきの駅前店</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                        <span class="shop-name">仙台駅前店</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                        <span class="shop-name">金沢香林坊店</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="right-list">
                                                        <div class="list-item list-02">
                                                            <h3 class="area-name">京都エリア</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                        <span class="shop-name">フォーマル京都タワー店</span>
                                                                        <span class="arrow"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="list-item list-04">
                                                            <h3 class="area-name">西日本エリア</h3>
                                                            <ul class="list-shop">
                                                                <li>
                                                                    <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi">
                                                                        <span class="shop-name">大阪心斎橋店</span>
                                                                        <span class="arrow mofuku"></span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div><!--end wrap-shop-list-->
                                        <div class="wrap-banner-shop-list wedding">
                                            <?php if($isSmartPhone) : ?>
                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/wedding/banner-girl-sp.jpg" width="355" height="151" alt="" />
                                            <?php else: ?>
                                                <img data-src="<?= WP_HOME; ?>/images/formal-rental/wedding/banner-girl-pc.jpg" alt="" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="wrap-btn-v2 flexbox">
                                            <div class="btn-v2 btn-v2-wedding btn-v2-homongi formal-preview-popup-handle">
                                                <div class="btn-v2-reserve">
                                                    <div class="pattern"></div>
                                                    <div class="text">
                                                        <span class="text-link">下見の来店予約はこちら</span>
                                                        <span class="icon-arrow-r-link"></span>
                                                    </div>
                                                    <div class="pattern last"></div>
                                                </div>
                                            </div>
                                        </div><!--end wrap-btn-v2-->
                                        <div class="wrap-line-v2">
                                            <div class="line-v2 line-v2-double"></div>
                                        </div><!--end wrap-line-v2-->
                                    </div><!--end wrap-shop-list-v2-->

                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $reason_choose_sp = get_field('reason_choose_sp');
                                        if ($reason_choose_sp) {
                                            echo do_shortcode(php_set_base_url($reason_choose_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $reason_choose_pc = get_field('reason_choose_pc');
                                        if ($reason_choose_pc) {
                                            echo do_shortcode(php_set_base_url($reason_choose_pc));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $confidence_sp = get_field('confidence_sp');
                                        if ($confidence_sp) {
                                            echo do_shortcode(php_set_base_url($confidence_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $confidence_pc = get_field('confidence_pc');
                                        if ($confidence_pc) {
                                            echo do_shortcode(php_set_base_url($confidence_pc));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <div class="wrap-knowledge wrap-knowledge-wedding">
                                        <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-book.svg" alt="">
                                            </span>
                                            <div class="wrap-text-title">
                                                <h2 class="lbl-title">結婚式に着ていく着物に役立つ基礎知識</h2>
                                            </div>
                                        </div>
                                        <div class="des-knowledge">
                                            <p>結婚式は既婚未婚を問わない女性の略礼装としてお見合いや結納、卒業式やお宮参りなど、幅広いシーンで着ることができます。着る機会の多い訪問着だからこそ、おさえておくべきマナーやセンス良く着こなす豆知識をご紹介します。</p>
                                        </div>
                                        <div class="wrap-topics-knowledge">
                                            <?php echo do_shortcode('[list_product_formal_from_column category=wedding]'); ?>
                                        </div><!--end wrap-topics-knowledge-->
                                        <div class="text-bottom-knowledge">
                                            <p>着物に関するコラムが充実！</p>
                                        </div>
                                        <div class="wrap-btn-v2 flexbox">
                                            <div class="btn-v2 btn-non-link">
                                                <a href="<?= home_url(); ?>/column/wedding">
                                                    <div class="text">
                                                        <span class="text-link">その他のコラムを見る</span>
                                                    </div>
                                                </a>

                                            </div>
                                        </div><!--end wrap-btn-v2-->
                                    </div><!-- End wrap knowledge -->

                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $image_intro_sp = get_field('image_intro_sp');
                                        if ($image_intro_sp) {
                                            echo do_shortcode(php_set_base_url($image_intro_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $image_intro_pc = get_field('image_intro_pc');
                                        if ($image_intro_pc) {
                                            echo do_shortcode(php_set_base_url($image_intro_pc));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php
                                    $intro_wargo = get_field('intro_wargo');
                                    if ($intro_wargo) {
                                        echo do_shortcode(php_set_base_url($intro_wargo));
                                    }
                                    ?>

                                    <?php
                                    $review_shop = get_field('review_shop');
                                    if ($review_shop) {
                                        echo do_shortcode(php_set_base_url($review_shop));
                                    }
                                    ?>

                                    <?php
                                    $photo_gallery_shop = get_field('photo_gallery_shop');
                                    if ($photo_gallery_shop) {
                                        echo do_shortcode(php_set_base_url($photo_gallery_shop));
                                    }
                                    ?>

                                    <?php if($isSmartPhone) :?>
                                        <?php
                                        $how_to_reserve_sp = get_field('how_to_reserve_sp');
                                        if ($how_to_reserve_sp) {
                                            echo do_shortcode(php_set_base_url($how_to_reserve_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $how_to_reserve_pc = get_field('how_to_reserve_pc');
                                        if ($how_to_reserve_pc) {
                                            echo do_shortcode(php_set_base_url($how_to_reserve_pc));
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php
                                    $intro_bottom = get_field('intro_bottom');
                                    if ($intro_bottom) {
                                        echo do_shortcode(php_set_base_url($intro_bottom));
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer('formal'); ?>

<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
))
?>
<style type="text/css">
    *{
        min-height: 0;
        min-width: 0;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        <?php if($isSmartPhone) : ?>
        $('.list-reason .item-reason').click(function(){
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            this.scrollIntoView();
        });
        <?php else: ?>
        $('.list-reason .item-reason').click(function(){
            var index = $(this).index();
            var target = $('.wrap-content-reason .content-reason').eq(index);
            target.siblings().hide();
            target.show();

            $(this).addClass('active');
            $(this).siblings().removeClass('active');
        });
        <?php endif; ?>

        /* Show formal popup - start */
        $('.formal-preview-popup-handle').click(function (event) {
            event.preventDefault();
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        });

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
        /* Show formal popup - end */

        /* Slick slider product  */
       if ($('.sidebar-products-fm-v2').length > 0) {
           $('.sidebar-products-fm-v2 .list').not('.slick-initialized').slick({
               infinite: false,
               slidesToShow: 4,
               slidesToScroll: 4,
               arrows: true,
               lazyLoad: 'ondemand',
               responsive: [{
                   breakpoint: 750,
                   settings: {
                       slidesToShow: 2,
                       slidesToScroll: 2,
                   }
               }]
           });
       }

        // Slider access shop
        if ($('#slider .list-access-shop').length > 0) {
            $('#slider .list-access-shop').not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        fade: true,
                    }
                }]
            });
        }

        //Instagram gallery slider
        if($('.slider-gallery').length > 0){
            $('.slider-gallery').not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                lazyLoad: 'ondemand'
            });
        }

    })
</script>

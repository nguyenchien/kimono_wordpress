<?php
/**
 * Template Name: New Access Page
 * Link: /access
 */
global $post, $language;
$language = Yii::app()->language;
$lang = Yii::app()->language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
get_header('new-kimono');
wp_register_style('new-access-list-style', get_template_directory_uri() . '/css/new-access-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-access-list-style');
if($isSmartPhone){
    wp_enqueue_style('widget-top-shop-list-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-sp-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-sp.css', array('twentytwelve-style'));
} else{
    //Widget shop list
    wp_enqueue_style('widget-top-shop-list-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('widget-top-shop-list-other-pc-style', get_template_directory_uri() . '/css/widget-top-shoplist-other-pc.css', array('twentytwelve-style'));
}
if($lang != 'ja'){
    wp_register_style('new-access-list-'.$lang.'-style', get_template_directory_uri() . '/css/new-access-list-'.$lang.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-access-list-'.$lang.'-style');
}

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
                                <div class="right-column">
                                    <div class="container-box clearfix">
                                        <!-- Kyoto kimono shops-->
                                        <div class="column-list-page access-page clearfix hd-page-template hd-column-list content-column-page newAccessPage">
                                            <div class="sectionLinkToShop">
                                                <div class="box-des-access-top clearfix">
                                                    <div class="image-top-access">
                                                        <img class="pc" src="<?php echo WP_HOME; ?>/images/access/banner-top-access-pc.png" alt="<?php echo strip_tags(get_the_title()); ?>" />
                                                        <img class="sp" src="<?php echo WP_HOME; ?>/images/access/banner-top-access-sp.png" alt="<?php echo strip_tags(get_the_title()); ?>" />
                                                    </div><!-- end image -->
                                                    <div class="info">
                                                        <div class="wrap-exc-access container-access-top">
                                                            <?php
                                                            if (get_field('sub-title-page')) {
                                                                echo '<h1 class="title-h1-access-top text-center">' . get_field('sub-title-page') . '</h1>';
                                                            }
                                                            ?>
                                                            <?php if (!empty($post->post_excerpt)): ?>
                                                                <?php the_excerpt(); ?>
                                                            <?php endif; ?>
                                                        </div><!-- end wrap -->
                                                    </div><!-- end info -->
                                                </div><!-- end box-overview-page-howto-faq -->
                                            </div>
                                            <?php echo php_set_base_url(get_field('shop_list')); ?>
                                            <div class="clearfix">
                                                <ul class="list-shop-type-meta shop-type-meta text-left container-access-top flexbox">
                                                    <li class="item-shop-type-meta"><span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span><span class="text-behind-icon"><?php echo Yii::t('wp_theme.access', '…レギュラープラン') ?></span></li>
                                                    <li class="item-shop-type-meta"><span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span><span class="text-behind-icon"><?php echo Yii::t('wp_theme.access', '…VIPプラン') ?></span></li>
                                                    <li class="item-shop-type-meta"><span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span><span class="text-behind-icon"><?php echo Yii::t('wp_theme.access', '…プチプラン') ?></span></li>
                                                </ul>
                                            </div>

                                            <div class="child-page regionShops clearfix">
                                                <?php
                                                //Meta Shop
                                                $shopTypeMeta = array(
                                                    '1' => array('regular', 'disable'),
                                                    '2' => array('regular'),
                                                    '3' => array('regular', 'disable'),
                                                    '4' => array('regular', 'disable'),
                                                    '5' => array('regular','vip'),
                                                    '6' => array('regular','vip'),
                                                    '7' => array('regular'),
                                                    '8' => array('regular','vip'),
                                                    '9' => array('regular','vip'),
                                                    '10' => array('regular'),
                                                    '11' => array('regular'),
                                                    '14' => array('petit'),
                                                    '15' => array('petit'),
                                                    '16' => array('regular'),
                                                    '17' => array('regular'),
                                                    '18' => array('regular'),
                                                    '20' => array('regular'),
                                                    '24' => array('regular')
                                                );

                                                $shopInKyoto = array(
                                                    MasterValues::SHOP_KYOTO_STATION_ID,
                                                    MasterValues::SHOP_GIONSIJO_ID,
                                                    MasterValues::SHOP_KYOMIZUZAKA_ID,
                                                    MasterValues::SHOP_ARASHIYAMA_ID
                                                );

                                                // Restore original Post Data
                                                wp_reset_postdata();
                                                // WP_Query arguments
                                                $args = array(
                                                    'meta_key'   => '_wp_page_template',
                                                    'meta_value' => 'page-templates/new-access-child-page.php',
                                                    'post_type' => 'page',
                                                    'post_status' => 'publish',
                                                    'posts_per_page' => -1,
                                                    'order' => 'ASC',
                                                    'orderby' => 'menu_order',
                                                );

                                                $shopMeta = array(
                                                    'kyoto' => array(),
                                                    'gion' => array(),
                                                    'arashiyama' => array(),
                                                    'kyomizu' => array(),
                                                    'osaka' => array(),
                                                    'tokyo' => array(),
                                                    'kamakura' => array(),
                                                    'kanazawa' => array(),
                                                    'fukuoka' => array(),
                                                    'okayama' => array(),
                                                );
                                                // The Query
                                                $my_query = new WP_Query($args);
                                                // The Loop
                                                if ($my_query->have_posts()) {
                                                    while ($my_query->have_posts()) {
                                                        $my_query->the_post();
                                                        //Add class corresponding shop type
                                                        $shopId = get_field('shop_id');
                                                        $classTypeShop = '';
                                                        if(!empty($shopId) && !empty($shopTypeMeta[$shopId])){
                                                            $classTypeShop = implode(" ",$shopTypeMeta[$shopId]);
                                                        }

                                                        $regionName = get_field('region_name');
                                                        $shopInf = array(
                                                            'post' => $post,
                                                            'post_name' => $post->post_name,
                                                            'the_permalink' => get_the_permalink(),
                                                            'title' => get_the_title(),
                                                            'shop_detail' => get_field('shop_time_shop', $post->ID),
                                                            'has_post_gallery' => get_post_gallery($post, false),
                                                            'has_post_thumbnail' => has_post_thumbnail(),
                                                            'post_thumbnail_id' => get_post_thumbnail_id(),
                                                            'classTypeShop' => $classTypeShop,
                                                            'shop_id' => $shopId
                                                        );

                                                        if($regionName == 'kyoto'){
                                                            $shopMeta['kyoto'][] = $shopInf;
                                                        }elseif($regionName == 'gion'){
                                                            $shopMeta['gion'][] = $shopInf;
                                                        }elseif($regionName == 'arashiyama'){
                                                            $shopMeta['arashiyama'][] = $shopInf;
                                                        }elseif($regionName == 'kyomizu'){
                                                            $shopMeta['kyomizu'][] = $shopInf;
                                                        }elseif($regionName == 'osaka'){
                                                            $shopMeta['osaka'][] = $shopInf;
                                                        }elseif($regionName == 'tokyo'){
                                                            $shopMeta['tokyo'][] = $shopInf;
                                                        }elseif($regionName == 'kamakura'){
                                                            $shopMeta['kamakura'][] = $shopInf;
                                                        }elseif($regionName == 'kanazawa'){
                                                            $shopMeta['kanazawa'][] = $shopInf;
                                                        }elseif($regionName == 'fukuoka'){
                                                            $shopMeta['fukuoka'][] = $shopInf;
                                                        }elseif($regionName == 'okayama'){
                                                            $shopMeta['okayama'][] = $shopInf;
                                                        }


                                                    }
                                                }



//                                                			var_dump($shopMeta);die;
                                                foreach ($shopMeta as $regionName => $shops){
                                                    //Kyoto
                                                    if ($regionName == 'kyoto' && !empty($shops)) {
                                                        ?>
                                                        <div class="kyoto" id="kyoto-area">
                                                            <div class="banner-kyoto-area banner-area"><a href="<?php echo home_url(); ?>/access/kyoto-area/station-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-kyoto-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt=""></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <?php if ($shop_el['post_name'] != 'petitkyotostation') : ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    //Gion
                                                    elseif ($regionName == 'gion' && !empty($shops)) {
                                                        ?>
                                                        <div class="gion" id="gion-area">
                                                            <div class="banner-gion-area banner-area"><a href="<?php echo home_url(); ?>/access/kyoto-area/gion-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-gion-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt=""></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <?php if ($shop_el['post_name'] != 'petitgionshijo') : ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    //arashiyama
                                                    elseif ($regionName == 'arashiyama' && !empty($shops)) {
                                                        ?>
                                                        <div class="arashiyama" id="arashiyama-area">
                                                            <div class="banner-arashiyama-area banner-area"><a href="<?php echo home_url(); ?>/access/kyoto-area/arashiyama-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-arashiyama-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt=""></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    //Kyomizu
                                                    elseif ($regionName == 'kyomizu' && !empty($shops)) {
                                                        ?>
                                                        <div class="kyomizu" id="kyomizu-area">
                                                            <div class="banner-kyomizu-area banner-area"><a href="<?php echo home_url(); ?>/access/kyoto-area/kiyomizu-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-kyomizu-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt=""></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    //Osaka
                                                    elseif ($regionName == 'osaka' && !empty($shops)) {
                                                        ?>
                                                        <div class="osaka" id="osaka-area">
                                                            <div class="banner-osaka-area banner-area"><a href="<?php echo home_url(); ?>/access/osaka-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-osaka-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt=""></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    //Tokyo
                                                    elseif ($regionName == 'tokyo' && !empty($shops)) {
                                                        ?>
                                                        <div class="tokyo" id="tokyo-area">
                                                            <div class="banner-tokyo-area banner-area"><a href="<?php echo home_url(); ?>/access/asakusa-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-tokyo-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt=""></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    //Kamakura
                                                    elseif ($regionName == 'kamakura' && !empty($shops)) {
                                                        ?>
                                                        <div class="kamakura" id="kamakura-area">
                                                            <div class="banner-kamakura-area banner-area"><a href="<?php echo home_url(); ?>/access/kamakura-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-kamakura-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt=""></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    //kanazawa
                                                    elseif ($regionName == 'kanazawa' && !empty($shops)) {
                                                        ?>
                                                        <div class="kanazawa" id="kanazawa-area">
                                                            <div class="banner-kanazawa-area banner-area"><a href="<?php echo home_url(); ?>/access/kanazawa-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-kanazawa-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt=""></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    //Fukuoka
                                                    elseif ($regionName == 'fukuoka' && !empty($shops)) {
                                                        ?>
                                                        <div class="fukuoka" id="fukuoka-area">
                                                            <div class="banner-fukuoka-area banner-area"><a href="<?php echo home_url(); ?>/access/fukuoka-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-dazaifu-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt=""></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                    //Okayama
                                                    elseif ($regionName == 'okayama' && !empty($shops)) {
                                                        ?>
                                                        <div class="okayama" id="okayama-area">
                                                            <div class="banner-okayama-area banner-area"><a href="<?php echo home_url(); ?>/access/okayama-area"><img src="<?php echo WP_HOME; ?>/images/access/banner-okayama-area-shop-access<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt="<?= Yii::t('access','岡山エリアで着物・浴衣レンタル2,900円｜きものレンタルwargo')?>"></a></div>
                                                            <div class="regionWrap container-access-top">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <div class="page-item shopItem <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <div class="featured-post">
                                                                            <a href="<?= $shop_el['the_permalink']; ?>" title="<?= $shop_el['title']; ?>">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="shop-title">
                                                                            <div class="wrap-shop-title">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"
                                                                                   title="<?= $shop_el['title']; ?>">
                                                                                    <h2 class="shop-name-access title-h2-access-list"><?= $shop_el['title']; ?></h2>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wrap-infor-shop-time">
                                                                            <div class="shop-address text-right"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_address_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_address_formal'); ?></div>
                                                                            <div class="shop-detail shop-time-shop">
                                                                                <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                            </div>
                                                                            <div class="shop-type-meta">
                                                                                <span class="type-meta type-regular"><?= Yii::t('wp_theme','Regular Symbol'); ?></span>
                                                                                <span class="type-meta type-vip"><?= Yii::t('wp_theme','VIP Symbol'); ?></span>
                                                                                <span class="type-meta type-petit"><?= Yii::t('wp_theme','Petit Symbol'); ?></span>
                                                                            </div>
                                                                            <div class="link-to-shop sp">
                                                                                <a href="<?= $shop_el['the_permalink']; ?>"><?= Yii::t('wp_theme','店舗詳細へ'); ?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                }


                                                // Restore original Post Data
                                                wp_reset_postdata();
                                                ?>
                                            </div>
                                            <!-- end of access-child-page-->
                                            <?php echo php_set_base_url(get_field('shop_descreption')); ?>
                                        </div>
                                    </div><!-- end container-box -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end wrap-highend-v2 -->
    </div><!-- end container-box -->
    <script>
        $(document).ready(function(){
            //Toggle shoplist
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
        })
    </script>
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
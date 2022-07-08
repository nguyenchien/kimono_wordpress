<?php
/**
 * Template Name: Formal Access Page
 * Link: formal/access
 */
wp_register_style('access-style', get_template_directory_uri() . '/css/access.css', array('twentytwelve-style'));
wp_enqueue_style('access-style');
wp_register_style('access-formal-style', get_template_directory_uri() . '/css/access-formal.css', array('twentytwelve-style'));
wp_enqueue_style('access-formal-style');
get_header('formal');
global $post;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
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
                                    <?php echo do_shortcode('[FormalSidebarLeft]'); ?>
                                </div>
                                <div class="right-column">
                                    <div class="container clearfix">
                                        <div class="wrap-new-formal-access">
                                            <?php if($isSmartPhone) : ?>
                                                <?php
                                                $banner_area_sp = get_field('banner_area_sp');
                                                if ($banner_area_sp) {
                                                    echo do_shortcode(php_set_base_url($banner_area_sp));
                                                }
                                                ?>
                                            <?php else: ?>
                                                <?php
                                                $banner_area_pc = get_field('banner_area_pc');
                                                if ($banner_area_pc) {
                                                    echo do_shortcode(php_set_base_url($banner_area_pc));
                                                }
                                                ?>
                                            <?php endif; ?>
                                            <div class="description">
                                                <h1 class="title"><?php the_field('page_h1'); ?></h1>
                                                <?php if (!empty($post->post_excerpt)): ?>
                                                    <?php the_excerpt(); ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="box-link-regions">
                                                <ul class="list-regions flexbox">
                                                    <li class="region flexbox">
                                                        <a class="region-name" href="#sapporo"><?= Yii::t('new-formal', '札幌エリア'); ?></a>
                                                    </li>
                                                    <li class="region flexbox">
                                                        <a class="region-name" href="#kyoto"><?= Yii::t('new-formal', '京都エリア'); ?></a>
                                                    </li>
                                                    <li class="region flexbox">
                                                        <a class="region-name" href="#osaka"><?= Yii::t('new-formal', '大阪エリア'); ?></a>
                                                    </li>
<!--                                                    <li class="region flexbox">-->
<!--                                                        <a class="region-name" href="#tokyo">--><?//= Yii::t('new-formal', '銀座エリア'); ?><!--</a>-->
<!--                                                    </li>-->
                                                    <li class="region flexbox">
                                                        <a class="region-name" href="#tokyo"><?= Yii::t('new-formal', '浅草エリア'); ?></a>
                                                    </li>
                                                    <li class="region flexbox">
                                                        <a class="region-name" href="#kamakura"><?= Yii::t('new-formal', '鎌倉エリア'); ?></a>
                                                    </li>
                                                    <li class="region flexbox">
                                                        <a class="region-name" href="#kanazawa"><?= Yii::t('new-formal', '金沢エリア'); ?></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="regions-list">
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
                                                    '18' => array('regular')
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
							'meta_query' => array(
                                                        array(
                                                            'key' => '_wp_page_template',
                                                            'value' => array ( 'page-templates/formal-new-access-child-page.php', 'page-templates/formal-new-access-child-page-v2.php' ),
                                                            'compare' => 'IN'
                                                        )
                                                    ),
                                                    'post_type' => 'page',
                                                    'post_status' => 'publish',
                                                    'posts_per_page' => -1,
                                                    'order' => 'ASC',
                                                    'orderby' => 'menu_order'
                                                );

                                                $shopMeta = array(
                                                    'kyoto' => array(),
                                                    'osaka' => array(),
                                                    'tokyo' => array(),
                                                    'kamakura' => array(),
                                                    'kanazawa' => array()
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
                                                        }elseif($regionName == 'osaka'){
                                                            $shopMeta['osaka'][] = $shopInf;
                                                        }elseif($regionName == 'tokyo'){
                                                            $shopMeta['tokyo'][] = $shopInf;
                                                        }elseif($regionName == 'kamakura'){
                                                            $shopMeta['kamakura'][] = $shopInf;
                                                        }elseif($regionName == 'kanazawa'){
                                                            $shopMeta['kanazawa'][] = $shopInf;
                                                        }elseif($regionName == 'sapporo'){
                                                            $shopMeta['sapporo'][] = $shopInf;
                                                        }
                                                    }
                                                }

                                                $kyotoAreas = array('kyoto', 'gion', 'arashiyama', 'kyomizu');

                                                foreach ($shopMeta as $regionName => $shops){
                                                    //Kyoto
                                                    if (in_array($regionName, $kyotoAreas) && !empty($shops)) {
                                                        ?>
                                                        <div class="region-item" id="kyoto" data-region="1">
                                                            <div class="region-image">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-1.png" alt="">
                                                            </div>
                                                            <div class="region-content flexbox">
                                                                <?php foreach ($shops as $shop_el) {
                                                                    $flag_formal_kyoto = false;
                                                                    if ('formal-kyototower' == $shop_el['post_name']) {
                                                                        $flag_formal_kyoto = true;
                                                                    }
                                                                    ?>
                                                                    <div class="shop-item <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                                                        <a class="wrap-shop-item" href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>">
                                                                            <div class="shop-image">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </div>
                                                                            <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                                                            <div class="shop-info">
                                                                                <p class="shop-distance"><?php echo !$flag_formal_kyoto ? Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id']) : Yii::t('wp_theme','shop_distance_formal'); ?></p>
                                                                                <div class="list-info">
                                                                                    <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                                </div>
                                                                                <p class="shop-link sp"><span class="text"><?= Yii::t('new-formal', '店舗詳細へ'); ?></span></p>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }

                                                    //Osaka
                                                    elseif ($regionName == 'osaka' && !empty($shops)) {
                                                        ?>
                                                        <div class="region-item" id="osaka" data-region="2">
                                                            <div class="region-image">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-2.png" alt="">
                                                            </div>
                                                            <div class="region-content flexbox">
                                                                <?php foreach ($shops as $shop_el) { ?>
                                                                    <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                                                        <a class="wrap-shop-item" href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>">
                                                                            <div class="shop-image">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </div>
                                                                            <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                                                            <div class="shop-info">
                                                                                <p class="shop-distance"><?php echo Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id'])?></p>
                                                                                <div class="list-info">
                                                                                    <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                                </div>
                                                                                <p class="shop-link sp"><span class="text"><?= Yii::t('new-formal', '店舗詳細へ'); ?></span></p>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    <?php }

                                                    //Tokyo (Asakusa)
                                                    elseif ($regionName == 'tokyo' && !empty($shops)) {
                                                        ?>
                                                        <div class="region-item" id="tokyo" data-region="3">
                                                            <div class="region-image">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-3.png" alt="">
                                                            </div>
                                                            <div class="region-content flexbox">
                                                                <?php foreach ($shops as $shop_el) { ?>
                                                                    <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                                                        <a class="wrap-shop-item" href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>">
                                                                            <div class="shop-image">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </div>
                                                                            <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                                                            <div class="shop-info">
                                                                                <p class="shop-distance"><?php echo Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id'])?></p>
                                                                                <div class="list-info">
                                                                                    <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                                </div>
                                                                                <p class="shop-link sp"><span class="text"><?= Yii::t('new-formal', '店舗詳細へ'); ?></span></p>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                                                }?>
                                                            </div>
                                                        </div>
                                                    <?php }

                                                    //Kamakura
                                                    elseif ($regionName == 'kamakura' && !empty($shops)) {
                                                        ?>
                                                        <div class="region-item" id="kamakura" data-region="4">
                                                            <div class="region-image">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-4.png" alt="">
                                                            </div>
                                                            <div class="region-content flexbox">
                                                                <?php foreach ($shops as $shop_el) { ?>
                                                                    <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                                                        <a class="wrap-shop-item" href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>">
                                                                            <div class="shop-image">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </div>
                                                                            <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                                                            <div class="shop-info">
                                                                                <p class="shop-distance"><?php echo Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id'])?></p>
                                                                                <div class="list-info">
                                                                                    <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                                </div>
                                                                                <p class="shop-link sp"><span class="text"><?= Yii::t('new-formal', '店舗詳細へ'); ?></span></p>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                                                }?>
                                                            </div>
                                                        </div>
                                                    <?php }

                                                    //Kanazawa
                                                    elseif ($regionName == 'kanazawa' && !empty($shops)) {
                                                        ?>
                                                        <div class="region-item" id="kanazawa" data-region="5">
                                                            <div class="region-image">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-5.png" alt="">
                                                            </div>
                                                            <div class="region-content flexbox">
                                                                <?php foreach ($shops as $shop_el) { ?>
                                                                    <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                                                        <a class="wrap-shop-item" href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>">
                                                                            <div class="shop-image">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </div>
                                                                            <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                                                            <div class="shop-info">
                                                                                <p class="shop-distance"><?php echo Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id'])?></p>
                                                                                <div class="list-info">
                                                                                    <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                                </div>
                                                                                <p class="shop-link sp"><span class="text"><?= Yii::t('new-formal', '店舗詳細へ'); ?></span></p>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                                                }?>
                                                            </div>
                                                        </div>
                                                    <?php }

                                                    //Sapporo
                                                    elseif ($regionName == 'sapporo' && !empty($shops)) {
                                                        ?>
                                                        <div class="region-item" id="sapporo" data-region="6">
                                                            <div class="region-image">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-sapporo.png" alt="">
                                                            </div>
                                                            <div class="region-content flexbox">
                                                                <?php foreach ($shops as $shop_el) { ?>
                                                                    <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                                                        <a class="wrap-shop-item" href="<?= home_url() .'/formal/access/sapporo-area/' . $shop_el['post_name']?>">
                                                                            <div class="shop-image">
                                                                                <?php swe_get_shop_access_image($shop_el); ?>
                                                                            </div>
                                                                            <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                                                            <div class="shop-info">
                                                                                <p class="shop-distance"><?php echo Yii::t('wp_theme','shop_distance_'.$shop_el['shop_id'])?></p>
                                                                                <div class="list-info">
                                                                                    <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                                                                </div>
                                                                                <p class="shop-link sp"><span class="text"><?= Yii::t('new-formal', '店舗詳細へ'); ?></span></p>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                                                }?>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                }

                                                // Restore original Post Data
                                                wp_reset_postdata();
                                                ?>
                                            </div>

                                            <div class="intro-top-general intro-top-general-petit pc">
                                                <h3 class="title-intro-top"><?= Yii::t('new-formal', 'キモノで観光 きものレンタル wargo プチのご紹介'); ?></h3>
                                                <div class="content-intro-top">
                                                    <p class="intro-text"><?= Yii::t('new-formal', '京都で最安値の「京都きものレンタル wargo」の着物レンタルプチプラン！着物、巾着、下駄、帯、 かんざしが全てセットでなんとたったの1,900円。当店の着付け師がしっかり着付けてくれるので、思いっきり着物を楽しめます。プチ店のみでの学割も新登場！着物はレギュラー店と同じく人気の着物を多数ご用意しております！プチ祇園四条店、プチ京都駅前店どちらも人気観光地へのアクセスは抜群！お手軽に京都を着物で楽しみましょう♪'); ?></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div><!-- end container -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end wrap-highend-v2 -->
    </div><!-- end container -->

<?php get_footer('formal') ?>

<script>
//    $(document).ready(function () {
//        // Begin: Filter region formal
//        $('.item-region-fm-filter').on('change',function(){
//            var listRegion = [];
//            var listRegionFilter = $('.item-region-fm-filter');
//            $.each(listRegionFilter, function () {
//                if($(this).is(":checked")){
//                    var regionVal = parseInt($(this).attr('data-region-type'));
//                    listRegion.push(regionVal);
//                    $(this).parent('.region').addClass('active');
//                }else{
//                    $(this).parent('.region').removeClass('active');
//                }
//
//            });
//            if(listRegion.length == 0){
//                listRegion = null;
//            }
//
//            //Call function RegionFormalDisplay()
//            RegionFormalDisplay(listRegion);
//        });
//        // End: Filter region formal
//    });
//
//    function RegionFormalDisplay(regionList){
//        var listRegionItem = $('.region-item');
//        if(regionList === null){
//            listRegionItem.show();
//        }else{
//            $.each(listRegionItem, function () {
//                var regionItem = parseInt($(this).attr("data-region"));
//                if(regionList.length >0){
//                    if($.inArray(regionItem, regionList) !== -1){
//                        $(this).show();
//                    }else{
//                        $(this).hide();
//                    }
//                }
//            });
//        }
//    }

</script>

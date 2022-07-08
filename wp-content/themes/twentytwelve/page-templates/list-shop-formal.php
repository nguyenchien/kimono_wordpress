<?php
/**
 * Template Name: List Shop Formal
 *
 */

wp_register_style('list-shop-formal-style', get_template_directory_uri() . '/css/list-shop-formal.css', array('twentytwelve-style'));
wp_enqueue_style('list-shop-formal-style');

global $post, $currentUrl;
$currentUrl = $post->post_name;
$slugScene = array('wedding','seijinshiki','sotsugyoushiki','shichigosanscene');
?>

<div class="wrap-list-shop-formal">
    <h2 class="title-general text-center title-general-icon title-list-shop">
        <span class="icon-title-general icon icon-formal-search"></span>
        <?php if ( !in_array($post->post_name, $slugScene) ) : ?>
            <span class="title-list-shop-formal text-title-general"><?= Yii::t('new-formal', $post->post_name); ?><?= Yii::t('new-formal', '取扱店舗'); ?></span>
        <?php else: ?>
            <span class="title-list-shop-formal text-title-general"><?= Yii::t('new-formal', $post->post_name); ?>の着物取扱店舗</span>
        <?php endif; ?>
    </h2>
    <div class="regions-list-shop-formal">
        <?php
        //Meta Shop
        $shopTypeMeta = array(
            '1' => array('regular', 'disable'),
            '2' => array('regular'),
            '3' => array('regular', 'disable'),
            '4' => array('regular', 'disable'),
            '5' => array('regular','vip'),
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
            MasterValues::SHOP_KYOMIZUZAKA_ID,
            MasterValues::SHOP_ARASHIYAMA_ID
        );

        // Restore original Post Data
        wp_reset_postdata();

        // WP_Query arguments
        $args = array(
            'meta_key'   => '_wp_page_template',
            'meta_value' => 'page-templates/formal-new-access-child-page.php',
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
            'sapporo' => array(),
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
                    'shop_detail' => get_field('shop_time_list_shop', $post->ID),
                    'has_post_gallery' => get_post_gallery($post, false),
                    'has_post_thumbnail' => has_post_thumbnail(),
                    'post_thumbnail_id' => get_post_thumbnail_id(),
                    'classTypeShop' => $classTypeShop,
                    'shop_id' => $shopId,
                    'map' => get_field('google_map', $post->ID),
                    'shop_instruction' => get_field('shop_instruction', $post->ID),
                );

                if($regionName == 'kyoto'){
                    $shopMeta['kyoto'][] = $shopInf;
                }elseif($regionName == 'osaka'){
                    $shopMeta['osaka'][] = $shopInf;
                }elseif($regionName == 'tokyo'){
                    $shopMeta['tokyo'][] = $shopInf;
                }elseif($regionName == 'kamakura'){
                    $shopMeta['kamakura'][] = $shopInf;
                }elseif($regionName == 'sapporo'){
                    $shopMeta['sapporo'][] = $shopInf;
                }elseif($regionName == 'kanazawa'){
                    $shopMeta['kanazawa'][] = $shopInf;
                }elseif($regionName == 'tohoku'){
                    $shopMeta['tohoku'][] = $shopInf;
                }

            }
        }

        $kyotoAreas = array('kyoto', 'arashiyama', 'kyomizu');
        $arrCateNotShow = array('seijinshiki', 'sotsugyoushiki', 'wedding');

        foreach ($shopMeta as $regionName => $shops){
            //Kyoto
            if (in_array($regionName, $kyotoAreas) && !empty($shops)) {
                ?>

                <div class="region-item" id="kyoto" data-region="1">
                    <div class="region-image">
                        <?php if($isSmartPhone) : ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-1-sp.jpg" width="640" height="131" alt="">
                        <?php else: ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-1.jpg" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="region-content">
                        <?php foreach ($shops as $shop_el) {
                            if ($shop_el['post_name'] == 'gion-shijo') continue;
                            $flag_formal_kyoto = false;
                            if ('formal-kyototower' == $shop_el['post_name']) {
                                $flag_formal_kyoto = true;
                            }
                            ?>
                            <div class="shop-item <?= $shop_el['post_name']; ?> <?= !$flag_formal_kyoto ? $shop_el['classTypeShop'] : 'regular'; ?> <?= (in_array($shop_el['shop_id'], $shopInKyoto))?'shop-in-kyoto':''; ?>">
                                <div class="wrap-toogle-shop1 flexbox justify-content-between">
                                    <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                    <span class="icon-fa icon-fa-collapsed-top-faqs"></span>
                                </div>
                                <div class="wrap-shop-item wrap-detail-toogle1">
                                    <div class="shop-info">
                                        <p class="shop-distance-formal"><?php echo Yii::t('wp_theme','shop_distance_formal_'.$shop_el['shop_id'])?></p>
                                        <div class="list-info">
                                            <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                        </div>
                                        <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>" class="view-shop-link"><?= $shop_el['title']; ?><?= Yii::t('new-formal', 'の詳細を見る'); ?></a></div>
                                        <?php if (!in_array($currentUrl, $arrCateNotShow)): ?>
                                        <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>/<?= $currentUrl; ?>" class="view-shop-link"><?= Yii::t('new-formal', $currentUrl); ?>のレンタル在庫を見る</a></div>
                                        <?php endif; ?>
                                        <div class="wrap-toogle-shop2">
                                            <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                        </div>
                                        <div class="wrap-detail-toogle2">
                                            <div class="map shop">
                                                <?php echo do_shortcode($shop_el['map']); ?>
                                            </div>
                                            <div class="shop-instruction-formal clearfix">
                                                <p class="title-shop-instruction"><?= Yii::t('new-formal', '【アクセス】'); ?></p>
                                                <?php echo do_shortcode($shop_el['shop_instruction']); ?>
                                            </div>
                                        </div>
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
                <div class="region-item" id="osaka" data-region="2">
                    <div class="region-image">
                        <?php if($isSmartPhone) : ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-2-sp.jpg" width="640" height="131" alt="">
                        <?php else: ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-2.jpg" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="region-content">
                        <?php foreach ($shops as $shop_el) { ?>
                            <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                <div class="wrap-toogle-shop1 flexbox justify-content-between">
                                    <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                    <span class="icon-fa icon-fa-collapsed-top-faqs"></span>
                                </div>
                                <div class="wrap-shop-item wrap-detail-toogle1">
                                    <div class="shop-info">
                                        <p class="shop-distance-formal"><?php echo Yii::t('wp_theme','shop_distance_formal_'.$shop_el['shop_id'])?></p>
                                        <div class="list-info">
                                            <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                        </div>
                                        <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>" class="view-shop-link"><?= $shop_el['title']; ?><?= Yii::t('new-formal', 'の詳細を見る'); ?></a></div>
                                        <?php if (!in_array($currentUrl, $arrCateNotShow)): ?>
                                            <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>/<?= $currentUrl; ?>" class="view-shop-link"><?= Yii::t('new-formal', $currentUrl); ?>のレンタル在庫を見る</a></div>
                                        <?php endif; ?>
                                        <div class="wrap-toogle-shop2">
                                            <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                        </div>
                                        <div class="wrap-detail-toogle2">
                                            <div class="map shop">
                                                <?php echo do_shortcode($shop_el['map']); ?>
                                            </div>
                                            <div class="shop-instruction-formal clearfix">
                                                <p class="title-shop-instruction"><?= Yii::t('new-formal', '【アクセス】'); ?></p>
                                                <?php echo do_shortcode($shop_el['shop_instruction']); ?>
                                            </div>
                                        </div>
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
                <div class="region-item" id="tokyo" data-region="3">
                    <div class="region-image">
                        <?php if($isSmartPhone) : ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-3-sp.jpg" width="640" height="131" alt="">
                        <?php else: ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-3.jpg" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="region-content">
                        <?php foreach ($shops as $shop_el) { ?>
                            <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                <div class="wrap-toogle-shop1 flexbox justify-content-between">
                                    <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                    <span class="icon-fa icon-fa-collapsed-top-faqs"></span>
                                </div>
                                <div class="wrap-shop-item wrap-detail-toogle1">
                                    <div class="shop-info">
                                        <p class="shop-distance-formal"><?php echo Yii::t('wp_theme','shop_distance_formal_'.$shop_el['shop_id'])?></p>
                                        <div class="list-info">
                                            <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                        </div>
                                        <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>" class="view-shop-link"><?= $shop_el['title']; ?><?= Yii::t('new-formal', 'の詳細を見る'); ?></a></div>
                                        <?php if (!in_array($currentUrl, $arrCateNotShow)): ?>
                                            <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>/<?= $currentUrl; ?>" class="view-shop-link"><?= Yii::t('new-formal', $currentUrl); ?>のレンタル在庫を見る</a></div>
                                        <?php endif; ?>
                                        <div class="wrap-toogle-shop2">
                                            <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                        </div>
                                        <div class="wrap-detail-toogle2">
                                            <div class="map shop">
                                                <?php echo do_shortcode($shop_el['map']); ?>
                                            </div>
                                            <div class="shop-instruction-formal clearfix">
                                                <p class="title-shop-instruction"><?= Yii::t('new-formal', '【アクセス】'); ?></p>
                                                <?php echo do_shortcode($shop_el['shop_instruction']); ?>
                                            </div>
                                        </div>
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
                <div class="region-item" id="kamakura" data-region="4">
                    <div class="region-image">
                        <?php if($isSmartPhone) : ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-4-sp.jpg" width="640" height="131" alt="">
                        <?php else: ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-4.jpg" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="region-content">
                        <?php foreach ($shops as $shop_el) { ?>
                            <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                <div class="wrap-toogle-shop1 flexbox justify-content-between">
                                    <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                    <span class="icon-fa icon-fa-collapsed-top-faqs"></span>
                                </div>
                                <div class="wrap-shop-item wrap-detail-toogle1">
                                    <div class="shop-info">
                                        <p class="shop-distance-formal"><?php echo Yii::t('wp_theme','shop_distance_formal_'.$shop_el['shop_id'])?></p>
                                        <div class="list-info">
                                            <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                        </div>
                                        <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>" class="view-shop-link"><?= $shop_el['title']; ?><?= Yii::t('new-formal', 'の詳細を見る'); ?></a></div>
                                        <?php if (!in_array($currentUrl, $arrCateNotShow)): ?>
                                            <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>/<?= $currentUrl; ?>" class="view-shop-link"><?= Yii::t('new-formal', $currentUrl); ?>のレンタル在庫を見る</a></div>
                                        <?php endif; ?>
                                        <div class="wrap-toogle-shop2">
                                            <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                        </div>
                                        <div class="wrap-detail-toogle2">
                                            <div class="map shop">
                                                <?php echo do_shortcode($shop_el['map']); ?>
                                            </div>
                                            <div class="shop-instruction-formal clearfix">
                                                <p class="title-shop-instruction"><?= Yii::t('new-formal', '【アクセス】'); ?></p>
                                                <?php echo do_shortcode($shop_el['shop_instruction']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } ?>
                    </div>
                </div>
            <?php }

            //Sapporo
            elseif ($regionName == 'sapporo' && !empty($shops)) {
                ?>
                <div class="region-item" id="sapporo" data-region="5">
                    <div class="region-image">
                        <?php if($isSmartPhone) : ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-sapporo-sp.jpg" width="640" height="131" alt="">
                        <?php else: ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-sapporo.jpg" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="region-content">
                        <?php foreach ($shops as $shop_el) { ?>
                            <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                <div class="wrap-toogle-shop1 flexbox justify-content-between">
                                    <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                    <span class="icon-fa icon-fa-collapsed-top-faqs"></span>
                                </div>
                                <div class="wrap-shop-item wrap-detail-toogle1">
                                    <div class="shop-info">
                                        <p class="shop-distance-formal"><?php echo Yii::t('wp_theme','shop_distance_formal_'.$shop_el['shop_id'])?></p>
                                        <div class="list-info">
                                            <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                        </div>
                                        <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/sapporo-area/' . $shop_el['post_name']?>" class="view-shop-link"><?= $shop_el['title']; ?><?= Yii::t('new-formal', 'の詳細を見る'); ?></a></div>
                                        <?php if (!in_array($currentUrl, $arrCateNotShow)): ?>
                                            <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>/<?= $currentUrl; ?>" class="view-shop-link"><?= Yii::t('new-formal', $currentUrl); ?>のレンタル在庫を見る</a></div>
                                        <?php endif; ?>
                                        <div class="wrap-toogle-shop2">
                                            <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                        </div>
                                        <div class="wrap-detail-toogle2">
                                            <div class="map shop">
                                                <?php echo do_shortcode($shop_el['map']); ?>
                                            </div>
                                            <div class="shop-instruction-formal clearfix">
                                                <p class="title-shop-instruction"><?= Yii::t('new-formal', '【アクセス】'); ?></p>
                                                <?php echo do_shortcode($shop_el['shop_instruction']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } ?>
                    </div>
                </div>
            <?php }

            //Kanazawa
            elseif ($regionName == 'kanazawa' && !empty($shops)) {
                ?>
                <div class="region-item" id="kanazawa" data-region="6">
                    <div class="region-image">
                        <?php if($isSmartPhone) : ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-5-sp.jpg" width="640" height="131" alt="">
                        <?php else: ?>
                            <img src="<?= WP_HOME; ?>/images/formal-rental/access/banner-region-formal-5.jpg" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="region-content">
                        <?php foreach ($shops as $shop_el) { ?>
                            <div class="shop-item <?= $shop_el['post_name']; ?> <?= $shop_el['classTypeShop']; ?>">
                                <div class="wrap-toogle-shop1 flexbox justify-content-between">
                                    <h2 class="shop-title"><?= $shop_el['title']; ?></h2>
                                    <span class="icon-fa icon-fa-collapsed-top-faqs"></span>
                                </div>
                                <div class="wrap-shop-item wrap-detail-toogle1">
                                    <div class="shop-info">
                                        <p class="shop-distance-formal"><?php echo Yii::t('wp_theme','shop_distance_formal_'.$shop_el['shop_id'])?></p>
                                        <div class="list-info">
                                            <?php echo do_shortcode($shop_el['shop_detail']); ?>
                                        </div>
                                        <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>" class="view-shop-link"><?= $shop_el['title']; ?><?= Yii::t('new-formal', 'の詳細を見る'); ?></a></div>
                                        <?php if (!in_array($currentUrl, $arrCateNotShow)): ?>
                                            <div class="wrap-view-shop-link flexbox"><a href="<?= home_url() .'/formal/access/' . $shop_el['post_name']?>/<?= $currentUrl; ?>" class="view-shop-link"><?= Yii::t('new-formal', $currentUrl); ?>のレンタル在庫を見る</a></div>
                                        <?php endif; ?>
                                        <div class="wrap-toogle-shop2">
                                            <span class="icon-fa icon-fa-collapsed-down-faqs"></span>
                                        </div>
                                        <div class="wrap-detail-toogle2">
                                            <div class="map shop">
                                                <?php echo do_shortcode($shop_el['map']); ?>
                                            </div>
                                            <div class="shop-instruction-formal clearfix">
                                                <p class="title-shop-instruction"><?= Yii::t('new-formal', '【アクセス】'); ?></p>
                                                <?php echo do_shortcode($shop_el['shop_instruction']); ?>
                                            </div>
                                        </div>
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
</div><!-- End wrap-list-shop-formal-->
<script>
    $(document).ready(function(){

        // Show item dau tien

        /*$('#kyoto .shop-item:first-child').find('.wrap-toogle-shop1 .icon-fa').removeClass('icon-fa-collapsed-down-faqs').addClass('icon-fa-collapsed-top-faqs');
        $("#kyoto :first-child").find('.wrap-detail-toogle1').show(); */

        $(".shop-item .wrap-toogle-shop1").click(function(){
            $(this).siblings('.wrap-detail-toogle1').slideToggle();
            $(this).find(".icon-fa").toggleClass("icon-fa-collapsed-down-faqs icon-fa-collapsed-top-faqs");
        });

        $(".wrap-toogle-shop2").click(function(){
           $(this).siblings('.wrap-detail-toogle2').slideToggle();
           $(this).find(".icon-fa").toggleClass("icon-fa-collapsed-down-faqs icon-fa-collapsed-top-faqs");
        });
    });
</script>

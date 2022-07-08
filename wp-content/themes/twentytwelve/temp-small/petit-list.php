<?php
$planTypeKimonoPetitMap = array(
	90 => 'スタンダード着物', //standard-kimono
	92 => 'カップル着物', //couple-standard-kimono
	102 => 'スタンダード着物', //standard-kimono
);

// show single plans by order
$args = array(
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_type' => 'page', //selects pages
    'post_parent' => $post->ID,
    'post_status' => 'publish',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'is_plan_page',
            'value' => 1,
        ),
//        array(
//            'key' => 'is_plan_not_couple',
//            'value' => 1,
//        ),
    ),
    'posts_per_page' => 12,
);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) { ?>
    <?php while ($the_query->have_posts()) {
        $the_query->the_post();
        $planTypeId = get_field('plan_type_id');
		$allPlanShopList = MasterValues::planShopList();
		$shopList = $allPlanShopList[$planTypeId];
		$galleryVipLink = get_field('couple') ? "couple-standard-kimono" : "standard-kimono";
        if (get_field('is_plan_page') === true) { ?>
	        <div class="wrap-list-plan-wg list-plan-filter wrap-list-plan-wg-petit" data-plan-id="<?= $planTypeId?>">
		        <div class="title-general title-list text-center flexbox margin-bt20">
			        <span class="icon-title-general icon icon-prize"> <img src="<?= WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt=""> </span>
			        <h2 class="sub-title-list">
				        <span class="text-title-general">
					        <span class="name">
						        <?php
						        if (get_field('page_h1') == '') {
							        the_title();
						        } else {
							        the_field('page_h1');
						        }
						        ?>
					        </span>
				        </span>
			        </h2>
		        </div>
		        <div class="wrap-col-gallery-col-info row flexbox">
			        <div class="col-gallery">
					        <?php
					        $planType = $planTypeKimonoPetitMap[$planTypeId];
					        echo do_shortcode('[gallery_for_plan_kimono plan_type="'.$planType.'" plan_type_id="'.$planTypeId.'"]');
					        ?>
				        <div class="wrap-link-to-gallery flexbox justify-content-end">
					        <a class="linkto-gallery" href="<?php echo esc_attr(home_url('gallery/' . $galleryVipLink)); ?>"><?php echo Yii::t('new-kimono-pl','このプランでお客様ギャラリー画面へ');  ?></a>
				        </div>
			        </div>
			        <div class="col-info-plan-list">
                        <div class="wrap-web-price-info flexbox">
                            <div class="wg-webpirce-box flexbox">
                                <?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
                                <div class="box-price">
                                    <?php if (get_field('price') != '') { ?>
                                        <p class="sm-price"><?php the_field('price') ?>- ↓ <span class="text-red"><?= Yii::t('new-kimono-pl-petit', 'プチ店限定'); ?></span></p>
                                    <?php } ?>
                                    <?php if (get_field('webprice') != '') { ?>
                                        <p class="lg-pirce"><?php the_field('webprice') ?><var class="line-price">-</var><span class="sm-sub-price"><?= Yii::t('new-kimono-pl', '税抜'); ?></span></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="sub-des"><?= Yii::t('new-kimono-pl','すべてセッ ト追加料金一切不要。<br/>着付け代・小物代を含みます。'); ?></div>
                        </div>
                        <div class="wrap-des-wg-pl">
                            <?php if (!empty($post->post_excerpt)): ?>
                                <?php the_excerpt(); ?>
                            <?php endif; ?>
                        </div>
				        <div class="wrap-corresponding-store-wg">
					        <h3 class="title-corresponding-store"><?= Yii::t('new-kimono-pl','対応店舗'); ?></h3>
					        <div class="info-corresponding-store">
						        <?php foreach ($shopList as $shopId):?>
							        <?php
							        $modelShop = Shop::getShopById($shopId);
							        if(empty($modelShop))
								        continue;
							        ?>
							        <span class="shop-item" id="shop-item-<?php echo $shopId?>"><?php echo $modelShop->shop_name?></span>
						        <?php endforeach?>
					        </div>
				        </div>
						<div class="wraper-bnt-reserve wraper-bnt-reserve-petit flexbox align-items-center"> <a class="btn-formal btn-reserve btn-color-pink" href="#booking-petit"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></a></div>
			        </div>
		        </div>
	        </div>
            <?php
        }
    }
    wp_reset_postdata();
}
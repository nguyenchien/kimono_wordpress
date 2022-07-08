<div class="wrap-list-shop-formal-top-page">
	<h2 class="title-list-shop-top title-general text-center title-general-icon">
		<span class="icon-title-general icon icon-formal-search"></span>
		<span class="title-list-shop-top text-title-general"><?php echo Yii::t('new_kimono', '着物レンタルができる店舗を探す')?></span>
	</h2>
	<div class="list-shop-formal-top-page">
	<?php
		$SHOP_REGION_NAME = MasterValues::$SHOPS_OF_REGION_FOR_FORMAL;
		foreach ($SHOP_REGION_NAME as $region_id => $shops){
            ?>
            <div class="kyoto area-items" id="kyoto-area">
                <div class="new-title-shop-area">
                    <a href="<?php echo array_key_exists($region_id, MasterValues::$NEW_MV_AREA_SLUG) ? home_url() . MasterValues::$NEW_MV_AREA_SLUG[$region_id] : "" ?>"><?php echo Yii::t('new_kimono_footer', 'Region_'.$region_id.'_エリア')?></a>
                </div>
                <div class="regionWrap container-access-top">
                    <?php foreach ($shops as $shop_id) {
                        ?>
                        <div class="page-item shopItem shop_<?= $shop_id ?>">
                            <div class="shop-title"><?= Yii::t('wp_theme', 'shop_title_'.$shop_id) ?></div>
                            <div class="shop-address"><?php echo Yii::t('new_kimono_sidebar_left','shop-address-'.$shop_id)?></div>
                            <div class="wrap-view-shop-link flexbox"><a href="<?php echo array_key_exists($shop_id, MasterValues::$NEW_MV_SHOP_SLUG) ? home_url() . MasterValues::$NEW_MV_SHOP_SLUG[$shop_id] : "" ?>" class="view-shop-link"><?= Yii::t('new-formal', '店舗情報を見る'); ?></a></div>
                        </div>

                        <?php
                    } ?>
                </div>
            </div>
		<?php }
	?>
	</div><!--End div list-shop-formal-top-page-->
</div><!--end div wrap-list-shop-formal-top-page -->
<div class="wrap-new-banner-formal-options wrap-topics-banner-widget">
    <div class="title-general text-center title-general-icon">
        <span class="icon-title-general icon icon-formal-search"></span>
        <div class="text-title-general flexbox">Topics<h2 class="sub-descript-title-general">人気のトピック</h2></div>
    </div>
	<ul class="list-banner flexbox">
<!--		<li class="item-banner">-->
<!--			<div class="image-banner">-->
<!--				<a href="/takuhai"><img src="--><?//= WP_HOME ?><!--/images/new-formal-options/new-formal-options-02.jpg" alt="wargoのレンタルは足袋や襦袢も￥0で追加料金無し。"></a>-->
<!--			</div>-->
<!--			<p class="text-banner">-->
<!--				<a href="/takuhai">wargoのレンタルは足袋や襦袢も￥0で追加料金無し。</a>-->
<!--			</p>-->
<!--		</li>-->
		<li class="item-banner">
			<div class="image-banner">
				<a href="<?= WP_HOME ?>/formal/why-goodvalue"><img width="700" height="143" src="<?= WP_HOME ?>/images/new-formal-options/new-formal-options-03.jpg" alt="全国どこでも【送料無料】 で冠婚葬祭用のお着物を発送致します。"></a>
			</div>
			<p class="text-banner">
				<a href="<?= WP_HOME ?>/formal/why-goodvalue">本格的な着物レンタルを何故安く提供できるのか？秘密をお教えします</a>
			</p>
		</li>
<!--		<li class="item-banner">-->
<!--			<div class="image-banner">-->
<!--				<a href="/group/plan20"><img src="--><?//= WP_HOME ?><!--/images/new-formal-options/new-formal-options-04.jpg" alt="モ デル気分で観光散策♬とっておきの一枚はプロにお任せ!!"></a>-->
<!--			</div>-->
<!--			<p class="text-banner">-->
<!--				<a href="/group/plan20">モ デル気分で観光散策♬とっておきの一枚はプロにお任せ!!</a>-->
<!--			</p>-->
<!--		</li>-->
		<li class="item-banner">
			<div class="image-banner">
				<a href="<?= WP_HOME ?>/hairset"><img width="700" height="143" src="<?= WP_HOME ?>/images/new-formal-options/new-formal-options-05.jpg" alt="モ デル気分で観光散策♬とっておきの一枚はプロにお任せ!!"></a>
			</div>
			<p class="text-banner">
				<a href="<?= WP_HOME ?>/hairset">1,900円なのにプロのヘアスタイリストが行います♬</a>
			</p>
		</li>
		<li class="item-banner">
			<div class="image-banner">
				<a href="<?= WP_HOME ?>/kimono/photo-studio"><img width="700" height="142" src="<?= WP_HOME ?>/images/new-formal-options/new-formal-options-01.jpg" alt="本格スタジオが2,900円で利用できるお得プラン♬"></a>
			</div>
			<p class="text-banner">
				<a href="<?= WP_HOME ?>/kimono/photo-studio">本格スタジオが2,900円で利用できるお得プラン♬</a>
			</p>
		</li>
        <li class="item-banner">
            <div class="image-banner">
                <a href="<?= WP_HOME ?>/formal/furisode/furisodemaedori"><img width="606" height="123" src="<?= WP_HOME ?>/images/formal-rental/access/banner-furisode.png" alt="<?= Yii::t('top-new-formal-options','成人式振袖レンタルの前撮りキャンペーン') ?>"></a>
            </div>
        </li>
<!--		--><?php //if($attrShortCode['takuhai'] == "false"): ?>
<!--		<li class="item-banner">-->
<!--			<div class="image-banner">-->
<!--				<a href="/group/plan20"><img src="--><?//= WP_HOME ?><!--/images/new-formal-options/new-formal-options-06.jpg" alt="全国どこでも【送料無料】 で冠婚葬祭用のお着物を発送致します。"></a>-->
<!--			</div>-->
<!--			<p class="text-banner">-->
<!--				<a href="/group/plan20">全国どこでも【送料無料】 で冠婚葬祭用のお着物を発送致します。</a>-->
<!--			</p>-->
<!--		</li>-->
<!--		--><?php //endif ?>
	</ul>
</div>
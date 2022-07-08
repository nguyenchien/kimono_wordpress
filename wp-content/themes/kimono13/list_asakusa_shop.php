<?php
/**
 * User: tudh
 * Date: 21/12/2015
 * Time: 14:20
 */
//  clear cache
//	delete_transient('footer-getshopList');
//  Key = asakusa_shops_{lang}
$shopList = getShopInformationFromSlug();
?>
<div class="footer-region footer-region-sp">
	<?php
	//check shop_id is empty or region <> 2 (asakusa)
	if (isset($shopList) && !empty($shopList[MasterValues::SHOP_ASAKUSA_ID])) {
		$asakusa = $shopList[MasterValues::SHOP_ASAKUSA_ID];
		
		if($asakusa){
			if (isset($asakusa['region']) && $asakusa['region'] != MasterValues::REGION_TOKYO_SHOP) {
				return '';
			}
		}
		?>

		<div class="region-item margin-item"><!-- Asakusa region -->
			<div class="region-footer-new asakusa-f">
				<h2><span class="region-title"><?php echo Yii::t('footer', '関東');?></span></h2>
				<div class="col-r-footer">
					<a href="<?php echo esc_url(home_url('/') . 'asakusa/asakusa-access/asakusa'); ?>">
						<img class="icon-shop-8" src="<?php echo WP_HOME . '/images/icons/icon-shop8.png' ?>" alt="<?php echo Yii::t('wp_theme', '浅草店_ALT') ?>"/>
					</a>
					<div class="col-r-footer col-r-footer-sp">
						<div class="wrap-pink">
							<span class="pink-title"><?php echo DBUtils::getReceptionTime(MasterValues::REGION_TOKYO_SHOP, Yii::t('footer', '営業時間 {open_time}-{close_time}')); ?></span>
						</div>
						<div class="number">
							<span class="tel">☎<?php echo Yii::t('wp_theme', 'asakusa_tel'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-google row-first">
				<div class="wrap-cont map-google clearfix">
					<div class="cont-left column one-third alpha">
						<p class="map" id="map-google-tokyo"></p>
					</div>
					<!-- end cont-left -->
				</div>
			</div>
			<!-- end div.item_footer google-->
			<div class=" asakusa wrap-cont list-shops clearfix">
				<div class="cont-shops cont-right-region column one-third omega">
					<?php
					if (Yii::app()->language === 'vi' || Yii::app()->language === 'en')
						$addnewtitleenvi = 'add-new-title-envi';
					?>
					<div class="item_footer row-first">
						<dl class="tokyo-shop-1">
							<dt class="add-new-title <?php echo $addnewtitleenvi; ?>">
								<a href="<?php echo esc_url(home_url('/') . 'asakusa/asakusa-access/asakusa'); ?>"><?php echo Yii::t('wp_theme', '浅草店') ?>
									<span class="text-new-shop-1"><?php echo Yii::t('wp_theme', '1月15日<br/>OPEN!') ?></span>
								</a>
							</dt>
							<dd>
								<a href="<?php echo esc_url(home_url('/') . 'asakusa/asakusa-access/asakusa'); ?>">
									<dl class="shop-1-info">
										<dd class="add-new-title-shop"><?php echo Yii::t('wp_theme', '浅草寺より徒歩3分') ?></dd>
										<dd class="address-map" name-shop="浅草店"><?php echo Yii::t('wp_theme', '東京都台東区浅草 1-41-8 アトリエビル') ?></dd>
										<dd class="bold-new-style"><?php echo $asakusa['open_time']; ?>-<?php echo $asakusa['close_time']; ?>
											<br><?php echo Yii::t('wp_theme', '※返却時間は{return_time}までです。', array('{return_time}' => $asakusa['return_time'])) ?>
										</dd>
										<dd class="ft-shop-tt-option"><?php echo Yii::t('wp_theme', 'お店への行き方'); ?></dd>
										<dd class="ft-text-goway"><?php echo Yii::t('wp_theme', '地下鉄・東武浅草駅空、雷門方向へ進み、雷門をくぐって新仲見世を直進。伝法院通りの交差点を左へ曲がり、五差路まで直進。六区通りに入りすぐ左側。'); ?></dd>
									</dl>
								</a>
							</dd>
						</dl>
					</div>
					<!-- end div.item_footer-->
					<div class="clearAlltn"></div>
				</div>
				<!-- end cont-right -->
			</div>
			<!-- end wrap-cont -->
		</div>
	<?php } // end tokyo region ?>


	<?php
	//check shop_id is empty or region <> 2 (kamakura)
	if (isset($shopList) && !empty($shopList[MasterValues::SHOP_KOMACHI_ID])) {
		$komachi = $shopList[MasterValues::SHOP_KOMACHI_ID];

		if($komachi){
			if (isset($komachi['region']) && $komachi['region'] != MasterValues::REGION_TOKYO_SHOP) {
				return '';
			}
		}
		?>

		<div class="region-item"><!-- Kamakura region -->
			<div class="region-footer-new kamakura-f">
				<h2> <span class="region-title"><?php echo Yii::t('footer', '関東'); ?></span></h2>
				<div class="col-r-footer">
					<a href="<?php echo esc_url(home_url('/') . 'access/kamakura'); ?>">
						<img class="icon-shop-9" src="<?php echo WP_HOME . '/images/icons/icon-shop9.png' ?>" alt="<?php echo Yii::t('wp_theme', '鎌倉小町店_ALT') ?>"/>
					</a>
					<div class="col-r-footer col-r-footer-sp">
						<div class="wrap-pink">
                        <span class="pink-title">
                            <?php echo DBUtils::getReceptionTime(MasterValues::REGION_TOKYO_SHOP, Yii::t('footer', '営業時間 {open_time}-{close_time}')); ?>
                        </span>
						</div>
						<div class="number">
							<span class="tel">☎<?php echo Yii::t('wp_theme', 'kamakura_tel'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-google row-first">
				<div class="wrap-cont map-google clearfix">
					<div class="cont-left column one-third alpha">
						<p class="map" id="map-google-kamakura"></p>
					</div>
					<!-- end cont-left -->
				</div>
			</div>
			<!-- end div.item_footer google-->
			<div class=" kamakura wrap-cont list-shops clearfix">
				<div class="cont-shops cont-right-region column one-third omega">
					<?php
					if (Yii::app()->language === 'vi' || Yii::app()->language === 'en')
						$addnewtitleenvi = 'add-new-title-envi';
					?>
					<div class="item_footer row-first">
						<dl class="kamakura-shop-1">
							<dt class="add-new-title <?php echo $addnewtitleenvi; ?>">
								<a href="<?php echo esc_url(home_url('/') . 'access/kamakura'); ?>"><?php echo Yii::t('wp_theme', '鎌倉小町店') ?>
									<span class="text-new-shop-1"><?php echo Yii::t('wp_theme', '5月7日<br/>OPEN!') ?></span>
								</a>
							</dt>
							<dd>
								<a href="<?php echo esc_url(home_url('/') . 'access/kamakura'); ?>">
									<dl class="shop-1-info">
										<dd class="add-new-title-shop"><?php echo Yii::t('wp_theme', '鎌倉駅徒歩2分') ?></dd>
										<dd class="address-map" name-shop="小町店"><?php echo Yii::t('wp_theme', '神奈川県鎌倉市小町１丁目５−１３') ?></dd>
										<dd class="bold-new-style"><?php echo $komachi['open_time']; ?>-<?php echo $komachi['close_time']; ?>
											<br><?php echo Yii::t('wp_theme', '※最終返却{return_time}までです。', array('{return_time}' => $komachi['return_time'])) ?>
										</dd>
										<dd class="ft-shop-tt-option"><?php echo Yii::t('wp_theme', '鎌倉駅から'); ?></dd>
										<dd class="ft-text-goway"><?php echo Yii::t('wp_theme', '鎌倉駅東口を出て左側、赤い鳥居をくぐって小町通に入ります。小町通の入り口から一本目の右側の路地を入り、右側です。'); ?></dd>
									</dl>
								</a>
							</dd>
						</dl>
					</div>
					<!-- end div.item_footer-->
					<div class="clearAlltn"></div>
				</div>
				<!-- end cont-right -->
			</div>
			<!-- end wrap-cont -->
		</div> <!-- end Kamakura region -->
	<?php } ?>
</div> <!-- end shop-region -->

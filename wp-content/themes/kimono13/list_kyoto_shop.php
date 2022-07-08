<?php
/**
 * Created by PhpStorm.
 * User: Loi Dang
 * Date: 10/28/15
 * Time: 3:06 PM
 */

?>
<div class="kyoto contact-info two-thirds column omega clearfix">
	<div class="region-footer-new first-region clearfix">
		
		<div class="col-r-footer">
			<img class="new-6shop-icon" src="<?php echo WP_HOME . '/images/icons/left-new-6-shop.png'?>" alt=""/>
			<div class="wrap-text">
				<div class="wrap-pink">
					<span class="pink-title">
						<?php echo Yii::t('wp_theme', '京都全店共通')?>
					</span>
				</div>
				<div class="number clearfix">
					<span class="tel">☎<?php echo Yii::t('wp_theme', 'kyoto_tel_2');?></span><span class="time"><?php echo DBUtils::getReceptionTime(MasterValues::REGION_KYOTO_SHOP, Yii::t('footer', '営業時間 {open_time}-{close_time}'));?></span>
				</div>
			</div>
		</div>
		<div class="col-l-footer">
			<span class="region-title-new region-title-new-ru"><?php echo Yii::t('footer', '京都エリア');?></span>
		</div>
	</div>
	<div class="wrap-cont map-google map-tokyo clearfix">
		<div class="cont-left column one-third alpha">
			<p class="map" id="map-google"></p>
		</div><!-- end cont-left -->
	</div>
	<div class="clearAlltn"></div>
	<div class="wrap-cont list-shops clearfix">
		<div class="cont-shops cont-right column one-third omega">
			<?php
				$shopList = getShopInformationFromSlug();
				$shinkyogokuShop = isset($shopList[MasterValues::SHOP_SHINKYOGOKU_ID]) ? $shopList[MasterValues::SHOP_SHINKYOGOKU_ID] : '';
				$kiyomizuzakaShop = isset($shopList[MasterValues::SHOP_KYOMIZUZAKA_ID]) ? $shopList[MasterValues::SHOP_KYOMIZUZAKA_ID]: '';
				$ninenzakaShop = isset($shopList[MasterValues::SHOP_NINENZAKA_ID]) ? $shopList[MasterValues::SHOP_NINENZAKA_ID]: '';
				$kinkakujiShop = isset($shopList[MasterValues::SHOP_KINKAKUJI_ID]) ? $shopList[MasterValues::SHOP_KINKAKUJI_ID]: '';
				$kyotostationShop = isset($shopList[MasterValues::SHOP_KYOTO_STATION_ID]) ? $shopList[MasterValues::SHOP_KYOTO_STATION_ID] : '';
				$gionsijo = isset($shopList[MasterValues::SHOP_GIONSIJO_ID]) ? $shopList[MasterValues::SHOP_GIONSIJO_ID] : '';
			?>
			<?php
			$addnewtitleenvi = "";

			if(Yii::app()->language === 'vi' || Yii::app()->language === 'en')
			    $addnewtitleenvi = 'add-new-title-envi';
			?>
			<?php if (!empty($kyotostationShop)) { ?>
			<div class="shop-item item_footer row-first">
			    <dl class="shop-1">
					<dt class="add-new-title <?php echo $addnewtitleenvi; ?>"><a href="<?php echo esc_url( home_url( '/' ).'access/kyotostation' );?>"><var><?php echo Yii::t('wp_theme','京都駅前<br>京都タワー店')?></var>
						<!--<img class="icon-shop-1 icon-icon-kyoto" src="<?php //echo WP_HOME . '/images/icons/icon_open_' . Yii::app()->language . '.png' ?>" alt=""/>-->
						<span class="icon-icon-kyoto"></span>
						<span class="text-new-shop-1"><?php echo Yii::t('wp_theme','京都最大75坪!!')?></span>
						</a>
					</dt>
					<dd>
						<a href="<?php echo esc_url( home_url( '/' ).'access/kyotostation' );?>">
							<dl class="shop-1-info">
								<dd class="add-new-title-shop"><?php echo Yii::t('wp_theme','京都駅徒歩2分京都タワービル3F')?></dd>
								<dd class="address-map" name-shop="京都駅前京都タワー店"><?php echo Yii::t('wp_theme','京都市下京区烏丸通烏丸通七条下ル東側東塩小路町721-1<br />京都タワービル3F')?></dd>
								<dd class="bold-new-style"><?php echo $kyotostationShop['open_time']; ?>-<?php echo $kyotostationShop['close_time']; ?><br><?php echo Yii::t('wp_theme','※返却時間は{return_time}までです。', array('{return_time}'=>$kyotostationShop['return_time']))?></dd>
								<dd class="ft-shop-tt-option"><?php echo Yii::t('wp_theme', 'お店への行き方'); ?></dd>
								<dd class="ft-text-goway"><?php echo Yii::t('wp_theme', '京都駅より徒歩2分。烏丸中央口を出て正面の京都タワービル3階にございます。');?></dd>
							</dl>
						</a>
					</dd>
			    </dl>
			</div><!-- end div.item_footer-->
			<?php } // ?>
			<?php if (!empty($gionsijo)) { ?>
			<div class="shop-item shop-item6 item_footer row-first">
			    <dl class="shop-6">
			        <dt class="add-new-title <?php echo $addnewtitleenvi; ?>">
			            <a href="<?php echo esc_url( home_url( '/' ).'access/gion-shijo' );?>">
			                <var><?php echo Yii::t('wp_theme','祇園四条店')?></var>
							<span class="icon-icon-gionshijo icon-fa-gionshijo-01"></span>
<!--						<img class="icon-shop-6" src="--><?php //echo WP_HOME;?><!--/images/icons/icon-shop6.png" alt="" />-->
			                <span class="text-new-shop-6"><?php echo Yii::t('wp_theme','11月３日<br/>OPEN予定!!')?></span>
			            </a>
			        </dt>
			        <dd>
			            <a href="<?php echo esc_url( home_url( '/' ).'access/gion-shijo' );?>">
			                <dl class="shop-6-info">
			                    <dd class="add-new-title-shop"><?php echo Yii::t('wp_theme','祇園四条駅徒歩1分')?></dd>
			                    <dd class="address-map" name-shop="祇園四条店"><?php echo Yii::t('wp_theme','京都市東山区四条通大和大路西入<br/>中之町216<br /> 祇園OKIビル2F')?></dd>
			                    <dd class="bold-new-style"><?php echo $gionsijo['open_time']; ?>-<?php echo $gionsijo['close_time']; ?><br><?php echo Yii::t('wp_theme','※返却時間は{return_time}までです。', array('{return_time}'=>$gionsijo['return_time']))?></dd>
			                    <dd class="ft-shop-tt-option"><?php echo Yii::t('wp_theme', 'お店への行き方'); ?></dd>
			                    <dd class="ft-text-goway"><?php echo Yii::t('wp_theme', '京阪祇園四条駅6番出口を東へ約60m。四条大和大路通の南西角のビルの2階です。');?></dd>
			                </dl>
			            </a>
			        </dd>
			    </dl>
			</div><!-- end div.item_footer-->
			<?php } // ?>
			<?php if (!empty($shinkyogokuShop)) { ?>
			<div class="shop-item shop-item2 item_footer row-first">
			    <dl class="shop-2">
					<dt class="add-new-title <?php echo $addnewtitleenvi; ?>"><a href="<?php echo esc_url( home_url( '/' ).'access/shinkyogoku' );?>"><var><?php echo Yii::t('wp_theme','新京極店')?></var>
					<!--<img class="icon-shop-2" src="<?php //echo WP_HOME;?>/images/icons/icon-shop2.png" alt="" />-->
					<span class="icon-icon-shinkyogoku"></span>
						<span class="text-new-shop-2"><?php echo Yii::t('wp_theme','着物で鴨川散策も<br/>おすすめ')?></span></a></dt>
			        <dd>
			            <a href="<?php echo esc_url( home_url( '/' ).'access/shinkyogoku' );?>">
			                <dl class="shop-2-info">
			                    <dd class="add-new-title-shop"><?php echo Yii::t('wp_theme','河原町駅徒歩1分')?></dd>
			                    <dd class="address-map" name-shop="新京極店"><?php echo Yii::t('wp_theme','京都府京都市中京区中之町 541-4<br />かんざし屋wargo新京極店 2F')?></dd>
			                    <dd class="bold-new-style"><?php echo $shinkyogokuShop['open_time']; ?>-<?php echo $shinkyogokuShop['close_time']; ?><br><?php echo Yii::t('wp_theme','※返却時間は{return_time}までです。', array('{return_time}'=>$shinkyogokuShop['return_time']))?></dd>
			                    <dd class="ft-shop-tt-option"><?php echo Yii::t('wp_theme', 'お店への行き方'); ?></dd>
			                    <dd class="ft-text-goway"><?php echo Yii::t('wp_theme', '阪急河原町駅の9番出口を新京極通に出てそのまま北上します。徒歩1～2分で左手側に見えてまいります。');?></dd>
			                </dl>
			            </a>
			        </dd>
			    </dl>
			</div><!-- end div.item_footer-->
			<?php } // ?>
			<?php if (!empty($kiyomizuzakaShop)) { ?>
			<div class="shop-item shop-item3 item_footer row-first clear-mg">
			    <dl class="shop-3">
					<dt class="add-new-title <?php echo $addnewtitleenvi; ?>"><a href="<?php echo esc_url( home_url( '/' ).'access/kiyomizuzaka' );?>"><var><?php echo Yii::t('wp_theme','清水坂店')?></var>
						<!--<img class="icon-shop-3" src="<?php //echo WP_HOME;?>/images/icons/icon-shop3.png" alt="" />-->
						<span class="icon-icon-kiyomizuzaka"></span>
						<span class="text-new-shop-3"><?php echo Yii::t('wp_theme','清水寺へ続く<br/>必見エリア！')?></a>
					</dt>
			        <dd>
			            <a href="<?php echo esc_url( home_url( '/' ).'access/kiyomizuzaka' );?>">
			                <dl class="shop-3-info">
			                    <dd class="add-new-title-shop"><?php echo Yii::t('wp_theme','清水寺徒歩５分')?></dd>
			                    <dd class="address-map" name-shop="清水坂店"><?php echo Yii::t('wp_theme','京都府京都市東山区五条橋東 6-583-104<br />かんざし屋wargo清水坂店 2F')?></dd>
			                    <dd class="bold-new-style"><?php echo $kiyomizuzakaShop['open_time']; ?>-<?php echo $kiyomizuzakaShop['close_time']; ?><br><?php echo Yii::t('wp_theme','※返却時間は{return_time}までです。', array('{return_time}'=>$kiyomizuzakaShop['return_time']))?></dd>
			                    <dd class="ft-shop-tt-option"><?php echo Yii::t('wp_theme', 'お店への行き方'); ?></dd>
			                    <dd class="ft-text-goway"><?php echo Yii::t('wp_theme', '清水寺から松原通を下り「清水寺 経書堂」の四つ角を左折、市営駐車場入り口前にございます。');?></dd>
			                </dl>
			            </a>
			        </dd>
			    </dl>
			</div><!-- end div.item_footer-->
			<?php } // ?>
			<?php if (!empty($kinkakujiShop)) { ?>
			<div class="shop-item shop-item4 item_footer row-second clear-768">
			    <dl class="shop-4">
					<dt class="add-new-title <?php echo $addnewtitleenvi; ?>"><a href="<?php echo esc_url( home_url( '/' ).'access/kinkakuji' );?>"><var><?php echo Yii::t('wp_theme','金閣寺店')?></var>
						<!--<img class="icon-shop-4" src="<?php //echo WP_HOME;?>/images/icons/icon-shop4.png" alt="" />-->
						<span class="icon-icon-kinkakuji"></span>
						<span class="text-new-shop-4"><?php echo Yii::t('wp_theme','金閣寺と着物は<br/>愛称最高♪')?></a>
					</dt>
			        <dd>
			            <a href="<?php echo esc_url( home_url( '/' ).'access/kinkakuji' );?>">
			                <dl class="shop-4-info">
			                    <dd class="add-new-title-shop"><?php echo Yii::t('wp_theme','金閣寺徒歩30秒')?></dd>
			                    <dd class="address-map" name-shop="金閣寺店"><?php echo Yii::t('wp_theme','京都府京都市北区衣笠馬場町 30-6<br />かんざし屋wargo 金閣寺店 3F')?></dd>
			                    <dd class="bold-new-style"><?php echo $kinkakujiShop['open_time']; ?>-<?php echo $kinkakujiShop['close_time']; ?><br><?php echo Yii::t('wp_theme','※返却時間は{return_time}までです。', array('{return_time}'=>$kinkakujiShop['return_time']))?></dd>
			                    <dd class="ft-shop-tt-option"><?php echo Yii::t('wp_theme', 'お店への行き方'); ?></dd>
			                    <dd class="ft-text-goway"><?php echo Yii::t('wp_theme', '金閣寺より徒歩約30秒。金閣寺を背にして反対側の歩道に渡り、そのまま右手の方向に進むとすぐに看板が見えてまいります。');?></dd>
			                </dl>
			            </a>
			        </dd>
			    </dl>
			</div><!-- end div.item_footer-->
			<?php } // ?>
			<?php if (!empty($ninenzakaShop)) { ?>
			<div class="shop-item shop-item5 item_footer tn-th-03-04 row-second last">
			    <dl class="shop-5">
					<dt class="add-new-title <?php echo $addnewtitleenvi; ?>"><a href="<?php echo esc_url( home_url( '/' ).'access/ninenzaka' );?>"><var><?php echo Yii::t('wp_theme','二年坂店')?></var>
						<!--<img class="icon-shop-5" src="<?php //echo WP_HOME;?>/images/icons/icon-shop5.png" alt="" />-->
						<span class="icon-icon-ninenzaka"></span>
						<span class="text-new-shop-5"><?php echo Yii::t('wp_theme','石畳が続く<br/>美景観地区')?></a>
					</dt>
			        <dd>
			            <a href="<?php echo esc_url( home_url( '/' ).'access/ninenzaka' );?>">
			                <dl class="shop-5-info">
			                    <dd class="add-new-title-shop"><?php echo Yii::t('wp_theme','現在改装中')?></dd>
			                    <dd class="address-map" name-shop="二年坂店"><?php echo Yii::t('wp_theme','京都府京都市東山区桝屋町349-9<br />かんざし屋wargo二年坂店west 2F')?></dd>
			                    <dd class="bold-new-style"><?php echo $ninenzakaShop['open_time']; ?>-<?php echo $ninenzakaShop['close_time']; ?><br><?php echo Yii::t('wp_theme','※返却時間は{return_time}までです。', array('{return_time}'=>$ninenzakaShop['return_time']))?></dd>
			                    <dd class="ft-shop-tt-option"><?php echo Yii::t('wp_theme', 'お店への行き方'); ?></dd>
			                    <dd class="ft-text-goway"><?php echo Yii::t('wp_theme', '市バス「清水道」停留所で下車、そばのファミリーマート向かいの坂を上り、4つ目の角を右折、二年坂右手にございます。');?></dd>
			                </dl>
			            </a>
			        </dd>
			    </dl>
			</div><!-- end div.item_footer-->
			<?php } // ?>
			<div class="clearAlltn"></div>
		</div><!-- end cont-right -->
	</div><!-- end wrap-cont -->
</div><!-- end contact-info -->
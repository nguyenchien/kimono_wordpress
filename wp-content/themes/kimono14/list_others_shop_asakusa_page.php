<?php
/**
 * Created by PhpStorm.
 * User: TuDh
 * Date: 12/08/15
 * Time: 2:44 PM
 */
// clear cache
//	delete_transient('footer-getshopList');
$shopList = getShopInformationFromSlug();
?>
<div class="footer-region area area-osaka">
    <?php
    //check shop_id is empty or region <> 2 (osaka)
    if (isset($shopList) && !empty($shopList[MasterValues::SHOP_SHINSAIBASHI_ID])) {
        $shinsaibashi = $shopList[MasterValues::SHOP_SHINSAIBASHI_ID];

	    if($shinsaibashi){
		    if (isset($shinsaibashi['region']) && $shinsaibashi['region'] != MasterValues::MV_NATIONLITY_FOREIGNER) {
			    return '';
		    }
	    }
        ?>
        <div class="footer-google region-item">
            <div class="wrap-cont map-google clearfix">
                <div class="region-footer-new osaka-f">
                    <h3 class="region-item-title"><span class="region-title"><?php echo Yii::t('footer', '大阪エリア');?></span></h3>
                    <div class="col-r-footer">
                        <a href="<?php echo esc_url( home_url( '/' ).'osaka/osaka-access/osaka-shinsaibashi' );?>">
                            <img class="icon-shop-7" src="<?php echo WP_HOME . '/images/icons/icon-shop7.png' ?>" alt="<?php echo Yii::t('wp_theme','大阪心斎橋店_ALT')?>"/>
                        </a>
                        <div class="col-r-footer col-r-footer-sp">
                            <div class="wrap-pink">
                                <span class="pink-title"><?php echo DBUtils::getReceptionTime(MasterValues::REGION_OSAKA_SHOP, Yii::t('footer', '営業時間 {open_time}-{close_time}'));?></span>
                            </div>
                            <div class="number">
                                <span class="tel">☎<?php echo Yii::t('wp_theme', 'osaka_tel');?></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="cont-left column one-third alpha">
                    <p class="map" id="map-google-osaka"></p>
                </div><!-- end cont-left -->
            </div>
        </div><!-- end div.item_footer google-->
        <div class="region-item margin-item" ><!-- Osaka region -->
            <div class="osaka wrap-cont list-shops clearfix">
                <div class="cont-shops cont-right-region column one-third omega">
                    <?php
                    $addnewtitleenvi = '';
                    if(Yii::app()->language === 'vi' || Yii::app()->language === 'en')
                        $addnewtitleenvi = 'add-new-title-envi';
                    ?>
                    <div class="item_footer row-first">
                        <dl class="osaka-shop-1">
                            <dt class="add-new-title <?php echo $addnewtitleenvi; ?>">
                                <a href="<?php echo esc_url( home_url( '/' ).'osaka/osaka-access/osaka-shinsaibashi' );?>"><?php echo Yii::t('wp_theme','大阪心斎橋店')?>
                                    <span class="text-new-shop-1"><?php echo Yii::t('wp_theme','12月26日<br/>OPEN!')?></span>
                                </a>
                            </dt>
                            <dd>
                                <a href="<?php echo esc_url( home_url( '/' ).'osaka/osaka-access/osaka-shinsaibashi' );?>">
                                    <dl class="shop-1-info">
                                        <dd class="add-new-title-shop"><?php echo Yii::t('wp_theme','心斎橋駅直結・大丸心斎橋店南館2F')?></dd>
                                        <dd class="address-map" name-shop="大阪心斎橋店"><?php echo Yii::t('wp_theme','大阪府大阪市中央区心斎橋筋1−7−1大丸心斎橋南館2階')?></dd>
                                        <dd class="bold-new-style"><?php echo $shinsaibashi['open_time']; ?>-<?php echo $shinsaibashi['close_time']; ?><br><?php echo Yii::t('wp_theme','※返却時間は{return_time}までです。', array('{return_time}'=>$shinsaibashi['return_time']))?></dd>
                                        <dd class="ft-shop-tt-option"><?php echo Yii::t('wp_theme', 'お店への行き方'); ?></dd>
                                        <dd class="ft-text-goway"><?php echo Yii::t('wp_theme', '地下鉄心斎橋駅から心斎橋大丸へ地下道で直結。御堂筋からお越しの場合は御堂筋大丸前交差点を目印にお越しください。');?></dd>
                                    </dl>
                                </a>
                            </dd>
                        </dl>
                    </div><!-- end div.item_footer-->
                    <div class="clearAlltn"></div>
                </div><!-- end cont-right -->
            </div><!-- end wrap-cont -->
        </div>
    <?php } // End Osaka region ?>
</div>







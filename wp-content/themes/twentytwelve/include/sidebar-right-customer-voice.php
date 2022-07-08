<?php
/**
 * Created by Minh Tran.
 * User: User
 * Date: 8/14/2018
 * Time: 4:17 PM
 */

$listShopID = array(
    'kyoto' => 5,
    'gion' => 6,
    'arashiyama' => 11,
    'arashiyama-togetsukyo' => 18,
    'petit-kyoto' => 15,
    'petit-gion' => 14,
    'shinkyogoku' => 1,
    'kyomizuzaka' => 2,
    'kinkakuji' => 4,
    'osaka' => 7,
    'formal-kyoto' => 16,
    'dazaifu' => 20,
    'asakusa' => 8,
    'kamakura' => 9,
    'skytree' => 17,
    'kanazawa' => 10,
    'shinjuku' => 25,
    'ginza' => 22,
    'kurashiki' => 24,
);
$arrResult = array();
foreach ($listShopID as $shopName => $shopID){
    $post_type = post_type_exists('yesterday-cust-voice') ? 'yesterday-cust-voice' : 'yesterday_cust_voice';
    $args_my_query = array(
        'post_type' => $post_type,
        'meta_key' => 'shop_id',
        'meta_value' => $shopID,
        'posts_per_page' => 10
    );
    $query = new WP_Query($args_my_query);
    $arrResult[$shopName] = $query->found_posts;
}
?>

<div class="review-sidebar-overlay">
    <div class="right-ctm-review-sidebar" id="right-ctm-review-sidebar">
        <div class="box-wg-cate">
            <div class="info-shop-ctm-review">
                <?php
                if(get_field('shop_info_review')){
                    the_field('shop_info_review');
                }
                ?>
            </div><!--end info-shop-ctm-review-->
        </div><!--end box-wg-cate-->
        <div class="box-wg-cate">
            <h2 class="title-right-sidebar flexbox align-items-center">
                <span class="icon-prize"><img src="<?= home_url(); ?>/images/formal-rental/icon-prize.svg"></span><?php echo Yii::t('review-by-shop', '他店舗の口コミ'); ?>
            </h2>
            <div class="container-rsb-cate">
                <ul class="list-rsb-cate">
                    <li class="item-rsb-cate dropdown">
                        <a class="title-dropdown" href="#"><?php echo Yii::t('review-by-shop', '関西地区'); ?></a>
                        <ul class="sub-list-rsb">
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/kyoto-area/station-area/kyotostation/review"><?php echo Yii::t('review-by-shop', '京都駅前京都タワー店') .' ('.$arrResult['kyoto'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/kyoto-area/gion-area/gion-shijo/review"><?php echo Yii::t('review-by-shop', '祇園四条店') .' ('.$arrResult['gion'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/kyoto-area/arashiyama-area/arashiyama/review"><?php echo Yii::t('review-by-shop', '嵐山駅前店') .' ('.$arrResult['arashiyama'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo/review"><?php echo Yii::t('review-by-shop', '嵐山渡月橋店') .' ('.$arrResult['arashiyama-togetsukyo'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/kyoto-area/station-area/petitkyotostation/review"><?php echo Yii::t('review-by-shop', 'プチ京都駅前店') .' ('.$arrResult['petit-kyoto'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/kyoto-area/gion-area/petitgionshijo/review"><?php echo Yii::t('review-by-shop', 'プチ祇園四条店') .' ('.$arrResult['petit-gion'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka/review"><?php echo Yii::t('review-by-shop', '清水坂店') .' ('. $arrResult['kyomizuzaka'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/osaka-area/osaka-shinsaibashi/review"><?php echo Yii::t('review-by-shop', '大阪大丸心斎橋店') .' ('.$arrResult['osaka'].')'; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="item-rsb-cate dropdown">
                        <a class="title-dropdown" href="#"><?php echo Yii::t('review-by-shop', '関東地区'); ?>                                    </a>
                        <ul class="sub-list-rsb">
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/asakusa-area/asakusa/review"><?php echo Yii::t('review-by-shop', '東京浅草店') .' ('. $arrResult['asakusa'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/kamakura-area/kamakura/review"><?php echo Yii::t('review-by-shop', '鎌倉小町店') .' ('.$arrResult['kamakura'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/asakusa-area/tokyoskytree/review"><?php echo Yii::t('review-by-shop', '東京スカイツリータウンソラマチ店') .' ('. $arrResult['skytree'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate ">
                                <a class="cate-name-rsb" href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station/review"><?php echo Yii::t('review-by-shop', '新宿駅前店') .' ('.$arrResult['shinjuku'].')'; ?></a>
                            </li>
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/tokyo-area/ginza-honten/review"><?php echo Yii::t('review-by-shop', '銀座中央通り店') .' ('.$arrResult['ginza'].')'; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="item-rsb-cate dropdown">
                        <a class="title-dropdown" href="#"><?php echo Yii::t('review-by-shop', '北陸地区'); ?></a>
                        <ul class="sub-list-rsb">
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url(); ?>/access/kanazawa-area/kanazawa/review"><?php echo Yii::t('review-by-shop', '金沢香林坊店') .' ('.$arrResult['kanazawa'].')'; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="item-rsb-cate dropdown">
                        <a class="title-dropdown" href="#"><?php echo Yii::t('review-by-shop', '福岡エリア'); ?></a>
                        <ul class="sub-list-rsb">
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/fukuoka-area/dazaifu/review"><?php echo Yii::t('review-by-shop', '太宰府天満宮前店') .' ('.$arrResult['dazaifu'].')'; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="item-rsb-cate dropdown">
                        <a class="title-dropdown" href="#"><?php echo Yii::t('review-by-shop', '岡山'); ?></a>
                        <ul class="sub-list-rsb">
                            <li class="sub-item-rsb-cate">
                                <a class="cate-name-rsb" href="<?= home_url();?>/access/okayama-area/kurashiki/review"><?php echo Yii::t('review-by-shop', '倉敷美観地区店') .' ('.$arrResult['kurashiki'].')'; ?></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!--end box-wg-cate-->
    </div><!--end right-ctm-review-sidebar-->
</div><!--end review-sidebar-overlay-->



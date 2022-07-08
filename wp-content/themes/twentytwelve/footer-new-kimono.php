<?php
/**
 * Footer Formal
 * Author: Dai Huynh
 * Date: 1/19/2018
 * Time: 1:26 PM
 */
?>
<?php
global $isSmartPhone, $isTablet, $language, $post;
wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js');
$class = $isSmartPhone ? 'sp' : 'pc';
?>
<link rel="preload" href="<?=get_template_directory_uri() . '/css/footer-new-kimono-'.$class.'.css'?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?=get_template_directory_uri() . '/css/footer-new-kimono-'.$class.'.css'?>"></noscript>
<?php
    if ($language != "ja") {
        include('footer-new-kimono-'.$language.'.php');
        return;
    }
?>
<div class="footer-formal wrap-kimono-footer">
    <div class="container-box">
        <div class="row">
            <div class="footer-container">
                <div class="top-footer-menu">
                    <ul class="top-footer-menu-list">
                        <li class="top-footer-menu-item storelist">
                            <div class="top-footer-menu-name"><?php echo Yii::t('new_kimono_footer', '店舗一覧')?></div>
                            <ul class="top-footer-sub-menu">
                                <li class="area-list-col">
                                    <ul class="wrap-area-list">
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/kyoto-area">
                                                <?php echo Yii::t('new_kimono_footer', '京都')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kyoto-area/station-area/kyotostation">
                                                        <?php echo Yii::t('new_kimono_footer', '京都駅前京都タワー店')?>
                                                    </a>
                                                </li>
<!--                                                <li class="top-footer-sub-item">-->
<!--                                                    <a href="--><?php //echo home_url()?><!--/access/kyoto-area/station-area/petitkyotostation">-->
<!--                                                        --><?php //echo Yii::t('new_kimono_footer', 'プチ京都駅前店')?>
<!--                                                    </a>-->
<!--                                                </li>-->
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kyoto-area/station-area/formal-kyototower">
                                                        <?php echo Yii::t('new_kimono_footer', 'フォーマル京都タワー店<br>（冠婚葬祭専門）')?>
                                                    </a>
                                                </li>
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kyoto-area/gion-area/gion-shijo">
                                                        <?php echo Yii::t('new_kimono_footer', '祇園四条店')?>
                                                    </a>
                                                </li>
<!--                                                <li class="top-footer-sub-item">-->
<!--                                                    <a href="--><?php //echo home_url()?><!--/access/kyoto-area/gion-area/petitgionshijo">-->
<!--                                                        --><?php //echo Yii::t('new_kimono_footer', 'プチ祇園四条店')?>
<!--                                                    </a>-->
<!--                                                </li>-->
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">
                                                        <?php echo Yii::t('new_kimono_footer', '清水坂店')?>
                                                    </a>
                                                </li>
<!--                                                <li class="top-footer-sub-item">-->
<!--                                                    <a href="--><?php //echo home_url()?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">-->
<!--                                                        --><?php //echo Yii::t('new_kimono_footer', '清水茶わん坂店')?>
<!--                                                    </a>-->
<!--                                                </li>-->
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kyoto-area/arashiyama-area/arashiyama">
                                                        <?php echo Yii::t('new_kimono_footer', '嵐山駅前店')?>
                                                    </a>
                                                </li>

                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">
                                                        <?php echo Yii::t('new_kimono_footer', '嵐山渡月橋店')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/osaka-area">
                                                <?php echo Yii::t('new_kimono_footer', '大阪')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/osaka-area/osaka-shinsaibashi-opa">
                                                        <?php echo Yii::t('new_kimono_footer', '心斎橋OPA')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="area-list-col">
                                    <ul class="wrap-area-list">
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/formal/access/tokyo-area">
                                                <?php echo Yii::t('new_kimono_footer', '東京')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/formal/access/tokyo-area/ginza-honten">
                                                        <?php echo Yii::t('new_kimono_footer', '銀座本店')?>
                                                    </a>
                                                </li>
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                        <?php echo Yii::t('new_kimono_footer', '新宿駅前店')?>
                                                    </a>
                                                </li>
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/asakusa-area/asakusa">
                                                        <?php echo Yii::t('new_kimono_footer', '東京浅草店')?>
                                                    </a>
                                                </li>
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/asakusa-area/tokyoskytree">
                                                        <?php echo Yii::t('new_kimono_footer', '東京スカイツリータウン<br/>ソラマチ店')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/kamakura-area">
                                                <?php echo Yii::t('new_kimono_footer', '神奈川')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kamakura-area/kamakura">
                                                        <?php echo Yii::t('new_kimono_footer', '鎌倉小町店')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/okinawa-area">
                                                <?php echo Yii::t('new_kimono_footer', '沖縄エリア')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/okinawa-area/okinawa-naha">
                                                        <?php echo Yii::t('new_kimono_footer', '沖縄那覇店')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="area-list-col">
                                    <ul class="wrap-area-list">
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/formal/access/sapporo-area">
                                                <?php echo Yii::t('new_kimono_footer', '札幌')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                        <?php echo Yii::t('new_kimono_footer', '札幌すすきの駅前店<br>（冠婚葬祭専門）')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
<!--                                        <li class="area-shop-item">-->
<!--                                            <a href="--><?php //echo home_url()?><!--/formal/access/tohoku-area">-->
<!--                                                --><?php //echo Yii::t('new_kimono_footer', '東北')?>
<!--                                            </a>-->
<!--                                            <ul class="area-shoplist">-->
<!--                                                <li class="top-footer-sub-item">-->
<!--                                                    <a href="--><?php //echo home_url()?><!--/formal/access/tohoku-area/sendai-parco2">-->
<!--                                                        --><?php //echo Yii::t('new_kimono_footer', 'フォーマル仙台駅PARCO2店<br>（冠婚葬祭専門）')?>
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/kanazawa-area">
                                                <?php echo Yii::t('new_kimono_footer', '石川')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kanazawa-area/kanazawa">
                                                        <?php echo Yii::t('new_kimono_footer', '金沢香林坊店')?>
                                                    </a>
                                                </li>
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kanazawa-area/kanazawa-kenrokuen">
                                                        <?php echo Yii::t('new_kimono_footer', '金沢兼六園店')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/okayama-area">
                                                <?php echo Yii::t('new_kimono_footer', '岡山')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/okayama-area/kurashiki">
                                                        <?php echo Yii::t('new_kimono_footer', '倉敷美観地区店')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/fukuoka-area">
                                                <?php echo Yii::t('new_kimono_footer', '福岡')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/fukuoka-area/dazaifu">
                                                        <?php echo Yii::t('new_kimono_footer', '太宰府天満宮前店')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="top-footer-menu-item reservation">
                            <div class="top-footer-menu-name"><?php echo Yii::t('new_kimono_footer', 'ご予約')?></div>
                            <div class="top-footer-sub-menu">
                                <ul class="sub-left-col">
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>"><?php echo Yii::t('new_kimono_footer', '観光着物レンタル')?></a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>/yukata"><?php echo Yii::t('new_kimono_footer', '観光浴衣レンタル')?></a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url() ?>/formal/furisode"><?php echo Yii::t('new_kimono_footer', '振袖')?></a>
                                    </li>
                                    <li class="top-footer-sub-item more-link">
                                        <a href="<?php echo home_url() ?>/formal/irotomesode"><?php echo Yii::t('new_kimono_footer', '留袖')?></a>
                                        <a href="<?php echo home_url() ?>/formal/irotomesode/iro_tomesode"><?php echo Yii::t('new_kimono_footer', '(色留袖・')?></a>
                                        <a href="<?php echo home_url() ?>/formal/kurotomesode"><?php echo Yii::t('new_kimono_footer', '黒留袖)')?></a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url() ?>/formal/homongi"><?php echo Yii::t('new_kimono_footer', '訪問着')?></a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url() ?>/formal/hakama"><?php echo Yii::t('new_kimono_footer', '卒業式袴')?></a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url() ?>/formal/shichigosan"><?php echo Yii::t('new_kimono_footer', '七五三')?></a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url() ?>/formal/ubugi"><?php echo Yii::t('new_kimono_footer', 'お宮参り/産着')?></a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url() ?>/formal/mofuku"><?php echo Yii::t('new_kimono_footer', '喪服')?></a>
                                    </li>
                                   <br class="pc" />
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url() ?>/takuhai"><?php echo Yii::t('new_kimono_footer', '宅配着物レンタル')?></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="top-footer-menu-item service">
                            <div class="top-footer-menu-name"><?php echo Yii::t('new_kimono_footer', 'サービス一覧')?></div>
                            <ul class="top-footer-sub-menu">
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/kimono/hairset"><?php echo Yii::t('new_kimono_footer', 'ヘアセット')?></a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/option"><?php echo Yii::t('new_kimono_footer', '小物レンタル')?></a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/photo-session"><?php echo Yii::t('new_kimono_footer', 'カメラマン同行オプション')?></a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/kimono/photo-studio"><?php echo Yii::t('new_kimono_footer', '写真スタジオ')?></a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/kimono/tenimotsu"><?php echo Yii::t('new_kimono_footer', '荷物預かり')?></a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/group"><?php echo Yii::t('new_kimono_footer', '団体着物レンタル')?></a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/bring"><?php echo Yii::t('new_kimono_footer', '持ち込みプラン')?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="top-footer-menu-item">
                            <ul>
                                <li class="top-footer-menu-item help">
                                    <div class="top-footer-menu-name"><?php echo Yii::t('new_kimono_footer', 'ヘルプ')?></div>
                                    <ul class="top-footer-sub-menu">
                                        <li class="top-footer-sub-item">
                                            <a href="<?php echo home_url()?>/faq"><?php echo Yii::t('new_kimono_footer', 'よくあるご質問')?></a>
                                        </li>
                                        <li class="top-footer-sub-item">
                                            <a href="<?php echo home_url()?>/faq/contactwp"><?php echo Yii::t('new_kimono_footer', 'お問い合わせ')?></a>
                                        </li>
                                        <li class="top-footer-sub-item">
                                            <a href="<?php echo home_url()?>/howto"><?php echo Yii::t('new_kimono_footer', '着物レンタルの流れ')?></a>
                                        </li>
                                    </ul>
                                </li>
                                <br class="pc" />
                                <li class="top-footer-menu-item sns">
                                    <div class="top-footer-menu-name"><?php echo Yii::t('new_kimono_footer', '公式SNS')?></div>
                                    <ul class="top-footer-sub-menu">
                                        <li class="top-footer-sub-item">
                                            <a href="https://twitter.com/kyotokimonorent"><?php echo Yii::t('new_kimono_footer', 'Twitter')?></a>
                                        </li>
                                        <li class="top-footer-sub-item">
                                            <a href="https://www.instagram.com/kyotokimonorental.wargo"><?php echo Yii::t('new_kimono_footer', 'Instagram')?></a>
                                        </li>
                                        <li class="top-footer-sub-item">
                                            <a href="https://www.facebook.com/kyotokimonorental"><?php echo Yii::t('new_kimono_footer', 'Facebook')?></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-formal-bg wrap-kimono-footer">
    <div class="container-box">
        <div class="row">
            <div class="footer-container">
                <div class="mid-footer-menu">
                    <ul class="mid-footer-menu-list">
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/blog"><?php echo Yii::t('new_kimono_footer', '着物レンタルスタッフブログ')?></a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/policy"><?php echo Yii::t('new_kimono_footer', 'プライバシーポリシー')?></a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/company"><?php echo Yii::t('new_kimono_footer', '運営会社')?></a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/notation"><?php echo Yii::t('new_kimono_footer', '特定商取引法に基づく表記')?></a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/notation_kobutsu"><?php echo Yii::t('new_kimono_footer', '古物営業法に基づく表記')?></a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/kimono/mamechiyo"><?php echo Yii::t('new_kimono_footer', '豆千代モダン')?></a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/recruitment"><?php echo Yii::t('new_kimono_footer', 'きものレンタルwargo求人情報')?></a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a target="_blank" href="https://araiba.net/"><?php echo Yii::t('new_kimono_footer', '着物クリーニング・保管サービス「アライバ」')?></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-copyright">
                    <p class="copyright-text"><?php echo Yii::t('new_kimono_footer', 'Copyright © 2019 きものレンタル<br/>wargo.All Rights Reserved.') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<?php
$url = Yii::app()->request->url;
if (strpos($url, 'thankyou') == false) :
?>
<script type="text/javascript">
(function(callback){
var script = document.createElement("script");
script.type= "text/javascript";
script.src= "https://www.rentracks.jp/js/itp/rt.track.js?t=" + (new Date()).getTime();
if ( script.readyState) {
script.onreadystatechange= function() {
if ( script.readyState=== "loaded" || script.readyState=== "complete" ) {
script.onreadystatechange= null;
callback();
}
};
} else {
script.onload= function() {
callback();
};
}
document.getElementsByTagName("head")[0].appendChild(script);
}(function(){}));
<?php if ('osaka-shinsaibashi-opa' != $post->post_name) : ?>
<?php endif; ?>
</script>
<?php endif; ?>
<script type='text/javascript' src='https://api.kaiu-marketing.com/visitor/script.js?site_code=468c9e4b5ef24cfdb773df93d3bb5bd6&key=1df0ed7037c246f2a33bfab5748a226d&secret=77fa2e714c9341aea3ee2ea4370c7c93&svd=2aecc64a32f9465cadab524dcd477b19'></script>
</body>
</html>



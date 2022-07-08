<?php
/**
 * Footer Formal
 * Author: Dai Huynh
 * Date: 1/19/2018
 * Time: 1:26 PM
 */
?>
<?php
global $isSmartPhone, $isTablet, $language;
?>

<div class="footer-formal new_kimono_footer">
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
                                            <a href="<?php echo home_url()?>/access/kyoto-area/">
                                                <?php echo Yii::t('new_kimono_footer', '京都')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kyoto-area/station-area/kyotostation">
                                                        <?php echo Yii::t('new_kimono_footer', '京都駅前京都タワー店')?>
                                                    </a>
                                                </li>
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
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">
                                                        <?php echo Yii::t('new_kimono_footer', '清水坂店')?>
                                                    </a>
                                                </li>
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kyoto-area/kiyomizu-area/chawanzaka">
                                                        <?php echo Yii::t('new_kimono_footer', '清水茶わん坂店')?>
                                                    </a>
                                                </li>
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
                                            <a href="<?php echo home_url()?>/access/tokyo-area/">
                                                <?php echo Yii::t('new_kimono_footer', '東京')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/tokyo-area/ginza-honten">
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
                                            <a href="<?php echo home_url()?>/access/kamakura-area/">
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
                                    </ul>
                                </li>
                                <li class="area-list-col">
                                    <ul class="wrap-area-list">
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/sapporo-area">
                                                <?php echo Yii::t('new_kimono_footer', '札幌')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/sapporo-area/sapporo-susukinostation">
                                                        <?php echo Yii::t('new_kimono_footer', '札幌すすきの駅前店<br>（冠婚葬祭専門）')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/tohoku-area">
                                                <?php echo Yii::t('new_kimono_footer', '東北')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/tohoku-area/sendai-parco2">
                                                        <?php echo Yii::t('new_kimono_footer', 'フォーマル仙台駅PARCO2店<br>（冠婚葬祭専門）')?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="area-shop-item">
                                            <a href="<?php echo home_url()?>/access/kanazawa-area/">
                                                <?php echo Yii::t('new_kimono_footer', '石川')?>
                                            </a>
                                            <ul class="area-shoplist">
                                                <li class="top-footer-sub-item">
                                                    <a href="<?php echo home_url()?>/access/kanazawa-area/kanazawa">
                                                        <?php echo Yii::t('new_kimono_footer', '金沢香林坊店')?>
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
                                            <a href="<?php echo home_url()?>/access/fukuoka-area/">
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
                            <h3 class="top-footer-menu-name"><?php echo Yii::t('new_kimono_footer', 'ご予約')?></h3>
                            <div class="top-footer-sub-menu">
                                <ul class="sub-left-col">
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>"><?php echo Yii::t('new_kimono_footer', '観光着物レンタル')?></a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>/yukata"><?php echo Yii::t('new_kimono_footer', '観光浴衣レンタル')?></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="top-footer-menu-item service">
                            <h3 class="top-footer-menu-name"><?php echo Yii::t('new_kimono_footer', 'サービス一覧')?></h3>
                            <ul class="top-footer-sub-menu">
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/hairset"><?php echo Yii::t('new_kimono_footer', 'ヘアセット')?></a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/kimono/option"><?php echo Yii::t('new_kimono_footer', 'オプション小物')?></a>
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
                                    <a href="<?php echo home_url()?>/group"><?php echo Yii::t('new_kimono_footer', '団体着物')?></a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/bring"><?php echo Yii::t('new_kimono_footer', '持ち込みプラン')?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="top-footer-menu-item">
                            <ul>
                                <li class="top-footer-menu-item help">
                                    <h3 class="top-footer-menu-name"><?php echo Yii::t('new_kimono_footer', 'ヘルプ')?></h3>
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
                                <li class="top-footer-menu-item sns">
                                    <h3 class="top-footer-menu-name"><?php echo Yii::t('new_kimono_footer', '公式 SNS')?></h3>
                                    <ul class="top-footer-sub-menu">
                                        <li class="top-footer-sub-item">
                                            <a href="https://twitter.com/kimono_wargo"><?php echo Yii::t('new_kimono_footer', 'Twitter')?></a>
                                        </li>
                                        <li class="top-footer-sub-item">
                                            <a href="https://www.instagram.com/kyotokimonorental.wargo"><?php echo Yii::t('new_kimono_footer', 'Instagram')?></a>
                                        </li>
                                        <li class="top-footer-sub-item">
                                            <a href="https://www.facebook.com/KyotoKimonoRentalWargo"><?php echo Yii::t('new_kimono_footer', 'Facebook')?></a>
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
<div class="footer-formal-bg new_kimono_footer">
    <div class="container-box">
        <div class="row">
            <div class="footer-container">
                <div class="mid-footer-menu">
                    <ul class="mid-footer-menu-list">
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/simplified-chinese-blog"><?php echo Yii::t('new_kimono_footer', '着物レンタルスタッフブログ')?></a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/policy"><?php echo Yii::t('new_kimono_footer', 'プライバシーポリシー')?></a>
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
</body>
</html>



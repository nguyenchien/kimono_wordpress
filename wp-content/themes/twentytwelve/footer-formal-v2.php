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
<link rel="preload" href="<?=get_template_directory_uri()?>/css/footer-formal-v2-<?=$isSmartPhone?'sp':'pc'?>.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/footer-formal-v2-<?=$isSmartPhone?'sp':'pc'?>.css"></noscript>
<script defer="defer" type="text/javascript">$('body').addClass('<?php echo $postName;?>')</script>
<link rel="preload" href="/css/lazyload.utils.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/lazyload.utils.css"></noscript>

<?php if($isSmartPhone) :?>
    <div class="bottom-breadcrumb">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
        }
        ?>
        <?php
        $arrHeader = array (
            'homongi' => '訪問着レンタル | 結婚式・入学式・卒業式・お宮参り・七五三・お茶会・パーティーに安心のフルセット!',
            'ubugi' => '京都で着物レンタルなら「京都きものレンタルwargo」人気観光地や駅近くに安心の全国20店舗！',
            'brand' => 'お宮参りに高級感のあるブランド産着（祝着・祝い着）レンタル｜きものレンタルwargo',
        );
        $postName = $post->post_name;
        ?>
        <?php if(array_key_exists($post->post_name, $arrHeader)) :?>
            <?php if($postName != 'ubugi' && !is_page('brand') && $postName != 'homongi'):?>
                <h1 class="page-title">
                    <?php
                    echo $arrHeader[$post->post_name];
                    ?>
                </h1>
            <?php else: ?>
                <p class="page-title">
                    <?php
                    echo $arrHeader[$post->post_name];
                    ?>
                </p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="footer-formal">
        <div class="footer-fm-top">
            <div class="container-box">
                <div class="row">
                    <ul class="list-footer-fm flexbox">
                        <li class="item-footer-fm first">
                            <div class="title-footer-fm">店舗一覧</div>
                            <ul class="sub-list-footer-fm">
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/kyoto-area" class="link-to">京都</a>
                                    <ul class="list-area-fm flexbox">
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/station-area/kyotostation">京都駅前京都タワー店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/station-area/formal-kyototower">フォーマル京都タワー店 ( 冠婚葬祭専門 )</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/gion-area/gion-shijo">祇園四条店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">清水坂店</a></li>
<!--                                        <li class="item-area-fm first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">清水茶わん坂店</a></li>-->
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/arashiyama-area/arashiyama">嵐山駅前店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">嵐山渡月橋店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/osaka-area" class="link-to">大阪</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/osaka-area/osaka-shinsaibashi-opa">大阪心斎橋店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area" class="link-to">東京</a>
                                    <ul class="list-area-fm flexbox">
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area/ginza-honten">銀座本店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/tokyo-area/shinjuku-area/shinjuku-station">新宿駅前店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/asakusa-area/asakusa">東京浅草店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/asakusa-area/tokyoskytree">東京スカイツリータウン ソラマチ店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/kamakura-area" class="link-to">神奈川</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/kamakura-area/kamakura">鎌倉小町店</a></li>
                                    </ul>
                                </li>
<!--                                <li class="sub-item-footer-fm">-->
<!--                                    <a href="--><?php //echo WP_HOME ;?><!--/access/okinawa-area" class="link-to">沖縄エリア</a>-->
<!--                                    <ul class="list-area-fm">-->
<!--                                        <li class="item-area-fm"><a href="--><?php //echo WP_HOME ;?><!--/access/okinawa-area/okinawa-naha">沖縄那覇店</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/access/sapporo-area" class="link-to">札幌</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/formal/access/sapporo-area/sapporo-susukinostation">札幌すすきの駅前店 ( 冠婚葬祭専門 )</a></li>
                                    </ul>
                                </li>
                                <!--
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/access/tohoku-area" class="link-to">宮城</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/formal/access/tohoku-area/sendai-parco2">仙台駅前店 ( 冠婚葬祭専門 )</a></li>
                                    </ul>
                                </li>-->
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/kanazawa-area" class="link-to">石川</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/kanazawa-area/kanazawa">金沢香林坊店</a></li>
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/kanazawa-area/kanazawa-kenrokuen">金沢兼六園店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/okayama-area" class="link-to">岡山</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/okayama-area/kurashiki">倉敷美観地区店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/fukuoka-area" class="link-to">福岡</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/fukuoka-area/dazaifu">太宰府天満宮前店</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-fm">
                            <div class="title-footer-fm">ご予約</div>
                            <ul class="sub-list-footer-fm">
                                <li class="sub-item-footer-fm">
                                    <a href="https://kyotokimono-rental.com" class="link-to">観光着物レンタル</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/yukata" class="link-to">観光浴衣レンタル</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/furisode" class="link-to">振袖</a>
                                </li>
                                <li class="sub-item-footer-fm flexbox">
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/irotomesode">留袖</a>
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/irotomesode/iro_tomesode">(色留袖・</a>
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/kurotomesode">黒留袖)</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/homongi" class="link-to">訪問着</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/hakama" class="link-to">卒業式袴</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/shichigosan" class="link-to">七五三</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/ubugi" class="link-to">お宮参り / 産着</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/mofuku" class="link-to">喪服</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/takuhai" class="link-to">宅配レンタル</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-fm">
                            <div class="title-footer-fm">サービス一覧</div>
                            <ul class="sub-list-footer-fm">
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/kimono/hairset" class="link-to">ヘアセット</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/option" class="link-to">小物レンタル</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/photo-session" class="link-to">カメラマン同行オプション</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/kimono/photo-studio" class="link-to">写真スタジオ</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/kimono/tenimotsu" class="link-to">荷物預かり</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/group" class="link-to">団体着物レンタル</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/bring" class="link-to">持ち込みプラン</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-fm">
                            <div class="title-footer-fm">ヘルプ</div>
                            <ul class="sub-list-footer-fm">
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formalfaq" class="link-to">よくあるご質問</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/faq/contactwp" class="link-to">お問い合わせ</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/howto" class="link-to">着物レンタルの流れ</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-fm">
                            <div class="title-footer-fm">会社概要</div>
                            <ul class="sub-list-footer-fm flexbox">
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/blog" class="link-to">
                                        着物レンタルスタッフブログ
                                    </a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/policy" class="link-to">
                                        プライバシーポリシー
                                    </a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/company" class="link-to">
                                        運営会社
                                    </a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/notation" class="link-to">
                                        特定商取引法に基づく表記
                                    </a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/notation_kobutsu" class="link-to">
                                        古物営業法に基づく表記
                                    </a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/kimono/mamechiyo" class="link-to">
                                        豆千代モダン
                                    </a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/recruitment" class="link-to">
                                        求人情報
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="item-footer-fm">
                            <div class="title-footer-fm single">
                                <a target="_blank" href="https://araiba.net/" class="link-to">着物クリーニング・保管サービス「アライバ」</a>
                            </div>
                        </li>
                    </ul>
                    <div class="wrap-social">
                        <div class="wrap-section-list-fm">
                            <div class="title-footer-fm"><span class="sm">wargo </span>公式SNS</div>
                            <div class="wrap-lang-social flexbox">
                                <div class="wrap-social flexbox">
                                    <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img class="img-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-instagram.svg" alt="" /></a></span>
                                    <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img class="img-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-twitter.svg" alt="" /></a></span>
                                    <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img class="img-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-facebook.svg" alt="" /></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-fm-bottom">
            <div class="container-box">
                <div class="row">
                    <div class="wrap-logo-text-ft">
                        <div class="logo-formal">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-ft-fm.svg" alt="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                            </a>
                        </div>
                        <div class="footer-copyright">
                            <p class="copyright-text">Copyright © 2019 きものレンタル wargo.All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="footer-formal">
        <div class="footer-fm-top">
            <div class="container-box">
                <div class="row">
                    <ul class="list-footer-fm flexbox">
                        <li class="item-footer-fm first">
                            <div class="title-footer-fm">店舗一覧</div>
                            <ul class="sub-list-footer-fm">
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/kyoto-area" class="link-to">京都</a>
                                    <ul class="list-area-fm flexbox">
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/station-area/kyotostation">京都駅前京都タワー店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/station-area/formal-kyototower">フォーマル京都タワー店 ( 冠婚葬祭専門 )</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/gion-area/gion-shijo">祇園四条店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">清水坂店</a></li>
<!--                                        <li class="item-area-fm first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">清水茶わん坂店</a></li>-->
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/arashiyama-area/arashiyama">嵐山駅前店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">嵐山渡月橋店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/osaka-area" class="link-to">大阪</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/osaka-area/osaka-shinsaibashi-opa">大阪心斎橋店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area" class="link-to">東京</a>
                                    <ul class="list-area-fm flexbox">
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area/ginza-honten">銀座本店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/tokyo-area/shinjuku-area/shinjuku-station">新宿駅前店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/asakusa-area/asakusa">東京浅草店</a></li>
                                        <li class="item-area-fm first"><a href="<?php echo WP_HOME ;?>/access/asakusa-area/tokyoskytree">東京スカイツリータウン ソラマチ店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/kamakura-area" class="link-to">神奈川</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/kamakura-area/kamakura">鎌倉小町店</a></li>
                                    </ul>
                                </li>
<!--                                <li class="sub-item-footer-fm">-->
<!--                                    <a href="--><?php //echo WP_HOME ;?><!--/access/okinawa-area" class="link-to">沖縄エリア</a>-->
<!--                                    <ul class="list-area-fm">-->
<!--                                        <li class="item-area-fm"><a href="--><?php //echo WP_HOME ;?><!--/access/okinawa-area/okinawa-naha">沖縄那覇店</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/access/sapporo-area" class="link-to">札幌</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/formal/access/sapporo-area/sapporo-susukinostation">札幌すすきの駅前店 ( 冠婚葬祭専門 )</a></li>
                                    </ul>
                                </li>
                                <!--
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/access/tohoku-area" class="link-to">宮城</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/formal/access/tohoku-area/sendai-parco2">仙台駅前店 ( 冠婚葬祭専門 )</a></li>
                                    </ul>
                                </li>-->
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/kanazawa-area" class="link-to">石川</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/kanazawa-area/kanazawa">金沢香林坊店</a></li>
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/kanazawa-area/kanazawa-kenrokuen">金沢兼六園店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/okayama-area" class="link-to">岡山</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/okayama-area/kurashiki">倉敷美観地区店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/access/fukuoka-area" class="link-to">福岡</a>
                                    <ul class="list-area-fm">
                                        <li class="item-area-fm"><a href="<?php echo WP_HOME ;?>/access/fukuoka-area/dazaifu">太宰府天満宮前店</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-fm">
                            <div class="title-footer-fm">ご予約</div>
                            <ul class="sub-list-footer-fm">
                                <li class="sub-item-footer-fm">
                                    <a href="https://kyotokimono-rental.com" class="link-to">観光着物レンタル</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/yukata" class="link-to">観光浴衣レンタル</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/furisode" class="link-to">振袖</a>
                                </li>
                                <li class="sub-item-footer-fm flexbox">
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/irotomesode">留袖</a>
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/irotomesode/iro_tomesode">(色留袖・</a>
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/kurotomesode">黒留袖)</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/homongi" class="link-to">訪問着</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/hakama" class="link-to">卒業式袴</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/shichigosan" class="link-to">七五三</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/ubugi" class="link-to">お宮参り / 産着</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/formal/mofuku" class="link-to">喪服</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/takuhai" class="link-to">宅配レンタル</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-fm">
                            <div class="title-footer-fm">サービス一覧</div>
                            <ul class="sub-list-footer-fm">
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/kimono/hairset" class="link-to">ヘアセット</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/option" class="link-to">小物レンタル</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/photo-session" class="link-to">カメラマン同行オプション</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/kimono/photo-studio" class="link-to">写真スタジオ</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/kimono/tenimotsu" class="link-to">荷物預かり</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/group" class="link-to">団体着物レンタル</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a href="<?php echo WP_HOME ;?>/bring" class="link-to">持ち込みプラン</a>
                                </li>
                                <li class="sub-item-footer-fm">
                                    <a target="_blank" href="https://araiba.net/" class="link-to">着物クリーニング・保管サービス「アライバ」</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-fm">
                            <div class="wrap-section-list-fm">
                                <div class="title-footer-fm">ヘルプ</div>
                                <ul class="sub-list-footer-fm">
                                    <li class="sub-item-footer-fm">
                                        <a href="<?php echo WP_HOME ;?>/formalfaq" class="link-to">よくあるご質問</a>
                                    </li>
                                    <li class="sub-item-footer-fm">
                                        <a href="<?php echo WP_HOME ;?>/faq/contactwp" class="link-to">お問い合わせ</a>
                                    </li>
                                    <li class="sub-item-footer-fm">
                                        <a href="<?php echo WP_HOME ;?>/howto" class="link-to">着物レンタルの流れ</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="wrap-section-list-fm">
                                <div class="title-footer-fm">公式 SNS</div>
                                <div class="wrap-lang-social flexbox pc">
                                    <div class="wrap-social flexbox">
                                        <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img class="img-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-instagram.svg" alt="" /></a></span>
                                        <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img class="img-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-twitter.svg" alt="" /></a></span>
                                        <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img class="img-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-facebook.svg" alt="" /></a></span>
                                    </div><!--end wrap social-->
                                </div><!--end wrap-lang-social-->
                            </div>
                        </li>
                    </ul>
                    <div class="wrap-section-list-fm bottom">
                        <div class="title-footer-fm">会社概要</div>
                        <ul class="sub-list-footer-fm flexbox">
                            <li class="sub-item-footer-fm">
                                <a href="<?php echo WP_HOME ;?>/blog" class="link-to">
                                    着物レンタルスタッフブログ
                                </a>
                            </li>
                            <li class="sub-item-footer-fm">
                                <a href="<?php echo WP_HOME ;?>/policy" class="link-to">
                                    プライバシーポリシー
                                </a>
                            </li>
                            <li class="sub-item-footer-fm">
                                <a href="<?php echo WP_HOME ;?>/company" class="link-to">
                                    運営会社
                                </a>
                            </li>
                            <li class="sub-item-footer-fm">
                                <a href="<?php echo WP_HOME ;?>/notation" class="link-to">
                                    特定商取引法に基づく表記
                                </a>
                            </li>
                            <li class="sub-item-footer-fm">
                                <a href="<?php echo WP_HOME ;?>/notation_kobutsu" class="link-to">
                                    古物営業法に基づく表記
                                </a>
                            </li>
                            <li class="sub-item-footer-fm">
                                <a href="<?php echo WP_HOME ;?>/kimono/mamechiyo" class="link-to">
                                    豆千代モダン
                                </a>
                            </li>
                            <li class="sub-item-footer-fm">
                                <a href="<?php echo WP_HOME ;?>/recruitment" class="link-to">
                                    求人情報
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-fm-bottom">
            <div class="container-box">
                <div class="row">
                    <div class="wrap-logo-text-ft">
                        <div class="logo-formal">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-ft-fm.svg" alt="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                            </a>
                        </div>
                        <div class="footer-copyright">
                            <p class="copyright-text"><?php echo Yii::t('new_kimono_footer', 'Copyright © 2019 きものレンタルwargo.All Rights Reserved.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
// wp_enqueue_script('lazyloadxt-formal', WP_HOME. '/js/jquery.lazyloadxt.js');
?>
<?php wp_footer(); ?>
<script>
	$(document).ready(function(){
        $('[data-collapse-cate]').click(function(){
            var self    = this;
            var target  = $(self).data('collapse-cate');
            var $other  = $('[data-collapse-cate="'+target+'"]');
            if(target){
                $other.each(function(index, el){
                    if(el === self){
                        $(self).siblings(target).slideToggle();
                        $(self).parent().toggleClass('active');
                        $(self).toggleClass('active');
                    }
                });
            }
        });
		$('.title-footer-fm').click(function(){
			var itemLi = $(this).parent();
			itemLi.toggleClass('active');
			$(itemLi).siblings().removeClass('active');
		})
	});
</script>
</body>
</html>



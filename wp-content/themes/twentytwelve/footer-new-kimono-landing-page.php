<?php
/**
 * Footer Kimono Landing Page
 * Author: Dai Huynh
 * Date: 1/19/2018
 * Time: 1:26 PM
 */
?>
<?php
global $isSmartPhone, $isTablet, $language;
$isYukata = is_page('yukata');
if ($language != "ja") {
	include('footer-new-kimono-'.$language.'.php');
	return;
}
/*
?>
<link rel="preload" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,700&display=swap"></noscript>
<?php */ ?>
<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
<?php if(strpos($url, 'newBooking/cart') === false && strpos($url, 'cartConfirm') === false && strpos($url, 'yukata/plan') === false && strpos($url, 'yukata') === false && strpos($url, 'bring') === false):?>
    <?php if($isYukata) : ?>
        <a class="btn-bottom yukata" href="<?= home_url() ?>/yukata/plan">
            <span class="icon"></span>
            <p class="txt">
                <span class="sm-txt">今すぐカンタン！</span>
                <span class="lg-txt">Web予約</span>
            </p>
        </a>
    <?php else: ?>
        <a class="btn-bottom" href="<?= home_url() ?>/kimono">
            <span class="icon"></span>
            <p class="txt">
                <span class="sm-txt">今すぐカンタン！</span>
                <span class="lg-txt">Web予約</span>
            </p>
        </a>
    <?php endif;?>
<?php endif?>
<?php if($isSmartPhone) :?>
    <div class="footer-landing-page">
        <div class="footer-ldp-top">
            <div class="container-box">
                <div class="row">
                    <ul class="list-footer-ldp flexbox">
                        <li class="item-footer-ldp first">
                            <div class="title-footer-ldp">店舗一覧</div>
                            <ul class="sub-list-footer-ldp">
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/access/kyoto-area" class="link-to">京都</a>
                                    <ul class="list-area-ldp flexbox">
                                        <li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/station-area/kyotostation">京都タワーサンド店</a></li>
										<li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/gion-area/gion-nishiki">京都祇園錦店</a></li>
<!--										<li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/kiyomizu-area/ninenzaka">京都二年坂店</a></li>-->
<!--										<li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/kiyomizu-area/kiyomizuzaka">清水坂店<span class="shop-tag">休業中</span></a></li>-->
<!--                                        <li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/station-area/formal-kyototower">フォーマル京都タワー店 ( 冠婚葬祭専門 )</a></li>-->
<!--                                        <li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/gion-area/gion-shijo">祇園四条店</a></li>-->
<!--                                        <li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">清水茶わん坂店</a></li>-->
<!--                                        <li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/arashiyama-area/arashiyama">嵐山駅前店</a></li>-->
<!--                                        <li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">嵐山渡月橋店</a></li>-->
                                    </ul>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/access/osaka-area" class="link-to">大阪</a>
                                    <ul class="list-area-ldp">
                                        <li class="item-area-ldp"><a href="<?php echo WP_HOME ;?>/access/osaka-area/osaka-shinsaibashi-opa">心斎橋OPA店</a></li>
                                    </ul>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area" class="link-to">東京</a>
                                    <ul class="list-area-ldp flexbox">
										<li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/access/asakusa-area/asakusa">東京浅草店</a></li>
                                        <li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area/ginza-honten">銀座本店</a></li>
										<li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area/sendagaya">明治神宮北参道店</a></li>
<!--                                        <li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/tokyo-area/shinjuku-area/shinjuku-station">新宿駅前店</a></li>-->
<!--                                        <li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/asakusa-area/tokyoskytree">東京スカイツリータウン ソラマチ店</a></li>-->
                                    </ul>
                                </li>
<!--								<li class="sub-item-footer-ldp">-->
<!--									<a href="--><?php //echo WP_HOME ;?><!--/access/shizuoka-area" class="link-to">静岡</a>-->
<!--									<ul class="list-area-ldp">-->
<!--										<li class="item-area-ldp"><a href="--><?php //echo WP_HOME ;?><!--/access/shizuoka-area/ito">伊東店</a></li>-->
<!--									</ul>-->
<!--								</li>-->
								<li class="sub-item-footer-ldp">
									<a href="<?php echo WP_HOME ;?>/access/kanazawa-area" class="link-to">石川</a>
									<ul class="list-area-ldp">
<!--										<li class="item-area-ldp"><a href="--><?php //echo WP_HOME ;?><!--/access/kanazawa-area/kanazawa-kenrokuen">金沢兼六園店</a></li>-->
										<li class="item-area-ldp"><a href="<?php echo WP_HOME ;?>/access/kanazawa-area/kanazawa">金沢香林坊店</a></li>
									</ul>
								</li>
								<!--<li class="sub-item-footer-ldp">
									<a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area" class="link-to">福岡</a>
									<ul class="list-area-ldp">
										<li class="item-area-ldp"><a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area/hakata">福岡博多店</a></li>
									</ul>
								</li>-->
<!--                                <li class="sub-item-footer-ldp">-->
<!--                                    <a href="--><?php //echo WP_HOME ;?><!--/access/kamakura-area" class="link-to">神奈川</a>-->
<!--                                    <ul class="list-area-ldp">-->
<!--                                        <li class="item-area-ldp"><a href="--><?php //echo WP_HOME ;?><!--/access/kamakura-area/kamakura">鎌倉小町店</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li class="sub-item-footer-ldp">-->
<!--                                    <a href="--><?php //echo WP_HOME ;?><!--/access/okinawa-area" class="link-to">沖縄エリア</a>-->
<!--                                    <ul class="list-area-ldp">-->
<!--                                        <li class="item-area-ldp"><a href="--><?php //echo WP_HOME ;?><!--/access/okinawa-area/okinawa-naha">沖縄那覇店</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li class="sub-item-footer-ldp">-->
<!--                                    <a href="--><?php //echo WP_HOME ;?><!--/formal/access/sapporo-area" class="link-to">札幌</a>-->
<!--                                    <ul class="list-area-ldp">-->
<!--                                        <li class="item-area-ldp"><a href="--><?php //echo WP_HOME ;?><!--/formal/access/sapporo-area/sapporo-susukinostation">札幌すすきの駅前店 ( 冠婚葬祭専門 )</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
                                <!--
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/access/tohoku-area" class="link-to">宮城</a>
                                    <ul class="list-area-ldp">
                                        <li class="item-area-ldp"><a href="<?php echo WP_HOME ;?>/formal/access/tohoku-area/sendai-parco2">仙台駅前店 ( 冠婚葬祭専門 )</a></li>
                                    </ul>
                                </li>
                                -->
<!--                                <li class="sub-item-footer-ldp">-->
<!--                                    <a href="--><?php //echo WP_HOME ;?><!--/access/okayama-area" class="link-to">岡山</a>-->
<!--                                    <ul class="list-area-ldp">-->
<!--                                        <li class="item-area-ldp"><a href="--><?php //echo WP_HOME ;?><!--/access/okayama-area/kurashiki">倉敷美観地区店</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li class="sub-item-footer-ldp">-->
<!--                                    <a href="--><?php //echo WP_HOME ;?><!--/access/fukuoka-area" class="link-to">福岡</a>-->
<!--                                    <ul class="list-area-ldp flexbox">-->
<!--                                        <li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/fukuoka-area/dazaifu">太宰府天満宮前店</a></li>-->
<!--                                        <li class="item-area-ldp"><a href="--><?php //echo WP_HOME ;?><!--/formal/access/tokyo-area/hakata">福岡博多店</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
                            </ul>
                        </li>
                        <li class="item-footer-ldp">
                            <div class="title-footer-ldp">ご予約</div>
                            <ul class="sub-list-footer-ldp">
                                <li class="sub-item-footer-ldp">
                                    <a href="https://kyotokimono-rental.com" class="link-to">観光着物レンタル</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/yukata" class="link-to">観光浴衣レンタル</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/furisode" class="link-to">振袖</a>
                                </li>
                                <li class="sub-item-footer-ldp flexbox">
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/irotomesode">留袖</a>
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/irotomesode/iro_tomesode">(色留袖・</a>
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/kurotomesode">黒留袖)</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/homongi" class="link-to">訪問着</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/hakama" class="link-to">卒業式袴</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/shichigosan" class="link-to">七五三</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/ubugi" class="link-to">お宮参り / 産着</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/mofuku" class="link-to">喪服</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/takuhai" class="link-to">宅配レンタル</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-ldp">
                            <div class="title-footer-ldp">サービス一覧</div>
                            <ul class="sub-list-footer-ldp">
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/kimono/hairset" class="link-to">ヘアセット</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/option" class="link-to">小物レンタル</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/photo-session" class="link-to">カメラマン同行オプション</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/kimono/photo-studio" class="link-to">写真スタジオ</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/kimono/tenimotsu" class="link-to">荷物預かり</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/group" class="link-to">団体着物レンタル</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/bring" class="link-to">持ち込みプラン</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-ldp">
                            <div class="wrap-section-list-ldp">
                                <div class="title-footer-ldp">ヘルプ</div>
                                <ul class="sub-list-footer-ldp">
                                    <li class="sub-item-footer-ldp">
                                        <a href="<?php echo WP_HOME ;?>/faq" class="link-to">よくあるご質問</a>
                                    </li>
                                    <li class="sub-item-footer-ldp">
                                        <a href="<?php echo WP_HOME ;?>/faq/contactwp" class="link-to">お問い合わせ</a>
                                    </li>
                                    <li class="sub-item-footer-ldp">
                                        <a href="<?php echo WP_HOME ;?>/howto" class="link-to">着物レンタルの流れ</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="item-footer-ldp">
                            <div class="title-footer-ldp">会社概要</div>
                            <ul class="sub-list-footer-ldp flexbox">
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/blog" class="link-to">
                                        着物レンタルスタッフブログ
                                    </a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/policy" class="link-to">
                                        プライバシーポリシー
                                    </a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/company" class="link-to">
                                        運営会社
                                    </a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/notation" class="link-to">
                                        特定商取引法に基づく表記
                                    </a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/notation_kobutsu" class="link-to">
                                        古物営業法に基づく表記
                                    </a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/kimono/mamechiyo" class="link-to">
                                        豆千代モダン
                                    </a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/recruitment" class="link-to">
                                        求人情報
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!--<li class="item-footer-ldp">
                            <div class="title-footer-ldp single">
                                <a href="<?/*= home_url() */?>/lesson" class="link-to">着物着付け教室</a>
                            </div>
                        </li>
                        <li class="item-footer-ldp">
                            <div class="title-footer-ldp single">
                                <a href="<?/*= home_url() */?>/lesson/yukata" class="link-to">浴衣着付け教室</a>
                            </div>
                        </li>-->
                        <li class="item-footer-ldp">
                            <div class="title-footer-ldp single">
                                <a target="_blank" href="https://araiba.net/" class="link-to">着物クリーニング・保管サービス「アライバ」</a>
                            </div>
                        </li>
                    </ul>
                    <div class="wrap-social-ldp">
                        <div class="wrap-section-list-ldp">
                            <div class="title-footer-ldp"><span class="sm">wargo </span>公式SNS</div>
                            <div class="wrap-lang-social flexbox">
                                <div class="wrap-social flexbox">
                                    <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img class="img-ldp-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-instagram.svg" alt="" /></a></span>
                                    <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img class="img-ldp-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-twitter.svg" alt="" /></a></span>
                                    <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img class="img-ldp-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-facebook.svg" alt="" /></a></span>
                                </div><!--end wrap social-->
                            </div><!--end wrap-lang-social-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-ldp-bottom">
            <div class="container-box">
                <div class="row">
                    <div class="wrap-logo-text-ft">
                        <div class="logo-formal">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                <img data-src="<?php echo WP_HOME; ?>/images/landing-page/logo-footer-landing.svg" alt="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
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
    <div class="footer-landing-page">
        <div class="footer-ldp-top">
            <div class="container-box">
                <div class="row">
                    <ul class="list-footer-ldp flexbox">
                        <li class="item-footer-ldp first">
                            <div class="title-footer-ldp">店舗一覧</div>
                            <ul class="sub-list-footer-ldp">
								<li class="sub-item-footer-ldp">
									<a href="<?php echo WP_HOME ;?>/access/kyoto-area" class="link-to">京都</a>
									<ul class="list-area-ldp flexbox">
										<li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/station-area/kyotostation">京都タワーサンド店</a></li>
										<li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/access/kyoto-area/gion-area/gion-nishiki">京都祇園錦店</a></li>
<!--										<li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/kiyomizu-area/ninenzaka">京都二年坂店</a></li>-->
<!--										<li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/kyoto-area/kiyomizu-area/kiyomizuzaka">清水坂店<span class="shop-tag">休業中</a></li>-->
									</ul>
								</li>
								<li class="sub-item-footer-ldp">
									<a href="<?php echo WP_HOME ;?>/access/osaka-area" class="link-to">大阪</a>
									<ul class="list-area-ldp">
										<li class="item-area-ldp"><a href="<?php echo WP_HOME ;?>/access/osaka-area/osaka-shinsaibashi-opa">心斎橋OPA店</a></li>
									</ul>
								</li>
								<li class="sub-item-footer-ldp">
									<a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area" class="link-to">東京</a>
									<ul class="list-area-ldp flexbox">
										<li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/access/asakusa-area/asakusa">東京浅草店</a></li>
										<li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area/ginza-honten">銀座本店</a></li>
										<li class="item-area-ldp first"><a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area/sendagaya">明治神宮北参道店</a></li>
									</ul>
								</li>
<!--								<li class="sub-item-footer-ldp">-->
<!--									<a href="--><?php //echo WP_HOME ;?><!--/access/shizuoka-area" class="link-to">静岡</a>-->
<!--									<ul class="list-area-ldp">-->
<!--										<li class="item-area-ldp"><a href="--><?php //echo WP_HOME ;?><!--/access/shizuoka-area/ito">伊東店</a></li>-->
<!--									</ul>-->
<!--								</li>-->
								<li class="sub-item-footer-ldp">
									<a href="<?php echo WP_HOME ;?>/access/kanazawa-area" class="link-to">石川</a>
									<ul class="list-area-ldp">
<!--										<li class="item-area-ldp"><a href="--><?php //echo WP_HOME ;?><!--/access/kanazawa-area/kanazawa-kenrokuen">金沢兼六園店</a></li>-->
										<li class="item-area-ldp"><a href="<?php echo WP_HOME ;?>/access/kanazawa-area/kanazawa">金沢香林坊店</a></li>
									</ul>
								</li>
								<!--<li class="sub-item-footer-ldp">
									<a href="<?php echo WP_HOME ;?>/access/fukuoka-area" class="link-to">福岡</a>
									<ul class="list-area-ldp flexbox">
									                                       <li class="item-area-ldp first"><a href="--><?php //echo WP_HOME ;?><!--/access/fukuoka-area/dazaifu">太宰府天満宮前店</a></li>
										<li class="item-area-ldp"><a href="<?php echo WP_HOME ;?>/formal/access/tokyo-area/hakata">福岡博多店</a></li>
									</ul>
								</li>-->
                            </ul>
                        </li>
                        <li class="item-footer-ldp">
                            <div class="title-footer-ldp">ご予約</div>
                            <ul class="sub-list-footer-ldp">
                                <li class="sub-item-footer-ldp">
                                    <a href="https://kyotokimono-rental.com" class="link-to">観光着物レンタル</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/yukata" class="link-to">観光浴衣レンタル</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/furisode" class="link-to">振袖</a>
                                </li>
                                <li class="sub-item-footer-ldp flexbox">
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/irotomesode">留袖</a>
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/irotomesode/iro_tomesode">(色留袖・</a>
                                    <a class="link-to" href="<?php echo WP_HOME ;?>/formal/kurotomesode">黒留袖)</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/homongi" class="link-to">訪問着</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/hakama" class="link-to">卒業式袴</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/shichigosan" class="link-to">七五三</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/ubugi" class="link-to">お宮参り / 産着</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/formal/mofuku" class="link-to">喪服</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/takuhai" class="link-to">宅配レンタル</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-ldp">
                            <div class="title-footer-ldp">サービス一覧</div>
                            <ul class="sub-list-footer-ldp">
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/kimono/hairset" class="link-to">ヘアセット</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/option" class="link-to">小物レンタル</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/photo-session" class="link-to">カメラマン同行オプション</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/kimono/photo-studio" class="link-to">写真スタジオ</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/kimono/tenimotsu" class="link-to">荷物預かり</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/group" class="link-to">団体着物レンタル</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?php echo WP_HOME ;?>/bring" class="link-to">持ち込みプラン</a>
                                </li>
                                <!--<li class="sub-item-footer-ldp">
                                    <a href="<?/*= home_url() */?>/lesson" class="link-to">着物着付け教室</a>
                                </li>
                                <li class="sub-item-footer-ldp">
                                    <a href="<?/*= home_url() */?>/lesson/yukata" class="link-to">浴衣着付け教室</a>
                                </li>-->
                                <li class="sub-item-footer-ldp">
                                    <a target="_blank" href="https://araiba.net/" class="link-to">着物クリーニング・保管サービス「アライバ」</a>
                                </li>
                            </ul>
                        </li>
                        <li class="item-footer-ldp">
                            <div class="wrap-section-list-ldp">
                                <div class="title-footer-ldp">ヘルプ</div>
                                <ul class="sub-list-footer-ldp">
                                    <li class="sub-item-footer-ldp">
                                            <a href="<?php echo WP_HOME ;?>/faq" class="link-to">よくあるご質問</a>
                                    </li>
                                    <li class="sub-item-footer-ldp">
                                        <a href="<?php echo WP_HOME ;?>/faq/contactwp" class="link-to">お問い合わせ</a>
                                    </li>
                                    <li class="sub-item-footer-ldp">
                                        <a href="<?php echo WP_HOME ;?>/howto" class="link-to">着物レンタルの流れ</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="wrap-section-list-ldp">
                                <div class="title-footer-ldp">公式 SNS</div>
                                <div class="wrap-lang-social flexbox pc">
                                    <div class="wrap-social flexbox">
                                        <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img class="img-ldp-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-instagram.svg" alt="" /></a></span>
                                        <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img class="img-ldp-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-twitter.svg" alt="" /></a></span>
                                        <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img class="img-ldp-social" src="<?php echo WP_HOME; ?>/images/formal-rental/icon-facebook.svg" alt="" /></a></span>
                                    </div><!--end wrap social-->
                                </div><!--end wrap-lang-social-->
                            </div>
                        </li>
                    </ul>
                    <div class="wrap-section-list-ldp bottom">
                        <div class="title-footer-ldp">会社概要</div>
                        <ul class="sub-list-footer-ldp flexbox">
                            <li class="sub-item-footer-ldp">
                                <a href="<?php echo WP_HOME ;?>/blog" class="link-to">
                                    着物レンタルスタッフブログ
                                </a>
                            </li>
                            <li class="sub-item-footer-ldp">
                                <a href="<?php echo WP_HOME ;?>/policy" class="link-to">
                                    プライバシーポリシー
                                </a>
                            </li>
                            <li class="sub-item-footer-ldp">
                                <a href="<?php echo WP_HOME ;?>/company" class="link-to">
                                    運営会社
                                </a>
                            </li>
                            <li class="sub-item-footer-ldp">
                                <a href="<?php echo WP_HOME ;?>/notation" class="link-to">
                                    特定商取引法に基づく表記
                                </a>
                            </li>
                            <li class="sub-item-footer-ldp">
                                <a href="<?php echo WP_HOME ;?>/notation_kobutsu" class="link-to">
                                    古物営業法に基づく表記
                                </a>
                            </li>
                            <li class="sub-item-footer-ldp">
                                <a href="<?php echo WP_HOME ;?>/kimono/mamechiyo" class="link-to">
                                    豆千代モダン
                                </a>
                            </li>
                            <li class="sub-item-footer-ldp">
                                <a href="<?php echo WP_HOME ;?>/recruitment" class="link-to">
                                    求人情報
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-ldp-bottom">
            <div class="container-box">
                <div class="row">
                    <div class="wrap-logo-text-ft">
                        <div class="logo-formal">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                <img data-src="<?php echo WP_HOME; ?>/images/landing-page/logo-footer-landing.svg" alt="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
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
$clientScript = Yii::app()->clientScript;
//wp_enqueue_script('swe_utils', WP_HOME . '/js/swe_utils.js');
//wp_enqueue_script('lazyloadxtver3', WP_HOME. '/js/jquery.lazyloadxt.js');
//wp_enqueue_script('lazyloadxt-srcset', WP_HOME. '/js/jquery.lazyloadxt.srcset.js');

if (is_page('kimono')) {
//	Yii::app()->controller->widget('application.components.widgets.newBooking.QuickBooking', array('id'=>'quick_booking', 'isKimono'=>true, 'isPreview' => false));
}
?>
<?php wp_footer(); ?>
<script>
    $(document).ready(function(){
        $('.title-footer-ldp').click(function(){
            var itemLi = $(this).parent();
            itemLi.toggleClass('active');
            $(itemLi).siblings().removeClass('active');
	    });
	$(".wrap-kimono-plans img").lazy();
    });
</script>
<?php
$classEx = $isSmartPhone ? "sp" : "pc";
$footerCss = get_template_directory_uri() . "/css/footer-kimono-landing-page-".$classEx.".css";
?>
<link rel="preload" href="<?=$footerCss?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?=$footerCss?>"></noscript>
</body>
</html>



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

<div class="footer-formal">
    <div class="container-box">
        <div class="row">
            <div class="footer-container">
                <div class="top-footer-menu">
                    <ul class="top-footer-menu-list">
                        <li class="top-footer-menu-item storelist">
                            <h3 class="top-footer-menu-name">店舗一覧</h3>
                            <ul class="top-footer-sub-menu">
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/access/kyotostation">京都駅前京都タワー店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/access/formal-kyototower">フォーマル京都タワー店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/access/gion-shijo">祇園四条店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/osaka/osaka-access/osaka-shinsaibashi">大阪大丸心斎橋店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/access/petitkyotostation">プチ京都駅前店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/asakusa/asakusa-access/asakusa">東京浅草店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/access/petitgionshijo">プチ祇園四条店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/access/kamakura">鎌倉小町店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/access/kiyomizuzaka">清水坂店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/access/kanazawa">金沢香林坊店</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/access/arashiyama">嵐山駅前店</a>
                                </li>
                            </ul>
                        </li>
                        <li class="top-footer-menu-item reservation">
                            <h3 class="top-footer-menu-name">ご予約</h3>
                            <div class="top-footer-sub-menu">
                                <ul class="sub-left-col">
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>">観光着物レンタル</a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>/yukata">観光浴衣レンタル</a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>/formal/homongi">訪問着</a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>/formal/irotomesode">色留袖</a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>/formal/furisode">振袖</a>
                                    </li>
                                </ul>
                                <ul class="sub-right-col">
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>/formal/hakama">卒業袴</a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>/formal/kurotomesode">黒留袖</a>
                                    </li>
                                    <li class="top-footer-sub-item">
                                        <a href="<?php echo home_url()?>/formal/shichigosan">七五三</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="top-footer-menu-item service">
                            <h3 class="top-footer-menu-name">サービス一覧</h3>
                            <ul class="top-footer-sub-menu">
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/kimono/photo-studio">写真スタジオ</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/kimono/hairset">ヘアセット</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/group">団体着物</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/kimono/tenimotsu">荷物預かり</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/kimono/option">オプション小物</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/bring">持ち込みプラン</a>
                                </li>
                            </ul>
                        </li>
                        <li class="top-footer-menu-item help">
                            <h3 class="top-footer-menu-name">ヘルプ</h3>
                            <ul class="top-footer-sub-menu">
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/faq">よくあるご質問</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/faq/contactwp">お問い合わせ</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="<?php echo home_url()?>/howto">着物レンタルの流れ</a>
                                </li>
                            </ul>
                        </li>
                        <li class="top-footer-menu-item sns">
                            <h3 class="top-footer-menu-name">公式 SNS</h3>
                            <ul class="top-footer-sub-menu">
                                <li class="top-footer-sub-item">
                                    <a href="https://twitter.com/kyotokimonorent">twitter</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="https://www.instagram.com/kyotokimonorental.wargo">intagram</a>
                                </li>
                                <li class="top-footer-sub-item">
                                    <a href="https://www.facebook.com/kyotokimonorental">facebook</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="mid-footer-menu">
                    <ul class="mid-footer-menu-list">
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/blog">着物レンタルスタッフブログ</a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/policy">プライバシーポリシー</a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/notation">特定商取引法に基づく表記</a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/notation_kobutsu">古物営業法に基づく表記</a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/kimono/mamechiyo">豆千代モダン</a>
                        </li>
                        <li class="mid-footer-menu-item">
                            <a href="<?php echo home_url()?>/recruitment">京都着物レンタルwargo求人情報</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-copyright">
                    <p class="copyright-text"><?php echo Yii::t('footer-formal', '2018 きものレンタル <br/>wargo.All Rights Reserved.') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">
    $(document).ready(function(){

        //Toggle footer menu
        <?php
            if($isSmartPhone):
        ?>
        $('.top-footer-menu-name').click(function(){
            var itemLi = $(this).parent();
            itemLi.toggleClass('active');
            $(itemLi).siblings().removeClass('active');
        })
        <?php endif?>
    })
</script>
<?php wp_footer(); ?>



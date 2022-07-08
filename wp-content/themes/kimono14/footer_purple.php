<?php
global $is_yukata, $isSmartPhone, $isTablet, $language;

$shop_link_list = MasterValues::$MV_SHOP_SLUG;
?>

<div class="footer-links <?php echo ($language != 'ja') ? 'not-ja' : 'ja' ; ?>">
    <div class="container">
        <div class="box-item access clearfix">
            <h5 class="title clearfix"><span class="icon-fa icon-icon-store"></span><a href="#"><?= Yii::t('wp_theme','店舗一覧'); ?></a></h5>
            <div class="content clearfix">
                <div class="wrap left">
                    <div class="shop clearfix">
                        <h6><span class="icon-fa icon-icon-kyoto"></span><span class="name"><?= Yii::t('wp_footer','京都'); ?></span></h6>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url($shop_link_list[MasterValues::SHOP_KYOTO_STATION_ID])); ?>"><?= Yii::t('wp_theme','京都駅前京都タワー店'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url($shop_link_list[MasterValues::SHOP_GIONSIJO_ID])); ?>"><?= Yii::t('wp_theme','祇園四条店'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url($shop_link_list[MasterValues::SHOP_KYOMIZUZAKA_ID])); ?>"><?= Yii::t('wp_theme','清水坂店'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url($shop_link_list[MasterValues::SHOP_ARASHIYAMA_ID])); ?>"><?= Yii::t('wp_theme','嵐山駅前店'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('access/formal-kyototower')); ?>"><?= Yii::t('wp_theme','フォーマル京都タワー店'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url($shop_link_list[MasterValues::SHOP_ARASHIYAMA_TOGETSUKYO_ID])); ?>"><?= Yii::t('wp_theme_arashiyama_togetsukyoss','嵐山渡月橋店'); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="wrap right">
                    <div class="shop clearfix">
                        <h6><span class="icon-fa icon-icon-ninenzaka"></span><span class="name"><?= Yii::t('footer','東京エリア'); ?></span></h6>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url($shop_link_list[MasterValues::SHOP_ASAKUSA_ID])); ?>"><?= Yii::t('wp_footer','東京浅草店'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url($shop_link_list[MasterValues::SHOP_TOKYO_SKYTREE_ID])); ?>"><?= Yii::t('wp_footer_tokyo_skytree','東京スカイツリー<br>タウンソラマチ店'); ?></a></li>
                        </ul>
                    </div>
                    <div class="shop clearfix">
                        <h6><span class="icon-fa icon-icon-kamakura"></span><span class="name"><?= Yii::t('wp_footer','神奈川'); ?></span></h6>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url($shop_link_list[MasterValues::SHOP_KOMACHI_ID])); ?>"><?= Yii::t('wp_theme','鎌倉小町店'); ?></a></li>
                        </ul>
                    </div>
                    <div class="shop clearfix">
                        <h6><span class="icon-fa icon-icon-kanazawa"></span><span class="name"><?= Yii::t('wp_footer','石川'); ?></span></h6>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url($shop_link_list[MasterValues::SHOP_KANAZAWA_KOURINBOU_ID])); ?>"><?= Yii::t('wp_theme','金沢香林坊店'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end .box-item.access -->

        <div class="box-item temp-01 services clearfix">
            <h5 class="title clearfix"><span class="icon-fa icon-icon-news-footer-2"></span><a href="#"><?= Yii::t('wp_footer','サービス一覧'); ?></a></h5>
            <div class="content clearfix">
                <ul class="clearfix">
                    <div class="wrap left">
                        <li class="clearfix"><p><span class="icon-fa icon-camera"></span><a href="<?php echo esc_url(home_url('kimono/photo-studio')); ?>"><?= Yii::t('wp_footer','写真スタジオ'); ?></a></p></li>
                        <li class="clearfix"><p><span class="icon-fa icon-hair"></span><a href="<?php echo esc_url(home_url('kimono/hairset')); ?>"><?= Yii::t('wp_theme','ヘアセット'); ?></a></p></li>
                        <li class="clearfix"><p><span class="icon-fa icon-group"></span><a href="<?php echo esc_url(home_url('group')); ?>"><?= Yii::t('wp_footer','団体着物'); ?></a></p></li>
                    </div>
                    <div class="wrap right">
                        <li class="clearfix"><p><span class="icon-fa icon-luggage"></span><a href="<?php echo esc_url(home_url('kimono/tenimotsu')); ?>"><?= Yii::t('wp_footer','荷物預かり'); ?></a></p></li>
                        <li class="clearfix"><p><span class="icon-fa icon-accessories"></span><a href="<?php echo esc_url(home_url('kimono/option')); ?>"><?= Yii::t('wp_footer','オプション小物'); ?></a></p></li>
                        <li class="clearfix"><p><span class="icon-fa icon-bring"></span><a href="<?php echo esc_url(home_url('bring')); ?>"><?= Yii::t('wp_footer','持ち込みプラン'); ?></a></p></li>
                    </div>
                </ul>
            </div>
        </div><!-- end .box-item.services -->

        <?php if($language == 'ja'): ?>
            <div class="box-item topics clearfix">
                <h5 class="title clearfix"><span class="icon-fa icon-diamond"></span><a href="#"><?= Yii::t('wp_footer','人気トピック'); ?></a></h5>
                <div class="content clearfix">
                    <ul class="clearfix">
                        <!--<li><a href="/seijin/seijinshiki-maedori">--><?//= Yii::t('wp_footer','成人式振袖スタジオ前撮りキャンペーン'); ?><!--</a></li>-->
                        <li><a href="/takuhai"><?= Yii::t('wp_footer','宅配レンタル'); ?></a></li>
                        <li><a href="/lesson"><?= Yii::t('wp_footer','和心流着付け教室'); ?></a></li>
                        <li><a href="/recruitment"><?= Yii::t('wp_footer','求人情報'); ?></a></li>
                        <li><a href="http://www.wargo.jp/products/list718.html" target="_blank"><?= Yii::t('wp_footer','浴衣販売'); ?></a></li>
                    </ul>
                </div>
            </div><!-- end .box-item.topics -->
        <?php endif; ?>

        <?php if(Yii::app()->language != "ko"): ?>
        <div class="box-item contact clearfix">
            <h5 class="title clearfix"><span class="icon-fa icon-phone-1"></span><a href="#"><?= Yii::t('wp_footer','お問い合わせ'); ?></a></h5>
            <div class="content clearfix">
                <ul class="clearfix">
                    <li>
                        <p class="text"><var class="break"><?= Yii::t('footer','京都エリア'); ?></var><?= Yii::t('wp_footer','コールセンター'); ?><var>（10:00 - 15:00）</var></p>
                        <p class="num"><span class="icon-fa icon-icon-phone"></span><a href="tel:0756002830">075-600-2830</a></p>
                    </li>
                </ul>
            </div>
        </div><!-- end .box-item.contact -->
        <?php else: ?>
        <div class="box-item contact clearfix">
            <div class="box-contact-new">
                <p class="image">
                    <a href="https://www.wagokoro.co.jp/" title="株式会社　和心 - 日本のカルチャーを世界へ" target="_blank">
                        <img src="<?php echo WP_HOME; ?>/images/wagokoro_logo.png" alt="株式会社　和心 - 日本のカルチャーを世界へ">
                    </a>
                </p>
                <p class="text"><?php echo Yii::t('footer', '회사명：株式会社私心｜회사법인등번호：0110-01-072625｜주소：東京都渋谷区千駄ヶ谷3丁目20番12号和心ビル<br>대표자명：森 智宏｜전화번호：81)75-600-2830　(전국 점포 공동 콜센터 9：00～19：00)'); ?></p>
            </div>
        </div>
        <?php endif; ?>

      <?php if($language !='en' && $language !='fr') { ?>
        <div class="box-item temp-01 reserve clearfix">
            <h5 class="title clearfix"><span class="icon-fa icon-icon-reserve"></span><a href="#"><?= Yii::t('wp_theme','予約する'); ?></a></h5>
            <div class="content clearfix">
                <?php if($isSmartPhone): ?>
                    <ul class="clearfix">
                        <div class="wrap left">
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#homongi')); ?>"><?= Yii::t('wp_footer','訪問着'); ?></a></p></li>
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#kurotomesode')); ?>"><?= Yii::t('wp_footer','黒留袖'); ?></a></p></li>
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#kimono')); ?>"><?= Yii::t('wp_footer','観光着物レンタル'); ?></a></p></li>
                        </div>
                        <div class="wrap right">
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#irotomesode')); ?>"><?= Yii::t('wp_footer','色留袖'); ?></a></p></li>
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#seijin')); ?>"><?= Yii::t('wp_footer','振袖'); ?></a></p></li>
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#yukata')); ?>"><?= Yii::t('wp_footer','観光浴衣レンタル'); ?></a></p></li>
                        </div>
                    </ul>
                <?php else: ?>
                    <ul class="clearfix">
                        <div class="wrap left">
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#homongi')); ?>"><?= Yii::t('wp_footer','訪問着'); ?></a></p></li>
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#irotomesode')); ?>"><?= Yii::t('wp_footer','色留袖'); ?></a></p></li>
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#kurotomesode')); ?>"><?= Yii::t('wp_footer','黒留袖'); ?></a></p></li>
                        </div>
                        <div class="wrap right">
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#seijin')); ?>"><?= Yii::t('wp_footer','振袖'); ?></a></p></li>
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#kimono')); ?>"><?= Yii::t('wp_footer','観光着物レンタル'); ?></a></p></li>
                            <li class="clearfix"><p><a href="<?php echo esc_url(home_url('reserve#yukata')); ?>"><?= Yii::t('wp_footer','観光浴衣レンタル'); ?></a></p></li>
                        </div>
                    </ul>
                <?php endif; ?>
            </div>
        </div><!-- end .box-item.reserve -->
      <?php } ?>
    </div><!-- end .container -->

    <div class="copy-right">
        <div class="container">
            <?php
            if($language != 'ja'){
                wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'clearfix', 'menu' => 'FooterMenu'));
            }else{
                wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'clearfix', 'menu' => 'FooterMenuJA'));
            }
            ?>
            <p><?php echo Yii::t('wp_theme', 'Copyright © 2016 京都きものレンタル wargo.All Rights Reserved.') ?></p>
        </div>
    </div><!-- end .copy-right -->
</div><!-- end .footer-links -->
<?php wp_footer(); ?>
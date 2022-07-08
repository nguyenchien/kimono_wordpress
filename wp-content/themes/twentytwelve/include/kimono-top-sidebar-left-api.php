<?php $pathUrl = WP_HOME .((Yii::app()->language != 'ja')? '/'.Yii::app()->language:''); ?>
<?php
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$class = $isSmartPhone ? 'sp' : 'pc';
$page = isset($attr['page']) ? $attr['page'] : '';
?>
<link rel="preload" href="<?=get_template_directory_uri() . '/css/sidebar-left-v3-'.$class.'.css'?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?=get_template_directory_uri() . '/css/sidebar-left-v3-'.$class.'.css'?>"></noscript>
<!-- Begin: Sidebar Left for SP -->
<div class="wrap-menu-common sp">
    <ul class="list-mene-common flexbox">
        <li class="item register-btn">
            <a href="<?php echo $pathUrl ?>/common/register" class="flexbox align-items-center">
                <p class="icon-common">
                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-common-register.svg">
                </p>
                <span class="name"><?php echo Yii::t('new_header_highend', '新規会員登録') ?></span>
            </a>
        </li>
        <li class="item login-btn">
            <a href="<?php echo $pathUrl ?>/common/login" class="flexbox align-items-center">
                <p class="icon-common">
                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-common-login.svg">
                </p>
                <span class="name"><?php echo Yii::t('new_header_highend', 'ログイン') ?></span>
            </a>
        </li>
        <li class="item common-btn">
            <a href="<?php echo $pathUrl ?>/common" class="flexbox align-items-center">
                <p class="icon-common">
                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-common-user.svg">
                </p>
                <span class="name"><?php echo Yii::t('new_header_highend', 'マイページ') ?></span>
            </a>
        </li>
        <li class="item logout-btn">
            <a href="<?php echo $pathUrl ?>/common/do#/logout" class="flexbox align-items-center">
                <p class="icon-common">
                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-common-logout.svg">
                </p>
                <span class="name"><?php echo Yii::t('new_header_highend', 'ログアウト') ?></span>
            </a>
        </li>
        <li class="item">
            <a href="<?php echo $pathUrl ?>/newBooking/cart" class="flexbox align-items-center">
                <p class="icon-common">
                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-common-cart.svg">
                </p>
                <span class="name"><?php echo Yii::t('new_header_highend', 'カート') ?></span>
                <span class="add-num-cart flexbox align-items-center justify-content-center">0</span>
            </a>
        </li>
        <li class="item">
            <a href="#" class="flexbox align-items-center">
                <p class="icon-common">
                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-common-fav.svg">
                </p>
                <span class="name"><?php echo Yii::t('new_header_highend', 'お気に入り') ?></span>
                <span class="add-num-cart flexbox align-items-center justify-content-center">0</span>
            </a>
        </li>
    </ul>
</div>
<?php if($page == 'yukata') : ?>
    <div class="wrap-category plan-price wrap-new-kimono-sidebar-left wrap-box-sidebar-v3 wrap-plan-kimono-v3">
        <div class="title-general text-center title-general-new-style lazy" data-collapse-cate=".collapse-cate" data-src="<?php echo WP_HOME?>/images/landing-page/bg-parttern-category.jpg">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img data-src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '浴衣プラン'); ?></span>
                <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-box-category yukata">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#Standard-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '選べるスタンダード浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥3,000-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#High-end-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '選べるハイエンド浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥4,000-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#Mamechiyo-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '豆千代モダン浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥5,000-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#Brand-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'ブランド浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥5,000-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#Men-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'メンズ浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥3,000-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan/children">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '子供浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥3,000-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan/couple">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'カップルスタンダード浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥5,000-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/bring">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '持ち込み<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥3,000-</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="wrap-box-sidebar-v3 wrap-banner-plan-v3">
        <div class="title-general text-center title-general-new-style other" data-collapse-cate=".collapse-cate">
            <div class="wrap-title-text flexbox">
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '目的別プランで探す'); ?></span>
                <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-banner-plans">
                <li class="item-banner">
                    <a href="<?php echo home_url(); ?>/group">
                        <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/banner-plan-group-v3.jpg?ver=10012020" alt="お得な団体着物体験-京都･大阪･浅草･鎌倉･金沢きものレンタルwargo">
                        <p class="text">団体・法人プラン詳細はこちら</p>
                    </a>
                </li>
                <li class="item-banner">
                    <a href="<?php echo home_url(); ?>/takuhai">
                        <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/banner-plan-takuhai-v3.jpg?ver=10012020" alt="宅配着物レンタル | 京都着物レンタルwargo">
                        <p class="text">宅配着物レンタルはこちら</p>
                    </a>
                </li>
                <li class="item-banner">
                    <a href="<?php echo home_url(); ?>/formal">
                        <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/banner-plan-formal-v3.jpg?ver=10012020" alt="着物レンタル | 振袖・袴・訪問着・留袖のレンタルならwargo">
                        <p class="text">冠婚葬祭の着物レンタルはこちら</p>
                    </a>
                </li>
                <!--            <li class="item-banner">-->
                <!--                <a href="--><?php //echo home_url(); ?><!--/online_lesson">-->
                <!--                    <img data-src="--><?php //echo WP_HOME; ?><!--/images/new-kimono-v3/banner-online-lesson.jpg" alt="オンライン着付け教室「和ノ心」はこちら">-->
                <!--                    <p class="text">オンライン着付け教室「和ノ心」はこちら</p>-->
                <!--                </a>-->
                <!--            </li>-->
            </ul>
        </div>
    </div>
    <div class="wrap-category plan wrap-new-kimono-sidebar-left wrap-box-sidebar-v3 wrap-category-formal-v3">
        <div class="title-general text-center title-general-new-style lazy" data-collapse-cate=".collapse-cate" data-src="<?php echo WP_HOME?>/images/landing-page/bg-parttern-category.jpg">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img data-src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '種類別プラン'); ?></span>
                <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/homongi"><span class="text-category"><?= Yii::t ('new_kimono_sidebar_left','訪問着<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/kurotomesode"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','留袖（黒留袖）<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/irotomesode"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','留袖（色留袖）<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/furisode"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','振袖<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/sotsugyoushiki"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','卒業式袴・二尺袖<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url(); ?>/formal/shichigosan"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','七五三<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/ubugi"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','産着（初着）<var>プラン</var>');?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/iromuji"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','色無地<var>プラン</var>');?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/mofuku"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','喪服・礼服<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?= WP_HOME ?>/formal/monpuku"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','紋付き袴<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?= WP_HOME ?>/formal/kids-hakama"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','小学生卒業袴<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?= WP_HOME ?>/takuhai/yukata"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','浴衣<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
            </ul>
        </div>
    </div>
    <div class="wrap-category wrap-new-kimono-sidebar-left scene wrap-box-sidebar-v3 wrap-scene-formal-v3">
        <div class="title-general text-center title-general-new-style lazy kimono yukata-contest" data-collapse-cate=".collapse-cate" data-src="<?php echo WP_HOME?>/images/landing-page/bg-parttern-category.jpg">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img data-src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', 'シーン'); ?></span>
                <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?= home_url()?>/kimono"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '観光・お散歩'); ?></span></a><span class="arrow"></span></div>
                </li>
                <li id="party" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/party"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', 'パーティー'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="wedding" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/wedding"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '結婚式'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="sotsugyoushiki" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/sotsugyoushiki"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '卒業式'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="seijinshiki" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/seijinshiki"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '成人式'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li id="shichigosan" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/shichigosan"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '七五三'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/nyugakushiki"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '入学式'); ?></span></a><span class="arrow"></span></div>
                </li>
                <li id="omiyamairi" class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/omiyamairi"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', 'お宮参り'); ?></span></a>
                        <span class="arrow"></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="wrap-shoplist wrap-category wrap-new-kimono-sidebar-left wrap-box-sidebar-v3 wrap-shop-list-v3">
        <div class="title-general text-center title-general-new-style lazy" data-collapse-cate=".collapse-cate" data-src="<?php echo WP_HOME?>/images/landing-page/bg-parttern-category.jpg">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img data-src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '店舗'); ?></span>
                <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'から探す'); ?></span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-box-category">
                <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-first flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/kyoto-area/" class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '京都エリア')?></a><span class="price-sidebar-left"></span></div>
                    <div class="box-shoplist ">
                        <ul class="list-shop-list">
                            <li class="item-shop-list shop-list-01 text-category border-bottom">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/station-area/kyotostation">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kyoto-station')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop-list shop-list-03 border-bottom">
                                <div class="bg-shop-list">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/station-area/formal-kyototower">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-formal-kyototower')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop-list shop-list-04 text-category border-bottom">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/gion-area/gion-nishiki">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-gion-shijo')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop-list shop-list-06 text-category border-bottom">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kiyomizuzaka')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
<!--                            <li class="item-shop-list shop-list-26 text-category border-bottom">-->
<!--                                <div class="bg-shop-list ">-->
<!--                                    <div class="tt-shop-list flexbox align-items-center">-->
<!--                                        <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">-->
<!--                                            --><?//= Yii::t('new_kimono_sidebar_left','title-des-chawanzaka')?>
<!--                                        </a>-->
<!--                                        <div class="icon-arrow "><span class="arrow"></span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
                            <li class="item-shop-list shop-list-07 border-bottom">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/arashiyama-area/arashiyama">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-arashiyama')?>
                                        </a>
                                        <div class="icon-arrow"><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop-list shop-list-08">
                                <div class="bg-shop-list">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-arashiyama-togetsukyo')?>
                                        </a>
                                        <div class="icon-arrow"><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/osaka-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','大阪エリア')?></a><span class="price-sidebar-left"></span></div>
                    <div class="box-shoplist">
                        <ul class="list-shop-list">
                            <li class="item-shop-list shop-list-28 text-category">
                                <div class="bg-shop-list">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/osaka-area/osaka-shinsaibashi-opa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-osaka-shinsaibashi-opa')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--            <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">-->
                <!--                <div class="title-category title-category-single flexbox align-items-center"><a href="--><?php //echo home_url()?><!--/access/okinawa-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','沖縄エリア')?><!--</a><span class="price-sidebar-left"></span></div>-->
                <!--                <div class="box-shoplist">-->
                <!--                    <ul class="list-shop-list">-->
                <!--                        <li class="item-shop-list shop-list-29 text-category">-->
                <!--                            <div class="bg-shop-list">-->
                <!--                                <div class="tt-shop-list flexbox align-items-center">-->
                <!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/okinawa-area/okinawa-naha">-->
                <!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-okinawa-naha')?>
                <!--                                    </a>-->
                <!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </div>-->
                <!--            </li>-->
                <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <?php if($language == 'ja'): ?>
                            <a href="<?php echo WP_HOME; ?>/formal/access/tokyo-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','東京')?></a>
                        <?php else: ?>
                            <a href="<?php echo home_url(); ?>/access/tokyo-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','東京')?></a>
                        <?php endif; ?>
                        <span class="price-sidebar-left"></span></div>
                    <div class="box-shoplist">
                        <ul class="list-shop-list">
                            <li class="item-shop-list shop-list-10 text-category border-bottom">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <?php if($language == 'ja'): ?>
                                            <a class="linkto-shop flexbox" href="<?php echo WP_HOME ?>/formal/access/tokyo-area/ginza-honten">
                                                <?= Yii::t('new_kimono_sidebar_left', 'title-des-ginza-honten')?>
                                            </a>
                                        <?php else: ?>
                                            <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/tokyo-area/ginza-honten">
                                                <?= Yii::t('new_kimono_sidebar_left', 'title-des-ginza-honten')?>
                                            </a>
                                        <?php endif; ?>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop-list shop-list-11 text-category border-bottom">
                                <div class="bg-shop-list">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                            <?= Yii::t('new_kimono_sidebar_left', 'title-des-shinjuku')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop-list shop-list-12 text-category border-bottom">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/asakusa-area/asakusa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-asakusa')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop-list shop-list-13 text-category">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/asakusa-area/tokyoskytree">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-tokyoskytree')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/kamakura-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','神奈川')?></a><span class="price-sidebar-left"></span></div>
                    <div class="box-shoplist">
                        <ul class="list-shop-list">
                            <li class="item-shop-list shop-list-14 text-category">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kamakura-area/kamakura">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kamakura')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/kanazawa-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','石川')?></a><span class="price-sidebar-left"></span></div>
                    <div class="box-shoplist">
                        <ul class="list-shop-list">
                            <li class="item-shop-list shop-list-15 text-category border-bottom">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kanazawa-area/kanazawa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kanazawa')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                             <li class="item-shop-list shop-list-27 text-category">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kanazawa-area/kanazawa-kenrokuen">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kanazawa-kenrokuen')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
<!--                <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">-->
<!--                    <div class="title-category title-category-single flexbox align-items-center"><a href="--><?php //echo home_url()?><!--/access/okayama-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','岡山')?><!--</a><span class="price-sidebar-left"></span></div>-->
<!--                    <div class="box-shoplist">-->
<!--                        <ul class="list-shop-list">-->
<!--                            <li class="item-shop-list shop-list-16 text-category">-->
<!--                                <div class="bg-shop-list ">-->
<!--                                    <div class="tt-shop-list flexbox align-items-center">-->
<!--                                        <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/okayama-area/kurashiki">-->
<!--                                            --><?//= Yii::t('new_kimono_sidebar_left','title-des-kurashiki')?>
<!--                                        </a>-->
<!--                                        <div class="icon-arrow "><span class="arrow"></span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </li>-->
                <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/fukuoka-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','福岡')?></a><span class="price-sidebar-left"></span></div>
                    <div class="box-shoplist">
                        <ul class="list-shop-list">
                            <li class="item-shop-list shop-list-17 text-category border-bottom">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/fukuoka-area/dazaifu">
                                            <?= Yii::t('new_kimono_sidebar_left', 'title-des-dazaifu')?>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                            <li class="item-shop-list shop-list-17 text-category">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/formal/access/tokyo-area/hakata">
                                            <div class="lg-text">福岡博多店</div>
                                            <div class="sm-text">キャナルシティオーパ内<br>センターウォーク南側2F</div>
                                        </a>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
<!--                <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">-->
<!--                    <div class="title-category title-category-single flexbox align-items-center">-->
<!--                        --><?php //if($language == 'ja'): ?>
<!--                            <a href="--><?php //echo home_url()?><!--/formal/access/sapporo-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','札幌')?><!--</a>-->
<!--                        --><?php //else: ?>
<!--                            <a href="--><?php //echo home_url()?><!--/access/sapporo-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','札幌')?><!--</a>-->
<!--                        --><?php //endif; ?>
<!--                        <span class="price-sidebar-left"></span></div>-->
<!--                    <div class="box-shoplist">-->
<!--                        <ul class="list-shop-list">-->
<!--                            <li class="item-shop-list shop-list-20 text-category">-->
<!--                                <div class="bg-shop-list ">-->
<!--                                    <div class="tt-shop-list flexbox align-items-center">-->
<!--                                        --><?php //if($language == 'ja'): ?>
<!--                                            <a class="linkto-shop flexbox" href="--><?php //echo WP_HOME ?><!--/formal/access/sapporo-area/sapporo-susukinostation">-->
<!--                                                --><?//= Yii::t('new_kimono_sidebar_left', 'title-des-sapporo-susukinostation')?>
<!--                                            </a>-->
<!--                                        --><?php //else: ?>
<!--                                            <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/sapporo-area/sapporo-susukinostation">-->
<!--                                                --><?//= Yii::t('new_kimono_sidebar_left', 'title-des-sapporo-susukinostation')?>
<!--                                            </a>-->
<!--                                        --><?php //endif; ?>
<!--                                        <div class="icon-arrow "><span class="arrow"></span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </li>-->
                <!--
                <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <?php if($language == 'ja'): ?>
                            <a href="<?php echo home_url()?>/formal/access/tohoku-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','宮城')?></a>
                        <?php else: ?>
                            <a href="<?php echo home_url()?>/access/tohoku-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','宮城')?></a>
                        <?php endif; ?>
                        <span class="price-sidebar-left"></span></div>
                    <div class="box-shoplist">
                        <ul class="list-shop-list">
                            <li class="item-shop-list shop-list-21 text-category border-bottom">
                                <div class="bg-shop-list ">
                                    <div class="tt-shop-list flexbox align-items-center">
                                        <?php if($language == 'ja'): ?>
                                            <a class="linkto-shop flexbox" href="<?php echo WP_HOME ?>/formal/access/tohoku-area/sendai-parco2">
                                                <?= Yii::t('new_kimono_sidebar_left', 'title-des-sendai-parco2')?>
                                            </a>
                                        <?php else: ?>
                                            <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/tohoku-area/sendai-parco2">
                                                <?= Yii::t('new_kimono_sidebar_left', 'title-des-sendai-parco2')?>
                                            </a>
                                        <?php endif; ?>
                                        <div class="icon-arrow "><span class="arrow"></span></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                -->
            </ul>
        </div>
    </div>
    <div class="wrap-category wrap-new-kimono-sidebar-left preview wrap-box-sidebar-v3 wrap-formal-preview-v3">
        <?php defined('ENABLE_FORMAL_PREVIEW_POPUP') or define('ENABLE_FORMAL_PREVIEW_POPUP', true);?>
        <div class="title-general text-center title-general-new-style lazy kimono-blur yukata-contest" data-collapse-cate=".collapse-cate" data-src="<?php echo WP_HOME?>/images/landing-page/bg-parttern-category.jpg">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img data-src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '下見'); ?></span>
                <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
        <div class="box-category collapse-cate">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center box-category-preview"><a href="<?=WP_HOME?>/formal/preview"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', 'お下見ガイド・ご予約'); ?></span></a><span class="arrow"></span></div>
                </li>
            </ul>
        </div>
    </div>
    <div class="wrap-box-sidebar-v3 wrap-search-product-v3">
        <?php echo do_shortcode('[WidgetSearchFormalForTopPageV3]'); ?>
        <a class="link-top-araibar" target="_blank" href="https://araiba.net/cleaning">
            <div class="wrap-text-banner-araibar">
                <img data-src="<?= WP_HOME; ?>/images/new-kimono-v3/araibabanner-kimono-min.jpg?ver=20200305" alt="着物クリーニング＆保管サービス「アライバ」OPEN!">
                <p class="text-araibar">着物クリーニング＆保管サービス「アライバ」OPEN!</p>
            </div>
        </a>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('body').each(function(){
                $('[data-src]').lazy();
            });
        });
    </script>
<?php else: ?>
    <?php include(locate_template('include/content-sidebar-left-v3.php')); ?>
<?php endif; ?>

<!-- End: Sidebar Left for SP -->
<script>
    $(document).ready(function () {
        $('[data-sub-cates]').click(function(){
            var self    = this;
            var target  = $(self).data('sub-cates');
            var $other  = $('[data-sub-cates="'+target+'"]');
            if(target){
                $other.each(function(index, el){
                    if(el === self){
                        $(self).parents(".title-category").siblings(target).slideToggle();
                        $(self).parents(".title-category").toggleClass('active');
                    }
                });
            }
        });
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
        // show|hide header box (register, login, logout)
        if (typeof readCookie === 'function') {
            var token = readCookie('KIMONO_MEMBER_TOKEN');
        }
        <?php if (!$isSmartPhone) { ?>
            var register_btn = $('.pc.register-btn');
            var login_btn = $('.pc.login-btn');
            var logout_btn = $('.pc.logout-btn');
            var common_btn = $('.pc.common-btn');
        <?php } else { ?>
            var register_btn = $('.sp .register-btn');
            var login_btn = $('.sp .login-btn');
            var logout_btn = $('.sp .logout-btn');
            var common_btn = $('.sp .common-btn');
        <?php } ?>

        if (null === token) {  // show:register, login; hide: logout, common
            register_btn.show();
            login_btn.show();
            logout_btn.hide();
            common_btn.hide();
        } else {  // show logout, common; hide: register, login
            register_btn.hide();
            login_btn.hide();
            logout_btn.show();
            common_btn.show();
        }
    });
</script>

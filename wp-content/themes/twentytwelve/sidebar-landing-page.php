<?php
/**
 * Created by PhpStorm.
 * User: PC-06
 * Date: 2/28/2018
 * Time: 3:52 PM
 */
?>
<?php
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$isFrontPage = is_front_page();
$isYukata = is_page('yukata');
?>
<style>
    .section-category .conditions form{
        display: none;
    }
</style>
<div class="wrap-category plan-price wrap-new-kimono-sidebar-left">
    <div class="title-general text-center title-general-new-style kimono" data-collapse-cate=".collapse-cate">
        <div class="wrap-title-text flexbox">
            <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
            <?php if($isYukata) : ?>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '浴衣プラン'); ?></span>
            <?php else: ?>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '着物プラン'); ?></span>
            <?php endif; ?>
            <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
        </div>
        <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
    </div>
    <div class="box-category collapse-cate">
        <?php if($isYukata) : ?>
            <ul class="list-box-category yukata">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#Standard-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '選べるスタンダード浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥2,980-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#High-end-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '選べるハイエンド浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥3,980-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#Mamechiyo-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '豆千代モダン浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥5,980-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#Brand-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'ブランド浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥5,980-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan#Men-Yukata">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'メンズ浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥2,980-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan/children">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '子供浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥2,980-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/yukata/plan/couple">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'カップルスタンダード浴衣<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥5,760-</span>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/bring">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '持ち込み<var>プラン</var>')?></span>
                        </a>
                        <span class="price-sidebar-left">¥1,980-</span>
                    </div>
                </li>
            </ul>
        <?php else: ?>
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono#Standard-Kimono"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'スタンダード<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono#Furisode-Hanhaba"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'お散歩振袖<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono/children"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '子供着物<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono#Antique-Kimono"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'アンティーク<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono#Mamechiyo-Kimono"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '豆千代モダン<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono#Men-Kimono"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'メンズ着物<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono#Men-Hakama"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '着流し袴<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono/couple"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'カップル<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/bring"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '持ち込み<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/vip"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'VIP<var>プラン</var>')?></span></a><?= $css_arrow; ?></div>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</div>

<div class="wrap-category plan wrap-new-kimono-sidebar-left">
    <div class="title-general text-center title-general-new-style kimono" data-collapse-cate=".collapse-cate">
        <div class="wrap-title-text flexbox">
            <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
            <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '種類別プラン'); ?></span>
            <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
        </div>
        <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
    </div>
    <div class="box-category collapse-cate">
        <ul class="list-box-category">
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/homongi"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '訪問着'); ?><var><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/irotomesode"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '留袖(黒留袖・色留袖)'); ?><var><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/furisode"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '振袖'); ?><var><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/hakama"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '卒業式袴・二尺袖'); ?><var><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category flexbox title-category-single align-items-center"><a href="<?php echo WP_HOME; ?>/formal/shichigosan"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '七五三'); ?><var><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/ubugi"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '産着（初着）'); ?><var><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/iromuji"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '色無地'); ?><var><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/mofuku"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '喪服・礼服'); ?><var><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?= WP_HOME ?>/takuhai/yukata"><span class="text-category"><?php echo Yii::t('new-sidebar-left-v2', '浴衣'); ?><var><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></var></span></a><span class="arrow"></span></div>
            </li>
        </ul>
    </div>
</div>

<div class="wrap-category wrap-new-kimono-sidebar-left scene">
    <div class="title-general text-center title-general-new-style kimono yukata-contest" data-collapse-cate=".collapse-cate">
        <div class="wrap-title-text flexbox">
            <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
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

<div class="wrap-shoplist wrap-category wrap-new-kimono-sidebar-left">
    <div class="title-general text-center title-general-new-style kimono" data-collapse-cate=".collapse-cate">
        <div class="wrap-title-text flexbox">
            <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
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
                        <!--                        <li class="item-shop-list shop-list-02 border-bottom">-->
                        <!--                            <div class="bg-shop-list">-->
                        <!--                                <div class="tt-shop-list flexbox align-items-center">-->
                        <!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/station-area/petitkyotostation">-->
                        <!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-petitkyotostation')?>
                        <!--                                    </a>-->
                        <!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
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
                        <!--                        <li class="item-shop-list shop-list-05 border-bottom">-->
                        <!--                            <div class="bg-shop-list">-->
                        <!--                                <div class="tt-shop-list flexbox align-items-center">-->
                        <!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/gion-area/petitgionshijo">-->
                        <!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-petitgionshijo')?>
                        <!--                                    </a>-->
                        <!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
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
<!--                        <li class="item-shop-list shop-list-26 text-category border-bottom">-->
<!--                            <div class="bg-shop-list ">-->
<!--                                <div class="tt-shop-list flexbox align-items-center">-->
<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">-->
<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-chawanzaka')?>
<!--                                    </a>-->
<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="item-shop-list shop-list-07 border-bottom">-->
<!--                            <div class="bg-shop-list ">-->
<!--                                <div class="tt-shop-list flexbox align-items-center">-->
<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/arashiyama-area/arashiyama">-->
<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-arashiyama')?>
<!--                                    </a>-->
<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="item-shop-list shop-list-08">-->
<!--                            <div class="bg-shop-list">-->
<!--                                <div class="tt-shop-list flexbox align-items-center">-->
<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">-->
<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-arashiyama-togetsukyo')?>
<!--                                    </a>-->
<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
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
                    <?php if($lang == 'ja'): ?>
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
                                    <?php if($lang == 'ja'): ?>
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
                        <li class="item-shop-list shop-list-15 text-category">
                            <div class="bg-shop-list ">
                                <div class="tt-shop-list flexbox align-items-center">
                                    <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kanazawa-area/kanazawa">
                                        <?= Yii::t('new_kimono_sidebar_left','title-des-kanazawa')?>
                                    </a>
                                    <div class="icon-arrow "><span class="arrow"></span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/okayama-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','岡山')?></a><span class="price-sidebar-left"></span></div>
                <div class="box-shoplist">
                    <ul class="list-shop-list">
                        <li class="item-shop-list shop-list-16 text-category">
                            <div class="bg-shop-list ">
                                <div class="tt-shop-list flexbox align-items-center">
                                    <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/okayama-area/kurashiki">
                                        <?= Yii::t('new_kimono_sidebar_left','title-des-kurashiki')?>
                                    </a>
                                    <div class="icon-arrow "><span class="arrow"></span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/fukuoka-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','福岡')?></a><span class="price-sidebar-left"></span></div>
                <div class="box-shoplist">
                    <ul class="list-shop-list">
                        <li class="item-shop-list shop-list-17 text-category">
                            <div class="bg-shop-list ">
                                <div class="tt-shop-list flexbox align-items-center">
                                    <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/fukuoka-area/dazaifu">
                                        <?= Yii::t('new_kimono_sidebar_left', 'title-des-dazaifu')?>
                                    </a>
                                    <div class="icon-arrow "><span class="arrow"></span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                <div class="title-category title-category-single flexbox align-items-center">
                    <?php if($lang == 'ja'): ?>
                        <a href="<?php echo home_url()?>/formal/access/sapporo-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','札幌')?></a>
                    <?php else: ?>
                        <a href="<?php echo home_url()?>/access/sapporo-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','札幌')?></a>
                    <?php endif; ?>
                    <span class="price-sidebar-left"></span></div>
                <div class="box-shoplist">
                    <ul class="list-shop-list">
                        <li class="item-shop-list shop-list-20 text-category">
                            <div class="bg-shop-list ">
                                <div class="tt-shop-list flexbox align-items-center">
                                    <?php if($lang == 'ja'): ?>
                                        <a class="linkto-shop flexbox" href="<?php echo WP_HOME ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                            <?= Yii::t('new_kimono_sidebar_left', 'title-des-sapporo-susukinostation')?>
                                        </a>
                                    <?php else: ?>
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/sapporo-area/sapporo-susukinostation">
                                            <?= Yii::t('new_kimono_sidebar_left', 'title-des-sapporo-susukinostation')?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="icon-arrow "><span class="arrow"></span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
<!--            <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">-->
<!--                <div class="title-category title-category-single flexbox align-items-center">-->
<!--                    --><?php //if($lang == 'ja'): ?>
<!--                        <a href="--><?php //echo home_url()?><!--/formal/access/tohoku-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','宮城')?><!--</a>-->
<!--                    --><?php //else: ?>
<!--                        <a href="--><?php //echo home_url()?><!--/access/tohoku-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','宮城')?><!--</a>-->
<!--                    --><?php //endif; ?>
<!--                    <span class="price-sidebar-left"></span></div>-->
<!--                <div class="box-shoplist">-->
<!--                    <ul class="list-shop-list">-->
<!--                        <li class="item-shop-list shop-list-21 text-category border-bottom">-->
<!--                            <div class="bg-shop-list ">-->
<!--                                <div class="tt-shop-list flexbox align-items-center">-->
<!--                                    --><?php //if($lang == 'ja'): ?>
<!--                                        <a class="linkto-shop flexbox" href="--><?php //echo WP_HOME ?><!--/formal/access/tohoku-area/sendai-parco2">-->
<!--                                            --><?//= Yii::t('new_kimono_sidebar_left', 'title-des-sendai-parco2')?>
<!--                                        </a>-->
<!--                                    --><?php //else: ?>
<!--                                        <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/tohoku-area/sendai-parco2">-->
<!--                                            --><?//= Yii::t('new_kimono_sidebar_left', 'title-des-sendai-parco2')?>
<!--                                        </a>-->
<!--                                    --><?php //endif; ?>
<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </li>-->
        </ul>
    </div>
</div>

<div class="wrap-category wrap-new-kimono-sidebar-left preview" >
    <?php defined('ENABLE_FORMAL_PREVIEW_POPUP') or define('ENABLE_FORMAL_PREVIEW_POPUP', true);?>
    <div class="title-general text-center title-general-new-style kimono-blur yukata-contest" data-collapse-cate=".collapse-cate">
        <div class="wrap-title-text flexbox">
            <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
            <?php if($isYukata) : ?>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', 'まずは下見予約をする！'); ?></span>
            <?php else: ?>
                <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '下見'); ?></span>
                <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
            <?php endif; ?>
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

<?php echo do_shortcode('[WidgetSearchCategoryLandingPage]'); ?>
<?php if(!$isFrontPage): ?>
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
        })
    </script>
<?php endif; ?>

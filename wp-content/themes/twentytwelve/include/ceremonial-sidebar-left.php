<?php
$lang = Yii::app()->language;
$is_top_page = is_front_page();
$pageYukataContest2019 = is_page('yukata-girl-contest2019');
?>
<div class="wrap-category plan wrap-new-kimono-sidebar-left">
    <?php if($lang == 'ja'): ?>
        <?php if ($is_top_page) : ?>
            <div class="title-general text-center title-general-new-style kimono" data-collapse-cate=".collapse-cate">
                <div class="wrap-title-text flexbox">
                    <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                    <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '種類別プラン'); ?></span>
                    <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
                </div>
                <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
            </div>
        <?php elseif ($pageYukataContest2019): ?>
            <div class="title-general text-center title-general-new-style kimono yukata-contest" data-collapse-cate=".collapse-cate">
                <div class="wrap-title-text flexbox">
                    <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                    <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', 'プラン'); ?></span>
                    <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
                </div>
                <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
            </div>
        <?php else: ?>
            <div class="title-general text-center"><span class="text-title-general">Plan</span><p class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', '冠婚葬祭の着物レンタルを探す'); ?></p></div>
        <?php endif; ?>
    <?php else:?>
        <h3 class="title-general text-center"><?= Yii::t ('new_kimono_sidebar_left','new-kimono-title-plan')?></h3>
    <?php endif;?>

    <?php if ($is_top_page || $pageYukataContest2019) : ?>
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
    <?php else: ?>
        <div class="box-category">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/homongi"><span class="text-category"><?= Yii::t ('new_kimono_sidebar_left','訪問着<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/kurotomesode"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','黒留袖<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/irotomesode"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','留袖（黒留袖・色留袖）<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/furisode"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','振袖<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/formal/hakama"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','袴・二尺袖<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category flexbox align-items-center">
                        <a href="<?php echo home_url(); ?>/formal/shichigosan"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','七五三<var>プラン</var>')?></span></a>
                        <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                    </div>
                    <ul class="sub-cates">
                        <li>
                            <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url(); ?>/formal/shichigosan/shichigosan3years"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','七五三（三歳）');?></span></a><span class="arrow"></span></div>
                        </li>
                        <li>
                            <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url(); ?>/formal/shichigosan/shichigosan5years"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','七五三（五歳）');?></span></a><span class="arrow"></span></div>
                        </li>
                        <li>
                            <div class="title-category title-category-single flexbox align-items-center last"><a href="<?php echo home_url(); ?>/formal/shichigosan/shichigosan7years"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','七五三（七歳）');?></span></a><span class="arrow"></span></div>
                        </li>
                    </ul>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category flexbox align-items-center">
                        <a href="<?php echo WP_HOME; ?>/formal/ubugi"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','産着（初着）<var>プラン</var>');?></span></a>
                        <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                    </div>
                    <ul class="sub-cates">
                        <li>
                            <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/ubugi/boy"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','男の子');?></span></a><span class="arrow"></span></div>
                        </li>
                        <li>
                            <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/ubugi/girl"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','女の子');?></span></a><span class="arrow"></span></div>
                        </li>
                    </ul>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/iromuji"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','色無地<var>プラン</var>');?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/mofuku"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','喪服・礼服<var>プラン</var>')?></span></a><span class="arrow"></span></div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category flexbox align-items-center">
                        <a href="<?= WP_HOME ?>/takuhai/yukata"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','浴衣<var>プラン</var>')?></span></a>
                        <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                    </div>
                    <ul class="sub-cates">
                        <li>
                            <div class="title-category title-category-single flexbox align-items-center"><a href="<?= WP_HOME ?>/takuhai/yukata/women"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','女性')?></span></a><span class="arrow"></span></div>
                        </li>
                        <li>
                            <div class="title-category title-category-single flexbox align-items-center"><a href="<?= WP_HOME ?>/takuhai/yukata/men"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','男性')?></span></a><span class="arrow"></span></div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    <?php endif; ?>
</div>
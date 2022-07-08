<?php
    global $is_yukata;
	$lang = Yii::app()->language;
    $is_top_page = is_front_page();
    $css_hide = '';
    $css_arrow = '';
    if ($is_top_page) {
        $css_hide = 'style = "display: none;"';
        $css_arrow = '<span class="arrow"></span>';
    }
$pageYukataContest2019 = is_page('yukata-girl-contest2019');
    if($is_yukata){?>
        <?php if (!$pageYukataContest2019) : ?>
        <div class="wrap-category plan-price wrap-new-kimono-sidebar-left">
            <div class="title-general text-center"><?php echo Yii::t('new_kimono_sidebar_left', 'new-kimono-title-plan-price')?></div>
            <div class="box-category">
                <ul class="list-box-category">
                    <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/yukata/plan#Standard-Yukata"><span class="text-category"><?php echo Yii::t('new_yukata_sidebar_left', 'スタンダード浴衣<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>2,980-</span></a></div>
                    </li>
                    <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/yukata/plan#Premium-Yukata"><span class="text-category"><?php echo Yii::t('new_yukata_sidebar_left', 'プレミアム浴衣<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>3,980-</span></a></div>
                    </li>
                    <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/yukata/plan#High-end-Yukata"><span class="text-category"><?php echo Yii::t('new_yukata_sidebar_left', 'ハイエンド夏着物<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>4,980-</span></a></div>
                    </li>
                    <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/yukata/plan#Mamechiyo-Yukata"><span class="text-category"><?php echo Yii::t('new_yukata_sidebar_left', '豆千代モダン浴衣<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>5,980-</span></a></div>
                    </li>
                    <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/yukata/plan#Brand-Yukata"><span class="text-category"><?php echo Yii::t('new_yukata_sidebar_left', 'ブランド浴衣<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>5,980-</span></a></div>
                    </li>
                    <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/yukata/plan#Summer-Kimono"><span class="text-category"><?php echo Yii::t('new_yukata_sidebar_left', '夏着物<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>4,980-</span></a></div>
                    </li>
                <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/yukata/plan#Men-Yukata"><span class="text-category"><?php echo Yii::t('new_yukata_sidebar_left', 'メンズ浴衣<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>2,980-</span></a></div>
                    </li>
                    <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/yukata/plan/children"><span class="text-category"><?php echo Yii::t('new_yukata_sidebar_left', '子供浴衣<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>2,980-</span></a></div>
                    </li>
                    <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/yukata/plan/couple"><span class="text-category"><?php echo Yii::t('new_yukata_sidebar_left', 'カップルスタンダード浴衣<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>5,760-</span></a></div>
                    </li>
                    <li class="item-box-category flexbox">
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/bring"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '持ち込み<var>プラン</var>')?></span><span class="price-sidebar-left"><var>¥</var>1,980-</span></a></div>
                    </li>
					<?php if($lang == "en"){?>
					<li class="item-box-category flexbox">
						<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/highgrade"><span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'High-Grade Furisode Kimono<var>Plan</var>')?></span><span class="price-sidebar-left"><var>¥</var>19,900-</span></a></div>
					</li>
					<?php }?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
<?php }else{?>
    <div class="wrap-category plan-price wrap-new-kimono-sidebar-left">
        <?php if($lang == 'ja'): ?>
            <?php if ( $is_top_page ) : ?>
                <div class="title-general text-center title-general-new-style kimono" data-collapse-cate=".collapse-cate">
                    <div class="wrap-title-text flexbox">
                        <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                        <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '着物プラン'); ?></span>
                        <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
                    </div>
                    <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
                </div>
            <?php else: ?>
                <div class="title-general text-center"><span class="text-title-general">Plan</span><p class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', '着物レンタルのプランを探す'); ?></p></div>
            <?php endif; ?>
        <?php else:?>
            <h3 class="title-general text-center"><?php echo Yii::t('new_kimono_sidebar_left', 'new-kimono-title-plan-price')?></h3>
        <?php endif;?>
        <div class="box-category collapse-cate">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/kimono#Standard-Kimono">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'スタンダード<var>プラン</var>')?></span>
                            <span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>2,980-</span>
                        </a><?= $css_arrow; ?>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/kimono#High-end-Kimono">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '選べるハイエンド<var>プラン</var>')?></span>
                            <span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>3,980-</span>
                        </a><?= $css_arrow; ?>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/kimono#Antique-Kimono">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'アンティーク<var>プラン</var>')?>
                            </span><span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>5,980-</span>
                        </a><?= $css_arrow; ?>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/kimono#Mamechiyo-Kimono">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '豆千代モダン<var>プラン</var>')?></span>
                            <span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>5,980-</span>
                        </a><?= $css_arrow; ?>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/kimono#Taishoroman-Kimono">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '大正ロマン<var>プラン</var>')?></span>
                            <span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>6,980-</span>
                        </a><?= $css_arrow; ?>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/kimono#Furisode-Hanhaba">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'お散歩振袖<var>プラン</var>')?></span>
                            <span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>8,980-</span>
                        </a><?= $css_arrow; ?>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/kimono/couple">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'カップル<var>プラン</var>')?></span>
                            <span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>5,760-</span></a><?= $css_arrow; ?>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/kimono#Men-Kimono">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', 'メンズ着物<var>プラン</var>')?></span>
                            <span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>2,980-</span>
                        </a><?= $css_arrow; ?>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/kimono/children">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '子供着物<var>プラン</var>')?></span>
                            <span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>2,980-</span>
                        </a><?= $css_arrow; ?>
                    </div>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category title-category-single flexbox align-items-center">
                        <a href="<?php echo home_url()?>/bring">
                            <span class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '持ち込み<var>プラン</var>')?></span>
                            <span <?= $css_hide; ?> class="price-sidebar-left"><var>¥</var>1,980-</span>
                        </a><?= $css_arrow; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<?php }
?>

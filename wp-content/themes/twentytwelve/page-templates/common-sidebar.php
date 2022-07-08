<?php
/**
 * Template Name: New Common Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Get page parent's slug
wp_register_style('new-common-sidebar-style', get_template_directory_uri() . '/css/new-common-sidebar.css', array('twentytwelve-style'));
wp_enqueue_style('new-common-sidebar-style');
//wp_enqueue_script('new-common-script', get_template_directory_uri() . '/js/new-common.js');
wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
?>
    <div class="wrap-left-common-sidebar">
        <div class="wrap-cm-user">
            <div class="cm-user">
                <div class="box-cm-user">
                    <div class="box-user-info">
                        <div class="box-info-item" data-view="information">
                            <h3 class="user-name-info"><?php echo Yii::t('new-common', '会員登録情報') ?></h3>
                            <ul class="list-info">
                                <li class="info-item">
                                    <a href="<?= WP_HOME; ?>/common#member-info"><?php echo Yii::t('new-common', '会員登録情報') ?></a>
                                </li>
                                <li class="info-item">
                                    <a href="<?= WP_HOME; ?>/common#change-address"><?php echo Yii::t('new-common', 'お届け先の変更・追加') ?></a>
                                </li>
                                <li class="info-item">
                                    <a href="<?= WP_HOME; ?>/common#cancel-news"><?php echo Yii::t('new-common', 'メールマガジンの配信設定') ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="box-info-item" data-view="wargo-point">
                            <h3 class="user-name-info"><?php echo Yii::t('new-common', 'wargoポイント') ?></h3>
                            <ul class="list-info">
                                <li class="info-item">
                                    <a href="<?= WP_HOME; ?>/common/manage-point"><?php echo Yii::t('new-common', 'wargoポイントの確認') ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="box-info-item history-booking" data-view="history">
                            <h3 class="user-name-info"><?php echo Yii::t('new-common', 'レンタル履歴') ?></h3>
                            <ul class="list-info">
                                <li class="info-item">
                                    <a href="<?= WP_HOME; ?>/common/history-booking#ordered" data-tab="ordered"><?php echo Yii::t('new-common', 'ご注文済み商品') ?></a>
                                </li>
                                <li class="info-item">
                                    <a href="<?= WP_HOME; ?>/common/history-booking#order" data-tab="order"> <?php echo Yii::t('new-common', 'ご注文前商品') ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="box-info-item" data-view="quit-confirm">
                            <h3 class="user-name-info"><?php echo Yii::t('new-common', '退会') ?></h3>
                            <ul class="list-info">
                                <li class="info-item">
                                    <a href="<?= WP_HOME; ?>/common/quit"><?php echo Yii::t('new-common', '退会手続き') ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--end box-cm-user-->
            </div><!--end cm-user-->
        </div>
        <?php if(!$isSmartPhone):?>
            <?php echo do_shortcode('[TopicsBannerSidebarLeft]'); ?>
        <?php endif?>
    </div>





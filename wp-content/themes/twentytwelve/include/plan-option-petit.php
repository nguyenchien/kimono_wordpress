<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$plantype = isset($plantype) ? $plantype : 0;
$femalePetit = array(MasterValues::PLAN_PETIT_GIRL_ID);
$malePetit = array(MasterValues::PLAN_PETIT_MEN_ID);
$couplePetit = array(MasterValues::PLAN_PETIT_COUPLE_ID);
$femalyOnlyPetit = array(MasterValues::PLAN_NEW_PETIT_LADIES_ASSOCIATION_KIMONO_ID);
$class = 'option-plan-'.Yii::app()->language;
?>
<?php if (in_array($plantype, $femalePetit)): ?>
    <!--render here-->
    <div class="wrap-options kimono-option <?php echo $class ?> femalePetit">
        <div class="option-for-female">
            <div class="titles clearfix">
                <p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット　女性'); ?></p>
                <p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
            </div>
            <div class="lists clearfix">
                <ul class="first clearfix">
                    <div class="list">
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option1-v2.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option2-v2.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option3-v2.png" alt="<?php echo Yii::t('wp_theme.option', 'バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'バッグ') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option4-v2.png" alt="<?php echo Yii::t('wp_theme.option', '草履') ?>" /><p><?php echo Yii::t('wp_theme.option', '草履') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option5-v2.png" alt="<?php echo Yii::t('wp_theme.option','肌襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','肌襦袢') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option6-v2.png" alt="<?php echo Yii::t('wp_theme.option', '長襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '長襦袢') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option7-v2.png" alt="<?php echo Yii::t('wp_theme.option', '足袋') ?>" /><p><?php echo Yii::t('wp_theme.option', '足袋') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option16-v2.png" alt="<?php echo Yii::t('wp_theme.option', '簪') ?>" /><p><?php echo Yii::t('wp_theme.option', '簪') ?></p></li>
                    </div>
                </ul>
            </div>
        </div>
        <div class="option-for-male">
            <div class="titles clearfix">
                <p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット　男性'); ?></p>
                <p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
            </div>
            <div class="lists men clearfix">
                <ul class="second clearfix" style="padding-bottom: 0;">
                    <div class="list">
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option8.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option9.png" alt="<?php echo Yii::t('wp_theme.option','袋帯') ?>" /><p><?php echo Yii::t('wp_theme.option','袋帯') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option14.png" alt="<?php echo Yii::t('wp_theme.option', '巾着') ?>" /><p><?php echo Yii::t('wp_theme.option', '巾着') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option13.png" alt="<?php echo Yii::t('wp_theme.option', '雪駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '雪駄') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option11.png" alt="<?php echo Yii::t('wp_theme.option', '半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '半襦袢') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option10.png" alt="<?php echo Yii::t('wp_theme.option', 'ステテコ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'ステテコ') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option12.png" alt="<?php echo Yii::t('wp_theme.option','足袋') ?>" /><p><?php echo Yii::t('wp_theme.option','足袋') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option17.png" alt="<?php echo Yii::t('wp_theme.option', '羽織') ?>" /><p><?php echo Yii::t('wp_theme.option', '羽織') ?></p></li>
                    </div>
                </ul>
            </div>
        </div>
    </div><!-- end wrap-options -->

    <?php elseif (in_array($plantype, $malePetit)): ?>
        <!--render here-->
        <div class="wrap-options kimono-option <?php echo $class ?> malePetit">
            <div class="titles clearfix">
                <p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
                <p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
            </div>
            <div class="lists clearfix">
                <ul class="second clearfix" style="padding-bottom: 0;">
                    <div class="text">
                        <li><span><?php echo Yii::t('wp_theme.option', '男性'); ?></span></li>
                    </div>
                    <div class="list">
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option8.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option9.png" alt="<?php echo Yii::t('wp_theme.option','袋帯') ?>" /><p><?php echo Yii::t('wp_theme.option','袋帯') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option10.png" alt="<?php echo Yii::t('wp_theme.option', 'ステテコ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'ステテコ') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option11.png" alt="<?php echo Yii::t('wp_theme.option', '半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '半襦袢') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option12.png" alt="<?php echo Yii::t('wp_theme.option','足袋') ?>" /><p><?php echo Yii::t('wp_theme.option','足袋') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option13.png" alt="<?php echo Yii::t('wp_theme.option', '雪駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '雪駄') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option14.png" alt="<?php echo Yii::t('wp_theme.option', '巾着') ?>" /><p><?php echo Yii::t('wp_theme.option', '巾着') ?></p></li>
                    </div>
                </ul>
            </div>
        </div><!-- end wrap-options -->

<?php elseif (in_array($plantype, $couplePetit)): ?>
    <!--render here-->
    <div class="wrap-options yukata-option <?php echo $class ?> couplePetit">
        <div class="titles clearfix">
            <p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
            <p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
        </div>
        <div class="lists clearfix">
            <ul class="first clearfix">
                <div class="text">
                    <li><span><?php echo Yii::t('wp_theme.option', '女性'); ?></span></li>
                </div>
                <div class="list">
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option1-v2.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option2-v2.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option3-v2.png" alt="<?php echo Yii::t('wp_theme.option', 'バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'バッグ') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option4-v2.png" alt="<?php echo Yii::t('wp_theme.option', '草履') ?>" /><p><?php echo Yii::t('wp_theme.option', '草履') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option5-v2.png" alt="<?php echo Yii::t('wp_theme.option','肌襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','肌襦袢') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option6-v2.png" alt="<?php echo Yii::t('wp_theme.option', '長襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '長襦袢') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option7-v2.png" alt="<?php echo Yii::t('wp_theme.option', '足袋') ?>" /><p><?php echo Yii::t('wp_theme.option', '足袋') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option16-v2.png" alt="<?php echo Yii::t('wp_theme.option', '簪') ?>" /><p><?php echo Yii::t('wp_theme.option', '簪') ?></p></li>
                </div>
            </ul>
            <ul class="second clearfix" style="padding-bottom: 0;">
                <div class="text">
                    <li><span><?php echo Yii::t('wp_theme.option', '男性'); ?></span></li>
                </div>
                <div class="list">
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option8.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option9.png" alt="<?php echo Yii::t('wp_theme.option','袋帯') ?>" /><p><?php echo Yii::t('wp_theme.option','袋帯') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option14.png" alt="<?php echo Yii::t('wp_theme.option', '巾着') ?>" /><p><?php echo Yii::t('wp_theme.option', '巾着') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option13.png" alt="<?php echo Yii::t('wp_theme.option', '雪駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '雪駄') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option11.png" alt="<?php echo Yii::t('wp_theme.option', '半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '半襦袢') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option10.png" alt="<?php echo Yii::t('wp_theme.option', 'ステテコ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'ステテコ') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option12.png" alt="<?php echo Yii::t('wp_theme.option','足袋') ?>" /><p><?php echo Yii::t('wp_theme.option','足袋') ?></p></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option17.png" alt="<?php echo Yii::t('wp_theme.option', '羽織') ?>" /><p><?php echo Yii::t('wp_theme.option', '羽織') ?></p></li>
                </div>
            </ul>

        </div>
    </div><!-- end wrap-options -->
<?php elseif (in_array($plantype, $femalyOnlyPetit)) : ?>
    <!--render here-->
    <div class="wrap-options kimono-option <?php echo $class ?> femalePetit">
        <div class="option-for-female">
            <div class="titles clearfix">
                <p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット　女性'); ?></p>
                <p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
            </div>
            <div class="lists clearfix">
                <ul class="first clearfix">
                    <div class="list">
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option1-v2.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option2-v2.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option3-v2.png" alt="<?php echo Yii::t('wp_theme.option', 'バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'バッグ') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option4-v2.png" alt="<?php echo Yii::t('wp_theme.option', '草履') ?>" /><p><?php echo Yii::t('wp_theme.option', '草履') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option5-v2.png" alt="<?php echo Yii::t('wp_theme.option','肌襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','肌襦袢') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option6-v2.png" alt="<?php echo Yii::t('wp_theme.option', '長襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '長襦袢') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option7-v2.png" alt="<?php echo Yii::t('wp_theme.option', '足袋') ?>" /><p><?php echo Yii::t('wp_theme.option', '足袋') ?></p></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/option-kimono-petit/option16-v2.png" alt="<?php echo Yii::t('wp_theme.option', '簪') ?>" /><p><?php echo Yii::t('wp_theme.option', '簪') ?></p></li>
                    </div>
                </ul>
            </div>
        </div>
    </div><!-- end wrap-options -->
<?php endif; ?>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$plantype = isset($plantype) ? $plantype : 0;
$femaleKimono = array(1, 2, 3, 26, 35, 36, 39);
$maleKimono = array(4);
$coupleKimono = array(6, 7, 8, 37, 40);
$childrenKimono = array(82, 83);
$femaleYukata = array(12, 13, 14, 15, 16, 79);
$maleYukata = array(18, 5);
$coupleYukata = array(20, 21, 22, 23);
$childrenYukata = array(17, 19);
$class = 'option-plan-'.Yii::app()->language;
?>
<?php if (in_array($plantype, $femaleKimono)): ?>
	<!--render here-->
	<div class="wrap-options kimono-option <?php echo $class ?> femaleKimono">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
		<ul class="first women">
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-1.png" alt="<?php echo Yii::t('wp_theme.option','着物'); ?>" /><p><?php echo Yii::t('wp_theme.option','着物'); ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-10.png" alt="<?php echo Yii::t('wp_theme.option', 'バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'バッグ') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-11.png" alt="<?php echo Yii::t('wp_theme.option', '草履') ?>" /><p><?php echo Yii::t('wp_theme.option', '草履') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-2.png" alt="<?php echo Yii::t('wp_theme.option', '肌襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '肌襦袢') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-3.png" alt="<?php echo Yii::t('wp_theme.option', '長襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '長襦袢') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-12.png" alt="<?php echo Yii::t('wp_theme.option', '足袋') ?>" /><p><?php echo Yii::t('wp_theme.option', '足袋') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-9.png" alt="<?php echo Yii::t('wp_theme.option', '簪') ?>" /><p><?php echo Yii::t('wp_theme.option', '簪') ?></p></li>
		</ul>
		</div>
	</div><!-- end wrap-options -->
	<!--end option 3 plan option list-->

<?php elseif (in_array($plantype, $maleKimono)): ?>
	<!--render here-->
	<div class="wrap-options kimono-option <?php echo $class ?> maleKimono">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
			<ul class="first women">
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-19.png" alt="<?php echo Yii::t('wp_theme.option','着物'); ?>" /><p><?php echo Yii::t('wp_theme.option','着物'); ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-13.png" alt="<?php echo Yii::t('wp_theme.option','巾着') ?>" /><p><?php echo Yii::t('wp_theme.option','巾着') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-14.png" alt="<?php echo Yii::t('wp_theme.option', '雪駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '雪駄') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-15.png" alt="<?php echo Yii::t('wp_theme.option','半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','半襦袢') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-16.png" alt="<?php echo Yii::t('wp_theme.option','ステテコ') ?>" /><p><?php echo Yii::t('wp_theme.option','ステテコ') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-12.png" alt="<?php echo Yii::t('wp_theme.option', '足袋') ?>" /><p><?php echo Yii::t('wp_theme.option', '足袋') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-17.png" alt="<?php echo Yii::t('wp_theme.option','羽織(冬季)') ?>" /><p><?php echo Yii::t('wp_theme.option','羽織(冬季)') ?></p></li>
			</ul>
		</div>
	</div><!-- end wrap-options -->

<?php elseif (in_array($plantype, $coupleKimono)): ?>
	<!--render here-->
	<div class="wrap-options kimono-option <?php echo $class ?> coupleKimono">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
			<ul class="first clearfix">
				<div class="text">
					<li><span><?php echo Yii::t('wp_theme.option','女性'); ?></span></li>
				</div>
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-1.png" alt="<?php echo Yii::t('wp_theme.option','着物'); ?>" /><p><?php echo Yii::t('wp_theme.option','着物'); ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-10.png" alt="<?php echo Yii::t('wp_theme.option', 'バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'バッグ') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-11.png" alt="<?php echo Yii::t('wp_theme.option', '草履') ?>" /><p><?php echo Yii::t('wp_theme.option', '草履') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-2.png" alt="<?php echo Yii::t('wp_theme.option', '肌襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '肌襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-3.png" alt="<?php echo Yii::t('wp_theme.option', '長襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '長襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-12.png" alt="<?php echo Yii::t('wp_theme.option', '足袋') ?>" /><p><?php echo Yii::t('wp_theme.option', '足袋') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-9.png" alt="<?php echo Yii::t('wp_theme.option', '簪') ?>" /><p><?php echo Yii::t('wp_theme.option', '簪') ?></p></li>
				</div>
			</ul>
			<ul class="second clearfix">
				<div class="text">
					<li><span><?php echo Yii::t('wp_theme.option','男性'); ?></span></li>
				</div>
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-19.png" alt="<?php echo Yii::t('wp_theme.option','着物'); ?>" /><p><?php echo Yii::t('wp_theme.option','着物'); ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-13.png" alt="<?php echo Yii::t('wp_theme.option','巾着') ?>" /><p><?php echo Yii::t('wp_theme.option','巾着') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-14.png" alt="<?php echo Yii::t('wp_theme.option', '草履') ?>" /><p><?php echo Yii::t('wp_theme.option', '草履') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-15.png" alt="<?php echo Yii::t('wp_theme.option','半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','半襦袢') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-16.png" alt="<?php echo Yii::t('wp_theme.option','下履き') ?>" /><p><?php echo Yii::t('wp_theme.option','下履き') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-12.png" alt="<?php echo Yii::t('wp_theme.option', '足袋') ?>" /><p><?php echo Yii::t('wp_theme.option', '足袋') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-17.png" alt="<?php echo Yii::t('wp_theme.option','羽織(冬季)') ?>" /><p><?php echo Yii::t('wp_theme.option','羽織(冬季)') ?></p></li>
				</div>
			</ul>
		</div>
	</div><!-- end wrap-options -->

<?php elseif (in_array($plantype, $childrenKimono)): ?>
	<!--render here-->
	<div class="wrap-options kimono-option <?php echo $class ?> childrenKimono">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
			<ul class="first women">
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-1.png" alt="<?php echo Yii::t('wp_theme.option','着物'); ?>" /><p><?php echo Yii::t('wp_theme.option','着物'); ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-10.png" alt="<?php echo Yii::t('wp_theme.option', 'バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'バッグ') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-11.png" alt="<?php echo Yii::t('wp_theme.option', '草履') ?>" /><p><?php echo Yii::t('wp_theme.option', '草履') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-2.png" alt="<?php echo Yii::t('wp_theme.option', '肌襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '肌襦袢') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-3.png" alt="<?php echo Yii::t('wp_theme.option', '長襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option', '長襦袢') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-12.png" alt="<?php echo Yii::t('wp_theme.option', '足袋') ?>" /><p><?php echo Yii::t('wp_theme.option', '足袋') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-kimono-couple-9.png" alt="<?php echo Yii::t('wp_theme.option', '簪') ?>" /><p><?php echo Yii::t('wp_theme.option', '簪') ?></p></li>
			</ul>
		</div>
	</div><!-- end wrap-options -->

<?php elseif (in_array($plantype, $femaleYukata)): ?>
<!--	render here
	chu y 16-->
	<div class="wrap-options yukata-option <?php echo $class ?> femaleYukata">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
		<?php if($plantype == MasterValues::PLAN_STANDARD_YUKATA): ?>
			<ul class="first women standard">
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-1.png" alt="<?php echo Yii::t('wp_theme.option','浴衣') ?>" /><p><?php echo Yii::t('wp_theme.option','浴衣') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-10_2.png" alt="<?php echo Yii::t('wp_theme.option', '巾着') ?>" /><p><?php echo Yii::t('wp_theme.option', '巾着') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-11.png" alt="<?php echo Yii::t('wp_theme.option', '下駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '下駄') ?></p></li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-9.png" alt="<?php echo Yii::t('wp_theme.option', '簪') ?>" /><p><?php echo Yii::t('wp_theme.option', '簪') ?></p></li>
                <li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-2.png" alt="<?php echo Yii::t('wp_theme.option', '浴衣用肌着') ?>" /><p><?php echo $plantype == 16? Yii::t('wp_theme.option', '着物用肌着'): Yii::t('wp_theme.option', '浴衣用肌着'); ?></p></li>
			</ul>
		<?php else: ?>
			<ul class="first women">
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-1.png" alt="<?php echo Yii::t('wp_theme.option','浴衣') ?>" /><p><?php echo Yii::t('wp_theme.option','浴衣') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-10.png" alt="<?php echo Yii::t('wp_theme.option', 'バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'バッグ') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-11.png" alt="<?php echo Yii::t('wp_theme.option', '下駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '下駄') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-9.png" alt="<?php echo Yii::t('wp_theme.option', '簪') ?>" /><p><?php echo Yii::t('wp_theme.option', '簪') ?></p></li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-2.png" alt="<?php echo Yii::t('wp_theme.option', '浴衣用肌着') ?>" /><p><?php echo $plantype == 16? Yii::t('wp_theme.option', '着物用肌着'): Yii::t('wp_theme.option', '浴衣用肌着'); ?></p></li>
			</ul>
		<?php endif; ?>
		</div>
	</div><!-- end wrap-options -->
<?php elseif (in_array($plantype, $maleYukata)): ?>
<!--	render here
	chu y 5-->
	<div class="wrap-options yukata-option <?php echo $class ?> maleYukata">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
		<ul class="second men">
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-19.png" alt="<?php echo Yii::t('wp_theme.option','浴衣') ?>" /><p><?php echo $plantype == 5 ? Yii::t('wp_theme.option','作務衣') : Yii::t('wp_theme.option','浴衣')?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-13.png" alt="<?php echo Yii::t('wp_theme.option','巾着') ?>" /><p><?php echo Yii::t('wp_theme.option','巾着') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-14.png" alt="<?php echo Yii::t('wp_theme.option', '下駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '下駄') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-15.png" alt="<?php echo Yii::t('wp_theme.option','半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','半襦袢') ?></p></li>
			<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-16.png" alt="<?php echo Yii::t('wp_theme.option','下履き') ?>" /><p><?php echo Yii::t('wp_theme.option','下履き') ?></p></li>
		</ul>
		</div>
	</div><!-- end option man yukata wrap-options -->
<?php elseif (in_array($plantype, $coupleYukata)): ?>
	<!--render here-->
	<div class="wrap-options yukata-option <?php echo $class ?> coupleYukata">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
			<ul class="first clearfix">
				<div class="text">
					<li><span><?php echo Yii::t('wp_theme.option', '女性') ?></span></li>
				</div>
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-1.png" alt="<?php echo Yii::t('wp_theme.option','浴衣') ?>" /><p><?php echo Yii::t('wp_theme.option','浴衣') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-10.png" alt="<?php echo Yii::t('wp_theme.option', 'バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option', 'バッグ') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-11.png" alt="<?php echo Yii::t('wp_theme.option', '下駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '下駄') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-9.png" alt="<?php echo Yii::t('wp_theme.option', '簪') ?>" /><p><?php echo Yii::t('wp_theme.option', '簪') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-2.png" alt="<?php echo Yii::t('wp_theme.option', '浴衣用肌着') ?>" /><p><?php echo Yii::t('wp_theme.option', '浴衣用肌着') ?></p></li>
				</div>
			</ul>
			<ul class="second clearfix">
				<div class="text">
					<li><span><?php echo Yii::t('wp_theme.option','男性'); ?></span></li>
				</div>
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-19.png" alt="<?php echo Yii::t('wp_theme.option','浴衣') ?>" /><p><?php echo $plantype == 5 ? Yii::t('wp_theme.option','作務衣') : Yii::t('wp_theme.option','浴衣')?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-13.png" alt="<?php echo Yii::t('wp_theme.option','巾着') ?>" /><p><?php echo Yii::t('wp_theme.option','巾着') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-14.png" alt="<?php echo Yii::t('wp_theme.option', '下駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '下駄') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-15.png" alt="<?php echo Yii::t('wp_theme.option','半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','半襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-16.png" alt="<?php echo Yii::t('wp_theme.option','下履き') ?>" /><p><?php echo Yii::t('wp_theme.option','下履き') ?></p></li>
				</div>
			</ul>
		</div>
	</div><!-- end wrap-options -->
<?php elseif (in_array($plantype, $childrenYukata)): ?>
	<!--render here-->
	<div class="wrap-options yukata-option <?php echo $class ?> childrenYukata">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
			<ul class="first clearfix">
				<div class="text">
					<li><span><?php echo Yii::t('wp_theme.option', '女の子'); ?></span></li>
				</div>
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-1.png" alt="<?php echo Yii::t('wp_theme.option','浴衣') ?>" /><p><?php echo Yii::t('wp_theme.option','浴衣') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-10_2.png" alt="<?php echo Yii::t('wp_theme.option', '巾着') ?>" /><p><?php echo Yii::t('wp_theme.option', '巾着') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-11.png" alt="<?php echo Yii::t('wp_theme.option', '下駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '下駄') ?></p></li>

				</div>
			</ul>
			<ul class="second clearfix" style="padding-bottom: 0;">
				<div class="text">
					<li><span><?php echo Yii::t('wp_theme.option', '男の子'); ?></span></li>
				</div>
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-19.png" alt="<?php echo Yii::t('wp_theme.option','浴衣') ?>" /><p><?php echo Yii::t('wp_theme.option','浴衣') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-7.png" alt="<?php echo Yii::t('wp_theme.option','帯') ?>" /><p><?php echo Yii::t('wp_theme.option','帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-10_2.png" alt="<?php echo Yii::t('wp_theme.option','巾着') ?>" /><p><?php echo Yii::t('wp_theme.option','巾着') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_couple/icon-yukata-couple-14.png" alt="<?php echo Yii::t('wp_theme.option', '下駄') ?>" /><p><?php echo Yii::t('wp_theme.option', '下駄') ?></p></li>
				</div>
			</ul>

		</div>
	</div><!-- end wrap-options -->

	<?php elseif ($plantype == MasterValues::PLAN_VIP_LADIES_ID): ?>
	<!--render here-->
	<div class="wrap-options vip-option <?php echo $class ?> vip-ladies">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
			<ul class="first clearfix">
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-01.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-02.png" alt="<?php echo Yii::t('wp_theme.option','袋帯') ?>" /><p><?php echo Yii::t('wp_theme.option','袋帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-03.png" alt="<?php echo Yii::t('wp_theme.option','肌襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','肌襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-04.png" alt="<?php echo Yii::t('wp_theme.option','長襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','長襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-05.png" alt="<?php echo Yii::t('wp_theme.option','足袋') ?>" /><p><?php echo Yii::t('wp_theme.option','足袋') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-06.png" alt="<?php echo Yii::t('wp_theme.option','草履') ?>" /><p><?php echo Yii::t('wp_theme.option','草履') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-07.png" alt="<?php echo Yii::t('wp_theme.option','バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option','バッグ') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-08.png" alt="<?php echo Yii::t('wp_theme.option','簪') ?>" /><p><?php echo Yii::t('wp_theme.option','簪') ?></p></li>
				</div>
			</ul>
		</div>
	</div><!-- end wrap-options -->

	<?php elseif ($plantype == MasterValues::PLAN_VIP_MEN_ID): ?>
	<!--render here-->
	<div class="wrap-options vip-option <?php echo $class ?> vip-men">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
			<ul class="first clearfix">
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-09.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-02.png" alt="<?php echo Yii::t('wp_theme.option','袋帯') ?>" /><p><?php echo Yii::t('wp_theme.option','袋帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-10.png" alt="<?php echo Yii::t('wp_theme.option','下ばき') ?>" /><p><?php echo Yii::t('wp_theme.option','下ばき') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-11.png" alt="<?php echo Yii::t('wp_theme.option','半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','半襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-05.png" alt="<?php echo Yii::t('wp_theme.option','足袋') ?>" /><p><?php echo Yii::t('wp_theme.option','足袋') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-12.png" alt="<?php echo Yii::t('wp_theme.option','草履') ?>" /><p><?php echo Yii::t('wp_theme.option','草履') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-13.png" alt="<?php echo Yii::t('wp_theme.option','巾着') ?>" /><p><?php echo Yii::t('wp_theme.option','巾着') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-14.png" alt="<?php echo Yii::t('wp_theme.option','羽織<span>(冬季)</span>') ?>" /><p><?php echo Yii::t('wp_theme.option','羽織<span>(冬季)</span>') ?></p></li>
				</div>
			</ul>
		</div>
	</div><!-- end wrap-options -->

	<?php elseif ($plantype == MasterValues::PLAN_VIP_COUPLE_ID): ?>
	<!--render here-->
	<div class="wrap-options vip-option <?php echo $class ?> vip-couple">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists one clearfix">
			<span class="note-vip"><?php echo Yii::t('wp_theme.option','女性'); ?></span>
			<ul class="first clearfix">
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-01.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-02.png" alt="<?php echo Yii::t('wp_theme.option','袋帯') ?>" /><p><?php echo Yii::t('wp_theme.option','袋帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-03.png" alt="<?php echo Yii::t('wp_theme.option','肌襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','肌襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-04.png" alt="<?php echo Yii::t('wp_theme.option','長襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','長襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-05.png" alt="<?php echo Yii::t('wp_theme.option','足袋') ?>" /><p><?php echo Yii::t('wp_theme.option','足袋') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-06.png" alt="<?php echo Yii::t('wp_theme.option','草履') ?>" /><p><?php echo Yii::t('wp_theme.option','草履') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-07.png" alt="<?php echo Yii::t('wp_theme.option','バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option','バッグ') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-08.png" alt="<?php echo Yii::t('wp_theme.option','簪') ?>" /><p><?php echo Yii::t('wp_theme.option','簪') ?></p></li>
				</div>
			</ul>
		</div>
		<div class="lists two clearfix">
			<span class="note-vip"><?php echo Yii::t('wp_theme.option','男性'); ?></span>
			<ul class="second clearfix">
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-09.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-02.png" alt="<?php echo Yii::t('wp_theme.option','袋帯') ?>" /><p><?php echo Yii::t('wp_theme.option','袋帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-10.png" alt="<?php echo Yii::t('wp_theme.option','下ばき') ?>" /><p><?php echo Yii::t('wp_theme.option','下ばき') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-11.png" alt="<?php echo Yii::t('wp_theme.option','半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','半襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-05.png" alt="<?php echo Yii::t('wp_theme.option','足袋') ?>" /><p><?php echo Yii::t('wp_theme.option','足袋') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-12.png" alt="<?php echo Yii::t('wp_theme.option','草履') ?>" /><p><?php echo Yii::t('wp_theme.option','草履') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-13.png" alt="<?php echo Yii::t('wp_theme.option','巾着') ?>" /><p><?php echo Yii::t('wp_theme.option','巾着') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-14.png" alt="<?php echo Yii::t('wp_theme.option','羽織<span>(冬季)</span>') ?>" /><p><?php echo Yii::t('wp_theme.option','羽織<span>(冬季)</span>') ?></p></li>
				</div>
			</ul>
		</div>
	</div><!-- end wrap-options -->

	<?php elseif ($plantype == MasterValues::PLAN_VIP_BOY_ID || $plantype == MasterValues::PLAN_VIP_GIRL_ID): ?>
	<!--render here-->
	<div class="wrap-options vip-option <?php echo $class ?> vip-children">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?> <?php echo Yii::t('wp_theme_option','男の子') ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
			<ul class="first clearfix">
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-09.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-02.png" alt="<?php echo Yii::t('wp_theme.option','袋帯') ?>" /><p><?php echo Yii::t('wp_theme.option','袋帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-10.png" alt="<?php echo Yii::t('wp_theme.option','下ばき') ?>" /><p><?php echo Yii::t('wp_theme.option','下ばき') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-11.png" alt="<?php echo Yii::t('wp_theme.option','半襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','半襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-05.png" alt="<?php echo Yii::t('wp_theme.option','足袋') ?>" /><p><?php echo Yii::t('wp_theme.option','足袋') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-12.png" alt="<?php echo Yii::t('wp_theme.option','草履') ?>" /><p><?php echo Yii::t('wp_theme.option','草履') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-13.png" alt="<?php echo Yii::t('wp_theme.option','巾着') ?>" /><p><?php echo Yii::t('wp_theme.option','巾着') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-14.png" alt="<?php echo Yii::t('wp_theme.option','羽織<span>(冬季)</span>') ?>" /><p><?php echo Yii::t('wp_theme.option','羽織<span>(冬季)</span>') ?></p></li>
				</div>
			</ul>
		</div>
	</div><!-- end wrap-options -->
	<!--render here-->
	<div class="wrap-options vip-option <?php echo $class ?> vip-children">
		<div class="titles clearfix">
			<p class="bold"><?php echo Yii::t('wp_theme.option','すべてセット'); ?> <?php echo Yii::t('wp_theme_option','女の子') ?></p>
			<p class="brief"><?php echo Yii::t('wp_theme.option','追加料金一切不要。着付け代・小物代を含みます。') ?></p>
		</div>
		<div class="lists clearfix">
			<ul class="first clearfix">
				<div class="list">
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-01.png" alt="<?php echo Yii::t('wp_theme.option','着物') ?>" /><p><?php echo Yii::t('wp_theme.option','着物') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-02.png" alt="<?php echo Yii::t('wp_theme.option','袋帯') ?>" /><p><?php echo Yii::t('wp_theme.option','袋帯') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-03.png" alt="<?php echo Yii::t('wp_theme.option','肌襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','肌襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-04.png" alt="<?php echo Yii::t('wp_theme.option','長襦袢') ?>" /><p><?php echo Yii::t('wp_theme.option','長襦袢') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-05.png" alt="<?php echo Yii::t('wp_theme.option','足袋') ?>" /><p><?php echo Yii::t('wp_theme.option','足袋') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-06.png" alt="<?php echo Yii::t('wp_theme.option','草履') ?>" /><p><?php echo Yii::t('wp_theme.option','草履') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-07.png" alt="<?php echo Yii::t('wp_theme.option','バッグ') ?>" /><p><?php echo Yii::t('wp_theme.option','バッグ') ?></p></li>
					<li><img src="<?php echo get_template_directory_uri(); ?>/images/icon_kimono_vip/icon-vip-08.png" alt="<?php echo Yii::t('wp_theme.option','簪') ?>" /><p><?php echo Yii::t('wp_theme.option','簪') ?></p></li>
				</div>
			</ul>
		</div>
	</div><!-- end wrap-options -->

<?php endif; ?>
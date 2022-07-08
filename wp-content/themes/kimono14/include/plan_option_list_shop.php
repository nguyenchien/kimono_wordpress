<?php
$plantype = isset($plantype) ? $plantype : 0;
$planShopList = MasterValues::planShopList();
$planStopTemplate1 = MasterValues::$PLAN_STOP_TEMPLATE_1;
?>
<?php if(count($planShopList[$plantype]) > 5): ?>
<div class="wrap-options wrap-options-blue kimono-option kimono-option-blue <?php echo $plantype ?>">
	<div class="titles titles-blue clearfix">
		<p class="bold"><?php echo Yii::t('wp_theme.option','対応店舗'); ?></p>
	</div>
	<div class="lists list-blue clearfix">
		<?php
			foreach ($planStopTemplate1 as $region=>$shop_list) {
				if (MasterValues::REGION_KYOTO_SHOP == $region) {
					echo "<ul class='fitst-icon clearfix'>";
				}
				else if (MasterValues::REGION_OSAKA_SHOP == $region) {
					echo "<ul class='fitst-icon second-icon'>";
				}
				foreach ($shop_list as $index=>$shop_id) {
					$is_disabled = in_array($shop_id, $planShopList[$plantype]) ? "" : "disable";
					echo "<li>
							<div class='group-icon $is_disabled'>
								<div class='icon-fa icon-fa-shop-0$shop_id'></div>
								<div class='text-shop'>
									".Yii::t('wp_theme', "shop_name_for_plan_$shop_id")."
								</div>
							</div>
						</li>";
				}
				echo "</ul>";
			}
		?>
	</div>
</div><!-- end wrap-options -->
<?php elseif (count($planShopList[$plantype]) == 1): ?>
<!--option 2 plan option list-->
<div class="wrap-options wrap-options-blue kimono-option kimono-option-blue <?php echo $plantype ?>">
	<div class="titles titles-blue clearfix">
		<p class="bold"><?php echo Yii::t('wp_theme.option','対応店舗'); ?></p>
	</div>
	<div class="lists list-blue list-blue-opt-2">
		<?php foreach ($planShopList[$plantype] as $index => $shop_id){ ?>
		<span class="icon-fa icon-fa-shop-0<?php echo $shop_id; ?>"></span>
		<span class="text-shop-opt-2"><?php echo Yii::t('wp_theme', "shop_name_for_plan_$shop_id"); ?></span>
		<?php } ?>

	</div>
</div><!-- end wrap-options -->
<!--end option 2 plan option list-->
<?php elseif( count($planShopList[$plantype]) > 1 && count($planShopList[$plantype]) <= 5 ): ?>
<!--option 3 plan option list-->
<div class="wrap-options wrap-options-blue kimono-option kimono-option-blue <?php echo $plantype ?>">
	<div class="titles titles-blue clearfix">
		<p class="bold"><?php echo Yii::t('wp_theme.option','対応店舗'); ?></p>
	</div>
	<div class="lists list-blue">
		<ul class="fitst-icon no-border">
			<?php foreach ($planShopList[$plantype] as $index => $shop_id){?>
			<li>
				<div class="group-icon">
					<div class="icon-fa icon-fa-shop-0<?php echo $shop_id; ?>"></div>
					<div class="text-shop">
						<?php echo Yii::t('wp_theme', "shop_name_for_plan_$shop_id"); ?>
					</div>
				</div>
			</li>
		<?php } ?>
		</ul>
	</div>
</div><!-- end wrap-options -->
<?php endif; ?>

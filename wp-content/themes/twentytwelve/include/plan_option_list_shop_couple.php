<?php
$plantype = isset($plantype) ? $plantype : 0;
$planShopList = MasterValues::planShopList();
$planStopTemplate1 = MasterValues::$PLAN_STOP_TEMPLATE_1;
$planShopNumber = count($planShopList[$plantype]);

if(Yii::app()->language == 'ja'){
	$class_left_title_shop_opt_2 = 'left-title-shop-opt-2';
}else{
	$class_left_title_shop_opt_2= '';
}
?>
<?php if($planShopNumber == 1) { ?>
<!--option 2 kimono option list-->
	<?php
		$shop_id = isset($planShopList[$plantype][0]) ? $planShopList[$plantype][0] : 0;
	?>
		<div class="wrap-list-shop">
			<div class="left-title-shop <?php echo $class_left_title_shop_opt_2; ?>">
			<span class="name">
				<?php echo Yii::t(wp_theme, '対応店舗'); ?>
			</span>
			</div>
			<div class="lists lists-opt-2">
				<div class="group-icon">
					<div class="icon-fa icon-fa-shop-0<?php echo $shop_id ?>"></div>
					<div class="text-shop">
						<?php echo Yii::t('wp_theme', "shop_name_for_plan_$shop_id"); ?>
					</div>
				</div>
			</div>
		</div>
<!--end option 2 kimono option list-->
<?php } elseif (1 < $planShopNumber && $planShopNumber <= 5) { ?>
<!--option 3 kimono option list-->
		<div class="wrap-list-shop">
			<div class="left-title-shop <?php echo $class_left_title_shop_opt_2; ?>">
			<span class="name">
				<?php echo Yii::t(wp_theme, '対応店舗'); ?>
			</span>
			</div>
			<div class="lists lists-opt-2 lists-opt-3">
				<ul class="fitst-icon no-border">
					<?php
					foreach ($planShopList[$plantype] as $region=>$shop_id) {
						echo "<li>
								<div class='group-icon'>
									<div class='icon-fa icon-fa-shop-0$shop_id'></div>
									<div class='text-shop'>
										".Yii::t('wp_theme', "shop_name_for_plan_$shop_id")."
									</div>
								</div>
							</li>";
					}
					?>
				</ul>
			</div>
		</div>
<!--end option 3 kimono option list-->
<?php } elseif ($planShopNumber > 5) { ?>
					<div class="wrap-list-shop <?php echo $plantype; ?>">
						<div class="left-title-shop">
							<span class="name">
								<?php echo Yii::t('plan_type', '対応店舗');?>
							</span>
						</div>
						<div class="lists">
							<?php
							foreach ($planStopTemplate1 as $region=>$shop_list) {
								if (MasterValues::REGION_KYOTO_SHOP == $region) {
									echo "<ul class='fitst-icon'>";
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
					</div>
	<?php } ?>

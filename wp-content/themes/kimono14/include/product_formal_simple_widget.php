<?php
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$limit = $isSmartPhone ? 3 : 5;

if($attrShortCode['is_popup']){
	$limit = 15;
}else{
	if(!empty($attrShortCode['plan_group'])){
		$limit = $isSmartPhone ? 6 : 10;
	}
}
?>

<div class='widget-top-product-formal-cate widget-product-formal-simple-<?= $attrShortCode["id"];?>'>
	<div class="wrap-list-product">
		<?php echo do_shortcode('[filter_formal_product limit="'.$limit.'" id="'.$attrShortCode['id'].'" plan_group="'.$attrShortCode['plan_group'].'"]'); ?>
	</div>
	<?php if(!$attrShortCode['is_popup']) { ?>
	<p class="link-to-cate">
		<a href="<?= WP_HOME ?>/formal/<?= $attrShortCode['link'];?>"><?= Yii::t('new_formal', 'top_product_formal_cate_'.$attrShortCode['id']); ?></a>
	</p>
	<?php } ?>
</div>

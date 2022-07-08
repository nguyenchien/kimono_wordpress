<div class="wrap-new-arrival wrap-new-arrival-column wrap-sb-adv">
	<?php if(intval($attrShortCode['adv_sidebar']) == 1){ ?>
	<h2 class="title-general title-general-adv text-center">
		<span class="text-title-general"><?php echo Yii::t('wp_theme','Advertisement');?></span>
		<span class="sub-text-title"><?php echo Yii::t('wp_theme','広告');?></span>
	</h2>
	<?php } else {?>
	<h2 class="title-adv-normal"><?php echo Yii::t('wp_theme','[スポンサー広告]');?></h2>
	<?php } ?>
	<div class="wrap-adv-img">
        <div class="row">
            <?php foreach ($bannerList as $data) {
                $href = esc_url(home_url('/').$data['page_advertisement'].'?utm_id='.$data['utm_id'].'&page='.$data['page_param']);
                ?>
                <a class="linkto-adv" href='<?php echo $href?>' target='_blank'>
                    <img data-src="<?php echo $data['src_img']?>">
                </a>
            <?php } ?>
        </div>
	</div>
</div>




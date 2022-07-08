<?php
    $plan_type_id = $attrShortcode['plan_type_id'];
?>
<div class="wrap-slider-gallery-pl kimono-plan-gallery-slider flexslider">
    <?php if($plan_type_id != ""): ?>
        <ul class="list-slide-gallery-pl slides">
            <?php for($i=1; $i<=4 ; $i++): ?>
                <li class="item-gallery-pl">
                    <div class="pic-info-slide">
                        <img data-src="<?= WP_HOME; ?>/images/gallery_kimono/gallery_<?= $plan_type_id; ?>_<?= $i; ?>.jpg?ver=20201207" alt="" />
                    </div>
                </li>
            <?php endfor; ?>
        </ul>
    <?php else: ?>
        <p><?= Yii::t('wp_theme','申し訳ありません、現在準備中です');?></p>
    <?php endif; ?>
</div>
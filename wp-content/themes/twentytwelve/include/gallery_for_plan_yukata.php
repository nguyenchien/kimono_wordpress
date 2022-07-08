<?php
    $plan_type_id = $attrShortcode['plan_type_id'];
    $plan_type_name = $attrShortcode['plan_type_name'];
    $plan_lazy = $attrShortcode['plan_lazy'];
    if(!$plan_lazy){
        $plan_lazy='src';
    }
?>
<style>
    #Couple-High-end-Yukata .list-gallery-for-yukata-plan,
    #Couple-Mamechiyo-Yukata .list-gallery-for-yukata-plan{
        display: none;
    }
</style>
<div class="wrap-slider-gallery-yukata kimono-plan-gallery-slider flexslider">
    <?php if($plan_type_id != "" && !in_array($plan_type_id, array(22,23))): ?>
        <ul class="list-slide-gallery-pl slides">
            <?php for($i=1; $i<=4 ; $i++): ?>
                <li class="item-gallery-pl">
                    <div class="pic-info-slide">
                        <a href="<?= WP_HOME; ?>/images/gallery_kimono/gallery_<?= $plan_type_id; ?>_<?= $i; ?>.jpg?ver=20222605" rel="lightbox[<?= $plan_type_name ?>]">
                            <img data-src="<?= WP_HOME; ?>/images/gallery_kimono/gallery_<?= $plan_type_id; ?>_<?= $i; ?>.jpg?ver=20222605" alt="<?= $plan_type_name.$i; ?>枚⽬" />
                        </a>
                    </div>
                </li>
            <?php endfor; ?>
        </ul>
    <?php else: ?>
        <p><?= Yii::t('wp_theme','申し訳ありません、現在準備中です');?></p>
    <?php endif; ?>
</div>

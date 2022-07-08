<?php
    $isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
    if($isSmartPhone){
        $limit = 3;
    }else{
        $limit = 5;
    }
?>
<div class="widget-top-product-formal-cate widget-top-product-formal-cate-<?= $attrShortCode['id'];?>">
    <div class="cate-banner">
        <a href="<?= WP_HOME ?>/formal/<?= $attrShortCode['link'];?>" title="<?= $attrShortCode['title'];?>">
            <img src="<?= WP_HOME ?>/images/formal-rental/banner-formal-cate-<?= $attrShortCode['id'];?>.jpg" alt="<?= $attrShortCode['title'];?>" />
        </a>
    </div>
    <div class="wrap-list-product">
        <?php echo do_shortcode('[filter_formal_product limit="'.$limit.'" id="'.$attrShortCode['id'].'" plan_group="'.$attrShortCode['plan_group'].'"]'); ?>
    </div>
    <p class="link-to-cate">
        <a href="<?= WP_HOME ?>/formal/<?= $attrShortCode['link'];?>"><?= Yii::t('new_formal', 'top_product_formal_cate_'.$attrShortCode['id']); ?></a>
    </p>
</div>

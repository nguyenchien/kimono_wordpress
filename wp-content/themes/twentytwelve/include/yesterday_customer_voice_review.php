<div class="wrap-content-ctmvoice-review">
    <?php if( $query->have_posts() ) :?>
        <?php

        while( $query->have_posts() ) :
            $query->the_post();
            $shopName = 'shop_name_'.get_field('shop_id');
            $shopSlugs = MasterValues::$NEW_MV_SHOP_SLUG;
            $shopLink = array_key_exists(get_field('shop_id'), $shopSlugs) ? $shopSlugs[get_field('shop_id')] : "#";
            ?>
            <dl>
                <dt><a href="<?=$shopLink?>"><?= Yii::t('wp_theme',$shopName)?>　<?php echo get_the_date('Y年m月d日'); ?></a></dt>
                <dd><?php the_content(); ?></dd>
            </dl>
        <?php endwhile;?>
        <?php wp_reset_postdata(); ?>
    <?php endif;?>
</div>
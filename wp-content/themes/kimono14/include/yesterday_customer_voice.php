<ul>
    <?php
    if( $query->have_posts() ) :
        while( $query->have_posts() ) :
            $query->the_post();
            $shopId = get_field("shop_id");
            $shopName = 'shop_name_'.$shopId;
            ?>
            <li class="clearfix">
                <div class="sub-title">
                    <?php if($shopId<=9): ?>
                        <p class="shop-icon"><span class="fa-shop icon-fa-shop-0<?= $shopId; ?>"></span></p>
                    <?php else: ?>
                        <p class="shop-icon"><span class="fa-shop icon-fa-shop-<?= $shopId; ?>"></span></p>
                    <?php endif; ?>
                    <p class="shop-title"><?= Yii::t('wp_theme',$shopName)?></p>
                </div>
                <div class="desc">
                    <div class="text"><?php the_content(); ?></div>
                </div>
            </li>
        <?php endwhile; ?>
    <script type="text/javascript">
        $("#yesterdayCustomerVoice").css("display", "block");
    </script>
    <?php endif; ?>
</ul>

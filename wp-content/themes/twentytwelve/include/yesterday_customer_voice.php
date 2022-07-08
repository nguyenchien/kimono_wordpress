<div class="wrap-ctmvoice">
    <div class="wrap-ctmvoice-title flexbox">
        <div class="img-top-ctmvoice">
            <img src="<?php echo WP_HOME; ?>/images/new-kimono/box-message-customer-voice-widget.svg" alt="">
        </div>
        <div class="wrap-content-top-ctmvoice">
            <div class="title-top-ctmvoice-first"><?= Yii::t('customer-voice','お客様の声'); ?></div>
            <div class="title-top-ctmvoice-second"><?= Yii::t('customer-voice','Customer’s voice'); ?></div>
            <div class="box-content-top-ctmvoice">
                <div class="date-content-top-ctmvoice customer-voice-datetime"></div>
            </div>
        </div>
    </div>
    <?php if( $query->have_posts() ) :?>
    <div class="wrap-ctmvoice-general-content">
        <?php
        $shopName = 'shop_name_'.$shop_id;
        while( $query->have_posts() ) :
            $query->the_post();
            ?>
        <div class="wrap-ctmvoice-content flexbox">
            <div class="box-ctmvoice-content-title flexbox">
                <div class="wrap-shopname-plan flexbox">
                    <div class="shopname-ctmvoice"><?= Yii::t('wp_theme',$shopName)?></div>
                </div>
            </div>
            <div class="box-ctmvoice-content-mid">
                <div class="desc-ctmvoice"><?php the_content(); ?></div>
            </div>
        </div>
        <?php endwhile;?>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php endif;?>
</div>

<script>
    $(document).ready(function () {
        // Datetime for Customer Voice
        var currentTextCusVoice = '<?= Yii::t("top_reserve_100", "現在") ?>';
        var dateTimeCusVoice = getDateTimeCustom(currentTextCusVoice);
        $('.customer-voice-datetime').html(dateTimeCusVoice);
    });
</script>
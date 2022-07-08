<?php
	$baseUrl = Yii::app()->baseUrl;
	global $wp_query;
	$postName = isset($post->post_name) ? $post->post_name: '';
	$numberFormatter = Yii::app()->numberFormatter;
	$currencyFormat = DateTimeUtils::getCurrencyFormat();
	$currencySymbol = Yii::app()->locale->getCurrencySymbol('JPY');
?>
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
	        $product_id = get_field('product_id');
	        $product = isset($products[$product_id]) ? $products[$product_id]: false;
	        $planModel = isset($product->planTypeHighend) ? $product->planTypeHighend: false;
	        $productDetailLink = Yii::app()->createAbsoluteUrl('formal/product', array('id' => $product_id));
	        $thumb = Utils::getImageUrl( $product->main_thumb_image, true, true);
	        $img = CHtml::image($thumb['path'], $product->product_name, Utils::getHtmlOptions($thumb['size'], 135));
	        $productName = !empty($product->product_name) ? $product->product_name: '';
	        $productCode = !empty($product->product_code) ? $product->product_code: '';
	        $priceData = $planModel ? $planModel->getPrice(): false;
	        $price = $numberFormatter->format($currencyFormat, $priceData ? $priceData['rental_price_reduced']: 0, $currencySymbol);
	        $thumb = Utils::getImageUrl( $product->main_thumb_image, true, true);
	        $img = CHtml::image($thumb['path'], $product->product_name, Utils::getHtmlOptions($thumb['size'], 135));
	        $planTypeName = !empty($planModel) ? $product->planTypeHighend->plan_type_name: '';
	        $categoryName = !empty($product) ? $product->category[0]->category_name: '';
	        ?>
        <div class="wrap-ctmvoice-content box-ctmvoice-item-full flexbox <?php echo get_the_ID();?>">

            <div class="col-ctm-left">
                <div class="image">
	                <?php if ($img) :?>
                        <?php echo $img;?>
	                <?php endif; ?>
                </div>
            </div>
            <div class="col-ctm-right">
                <div class="top-col-ctm-info flexbox">
                    <div class="cate-name-info">
                        <h3 class="text-name-top"><?php echo $planTypeName;?></h3>
                        <p class="text-name-bottom"><?php echo Yii::t('yesterday-custom-voice', '「{product_name}」{product_code}', array('{product_name}' => $productName, '{product_code}' => $productCode));?></p>
                    </div>
                    <div class="cate-price-info">
                        <p class="cate-grey"><?php echo $categoryName;?></p>
                        <p class="price-info"><?php echo $price;?> <small><?= Yii::t('takuhai.product','+tax')?></small></p>
                    </div>
                </div>
                <div class="bottom-col-ctm-info">
                    <div class="ctm-desc-info"><?php the_field('customer_feedback_text'); ?></div>
                    <div class="ctm-date-post-info"><?php echo the_field('customer_info');?>|<?php the_date();?></div>
                    <div class="ctm-view-more-info">
                        <a href="#">>もっと読む</a>
                    </div>
                </div>
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

        //Customer voice slider
        var afterChange = function(slider,i) {
            var slideHeight = jQuery(slider.$slides[i] ).height();
            jQuery(slider.$slider ).height( slideHeight);
        };

        $('.wrap-ctmvoice-general-content').slick({
            vertical: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            centerMode: true,
            centerPadding: '6px',
            infinite: true,
            arrows: true,
            infinite: false,
            onAfterChange: afterChange,
            responsive: [{
                breakpoint: 750,
                settings: {
                    verticalSwiping: true,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: false
                }
            }]
        });

    });
</script>

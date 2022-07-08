<?php
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_register_style('new-formal-ctmvoices', get_template_directory_uri() . '/css/new-formal-customer-voice.css', array('twentytwelve-style'), '201802021121');
wp_enqueue_style('new-formal-ctmvoices');
$numberFormatter = Yii::app()->numberFormatter;
$currencyFormat = DateTimeUtils::getCurrencyFormat();
$currencySymbol = Yii::app()->locale->getCurrencySymbol('JPY');
$first_row = true;
?>
<div class="wraper-formal-ctmvoices">

	<div class="boths-formal-ctmvoices flexbox">
		<div class="wraper-ctmvoices">
			<div class="wrap-banner-ctmvoices">
				<div class="banner-ctmvoices">
                    <?php if (empty($atts_shortcode['banner_url'])) { ?>
					<img src="<?= WP_HOME ?>/images/formal-rental/banner-customer-voices.jpg" alt="<?= Yii::t('new_formal', '訪問着をレンタルされた方の声'); ?>">
                    <?php } else { ?>
                        <img src="<?= $atts_shortcode['banner_url'];?>" alt="<?= Yii::t('new_formal', '訪問着をレンタルされた方の声'); ?>">
                    <?php } ?>
				</div>
			</div>
			<div class="wrap-list-ctmvoices">
				<ul class="list-ctmvoices">
                    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();?>
                    <?php
                        $customer_remark_image = get_field("customer_remark_image");
                        $customer_feedback_text = get_field("customer_feedback_text");
                        $product_id = get_field('product_id');
                        $product = isset($products[$product_id]) ? $products[$product_id]: false;
                        $planModel = isset($product->planTypeHighend) ? $product->planTypeHighend: false;
                        $productDetailLink = Yii::app()->createAbsoluteUrl('formal/product', array('id' => $product_id));
                        $planTypeName = !empty($planModel) ? $product->planTypeHighend->plan_type_name: '';
                        $productName = !empty($product->product_name) ? $product->product_name: '';
                        $productCode = !empty($product->product_code) ? $product->product_code: '';
                        $priceData = $planModel ? $planModel->getPrice(): false;
                        $price = $numberFormatter->format($currencyFormat, $priceData ? $priceData['rental_price_reduced']: 0, $currencySymbol);
                        $image_product = get_field("image_product");
                        $full_name = Yii::t('formal.customer_remark', '{plan_type_name}<br>「{product_name}」{product_code}', array('{plan_type_name}' => $planTypeName, '{product_name}' => $productName, '{product_code}' =>  $productCode));
                    ?>
                    <?php if (!empty($image_product['url']) && !empty($productName) && $price != "￥0"): ?>
					<li class="item-ctmvoices <?php echo get_the_ID();?> <?php if($first_row){?>item-ctmvoices-first<?php }?> flexbox">
						<div class="wrap-img-ctmvoices">
							<div class="img-ctmvoices">
								<div class="image"><img src="<?php echo $image_product['url'];?>" alt="<?php echo $image_product['alt'];?>"></div>
							</div>
						</div>
						<div class="wrap-ctmvoices-content">
							<div class="ctmvoices-content-top flexbox justify-content-between">
								<div class="title-ctmvoices-content flexbox"><?php echo Yii::t('formal.customer_remark', '{plan_type_name}<br>「{product_name}」{product_code}', array('{plan_type_name}' => $planTypeName, '{product_name}' => $productName, '{product_code}' =>  $productCode));?></div>
								<div class="price-ctmvoices-general flexbox">
									<p class="visit-ctmvoices">訪問着</p>
									<p class="price-item-ctmvoices">
										<?php echo $price;?>
										<small><?= Yii::t('takuhai.product','+tax')?></small>
									</p>
								</div>
							</div>
							<div class="ctmvoices-content-mid"><?php echo $customer_feedback_text;?></div>
							<div class="ctmvoices-content-btm flexbox">
								<p class="ctmvoice-item-btm1"><?php echo the_field('customer_info')?>|<?php the_date();?></p>
<!--								<p class="ctmvoice-item-btm2">兵庫県|2018.01.08</p>-->
							</div>
							<div class="wrap-readmore"><a href="<?php echo $term_link;?>" class="ctmvoices-readmore"><?php echo Yii::t('formal.customer_remark', '>もっと読む')?></a></div>
						</div>
					</li>
                    <?php endif; ?>
                <?php if ($first_row) $first_row = false; endwhile; endif;?>
                </ul>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		/* Begin: sliderCustomerVoices */
		$('.list-ctmvoices').slick({
			centerMode: true,
			centerPadding: '10px',
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			vertical: true,
            responsive: [{
                breakpoint: 750,
                settings: {
                    verticalSwiping: true
                }
            }]
		});
		/* End: sliderCustomerVoices */
	})
</script>
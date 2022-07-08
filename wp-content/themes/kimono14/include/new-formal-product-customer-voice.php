<?php
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_register_style('new-formal-ctmvoices', get_template_directory_uri() . '/css/new-formal-customer-voice.css', array('twentytwelve-style'), '201802021121');
wp_enqueue_style('new-formal-ctmvoices');
?>
<div class="wraper-formal-ctmvoices">
	<div class="title-general title-step-booking flexbox align-items-center">
		<span class="icon-title-step-booking icon-formal-status-booking"></span>
		<span class="text-tstep-booking">ご予約内容の確認</span>
	</div>
	<div class="boths-formal-ctmvoices flexbox">
		<div class="wraper-ctmvoices">
			<div class="wrap-banner-ctmvoices">
				<div class="banner-ctmvoices">
					<img src="<?= WP_HOME ?>/images/formal-rental/banner-customer-voices.jpg" alt="">
				</div>
			</div>
			<div class="wrap-list-ctmvoices">
				<ul class="list-ctmvoices">
					<li class="item-ctmvoices item-ctmvoices-first flexbox">
						<div class="img-ctmvoices">
							<img src="<?= WP_HOME ?>/images/formal-rental/pic-confirm-product.jpg" alt="">
						</div>
						<div class="wrap-ctmvoices-content">
							<div class="ctmvoices-content-top flexbox">
								<div class="title-ctmvoices-content flexbox">スーパースタンダード訪問着
									<br>「桜天の川」HMP-B048
								</div>
								<div class="price-ctmvoices-general flexbox">
									<p class="visit-ctmvoices">訪問着</p>
									<p class="price-item-ctmvoices">
										<small>￥</small>29,900
										<small>+tax</small>
									</p>
								</div>
							</div>
							<div class="ctmvoices-content-mid">間際の予約にかかわらず手際よくご対応いただき、ありがたかったです。素敵な着物でした！また帰国した際...</div>
							<div class="ctmvoices-content-btm flexbox">
								<p class="ctmvoice-item-btm1">お客様：K.R様</p>
								<p class="ctmvoice-item-btm2">兵庫県|2018.01.08</p>
							</div>
							<div class="wrap-readmore">
								<a href="#" class="ctmvoices-readmore">>もっと読む</a>
							</div>
						</div>
					</li>
					<li class="item-ctmvoices item-ctmvoices flexbox">
						<div class="img-ctmvoices">
							<img src="<?= WP_HOME ?>/images/formal-rental/pic-confirm-product.jpg" alt="">
						</div>
						<div class="wrap-ctmvoices-content">
							<div class="ctmvoices-content-top flexbox">
								<div class="title-ctmvoices-content flexbox">スーパースタンダード訪問着
									<br>「桜天の川」HMP-B048
								</div>
								<div class="price-ctmvoices-general flexbox">
									<p class="visit-ctmvoices">訪問着</p>
									<p class="price-item-ctmvoices">
										<small>￥</small>29,900
										<small>+tax</small>
									</p>
								</div>
							</div>
							<div class="ctmvoices-content-mid">間際の予約にかかわらず手際よくご対応いただき、ありがたかったです。素敵な着物でした！また帰国した際...</div>
							<div class="ctmvoices-content-btm flexbox">
								<p class="ctmvoice-item-btm1">お客様：K.R様</p>
								<p class="ctmvoice-item-btm2">兵庫県|2018.01.08</p>
							</div>
							<div class="wrap-readmore">
								<a href="#" class="ctmvoices-readmore">>もっと読む</a>
							</div>
						</div>
					</li>
					<li class="item-ctmvoices item-ctmvoices flexbox">
						<div class="img-ctmvoices">
							<img src="<?= WP_HOME ?>/ images/formal-rental/pic-confirm-product.jpg" alt="">
						</div>
						<div class="wrap-ctmvoices-content">
							<div class="ctmvoices-content-top flexbox">
								<div class="title-ctmvoices-content flexbox">スーパースタンダード訪問着
									<br>「桜天の川」HMP-B048
								</div>
								<div class="price-ctmvoices-general flexbox">
									<p class="visit-ctmvoices">訪問着</p>
									<p class="price-item-ctmvoices">
										<small>￥</small>29,900
										<small>+tax</small>
									</p>
								</div>
							</div>
							<div class="ctmvoices-content-mid">間際の予約にかかわらず手際よくご対応いただき、ありがたかったです。素敵な着物でした！また帰国した際...</div>
							<div class="ctmvoices-content-btm flexbox">
								<p class="ctmvoice-item-btm1">お客様：K.R様</p>
								<p class="ctmvoice-item-btm2">兵庫県|2018.01.08</p>
							</div>
							<div class="wrap-readmore">
								<a href="#" class="ctmvoices-readmore">>もっと読む</a>
							</div>
						</div>
					</li>
                </ul>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		/* Begin: sliderCustomerVoices */

		$('.list-ctmvoices').slick({
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			vertical: true,
		});

		/* End: sliderCustomerVoices */
	})
</script>
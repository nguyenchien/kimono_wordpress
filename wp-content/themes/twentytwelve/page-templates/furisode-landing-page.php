<?php
/**
 * Template Name: Furisode Landing Page
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)| !(IE 9)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1, user-scalable=no, shrink-to-fit=no">
<?php
	global $language, $post;
	$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
	$baseUrl = Yii::app()->baseUrl;
	$postName = $post->post_name;
	//Get post parent from slug
	$post_data = get_post($post->post_parent);
	$parent_slug_name = $post_data->post_name;
    wp_head();
?>
	<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
	<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>
	<link rel="preload" href="<?= get_template_directory_uri() ?>/css/furisode-landing-page.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/furisode-landing-page.css"></noscript>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PZG5CD');
	</script>
	<!-- End Google Tag Manager -->
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZG5CD" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div class="furisode-ldp-container" style="width:450px;max-width:100%;margin:0 auto;">
		<section class="section">
			<div class="bannerMain">
				<span class="open-popup-banner">
					<?php if($postName=='furisode-lp1'): ?>
						<img src="<?=WP_HOME;?>/images/furisode-ldp/furisode-banner-top-sp.jpg" alt="">
                    <?php else: ?>
						<img src="<?=WP_HOME;?>/images/furisode-ldp/furisode-banner-top-fix.jpg" alt="">
                    <?php endif; ?>
				</span>
			</div>
			<div class="topBtn">
				<h2 class="caption">700種以上のお着物からあなたにぴったりの振袖を探す</h2>
				<a href="javascript:;" class="btn formal-preview-popup-handle">無料で下見予約はこちら</a>
			</div><!--/topBtn-->
			<div class="topGroupText open-popup-banner" style="border:none;">
				<img src="<?=WP_HOME;?>/images/furisode-ldp/banner-text.jpg" width="100%" height="auto" style="display:block;width:100%;height:auto;" alt="">
			</div><!--/end topGroupText-->
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-white.svg" alt="">
				<h2 class="title">料金</h2>
			</div>
			<div class="cont priceBox">
				<?php if($postName=='furisode-lp1'): ?>
					<h2 class="caption boxCaption">きものレンタルwargoでは分かりやすい<br>３プライスでお着物をご用意しております</h2>
					<ul class="priceInfo">
						<li>
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-1.svg" alt="">
							<p>￥ 10,000-</p>
							<p class="small">税込￥ 11,000-</p>
						</li>
						<li>
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt="">
							<p>￥ 20,000-</p>
							<p class="small">税込￥ 22,000-</p>
						</li>
						<li>
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-3.svg" alt="">
							<p>￥ 30,000-</p>
							<p class="small">税込￥ 33,000-</p>
						</li>
					</ul>
				<?php else: ?>
					<h2 class="caption boxCaption" style="font-size:20px;">着物のタイプにより3プライスで</h2>
					<ul class="priceInfo center large">
						<li class="type-color-1 hor">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-1.svg" alt="">
							<div class="desc">
								<p>￥ 10,000-</p>
								<p class="small">税込￥ 11,000-</p>
							</div>
						</li>
					</ul>
					<ul class="priceInfo medium">
						<li class="type-color-2 hor">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt="">
							<div class="desc">
								<p>￥ 20,000-</p>
								<p class="small">税込￥ 22,000-</p>
							</div>
						</li>
						<li class="type-color-3 hor">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-3.svg" alt="">
							<div class="desc">
								<p>￥ 30,000-</p>
								<p class="small">税込￥ 33,000-</p>
							</div>
						</li>
					</ul>
                <?php endif; ?>
				<div class="priceDesc">
					<h1 class="caption">きものレンタルwargoがここまでお安くできる理由</h1>
					<p>お客様の選べる楽しさを追求して、<br>9000着以上のお着物を仕入れております。<br>
						長きにわたる和装呉服問屋様とのお取り引き<br>
						実績による信用や大量仕入れにより、<br>
						お値段は競合相手よりもかなりお安くして<br>
						いただいております。<br>
						それによりお客様が気軽にお着物を手に取って<br>
						頂きやすい<strong>3プライス</strong>を実現しております。</p>
				</div>
			</div>
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-white.svg" alt="">
				<h2 class="title">セット説明</h2>
			</div>
			<div class="cont setDesc">
				<h2 class="caption boxCaption">着付けも着付けに必要な一式も<br>きものレンタルwargoならすべて無料</h2>
				<div class="row">
					<div class="col">
						<img src="<?=WP_HOME;?>/images/furisode-ldp/set-img.jpg" alt="">
					</div>
					<div class="col">
						<img src="<?=WP_HOME;?>/images/furisode-ldp/icon-step-furisode-sp.png" alt="">
					</div>
				</div>
			</div>
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-white.svg" alt="">
				<h2 class="title">企業説明</h2>
			</div>
			<div class="cont company">
				<p>きものレンタルwargoを運営する株式会社和心は呉服業界では珍しく、東証マザーズに上場し信頼のおける企業運営を行っています。<br>
					着物レンタル以外にも、かんざし・帯留や和傘といった和装小物の専門店を多数運営しており日本全国で毎年大変多くの方にご利用いただいています。</p>
				<p class="img-inline">
					<img src="<?=WP_HOME;?>/images/furisode-ldp/img-1.jpg" alt="">
					<img src="<?=WP_HOME;?>/images/furisode-ldp/img-2.jpg" alt="">
				</p>
			</div>
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-white.svg" alt="">
				<h2 class="title">下見予約について</h2>
			</div>
			<div class="cont about">
				<p style="text-align: center"><img src="<?=WP_HOME;?>/images/furisode-ldp/icon-shop-furisode.png" alt=""></p>
				<p>きものレンタルwargo フォーマル着物取扱店舗では下見およびご来店でのご予約も承っております。</p>
				<p>無料の下見をご予約いただき、お着物を選んでいただいた上で、<br>
					配送のご予約をいただくことが可能です。店頭での現金払い、<br>
					クレジットカード払いも選択していただけます。</p>
				<p>※下見は30分以内無料で、ご成約された場合は30分以上の<br>
					下見に関しても無料となります。</p>
			</div>
			<div class="wrap-btn-v2">
				<div class="btn-v2 btn-v2-homongi btn-v2-furisode btn-v2-irotomesode formal-preview-popup-handle">
					<div class="btn-v2-reserve">
						<div class="pattern"></div>
						<div class="text">
							<span class="text-link">下見予約はこちら</span>
							<span class="icon-arrow-r-link"></span>
						</div>
						<div class="pattern last"></div>
					</div>
				</div>
			</div>
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-white.svg" alt="">
				<h2 class="title">振袖ラインナップ</h2>
			</div>
			<div class="cont shop">
				<h2 class="caption boxCaption">約700種の振袖の中からお客様にピッタリな<br>振袖をwargoだからこそできる価格でお届け</h2>
				<div class="shopGroup">
					<div class="shopSwipe">
						<ul class="row">
							<li class="col item-title">
								<h3 class="title">レトロ<br>振袖</h3>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/1/1.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/1/1.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">桜花弁と花簪</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/1/2.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/1/2.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-3.svg" alt=""></span>
										<span class="img-bottom"><img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt=""></span>
									</div>
									<h3 class="pro-title">蝶と花舞い</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/1/3.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/1/3.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">赤兎</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/1/4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/1/4.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-1.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">可憐椿・水色</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/1/5.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/1/5.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">花こっぽり</h3>
								</a>
							</li>
						</ul><!--/row-->
					</div><!--/shopSwipe-->
					<div class="shopSwipe">
						<ul class="row">
							<li class="col item-title">
								<h3 class="title">シンプル<br>振袖</h3>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/2/1.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/2/1.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">明け方の夢</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/2/2.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/2/2.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">傘遊び</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/2/3.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/2/3.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-3.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">華やぎの紅</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/2/4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/2/4.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">朝日煌めく桜</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/2/5.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/2/5.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">辻が花　赤</h3>
								</a>
							</li>
						</ul><!--/row-->
					</div><!--/shopSwipe-->
					<div class="shopSwipe">
						<ul class="row">
							<li class="col item-title">
								<h3 class="title">古典<br>振袖</h3>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/3/1.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/3/1.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">真実の心</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/3/2.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/3/2.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-1.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">ドット桜・白</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/3/3.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/3/3.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-1.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">百花王の婚礼・黒</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/3/4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/3/4.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">憧憬</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/furisode-ldp/products/3/5.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/furisode-ldp/products/3/5.jpeg" class="img-main" alt="">
										<span class="img-top"><img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?=WP_HOME;?>/images/formal-rental/icon-visit-pd.svg" alt="">
										</span>
									</div>
									<h3 class="pro-title">紅のさざなみ</h3>
								</a>
							</li>
						</ul><!--/row-->
					</div><!--/shopSwipe-->
				</div><!--/shopGroup-->
				<div class="wrap-shoplist">
					<ul class="wrap-list-area">
						<li class="area-item area-01">
							<h3 class="area-name">東日本エリア</h3>
							<ul class="list-shop">
								<li>
									<a href="/formal/access/tokyo-area/ginza-honten">
										<h4 class="shop-name">銀座本店</h4>
									</a>
								</li>
								<li>
									<a href="/formal/access/tokyo-area/sendagaya">
										<h4 class="shop-name">明治神宮北参道店</h4>
									</a>
								</li>
							</ul>
						</li>
						<li class="area-item area-02">
							<h3 class="area-name">西日本エリア</h3>
							<ul class="list-shop">
								<li>
									<a href="/access/osaka-area/osaka-shinsaibashi-opa">
										<h4 class="shop-name">心斎橋OPA店</h4>
									</a>
								</li>
								<li>
									<a href="/access/kanazawa-area/kanazawa">
										<h4 class="shop-name">金沢香林坊店</h4>
									</a>
								</li>
								<li>
									<a href="/formal/access/tokyo-area/hakata">
										<h4 class="shop-name">福岡博多店</h4>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div><!--/shoplist-->
				<div class="shop-btn">
					<div class="wrap-btn-v2">
						<p class="txt">700着以上のお着物を用意！あなた好みのお着物が見つかる！</p>
						<div class="btn-v2 btn-v2-homongi btn-v2-furisode btn-v2-irotomesode formal-preview-popup-handle">
							<div class="btn-v2-reserve">
								<div class="pattern"></div>
								<div class="text">
									<span class="text-link size-small">気になる振袖をお店で探す</span>
									<span class="icon-arrow-r-link"></span>
								</div>
								<div class="pattern last"></div>
							</div>
						</div>
					</div>
					<div class="wrap-btn-v2">
						<p class="txt">来店不要で好きなお着物を好きなタイミングで</p>
						<div class="btn-v2 bg-light-blue btn-v2-homongi btn-v2-furisode btn-v2-irotomesode">
							<a href="/takuhai/howto" class="btn-v2-reserve">
								<div class="pattern"></div>
								<div class="text">
									<span class="text-link size-small fix">宅配レンタルについて詳しく見る</span>
									<span class="icon-arrow-r-link"></span>
								</div>
								<div class="pattern last"></div>
							</a>
						</div>
					</div>
				</div><!--/shop-btn-->
			</div><!--/shop-->
			<!--<div class="topGroupText">
				<div class="col left">
					<div class="left-top">
						<img src="<?=WP_HOME;?>/images/furisode-ldp/ldp-logo.png" alt="">
						<p>の安心</p>
					</div>
					<div class="left-bottom">
						<p>全額返金保証</p>
					</div>
				</div>
				<div class="col center">
					<div class="text">
						<p style="text-align: center">COVID-19の影響で...</p>
						<ul>
							<li>・成人式が中止になった場合</li>
							<li>・日程変更になった場合</li>
						</ul>
					</div>
				</div>
				<div class="col right">
					<p>詳細はこちら</p>
				</div>
			</div>-->
			<div class="topGroupText open-popup-banner" style="border:none;">
				<img src="<?=WP_HOME;?>/images/furisode-ldp/banner-text.jpg" width="100%" height="auto" style="display:block;width:100%;height:auto;" alt="">
			</div><!--/end topGroupText-->
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-white.svg" alt="">
				<h2 class="title">お客様の声</h2>
			</div>
			<div class="cont wrap-review">
				<div class="wrap-box-review">
					<div class="customer-review-content">
						<div class="slider-preview box-review-content">
							<div class="box-review">
								<ul class="review-info">
									<li class="ctm-name">
										<strong>お客様D.M様</strong>
									</li>
									<li class="vote">
										<div class="stat">
											<div class="vote-name"><span>総合評価 <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>着付け<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="vote-name"><span>接客<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>ヘア    <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
									</li>
									<li class="comment">
										<p>来店するまで色味やデザインをあまり決めていませんでしたが、とても気に入る
											ものを選んで下さり当日が楽しみになりました！
											ありがとうございます！！</p>
									</li>
								</ul>
								<div class="review-img">
									<div class="pd-review">
										<div class="link-more">
											<a href="https://kyotokimono-rental.com/formal/product/1647" class="go-detail">ご利用<br>いただいた<br>お着物<br><span class="arrow"></span></a>
										</div>
										<div class="date-visit">ご来店日：<br>2020 01/11</div>                        </div>
									<div class="wrap-pd-img">
										<div class="pd-img">
											<a href="https://kyotokimono-rental.com/formal/product/1647" class="customer-product-img"><img width="175" height="175" data-src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/02/FRS-C011_1-175x175.jpg" alt="プレミアム振袖プラン「桜黄河」FRS-C011" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/02/FRS-C011_1-175x175.jpg"></a>
										</div>
										<ul class="pd-name"><li>プレミアム振袖プラン<br>「桜黄河」FRS-C011</li></ul>
									</div>
								</div>
							</div>
							<div class="box-review">
								<ul class="review-info">
									<li class="ctm-name">
										<strong>お客様　B.N様　徳島県</strong>
									</li>
									<li class="vote">
										<div class="stat">
											<div class="vote-name"><span>総合評価 <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>着付け<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="vote-name"><span>接客<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>ヘア    <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
									</li>
									<li class="comment">
										<p>全てスムーズに成人式ができました。
											とても素晴らしい着物を貸して頂き感謝しています。どうもありがとうございました。
											<a href="https://kyotokimono-rental.com/formal/product/3156">型番:FRS-C050</a></p>
									</li>
								</ul>
								<div class="review-img">
									<div class="pd-review">
										<div class="link-more">
											<a href="https://kyotokimono-rental.com/formal/product/3156" class="go-detail">ご利用<br>いただいた<br>お着物<br><span class="arrow"></span></a>
										</div>
										<div class="date-visit">ご来店日：<br>2020 01/14</div>                        </div>
									<div class="wrap-pd-img">
										<div class="pd-img">
											<a href="https://kyotokimono-rental.com/formal/product/3156" class="customer-product-img"><img width="175" height="175" data-src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/01/FRS-C050_1-175x175.jpg" alt="プレミアム振袖プラン「千の松竹梅」FRS-C050" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/01/FRS-C050_1-175x175.jpg"></a>
										</div>
										<ul class="pd-name"><li>プレミアム振袖プラン<br>「千の松竹梅」FRS-C050</li></ul>
									</div>
								</div>
							</div>
							<div class="box-review">
								<ul class="review-info">
									<li class="ctm-name">
										<strong>お客様N.T様</strong>
									</li>
									<li class="vote">
										<div class="stat">
											<div class="vote-name"><span>総合評価 <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>着付け<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="vote-name"><span>接客<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>ヘア    <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
									</li>
									<li class="comment">
										<p>とても親切に対応して頂いて大変助かりました。友人等にぜひすすめたいお店だ実感しました。ありがとうございました。&nbsp;<a href="https://kyotokimono-rental.com/formal/product/1439"><span>FRS-B036</span></a></p>
									</li>
								</ul>
								<div class="review-img">
									<div class="pd-review">
										<div class="link-more">
											<a href="https://kyotokimono-rental.com/formal/product/1439" class="go-detail">ご利用<br>いただいた<br>お着物<br><span class="arrow"></span></a>
										</div>
										<div class="date-visit">ご来店日：<br>2019 11/01</div>                        </div>
									<div class="wrap-pd-img">
										<div class="pd-img">
											<a href="https://kyotokimono-rental.com/formal/product/1439" class="customer-product-img"><img width="175" height="175" data-src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2019/12/FRS-B036_41-175x175.jpg" alt="プレミアム振袖プラン「春の辻が花」FRS-B036" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"></a>
										</div>
										<ul class="pd-name"><li>プレミアム振袖プラン<br>「春の辻が花」FRS-B036</li></ul>
									</div>
								</div>
							</div>
							<div class="box-review">
								<ul class="review-info">
									<li class="ctm-name">
										<strong>お客様M.M様</strong>
									</li>
									<li class="vote">
										<div class="stat">
											<div class="vote-name"><span>総合評価 <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>着付け<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="vote-name"><span>接客<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>ヘア    <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
									</li>
									<li class="comment">
										<p>ていねいな対応をしていただき良い振袖を選ぶことができました。</p>
									</li>
								</ul>
								<div class="review-img">
									<div class="pd-review">
										<div class="link-more">
											<a href="https://kyotokimono-rental.com/formal/product/7582" class="go-detail">ご利用<br>いただいた<br>お着物<br><span class="arrow"></span></a>
										</div>
										<div class="date-visit">ご来店日：<br>2019 11/09</div>                        </div>
									<div class="wrap-pd-img">
										<div class="pd-img">
											<a href="https://kyotokimono-rental.com/formal/product/7582" class="customer-product-img"><img width="175" height="175" data-src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2019/12/FRP-E003_M11-175x175.jpg" alt="スタンダード振袖プラン「旅立ちの日に」FRP-E003" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"></a>
										</div>
										<ul class="pd-name"><li>スタンダード振袖プラン<br>「旅立ちの日に」FRP-E003</li></ul>
									</div>
								</div>
							</div>
							<div class="box-review">
								<ul class="review-info">
									<li class="ctm-name">
										<strong>お客様T.M様</strong>
									</li>
									<li class="vote">
										<div class="stat">
											<div class="vote-name"><span>総合評価 <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>着付け<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="vote-name"><span>接客<var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
										<div class="stat">
											<div class="stat-name"><span>ヘア    <var>:</var></span></div>
											<div class="vote-star">
												<span>★★★★★</span>
											</div>
										</div>
									</li>
									<li class="comment">
										<p>きれいなお着物をすぐに選んでくださり、短い時間の中で多くの選択肢を試してくださったので、楽しんで自分に合う物を見つけられました。ありがとうございます。</p>
									</li>
								</ul>
								<div class="review-img">
									<div class="pd-review">
										<div class="link-more">
											<a href="https://kyotokimono-rental.com/formal/product/3160" class="go-detail">ご利用<br>いただいた<br>お着物<br><span class="arrow"></span></a>
										</div>
										<div class="date-visit">ご来店日：<br>2019 11/16</div>                        </div>
									<div class="wrap-pd-img">
										<div class="pd-img">
											<a href="https://kyotokimono-rental.com/formal/product/3160" class="customer-product-img"><img width="175" height="175" data-src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2019/12/FRS-C052_11-175x175.jpg" alt="プレミアム振袖プラン「真実の心」FRS-C052" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"></a>
										</div>
										<ul class="pd-name"><li>プレミアム振袖プラン<br>「真実の心」FRS-C052</li></ul>
									</div>
								</div>
							</div>
						</div><!--end box-review-content-->
					</div><!--end customer-review-content-->
				</div>
			</div>
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-white.svg" alt="">
				<h2 class="title">wargoが選ばれるポイント</h2>
			</div>
			<div class="cont">
				<div class="wrap-reason-choose wrap-reason-choose-furisode">
					<div class="wrap-order-reason">
						<div class="wrap-list-reason homongi flexbox">
							<div class="wrap-list-reason-sp">
								<ul class="list-reason list-reason-homongi list-reason-irotomesode list-reason-furisode">
									<li class="item-reason active">
										<div class="title-item-reason flexbox align-items-center">
											<p class="reason-name text-pink-bold">REASON 1</p>
											<p class="reason-price">
												着付け・小物全て含めて <span style="display:inline-block;text-align: center;vertical-align:middle;line-height:0.7;">￥10,000<br><small style="font-size:11px;">（税込￥11,000）</small></span>
											</p>
										</div>
										<div class="content-reason bg-light-pink-furisode">
											<p class="title-including flexbox">
												<span class="including-name">着付け・小物、全て含めて</span>
												<span class="including-price" style="padding-left:3px;">￥10,000<small style="margin-left:3px;">(税込￥11,000)</small></span>
											</p>
											<div class="including-info">
												きものレンタルwargoは全国の相場を見てもお得。<br />
												お手頃な価格でお楽しみいただけます。
											</div>
											<div class="including-average"><span class="including-average-sm">振袖レンタルの価格平均相場（着付け・小物込）</span></div>
											<div class="box-including flexbox">
												<div class="col-l-including">
													<div class="box-item-including">
														<div class="wrap-sm-title-including"><span class="sm-title-including">結婚式振袖</span></div>
														<ul class="list-including flexbox">
															<li class="item-including flexbox justify-content-center align-items-center">
																<div class="sub-including-name">都内相場価格</div>
																<div class="line-including flexbox justify-content-center"></div>
																<div class="sub-including-price"><span>¥54,900</span><span class="icon-price">〜</span><span>¥59,800</span></div>
															</li>
															<li class="item-including flexbox justify-content-center align-items-center">
																<div class="sub-including-name">京都相場価格</div>
																<div class="line-including flexbox justify-content-center"></div>
																<div class="sub-including-price"><span>¥32,400</span><span class="icon-price">〜</span><span>¥39,800</span></div>
															</li>
															<li class="item-including flexbox justify-content-center align-items-center">
																<div class="sub-including-name">全国相場価格</div>
																<div class="line-including flexbox justify-content-center"></div>
																<div class="sub-including-price"><span>¥24,000</span><span class="icon-price">〜</span><span>¥39,900</span></div>
															</li>
														</ul>
													</div>
													<div class="box-item-including">
														<div class="wrap-sm-title-including"><span class="sm-title-including">成人式振袖</span></div>
														<ul class="list-including flexbox">
															<li class="item-including flexbox justify-content-center align-items-center">
																<div class="sub-including-name">都内相場価格</div>
																<div class="line-including flexbox justify-content-center"></div>
																<div class="sub-including-price"><span>¥37,800</span><span class="icon-price">〜</span><span>¥60,000</span></div>
															</li>
															<li class="item-including flexbox justify-content-center align-items-center">
																<div class="sub-including-name">京都相場価格</div>
																<div class="line-including flexbox justify-content-center"></div>
																<div class="sub-including-price"><span>¥21,600</span><span class="icon-price">〜</span><span>¥32,400</span></div>
															</li>
															<li class="item-including flexbox justify-content-center align-items-center">
																<div class="sub-including-name">全国相場価格</div>
																<div class="line-including flexbox justify-content-center"></div>
																<div class="sub-including-price"><span>¥19,900</span><span class="icon-price">〜</span><span>¥26,000</span></div>
															</li>
														</ul>
													</div>
												</div>
												<div class="col-m-including">
													<img src="https://kyotokimono-rental.com/images/formal-rental/formal-list-v2/arrow-r-irotomesode-sp.svg" alt="" />
												</div>
												<div class="col-r-including">
													<ul class="list-including flexbox">
														<li class="item-including flexbox justify-content-center align-items-center text-gold border-gold item-including-other item-including-other-homongi">
															<div class="sub-including-name">
																きものレンタル<br />
																wargo
															</div>
															<div class="line-including flexbox justify-content-center"></div>
															<div class="sub-including-price">￥10,000 <var style="font-style:normal;vertical-align:middle;display:inline-block;">(税込￥11,000)</var></div>
															<p class="des-sub-including">
																きものレンタルwargoでは、より気軽に着物をお楽しみいただけるよう<br />
																価格を設定しております。
															</p>
														</li>
													</ul>
												</div>
											</div>
											<!--end box-including-->
											<div class="including-bottom flexbox justify-content-center text-gold align-items-center">
												<a href="/formal/why-goodvalue" class="text-gold">
													<p class="border-gold">きものレンタルwargoはなぜそんなに</p>
													<p class="border-gold">安いのか、その理由をご紹介<span class="arrow bg-gold"></span></p>
												</a>
											</div>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason flexbox align-items-center">
											<p class="reason-name text-pink-bold">REASON 2</p>
											<p class="reason-des">
												「宅配レンタル」「お店で着付け」<br />
												どちらか選べる
											</p>
										</div>
										<div class="content-reason bg-light-pink-furisode">
											<p class="title-including flexbox">
												<span class="including-name">「宅配レンタル」または「お店で着付け」、どちらか選べる</span>
											</p>
											<div class="including-info">きものレンタルwargoでは、必要なもの一式を宅配で お届けする「宅配レンタル」、お店にご来店いただき着 付けを行う「来店レンタル」のどちらかをお選びいただ けます。</div>
											<div class="wrap-rental-type">
												<div class="box-type delivery">
													<h3 class="type-name">
														<span class="type-txt bg-gold">宅配レンタル</span>
														<span class="note text-gold">〈送料無料！〉</span>
													</h3>
													<ul class="list-including flexbox">
														<li class="item-including flexbox justify-content-center align-items-center">
															<div class="sub-including-name">ネットまたはお店でお申し込み</div>
														</li>
														<li class="item-including flexbox justify-content-center align-items-center">
															<div class="sub-including-name">着用予定日の2日前にお届け</div>
														</li>
														<li class="item-including flexbox justify-content-center align-items-center">
															<div class="sub-including-name">ご着用</div>
														</li>
														<li class="item-including flexbox justify-content-center align-items-center">
															<div class="sub-including-name">着用予定日翌日にご返送</div>
														</li>
													</ul>
													<a href="/takuhai/howto" class="detail-link bg-gold">
														<span>宅配レンタルの詳しい流れはコチラ</span>
														<span class="arrow-icon"></span>
													</a>
												</div>
												<div class="box-type store box-type-irotomesode">
													<h3 class="type-name">
														<span class="type-txt bg-pink-bold">来店レンタル</span>
													</h3>
													<ul class="list-including flexbox">
														<li class="item-including flexbox justify-content-center align-items-center">
															<div class="sub-including-name">ネットまたはお店でお申し込み</div>
														</li>
														<li class="item-including flexbox justify-content-center align-items-center">
															<div class="sub-including-name">ご着用当日お店で着付け</div>
														</li>
														<li class="item-including flexbox justify-content-center align-items-center">
															<div class="sub-including-name">お出かけ</div>
														</li>
														<li class="item-including flexbox justify-content-center align-items-center">
															<div class="sub-including-name">お店にてお着替え・返却</div>
														</li>
													</ul>
													<a href="/formal/howto" class="detail-link bg-pink-bold">
														<span>来店レンタルの詳しい流れはコチラ</span>
														<span class="arrow-icon"></span>
													</a>
													<div class="notes-bottom">
														<p>※翌日以降のご返却は、レンタル延長プランをご利用ください。</p>
														<p>※オプションでヘアメイク・写真撮影プランもご用意しております。お気軽にお 問い合せください。</p>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason flexbox align-items-center">
											<p class="reason-name text-pink-bold">REASON 3</p>
											<p class="reason-des">
												満足の一着をお下見<br />
												無料！
											</p>
										</div>
										<div class="content-reason bg-light-pink-furisode">
											<p class="title-including flexbox">
												<span class="including-name">着付けのプロに相談できる！お下見無料！</span>
											</p>
											<div class="including-info">
												<p>全店で2,000点以上あるお着物の中から、ご自身のサイズやお好みにあったお着物を選びご試着いただけます。</p>
												<p>ベテランの着付師が、お客さまのご要望や目的に合わせコーディネートを提案するので、初めてでも安心していただけます。</p>
											</div>
											<div class="img">
												<img src="https://kyotokimono-rental.com/images/formal-rental/formal-list-v2/img-show-reason-03.jpg" width="370" height="278" alt="" />
											</div>
											<div class="notes-more text-gold">
												<p>ホームページやカタログに掲載していない</p>
												<p>お着物もございます。</p>
												<p>帯や草履・バッグなどの小物も</p>
												<p>豊富な品揃えの中からお選びいただけます。</p>
											</div>
											<div class="notes-bottom">
												<p>※下見は30分以内無料で、ご成約された場合は30分以上の下見に関しても無料となります。ご成約されなかった場合30分経過後、30分ごとに1,000円（税込1,100円）をいただきます。ご了承ください。</p>
											</div>
											<a href="#" class="detail-link bg-pink-bold formal-preview-popup-handle">
												<span>お下見のご予約はコチラ</span>
												<span class="arrow-icon"></span>
											</a>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason flexbox align-items-center">
											<p class="reason-name text-pink-bold">REASON 4</p>
											<p class="reason-des">必要なもの一式フルセットレンタル</p>
										</div>
										<div class="content-reason bg-light-pink-furisode">
											<div class="title-including flexbox">
												<span class="including-name">必要なもの一式フルセットレンタル</span>
											</div>
											<div class="including-info">
												<p>
													草履やバッグ、襦袢、足袋といった、着付けやお出かけに必要な一式をセットにしたレンタル価格です。<br />
													宅配レンタルでは専用のバッグにお入れしてお届けいたします。
												</p>
											</div>
											<div class="wrap-set-img">
												<div class="img set-img">
													<img src="https://kyotokimono-rental.com/images/formal-rental/formal-list-v2/set-icon-reason-04-sp-furisode.svg" width="100%" height="150" alt="" />
												</div>
												<div class="img bag-img bag-homongi">
													<div class="wrap-bt-set">
														<div class="bt-set border-pink-bold flexbox">
															<div class="text-name-set text-pink-bold">
																宅配レンタル<br />
																専用バッグ
															</div>
															<div class="box-r-set">
																<img src="https://kyotokimono-rental.com/images/formal-rental/formal-list-v2/lug-set-homongi.jpg" width="195" height="322" alt="" />
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason flexbox align-items-center">
											<p class="reason-name text-pink-bold">REASON 5</p>
											<p class="reason-des">最高品質のクリーニング処方</p>
										</div>
										<div class="content-reason bg-light-pink-furisode">
											<p class="title-including flexbox">
												<span class="including-name">最高品質のクリーニング処方</span>
											</p>
											<div class="including-info">
												<p>
													きものレンタルwargoでは、お着物は全て１枚１枚手洗いにて、素材・汚れにあった洗い方を行っております。1点1点の状態に合わせた洗浄・仕上げを行うことで、生地全体の色褪せや伸びなどが起こりづらく、柄物の金箔や銀箔の剥がれなども最小限に留めますので、常に綺麗な状態でのレンタルお着物をご提供しております。
												</p>
											</div>
											<div class="img rounded-img">
												<img src="https://kyotokimono-rental.com/images/formal-rental/formal-list-v2/img-show-reason-05.jpg" width="180" height="135" alt="" />
											</div>
											<div class="notes-more notes-center text-gold">
												<p>もちろん、お客様による</p>
												<p>お洗濯・クリーニングはご不要です。</p>
												<p>ご利用になられましたら、</p>
												<p>そのままご返却くださいませ。</p>
											</div>
											<div class="notes-info">
												<p>《 クリーニングがお客様負担となるケース 》</p>
												<p>・通常のクリーニングでは落ちない特殊な汚れ （油性汚れ、ワイン、血液など）</p>
												<p>・使用困難となるダメージ（タバコの焼焦げ、水濡 れによる縮みなど）</p>
												<p>・時計やブレスレットなど、装飾品による袖内側の 糸の引きつれ</p>
												<p>・引きずることなどによっておこる裾周辺の擦れ</p>
												<p>・香水などの強い匂い移りによる匂い除去</p>
												<span class="arrow-next"></span>
											</div>
											<div class="box-cleaning-price">
												<div class="intro bg-pink-bold">
													<h3 class="title">安心保証サービス</h3>
													<span class="price">¥1,000<small>+tax</small></span>
												</div>
												<div class="inner">
													<span class="join text-gold">にご加入で</span>
													<span class="price text-pink-bold"> <small>¥</small>０ </span>
												</div>
											</div>
											<div class="notes-bottom">
												<p>《安心保証サービスが適用班員》 10㎠未満の修復可能な汚れ（ファンデーションなどの衿汚れ、袖口の汚れ、汗ジミ、食べこぼしなど）</p>
												<p>
													《安心保証サービスが適用されない場合》 ・レンタル商品を破損・紛失された場合 ・レンタル商品に広範囲又は修復困難な汚れがあった場合 （たばこの焼け焦げ、油性汚れ、血液等の汚れなど）
													・レンタル商品に直接香水をかけられた場合
												</p>
											</div>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason flexbox align-items-center">
											<p class="reason-name text-pink-bold">REASON 6</p>
											<p class="reason-special text-gold">＜宅配レンタル＞</p>
											<p class="reason-des">3泊4日の余裕レンタル&amp;送料無料！</p>
										</div>
										<div class="content-reason bg-light-pink-furisode">
											<p class="title-including flexbox">
												<span class="including-name">〈宅配レンタル〉 3泊4日の余裕レンタル。もちろん送料無料！</span>
											</p>
											<div class="including-info">
												<p>きものレンタルwargoでは、必要なもの一式を宅配でお届けする「宅配レンタル」、</p>
												<p>お店にご来店いただき着付けを行う「来店レンタル」のどちらかをお選びいただけます。</p>
											</div>
											<ul class="list-step-date flexbox">
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-pink-bold flexbox align-items-center justify-content-center"><span class="sm-num">2日前</span></div>
													</div>
													<div class="note-date">
														専用バッグで<br />
														お届け
													</div>
												</li>
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-grey flexbox align-items-center justify-content-center"><span class="sm-num">1日前</span></div>
													</div>
												</li>
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-gold flexbox align-items-center justify-content-center"><span class="sm-num">ご利用日</span></div>
													</div>
												</li>
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-green-furisode flexbox align-items-center justify-content-center"><span class="sm-num">翌日</span></div>
													</div>
													<div class="note-date">
														専用バッグで<br />
														ご返送
													</div>
												</li>
											</ul>
											<p style="font-size:20px;">ご利用日が5月10日の場合</p>
											<ul class="list-step-num flexbox">
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-pink-bold flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
													</div>
													<div class="des-sm-circle">
														お客様<br />
														到着日
													</div>
												</li>
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-grey flexbox align-items-center justify-content-center"><span class="sm-num">5/9</span></div>
													</div>
												</li>
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-gold flexbox align-items-center justify-content-center"><span class="sm-num">5/10</span></div>
													</div>
													<div class="des-sm-circle">ご利用日</div>
												</li>
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-green-furisode flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
													</div>
													<div class="des-sm-circle">ご返送日</div>
												</li>
											</ul>
											<div class="notes-bottom">
												<p>※お貸し出し期間の延長をご希望の場合は、申し込み時にカレンダーよりご指定ください。1日につき1,000円（＋tax）で延長を承ります。</p>
											</div>
											<a href="/takuhai/howto" class="detail-link bg-gold">
												<span>宅配レンタルの詳しい流れはコチラ</span>
												<span class="arrow-icon"></span>
											</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!--end wrap-list-reason-->
						<div class="wrap-list-info-r6">
							<div class="wrap-btn-v2 flexbox">
								<div class="btn-v2 btn-v2-homongi btn-v2-irotomesode btn-v2-furisode formal-preview-popup-handle">
									<div class="btn-v2-reserve">
										<div class="pattern"></div>
										<div class="text">
											<span class="text-link">下見予約をする</span>
											<span class="icon-arrow-r-link"></span>
										</div>
										<div class="pattern last"></div>
									</div>
								</div>
							</div>
							<!--end wrap-btn-v2-->
						</div>
					</div>
					<!--end wrap-order-reason-->
				</div>
			</div>
		</section>
	</div><!--END furisode-ldp-container-->
	<div id="wrap-formal-preview-popup"></div>
	<div class="popup-overplay d-none"></div>
	<div class="img-popup-container d-none">content</div>
	<div id="popup-banner" class="popup-banner d-none">
		<span class="close-popup"></span>
		<div class="topGroupText" style="border:none;">
			<img src="<?=WP_HOME;?>/images/furisode-ldp/banner-text.jpg" width="100%" height="auto" style="display:block;width:100%;height:auto;" alt="">
		</div><!--/end topGroupText-->
		<div class="popup-desc">
			<h2 class="caption boxCaption">きものレンタルwargoでは安心してお着物を<br>レンタルすることが出来ます！</h2>
			<div class="desc">
				<h4>～COVID-19の影響でキャンセルする場合～</h4>
				<p>ご利用日から<br>
					7日前までのキャンセル ：無料<br>
					6日以内のキャンセル ：お着物代金の50％<br>
					※キャンセル料と同額のクーポンを発行させていただきます。<br>
					※卒業式などが中止であることの証明書が必要になります。
				</p>
				<h4>～COVID-19の影響でご利用日を変更する場合～</h4>
				<p>ご利用日から1年間以内のご利用日の変更可能</p>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?=WP_HOME;?>/js/jquery.qtip.custom/jquery.qtip.min.js"></script>
	<script type="text/javascript" src="<?=WP_HOME;?>/js/mustache.js"></script>
	<script type="text/javascript" src="<?=WP_HOME;?>/js/jquery.we.datepicker.js"></script>
	<script type="text/javascript" src="<?=WP_HOME;?>/js/booking.formal_preview.js"></script>
	<script type="text/javascript" src="<?=WP_HOME;?>/js/slick.min.js"></script>
	<script>
        $(document).ready(function(){
            <?php if($isSmartPhone) : ?>
            $('.list-reason .item-reason').click(function(){
                $(this).addClass('active');
                $(this).siblings().removeClass('active');
                this.scrollIntoView();
            });
            <?php else: ?>
            $('.list-reason .item-reason').click(function(){
                var index = $(this).index();
                var target = $('.wrap-content-reason .content-reason').eq(index);
                target.siblings().hide();
                target.show();

                $(this).addClass('active');
                $(this).siblings().removeClass('active');
            });
            <?php endif; ?>

            var shop_id = '<?php echo $shop_id; ?>';
            /* Show formal popup - start */
            $('body').on('click', '.formal-preview-popup-handle', function(e){
                e.preventDefault();
                if ($("#wrap-formal-preview-popup").is(':empty')) {
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getFormalPreview?shop_id=' + shop_id,
                        success: function (data) {
                            if (data != null && data != "") {
                                $("#wrap-formal-preview-popup").html(data);
                                openPreviewPopup();
                            }							                        }
                    });
                } else {
                    openPreviewPopup();
                }
            });
            function openPreviewPopup() {
                $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
                $('#formal-preview-popup').css({'display':'block'});
                $('#formal-preview-popup').show(0, function () {
                    $("html").addClass("modal-open");
                    if(!$("#formal-preview-popup input.preview-shops:checked").length){
                        $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                    } else {
                        $("#formal-preview-popup input.preview-shops:checked").attr('checked','checked').trigger('change');
                    }
                });
                $('#botDiv').hide();
            }
            /**/
	        /* open-popup-banner */
            $(document).on('click', '.open-popup-banner', function(e){
                e.preventDefault();
				$('.popup-overplay,.popup-banner').toggleClass('active');
				$('body,html').toggleClass('overplay');
            });
            $(document).on('click', '.img-popup', function(e){
                e.preventDefault();
                var img = $(this).attr('href');
                $('.img-popup-container').html('<img src="'+ img +'"><span class="close-popup"></span>');
                $('.popup-overplay,.img-popup-container').toggleClass('active');
                $('body,html').toggleClass('overplay');
            });
            /* close-popup */
            $(document).on('click', '.close-popup', function(e){
                e.preventDefault();
                $('.popup-overplay,.popup-banner,.img-popup-container').removeClass('active');
                $('body,html').removeClass('overplay');
                $('.img-popup-container').html();
            });
            /**/
            if ($('.slider-preview').length > 0) {
                $('.slider-preview').not('.slick-initialized').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    lazyLoad: 'ondemand',
                    adaptiveHeight: true,
                });
            }
        })
	</script>
    <?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Template Name: Ubugi Landing Page
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
	<link rel="preload" href="<?= get_template_directory_uri() ?>/css/ubugi-landing-page.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/ubugi-landing-page.css"></noscript>
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
					<img src="<?=WP_HOME;?>/images/ubugi-ldp/ubugi-banner-top-sp.jpg" alt="">
				</span>
			</div><!--/bannerMain-->
			<div class="topBtn">
				<h2 class="caption">お母様からお子さんまでお宮参りにピッタリなお着物を探す</h2>
				<a href="javascript:;" class="btn formal-preview-popup-handle">無料で下見予約はこちら</a>
			</div><!--/topBtn-->
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-brown.svg" alt="">
				<h2 class="title">料金</h2>
			</div>
			<div class="cont priceBox">
				<h2 class="caption boxCaption fz-20">産着はフルセットで追加料金なし</h2>
				<p class="price-cap"><span class="large">￥5,000-</span><span>税込￥ 5,500-</span></p>
				<h3 class="caption boxCaption fz-20">訪問着の着付け・小物はすべて無料<br>着物のタイプにより3プライスで</h3>
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
				<h3 class="boxCaption open-popup-banner" style="margin-bottom:5px;">同時申込で最大<b>¥9,000</b>の家族割り実施中！<br>↓ 詳しくはこちら ↓</h3>
				<div class="banner-caption open-popup-banner">
					<img src="<?=WP_HOME;?>/images/ubugi-ldp/ubugi-banner-caption.jpg" alt="">
					<p class="txt">※宅配レンタル対象外</p>
				</div>
				<div class="priceDesc open-popup-banner">
					<h1 class="caption">きものレンタルwargoがここまでお安くできる理由</h1>
					<p>お客様の選べる楽しさを追求して、<br>
						<strong>9000着以上</strong>のお着物を仕入れております。<br>
						長きにわたる和装呉服問屋様とのお取り引き<br>
						実績による信用や大量仕入れにより、<br>
						このお値段を実現できております。<br>
						それによりお客様が気軽にお着物を手に取って<br>
						頂きやすい<strong>価格設定</strong>を実現しております。</p>
				</div>
			</div>
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-brown.svg" alt="">
				<h2 class="title">セット説明</h2>
			</div>
			<div class="cont setDesc">
				<h2 class="caption boxCaption">着付けも着付けに必要な一式も<br>きものレンタルwargoならすべて無料</h2>
				<div class="row">
					<div class="col">
						<img src="<?=WP_HOME;?>/images/ubugi-ldp/set-img-1.jpg" alt="">
					</div>
					<div class="col">
						<p style="text-align: center;margin:50px 0 15px 0;">産着セット内容</p>
						<img src="<?=WP_HOME;?>/images/ubugi-ldp/icon-step-furisode-1-sp.png" alt="">
					</div>
				</div>
				<div class="row" style="border-top: solid 2px #F8A88C;padding-top:20px;">
					<div class="col">
						<p style="text-align: center;margin:10px 0 15px 0;">訪問着セット内容</p>
						<img src="<?=WP_HOME;?>/images/ubugi-ldp/icon-step-furisode-2-sp.png" alt="">
					</div>
					<div class="col">
						<img src="<?=WP_HOME;?>/images/ubugi-ldp/set-img-2.jpg" alt="">
					</div>
				</div>
			</div>
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-brown.svg" alt="">
				<h2 class="title">無料下見予約について</h2>
			</div>
			<div class="cont about">
				<p style="text-align: center"><img src="<?=WP_HOME;?>/images/ubugi-ldp/icon-shop-ubugi.png" alt=""></p>
				<p>きものレンタルwargo フォーマル着物取扱店舗では下見およびご来店でのご予約も承っております。<br>
					無料の下見をご予約いただき、お着物を選んでいただいた上で、<br>
					配送のご予約をいただくことが可能です。店頭での現金払い、<br>
					クレジットカード払いも選択していただけます。<br>
					※下見は30分以内無料で、ご成約された場合は30分以上の下見に関しても無料となります。</p>
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
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-brown.svg" alt="">
				<h2 class="title">産着ラインナップ</h2>
			</div>
			<div class="cont shop">
				<h2 class="caption boxCaption">約400種の産着の中からお子様にピッタリな<br>産着をwargoだからこそできる価格でお届け</h2>
				<div class="shopGroup">
					<div class="shopSwipe">
						<ul class="row">
							<li class="col item-title">
								<h3 class="title">女の子<br>産着</h3>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-E015_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-E015_4.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">吉祥地紋に花鹿の子・背の雲取りに花々と鈴</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-F096_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-F096_4.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">風車・黒 - 産着(女児)</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-F114_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-F114_4.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">光希</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-F127_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-F127_4.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">清純・白</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-G007_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/2/UBG-G007_4.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">羽ばたく・緑</h3>
								</a>
							</li>
						</ul><!--/row-->
					</div><!--/shopSwipe-->
					<div class="shopSwipe">
						<ul class="row">
							<li class="col item-title">
								<h3 class="title">男の子<br>産着</h3>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-E003_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-E003_4.jpeg" class="img-main" alt="">
										<!--<span class="img-top"><img src="<?/*=WP_HOME;*/?>/images/formal-rental/icon-type-2.svg" alt=""></span>
										<span class="img-bottom">
											<img src="<?/*=WP_HOME;*/?>/images/formal-rental/icon-visit-pd.svg" alt="">
											<img src="<?/*=WP_HOME;*/?>/images/formal-rental/icon-delivery-pd.svg" alt="">
										</span>-->
									</div>
									<h3 class="pro-title">右に鼓、左に軍配、背には兜と御所車</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-E035_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-E035_4.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">右に軍配、左に小槌、背に鷹と雪輪に兜(赤</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-E052_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-E052_4.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">右に宝鍵、左に御所車、背に虎と軍配</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-F025_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-F025_4.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">勝利への決意・紫</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-F067_4.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/1/UBB-F067_4.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">剛毅・青</h3>
								</a>
							</li>
						</ul><!--/row-->
					</div><!--/shopSwipe-->
				</div>
			</div>
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-brown.svg" alt="">
				<h2 class="title">訪問着ラインナップ</h2>
			</div>
			<div class="cont shop">
				<h2 class="caption boxCaption">お子様のお着物にもマッチするお着物を<br>wargoだからこそできる価格で<br>約1,800種の訪問着の中からご提案</h2>
				<div class="shopGroup">
					<div class="shopSwipe">
						<ul class="row">
							<li class="col item-title">
								<h3 class="title">お母様用<br>訪問着</h3>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMP-B001_1.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMP-B001_1.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">藤と牡丹・クリーム</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMS-C199_1.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMS-C199_1.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">可憐なささやき</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMS-E315_1.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMS-E315_1.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">繚乱の夏</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMS-F069_1.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMS-F069_1.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">華の都をどり</h3>
								</a>
							</li>
							<li class="col item-pro">
								<a href="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMS-F230_M1.jpeg" class="img-popup">
									<div class="img">
										<img src="<?=WP_HOME;?>/images/ubugi-ldp/products/3/HMS-F230_M1.jpeg" class="img-main" alt="">
									</div>
									<h3 class="pro-title">花宴(水色)</h3>
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
						<p class="txt">計2,000種以上のお着物からお客様にぴったりの1着を！</p>
						<div class="btn-v2 btn-v2-homongi btn-v2-furisode btn-v2-irotomesode formal-preview-popup-handle">
							<div class="btn-v2-reserve">
								<div class="pattern"></div>
								<div class="text">
									<span class="text-link size-small">気になるお着物をお店で探す</span>
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
			</div>
			<div class="banner-caption open-popup-banner" style="margin-top:-15px;">
				<img src="<?=WP_HOME;?>/images/ubugi-ldp/ubugi-banner-caption.jpg" alt="">
				<p class="txt">※宅配レンタル対象外</p>
			</div>
		</section>
		<section class="section">
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-brown.svg" alt="">
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
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-brown.svg" alt="">
				<h2 class="title">お客様の声</h2>
			</div>
			<div class="cont wrap-review">
				<div class="wrap-box-review">
					<div class="customer-review-content">
						<div class="slider-preview box-review-content">
							<div class="box-review">
								<div class="review-img">
									<div class="wrap-pd-img">
										<div class="pd-img">
											<a href="https://kyotokimono-rental.com/formal/product/17774" class="customer-product-img">
												<img alt="スーパースタンダード産着プラン「慶びの兜・水色」UBB-F031" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/09/スクリーンショット-2021-09-15-150944-271x271.png" style="display: inline; overflow: hidden;">
											</a>
										</div>
									</div>
								</div>
								<ul class="review-info">
									<li class="comment">
										<p></p><p>格安で柄も豊富なところがよかったです。</p>
										<p>他サイトで、着画があったので、wargoさまにもあると分かりやすいと思います。</p>
									</li>
								</ul>
								<div class="vote">
									<div class="stat">
										<div class="vote-name"><span>総合評価 <var>:</var></span></div>
										<div class="vote-star">★ ★ ★ ★ ★ </div>
									</div>
								</div>
							</div>
							<div class="box-review">
								<div class="review-img">
									<div class="wrap-pd-img">
										<div class="pd-img">
											<a href="https://kyotokimono-rental.com/formal/product/11100" class="customer-product-img"><img alt="スーパースタンダード産着プラン「左に富士、背に鷹と虎、針松(練色)」UBB-E046" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/09/スクリーンショット-2021-09-15-145858-271x271.png" style="display: inline; overflow: hidden;"></a>
										</div>
									</div>
								</div>
								<ul class="review-info">
									<li class="comment">
										<p></p><p>スムーズかつご丁寧にご対応して頂けました！</p>
										<p>着物も希望のものが空いており、とても記念になりました。</p>
										<p>ありがとうございました！</p>
										<p>また機会があれば利用したいと思います。</p>
										<p>&nbsp;</p>
									</li>
								</ul>
								<div class="vote">
									<div class="stat">
										<div class="vote-name"><span>総合評価 <var>:</var></span></div>
										<div class="vote-star">★ ★ ★ ★ ★ </div>
									</div>
								</div>
							</div>
							<div class="box-review">
								<div class="review-img">
									<div class="wrap-pd-img">
										<div class="pd-img">
											<a href="https://kyotokimono-rental.com/formal/product/10620" class="customer-product-img"><img alt="スーパーハイエンドプラン 産着プラン「暈したたき染め地紋・兜に束ね熨斗」UBB-E015" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/09/スクリーンショット-2021-09-14-114434-271x271.png" style="display: inline; overflow: hidden;"></a>
										</div>
									</div>
								</div>
								<ul class="review-info">
									<li class="comment">
										<p></p><p>急ぎのオーダーでしたがすぐに御対応いただき、非常に助かりました。</p>
										<p>柄もよかったです。また利用したいです。</p>
									</li>
								</ul>
								<div class="vote">
									<div class="stat">
										<div class="vote-name"><span>総合評価 <var>:</var></span></div>
										<div class="vote-star">★ ★ ★ ★ ★ </div>
									</div>
								</div>
							</div>
							<div class="box-review">
								<div class="review-img">
									<div class="wrap-pd-img">
										<div class="pd-img">
											<a href="https://kyotokimono-rental.com/formal/product/19510" class="customer-product-img"><img alt="スーパーハイエンドプラン 産着プラン「風車・赤」UBG-G010" src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/09/スクリーンショット-2021-09-14-112257-271x271.png" style="display: inline; overflow: hidden;"></a>
										</div>
									</div>
								</div>
								<ul class="review-info">
									<li class="comment">
										<p></p><p>写真通りで、キレイな着物でした。</p>
										<p>すべて分かりやすい梱包で返却時、戸惑うことなく元通りにできました。</p>
										<p>たくさんキレイな柄があって選ぶの大変でしたが楽しかったです。</p>
										<p>また、着物が要る機会が来ると思うのでコスパ最高で、かわいいのたくさんある</p>
										<p>こちらを利用したいと思います。ありがとうございました。</p>
									</li>
								</ul>
								<div class="vote">
									<div class="stat">
										<div class="vote-name"><span>総合評価 <var>:</var></span></div>
										<div class="vote-star">★ ★ ★ ★ ★ </div>
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
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-brown.svg" alt="">
				<h2 class="title">wargoが選ばれるポイント</h2>
			</div>
			<div class="cont">
				<div class="wrap-reason-choose wrap-reason-choose-furisode">
					<div class="wrap-order-reason">
						<div class="wrap-list-reason homongi flexbox" style="margin-bottom:0;">
							<div class="wrap-list-reason-sp">
								<ul class="list-reason list-reason-homongi">
									<li class="item-reason active">
										<div class="title-item-reason">
											<p class="reason-name">POINT 1</p>
											<h3 class="reason-desc">
												<p class="sm-txt">産着フルセットレンタル</p>
												<p class="lg-txt">¥5,000<small>（税込¥5,500）</small></p>
											</h3>
										</div>
										<div class="content-reason">
											<p class="title-including flexbox">
												<span class="including-name">フルセットレンタル</span>
												<span class="including-price">¥5,000<small>（税込¥5,500）</small></span>
											</p>
											<div class="including-info">きものレンタルwargoは全国の相場を見てもお得。
												<br>お手頃な価格でお楽しみいただけます。</div>
											<div class="including-average">産着レンタルの価格平均相場（小物込）</div>
											<ul class="list-including flexbox">
												<li class="item-including flexbox justify-content-center align-items-center">
													<div class="sub-including-name">都内相場価格</div>
													<div class="line-including flexbox justify-content-center"></div>
													<div class="group-including-price flexbox">
														<div class="box-including-price">
															<div class="sub-including-name text-blue">男の子用産着</div>
															<div class="sub-including-price"><span>¥10,800</span><span class="icon-price">~</span><span>¥18,000</span></div>
														</div>
														<div class="box-including-price">
															<div class="sub-including-name text-pink">女の子用産着</div>
															<div class="sub-including-price"><span>¥10,800</span><span class="icon-price">~</span><span>¥18,000</span></div>
														</div>
													</div>
												</li>
												<li class="item-including flexbox justify-content-center align-items-center">
													<div class="sub-including-name">京都相場価格</div>
													<div class="line-including flexbox justify-content-center"></div>
													<div class="group-including-price flexbox">
														<div class="box-including-price">
															<div class="sub-including-name text-blue">男の子用産着</div>
															<div class="sub-including-price"><span>¥5,400</span><span class="icon-price">~</span><span>¥21,600</span></div>
														</div>
														<div class="box-including-price">
															<div class="sub-including-name text-pink">女の子用産着</div>
															<div class="sub-including-price"><span>¥5,400</span><span class="icon-price">~</span><span>¥24,800</span></div>
														</div>
													</div>
												</li>
												<li class="item-including flexbox justify-content-center align-items-center">
													<div class="sub-including-name">全国相場価格</div>
													<div class="line-including flexbox justify-content-center"></div>
													<div class="group-including-price flexbox">
														<div class="box-including-price">
															<div class="sub-including-name text-blue">男の子用産着</div>
															<div class="sub-including-price"><span>¥5,400</span><span class="icon-price">~</span><span>¥8,640</span></div>
														</div>
														<div class="box-including-price">
															<div class="sub-including-name text-pink">女の子用産着</div>
															<div class="sub-including-price"><span>¥5,400</span><span class="icon-price">~</span><span>¥8,640</span></div>
														</div>
													</div>
												</li>
												<li class="item-including flexbox justify-content-center align-items-center text-gold border-gold item-including-other item-including-other-ubugi">
													<div class="sub-including-name">きものレンタルwargo</div>
													<div class="line-including flexbox justify-content-center"></div>
													<div class="sub-including-price">¥5,000<var>（税込¥5,500）</var></div>
													<p class="des-sub-including">きものレンタルwargoでは、より気軽に着物をお楽しみいただけるよう価格を設定しております。</p>
												</li>
											</ul>
											<div class="including-bottom flexbox justify-content-center text-gold align-items-center">
												<a href="/formal/why-goodvalue" class="text-gold">
													<p class="border-gold">きものレンタルwargoはなぜそんなに</p>
													<p class="border-gold">安いのか、その理由をご紹介<span class="arrow bg-gold"></span></p>
												</a>
											</div>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason">
											<p class="reason-name">POINT 2</p>
											<h3 class="reason-desc">
												<p class="sm-txt">訪問着の着付け・小物すべて含めて</p>
												<p class="lg-txt">¥10,000<small>（税込¥11,000）</small></p>
											</h3>
										</div>
										<div class="content-reason">
											<p class="title-including flexbox">
												<span class="including-name">着付け・小物、全て含めて</span>
												<span class="including-price">¥10,000<small>（税込¥11,000）</small></span>
											</p>
											<div class="including-info">きものレンタルwargoは全国の相場を見てもお得。
												<br>お手頃な価格でお楽しみいただけます。</div>
											<div class="including-average">訪問着レンタルの価格平均相場（着付け・小物込）</div>
											<ul class="list-including flexbox">
												<li class="item-including flexbox justify-content-center align-items-center">
													<div class="sub-including-name">都内相場価格</div>
													<div class="line-including flexbox justify-content-center"></div>
													<div class="sub-including-price"><span>¥21,700</span><span class="icon-price">〜</span><span>¥32,400</span></div>
												</li>
												<li class="item-including flexbox justify-content-center align-items-center">
													<div class="sub-including-name">京都相場価格</div>
													<div class="line-including flexbox justify-content-center"></div>
													<div class="sub-including-price"><span>¥19,000</span><span class="icon-price">〜</span><span>¥32,400</span></div>
												</li>
												<li class="item-including flexbox justify-content-center align-items-center">
													<div class="sub-including-name">全国相場価格</div>
													<div class="line-including flexbox justify-content-center"></div>
													<div class="sub-including-price"><span>¥11,980</span><span class="icon-price">〜</span><span>¥16,200</span></div>
												</li>
												<li class="item-including flexbox justify-content-center align-items-center text-gold border-gold item-including-other item-including-other-homongi">
													<div class="sub-including-name">きものレンタルwargo</div>
													<div class="line-including flexbox justify-content-center"></div>
													<div class="sub-including-price">¥10,000<var>（税込¥11,000）</var></div>
													<p class="des-sub-including">きものレンタルwargoでは、より気軽に着物をお楽しみいただけるよう
														<br>価格を設定しております。</p>
												</li>
											</ul>
											<div class="including-bottom flexbox justify-content-center text-gold align-items-center">
												<a href="/formal/why-goodvalue" class="text-gold">
													<p class="border-gold">きものレンタルwargoはなぜそんなに</p>
													<p class="border-gold">安いのか、その理由をご紹介<span class="arrow bg-gold"></span></p>

												</a>
											</div>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason">
											<p class="reason-name">POINT 3</p>
											<h3 class="reason-desc">
												<p class="sm-txt">「宅配」「お店で着付け」</p>
												<p class="lg-txt">選べるレンタル方法!</p>
											</h3>
										</div>
										<div class="content-reason">
											<p class="title-including flexbox">
												<span class="including-name">「宅配レンタル」または「お店で着付け」、どちらか選べる</span>
											</p>
											<div class="including-info">きものレンタルwargoでは、必要なもの一式を宅配で お届けする「宅配レンタル」、お店にご来店いただき着 付けを行う「来店レンタル」のどちらかをお選びいただ けます。
											</div>
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
												<div class="box-type store">
													<h3 class="type-name">
														<span class="type-txt bg-emerald">来店レンタル</span>
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
													<a href="/formal/howto" class="detail-link bg-emerald">
														<span>来店レンタルの詳しい流れはコチラ</span>
														<span class="arrow-icon"></span>
													</a>
													<div class="notes-bottom">
														<p>※翌日以降のご返却は、レンタル延長プランをご利用ください。</p>
														<p>※オプションでヘアメイク・写真撮影プランもご用意しております。お気軽にお 問い合せください。
														</p>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason">
											<p class="reason-name">POINT 4</p>
											<h3 class="reason-desc">
												<p class="sm-txt">満足の一着を</p>
												<p class="lg-txt">お下見無料！</p>
											</h3>
										</div>
										<div class="content-reason">
											<p class="title-including flexbox">
												<span class="including-name">着付けのプロに相談できる！お下見無料！</span>
											</p>
											<div class="including-info">
												<p>全店で2,000点以上あるお着物の中から、ご自身のサイズやお好みにあったお着物を選びご試着いただけます。</p>
												<p>ベテランの着付師が、お客さまのご要望や目的に合わせコーディネートを提案するので、初めてでも安心していただけます。</p>
											</div>
											<div class="img">
												<img class="" alt="" src="https://kyotokimono-rental.com/images/formal-rental/formal-list-v2/img-show-reason-03.jpg?ver=13012020" style="display: inline; overflow: hidden;">
											</div>
											<div class="notes-more text-gold">
												<p>ホームページやカタログに掲載していない</p>
												<p>お着物もございます。</p>
												<p>帯や草履・バッグなどの小物も</p>
												<p> 豊富な品揃えの中からお選びいただけます。</p>
											</div>
											<div class="notes-bottom">
												<p>※下見は30分以内無料で、ご成約された場合は30分以上の下見に関しても無料となります。<br>ご成約されなかった場合30分経過後、30分ごとに1,000円（税込1,100円）をいただきます。ご了承ください。</p>
											</div>
											<a href="#" class="detail-link bg-orange-homongi formal-preview-popup-handle">
												<span>お下見のご予約はコチラ</span>
												<span class="arrow-icon"></span>
											</a>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason">
											<p class="reason-name">POINT 5</p>
											<h3 class="reason-desc">
												<p class="sm-txt">必要なもの一式</p>
												<p class="lg-txt">フルセットレンタル！</p>
											</h3>
										</div>
										<div class="content-reason">
											<div class="title-including flexbox">
												<span class="including-name">必要なもの一式フルセットレンタル</span>
											</div>
											<div class="including-info">
												<p>草履やバッグ、襦袢、足袋といった、着付けやお出かけに必要な一式をセットにしたレンタル価格です。
													<br>宅配レンタルでは専用のバッグにお入れしてお届けいたします。</p>
											</div>
											<div class="wrap-set-img">
												<div class="img bag-img bag-homongi">
													<div class="wrap-bt-set">
														<div class="bt-set border-pink flexbox">
															<div class="box-r-set">
																<img src="<?=WP_HOME;?>/images/ubugi-ldp/lug-set-ubugi-item-1.jpg">
																<p class="set-name">産着の場合</p>
															</div>
															<div class="box-r-set">
																<img alt="" src="<?=WP_HOME;?>/images/ubugi-ldp/lug-set-ubugi-item-2.jpg">
																<p class="set-name">訪問着の場合</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason">
											<p class="reason-name">POINT 6</p>
											<h3 class="reason-desc">
												<p class="sm-txt">最高品質の</p>
												<p class="lg-txt">クリーニング処方!</p>
											</h3>
										</div>
										<div class="content-reason">
											<p class="title-including flexbox">
												<span class="including-name">最高品質のクリーニング処方</span>
											</p>
											<div class="including-info">
												<p>きものレンタルwargoでは、お着物は全て１枚１枚手洗いにて、素材・汚れにあった洗い方を行っております。1点1点の状態に合わせた洗浄・仕上げを行うことで、生地全体の色褪せや伸びなどが起こりづらく、柄物の金箔や銀箔の剥がれなども最小限に留めますので、常に綺麗な状態でのレンタルお着物をご提供しております。</p>
											</div>
											<div class="img rounded-img text-center" style="text-align:center;">
												<img class="" alt="" src="https://kyotokimono-rental.com/images/formal-rental/formal-list-v2/img-show-reason-05.jpg" style="display: inline; overflow: hidden;">
											</div>
											<div class="notes-more notes-center text-gold">
												<p>もちろん、お客様による</p>
												<p>お洗濯・クリーニングはご不要です。</p>
												<p>ご利用になられましたら、</p>
												<p>そのままご返却くださいませ。</p>
											</div>
											<div class="notes-info">
												<p>《 クリーニングがお客様負担となるケース 》</p>
												<p>・通常のクリーニングでは落ちない特殊な汚れ （油性汚れ、ワイン、血液など）
												</p>
												<p>・使用困難となるダメージ（タバコの焼焦げ、水濡 れによる縮みなど）
												</p>
												<p>・時計やブレスレットなど、装飾品による袖内側の 糸の引きつれ
												</p>
												<p>・引きずることなどによっておこる裾周辺の擦れ</p>
												<p>・香水などの強い匂い移りによる匂い除去</p>
												<span class="arrow-next"></span>
											</div>
											<div class="box-cleaning-price">
												<div class="intro bg-orange-homongi">
													<h3 class="title">安心保証サービス</h3>
													<span class="price">¥1,000<small>+tax</small></span>
												</div>
												<div class="inner">
													<span class="join text-gold">にご加入で</span>
													<span class="price ">
									                    <small>¥</small>０
									                </span>
												</div>
											</div>
											<div class="notes-bottom">
												<p>《安心保証サービスが適用班員》 10㎠未満の修復可能な汚れ（ファンデーションなどの衿汚れ、袖口の汚れ、汗ジミ、食べこぼしなど）</p>
												<p>《安心保証サービスが適用されない場合》 ・レンタル商品を破損・紛失された場合 ・レンタル商品に広範囲又は修復困難な汚れがあった場合 （たばこの焼け焦げ、油性汚れ、血液等の汚れなど） ・レンタル商品に直接香水をかけられた場合</p>
											</div>
										</div>
									</li>
									<li class="item-reason">
										<div class="title-item-reason">
											<p class="reason-name">POINT 7</p>
											<h3 class="reason-desc">
												<p class="sm-txt">宅配レンタルなら3泊4日の</p>
												<p class="lg-txt">余裕レンタル&amp;送料無料!</p>
											</h3>
										</div>
										<div class="content-reason">
											<p class="title-including flexbox">
												<span class="including-name">〈宅配レンタル〉 3泊4日の余裕レンタル。もちろん送料無料！</span>
											</p>
											<p class="intro-text-line">ご利用が５月１０日の場合</p>
											<ul class="list-step-date flexbox">
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-orange-homongi flexbox align-items-center justify-content-center"><span class="sm-num">ご利用2日前</span></div>
													</div>
												</li>
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-grey flexbox align-items-center justify-content-center"><span class="sm-num">ご利用1日前</span></div>
													</div>
												</li>
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-gold flexbox align-items-center justify-content-center"><span class="sm-num">ご利用日</span></div>
													</div>
												</li>
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-emerald flexbox align-items-center justify-content-center"><span class="sm-num">ご利用の翌日</span></div>
													</div>
												</li>
											</ul>
											<ul class="list-step-num flexbox">
												<li class="item-step-num">
													<div class="wrap-sm-circle">
														<div class="sm-circle bg-orange-homongi flexbox align-items-center justify-content-center">
															<span class="sm-num">5/8</span>
															<p class="icon-bags-01 icon-bags"><img class="" src="https://kyotokimono-rental.com/images/formal-rental/formal-list-v3/icon-bag-v3.svg" style="display: inline; overflow: hidden;"></p>
															<span class="sm-num sm-num-other">専用バッグで<br>お届け</span>
														</div>
													</div>
													<div class="des-sm-circle">お客様到着日</div>
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
														<div class="sm-circle bg-emerald flexbox align-items-center justify-content-center">
															<span class="sm-num">5/11</span>
															<p class="icon-bags icon-bags-02"><img class="" src="https://kyotokimono-rental.com/images/formal-rental/formal-list-v3/icon-bag-car-v3.svg" style="display: inline; overflow: hidden;"></p>
															<span class="sm-num sm-num-other">専用バッグで<br>お届け</span>
														</div>
													</div>
													<div class="des-sm-circle">ご返送日</div>
												</li>
											</ul>
											<div class="notes-bottom">
												<p>※お貸し出し期間の延長をご希望の場合は、申し込み時にカレンダーよりご指定ください。1日につき1,000円（＋tax）で延長を承ります。</p>
											</div>
											<div class="wrap-link">
												<a href="/takuhai/howto" class="detail-link-other">
													<p class="flexbox">宅配レンタルの詳しい流れはコチラ<span class="arrow-icon"></span></p>
												</a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
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
		<div class="popup-banner-wrap">
			<div class="topGroupText" style="border:none;">
				<img src="<?=WP_HOME;?>/images/ubugi-ldp/ubugi-banner-caption.jpg" style="display:block;width:100%;height:auto;" alt="">
			</div><!--/end topGroupText-->
			<div class="popup-desc">
				<div class="caption boxCaption" style="margin-bottom:0;">
					<p>
						<span style="color: #f00;">銀座本店・明治神宮北参道店・金沢香林坊店
							<br>心斎橋OPA店・福岡博多店</span><br>
						ご来店のお客様限定！家族割実施中！
					</p>
					<p>ご家族2名様からご利用でき、3名様ご利用で<br>
						<span style="color: #f00;">最大¥9,000割引</span><span style="color:#000;">の</span>お得な割引プランです。
					</p>
				</div>
			</div>
			<div class="furisode-ldp-title">
				<img src="<?=WP_HOME;?>/images/formal-rental/formal-list-v2/icon-circle-brown.svg" alt="">
				<h2 class="title">きもの家族割 価格表</h2>
			</div>
			<div class="priceInfoGroup">
				<div class="priceInfoCap"><span>〇大人1名＋子供1名</span><span>※産着は¥5,000<small>（税込¥5,500）</small>均一</span></div>
				<ul class="priceInfo">
					<li>
						<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-1.svg" alt="">
						<p class="small">¥15,000</p>
						<p>→ ¥14,500</p>
						<p class="small smaller">(税込¥15,950)</p>
					</li>
					<li>
						<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt="">
						<p class="small">¥25,000</p>
						<p>→ ¥24,000</p>
						<p class="small smaller">(税込¥26,400)</p>
					</li>
					<li>
						<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-3.svg" alt="">
						<p class="small">¥35,000</p>
						<p>→ ¥33,000</p>
						<p class="small smaller">(税込¥36,300)</p>
					</li>
				</ul>
				<div class="priceInfoCap" style="border-top:solid 2px #F8A88C;padding-top:15px;"><span>〇大人2名＋子供1名</span><span>※産着は¥5,000（税込¥5,500）均一</span></div>
				<ul class="priceInfo">
					<li>
						<span class="double-img">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-1.svg" alt="">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-1.svg" alt="">
						</span>
						<p class="small">¥25,000</p>
						<p>→ ¥22,500</p>
						<p class="small smaller">(税込¥24,750)</p>
					</li>
					<li>
						<span class="double-img">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt="">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt="">
						</span>
						<p class="small">¥45,000</p>
						<p>→ ¥40,500</p>
						<p class="small smaller">(税込¥44,550)</p>
					</li>
					<li>
						<span class="double-img">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-3.svg" alt="">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-3.svg" alt="">
						</span>
						<p class="small">¥65,000</p>
						<p>→ ¥56,000</p>
						<p class="small smaller">(税込¥61,600)</p>
					</li>
				</ul>
				<ul class="priceInfo">
					<li>
						<span class="double-img">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-1.svg" alt="">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt="">
						</span>
						<p class="small">¥35,000</p>
						<p>→ ¥31,500</p>
						<p class="small smaller">(税込¥34,650)</p>
					</li>
					<li>
						<span class="double-img">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-2.svg" alt="">
							<img src="<?=WP_HOME;?>/images/formal-rental/icon-type-3.svg" alt="">
						</span>
						<p class="small">¥55,000</p>
						<p>→ ¥49,000</p>
						<p class="small smaller">(税込¥53,900)</p>
					</li>
				</ul>
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
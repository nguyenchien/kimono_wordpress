<?php
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
?>
<?php if($isSmartPhone): ?>
	<style>
		.shoplist-title{
			color: #fff;
		}
		.shoplist-title .sub-title{
			font-size: 30px;
			margin-bottom: 15px;
			text-transform: uppercase;
		}
		.shoplist-title .main-title{
			font-size: 18px;
		}
		.area-item{
			margin-bottom: 20px;
		}
		.area-item .overlay-bg{
			position: relative;
		}
		.area-item .overlay-bg img{
			width: 100%;
		}
		.area-item .area-bg{
			position: absolute;
			width: 100%;
			left: 50%;
			top: 50%;
			-webkit-transform: translateX(-50%) translateY(-50%);
			-ms-transform: translateX(-50%) translateY(-50%);
			transform: translateX(-50%) translateY(-50%);
		}
		.area-bg .shoplist-title{
			text-align: center;
			margin-bottom: 15px;
		}
		.area-bg .search-list{
			background-color: #fff;
			padding: 10px;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
			position: relative;
			margin: 0 20px;
		}
		.area-bg .search-list:after{
			content: '';
			position: absolute;
			right: 20px;
			top: 40%;
			width: 12px;
			height: 12px;
			border-right: 1px solid #000;
			border-bottom: 1px solid #000;
			-webkit-transform: translateY(-40%) rotate(45deg);
			-ms-transform: translateY(-40%) rotate(45deg);
			transform: translateY(-40%) rotate(45deg);
		}
		.search-list.active:after{
			top: 60%;
			-webkit-transform: translateY(-60%) rotate(-135deg);
			-ms-transform: translateY(-60%) rotate(-135deg);
			transform: translateY(-60%) rotate(-135deg);
		}
		.area-bg .search-list .icon{
			margin-right: 30px;
			width: 25px;
			height: 24px;
			background: url(./images/formal-rental/formal-list-v3/icon-shop-area.svg) no-repeat;
			background-size: cover;
		}
		.area-bg .search-list .search-txt{
			letter-spacing: 1px;
			font-weight: bold;
			font-size: 13px;
		}
		.area-item .area-name{
			font-size: 18px;
			font-weight: bold;
			text-align: center;
		}
		.area-item .list-shop{
			padding: 20px 15px;
		}
		.area-item .list-shop li:not(:last-child){
			margin-bottom: 10px;
		}
		.area-item .list-shop li a{
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
			position: relative;
			padding: 10px;
			font-size: 16px;
		}
		.area-item .list-shop li a:after{
			content: '';
			position: absolute;
			top: 50%;
			right: 15px;
			-webkit-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
			border-top: 7px solid transparent;
			border-bottom: 7px solid transparent;
		}
		.area-01 .list-shop li a:after{
			border-left: 10px solid #ff838f;
		}
		.area-01 .list-shop li a{
			color: #ff838f;
			border: 1px solid #ff838f;
		}
		.area-01 .area-name{
			color: #ff838f;
		}
		.area-02 .list-shop li a:after{
			border-left: 10px solid #7d5ea5;
		}
		.area-02 .list-shop li a{
			color: #7d5ea5;
			border: 1px solid #7d5ea5;
		}
		.area-02 .area-name{
			color: #7d5ea5;
		}
		.area-03 .list-shop li a:after{
			border-left: 10px solid #76aef4;
		}
		.area-03 .list-shop li a{
			color: #76aef4;
			border: 1px solid #76aef4;
		}
		.area-04 .list-shop li a:after{
			border-left: 10px solid #918e2c;
		}
		.area-04 .list-shop li a{
			color: #918e2c;
			border: 1px solid #918e2c;
		}
		.area-04 .area-name{
			color: #918e2c;
		}
		.wrap-shoplist .list-shop li a .tag{
			position: absolute;
			color: #fff;
			background-color: red;
			font-size: 11px;
			padding: 3px 6px;
			left: 10px;
			top: 50%;
			transform: translateY(-50%);
		}
	</style>
	<div class="wrap-list-shop-formal-top-page">
		<h2 class="title-list-shop-top title-general text-center title-general-icon">
			<span class="icon-title-general icon icon-formal-search"></span>
			<span class="title-list-shop-top text-title-general">着物レンタルができる店舗を探す</span>
		</h2>
		<div class="wrap-shoplist">
			<ul class="wrap-list-area">
				<li class="area-item area-01">
					<h3 class="area-name">東日本エリア</h3>
					<ul class="list-shop">
						<li>
							<a href="<?= WP_HOME ?>/formal/access/tokyo-area/ginza-honten">
								<span class="shop-name">銀座本店</span>
								<span class="arrow"></span>
							</a>
						</li>
						<li>
							<a href="<?= WP_HOME ?>/formal/access/tokyo-area/sendagaya">
								<span class="shop-name">明治神宮北参道店</span>
								<span class="arrow"></span>
							</a>
						</li>
<!--						<li>-->
<!--							<a href="--><?//= WP_HOME ?><!--/access/shizuoka-area/ito">-->
<!--								<span class="shop-name">伊東店</span>-->
<!--								<span class="arrow"></span>-->
<!--							</a>-->
<!--						</li>-->
					</ul>
				</li>
				<li class="area-item area-02">
					<h3 class="area-name">西日本エリア</h3>
					<ul class="list-shop">
						<li>
							<a href="<?= WP_HOME ?>/access/osaka-area/osaka-shinsaibashi-opa">
								<span class="shop-name">心斎橋OPA店</span>
								<span class="arrow"></span>
							</a>
						</li>
						<li>
							<a href="<?= WP_HOME ?>/access/kanazawa-area/kanazawa">
								<span class="shop-name">金沢香林坊店</span>
								<span class="arrow"></span>
							</a>
						</li>
						<li>
							<a href="<?= WP_HOME ?>/formal/access/tokyo-area/hakata">
								<span class="shop-name">福岡博多店</span>
								<span class="arrow"></span>
							</a>
						</li>
					</ul>
				</li>
				<li class="area-item area-04">
					<h3 class="area-name">観光着物レンタル店舗</h3>
					<ul class="list-shop">
						<li>
							<a href="<?= WP_HOME ?>/access/kyoto-area/station-area/kyotostation">
								<span class="shop-name">京都タワーサンド店</span>
								<span class="arrow"></span>
							</a>
						</li>
<!--						<li>-->
<!--							<a href="--><?//= WP_HOME ?><!--/access/kyoto-area/kiyomizu-area/ninenzaka">-->
<!--								<span class="shop-name">京都二年坂店</span>-->
<!--								<span class="arrow"></span>-->
<!--							</a>-->
<!--						</li>-->
						<li>
							<a href="<?= WP_HOME ?>/access/kyoto-area/gion-area/gion-nishiki">
								<span class="shop-name">京都祇園錦店</span>
								<span class="arrow"></span>
							</a>
						</li>
						<li>
							<a href="<?= WP_HOME ?>/access/asakusa-area/asakusa">
								<span class="shop-name">東京浅草店</span>
								<span class="arrow"></span>
							</a>
						</li>
						<li>
							<a href="<?= WP_HOME ?>/access/kanazawa-area/kanazawa-kenrokuen">
								<span class="shop-name">金沢兼六園店</span>
								<span class="arrow"></span>
							</a>
						</li>
<!--						<li>-->
<!--							<a href="--><?//= WP_HOME ?><!--/access/kyoto-area/kiyomizu-area/kiyomizuzaka">-->
<!--								<span class="tag">休業中</span>-->
<!--								<span class="shop-name">清水坂店</span>-->
<!--								<span class="arrow"></span>-->
<!--							</a>-->
<!--						</li>-->
					</ul>
				</li>
			</ul>
		</div>
	</div>
<?php else: ?>
	<style>
		.wrap-shoplist .wrap-list-area{
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			margin-left: -15px;
		}
		.wrap-shoplist .wrap-list-area .list-item{
			width: calc(100% * 1/2 - 15px);
			margin-left: 15px;
			margin-bottom: 40px;
		}
		.wrap-shoplist .wrap-list-area .list-item.list-04{
			width: 100%;
		}
		.wrap-shoplist .wrap-list-area .area-name{
			font-weight: bold;
			font-size: 22px;
			text-align: center;
			line-height: 1;
			margin-bottom: 15px;
		}
		.wrap-shoplist .list-shop li{
			margin-bottom: 15px;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
		}
		.wrap-shoplist .list-shop li a{
			padding: 20px 0 19px 0;
			width: 100%;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
			position: relative;
		}
		.wrap-shoplist .list-shop li a:after{
			content: '';
			position: absolute;
			top: 50%;
			right: 15px;
			-webkit-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
			width: 0;
			height: 0;
			border-left: 10px solid #ff838f;
			border-top: 7px solid transparent;
			border-bottom: 7px solid transparent;
		}
		.wrap-shoplist .list-02 .list-shop li a:after{
			border-left: 10px solid #7d5ea5;
		}
		.wrap-shoplist .list-03 .list-shop li a:after{
			border-left: 10px solid #76aef4;
		}
		.wrap-shoplist .list-04 .list-shop li a:after{
			border-left: 10px solid #918e2c;
		}
		.wrap-shoplist .list-shop li a:hover{
			opacity: 0.6;
		}
		.wrap-shoplist .list-shop li a .shop-name{
			font-size: 18px;
			letter-spacing: 1px;
			line-height: 1;
		}
		.wrap-shoplist .list-shop li a .tag{
			position: absolute;
			color: #fff;
			background-color: red;
			font-size: 12px;
			padding: 3px 6px;
			left: 10px;
			top: 50%;
			transform: translateY(-50%);
		}
		.wrap-shoplist .list-01 .list-shop li{
			border: 1px solid #ff838f;
		}
		.wrap-shoplist .list-01 .list-shop li a .shop-name,
		.wrap-shoplist .list-01 .area-name{
			color: #ff838f;
		}
		.wrap-shoplist .list-02 .area-name,
		.wrap-shoplist .list-02 .list-shop li a .shop-name{
			color: #7d5ea5;
		}
		.wrap-shoplist .list-02 .list-shop li{
			border: 1px solid #7d5ea5;
		}
		.wrap-shoplist .list-03 .area-name,
		.wrap-shoplist .list-03 .list-shop li a .shop-name{
			color: #76aef4;
		}
		.wrap-shoplist .list-03 .list-shop li{
			border: 1px solid #76aef4;
		}
		.wrap-shoplist .list-04 .area-name,
		.wrap-shoplist .list-04 .list-shop li a .shop-name{
			color: #918e2c;
		}
		.wrap-shoplist .list-04 .list-shop li{
			border: 1px solid #918e2c;
		}
		.wrap-shoplist .list-04 .list-shop{
			display: flex;
			flex-wrap: wrap;
			margin-left: -15px;
		}
		.wrap-shoplist .list-04 .list-shop li{
			width: calc(100% * 1/2 - 15px);
			margin-left: 15px;
		}
	</style>
	<div class="wrap-list-shop-formal-top-page">
		<div class="wrap-shop-list">
			<h2 class="title-list-shop-top title-general text-center title-general-icon">
				<span class="icon-title-general icon icon-formal-search"></span>
				<span class="title-list-shop-top text-title-general">着物レンタルができる店舗を探す</span>
			</h2>
			<div class="wrap-shoplist">
				<div class="wrap-list-area">
					<div class="list-item list-01">
						<h3 class="area-name">東日本エリア</h3>
						<ul class="list-shop">
							<li>
								<a href="<?= WP_HOME ?>/formal/access/tokyo-area/ginza-honten">
									<span class="shop-name">銀座本店</span>
									<span class="arrow"></span>
								</a>
							</li>
							<li>
								<a href="<?= WP_HOME ?>/formal/access/tokyo-area/sendagaya">
									<span class="shop-name">明治神宮北参道店</span>
									<span class="arrow"></span>
								</a>
							</li>
<!--							<li>-->
<!--								<a href="--><?//= WP_HOME ?><!--/access/shizuoka-area/ito">-->
<!--									<span class="shop-name">伊東店</span>-->
<!--									<span class="arrow"></span>-->
<!--								</a>-->
<!--							</li>-->
						</ul>
					</div>
					<div class="list-item list-02">
						<h3 class="area-name">西日本エリア</h3>
						<ul class="list-shop">
							<li>
								<a href="<?= WP_HOME ?>/access/osaka-area/osaka-shinsaibashi-opa">
									<span class="shop-name">心斎橋OPA店</span>
									<span class="arrow"></span>
								</a>
							</li>
							<li>
								<a href="<?= WP_HOME ?>/access/kanazawa-area/kanazawa">
									<span class="shop-name">金沢香林坊店</span>
									<span class="arrow"></span>
								</a>
							</li>
							<li>
								<a href="<?= WP_HOME ?>/formal/access/tokyo-area/hakata">
									<span class="shop-name">福岡博多店</span>
									<span class="arrow"></span>
								</a>
							</li>
						</ul>
					</div>
					<div class="list-item list-04">
						<h3 class="area-name">観光着物レンタル店舗</h3>
						<ul class="list-shop">
							<li>
								<a href="<?= WP_HOME ?>/access/kyoto-area/station-area/kyotostation">
									<span class="shop-name">京都タワーサンド店</span>
									<span class="arrow"></span>
								</a>
							</li>
							<li>
								<a href="<?= WP_HOME ?>/access/asakusa-area/asakusa">
									<span class="shop-name">東京浅草店</span>
									<span class="arrow"></span>
								</a>
							</li>
<!--							<li>-->
<!--								<a href="--><?//= WP_HOME ?><!--/access/kyoto-area/kiyomizu-area/ninenzaka">-->
<!--									<span class="shop-name">京都二年坂店</span>-->
<!--									<span class="arrow"></span>-->
<!--								</a>-->
<!--							</li>-->
							<li>
								<a href="<?= WP_HOME ?>/access/kanazawa-area/kanazawa-kenrokuen">
									<span class="shop-name">金沢兼六園店</span>
									<span class="arrow"></span>
								</a>
							</li>
							<li>
								<a href="<?= WP_HOME ?>/access/kyoto-area/gion-area/gion-nishiki">
									<span class="shop-name">京都祇園錦店</span>
									<span class="arrow"></span>
								</a>
							</li>
<!--							<li>-->
<!--								<a href="--><?//= WP_HOME ?><!--/access/kyoto-area/kiyomizu-area/kiyomizuzaka">-->
<!--									<span class="tag">休業中</span>-->
<!--									<span class="shop-name">清水坂店</span>-->
<!--									<span class="arrow"></span>-->
<!--								</a>-->
<!--							</li>-->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="wrap-new-banner-formal-options wrap-topics-banner-widget">
    <div class="title-general text-center title-general-icon">
        <span class="icon-title-general icon icon-formal-search"></span>
        <div class="text-title-general flexbox">Topics<h2 class="sub-descript-title-general">人気のトピック</h2></div>
    </div>
	<ul class="list-banner flexbox">
		<li class="item-banner">
			<div class="image-banner">
				<a href="<?= WP_HOME ?>/formal/why-goodvalue"><img width="700" height="143" data-src="<?= WP_HOME ?>/images/new-formal-options/new-formal-options-03.jpg" alt="全国どこでも【送料無料】 で冠婚葬祭用のお着物を発送致します。"></a>
			</div>
			<p class="text-banner">
				<a href="<?= WP_HOME ?>/formal/why-goodvalue">本格的な着物レンタルを何故安く提供できるのか？秘密をお教えします</a>
			</p>
		</li>
		<li class="item-banner">
			<div class="image-banner">
				<a href="<?= WP_HOME ?>/hairset"><img width="700" height="143" data-src="<?= WP_HOME ?>/images/new-formal-options/new-formal-options-05.jpg" alt="モ デル気分で観光散策♬とっておきの一枚はプロにお任せ!!"></a>
			</div>
			<p class="text-banner">
				<a href="<?= WP_HOME ?>/hairset">1,900円なのにプロのヘアスタイリストが行います♬</a>
			</p>
		</li>
		<li class="item-banner">
			<div class="image-banner">
				<a href="<?= WP_HOME ?>/kimono/photo-studio"><img width="700" height="143" data-src="<?= WP_HOME ?>/images/new-formal-options/new-formal-options-01.jpg" alt="本格スタジオが2,900円で利用できるお得プラン♬"></a>
			</div>
			<p class="text-banner">
				<a href="<?= WP_HOME ?>/kimono/photo-studio">本格スタジオが2,900円で利用できるお得プラン♬</a>
			</p>
		</li>
        <li class="item-banner">
            <div class="image-banner">
                <a href="<?= WP_HOME ?>/formal/furisode/furisodemaedori"><img width="700" height="143" data-src="<?= WP_HOME ?>/images/formal-rental/access/banner-furisode.png" alt="<?= Yii::t('top-new-formal-options','成人式振袖レンタルの前撮りキャンペーン') ?>"></a>
            </div>
        </li>
	</ul>
</div>

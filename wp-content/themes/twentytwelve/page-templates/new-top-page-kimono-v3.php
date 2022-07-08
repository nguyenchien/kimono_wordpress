<?php
/**
 * Template Name: New Top Page Kimono V3
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
global $post, $isSmartPhone,$isTablet, $language;
$detect = Yii::app()->mobileDetect;
$isSmartPhone = $detect->isSmartPhone();
$isTablet = $detect->isMobile() && $detect->isTablet();
$baseUrl = Yii::app()->baseUrl;
$language = Yii::app()->language;

get_header('new-kimono-landing-page');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
//if($language == "ja"){
//    if($isSmartPhone){
//        wp_register_style('new-top-page-kimono-v3-sp-style', get_template_directory_uri() . '/css/new-top-page-kimono-v3-sp.css', array('twentytwelve-style'));
//        wp_enqueue_style('new-top-page-kimono-v3-sp-style');
//    }else{
//        wp_register_style('new-top-page-kimono-v3-pc-style', get_template_directory_uri() . '/css/new-top-page-kimono-v3-pc.css', array('twentytwelve-style'));
//        wp_enqueue_style('new-top-page-kimono-v3-pc-style');
//    }
//}

wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('jquery-lazy-iframe', WP_HOME . '/js/jquery.lazy.iframe.min.js',array('jquery-lazy'));

// Custom field for Sub Banners Top Page V3
$subBannersKimonoV3SP = get_field('sub_banners_top_kimono_v3_sp');
$subBannersKimonoV3PC = get_field('sub_banners_top_kimono_v3_pc');

?>

<style>
    .list-banner > li:not(:first-child){
        display: none;
    }
    .list-banner.slick-initialized > li:not(:first-child){
        display: block;
    }
	.shop-tag{
		font-size: 9px;
		color: #fff;
		display: inline-block;
		margin-left: 10px;
		padding: 2px 4px;
		background-color: #FF0000;
	}
    @media (min-width: 768px) and (max-width: 1400px){
        .list-banner > li:first-child{
            width: 80%;
            margin: 0 auto;
        }
    }
    @media (min-width: 1400px){
        .list-banner > li:first-child{
            width: 60%;
            margin: 0 auto;
        }
    }
	@media (max-width: 767px){
		.plan-list li .plan-img {
			margin-bottom: 15px;
		}
		.plan-list li .plan-img .plan-info {
			display: flex !important;
			position: absolute;
			align-items: center;
			justify-content: space-between;
			padding: 0 10px;
			bottom: 0;
			background-color: rgba(255,255,255, 0.5);
			width: 100%;
			height: 30px;
		}
		.plan-list li .plan-img .plan-info .plan-name {
			font-size: 13px;
			font-family: "ten-mincho", serif;
			font-weight: bold;
			padding-top: 5px;
		}
		.plan-list li .plan-img .plan-info .plan-price {
			font-family: "ten-mincho", serif;
		}
		.plan-list li .plan-img .plan-info .plan-price span {
			font-size: 18px;
		}
	}
	@media (max-width: 360px){
		.plan-list li .plan-img .plan-info .plan-name{
			padding-top: 0;
			font-size: 11px;
		}
		.plan-list li .plan-img .plan-info .plan-price span{
			font-size: 13px;
		}
		.plan-info .plan-price .sm-price{
			font-size: 8px !important;
		}
	}
</style>
<?php if($isSmartPhone):?>
    <div class="container-box clearfix">
        <div class="wrap-highend-v3">
            <div class="wrap-content-v3">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
			    <div class="wrap-boths-column flexbox">
<div class="left-column hidden-sidebar">
                                    <?php //get_sidebar('top-page-left-v3') ?>
                                </div>
                                <div class="right-column right-column-top-v3">
                                    <section class="banner-section">
                                        <ul class="list-banner" id="top-slider">
                                            <?php // Begin: For Main Banner SP ?>
                                            <?php if ( get_field('main_banner_top_kimono_v3_sp') ) : ?>
                                                <?php echo php_set_base_url(get_field('main_banner_top_kimono_v3_sp')); ?>
                                            <?php endif; ?>
                                            <?php // End: For Main Banner SP ?>
                                        </ul>
                                    </section>
                                    <section class="section-intro">
                                        <div class="wrap-title-6-point">
                                            <p class="title-6-point">wargoを選ぶ
                                                <span><img width="99" height="150" data-src="<?= WP_HOME ?>/images/new-kimono-v3/text-6-point.svg" alt=""></span>つの理由
                                            </p>
                                        </div>
                                        <ul class="list-items-option-point flexbox">
                                            <li class="items-option-point items-option-point-01 flexbox">
                                                <p class="icon-option-point option-point-01"></p>
                                                <p class="infor-option-point flexbox">
                                                    <span class="infor-top">日本最大級</span>
                                                    <span class="infor-bottom color-yellow">全国<var class="text-biger-bottom">20</var>店舗</span>
                                                </p>
                                            </li>
                                            <li class="items-option-point items-option-point-02 flexbox">
                                                <p class="icon-option-point option-point-02"></p>
                                                <p class="infor-option-point flexbox">
                                                    <span class="infor-top">最新着物</span>
                                                    <span class="infor-bottom color-yellow"><var class="text-biger-bottom">20,000</var>着以上</span>
                                                </p>
                                            </li>
                                            <li class="items-option-point items-option-point-03 flexbox">
                                                <p class="icon-option-point option-point-03"></p>
                                                <p class="infor-option-point flexbox">
                                                    <span class="infor-top">着物の着付け</span>
                                                    <span class="infor-bottom color-yellow"><var class="text-biger-bottom">無料!</var></span>
                                                </p>
                                            </li>
                                            <li class="items-option-point items-option-point-04 flexbox">
                                                <p class="icon-option-point option-point-04"></p>
                                                <p class="infor-option-point flexbox">
                                                    <span class="infor-top">最安プランが</span>
                                                    <span class="infor-bottom color-yellow"><var class="text-biger-bottom">￥3,000～</var></span>
                                                </p>
                                            </li>
                                            <li class="items-option-point items-option-point-05 flexbox">
                                                <p class="icon-option-point option-point-05"></p>
                                                <p class="infor-option-point flexbox">
                                                    <span class="infor-top">フルセット</span>
                                                    <span class="infor-bottom color-yellow">小物8点無料</span>
                                                </p>
                                            </li>
                                            <li class="items-option-point items-option-point-06 flexbox">
                                                <p class="icon-option-point option-point-06"></p>
                                                <p class="infor-option-point flexbox">
                                                    <span class="infor-top">手ぶらで</span>
                                                    <span class="infor-bottom color-yellow"><var class="text-biger-bottom">OK!!</var></span>
                                                </p>
                                            </li>
                                        </ul>
                                        <h2 class="intro-title">京都最大級！圧倒的低価格で種類豊富に格安レンタル可能♪</h2>
                                    </section>
                                    <?php
                                    $today = intval(date("Ymd"));
                                    if($today > 20200831) {?>
		                                <section class="plan-section">
			                                <div class="wrap-title">
				                                <p class="main-title">Kimono Plan</p>
				                                <h2 class="sub-title">着物のおすすめレンタルプランを見る</h2>
			                                </div>
			                                <ul class="plan-list">
				                                <li>
					                                <div class="plan-img">
						                                <a href="<?= home_url()?>/kimono#Standard-Kimono">
							                                <img width="414" height="143" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-sp-01-v2.jpg?ver=<?= time(); ?>" alt="">
							                                <div class="plan-info">
								                                <p class="plan-name">選べるスタンダードプラン</p>
								                                <p class="plan-price">
									                                <span>￥3,000-</span>
									                                <span class="sm-price">(税込 ¥3,300-)</span>
								                                </p>
							                                </div>
						                                </a>
					                                </div>
					                                <div class="wrap-main-btn">
						                                <a href="<?= home_url()?>/kimono#Standard-Kimono" class="main-btn plan-btn">このプランを予約する</a>
					                                </div>
				                                </li>
				                                <li>
					                                <div class="plan-img">
						                                <a href="<?= home_url()?>/kimono#Couple-Standard-Kimono">
							                                <img width="414" height="143" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-sp-02-v2.jpg?ver=<?= time(); ?>" alt="">
							                                <div class="plan-info">
								                                <p class="plan-name">カップルプラン</p>
								                                <p class="plan-price">
									                                <span>￥5,000-</span>
									                                <span class="sm-price">(税込 ¥5,500-)</span>
								                                </p>
							                                </div>
						                                </a>
					                                </div>
					                                <div class="wrap-main-btn">
						                                <a href="<?= home_url()?>/kimono#Couple-Standard-Kimono" class="main-btn plan-btn">このプランを予約する</a>
					                                </div>
				                                </li>
				                                <li>
					                                <div class="plan-img">
						                                <a href="<?= home_url()?>/kimono#Antique-Kimono">
							                                <img width="414" height="143" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-sp-03-v2.jpg?ver=<?= time(); ?>" alt="">
							                                <div class="plan-info">
								                                <p class="plan-name">アンティーク正絹着物プラン</p>
								                                <p class="plan-price">
									                                <span>￥5,000-</span>
									                                <span class="sm-price">(税込 ¥5,500-)</span>
								                                </p>
							                                </div>
						                                </a>
					                                </div>
					                                <div class="wrap-main-btn">
						                                <a href="<?= home_url()?>/kimono#Antique-Kimono" class="main-btn plan-btn">このプランを予約する</a>
					                                </div>
				                                </li>
				                                <li>
					                                <div class="plan-img">
						                                <a href="<?= home_url()?>/kimono#Taishoroman-Kimono">
							                                <img width="414" height="143" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-sp-04-v2.jpg?ver=<?= time(); ?>" alt="">
							                                <div class="plan-info">
								                                <p class="plan-name">大正ロマンプラン</p>
								                                <p class="plan-price">
									                                <span>￥5,000-</span>
									                                <span class="sm-price">(税込 ¥5,500-)</span>
								                                </p>
							                                </div>
						                                </a>
					                                </div>
					                                <div class="wrap-main-btn">
						                                <a href="<?= home_url()?>/kimono#Taishoroman-Kimono" class="main-btn plan-btn">このプランを予約する</a>
					                                </div>
				                                </li>
				                                <li>
					                                <div class="plan-img">
						                                <a href="<?= home_url()?>/kimono#Men-Kimono">
							                                <img width="414" height="143" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-sp-05-v2.jpg?ver=<?= time(); ?>" alt="">
							                                <div class="plan-info">
								                                <p class="plan-name">メンズプラン</p>
								                                <p class="plan-price">
									                                <span>￥3,000-</span>
									                                <span class="sm-price">(税込 ¥3,300-)</span>
								                                </p>
							                                </div>
						                                </a>
					                                </div>
					                                <div class="wrap-main-btn">
						                                <a href="<?= home_url()?>/kimono#Men-Kimono" class="main-btn plan-btn">このプランを予約する</a>
					                                </div>
				                                </li>
				                                <li>
					                                <div class="plan-img">
						                                <a href="<?= home_url()?>/kimono#Kimono-Girl">
							                                <img width="414" height="143p" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-sp-06-v2.jpg?ver=<?= time(); ?>" alt="">
							                                <div class="plan-info">
								                                <p class="plan-name">お子様着物プラン</p>
								                                <p class="plan-price">
									                                <span>￥3,000-</span>
									                                <span class="sm-price">(税込 ¥3,300-)</span>
								                                </p>
							                                </div>
						                                </a>
					                                </div>
					                                <div class="wrap-main-btn">
						                                <a href="<?= home_url()?>/kimono#Kimono-Girl" class="main-btn plan-btn">このプランを予約する</a>
					                                </div>
				                                </li>
			                                </ul>
		                                </section>
                                    <?php } ?>
	                                <!--<section class="plan-section">
                                        <div class="wrap-title">
                                            <p class="main-title">Yukata Plan</p>
                                            <h2 class="sub-title">浴衣のおすすめレンタルプランを見る</h2>
                                        </div>
                                        <ul class="plan-list">
                                            <li>
                                                <div class="plan-img">
                                                    <a href="<?= home_url()?>/yukata/plan#Standard-Yukata">
                                                        <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-sp-01.jpg" alt="選べるスタンダード浴衣プラン">
                                                        <div class="plan-info">
                                                            <p class="plan-name">選べるスタンダード浴衣プラン</p>
                                                            <p class="plan-price">
                                                                <span>2,980</span><var>円－</var>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="wrap-main-btn">
                                                    <a href="<?= home_url()?>/yukata/plan#Standard-Yukata" class="main-btn plan-btn">このプランを予約する</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="plan-img">
                                                    <a href="<?= home_url()?>/yukata/plan#Couple-Standard-Yukata">
                                                        <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-sp-02.jpg" alt="カップルプラン">
                                                        <div class="plan-info">
                                                            <p class="plan-name">カップルプラン</p>
                                                            <p class="plan-price">
                                                                <span>5,760</span><var>円－</var>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="wrap-main-btn">
                                                    <a href="<?= home_url()?>/yukata/plan#Couple-Standard-Yukata" class="main-btn plan-btn">このプランを予約する</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="plan-img">
                                                    <a href="<?= home_url()?>/yukata/plan#Mamechiyo-Yukata">
                                                        <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-sp-03.jpg" alt="豆千代モダン浴衣プラン">
                                                        <div class="plan-info">
                                                            <p class="plan-name">豆千代モダン浴衣プラン</p>
                                                            <p class="plan-price">
                                                                <span>5,980</span><var>円－</var>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="wrap-main-btn">
                                                    <a href="<?= home_url()?>/yukata/plan#Mamechiyo-Yukata" class="main-btn plan-btn">このプランを予約する</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="plan-img">
                                                    <a href="<?= home_url()?>/yukata/plan#Brand-Yukata">
                                                        <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-sp-04.jpg" alt="ブランド浴衣プラン">
                                                        <div class="plan-info">
                                                            <p class="plan-name">ブランド浴衣プラン</p>
                                                            <p class="plan-price">
                                                                <span>6,980</span><var>円－</var>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="wrap-main-btn">
                                                    <a href="<?= home_url()?>/yukata/plan#Brand-Yukata" class="main-btn plan-btn">このプランを予約する</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="plan-img">
                                                    <a href="<?= home_url()?>/yukata/plan#Men-Yukata">
                                                        <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-sp-05.jpg" alt="メンズ浴衣プラン">
                                                        <div class="plan-info">
                                                            <p class="plan-name">メンズ浴衣プラン</p>
                                                            <p class="plan-price">
                                                                <span>2,980</span><var>円－</var>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="wrap-main-btn">
                                                    <a href="<?= home_url()?>/yukata/plan#Men-Yukata" class="main-btn plan-btn">このプランを予約する</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="plan-img">
                                                    <a href="<?= home_url()?>/yukata/plan#Girl-Yukata">
                                                        <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-sp-06.jpg" alt="子供浴衣プラン">
                                                        <div class="plan-info">
                                                            <p class="plan-name">子供浴衣プラン</p>
                                                            <p class="plan-price">
                                                                <span>2,980</span><var>円－</var>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="wrap-main-btn">
                                                    <a href="<?= home_url()?>/yukata/plan#Girl-Yukata" class="main-btn plan-btn">このプランを予約する</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </section>-->
	                                <!--                                    <section class="section-banner-mid">-->
	                                <!--                                        <div class="banner-child-top" style="padding: 0 10px;">-->
	                                <!--                                            <a href="--><?//= home_url()?><!--/kimono">-->
	                                <!--                                                <img data-src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/banner-new-top-child-sp.jpg" alt="観光着物誘導バナー">-->
	                                <!--                                            </a>-->
	                                <!--                                        </div>-->
	                                <!--                                    </section>-->
                                    <section class="section-storelist">
                                        <div class="wrap-title">
                                            <p class="main-title">Search Stores</p>
                                            <h2 class="sub-title">お近くの着物レンタル店舗を探す</h2>
                                        </div>
                                        <ul class="storelist">
                                            <li>
                                                <div class="wrap-intro">
                                                <span class="icon">
                                                     <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/icon-metro.svg" alt="">
                                                </span>
                                                    <h3 class="store-intro">京都駅から近い店舗をお探しの方</h3>
                                                </div>
                                                <div class="store-content">
                                                    <div class="store-img">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/station-area/kyotostation">
                                                            <img width="138" height="138" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-sp-01.jpg?ver=12022020" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="store-info">
                                                        <h4 class="store-name">
                                                            <a href="<?= home_url() ?>/access/kyoto-area/station-area/kyotostation">京都タワーサンド店</a>
                                                        </h4>
                                                        <p class="store-desc">京都駅徒歩2分京都タワービル２F</p>
                                                        <div class="wrap-store-btn">
                                                            <a href="#" class="store-btn show-map">地図を確認する</a>
                                                            <a href="<?= home_url() ?>/access/kyoto-area/station-area/kyotostation" class="store-btn link-btn">店舗情報はこちら</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="store-map">
                                                    <iframe title="kyotostation shop location" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.7667818770387!2d135.759521!3d34.987505999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108afaeb40191%3A0x6aec2bdbd4a76261!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ2_kuqzpg73pp4XliY3kuqzpg73jgr_jg6_jg7zlupc!5e0!3m2!1sen!2sjp!4v1440470968676" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="wrap-intro">
                                                <span class="icon temple">
                                                     <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/icon-temple.svg" alt="">
                                                </span>
                                                    <h3 class="store-intro">京都祇園から近い店舗をお探しの方</h3>
                                                </div>
                                                <div class="store-content">
                                                    <div class="store-img">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/gion-area/gion-nishiki">
                                                            <img width="138" height="138" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-sp-02.jpg?ver=12022020" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="store-info">
                                                        <h4 class="store-name">
                                                            <a href="<?= home_url() ?>/access/kyoto-area/gion-area/gion-nishiki">京都祇園錦店</a>
                                                        </h4>
                                                        <p class="store-desc">烏丸駅徒歩2分</p>
                                                        <div class="wrap-store-btn">
                                                            <a href="#" class="store-btn show-map">地図を確認する</a>
                                                            <a href="<?= home_url() ?>/access/kyoto-area/gion-area/gion-nishiki" class="store-btn link-btn">店舗情報はこちら</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="store-map">
                                                    <iframe title="gion-shijo-location" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.13356926634!2d135.770546!3d35.0033614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108c0384c9c11%3A0x74d0f0f4cf17e285!2z552A54mp44Os44Oz44K_44OrIHdhcmdvIOelh-WckuWbm-adoeW6lw!5e0!3m2!1sja!2s!4v1554969885627!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                </div>
                                            </li>
                                            <li class="two-store" style="display:none;">
                                                <div class="wrap-intro">
                                                <span class="icon">
                                                     <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/icon-metro.svg" alt="">
                                                </span>
                                                    <h3 class="store-intro">京都嵐山駅から近い店舗をお探しの方</h3>
                                                </div>
                                                <div class="store-content">
                                                    <div class="store-img">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama">
                                                            <img width="138" height="138" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-sp-03.jpg?ver=12022020" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="store-info">
                                                        <h4 class="store-name"><a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama">嵐山駅前店</a></h4>
                                                        <p class="store-desc">嵯峨嵐山駅すぐそば！</p>
                                                        <div class="wrap-store-btn">
                                                            <a href="#" class="store-btn show-map">地図を確認する</a>
                                                            <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama" class="store-btn link-btn other">店舗情報はこちら</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="store-map">
                                                    <iframe title="arashiyama shop location" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.552242646899!2d135.67893601524065!3d35.017912080354265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001a9fc2aa5637d%3A0xba3490117d1fa05c!2z5Lqs6YO9552A54mp44Os44Oz44K_44Ord2FyZ28g5bWQ5bGx6aeF5YmN5bqX!5e0!3m2!1sja!2s!4v1554970037632!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                </div>
                                                <div class="store-content">
                                                    <div class="store-img">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">
                                                            <img width="138" height="138" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-sp-04.jpg?ver=12022020" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="store-info">
                                                        <h4 class="store-name"><a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">嵐山渡月橋店</a></h4>
                                                        <p class="store-desc">嵐電嵐山駅すぐそば！</p>
                                                        <div class="wrap-store-btn">
                                                            <a href="#" class="store-btn show-map">地図を確認する</a>
                                                            <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo" class="store-btn link-btn">店舗情報はこちら</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="store-map">
                                                    <iframe title="arashiyama togetsukyo shop location" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3267.5891396643588!2d135.67762!3d35.0169887!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001a9ffb241ec69%3A0x599f8306ca8cb748!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5bWQ5bGx5rih5pyI5qmL5bqX!5e0!3m2!1sja!2s!4v1554970117637!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                </div>
                                            </li>
                                            <!--<li class="two-store">
                                                <div class="wrap-intro">
                                                <span class="icon temple">
                                                     <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/icon-temple.svg" alt="">
                                                </span>
                                                    <h3 class="store-intro">清水寺から近い店舗をお探しの方</h3>
                                                </div>
<!--                                                <div class="store-content">-->
<!--                                                    <div class="store-img">-->
<!--                                                        <a href="--><?//= home_url() ?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">-->
<!--                                                            <img width="138" height="138" data-src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/img-store-sp-05.jpg?ver=12022020" alt="">-->
<!--                                                        </a>-->
<!--                                                    </div>-->
<!--                                                    <div class="store-info">-->
<!--                                                        <h4 class="store-name"><a href="--><?//= home_url() ?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">清水茶わん坂店</a></h4>-->
<!--                                                        <p class="store-desc">清水寺まで徒歩5分！</p>-->
<!--                                                        <div class="wrap-store-btn">-->
<!--                                                            <a href="#" class="store-btn show-map">地図を確認する</a>-->
<!--                                                            <a href="--><?//= home_url() ?><!--/access/kyoto-area/kiyomizu-area/chawanzaka" class="store-btn link-btn">店舗情報はこちら</a>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="store-map">-->
<!--                                                    <iframe title="chawanzaka shop location" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.465770121249!2d135.780176!3d34.995044!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa29b5203ac8a311b!2z5Lqs6YO95riF5rC06Iy244KP44KT5Z2CIOWMl-aWjuOCsOODqeODleOCo-ODg-OCrw!5e0!3m2!1sja!2s!4v1555650595354!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0"></iframe>-->
<!--                                                </div>-->
	                                        <!--<div class="store-content">
													<div class="store-img">
														<a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/ninenzaka">
															<img width="138" height="138" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-sp-ninenzaka.jpg" alt="">
														</a>
													</div>
													<div class="store-info">
														<h4 class="store-name"><a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/ninenzaka">京都二年坂店</a></h4>
														<p class="store-desc">八坂神社徒歩圏内！二年坂IMAYO本店2階</p>
														<div class="wrap-store-btn">
															<a href="#" class="store-btn show-map">清水坂まで徒歩5分！</a>
															<a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/ninenzaka" class="store-btn link-btn">店舗情報はこちら</a>
														</div>
													</div>
												</div>
												<div class="store-map">
													<iframe title="ninenzaka shop location" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.3477339543856!2d135.7783439!3d34.9979995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60010909154504b9%3A0x229aa7a807feecd6!2z5Lqs6YO95LqM5bm05Z2CSU1BWU_mnKzlupc!5e0!3m2!1sja!2s!4v1611541686933!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
												</div>
                                                <div class="store-content last">
                                                    <div class="store-img">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">
                                                            <img width="138" height="138" data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-sp-06.jpg?ver=12022020" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="store-info">
                                                        <h4 class="store-name">
															<a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">清水坂店</a>
															<span class="closed-tag">
																<img data-src="<?= WP_HOME ?>/images/new-kimono-v3/closed-tag.svg" alt="">
															</span>
														</h4>
                                                        <p class="store-desc">嵐電嵐山駅すぐそば！</p>
                                                        <div class="wrap-store-btn">
                                                            <a href="#" class="store-btn show-map">清水寺まで徒歩5分！</a>
                                                            <a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka" class="store-btn link-btn">店舗情報はこちら</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="store-map">
                                                    <iframe title="kiyomizuzaka shop location" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.4430469735985!2d135.77714231524013!3d34.99561298035985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108ce47f344d3%3A0xbfd21c88eaa1748!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5riF5rC05Z2C5bqX!5e0!3m2!1sja!2s!4v1554969977558!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                </div>
                                            </li>-->
                                        </ul>
                                        <div class="wrap-main-btn">
                                            <a href="<?= home_url()?>/access" class="main-btn">空き状況をチェック！</a>
                                        </div>
                                    </section>
                                    <section class="section-option">
                                        <div class="wrap-title">
                                            <p class="main-title">Option</p>
                                            <h2 class="sub-title">人気のオプションをご紹介♪</h2>
                                        </div>
                                        <ul class="slider-option slick-slider" id="slider-option">
                                            <li class="item">
                                                <div class="img">
                                                    <a href="<?=home_url() ?>/kimono/photo-studio">
                                                        <img width="443" height="203" data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-01.jpg?ver=12022020" alt="写真スタジオ">
                                                    </a>
                                                </div>
                                                <p class="img-opt-desc">思い出づくりに写真は欠かせません！綺麗なお召し物と一緒に観光の思い出を残しませんか？
                                                </p>
                                            </li>
                                            <li class="item">
                                                <div class="img">
                                                    <a href="<?=home_url() ?>/hairset">
                                                        <img width="443" height="203" data-src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/12/hairset-sample-min.jpg" alt="プロのヘアセット師がアレンジ！せっかくだから着物ヘアー">
                                                    </a>
                                                </div>
                                                <p class="img-opt-desc">着物も可愛く着るならヘアセットも可愛くアレンジしたい！プロのセット師があなたに似合うヘアをご提案！</p>
                                            </li>
                                            <li class="item">
                                                <div class="img">
                                                    <a href="<?=home_url() ?>/photo-session">
                                                        <img width="443" height="203" data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-03.jpg?ver=12022020" alt="カメラマン同⾏オプション">
                                                    </a>
                                                </div>
                                                <p class="img-opt-desc">思い出づくりに写真は欠かせません！綺麗なお召し物と一緒に観光の思い出を残しませんか？
                                                </p>
                                            </li>
                                            <li class="item">
                                                <div class="img">
                                                    <a href="<?=home_url() ?>/group">
                                                        <img width="443" height="203" data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-04.jpg?ver=12022020" alt="グループ旅⾏・修学旅⾏に！団体着物体験">
                                                    </a>
                                                </div>
                                                <p class="img-opt-desc">着物での素敵な思い出を形に残しませんか？京都きものレンタルwargoではプロのカメラマンと提携！</p>
                                            </li>
                                            <li class="item">
                                                <div class="img">
                                                    <a href="<?=home_url() ?>/rickshaw">
                                                        <img width="443" height="203" data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-05.jpg?ver=202003121152" alt="wargoだけの特別特典！お店を出たらすく人力中に">
                                                    </a>
                                                </div>
                                                <p class="img-opt-desc">wargoだけの特別特典！着物レンタルをご予約時に人力車をお申し込みいただけば、お店までお迎えにあがります！</p>
                                            </li>
                                            <li class="item">
                                                <div class="img">
                                                    <a href="<?=home_url() ?>/option">
                                                        <img width="443" height="203" data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-06.jpg?ver=12022020" alt="wargoでは、帯やバッグのオプションも種類豊富にご用意しております！">
                                                    </a>
                                                </div>
                                                <p class="img-opt-desc">wargoでは、帯やバッグのオプションも種類豊富にご用意しております！ <br>お着物を、もっとお洒落に着こなしたい方におすすめ！</p>
                                            </li>
                                        </ul>
                                    </section>
                                    <section class="section-faq">
                                        <div class="wrap-title">
                                            <p class="main-title">FAQ</p>
                                            <h2 class="sub-title">皆様からいただけるよくあるご質問♪</h2>
                                        </div>
                                        <div class="wrap-faq">
                                            <div class="faq-content">
                                                <div class="box-faqs-item-container items">
                                                    <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                        <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">何か持っていくものはありますか？</p>
                                                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="box-faqs-item-content"><p class="text-item-content">特にございません。 着物用の下着や足袋、 草履などはプランに含まれています。 京都の冬は大変冷え込みます、 ご心配の方は襟元の開いた薄手のTシャツをお持ちいただければその上から着付けさせていただきます。</p></div>
                                                </div>
                                                <div class="box-faqs-item-container items">
                                                    <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                        <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">キャンセルについて教えてください</p>
                                                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="box-faqs-item-content">
                                                        <p class="text-item-content"><?php echo Yii::t('new-top-page-kimono-v3', 'キャンセルの場合はご来店予定日の二日前までご予約確認メールにある項目3「ご予約プランの詳細」リンクからキャンセルをお願い致します。<br/>ただし下記のキャンセル料金が発生いたしますのでご了承ください。<br/>ご利用日］から2日前までのキャンセル：キャンセル料無料<br/>※事務手数料500円(税別)のみ頂きます<br/>［ご利用日］の前日および当日のキャンセル：ご利用料金の100％'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="box-faqs-item-container items">
                                                    <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                        <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">髪はセットしてもらえますか？</p>
                                                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="box-faqs-item-content"><p class="text-item-content">かんざしを用いた簡単なヘアアレンジを無料で、編みこみで華やかさを演出できるヘアアレンジを有料で承っております。詳しくは、<a href="<?php echo WP_HOME; ?>/kimono/hairset">着物の髪型・ヘアセット</a>をご覧ください。</p></div>
                                                </div>
                                                <div class="box-faqs-item-container items">
                                                    <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                        <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">どれくらいの時間がかかりますか？</p>
                                                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="box-faqs-item-content"><p class="text-item-content">通常、所要時間は1時間程度です。ただし、春や秋の混雑時期は少しお待ちいただく場合がありますので予めご了承ください。当日の流れは<a href="<?php echo WP_HOME; ?>/howto">『レンタルの流れ』</a>をご覧ください</p></div>
                                                </div>
                                                <div class="box-faqs-item-container items">
                                                    <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                        <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">どのプランにするか決められません</p>
                                                            <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="box-faqs-item-content"><p class="text-item-content">当日にプランの変更が可能です。お悩みでしたら1番お安いプランでご予約頂き、変更された場合は差額分のお支払いを店頭にてお願い致します。</p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="section-topic">
                                        <div class="wrap-title">
                                            <p class="main-title">Topic</p>
                                            <h2 class="sub-title">着物レンタルの人気トピック</h2>
                                        </div>
                                        <ul class="list-topic">
                                            <li>
                                                <div class="img">
                                                    <a href="<?= home_url()?>/formal/why-goodvalue">
                                                        <img width="434" height="180" data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-topic-01.jpg?ver=12022020" alt="wargoの着物レンタルはなぜこんなに安いのか？">
                                                    </a>
                                                </div>
                                                <p class="desc">
                                                    wargoの着物がこんなにも安いのはなぜ？？
                                                    その驚きの安さの理由はこちら！
                                                </p>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <a href="<?= home_url()?>/hairset">
                                                        <img width="434" height="180" data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-topic-02.jpg?ver=12022020" alt="⼈気ヘアスタイル特集">
                                                    </a>
                                                </div>
                                                <p class="desc">
                                                    着物に似合うヘアスタイルってどんなの？
                                                    着物や浴衣にバッチリ決まる人気ヘアスタ
                                                    イルをご紹介！
                                                </p>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <a href="<?= home_url()?>/corporation">
                                                        <img width="434" height="180" data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-topic-04.jpg?ver=12022020" alt="New Open! 倉敷美観地区店">
                                                    </a>
                                                </div>
                                                <p class="desc">
                                                    法人様向けに、社内イベント・団体旅行な
                                                    どでのお着物レンタルのご紹介や、
                                                    弊社との業務提携についてご案内いたします。
                                                </p>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <a href="<?= home_url()?>/lesson">
                                                        <img width="434" height="180" data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-topic-lesson.jpg" alt="本格着付け 和心流着付け教室">
                                                    </a>
                                                </div>
                                                <p class="desc">年間 16 万人をお着付けしている wargo のスタッフが丁寧にレクチャーします！ 初めての方でも安心、着物が好きな方必見！</p>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <a href="<?= home_url()?>/nimotsu">
                                                        <img width="434" height="180" data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-lugg-pc-min-v2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <p class="desc">お荷物をwargoに預けて手ぶらで観光をお楽しみください！wargoではお荷物のお預かり・配送のサービスを提供しております！</p>
                                            </li>
                                            <li>
                                                <div class="img">
                                                    <a href="https://araiba.net/cleaning">
                                                        <img width="434" height="180" data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-top-araiba.jpg" alt="wargo提携クリーニング工房「アライバ」では、着物のクリーニング3,980円、年間保管を980円でご提供しております！">
                                                    </a>
                                                </div>
                                                <p class="desc">wargo提携クリーニング工房「アライバ」では、着物のクリーニング3,980円、年間保管を980円でご提供しております！</p>
                                            </li>
                                        </ul>
                                    </section>
                                    <section class="section-news">
                                        <div class="wrap-title">
                                            <p class="main-title">News</p>
                                            <h2 class="sub-title">ニュース</h2>
                                        </div>
                                        <?php echo do_shortcode('[TopNewsHighEndV3]'); ?>
                                    </section>
<!--                                    <section class="section-category">-->
<!--                                        <div class="wrap-title">-->
<!--                                            <p class="main-title">Category</p>-->
<!--                                            <h2 class="sub-title">カテゴリーからお客様にピッタリなものを選択する!</h2>-->
<!--                                        </div>-->
<!--                                        <div class="wrap-category-list">-->
<!--                                            --><?php ////get_sidebar('landing-page') ?>
<!--                                        </div>-->
<!--                                    </section>-->

                                    <section class="section-photo-gallery">
                                        <div class="wrap-title">
                                            <p class="main-title"><?php echo Yii::t('kimono-v3', 'Photo Gallery'); ?></p>
                                            <h2 class="sub-title"><?php echo Yii::t('kimono-v3', 'ご利用いただいたお客様のコーデをご紹介♪'); ?></h2>
                                        </div>
                                        <div class="wrap-slider-photo-gallery">
                                            <?php echo do_shortcode('[WidgetPhotoGalleryTopPageV3]'); ?>
                                            <div class="wrap-link-btn flexbox justify-content-center">
                                                <a class="link-to" href="<?= home_url()?>/gallery"><?php echo Yii::t('kimono-v3', 'お客様のコーディネートをもっと見る'); ?></a>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="section-kyoto-column">
                                        <div class="wrap-title">
                                            <p class="main-title">Kyoto Column</p>
                                            <h2 class="sub-title">着物レンタルwargoの京都おすすめコラムをご紹介！</h2>
                                        </div>
                                        <?php echo do_shortcode('[kimono_recommend_spot_v3]'); ?>
                                    </section>
                                    <section class="section-spot-ranking">
                                        <div class="wrap-title">
                                            <p class="main-title">Kimono Spot Ranking</p>
                                            <h2 class="sub-title">着物で散策するなら絶対に外せない！</h2>
                                        </div>
                                        <div class="wrap-info-spot-ranking">
                                            <div class="wrap-items-spot-ranking wrap-spot-ranking-01 flexbox">
                                                <div class="wrap-img-spot-ranking">
                                                    <img width="600" height="246" data-src="<?= home_url()?>/images/landing-page/img-ranking-landing-01.jpg?ver=12022020">
                                                </div>
                                                <div class="wrap-content-spot-ranking">
                                                    <div class="wrap-title-content-spot flexbox">
                                                        <div class="ranking-icon ranking-icon-01"><p class="icon-fa icon-fa-01"></p></div>
                                                        <h3 class="ranking-sub-title">八坂庚申堂<var class="sm-text-ranking">(やさかこうしんどう)</var></h3>
                                                    </div>
                                                    <div class="wrap-des-spot-ranking">
                                                        <p class="des-spot-ranking">祇園で今一番アツいSNSスポット!カラフルなお手玉のような「くくり猿」 という願掛けのお守りがたくさん連なるスポットが、この八坂庚申堂(やさかこうしんどう)カラフルなくくり猿に囲まれて写真を撮るだけでインスタ映え間違いなし!?</p>
                                                    </div>
                                                    <div class="wrap-relate-spot-ranking">
                                                        <p class="text-relate">八坂庚申堂から近い店舗</p>
                                                        <ul class="list-button-relate flexbox">
                                                            <li class="items-button-relate">
                                                                <a href="<?= home_url()?>/access/kyoto-area/gion-area/gion-shijo"><p class="text-link-shop">祇園四条店</p></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-items-spot-ranking wrap-spot-ranking-02 flexbox">
                                                <div class="wrap-img-spot-ranking">
                                                    <img width="600" height="246" data-src="<?= home_url()?>/images/landing-page/img-ranking-landing-02.jpg?ver=12022020">
                                                </div>
                                                <div class="wrap-content-spot-ranking">
                                                    <div class="wrap-title-content-spot flexbox">
                                                        <div class="ranking-icon ranking-icon-02"><p class="icon-fa icon-fa-02"></p></div>
                                                        <h3 class="ranking-sub-title">キモノフォレスト</h3>
                                                    </div>
                                                    <div class="wrap-des-spot-ranking">
                                                        <p class="des-spot-ranking">嵐山駅を降りた所に広がる、キモノフォレスト。このポールの中には京友禅 の生地が入っており色鮮やかな景色があなたをお迎え!夜はライトアップも されるので、昼でも夜でも楽しめるのが魅力。ゆったり着物を着て散歩をしてみてはいかがでしょうか。</p>
                                                    </div>
                                                    <div class="wrap-relate-spot-ranking">
                                                        <p class="text-relate">キモノフォレストから近い店舗</p>
                                                        <ul class="list-button-relate flexbox">
                                                            <li class="items-button-relate">
                                                                <a href="<?= home_url()?>/access/kyoto-area/arashiyama-area/arashiyama"><p class="text-link-shop">嵐山駅前店</p></a>
                                                            </li>
                                                            <li class="items-button-relate">
                                                                <a href="<?= home_url()?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo"><p class="text-link-shop">嵐山渡月橋店</p></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-items-spot-ranking wrap-spot-ranking-03 flexbox">
                                                <div class="wrap-img-spot-ranking">
                                                    <img width="600" height="246" data-src="<?= home_url()?>/images/landing-page/img-ranking-landing-03.jpg?ver=12022020">
                                                </div>
                                                <div class="wrap-content-spot-ranking">
                                                    <div class="wrap-title-content-spot flexbox">
                                                        <div class="ranking-icon ranking-icon-03"><p class="icon-fa icon-fa-03"></p></div>
                                                        <h3 class="ranking-sub-title">清水寺<var class="sm-text-ranking">(きよみずでら)</var></h3>
                                                    </div>
                                                    <div class="wrap-des-spot-ranking">
                                                        <p class="des-spot-ranking">京都でも屈指の人気観光スポット！一年中多くの人が訪れています。清水寺自体ももちろんのこと、近年では周辺にもおしゃれカフェやスイーツ店が多く賑わってます♪<br>定番スポットだからこそ、着物でばっちりおめかししちゃおう！</p>
                                                    </div>
                                                    <div class="wrap-relate-spot-ranking">
                                                        <p class="text-relate">清水寺から近い店舗</p>
                                                        <ul class="list-button-relate flexbox">
                                                            <li class="items-button-relate">
                                                                <a href="<?= home_url()?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka"><p class="text-link-shop">京都清水坂店</p></a>
                                                            </li>
<!--                                                            <li class="items-button-relate">-->
<!--                                                                <a href="--><?//= home_url()?><!--/access/kyoto-area/kiyomizu-area/chawanzaka"><p class="text-link-shop">清水寺茶わん坂店</p></a>-->
<!--                                                            </li>-->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="section-kimono-column">
                                        <div class="wrap-title">
                                            <p class="main-title">Kimono Column</p>
                                            <h2 class="sub-title">正しく、美しく、着物を着るために</h2>
                                        </div>
                                        <?php echo do_shortcode('[kimono_column_v3]'); ?>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>
    <section class="banner-section">
        <ul class="list-banner" id="top-slider">
            <?php // Begin: For Main Banner PC ?>
            <?php if ( get_field('main_banner_top_kimono_v3_pc') ) : ?>
                <?php echo php_set_base_url(get_field('main_banner_top_kimono_v3_pc')); ?>
            <?php endif; ?>
            <?php // End: For Main Banner PC ?>
        </ul>
    </section>
    <section class="section-intro">
        <div class="wrap-title-other">
            <p class="main-title">POINT!</p>
            <h2 class="title">wargoを選ぶ6つの理由</h2>
        </div>
        <ul class="list-items-option-point flexbox">
            <li class="items-option-point items-option-point-01 flexbox">
                <p class="icon-option-point option-point-01"></p>
                <p class="infor-option-point flexbox">
                    <span class="infor-top">日本最大級</span>
                    <span class="infor-bottom color-yellow">全国<var class="text-biger-bottom">20</var>店舗</span>
                </p>
            </li>
            <li class="items-option-point items-option-point-02 flexbox">
                <p class="icon-option-point option-point-02"></p>
                <p class="infor-option-point flexbox">
                    <span class="infor-top">最新着物</span>
                    <span class="infor-bottom color-yellow"><var class="text-biger-bottom">20,000</var>着以上</span>
                </p>
            </li>
            <li class="items-option-point items-option-point-03 flexbox">
                <p class="icon-option-point option-point-03"></p>
                <p class="infor-option-point flexbox">
                    <span class="infor-top">着物の着付け</span>
                    <span class="infor-bottom color-yellow"><var class="text-biger-bottom">無料!</var></span>
                </p>
            </li>
            <li class="items-option-point items-option-point-04 flexbox">
                <p class="icon-option-point option-point-04"></p>
                <p class="infor-option-point flexbox">
                    <span class="infor-top">最安プランが</span>
                    <span class="infor-bottom color-yellow"><var class="text-biger-bottom">￥3,000～</var></span>
                </p>
            </li>
            <li class="items-option-point items-option-point-05 flexbox">
                <p class="icon-option-point option-point-05"></p>
                <p class="infor-option-point flexbox">
                    <span class="infor-top">フルセット</span>
                    <span class="infor-bottom color-yellow">小物8点無料</span>
                </p>
            </li>
            <li class="items-option-point items-option-point-06 flexbox">
                <p class="icon-option-point option-point-06"></p>
                <p class="infor-option-point flexbox">
                    <span class="infor-top">手ぶらで</span>
                    <span class="infor-bottom color-yellow"><var class="text-biger-bottom">OK!!</var></span>
                </p>
            </li>
        </ul>
        <h2 class="intro-title">京都最大級！圧倒的低価格で種類豊富に格安レンタル可能♪</h2>
    </section>
    <section class="section-shoplist" style="display:none;">
        <div class="container-box">
            <div class="wrap-title-other">
                <p class="main-title">Shop List</p>
                <h2 class="title">全国20店舗で展開中！</h2>
            </div>
            <p class="area-title">京都・大阪エリア</p>
            <ul class="shoplist flexbox">
                <li class="shoplist-item">
                    <a href="https://kyotokimono-rental.com/access/kyoto-area/station-area/kyotostation" class="shop-link">
                        <h3>京都タワーサンド店</h3>
                    </a>
                    <p class="shop-desc">京都駅徒歩2分！</p>
                </li>
                <li class="shoplist-item">
                    <a href="https://kyotokimono-rental.com/access/kyoto-area/gion-area/gion-nishiki" class="shop-link">
                        <h3>京都祇園錦店</h3>
                    </a>
                    <p class="shop-desc">八坂神社すぐそば♪</p>
                </li>
                <li class="shoplist-item">
                    <a href="https://kyotokimono-rental.com/access/kyoto-area/arashiyama-area/arashiyama" class="shop-link">
                        <h3>京都嵐山駅前店</h3>
                    </a>
                    <p class="shop-desc">渡月橋まで徒歩2分</p>
                </li>
                <li class="shoplist-item">
                    <a href="https://kyotokimono-rental.com/access/kyoto-area/kiyomizu-area/kiyomizuzaka" class="shop-link">
                        <h3>京都清水坂店</h3>
                    </a>
                    <p class="shop-desc">清水寺より徒歩1分</p>
                </li>
                <!--                <li class="shoplist-item">-->
                <!--                    <a href="--><!--?//= home_url()?--><!--/access/kyoto-area/kiyomizu-area/chawanzaka" class="shop-link">-->
                <!--                        <h3>京都清水寺茶わん坂店</h3>-->
                <!--                    </a>-->
                <!--                    <p class="shop-desc">清水寺エリア2店舗目!</p>-->
                <!--                </li>-->
                <li class="shoplist-item">
                    <a href="https://kyotokimono-rental.com/access/kyoto-area/station-area/formal-kyototower" class="shop-link">
                        <h3>フォーマル京都タワー店</h3>
                    </a>
                    <p class="shop-desc">京都随一の冠婚葬祭きもの専門店</p>
                </li>
                <li class="shoplist-item">
                    <a href="https://kyotokimono-rental.com/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo" class="shop-link">
                        <h3>京都嵐山渡月橋店</h3>
                    </a>
                    <p class="shop-desc">渡月橋まで徒歩5分</p>
                </li>
                <li class="shoplist-item">
                    <a href="https://kyotokimono-rental.com/access/kyoto-area/kiyomizu-area/ninenzaka" class="shop-link">
                        <h3>京都清水寺二年坂店</h3>
                    </a>
                    <p class="shop-desc">アンティーク着物専門店♪</p>
                </li>


                <li class="shoplist-item">
                    <a href="https://kyotokimono-rental.com/access/osaka-area/osaka-shinsaibashi-opa" class="shop-link">
                        <h3>大阪心斎橋店</h3>
                    </a>
                    <p class="shop-desc">心斎橋駅徒歩5分!OPAキレイ館2F</p>
                </li>
                <li class="shoplist-item item-flex other-shop">
                    <a href="javascript:void(0)" class="shop-link">
                        <h3>その他の地域の店舗</h3>
                    </a>
                    <p class="shop-desc">浅草、鎌倉、金沢で観光♪</p>
                    <ul class="other-shop-list">
                        <li>
                            <a href="https://kyotokimono-rental.com/access/kamakura-area/kamakura">鎌倉小町店</a>
                        </li>
                        <li>
                            <a href="https://kyotokimono-rental.com/access/kanazawa-area/kanazawa">金沢店</a>
                        </li>
                        <li>
                            <a href="https://kyotokimono-rental.com/formal/access/tokyo-area/ginza-honten">銀座本店</a>
                        </li>
                        <li>
                            <a href="https://kyotokimono-rental.com/access/tokyo-area/shinjuku-area/shinjuku-station">新宿駅前店</a>
                        </li>
                        <li>
                            <a href="https://kyotokimono-rental.com/access/asakusa-area/asakusa">東京浅草店</a>
                        </li>
                        <li>
                            <a href="https://kyotokimono-rental.com/access/asakusa-area/tokyoskytree">東京スカイツリータウンソラマチ店</a>
                        </li>
                        <li>
                            <a href="https://kyotokimono-rental.com/formal/access/sapporo-area/sapporo-susukinostation">札幌すすきの駅前店</a>
                        </li>
                        <li>
                            <a href="https://kyotokimono-rental.com/access/fukuoka-area/dazaifu">太宰府天満宮前店</a>
                        </li>
                        <li>
                            <a href="https://kyotokimono-rental.com/formal/access/tohoku-area/sendai-parco2">仙台駅前店</a>
                        </li>
                        <li>
                            <a href="https://kyotokimono-rental.com/access/okayama-area/kurashiki">倉敷美観地区店</a>
                        </li>
                        <li><a href="https://kyotokimono-rental.com/formal/access/tokyo-area/hakata">福岡博多店</a></li>
                        <!--                        <li>-->
                        <!--                            <a href="--><!--?//= home_url() ?--><!--/access/okinawa-area/okinawa-naha">沖縄那覇店</a>-->
                        <!--                        </li>-->
                    </ul>
                </li>
                <li class="shoplist-item item-flex last">
                    <a href="https://kyotokimono-rental.com/access" class="shop-link">空き状況をチェック！</a>
                </li></ul>
        </div>
    </section>
    <div class="wrap-highend-v3">
        <div class="wrap-content-v3">

            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column">
                                <?php get_sidebar('top-page-left-v3') ?>
                            </div>
                            <div class="right-column right-column-top-v3">
                                <!--<section class="plan-section">
                                    <div class="wrap-title">
                                        <p class="main-title">Yukata Plan</p>
                                        <h2 class="sub-title">浴衣のおすすめレンタルプランを見る</h2>
                                    </div>
                                    <div class="plan-intro-desc">
                                        <p>きものレンタル wargo では、着付け代・小物代を全て無料でご提供しております！</p>
                                        <p>どのプランも手ぶらで OK。和小物専門店も全国展開している wargo だからこそ、バッグや下駄の種類も豊富でかんざしや
                                            アクセサリーも可愛いくておしゃれにコーディネート！簡単即日予約・お得な事前 WEB 決済あり。お得なカップルプラン
                                            もご用意しておりますので、浴衣デート、花火大会デートにもおすすめです！予約なし当日予約も承っております！</p>
                                    </div>
                                    <ul class="plan-list">
                                        <li>
                                            <div class="plan-img">
                                                <a href="<?= home_url()?>/yukata/plan#Standard-Yukata">
                                                    <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-pc-01.jpg" alt="選べるスタンダード浴衣プラン">
                                                </a>
                                            </div>
                                            <div class="plan-info">
                                                <a href="<?= home_url()?>/yukata/plan#Standard-Yukata">
                                                    <h3>
                                                        <p class="plan-intro">迷ったらこのプラン！</p>
                                                        <p class="plan-name">選べるスタンダード浴衣プラン</p>
                                                    </h3>
                                                    <p class="plan-price">￥2,980-</p>
                                                </a>
                                                <span class="show-desc">こちらのプランのご説明はこちら</span>
                                                <div class="plan-desc">
                                                    かわいいのにプチプライス♪でお得感満載！京都きものレンタルwargoの最安スタンダード浴衣プランのご紹介です。スタンダード浴衣は初めて浴衣レンタルを体験する、安く手軽に浴衣を体験したいというお客様にピッタリ。また、落ち着いた色味が清楚な雰囲気を醸し出す、古典柄の浴衣を選びたい方には特にレパートリーが充実しています。シンプルなデザインに帯や小物でピリッと挿し色を効かせた、シックなコーディネートを楽しみたい方にもオススメです。
                                                </div>
                                            </div>
                                            <div class="wrap-main-btn">
                                                <a href="<?= home_url()?>/yukata/plan#Standard-Yukata" class="plan-btn">このプランを予約する</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan-img">
                                                <a href="<?= home_url()?>/yukata/plan#Couple-Standard-Yukata">
                                                    <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-pc-02.jpg" alt="カップル浴衣プラン">
                                                </a>
                                            </div>
                                            <div class="plan-info">
                                                <a href="<?= home_url()?>/yukata/plan#Couple-Standard-Yukata">
                                                    <h3>
                                                        <p class="plan-intro">恋人との夏の思い出に…</p>
                                                        <p class="plan-name">カップル浴衣プラン</p>
                                                    </h3>
                                                    <p class="plan-price">￥5,760-</p>
                                                </a>
                                                <span class="show-desc">こちらのプランのご説明はこちら</span>
                                                <div class="plan-desc">
                                                    京都最安級のスタンダード浴衣をカップルの方にはさらにお得なプライスでご提供いたします。激安でもおしゃれな浴衣に小物類、プロによる着付けまですべてがセットになっています！夏祭りや花火大会ももちろん、観光にもおすすめのカップルさん専用プランです！涼しげな雰囲気で普段とは一味違う夏のデートを浴衣で演出できます。
                                                </div>
                                            </div>
                                            <div class="wrap-main-btn">
                                                <a href="<?= home_url()?>/yukata/plan#Couple-Standard-Yukata" class="plan-btn">このプランを予約する</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan-img">
                                                <a href="<?= home_url()?>/yukata/plan#Mamechiyo-Yukata">
                                                    <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-pc-03.jpg" alt="豆千代モダン浴衣プラン">
                                                </a>
                                            </div>
                                            <div class="plan-info">
                                                <a href="<?= home_url()?>/yukata/plan#Mamechiyo-Yukata">
                                                    <h3>
                                                        <p class="plan-intro">豆千代モダンの浴衣レンタルは wargo だけ！</p>
                                                        <p class="plan-name">豆千代モダン浴衣プラン</p>
                                                    </h3>
                                                    <p class="plan-price">￥5,980-</p>
                                                </a>
                                                <span class="show-desc">こちらのプランのご説明はこちら</span>
                                                <div class="plan-desc">
                                                    レンタル浴衣を扱うお店はあまたあれど、豆千代モダンの浴衣がレンタルできるのはwargoだけ！夏をイメージする植物や生き物をはじめ、実に多彩なモチーフと革新的なデザインは、豆千代様の世界観を余すところなくお楽しみいただける素晴らしい逸品ばかり。戦後最大級の着物リバイバル牽引者と言われる豆千代様デザインによる着物ブランド「豆千代モダン」の浴衣を公式レンタルできる地域限定特別プラン。和モダン通なら知らない人はいない、豆千代モダンの浴衣を心行くまでご堪能ください。
                                                </div>
                                            </div>
                                            <div class="wrap-main-btn">
                                                <a href="<?= home_url()?>/yukata/plan#Mamechiyo-Yukata" class="plan-btn">このプランを予約する</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan-img">
                                                <a href="<?= home_url()?>/yukata/plan#Brand-Yukata">
                                                    <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-pc-04.jpg" alt="ブランド浴衣プラン">
                                                </a>
                                            </div>
                                            <div class="plan-info">
                                                <a href="<?= home_url()?>/yukata/plan#Brand-Yukata">
                                                    <h3>
                                                        <p class="plan-intro">ブランド浴衣勢揃い！</p>
                                                        <p class="plan-name">ブランド浴衣プラン</p>
                                                    </h3>
                                                    <p class="plan-price">￥5,980-</p>
                                                </a>
                                                <span class="show-desc">こちらのプランのご説明はこちら</span>
                                                <div class="plan-desc">
                                                    有名ブランドが手掛けた意匠性の高い地域限定特別プラン。名のある デザイナー描いたデザインはもちろん、織に工夫を凝らした透け感が 涼しげな変わり織りや吸汗・速乾など機能的に優れた繊維など生地に もこだわりのある浴衣が多いのも特徴です。小物に凝って華やかさを 増せば、ホテルのビアガーデンからの花火見物やプールサイドでのお 誕生日パーティなどやや格式を意識したい場でも一目置かれるコー ディネートが楽しめます。
                                                </div>
                                            </div>
                                            <div class="wrap-main-btn">
                                                <a href="<?= home_url()?>/yukata/plan#Brand-Yukata" class="plan-btn">このプランを予約する</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan-img">
                                                <a href="<?= home_url()?>/yukata/plan#Men-Yukata">
                                                    <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-pc-05.jpg" alt="メンズ浴衣プラン">
                                                </a>
                                            </div>
                                            <div class="plan-info">
                                                <a href="<?= home_url()?>/yukata/plan#Men-Yukata">
                                                    <h3>
                                                        <p class="plan-intro">粋でいなせな日本男児におすすめ浴衣プラン！</p>
                                                        <p class="plan-name">メンズ浴衣プラン</p>
                                                    </h3>
                                                    <p class="plan-price">￥2,980-</p>
                                                </a>
                                                <span class="show-desc">こちらのプランのご説明はこちら</span>
                                                <div class="plan-desc">
                                                    おしゃれな夏のスタイリングに、柄物・無地物取り揃えた男性のお客様向けの浴衣セットプラン。花火大会やお祭りの多い夏は、普段袖を通すことのない和装をお召しになりたいという男性のお客様がたくさんいらっしゃります。様々な年代のお客様にお楽しみいただけるよう、若向きには大きな柄や明るい色使い、ご年配には渋めの色合いに上質な織りの無地、など幅広い色柄を取り揃えております。
                                                </div>
                                            </div>
                                            <div class="wrap-main-btn">
                                                <a href="<?= home_url()?>/yukata/plan#Men-Yukata" class="plan-btn">このプランを予約する</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="plan-img">
                                                <a href="<?= home_url()?>/yukata/plan#Girl-Yukata">
                                                    <img data-src="<?= WP_HOME ?>/images/yukata-v2/yukata-plan-pc-06.jpg" alt="子供浴衣プラン">
                                                </a>
                                            </div>
                                            <div class="plan-info">
                                                <a href="<?= home_url()?>/yukata/plan#Girl-Yukata">
                                                    <h3>
                                                        <p class="plan-intro">子供だってカワイイ浴衣を楽しみたい！</p>
                                                        <p class="plan-name">子供浴衣プラン</p>
                                                    </h3>
                                                    <p class="plan-price">￥2,980-</p>
                                                </a>
                                                <span class="show-desc">こちらのプランのご説明はこちら</span>
                                                <div class="plan-desc">
                                                    男の子も女の子も、伝統的な金魚や帆船モチーフをはじめ大人顔負けのレトロモダンテイストまで、3歳から10歳（身長90-130cm）くらいまでのお子さま向け浴衣セットのプランです。外国人のお子さまにも大人気。兵児帯タイプの帯は大人用の帯とは違いやわらかい素材のため、苦しくならず丸1日おでかけにもおすすめです。
                                                </div>
                                            </div>
                                            <div class="wrap-main-btn">
                                                <a href="<?= home_url()?>/yukata/plan#Girl-Yukata" class="plan-btn">このプランを予約する</a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="wrap-link-btn flexbox justify-content-center">
                                        <a class="link-to" href="<?= home_url()?>/yukata/plan">浴衣レンタルプラン一覧を見る</a>
                                    </div>
                                </section>-->

<!--                                <section class="section-banner-mid">-->
<!--                                    <div class="banner-child-top">-->
<!--                                        <a href="--><?//= home_url()?><!--/kimono">-->
<!--                                            <img data-src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/banner-new-top-child-pc.jpg" alt="観光着物誘導バナー">-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </section>-->
                                <?php
                                $today = intval(date("Ymd"));
                                if($today > 20200831){ ?>
		                            <section class="plan-section">
			                            <div class="wrap-title">
				                            <p class="main-title">Kimono Plan</p>
				                            <h2 class="sub-title">着物のおすすめレンタルプランを見る</h2>
			                            </div>
			                            <div class="plan-intro-desc">
				                            <p>9000着の着物は着付け無料！足袋無料！かんざしレンタル無料！着付け小物込3,000円～。</p>
				                            <p>簡単ネット即日予約･お得な事前WEB決済あり。カップル様用のレンタルプランもご用意しておりますので、お着物での京<br>都スポットデートもおすすめ!!予約なし当日ご来店申込もOKです!!</p>
			                            </div>
			                            <ul class="plan-list">
				                            <li>
					                            <div class="plan-img">
						                            <a href="<?= home_url()?>/kimono#Standard-Kimono">
							                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-pc-01.jpg?ver=12022020" alt="選べるスタンダードプラン">
						                            </a>
					                            </div>
					                            <div class="plan-info">
						                            <a href="<?= home_url()?>/kimono#Standard-Kimono">
							                            <h3>
								                            <p class="plan-intro">迷ったらこのプラン！</p>
								                            <p class="plan-name">選べるスタンダードプラン</p>
							                            </h3>
							                            <p class="plan-price">
								                            <span>￥3,000-</span>
								                            <span class="sm-price">(税込 ¥3,300-)</span>
							                            </p>
						                            </a>
						                            <span class="show-desc">こちらのプランのご説明はこちら</span>
						                            <div class="plan-desc">
							                            学生さん一番人気のプチプラ最安プラン。初めて着物をレンタルする、安く手軽に着物を体験したいというお客様におすすめです。「着物」らしいベーシックなデザインと、可愛らしくも落ち着いた雰囲気にもなれる幅広い色展開が特徴です。帯や小物の組み合わせで、ピリッと挿し色の効いたコーディネートを楽しみたい方にも人気です。
						                            </div>
					                            </div>
					                            <div class="wrap-main-btn">
						                            <a href="<?= home_url()?>/kimono#Standard-Kimono" class="plan-btn">このプランを予約する</a>
					                            </div>
				                            </li>
				                            <li>
					                            <div class="plan-img">
						                            <a href="<?= home_url()?>/kimono#Couple-Standard-Kimono">
							                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-pc-02.jpg?ver=12022020" alt="カップルプラン">
						                            </a>
					                            </div>
					                            <div class="plan-info">
						                            <a href="<?= home_url()?>/kimono#Couple-Standard-Kimono">
							                            <h3>
								                            <p class="plan-intro">カップルでお得に♪</p>
								                            <p class="plan-name">カップルプラン</p>
							                            </h3>
							                            <p class="plan-price">
								                            <span>￥5,000-</span>
								                            <span class="sm-price">(税込 ¥5,500-)</span>
							                            </p>
						                            </a>
						                            <span class="show-desc">こちらのプランのご説明はこちら</span>
						                            <div class="plan-desc">
							                            「着物」らしいベーシックなデザイン＆プチプラで女子学生さん一番人気の女性向けスタンダード着物プランと、メンズ着物プランがセットになったカップルさん人気の専用プラン。普段のデートで、週末旅行で、誕生日や結婚記念日でと、様々なデートシーンをより一層楽しく演出したいカップルさんにおすすめです。
						                            </div>
					                            </div>
					                            <div class="wrap-main-btn">
						                            <a href="<?= home_url()?>/kimono#Couple-Standard-Kimono" class="plan-btn">このプランを予約する</a>
					                            </div>
				                            </li>
				                            <li>
					                            <div class="plan-img">
						                            <a href="<?= home_url()?>/kimono#Antique-Kimono">
							                            <img data-src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/12/antique-kimono-pc.jpg" alt="アンティーク正絹着物プラン">
						                            </a>
					                            </div>
					                            <div class="plan-info">
						                            <a href="<?= home_url()?>/kimono#Antique-Kimono">
							                            <h3>
								                            <p class="plan-intro">個性派揃いの本格着物</p>
								                            <p class="plan-name">アンティーク正絹着物プラン</p>
							                            </h3>
							                            <p class="plan-price">
								                            <span>￥5,000-</span>
								                            <span class="sm-price">(税込 ¥5,500-)</span>
							                            </p>
						                            </a>
						                            <span class="show-desc">こちらのプランのご説明はこちら</span>
						                            <div class="plan-desc">
							                            正絹のアンティーク着物をご利用いただける特別プランです。ビンテージ調のシックなものから大人かわいいお着物まで、色々なテイストからお選びいただけます。多様な金糸銀糸の入った豪華な半幅帯と組み合わせますが、名古屋帯のオプションご利用も人気です。同窓会やお誕生日の会食などドレスアップしたい外出予定のお客様にもおすすめです。
						                            </div>
					                            </div>
					                            <div class="wrap-main-btn">
						                            <a href="<?= home_url()?>/kimono#Antique-Kimono" class="plan-btn">このプランを予約する</a>
					                            </div>
				                            </li>
				                            <li>
					                            <div class="plan-img">
						                            <a href="<?= home_url()?>/kimono#Taishoroman-Kimono">
							                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-pc-04.jpg?ver=20223103" alt="大正ロマンプラン">
						                            </a>
					                            </div>
					                            <div class="plan-info">
						                            <a href="<?= home_url()?>/kimono#Taishoroman-Kimono">
							                            <h3>
								                            <p class="plan-intro">袴姿がかわいい！はいからさんスタイル</p>
								                            <p class="plan-name">大正ロマンプラン</p>
							                            </h3>
							                            <p class="plan-price">
								                            <span>￥5,000-</span>
								                            <span class="sm-price">(税込 ¥5,500-)</span>
							                            </p>
						                            </a>
						                            <span class="show-desc">こちらのプランのご説明はこちら</span>
						                            <div class="plan-desc">
							                            袴姿がかわいい、華やかなはいからさんコーデができるプランです。大正ロマンプランは、歴史ある寺社仏閣でもレンガが美しい洋館でも映えて他のプランとは少し異なる、ノスタルジックな雰囲気を感じたいお客様におすすめです。袴は色違いを選んで双子コーデも楽しめます。
						                            </div>
					                            </div>
					                            <div class="wrap-main-btn">
						                            <a href="<?= home_url()?>/kimono#Taishoroman-Kimono" class="plan-btn">このプランを予約する</a>
					                            </div>
				                            </li>
				                            <li>
					                            <div class="plan-img">
						                            <a href="<?= home_url()?>/kimono#Men-Kimono">
							                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-pc-05.jpg?ver=12022020" alt="メンズプラン">
						                            </a>
					                            </div>
					                            <div class="plan-info">
						                            <a href="<?= home_url()?>/kimono#Men-Kimono">
							                            <h3>
								                            <p class="plan-intro">いなせに決める男子着物プラン</p>
								                            <p class="plan-name">メンズプラン</p>
							                            </h3>
							                            <p class="plan-price">
								                            <span>￥3,000-</span>
								                            <span class="sm-price">(税込 ¥3,300-)</span>
							                            </p>
						                            </a>
						                            <span class="show-desc">こちらのプランのご説明はこちら</span>
						                            <div class="plan-desc">
							                            表面に筋の入った紬生地の色無地を中心に、着物と羽織をお好きな色味で組合せていただく男性のお客様向けのセットプラン。様々な年代のお客様に着物男子気分を楽しんでいただけるよう、日本人のお客様におすすめの着物らしい渋めの色合いほか、外国人のお客様に人気のハッキリした赤や青など、幅広い色味を取り揃えております。
						                            </div>
					                            </div>
					                            <div class="wrap-main-btn">
						                            <a href="<?= home_url()?>/kimono#Men-Kimono" class="plan-btn">このプランを予約する</a>
					                            </div>
				                            </li>
				                            <li>
					                            <div class="plan-img">
						                            <a href="<?= home_url()?>/kimono#Kimono-Girl">
							                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-kimono-plan-pc-06.jpg?ver=12022020" alt="お子様着物プラン">
						                            </a>
					                            </div>
					                            <div class="plan-info">
						                            <a href="<?= home_url()?>/kimono#Kimono-Girl">
							                            <h3>
								                            <p class="plan-intro">子供でもオシャレ！</p>
								                            <p class="plan-name">お子様着物プラン</p>
							                            </h3>
							                            <p class="plan-price">
								                            <span>￥3,000-</span>
								                            <span class="sm-price">(税込 ¥3,300-)</span>
							                            </p>
						                            </a>
						                            <span class="show-desc">こちらのプランのご説明はこちら</span>
						                            <div class="plan-desc">
							                            外国人のお子さまにも大人気！男の子も女の子も大人顔負けのレトロやモダンなテイストの着物と羽織のアンサンブルで、3歳から10歳（身長90-130cm）くらいまでのお子さま向けセットのプラン。兵児帯タイプの帯は苦しくならず長く着ていただけ、丸1日おでかけのお客様にもおすすめです。
						                            </div>
					                            </div>
					                            <div class="wrap-main-btn">
						                            <a href="<?= home_url()?>/kimono#Kimono-Girl" class="plan-btn">このプランを予約する</a>
					                            </div>
				                            </li>
			                            </ul>
			                            <div class="wrap-link-btn flexbox justify-content-center">
				                            <a class="link-to" href="<?= home_url()?>/kimono">着物レンタルプラン一覧を見る</a>
			                            </div>
		                            </section>
                                <?php } ?>
                                <section class="section-storelist">
                                    <div class="wrap-title">
                                        <p class="main-title">Search Stores</p>
                                        <h2 class="sub-title">お近くの着物レンタル店舗を探す</h2>
                                    </div>
                                    <ul class="storelist">
                                        <li>
                                            <div class="wrap-intro">
                                                <span class="icon">
                                                     <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/icon-metro.svg" alt="">
                                                </span>
                                                <h3 class="store-intro">京都駅から近い店舗をお探しの方</h3>
                                            </div>
                                            <div class="store-content">
                                                <div class="store-img">
                                                    <a href="<?= home_url() ?>/access/kyoto-area/station-area/kyotostation">
                                                        <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-pc-01.jpg?ver=12022020" alt="">
                                                    </a>
                                                </div>
                                                <div class="store-info">
                                                    <h4 class="store-name">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/station-area/kyotostation">京都タワーサンド店</a>
                                                        <span class="show-map">
                                                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/btn-map.svg" alt="">
                                                        </span>
                                                    </h4>
                                                    <p class="store-desc">京都駅から徒歩2分！ 京都タワービル２F</p>
                                                    <div class="store-info">
                                                        <p>営業時間：10：00～18：00</p>
                                                        <p>着付け最終受付時間：17：00</p>
                                                        <p>返却締め切り時間：17：30</p>
                                                        <a href="<?= home_url() ?>/access/kyoto-area/station-area/kyotostation" class="access-link">店舗情報</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="store-map">
                                                <iframe title="kyotostation shop location" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.7667818770387!2d135.759521!3d34.987505999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108afaeb40191%3A0x6aec2bdbd4a76261!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ2_kuqzpg73pp4XliY3kuqzpg73jgr_jg6_jg7zlupc!5e0!3m2!1sen!2sjp!4v1440470968676" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="wrap-intro">
                                                <span class="icon temple">
                                                     <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/icon-temple.svg" alt="">
                                                </span>
                                                <h3 class="store-intro">京都祇園から近い店舗をお探しの方</h3>
                                            </div>
                                            <div class="store-content">
                                                <div class="store-img">
                                                    <a href="<?= home_url() ?>/access/kyoto-area/gion-area/gion-nishiki">
                                                        <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-pc-02.jpg?ver=12022020" alt="">
                                                    </a>
                                                </div>
                                                <div class="store-info">
                                                    <h4 class="store-name">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/gion-area/gion-nishiki">京都祇園錦店</a>
                                                        <span class="show-map">
                                                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/btn-map.svg" alt="">
                                                        </span>
                                                    </h4>
                                                    <p class="store-desc">烏丸駅徒歩2分</p>
                                                    <div class="store-info">
                                                        <p>営業時間：10:00～18:00</p>
                                                        <p>着付け最終受付時間：17:00</p>
                                                        <p>返却締め切り時間：17:30</p>
                                                        <a href="<?= home_url() ?>/access/kyoto-area/gion-area/gion-nishiki" class="access-link">店舗情報</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="store-map">
                                                <iframe title="gion-shijo-location" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.13356926634!2d135.770546!3d35.0033614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108c0384c9c11%3A0x74d0f0f4cf17e285!2z552A54mp44Os44Oz44K_44OrIHdhcmdvIOelh-WckuWbm-adoeW6lw!5e0!3m2!1sja!2s!4v1554969885627!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                            </div>
                                        </li>
                                        <li class="two-store" style="display:none;">
                                            <div class="wrap-intro">
                                                <span class="icon">
                                                     <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/icon-metro.svg" alt="">
                                                </span>
                                                <h3 class="store-intro">京都嵐山駅から近い店舗をお探しの方</h3>
                                            </div>
                                            <div class="store-content">
                                                <div class="store-img">
                                                    <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama">
                                                        <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-pc-03.jpg?ver=12022020" alt="">
                                                    </a>
                                                </div>
                                                <div class="store-info">
                                                    <h4 class="store-name">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama">嵐山駅前店</a>
                                                        <span class="show-map">
                                                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/btn-map.svg" alt="">
                                                        </span>
                                                    </h4>
                                                    <p class="store-desc">嵯峨嵐山駅すぐそば！</p>
                                                    <div class="store-info">
                                                        <p>営業時間：09：00～18：00</p>
                                                        <p>着付け最終受付時間：17：00</p>
                                                        <p>返却締め切り時間：17：30</p>
                                                        <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama" class="access-link">店舗情報</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="store-map">
                                                <iframe title="arashiyama shop location" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.552242646899!2d135.67893601524065!3d35.017912080354265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001a9fc2aa5637d%3A0xba3490117d1fa05c!2z5Lqs6YO9552A54mp44Os44Oz44K_44Ord2FyZ28g5bWQ5bGx6aeF5YmN5bqX!5e0!3m2!1sja!2s!4v1554970037632!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                            </div>
                                            <div class="store-content last">
                                                <div class="store-img">
                                                    <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">
                                                        <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-pc-04.jpg?ver=12022020" alt="">
                                                    </a>
                                                </div>
                                                <div class="store-info">
                                                    <h4 class="store-name">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo" >嵐山渡月橋店</a>
                                                        <span class="show-map">
                                                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/btn-map.svg" alt="">
                                                        </span>
                                                    </h4>
                                                    <p class="store-desc">嵐電嵐山駅すぐそば！</p>
                                                    <div class="store-info">
                                                        <p>営業時間：09：00～18：00</p>
                                                        <p>着付け最終受付時間：17：00</p>
                                                        <p>返却締め切り時間：17：30</p>
                                                        <a href="<?= home_url() ?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo" class="access-link">店舗情報</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="store-map">
                                                <iframe title="arashiyama togetsukyo shop location" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3267.5891396643588!2d135.67762!3d35.0169887!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001a9ffb241ec69%3A0x599f8306ca8cb748!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5bWQ5bGx5rih5pyI5qmL5bqX!5e0!3m2!1sja!2s!4v1554970117637!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                            </div>
                                        </li>
                                        <!--<li class="two-store">
                                            <div class="wrap-intro">
                                                <span class="icon temple">
                                                     <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/icon-temple.svg" alt="">
                                                </span>
                                                <h3 class="store-intro">清水寺から近い店舗をお探しの方</h3>
                                            </div>
<!--                                            <div class="store-content">-->
<!--                                                <div class="store-img">-->
<!--                                                    <a href="--><?//= home_url() ?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">-->
<!--                                                        <img data-src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/img-store-pc-05.jpg?ver=12022020" alt="">-->
<!--                                                    </a>-->
<!--                                                </div>-->
<!--                                                <div class="store-info">-->
<!--                                                    <h4 class="store-name">-->
<!--                                                        <a href="--><?//= home_url() ?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">清水茶わん坂店</a>-->
<!--                                                        <span class="show-map">-->
<!--                                                            <img data-src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/btn-map.svg" alt="">-->
<!--                                                        </span>-->
<!--                                                    </h4>-->
<!--                                                    <p class="store-desc">清水寺徒歩5分！</p>-->
<!--                                                    <div class="store-info">-->
<!--                                                        <p>営業時間：09：00～18：00</p>-->
<!--                                                        <p>着付け最終受付時間：17：00</p>-->
<!--                                                        <p>返却締め切り時間：17：30</p>-->
<!--                                                        <a href="--><?//= home_url() ?><!--/access/kyoto-area/kiyomizu-area/chawanzaka" class="access-link">店舗情報</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="store-map">-->
<!--                                                <iframe title="chawanzaka shop location" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.465770121249!2d135.780176!3d34.995044!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa29b5203ac8a311b!2z5Lqs6YO95riF5rC06Iy244KP44KT5Z2CIOWMl-aWjuOCsOODqeODleOCo-ODg-OCrw!5e0!3m2!1sja!2s!4v1555650595354!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0"></iframe>-->
<!--                                            </div>-->
											<!--<div class="store-content">
												<div class="store-img">
													<a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/ninenzaka">
														<img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-pc-ninenzaka.jpg" alt="">
													</a>
												</div>
												<div class="store-info">
													<h4 class="store-name">
														<a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/ninenzaka">京都二年坂店</a>
														<span class="show-map">
                                                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/btn-map.svg" alt="">
                                                        </span>
													</h4>
													<p class="store-desc">八坂神社徒歩圏内！二年坂IMAYO本店2階</p>
													<div class="store-info">
														<p>営業時間：10：00～18：00</p>
														<p>着付け最終受付時間：17：00</p>
														<p>返却締め切り時間：17：30</p>
														<a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/ninenzaka" class="access-link">店舗情報</a>
													</div>
												</div>
											</div>
											<div class="store-map">
												<iframe title="ninenzaka shop location" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3268.3477339543856!2d135.7783439!3d34.9979995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60010909154504b9%3A0x229aa7a807feecd6!2z5Lqs6YO95LqM5bm05Z2CSU1BWU_mnKzlupc!5e0!3m2!1sja!2s!4v1611541686933!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
											</div>
                                            <div class="store-content last">
                                                <div class="store-img">
                                                    <a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">
                                                        <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/img-store-pc-06.jpg?ver=12022020" alt="">
                                                    </a>
                                                </div>
                                                <div class="store-info">
                                                    <h4 class="store-name">
                                                        <a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka" >清水坂店</a>
														<span class="closed-tag">
															<img data-src="<?= WP_HOME ?>/images/new-kimono-v3/closed-tag.svg" alt="">
														</span>
                                                        <span class="show-map">
                                                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/btn-map.svg" alt="">
                                                        </span>
                                                    </h4>
                                                    <p class="store-desc">清水寺まで徒歩5分！</p>
                                                    <div class="store-info">
                                                        <p>営業時間：09：00～18：00</p>
                                                        <p>着付け最終受付時間：17：00</p>
                                                        <p>返却締め切り時間：17：30</p>
                                                        <a href="<?= home_url() ?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka" class="access-link">店舗情報</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="store-map">
                                                <iframe title="kiyomizuzaka shop location" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.4430469735985!2d135.77714231524013!3d34.99561298035985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108ce47f344d3%3A0xbfd21c88eaa1748!2z5Lqs6YO944GN44KC44Gu44Os44Oz44K_44Ord2FyZ28g5riF5rC05Z2C5bqX!5e0!3m2!1sja!2s!4v1554969977558!5m2!1sja!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                                            </div>
                                        </li>-->
                                    </ul>
                                    <div class="wrap-link-btn flexbox justify-content-center">
                                        <a class="link-to" href="<?= home_url() ?>/access">その他の地域の店舗を見る</a>
                                    </div>
                                </section>
								<section class="section-option">
									<div class="wrap-title">
										<p class="main-title">Option</p>
										<h2 class="sub-title">人気のオプションをご紹介♪</h2>
									</div>
									<ul class="slider-option">
										<li class="item">
											<div class="img">
												<a href="<?=home_url() ?>/kimono/photo-studio">
													<img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-01.jpg?ver=12022020" alt="写真スタジオ">
												</a>
											</div>
											<p class="img-opt-desc">思い出づくりに写真は欠かせません！綺麗なお召し物と一緒に観光の思い出を残しませんか？
											</p>
										</li>
										<li class="item">
											<div class="img">
												<a href="<?=home_url() ?>/hairset">
													<img data-src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2020/12/hairset-sample-min.jpg" alt="プロのヘアセット師がアレンジ！せっかくだから着物ヘアー">
												</a>
											</div>
											<p class="img-opt-desc">着物も可愛く着るならヘアセットも可愛くアレンジしたい！プロのセット師があなたに似合うヘアをご提案！</p>
										</li>
										<li class="item">
											<div class="img">
												<a href="<?=home_url() ?>/photo-session">
													<img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-03.jpg?ver=12022020" alt="カメラマン同⾏オプション">
												</a>
											</div>
											<p class="img-opt-desc">思い出づくりに写真は欠かせません！綺麗なお召し物と一緒に観光の思い出を残しませんか？
											</p>
										</li>
										<li class="item">
											<div class="img">
												<a href="<?=home_url() ?>/group">
													<img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-04.jpg?ver=12022020" alt="グループ旅⾏・修学旅⾏に！団体着物体験">
												</a>
											</div>
											<p class="img-opt-desc">着物での素敵な思い出を形に残しませんか？京都きものレンタルwargoではプロのカメラマンと提携！</p>
										</li>
										<li class="item">
											<div class="img">
												<a href="<?=home_url() ?>/rickshaw">
													<img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-05.jpg?ver=202003121152" alt="wargoだけの特別特典！お店を出たらすく人力中に">
												</a>
											</div>
											<p class="img-opt-desc">wargoだけの特別特典！着物レンタルをご予約時に人力車をお申し込みいただけば、お店までお迎えにあがります！</p>
										</li>
										<li class="item">
											<div class="img">
												<a href="<?=home_url() ?>/option">
													<img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v3/img-option-v3-06.jpg?ver=12022020" alt="wargoでは、帯やバッグのオプションも種類豊富にご用意しております！">
												</a>
											</div>
											<p class="img-opt-desc">wargoでは、帯やバッグのオプションも種類豊富にご用意しております！ <br>お着物を、もっとお洒落に着こなしたい方におすすめ！</p>
										</li>
									</ul>
								</section>
                                <section class="section-faq">
                                    <div class="wrap-title">
                                        <p class="main-title">FAQ</p>
                                        <h2 class="sub-title">よくある質問</h2>
                                    </div>
                                    <div class="wrap-faq">
                                        <div class="faq-content">
                                            <div class="box-faqs-item-container items">
                                                <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                    <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">何か持っていくものはありますか？</p>
                                                        <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                    </div>
                                                </div>
                                                <div class="box-faqs-item-content"><p class="text-item-content">特にございません。 着物用の下着や足袋、 草履などはプランに含まれています。 京都の冬は大変冷え込みます、 ご心配の方は襟元の開いた薄手のTシャツをお持ちいただければその上から着付けさせていただきます。</p></div>
                                            </div>
                                            <div class="box-faqs-item-container items">
                                                <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                    <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">キャンセルについて教えてください</p>
                                                        <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                    </div>
                                                </div>
                                                <div class="box-faqs-item-content">
                                                    <p class="text-item-content"><?php echo Yii::t('new-top-page-kimono-v3', 'キャンセルの場合はご来店予定日の二日前までご予約確認メールにある項目3「ご予約プランの詳細」リンクからキャンセルをお願い致します。<br/>ただし下記のキャンセル料金が発生いたしますのでご了承ください。<br/>ご利用日］から2日前までのキャンセル：キャンセル料無料<br/>※事務手数料500円(税別)のみ頂きます<br/>［ご利用日］の前日および当日のキャンセル：ご利用料金の100％'); ?></p>
                                                </div>
                                            </div>
                                            <div class="box-faqs-item-container items">
                                                <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                    <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">髪はセットしてもらえますか？</p>
                                                        <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                    </div>
                                                </div>
                                                <div class="box-faqs-item-content"><p class="text-item-content">かんざしを用いた簡単なヘアアレンジを無料で、編みこみで華やかさを演出できるヘアアレンジを有料で承っております。詳しくは、<a href="<?php echo WP_HOME; ?>/kimono/hairset">着物の髪型・ヘアセット</a>をご覧ください。</p></div>
                                            </div>
                                            <div class="box-faqs-item-container items">
                                                <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                    <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">どれくらいの時間がかかりますか？</p>
                                                        <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                    </div>
                                                </div>
                                                <div class="box-faqs-item-content"><p class="text-item-content">通常、所要時間は1時間程度です。ただし、春や秋の混雑時期は少しお待ちいただく場合がありますので予めご了承ください。当日の流れは<a href="<?php echo WP_HOME; ?>/howto">『レンタルの流れ』</a>をご覧ください</p></div>
                                            </div>
                                            <div class="box-faqs-item-container items">
                                                <div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
                                                    <div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">どのプランにするか決められません</p>
                                                        <div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
                                                    </div>
                                                </div>
                                                <div class="box-faqs-item-content"><p class="text-item-content">当日にプランの変更が可能です。お悩みでしたら1番お安いプランでご予約頂き、変更された場合は差額分のお支払いを店頭にてお願い致します。</p></div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="section-topic">
                                    <div class="wrap-title">
                                        <p class="main-title">Topic</p>
                                        <h2 class="sub-title">着物レンタルの人気トピック</h2>
                                    </div>
                                    <ul class="list-topic">
                                        <li>
                                            <div class="img">
                                                <a href="<?= home_url()?>/formal/why-goodvalue">
                                                    <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-topic-01.jpg?ver=12022020" alt="wargoの着物レンタルはなぜこんなに安いのか？">
                                                </a>
                                            </div>
                                            <p class="desc">
                                                wargoの着物がこんなにも安いのはなぜ？？
                                                その驚きの安さの理由はこちら！
                                            </p>
                                        </li>
                                        <li>
                                            <div class="img">
                                                <a href="<?= home_url()?>/hairset">
                                                    <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-topic-02.jpg?ver=12022020" alt="⼈気ヘアスタイル特集">
                                                </a>
                                            </div>
                                            <p class="desc">
                                                着物に似合うヘアスタイルってどんなの？
                                                着物や浴衣にバッチリ決まる人気ヘアスタ
                                                イルをご紹介！
                                            </p>
                                        </li>
                                        <li>
                                            <div class="img">
                                                <a href="<?= home_url()?>/corporation">
                                                    <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-topic-04.jpg?ver=12022020" alt="New Open! 倉敷美観地区店">
                                                </a>
                                            </div>
                                            <p class="desc">
                                                法人様向けに、社内イベント・団体旅行な
                                                どでのお着物レンタルのご紹介や、
                                                弊社との業務提携についてご案内いたします。
                                            </p>
                                        </li>
                                        <li>
                                            <div class="img">
                                                <a href="<?= home_url()?>/lesson">
                                                    <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-topic-lesson.jpg" alt="本格着付け 和心流着付け教室">
                                                </a>
                                            </div>
                                            <p class="desc">年間 16 万人をお着付けしている wargo のスタッフが丁寧にレクチャーします！ 初めての方でも安心、着物が好きな方必見！</p>
                                        </li>
                                        <li>
                                            <div class="img">
                                                <a href="<?= home_url()?>/nimotsu">
                                                    <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-lugg-pc-min-v2.jpg" alt="">
                                                </a>
                                            </div>
                                            <p class="desc">お荷物をwargoに預けて手ぶらで観光をお楽しみください！wargoではお荷物のお預かり・配送のサービスを提供しております！</p>
                                        </li>
                                        <li>
                                            <div class="img">
                                                <a href="https://araiba.net/cleaning">
                                                    <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/banner-top-araiba.jpg" alt="wargo提携クリーニング工房「アライバ」では、着物のクリーニング3,980円、年間保管を980円でご提供しております！">
                                                </a>
                                            </div>
                                            <p class="desc">wargo提携クリーニング工房「アライバ」では、着物のクリーニング3,980円、年間保管を980円でご提供しております！</p>
                                        </li>
                                    </ul>
                                </section>
                                <section class="section-news">
                                    <div class="wrap-title-other">
                                        <p class="main-title">News</p>
                                        <h2 class="title">ニュース</h2>
                                    </div>
                                    <?php echo do_shortcode('[TopNewsHighEndV3]'); ?>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-photo-gallery">
        <div class="wrap-title-other">
            <p class="main-title"><?php echo Yii::t('kimono-v3', 'Photo Gallery'); ?></p>
            <h2 class="title"><?php echo Yii::t('kimono-v3', 'きものレンタル wargo をご利用 いただお客様や<br>コーディネートをご紹介いたします。'); ?></h2>
        </div>
        <div class="wrap-slider-photo-gallery">
            <?php echo do_shortcode('[WidgetPhotoGalleryTopPageV3]'); ?>
            <div class="wrap-link-btn flexbox justify-content-center">
                <a class="link-to" href="<?= home_url()?>/gallery"><?php echo Yii::t('kimono-v3', 'お客様のコーディネートをもっと見る'); ?></a>
            </div>
        </div>
    </section>

    <section class="section-kyoto-column">
        <div class="container-box">
            <div class="wrap-title-other">
                <p class="main-title">Kyoto Column</p>
                <h2 class="title">着物レンタルwargoの京都おすすめコラムをご紹介！</h2>
            </div>
            <?php echo do_shortcode('[kimono_recommend_spot_v3]'); ?>
        </div>
    </section>

    <section class="section-spot-ranking">
        <div class="container-box">
            <div class="wrap-title-other">
                <p class="main-title">Kimono Spot Ranking</p>
                <h2 class="title">着物で散策なら絶対に外せない！</h2>
            </div>
            <div class="wrap-info-spot-ranking">
                <div class="wrap-items-spot-ranking wrap-spot-ranking-01 flexbox">
                    <div class="wrap-img-spot-ranking">
                        <img data-src="<?= home_url()?>/images/landing-page/img-ranking-landing-01.jpg?ver=12022020">
                    </div>
                    <div class="wrap-content-spot-ranking">
                        <div class="wrap-title-content-spot flexbox">
                            <div class="ranking-icon ranking-icon-01"><p class="icon-fa icon-fa-01"></p></div>
                            <h3 class="ranking-sub-title">八坂庚申堂<var class="sm-text-ranking">(やさかこうしんどう)</var></h3>
                        </div>
                        <div class="wrap-des-spot-ranking">
                            <p class="des-spot-ranking">祇園で今一番アツいSNSスポット!カラフルなお手玉のような「くくり猿」 という願掛けのお守りがたくさん連なるスポットが、この八坂庚申堂(やさかこうしんどう)カラフルなくくり猿に囲まれて写真を撮るだけでインスタ映え間違いなし!?</p>
                        </div>
                        <div class="wrap-relate-spot-ranking">
                            <p class="text-relate">八坂庚申堂から近い店舗</p>
                            <ul class="list-button-relate flexbox">
                                <li class="items-button-relate">
                                    <a href="<?= home_url()?>/access/kyoto-area/gion-area/gion-shijo"><p class="text-link-shop">祇園四条店</p></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="wrap-items-spot-ranking wrap-spot-ranking-02 flexbox">
                    <div class="wrap-img-spot-ranking">
                        <img data-src="<?= home_url()?>/images/landing-page/img-ranking-landing-02.jpg?ver=12022020">
                    </div>
                    <div class="wrap-content-spot-ranking">
                        <div class="wrap-title-content-spot flexbox">
                            <div class="ranking-icon ranking-icon-02"><p class="icon-fa icon-fa-02"></p></div>
                            <h3 class="ranking-sub-title">キモノフォレスト</h3>
                        </div>
                        <div class="wrap-des-spot-ranking">
                            <p class="des-spot-ranking">嵐山駅を降りた所に広がる、キモノフォレスト。このポールの中には京友禅 の生地が入っており色鮮やかな景色があなたをお迎え!夜はライトアップも されるので、昼でも夜でも楽しめるのが魅力。ゆったり着物を着て散歩をしてみてはいかがでしょうか。</p>
                        </div>
                        <div class="wrap-relate-spot-ranking">
                            <p class="text-relate">キモノフォレストから近い店舗</p>
                            <ul class="list-button-relate flexbox">
                                <li class="items-button-relate">
                                    <a href="<?= home_url()?>/access/kyoto-area/arashiyama-area/arashiyama"><p class="text-link-shop">嵐山駅前店</p></a>
                                </li>
                                <li class="items-button-relate">
                                    <a href="<?= home_url()?>/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo"><p class="text-link-shop">嵐山渡月橋店</p></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="wrap-items-spot-ranking wrap-spot-ranking-03 flexbox">
                    <div class="wrap-img-spot-ranking">
                        <img data-src="<?= home_url()?>/images/landing-page/img-ranking-landing-03.jpg?ver=12022020">
                    </div>
                    <div class="wrap-content-spot-ranking">
                        <div class="wrap-title-content-spot flexbox">
                            <div class="ranking-icon ranking-icon-03"><p class="icon-fa icon-fa-03"></p></div>
                            <h3 class="ranking-sub-title">清水寺<var class="sm-text-ranking">(きよみずでら)</var></h3>
                        </div>
                        <div class="wrap-des-spot-ranking">
                            <p class="des-spot-ranking">京都でも屈指の人気観光スポット！一年中多くの人が訪れています。清水寺自体ももちろんのこと、近年では周辺にもおしゃれカフェやスイーツ店が多く賑わってます♪<br>定番スポットだからこそ、着物でばっちりおめかししちゃおう！</p>
                        </div>
                        <div class="wrap-relate-spot-ranking">
                            <p class="text-relate">清水寺から近い店舗</p>
                            <ul class="list-button-relate flexbox">
                                <li class="items-button-relate">
                                    <a href="<?= home_url()?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka"><p class="text-link-shop">京都清水坂店</p></a>
                                </li>
<!--                                <li class="items-button-relate">-->
<!--                                    <a href="--><?//= home_url()?><!--/access/kyoto-area/kiyomizu-area/chawanzaka"><p class="text-link-shop">清水寺茶わん坂店</p></a>-->
<!--                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-kimono-column">
        <div class="container-box">
            <div class="wrap-title-other">
                <p class="main-title">Kimono Column</p>
                <h2 class="title">正しく、美しく、着物を着るために</h2>
            </div>
            <?php echo do_shortcode('[kimono_column_v3]'); ?>
        </div>
    </section>
<?php endif; ?>
<!--<a class="btn-bottom" href="--><?//= home_url() ?><!--/kimono">-->
<!--    <span class="icon"></span>-->
<!--    <p class="txt">-->
<!--        <span class="sm-txt">今すぐカンタン！</span>-->
<!--        <span class="lg-txt">Web予約</span>-->
<!--    </p>-->
<!--</a>-->

<script type="text/javascript">
    window._pt_lt = new Date().getTime();
    window._pt_sp_2 = [];
    _pt_sp_2.push('setAccount,5c3c0f56');
    var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    (function() {
        var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
        atag.src = _protocol + 'js.ptengine.jp/pta.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(atag, s);
    })();
</script>



<script type="text/javascript">
    window._pt_lt = new Date().getTime();
    window._pt_sp_2 = [];
        _pt_sp_2.push('setAccount,5c3c0f56');
        var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	    (function() {
		            var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
			            atag.src = _protocol + 'js.ptengine.jp/pta.js';
			            var s = document.getElementsByTagName('script')[0];
				            s.parentNode.insertBefore(atag, s);
				        })();
</script>


<?php
//while (have_posts()) : the_post();
//    the_content();
//endwhile;
//?>
<?php get_footer('new-kimono-landing-page'); ?>

<?php
$cs=Yii::app()->getClientScript();
ob_start();
?>
<script>
    $(document).ready(function(){
    	//Top banner slider (Add slider after 5s)
        var isFrontPage = '<?php echo is_front_page(); ?>';
        var subBannersKimonoV3SP = '<?php echo $subBannersKimonoV3SP; ?>';
        var subBannersKimonoV3PC = '<?php echo $subBannersKimonoV3PC; ?>';
        var slider = $('#top-slider');

        setTimeout(function() {
            if (isFrontPage == '1') {
                <?php if ($isSmartPhone) { ?>
                if ( subBannersKimonoV3SP ) {
                    var els = $(subBannersKimonoV3SP);
                    $.each(els, function () {
                        slider.append($(this));
                    });
                }
                <?php } else { ?>
                if ( subBannersKimonoV3PC ) {
                    var els = $(subBannersKimonoV3PC);
                    $.each(els, function () {
                        slider.append($(this));
                    });
                }
                <?php } ?>
                slider.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: true,
                    centerMode: true,
                    centerPadding: '20%',
                    responsive: [
                        {
                            breakpoint: 1600,
                            settings: {
                                centerPadding: '10%',
                            }
                        },
                        {
                            breakpoint: 750,
                            settings: {
                                arrows: false,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                centerMode: false
                            }
                        }
                    ]
                });
            }
    }, 5000);


        <?php if ($isSmartPhone) : ?>
        setTimeout(function() {
            //Slider option
            $('#slider-option').not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                centerMode: true,
                centerPadding: '60px',
                dots: true,
            });

            //Slider photo gallery
            $('#slider-photo-gallery, #kimono-column').not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '20%',
                autoplay: false,
                dots: true,
                arrows: false
            });
            $('#kyoto-column').not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '30%',
                autoplay: false,
                dots: true,
                arrows: false
            });
        }, 3000);
		<?php endif; ?>

		//Toggle plan desc
        $('.plan-list .show-desc').click(function(){
        	$(this).toggleClass('active');
        	$(this).closest('li').find('.plan-desc').slideToggle('fast');
        });

		//Toggle faq
		$('.box-faqs-item .box-faqs-title').click(function(){
			$(this).toggleClass('active');
			$(this).parent().next().slideToggle('fast');
		});

		// Category default close
		$('.section-category').find('.wrap-category, .title-general').addClass('active');
		$('.section-category .wrap-category:not(.conditions) .box-category').hide();

	    //Toggle shop map
        $('.storelist .show-map').click(function(e){
        	e.preventDefault();
        	$(this).closest('.store-content').next().slideToggle('fast');
        })
    })

</script>
<?php
$js = ob_get_contents();
$js = str_replace('<script>','',$js);
$js = str_replace('</script>','',$js);
ob_end_clean();
$cs->registerScript('kimono-page-v3',$js, CClientScript::POS_END);
?>


<?php
/**
 * Template Name: List Kimono Petit page
 * Links: /kimono-petit, /kimono-petit/girl-petit, /kimono-petit/men-petit, /kimono-petit/couple-petit
 */
global $post, $is_yukata, $language;
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
get_header('new-kimono');
/*wp_register_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css', array('twentytwelve-style'));
wp_enqueue_style('font-icon-shop');
wp_register_style('kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('kimono');
wp_register_style('kimono-petit', get_template_directory_uri() . '/css/kimono-petit.css', array('twentytwelve-style'));
wp_enqueue_style('kimono-petit');*/

wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
if($isSmartPhone){
//    wp_register_style('new-top-page-kimono-sp-style', get_template_directory_uri() . '/css/new-top-page-kimono-sp.css', array('twentytwelve-style'));
//    wp_enqueue_style('new-top-page-kimono-sp-style');

    // Slick slider for gallery
    wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-rental-style-slick');
    wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-rental-style-slick-theme');
    wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
}else{
//    wp_register_style('new-top-page-kimono-pc-style', get_template_directory_uri() . '/css/new-top-page-kimono-pc.css', array('twentytwelve-style'));
//    wp_enqueue_style('new-top-page-kimono-pc-style');
}
wp_register_style('new-kimono-plan-list-style', get_template_directory_uri() . '/css/new-kimono-plan-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-plan-list-style');
wp_register_style('new-formal-popup', get_template_directory_uri() . '/css/new-formal-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-popup');
wp_register_style('new-kimono-popup', get_template_directory_uri() . '/css/new-kimono-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-popup');
wp_register_style('new-formal-product-cart', get_template_directory_uri() . '/css/new-formal-product-cart.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-cart');
wp_register_style('new-kimono-reserve-cart', get_template_directory_uri() . '/css/new-kimono-reserve-cart.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-reserve-cart');
wp_enqueue_script('new-formal-product-booking-script', get_template_directory_uri() . '/js/new-formal-product-booking.js');
wp_register_style('new-reserve-status-style', get_template_directory_uri() . '/css/new-reserve-status.css', array('twentytwelve-style'));
wp_enqueue_style('new-reserve-status-style');
wp_register_style('new-kimono-petit-list-style', get_template_directory_uri() . '/css/new-kimono-petit-list.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-petit-list-style');
if($language != "ja"){
    wp_register_style('new-kimono-plan-list-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-plan-list'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-plan-list-style'.$cssLanguage);
    wp_register_style('new-kimono-popup'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-popup'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-popup'.$cssLanguage);
    wp_register_style('new-kimono-reserve-cart'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-reserve-cart'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-reserve-cart'.$cssLanguage);
    wp_register_style('new-reserve-status-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-reserve-status'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-reserve-status-style'.$cssLanguage);
    wp_register_style('new-kimono-petit-list-style'.$cssLanguage.'' , get_template_directory_uri()  . '/css/new-kimono-petit-list'.$cssLanguage.'.css', array('twentytwelve-style'));
    wp_enqueue_style('new-kimono-petit-list-style'.$cssLanguage);
}
?>
<div class="container-box clearfix">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
	}
	?>
	<div class="wrap-highend-v2">
		<div class="wrap-content-v2">
			<div class="container-box">
				<div class="wrap-column-content flexbox">
					<div class="left-column-content">
						<div class="wrap-boths-column flexbox">
							<div class="left-column hidden-sidebar">
								<?php get_sidebar('top-page-left') ?>
							</div>
                            <div class="right-column right-column-list right-column-list-new-kimono">
                                <div class="wrap-new-plan-list wrap-new-petit-list">
                                    <?php while (have_posts()) : the_post(); ?>
                                        <div class="wrap-banner-petit">
                                            <div class="banner-petit">
                                                <div class="banner">
                                                    <img class="pc" src="<?= WP_HOME ?>/images/PetiplanPC-<?= $language; ?>.png" alt="<?= Yii::t('list-kimono-petit','女子会割引・学割ありのプチ着物レンタルプラン') ?>"/>
                                                    <img class="sp" src="<?= WP_HOME ?>/images/PetiplanSP-<?= $language; ?>.png" alt="<?= Yii::t('list-kimono-petit','女子会割引・学割ありのプチ着物レンタルプラン') ?>"/>
                                                </div>
                                            </div>
                                            <h1 class="title-petit"><?php the_title(); ?></h1>
                                            <div class="excerpt-petit">
                                                <?php if (!empty($post->post_excerpt)): ?>
                                                    <?php the_excerpt(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="wrap-content-petit-plan">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="wrap-list-plan-petit">
	                                        <?php get_template_part('temp-small/petit-list'); ?>
                                        </div>
                                    <?php endwhile; ?>

	                                <div class="wrap-shop-person-date-grid-petit">
                                        <div class="wrap-corresponding-store-wg">
                                            <h3 class="title-corresponding-store title-box" id="booking-petit"><?= Yii::t('new-kimono-pl-petit', '空き状況'); ?></h3>
                                        </div>
                                        <div class="content-box">
                                            <?php Yii::app()->controller->widget('application.components.widgets.newBooking.NewPetitAddPlan', array(

                                            ));?>
                                        </div>
	                                </div>
	                                <div class="wrap-banner-related-petit">
                                        <div class="wrap-banner-bt-pl">
                                            <ul class="list-banner-bt-pl flexbox">
                                                <?php if($language == 'ja'): ?>
<!--                                                    <li class="item-banner-bt-pl"><a href="/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01.png" alt="--><?//= Yii::t('list-kimono-petit','女子会割引・学割ありのプチ着物レンタルプラン') ?><!--"></a></li>-->
                                                    <li class="item-banner-bt-pl"><a href="/vip"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-02.png" alt="<?= Yii::t('list-kimono-petit','最高級のおもてなし VIP着物レンタルプラン') ?>"></a></li>
                                                    <li class="item-banner-bt-pl"><a href="/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03.png" alt="<?= Yii::t('list-kimono-petit','フォーマル・冠婚葬祭用 着物レンタルプラン') ?>"></a></li>
                                                <?php else: ?>
<!--                                                    <li class="item-banner-bt-pl"><a href="--><?//= home_url(); ?><!--/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01---><?//= $language; ?><!--.png" alt="--><?//= Yii::t('list-kimono-petit','女子会割引・学割ありのプチ着物レンタルプラン') ?><!--"></a></li>-->
                                                    <li class="item-banner-bt-pl"><a href="<?= home_url(); ?>/vip"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-02-<?= $language; ?>.png" alt="<?= Yii::t('list-kimono-petit','最高級のおもてなし VIP着物レンタルプラン') ?>"></a></li>
                                                    <li class="item-banner-bt-pl"><a href="/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03-<?= $language; ?>.png" alt="<?= Yii::t('list-kimono-petit','フォーマル・冠婚葬祭用 着物レンタルプラン') ?>"></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
	                                </div>
                                    <div class="intro-top-general intro-top-general-petit pc">
                                        <h3 class="title-intro-top"><?php echo Yii::t('new-kimono-pl-petit', 'キモノで観光 きものレンタル wargo プチのご紹介') ?></h3>
                                        <div class="content-intro-top">
                                            <p class="intro-text"><?php echo Yii::t('new-kimono-pl-petit', '京都で最安値の「京都きものレンタル wargo」の着物レンタルプチプラン！着物、巾着、下駄、帯、 かんざしが全てセットでなんとたったの1,900円。当店の着付け師がしっかり着付けてくれるので、思いっきり着物を楽しめます。プチ店のみでの学割も新登場！着物はレギュラー店と同じく人気の着物を多数ご用意しております！プチ祇園四条店、プチ京都駅前店どちらも人気観光地へのアクセスは抜群！お手軽に京都を着物で楽しみましょう♪') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end wrap-highend-v2 -->
</div><!-- end container -->
<?php if ($isSmartPhone) : // Style custom slider gallery SP ?>
    <style type="text/css">
        .kimono-plan-gallery-slider .slick-slide {
            margin: 0 5px
        }
        .kimono-plan-gallery-slider .slick-dots{
            text-align: left;
            bottom: -35px;
        }
        .kimono-plan-gallery-slider .slick-dots li{
            margin: 0;
        }
        .kimono-plan-gallery-slider .slick-dots li button:before{
            font-size: 25px;
        }
    </style>
<?php endif; ?>
<script>
    $(document).ready(function(){
        if(isSmartPhone()){
            // Call slick slider gallery
            $('.kimono-plan-gallery-slider .slides').slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true
            });
        }
    });
</script>
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>

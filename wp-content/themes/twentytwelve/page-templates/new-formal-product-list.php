<?php
/**
 * Template Name: New Formal Product List
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
global $post;
$postName = $post->post_name;

//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
$h1 = 'レンタル着物 検索結果一覧';
if($postName == 'list' && $parent_slug_name == 'formal' && !empty($_GET['shop_id'])){
    global $formalListShopId;
    $formalListShopId = $_GET['shop_id'];
    $h1 = Yii::t('formal','h1-formal-list-shop-'.$_GET['shop_id']);
    add_filter( 'wpseo_title', 'my_wpseo_title' , 10, 1 );
    function my_wpseo_title($str){
        global $formalListShopId;
        return Yii::t('formal','title-formal-list-shop-'.$formalListShopId);
    }
}

wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'), '201802021658');
wp_enqueue_style('new-formal-rental-style');
if ($postName == 'shichigosan') {
    wp_register_style('new-formal-cate-list-style', get_template_directory_uri() . '/css/new-formal-cate-list.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-style');
    wp_register_style('new-formal-product-list-style', get_template_directory_uri() . '/css/new-formal-product-list.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-product-list-style');
}
get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
?>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
<script defer type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/qtip2/imagesloaded.pkg.min.js"></script>

<?php if($postName == 'iromuji'):?>
	<?php if($isSmartPhone):?>
		<style>
			.wrap-title {
				font-family: "ten-mincho", serif;
				margin-bottom: 25px;
				padding-bottom: 15px;
				text-align: center;
				position: relative;
				overflow-x: hidden;
			}
			.wrap-title .main-title {
				font-size: 27px;
				color: #945191;
				margin-bottom: 15px;
				text-transform: uppercase;
				line-height: 1;
			}
			.wrap-title:after {
				content: "";
				position: absolute;
				left: 50%;
				bottom: 0;
				-moz-transform: translateX(-50%);
				-o-transform: translateX(-50%);
				-ms-transform: translateX(-50%);
				-webkit-transform: translateX(-50%);
				transform: translateX(-50%);
				background: url(../../../../../images/new-kimono-v3/title-pattern-bg.png) no-repeat;
				background-size: 100% 100%;
				width: 120%;
				height: 3px;
			}
			.wrap-title .sub-title {
				font-size: 14px;
			}
			.section-faq{
				margin-bottom: 50px;
			}
			.section-faq .wrap-faq {
				padding: 0 10px;
			}
			.section-faq .box-faqs-item .wrap-arrow-faqs {
				display: -webkit-box;
				display: -ms-flexbox;
				display: flex;
			}
			.section-faq .box-faqs-item .icon-fa {
				width: 12px;
				height: 12px;
				border-right: 1px solid #eeb001;
				border-bottom: 1px solid #eeb001;
				cursor: pointer;
				position: relative;
				left: -15px;
			}
			.section-faq .box-faqs-item .icon-fa {
				transform: rotate(45deg);
				-webkit-transform: rotate(45deg);
				-ms-transform: rotate(45deg);
				top: -3px;
			}

			.section-faq .box-faqs-item .box-faqs-title.active .icon-fa {
				transform: rotate(225deg);
				top: 5px;
			}

			.section-faq .box-faqs-item .text-faqs-title {
				font-size: 13px;
				padding: 18px 0;
				letter-spacing: 2px;
				font-weight: 700;
				line-height: 1;
				width: 100%;
				text-align: center;
			}

			.section-faq .icon-answer {
				color: red;
				font-size: 30px;
			}

			.section-faq .box-faqs-title {
				font-weight: 700;
				align-items: center;
				justify-content: center;
				cursor: pointer;
				width: 100%;
				position: relative;
			}

			.section-faq .box-faqs-title:before {
				position: absolute;
				content: "";
				background: url(../../../../../images/landing-page/icon-question.svg) no-repeat;
				width: 28px;
				height: 28px;
				left: 12px;
			}

			.section-faq .box-faqs-item-container {
				margin-bottom: 10px;
			}

			.section-faq .box-faqs-item-container:last-child {
				margin-bottom: 0;
			}

			.section-faq .box-faqs-item-container .box-faqs-item {
				border: 1px solid #dddddd;
				color: #000;
			}

			.section-faq .box-faqs-item-container .box-faqs-item-content:before {
				position: absolute;
				content: "";
				background: url(../../../../../images/landing-page/icon-answer.svg) no-repeat;
				width: 28px;
				height: 28px;
				left: 12px;
				top: 16px;
			}

			.section-faq .box-faqs-item-container .box-faqs-item-content {
				padding: 10px;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
				position: relative;
				background-color: #f4f4f4;
				display: none;
			}

			.section-faq .box-faqs-item-container .box-faqs-item-content .text-item-content {
				font-size: 11px;
				line-height: 1.8;
				letter-spacing: 1px;
				margin-left: 34px;
			}
		</style>
	<?php else :?>
		<style>
			.wrap-title {
				font-family: "ten-mincho", serif;
				padding-bottom: 10px;
				text-align: center;
				position: relative;
				display: -webkit-box;
				display: -ms-flexbox;
				display: -moz-box;
				display: -webkit-flex;
				display: flex;
				-webkit-align-items: flex-end;
				-moz-align-items: flex-end;
				-ms-align-items: flex-end;
				align-items: flex-end;
			}
			.wrap-title:after {
				content: "";
				position: absolute;
				left: 50%;
				bottom: -5px;
				-moz-transform: translateX(-50%);
				-o-transform: translateX(-50%);
				-ms-transform: translateX(-50%);
				-webkit-transform: translateX(-50%);
				transform: translateX(-50%);
				background: url(../../../../../images/new-kimono-v3/title-pattern-bg-pc.png) no-repeat;
				background-size: 100% 100%;
				width: 100%;
				height: 7px;
			}
			.wrap-title .main-title {
				font-size: 35px;
				color: #945191;
				margin-right: 20px;
				text-transform: uppercase;
				line-height: 1;
			}
			.wrap-title .sub-title {
				font-size: 16px;
			}
			.section-faq{
				margin-bottom: 80px;
			}
			.section-faq .wrap-title {
				margin-bottom: 50px;
			}

			.section-faq .box-faqs-item .wrap-arrow-faqs {
				display: -webkit-box;
				display: -ms-flexbox;
				display: flex;
			}

			.section-faq .box-faqs-item .icon-fa {
				width: 12px;
				height: 12px;
				border-right: 1px solid #eeb001;
				border-bottom: 1px solid #eeb001;
				cursor: pointer;
				position: relative;
				left: -15px;
			}

			.section-faq .box-faqs-item .icon-fa {
				transform: rotate(45deg);
				-webkit-transform: rotate(45deg);
				-ms-transform: rotate(45deg);
				top: -3px;
			}

			.section-faq .box-faqs-item .box-faqs-title.active .icon-fa {
				transform: rotate(225deg);
				top: 5px;
			}

			.section-faq .box-faqs-item .text-faqs-title {
				font-size: 20px;
				padding: 16px 0;
				letter-spacing: 2px;
				font-weight: 700;
				line-height: 1;
				width: 100%;
				text-align: center;
			}

			.section-faq .icon-answer {
				color: red;
				font-size: 30px;
			}

			.section-faq .box-faqs-title {
				font-weight: 700;
				align-items: center;
				justify-content: center;
				cursor: pointer;
				width: 100%;
				position: relative;
			}

			.section-faq .box-faqs-title:before {
				position: absolute;
				content: "";
				background: url(../../../../../images/landing-page/icon-question.svg) no-repeat;
				width: 30px;
				height: 30px;
				left: 12px;
			}

			.section-faq .box-faqs-item-container {
				margin-bottom: 10px;
			}

			.section-faq .box-faqs-item-container:last-child {
				margin-bottom: 0;
			}

			.section-faq .box-faqs-item-container .box-faqs-item {
				border: 1px solid #dddddd;
				color: #000;
			}

			.section-faq .box-faqs-item-container .box-faqs-item-content:before {
				position: absolute;
				content: "";
				background: url(../../../../../images/landing-page/icon-answer.svg) no-repeat;
				width: 30px;
				height: 30px;
				left: 12px;
				top: 16px;
			}

			.section-faq .box-faqs-item-container .box-faqs-item-content {
				padding: 10px;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
				position: relative;
				background-color: #f4f4f4;
				display: none;
			}

			.section-faq .box-faqs-item-container .box-faqs-item-content .text-item-content {
				font-size: 15px;
				line-height: 1.6;
				letter-spacing: 1px;
				margin-left: 45px;
			}
		</style>
    <?php endif;?>
<?php endif;?>

<?php if($isSmartPhone):?>
    <style>
        .wrap-overlay-filter{
            display: none !important;
        }
    </style>
    <div class="wrap-overlay-filter">
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar toggle-filter-list-sidebar">
                <div class="box-filter-list-sidebar">
                    <div class="toggle-filter-sidebar sp">
                        <?php echo do_shortcode('[FormalSidebarFilter]'); ?>
                    </div>
                </div>
            </div>
            <div class="close-sidebar sp">
                <span class="closed-filter"></span>
            </div>
        </div>
    </div>
<?php endif;?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal">', '</div>');
    }
    ?>

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
				  <?php if (!empty($postName) && $postName == 'shichigosan'): ?>
					<?php
						$post_thumbnail = get_post_thumbnail_id();
						if($post_thumbnail != ""){
					?>
						<div class="banner-top-highend-v2">
							<div class="container-box">
								<?php
									echo swe_wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array('alt' => get_the_title()));
								?>
							</div>
						</div>
					<?php } ?>
				<?php endif; ?>
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
//                                if($postName == 'list'){
//                                    if(!$isSmartPhone)
//                                        echo do_shortcode('[FormalSidebarFilter]');
//                                }else{
//                                    echo do_shortcode('[FormalSidebarLeft]');
//                                }
                                if($isSmartPhone){
                                    echo FormalSidebarLeftCode(array());
                                }else{
                                    if($postName != 'list'){
                                        echo FormalSidebarLeftCodeNewStyle(array());
                                        //echo FormalSidebarFilterCode(array('type'=>'planlist'));
									}else if($postName == 'list'){
										echo FormalSidebarLeftCodeNewStyle(array());
                                        //echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list">
                                <?php
                                $bannertop = get_field('banner-top');
                                if ($bannertop) {
                                    echo do_shortcode(php_set_base_url($bannertop));
                                }
                                ?>
                                <?php if (!empty($postName) && $postName != 'shichigosan'): ?>
                                    <?php
                                    $post_thumbnail = get_post_thumbnail_id();
                                    if($post_thumbnail != ""){
                                        ?>
                                        <div class="banner-top-highend-v2 <?= $postName; ?>">
                                            <div class="container-box">
                                                <?php
                                                echo swe_wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array('alt' => get_the_title()));
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php endif; ?>
                                <?php
                                    if ($postName != 'shichigosan') {
                                        the_excerpt();
                                    }
                                ?>

                                <?php if ($postName == 'shichigosan'): ?>
                                    <ul class="sub-banner-fm flexbox">
                                        <li><a href="#box-howto"><img src="<?= WP_HOME; ?>/images/formal-rental/sub-banner-1-fm-<?= $postName; ?>.jpg" alt="店舗でレンタル・着付けする"></a></li>
                                        <li><a href="#rental-home"><img src="<?= WP_HOME; ?>/images/formal-rental/sub-banner-2-fm-<?= $postName; ?>.jpg" alt="宅配でレンタルする"></a></li>
                                    </ul>

                                    <?php if ($isSmartPhone) : ?>
                                        <div class="wrap-banner-tkh-new-kimono">
                                            <ul class="list-banner-price-tkh-new-kimono flexbox">
                                                <li class="item"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-tkh-new-kimono-sp.jpg" alt="wargoで着物を借りる理由"></li>
                                                <li class="item"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-tkh-new-kimono-01.jpg" alt="京都最大級"></li>
                                                <li class="item"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-tkh-new-kimono-02.jpg" alt="最新着物"></li>
                                                <li class="item"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-tkh-new-kimono-03.jpg" alt="フルセット"></li>
                                                <li class="item"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-tkh-new-kimono-04.jpg" alt="低価格"></li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                    <div class="wrap-list-cate-wg">
                                        <h2 class="title-general title-general-catelist text-center title-general-icon">
                                            <span class="icon-title-general icon icon-formal-search"></span>
                                        </h2>
                                        <ul class="list-cate-wg list-cate-wg-<?php echo $postName;?> flexbox">
                                            <li class="item"><a href="<?= WP_HOME ?>/formal/shichigosan/girl"><img src="<?= WP_HOME; ?>/images/formal-rental/banner-cate-wg-1-schichigosan.jpg" alt="女の子用の七五三着物レンタル"></a></li>
                                            <li class="item"><a href="<?= WP_HOME ?>/formal/shichigosan/shichigosan5years"><img src="<?= WP_HOME; ?>/images/formal-rental/banner-cate-wg-2-schichigosan.jpg" alt="男の子用の七五三着物レンタル"></a></li>
                                        </ul>
                                    </div><!--end wrap-list-cate-wg-->
                                <?php endif; ?>

                                <?php if (is_page('furisode')){?>
                                   <div class="wrap-banner-furisode">
                                       <a href="<?= WP_HOME ?>/formal/furisode/furisodemaedori"><img src="<?= WP_HOME ?>/images/formal-rental/access/banner-furisode.png" alt=""></a>
                                   </div>
                                <?php } ?>

                                <div class="wrap-banner-topics <?= $postName; ?>">
                                    <div class="title-general title-list text-center flexbox margin-bt10">
                                        <span class="icon-title-general icon icon-formal-search"></span>
                                        <div class="sub-title-list">
                                            <?php $url = $_SERVER['REQUEST_URI']; ?>
                                            <?php if($parent_slug_name == "color") :?>
                                                <span class="text-title-general"><?= the_title() ?></span>
                                            <?php elseif($postName == "list"): ?>
                                                <span class="text-title-general"><?= $h1?></span>
                                            <?php elseif($postName == "party"): ?>
                                                 <h2 class="text-title-general">パーティの着物人気ランキング</h2>
                                            <?php elseif(strpos($url, "homongi/low_price")): ?>
                                                <h2 class="text-title-general">格安訪問着 商品一覧</h2>
                                            <?php elseif(strpos($url, "kurotomesode/low_price")): ?>
                                                <h2 class="text-title-general">格安黒留袖 商品一覧</h2>
                                            <?php elseif(strpos($url, "furisode/low_price")): ?>
                                                <h2 class="text-title-general">格安振袖 商品一覧</h2>
                                            <?php elseif(strpos($url, "irotomesode/low_price")): ?>
                                                <h2 class="text-title-general">格安色留袖 商品一覧</h2>
                                            <?php endif; ?>
                                        </div>
                                        <span class="icon-toggle-filter-sidebar icon-formal-filter-filled sp"></span>
                                    </div>
                                    <div class="wrap-list-formal-product">
                                        <div class="row">
                                            <?php
                                                if($postName != 'list' || $parent_slug_name != 'formal'){
                                                    if($isSmartPhone) {
                                                        $list_product_sp = get_field('list_product_sp');
                                                        if ($list_product_sp) {
                                                            echo do_shortcode(php_set_base_url($list_product_sp));
                                                        }
                                                    }else{
                                                        $list_product_pc = get_field('list_product_pc');
                                                        if ($list_product_pc) {
                                                            echo do_shortcode(php_set_base_url($list_product_pc));
                                                        }
                                                    }
                                                } else {
                                                    $formalShopListArray = array();
                                                    foreach(Mastervalues::formalShopList() as $shopId => $value){
                                                        $formalShopListArray[] = $shopId;
                                                    }
                                                    $formalShopList = implode(',',$formalShopListArray);
                                                    $formalListUrl = get_page_link(get_page_by_path('formal/list'));
                                                    echo do_shortcode('[filter_formal_product url="'.$formalListUrl.'" shop_id="'.$formalShopList.'" enable_search_interface=1 search_result_container_id=formal_search_result type=planlist]');
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                    <?php
                                    $bannerbottom = get_field('banner-bottom');
                                    if ($bannerbottom) {
                                        echo do_shortcode(php_set_base_url($bannerbottom));
                                    }
                                    ?>
                                <?php //echo do_shortcode('[customer_review_content_formal]'); ?>

                                <?php if ($postName == 'shichigosan') : ?>
                                    <div id="box-howto" class="wrap-rental-step <?= $postName; ?>">
                                        <h2 class="title-general text-center title-general-icon">
                                            <!--<span class="icon-title-general icon icon-formal-search"></span>-->
                                            <span class="text-title-general"><?= Yii::t('new-formal', $postName); ?> 宅配レンタルの流れ</span>
                                        </h2>
                                        <div class="step-content">
                                            <div class="step-content-img">
                                                <?php if($isSmartPhone) : ?>
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/rental-step-img-sp.jpg" alt="">
                                                <?php else: ?>
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/rental-step-img-pc.jpg" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <?php if($isSmartPhone) : ?>
                                                <div class="step-text">
                                                    <p>宅配着物レンタルwargoは、必要なものをすべてセットにして</p>
                                                    <p>ご自宅にお届けいたします。ご予約は、ご自宅のパソコンやスマ</p>
                                                    <p>ートフォンからはもちろん、対応店舗にご来店いただき、着物を</p>
                                                    <p>下見していただいてからご予約をいただくこともできます。余</p>
                                                    <p>裕の2日前配達や、簡単な返却方法など、着物を手軽にお楽しみ</p>
                                                    <p>いたけるサービスをご用意しています。</p>
                                                </div>
                                            <?php else: ?>
                                                <div class="step-text">
                                                    <p>
                                                        宅配着物レンタルwargoは、必要なものを
                                                        すべてセットにしてご自宅にお届けいた
                                                        します。ご予約は、ご自宅のパソコンやス
                                                        マートフォンからはもちろん、対応店舗に
                                                        ご来店いただき、着物を下見していただい
                                                        てからご予約をいただくこともできます。
                                                        余裕の2日前配達や、簡単な返却方法な
                                                        ど、着物を手軽にお楽しみいたけるサービ
                                                        スをご用意しています。
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="set-content">
                                            <h3 class="set-title">
                                                <span class="icon"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg" alt=""></span>
                                                <span class="text">セット内容</span>
                                            </h3>
                                            <div class="wrap-content">
                                                <div class="step-text">
                                                    <p class="description">着付けに必要な一式をすべて含みます。<br>着付けに必要なものをセットにして、専用のバッグにお入れしてお届けいたします。</p>
                                                </div>
                                                <div class="set-image">
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/rental-step-<?php echo $postName;?>.jpg" alt="">
                                                </div>
                                                <div class="set-option">
                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/set-<?php echo $postName;?>.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
<!--                                        <div class="set-buttons">-->
<!--                                            <a class="btn-formal btn-color-pink" href="#" alt="宅配レンタルで予約する">宅配レンタルで予約する</a>-->
<!--                                            <a class="btn-formal btn-color-pink" href="#" alt="店舗で予約する">店舗で予約する</a>-->
<!--                                        </div>-->
                                    </div>
                                    <div id="rental-home" class="wrap-rental-payment <?= $postName; ?>">
                                        <h2 class="title-general text-center title-general-icon">
                                            <span class="text-title-general">レンタルご予約方法</span>
                                        </h2>
                                        <div class="rental-payment-container">
                                            <div>
                                                <h4 class="payment-name">Webでご予約</h4>
                                                <p>宅配着物レンタルwargoのウェブサイトからお着物を選んでいただき、ご予約をいただく事が可能です。スマートフォン・パソコンからご予約いただけます。<br>お申し込みにはクレジットカードが必要です。</p>
                                            </div>
                                            <div>
                                                <h4 class="payment-name">ご来店でご予約</h4>
                                                <p>京都着物レンタルwargo 京都駅前京都タワー店・祇園四条店・大阪心斎橋店・東京浅草寺店では下見およびご来店でのご予約も承っております。<br><a href="/formal/preview">下見（30分まで無料）をご予約いただき</a>、お着物を選んでいただいた上で、配送のご予約をいただく事が可能です。店頭 での現金払い、クレジットカード払いも選択していただけます。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-rental-calendar <?= $postName; ?>">
                                        <h2 class="title-general text-center">
                                            <span class="text-title-general">お届け日程</span>
                                        </h2>
                                        <div class="rental-calendar-container">
                                            <p>お貸し出しは3泊4日で、ご利用日の2日前にお届けいたします。</p>
                                            <table class="payment-calendar">
                                                <tr>
                                                    <th>5/8</th>
                                                    <th>5/9</th>
                                                    <th>5/10</th>
                                                    <th>5/11</th>
                                                </tr>
                                                <tr>
                                                    <td>お客様到着日</td>
                                                    <td></td>
                                                    <td>ご利用日</td>
                                                    <td>ご返送日</td>
                                                </tr>
                                            </table>
                                            <div>
                                                <h4 class="calendar-title"> お届け日の例</h4>
                                                <p>ご利用日が5月10日の場合</p>
                                            </div>
                                            <div>
                                                <h4 class="calendar-title">レンタルの延長</h4>
                                                <p>お貸し出し期間の延長をご希望の場合は、申し込み時にカレンダーよりご指定ください。1日につき1,000円で延長を承ります。</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-btn-detail <?= $postName; ?>"><a href="/takuhai/howto">宅配レンタルの流れをもっと詳しく見る</a></div>
                                <?php endif; ?>
                                <?php
                                //button
                                $custom_button = get_field('custom_button');
                                if ($custom_button) {
                                    echo do_shortcode(php_set_base_url($custom_button));
                                }
                                //FAQ
                                $custom_faq = get_field('custom_faq');
                                if ($custom_faq) {
                                    echo do_shortcode(php_set_base_url($custom_faq));
                                }
                                ?>
                                <?php $arr_posts_h2 = array('pink', 'yellow', 'green', 'purple', 's-size','m-size','l-size','ll-size', 'for-20s', 'for-3f0s', 'for-40s', 'for-50s', 'awase', 'ro-sya'); ?>
                                <div class="intro-top-general">
                                    <?php if( in_array($postName, $arr_posts_h2) ): ?>
                                        <h2 class="title-intro-top"><?php echo Yii::t('new_formal','きものレンタルwargoのご紹介'); ?></h2>
                                    <?php else: ?>
                                        <h3 class="title-intro-top"><?php echo Yii::t('new_formal','きものレンタルwargoのご紹介'); ?></h3>
                                    <?php endif?>
                                    <div class="content-intro-top">
                                        <p class="intro-text"><?php echo Yii::t('new_formal','きものレンタルwargoは、京都・大阪・東京・金沢に全国11店舗を展開する、日本最大級の着物レンタルサービスです。<br>着物の総在庫数は9,120着(2018年3月1日現在)、お客様に着物のレンタルを楽しんで頂けるよう、作家物、ブランド品、アンティークなど、豊富な種類のお着物をご用意しております。<br>店舗でお着付けする着物レンタルの他、宅配での着物レンタルも取り扱っております。'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end right-column-->
                        </div><!--end wrap-boths-column-->
                    </div><!--end left-column-content-->
                </div><!--end wrap-column-content-->
            </div>
        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

</div><!-- end container -->
<?php get_footer('formal'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        <?php
        if($isSmartPhone):
        ?>
        var num_scroll = $(".closed-filter").outerHeight();
        console.log(num_scroll);
        $(window).on("scroll", function(){
            if($(this).scrollTop() > num_scroll){
                $(".closed-filter").addClass("fixed-icon-filter");
                $(".wrap-header").hide();
            }else{
                $(".closed-filter").removeClass("fixed-icon-filter");
                $(".wrap-header").show();
            }
        });
        var numHeight = $(".num-height").outerHeight();
        $(".icon-toggle-filter-sidebar").on('click', function () {
            $(".toggle-filter-list-sidebar").addClass("active").css("top", + numHeight);
            $("body, .wrap-overlay-filter").addClass("fixed-scroll overlay-toggle-filter");
            $(".closed-filter").addClass("icon-formal-check-ok");
        });
        $(".close-sidebar .closed-filter").on("click", function(){
            $("body, .toggle-filter-list-sidebar, .wrap-overlay-filter, .closed-filter").removeClass("active fixed-scroll overlay-toggle-filter icon-formal-check-ok");
        });

        var calendarWidth = $(window).width();
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').width(calendarWidth - 10);

        var calendarLeftPos = $('.item-nav-top-search').width() - 3;
        $('.item-nav-top-search .wrap-dropdown-search .search_box_top_date_picker_wrapper').css('left', "-" + calendarLeftPos + 'px');

        <?php endif?>

        //Toggle faq
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });
    })
</script>

<?php
/**
 * Template Name: New Formal Product List V2
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
global $language, $post, $custom_taxonomies, $custom_post_type;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
$postName = $post->post_name;
//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
get_header('formal');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_register_style('new-access-style', get_template_directory_uri() . '/css/new-access.css', array('twentytwelve-style'));
wp_enqueue_style('new-access-style');
wp_register_style('new-formal-product-detail', get_template_directory_uri() . '/css/new-formal-product-detail.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-product-detail');
if($isSmartPhone){
    wp_register_style('new-formal-cate-list-v2-sp-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-sp-style');
    wp_register_style('new-shop-formal-detail-v2-sp-style', get_template_directory_uri() . '/css/new-shop-formal-detail-v2-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-shop-formal-detail-v2-sp-style');
    wp_register_style('formal-new-access-yukata-sp-style', get_template_directory_uri() . '/css/formal-new-access-yukata-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('formal-new-access-yukata-sp-style');
    wp_register_style('takuhai-yukata-sp-style', get_template_directory_uri() . '/css/takuhai-yukata-sp.css', array('twentytwelve-style'), '20211013');
    wp_enqueue_style('takuhai-yukata-sp-style');
}else{
    wp_register_style('new-formal-cate-list-v2-pc-style', get_template_directory_uri() . '/css/new-formal-cate-list-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-cate-list-v2-pc-style');
    wp_register_style('new-shop-formal-detail-v2-pc-style', get_template_directory_uri() . '/css/new-shop-formal-detail-v2-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-shop-formal-detail-v2-pc-style');
    wp_register_style('formal-new-access-yukata-pc-style', get_template_directory_uri() . '/css/formal-new-access-yukata-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('formal-new-access-yukata-pc-style');
    wp_register_style('takuhai-yukata-pc-style', get_template_directory_uri() . '/css/takuhai-yukata-pc.css', array('twentytwelve-style'), '20211013');
    wp_enqueue_style('takuhai-yukata-pc-style');
}
$shop_id = get_field('shop_id');
?>
<link href=“https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap” rel=“stylesheet”>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
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
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2 breadcrumbs-tkh">', '</div>');
    }
    ?>

    <?php if($isSmartPhone) : ?>
        <?php if(get_field('title_cate_sp')): ?>
            <h1 class="title-name-formal">
                <?php the_field('title_cate_sp'); ?>
            </h1>
        <?php endif; ?>
    <?php else: ?>
        <?php if(get_field('title_cate_pc')): ?>
            <h1 class="title-name-formal">
                <?php the_field('title_cate_pc'); ?>
            </h1>
        <?php endif; ?>
    <?php endif; ?>
    <div class="main-baner-top-v2">
        <?php if($isSmartPhone) : ?>
            <div class="banner-top-v2 <?= $postName; ?>">
                <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/main-banner-top-takuhai-yukata-v3-sp.jpg">
            </div>
        <?php else: ?>
            <div class="banner-top-v2 <?= $postName; ?>">
                <img alt="<?=the_title();?>" src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/main-banner-top-takuhai-yukata-v3-pc.jpg">
            </div>
        <?php endif; ?>
    </div><!--end main-baner-top-v2-->

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column hidden-sidebar">
                                <?php
                                if($isSmartPhone){
                                    echo FormalSidebarLeftCodeNewStyle(array());
                                }else{
                                    if($postName != 'list'){
                                        echo FormalSidebarLeftCodeNewStyle(array('type'=>'planlist'));
                                        echo FormalSidebarFilterCode(array('type'=>'planlist'));
									}else if($postName == 'list'){
										echo FormalSidebarLeftCodeNewStyle(array());
                                        echo FormalSidebarFilterCode(array());
                                    }
                                }
                                ?>
                            </div>

                            <div class="right-column right-column-list right-cate-list-v2 right-new-shop-formal-v2 right-new-shop-formal-v2-yukata new-formal-takuhai-yukata">
                                <div class="padding-v2">
                                    <div class="wrap-intro-wargo-fm-v2 wrap-intro-wargo-fm-v2-tkh-yukata">
                                        <?php if($isSmartPhone) : ?>
                                            <?php
                                            $intro_wargo_sp = get_field('intro_wargo_sp');
                                            if ($intro_wargo_sp) {
                                                echo do_shortcode(php_set_base_url($intro_wargo_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $intro_wargo_pc = get_field('intro_wargo_pc');
                                            if ($intro_wargo_pc) {
                                                echo do_shortcode(php_set_base_url($intro_wargo_pc));
                                            }
                                            ?>
                                        <?php endif;?>
                                    </div>

                                    <div class="wrap-sidebar-products-fm-v2 wrap-sidebar-products-fm-v2-tkh-yukata">
                                        <?php
                                        $slider_rental_delivery_sp = get_field('slider_rental_delivery_sp');
                                        $slider_rental_delivery_pc = get_field('slider_rental_delivery_pc');
                                        ?>
                                        <?php if($isSmartPhone) : ?>
                                            <?php if($slider_rental_delivery_sp):
                                                echo do_shortcode(php_set_base_url($slider_rental_delivery_sp));?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($slider_rental_delivery_pc): ?>
                                                <div class="wrap-tkh-yukata-products-pc">
                                                    <?php echo do_shortcode(php_set_base_url($slider_rental_delivery_pc));?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                    <?php
                                    $isPageTakuhaiYukata = is_page('takuhai/yukata');
                                    if($isPageTakuhaiYukata):?>
                                    <div class="section-banner-adv section-banner-ykt-contest takuhai-yukata row-padding">
                                        <a href="<?php echo WP_HOME; ?>/yukata-girl-contest">
                                            <?php if($isSmartPhone) :?>
                                                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/yukata-girl-contest-banner-SP.jpg" alt="">
                                            <?php else: ?>
                                                <img data-src="<?php echo WP_HOME; ?>/images/new-kimono-v2/yukata-girl-contest-banner-PC.jpg" alt="">
                                            <?php endif; ?>
                                        </a>
                                    </div><!--end section-banner-ykt-contest-->
                                    <?php endif?>
                                    <?php
                                    $about_wargo = get_field('about_wargo');
                                    if ($about_wargo) {
                                        echo do_shortcode(php_set_base_url($about_wargo));
                                    }
                                    ?>

                                    <div class="wrap-howto-reserve wrap-howto-reserve-fm-v2 <?= $postName; ?>">
                                        <div class="wrap-title">
                                            <h2 class="title-howto-reserve">レンタルご予約方法</h2>
                                            <div class="wrap-line-v2">
                                                <div class="line-v2 line-v2-single"></div>
                                            </div>
                                        </div>
                                        <div class="wrap-content-howto-reserve tkh-yukata">
                                            <div class="box-howto-reserve">
                                                <?php if($isSmartPhone) : ?>
                                                    <div class="group-icon flexbox">
                                                        <div class="wrap-l-icon">
                                                            <img src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/icon-shop-takuhai-<?php echo $post->post_name;?>.svg" alt="">
                                                        </div>
                                                        <div class="wrap-r-icon bg-shop wrap-r-icon-ginza-honten wrap-r-icon-takuhai-<?php echo $post->post_name;?>">
                                                            <p>ご来店でご予約</p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="group-all-icon-text">
                                                    <?php if(!$isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/icon-shop-takuhai-<?php echo $post->post_name;?>.svg" alt="">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="group-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="wrap-r-icon bg-shop wrap-r-icon-ginza-honten wrap-r-icon-takuhai-<?php echo $post->post_name;?>">
                                                                <p>ご来店でご予約</p>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="para-text">
	                                                        <p>きものレンタルwargo フォーマル着物取扱店舗では下見およびご来店でのご予約も承っております。</p>
	                                                        <p>無料の下見をご予約いただき、お着物を選んでいただいた上で、配送のご予約をいただくことが可能です。店頭での現金払い、クレジットカード払いも選択していただけます。<br>
		                                                        ※下見は30分以内無料で、ご成約された場合は30分以上の下見に関しても無料となります。</p>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-circle-link bg-shop wrap-circle-link-takuhai-<?php echo $post->post_name;?> flexbox justify-content-center align-items-center">
                                                        <a href="<?=home_url()?>/howto" class="bg-l-blue circle-link flexbox justify-content-center align-items-center">
                                                            <p class="des-circle">来店レンタルの<br>詳しい流れは<br>コチラ</p>
                                                            <span class="arrow-r"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wrap-btn-v2 flexbox">
                                                    <div class="btn-v2 bg-tkh-yukata">
                                                        <a href="/yukata/plan" class="btn-v2-reserve btn-step-01">
                                                            <div class="pattern tkh-yukata"></div>
                                                            <div class="text">
                                                                <span class="text-link">来店予約をする</span>
                                                                <span class="icon-arrow-r-link"></span>
                                                            </div>
                                                            <div class="pattern tkh-yukata last"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-howto-reserve box-howto-reserve-takuhai-<?= $postName; ?> last">
                                                <div class="wrap-all-group">
                                                    <?php if($isSmartPhone) : ?>
                                                        <div class="group-icon flexbox">
                                                            <div class="wrap-l-icon">
                                                                <img src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/icon-web-takuhai-<?php echo $post->post_name;?>.svg" alt="">
                                                            </div>
                                                            <div class="wrap-r-icon bg-web wrap-r-icon-ginza-honten wrap-r-icon-takuhai-<?php echo $post->post_name;?>">
                                                                <p>WEBでご予約</p>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="group-all-icon-text">
                                                        <?php if(!$isSmartPhone) : ?>
                                                            <div class="group-icon flexbox">
                                                                <div class="wrap-l-icon">
                                                                    <img src="<?= WP_HOME; ?>/images/takuhai/yukata-v2/icon-web-takuhai-<?php echo $post->post_name;?>.svg" alt="">
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="group-text">
                                                            <?php if(!$isSmartPhone) : ?>
                                                                <div class="wrap-r-icon bg-web wrap-r-icon-ginza-honten wrap-r-icon-takuhai-<?php echo $post->post_name;?>">
                                                                    <p>WEBでご予約</p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="para-text">
                                                                <p>宅配着物レンタルwargoのウェブサイトからお着物を選んで</p>
                                                                <p>いただき、ご予約をいただくことが可能です。スマートフォン・</p>
                                                                <p>パソコンからご予約いただけます。</p>
                                                                <p>お申し込みにはクレジットカードが必要です。</p>
                                                            </div>
                                                        </div>
                                                        <a href="<?=home_url()?>/takuhai/howto" class="wrap-circle-link bg-web wrap-circle-link-<?php echo $post->post_name;?> flexbox justify-content-center align-items-center">
                                                            <div class="circle-link bg-dark-blue flexbox justify-content-center align-items-center">
                                                                <p class="des-circle">宅配レンタルの<br>詳しい流れは<br>コチラ</p>
                                                                <span class="arrow-r"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wrap-flow-delivery <?= $postName; ?>">
                                                    <div class="title-flow-delivery title-sub-slug-tkh-yukata">宅配レンタルの流れ</div>
                                                    <div class="text-flow-deivery">
                                                        <p>宅配着物レンタルwargoは、必要なものをすべてセットにしてご自宅にお届けいたします。</p>
                                                        <p>ご予約は、ご自宅のパソコンやスマートフォンからはもちろん、対応店舗にご来店いただき、着物を下見していただいてからご予約をいただくこともできます。</p>
                                                        <p>余裕の2日前配達や、簡単な返却方法など、着物を手軽にお楽しみいだけるサービスをご用意しています。</p>
                                                    </div>
                                                    <div class="group-step-flow">
                                                        <div class="title-group-step"><span class="step-num">01</span><var></var>お届け日程</div>
                                                        <div class="des-group-step"><p>お貸し出しは3泊4日で、ご利用日の2日前にお届けいたします。</p></div>
                                                    </div>

                                                    <div class="group-step-flow">
                                                        <div class="title-group-step"><span class="step-num">02</span><var></var>お届け日の例</div>
                                                        <div class="des-group-step des-group-step-other"><p>ご利用日が5月10日の場合</p></div>
                                                        <ul class="list-step-num list-step-num-<?php echo $post->post_name;?> flexbox">
                                                            <li class="item-step-num">
                                                                <div class="wrap-sm-circle">
                                                                    <div class="sm-circle bg-l-blue flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
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
                                                                <div class="des-sm-circle">ご利用日 </div>
                                                            </li>
                                                            <li class="item-step-num">
                                                                <div class="wrap-sm-circle">
                                                                    <div class="sm-circle bg-dark-blue flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                </div>
                                                                <div class="des-sm-circle">ご返送日</div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="group-step-flow last">
                                                        <div class="title-group-step"><span class="step-num">03</span><var></var>レンタルの延長</div>
                                                        <div class="des-group-step">
                                                            <p>お貸出期間のご延長をご希望の場合の料金は 1日につき2,000円(+tax)となっております。</p>
                                                            <p>3日以上延泊をご希望のお客様は別途お問い合わせフォームよりご連絡くださいませ。</p>
                                                        </div>
                                                    </div>

                                                    <div class="wrap-btn-v2 wrap-btn-v2-other flexbox">
                                                        <div class="btn-v2 btn-v2-02 bg-tkh-yukata btn-step-01 bg-blue">
                                                            <a href="<?= home_url(); ?>/takuhai/howto">
                                                                <div class="pattern tkh-yukata"></div>
                                                                <div class="text">
                                                                    <span class="text-link">宅配レンタルの流れをもっと詳しく見る</span>
                                                                    <span class="icon-arrow-r-link"></span>
                                                                </div>
                                                                <div class="pattern tkh-yukata last"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wrap-set-content wrap-set-content-fm-v2 tkh-yukata">
                                        <div class="title-set-content title-set-content-other-ginza">セット内容</div>
                                        <?php if($isSmartPhone): ?>
                                            <?php
                                            $set_content_sp = get_field('set_content_sp');
                                            if ($set_content_sp) {
                                                echo do_shortcode(php_set_base_url($set_content_sp));
                                            }
                                            ?>
                                        <?php else: ?>
                                            <?php
                                            $set_content_pc = get_field('set_content_pc');
                                            if ($set_content_pc) {
                                                echo do_shortcode(php_set_base_url($set_content_pc));
                                            }
                                            ?>
                                        <?php endif; ?>
                                    </div>

                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-single"></div></div>

                                    <?php if($isSmartPhone) : ?>
                                        <?php
                                        $yukata_plan_group_sp = get_field('yukata_plan_group_sp');
                                        if ($yukata_plan_group_sp) {
                                            echo do_shortcode(php_set_base_url($yukata_plan_group_sp));
                                        }
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        $yukata_plan_group_pc = get_field('yukata_plan_group_pc');
                                        if ($yukata_plan_group_pc) {
                                            echo do_shortcode(php_set_base_url($yukata_plan_group_pc));
                                        }
                                        ?>
                                    <?php endif;?>
                                    <?php if(!$isPageTakuhaiYukata) : ?>
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
												</div>
											</div>
										</section>
                                    <?php endif; ?>
                                    <?php
                                        $shop_list = get_field('shop_list');
                                        if ($shop_list) {
                                            echo do_shortcode(php_set_base_url($shop_list));
                                        }
                                    ?>

                                    <div class="section-column-spot row-padding">
                                        <div class="wrap-column-post wrap-column-post-top-page">
                                            <div class="title-column-top">
                                                <div class="wrap-main-title flexbox">
                                                    <div class="image image-left"><img data-src="<?php echo WP_HOME; ?>/images/takuhai/yukata-v2/title-column-top-left-tkh-yukata.svg" alt=""></div>
                                                    <h2 class="title-main">浴衣の豆知識</h2>
                                                    <div class="image image-right"><img data-src="<?php echo WP_HOME; ?>/images/takuhai/yukata-v2/title-column-top-right-tkh-yukata.svg" alt=""></div>
                                                </div>
                                                <p class="sub-title">〜正しく美しく着るために〜</p>
                                            </div>
                                            <?php echo do_shortcode('[kimono_column_v2]'); ?>
                                        </div>
                                    </div>

                                    <div class="wrap-line-v2"><div class="line-v2 line-v2-single"></div></div>

                                    <div class="wrap-confidence wrap-confidence-fm-v2 <?= $postName; ?>">
                                        <div class="wrap-title-v2-other">
                                            <div class="wrap-title-v2 flexbox">
                                            <span class="icon-circle">
                                                <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                            </span>
                                                <div class="wrap-text-title">
                                                    <h2 class="lbl-title">あんしんの理由</h2>
                                                    <span class="des-sm-title">Reason for confidence</span>
                                                </div>
                                            </div>
                                            <?php if($isSmartPhone) : ?>
                                                <div class="right-pic-title">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="wrap-content-confidence">
                                            <div class="des-confidence">
                                                <?php if($isSmartPhone) : ?>
                                                    <p class="text-confidence">
                                                        きものレンタルwargoを運営する株式会社和心は
                                                    </p>
                                                    <p class="text-confidence">
                                                        呉服業界では珍しく、東証マザーズに上場し信頼の
                                                    </p>
                                                    <p class="text-confidence">
                                                        おける企業運営を行っています。
                                                    </p>
                                                    <p class="text-confidence">
                                                        着物レンタル以外にも、かんざし・帯留や和傘といっ
                                                    </p>
                                                    <p class="text-confidence">
                                                        た和装小物の専門店を多数運営しており
                                                    </p>
                                                    <p class="text-confidence">
                                                        日本全国で毎年大変多くの方にご利用いただいてい
                                                    </p>
                                                    <p class="text-confidence">
                                                        ます。
                                                    </p>
                                                <?php else: ?>
                                                    <p>きものレンタルwargoを運営する株式会社和心は</p>
                                                    <p>呉服業界では珍しく、東証マザーズに上場し信頼のおける企業運営を行っています。</p>
                                                    <p>着物レンタル以外にも、かんざし・帯留や和傘といった</p>
                                                    <p>和装小物の専門店を多数運営しており</p>
                                                    <p>日本全国で毎年大変多くの方にご利用いただいています。</p>
                                                <?php endif; ?>


                                                <?php if(!$isSmartPhone) : ?>
                                                    <div class="right-pic-title">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/r-img-title.png" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <ul class="list-img-confidence flexbox">
                                                <li class="item-img-confidence">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-01.jpg" alt="">
                                                </li>
                                                <li class="item-img-confidence">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-02.jpg" alt="">
                                                </li>
                                                <li class="item-img-confidence">
                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/confidence-03.jpg" alt="">
                                                </li>
                                            </ul>
                                            <div class="text-big-confidence">
                                                <p>運営会社「株式会社 和心」について</p>
                                                <p class="yellow text-gold">《東証マザーズ上場企業》</p>
                                            </div>
                                            <div class="wrap-data-confidence">
                                                <div class="data-confidence-01">
                                                    <div class="title-data-confidence">着物レンタル（年間着付人数）</div>
                                                    <div class="content-data-confidence text-gold">154,384<small>人</small></div>
                                                    <div class="years-data-confidence">（ 2018年実績）</div>
                                                </div>
                                                <div class="data-confidence-01">
                                                    <div class="title-data-confidence">店舗数</div>
                                                    <div class="content-data-confidence text-gold">89<small>店</small></div>
                                                    <div class="years-data-confidence">（ 2018年現在 ）</div>
                                                </div>
                                            </div>
                                            <div class="wrap-logo-confidence">
                                                <ul class="list-logo-confidence">
                                                    <li class="item-logo-confidence item-logo-confidence-01">
                                                        <a href="<?= WP_HOME; ?>/"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-02">
                                                        <a href="https://www.wargo.jp/products/list86.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-03">
                                                        <a href="https://www.wargo.jp/products/list633.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-04">
                                                        <a href="https://www.wargo.jp/products/list939.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-05">
                                                        <a href="https://shop-list.wargo.jp/hashi-mansaku"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-06">
                                                        <a href="https://www.wargo.jp/products/list626.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-07">
                                                        <a href="https://www.wargo.jp/products/list85.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-08">
                                                        <a href="https://www.wargo.jp/products/list823.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" alt=""></a>
                                                    </li>
                                                    <li class="item-logo-confidence item-logo-confidence-09">
                                                        <a href="https://www.wargo.jp/products/list718.html"><img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-end-confidence">
                                                <p>「日本のカルチャーを世界へ」をキャッチフレーズに、 <br>古くて新しい和の心をTotal Creative Produceし</p>
                                                <p>世界に誇るべき日本の伝統文化の楽しい発信基地と <br>なることを目指しています。</p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $section_intro_bottom = get_field('section_intro_bottom');
                                        if ($section_intro_bottom) {
                                            echo do_shortcode(php_set_base_url($section_intro_bottom));
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('formal'); ?>
<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
    'selectedShop' => $shop_id
))
?>
<style type="text/css">
    *{
        min-height: 0;
        min-width: 0;
    }
</style>

<script type="text/javascript">
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

        /* Show formal popup - start */
        $('.formal-preview-popup-handle').click(function (event) {
            event.preventDefault();
            $('.wrap-toggle-left-sidebar').css("overflow", "hidden");
            $('#formal-preview-popup').show(0, function () {
                $("html").addClass("modal-open");
                if(!$("#formal-preview-popup input.preview-shops:checked").length){
                    $("#formal-preview-popup input.preview-shops:first").attr('checked','checked').trigger('change');
                }
            });
            $('#botDiv').hide();
        });

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
        /* Show formal popup - end */

        //Show more plan
        $('.plan-img').click(function(){
            var detail = $(this).next();
            detail.addClass('open');
        });
        $('.show-less').click(function(){
            $(this).closest('.plan-info').removeClass('open');
        });

        //Toggle faq
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });

    })
</script>

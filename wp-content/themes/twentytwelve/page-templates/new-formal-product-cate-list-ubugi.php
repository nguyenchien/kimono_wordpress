<?php
/**
 * Template Name: New Formal Product Cate List Ubugi
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

global $language, $post;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
$postName = $post->post_name;
//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;
get_header('formal-v2');
?>
<?php if($isSmartPhone):?>
    <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css"></noscript>
<?php else: ?>
    <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css"></noscript>
<?php endif; ?>
<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>

<?php
wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('jquery-visible', 'https://kyotokimono-rental.com/js/jquery.visible.min.js');
?>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
<style>
    .wrap-languages{
        display: none;
    }
    p.name.namefurisode{
        text-align: center!important;
    }
</style>

<?php if($isSmartPhone):?>
    <div class="container-box clearfix">
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php
                                    if($isSmartPhone){
                                        //echo FormalSidebarLeftCodeNewStyle(array());
                                    }else{
                                        if($postName != 'list'){
                                            echo FormalSidebarLeftCodeNewStyle(array('type'=>'planlist'));
                                            echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                        }else if($postName == 'list'){
                                            echo FormalSidebarFilterCode(array());
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="right-column right-column-list right-cate-list-v3 <?= $postName?>">
                                    <div class="padding-v2">
                                        <h1 class="title-name-formal">お宮参りの産着・祝い着・初着レンタル | 安心のフルセット！<br>全国宅配・店舗でお着付け可能</h1>
                                        <section class="banner-section">
                                            <div class="wrap-banner-top">
                                                <img src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/07/main-banner-fm-v2-sp-ubugi.jpg" alt="お宮参りの祝い着・初着・産着レンタル|きものレンタルwargo">
                                                <div class="wrap-intro">
                                                    <p>まずはこちらからカンタン検索♪</p>
                                                    <div class="wrap-btn-fm flexbox justify-content-between">
                                                        <a href="javascrip:void(0)" class="btn-preview formal-preview-popup-handle">
                                                        <span class="icon">
                                                            <img class="lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/icon-calendar.svg" alt="">
                                                        </span>下見の来店予約はこちら
                                                        </a>
                                                        <a href="<?= home_url() ?>/takuhai" class="btn-list">
                                                        <span class="icon">
                                                            <img class="lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/icon-delivery.svg" alt="">
                                                        </span>宅配レンタルはこちら
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="intro-section">
                                            <div class="wrap-title-intro lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                                <h2 class="title">初めてのお宮参り<br class="sp"/> <span class="lg-txt">産着レンタルでも<br class="sp"/></span>安心な理由</h2>
                                            </div>
                                            <div class="content-intro">
                                                <ul class="list-items-option-point flexbox">
                                                    <li class="items-option-point items-option-point-04 flexbox">
                                                        <p class="icon-option-point option-point-04"></p>
                                                        <h3 class="infor-option-point flexbox">
                                                            <span class="infor-top">お宮参りに最適な、着物と小物5点セット！</span>
                                                        </h3>
                                                    </li>
                                                    <li class="items-option-point items-option-point-03 flexbox">
                                                        <p class="icon-option-point option-point-03"></p>
                                                        <h3 class="infor-option-point flexbox">
                                                            <span class="infor-top">ご試着体験30分無料！</span>
                                                        </h3>
                                                    </li>

                                                    <li class="items-option-point items-option-point-05 flexbox">
                                                        <p class="icon-option-point option-point-05"></p>
                                                        <h3 class="infor-option-point flexbox">
                                                            <span class="infor-top">最高品質クリーニング</span>
                                                        </h3>
                                                    </li>
                                                    <li class="items-option-point items-option-point-06 flexbox">
                                                        <p class="icon-option-point option-point-06"></p>
                                                        <h3 class="infor-option-point flexbox">
                                                            <span class="infor-top">宅配では3泊4日レンタル&送料無料!</span>
                                                        </h3>
                                                    </li>
                                                    <li class="items-option-point items-option-point-02 flexbox">
                                                        <p class="icon-option-point option-point-02"></p>
                                                        <h3 class="infor-option-point flexbox">
                                                            <span class="infor-top">選べるレンタル方法</span>
                                                        </h3>
                                                    </li>
                                                </ul>
                                                <div class="wrap-btn-link flexbox justify-content-center">
                                                    <a href="#reason" class="link-to">さらに詳しく「選ばれる理由」を見る</a>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="scene-section">
                                            <div class="banner-header-general">
                                                <div class="wrap-title-fm">
                                                    <p class="main-title">Category</p>
                                                    <h2 class="title">お宮参りの着物を種類別で探す</h2>
                                                </div>
                                            </div>
                                            <div class="des-title text-center lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                                命のはじまりを祝う産着。<br>昔から脈々と受け継がれる、お子様の健やかな幸せを祈る気持ちを象った、吉祥文様の祝い着を、多数ご用意しています。
                                            </div>
                                            <div class="wrap-content-scene">
                                                <div class="list-scene">
                                                    <ul class="list-detail-scene flexbox">
                                                        <li class="item-list-scene boy">
                                                            <a href="<?= home_url() ?>/formal/ubugi/boy">
                                                                <span class="img-h"><img data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-boy-sp.jpg?ver=31012020" alt="産着 - 男の子"></span>
                                                                <p class="desc">鷹・兜・龍などの、男の子にぴったりの柄やお色をご用意しております。</p>
                                                                <h3 class="scene-name">産着 - 男の子</h3>
                                                            </a>
                                                        </li>
                                                        <li class="item-list-scene girl">
                                                            <a href="<?= home_url() ?>/formal/ubugi/girl">
                                                                <span class="img-h"><img data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-girl-sp.jpg?ver=31012020" alt="産着 - 女の子"></span>
                                                                <p class="desc">花車・毬・鈴などの、女の子にぴったりのかわいらしい柄やお色をご用意しております。</p>
                                                                <h3 class="scene-name">産着 - 女の子</h3>
                                                            </a>
                                                        </li>
                                                        <li class="item-list-scene homongi">
                                                            <a href="<?= home_url() ?>/formal/homongi">
                                                                <span class="img-h"><img data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-homongi-sp.jpg?ver=31012020" alt="産着 - 女の子"></span>
                                                                <p class="desc">産着の下も美しく。華やかで上品なお着物をご用意しております。</p>
                                                                <h3 class="scene-name">着物 - お母様</h3>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <a href="<?= home_url() ?>/formal/ubugi/list" class="btn-v2 btn-list">
                                                    <div class="text">
                                                        <span class="text-link">すべての産着商品を見る</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </section>
                                        <section class="color-section wrap-banner-related-ubugi-brand">
                                            <div class="banner-header-general ubugi-brand lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/bg-title-ubugi-brand-sp.jpg">
                                                <div class="wrap-title-fm">
                                                    <p class="main-title">BRAND</p>
                                                    <h2 class="title">お宮参りの産着をブランドから探す</h2>
                                                </div>
                                            </div>
                                            <div class="des-title lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/bg-asakusa-prime-group-sp.png">
                                                九重・JAPANSTYLEといった京都丸紅が手掛けるデザイナーズのお着物です。<br class="sp">モダンでオシャレな柄で、特別な一日をより思い出深いものに。
                                            </div>
                                            <div class="wrap-slider-product">
                                                <div class="slider-ranking">
                                                    <div class="widget-list-product-highend more-items">
                                                        <?= do_shortcode('[filter_formal_product product_ids=18444,18494,18583,18447, show_filter=false enable_lazy_load=0]'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-content-color">
                                                <div class="wrap-btn-v2 flexbox">
                                                    <a href="<?= home_url() ?>/formal/ubugi/brand" class="btn-v2 btn-list">
                                                        <div class="text">
                                                            <span class="text-link">ブランド産着商品を見る</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="color-section">
                                            <div class="banner-header-general lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/banner-color-ld-ubugi-sp.jpg">
                                                <div class="wrap-title-fm">
                                                    <p class="main-title">COLOR</p>
                                                    <h2 class="title">お宮参りの産着をお色から探す</h2>
                                                </div>
                                            </div>
                                            <div class="des-title">
                                                はっきりとしたお色味が華やかな産着。凛々しく勇ましい色や、明るく華やかな色など種類は様々です。wargoでは様々なお色の産着をご用意しておりますので、是非探してみてください♪
                                            </div>
                                            <div class="wrap-content-color">
                                                <ul class="list-item-content flexbox">
                                                    <li class="item-content">
                                                        <a href="<?= home_url()?>/formal/ubugi/black">
                                                            <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-color-black.jpg?ver=31012020" alt="黒系の産着">
                                                            <h3 class="color-name">黒系の産着</h3>
                                                        </a>
                                                    </li>
                                                    <li class="item-content">
                                                        <a href="<?= home_url()?>/formal/ubugi/blue">
                                                            <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-color-blue.jpg?ver=31012020" alt="青系の産着">
                                                            <h3 class="color-name">青系の産着</h3>
                                                        </a>
                                                    </li>
                                                    <li class="item-content">
                                                        <a href="<?= home_url()?>/formal/ubugi/red">
                                                            <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-color-red.jpg?ver=31012020" alt="赤系の産着">
                                                            <h3 class="color-name">赤系の産着</h3>
                                                        </a>
                                                    </li>
                                                    <li class="item-content">
                                                        <a href="<?= home_url()?>/formal/ubugi/pastel">
                                                            <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-color-pastel.jpg?ver=31012020" alt="パステル系の産着">
                                                            <h3 class="color-name">パステル系の産着</h3>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="wrap-btn-v2 flexbox">
                                                    <a href="<?= home_url() ?>/formal/ubugi/list" class="btn-v2 btn-list">
                                                        <div class="text">
                                                            <span class="text-link">すべての産着商品を見る</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="product-ranking-section">
                                            <div class="row">
                                                <div class="slider-ranking wrap-slider-product" id="slider-ranking">
                                                    <div class="wrap-list-formal-product">
                                                        <div class="wrap-content-ranking ubugi">
                                                            <div class="wrap-img-ranking lazy" data-src="/images/formal-rental/formal-list-v3/bg-ranking-ld-ubugi-sp.jpg">
                                                                <div class="wrap-text-title">
                                                                    <h2 class="lbl-title">お宮参りレンタル<br>ランキング</h2>
                                                                    <div class="des-sm-title">今人気の商品が一目でわかる♪</div>
                                                                </div>
                                                            </div>
                                                            <ul class="list-product-landing-ubugi flexbox">
                                                                <li class="items-product-landing-ubugi men-product-ubugi" data-target="ubugi-boy">
                                                                    <h3 class="name-product-landing">男の子</h3>
                                                                </li>
                                                                <li class="items-product-landing-ubugi women-product-ubugi" data-target="ubugi-girl">
                                                                    <h3 class="name-product-landing">女の子</h3>
                                                                </li>
                                                                <li class="items-product-landing-ubugi customer-product-ubugi" data-target="ubugi-homongi">
                                                                    <h3 class="name-product-landing">お母様<var class="sm-name-pr-ld">（訪問着）</var></h3>
                                                                </li>
                                                            </ul>
                                                            <div class="wrap-product-list"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <?php if($postName!="ubugi"):?>
                                        <div class="banner-option">
                                            <a href="/photo-session" style="display: inline-block">
                                                <img data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/banner-of-outdoor-photo-plan-sp.png" alt="">
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                        <section class="set-content-section">
                                            <?php
                                            $set_content_sp = get_field('set_content_sp');
                                            if ($set_content_sp) {
                                                echo do_shortcode(php_set_base_url($set_content_sp));
                                            }
                                            ?>
                                        </section>

                                        <section class="reason-point-section">
                                            <?php
                                            $reason_choose_sp = get_field('reason_choose_sp');
                                            if ($reason_choose_sp) {
                                                echo do_shortcode(php_set_base_url($reason_choose_sp));
                                            }
                                            ?>
                                        </section>
                                        <?php if($postName == 'ubugi'):?>
											<section class="section-faq">
												<div class="wrap-title">
													<p class="main-title">FAQ</p>
													<h2 class="sub-title">皆様からいただけるよくあるご質問♪</h2>
												</div>
												<div class="wrap-faq">
													<div class="faq-content">
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">キャンセルについて</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">【上級来店着付け】</p>
																<p class="text-item-content">■振袖・袴・七五三のレンタルを含むご予約</p>
																<p class="text-item-content">[ご利用日]から30日前までのキャンセル ：無料</p>
																<p class="text-item-content">[ご利用日]から29日以内のキャンセル ：ご利用料金の100％</p>
																<br>
																<p class="text-item-content">■その他（訪問着等）のお着物のみのご予約</p>
																<p class="text-item-content">[ご利用日]から30日前までのキャンセル ：無料</p>
																<p class="text-item-content">[ご利用日]から29日～7日前までのキャンセル：ご利用料金の30％</p>
																<p class="text-item-content">[ご利用日]から6日以内のキャンセル ：ご利用料金の100％</p>
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">早朝の予約が入れれません</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">早朝のご予約はお下見の際に店頭でお申し付け頂くか <a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>にお問い合わせ下さい。</p>
																<!--																<p class="text-item-content">--><?php //echo Yii::t('new-top-page-kimono-v3', 'キャンセルの場合はご来店予定日の二日前までご予約確認メールにある項目3「ご予約プランの詳細」リンクからキャンセルをお願い致します。<br/>ただし下記のキャンセル料金が発生いたしますのでご了承ください。<br/>ご利用日］から2日前までのキャンセル：キャンセル料無料<br/>※事務手数料500円(税別)のみ頂きます<br/>［ご利用日］の前日および当日のキャンセル：ご利用料金の100％'); ?><!--</p>-->
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">当日予約可能ですか？</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">
																	冠婚葬祭用のお着物の即時ご予約は承っておりません。<br>
																	ご予約は一週間前からご予約可能です。
																</p>
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">訪問着の場合もヘアセットはついていますか？</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">
																	冠婚葬祭のお着物でご利用はヘアセットオプションご利用をお勧めいたします。<br/><a href="<?= WP_HOME; ?>/hairset">&gt;&gt;ヘアセットについてはこちら</a>
																</p>
															</div>
														</div>
													</div>
												</div>
											</section>
                                        <?php endif; ?>
                                        <section class="shoplist-section">
                                            <?php
                                            $shop_list_sp = get_field('shop_list_sp');
                                            if ($shop_list_sp) {
                                                echo do_shortcode(php_set_base_url($shop_list_sp));
                                            }
                                            ?>
                                        </section>

                                        <section class="voice-section voice-section-ubugi">
                                            <div class="title-checking review-title" style="text-align: center">
                                                <span class="icon"></span>
                                                <h2 class="text-title-checking">お宮参りで産着を<br class="sp"/>ご利用いただいたお客様のお声</h2>
                                            </div>
                                            <div class="wrap-box-review"></div>
                                            <div class="wrap-btn-v2 wrap-btn-review flexbox">
                                                <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-ubugi" class="btn-v2 btn-review">
                                                    <span class="icon"></span>
                                                    <div class="text">
                                                        <span class="text-link">すべてのお客様の声を見る</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </section>
                                        <?php
                                        $custom_faq = get_field('custom_faq');
                                        if ($custom_faq) {
                                            echo do_shortcode(php_set_base_url($custom_faq));
                                        }
                                        ?>
                                        <section class="rental-section">
                                            <div class="wrap-text-banner-checking">
                                                <div class="title-checking">
                                                    <h2 class="text-title-checking">レンタルのご予約方法</h2>
                                                </div>
                                            </div>
                                            <div class="wrap-content-rental">
                                                <div class="list-content flexbox">
                                                    <div class="item-content reservation-store">
                                                        <h3 class="title-item">ご来店でご予約</h3>
                                                        <div class="detail-item">
                                                            <p>きものレンタルwargo フォーマル着物取扱店舗では下見および<br/>ご来店でのご予約も承っております。</p>
                                                            <p>
																無料の下見をご予約いただき、お着物を選んでいただいた上で、配送のご予約をいただくことが可能です。店頭での現金払い、クレジットカード払いも選択していただけます。<br/>
																※下見は30分以内無料で、ご成約された場合は30分以上の下見に関しても無料となります。
															</p>
                                                        </div>
                                                        <div class="group-btn">
                                                            <div class="wrap-btn-link flexbox justify-content-center no-bg arrow-right">
                                                                <a href="<?= home_url() ?>/formal/howto" class="link-to">来店レンタルの流れはこちら</a>
                                                            </div>
                                                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                                                <a href="" class="link-to formal-preview-popup-handle">
                                                                    <span class="btn-icon">
                                                                        <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-calendar-v3.svg" alt="">
                                                                    </span>下見の来店予約はこちら
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-content web-store">
                                                        <h3 class="title-item">WEBでご予約</h3>
                                                        <div class="detail-item">
                                                            宅配着物レンタルwargoのウェブサイトからお着物を選んでいただき、ご予約をいただくことが可能です。スマートフォン・パソコンからご予約いただけます。<br>
                                                            お申し込みにはクレジットカードが必要です。
                                                        </div>
                                                        <div class="wrap-rental-flow">
                                                            <div class="wrap-title-delivery flexbox align-items-center justify-content-between">
                                                                <span class="icon">
                                                                    <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-rental-delivery.svg" alt="">
                                                                </span>
                                                                <h4 class="title">宅配レンタルの流れ</h4>
                                                            </div>
                                                            <div class="group-step-flow">
                                                                <div class="title-group-step">
                                                                    <span class="step-num">01</span>
                                                                    <var>/</var>
                                                                    <h5 class="step-name">お届け日程</h5>
                                                                </div>
                                                                <p class="desc-step desc-center">お貸し出しは3泊4日で、ご利用日の2日前にお届けいたします。</p>
                                                            </div>
                                                            <div class="group-step-flow">
                                                                <div class="title-group-step">
                                                                    <span class="step-num">02</span>
                                                                    <var>/</var>
                                                                    <h5 class="step-name">お届け日の例</h5>
                                                                </div>
                                                                <p class="desc-step desc-center">ご利用日が5月10日の場合</p>
                                                                <ul class="list-step-num list-step-num-homongi flexbox">
                                                                    <li class="item-step-num">
                                                                        <div class="wrap-sm-circle">
                                                                            <div class="sm-circle bg-orange-homongi flexbox align-items-center justify-content-center"><span class="sm-num">5/8</span></div>
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
                                                                            <div class="sm-circle bg-emerald flexbox align-items-center justify-content-center"><span class="sm-num">5/11</span></div>
                                                                        </div>
                                                                        <div class="des-sm-circle">ご返送日</div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="group-step-flow last">
                                                                <div class="title-group-step">
                                                                    <span class="step-num">03</span>
                                                                    <var>/</var>
                                                                    <h5 class="step-name">レンタルの延長</h5>
                                                                </div>
                                                                <p class="desc-step">お貸出期間のご延長をご希望の場合の料金は 1日につき2,000円(+tax)となっております。
                                                                    3日以上延泊をご希望のお客様は別途お問い合わせフォームよりご連絡くださいませ。</p>
                                                            </div>
                                                        </div>
                                                        <div class="group-btn">
                                                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                                                <a href="<?= home_url() ?>/formal/ubugi/list" class="link-to">
                                                                    <span class="btn-icon">
                                                                        <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-v3.svg" alt="">
                                                                    </span>宅配レンタル産着一覧はこちら
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <section class="column-section">
                                        </section>

                                        <section class="about-section">
                                            <div class="wrap-title-fm">
                                                <p class="main-title">ABOUT</p>
                                            </div>
                                            <div class="intro-title">私たちについて</div>
                                            <div class="detail-about">
                                                <p class="text-1">
                                                    きものレンタルwargoを運営する株式会社和心は <br>
                                                    呉服業界では珍しく、東証マザーズに上場し信頼の <br>
                                                    おける企業運営を行っています。
                                                </p>
                                                <p class="text-2">
                                                    着物レンタル以外にも、かんざし・帯留や和傘といった <br>
                                                    和装小物の専門店を多数う
                                                </p>
                                            </div>
                                            <div class="about-opera">
                                                運営会社「株式会社和心」について
                                            </div>
                                            <div class="name-company">
                                                <<東証マザーズ上場企業>>
                                            </div>
                                            <div class="list-content-about flexbox">
                                                <div class="item-list">
                                                    <p class="title-header">
                                                        着物レンタル（年間着付人数）
                                                    </p>
                                                    <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-about-v3.svg" alt="">
                                                    <p class="data-number">
                                                        <var>154,384</var> 人 <br>（2018年実績）
                                                    </p>
                                                </div>
                                                <div class="item-list">
                                                    <p class="title-header">
                                                        店舗数
                                                    </p>
                                                    <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-home-about-v3.svg" alt="">
                                                    <p class="data-number">
                                                        <var>89</var> 店 <br>（2018年現在）
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="wrap-bottom-about">
                                                <div class="wrap-logo-confidence">
                                                    <ul class="list-logo-confidence">
                                                        <li class="item-logo-confidence item-logo-confidence-01">
                                                            <a href="<?= WP_HOME; ?>/"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" alt="<?= Yii::t('formal_v2','観光着物・浴衣・冠婚葬祭着物レンタル きものレンタルwargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-02">
                                                            <a href="https://www.wargo.jp/products/list86.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" alt="<?= Yii::t('formal_v2','かんざし専門店 かんざし屋wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-03">
                                                            <a href="https://www.wargo.jp/products/list633.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" alt="<?= Yii::t('formal_v2','帯留専門店 おびどめ屋wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-04">
                                                            <a href="https://www.wargo.jp/products/list939.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" alt="<?= Yii::t('formal_v2','箸・箸置き専門店 箸や万作')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-05">
                                                            <a href="https://shop-list.wargo.jp/hashi-mansaku"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" alt="<?= Yii::t('formal_v2','うつわ専門店 万作ギャラリー')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-06">
                                                            <a href="https://www.wargo.jp/products/list626.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" alt="<?= Yii::t('formal_v2','和傘・和柄傘専門店 北斎グラフィック')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-07">
                                                            <a href="https://www.wargo.jp/products/list85.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" alt="<?= Yii::t('formal_v2','和アクセサリー専門店 かすう工房')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-08">
                                                            <a href="https://www.wargo.jp/products/list823.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" alt="<?= Yii::t('formal_v2','和装・着付け小物専門店 和装問屋wargo')?>"></a>
                                                        </li>
                                                        <li class="item-logo-confidence item-logo-confidence-09">
                                                            <a href="https://www.wargo.jp/products/list718.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" alt="<?= Yii::t('formal_v2','浴衣専門店 ゆかた屋hiyori')?>"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="des-intro-about">
                                                    「日本のカルチャーを世界へ」をキャッチフレーズに、古くて新しいい和の心を<br>
                                                    Total Creative Produceし世界に誇るべき日本の伝統文化の楽しい発信基地と<br>
                                                    なることを目指しています。
                                                </div>
                                            </div>
                                        </section>
                                        <section class="bottom-section">
                                            <div class="container-box">
                                                <?php
                                                $intro_bottom = get_field('intro_bottom');
                                                if ($intro_bottom) {
                                                    echo do_shortcode(php_set_base_url($intro_bottom));
                                                }
                                                ?>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container-box clearfix">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
        }
        ?>
        <h1 class="title-name-formal">お宮参りの産着・祝い着・初着レンタル | 安心のフルセット！全国宅配・店舗でお着付け可能</h1>
    </div>

    <section class="banner-section">
        <div class="container-box">
            <div class="wrap-banner-top">
                <ul class="list-banner-fm" id="list-banner-fm">
                    <li class="item">
                        <img src="https://kyotokimono-rental.com/wordpress/wp-content/uploads/2021/07/main-banner-fm-v2-pc-ubugi.jpg" alt="お宮参りの祝い着・初着・産着レンタル|きものレンタルwargo">
                    </li>
                </ul>
                <div class="wrap-intro flexbox">
                    <p>まずはこちらから <br>カンタン検索♪</p>
                    <div class="wrap-btn-fm flexbox justify-content-between">
                        <a href="javascrip:void(0)" class="btn-preview formal-preview-popup-handle">
                            <span class="icon">
                                <img class="lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/icon-calendar.svg" alt="">
                            </span>下見の来店予約はこちら
                        </a>
                        <a href="<?= home_url() ?>/takuhai" class="btn-list">
                            <span class="icon">
                                <img class="lazy" data-src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/icon-delivery.svg" alt="">
                            </span>宅配レンタルはこちら
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="intro-section lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/bg-ubugi-prime.png">
        <h2 class="title-intro">
            初めてのお宮参り <span class="lg-txt">産着レンタルでも</span>安心な理由
        </h2>
        <div class="wrap-title-fm-other">
            <p class="sub-title">Point</p>
            <p class="main-title">wargoを選ぶ5つの理由</p>
        </div>
        <ul class="list-items-option-point flexbox">
            <li class="items-option-point items-option-point-02 flexbox">
                <p class="icon-option-point option-point-02"></p>
                <h3 class="infor-option-point flexbox">
                    <span class="infor-top">レンタル方法が</span>
                    <span class="infor-bottom color-yellow">選べる！</span>
                </h3>
            </li>
            <li class="items-option-point items-option-point-03 flexbox">
                <p class="icon-option-point option-point-03"></p>
                <h3 class="infor-option-point flexbox">
                    <span class="infor-top">ご試着体験</span>
                    <span class="infor-bottom color-yellow">30分無料！</span>
                </h3>
            </li>
            <li class="items-option-point items-option-point-04 flexbox">
                <p class="icon-option-point option-point-04"></p>
                <h3 class="infor-option-point flexbox">
                    <span class="infor-top">全部入った16点</span>
                    <span class="infor-bottom color-yellow">フルセット！</span>
                </h3>
            </li>
            <li class="items-option-point items-option-point-05 flexbox">
                <p class="icon-option-point option-point-05"></p>
                <h3 class="infor-option-point flexbox">
                    <span class="infor-top">最高品質の</span>
                    <span class="infor-bottom color-yellow">クリーニング</span>
                </h3>
            </li>
            <li class="items-option-point items-option-point-06 flexbox">
                <p class="icon-option-point option-point-06"></p>
                <h3 class="infor-option-point flexbox">
                    <span class="infor-top infor-bottom">3泊4日レンタル</span>
                    <span class="infor-bottom color-yellow">＆送料無料！</span>
                </h3>
            </li>
        </ul>
        <div class="wrap-btn-link flexbox justify-content-center">
            <a href="#reason" class="link-to">
                さらに詳しく「選ばれる理由」を見る
            </a>
        </div>
    </section>
    <div class="container-box clearfix">
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="left-column hidden-sidebar">
                                    <?php
                                    if($isSmartPhone){
                                    }else{
                                        if($postName != 'list'){
                                            echo FormalSidebarLeftCodeNewStyle(array());
                                        }else if($postName == 'list'){
                                            echo FormalSidebarLeftCodeNewStyle(array());
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="right-column right-column-list right-cate-list-v3 <?= $postName?>">
                                    <div class="padding-v2">
                                        <section class="scene-section">
                                            <div class="banner-header-general">
                                                <div class="wrap-title-fm">
                                                    <p class="sub-title">Category</p>
                                                    <h2 class="main-title">お宮参りの着物を種類別で探す</h2>
                                                </div>
                                            </div>
                                            <div class="des-title lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/bg-ubugi-prime.png">
                                                命のはじまりを祝う産着。昔から脈々と受け継がれる、お子様の健やかな幸せを祈る気持ちを象った、<br>吉祥文様の祝い着を、多数ご用意しています。
                                            </div>
                                            <div class="wrap-content-scene">
                                                <div class="list-scene">
                                                    <ul class="list-detail-scene flexbox">
                                                        <li class="item-list-scene boy">
                                                            <a href="<?= home_url() ?>/formal/ubugi/boy">
                                                                <span class="img-v"><img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-boy-pc.jpg?ver=31012020" alt="産着 - 男の子"></span>
                                                                <p class="desc">鷹・兜・龍などの、男の子にぴったりの柄やお色をご用意しております。</p>
                                                                <h3 class="scene-name">産着 - 男の子</h3>
                                                            </a>
                                                        </li>
                                                        <li class="item-list-scene girl">
                                                            <a href="<?= home_url() ?>/formal/ubugi/girl">
                                                                <span class="img-v"><img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-girl-pc.jpg?ver=31012020" alt="産着 - 女の子"></span>
                                                                <p class="desc">花車・毬・鈴などの、女の子にぴったりのかわいらしい柄やお色をご用意しております。</p>
                                                                <h3 class="scene-name">産着 - 女の子</h3>
                                                            </a>
                                                        </li>
                                                        <li class="item-list-scene homongi">
                                                            <a href="<?= home_url() ?>/formal/homongi">
                                                                <span class="img-v"><img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-homongi-pc.jpg?ver=31012020" alt="着物 - お母様"></span>
                                                                <p class="desc">産着の下も美しく。華やかで上品なお着物をご用意しております。</p>
                                                                <h3 class="scene-name">着物 - お母様</h3>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="wrap-btn-v2 flexbox">
                                                <a href="<?= home_url() ?>/formal/ubugi/list" class="btn-v2 btn-list">
                                                    <div class="text">
                                                        <span class="text-link">すべての産着商品を見る</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </section>
                                        <section class="color-section wrap-banner-related-ubugi-brand">
                                            <div class="banner-header-general ubugi-brand lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/bg-title-ubugi-brand-pc.jpg">
                                                <div class="wrap-title-fm">
                                                    <p class="sub-title">BRAND</p>
                                                    <h2 class="main-title">お宮参りの産着をブランドから探す</h2>
                                                </div>
                                            </div>
                                            <div class="des-title">
                                                九重・JAPANSTYLEといった京都丸紅が手掛けるデザイナーズのお着物です。<br class="sp">モダンでオシャレな柄で、特別な一日をより思い出深いものに。
                                            </div>
                                            <div class="wrap-slider-product">
                                                <div class="slider-ranking">
                                                    <div class="widget-list-product-highend more-items">
                                                        <?= do_shortcode('[filter_formal_product product_ids=18444,18494,18583,18447, show_filter=false enable_lazy_load=0]'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-content-color">
                                                <div class="wrap-btn-v2 flexbox">
                                                    <a href="<?= home_url() ?>/formal/ubugi/brand" class="btn-v2 btn-list">
                                                        <div class="text">
                                                            <span class="text-link">ブランド産着商品を見る</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="color-section">
                                            <div class="banner-header-general lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/banner-color-ld-ubugi-pc.jpg">
                                                <div class="wrap-title-fm">
                                                    <p class="sub-title">Color</p>
                                                    <h2 class="main-title">お宮参りの産着をお色から探す</h2>
                                                </div>
                                            </div>
                                            <div class="des-title">
                                                はっきりとしたお色味が華やかな産着。凛々しく勇ましい色や、明るく華やかな色など種類は様々です。wargoでは様々なお色の産着をご用意しておりますので、是非探してみてください♪
                                            </div>
                                            <div class="wrap-content-color">
                                                <ul class="list-item-content flexbox">
                                                    <li class="item-content">
                                                        <a href="<?= home_url()?>/formal/ubugi/black">
                                                            <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-color-black.jpg?ver=31012020" alt="黒系の産着">
                                                            <h3 class="color-name">黒系の産着</h3>
                                                        </a>
                                                    </li>
                                                    <li class="item-content">
                                                        <a href="<?= home_url()?>/formal/ubugi/blue">
                                                            <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-color-blue.jpg?ver=31012020" alt="青系の産着">
                                                            <h3 class="color-name">青系の産着</h3>
                                                        </a>
                                                    </li>
                                                    <li class="item-content">
                                                        <a href="<?= home_url()?>/formal/ubugi/red">
                                                            <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-color-red.jpg?ver=31012020" alt="赤系の産着">
                                                            <h3 class="color-name">赤系の産着</h3>
                                                        </a>
                                                    </li>
                                                    <li class="item-content">
                                                        <a href="<?= home_url()?>/formal/ubugi/pastel">
                                                            <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/pic-ld-ubugi-color-pastel.jpg?ver=31012020" alt="パステル系の産着">
                                                            <h3 class="color-name">パステル系の産着</h3>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="wrap-btn-v2 flexbox">
                                                    <a href="<?= home_url()?>/formal/ubugi/list" class="btn-v2 btn-list">
                                                        <div class="text">
                                                            <span class="text-link">すべての産着商品を見る</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="product-ranking-section">
                                            <div class="row">
                                                <div class="slider-ranking wrap-slider-product" id="slider-ranking">
                                                    <div class="wrap-list-formal-product">
                                                        <div class="wrap-content-ranking ubugi">
                                                            <div class="wrap-img-ranking lazy" data-src="/images/formal-rental/formal-list-v3/bg-ranking-ld-ubugi-pc.jpg">
                                                                <div class="wrap-text-title">
                                                                    <h2 class="lbl-title">お宮参りレンタルランキング</h2>
                                                                    <div class="des-sm-title">今人気の商品が一目でわかる♪</div>
                                                                </div>
                                                            </div>
                                                            <ul class="list-product-landing-ubugi flexbox">
                                                                <li class="items-product-landing-ubugi men-product-ubugi" data-target="ubugi-boy">
                                                                    <h3 class="name-product-landing">男の子</h3>
                                                                </li>
                                                                <li class="items-product-landing-ubugi women-product-ubugi" data-target="ubugi-girl">
                                                                    <h3 class="name-product-landing">女の子</h3>
                                                                </li>
                                                                <li class="items-product-landing-ubugi customer-product-ubugi" data-target="ubugi-homongi">
                                                                    <h3 class="name-product-landing">お母様<var class="sm-name-pr-ld">（訪問着）</var></h3>
                                                                </li>
                                                            </ul>
                                                            <div class="wrap-product-list"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <?php if($postName!="ubugi"):?>
                                        <div class="banner-option">
                                            <a href="/photo-session" style="display: inline-block">
                                                <img data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/banner-of-outdoor-photo-plan-pc.png" alt="">
                                            </a>
                                            <h2 class="opt-title">
                                                <p class="sm">カメラマン</p>
                                                <p class="lg">撮影同行オプション</p>
                                            </h2>
                                        </div>
                                        <?php endif; ?>
                                        <section class="set-content-section">
                                            <?php
                                            $set_content_pc = get_field('set_content_pc');
                                            if ($set_content_pc) {
                                                echo do_shortcode(php_set_base_url($set_content_pc));
                                            }
                                            ?>
                                        </section>

                                        <section class="reason-point-section">
                                            <?php
                                            $reason_choose_pc = get_field('reason_choose_pc');
                                            if ($reason_choose_pc) {
                                                echo do_shortcode(php_set_base_url($reason_choose_pc));
                                            }
                                            ?>
                                        </section>
                                        <?php if($postName == 'ubugi'):?>
											<section class="section-faq">
												<div class="wrap-title">
													<p class="main-title">FAQ</p>
													<h2 class="sub-title">よくある質問</h2>
												</div>
												<div class="wrap-faq">
													<div class="faq-content">
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">キャンセルについて</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">【上級来店着付け】</p>
																<p class="text-item-content">■振袖・袴・七五三のレンタルを含むご予約</p>
																<p class="text-item-content">[ご利用日]から30日前までのキャンセル ：無料</p>
																<p class="text-item-content">[ご利用日]から29日以内のキャンセル ：ご利用料金の100％</p>
																<br>
																<p class="text-item-content">■その他（訪問着等）のお着物のみのご予約</p>
																<p class="text-item-content">[ご利用日]から30日前までのキャンセル ：無料</p>
																<p class="text-item-content">[ご利用日]から29日～7日前までのキャンセル：ご利用料金の30％</p>
																<p class="text-item-content">[ご利用日]から6日以内のキャンセル ：ご利用料金の100％</p>
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">早朝の予約が入れれません</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">早朝のご予約はお下見の際に店頭でお申し付け頂くか <a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>にお問い合わせ下さい。</p>
																<!--																<p class="text-item-content">--><?php //echo Yii::t('new-top-page-kimono-v3', 'キャンセルの場合はご来店予定日の二日前までご予約確認メールにある項目3「ご予約プランの詳細」リンクからキャンセルをお願い致します。<br/>ただし下記のキャンセル料金が発生いたしますのでご了承ください。<br/>ご利用日］から2日前までのキャンセル：キャンセル料無料<br/>※事務手数料500円(税別)のみ頂きます<br/>［ご利用日］の前日および当日のキャンセル：ご利用料金の100％'); ?><!--</p>-->
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">当日予約可能ですか？</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">
																	冠婚葬祭用のお着物の即時ご予約は承っておりません。<br>
																	ご予約は一週間前からご予約可能です。
																</p>
															</div>
														</div>
														<div class="box-faqs-item-container items">
															<div class="box-faqs-item flexbox" data-faqs=".box-faqs-item-content">
																<div class="box-faqs-title flexbox justify-content-between"><p class="text-faqs-title">訪問着の場合もヘアセットはついていますか？</p>
																	<div class="wrap-arrow-faqs"><span class="icon-fa icon-fa-collapsed-down-faqs"></span></div>
																</div>
															</div>
															<div class="box-faqs-item-content">
																<p class="text-item-content">
																	冠婚葬祭のお着物でご利用はヘアセットオプションご利用をお勧めいたします。<br/><a href="<?= WP_HOME; ?>/hairset">&gt;&gt;ヘアセットについてはこちら</a>
																</p>
															</div>
														</div>
													</div>
												</div>
											</section>
                                        <?php endif; ?>
                                        <section class="shoplist-section">
                                            <?php
                                            $shop_list_pc = get_field('shop_list_pc');
                                            if ($shop_list_pc) {
                                                echo do_shortcode(php_set_base_url($shop_list_pc));
                                            }
                                            ?>
                                        </section>

                                        <section class="voice-section voice-section-ubugi">
                                            <div class="title-checking review-title" style="text-align: center">
                                                <span class="icon"></span>
                                                <h2 class="text-title-checking">お宮参りで産着を<br class="sp"/>ご利用いただいたお客様のお声</h2>
                                            </div>
                                            <div class="wrap-box-review"></div><!--end wrap-box-review-->
                                            <div class="wrap-btn-v2 flexbox">
                                                <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-ubugi" class="btn-v2 btn-review">
                                                    <span class="icon"></span>
                                                    <div class="text">
                                                        <span class="text-link">すべてのお客様の声を見る</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </section>
                                        <?php
                                        $custom_faq = get_field('custom_faq');
                                        if ($custom_faq) {
                                            echo do_shortcode(php_set_base_url($custom_faq));
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
    <section class="rental-section">
        <div class="container-box">
            <div class="wrap-title-fm-other">
                <p class="sub-title">Rental</p>
                <h2 class="main-title">レンタルのご予約方法</h2>
            </div>
            <div class="wrap-content-rental">
                <div class="list-content flexbox">
                    <div class="item-content reservation-store">
                        <div class="detail item">
                            <h3 class="title-item">ご来店でご予約</h3>
                            <div class="detail-item">
								きものレンタルwargo フォーマル着物取扱店舗では下見およびご来店でのご予約も承っております。<br/>
								無料の下見をご予約いただき、お着物を選んでいただいた上で、配送のご予約をいただくことが可能です。店頭での現金払い、クレジットカード払いも選択していただけます。<br/>
								※下見は30分以内無料で、ご成約された場合は30分以上の下見に関しても無料となります。
                            </div>
                        </div>
                        <div class="group-btn">
                            <div class="wrap-btn-link flexbox justify-content-center no-bg arrow-right">
                                <a href="<?= home_url() ?>/formal/howto" class="link-to">
                                    来店レンタルの流れはこちら
                                </a>
                            </div>
                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                <a href="javascrip:void(0)" class="link-to formal-preview-popup-handle">
                                    <span class="btn-icon">
                                        <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-calendar-v3.svg" alt="">
                                    </span>下見の来店予約をする
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item-content web-store">
                        <div class="detail-item">
                            <h3 class="title-item">
                                WEBでご予約
                            </h3>
                            <div class="detail-item">
                                宅配着物レンタルwargoのウェブサイトからお着物を選んでいただき、ご予約をいただくことが可能です。<br>
                                スマートフォン・パソコンからご予約いただけますお申し込みにはクレジットカードが必要です。
                            </div>
                        </div>
                        <div class="group-btn">
                            <div class="wrap-btn-link flexbox justify-content-center no-bg arrow-right">
                                <a href="<?= home_url() ?>/takuhai/howto" class="link-to">
                                    宅配レンタルの流れはこちら
                                </a>
                            </div>
                            <div class="wrap-btn-link flexbox justify-content-center arrow-right">
                                <a href="<?= home_url() ?>/formal/ubugi/list" class="link-to">
                                    <span class="btn-icon">
                                        <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-v3.svg" alt="">
                                    </span>宅配レンタル産着一覧はこちら
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="column-section lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v3/bg-column-homongi-pc.jpg">
    </section>
    <section class="about-section">
        <div class="container-box">
            <div class="box-content-about">
                <div class="wrap-title">
                    <p class="sub-title">ABOUT</p>
                    <h2 class="main-title">私たちについて</h2>
                </div>
                <div class="detail-about">
                    <p class="text-1">
                        きものレンタルwargoを運営する株式会社和心は <br>
                        呉服業界では珍しく、東証マザーズに上場し信頼の <br>
                        おける企業運営を行っています。
                    </p>
                    <p class="text-2">
                        着物レンタル以外にも、かんざし・帯留や和傘といった <br>
                        和装小物の専門店を多数う
                    </p>
                </div>
                <div class="about-opera text-center">
                    運営会社「株式会社和心」について
                </div>
                <div class="name-company text-center">
                    <<東証マザーズ上場企業>>
                </div>
                <div class="list-content-about flexbox">
                    <div class="item-list">
                        <p class="title-header">
                            着物レンタル（年間着付人数）
                        </p>
                        <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-about-v3.svg" alt="">
                        <p class="data-number">
                            <var>154,384</var> 人 <br>（2018年実績）
                        </p>
                    </div>
                    <div class="item-list">
                        <p class="title-header">
                            店舗数
                        </p>
                        <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-home-about-v3.svg" alt="">
                        <p class="data-number">
                            <var>89</var> 店 <br>（2018年現在）
                        </p>
                    </div>
                </div>
                <div class="wrap-bottom-about-homongi">
                    <div class="wrap-logo-confidence">
                        <ul class="list-logo-confidence">
                            <li class="item-logo-confidence item-logo-confidence-01">
                                <a href="<?= WP_HOME; ?>/"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-01.svg" alt="<?= Yii::t('formal_v2','観光着物・浴衣・冠婚葬祭着物レンタル きものレンタルwargo')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-02">
                                <a href="https://www.wargo.jp/products/list86.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-02.svg" alt="<?= Yii::t('formal_v2','かんざし専門店 かんざし屋wargo')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-03">
                                <a href="https://www.wargo.jp/products/list633.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-03.svg" alt="<?= Yii::t('formal_v2','帯留専門店 おびどめ屋wargo')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-04">
                                <a href="https://www.wargo.jp/products/list939.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-04.svg" alt="<?= Yii::t('formal_v2','箸・箸置き専門店 箸や万作')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-05">
                                <a href="https://shop-list.wargo.jp/hashi-mansaku"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-05.svg" alt="<?= Yii::t('formal_v2','うつわ専門店 万作ギャラリー')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-06">
                                <a href="https://www.wargo.jp/products/list626.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-06.svg" alt="<?= Yii::t('formal_v2','和傘・和柄傘専門店 北斎グラフィック')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-07">
                                <a href="https://www.wargo.jp/products/list85.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-07.svg" alt="<?= Yii::t('formal_v2','和アクセサリー専門店 かすう工房')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-08">
                                <a href="https://www.wargo.jp/products/list823.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-08.svg" alt="<?= Yii::t('formal_v2','和装・着付け小物専門店 和装問屋wargo')?>"></a>
                            </li>
                            <li class="item-logo-confidence item-logo-confidence-09">
                                <a href="https://www.wargo.jp/products/list718.html"><img class="lazy" data-src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/logo-09.svg" alt="<?= Yii::t('formal_v2','浴衣専門店 ゆかた屋hiyori')?>"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="des-intro-about">
                        「日本のカルチャーを世界へ」をキャッチフレーズに、古くて新しいい和の心を<br>
                        Total Creative Produceし世界に誇るべき日本の伝統文化の楽しい発信基地と<br>
                        なることを目指しています。
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bottom-section">
        <div class="container-box">
            <?php
            $intro_bottom = get_field('intro_bottom');
            if ($intro_bottom) {
                echo do_shortcode(php_set_base_url($intro_bottom));
            }
            ?>
        </div>
    </section>



<?php endif; ?>

<?php get_footer('formal-v2'); ?>
<div id="wrap-formal-preview-popup"></div>

<style>
    *{
        min-height: 0;
        min-width: 0;
    }
</style>
<script type="text/javascript">
    $('body').each(function(){
        $('.banner-section').addClass('imagesLoaded');
    });
    $(document).ready(function(){
		//Toggle sidebar
		$('[data-sub-shop]').click(function(){
			var self    = this;
			var target  = $(self).data('sub-shop');
			var $other  = $('[data-sub-shop="'+target+'"]');
			if(target){
				$other.each(function(index, el){
					if(el !== self){
						$(el).siblings(target).slideUp();
						$(el).parent().find('.text-shop-wg-dropdown').removeClass('active');
					}else{
						$(self).siblings(target).slideToggle();
						$(self).parent().find('.text-shop-wg-dropdown').toggleClass('active');
					}
				});
			}
		});

        $(document).on('click', '#closeStep, #backStep', function(){
            $("html").removeClass("modal-open");
        });
        /* Show formal popup - end */

        //Toggle reason point
        <?php if($isSmartPhone) : ?>
        $('.list-reason .item-reason .title-item-reason').click(function(){
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
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

        //Toggle shop list
        $('.search-list').click(function(){
            $(this).toggleClass('active');
            $(this).closest('.area-item').find('.list-shop').slideToggle('fast');
        });

        //Show product list
        $(document).on('click', '.items-product-landing-ubugi', function(){
            var target = $(this).attr('data-target');
            var content = $('.wrap-product-list').find('.product-list-content#' + target);
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            content.fadeIn('fast');
            content.siblings().fadeOut('fast');
        });

        // Ajax loading for Column Box Section
        var columnBox = $('.column-section');
        var category = "ubugi";
        var columnBoxLoaded = false;
        var isSmartPhone = <?php echo $isSmartPhone ? 'true' : 'false'; ?>;
        $(window).scroll(function () {
            if (columnBox.visible() && columnBoxLoaded == false) {
                columnBoxLoaded = true;
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getColumnList/' + category + '?isSmartPhone=<?php echo $isSmartPhone ? 'true' : 'false'; ?>',
                    success: function(data) {
                        if (data != null && data != "") {
                            columnBox.html(data);
                            $("img").lazy();
                        }}
                });
            }
        });

        // Ajax loading for Product Ranking Section
        var productRankingBox = $('.wrap-product-list');
        var productRankingBoxLoaded = false;
        $(window).scroll(function () {
            if (productRankingBox.visible() && productRankingBoxLoaded == false) {
                productRankingBoxLoaded = true;
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getProductRanking/' + category + '?isSmartPhone=<?php echo $isSmartPhone ? 'true' : 'false'; ?>',
                    success: function(data) {
                        if (data != null && data != "") {
                            productRankingBox.html(data);
                            $("img").lazy();
                            $(".wrap-img-ranking").lazy();
                        }}
                });
            }
        });

        // Ajax loading for Customer Review Section
        var customerReviewBox = $('.wrap-box-review');
        var customerReviewBoxLoaded = false;
        $(window).scroll(function () {
            if (customerReviewBox.visible() && customerReviewBoxLoaded == false) {
                customerReviewBoxLoaded = true;
                jQuery.ajax({
                    type: 'GET',
                    url: '/api/booking/getCustomerReview/' + category + '?isSmartPhone=<?php echo $isSmartPhone ? 'true' : 'false'; ?>',
                    success: function(data) {
                        if (data != null && data != "") {
                            customerReviewBox.html(data);
                            $("img").lazy();
                        }}
                });
            }
        });

        var shop_id = '16';
        /* Show formal popup - start */
        $(document).on('click', '.formal-preview-popup-handle', function(){
            event.preventDefault();
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

        //Toggle faq
        $('.box-faqs-item .box-faqs-title').click(function(){
            $(this).toggleClass('active');
            $(this).parent().next().slideToggle('fast');
        });

        // Lazy load for background image
        $(".lazy").lazy();
    })
</script>

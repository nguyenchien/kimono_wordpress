<?php
/**
 * Template Name: New Access Child Page v3 Ginza
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
global $post, $custom_post_type, $custom_taxonomies, $is_yukata, $sites, $language;
$detect = Yii::app()->mobileDetect;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$language = Yii::app()->language;
$cssLanguage = "";
if($language != "ja"){
    $cssLanguage = "-".$language;
}
$shop_id = get_field('shop_id');
$planList = get_field('plan_list');
if (is_page('check-booking')) {
    $shop_id = 5;
}
get_header('formal-v2');
$shop_id = get_field('shop_id');
$planList = get_field('plan_list');
if (is_page('check-booking')) {
    $shop_id = 5;
}

$reserve_link_access = '';
if ($shop_id == 14 || $shop_id == 15) {
    $reserve_link_access = home_url() . '/petit';
} else{
    $reserve_link_access = home_url() . '/kimono';
}
if ($shop_id == 25) {
    $reserve_link_access = home_url() . '/formal';
}
$postName = $post->post_name;
$shop_id_formal = array(16,27);
?>
<?php if($isSmartPhone):?>
    <link rel="preload" href="<?= get_template_directory_uri()?>/css/grid-booking-status-new-sp.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/grid-booking-status-new-sp.css"></noscript>
    <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-sp.css"></noscript>
<?php else: ?>
    <link rel="preload" href="<?= get_template_directory_uri()?>/css/grid-booking-status-new-pc.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/grid-booking-status-new-pc.css"></noscript>
    <link rel="preload" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= get_template_directory_uri()?>/css/new-formal-popup-preview-pc.css"></noscript>
<?php endif; ?>

<link rel="preload" href="<?= WP_HOME ?>/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick.css"></noscript>
<link rel="preload" href="<?= WP_HOME ?>/css/slick-theme.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?= WP_HOME ?>/css/slick-theme.css"></noscript>

<?php
wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
wp_enqueue_script('jquery-lazy-youtube', WP_HOME . '/js/jquery.lazy.youtube.min.js');
wp_enqueue_script('jquery-lazy-iframe', WP_HOME . '/js/jquery.lazy.iframe.min.js');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('jquery-visible', WP_HOME . '/js/jquery.visible.min.js');
?>
<?php if($isSmartPhone) : ?>
    <div class="container-box ginza">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
        ?>
        <div class="wrap-column-content flexbox">
            <div class="left-column-content">
                <div class="wrap-boths-column flexbox">
                    <div class="right-column right-column-<?php echo $post->post_name; ?>">
                        <div class="padding-v2">
                            <!-- Banner -->
                            <?php
                            $bannerSP = get_field('banner_sp');
                            echo do_shortcode(php_set_base_url($bannerSP));
                            ?>

                            <!-- Intro -->
                            <section class="intro-section">
                                <h2 class="wrap-title-intro lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group-sp.png">
                                    <?php
                                    if($postName == 'ginza-honten'){
                                            echo '<p class="main-title">銀座エリア最大級！</p>
                                      <p class="title">銀座でフォーマル着物レンタル</p>';
                                    } elseif ($postName == 'sendai-parco2') {
                                        echo '<p class="main-title">仙台エリア最大級！</p>
                                      <p class="title">仙台駅前店</p>';
                                    } elseif ($postName == 'sapporo-susukinostation') {
                                        echo '<p class="main-title">札幌エリア最大級！</p>
                                      <p class="title">札幌すすきの駅前店</p>';
                                    } elseif ($postName == 'sendagaya') {
                                        echo '<p class="title">原宿・千駄ヶ谷でフォーマル着物レンタル</p>';
                                    } elseif ($postName == 'hakata') {
                                        echo '<p class="title">博多でフォーマル着物レンタル</p>';
                                    }
                                    ?>
                                </h2>
                                <?php
                                $intro = get_field('intro');
                                echo do_shortcode(php_set_base_url($intro));
                                ?>
                            </section>

                            <!-- Shop info -->
                            <?php
                            $shopInfoSP = get_field('shop_info_sp');
                            echo do_shortcode(php_set_base_url($shopInfoSP));
                            ?>
                            <?php
                            $slider_popup_sp = get_field('slider_popup_sp');
                            if ($slider_popup_sp) {
                                echo do_shortcode(php_set_base_url($slider_popup_sp));
                            }
                            ?>
                            <?php
                            $info_direction = get_field('info_direction');
                            if ($info_direction) {
                                echo do_shortcode(php_set_base_url($info_direction));
                            }
                            ?>
                            <!-- Rental plan -->
                            <?php
                            $rentalPlanSP = get_field('rental_plan_sp');
                            echo do_shortcode(php_set_base_url($rentalPlanSP));
                            ?>

                            <!-- Reservation -->
                            <section class="reserve-section wrap-reservation-status-fm-v2 <?= $postName; ?>">
                                <div class="wrap-reserve-title" id="grid-booking">
                                    <img class="lazy bubble" data-src="<?= WP_HOME ?>/images/new-access/bubble-reserve.svg">
                                    <?php if($postName == 'ginza-honten'):?>
                                        <h2 class="title">銀座店 予約状況</h2>
                                    <?php elseif($postName == 'sendai-parco2'):?>
                                        <h2 class="title">仙台店 予約状況</h2>
                                    <?php elseif($postName == 'sapporo-susukinostation'):?>
                                        <h2 class="title">札幌店 予約状況</h2>
                                    <?php elseif($postName == 'sendagaya'):?>
                                        <h2 class="title">千駄ヶ谷店 予約状況</h2>
                                    <?php elseif($postName == 'hakata'):?>
                                        <h2 class="title">福岡博多店 予約状況</h2>
                                    <?php else: ?>
                                        <h2 class="title"><?= Yii::t('access-v2','店舗予約状況')?></h2>
                                    <?php endif;?>
                                    <img class="girl lazy" data-src="<?= WP_HOME ?>/images/new-kimono/img-women-opt-fix.png">
                                </div>
                                <div class="wrap-access-booking">
                                    <div id="box-calendar" class="sixteen columns row">
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="javascrip:void(0)" class="btn-pre-booking formal-preview-popup-handle">
                                        下見の来店予約はこちら<span class="arrow"></span>
                                        <span class="sub-text-btn">30分間ならお下見無料！</span>
                                    </a>
                                </div>
                            </section>

                            <!-- Point -->
                            <?php
                            $pointSP = get_field('reason_point_sp');
                            echo do_shortcode(php_set_base_url($pointSP));
                            ?>

                            <?php if(in_array($postName, array('ginza-honten', 'sendagaya'))) :?>
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
										</div>
									</div>
								</section>
                            <?php endif;?>

                            <!-- Experience -->
                            <?php
                            $experience = get_field('experience');
                            echo do_shortcode(php_set_base_url($experience));
                            ?>

                            <!-- Column + spot -->
                            <?php
                            $columnSpot = get_field('column_spot');
                            echo do_shortcode(php_set_base_url($columnSpot));
                            ?>

                            <!-- Customer gallery -->
                            <section class="gallery-section">
                                <div class="row">
                                    <div class="wrap-title">
                                        <img class="lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-title-gallery.png" alt="お客様ギャラリー">
                                        <h2 class="title">お客様ギャラリー</h2>
                                    </div>
                                    <div class="wrap-customer-gallery">
                                        <div id="wrap-slider-gallery-content"></div>
                                        <a class="main-btn gallery-btn" href="<?= home_url()?>/gallery">お客様ギャラリーをもっと見る</a>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <!-- Customer review -->
<!--                        <section class="review-section">-->
<!--                            <div class="wrap-title">-->
<!--                                <span class="icon"></span>-->
<!--                                <h2 class="review-title">銀座本店をご利用いただいたお客様のお声</h2>-->
<!--                            </div>-->
<!--                            <div class="wrap-box-review">-->
<!--                                --><?php //echo do_shortcode('[customer_review_content_shop_v1 shop_id=8]'); ?>
<!--                            </div>-->
<!--                        </section>-->

                        <!-- Blog -->
                        <section class="blog-section">
                            <div class="row">
                                <?php if($postName == 'sendai-parco2'): ?>
                                    <h2 class="blog-title">仙台店 スタッフブログ</h2>
                                <?php elseif($postName == 'sapporo-susukinostation'): ?>
                                    <h2 class="blog-title">札幌店 スタッフブログ</h2>
                                <?php elseif($postName == 'sendagaya'): ?>
                                    <h2 class="blog-title">明治神宮北参道店 店舗ブログ</h2>
                                <?php elseif($postName == 'hakata'): ?>
                                    <h2 class="blog-title">福岡博多店 店舗ブログ</h2>
                                <?php else: ?>
                                    <h2 class="blog-title">銀座店 店舗ブログ</h2>
                                <?php endif;?>


                                <?php
                                if ($shop_blog = get_field('shop_blog')):
                                    $taxonomy = $custom_taxonomies['blog'];
                                    $post_type = $custom_post_type['blog'];
                                    $term = get_term_by('slug', $shop_blog, $taxonomy);
                                    $data = get_category_data($term);
                                    global $isSmartPhone;

                                    // Restore original Post Data
                                    wp_reset_postdata();
                                    // WP_Query arguments
                                    $blogs = array(
                                        'ja'=>'blog',
                                        'en'=>'english-blog',
                                        'vi'=>'vietnamese-blog',
                                        'tw'=>'traditionalchinese-blog',
                                        'ko'=>'korean-blog',
                                        'ru'=>'russian-blog',
                                        'th'=>'thailand-blog',
                                        'id'=>'indonesia-blog',
                                        'ms'=>'malaysia-blog',
                                        'fr' => 'french-blog',
                                        'cn' => 'simplified-chinese-blog',
                                        'hi' => 'hindi-blog'
                                    );

                                    if ($postName == 'sendagaya'){
                                        $args = array(
                                            "tax_query" => array(
                                                array(
                                                    "taxonomy" => "shop-blog",
                                                    "field" => "slug",
                                                    "terms" => array("tokyo-area", "meiji-jingu-kitasando"),
                                                )
                                            ),
                                            'post_type' => $post_type,
                                            'post_status' => 'publish',
                                            'posts_per_page' => $isSmartPhone ? 2 : 4,
                                            'order' => 'DESC',
                                            'orderby' => 'date',
                                        );
                                    }elseif ($postName == 'hakata'){
                                        $args = array(
                                            "tax_query" => array(
                                                array(
                                                    "taxonomy" => "shop-blog",
                                                    "field" => "slug",
                                                    "terms" => array("fukuoka-area", "fukuoka-hakata"),
                                                )
                                            ),
                                            'post_type' => $post_type,
                                            'post_status' => 'publish',
                                            'posts_per_page' => $isSmartPhone ? 2 : 4,
                                            'order' => 'DESC',
                                            'orderby' => 'date',
                                        );
                                    }else{
                                        $args = array(
                                            $taxonomy => $language == "ja" ? $shop_blog : $blogs[$language],
                                            'post_type' => $post_type,
                                            'post_status' => 'publish',
                                            'posts_per_page' => $isSmartPhone ? 2 : 4,
                                            'order' => 'DESC',
                                            'orderby' => 'date',
                                        );
                                    }

                                    // The Query
                                    $my_query = new WP_Query($args);

                                    // The Loop
                                    if ($my_query->have_posts()) {
                                        $i = 1;
                                        $title = $data['shop'];
                                        ?>
                                        <ul class="list-blog flexbox">
                                            <?php
                                            while ($my_query->have_posts()) {
                                                $my_query->the_post();
                                                ?>
                                                <li class="item-blog">
                                                    <a class="link-href-blog" href="<?php the_permalink(); ?>">
                                                        <div class="image-blog">
                                                            <?php
                                                            if ( has_post_thumbnail() ) {
                                                                echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title())));
                                                            } else {
                                                                echo '<img class="lazy" data-src="'.WP_HOME.'/images/no-image.png">';
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>
                                                    <p class="date">ご来店日: <?php echo get_the_date('Y.m.d'); ?></p>
                                                    <div class="title-name-blog"><?php echo  wp_trim_words(get_the_title(), 30); ?></div>
                                                    <div class="wrap-permalink-blog"><a class="link-to-item" href="<?php the_permalink(); ?>"><?php echo Yii::t('wp_theme.access', '続きを見る') ?></a></div>
                                                </li>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </ul>
                                        <?php
                                    } else {
                                        // no posts found
                                    }
                                    // Restore original Post Data
                                    wp_reset_postdata();
                                    ?>
                                <?php endif; //get_field('shop_blog')?>
                                <div class="wrap-link-to-blog">
                                    <?php if($postName=="sendai-parco2") : ?>
                                        <a class="main-btn blog-btn" href="<?php echo WP_HOME; ?>/access/tohoku-area/sendai-station/blog">店舗ブログを見る</a>
                                    <?php elseif($postName=="sapporo-susukinostation") : ?>
                                        <a class="main-btn blog-btn" href="<?php echo WP_HOME; ?>/formal/access/sapporo-area/sapporo-susukinostation/blog">店舗ブログを見る</a>
                                    <?php else: ?>
                                        <a class="main-btn blog-btn" href="<?php echo WP_HOME; ?>/formal/access/tokyo-area/ginza-honten/blog">店舗ブログを見る</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="wrap-content-access ginza">
            <div class="container-box">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
                }
                ?>
                <!-- Banner -->
                <?php
                    $bannerPC = get_field('banner_pc');
                    echo do_shortcode(php_set_base_url($bannerPC));
                ?>

                <!-- Intro -->
                <section class="intro-section">
                    <h2 class="wrap-title-intro lazy"data-src="<?= WP_HOME ?>/images/new-access/bg-asakusa-prime-group.png">
                        <?php
                        if($postName == 'ginza-honten'){
                            echo '<p class="main-title">銀座エリア最大級！</p>
                                  <p class="title">銀座でフォーマル着物レンタル</p>';
                        }elseif($postName == 'sendai-parco2'){
                            echo '<p class="main-title">仙台エリア最大級！</p>
                                  <p class="title">仙台駅前店</p>';
                        } elseif ($postName == 'sapporo-susukinostation') {
                            echo '<p class="main-title">札幌エリア最大級！</p>
                                      <p class="title">札幌すすきの駅前店</p>';
                        } elseif ($postName == 'sendagaya') {
                            echo '<p class="title">原宿・千駄ヶ谷でフォーマル着物レンタル</p>';
                        } elseif ($postName == 'hakata') {
                            echo '<p class="title">博多でフォーマル着物レンタル</p>';
                        }
                        ?>
                    </h2>
                    <?php
                    $intro = get_field('intro');
                    echo do_shortcode(php_set_base_url($intro));
                    ?>
                </section>

                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column">
                                <?php echo FormalSidebarLeftCodeNewStyle(array());?>
                            </div>
                            <div class="right-column right-column-access-v3">
                                <?php
									$slider_popup_pc = get_field('slider_popup_pc');
									if ($slider_popup_pc) {
										echo do_shortcode(php_set_base_url($slider_popup_pc));
									}
                                ?>
                                <!-- Shop info -->
                                <?php
                                $shopInfoPC = get_field('shop_info_pc');
                                echo do_shortcode(php_set_base_url($shopInfoPC));
                                ?>
                                <?php
                                $info_direction = get_field('info_direction');
                                if ($info_direction) {
                                    echo do_shortcode(php_set_base_url($info_direction));
                                }
                                ?>
                                <!-- Rental plan -->
                                <?php
                                $rentalPlanPC = get_field('rental_plan_pc');
                                echo do_shortcode(php_set_base_url($rentalPlanPC));
                                ?>

                                <!-- Reservation -->
                                <section class="reserve-section wrap-reservation-status-fm-v2 <?= $postName; ?>">
                                    <div class="wrap-reserve-title" id="grid-booking">
                                        <img class="lazy bubble" data-src="<?= WP_HOME ?>/images/new-access/bubble-reserve.svg">
                                        <?php if($postName == 'ginza-honten'):?>
                                            <h2 class="title">銀座店 予約状況</h2>
                                        <?php elseif($postName == 'sendai-parco2'):?>
                                            <h2 class="title">仙台店 予約状況</h2>
                                        <?php elseif($postName == 'sapporo-susukinostation'):?>
                                            <h2 class="title">札幌店 予約状況</h2>
                                        <?php elseif($postName == 'sendagaya'):?>
                                            <h2 class="title">千駄ヶ谷店 予約状況</h2>
                                        <?php elseif($postName == 'hakata'):?>
                                            <h2 class="title">福岡博多店 予約状況</h2>
                                        <?php else: ?>
                                            <h2 class="title"><?= Yii::t('access-v2','店舗予約状況')?></h2>
                                        <?php endif;?>
                                        <img class="lazy girl" data-src="<?= WP_HOME ?>/images/new-kimono/img-women-opt-fix.png">
                                    </div>
                                    <div class="wrap-access-booking">
                                        <div id="box-calendar" class="sixteen columns row">
                                        </div>
                                    </div>
                                    <div class="wrap-main-btn flexbox justify-content-center">
                                        <a id="reserve_button" href="javascrip:void(0)" class="main-btn btn-link formal-preview-popup-handle">下見の来店予約はこちら</a>
                                    </div>
<!--                                    <div class="wrap-main-btn flexbox justify-content-center">-->
<!--                                        --><?php //if($postName == 'ginza-honten') : ?>
<!--                                            <a id="reserve_button" href="--><?//= home_url()?><!--/kimono?shop_id=--><?//= $shop_id ?><!--" class="main-btn btn-reserve">観光⽤着物・浴⾐レンタルを予約する</a>-->
<!--                                        --><?php //endif;?>
<!--                                        --><?php //if($postName == 'shinjuku-station') : ?>
<!--                                            <a id="reserve_button" href="--><?//= home_url()?><!--/kimono?shop_id=--><?//= $shop_id ?><!--" class="main-btn btn-reserve">着物 ・ 浴衣レンタルを予約する</a>-->
<!--                                        --><?php //endif;?>
<!---->
<!--                                    </div>-->
                                </section>

                                <!-- Point -->
                                <?php
                                $pointPC = get_field('reason_point_pc');
                                echo do_shortcode(php_set_base_url($pointPC));
                                ?>

                                <?php if(in_array($postName, array('ginza-honten', 'sendagaya'))) :?>
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
                                <?php endif;?>

                                <!-- Experience -->
                                <?php
                                $experience = get_field('experience');
                                echo do_shortcode(php_set_base_url($experience));
                                ?>


                                <!-- Column + spot -->
                                <?php
                                $columnSpot = get_field('column_spot');
                                echo do_shortcode(php_set_base_url($columnSpot));
                                ?>
                                <section class="gallery-section">
                                    <div class="row">
                                        <div class="wrap-title">
                                            <img class="lazy" data-src="<?= WP_HOME ?>/images/new-access/bg-title-gallery.png" alt="お客様ギャラリー">
                                            <h2 class="title">お客様ギャラリー</h2>
                                        </div>
                                        <div class="wrap-customer-gallery">
                                            <?php echo do_shortcode('[instagram_gallery]'); ?>
                                        </div>
                                        <div class="wrap-main-btn flexbox justify-content-center">
                                            <a class="main-btn gallery-btn" href="<?= home_url()?>/gallery">お客様ギャラリーをもっと見る</a>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-box -->
<!--            <section class="review-section">-->
<!--                <div class="container-box">-->
<!--                    <div class="wrap-title-other">-->
<!--                        <p class="main-title">Voice</p>-->
<!--                        <h2 class="title">銀座本店 をご利用 いただお客様の<br/>お声になりますのでご参考下さい。</h2>-->
<!--                    </div>-->
<!--                    <div class="wrap-box-review">-->
<!--                        --><?php //echo do_shortcode('[customer_review_content_formal_v3]'); ?>
<!--                    </div>-->
<!--                    <div class="wrap-btn-v2 wrap-btn-review flexbox">-->
<!--                        <a href="--><?//= home_url(); ?><!--/customer-remarks" class="btn-v2 btn-review">-->
<!--                            <span class="icon"></span>-->
<!--                            <div class="text">-->
<!--                                <span class="text-link">すべてのお客様の声を見る</span>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </section>-->
            <section class="blog-section">
                <div class="container-box">
                    <div class="wrap-title-other">
                        <p class="main-title">Shop Blog</p>
                        <?php if($postName == 'sendai-parco2'): ?>
                            <h2 class="title">仙台店 スタッフブログ</h2>
                        <?php elseif($postName == 'sapporo-susukinostation'): ?>
                            <h2 class="title">札幌店 スタッフブログ</h2>
                        <?php elseif($postName == 'sendagaya'): ?>
                            <h2 class="title">明治神宮北参道店 店舗ブログ</h2>
                        <?php elseif($postName == 'hakata'): ?>
                            <h2 class="title">福岡博多店 店舗ブログ</h2>
                        <?php else: ?>
                            <h2 class="title">銀座店 店舗ブログ</h2>
                        <?php endif; ?>
                    </div>
                    <?php
                    if ($shop_blog = get_field('shop_blog')):
                        $taxonomy = $custom_taxonomies['blog'];
                        $post_type = $custom_post_type['blog'];
                        $term = get_term_by('slug', $shop_blog, $taxonomy);
                        $data = get_category_data($term);
                        global $isSmartPhone;

                        // Restore original Post Data
                        wp_reset_postdata();
                        // WP_Query arguments
                        $blogs = array(
                            'ja'=>'blog',
                            'en'=>'english-blog',
                            'vi'=>'vietnamese-blog',
                            'tw'=>'traditionalchinese-blog',
                            'ko'=>'korean-blog',
                            'ru'=>'russian-blog',
                            'th'=>'thailand-blog',
                            'id'=>'indonesia-blog',
                            'ms'=>'malaysia-blog',
                            'fr' => 'french-blog',
                            'cn' => 'simplified-chinese-blog',
                            'hi' => 'hindi-blog'
                        );

                        if ($postName == 'sendagaya'){
                            $args = array(
                                "tax_query" => array(
                                    array(
                                        "taxonomy" => "shop-blog",
                                        "field" => "slug",
                                        "terms" => array("tokyo-area", "meiji-jingu-kitasando"),
                                    )
                                ),
                                'post_type' => $post_type,
                                'post_status' => 'publish',
                                'posts_per_page' => $isSmartPhone ? 2 : 4,
                                'order' => 'DESC',
                                'orderby' => 'date',
                            );
                        }elseif ($postName == 'hakata'){
                            $args = array(
                                "tax_query" => array(
                                    array(
                                        "taxonomy" => "shop-blog",
                                        "field" => "slug",
                                        "terms" => array("fukuoka-area", "fukuoka-hakata"),
                                    )
                                ),
                                'post_type' => $post_type,
                                'post_status' => 'publish',
                                'posts_per_page' => $isSmartPhone ? 2 : 4,
                                'order' => 'DESC',
                                'orderby' => 'date',
                            );
                        }else{
                            $args = array(
                                $taxonomy => $language == "ja" ? $shop_blog : $blogs[$language],
                                'post_type' => $post_type,
                                'post_status' => 'publish',
                                'posts_per_page' => $isSmartPhone ? 2 : 4,
                                'order' => 'DESC',
                                'orderby' => 'date',
                            );
                        }

                        // The Query
                        $my_query = new WP_Query($args);

                        // The Loop
                        if ($my_query->have_posts()) {
                            $i = 1;
                            $title = $data['shop'];
                            ?>
                            <ul class="list-blog flexbox">
                                <?php
                                while ($my_query->have_posts()) {
                                    $my_query->the_post();
                                    ?>
                                    <li class="item-blog">
                                        <a class="link-href-blog" href="<?php the_permalink(); ?>">
                                            <div class="image-blog">
                                                <?php
                                                if ( has_post_thumbnail() ) {
                                                    echo swe_wp_get_attachment_image(get_post_thumbnail_id(), array(369, 277), false, array('alt' => strip_tags(get_the_title())));
                                                } else {
                                                    echo '<img class="lazy" data-src="'.WP_HOME.'/images/no-image.png">';
                                                }
                                                ?>
                                            </div>
                                        </a>
                                        <div class="title-name-blog"><?php echo  wp_trim_words(get_the_title(), 30); ?></div>
                                        <div class="wrap-permalink-blog"><a class="link-to-item flexbox" href="<?php the_permalink(); ?>"><?php echo Yii::t('wp_theme.access', 'つづきを見る') ?><span class="arrow-link"></span></a></div>
                                    </li>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                            <?php
                        } else {
                            // no posts found
                        }
                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
                    <?php endif; //get_field('shop_blog')?>
                    <div class="wrap-link-to-blog flexbox align-items-center justify-content-center">
                        <?php if($postName=="sendai-parco2") : ?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/access/tohoku-area/sendai-station/blog">もっとブログを読む</a>
                        <?php elseif($postName=="sapporo-susukinostation") : ?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/formal/access/sapporo-area/sapporo-susukinostation/blog">もっとブログを読む</a>
                        <?php elseif($postName=="sendagaya") : ?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/formal/access/tokyo-area/blog">もっとブログを読む</a>
                        <?php elseif($postName=="hakata") : ?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/formal/access/tokyo-area/blog">もっとブログを読む</a>
                        <?php else: ?>
                            <a class="link-to-blog-page" href="<?php echo WP_HOME; ?>/formal/access/tokyo-area/ginza-honten/blog">もっとブログを読む</a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>
<?php endif; ?>

<script>
	$(document).ready(function(){
		$('.lazy').lazy();
		var shop_id = '<?php echo $shop_id; ?>';
		// Get grid booking
		var calendarLoaded = false;
		$(window).scroll(function () {
			if ($("#box-calendar").visible() && calendarLoaded == false) {
				calendarLoaded = true;
				console.log('box-calendar loaded');
				jQuery.ajax({
					type: 'GET',
					url: '/api/booking/getCalendar/' + shop_id,
					success: function(data) {
						if (data != null && data != "") {
							$("#box-calendar").html(data);
						}
					}
				});
			}
	});

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

		// Slider access shop
		if ($('#slider .list-access-shop').length > 0) {
			$('#slider .list-access-shop').not('.slick-initialized').slick({
				infinite: true,
				slidesToShow: 2,
				slidesToScroll: 2,
				arrows: true,
				lazyLoad: 'ondemand',
				responsive: [{
					breakpoint: 750,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						fade: true,
					}
				}]
			});
		}
        <?php
        if(
        $postName=='kyotostation'||
        $postName=='ninenzaka'||
        $postName=='osaka-shinsaibashi-opa'||
        $postName=='asakusa'||
        $postName=='ginza-honten'||
        $postName=='sendagaya'||
        $postName=='hakata') :
        ?>
        $('.instruction-shop,.shop-video').addClass('hidden');
        $('.wrap-info-direction .wrap-info-title').click(function(){
            $('.instruction-shop,.shop-video').toggleClass('hidden');
        });
        <?php endif;?>

		//Instagram gallery slider
		$('#slider-gallery').not('.slick-initialized').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			lazyLoad: 'ondemand'
		});

        // Slider popup lightbox
        const popupOverlay = '<div id="popup-overlay" class="popup-overlay"></div>'
        if ($('#slider-content .item').length > 1) {
            $('#slider-content').not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: true
            });
        };

        $('#slider-content .item').click(function() {
            if(!$('#popup-overlay').length) {
                $('body').append(popupOverlay);
            } else {
                $('#popup-overlay').show();
            }

            if (isSmartPhone()){
                $('body, html').css('overflow', 'hidden');
            }


            $('.wrap-slider-popup').show().removeClass('zoomOut').addClass('animated zoomIn').delay(600).queue(function(){
                $('.wrap-slider-popup').removeClass('animated zoomIn');
            });

            $('#slider-content .slick-arrow').hide();

            let index = $(this).index();

            if ($('#slider-popup .item').length > 1) {
                if (!$('#slider-popup').hasClass('slick-initialized')) {
                    $('#slider-popup').not('.slick-initialized').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: true,
                        adaptiveHeight: true
                    });
                } else {
                    $('#slider-popup').slick('slickGoTo', index - 1);
                }
            }
        });

        $('.wrap-slider-popup .close-popup').click(function(){
            $('.wrap-slider-popup').removeClass('zoomIn').addClass('animated zoomOut');
            setTimeout(function(){
                $('.wrap-slider-popup').removeClass('animated zoomOut');
                $('.wrap-slider-popup').hide();
            }, 600);
            $('#popup-overlay').hide();
            $('#slider-content .slick-arrow').show();
            $('body, html').removeAttr('style');
        });

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
				} else {
					$("#formal-preview-popup input.preview-shops:checked").attr('checked','checked').trigger('change');
				}
			});
			$('#botDiv').hide();
		});

		// Ajax loading for Instagram Gallery Section
		var instagramGalleryBox = $('#wrap-slider-gallery-content');
		var instagramGalleryBoxLoaded = false;
		$(window).scroll(function () {
			if (instagramGalleryBox.visible() && instagramGalleryBoxLoaded == false) {
				instagramGalleryBoxLoaded = true;
				jQuery.ajax({
					type: 'GET',
					url: '/api/booking/getInstagramGalleryShop/<?=$postName?>?isSmartPhone=<?php echo $isSmartPhone ? 'true' : 'false'; ?>&count_number=2',
					success: function(data) {
						if (data != null && data != "") {
							instagramGalleryBox.html(data);
							$("img").lazy();
							//Instagram gallery slider
							if($('.slider-gallery').length > 0){
								$('.slider-gallery').not('.slick-initialized').slick({
									slidesToShow: <?=$isSmartPhone?1:2?>,
									slidesToScroll: <?=$isSmartPhone?1:2?>,
									arrows: true,
									lazyLoad: 'ondemand'
								});
							}
						}}
				});
			}
		});

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

	$(document).on('click', '#closeStep, #backStep', function(){
		$("html").removeClass("modal-open");
	});
	/* Show formal popup - end */

	$('.wrap-title-plan').click(function(){
		var target = $(this).attr('data-target');
		$(this).toggleClass('active');
		if ($(this).hasClass('active')) {
			$('#' + target).slideDown('fast');
		} else {
			$('#' + target).slideUp('fast')
		}
	});

    //Toggle faq
    $('.box-faqs-item .box-faqs-title').click(function(){
        $(this).toggleClass('active');
        $(this).parent().next().slideToggle('fast');
    });
</script>
<style type="text/css">
	*{
		min-height: 0;
		min-width: 0;
	}
</style>
<?php get_footer('formal-v2') ;?>
<div id="wrap-formal-preview-popup"></div>

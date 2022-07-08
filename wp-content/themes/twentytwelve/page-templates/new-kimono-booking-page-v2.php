<?php
/**
 * Template Name: New Kimono Booking Page v2
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
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post, $language;
$postName = $post->post_name;
$language = Yii::app()->language;
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
wp_register_style('new-top-page-kimono-style', get_template_directory_uri() . '/css/new-top-page-kimono.css', array('twentytwelve-style'), '20180302161500');
wp_enqueue_style('new-top-page-kimono-style');

wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js', array('jquery'));
get_header('new-kimono');


if($isSmartPhone){
    wp_register_style('check-booking-style-sp', get_template_directory_uri() . '/css/check-booking-sp.css', array('twentytwelve-style'), '20180302161500');
    wp_enqueue_style('check-booking-style-sp');
} else{
    wp_register_style('check-booking-style-pc', get_template_directory_uri() . '/css/check-booking-pc.css', array('twentytwelve-style'), '20180302161500');
    wp_enqueue_style('check-booking-style-pc');
}

?>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:300,400,500,700,900&display=swap" rel="stylesheet">

<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
    }
    ?>
    <?php the_field('page_h1'); ?>
    <?php if(!$isSmartPhone) : ?>
        <div class="wrap-banner">
            <img src="<?php echo WP_HOME; ?>/images/new-kimono/check-booking-bn-pc.jpg" alt="">
        </div>
    <?php endif; ?>
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column left-column-new-kimono hidden-sidebar">
                                <?php get_sidebar('top-page-left') ?>
                            </div>

                            <div class="right-column right-column-list right-column-list-new-kimono right-column-check-booking">

                                <?php if($isSmartPhone) : ?>
                                    <div class="wrap-banner">
                                        <img src="<?php echo WP_HOME; ?>/images/new-kimono/check-booking-bn-sp.jpg" alt="">
                                    </div>
                                <?php endif; ?>

                                <div class="check-booking-info">
                                    <h2 class="title">思い立ったらスグ予約！</h2>
                                    <p>きものレンタルwargoは、当日のご来店の方でも手ぶらの方でも安心のレンタルプランをご用意しております。Web予約フォームか、お電話にて希望日時をご連絡ください。</p>
                                    <p>Webでのご予約では、同時にプランに応じた着物・浴衣の選択、カード決済まで済ませることが可能です。思いたったが吉日、当日でも空きがあれば当日2時間前までご予約可能！お近くにお越しの際は是非お立ち寄りください！</p>
                                </div>

                                <div class="wrap-box-3point">
                                    <div class="wrap-cb-title">
                                        <span class="icon">
                                            <img src="<?php echo WP_HOME; ?>/images/new-kimono/icon-circle-title.svg" alt="">
                                        </span>
                                        <div class="wrap-txt-title">
                                            <h2 class="cb-title">３つのポイント</h2>
                                            <span class="cb-sub-title">Three Points</span>
                                        </div>
                                    </div>
                                    <div class="box-3point flexbox">
                                        <div class="point point-1">
                                            <div class="wrap-point-name">
                                                <span class="icon-point"></span>
                                                <div class="point-info">
                                                    <span class="point-num">01</span>
                                                    <span class="point-name">当日来店OK!</span>
                                                </div>
                                            </div>
                                            <div class="point-desc">
                                                当日でも空きがあれば、ご来店の２時間前であれば当日でのご予約が可能です！
                                            </div>
                                        </div>
                                        <div class="point point-2">
                                            <div class="wrap-point-name">
                                                <span class="icon-point"></span>
                                                <div class="point-info">
                                                    <span class="point-num">02</span>
                                                    <span class="point-name">手ぶらOK!</span>
                                                </div>
                                            </div>
                                            <div class="point-desc">
                                                飛び込み参加でも大丈夫！必要な持ち物はありません。手ぶらでお越しください！
                                            </div>
                                        </div>
                                        <div class="point point-3">
                                            <div class="wrap-point-name">
                                                <span class="icon-point"></span>
                                                <div class="point-info">
                                                    <span class="point-num">03</span>
                                                    <span class="point-name">簡単安心！</span>
                                                </div>
                                            </div>
                                            <div class="point-desc">
                                                web・お電話でもご予約可能！初めてのご来店でも大丈夫！お気軽にお越しください。
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-info">
                                        <div class="img">
                                            <span class="ver-txt">初めてでも安心！</span>
                                            <img src="<?php echo WP_HOME; ?>/images/new-kimono/3point-img.png" alt="3point">
                                        </div>
                                        <div class="sub-info">
                                            <p>ご予約された店舗へお越しください。万が一分からない場合はお気軽にお電話ください。</p>
                                            <p>また、ご予約時間より少しお早めのご来店をお願いします。特にお持ちいただくものはございませんので手ぶらでお越しください。ご本人様の確認のため、身分証明書（パスポートやクレジットカードなど）のご提示が必要となります。</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="wrap-select-plan">
                                    <div class="wrap-cb-title">
                                            <span class="icon">
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/icon-circle-title.svg" alt="">
                                            </span>
                                        <div class="wrap-txt-title">
                                            <h2 class="cb-title">着物・浴衣レンタルプラン</h2>
                                            <span class="cb-sub-title">Select Plan</span>
                                        </div>
                                    </div>
                                    <p class="info">
                                        きものレンタルwargoでは、着付け代・小物代を全て無料でご提供しております。どのプランも手ぶらでOK！和小物専門店も全国展開しているwargo だからこそ、バッグや下駄の種類も豊富でかんざしやアクセサリーも全力サポート致します。
                                    </p>
                                    <div class="plan-box-item">
                                        <div class="tag red-txt">きもの人気<br>NO.1！</div>
                                        <h3 class="plan-cate">スタンダード着物プラン</h3>
                                        <div class="white-bg"></div>
                                        <div class="plan-content">
                                            <?php if($isSmartPhone) : ?>
                                                <h4 class="plan-intro">迷ったらコレ！プチプラお手軽プラン</h4>
                                            <?php endif; ?>
                                            <div class="img">
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/cb-plan-kimono.jpg" alt="kimono">
                                            </div>
                                            <div class="plan-info">
                                                <?php if(!$isSmartPhone) : ?>
                                                    <h4 class="plan-intro">迷ったらコレ！プチプラお手軽プラン</h4>
                                                <?php endif; ?>
                                                <p class="text-top">かんざし、ヘアセットもついて<span class="red-txt">￥3,580</span><br>WEB決済なら、さらにお得に</p>
                                                <span class="price red-txt">¥2,980-</span>
                                                <div class="sub-info">
                                                    すべてセッ ト追加料金一切不要。<br class="sp">着付け代・小物代を含みます。<br><span class="red-txt">※あとからでもプラン変更可</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="<?php echo WP_HOME; ?>/kimono#standard-kimono" class="btn-plan">このプランを予約する<span class="icon"></span></a>
                                                </div>
                                            </div>
                                            <div class="plan-desc">
                                                学生さん一番人気のプチプラ最安プラン。初めて着物をレンタルする、安く
                                                手軽に着物を体験したいというお客様におすすめです。「着物」らしいベー
                                                シックなデザインと、可愛らしくも落ち着いた雰囲気にもなれる幅広い色展
                                                開が特徴です。帯や小物の組み合わせで、ピリッと挿し色の効いたコーディ
                                                ネートを楽しみたい方にも人気です。
                                            </div>
                                        </div>
                                        <div class="plan-gallery kimono-gallery">
                                            <h5 class="title">お客様ギャラリー</h5>
                                            <?= do_shortcode('[gallery_for_plan_kimono plan_type="スタンダード着物" plan_type_id="1"]'); ?>
                                        </div>
                                    </div>
                                    <div class="plan-box-item">
                                        <div class="tag red-txt">ゆかた人気<br>NO.1！</div>
                                        <h3 class="plan-cate">スタンダード浴衣プラン</h3>
                                        <div class="white-bg"></div>
                                        <div class="plan-content">
                                            <?php if($isSmartPhone) : ?>
                                                <h4 class="plan-intro">夏は浴衣でしょ！人気の浴衣プラン</h4>
                                            <?php endif; ?>
                                            <div class="img">
                                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/cb-plan-yukata.jpg" alt="yukata">
                                            </div>
                                            <div class="plan-info">
                                                <?php if(!$isSmartPhone) : ?>
                                                    <h4 class="plan-intro">夏は浴衣でしょ！人気の浴衣プラン</h4>
                                                <?php endif; ?>
                                                <p class="text-top">かんざし、ヘアセットもついて<span class="red-txt">￥3,580</span><br>WEB決済なら、さらにお得に</p>
                                                <span class="price red-txt">¥2,980-</span>
                                                <div class="sub-info">
                                                    すべてセッ ト追加料金一切不要。<br class="sp">着付け代・小物代を含みます。<br><span class="red-txt">※あとからでもプラン変更可</span>
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="<?php echo WP_HOME; ?>/yukata/plan#standard-yukata" class="btn-plan">このプランを予約する<span class="icon"></span></a>
                                                </div>
                                            </div>
                                            <div class="plan-desc">
                                                かわいいのにプチプライス♪でお得感満載！京都きものレンタルwargoの最
                                                安スタンダード浴衣プランのご紹介です。スタンダード浴衣は初めて浴衣レ
                                                ンタルを体験する、安く手軽に浴衣を体験したいというお客様にピッタリ！
                                                また、落ち着いた色味が清楚な雰囲気を醸し出す、古典柄の浴衣を選びたい
                                                方には特にレパートリーが充実しています。シンプルなデザインに帯や小物
                                                でピリッと挿し色を効かせた、シックなコーディネートを楽しみたい方にも
                                                オススメです。
                                            </div>
                                        </div>
                                        <div class="plan-gallery yukata-gallery">
                                            <h5 class="title">お客様ギャラリー</h5>
                                            <?= do_shortcode('[gallery_for_plan_kimono plan_type="Standard-Yukata" plan_type_id="12"]'); ?>
                                        </div>
                                    </div>
                                </div>

                                <?php echo the_content()?>
                            </div><!--end right-column-->

                        </div><!--end wrap-boths-column-->

                    </div><!--end left-column-content-->


                </div><!--end wrap-column-content-->
            </div>

        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

</div><!-- end container -->

<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>
<script>
    $(document).ready(function(){
        $('.wrap-slider-gallery-pl .slides').slick({
            rows: 0,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    })
</script>

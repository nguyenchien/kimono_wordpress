<?php
/**
 * Template Name: New Formal Review Booking V2
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
global $post;
$clientScript = Yii::app()->clientScript;
$templateUri = get_template_directory_uri();

get_header('formal');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style');
if ($isSmartPhone){
    wp_register_style('new-formal-review-booking-sp-v2', get_template_directory_uri() . '/css/new-formal-review-booking-sp-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-review-booking-sp-v2');
} else {
    wp_register_style('new-formal-review-booking-pc-v2', get_template_directory_uri() . '/css/new-formal-review-booking-pc-v2.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-review-booking-pc-v2');
}
if($isSmartPhone){
    wp_register_style('new-formal-popup-preview-sp', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp');
}else{
    wp_register_style('new-formal-popup-preview-pc', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc');
}
//$clientScript->registerScriptFile($templateUri.'/js/new-formal-review-booking.js',CClientScript::POS_END);
?>
    <div class="container-box clearfix">
        <?php
        if($post->post_name != "formal"){
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
            }
        }
        ?>
        <?php if(!$isSmartPhone):?>
            <h1 class="main-page-title">下見無料の着物レンタル | きものレンタルwargo | 全国 に安心の20店舗</h1>
            <div class="wrap-banner">
                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/banner-review-booking-pc.jpg?ver=20211008" alt="下見無料きものレンタル お下見・ご相談３０分無料 着物コーディネーターが目的に合わせてご提案">
            </div>
        <?php endif; ?>
        <div class="wrap-highend-v2">
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="row">
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
                                                echo FormalSidebarFilterCode(array());
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="right-column right-column-list">
                                        <div class="padding-v2">
                                            <?php
                                            while ( have_posts() ) : the_post();
                                                the_content();
                                            endwhile;
                                            ?>

                                            <?php if($isSmartPhone) : ?>
                                                <h1 class="main-page-title">下見無料の着物レンタル | きものレンタルwargo | 全国 に安心の20店舗</h1>
                                                <div class="review-booking-intro">
                                                    <div class="wrap-banner">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/banner-review-booking-sp.jpg?ver=20211008" alt="下見無料きものレンタル お下見・ご相談３０分無料 着物コーディネーターが目的に合わせてご提案">
                                                    </div>
                                                    <div class="des-banner">
                                                        さまざまなシーンで着用できる着物。日本人として気軽に楽しみたいと思いつつ、何を着ればいいのか、どんな着物がふさわしいか、悩むことも多いですよね。きものレンタルwargoでは着物のプロがそんなお悩みを一気に解決！お客様にふさわしい、オシャレで気の利いた一着をお見立ていたします。
                                                    </div>
                                                </div>
                                                <div class="wrap-step-booking">
                                                    <h2 class="step-title">下見ご予約からの流れ</h2>
                                                    <ul class="list-step">
                                                        <li>
                                                            <strong class="step-name">下見ご予約</strong>
                                                            <p class="step-desc">24時間365日<br class="pc">webから<br class="pc">ご予約いただけます</p>
                                                        </li>
                                                        <li>
                                                            <strong class="step-name">ご来店</strong>
                                                            <p class="step-desc">予約した店舗・時間に<br class="pc">お越しください</p>
                                                        </li>
                                                        <li>
                                                            <strong class="step-name">お着物選び</strong>
                                                            <p class="step-desc">プロの着付師が<br class="pc">コーディネートを<br class="pc">アドバイス！</p>
                                                        </li>
                                                        <li>
                                                            <strong class="step-name">ご試着</strong>
                                                            <p class="step-desc">イメージに合うか<br class="pc">実際に着てみると<br>間違いがありません！</p>
                                                        </li>
                                                        <li>
                                                            <strong class="step-name">ご注文</strong>
                                                            <p class="step-desc">納得いく一着で<br class="pc">お申し込み</p>
                                                        </li>
                                                    </ul>
                                                    <div class="wrap-btn-review">
                                                        <a href="#" class="btn-review formal-preview-popup-handle">
                                                            <div class="pattern"></div>
                                                            <div class="text">
                                                                <span class="text-link">下見の予約をする</span>
                                                                <span class="icon-arrow"></span>
                                                            </div>
                                                            <div class="pattern last"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wrap-review-question ques-01">
                                                    <div class="img-question-top">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-ques-01-sp.png">
                                                    </div>
                                                    <div class="wrap-ques-desc">
                                                        <h3 class="ques-title">私たちにお任せください！</h3>
                                                        <div class="ques-desc">
                                                            <p>きものレンタルwargoには、長年きものに携わっている</p>
                                                            <p>着物のプロ“着物コンシェルジュ”が多数在籍！</p>
                                                            <p>目的にあわせて、素敵に着こなせる、</p>
                                                            <p>最適な一着をご提案いたします。</p>
                                                        </div>
                                                        <div class="img-question-bottom">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-ques-04-sp.png">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-3-checkpoint">
                                                    <h3 class="checkpoint-title">下見に行くと、良いことがたくさん！</h3>
                                                    <ul class="list-checkpoint">
                                                        <li>
                                                            <div class="wrap-title">
                                                            <span class="icon">
                                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-icon.svg">
                                                            </span>
                                                                <div>
                                                                    <span class="checkpoint-num">チェックポイント①</span>
                                                                    <h4 class="checkpoint-name">手にとって確かめられる！</h4>
                                                                </div>
                                                            </div>
                                                            <p class="desc">柄・色合い・生地感など、現物を目の前にして初めて確かめられることがたくさんあります。特に大切なイベントに向け、こだわりたい方にはお下見をおすすめしています。</p>
                                                            <div class="img">
                                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-01.jpg">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wrap-title">
                                                                <span class="icon">
                                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-icon.svg">
                                                                </span>
                                                                <div>
                                                                    <span class="checkpoint-num">チェックポイント②</span>
                                                                    <h4 class="checkpoint-name">コーディネイトをいろいろ試せる</h4>
                                                                </div>
                                                            </div>
                                                            <p class="desc">着物に合わせて、帯や帯留め、半襟や伊達襟など、組み合わせは無限大。お下見に来ていただければweb掲載以外のコーディネイトにも挑戦することができますよ。</p>
                                                            <div class="img">
                                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-02.jpg?ver=20191212">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="wrap-title">
                                                                <span class="icon">
                                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-icon.svg">
                                                                </span>
                                                                <div>
                                                                    <span class="checkpoint-num">チェックポイント③</span>
                                                                    <h4 class="checkpoint-name">着物の常識やマナーを業界のプロに聞ける！</h4>
                                                                </div>
                                                            </div>
                                                            <p class="desc">TPOにあわせたマナーや着物の常識など、難しいことはプロにおまかせ！お客様の目的に合わせて、コーディネイトやヘアスタイルをご提案いたします。</p>
                                                            <div class="img">
                                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-03.jpg">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="wrap-list-product">
                                                    <div class="wrap-list-pd-intro">
                                                        <span class="txt-top">格安着物から本格着物まで</span>
                                                        <span class="txt-bottom">
                                                    <strong>9,120</strong>着
                                                    <small>（ 2018年時点）</small>
                                                </span>
                                                    </div>
                                                    <h4 class="list-pd-title">お下見できるお着物を各種取り揃えております</h4>
                                                    <ul class="list-ginza-store flexbox">
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-1.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">訪問着</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥9,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/homongi">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-2.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">黒留袖</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥9,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/kurotomesode">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-3.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">色留袖</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥9,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/irotomesode">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-4.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">振袖</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥19,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/furisode">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-5.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">袴・二尺袖</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥5,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/hakama">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-6.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">産着（初着）</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥3,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/ubugi">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-7.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">七五三</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥4,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/shichigosan">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="wrap-review-question ques-02">
                                                    <div class="img-question-top">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-ques-02-sp.png">
                                                    </div>
                                                    <div class="wrap-ques-desc">
                                                        <h5 class="ques-title">お下見のみのご利用も大歓迎です！</h5>
                                                        <div class="ques-desc">
                                                            <p>満足できる一着がなければ、申し込みをせず</p>
                                                            <p>お帰りいただいてもかまいません。</p>
                                                            <p>お着物・料金・プランについて、ご納得いただいたうえで、</p>
                                                            <p>レンタルの申し込みをお願いしております。</p>
                                                        </div>
                                                        <div class="img-question-bottom">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-ques-04-sp.png">
                                                        </div>
                                                    </div>
                                                    <div class="wrap-btn-review mgt">
                                                        <a href="#" class="btn-review formal-preview-popup-handle">
                                                            <div class="pattern"></div>
                                                            <div class="text">
                                                                <span class="text-link">下見の予約をする</span>
                                                                <span class="icon-arrow"></span>
                                                            </div>
                                                            <div class="pattern last"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="single-line"></div>
                                                <div class="wrap-shop-list">
                                                    <div class="wrap-title-review flexbox align-items-center">
                                                        <span class="icon-circle">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                        </span>
                                                        <div class="wrap-text-title flexbox align-items-center">
                                                            <h2 class="lbl-title">店舗一覧</h2>
                                                            <span class="des-sm-title">Shop list</span>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-shoplist">
                                                        <div class="shoplist-intro">
                                                            <div class="text-intro">
                                                                <p>きものレンタルwargoは、フォーマル・観光着物など、</p>
                                                                <p>お気軽に着物を楽しんでいただけるよう全国で19店舗を展開中。</p>
                                                                <p>日本最大級のきものレンタルサービスです。</p>
                                                                <p><var>★</var>...フォーマル着物取扱いあり</p>
                                                            </div>
                                                            <div class="text-shop">
                                                                きものレンタルwargoは
                                                                <span>全</span>
                                                                <span>店</span>
                                                                <span>駅</span>
                                                                <span>近！</span>
                                                                <br>お下見のできる店舗は主要都市に9店舗！
                                                            </div>
                                                        </div>
                                                        <div class="wrap-list-area">
                                                            <div class="list-item list-01">
                                                                <h3 class="area-name">関東エリア</h3>
                                                                <ul class="list-shop">
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                            <span class="shop-name">銀座本店</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                            <span class="shop-name">東京スカイツリータウンソラマチ店</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                            <span class="shop-name">新宿駅前店</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                            <span class="shop-name">鎌倉小町店</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-02">
                                                                <h3 class="area-name">京都エリア</h3>
                                                                <ul class="list-shop">
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                            <span class="shop-name">フォーマル京都タワー店</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-03">
                                                                <h3 class="area-name">東日本エリア</h3>
                                                                <ul class="list-shop">
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                            <span class="shop-name">札幌すすきの駅前店</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                            <span class="shop-name">仙台駅前店</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                            <span class="shop-name">金沢香林坊店</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="list-item list-04">
                                                                <h3 class="area-name">西日本エリア</h3>
                                                                <ul class="list-shop">
                                                                    <li class="star">
                                                                        <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi-opa">
                                                                            <span class="shop-name">大阪心斎橋店</span>
                                                                            <span class="arrow"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-btn-review mgt">
                                                        <a href="#" class="btn-review formal-preview-popup-handle">
                                                            <div class="pattern"></div>
                                                            <div class="text">
                                                                <span class="text-link">下見の予約をする</span>
                                                                <span class="icon-arrow"></span>
                                                            </div>
                                                            <div class="pattern last"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="double-line"></div>
                                                <div class="wrap-step-booking-review">
                                                    <div class="wrap-title-review flexbox align-items-center">
                                                        <span class="icon-circle">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                        </span>
                                                        <div class="wrap-text-title flexbox align-items-center">
                                                            <h2 class="lbl-title">お下見4step</h2>
                                                        </div>
                                                    </div>
                                                    <ul class="list-step-booking">
                                                        <li class="step step-01">
                                                            <h3 class="step-heading">1.ご予約</h3>
                                                            <div class="wrap-step">
                                                                <div class="wrap-step-img">
                                                                    <div class="step-img arrow">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-review-booking-sp-01.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="step-content">
                                                                    <p class="txt-note">きものレンタルwargoの下見は、WEBサイトからご予約いただけます。</p>
                                                                    <p class="step-num">①ご来店をご希望の【店舗】</p>
                                                                    <div class="point-box">
                                                                        <p class="angle top left"></p>
                                                                        <p class="angle top right"></p>
                                                                        <p class="angle bottom left"></p>
                                                                        <p class="angle bottom right"></p>
                                                                        <span class="pt">
                                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/point-txt.svg" alt="">
                                                                        </span>
                                                                        <p>ご希望の【店舗】を選択してください。<br>黄色くなっているのが選択中の店舗です。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="next-step">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/step-next.svg" alt="">
                                                            </p>
                                                            <div class="wrap-step align-items-center">
                                                                <div class="wrap-step-img">
                                                                    <div class="step-img arrow">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-review-booking-sp-02.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="step-content">
                                                                    <p class="step-num">②ご来店をご希望の【日付】・【時間】をお選び<br>ください。</p>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-step align-items-end">
                                                                <div class="wrap-step-img">
                                                                    <div class="step-img">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-review-booking-sp-03.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="step-content">
                                                                    <div class="point-box">
                                                                        <p class="angle top left"></p>
                                                                        <p class="angle top right"></p>
                                                                        <p class="angle bottom left"></p>
                                                                        <p class="angle bottom right"></p>
                                                                        <span class="pt">
                                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/point-txt.svg" alt="">
                                                                        </span>
                                                                        <p>ご希望の【日付】を <br>クリック❶すると時間を選べるセレクタ❷が出ます。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="next-step">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/step-next.svg" alt="">
                                                            </p>
                                                            <div class="wrap-step align-items-end">
                                                                <div class="wrap-step-img">
                                                                    <div class="step-img">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-review-booking-sp-04.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="step-content">
                                                                    <div class="point-box">
                                                                        <p class="angle top left"></p>
                                                                        <p class="angle top right"></p>
                                                                        <p class="angle bottom left"></p>
                                                                        <p class="angle bottom right"></p>
                                                                        <span class="pt">
                                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/point-txt.svg" alt="">
                                                                        </span>
                                                                        <p>選択した内容❶にお間違いがないのを確認後、❷「予約画面へ進む」ボタンをおしてください。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="next-step">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/step-next.svg" alt="">
                                                            </p>
                                                            <div class="wrap-step">
                                                                <div class="wrap-step-img">
                                                                    <div class="step-img">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-review-booking-sp-05.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="step-content">
                                                                    <p class="step-num">③ご連絡先を入力頂いたらご予約は完了です！】</p>
                                                                    <div class="point-box">
                                                                        <p class="angle top left"></p>
                                                                        <p class="angle top right"></p>
                                                                        <p class="angle bottom left"></p>
                                                                        <p class="angle bottom right"></p>
                                                                        <span class="pt">
                                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/point-txt.svg" alt="">
                                                                        </span>
                                                                        <p>お着物を着てお出かけされる場所や、ご希望の種類もお知らせいただけると事前に準備ができますので、当日よりスムーズな案内が可能です。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="step step-02">
                                                            <h3 class="step-heading">2.ご来店</h3>
                                                            <p class="desc">ご予約した日時・店舗にご来店ください。</p>
                                                            <div class="img-step">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-step-02.jpg" alt="">
                                                                <p class="bubble">
                                                                    いらっしゃいませ！<br>ご予約の名前をお知らせください。
                                                                </p>
                                                            </div>
                                                            <div class="point-box">
                                                                <p class="angle top left"></p>
                                                                <p class="angle top right"></p>
                                                                <p class="angle bottom left"></p>
                                                                <p class="angle bottom right"></p>
                                                                <div class="lbl ques">
                                                                    <span>Q.</span>
                                                                    <p>どんな服装で行けばいい？</p>
                                                                </div>
                                                                <div class="lbl ans">
                                                                    <span>A.</span>
                                                                    <p>首元が空いたトップス、細身のパンツなど、試着した際はみ出しにくいファッションがオススメです。</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="step step-03">
                                                            <h3 class="step-heading">3.お着物選び</h3>
                                                            <div class="wrap-step-ques">
                                                                <p class="desc">①お出かけの場所や、着物の種類をお伺いいたします。(ご予約時にお知らせいただいている場合は不要です。)</p>
                                                                <div class="img-step">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-step-03-1.jpg" alt="">
                                                                    <p class="bubble">着物を着るのはどんなご予定ですか？</p>
                                                                </div>
                                                                <div class="point-box">
                                                                    <p class="angle top left"></p>
                                                                    <p class="angle top right"></p>
                                                                    <p class="angle bottom left"></p>
                                                                    <p class="angle bottom right"></p>
                                                                    <div class="lbl ques">
                                                                        <span>Q.</span>
                                                                        <p>着物のマナーに詳しくなくて…</p>
                                                                    </div>
                                                                    <div class="lbl ans">
                                                                        <span>A.</span>
                                                                        <p>着物を着ていくシーンやその時のお立場といった情報をもとに最適な着物やコーディネートを提案しています。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-step-ques">
                                                                <p class="desc">②すべてのお着物を写真でチェック！気に入ったお着物を3着ほどお選びいただけます。</p>
                                                                <div class="img-step">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-step-03-2.jpg" alt="">
                                                                    <p class="bubble">お店にあるすべての着物から <br>お選びください。</p>
                                                                </div>
                                                                <div class="point-box">
                                                                    <p class="angle top left"></p>
                                                                    <p class="angle top right"></p>
                                                                    <p class="angle bottom left"></p>
                                                                    <p class="angle bottom right"></p>
                                                                    <div class="lbl ques">
                                                                        <span>Q.</span>
                                                                        <p>あまり時間をかけたくないのですが</p>
                                                                    </div>
                                                                    <div class="lbl ans">
                                                                        <span>A.</span>
                                                                        <p>お客様の好みから、候補をお選びします。 予め着物の画像などインターネットで検索しておくと、下見の際に好みが伝えやすくて便利です。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="step step-04">
                                                            <h3 class="step-heading">4.ご試着</h3>
                                                            <div class="wrap-step-ques">
                                                                <p class="desc">
                                                                    ①ご希望のお着物をお持ちします。ご試着開始！<br>
                                                                    ②帯や小物も合わせてみればグッと本格的にイメージが湧い てきます。お気に召せばご予約ください。
                                                                </p>
                                                                <div class="img-step">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-step-04.jpg" alt="">
                                                                    <p class="bubble">手にとって <br>色柄や生地感をご確認いただけます！</p>
                                                                </div>
                                                                <div class="point-box">
                                                                    <p class="angle top left"></p>
                                                                    <p class="angle top right"></p>
                                                                    <p class="angle bottom left"></p>
                                                                    <p class="angle bottom right"></p>
                                                                    <div class="lbl ques">
                                                                        <span>Q.</span>
                                                                        <p>気に入ったら宅配でも借りられる？</p>
                                                                    </div>
                                                                    <div class="lbl ans">
                                                                        <span>A.</span>
                                                                        <p>可能です。お気に召したお着物は当日ご来店いただきお着付けさせていただく店頭レンタルのほか、ご利用2日前に宅配でご指定の場所にお送りする宅配レンタルも可能です。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="box-30-min">
                                                    <div class="img">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-30-min-sp.jpg" alt="">
                                                    </div>
                                                    <div class="box-txt">
                                                        <h4 class="title">30分間下見は無料です！</h4>
                                                        <p class="info">納得の一着が見つからなかった場合、<br>
                                                            無理にご成約を迫ることはありません。<br>
                                                            安心して着物選びをお楽しみください。
                                                        </p>
                                                        <p class="sub">
                                                            ※お下見が30分を超えた場合、その後30分ごとに1,000円の下見料金が発生します。
                                                        </p>
                                                        <p class="sub">
                                                            ※ご成約いただいた場合は超過料金はいただきません。
                                                        </p>
                                                    </div>
                                                    <div class="wrap-btn-review">
                                                        <a href="#" class="btn-review formal-preview-popup-handle">
                                                            <div class="pattern"></div>
                                                            <div class="text">
                                                                <span class="text-link">下見の予約をする</span>
                                                                <span class="icon-arrow"></span>
                                                            </div>
                                                            <div class="pattern last"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="single-line"></div>
                                            <?php else: ?>
                                                <div class="des-banner">
                                                    さまざまなシーンで着用できる着物。日本人として気軽に楽しみたいと思いつつ、何を着ればいいの<br>
                                                    か、どんな着物がふさわしいか、悩むことも多いですよね。きものレンタルwargoでは着物のプロ <br>
                                                    がそんなお悩みを一気に解決！お客様にふさわしい、オシャレで気の利いた一着をお見立ていたします。
                                                </div>
                                                <div class="wrap-step-booking">
                                                    <h2 class="step-title">下見ご予約からの流れ</h2>
                                                    <ul class="list-step">
                                                        <li>
                                                            <strong class="step-name">下見ご予約</strong>
                                                            <p class="step-desc">24時間365日<br class="pc">webから<br class="pc">ご予約いただけます</p>
                                                        </li>
                                                        <li>
                                                            <strong class="step-name">ご来店</strong>
                                                            <p class="step-desc">予約した店舗・時間に<br class="pc">お越しください</p>
                                                        </li>
                                                        <li>
                                                            <strong class="step-name">お着物選び</strong>
                                                            <p class="step-desc">プロの着付師が<br class="pc">コーディネートを<br class="pc">アドバイス！</p>
                                                        </li>
                                                        <li>
                                                            <strong class="step-name">ご試着</strong>
                                                            <p class="step-desc">イメージに合うか<br class="pc">実際に着てみると<br>間違いがありません！</p>
                                                        </li>
                                                        <li>
                                                            <strong class="step-name">ご注文</strong>
                                                            <p class="step-desc">納得いく一着で<br class="pc">お申し込み</p>
                                                        </li>
                                                    </ul>
                                                    <div class="wrap-btn-review">
                                                        <a href="#" class="btn-review formal-preview-popup-handle">
                                                            <div class="pattern"></div>
                                                            <div class="text">
                                                                <span class="text-link">下見の予約をする</span>
                                                                <span class="icon-arrow"></span>
                                                            </div>
                                                            <div class="pattern last"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wrap-review-question ques-01">
                                                    <div class="img-question-top">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-3ques-pc.jpg">
                                                    </div>
                                                    <div class="wrap-ques-desc">
                                                        <div class="img-left">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-ques-04-pc.jpg">
                                                        </div>
                                                        <div class="desc-right">
                                                            <h3 class="ques-title">私たちにお任せください！</h3>
                                                            <div class="ques-desc">
                                                                <p>きものレンタルwargoには、長年きものに携わっている</p>
                                                                <p>着物のプロ“着物コンシェルジュ”が多数在籍！</p>
                                                                <p>目的にあわせて、素敵に着こなせる、最適な一着をご提案いたします。</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wrap-3-checkpoint">
                                                    <h3 class="checkpoint-title">下見に行くと、良いことがたくさん！</h3>
                                                    <ul class="list-checkpoint">
                                                        <li>
                                                            <div class="wrap-title">
                                                                <span class="icon">
                                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-icon.svg">
                                                                </span>
                                                                <span class="checkpoint-num">チェックポイント①</span>
                                                            </div>
                                                            <h4 class="checkpoint-name">手にとって<br>確かめられる！</h4>
                                                            <div class="img">
                                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-01.jpg">
                                                            </div>
                                                            <p class="desc">
                                                                柄・色合い・生地感など、現物を目の前にして初めて確かめられることがたくさんあります。特に大切なイベントに向け、こだわりたい方にはお下見をおすすめしています。</p>
                                                        </li>
                                                        <li>
                                                            <div class="wrap-title">
                                                                <span class="icon">
                                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-icon.svg">
                                                                </span>
                                                                <span class="checkpoint-num">チェックポイント②</span>
                                                            </div>
                                                            <h4 class="checkpoint-name">コーディネイトを<br>いろいろ試せる</h4>
                                                            <div class="img">
                                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-02.jpg?ver=20191212">
                                                            </div>
                                                            <p class="desc">
                                                                着物に合わせて、帯や帯留め、半襟や伊達襟など、組み合わせは無限大。お下見に来ていただければweb掲載以外のコーディネイトにも挑戦することができますよ。</p>
                                                        </li>
                                                        <li>
                                                            <div class="wrap-title">
                                                                <span class="icon">
                                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-icon.svg">
                                                                </span>
                                                                <span class="checkpoint-num">チェックポイント③</span>
                                                            </div>
                                                            <h4 class="checkpoint-name">
                                                                着物の常識やマナーを<br>業界のプロに聞ける！</h4>
                                                            <div class="img">
                                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/checkpoint-03.jpg">
                                                            </div>
                                                            <p class="desc">
                                                                TPOにあわせたマナーや着物の常識など、難しいことはプロにおまかせ！お客様の目的に合わせて、コーディネイトやヘアスタイルをご提案いたします。</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="wrap-list-product">
                                                    <div class="wrap-list-pd-intro">
                                                        <span class="txt-top">格安着物から本格着物まで</span>
                                                        <span class="txt-bottom">
                                                    <strong>9,120</strong>着
                                                    <small>（ 2018年時点）</small>
                                                </span>
                                                    </div>
                                                    <h4 class="list-pd-title">お下見できるお着物を各種取り揃えております</h4>
                                                    <ul class="list-ginza-store flexbox">
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-1.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">訪問着</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥9,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/homongi">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-2.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">黒留袖</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥9,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/kurotomesode">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-3.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">色留袖</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥9,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/irotomesode">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-4.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">振袖</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥19,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/furisode">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-5.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">袴・二尺袖</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥5,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/hakama">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-6.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">産着（初着）</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥3,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/ubugi">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                        <li class="item-ginza-store">
                                                            <div class="box-image">
                                                                <img data-src="<?php echo WP_HOME; ?>/images/formal-rental/formal-list-v2/pic-ginza-store-7.jpg" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="lbl-name-store">七五三</div>
                                                                <div class="group-price-store">
                                                                    <span class="lg-price-store">¥4,900</span>
                                                                    <small class="tax-store">＋tax</small>
                                                                    <var>~</var>
                                                                </div>
                                                                <div class="text-price-store"><a href="<?php echo WP_HOME; ?>/formal/shichigosan">店舗取扱い商品を見る</a></div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="wrap-review-question ques-02">
                                                    <div class="img img-left">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-ques-02-sp.png">
                                                    </div>
                                                    <div class="img img-right">
                                                        <div class="wrap-ques-desc">
                                                            <h5 class="ques-title">お下見のみのご利用も大歓迎です！</h5>
                                                            <div class="ques-desc">
                                                                <p>満足できる一着がなければ、申し込みをせず</p>
                                                                <p>お帰りいただいてもかまいません。</p>
                                                                <p>お着物・料金・プランについて、ご納得いただいたうえで、</p>
                                                                <p>レンタルの申し込みをお願いしております。</p>
                                                            </div>
                                                            <div class="img-question">
                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-ques-04-pc.png">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-btn-review mgt">
                                                        <a href="#" class="btn-review formal-preview-popup-handle">
                                                            <div class="pattern"></div>
                                                            <div class="text">
                                                                <span class="text-link">下見の予約をする</span>
                                                                <span class="icon-arrow"></span>
                                                            </div>
                                                            <div class="pattern last"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wrap-shop-list">
                                                    <div class="wrap-title-review flexbox align-items-center">
                                                        <span class="icon-circle">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                        </span>
                                                        <div class="wrap-text-title flexbox align-items-center">
                                                            <h2 class="lbl-title">店舗一覧</h2>
                                                            <span class="des-sm-title">Shop list</span>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-shoplist">
                                                        <div class="shoplist-intro">
                                                            <div class="text-intro">
                                                                <p>きものレンタルwargoは、フォーマル・観光着物など、</p>
                                                                <p>お気軽に着物を楽しんでいただけるよう全国で19店舗を展開中。</p>
                                                                <p>日本最大級のきものレンタルサービスです。</p>
                                                                <p><var>★</var>...フォーマル着物取扱いあり</p>
                                                            </div>
                                                            <div class="text-shop">
                                                                きものレンタルwargoは
                                                                <span>全</span>
                                                                <span>店</span>
                                                                <span>駅</span>
                                                                <span>近！</span>
                                                                <br>お下見のできる店舗は主要都市に9店舗！
                                                            </div>
                                                        </div>
                                                        <div class="wrap-list-area">
                                                            <div class="left-list">
                                                                <div class="list-item list-01">
                                                                    <h3 class="area-name">関東エリア</h3>
                                                                    <ul class="list-shop">
                                                                        <li class="star">
                                                                            <a href="<?= home_url(); ?>/formal/access/tokyo-area/ginza-honten">
                                                                                <span class="shop-name">銀座本店</span>
                                                                                <span class="arrow"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="star">
                                                                            <a href="<?= home_url(); ?>/access/asakusa-area/tokyoskytree">
                                                                                <span class="shop-name">東京スカイツリータウンソラマチ店</span>
                                                                                <span class="arrow"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="star">
                                                                            <a href="<?= home_url(); ?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                                                                <span class="shop-name">新宿駅前店</span>
                                                                                <span class="arrow"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="star">
                                                                            <a href="<?= home_url(); ?>/access/kamakura-area/kamakura">
                                                                                <span class="shop-name">鎌倉小町店</span>
                                                                                <span class="arrow"></span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="list-item list-03">
                                                                    <h3 class="area-name">東日本エリア</h3>
                                                                    <ul class="list-shop">
                                                                        <li class="star">
                                                                            <a href="<?= home_url(); ?>/formal/access/sapporo-area/sapporo-susukinostation">
                                                                                <span class="shop-name">札幌すすきの駅前店</span>
                                                                                <span class="arrow"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="star">
                                                                            <a href="<?= home_url(); ?>/formal/access/tohoku-area/sendai-parco2">
                                                                                <span class="shop-name">仙台駅前店</span>
                                                                                <span class="arrow"></span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="star">
                                                                            <a href="<?= home_url(); ?>/access/kanazawa-area/kanazawa">
                                                                                <span class="shop-name">金沢香林坊店</span>
                                                                                <span class="arrow"></span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="right-list">
                                                                <div class="list-item list-02">
                                                                    <h3 class="area-name">京都エリア</h3>
                                                                    <ul class="list-shop">
                                                                        <li class="star">
                                                                            <a href="<?= home_url(); ?>/access/kyoto-area/station-area/formal-kyototower">
                                                                                <span class="shop-name">フォーマル京都タワー店</span>
                                                                                <span class="arrow"></span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="list-item list-04">
                                                                    <h3 class="area-name">西日本エリア</h3>
                                                                    <ul class="list-shop">
                                                                        <li class="star">
                                                                            <a href="<?= home_url(); ?>/access/osaka-area/osaka-shinsaibashi-opa">
                                                                                <span class="shop-name">大阪心斎橋店</span>
                                                                                <span class="arrow"></span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="bg-shoplist">
                                                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/review-booking/bg-product-list-pc.jpg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-btn-review mgt">
                                                        <a href="#" class="btn-review formal-preview-popup-handle">
                                                            <div class="pattern"></div>
                                                            <div class="text">
                                                                <span class="text-link">下見の予約をする</span>
                                                                <span class="icon-arrow"></span>
                                                            </div>
                                                            <div class="pattern last"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="wrap-step-booking-review">
                                                    <div class="wrap-title-review flexbox align-items-center">
                                                        <span class="icon-circle">
                                                            <img src="<?= WP_HOME; ?>/images/formal-rental/formal-list-v2/icon-circle.svg" alt="">
                                                        </span>
                                                        <div class="wrap-text-title flexbox align-items-center">
                                                            <h2 class="lbl-title">お下見4step</h2>
                                                        </div>
                                                    </div>
                                                    <ul class="list-step-booking">
                                                        <li class="step step-01">
                                                            <h3 class="step-heading">
                                                                1.ご予約<span class="txt-note">きものレンタルwargoの下見は、WEBサイトからご予約いただけます。</span>
                                                            </h3>
                                                            <div class="wrap-step">
                                                                <p class="step-num">
                                                                    ①ご来店をご希望の【店舗】と【日時】をお選びください。
                                                                </p>
                                                                <div class="wrap-step-img">
                                                                    <div class="step-img">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-review-booking-pc-01.jpg" alt="">
                                                                        <div class="point-box circle">
                                                                            <span class="pt">
                                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/point-txt.svg" alt="">
                                                                            </span>
                                                                            <p>ご希望の【店舗】を<br>
                                                                                選択してください。<br>
                                                                                黄色くなっているのが<br>
                                                                                選択中の店舗です。</p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="next-step">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/step-next-pc.svg" alt="">
                                                                    </p>
                                                                    <div class="step-img">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-review-booking-pc-02.jpg" alt="">
                                                                        <div class="point-box circle">
                                                                            <span class="pt">
                                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/point-txt.svg" alt="">
                                                                            </span>
                                                                            <p>ご希望の【日付】を<br>
                                                                                クリック❶すると<br>
                                                                                時間を選べる<br>
                                                                                セレクタ❷が出ます。</p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="next-step">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/step-next-pc.svg" alt="">
                                                                    </p>
                                                                    <div class="step-img step-03">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-review-booking-pc-03.jpg" alt="">
                                                                        <div class="point-box circle">
                                                                            <span class="pt">
                                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/point-txt.svg" alt="">
                                                                            </span>
                                                                            <p>選択した内容❶に<br>
                                                                                お間違いがないのを<br>
                                                                                確認後、<br>
                                                                                ❷「予約画面へ進む」<br>
                                                                                ボタンをおしてください。</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-step">
                                                                <p class="step-num">
                                                                    ②ご連絡先を入力頂いたらご予約は完了です！
                                                                </p>
                                                                <div class="wrap-step-img">
                                                                    <div class="step-img">
                                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-review-booking-pc-04.jpg" alt="">
                                                                        <div class="point-box circle box-04">
                                                                            <span class="pt">
                                                                                <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/point-txt.svg" alt="">
                                                                            </span>
                                                                            <p>
                                                                                お着物を着てお出かけさ<br>
                                                                                れる場所や、ご希望の種類<br>
                                                                                もお知らせいただけると事前<br>
                                                                                に準備ができますので、当<br>
                                                                                日よりスムーズな案内が<br>
                                                                                可能です。
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-btn-review">
                                                                <a href="#" class="btn-review formal-preview-popup-handle">
                                                                    <div class="pattern"></div>
                                                                    <div class="text">
                                                                        <span class="text-link">下見の予約をする</span>
                                                                        <span class="icon-arrow"></span>
                                                                    </div>
                                                                    <div class="pattern last"></div>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        <li class="step step-02">
                                                            <h3 class="step-heading">2.ご来店</h3>
                                                            <p class="desc">ご予約した日時・店舗にご来店ください。</p>
                                                            <div class="wrap-step-02">
                                                                <div class="img-step">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-step-02.jpg" alt="">
                                                                </div>
                                                                <div class="wrap-step-ques">
                                                                    <p class="bubble">
                                                                        いらっしゃいませ！<br>ご予約の名前をお知らせください。
                                                                    </p>
                                                                    <div class="point-box">
                                                                        <p class="angle top left"></p>
                                                                        <p class="angle top right"></p>
                                                                        <p class="angle bottom left"></p>
                                                                        <p class="angle bottom right"></p>
                                                                        <div class="lbl ques">
                                                                            <span>Q.</span>
                                                                            <p>どんな服装で行けばいい？</p>
                                                                        </div>
                                                                        <div class="lbl ans">
                                                                            <span>A.</span>
                                                                            <p>首元が空いたトップス、細身のパンツなど、試着した際はみ出しにくいファッションがオススメです。</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="step step-03">
                                                            <h3 class="step-heading">3.お着物選び</h3>
                                                            <p class="desc">①お出かけの場所や、着物の種類をお伺いいたします。（ご予約時にお知らせいただいている場合は不要です。）</p>
                                                            <div class="wrap-step-02">
                                                                <div class="img-step">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-step-03-1.jpg" alt="">
                                                                </div>
                                                                <div class="wrap-step-ques">
                                                                    <p class="bubble">
                                                                        着物を着るのはどんなご予定ですか？
                                                                    </p>
                                                                    <div class="point-box">
                                                                        <p class="angle top left"></p>
                                                                        <p class="angle top right"></p>
                                                                        <p class="angle bottom left"></p>
                                                                        <p class="angle bottom right"></p>
                                                                        <div class="lbl ques">
                                                                            <span>Q.</span>
                                                                            <p>着物のマナーに詳しくなくて…</p>
                                                                        </div>
                                                                        <div class="lbl ans">
                                                                            <span>A.</span>
                                                                            <p>着物を着ていくシーンやその時のお立場といった情報をもとに最適な着物やコーディネートを提案しています。</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="desc">②すべてのお着物を写真でチェック！気に入ったお着物を3着ほどお選びいただけます。</p>
                                                            <div class="wrap-step-02">
                                                                <div class="img-step">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-step-03-2.jpg" alt="">
                                                                </div>
                                                                <div class="wrap-step-ques">
                                                                    <p class="bubble">
                                                                        お店にあるすべての着物から<br>お選びいただけます。
                                                                    </p>
                                                                    <div class="point-box">
                                                                        <p class="angle top left"></p>
                                                                        <p class="angle top right"></p>
                                                                        <p class="angle bottom left"></p>
                                                                        <p class="angle bottom right"></p>
                                                                        <div class="lbl ques">
                                                                            <span>Q.</span>
                                                                            <p>あまり時間をかけたくないのですが</p>
                                                                        </div>
                                                                        <div class="lbl ans">
                                                                            <span>A.</span>
                                                                            <p>お客様の好みから、候補をお選びします。 予め着物の画像などインターネットで検索しておくと、下見の際に好みが伝えやすくて便利です。</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="step step-04">
                                                            <h3 class="step-heading">4.ご試着</h3>
                                                            <p class="desc">
                                                                ①ご希望のお着物をお持ちします。ご試着開始！<br>
                                                                ②帯や小物も合わせてみればグッと本格的にイメージが湧い てきます。お気に召せばご予約ください。
                                                            </p>
                                                            <div class="wrap-step-02">
                                                                <div class="img-step">
                                                                    <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-step-04.jpg" alt="">
                                                                </div>
                                                                <div class="wrap-step-ques">
                                                                    <p class="bubble" style="text-align: left">
                                                                        手にとって<br>色柄や生地感をご確認いただけます！
                                                                    </p>
                                                                    <div class="point-box">
                                                                        <p class="angle top left"></p>
                                                                        <p class="angle top right"></p>
                                                                        <p class="angle bottom left"></p>
                                                                        <p class="angle bottom right"></p>
                                                                        <div class="lbl ques">
                                                                            <span>Q.</span>
                                                                            <p>気に入ったら宅配でも借りられる？</p>
                                                                        </div>
                                                                        <div class="lbl ans">
                                                                            <span>A.</span>
                                                                            <p>可能です。お気に召したお着物は当日ご来店いただきお着付けさせていただく店頭レンタルのほか、ご利用2日前に宅配でご指定の場所にお送りする宅配レンタルも可能です。</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="box-30-min">
                                                    <div class="img">
                                                        <img src="<?= WP_HOME; ?>/images/formal-rental/review-booking/img-30-min-pc.jpg" alt="">
                                                    </div>
                                                    <div class="box-txt">
                                                        <h4 class="title">30分間下見は無料です！</h4>
                                                        <p class="info">納得の一着が見つからなかった場合、<br>
                                                            無理にご成約を迫ることはありません。<br>
                                                            安心して着物選びをお楽しみください。
                                                        </p>
                                                        <p class="sub">
                                                            ※お下見が30分を超えた場合、その後30分ごとに1,000円の下見料金が発生します。
                                                        </p>
                                                        <p class="sub">
                                                            ※ご成約いただいた場合は超過料金はいただきません。
                                                        </p>
                                                    </div>
                                                    <div class="wrap-btn-review">
                                                        <a href="#" class="btn-review formal-preview-popup-handle">
                                                            <div class="pattern"></div>
                                                            <div class="text">
                                                                <span class="text-link">下見の予約をする</span>
                                                                <span class="icon-arrow"></span>
                                                            </div>
                                                            <div class="pattern last"></div>
                                                        </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="wrap-review">
                                                <div class="intro">
                                                    <div class="intro-bg"></div>
                                                    <div class="intro-content">
                                                        <p>Thank you! message</p>
                                                        <h2 class="review-title">ご利用いただいたお客様の声</h2>
                                                        <div class="wrap-line-v2 wrap-line-v2-other">
                                                            <div class="single-line"></div>
                                                        </div>
                                                    </div>
                                                    <div class="intro-bg last"></div>
                                                </div>
                                                <div class="wrap-box-review">
                                                    <?php echo do_shortcode('[yesterday_customer_voices_full_v2]'); ?>
                                                </div>
                                                <div class="wrap-btn-v2 flexbox">
                                                    <div class="wrap-btn-review btn-v2 btn-non-link">
                                                        <a href="/customer-remark-tax/customer-remark-homongi"  class="btn-review">
                                                            <div class="text">
                                                                <span class="text-link">すべてのお客様の声を見る</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end container -->
<?php get_footer('formal') ;?>

<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
	'id' => 'formal-preview-popup',
	'htmlOptions' => array(
		'style' => 'display: none'
	),
))
?>

<?php if(defined('ENABLE_FORMAL_PREVIEW_POPUP') && ENABLE_FORMAL_PREVIEW_POPUP === true):?>
    <?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
        'id' => 'formal-preview-popup',
        'htmlOptions' => array(
            'style' => 'display: none'
        ),
    )) ?>
<?php endif?>


<?php
$cs=Yii::app()->getClientScript();
ob_start();
?>
<script>
    $(document).ready(function () {
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
    })
</script>
<?php
$js = ob_get_contents();
$js = str_replace('<script>','',$js);
$js = str_replace('</script>','',$js);
ob_end_clean();
$cs->registerScript('formal-preview-v2',$js, CClientScript::POS_END);
?>


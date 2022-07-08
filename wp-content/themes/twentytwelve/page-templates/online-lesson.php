<?php
/**
 * Template Name: Online Lesson
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
?>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
<style>
    .wrap-languages{
        display: none;
    }
</style>
<script>
    // Font ten-mincho
    (function(d) {
        var config = {
                kitId: 'yxg1wap',
                scriptTimeout: 3000,
                async: true
            },
            h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
</script>
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
                                        <div class="banner-top">
                                            <img src="<?= WP_HOME; ?>/images/online-lesson/banner-top-sp.jpg" alt="">
                                            <h1 class="page-heading">オンライン着付け教室 和ノ心 ーワノココロ-</h1>
                                        </div>
                                        <!-- intro -->
                                        <div class="intro-wrap">
                                            <div class="intro">
                                                <div class="intro-logo">
                                                    <img src="<?= WP_HOME; ?>/images/online-lesson/logo.svg" alt="">
                                                </div>
                                                <div class="intro-text">
                                                    <h2 class="txt lg">着物レンタルwargoの熟練プロ着付師によるオンライン着付教室スタート！</h2>
                                                    <p class="txt">
                                                        着物レンタルwargoの着付師による、着物を美しく、キレイに着るポイントを適格に押さえたオンライン着付教室です。和装が好きな方はもちろん、日本文化をちょっと体験したいといった<br>
                                                        はじめての方でも気軽に楽しく学べるコースまで幅広いコースをご用意しております。<br>
                                                        自宅でお手軽に着付け体験をお楽しみください。
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- point -->
                                        <div class="point-wrap">
                                            <span class="point-icon-flower"><img src="<?= WP_HOME; ?>/images/online-lesson/pattern-flower.png" alt=""></span>
                                            <h2 class="point-title">オンライン着付け教室のポイント</h2>
                                            <div class="point-list">
                                                <div class="point-item">
                                                    <span class="point-number">Point.1</span>
                                                    <div class="point-desc">
                                                        <h3 class="point-item-title"><span>外出不要！</span><br><span>お家で過ごす時間を有意義に！</span></h3>
                                                        <p>お家でレッスンが受けられるから外に出る必要がなく、楽ちん！</p>
                                                    </div>
                                                </div>
                                                <div class="point-item">
                                                    <span class="point-number">Point.2</span>
                                                    <div class="point-desc">
                                                        <h3 class="point-item-title"><span>マンツーマン指導でコミュニケーションを</span><br><span>取りながら学べる！</span></h3>
                                                        <p>年間 16 万人をお着付けしているきものレンタル wargo のスタッフが丁寧にレクチャーします！ わからないときはその場で質問ができるので、焦らず学べます！</p>
                                                    </div>
                                                </div>
                                                <div class="point-item">
                                                    <span class="point-number">Point.3</span>
                                                    <div class="point-desc">
                                                        <h3 class="point-item-title"><span>浴衣・小物のセットがレンタル可能！</span><br><span>誰でも気軽にご利用頂けます！</span></h3>
                                                        <p>浴衣や小物が無くてもご安心ください！浴衣・小物のセットをご希望のお客様にはご郵送致します！お申込みの際にお申し込みフォームよりご注文いただけます。</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- classroom -->
                                        <div class="classroom-wrap">
                                            <h2 class="classroom-title">オンライン着付け教室　コース内容</h2>
                                            <div class="classroom-list">
                                                <div class="classroom-item">
                                                    <div class="img">
                                                        <img src="<?= WP_HOME; ?>/images/online-lesson/classroom-1.jpg" alt="自宅で手軽に着たい 浴衣">
                                                        <div class="text-img">自宅で手軽に着たい<span class="lg">浴衣</span></div>
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">浴衣チャレンジコース</h3>
                                                        <p class="sub-title">1回：70分 <span><var>￥2,480</var>（税別）</span></p>
                                                        <p class="txt">※クレジットカードのみのお支払い</p>
                                                    </div>
                                                </div>
                                                <div class="classroom-item low-text">
                                                    <div class="img">
                                                        <img src="<?= WP_HOME; ?>/images/online-lesson/classroom-2.jpg" alt="色んな場面で対応できる 訪問着 準備中">
                                                        <div class="text-img">色んな場面で対応できる<span class="lg">訪問着</span></div>
                                                        <div class="text-over"><span>準備中</span></div>
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">訪問着チャレンジコース</h3>
                                                    </div>
                                                </div>
                                                <div class="classroom-item low-text">
                                                    <div class="img">
                                                        <img src="<?= WP_HOME; ?>/images/online-lesson/classroom-3.jpg" alt="一生に一度の着付けに 振袖 準備中">
                                                        <div class="text-img">一生に一度の着付けに<span class="lg">振袖</span></div>
                                                        <div class="text-over"><span>準備中</span></div>
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">振袖チャレンジコース</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- line-banner off -->
<!--                                        <div class="line-banner off">-->
<!--                                            <img src="--><?//= WP_HOME; ?><!--/images/online-lesson/line-banner-off-sp.jpg" alt="">-->
<!--                                        </div>-->
                                        <!-- application flow -->
                                        <div class="flow-wrap">
                                            <div class="flow-title-wrap flow-flex">
                                                <h2 class="flow-title">オンライン着付け教室<span class="lg">お申し込み流れ</span></h2>
                                            </div>
                                            <div class="flow-list">
                                                <div class="flow-item">
                                                    <span class="count">1/5</span>
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-1.jpg" alt=""></div>
                                                    <h3 class="title">1. お申込み</h3>
                                                    <p class="txt">お申込みフォームから、簡単にお申込みいただけます。</p>
                                                    <span class="arrow"></span>
                                                </div>
                                                <div class="flow-item">
                                                    <span class="count">2/5</span>
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-2.jpg" alt=""></div>
                                                    <h3 class="title">2. レッスン日確定</h3>
                                                    <p class="txt">レッスン日程が確定確定したらメールにてお客様へのお支払いのご案内と合わせてご連絡いたします。</p>
                                                    <span class="arrow"></span>
                                                </div>
                                                <div class="flow-item">
                                                    <span class="count">3/5</span>
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-3.jpg" alt=""></div>
                                                    <h3 class="title">3. レッスンに必要なものを準備</h3>
                                                    <p class="txt">浴衣や、着付け小物をご用意ください。お持ちでない方は一式レンタル（¥1.500）できますので、お申込みの際にご連絡ください。</p>
                                                    <span class="arrow"></span>
                                                </div>
                                                <div class="flow-item">
                                                    <span class="count">4/5</span>
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-4.jpg" alt=""></div>
                                                    <h3 class="title">4. Zoomをダウンロード！</h3>
                                                    <p class="txt">レッスンは無料のオンライン通話サービス、WEB会議アプリZoomを使用いたします。予めダウンロードしていただけるとスムーズにレッスンを始められます！</p>
                                                    <span class="arrow"></span>
                                                </div>
                                                <div class="flow-item">
                                                    <span class="count">5/5</span>
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-5.jpg" alt=""></div>
                                                    <h3 class="title">5. レッスンスタート</h3>
                                                    <p class="txt">レッスンのお時間になりましたら、Zoomからメールに記載されているURLにアクセスして通話をスタート！※オンライン通話サービスのため、wifiにつないで頂くことを推奨します</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-banner">
                                            <p class="title">ご自宅で、プロの着付け師による着付け教室を受講してみませんか？</p>
                                        </div>
                                        <!-- form book -->
                                        <div class="form-wrap">
                                            <h2 class="form-title">ご予約フォーム</h2>
                                            <div class="form-content">
                                                <div class="wrap-form-booking">
                                                    <?php
                                                    while (have_posts()) : the_post();
                                                        the_content();
                                                    endwhile;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap-banner-bottom">
                                            <a href="<?= WP_HOME ?>/lesson" class="bottom-img">
                                                <img src="<?= WP_HOME ?>/images/new-kimono/lesson/banner-lesson-sp.jpg" alt="本格着付け 和心流着付け教室">
                                            </a>
                                            <p class="txt-notice">コロナウィルスの影響により着付け教室は休業しております。</p>
                                        </div>
                                        <div class="wrap-shoplist-lesson">
                                            <div class="wrap-title flexbox align-items-center justify-content-center">
                                                <span class="icon">
                                                    <img src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/icon-home-v3.svg">
                                                </span>
                                                <h4 class="title">着付教室の店舗一覧</h4>
                                            </div>
                                            <ul class="shoplist">
                                                <li>
                                                    <a href="<?= home_url() ?>/lesson/tokyo-asakusa">東京浅草店</a>
                                                </li>
                                                <li>
                                                    <a href="<?= home_url() ?>/lesson/kyoto-gion-kyototower">京都タワー店</a>
                                                </li>
                                                <li>
                                                    <a href="<?= home_url() ?>/lesson/kyoto-gion-kyototower">祇園四条店</a>
                                                </li>
                                                <li>
                                                    <a href="<?= home_url() ?>/lesson/osaka-shinsaibashi">大阪心斎橋店</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- foo banner -->
                                        <div class="line-banner foo">
                                            <a href="<?= WP_HOME; ?>/kimono"><img src="<?= WP_HOME; ?>/images/online-lesson/line-banner-foo-sp.jpg" alt=""></a>
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
<?php else: ?>
    <div class="container-box clearfix">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
        }
        ?>
    </div>
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
                                        echo FormalSidebarLeftCodeNewStyle(array());
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
                                        <div class="banner-top">
                                            <img src="<?= WP_HOME; ?>/images/online-lesson/banner-top-pc.jpg" alt="">
                                            <h1 class="page-heading">オンライン着付け教室 和ノ心 ーワノココロ-</h1>
                                        </div>
                                        <!-- intro -->
                                        <div class="intro-wrap">
                                            <div class="intro">
                                                <div class="intro-logo">
                                                    <img src="<?= WP_HOME; ?>/images/online-lesson/logo.svg" alt="">
                                                </div>
                                                <div class="intro-text">
                                                    <h2 class="txt lg">着物レンタルwargoの熟練プロ着付師によるオンライン着付教室スタート！</h2>
                                                    <p class="txt">
                                                        着物レンタルwargoの着付師による、着物を美しく、キレイに着るポイントを適格に押さえたオンライン着付教室です。和装が好きな方はもちろん、日本文化をちょっと体験したいといった<br>
                                                        はじめての方でも気軽に楽しく学べるコースまで幅広いコースをご用意しております。<br>
                                                        自宅でお手軽に着付け体験をお楽しみください。
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- point -->
                                        <div class="point-wrap">
                                            <span class="point-icon-flower"><img src="<?= WP_HOME; ?>/images/online-lesson/pattern-flower.png" alt=""></span>
                                            <h2 class="point-title">オンライン着付け教室のポイント</h2>
                                            <div class="point-list">
                                                <div class="point-item">
                                                    <span class="point-number">Point.1</span>
                                                    <div class="point-desc">
                                                        <h3 class="point-item-title"><span>外出不要！</span><br><span>お家で過ごす時間を有意義に！</span></h3>
                                                        <p>お家でレッスンが受けられるから外に出る必要がなく、楽ちん！</p>
                                                    </div>
                                                </div>
                                                <div class="point-item">
                                                    <span class="point-number">Point.2</span>
                                                    <div class="point-desc">
                                                        <h3 class="point-item-title"><span>マンツーマン指導でコミュニケーションを</span><br><span>取りながら学べる！</span></h3>
                                                        <p>年間 16 万人をお着付けしているきものレンタル wargo のスタッフが丁寧にレクチャーします！ わからないときはその場で質問ができるので、焦らず学べます！</p>
                                                    </div>
                                                </div>
                                                <div class="point-item">
                                                    <span class="point-number">Point.3</span>
                                                    <div class="point-desc">
                                                        <h3 class="point-item-title"><span>浴衣・小物のセットがレンタル可能！</span><br><span>誰でも気軽にご利用頂けます！</span></h3>
                                                        <p>浴衣や小物が無くてもご安心ください！浴衣・小物のセットをご希望のお客様にはご郵送致します！お申込みの際にお申し込みフォームよりご注文いただけます。</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- classroom -->
                                        <div class="classroom-wrap">
                                            <h2 class="classroom-title">オンライン着付け教室　コース内容</h2>
                                            <div class="classroom-list">
                                                <div class="classroom-item">
                                                    <div class="img">
                                                        <img src="<?= WP_HOME; ?>/images/online-lesson/classroom-1.jpg" alt="自宅で手軽に着たい 浴衣">
                                                        <div class="text-img">自宅で手軽に着たい<span class="lg">浴衣</span></div>
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">浴衣チャレンジコース</h3>
                                                        <p class="sub-title">1回：70分 <span><var>￥2,480</var>（税別）</span></p>
                                                        <p class="txt">※クレジットカードのみのお支払い</p>
                                                    </div>
                                                </div>
                                                <div class="classroom-item low-text">
                                                    <div class="img">
                                                        <img src="<?= WP_HOME; ?>/images/online-lesson/classroom-2.jpg" alt="色んな場面で対応できる 訪問着 準備中">
                                                        <div class="text-img">色んな場面で対応できる<span class="lg">訪問着</span></div>
                                                        <div class="text-over"><span>準備中</span></div>
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">訪問着チャレンジコース</h3>
                                                    </div>
                                                </div>
                                                <div class="classroom-item low-text">
                                                    <div class="img">
                                                        <img src="<?= WP_HOME; ?>/images/online-lesson/classroom-3.jpg" alt="一生に一度の着付けに 振袖 準備中">
                                                        <div class="text-img">一生に一度の着付けに<span class="lg">振袖</span></div>
                                                        <div class="text-over"><span>準備中</span></div>
                                                    </div>
                                                    <div class="text">
                                                        <h3 class="title">振袖チャレンジコース</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- line-banner off -->
<!--                                        <div class="line-banner off">-->
<!--                                            <img src="--><?//= WP_HOME; ?><!--/images/online-lesson/line-banner-off-pc.jpg" alt="">-->
<!--                                        </div>-->
                                        <!-- application flow -->
                                        <div class="flow-wrap">
                                            <div class="flow-title-wrap flow-flex">
                                                <h2 class="flow-title">オンライン着付け教室<span class="lg">お申し込み流れ</span></h2>
                                            </div>
                                            <div class="flow-list flow-flex">
                                                <div class="flow-item">
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-1.jpg" alt=""></div>
                                                    <h3 class="title">1. お申込み</h3>
                                                    <p class="txt">お申込みフォームから、簡単にお申込みいただけます。</p>
                                                    <span class="arrow"></span>
                                                </div>
                                                <div class="flow-item">
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-2.jpg" alt=""></div>
                                                    <h3 class="title">2. レッスン日確定</h3>
                                                    <p class="txt">レッスン日程が確定確定したらメールにてお客様へのお支払いのご案内と合わせてご連絡いたします。</p>
                                                    <span class="arrow"></span>
                                                </div>
                                                <div class="flow-item">
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-3.jpg" alt=""></div>
                                                    <h3 class="title">3. レッスンに必要なものを準備</h3>
                                                    <p class="txt">浴衣や、着付け小物をご用意ください。お持ちでない方は一式レンタル（¥1.500）できますので、お申込みの際にご連絡ください。</p>
                                                    <span class="arrow"></span>
                                                </div>
                                                <div class="flow-item">
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-4.jpg" alt=""></div>
                                                    <h3 class="title">4. Zoomをダウンロード！</h3>
                                                    <p class="txt">レッスンは無料のオンライン通話サービス、WEB会議アプリZoomを使用いたします。予めダウンロードしていただけるとスムーズにレッスンを始められます！</p>
                                                    <span class="arrow"></span>
                                                </div>
                                                <div class="flow-item">
                                                    <div class="img"><img src="<?= WP_HOME; ?>/images/online-lesson/flow-5.jpg" alt=""></div>
                                                    <h3 class="title">5. レッスンスタート</h3>
                                                    <p class="txt">レッスンのお時間になりましたら、Zoomからメールに記載されているURLにアクセスして通話をスタート！※オンライン通話サービスのため、wifiにつないで頂くことを推奨します</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-banner">
                                            <p class="title">ご自宅で、プロの着付け師による着付け教室を受講してみませんか？</p>
                                        </div>
                                        <!-- form book -->
                                        <div class="form-wrap">
                                            <h2 class="form-title">ご予約フォーム</h2>
                                            <div class="form-content">
                                                <div class="wrap-form-booking">
                                                    <?php
                                                    while (have_posts()) : the_post();
                                                        the_content();
                                                    endwhile;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap-banner-bottom">
                                            <a href="<?= WP_HOME ?>/lesson" class="bottom-img">
                                                <img src="<?= WP_HOME ?>/images/new-kimono/lesson/banner-lesson-pc.jpg" alt="本格着付け 和心流着付け教室">
                                            </a>
                                            <p class="txt-notice">コロナウィルスの影響により着付け教室は休業しております。</p>
                                        </div>
                                        <div class="wrap-shoplist-lesson">
                                            <div class="wrap-title flexbox align-items-center">
                                                <span class="icon">
                                                    <img src="<?= WP_HOME ?>/images/formal-rental/formal-list-v3/icon-home-v3.svg">
                                                </span>
                                                <h4 class="title">着付教室の店舗一覧</h4>
                                            </div>
                                            <ul class="shoplist">
                                                <li>
                                                    <a href="<?= home_url() ?>/lesson/tokyo-asakusa">東京浅草店</a>
                                                </li>
                                                <li>
                                                    <a href="<?= home_url() ?>/lesson/kyoto-gion-kyototower">京都タワー店</a>
                                                </li>
                                                <li>
                                                    <a href="<?= home_url() ?>/lesson/kyoto-gion-kyototower">祇園四条店</a>
                                                </li>
                                                <li>
                                                    <a href="<?= home_url() ?>/lesson/osaka-shinsaibashi">大阪心斎橋店</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- foo banner -->
                                        <div class="line-banner foo">
                                            <a href="<?= WP_HOME; ?>/kimono"><img src="<?= WP_HOME; ?>/images/online-lesson/line-banner-foo-pc.jpg" alt=""></a>
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
    <div class="clearfix" style="height: 40px;"></div>
<?php endif; ?>

<div class="popup-overlay" id="term-popup">
    <div class="wrap-term-popup">
        <span class="close-popup">&times;</span>
        <h4 class="popup-title">注意事項</h4>
        <div class="term-row">
            <h5 class="term-name">受講の際にご用意いただくもの</h5>
            <div class="term">
                <p>①浴衣　②半幅帯　③肌着　④腰紐２本　⑤伊達締めまたはマジックベルト　⑥帯板　⑦着物クリップ（洗濯ばさみで代用可）</p>
            </div>
        </div>
        <div class="term-row">
            <h5 class="term-name">受講の際の環境について	</h5>
            <div class="term">
                <p>受講の際はオンライン通話サービスZoom（無料）を使用いたしますので、あらかじめ使用環境を整えて頂きますようお願いします。</p>
                <p>※Zoomをご利用の際は通信料が発生するためwifiの使用を推奨します。	</p>
            </div>
        </div>
        <div class="term-row">
            <h5 class="term-name">お支払方法について</h5>
            <div class="term">
                <p>クレジットカード決済にてお支払いをお願いします。メールにてお送りしている決済リンクからお支払いくださいませ。発行から２４時間以内にお支払いをお願いします。</p>
            </div>
        </div>
        <div class="term-row">
            <h5 class="term-name">キャンセル・返金について</h5>
            <div class="term">
                <p>①決済後のキャンセル・変更はできません<br>
                    ②通信障害等により、受講時間（開始／終了）に遅延が生じた場合の返金等はお受けできません。
                    予めご了承ください。</p>
            </div>
        </div>
        <div class="btn-back-lesson">
            <span class="back-lesson">戻る</span>
        </div>
    </div>
</div>
<?php get_footer('formal-v2'); ?>
<?php Yii::app()->controller->widget ('application.components.widgets.formal.FormalPreview', array(
    'id' => 'formal-preview-popup',
    'htmlOptions' => array(
        'style' => 'display: none'
    ),
))
?>
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
        <?php if($isSmartPhone): ?>
        function slide_flow(){
            $('.flow-list').slick({
                infinite: false,
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: true,
                adaptiveHeight: false,
            });
        }
        $(window).load(function () {
            slide_flow();
        });
        $(window).scroll(function () {
            $('.flow-list')[0].slick.refresh();
            var ph = $('.flow-list').outerHeight() - 40;
            $('.flow-item').height(ph);
        });
        <?php endif; ?>
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
        $('.items-product-landing-ubugi').click(function(){
        	var target = $(this).attr('data-target');
			var content = $('.wrap-product-list').find('.product-list-content#' + target);
			$(this).addClass('active');
        	$(this).siblings().removeClass('active');
        	content.fadeIn('fast');
        	content.siblings().fadeOut('fast');
        });
        $('.list-product-landing-ubugi .items-product-landing-ubugi:first-child').click();

        // Lazy load for background image
        $(".lazy").lazy();


        // Validate form submit
        $('#lesson-booking-form .submit-btn').click(function(e){
            e.preventDefault();
            var r = confirm("本当に送信してもよろしいですか ?");
            if (r == true) {
                $('#lesson-booking-form').submit();
            }
        });

        // Term popup
        $('.confirm .wpcf7-list-item-label').click(function(){
            $('#term-popup').fadeIn();
            $('html').addClass('fixed-body');
        });
        $('.wrap-term-popup .close-popup').click(function(){
            $('#term-popup').fadeOut('fast');
            $('html').removeClass('fixed-body');
        });
        $('.btn-back-lesson .back-lesson').click(function(){
            $('#term-popup').fadeOut('fast');
            $('html').removeClass('fixed-body');
        });

        document.addEventListener( 'wpcf7mailsent', function(event) {
            alert("送信しました。");
        }, false );
    })
</script>
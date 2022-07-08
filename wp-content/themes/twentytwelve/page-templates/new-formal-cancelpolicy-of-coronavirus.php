<?php
/**
 * Template Name: New Formal Cancelpolicy Of Coronavirus
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
wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick');
wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-slick-theme');
if($isSmartPhone){
    wp_register_style('new-formal-popup-preview-sp', get_template_directory_uri() . '/css/new-formal-popup-preview-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-sp');
} else{
    wp_register_style('new-formal-popup-preview-pc', get_template_directory_uri() . '/css/new-formal-popup-preview-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-popup-preview-pc');
}
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
?>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
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
<?php if($isSmartPhone):?>
    <div class="container-box clearfix">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
        }
        ?>
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
                                            echo FormalSidebarFilterCode(array());
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="right-column right-column-list right-cate-list-v3 <?= $postName?>">
                                    <div class="padding-v2">
                                        <div class="wrap-corona-virus">
                                            <div class="wrap-header">
                                                <h1 class="text-header">
                                                    新型コロナウィルスでの各種イベントの中止、卒業式・結婚式などの <br>
                                                    式典延期・中止に際しての当店でのご対応に関するお知らせ
                                                </h1>
                                            </div>
                                            <div class="des-title-header">
                                                今回のコロナウィルスでの各種イベントの開催自粛・延期に際し、弊社では本日2020年2月28日より以下の対応を取らせて頂きます。
                                            </div>
                                            <hr>
                                            <div class="wrap-content-corona">
                                                <div class="content-table">
                                                    <h2 class="title-table">
                                                        【訪問着・黒留袖・色留袖・付け下げのレンタル予約の場合】
                                                    </h2>
                                                    <div class="wrap-table">
                                                        <table class="table">
                                                            <tr class="header-table">
                                                                <th class="text-header">期間</th>
                                                                <th class="text-header">通常対応</th>
                                                                <th class="text-header">臨時対応 <br>（以下①②③のいずれかからご選択下さい）</th>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1ヶ月前のキャンセル</td>
                                                                <td>無料</td>
                                                                <td class="text-center">-</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1ヶ月未満～1週間前のキャンセル</td>
                                                                <td>代金の30％のキャンセル料</td>
                                                                <td>
                                                                    <p class="text-note">①代金の30％のキャンセル料</p>
                                                                    <p class="text-note text-red">②ご利用日程の無料変更</p>
                                                                    <p class="text-note text-red">③ご利用予定代金と同類以上のプランへの変更</p>
                                                                    <p class="text-note text-red">（ご利用日程の無料変更含む）</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1週間未満のキャンセル</td>
                                                                <td>代金の100％のキャンセル料</td>
                                                                <td>
                                                                    <p class="text-note">①代金の100％のキャンセル料</p>
                                                                    <p class="text-note text-red">②ご利用日程の無料変更</p>
                                                                    <p class="text-note text-red">③ご利用予定代金と同類以上のプランへの変更</p>
                                                                    <p class="text-note text-red">（ご利用日程の無料変更含む）</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="content-table">
                                                    <h3 class="title-table">
                                                        【袴・振袖・七五三のレンタル予約の場合】
                                                    </h3>
                                                    <div class="wrap-table">
                                                        <table class="table">
                                                            <tr class="header-table">
                                                                <th class="text-header">期間</th>
                                                                <th class="text-header">通常対応</th>
                                                                <th class="text-header">通常対応<br>（以下①②③のいずれかからご選択下さい）</th>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1ヶ月前のキャンセル</td>
                                                                <td>無料</td>
                                                                <td class="text-center">-</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1ヶ月未満～1週間以上前のキャンセル</td>
                                                                <td>代金の100％のキャンセル料</td>
                                                                <td>
                                                                    <p class="text-note">①<span class="text-red">代金の50％</span>のキャンセル料</p>
                                                                    <p class="text-note">②<span class="text-red">ご利用日程の無料変更</span></p>
                                                                    <p class="text-note">③<span class="text-red">ご利用予定代金の50％以上のプランへの変更</span></p>
                                                                    <p class="text-note text-red">（ご利用日程の無料変更含む）</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1週間未満のキャンセル</td>
                                                                <td>代金の100％のキャンセル料</td>
                                                                <td>
                                                                    <p class="text-note">①<span class="text-red">代金の70％</span>のキャンセル料</p>
                                                                    <p class="text-note">②<span class="text-red">ご利用日程の無料変更</span></p>
                                                                    <p class="text-note">③<span class="text-red">ご利用予定代金の50％以上のプランへの変更</span></p>
                                                                    <p class="text-note text-red">（ご利用日程の無料変更含む）</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="intro-conrona">
                                                    <div class="text-1 text-red">
                                                        ※いずれの場合も各イベントの出席証明ならびに開催状況の証明となるもののご提示が必須となります。
                                                    </div>
                                                    <div class="text-2 text-red">
                                                        ※ご利用日の変更の場合、お日にちによってはご希望のお客様での対応が難しい場合がございます。<br>
                                                        そのような場合は別の商品の中で再度お選び直して頂くか、お好みのお着物が空いてる日程にて承らせていただきます。
                                                    </div>
                                                    <div class="text-3">
                                                        この度の不測の事態を踏まえ、出来る最大限のご対応をさせて頂きたいと考えて鋭意検討した結果、こちらでのご対応とさせて頂くこととなりました。<br>
                                                        スタッフ共々、精神誠意努めてまいりますので、お客様のご理解賜ります様、宜しくお願い申し上げます。
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
                                        <div class="wrap-corona-virus">
                                            <div class="wrap-header">
                                                <h1 class="text-header">
                                                    新型コロナウィルスでの各種イベントの中止、卒業式・結婚式などの <br>
                                                    式典延期・中止に際しての当店でのご対応に関するお知らせ
                                                </h1>
                                            </div>
                                            <div class="des-title-header">
                                                今回のコロナウィルスでの各種イベントの開催自粛・延期に際し、弊社では本日2020年2月28日より以下の対応を取らせて頂きます。
                                            </div>
                                            <hr>
                                            <div class="wrap-content-corona">
                                                <div class="content-table">
                                                    <h2 class="title-table">
                                                        【訪問着・黒留袖・色留袖・付け下げのレンタル予約の場合】
                                                    </h2>
                                                    <div class="wrap-table">
                                                        <table class="table">
                                                            <tr class="header-table">
                                                                <th class="text-header">期間</th>
                                                                <th class="text-header">通常対応</th>
                                                                <th class="text-header">臨時対応 <br>（以下①②③のいずれかからご選択下さい）</th>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1ヶ月前のキャンセル</td>
                                                                <td>無料</td>
                                                                <td class="text-center">-</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1ヶ月未満～1週間前の <br> キャンセル</td>
                                                                <td>代金の30％のキャンセル料</td>
                                                                <td>
                                                                    <p class="text-note">①代金の30％のキャンセル料</p>
                                                                    <p class="text-note text-red">②ご利用日程の無料変更</p>
                                                                    <p class="text-note text-red">③ご利用予定代金と同類以上のプランへの変更</p>
                                                                    <p class="text-note text-red">（ご利用日程の無料変更含む）</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1週間未満のキャンセル</td>
                                                                <td>代金の100％のキャンセル料</td>
                                                                <td>
                                                                    <p class="text-note">①代金の100％のキャンセル料</p>
                                                                    <p class="text-note text-red">②ご利用日程の無料変更</p>
                                                                    <p class="text-note text-red">③ご利用予定代金と同類以上のプランへの変更</p>
                                                                    <p class="text-note text-red">（ご利用日程の無料変更含む）</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="content-table">
                                                    <h3 class="title-table">
                                                        【袴・振袖・七五三のレンタル予約の場合】
                                                    </h3>
                                                    <div class="wrap-table">
                                                        <table class="table">
                                                            <tr class="header-table">
                                                                <th class="text-header">期間</th>
                                                                <th class="text-header">通常対応</th>
                                                                <th class="text-header">通常対応<br>（以下①②③のいずれかからご選択下さい）</th>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1ヶ月前のキャンセル</td>
                                                                <td>無料</td>
                                                                <td class="text-center">-</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1ヶ月未満～1週間以上前の<br>キャンセル</td>
                                                                <td>代金の100％のキャンセル料</td>
                                                                <td>
                                                                    <p class="text-note">①<span class="text-red">代金の50％</span>のキャンセル料</p>
                                                                    <p class="text-note">②<span class="text-red">ご利用日程の無料変更</span></p>
                                                                    <p class="text-note">③<span class="text-red">ご利用予定代金の50％以上のプランへの変更</span></p>
                                                                    <p class="text-note text-red">（ご利用日程の無料変更含む）</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-header">1週間未満のキャンセル</td>
                                                                <td>代金の100％のキャンセル料</td>
                                                                <td>
                                                                    <p class="text-note">①<span class="text-red">代金の70％</span>のキャンセル料</p>
                                                                    <p class="text-note">②<span class="text-red">ご利用日程の無料変更</span></p>
                                                                    <p class="text-note">③<span class="text-red">ご利用予定代金の50％以上のプランへの変更</span></p>
                                                                    <p class="text-note text-red">（ご利用日程の無料変更含む）</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="intro-conrona">
                                                    <div class="text-1 text-red">
                                                        ※いずれの場合も各イベントの出席証明ならびに開催状況の証明となるもののご提示が必須となります。
                                                    </div>
                                                    <div class="text-2 text-red">
                                                        ※ご利用日の変更の場合、お日にちによってはご希望のお客様での対応が難しい場合がございます。<br>
                                                        そのような場合は別の商品の中で再度お選び直して頂くか、お好みのお着物が空いてる日程にて承らせていただきます。
                                                    </div>
                                                    <div class="text-3">
                                                        この度の不測の事態を踏まえ、出来る最大限のご対応をさせて頂きたいと考えて鋭意検討した結果、こちらでのご対応とさせて頂くこととなりました。<br>
                                                        スタッフ共々、精神誠意努めてまいりますので、お客様のご理解賜ります様、宜しくお願い申し上げます。
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
    </div>
    <section class="voice-section voice-section-homongi lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/bg-homogi-prime-voice.png">
        <div class="container-box">
            <div class="wrap-title-fm-other">
                <p class="sub-title">Voice</p>
                <h2 class="main-title">きものレンタルwargoをご利用いただお客様の<br>お声になりますのでご参考下さい。</h2>
            </div>
            <div class="wrap-box-review">
                <?php echo do_shortcode('[customer_review_content_formal_v3]'); ?>
            </div><!--end wrap-box-review-->
            <div class="wrap-btn-v2 flexbox">
                <a href="<?= home_url(); ?>/customer-remark-tax/customer-remark-homongi" class="btn-v2 btn-review">
                    <span class="icon"></span>
                    <div class="text">
                        <span class="text-link">すべてのお客様の声を見る</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
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
                                きものレンタルwargoフォーマル着物取扱店舗では下見およびご来店でのご予約も承っております。<br>
                                下見（30分まで無料）をご予約いただき、お着物を選んでいただいた上で、配送のご予約をいただくことが可能です。店頭での現金払い、クレジットカード払いも選択していただけます。
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
                                <a href="<?= home_url() ?>/formal/homongi/list" class="link-to">
                                    <span class="btn-icon">
                                        <img class="lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/icon-kimono-v3.svg" alt="">
                                    </span>宅配レンタルの訪問着一覧はこちら
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="column-section lazy" data-src="<?php echo WP_HOME ;?>/images/formal-rental/formal-list-v3/bg-column-homongi-pc.jpg">
        <div class="container-box">
            <div class="wrap-title-fm-other">
                <p class="sub-title">Homongi Column</p>
                <h2 class="main-title">訪問着についての基礎知識</h2>
            </div>
            <div class="wrap-content-column">
                <?php echo do_shortcode('[list_product_formal_from_column category=homongi]'); ?>
            </div>
            <div class="wrap-btn-link flexbox justify-content-center">
                <a href="<?= home_url() ?>/column/homongi" class="link-to">
                    もっと着物のコラムを説む
                </a>
            </div>
        </div>
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

<?php endif; ?>

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
<script>
    $(document).ready(function(){
        $('.lazy').lazy();
        //Top banner slider
        /* setTimeout(function(){
            $('#list-banner-fm').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
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
        }, 2000); */
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
        })
    })
</script>
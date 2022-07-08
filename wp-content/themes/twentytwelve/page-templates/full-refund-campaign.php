<?php
/**
 * Template Name: Full Refund Campaign
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
get_header('formal');
if($isSmartPhone){
    wp_register_style('full-refund-campaign-sp-style', get_template_directory_uri() . '/css/full-refund-campaign-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('full-refund-campaign-sp-style');
}else{
    wp_register_style('full-refund-campaign-pc-style', get_template_directory_uri() . '/css/full-refund-campaign-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('full-refund-campaign-pc-style');
}
?>
<?php if($isSmartPhone):?>
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
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-fm-v2">', '</div>');
    }
    ?>

    <?php if($isSmartPhone) : ?>
        <?php if(get_field('title_list_cate_sp')): ?>
            <h1 class="title-name-formal">
                <?php the_field('title_list_cate_sp'); ?>
            </h1>
        <?php endif; ?>
    <?php else: ?>
        <?php if(get_field('title_list_cate_pc')): ?>
            <h1 class="title-name-formal">
                <?php the_field('title_list_cate_pc'); ?>
            </h1>
        <?php endif; ?>
    <?php endif; ?>


    <div class="banner-top-refund-campaign">
        <?php if($isSmartPhone) : ?>
            <div class="banner-top-refund">
                <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/main-banner-refund_campaign-sp.jpg">
            </div>
        <?php else: ?>
            <div class="banner-top-refund">
                <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/main-banner-refund_campaign-pc.jpg">
            </div>
        <?php endif; ?>
    </div><!--banner-top-refund-campaign-->

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

                            <div class="right-column right-column-list right-refund-campaign">
                                <div class="row-campaign">
                                    <div class="wraper-title-page-campain">
                                        <div class="wraper-title-header">
                                            <h2 class="title">一人一人に安心してご満足頂きたいという想い。</h2>
                                        </div>
                                        <div class="campain-refund-des">
                                            <p>きものレンタルwargoは、世界中の方々にお着物を楽しんで頂けるよう、店舗の運営、商品の仕入れ、スタッフの接 客サービス向上に全力を注いでおります。万が一、ご満足頂けなかった場合には、お手数ではございますが、ご報告 を頂けましたらご利用料金は全額ご返金させて頂きます。お客様にご満足頂けるよう、スタッフ一同努めて参ります ので、引き続きのご愛顧賜りますよう、よろしくお願い申し上げます。</p>
                                        </div>
                                    </div>
                                    <div class="wrap-line-title">
                                        <div class="line-sigle-refund">
                                            <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/line-single-refund-pc.png">
                                        </div>
                                        <h2 class="wrap-title">
                                            きものレンタルwargoのポイント
                                        </h2>
                                        <div class="line-sigle-refund">
                                            <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/line-single-refund-pc.png">
                                        </div>
                                    </div>
                                    <div class="wrap-rent">
                                        <div class="wrap-rent-happiness flexbox">
                                            <div class="happiness-img">
                                                <div class="happiness-img-block">
                                                    <?php if($isSmartPhone) : ?>
                                                        <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/img-happiness-sp.jpg">

                                                    <?php else: ?>
                                                        <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/img-happiness.jpg">

                                                    <?php endif; ?>
                                                    <span class="number-wrap-rent">
                                                        01
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="happiness-content">
                                                <h3 class="text-title">
                                                    お客様満足度９７.3％
                                                    <small>（自社アンケート調べ）</small>
                                                </h3>
                                                <div class="text-des">
                                                    きものレンタルwargoをご利用いただいたお客様から、「レンタルとは思えない品質の高いお着物だった」「非常にお手 頃な価格で良いお着物をレンタルできた」といったお喜びの声を多数いただいております。初めてのお客様にもご満足い ただけるようスタッフ一同が全力を尽くしておりますので、是非ご利用ください。
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-wrap-chart">
                                            <div class="padding-block-wrap-chart">
                                                <div class="wrap-chart">
                                                    <div class="img-chart-refund">
                                                        <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/chart-full-refurn.svg">
                                                    </div>
                                                    <div class="content-wrap-chart">
                                                        <div class="wrap-chart-title">
                                                            きものレンタルwargoはお客様満足度97.3％
                                                            <br>
                                                            皆様にご満足頂けるサービスを心がけています。
                                                        </div>
                                                        <div class="wrap-chart-des">
                                                            きものレンタルwargoを運営する株式会社和心は 呉服業界では珍しく、東証マザーズに上場し信頼のおける企業運営を行っています。着物レンタル以外にも、かんざし・帯留や和傘といった和装小物の専門店を多数運営しており 日本全国で毎年大変多くの方にご利用いただいています。
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div><!--end wrap rent-->

                                    <div class="wrap-rent">
                                        <div class="wrap-rent-happiness flexbox">
                                            <div class="happiness-img">
                                                <div class="happiness-img-block">
                                                    <img src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/img-quality.jpg">
                                                    <span class="number-wrap-rent">
                                                        02
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="happiness-content">
                                                <h3 class="text-title">
                                                    最高品質のクリーニング
                                                </h3>
                                                <div class="text-des">
                                                    きものレンタルwargoでは、お着物は全て１枚１枚手洗いにて、素材・汚れにあった洗い方を行っております。
                                                    <br>
                                                    1点1点の状態に合わせた洗浄・仕上げを行うことで、生地全体の色褪せや伸びなどが起こりづらく、柄物の金箔や銀箔の剥がれなども最小限に留めますので、常に綺麗な状態でのレンタルお着物をご提供しております。
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-wrap-chart">
                                            <div class="padding-block-wrap-chart">
                                                <div class="note-title text-center text-color-yellow-copper">
                                                    もちろん、お客様によるお洗濯・クリーニングはご不要です。
                                                    <br>
                                                    ご利用になられましたら、そのままご返却くださいませ。
                                                </div>
                                                <div class="wrap-pay-clean flexbox">
                                                    <div class="pay-clean">
                                                        <p class="pay-clean-title">
                                                            《 クリーニングがお客様負担となるケース 》
                                                            <br>
                                                            ・通常のクリーニングでは落ちない特殊な汚れ（油性汚れ、ワイン、血液など）
                                                            <br>
                                                            ・使用困難となるダメージ（タバコの焼焦げ、水濡れによる縮みなど）
                                                            <br>
                                                            ・時計やブレスレットなど、装飾品による袖内側の糸の引きつれ
                                                            <br>
                                                            ・引きずることなどによっておこる裾周辺の擦れ
                                                            <br>
                                                            ・香水などの強い匂い移りによる匂い除去
                                                        </p>
                                                    </div><!--end pay-clean-->
                                                    <div class="pay-money flexbox">
                                                        <div class="arrow-right">
                                                            <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/arrow-right.svg">
                                                        </div>
                                                        <div class="pay-money-security text-center">
                                                            <div class="pay-money-security-up">
                                                                <p class="title">安心保証サービス</p>
                                                                <p class="money-tax">¥1,000<small>+tax</small></p>
                                                            </div>
                                                            <div class="pay-money-security-down text-color-yellow-copper">
                                                                <span>にご加入で</span>
                                                                <span class="number-money"><var class="symbol-money"> ¥</var>０</span></p>
                                                            </div>

                                                        </div>
                                                    </div><!--end pay-money -->
                                                </div><!--end wrap-pay-clean-->
                                                <div class="des-pay-clean">
                                                    <p class="text-des-clean">《安心保証サービスが適用班員》 10㎠未満の修復可能な汚れ（ファンデーションなどの衿汚れ、袖口の汚れ、汗ジミ、食べこぼしなど）</p>
                                                    <p class="text-des-clean">《安心保証サービスが適用されない場合》・レンタル商品を破損・紛失された場合・レンタル商品に広範囲又は修復困難な汚れがあった場合（たばこの焼け焦げ、油性汚れ、血液等の汚れなど）・レンタル商品に直接香水をかけられた場合</p>
                                                </div><!--end des-pay-clean-->

                                            </div>
                                        </div>
                                    </div><!--end wrap rent-->

                                    <div class="wrap-rent">
                                        <div class="wrap-rent-happiness flexbox">
                                            <div class="happiness-img">
                                                <div class="happiness-img-block">
                                                    <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/img-quality-2.jpg">
                                                    <span class="number-wrap-rent">03</span>
                                                </div>
                                            </div>
                                            <div class="happiness-content">
                                                <h3 class="text-title">着物のプロが多数在籍！</h3>
                                                <div class="text-des">
                                                    きものレンタルwargoには、長年、着物に携わっている着物のプロ“着物コンシェルジュ”が多数在籍しております！
                                                    <br>
                                                    お下見にご来店いただければ、実際のお着物を手に取って確かめていただきながら、コーディネイトも色々とお試
                                                    <br>
                                                    しいただけます。目的にあわせて、素敵に着こなせる、最適な一着をご提案いたしますので、ご安心ください。
                                                    <br>
                                                    その他、TPOにあわせたマナーやお着物の常識なども、何でもご相談ください。

                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-wrap-chart wrap-refund-kimono">
                                            <div class="padding-block-wrap-chart">
                                                <div class="note-title text-center text-color-yellow-copper">
                                                    着物のプロに相談できる！下見30分無料！
                                                </div>
                                                <div class="wrap-pay-clean flexbox">
                                                    <div class="pay-clean">
                                                        <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/intro-wargo.png">
                                                    </div><!--end pay-clean-->
                                                    <div class="intro-profile">
                                                        <div class="wrap-refund-intro">
                                                            <div class="intro-details">
                                                                <p>全店で2,000点以上あるお着物の中から、ご自身のサ イズやお好みにあったお着物を選びご試着いただけま す。</p>
                                                                <p>ベテランの着付師が、お客さまのご要望や目的に合わ せコーディネートを提案するので、初めてでも安心して いただけます。</p>
                                                                <div class="intro-note">
                                                                    ホームページやカタログに掲載していないお着物もございます。
                                                                    <br>
                                                                    帯や草履・バッグなどの小物も豊富な品揃えの中からお選びいただけます。
                                                                </div>
                                                                <div class="intro-text-special">
                                                                    ※30分経過後、30分ごとに1,000円（＋tax）をいただきます。ご了承ください。
                                                                </div>
                                                            </div>
                                                            <div class="wrap-btn-profile-refund flexbox">
                                                                <a class="linkto" href="/formal/preview">お下見ガイドを見てみる</a>
                                                            </div>
                                                        </div>
                                                    </div><!--end pay-money -->
                                                </div><!--end wrap-pay-clean-->
                                            </div>
                                        </div>
                                    </div><!--end wrap rent-->

                                    <div class="wrap-refund-system">
                                        <div class="wrap-title-refund-system">
                                                <h2 class="title">ご返金制度の内容について</h2>
                                        </div>
                                        <div class="wrap-rent des-refund-system">
                                            <h3 class="lg-text">ご返金制度について</h3>
                                            <p class="sm-text">きものレンタルwargoのサービスにご満足頂けなかった場合は、<span class="special-text">全額ご返金させて頂きます。</span><br>
                                                皆様にお着物を楽しんでいただけるよう、万が一ご満足頂けなかった場合には、お手数ではございますが、ご報告を頂けましたらご利用料金はご返金させて頂きます。<br>
                                                お客様にご満足頂けるよう、スタッフ一同努めて参りますので、引き続きのご愛顧賜りますよう、よろしくお願い申し上げます。</p>
                                        </div>
                                        <div class="box-pattern-refund-system">
                                            <div class="title-pattern"><h3 class="title">ご返金制度を適用させていただく条件</h3></div>
                                            <ul class="list-check-box">
                                                <li class="item-check-box flexbox">
                                                    <div class="wrap-icon">
                                                        <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/icon-checked.svg">
                                                    </div>
                                                    <div class="text-check-box">① ご予約いただいたお客様ご本人様であることが証明できること</div>
                                                </li>
                                                <li class="item-check-box flexbox">
                                                    <div class="wrap-icon">
                                                        <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/icon-checked.svg">
                                                    </div>
                                                    <div class="text-check-box">② ご着用(ご利用)後、2日以内のご申請であること</div>
                                                </li>
                                                <li class="item-check-box flexbox">
                                                    <div class="wrap-icon">
                                                        <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/icon-checked.svg">
                                                    </div>
                                                    <div class="text-check-box">③ ご満足いただけなかった明確な事由をご説明いただくこと</div>
                                                </li>
                                                <li class="item-check-box flexbox">
                                                    <div class="wrap-icon">
                                                        <img alt="" src="<?= WP_HOME; ?>/images/new-kimono-v2/refund-campaign/icon-checked.svg">
                                                    </div>
                                                    <div class="text-check-box">④ ご説明いただいた事由の内容真偽を、当店スタッフに確認できること</div>
                                                </li>
                                                <li class="item-check-box flexbox">
                                                    <div class="wrap-icon"></div>
                                                    <div class="text-check-box">※但し、ご成人式の「振袖レンタル」と、ご卒業式の「袴レンタル」には適用されません。予めご了承ください</div>
                                                </li>
                                            </ul>
                                        </div><!--end box-pattern-refund-system-->
                                    </div><!--end wrap-refund-system-->
                                    <div class="wrap-line-v2">
                                        <div class="line-v2 line-v2-single"></div>
                                    </div>

                                    <div class="wrap-confidence">
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
                                        </div><!--end wrap-title-v2-other-->
                                        <div class="wrap-content-confidence">
                                            <div class="des-confidence">
                                                <?php if($isSmartPhone) : ?>
                                                    <p class="text-confidence">きものレンタルwargoを運営する株式会社和心は</p>
                                                    <p class="text-confidence">呉服業界では珍しく、東証マザーズに上場し信頼の</p>
                                                    <p class="text-confidence">おける企業運営を行っています。</p>
                                                    <p class="text-confidence">着物レンタル以外にも、かんざし・帯留や和傘といっ</p>
                                                    <p class="text-confidence">た和装小物の専門店を多数運営しており</p>
                                                    <p class="text-confidence">日本全国で毎年大変多くの方にご利用いただいてい</p>
                                                    <p class="text-confidence">ます。</p>
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
                                        <div class="wrap-btn-refund flexbox">
                                            <a class="linkto" href="/formal">きものレンタルTOPページに戻る</a>
                                        </div>
                                    </div><!--end wrap-confidence-->

                                    <div class="box-intro-bottom">
                                        <h2 class="title-intro-bottom">きものレンタルwargoのご紹介</h2>
                                        <p class="des-intro-bottom">きものレンタルwargoは、京都・大阪・東京・金沢に全国11店舗を展開する、日本最大級の着物レンタルサービスです。着物の総在庫数は9,120着(2018年3月1日現在)、お客様に着物のレンタルを楽しんで頂けるよう、作家物、ブランド品、アンティークなど、豊富な種類のお着物をご用意しております。店舗でお着付けする着物レンタルの他、宅配での着物レンタルも取り扱っております。</p>
                                    </div>

                                </div><!--end row-campaign-->

                            </div><!--end right-column right-cate-list-v2-->

                        </div><!--end wrap-boths-column-->

                    </div><!--end left-column-content-->


                </div><!--end wrap-column-content-->
            </div><!--end container-box-->

        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->

</div><!-- end container -->
<?php get_footer('formal'); ?>
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

        // MINH
        if ($('.slider-ranking').length > 0) {
            $('.slider-ranking .list').not('.slick-initialized').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }]
            });
        }


        $('.wrap-slider-v2-furisode').each(function(i, val){
            $(val).find('.list').not('.slick-initialized').slick({
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: true,
                lazyLoad: 'ondemand',
                responsive: [{
                    breakpoint: 750,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
            });
        });

        // Slider ubugi
        $('.wrap-slider-product .list').not('.slick-initialized').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 4,
            arrows: true,
            lazyLoad: 'ondemand',
            responsive: [{
                breakpoint: 750,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }]
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
    })
</script>



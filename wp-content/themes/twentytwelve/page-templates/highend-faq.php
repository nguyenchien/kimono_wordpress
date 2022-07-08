<?php
/**
 * Template Name: High End FAQ
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
    wp_register_style('new-high-end-faq-sp', get_template_directory_uri() . '/css/new-high-end-faq-sp.css', array('twentytwelve-style'), '20220210');
    wp_enqueue_style('new-high-end-faq-sp');
} else{
    wp_register_style('new-high-end-faq-pc', get_template_directory_uri() . '/css/new-high-end-faq-pc.css', array('twentytwelve-style'), '20220210');
    wp_enqueue_style('new-high-end-faq-pc');
}
?>
<link rel="preload" href="/css/searchform.css?v=26062019" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="/css/searchform.css?v=26062019"></noscript>
<?php
wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
?>
<style>
    .lg-number{
        line-height: 2 !important;
    }
</style>
<?php if($isSmartPhone):?>
    <h2 class="title-hight-end-faq">
        <?php
        $title_high_end_faq_sp = get_field('title_high_end_faq_sp');
        if ($title_high_end_faq_sp) {
            echo do_shortcode(php_set_base_url($title_high_end_faq_sp));
        }
        ?>
    </h2>
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
                                            echo FormalSidebarLeftCodeNewStyle(array('type'=>'planlist'));
                                            echo FormalSidebarFilterCode(array('type'=>'planlist'));
                                        }else if($postName == 'list'){
                                            echo FormalSidebarFilterCode(array());
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="right-column right-column-list right-high-end-faq">
                                    <div class="padding-v2">
                                        <section class="wrap-high-end-faq">
                                            <div class="wrap-cate-high-end">
                                                <h2 class="title-cate-high-end">カテゴリー</h2>
                                                <ul class="list-cate-high-end flexbox">
                                                    <li class="item-cate-high-end">
                                                        <a href="#make-01">
                                                            <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-01-faq.svg">
                                                            <div class="sub-cate-high-ene">フォーマル着物</br>ご予約編</div>
                                                        </a>
                                                    </li>
                                                    <li class="item-cate-high-end sm">
                                                        <a href="#make-02">
                                                            <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-02-faq.svg">
                                                            <div class="sub-cate-high-ene">フォーマル着物</br>お下見ご予約編</div>
                                                        </a>
                                                    </li>
                                                    <li class="item-cate-high-end sm">
                                                        <a href="#make-04">
                                                            <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-03-faq.svg">
                                                            <div class="sub-cate-high-ene">きもの・着付け編</div>
                                                        </a>
                                                    </li>
                                                    <li class="item-cate-high-end lg">
                                                        <a href="#make-05">
                                                            <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-05-faq.svg">
                                                            <div class="sub-cate-high-ene">ヘアセット</br>メイク編</div>
                                                        </a>
                                                    </li>
                                                    <li class="item-cate-high-end sm center">
                                                        <a href="#make-03">
                                                            <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-04-faq.svg">
                                                            <div class="sub-cate-high-ene">宅配レンタル編</div>
                                                        </a>
                                                    </li>
                                                    <li class="item-cate-high-end sm last">
                                                        <a href="/faq/contactwp" target="_blank">
                                                            <img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-06-faq.svg">
                                                            <div class="sub-cate-high-ene">お問い合わせ</div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="wrap-des-high-end" id="make-01">
                                                <h2 class="title-high-end">フォーマル着物&emsp;ご予約編</h2>
												<ul class="list-hight-end">
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">キャンセルについて</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<div class="test-item-high-end">
																		<p>【上級来店着付け】</p>
																		<p>■振袖・袴・七五三のレンタルを含むご予約</p>
																		<p>[ご利用日]から30日前までのキャンセル ：無料</p>
																		<p>[ご利用日]から29日以内のキャンセル ：ご利用料金の100％</p>
																		<br/>
																		<p>■その他（訪問着等）のお着物のみのご予約</p>
																		<p>[ご利用日]から30日前までのキャンセル ：無料</p>
																		<p>[ご利用日]から29日～7日前までのキャンセル：ご利用料金の30％</p>
																		<p>[ご利用日]から6日以内のキャンセル ：ご利用料金の100％</p>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">仮予約はできますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>仮予約はできません。</p>
																	<p>お下見予約の際にお選びいただいたお日にちは、ご希望日の確認のために入力いただいております。</p>
																	<p>ご利用日の仮押さえでは御座いませんのでご注意ください。</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">予約カレンダーが×になっているところは予約できないですか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">申し訳ございません。そのお日にちは既に予約が埋まっておりますのでご予約いただけません。</div>
															</div>
														</div>
													</li>
													<!--                                                        <li class="item-high-end">-->
													<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">明日着たいのですが可能でしょうか？</div>-->
													<!--                                                                </div>-->
													<!--                                                                <div class="right-item-high-end">-->
													<!--                                                                    <span class="arrow-circle"></span>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                            <div class="wrap-item-high-end-des">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">-->
													<!--                                                                        フォーマル着物は前日のご予約は承っておりません。</br>-->
													<!--                                                                        ご予約は一週間前からご予約可能です。-->
													<!--                                                                    </div>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                        </li>-->
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">早朝の予約が入れれません</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	早朝のご予約はお下見の際に店頭でお申し付け頂くか
																	<a href="<?= WP_HOME ;?>/faq/contactwp">お問い合わせフォーム</a>にお問い合わせ下さい。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">同じ日にお下見とお着付は可能でしょうか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	お着付けの準備があるため、お下見とお着付けは同じ日に承っておりません。</br>
																	お下見はお着付の4日前までにお願いします。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">当日予約可能ですか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	冠婚葬祭用のお着物の即時ご予約は承っておりません。<br/>
																	ご予約は一週間前からご予約可能です。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">早朝は何時からやっていますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	早朝のお時間のご予約はご<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>にお問い合わせ下さい。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">早朝料金はいくらですか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	5時台は8,000円（税込8,800円）、6時台は6,000円（税込6,600円）、7時台は3,000円 <br/>
																	（税込3,300円）、8時台は2,000円（税込2,200円）、9時台は500円（税込550）でございます。<br/>
																	成人式の早朝料金は変わりますので、お気を付けください。<br/>
																	※5時～料金掲載しておりますが、店舗により対応できない場合がございます。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">予約後の日程変更はできますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	利用予定日から1年以内であれば、無料で日程変更が可能です。<br/>
																	変更後のお日にちが決定しましたら、予約時のお名前と予約番号をご確認のうえ、お問い合わせフォームもしくはメールにてご連絡お願い致します。
																	<p style="line-height:1.5;margin-top:15px;">問い合わせメール kyotokimonorental@wagokoro.co.jp</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">決済について</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>必ず事前に決済をして頂いております。</p>
																	<p>お下見時にお支払い下さい。</p><br/>
																	<p>webから予約される場合は、お申込画面よりお支払いください。</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">ご予約の流れ</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>お下見にご来店→着物を選んで成約→当日着付け　という流れになります。</p>
																	<a href="<?= WP_HOME; ?>/formal/preview">お下見予約はこちらから</a><br/>
																	<p>ご自宅まで着物をお届けする宅配レンタルも可能です。</p>
																	<p>お下見にご来店頂けない場合、webから着物を決めて頂きご予約をお取り下さい。</p>
																	<p>着物によってサイズが異なるため、必ずご自身のサイズに合う着物をお選び下さい。</p>
																	<p>早朝のお時間を希望される場合は、<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>よりご連絡下さい。</p>
																</div>
															</div>
														</div>
													</li>
												</ul>
                                                <div class="search-hight-end">
                                                    <a class="hight-end-s" href="/formal"> <img src="<?= WP_HOME ?>/images/icon-filter.svg">お着物を探す</a>
                                                </div>
                                            </div>
                                            <div class="wrap-des-high-end" id="make-02">
                                                <h2 class="title-high-end">フォーマル着物&emsp;お下見ご予約編</h2>
												<ul class="list-hight-end">
													<!--                                                        <li class="item-high-end">-->
													<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">土日祝日の午前中にお下見したいのですが予約ができません。</div>-->
													<!--                                                                </div>-->
													<!--                                                                <div class="right-item-high-end">-->
													<!--                                                                    <span class="arrow-circle"></span>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                            <div class="wrap-item-high-end-des">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">申し訳ございません。土日祝日のお下見は午後15時以降のご予約となっております。-->
													<!--                                                                    </div>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                        </li>-->
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">17時以降のお下見は可能ですか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">店舗の営業時間によりますので、お下見のご予約画面をご確認ください。</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">2名でお下見したいのですが、予約できますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>2名様のご予約も可能です。</p>
																	<p>お手数ですが、お下見のご予約は1名様ずつ（ご着用人数分）お取りください。</p>
																	<p>お付添の方の予約は不要です。</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">お下見はどのくらい時間がかかりますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>お1人様30分まで無料でお下見頂けます。</p>
																	<p>それ以降は成約にならなかった場合、30分ごとに1,000円（税込1,100円）頂いております。</p>
																	<p>＊ご成約いただけましたらお下見の料金は発生いたしません。</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">予約していなくても今日下見に行けますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">店舗が混雑している場合もございますので <br/>コールセンターへご連絡下さい。</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">見たい着物があるのですが、指定することはできますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>可能です。ご希望の商品名・型番を<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>までご連絡ください。</p>
																	<p>ご利用店舗の商品でない場合は移動料1000円（税込1100円）が発生します。</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">下見をした店舗でしか、当日の着付けも予約出来ないですか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>他店舗でも可能です。</p>
																	別途料金が発生するためお下見時に<a href="<?= WP_HOME; ?>/faq/contactwp"">お問い合わせフォーム</a>にてご相談ください。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">下見をキャンセルしたい</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	予約完了メールの【プランの詳細をwebで確認する】よりご予約のキャンセルをお願いいたします。
																</div>
															</div>
														</div>
													</li>
												</ul>
                                                <div class="search-hight-end">
                                                    <a class="hight-end-s" href="/formal/preview"><img src="<?= WP_HOME ?>/images/icon-filter.svg">下見の予約をする</a>
                                                </div>
                                            </div>
                                            <div class="wrap-des-high-end" id="make-03">
                                                <h2 class="title-high-end">宅配レンタル編</h2>
												<ul class="list-hight-end">
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">宅配予約を来店着付に/来店着付を宅配予約に変更可能でしょうか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">可能です。発送済みは変更できません。また、お着付けご希望日時に予約ができない場合もございますのでご了承ください。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">宅配レンタルは、自分で用意するべきものはありますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	体型補正用のタオルと髪飾りはご自身でご用意くださいませ。</br>
																	その他着付け小物等は一式そろっております。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">ご予約したお着物を変更したいのですが。</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>Q.予約したお着物を変更したいのですが。</p>
																	<p>コールセンター→お問い合わせフォーム</p>
																	<p>基本は変更できません。</p>
																	<p>ご都合により変更を希望される場合はご利用日の10日前までにご連絡をお願いします。</p>
																	<p>期日が近い場合は別途料金が発生する場合はございます。</p>
																	<p><a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>までご連絡ください。</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">配送先の変更はできますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">変更可能です。お問い合わせフォームからご連絡くださいませ。
																</div>
															</div>
														</div>
													</li>

													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">結婚式場のホテルに着物を送ってもらえますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">ご予約時、ご希望の配送先をご入力ください。</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">宅配の時間を指定出来ますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">時間指定も承っております。お手数ですが、
																	<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a> からご連絡くださいませ。</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">返却の送料は別途発生しますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>発生いたしません。同梱されている送り状でご返送くださいませ。</p>
																	<p>※同梱の送り状を使用されずに着払い等でお送り頂いた場合は、送料を別途請求させて頂きます。</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">宅配レンタルでもお下見できますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	宅配レンタルのお下見も承っております。</br>
																	お下見予約からご予約ください。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">天候が悪いのでお宮参りの日にちをずらしたいのですが、宅配の延長は出来ますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	お着物のご予約が空いてましたら可能です。延長料金は１泊2,000円（税込2,200円）です。
																	<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>よりご連絡下さい
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">着物と長襦袢のサイズがあっていないようなんですが。</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	wargoで取り扱いしている長襦袢は、既製の物を合わせております為、着物と長襦袢は若干サイズの誤差がございます。予めご了承ください。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">キャンセルについて</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>【上級宅配レンタル】</p>
																	<p>■振袖・袴・七五三のレンタルを含むご予約</p>
																	<p>[お届け日]から30日前までのキャンセル ：無料</p>
																	<p>[お届け日]から29日以内のキャンセル ：ご利用料金の100％</p><br/>
																	<p>■その他（訪問着等）のお着物のみのご予約</p>
																	<p>[お届け日]から29日～7日前までのキャンセル：ご利用料金の30％</p>
																	<p>[お届け日]から6日以内のキャンセル ：ご利用料金の100％</p>
																</div>
															</div>
														</div>
													</li>
												</ul>
                                                <div class="search-hight-end">
                                                    <a class="hight-end-s lg" href="/takuhai"><img src="<?= WP_HOME ?>/images/icon-filter.svg">宅配レンタルを予約する</a>
                                                </div>
                                            </div>
                                            <div class="wrap-des-high-end" id="make-04">
                                                <h2 class="title-high-end">着物着付け編</h2>
												<ul class="list-hight-end">
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">お下見に行けないのですが、電話でも予約出来ますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>事務手数料500円（税込550円）がかかります。</p>
																	<p>早朝ご予約の場合は発生しませんので、予めHPのカタログの中からお着物を選んで
																		<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a> へご連絡ください。</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">帯も選べますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>帯を含めコーディネートはお任せとなります。</p>
																	<p>お下見にてお選びいただく場合に限り、スタッフとご相談頂くことは出来ます。</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">帯などの小物のコーディネートはホームページ上の画像通りですか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">帯などの小物類は画像とは異なる場合がございます。ご了承ください。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">モーニングは取り扱っておりますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">申し訳ございません。弊社は和装のみ取り扱っております。
																</div>
															</div>
														</div>
													</li>
												</ul>
                                                <div class="search-hight-end">
                                                    <a class="hight-end-s" href="/formal"> <img src="<?= WP_HOME ?>/images/icon-filter.svg">お着物を探す</a>
                                                </div>
                                            </div>
                                            <div class="wrap-des-high-end" id="make-05">
                                                <h2 class="title-high-end">ヘアセット・メイク編</h2>
												<ul class="list-hight-end">
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">メイクはしてもらえますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>メイクは下記2店舗で承っております。</p>
																	<p>明治神宮北参道店・銀座本店</p>
																	<p>ご希望の日時によりお受けできない可能性がございます。</p>
																	<p>webから予約ができないため、<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>より問い合わせ下さい</p>
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">希望のイメージのヘアセットはしてもらえますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>フリースタイルヘアとして5,000円（税込5,500円）で提供しております。</p>
																	<p>当日予約は承っておりません。事前に<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>までお問い合わせくださいませ。</p>
																</div>
															</div>
														</div>
													</li>
													<!--                                                        <li class="item-high-end">-->
													<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">ウイッグを使っていますが、ヘアセットはしてもらえますか？</div>-->
													<!--                                                                </div>-->
													<!--                                                                <div class="right-item-high-end">-->
													<!--                                                                    <span class="arrow-circle"></span>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                            <div class="wrap-item-high-end-des">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">ご対応可能です。プレミアムヘア以上のプランはヘアアイロン使っておりますので予めウイッグの耐熱温度のご確認お願い致します。-->
													<!--                                                                    </div>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                        </li>-->
													<!--                                                        <li class="item-high-end">-->
													<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">無料ヘアとスタンダードヘアの違いを教えて下さい。</div>-->
													<!--                                                                </div>-->
													<!--                                                                <div class="right-item-high-end">-->
													<!--                                                                    <span class="arrow-circle"></span>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                            <div class="wrap-item-high-end-des">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">-->
													<!--                                                                        無料ヘアは、スプレー、ワックスなどを使わず</br>-->
													<!--                                                                        かんざし一本で出来るまとめ髪となっております。</br>-->
													<!--                                                                        スタンダードヘアは編み込みをしてかわいらしく仕上げるスタイルです。</br>-->
													<!--                                                                        <a class="link" href="/hairset">>>ヘアセットについてはこちら</a>-->
													<!--                                                                    </div>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                        </li>-->

													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">ヘアセットは何分かかりますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	無料ヘアセットは5~10分</br>
																	スタンダードヘアセットは10~15分</br>
																	プレミアムヘアセット・ハイエンドヘアセットは20~30分です。</br>
																	髪の長さなどにより個人差がございます。ご了承くださいませ。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">化粧直しのスペースはありますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	お化粧直しのスペースはございません。ご了承ください。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">ヘアアイロンなどは貸してもらえますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	ヘアアイロンなどのお貸し出しは行っておりません。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">髪飾りの持込は可能ですか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	可能です。ヘアセットの際スタッフへお声掛けください。
																</div>
															</div>
														</div>
													</li>
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">男性のヘアセットはしてますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	男性のヘアセットは行っておりません。
																</div>
															</div>
														</div>
													</li>
													<!--                                                        <li class="item-high-end">-->
													<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">ウィッグを持ち込んだらつけてくれますか？</div>-->
													<!--                                                                </div>-->
													<!--                                                                <div class="right-item-high-end">-->
													<!--                                                                    <span class="arrow-circle"></span>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                            <div class="wrap-item-high-end-des">-->
													<!--                                                                <div class="left-item-high-end flexbox">-->
													<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
													<!--                                                                    <div class="test-item-high-end">-->
													<!--                                                                        ポイントウィッグでしたらお付けしております。-->
													<!--                                                                    </div>-->
													<!--                                                                </div>-->
													<!--                                                            </div>-->
													<!--                                                        </li>-->
													<li class="item-high-end">
														<div class="wrap-item-high-end-title flexbox">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																<div class="test-item-high-end">訪問着の場合もヘアセットはついていますか？</div>
															</div>
															<div class="right-item-high-end">
																<span class="arrow-circle"></span>
															</div>
														</div>
														<div class="wrap-item-high-end-des">
															<div class="left-item-high-end flexbox">
																<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																<div class="test-item-high-end">
																	<p>冠婚葬祭のお着物でご利用はヘアセットオプションご利用をお勧めいたします。</p>
																	<a href="<?= WP_HOME; ?>/hairset">>>ヘアセットについてはこちら</a>
																</div>
															</div>
														</div>
													</li>
												</ul>
                                                <div class="search-hight-end">
                                                    <a class="hight-end-s" href="/formal"> <img src="<?= WP_HOME ?>/images/icon-filter.svg">お着物を探す</a>
                                                </div>
                                            </div>
                                            <div class="square-contact-aside">
												<div class="title-square-contact">お問い合わせ</div>
												<div class="des-square-contact">
													<p class="text"><a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a></p>
													<p class="time">(10:00 ～ 16:00)</p>
													<div class="info">
														<span class="txt">全国共通コールセンタ</span>
														<div class="phone">
															<span class="lg-number"><img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-phone-faq.png">03-4582-4864</span>
															<span>(10:00 - 16:00)</span>
														</div>
													</div>
												</div>
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
        <h2 class="title-hight-end-faq">
            <?php
            $title_high_end_faq_pc = get_field('title_high_end_faq_pc');
            if ($title_high_end_faq_pc) {
                echo do_shortcode(php_set_base_url($title_high_end_faq_pc));
            }
            ?>
        </h2>
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
                                <div class="right-column right-column-list right-high-end-faq">
                                    <div class="padding-v2">
                                        <section class="wrap-high-end-faq flexbox">
                                            <div class="right-lg-hight-end">
                                                <div class="wrap-des-high-end" id="makeup-01">
                                                    <h2 class="title-high-end">フォーマル着物&emsp;ご予約編</h2>
                                                    <ul class="list-hight-end">
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">キャンセルについて</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<div class="test-item-high-end">
																			<p>【上級来店着付け】</p>
																			<p>■振袖・袴・七五三のレンタルを含むご予約</p>
																			<p>[ご利用日]から30日前までのキャンセル ：無料</p>
																			<p>[ご利用日]から29日以内のキャンセル ：ご利用料金の100％</p>
																			<br/>
																			<p>■その他（訪問着等）のお着物のみのご予約</p>
																			<p>[ご利用日]から30日前までのキャンセル ：無料</p>
																			<p>[ご利用日]から29日～7日前までのキャンセル：ご利用料金の30％</p>
																			<p>[ご利用日]から6日以内のキャンセル ：ご利用料金の100％</p>
																		</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">仮予約はできますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>仮予約はできません。</p>
																		<p>お下見予約の際にお選びいただいたお日にちは、ご希望日の確認のために入力いただいております。</p>
																		<p>ご利用日の仮押さえでは御座いませんのでご注意ください。</p>
																	</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">予約カレンダーが×になっているところは予約できないですか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">申し訳ございません。そのお日にちは既に予約が埋まっておりますのでご予約いただけません。</div>
                                                                </div>
                                                            </div>
                                                        </li>
<!--                                                        <li class="item-high-end">-->
<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">明日着たいのですが可能でしょうか？</div>-->
<!--                                                                </div>-->
<!--                                                                <div class="right-item-high-end">-->
<!--                                                                    <span class="arrow-circle"></span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="wrap-item-high-end-des">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">-->
<!--                                                                        フォーマル着物は前日のご予約は承っておりません。</br>-->
<!--                                                                        ご予約は一週間前からご予約可能です。-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </li>-->
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">早朝の予約が入れれません</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		早朝のご予約はお下見の際に店頭でお申し付け頂くか
																		<a href="<?= WP_HOME ;?>/faq/contactwp">お問い合わせフォーム</a>にお問い合わせ下さい。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">同じ日にお下見とお着付は可能でしょうか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
                                                                        お着付けの準備があるため、お下見とお着付けは同じ日に承っておりません。</br>
                                                                        お下見はお着付の4日前までにお願いします。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">当日予約可能ですか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		冠婚葬祭用のお着物の即時ご予約は承っておりません。<br/>
																		ご予約は一週間前からご予約可能です。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">早朝は何時からやっていますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		早朝のお時間のご予約はご<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>にお問い合わせ下さい。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">早朝料金はいくらですか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		5時台は8,000円（税込8,800円）、6時台は6,000円（税込6,600円）、7時台は3,000円 <br/>
																		（税込3,300円）、8時台は2,000円（税込2,200円）、9時台は500円（税込550）でございます。<br/>
																		成人式の早朝料金は変わりますので、お気を付けください。<br/>
																		※5時～料金掲載しておりますが、店舗により対応できない場合がございます。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">予約後の日程変更はできますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		利用予定日から1年以内であれば、無料で日程変更が可能です。<br/>
																		変更後のお日にちが決定しましたら、予約時のお名前と予約番号をご確認のうえ、お問い合わせフォームもしくはメールにてご連絡お願い致します。
                                                                        <p style="line-height:1.5;margin-top:15px;">問い合わせメール kyotokimonorental@wagokoro.co.jp</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
														<li class="item-high-end">
															<div class="wrap-item-high-end-title flexbox">
																<div class="left-item-high-end flexbox">
																	<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																	<div class="test-item-high-end">決済について</div>
																</div>
																<div class="right-item-high-end">
																	<span class="arrow-circle"></span>
																</div>
															</div>
															<div class="wrap-item-high-end-des">
																<div class="left-item-high-end flexbox">
																	<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																	<div class="test-item-high-end">
																		<p>必ず事前に決済をして頂いております。</p>
																		<p>お下見時にお支払い下さい。</p><br/>
																		<p>webから予約される場合は、お申込画面よりお支払いください。</p>
																	</div>
																</div>
															</div>
														</li>
														<li class="item-high-end">
															<div class="wrap-item-high-end-title flexbox">
																<div class="left-item-high-end flexbox">
																	<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																	<div class="test-item-high-end">ご予約の流れ</div>
																</div>
																<div class="right-item-high-end">
																	<span class="arrow-circle"></span>
																</div>
															</div>
															<div class="wrap-item-high-end-des">
																<div class="left-item-high-end flexbox">
																	<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																	<div class="test-item-high-end">
																		<p>お下見にご来店→着物を選んで成約→当日着付け　という流れになります。</p>
																		<a href="<?= WP_HOME; ?>/formal/preview">お下見予約はこちらから</a><br/>
																		<p>ご自宅まで着物をお届けする宅配レンタルも可能です。</p>
																		<p>お下見にご来店頂けない場合、webから着物を決めて頂きご予約をお取り下さい。</p>
																		<p>着物によってサイズが異なるため、必ずご自身のサイズに合う着物をお選び下さい。</p>
																		<p>早朝のお時間を希望される場合は、<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>よりご連絡下さい。</p>
																	</div>
																</div>
															</div>
														</li>
                                                    </ul>
                                                    <div class="search-hight-end">
                                                        <a class="hight-end-s" href="/formal"> <img src="<?= WP_HOME ?>/images/icon-filter.svg">お着物を探す</a>
                                                    </div>
                                                </div>
                                                <div class="wrap-des-high-end" id="makeup-02">
                                                    <h2 class="title-high-end">フォーマル着物&emsp;お下見ご予約編</h2>
                                                    <ul class="list-hight-end">
<!--                                                        <li class="item-high-end">-->
<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">土日祝日の午前中にお下見したいのですが予約ができません。</div>-->
<!--                                                                </div>-->
<!--                                                                <div class="right-item-high-end">-->
<!--                                                                    <span class="arrow-circle"></span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="wrap-item-high-end-des">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">申し訳ございません。土日祝日のお下見は午後15時以降のご予約となっております。-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </li>-->
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">17時以降のお下見は可能ですか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">店舗の営業時間によりますので、お下見のご予約画面をご確認ください。</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">2名でお下見したいのですが、予約できますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>2名様のご予約も可能です。</p>
																		<p>お手数ですが、お下見のご予約は1名様ずつ（ご着用人数分）お取りください。</p>
																		<p>お付添の方の予約は不要です。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">お下見はどのくらい時間がかかりますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>お1人様30分まで無料でお下見頂けます。</p>
																		<p>それ以降は成約にならなかった場合、30分ごとに1,000円（税込1,100円）頂いております。</p>
																		<p>＊ご成約いただけましたらお下見の料金は発生いたしません。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">予約していなくても今日下見に行けますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">店舗が混雑している場合もございますので <br/>コールセンターへご連絡下さい。</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">見たい着物があるのですが、指定することはできますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>可能です。ご希望の商品名・型番を<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>までご連絡ください。</p>
																		<p>ご利用店舗の商品でない場合は移動料1000円（税込1100円）が発生します。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">下見をした店舗でしか、当日の着付けも予約出来ないですか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>他店舗でも可能です。</p>
																		別途料金が発生するためお下見時に<a href="<?= WP_HOME; ?>/faq/contactwp"">お問い合わせフォーム</a>にてご相談ください。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
														<li class="item-high-end">
															<div class="wrap-item-high-end-title flexbox">
																<div class="left-item-high-end flexbox">
																	<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																	<div class="test-item-high-end">下見をキャンセルしたい</div>
																</div>
																<div class="right-item-high-end">
																	<span class="arrow-circle"></span>
																</div>
															</div>
															<div class="wrap-item-high-end-des">
																<div class="left-item-high-end flexbox">
																	<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																	<div class="test-item-high-end">
																		予約完了メールの【プランの詳細をwebで確認する】よりご予約のキャンセルをお願いいたします。
																	</div>
																</div>
															</div>
														</li>
                                                    </ul>
                                                    <div class="search-hight-end">
                                                        <a class="hight-end-s" href="/formal/preview"><img src="<?= WP_HOME ?>/images/icon-filter.svg">下見の予約をする</a>
                                                    </div>
                                                </div>
                                                <div class="wrap-des-high-end" id="makeup-03">
                                                    <h2 class="title-high-end">宅配レンタル編</h2>
                                                    <ul class="list-hight-end">
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">宅配予約を来店着付に/来店着付を宅配予約に変更可能でしょうか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">可能です。発送済みは変更できません。また、お着付けご希望日時に予約ができない場合もございますのでご了承ください。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">宅配レンタルは、自分で用意するべきものはありますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
                                                                        体型補正用のタオルと髪飾りはご自身でご用意くださいませ。</br>
                                                                        その他着付け小物等は一式そろっております。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">ご予約したお着物を変更したいのですが。</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>Q.予約したお着物を変更したいのですが。</p>
																		<p>コールセンター→お問い合わせフォーム</p>
																		<p>基本は変更できません。</p>
																		<p>ご都合により変更を希望される場合はご利用日の10日前までにご連絡をお願いします。</p>
																		<p>期日が近い場合は別途料金が発生する場合はございます。</p>
																		<p><a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>までご連絡ください。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">配送先の変更はできますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">変更可能です。お問い合わせフォームからご連絡くださいませ。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">結婚式場のホテルに着物を送ってもらえますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">ご予約時、ご希望の配送先をご入力ください。</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">宅配の時間を指定出来ますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">時間指定も承っております。お手数ですが、
																		<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a> からご連絡くださいませ。</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">返却の送料は別途発生しますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>発生いたしません。同梱されている送り状でご返送くださいませ。</p>
																		<p>※同梱の送り状を使用されずに着払い等でお送り頂いた場合は、送料を別途請求させて頂きます。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">宅配レンタルでもお下見できますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
                                                                        宅配レンタルのお下見も承っております。</br>
                                                                        お下見予約からご予約ください。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">天候が悪いのでお宮参りの日にちをずらしたいのですが、宅配の延長は出来ますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		お着物のご予約が空いてましたら可能です。延長料金は１泊2,000円（税込2,200円）です。
																		<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>よりご連絡下さい
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">着物と長襦袢のサイズがあっていないようなんですが。</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
                                                                        wargoで取り扱いしている長襦袢は、既製の物を合わせております為、着物と長襦袢は若干サイズの誤差がございます。予めご了承ください。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
														<li class="item-high-end">
															<div class="wrap-item-high-end-title flexbox">
																<div class="left-item-high-end flexbox">
																	<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
																	<div class="test-item-high-end">キャンセルについて</div>
																</div>
																<div class="right-item-high-end">
																	<span class="arrow-circle"></span>
																</div>
															</div>
															<div class="wrap-item-high-end-des">
																<div class="left-item-high-end flexbox">
																	<img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
																	<div class="test-item-high-end">
																		<p>【上級宅配レンタル】</p>
																		<p>■振袖・袴・七五三のレンタルを含むご予約</p>
																		<p>[お届け日]から30日前までのキャンセル ：無料</p>
																		<p>[お届け日]から29日以内のキャンセル ：ご利用料金の100％</p><br/>
																		<p>■その他（訪問着等）のお着物のみのご予約</p>
																		<p>[お届け日]から29日～7日前までのキャンセル：ご利用料金の30％</p>
																		<p>[お届け日]から6日以内のキャンセル ：ご利用料金の100％</p>
																	</div>
																</div>
															</div>
														</li>
                                                    </ul>
                                                    <div class="search-hight-end">
                                                        <a class="hight-end-s lg" href="/takuhai"><img src="<?= WP_HOME ?>/images/icon-filter.svg">宅配レンタルを予約する</a>
                                                    </div>
                                                </div>
                                                <div class="wrap-des-high-end" id="makeup-04">
                                                    <h2 class="title-high-end">着物着付け編</h2>
                                                    <ul class="list-hight-end">
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">お下見に行けないのですが、電話でも予約出来ますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>事務手数料500円（税込550円）がかかります。</p>
																		<p>早朝ご予約の場合は発生しませんので、予めHPのカタログの中からお着物を選んで
																			<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a> へご連絡ください。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">帯も選べますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>帯を含めコーディネートはお任せとなります。</p>
																		<p>お下見にてお選びいただく場合に限り、スタッフとご相談頂くことは出来ます。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">帯などの小物のコーディネートはホームページ上の画像通りですか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">帯などの小物類は画像とは異なる場合がございます。ご了承ください。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">モーニングは取り扱っておりますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">申し訳ございません。弊社は和装のみ取り扱っております。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="search-hight-end">
                                                        <a class="hight-end-s" href="/formal"> <img src="<?= WP_HOME ?>/images/icon-filter.svg">お着物を探す</a>
                                                    </div>
                                                </div>
                                                <div class="wrap-des-high-end" id="makeup-05">
                                                    <h2 class="title-high-end">ヘアセット・メイク編</h2>
                                                    <ul class="list-hight-end">
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">メイクはしてもらえますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>メイクは下記2店舗で承っております。</p>
																		<p>明治神宮北参道店・銀座本店</p>
																		<p>ご希望の日時によりお受けできない可能性がございます。</p>
																		<p>webから予約ができないため、<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>より問い合わせ下さい</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">希望のイメージのヘアセットはしてもらえますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>フリースタイルヘアとして5,000円（税込5,500円）で提供しております。</p>
																		<p>当日予約は承っておりません。事前に<a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a>までお問い合わせくださいませ。</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
<!--                                                        <li class="item-high-end">-->
<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">ウイッグを使っていますが、ヘアセットはしてもらえますか？</div>-->
<!--                                                                </div>-->
<!--                                                                <div class="right-item-high-end">-->
<!--                                                                    <span class="arrow-circle"></span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="wrap-item-high-end-des">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">ご対応可能です。プレミアムヘア以上のプランはヘアアイロン使っておりますので予めウイッグの耐熱温度のご確認お願い致します。-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </li>-->
<!--                                                        <li class="item-high-end">-->
<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">無料ヘアとスタンダードヘアの違いを教えて下さい。</div>-->
<!--                                                                </div>-->
<!--                                                                <div class="right-item-high-end">-->
<!--                                                                    <span class="arrow-circle"></span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="wrap-item-high-end-des">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">-->
<!--                                                                        無料ヘアは、スプレー、ワックスなどを使わず</br>-->
<!--                                                                        かんざし一本で出来るまとめ髪となっております。</br>-->
<!--                                                                        スタンダードヘアは編み込みをしてかわいらしく仕上げるスタイルです。</br>-->
<!--                                                                        <a class="link" href="/hairset">>>ヘアセットについてはこちら</a>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </li>-->

                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">ヘアセットは何分かかりますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
                                                                        無料ヘアセットは5~10分</br>
                                                                        スタンダードヘアセットは10~15分</br>
                                                                        プレミアムヘアセット・ハイエンドヘアセットは20~30分です。</br>
                                                                        髪の長さなどにより個人差がございます。ご了承くださいませ。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">化粧直しのスペースはありますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
                                                                        お化粧直しのスペースはございません。ご了承ください。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">ヘアアイロンなどは貸してもらえますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
                                                                        ヘアアイロンなどのお貸し出しは行っておりません。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">髪飾りの持込は可能ですか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
                                                                        可能です。ヘアセットの際スタッフへお声掛けください。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">男性のヘアセットはしてますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
                                                                        男性のヘアセットは行っておりません。
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
<!--                                                        <li class="item-high-end">-->
<!--                                                            <div class="wrap-item-high-end-title flexbox">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-q-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">ウィッグを持ち込んだらつけてくれますか？</div>-->
<!--                                                                </div>-->
<!--                                                                <div class="right-item-high-end">-->
<!--                                                                    <span class="arrow-circle"></span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="wrap-item-high-end-des">-->
<!--                                                                <div class="left-item-high-end flexbox">-->
<!--                                                                    <img src="--><?//= WP_HOME ?><!--/images/new-kimono-v3/word-a-faq.svg">-->
<!--                                                                    <div class="test-item-high-end">-->
<!--                                                                        ポイントウィッグでしたらお付けしております。-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </li>-->
                                                        <li class="item-high-end">
                                                            <div class="wrap-item-high-end-title flexbox">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-q-faq.svg">
                                                                    <div class="test-item-high-end">訪問着の場合もヘアセットはついていますか？</div>
                                                                </div>
                                                                <div class="right-item-high-end">
                                                                    <span class="arrow-circle"></span>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-item-high-end-des">
                                                                <div class="left-item-high-end flexbox">
                                                                    <img src="<?= WP_HOME ?>/images/new-kimono-v3/word-a-faq.svg">
                                                                    <div class="test-item-high-end">
																		<p>冠婚葬祭のお着物でご利用はヘアセットオプションご利用をお勧めいたします。</p>
																		<a href="<?= WP_HOME; ?>/hairset">>>ヘアセットについてはこちら</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="search-hight-end">
                                                        <a class="hight-end-s" href="/formal"> <img src="<?= WP_HOME ?>/images/icon-filter.svg">お着物を探す</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right-sm-hight-end">
                                               <ul class="list-hight-end-aside">
                                                   <li class="item-hight-end-aside flexbox">
                                                       <div class="title-sub-aside main">カテゴリー</div>
                                                   </li>
                                                   <li class="item-hight-end-aside flexbox">
                                                       <a href="#makeup-01">
                                                           <div class="title-sub-aside">フォーマル着物　ご予約編</div>
                                                           <span class="arrow"></span>
                                                       </a>
                                                   </li>
                                                   <li class="item-hight-end-aside flexbox">
                                                       <a href="#makeup-02">
                                                           <div class="title-sub-aside">フォーマル着物　お下見編</div>
                                                           <span class="arrow"></span>
                                                       </a>
                                                   </li>
                                                   <li class="item-hight-end-aside flexbox">
                                                       <a href="#makeup-03">
                                                           <div class="title-sub-aside">宅配レンタル編</div>
                                                           <span class="arrow"></span>
                                                       </a>
                                                   </li>
                                                   <li class="item-hight-end-aside flexbox">
                                                       <a href="#makeup-04">
                                                           <div class="title-sub-aside">きもの・着付け編</div>
                                                           <span class="arrow"></span>
                                                       </a>
                                                   </li>
                                                   <li class="item-hight-end-aside flexbox">
                                                       <a href="#makeup-05">
                                                           <div class="title-sub-aside">ヘアセット・メイク編</div>
                                                           <span class="arrow"></span>
                                                       </a>
                                                   </li>
                                                   <li class="item-hight-end-aside flexbox">
                                                       <a href="/faq/contactwp">
                                                           <div class="title-sub-aside">お問い合わせ</div>
                                                           <span class="arrow"></span>
                                                       </a>
                                                   </li>
                                               </ul>
                                                <div class="square-contact-aside">
                                                    <div class="title-square-contact">お問い合わせ</div>
                                                    <div class="des-square-contact">
                                                        <p class="text"><a href="<?= WP_HOME; ?>/faq/contactwp">お問い合わせフォーム</a></p>
                                                        <p class="time">(10:00 ～ 16:00)</p>
														<div class="info">
															<span class="txt">全国共通コールセンタ</span>
															<div class="phone">
																<span class="lg-number"><img src="<?= WP_HOME ?>/images/new-kimono-v3/icon-phone-faq.png">03-4582-4864</span>
																<span>(10:00 - 16:00)</span>
															</div>
														</div>
													</div>
                                                </div>
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

<?php endif; ?>

<?php get_footer('formal'); ?>
<style>
    *{
        min-height: 0;
        min-width: 0;
    }
</style>
<script>
    $(document).ready(function(){
        $(".wrap-item-high-end-title").click(function(){
            $(this).siblings('.wrap-item-high-end-des').slideToggle();
            $(this).find('.arrow-circle').toggleClass('active');
        });
    })
</script>



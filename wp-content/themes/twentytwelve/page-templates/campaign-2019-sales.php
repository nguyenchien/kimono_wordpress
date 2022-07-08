<?php
/**
 * Template Name: Campaign 2019 Sales
 */
global $isSmartPhone, $language;
$lang = Yii::app()->language;
$language = Yii::app()->language;
get_header('new-kimono');
if ($isSmartPhone) {
    wp_register_style('style-campaign-2019-sales-sp', get_template_directory_uri() . '/css/campaign-2019-sales-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('style-campaign-2019-sales-sp');
}
else{
    wp_register_style('style-campaign-2019-sales-pc', get_template_directory_uri() . '/css/campaign-2019-sales-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('style-campaign-2019-sales-pc');
// Detect IE
    $ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
    if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0') !== false && strpos($ua, 'rv:11.0') !== false)) {
        wp_register_style('style-campaign-2019-sales-ie', get_template_directory_uri() . '/css/campaign-2019-sales-ie.css', array('twentytwelve-style'));
        wp_enqueue_style('style-campaign-2019-sales-ie');
    }
}
?>
<div class="container-box clearfix">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-formal breadcrumbs-new-kimono">', '</div>');
    }
    ?>

    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="left-column left-column-new-kimono hidden-sidebar">
                                <?php get_sidebar('top-page-left') ?>
                            </div>

                            <div class="right-column right-column-list right-column-list-new-kimono campaign-2019-sales">
                                <div class="wrap-banner">
                                    <?php if($isSmartPhone):?>
                                        <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/banner-campaign-sales-sp<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', '100万円プレゼントキャンペーン')?>">
                                    <?php else:?>
                                        <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/banner-campaign-sales-pc<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', '100万円プレゼントキャンペーン')?>">
                                    <?php endif ?>
                                </div>

                                <div class="wrap-bg-current">
                                    <h1 class="title-cp-sales padding-row">
                                        <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/title-top-cp<?php echo ($lang == 'ja') ? "" : "-$lang"?>.svg" alt="<?= Yii::t('campaign-sale-2019', '売上１億円＆上場１周年!!１００万円プレゼントキャンペーン')?>">
                                    </h1>
                                    <div class="line-cp-title">
                                        <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/line-cp-title.svg" alt="">
                                    </div>
                                    <div class="wrap-info-current padding-row">
                                        <p><?= Yii::t('campaign-sale-2019', 'この度、きものレンタルwargoは、2019年3月の月間売上が1億円を突破いたしました！<br>また、きものレンタルwargoを運営する株式会社和心は、昨年2018年3月29日に東京証券取引所マザーズ市場に上場し、<br>上場から一周年を迎えることができました！<br>これもひとえに、皆さまのご愛顧による賜物でありますの。感謝の気持ちを込めて<br><b>「１００万円プレゼントキャンペーン」</b>を実施させていただきます。')?></p>
                                    </div>
                                </div><!--end wrap-bg-current-->

                                <div class="wrap-bg-pattern">
                                    <div class="wrap-section-cp">
                                        <h2 class="sub-title-cp">
                                            <?php if($isSmartPhone):?>
                                                <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/sub-title-cp-01-sp<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', 'キャンペーン詳細')?>">
                                            <?php else:?>
                                                <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/sub-title-cp-01-pc<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', 'キャンペーン詳細')?>">
                                            <?php endif ?>
                                        </h2>
                                        <div class="wrap-content-cp-sale wrap-content-cp-sale-girl padding-row">
                                            <div class="info-cp-sale">
                                                <p>●<?= Yii::t('campaign-sale-2019', 'キャンペーン期間：')?></p>
                                                <p class="bold-lg"><?= Yii::t('campaign-sale-2019', '4/6(土)～4/26(金)')?></p>
                                                <p>●<?= Yii::t('campaign-sale-2019', 'キャンペーン内容：')?></p>
                                                <p><?= Yii::t('campaign-sale-2019', '期間中にきものレンタルwargoのHPから着物レンタルをご予約いただいたお客様から、抽選で100名様に<b>「10,000円分無料クーポン」をご提供いたします</b>。')?></p>
                                                <p class="sm-text-cp"><?= Yii::t('campaign-sale-2019', '※当選された方には、メールでクーポンコードをお送りいたします')?></p>
                                                <p class="sm-text-cp">&nbsp;<?= Yii::t('campaign-sale-2019', '&nbsp;（ご予約時にご登録されたメールアドレス宛てにお送りいたします）')?></p>
                                                <p class="sm-text-cp"><?= Yii::t('campaign-sale-2019', '※抽選結果は、発送結果をもっての発表とさせていただきます。')?></p>
                                                <p class="sm-text-cp"><?= Yii::t('campaign-sale-2019', '※10,000円無料クーポンは、きものレンタルwargoのHPからご予約いただく際にご利用が可能です。')?></p>
                                                <p class="sm-text-cp"><?= Yii::t('campaign-sale-2019', '※予約登録時刻が「2019年4月6日 00:00:00〜2019年4月26日 23:59:59まで」のお客様が対象となります。')?></p>
                                                <p class="sm-text-cp"><?= Yii::t('campaign-sale-2019', '&nbsp;&nbsp;&nbsp;また、ご予約をキャンセルされたお客様は抽選対象外となります。予めご了承ください。')?></p>
                                            </div><!--end info-cp-sale-->
                                            <div class="wrap-img-girl">
                                                <?php if (!$isSmartPhone):?>
                                                    <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/girl-cp-sale.png" alt="">
                                                <?php endif; ?>
                                            </div><!--end wrap-img-girl-->
                                        </div><!--end wrap-content-cp-sale-->
                                    </div><!--end wrap-section-cp-->

                                    <div class="wrap-section-cp">
                                        <h2 class="sub-title-cp">
                                            <?php if($isSmartPhone):?>
                                                <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/sub-title-cp-02-sp<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', '対象となる着物レンタルプラン')?>">
                                            <?php else:?>
                                                <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/sub-title-cp-02-pc<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', '対象となる着物レンタルプラン')?>">
                                            <?php endif ?>
                                        </h2>
                                        <div class="wrap-content-cp-sale padding-row">
                                            <div class="info-cp-sale">
                                                <h3 class="sm-title tt-blue-color"><p><?= Yii::t('campaign-sale-2019', '観光着物レンタルプラン全て')?></p></h3>
                                                <p><?= Yii::t('campaign-sale-2019', '観光用の着物レンタルプランをご予約いただいたお客様全員、抽選対象となります↓以下ボタンをクリックして、観光用の着物レンタルプランをご選択いただき、ご予約ください。')?></p>
                                                <div class="banner-cp-sale">
                                                    <a href="<?php echo home_url()?>/kimono"><img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/banner-cp-01<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', '観光用着物')?>"></a>
                                                </div>
                                                <h3 class="sm-title tt-red-color"><p><?= Yii::t('campaign-sale-2019', '冠婚葬祭用フォーマル着物レンタルプラン全て')?></p></h3>
                                                <p><?= Yii::t('campaign-sale-2019', '「訪問着」や「留袖」のほか、「振袖」などの冠婚葬祭用フォーマルお着物のレンタルをご予約いただいたお客様も全員、抽選対象となります。↓以下ボタンをクリックして、フォーマル着物をご選択いただき、ご予約ください')?></p>
                                                <div class="banner-cp-sale">
                                                    <a href="<?php echo WP_HOME; ?>/formal"><img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/banner-cp-02<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', 'フォーマル着物')?>"></a>
                                                </div>
                                                <h3 class="sm-title tt-gold-color"><p><?= Yii::t('campaign-sale-2019', '宅配レンタルプラン全て')?></p></h3>
                                                <p><?= Yii::t('campaign-sale-2019', '店頭でのお着物レンタルではなく、宅配による着物レンタルプランをご予約いただいたお客様についても抽選対象となります。（宅配レンタルプランには、観光用のお着物はお取り扱いしておりません）↓以下ボタンをクリックして、宅配レンタルされたいお着物をご選択いただき、ご予約ください')?></p>
                                                <div class="banner-cp-sale">
                                                    <a href="<?php echo WP_HOME; ?>/takuhai"><img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/banner-cp-03<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', '宅配レンタル')?>"></a>
                                                </div>
                                            </div><!--end info-cp-sale-->


                                        </div><!--end wrap-content-cp-sale-->
                                    </div><!--end wrap-section-cp-->

                                    <div class="wrap-cp-number">
                                        <div class="title-ct-number"><?= Yii::t('campaign-sale-2019', 'キャンペーンのお問い合わせはお電話で')?></div>
                                        <div class="wrap-info-ct-num flexbox align-items-center">
                                            <div class="icon-call">
                                                <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/icon-call.svg" alt="">
                                            </div>
                                            <div class="info-call">
                                                <p class="call-num"><?= Yii::t('campaign-sale-2019', '075-600-2830')?></p>
                                                <p class="text-call"><?= Yii::t('campaign-sale-2019', '全国共通コールセンター（9:00 ～19:00）')?></p>
                                            </div>
                                        </div>
                                    </div><!--end wrap-cp-number-->

                                    <?php if (!$isSmartPhone):?>
                                        <div class="wrap-banner-bt-cp">
                                            <img src="<?php echo WP_HOME; ?>/images/campaign-2019-sales/banner-bt-cp<?php echo ($lang == 'ja') ? "" : "-$lang"?>.jpg" alt="<?= Yii::t('campaign-sale-2019', '100万円プレゼントキャンペーン')?>">
                                        </div>
                                    <?php endif; ?>

                                    <div id="btn-to-top-cp" class="wrap-btn-top-cp">
                                        <p><?= Yii::t('campaign-sale-2019', 'TOP ページに戻る')?></p>
                                    </div>

                                    <?php if (!$isSmartPhone):?>
                                        <div class="intro-top-general intro-top-general-howto">
                                            <h3 class="title-intro-top"><?= Yii::t('campaign-sale-2019', 'キモノで観光 きものレンタル wargo のご紹介')?></h3>
                                            <div class="content-intro-top content-intro-top-howto">
                                                <p class="intro-text"><?= Yii::t('campaign-sale-2019', '観光、ショッピングに便利な好立地！！関東関西・北陸に全19店舗を展開している京都きものレンタルwargが”着物で散策”、そんな夢2900円で叶います！和小物のショップを展開する当社だからこそできる圧倒的低価格。もちろん品質は一流、プロの着付けまでがセットでこの価格です！')?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div><!--end wrap-bg-pattern-->

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

<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-to-top-cp').click(function() {
            $('body,html').animate({scrollTop:0},800);
        });
    });
</script>


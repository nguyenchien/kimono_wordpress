<?php
/**
 * Template Name: Luggage Service
 * Links: /luggage-service, ...
 */
global $isSmartPhone;
get_header('luggage-service');

//wp_register_style('new-kimono-plan-list-style', get_template_directory_uri() . '/css/new-kimono-plan-list.css', array('twentytwelve-style'));
//wp_enqueue_style('new-kimono-plan-list-style');
wp_register_style('new-style', get_template_directory_uri() . '/css/new-style.css');
wp_enqueue_style('new-style');
wp_register_style('new-formal-popup', get_template_directory_uri() . '/css/new-formal-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-popup');
wp_register_style('new-kimono-popup', get_template_directory_uri() . '/css/new-kimono-popup.css', array('twentytwelve-style'));
wp_enqueue_style('new-kimono-popup');
wp_register_style('new-formal-product-cart', get_template_directory_uri() . '/css/new-formal-product-cart.css');
wp_enqueue_style('new-formal-product-cart');
wp_register_style('new-kimono-reserve-cart', get_template_directory_uri() . '/css/new-kimono-reserve-cart.css');
wp_enqueue_style('new-kimono-reserve-cart');
//wp_enqueue_script('new-formal-product-booking-script', get_template_directory_uri() . '/js/new-formal-product-booking.js', array('jquery'));
//wp_enqueue_script('new-formal-rental-script', get_template_directory_uri() . '/js/new-formal-rental.js', array('jquery'));
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css');
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css');
wp_enqueue_style('new-formal-rental-style');
wp_register_style('new-top-page-kimono-style', get_template_directory_uri() . '/css/new-top-page-kimono.css', '201805160921');
wp_enqueue_style('new-top-page-kimono-style');

if ($isSmartPhone) {
    wp_register_style('style-luggage-service-sp', get_template_directory_uri() . '/css/luggage-service-sp.css?ver=20200915');
    wp_enqueue_style('style-luggage-service-sp');
}
else{
    wp_register_style('style-luggage-service-pc', get_template_directory_uri() . '/css/luggage-service-pc.css?ver=20200915');
    wp_enqueue_style('style-luggage-service-pc');
// Detect IE
    $ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
    if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0') !== false && strpos($ua, 'rv:11.0') !== false)) {
        wp_register_style('style-luggage-service-ie', get_template_directory_uri() . '/css/luggage-service-ie.css', array('twentytwelve-style'));
        wp_enqueue_style('style-luggage-service-ie');
    }
}
?>
<style>
    .wrap-choose-sl-wg .wraper-sl .sl-choose-people {
        width: 75%;
    }
</style>
<div class="wrap-luggage-service">
    <div class="wrap-banner-lug">
        <div class="container-box">
            <div class="row row-fluid">
                <div class="wrap-banner-big">
                    <h1>
                        <?php if($isSmartPhone):?>
                            <img src="<?php echo WP_HOME; ?>/images/luggage-service/banner-lugg-sp.jpg" alt="荷物預かりサービス">
                        <?php else:?>
                            <img src="<?php echo WP_HOME; ?>/images/luggage-service/banner-lugg-pc.jpg" alt="荷物預かりサービス">
                        <?php endif ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div id="id-des-lug" class="wrap-des-lug-general">
        <div class="container-box">
            <div class="row">
                <div class="wrap-des-lug">
                    <div class="wrap-banner-small align-items-center"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/banner-lugg-small.jpg" alt=""> </div>
                    <?php if ($isSmartPhone):?>
                        <h2 class="title-lug align-items-center">手ぶらで観光<small>しよう！</small></h2>
                    <?php endif;?>
                    <div class="des-lug"> お荷物をwargoに預けて手ぶらで観光をお楽しみください！寺社仏閣など、観光はスーツケースやお手荷物があると大変ですよね。<br>写真を撮ったり、御参りをしたり、食べ歩きをしたり！せっかく訪れた街を、より一層お楽しみ頂くために、wargoではお荷物のお預かり・配送のサービスを提供しております！是非、ご活用頂き楽しい時間をお楽しみください！ </div>
                </div>
            </div>
        </div>
    </div>
    <div id="id-about-wargo" class="wrap-about-wargo text-align-center">
        <div class="container-box">
            <div class="row">
                <h2 class="title-about-wargo align-items-center">wargoについて</h2>
                <div class="des-about-wargo align-items-center">
                    <p>きものレンタルwargoは観光きものレンタルで最大級！</p>
                    <p>好立地とお着物の豊富なラインナップで多くのお客様にご利用頂いております。</p>
                </div>
            </div>
            <div class="wrap-content">
                <div class="content-about-wargo content-house flexbox">
                    <div class="box-icon"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-house.png" alt=""> </div>
                    <div class="box-content">
                        <div class="title-box-content">全国主要観光地</div>
                        <div class="des-box-content">お荷物をお預かりする、「きものレンタルwargo」は浅草、鎌倉、京都、太宰府、金沢、仙台、札幌など全国の観光地にお店があり、主要交通機関からのアクセスも良好です！</div>
                    </div>
                </div>
                <div class="content-about-wargo content-hotel flexbox">
                    <div class="box-icon"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-hotel.png" alt=""> </div>
                    <div class="box-content">
                        <div class="title-box-content">ホテルとの連携</div>
                        <div class="des-box-content">お店への返却が不要な「ホテル返却」や、お手荷物をご指定のホテルまで配送するキャリーサービスもご用意しました。</div>
                    </div>
                </div>
                <div class="content-about-wargo content-transport flexbox">
                    <div class="box-icon"><img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-transport-circle.png" alt=""></div>
                    <div class="box-content box-content-other">
                        <?php if (!$isSmartPhone):?>
                            <div class="icon-lugg-pc"><img class="img-lugg-pc" src="<?php echo WP_HOME; ?>/images/luggage-service/icon-lugg-circle.png" alt=""></div>
                        <?php endif; ?>
                        <div class="title-box-content">キャリーサービス</div>
                        <div class="des-box-content">wargoでお預かりしたお荷物を、主要公共交通機関やホテルにお届け致します。お時間は詳細に指定できかねますが、お店に取りに戻ってくることなく、快適な旅行に！</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="id-offer-service" class="wrap-offer-service">
        <div class="container-box">
            <div class="row">
                <div class="box-offer-service">
                    <h3 class="title-offer-service">wargo提供サービス</h3>
                    <ul class="list-offer-service align-items-center text-align-center">
                        <li class="item-offer-service">
                            <a href="#wrap-detail-service-01">
                                <div class="icon-offer-service"><img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-lugg.png" alt=""></div>
                                <div class="text-offer-service">お荷物を預けたい</div>
                            </a>
                        </li>
                        <li class="item-offer-service">
                            <a href="#wrap-detail-service-02">
                                <div class="icon-offer-service"><img class="two-icon" src="<?php echo WP_HOME; ?>/images/luggage-service/icon-dress-lugg.png" alt=""></div>
                                <div class="text-offer-service">着物のレンタルと 荷物預けたい</div>
                            </a>
                        </li>
                        <li class="item-offer-service">
                            <a href="#wrap-detail-service-03">
                                <div class="icon-offer-service"><img class="two-icon" src="<?php echo WP_HOME; ?>/images/luggage-service/icon-transport.png" alt=""></div>
                                <div class="text-offer-service">着物のレンタルと 荷物預けたい</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap-new-plan-list">
        <?php
        $planTypeId = 1;
        $modelPlanType = LuggagePlanType::getPlanByPk($planTypeId);
        $plan_type_name = $modelPlanType->plan_type_name
        ?>
        <div id="wrap-detail-service-01" class="wrap-detail-service wrap-detail-service-01 list-plan-filter" data-plan-name="<?php echo $plan_type_name ?>">
            <div class="container-box">
                <div class="row">
                    <div class="box-detail-service">
                        <div class="content-detail-service">
                            <div class="wrap-title-detail-service wrap-title-service-01">
                                <div class="sm-title-detail-service">スーツケースはもちろん、ベビーカーやスポーツ用品も！</div>
                                <h3 class="title-detail-service">お荷物を預けたい</h3>
                            </div>
                            <?php if($isSmartPhone):?>
                                <div class="wrap-img-detail-service wrap-img-service-01 flexbox justify-content-between">
                                    <div class="wrap-img-service-big-01"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-01-lg.jpg" alt=""> </div>
                                    <div class="wrap-img-service-sm-01 flexbox justify-content-between"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-01-sm-01.jpg" alt=""> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-01-sm-02.jpg" alt=""> </div>
                                </div>
                            <?php endif;?>
                            <div class="wrap-des-detail-service">
                                <div class="box-des-detail-service">
                                    <p>お着物のレンタルをご利用では無いお客様も大歓迎！</p>
                                    <p>出張やスポーツの大会で来たけど、観光を少し楽しみたい！とい</p>
                                    <p>うお客様のお荷物も、wargoにお任せください。</p>
                                </div>
                                <?php if (!$isSmartPhone):?>
                                    <div class="price-des-detail-service flexbox justify-content-between">
                                        <div class="price">￥500<small>（税抜) /1個口あたり）</small></div>
                                        <div class="icon-price"><img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-lugg-yellow.png" alt=""></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!$isSmartPhone):?>
                            <div class="wrap-img-detail-service wrap-img-service-01 flexbox justify-content-between">
                                <div class="wrap-img-service-big-01"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-01-lg.jpg" alt=""> </div>
                                <div class="wrap-img-service-sm-01 flexbox justify-content-between"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-01-sm-01.jpg" alt=""> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-01-sm-02.jpg" alt=""> </div>
                            </div>
                        <?php endif; ?>
                        <?php if($isSmartPhone):?>
                            <div class="price-des-detail-service flexbox justify-content-between">
                                <div class="price">￥500<small>（税抜) /1個口あたり）</small></div>
                                <div class="icon-price"><img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-lugg-yellow.png" alt=""></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($isSmartPhone):?>
                        <div class="button-detail-service button-available button-gray button-gray-click">ご利用可能店舗</div>
                    <?php else: ?>
                        <div class="title-list-detail-service"> <span>ご利用可能店舗</span> </div>
                    <?php endif; ?>
                    <ul class="list-detail-service">
                        <li class="item-detail-service">
                            <p class="area">[京都エリア]</p>
                            <p>京都タワー店</p>
                        </li>
                        <li class="item-detail-service">
                            <p class="area">[大阪エリア]</p>
                            <p>大阪心斎橋店</p>
                        </li>
                        <li class="item-detail-service">
                            <p class="area">[東京エリア]</p>
                            <p>東京スカイツリー店、</p>
                            <p>銀座店</p>
                        </li>
                        <li class="item-detail-service">
                            <p class="area">[北陸エリア]</p>
                            <p>金沢香林坊店</p>
                        </li>
                    </ul>
                    <div class="wrap-button-detail-service custom-btn-reserve">
                        <!--  <div class="button-detail-service button-reserve button-purple"> <a href="#">予約する</a> </div>-->
                        <div class="wrap-choose-sl-wg flexbox">
                            <div class="wraper-sl flexbox">
                                <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                    <div class="wraper-sl-choose-pepple flexbox">
                                        <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?php echo $planTypeId; ?>">
                                            <?php
                                            for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) { ?>
                                                <option value="<?=$iloop?>"><?= $iloop?></option>
                                            <?php }?>
                                        </select>
                                        <div class="name-sl-people flexbox align-self-end"> 個口</div>
                                    </div>
                                </div>
                            </div>
                            <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wrap-detail-service-02" class="wrap-detail-service wrap-detail-service-02 list-plan-filter">
            <div class="container-box">
                <div class="row">
                    <div class="box-detail-service">
                        <div class="content-detail-service">
                            <div class="wrap-title-detail-service wrap-title-service-02">
                                <div class="sm-title-detail-service">お荷物のお預かりが１つ無料！</div>
                                <h3 class="title-detail-service">着物のレンタルと<br>荷物を預けたい</h3>
                            </div>
                            <?php if ($isSmartPhone):?>
                                <div class="wrap-img-detail-service wrap-img-service-02">
                                    <div class="wrap-img-service-big-02"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-02-lg.jpg" alt=""> </div>
                                    <div class="wrap-img-service-sm-02 flexbox justify-content-between align-items-center">
                                        <div class="box-img-service-sm"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-02-sm-01.jpg" alt=""> </div>
                                        <div class="box-img-service-sm"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-02-sm-02.jpg" alt=""> </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="wrap-des-detail-service">
                                <div class="box-des-detail-service"> wargoでご用意している大型バッグ40cm x 25cm x 47cm袋に詰めて頂いた分は無料でお預かりします！入りきらなかった分は追加の袋が500円、スーツケースやベビーカーもサイズ関係なくお一つ500円でお預かり致します！ </div>
                                <div class="price-des-detail-service flexbox justify-content-between">
                                    <div class="price">¥500-<small>（税抜）</small></div>
                                    <div class="icon-price"><img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-lugg-yellow.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <?php if(!$isSmartPhone):?>
                            <div class="wrap-img-detail-service wrap-img-service-02">
                                <div class="wrap-img-service-big-02"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-02-lg.jpg" alt=""> </div>
                                <div class="wrap-img-service-sm-02 flexbox justify-content-between align-items-center">
                                    <div class="box-img-service-sm"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-02-sm-01.jpg" alt=""> </div>
                                    <div class="box-img-service-sm"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-02-sm-02.jpg" alt=""> </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($isSmartPhone):?>
                        <div class="button-detail-service button-available button-gray button-gray-click">ご利用可能店舗</div>
                    <?php else: ?>
                        <div class="title-list-detail-service"> <span>ご利用可能店舗</span> </div>
                    <?php endif; ?>
                    <ul class="list-detail-service">
                        <li class="item-detail-service">
                            <p class="area">[京都エリア]</p>
                            <p>京都タワー店</p>
                        </li>
                        <li class="item-detail-service">
                            <p class="area">[大阪エリア]</p>
                            <p>大阪心斎橋店</p>
                        </li>
                        <li class="item-detail-service">
                            <p class="area">[東京エリア]</p>
                            <p>東京スカイツリー店、</p>
                            <p>銀座店</p>
                        </li>
                        <li class="item-detail-service">
                            <p class="area">[北陸エリア]</p>
                            <p>金沢香林坊店</p>
                        </li>
                    </ul>
                    <div class="wrap-button-detail-service">
                        <div class="button-detail-service button-reserve button-purple"> <a href="/kimono">予約する</a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wrap-detail-service-03" class="wrap-detail-service wrap-detail-service-03 list-plan-filter">
            <div class="container-box">
                <div class="row">
                    <div class="box-detail-service">
                        <div class="content-detail-service">
                            <div class="wrap-title-detail-service wrap-title-service-03">
                                <div class="sm-title-detail-service">京都限定！ホテルや京都駅にお荷物を配送！</div>
                                <h3 class="title-detail-service">着物レンタルして荷物を<br/>キャリーサービスで運びたい</h3>
                            </div>
                            <?php if($isSmartPhone):?>
                                <div class="wrap-img-detail-service wrap-img-service-01 wrap-img-service-03 flexbox justify-content-between">
                                    <div class="wrap-img-service-sm-01 wrap-img-service-sm-03 flexbox justify-content-between"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-03-sm-01.jpg" alt=""> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-03-sm-02.jpg" alt=""> </div>
                                    <div class="wrap-img-service-big-01 wrap-img-service-big-03"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-03-lg.jpg" alt=""> </div>
                                </div>
                            <?php endif; ?>
                            <div class="wrap-des-detail-service">
                                <div class="box-des-detail-service"> 京都市内と大阪市内のホテル・旅館・民宿・ペンション・保養所・宿坊・ゲストハウス等を対象に、wargoから京都駅・お宿へお客様のお手荷物をお届け致します。 </div>
                                <?php if(!$isSmartPhone):?>
                                    <div class="price-des-detail-service flexbox justify-content-between">
                                        <div class="price">¥3,000-<small>（税抜）</small></div>
                                        <div class="icon-price"><img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-lugg-yellow.png" alt=""></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if(!$isSmartPhone):?>
                            <div class="wrap-img-detail-service wrap-img-service-01 wrap-img-service-03 flexbox justify-content-between">
                                <div class="wrap-img-service-sm-01 wrap-img-service-sm-03 flexbox justify-content-between"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-03-sm-01.jpg" alt=""> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-03-sm-02.jpg" alt=""> </div>
                                <div class="wrap-img-service-big-01 wrap-img-service-big-03"> <img src="<?php echo WP_HOME; ?>/images/luggage-service/img-area-03-lg.jpg" alt=""> </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($isSmartPhone):?>
                        <div class="button-detail-service button-available button-gray button-gray-click">ご利用可能店舗</div>
                    <?php else: ?>
                        <div class="title-list-detail-service"> <span>ご利用可能店舗</span> </div>
                    <?php endif; ?>
                    <ul class="list-detail-service list-detail-service-other">
                        <li class="item-detail-service">
                            <p class="area">[京都エリア]</p>
                            <p>京都タワー店</p>
                        </li>
                    </ul>
                    <!--<div class="wrap-button-detail-service">
                        <div class="button-detail-service button-reserve button-purple"> <a href="/kimono">予約する</a></div>
                    </div>-->
                    <p style="margin: 30px 0; color: red; text-align: center; font-size: 16px;">キャリーサービスは現在停止しております。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap-precautions">
        <div class="container-box">
            <div class="row row-fluid">
                <div class="box-precautions">
                    <div class="wrap-gereral-precautions-first">
                        <h4 class="title-precautions-first">注意事項</h4>
                        <div class="wrap-content-precautions-first">
                            <p>・大阪市内の配送はスタッフ常駐ホテルに限ります。</p>
                            <p>・何らかの事情でお受け取り頂けなかった場合、別途再配送料をご請求する事があります。</p>
                            <p>・交通事情により遅れる場合がございますので予めご了承ください。</p>
                            <p>・配送業務はツアーベース株式会社と提携しております。</p>
                        </div>
                    </div>
                    <div class="wrap-general-precautions-second">
                        <h4 class="title-precautions-first">お取扱いできないもの</h4>
                        <div class="wrap-content-precautions-second">
                            <p>・長さ1.7ｍ以上、重さ25キロ以上を超えるもの</p>
                            <p>・値段が20万円を超えるもの</p>
                            <p>・高級品、貴重品、精密機器</p>
                            <p>・こわれやすいもの、動物、危険物、腐敗しやすいもの</p>
                            <p>・液体が容器に入っているもの</p>
                            <p>・その他取扱上支障があるもの</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="id-contact-us" class="wrap-contact-us">
        <div class="container-box">
            <div class="row">
                <h5 class="title-contact-us">お問い合わせ</h5>
                <div class="wrap-button-detail-service wrap-button-contact-us flexbox"><a href="#" class="button-detail-service button-mail button-purple flexbox justify-content-between"><span class="icon-email"><img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-mail-contact-us.png" alt=""></span><span class="content-detail-service">メールでお問い合わせ</span></a><a href="#" class="button-detail-service button-tel button-purple flexbox justify-content-between"><span class="icon-telephone"><img src="<?php echo WP_HOME; ?>/images/luggage-service/icon-tel-contact-us.png" alt=""></span><span class="content-detail-service"><var class="var-name">電話でお問合せ</var><var class="tel-num-big">0120-45-0505</var><var class="var-time">(10:00 - 15:00)</var></span></a></div>
            </div>
        </div>
    </div>
</div>
<?php
$cs=Yii::app()->getClientScript();
ob_start();
?>
<script>
    if (typeof curLang === 'undefined') {
        var curLang = 0;
    }
    function isSmartPhone(){
        return ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/Android/i)));
    }
    $(document).ready(function(){
        $('.wrap-new-plan-list .btn-reserve').click(function (event) {
            $('#botDiv').hide();
            event.preventDefault();
            var selectedPlan = {};
            var hasPlan = false;
            var bookingPlanData = [];
            $('.wrap-new-plan-list').find('.list-plan-filter').each(function () {
                var $warpPlan = $(this);
                var planName = $warpPlan.attr('data-plan-name');
                $warpPlan.find('select.list_plans').each(function () {
                    var planTypeId = $(this).attr('data-plan_type_id');
                    var val = parseInt($(this).val());
                    if(planTypeId && val){
                        bookingPlanData.push({
                            plan_type_id: planTypeId,
                            plan_name: planName,
                            count_person: val,
                            plans: {
                                planTypeId : val
                            },
                        });
                        selectedPlan[planTypeId] = val;
                        hasPlan = true;
                    }
                })
            });

            if (!hasPlan || $.isEmptyObject(selectedPlan)) {
                alert('<?php echo Yii::t('js_msg','預けたいお荷物の個数を、１つ以上で指定してください')?>');
                return false;
            };

            if(typeof PopupTab == 'undefined') {
                BarPopup.init();
                BarPopup.enable(true);
                window.templockForAddPlan = true;
                window.tempBookingPlanData = bookingPlanData;
                window.templistPlanIds = selectedPlan;
                return false;
            }else{
                LuggageDatePicker.planList = selectedPlan;
                if (prepareChooseShopTab(bookingPlanData)) {
                    PopupTab.current_tab = CONFIG_POPUP.two_step;
                    PopupTab.showPopup(CONFIG_POPUP.two_step);
                }
            }
        });
        //Show List
        $('.button-gray-click').on('click', function(){
            $(this).siblings(".list-detail-service").slideToggle();
        });
    });
</script>
<?php
$js = ob_get_contents();
$js = str_replace('<script>','',$js);
$js = str_replace('</script>','',$js);
ob_end_clean();
$cs->registerScript('kimono-page',$js, CClientScript::POS_END);
?>
<?php get_footer('luggage-service') ; ?>
<?php Yii::app()->controller->widget('application.components.widgets.nimotsu.QuickLuggageBooking', array('id'=>'quick_booking'));?>




<div class="wrap-topics-banner-widget">
    <?php if($attrShortCode['direction'] == "right"): ?>
        <h2 class="title-general text-center flexbox margin-bt10 justify-content-between title-general-topics-banner" data-collapse-cate=".collapse-cate">
            <span class="text-title-general">Contents<var class="sub-descript-title-general">コンテンツ</var></span>
            <span class="toggle-icon-arrow "></span>
        </h2>
    <?php endif; ?>
    <div class="wrap-list-banner collapse-cate">
        <ul class="list-banner flexbox">
            <?php if($attrShortCode['direction'] == "left"): ?>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="/"><img data-src="<?= WP_HOME ?>/images/formal-rental/banner-topic-formal-01.jpg?ver=20200305" alt="京都・大阪・金沢・浅草・鎌倉等の<br>人気観光地で街着のレンタルします。"></a>
                    </div>
                    <p class="text-banner">
                        <a href="/"><?php echo Yii::t("new_formal", "京都・大阪・金沢・浅草・鎌倉等の<br>人気観光地で街着のレンタルします。") ?></a>
                    </p>
                </li>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="/takuhai"><img src="<?= WP_HOME ?>/images/formal-rental/banner-topic-formal-02.jpg?ver=20200305" alt="全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。"></a>
                    </div>
                    <p class="text-banner">
                        <a href="/takuhai"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
                    </p>
                </li>
                <?php if($attrShortCode['custom'] == null): ?>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="/group/plan20"><img data-src="<?= WP_HOME ?>/images/formal-rental/banner-topic-formal-03.jpg" alt="8名以上のお客様は全プラン割引き♪<br>グループ旅行に最適な団体プラン。"></a>
                    </div>
                    <p class="text-banner">
                        <a href="/group/plan20"><?php echo Yii::t("new_formal", "8名以上のお客様は全プラン割引き♪<br>グループ旅行に最適な団体プラン。") ?></a>
                    </p>
                </li>
                <?php else: ?>
                    <li class="item-banner">
                        <div class="image-banner">
                            <a href="/formal"><img src="<?= WP_HOME ?>/images/takuhai/banner-topic-takuhai-02.jpg?ver=20200305" alt="ご結婚式、ご入学式、卒業式、七五三<br>など、各種式典やイベントに。"></a>
                        </div>
                        <p class="text-banner">
                            <a href="/formal"><?php echo Yii::t("new_formal", "ご結婚式、ご入学式、卒業式、七五三<br>など、各種式典やイベントに。") ?></a>
                        </p>
                    </li>
                <?php endif; ?>
            <?php elseif($attrShortCode['direction'] == "right"): ?>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="/blog"><img data-src="<?= WP_HOME ?>/images/formal-rental/banner-topic-formal-04.jpg" alt="<?= Yii::t('formal-banner-topics','着物レンタルスタッフブログ') ?>"></a>
                    </div>
                    <p class="text-banner">
                        <a href="/blog"><?php echo Yii::t("new_formal", "きものレンタルwargo全店舗から、<br>お知らせや店舗の様子をお届けいたします") ?></a>
                    </p>
                </li>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="/column"><img data-src="<?= WP_HOME ?>/images/formal-rental/banner-topic-formal-05.jpg" alt="<?= Yii::t('formal-banner-topics','着物の豆知識コラム') ?>"></a>
                    </div>
                    <p class="text-banner">
                        <a href="/column"><?php echo Yii::t("new_formal", "着物に関する知識のほか、着物をお洒落に<br>着こなすためのアドバイスなどを多数掲載") ?></a>
                    </p>
                </li>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="/column_yukata"><img data-src="<?= WP_HOME ?>/images/formal-rental/banner-topic-formal-06.jpg" alt="<?= Yii::t('formal-banner-topics','浴衣の豆知識コラム') ?>"></a>
                    </div>
                    <p class="text-banner">
                        <a href="/column_yukata"><?php echo Yii::t("new_formal", "浴衣に関する知識のほか、浴衣をお洒落に<br>着こなすためのアドバイスなどを多数掲載") ?></a>
                    </p>
                </li>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="/formal/howto"><img data-src="<?= WP_HOME ?>/images/formal-rental/banner-topic-formal-07.jpg" alt="<?= Yii::t('formal-banner-topics','着物レンタルの流れ') ?>"></a>
                    </div>
                    <p class="text-banner">
                        <a href="/formal/howto"><?php echo Yii::t("new_formal", "初めての方でもご安心♪ご予約から当日の<br>レンタルまでの流れをご説明いたします。") ?></a>
                    </p>
                </li>
                <li class="item-banner sp">
                    <div class="image-banner">
                        <a href="<?php echo home_url()?>/recruitment"><img data-src="<?php echo WP_HOME. '/images/new-kimono/banner-recruitment-sidebar-left.jpg' ?>" alt="<?= Yii::t ('new_kimono_sidebar_left','京都きものレンタルwargo求人情報')?>"></a>
                    </div>
                </li>
                <li class="item-banner">
                    <div class="wrap-text-banner-araibar">
                        <a class="link-top-araibar"  target="_blank" href="https://araiba.net/cleaning">
                            <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/araibabanner-kimono-min.jpg?ver=20200305" alt="着物クリーニング＆保管サービス「アライバ」OPEN!">
                            <p class="text-araibar">着物クリーニング＆保管サービス「アライバ」OPEN!</p>
                        </a>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
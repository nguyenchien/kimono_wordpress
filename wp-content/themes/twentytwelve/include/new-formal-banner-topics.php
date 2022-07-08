<?php
if(!Yii::app()->mobileDetect->isSmartPhone()):?>
<div class="wrap-topics-banner-widget">
    <?php if($attrShortCode['direction'] == "right"): ?>
        <div class="title-general title-general-new text-center margin-bt10 justify-content-between title-general-topics-banner" data-collapse-cate=".collapse-cate">
            <span class="text-title-general flexbox align-items-center">Contents<h3 class="sub-descript-title-general sub-text-title-new">コンテンツ</h3></span>
            <span class="toggle-icon-arrow "></span>
        </div>
    <?php endif; ?>
    <div class="wrap-list-banner collapse-cate">
        <ul class="list-banner flexbox">
            <?php if($attrShortCode['direction'] == "left"): ?>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="/"><img src="<?= WP_HOME ?>/images/takuhai/banner-topic-takuhai-01.jpg" alt="<?= Yii::t('new-formal-banner-topics','観光用着物レンタル') ?>"></a>
                    </div>
                    <p class="text-banner">
                        <a href="/"><?php echo Yii::t("new_formal", "京都・大阪・金沢・浅草・鎌倉等の<br>人気観光地で街着のレンタルします。") ?></a>
                    </p>
                </li>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="/takuhai"><img src="<?= WP_HOME ?>/images/takuhai/banner-topic-takuhai-04.jpg" alt="<?= Yii::t('new-formal-banner-topics','イベント・冠婚葬祭用着物レンタル') ?>"></a>
                    </div>
                    <p class="text-banner">
                        <a href="/takuhai"><?php echo Yii::t("new_formal", "ご結婚式、ご入学式、卒業式、七五三<br>など、各種式典やイベントに。") ?></a>
                    </p>
                </li>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="<?php echo home_url()?>/recruitment"><img data-src="<?php echo WP_HOME. '/images/new-kimono/banner-recruitment-sidebar-left.jpg' ?>" alt="<?= Yii::t ('new_kimono_sidebar_left','京都きものレンタルwargo求人情報')?>"></a>
                    </div>
                </li>
            <?php elseif($attrShortCode['direction'] == "right"): ?>
                <li class="item-banner new-formal-widget-right">
					<div class="wrap-new-formal-widget-right">
					<div class="box-icon-new-formal"><span class="icon icon-formal-bag-sale flexbox"></span></div>
					<div class="wrap-text-new-formal">
						<p class="text-new-formal-1">wargoの</p>
						<p class="text-new-formal-2">安い着物ランキング</p>
					</div>
					</div>
                    <p class="text-banner">
                        <a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
                    </p>
                </li>
				<li class="item-banner new-formal-widget-right">
					<div class="wrap-new-formal-widget-right">
						<div class="box-icon-new-formal"><span class="icon icon-formal-staff-blog flexbox"></span></div>
						<div class="wrap-text-new-formal">
							<p class="text-new-formal-1">スタッフブログ</p>
						</div>
					</div>
					<p class="text-banner">
						<a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
					</p>
				</li>
				<li class="item-banner new-formal-widget-right">
					<div class="wrap-new-formal-widget-right">
						<div class="box-icon-new-formal"><span class="icon icon-formal-knowledge flexbox"></span></div>
						<div class="wrap-text-new-formal">
							<p class="text-new-formal-1">着物の豆知識</p>
						</div>
					</div>
					<p class="text-banner">
						<a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
					</p>
				</li>
				<li class="item-banner new-formal-widget-right">
					<div class="wrap-new-formal-widget-right">
						<div class="box-icon-new-formal"><span class="icon icon-formal-knowledge flexbox"></span></div>
						<div class="wrap-text-new-formal">
							<p class="text-new-formal-1">浴衣の豆知識</p>
						</div>
					</div>
					<p class="text-banner">
						<a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
					</p>
				</li>
				<li class="item-banner new-formal-widget-right">
					<div class="wrap-new-formal-widget-right">
						<div class="box-icon-new-formal"><span class="icon icon-formal-howto flexbox"></span></div>
						<div class="new-formal-last">
							<p class="text-new-formal-last-1">簡 単、</p>
							<p class="text-new-formal-last-2">安 心♪</p>
						</div>
						<div class="wrap-text-new-formal">
							<p class="text-new-formal-1">ネット宅配着物</p>
							<p class="text-new-formal-2">レンタルの流れ</p>
						</div>
					</div>
					<p class="text-banner">
						<a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
					</p>
				</li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
<!--Toogle menu mobile formal-->

<?php if($attrShortCode['device'] == "mobile"): ?>
    <?php
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $is_formal = strpos($url, "formal") !== false;
    ?>
	<div class="wrap-topics-banner-widget">
        <?php if ($is_formal) : ?>
            <div class="title-general text-center title-general-new-style" data-collapse-cate=".collapse-cate">
                <div class="wrap-title-text flexbox">
                    <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                    <span class="text-title-general">Contents</span>
                    <span class="sub-text-title sub-text-title-new">コンテンツ</span>
                </div>
                <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
            </div>
        <?php else: ?>
            <h3 class="title-general title-general-new text-center flexbox margin-bt10 justify-content-between title-general-topics-banner" data-collapse-cate=".collapse-cate">
                <span class="text-title-general">コンテンツ</span>
                <span class="toggle-icon-arrow "></span>
            </h3>
        <?php endif; ?>
		<div class="wrap-list-banner collapse-cate">
			<ul class="list-banner flexbox">
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-bag-sale flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1">wargoの</p>
								<p class="text-new-formal-2">安い着物ランキング</p>
							</div>
						</div>
						<p class="text-banner">
							<a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
						</p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-staff-blog flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1">スタッフブログ</p>
							</div>
						</div>
						<p class="text-banner">
							<a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
						</p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-knowledge flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1">着物の豆知識</p>
							</div>
						</div>
						<p class="text-banner">
							<a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
						</p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-knowledge flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1">浴衣の豆知識</p>
							</div>
						</div>
						<p class="text-banner">
							<a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
						</p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-howto flexbox"></span></div>
							<div class="new-formal-last">
								<p class="text-new-formal-last-1">簡 単、</p>
								<p class="text-new-formal-last-2">安 心♪</p>
							</div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1">ネット宅配着物</p>
								<p class="text-new-formal-2">レンタルの流れ</p>
							</div>
						</div>
						<p class="text-banner">
							<a href="/blog"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
						</p>
					</li>
                    <li class="item-banner">
                        <div class="wrap-text-banner-araibar">
                            <a class="link-top-araibar"  target="_blank" href="https://araiba.net/cleaning">
                                <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/araibabanner-kimono-min.jpg?ver=20200305" alt="着物クリーニング＆保管サービス「アライバ」OPEN!">
                                <p class="text-araibar">着物クリーニング＆保管サービス「アライバ」OPEN!</p>
                            </a>
                        </div>
                    </li>
			</ul>
		</div>
	</div>
<?php endif;?>
<?php if($attrShortCode['menu-top-mobile'] == "true"): ?>
<div class="wrap-topics-banner-widget">
    <?php
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $is_formal = strpos($url, "formal") !== false;
    ?>
    <?php if ($is_formal) : ?>
        <div class="title-general text-center title-general-new-style" data-collapse-cate=".collapse-cate" style="margin-bottom: 10px;">
            <div class="wrap-title-text flexbox">
                <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                <span class="text-title-general">Others</span>
                <span class="sub-text-title sub-text-title-new">お店でレンタル</span>
            </div>
            <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
        </div>
    <?php else: ?>
        <h2 class="title-general text-center flexbox margin-bt10 justify-content-between title-general-topics-banner" data-collapse-cate=".collapse-cate">
            <span class="text-title-general">Others<var class="sub-descript-title-general">お店でレンタル</var></span>
            <span class="toggle-icon-arrow "></span>
        </h2>
    <?php endif; ?>
	<div class="wrap-list-banner collapse-cate">
		<ul class="list-banner flexbox">
				<li class="item-banner">
					<div class="image-banner">
						<a href="/"><img data-src="<?= WP_HOME ?>/images/takuhai/banner-topic-takuhai-01.jpg" alt="京都・大阪・金沢・浅草・鎌倉等の<br>人気観光地で街着のレンタルします。"></a>
					</div>
					<p class="text-banner">
						<a href="/"><?php echo Yii::t("new_formal", "京都・大阪・金沢・浅草・鎌倉等の<br>人気観光地で街着のレンタルします。") ?></a>
					</p>
				</li>
				<li class="item-banner">
					<div class="image-banner">
						<a href="/takuhai"><img src="<?= WP_HOME ?>/images/takuhai/banner-topic-takuhai-02.jpg?ver=20200305" alt="全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。"></a>
					</div>
					<p class="text-banner">
						<a href="/takuhai"><?php echo Yii::t("new_formal", "全国どこでも【送料無料】 で<br>冠婚葬祭用のお着物を発送致します。") ?></a>
					</p>
				</li>
				<li class="item-banner">
					<div class="image-banner">
						<a href="/group/plan20"><img src="<?= WP_HOME ?>/images/takuhai/banner-topic-takuhai-03.jpg?ver=20200305" alt="8名以上のお客様は全プラン割引き♪<br>グループ旅行に最適な団体プラン。"></a>
					</div>
					<p class="text-banner">
						<a href="/group/plan20"><?php echo Yii::t("new_takuhai", "8名以上のお客様は全プラン割引き♪<br>グループ旅行に最適な団体プラン。") ?></a>
					</p>
				</li>
		</ul>
	</div>
</div>
<?php endif;?>
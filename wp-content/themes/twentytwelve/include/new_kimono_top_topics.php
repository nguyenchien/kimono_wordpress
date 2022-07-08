<?php
global $language;
$textLangImage = "";
if($language != "ja"){
    $textLangImage = "-".$language;
}
?>
<div class="widget-banner-tp-new-kimono widget-banner-tp-new-kimono-topic">
	<div class="title-general text-center title-general-icon">
        <span class="icon-title-general icon icon-formal-search"></span>
        <div class="text-title-general flexbox"><?php echo  Yii::t('new-kimono-topics', 'Topics<h2 class="sub-descript-title-general">人気のトピック</h2>')?></div>
    </div>
	<ul class="list-banner-tp-new-kimono flexbox">
		<li class="item-banner">
			<a href="<?php echo home_url() ?>/formal/why-goodvalue">
				<img data-src="<?php echo WP_HOME. '/images/new-kimono/banner-topic-new-kimono-02' .$textLangImage. '.png' ?>" alt="<?php echo  Yii::t('new-kimono-topics', '本格的な着物レンタルを何故安く提供できるのか？秘密をお教えします')?>">
				<p class="info-des-banner"><?php echo  Yii::t('new-kimono-topics', '本格的な着物レンタルを何故安く提供できるのか？秘密をお教えします')?></p>
			</a>
		</li>
		<li class="item-banner">
			<a href="<?php echo home_url() ?>/hairset">
				<img data-src="<?php echo WP_HOME. '/images/new-kimono/banner-topic-new-kimono-03' .$textLangImage. '.png' ?>" alt="<?php echo  Yii::t('new-kimono-topics', '1,900円なのにプロのヘアスタイリストが行います♬')?>">
				<p class="info-des-banner"><?php echo  Yii::t('new-kimono-topics', '1,900円なのにプロのヘアスタイリストが行います♬')?></p>
			</a>
		</li>
		<li class="item-banner">
            <a href="<?php echo home_url() ?>/access/okayama-area/kurashiki">
                <img data-src="<?php echo WP_HOME. '/images/new-kimono/ne-open-kurashiki.jpg' ?>" alt="<?php echo  Yii::t('new-kimono-topics', '岡山エリア初！倉敷美観地区店オープン！')?>">
                <p class="info-des-banner"><?php echo  Yii::t('new-kimono-topics', '岡山エリア初！倉敷美観地区店オープン！')?></p>
            </a>
        </li>
	</ul>
</div>

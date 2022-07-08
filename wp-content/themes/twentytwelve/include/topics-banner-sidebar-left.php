<?php
    global $language;
    $textLangImage = "";
    if($language != "ja"){
        $textLangImage = "-".$language;
    }
    $is_top_page = is_front_page();
?>
<div class="wrap-topics-banner-widget wrap-topics-banner-kimono-widget">
    <div class="wrap-list-banner">
        <ul class="list-banner flexbox ">
            <?php if ($language == "ja" && (is_page('yukata') OR is_page('yukata/plan'))) : ?>
            <li class="item-banner">
                <div class="image-banner">
                    <a href="<?php echo home_url()?>"><img class="lazy" data-src="<?php echo WP_HOME. '/images/takuhai/banner-topic-takuhai-01' .$textLangImage. '.jpg' ?>" alt="<?= Yii::t ('new_kimono_sidebar_left','京都・大阪・金沢・浅草・鎌倉等の<br>人気観光地で街着のレンタルします。')?>"></a>
                </div>
                <p class="text-banner">
                    <a href="<?php echo home_url()?>"><?= Yii::t ('new_kimono_sidebar_left','京都・大阪・金沢・浅草・鎌倉等の<br>人気観光地で街着のレンタルします。')?></a>
                </p>
            </li>
			<?php endif?>
            <?php if ($language == "ja" && (is_page('yukata') OR is_page('yukata/plan'))) { ?>
            <li class="item-banner">
				<div class="image-banner">
					<a href="<?php echo home_url() ?>/bring#yukata"><img class="lazy" data-src="<?php echo WP_HOME. '/images/new-kimono/banner_left_bring.jpg' ?>" alt="<?= Yii::t ('new_kimono_sidebar_left','お客様の浴衣をお持込みいただき、着付けをさせていただく プランもご用意しております')?>"></a>
				</div>
				<p class="text-banner">
					<a href="<?php echo home_url() ?>/bring#yukata"><?= Yii::t ('new_kimono_sidebar_left','お客様の浴衣をお持込みいただき、着付けをさせていただく プランもご用意しております')?></a>
				</p>
			</li>
			<?php }; ?>
            <?php if ($language == "ja") { ?>
			<li class="item-banner">
				<div class="image-banner">
                    <a href="<?php echo home_url()?>/group"><img class="lazy" data-src="<?php echo WP_HOME;?>/images/new-kimono/group-banner19-11.jpg?ver=20200305" alt=""></a>
                </div>
                <p class="text-banner">
                    <a href="<?php echo home_url() ?>/group"><?= Yii::t ('new_kimono_sidebar_left','団体・法人プラン詳細はこちら')?></a>
                </p>
            </li>
            <?php }; ?>
            <li class="item-banner">
                <div class="image-banner">
                    <a href="<?php echo home_url() ?>/takuhai"><img class="lazy" src="<?php echo WP_HOME. '/images/new-kimono/banner-new-takuhai-sidebar-left' .$textLangImage. '.jpg?v=20192304' ?>" alt="<?= Yii::t ('new_kimono_sidebar_left','全国どこでも【送料無料】で<br>冠婚葬祭用のお着物を発送致します。')?>"></a>
				</div>
				<p class="text-banner">
					<a href="<?php echo home_url() ?>/takuhai"><?= Yii::t ('new_kimono_sidebar_left','全国どこでも【送料無料】で<br>冠婚葬祭用のお着物を発送致します。')?></a>
				</p>
			</li>
            <li class="item-banner">
                <div class="image-banner">
                    <a href="<?php echo home_url()?>/formal"><img class="lazy" src="<?php echo WP_HOME. '/images/new-kimono/banner-formal-sidebar-left' .$textLangImage. '.jpg?v=20192304' ?>" alt="<?= Yii::t ('new_kimono_sidebar_left','ご結婚式、ご入学式、卒業式、七五三<br>など、各種式典やイベントに。')?>"></a>
                </div>
                <p class="text-banner">
                    <a href="<?php echo home_url()?>/formal"><?= Yii::t ('new_kimono_sidebar_left','ご結婚式、ご入学式、卒業式、七五三<br>など、各種式典やイベントに。')?></a>
                </p>
            </li>
            <?php if ($language == "ja" && !$is_top_page) { ?>
                <li class="item-banner">
                    <div class="image-banner">
                        <a href="<?php echo home_url()?>/recruitment"><img class="lazy" data-src="<?php echo WP_HOME. '/images/new-kimono/banner-recruitment-sidebar-left.jpg' ?>" alt="<?= Yii::t ('new_kimono_sidebar_left','京都きものレンタルwargo求人情報')?>"></a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

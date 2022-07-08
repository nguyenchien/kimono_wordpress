
<?php
    $language = Yii::app()->language;
    $isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
    $textLangImage = "";
    if($language != "ja"){
        $textLangImage = "-".$language;
    }
?>
<?php if($attrShortCode['sp'] == "true"): ?>
<div class="wrap-check-availbility-kimono wrap-check-availbility-kimono-sp">
    <?php if($language == 'ja') : ?>
        <div class="wrap-new-box-check-booking">
            <div class="new-box-check-booking">
                <a href="<?php echo home_url()?>/check-booking"><img class="lazy" data-src="<?= WP_HOME; ?>/images/new-kimono/check-booking-sp.jpg"></a>
            </div>
        </div>
        <div class="wrap-general-check-availbility">
            <span class="icon-formal-phone new-icon-formal-phone"><var class="num-check-availbility new-num-check-availbility"><?= Yii::t ('new_kimono_sidebar_left','075-600-2830')?></var></span>
            <span class="text-check-availbility"><?= Yii::t ('new_kimono_sidebar_left','全国共通コールセンター')?></span>
            <span class="date-check-availbility"><?= Yii::t ('new_kimono_sidebar_left','(9:00-19:00)')?></span>
        </div>
    <?php else: ?>
        <div class="wrap-general-check-availbility">
            <span class="icon-formal-phone"></span>
            <span class="num-check-availbility"><?= Yii::t ('new_kimono_sidebar_left','075-600-2830')?></span>
            <span class="text-check-availbility"><?= Yii::t ('new_kimono_sidebar_left','全国共通コールセンター')?></span>
            <span class="date-check-availbility"><?= Yii::t ('new_kimono_sidebar_left','(9:00-19:00)')?></span>
            <div class="box-check-availbility-kimono">
                <a href="<?php echo home_url()?>/check-booking"><?= Yii::t ('new_kimono_sidebar_left','空き状況を確認する')?></a>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php elseif($attrShortCode['pc'] == "true"): ?>
    <?php if($language == 'ja') : ?>
        <div class="wrap-new-check-availbility-kimono">
            <div class="new-box-check-booking">
                <a href="<?php echo home_url()?>/check-booking"><img class="lazy" data-src="<?= WP_HOME; ?>/images/new-kimono/check-booking-pc.jpg"></a>
            </div>
        </div>
    <?php else: ?>
        <div class="wrap-fm-howto wrap-new-kimono-howto flexbox justify-content-center">
            <a href="<?php echo home_url()?>/howto">
                <div class="box-fm-howto flexbox pc">
                    <div class="howto-textleft"><?= Yii::t ('new_kimono_sidebar_left','簡単、安心♪')?></div>
                    <div class="howto-textright"><?= Yii::t ('new_kimono_sidebar_left','着物レンタルの流れ')?></div>
                </div>
            </a>
        </div>
        <div class="wrap-check-availbility-kimono">
            <div class="box-check-availbility-kimono">
                <a href="<?php echo home_url()?>/check-booking"><?= Yii::t ('new_kimono_sidebar_left','空き状況を確認する')?></a>
            </div>
        </div>
    <?php endif; ?>
<?php endif ?>
<?php if($isSmartPhone && $language == "ja"): ?>
    <div class="wrap-banner-ykt-sp 123">
        <div class="item-banner">
            <div class="image-banner">
                <a href="<?php echo home_url()?>/group"><img class="lazy" data-src="<?php echo WP_HOME;?>/images/new-kimono/group-banner19-11.jpg?ver=20200305" alt=""></a>
            </div>
        </div>
    </div>
    <style>
        .wrap-banner-ykt-sp{
            padding: 0 10px;
            margin-bottom: 25px;
        }
        .wrap-banner-ykt-sp .image-banner{
            margin-bottom: 10px;
        }
        .wrap-banner-ykt-sp .image-banner img{
            width: 100%;
        }
        .wrap-banner-ykt-sp .text-banner > a{
            font-size: 12px;
            text-decoration: underline !important;
            color: #6b7a83;
            line-height: 1.4;
        }
    </style>
<?php endif;?>


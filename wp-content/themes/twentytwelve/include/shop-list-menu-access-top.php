<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
global $isSmartPhone,$language;
$textLangImage = "";
if($language != "ja"){
    $textLangImage = "-".$language;
}
?>
<?php
if(strpos($url,'station-area') == true){?>
    <div class="banner-top-highend-v2">
        <div class="container-box">
            <div class="slider-banner">
                <div id="#sliderNewKimono" class="sliderNewKimono flexslider slider-new-highend slider-new-kimono-top">
                    <ul class="list-slider-banner slides">
                        <li class="item-slider-banner">
                            <a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                <?php if ($isSmartPhone){ ?>
                                <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-kyotostation-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } else { ?>
                                <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-kyotostation-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--end wrap-form--top-->
        </div>
    </div><!--end banner-top-highend-v2-->
    <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
<?php }
else if(strpos($url,'gion-area') == true){?>
    <div class="banner-top-highend-v2">
        <div class="container-box">
            <div class="slider-banner">
                <div id="#sliderNewGion" class="sliderNewKimono flexslider slider-new-highend slider-new-kimono-top">
                    <ul class="list-slider-banner slides">
                        <li class="item-slider-banner">
                            <a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                <?php if ($isSmartPhone){ ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-gionshijo-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } else { ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-gionshijo-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--end wrap-form--top-->
        </div>
    </div><!--end banner-top-highend-v2-->
    <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
<?php }
else if(strpos($url,'kiyomizu-area') == true){?>
    <div class="banner-top-highend-v2">
        <div class="container-box">
            <div class="slider-banner">
                <div id="#sliderNewKiyomizu" class="sliderNewKimono flexslider slider-new-highend slider-new-kimono-top">
                    <ul class="list-slider-banner slides">
                        <li class="item-slider-banner"><a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                <?php if ($isSmartPhone){ ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-kiyomizu-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } else { ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-kiyomizu-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } ?>
                            </a></h1>
                        </li>
                    </ul>
                </div>
            </div><!--end wrap-form--top-->
        </div>
    </div><!--end banner-top-highend-v2-->
    <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
<?php }
else if(strpos($url,'arashiyama-area') == true){?>
    <div class="banner-top-highend-v2">
        <div class="container-box">
            <div class="slider-banner">
                <div id="#sliderNewArashiyama" class="sliderNewKimono flexslider slider-new-highend slider-new-kimono-top">
                    <ul class="list-slider-banner slides">
                        <li class="item-slider-banner">
                            <a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                <?php if ($isSmartPhone){ ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-arashiyama-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } else { ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-arashiyama-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--end wrap-form--top-->
        </div>
    </div><!--end banner-top-highend-v2-->
    <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
<?php }
else if(strpos($url,'osaka-area') == true){?>
    <div class="banner-top-highend-v2">
        <div class="container-box">
            <div class="slider-banner">
                <div id="#sliderNewOsaka" class="sliderNewKimono flexslider slider-new-highend slider-new-kimono-top">
                    <ul class="list-slider-banner slides">
                        <li class="item-slider-banner">
                            <a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                <?php if ($isSmartPhone){ ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-osaka-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } else { ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-osaka-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--end wrap-form--top-->
        </div>
    </div><!--end banner-top-highend-v2-->
    <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
<?php }
else if(strpos($url,'asakusa-area') == true){?>
    <div class="banner-top-highend-v2">
        <div class="container-box">
            <div class="slider-banner">
                <div id="#sliderNewAsakusa" class="sliderNewKimono flexslider slider-new-highend slider-new-kimono-top">
                    <ul class="list-slider-banner slides">
                        <li class="item-slider-banner">
                            <a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                <?php if ($isSmartPhone){ ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-asakusa-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } else { ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-asakusa-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--end wrap-form--top-->
        </div>
    </div><!--end banner-top-highend-v2-->
    <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
<?php }
else if(strpos($url,'kamakura-area') == true){?>
    <div class="banner-top-highend-v2">
        <div class="container-box">
            <div class="slider-banner">
                <div id="#sliderNewKamakura" class="sliderNewKimono flexslider slider-new-highend slider-new-kimono-top">
                    <ul class="list-slider-banner slides">
                        <li class="item-slider-banner">
                            <a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                <?php if ($isSmartPhone){ ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-kamakura-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } else { ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-kamakura-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--end wrap-form--top-->
        </div>
    </div><!--end banner-top-highend-v2-->
    <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
<?php }
else if(strpos($url,'kanazawa-area') == true){?>
    <div class="banner-top-highend-v2">
        <div class="container-box">
            <div class="slider-banner">
                <div id="#sliderNewKanazawa" class="sliderNewKimono flexslider slider-new-highend slider-new-kimono-top">
                    <ul class="list-slider-banner slides">
                        <li class="item-slider-banner">
                            <a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                <?php if ($isSmartPhone){ ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-kanazawa-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } else { ?>
                                    <img src="<?php echo WP_HOME . '/images/new-kimono/access/banner-kanazawa-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!--end wrap-form--top-->
        </div>
    </div><!--end banner-top-highend-v2-->
    <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
<?php }
else{?>
    <?php if(strpos($url,'kyoto-area') == true) : ?>
        <div class="banner-top-highend-v2">
            <div class="container-box">
                <div class="slider-banner">
                    <div id="#sliderNewKimono" class="sliderNewKimono flexslider slider-new-highend slider-new-kimono-top">
                        <ul class="list-slider-banner slides">
                            <li class="item-slider-banner">
                                <a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                    <?php if ($isSmartPhone){ ?>
                                        <img src="<?php echo WP_HOME . '/images/new-kimono/new-banner-toppage-kimono-01-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                    <?php } else { ?>
                                        <img src="<?php echo WP_HOME . '/images/new-kimono/new-banner-toppage-kimono-01-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                    <?php } ?>
                                </a>
                            </li>
                            <li class="item-slider-banner">
                                <a href="<?php echo home_url() ?>/kimono" title="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>">
                                    <?php if ($isSmartPhone){ ?>
                                        <img src="<?php echo WP_HOME . '/images/new-kimono/new-banner-toppage-kimono-02-sp' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                    <?php } else { ?>
                                        <img src="<?php echo WP_HOME . '/images/new-kimono/new-banner-toppage-kimono-02-pc' . $textLangImage . '.png'; ?>" alt="<?php echo Yii::t('new_kimono_shoplist', '安い着物レンタルプラン');?>"/>
                                    <?php } ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!--end wrap-form--top-->
            </div>
        </div><!--end banner-top-highend-v2-->
        <?php echo wp_translate_parse(php_set_base_url(get_field('shop_detail'))); ?>
    <?php endif; ?>
<?php } ?>


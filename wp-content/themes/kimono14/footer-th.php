<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

global $is_yukata, $isSmartPhone, $isTablet, $language, $blogs;
    if ($is_yukata) {
    //	$depend = wp_style_is( 'top.css')? array('top.css'): array();
        wp_register_style('top-yukata', get_template_directory_uri() . '/css/top_yukata.css');
        wp_enqueue_style('top-yukata');
    }

if ($is_yukata) {
//	$depend = wp_style_is( 'top.css')? array('top.css'): array();
    wp_register_style('top-yukata', get_template_directory_uri() . '/css/top_yukata.css');
    wp_enqueue_style('top-yukata');
}

$shop_id = get_field('shop_id');
$shop_id = !empty($shop_id) ? (int)$shop_id : 0;

$shopGroupSpec = array(
	MasterValues::SHOP_KYOTO_STATION_ID,
	MasterValues::SHOP_GIONSIJO_ID,
	MasterValues::SHOP_ARASHIYAMA_ID,
	MasterValues::SHOP_KYOMIZUZAKA_ID,
	MasterValues::SHOP_GIONSHIRAKAWA_ID,
	MasterValues::SHOP_PETIT_KYOTOSTATION_ID,
)
?>
</div><!-- #main -->

<?php
$current_link = $_SERVER['REQUEST_URI']; //get_permalink();
$is_blog_cate = strpos($current_link, "/blog/") !== false;
$is_group_blog = strpos($current_link, "/group/") !== false;
if (!is_page('reserve') && !$is_blog_cate && !$is_group_blog):
    ?>
    <div id="classroom_banner" class="main-content new-classroom-banner" style='display: <?= $language == "ko" ? "none" : "block"?>' >
        <div class="container clearfix">
            <ul>
	            <?php if($language == 'ja' && $shop_id != 0 ){
		            if(in_array($shop_id, $shopGroupSpec)){ ?>
			            <li><a href="<?php echo esc_url(home_url('spot')); ?>">
				            <img src="<?php echo WP_HOME .'/images/banner-kyoto-min-' .$language. '.png';?>" alt="">
			            </a></li>
		            <?php }elseif($shop_id == MasterValues::SHOP_SHINSAIBASHI_ID) { ?>
			            <li><a href="<?php echo esc_url(home_url('osaka/osaka-spot')); ?>">
				            <img src="<?php echo WP_HOME .'/images/banner-osaka-min-' .$language. '.png';?>" alt="">
			            </a></li>
		            <?php }elseif($shop_id == MasterValues::SHOP_ASAKUSA_ID) { ?>
			            <li><a href="<?php echo esc_url(home_url('asakusa/asakusa-spot')); ?>">
				            <img src="<?php echo WP_HOME .'/images/banner-asakusa-min-' .$language. '.png';?>" alt="">
			            </a></li>
		            <?php }elseif($shop_id == MasterValues::SHOP_KOMACHI_ID) { ?>
			            <li><a href="<?php echo esc_url(home_url('kamakura-spot')); ?>">
				            <img src="<?php echo WP_HOME .'/images/banner-kamakura-min-' .$language. '.png';?>" alt="">
			            </a></li>
		            <?php }elseif($shop_id == MasterValues::SHOP_KANAZAWA_KOURINBOU_ID) { ?>
			            <li><a href="<?php echo esc_url(home_url('kanazawa-spot')); ?>">
				            <img src="<?php echo WP_HOME .'/images/banner-kanazawa-min-' .$language. '.png';?>" alt="">
			            </a></li>
		            <?php }
	            }?>
               <?php if( Yii::app() -> language !='id'): ?>
	            <li><a href="<?php echo esc_attr(home_url($blogs[$language]))?>">
			            <img src="<?php echo WP_HOME .'/images/banner-blog-' .$language. '.png';?>" alt=""/>
	            </a></li>

	            <?php
                $banner_flows_link = 'howto';
                if ($language == 'ja') {
                    $img_src_flows = WP_HOME . '/images/classroom_banner/banner-rental-flows.jpg';
                } else{
	                $img_src_flows = WP_HOME . '/images/classroom_banner/banner-rental-flows-' . $language . '.jpg';
                }?>
                <li><a href="<?php echo esc_url(home_url($banner_flows_link)); ?>">
                    <img src="<?php echo $img_src_flows; ?>" alt="<?php echo Yii::t('wp_theme', '着物レンタルはこちらへ!') ?>"/>
                </a></li>

	            <?php if ($language == 'ja') {
		            $banner_link = 'recruitment';
		            $img_src = WP_HOME . '/images/classroom_banner/banner-reserve-yukata-' . $language . '.jpg';
	            } else {
		            $banner_link = 'kimono';
		            $img_src = WP_HOME . '/images/classroom_banner/banner-recruit-'  . $language . '.jpg';
	            }
	            ?>
	            <li><a href="<?php echo esc_url(home_url($banner_link)); ?>">
			            <img src="<?php echo $img_src; ?>" alt="<?php echo Yii::t('wp_theme', '「着物が好き」それだけで仕事になる!') ?>"/>
	            </a></li>

	            <li><a href="<?php echo esc_attr(home_url('column'))?>">
			            <img src="<?php echo WP_HOME .'/images/banner-column-' .$language. '.png';?>" alt=""/>
	            </a></li>
               <?php else :?>
                <li><a href="<?php echo esc_attr(home_url($blogs[$language]))?>">
                        <img src="<?php echo WP_HOME .'/images/banner-blog-' .$language. '.png';?>" alt=""/>
                    </a></li>
                <li><a href="<?php echo esc_attr(home_url('column'))?>">
                         <img src="<?php echo WP_HOME .'/images/banner-column-' .$language. '.png';?>" alt=""/>
                </a></li>
               <?php endif; ?>
            </ul>
        </div>
        <!-- end container -->
    </div><!-- div#classroom_banner -->
<?php endif; ?>
<?php if (!is_page('reserve') && !$is_blog_cate && !$is_group_blog && !is_page('group')): ?>
    <div class="main-content" style='display: <?= $language == "ko" ? "none" : "block"?>'>
        <ul class="container list-group-banner clearfix">
            <?php

            $group_banner = get_group_banner();

            foreach ($group_banner as $banner) {
                ?>
                <li>
                    <a href="<?php echo $banner['link']; ?>">
                        <?=$banner['img']; ?>
                    </a>
                </li>
                <?php
            } ?>
        </ul>
    </div>
<?php endif; ?>

<?php
global $is_osaka;
global $is_asakusa;
?>
<footer id="colophon" class="tn-main-footer section-footer" role="contentinfo">
    <?php
    $flagCollapseContent = false;
    if($language =='en' || $language =='fr' || $language =='tw' || $language =='id') {
        $flagCollapseContent = true; } ?>
    <div class="colophon-zone-top">
        <div class="container ps_re box-widget-maps">
	        <?php if(!$isSmartPhone) { ?>
            <div id="box-footer" class="sixteen columns clearfix">
                <?php
                if (!is_page('access') && !is_page('osaka-access')) {
                    ?>
                    <div class="logo-footer logo-footer-new one-third column alpha phone-num clearfix">
                        <h2 class="title-footer-new">
                            <span class="icon-icon-store"></span>
                            <span class="name"><?php echo Yii::t('wp_theme', 'Store Information') ?></span>
                            <span class="text-new"><?php echo Yii::t('wp_theme', '店舗のご案内') ?></span>
                            <?php if($flagCollapseContent) {?>
                                <span id="storesArrow" class="fa-icon-collapsed icon-click icon-fa-collapsed-down icon-collapsed-ranking" onclick="toggleStores()"></span>
                            <?php }?>

                        </h2>
                        <script>
                            function toggleStores() {
                                $(".titlestoresArrow").slideToggle();
                                $("#storesArrow").toggleClass('icon-fa-collapsed-down');
                                $("#storesArrow").toggleClass('icon-fa-collapsed-top');
                            }
                        </script>
                    </div><!-- end logo-footer -->
                    <?php
                    /**
                     * Check page is osaka go list osaka shop
                     */
                    if ($is_osaka) { // is osaka page
                        // Start show list shop in Osaka
                        $osaka_shops = Yii::app()->cache->get("osaka_shops_{$language}");
                        // Detect if list osaka shop by language cache does not exist
                        if ($osaka_shops == false) {
                            // Init list shop
                            $osaka_shops = get_render_template('list_osaka_shop.php');
                            Yii::app()->cache->set("osaka_shops_{$language}", $osaka_shops);
                        }
                        // Render osaka shops
                        echo $osaka_shops;
                        /* End show list shop in Osaka*/

                        /* Start show list shop in kyoto*/
                        // Get list shop by cache
                        $list_shop = Yii::app()->cache->get("list_shop_{$language}");

                        // Detect if list shop by language cache does not exist
                        if ($list_shop == false) {
                            // Init list shop
                            $list_shop = get_render_template('list_kyoto_shop.php');
                            Yii::app()->cache->set("list_shop_{$language}", $list_shop);
                        }
                        // Render list shop
                        echo $list_shop;
                        /* End show list shop in kyoto*/

                        /* Start show list others shop */
                        $list_others_shop_osaka_page = Yii::app()->cache->get("list_others_shop_osaka_page_{$language}");
                        // Detect if list shop others by language cache does not exist
                        if ($list_others_shop_osaka_page == false) {
                            // Init list shop
                            $list_others_shop_osaka_page = get_render_template('list_others_shop_osaka_page.php');
                            Yii::app()->cache->set("list_others_shop_osaka_page_{$language}", $list_others_shop_osaka_page);
                        }
                        // Render list others shop
                        echo $list_others_shop_osaka_page;
                        /* End show list others shop */

                    } else if ($is_asakusa) { // is asakusa page
                        /* Start show list shop in asakusa*/
                        $asakusa_shops = Yii::app()->cache->get("asakusa_shops_{$language}");
                        // Detect if list osaka shop by language cache does not exist
                        if ($asakusa_shops == false) {
                            // Init list shop
                            $asakusa_shops = get_render_template('list_asakusa_shop.php');
                            Yii::app()->cache->set("asakusa_shops_{$language}", $asakusa_shops);
                        }
                        // Render osaka shops
                        echo $asakusa_shops;
                        /* End show list shop in asakusa*/

                        /* Start show list shop in kyoto*/
                        // Get list shop by cache
                        $list_shop = Yii::app()->cache->get("list_shop_{$language}");

                        // Detect if list shop by language cache does not exist
                        if ($list_shop == false) {
                            // Init list shop
                            $list_shop = get_render_template('list_kyoto_shop.php');
                            Yii::app()->cache->set("list_shop_{$language}", $list_shop);
                        }
                        // Render list shop
                        echo $list_shop;
                        /* End show list shop in kyoto*/

                        /* Start show list others shop */
                        $list_others_shop_asakusa_page = Yii::app()->cache->get("list_others_shop_asakusa_page_{$language}");
                        // Detect if list shop others by language cache does not exist
                        if ($list_others_shop_asakusa_page == false) {
                            // Init list shop
                            $list_others_shop_asakusa_page = get_render_template('list_others_shop_asakusa_page.php');
                            Yii::app()->cache->set("list_others_shop_asakusa_page_{$language}", $list_others_shop_asakusa_page);
                        }
                        // Render list others shop
                        echo $list_others_shop_asakusa_page;
                        /* End show list others shop */

                    } else { // is home page
                        /* Start show list kyoto shop */
                        // Get list shop by cache
                        $list_shop = Yii::app()->cache->get("list_shop_{$language}");
                        // Detect if list shop by language cache does not exist
                        if ($list_shop == false) {
                            // Init list shop
                            $list_shop = get_render_template('list_kyoto_shop.php');
                            Yii::app()->cache->set("list_shop_{$language}", $list_shop);
                        }
                        // Render list shop
                        echo $list_shop;
                        /* End show list kyoto shop */

                        /* Start show list others shop */
                        $list_others_shop_homepage = Yii::app()->cache->get("list_others_shop_homepage_{$language}");
                        // Detect if list others shop by language cache does not exist
                        if ($list_others_shop_homepage == false) {
                            // Init list shop
                            $list_others_shop_homepage = get_render_template('list_others_shop_homepage.php');
                            Yii::app()->cache->set("list_others_shop_homepage_{$language}", $list_others_shop_homepage);
                        }
                        // Render list others shop
                        echo $list_others_shop_homepage;
                        /* End show list others shop */
                    }
                } ?>
                <?php /*
                <div class="link-button-sp clearfix">
                    <div class="wrap-all" clearfix>
                        <div class="left-sp">
                            <a class="for-sp" href="https://line.me/ti/p/%40lvv9152n">
                                <img height="36" border="0" alt="友だち追加数" src="<?php echo WP_HOMES; ?>/images/addfriends-ja.png" />
                            </a>
                        </div>
                        <div class="right-sp">
                            <p class="name">
                                <?php echo Yii::t('wp_theme', 'LINEでお問い合わせ♪トーク画面でお気軽にお問い合わせください!!'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                */ ?>
                <div class="socialTop sns-ko" style='display:<?= $language == "ko" && !($isSmartPhone) ? "none" : "block"?>'>
                    <?php if($language=='ko'){?>
                        <div class="block-title-top-page-title bg-top-page-title mrg-bt-10 blog">
                        <h2>
                            <span class="icon-icon-today"></span>
                            <span class="en">SNS</span>
                        </h2>
                    </div>
                    <?php }?>
                <?php $facebook_id = array(
                    'ja'=>'kyotokimonorental',
                    'en'=>'KyotoKimonoRentalWargo',
                    'vi'=>'Kyoto-Kimono-Rental-Wargo-Vietnam-784703851634754',
                    'tw'=>'kyotokimonorentaltw',
                    'ko'=>'교토-기모노-렌탈-wargo-811808812257652',
                    'ru'=>'KyotoKimonoRentalWargo',
                    'th'=>'ร้านเช่ากิโมโนเกียวโต-Wargo-526268544225459',
                    'id'=>'kimonowargo',
                    'ms'=>'KyotoKimonoRentalWargo',
                    'fr'=>'kyotokimonorentalwargofr',
                    'cn'=>'kyotokimonorentaltw',
                    'hi'=>'KyotoKimonoRentalWargo',
                    );
                    $facebookLocales = array(
                        'ja'=>'ja_JP',
                        'en'=>'en_US',
                        'vi'=>'vi_VN',
                        'tw'=>'zh_TW',
                        'ko'=>'ko_KR',
                        'ru'=>'ru_RU',
                        'th'=>'th_TH',
                        'id'=>'id_ID',
                        'ms'=>'ms_MY',
                        'fr'=>'fr_FR',
                        'cn'=>'zh_CN',
                        'hi'=>'hi_IN',
                    );
                    $locale = $facebookLocales[$language];
                ?>
                <?php $twitter_id = array(
                    'ja'=>'kyotokimonorent',
                    'en'=>'kimono_wargo',
                    'vi'=>'kimono_wargo',
                    'tw'=>'kyotokimonorent',
                    'ko'=>'kyotokimonorent',
                    'ru'=>'kyotokimonorent',
                    'th'=>'social_thai',
                    'id'=>'kimono_wargo',
                    'ms'=>'kimono_wargo',
                    'fr'=>'kimono_wargo',
                    'cn'=>'kyotokimonorent',
                    'hi'=>'kimono_wargo',
                )
                ?>
                <div class="box-social-net-footer clearfix">
                    <?php if($language !='en' && $language !='id' && $language !='fr') { ?>


                    <div class="box-statistical">
                    <div class="box-social-net" style="width: 48.5%; float: left; padding-right: 20px;">
                            <div class="sec-facebook">
                                <?php if($language =="ko"){ ?>
                                        <h3 class="title-social-sns title-f-facebbok"><a href="https://www.facebook.com/<?php echo $facebook_id[$language]?>"><img src="<?php echo WP_HOME; ?>/images/f_facebook.png" /></a></h3>
                                <?php }?>
                                <div class="fb-page" data-href="https://www.facebook.com/<?php echo $facebook_id[$language]?>/" data-tabs="timeline, events, messages" data-width="500px" data-height="530px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/<?php echo $facebook_id[$language]?>" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/<?php echo $facebook_id[$language]?>">기모노 렌탈 wargo</a></blockquote></div>
                                <!-- Load Facebook SDK for JavaScript -->
	                            <script>(function(d, s, id) {
	                                var js, fjs = d.getElementsByTagName(s)[0];
	                                if (d.getElementById(id)) return;
	                                js = d.createElement(s); js.id = id;
	                                //js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4";
	                                js.src = "//connect.facebook.net/<?php echo $locale; ?>/sdk.js#xfbml=1&version=v2.4";
	                                fjs.parentNode.insertBefore(js, fjs);
	                            }(document, 'script', 'facebook-jssdk'));</script>
                            </div>
                            <!-- end sec-facebook -->
                            <?php
                            if($language == "ko"&& !($isSmartPhone)){?>
                            <?php
                            $instagram_id = 'kyotokimonorental.wargo';
                            ?>
                                <div class="instagram-box clearfix">
                                    <?php if($language =="ko"){ ?>
                                        <h3 class="title-social-sns title-i-instagram"><a href="https://www.instagram.com/<?php echo $instagram_id; ?>"><img src="<?php echo WP_HOME; ?>/images/i_instargram.png" /></a></h3>
                                    <?php }?>
                                    <a target="_blank" href="https://www.instagram.com/<?php echo $instagram_id; ?>/"><span class="logo-ins"><img src="<?php echo WP_HOME; ?>/images/logo-instagram.png" /></span><?php echo Yii::t('wp_theme', 'Follow us on Instagram'); ?></a>
                                    <?php
                                    $html_instagram = Yii::app()->controller->widget('application.components.widgets.instagram.Instagram', array(), true);
                                    echo $html_instagram;
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
	                    <div class="main-top-100" id="main-top-100" style="width: 46%"></div>
                    </div>


                </div>
                <!-- end box-social-net-footer -->
            <?php } ?>
                <!-- end wrap-menu-footer
            </div>end box-footer -->
                <!-- Instagram -->
                <?php
                $instagram_id = 'kyotokimonorental.wargo';
                ?>

                <?php if($language == "ko" && !($isSmartPhone)){ ?>
                        <div class="instagram-box clearfix" style="display: none">
                            <a target="_blank" href="https://www.instagram.com/<?php echo $instagram_id; ?>/"><span class="logo-ins"><img src="<?php echo WP_HOME; ?>/images/logo-instagram.png" /></span><?php echo Yii::t('wp_theme', 'Follow us on Instagram'); ?></a>
                            <?php
                            $html_instagram = Yii::app()->controller->widget('application.components.widgets.instagram.Instagram', array(), true);
                            echo $html_instagram;
                            ?>
                        </div>
                <?php } ?>
                <?php if($language !='en' && $language !='id' && $language !='fr' && $language !='ko') { ?>
                    <div class="instagram-box clearfix">
                        <a target="_blank" href="https://www.instagram.com/<?php echo $instagram_id; ?>/"><span class="logo-ins"><img src="<?php echo WP_HOME; ?>/images/logo-instagram.png" /></span><?php echo Yii::t('wp_theme', 'Follow us on Instagram'); ?></a>
                        <?php
                        $html_instagram = Yii::app()->controller->widget('application.components.widgets.instagram.Instagram', array(), true);
                        echo $html_instagram;
                        ?>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if ($isSmartPhone && $language == "ko"){?>
            <div class="socialTop sns-ko sns-ko-sp">
                <div class="block-title-top-page-title bg-top-page-title mrg-bt-10 blog">
                    <h2>
                        <span class="icon-icon-today"></span>
                        <span class="en">SNS</span>
                    </h2>
                </div>
                <?php $facebook_id = array(
                    'ja'=>'kyotokimonorental',
                    'en'=>'KyotoKimonoRentalWargo',
                    'vi'=>'Kyoto-Kimono-Rental-Wargo-Vietnam-784703851634754',
                    'tw'=>'kyotokimonorentaltw',
                    'ko'=>'교토-기모노-렌탈-wargo-811808812257652',
                    'ru'=>'KyotoKimonoRentalWargo',
                    'th'=>'ร้านเช่ากิโมโนเกียวโต-Wargo-526268544225459',
                    'id'=>'kimonowargo',
                    'ms'=>'KyotoKimonoRentalWargo',
                )
                ?>
                <?php $twitter_id = array(
                    'ja'=>'kyotokimonorent',
                    'en'=>'kimono_wargo',
                    'vi'=>'kimono_wargo',
                    'tw'=>'kyotokimonorent',
                    'ko'=>'kyotokimonorent',
                    'ru'=>'kyotokimonorent',
                    'th'=>'social_thai',
                    'id'=>'kimono_wargo',
                    'ms'=>'kimono_wargo',
                )
                ?>
                <div class="box-social-net-footer clearfix">
                        <div class="box-social-net" style="width: 48.5%; float: left; padding-right: 20px;">
                            <div class="sec-item sec-naver-1">
                                <div class="title-social-sns title-naver"><a href="http://cafe.naver.com/kyotokimono"><img src="<?php echo WP_HOME; ?>/images/CAFE-NAVER-TITLE.png"/></a></div>
                                <div class="button-link button-link-naver"><a href="http://cafe.naver.com/kyotokimono"><img src="<?php echo WP_HOME; ?>/images/CAFE-NAVER-BUTTON.png"/></a></div>
                            </div>
                            <div class="sec-item sec-naver-2">
                                <div class="title-social-sns title-naver"><a href="http://blog.naver.com/wargo"><img src="<?php echo WP_HOME; ?>/images/BLOG-NAVER-TITLE.png"/></a></div>
                                <div class="button-link button-link-naver"><a href="http://blog.naver.com/wargo"><img src="<?php echo WP_HOME; ?>/images/BLOG-NAVER-BUTTON.png"/></a></div>
                            </div>
                            <div class="sec-item sec-facebook">
                                <h3 class="title-social-sns title-f-facebbok"><a href="https://www.facebook.com/<?php echo $facebook_id[$language]?>"><img src="<?php echo WP_HOME; ?>/images/f_facebook.png" /></a></h3>
                                <div class="fb-page button-link button-link-facebook" data-href="https://www.facebook.com/<?php echo $facebook_id[$language]?>/" data-tabs="timeline, events, messages" data-width="500px" data-height="530px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/<?php echo $facebook_id[$language]?>" class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/<?php echo $facebook_id[$language]?>">
                                            <img src="<?php echo WP_HOME; ?>/images/button-link-facebook.jpg" alt="">
                                        </a></blockquote>
                                </div>
                            </div>
                            <?php
                                $instagram_id = 'kyotokimonorental.wargo';
                            ?>
                                    <div class="sec-item instagram-box clearfix">
                                        <h3 class="title-social-sns title-i-instagram"><a href="https://www.instagram.com/<?php echo $instagram_id; ?>"><img src="<?php echo WP_HOME; ?>/images/i_instargram.png" /></a></h3>
                                        <a class="button-link button-link-instagram" target="_blank" href="https://www.instagram.com/<?php echo $instagram_id; ?>/"><span class="logo-ins"><img src="<?php echo WP_HOME; ?>/images/logo-instagram.png" /></span><img src="<?php echo WP_HOME; ?>/images/button-link-instagram.jpg" alt=""></a>
                                        <?php
                                        $html_instagram = Yii::app()->controller->widget('application.components.widgets.instagram.Instagram', array(), true);
                                        echo $html_instagram;
                                        ?>
                                    </div>
                            <div class="sec-item sec-twitter">
                                <h3 class="title-social-sns title-t-twitter"><a href="https://twitter.com/<?php echo $twitter_id[$language]?>"><img src="<?php echo WP_HOME; ?>/images/f_twitter.png" /></a></h3>
                                <a class="twitter-timeline" width="500" height="530" href="https://twitter.com/<?php echo $twitter_id[$language]?>">@kyotokimonorent からのツイート</a>
                                <a class="button-link button-link-twitter" href="https://twitter.com/<?php echo $twitter_id[$language]?>"><img src="<?php echo WP_HOME; ?>/images/button-link-twitter.png" alt=""></a>
                                <script>!function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                        if (!d.getElementById(id)) {
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = p + "://platform.twitter.com/widgets.js";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }
                                    }(document, "script", "twitter-wjs");</script>
                            </div>
                        </div>
                <?php } ?>
            <!-- end container -->
            <div class="clearAll"></div>
        </div>
        </div>
        <!-- end div.colophon-zone-top -->
        <?php $footer_purple = get_render_template('footer_purple.php');
            echo $footer_purple;
         ?>

</footer><!-- #colophon -->

</div><!-- #end sb-site -->


<?php
$header_menu = $is_yukata ? 'menu-sp-yukata' : 'menu-sp-kimono';
?>
<!-- end .sb-left -->
</div><!-- #page -->
<?php wp_footer(); ?>

<!-- Slidebars -->
<?php
	if($isSmartPhone){
		$clientScript = Yii::app()->clientScript;
		$clientScript->registerScriptFile(Yii::app()->getBaseUrl(true).'/js/slidebars.js');
		$clientScript->registerScriptFile(Yii::app()->getBaseUrl(true).'/js/slidebars-custom.js');
	}
?>
<div class="sb-slidebar sb-right">
    <div id="menu-close" class=""><a href="javascript:void(0);" id="btn-close" title="Close">Close</a></div>
    <?php
    // Get sp menu by cache
    $sp_menu = Yii::app()->cache->get("{$header_menu}_{$language}");
    // Check if sp menu cache does not exist
    if ($sp_menu == false) {
        // Get sp menu from DB
        $sp_menu = wp_nav_menu(array(
            'theme_location' => 'primary',
            //'menu'=>'HeaderMenu',
            'menu' => $header_menu,
            'menu_class' => 'sub-menu nav-list',
            'container_id' => 'wrap-sub-menu',
            'echo' => false
        ));
        // Set sp menu cache
        Yii::app()->cache->set("{$header_menu}_{$language}", $sp_menu, 0);
    }
    // Render sp menu
    echo $sp_menu;
    ?>
</div>
	<?php if(!$isSmartPhone){ ?>
	<link href="<?php echo WP_HOME;?>/react/static/css/main.css" rel="stylesheet">
	<script id="lazy-calendar">
		LazyLoad.register('main-top-100',
			function(){
				LazyLoad.importJs('top100','main-top-100');
			},
			{offset: 200}
		).addJs('top100'
			, base_url + '/react/static/js/main.js'
		);
	</script>
	<?php } ?>
</body>
</html>
<?php
function get_list_shop_template()
{
    ob_start();
    require('list_shop_template.php');
    return ob_get_clean();
}

?>
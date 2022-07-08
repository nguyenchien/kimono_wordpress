<?php
/**
 * Header template
 * Author: Loi Dang
 * Date: 10/5/2015
 * Time: 4:58 PM
 */

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
global $isSmartPhone, $language,$is_yukata, $post;
$lang = Yii::app()->language;
$isFrontPage = is_front_page();
$isTopPageYukata = is_page('yukata') || is_page('yukata/plan');
$subBannersKimonoSP = get_field('sub_banners_kimono_sp');
$subBannersKimonoPC = get_field('sub_banners_kimono_pc');
$isLandingPage = is_page('kyotokimono-lp');
//wp_deregister_script( 'jquery' );
if($isSmartPhone){
}else{
    wp_register_style('sidebar-left-v3-pc-style', get_template_directory_uri() . '/css/sidebar-left-v3-pc.css', array('twentytwelve-style'), '20200615');
    wp_enqueue_style('sidebar-left-v3-pc-style');
}
?>
<?php if($isSmartPhone):?>
    <div class="wrap-overlay"></div>
    <?php if ($isLandingPage) : ?>
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar wrap-toggle-left-sidebar-v3"></div>
            <?php $pathUrl = WP_HOME .((Yii::app()->language != 'ja')? '/'.Yii::app()->language:''); ?>
            <div class="close-sidebar"><span class="closed"></span></div>
        </div>
    <?php elseif ($isFrontPage || $isTopPageYukata) : ?>
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar wrap-toggle-left-sidebar-v3"></div>
            <?php $pathUrl = WP_HOME .((Yii::app()->language != 'ja')? '/'.Yii::app()->language:''); ?>
            <div class="close-sidebar"><span class="closed"></span></div>
        </div>
    <?php else : ?>
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar wrap-toggle-left-sidebar-v3"></div>
            <?php $pathUrl = WP_HOME .((Yii::app()->language != 'ja')? '/'.Yii::app()->language:''); ?>
            <div class="close-sidebar"><span class="closed"></span></div>
        </div>
    <?php endif; ?>
<?php endif?>
<style type="text/css">
    .wrap-ad-campaign{
        background-color: #a82127;
    }
    .wrap-ad-campaign img{
        position: relative;
        z-index: 9;
    }
    .breadcrumbs-kimono {
        padding-top: 4px;
        margin-bottom: 1px;
        overflow: hidden;
    }
</style>
<div class="header-highend-v2 header-kimono-landing">
    <div class="num-height">
        <div class="top-header">
            <div class="container-box">
                <div class="box-header fix flexbox">
	                <?php
	                    $postNameArray_top = array('access','kyoto-area','tokyo-area','osaka-area','shizuoka-area');
	                    $postNameArray_v1 = array('gion-nishiki','kiyomizuzaka');
	                ?>
                    <?php if(strpos($url, 'access') != true):?>
                        <?php if($isSmartPhone):?>
                            <?php if(is_page('yukata') && !is_page('lesson/yukata')):?>
			                    <h1 class="header-new-title"><?= Yii::t('access-v2', '京都で浴衣レンタルなら「京都きものレンタルwargo」人気観光地や駅近くに安心の全国13店舗！')?></h1>
                            <?php elseif(is_page('yukata/plan') || is_page('lesson/yukata')): ?>
			                    <p class="header-new-title"><?= Yii::t('access-v2', '京都で浴衣レンタルなら「京都きものレンタルwargo」人気観光地や駅近くに安心の全国13店舗！')?></p>
                            <?php else: ?>
		                        <?php $is_top_page = is_front_page(); if($is_top_page): ?>
				                    <h1 class="header-new-title"><?= Yii::t('access-v2', '京都で着物レンタルなら「京都きものレンタルwargo」人気観光地や駅近くに安心の全国13店舗！')?></h1>
                                <?php else: ?>
	                                <?php if(strpos($url, 'kimono') == true):?>
					                    <h2 class="header-new-title"><?= Yii::t('access-v2', '京都で着物レンタルなら「京都きものレンタルwargo」人気観光地や駅近くに安心の全国13店舗！')?></h2>
	                                <?php else: ?>
					                    <h1 class="header-new-title"><?= Yii::t('access-v2', '京都で着物レンタルなら「京都きものレンタルwargo」人気観光地や駅近くに安心の全国13店舗！')?></h1>
	                                <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(is_page('yukata') && !is_page('lesson/yukata')):?>
			                    <h1 class="header-new-title"><?= Yii::t('access-v2', '京都で浴衣レンタルなら「京都きものレンタルwargo」| 人気観光地や駅近くに安心の全国13店舗！')?></h1>
                            <?php elseif(is_page('yukata/plan') || is_page('lesson/yukata')): ?>
			                    <p class="header-new-title"><?= Yii::t('access-v2', '京都で浴衣レンタルなら「京都きものレンタルwargo」| 人気観光地や駅近くに安心の全国13店舗！')?></p>
                            <?php else: ?>
                                <?php $is_top_page = is_front_page(); if($is_top_page): ?>
				                    <h1 class="header-new-title"><?= Yii::t('access-v2', '京都で着物レンタルなら「京都きものレンタルwargo」| 人気観光地や駅近くに安心の全国13店舗！')?></h1>
                                <?php else: ?>
                                    <?php if(strpos($url, 'kimono') == true):?>
					                    <h2 class="header-new-title"><?= Yii::t('access-v2', '京都で着物レンタルなら「京都きものレンタルwargo」| 人気観光地や駅近くに安心の全国13店舗！')?></h2>
                                    <?php else: ?>
					                    <h1 class="header-new-title"><?= Yii::t('access-v2', '京都で着物レンタルなら「京都きものレンタルwargo」| 人気観光地や駅近くに安心の全国13店舗！')?></h1>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php
                            if(in_array($post->post_name,$postNameArray_top)){
                                $page_h1 = get_field('page_h1');
                                echo '<h1 class="header-new-title">'.do_shortcode(php_set_base_url($page_h1)).'</h1>';
                            }elseif(in_array($post->post_name,$postNameArray_v1)){
                                $h1_title_cate = get_field('h1_title_cate');
                                echo '<h1 class="header-new-title">'.do_shortcode(php_set_base_url($h1_title_cate)).'</h1>';
                            }else{
                                if($isSmartPhone){
                                    $titlepage_h1_sp = get_field('title_page_h1_sp');
                                    if($titlepage_h1_sp){
                                        echo str_replace('page-title','header-new-title',do_shortcode(php_set_base_url($titlepage_h1_sp)));
                                    }else{
                                        $title_list_cate_sp = get_field('title_list_cate_sp');
                                        if($title_list_cate_sp){
                                            echo '<h1 class="header-new-title">'.do_shortcode(php_set_base_url($title_list_cate_sp)).'</h1>';
                                        }
                                    }
                                }else{
                                    $titlepage_h1_pc = get_field('title_page_h1_pc');
                                    if($titlepage_h1_pc){
                                        echo str_replace('page-title','header-new-title',do_shortcode(php_set_base_url($titlepage_h1_pc)));
                                    }else{
                                        $title_list_cate_pc = get_field('title_list_cate_pc');
                                        if($title_list_cate_pc){
                                            echo '<h1 class="header-new-title">'.do_shortcode(php_set_base_url($title_list_cate_pc)).'</h1>';
                                        }
                                    }
                                }
	                        }
                        ?>
	                    <style>
		                    @media screen and (max-width:767px){
			                    .header-new-title {
				                    width: 290px;
				                    min-height: 22px;
				                    display: flex;
				                    align-items: center;
			                    }
		                    }
	                    </style>
                    <?php endif; ?>
	                <div class="wrap-languages">
		                <div class="dropdown-lang">
			                <div class="text-dropdown-lang">
				                <span class="unit-lang"><?php echo Yii::t('new_header_highend', 'JP'); ?></span>
			                </div>
		                </div>
		                <div class="wrap-list-lang">
			                {{language_item_menu}}
		                </div>
	                </div>
                </div>
            </div>
        </div><!--end top-header-->
	    <?php if($isSmartPhone): ?>
		    <div class="new-banner-header">
			    <img src="<?= WP_HOME; ?>/images/banner-goto-sp.jpg" alt="祝「GO TO キャンペーン」再開記念 wargoグループ全店で利用できる10％OFFチケット配布中!!">
		    </div>
	    <?php else: ?>
		    <div class="new-banner-header" style="background-image:url('<?= WP_HOME; ?>/images/banner-goto-pc.jpg');height: 60px;">
			    <img style="display:none;" src="<?= WP_HOME; ?>/images/banner-goto-pc.jpg" alt="祝「GO TO キャンペーン」再開記念 wargoグループ全店で利用できる10％OFFチケット配布中!!">
		    </div>
	    <?php endif; ?>

	    <?php
            $today = intval(date("Ymd"));
	        if($today <= 20211101){
                if($isFrontPage){
	    ?>
            <h2 class="title-header-sub">コールセンターの電話番号は、11/1（月）より<br class="sp">03-4582-4864になります</h2>
			<style>
				.title-header-sub {
					color: #fff;
					font-size: 15px;
					background-color: rgba(100,1,37,1);
					padding: 10px 5px;
					text-align: center;
					letter-spacing: 1px;
					line-height: 1.2;
				}
				@media screen and (max-width:767px){
					.title-header-sub {
						font-size: 12px;
						padding: 5px;
						letter-spacing: 0;
					}
				}
			</style>
        <?php }} ?>
        <div class="bottom-header fix">
            <div class="container-box">
                <div class="box-bt-header flexbox">
                    <div class="wrap-box-common wrap-box-content-left flexbox">
	                    <div class="wrap-lang-social flexbox pc">
		                    <div class="wrap-social flexbox">
                                <?php if($language == 'ja'): ?>
				                    <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img data-src="<?php echo WP_HOME; ?>/images/icons/icon-twitter-new.svg" style="border-radius:5px;" alt="" /></a></span>
				                    <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img data-src="<?php echo WP_HOME; ?>/images/icons/icon-facebook-new.svg" alt="" /></a></span>
                                <?php else: ?>
                                    <?php if($language == 'th'): ?>
					                    <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorentalth/"><img data-src="<?php echo WP_HOME; ?>/images/icons/icon-facebook-new.svg" alt="" /></a></span>
                                    <?php else: ?>
					                    <span class="social twitter"><a target="_blank" href="https://twitter.com/kimono_wargo/"><img data-src="<?php echo WP_HOME; ?>/images/icons/icon-twitter-new.svg" style="border-radius:5px;" alt="" /></a></span>
					                    <span class="social facebook"><a target="_blank" href="https://www.facebook.com/KyotoKimonoRentalWargo/"><img data-src="<?php echo WP_HOME; ?>/images/icons/icon-facebook-new.svg" alt="" /></a></span>
                                    <?php endif; ?>
                                <?php endif; ?>
			                    <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img data-src="<?php echo WP_HOME; ?>/images/icons/icon-instagram-new.svg" alt="" /></a></span>
		                    </div><!--end wrap social-->
	                    </div><!--end wrap-lang-social-->
                   </div>
                    <?php if($isSmartPhone):?>
                        <div class="wrap-logo flexbox">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                <img src="<?php echo WP_HOME; ?>/images/new-kimono/logo-sp.svg" alt="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                            </a>
                            <?php $isAreaPage = is_page_template('page-templates/new-top-page-kimono.php') && !($isFrontPage || $isTopPageYukata) ? true : false; ?>

                        </div><!--end wrap-logo-->
                    <?php else: ?>
                        <div class="wrap-logo flexbox">
                            <?php if($is_yukata):?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                    <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/logo-other-yukata.svg" alt="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                                </a>
                            <?php else:?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                    <img data-src="<?php echo WP_HOME; ?>/images/new-kimono/logo-other.svg" alt="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                                </a>
                            <?php endif;?>
                            <?php $isAreaPage = is_page_template('page-templates/new-top-page-kimono.php') && !($isFrontPage || $isTopPageYukata) ? true : false; ?>
                        </div><!--end wrap-logo-->
	                    <div class="wrap-box-common pc register-btn">
		                    <a href="<?php echo WP_HOME ?>/faq" class="flexbox box-common align-items-center">
			                    <p class="icon-common icon-formal-qa flexbox">
				                    <img data-src="<?= WP_HOME; ?>/images/landing-page/icon-faq-v3.svg" alt="">
			                    </p>
			                    <span class="name">Q & A</span>
		                    </a>
	                    </div><!--end wrap-favorite-->
                        <div class="wrap-box-common pc register-btn">
                            <a href="<?php echo WP_HOME ?>/common/register" class="flexbox box-common align-items-center">
                                <p class="icon-common icon-formal-member flexbox">
	                                <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/icon-common-register.svg">
                                </p>
                                <span class="name">新規会員登録</span>
                            </a>
                        </div><!--end wrap-favorite-->
                        <div class="wrap-box-common pc login-btn">
                            <a href="<?php echo WP_HOME ?>/common/login" class="flexbox box-common align-items-center">
                                <p class="icon-common icon-formal-login flexbox">
                                    <img data-src="<?= WP_HOME; ?>/images/new-kimono-v3/icon-common-login.svg" alt="">
                                </p>
                                <span class="name"><?php echo Yii::t('new_header_highend', 'ログイン') ?></span>
                            </a>
                        </div>
                        <div class="wrap-box-common pc common-btn" style="display: none;">
                            <a href="<?php echo WP_HOME ?>/common" class="flexbox box-common align-items-center">
                                <p class="icon-common icon-formal-login flexbox">
                                    <img data-src="<?= WP_HOME; ?>/images/landing-page/icon-login-v3.svg" alt="">
                                </p>
                                <span class="name"><?php echo Yii::t('new_header_highend', 'マイページ') ?></span>
                            </a>
                        </div><!--end wrap-favorite-->
                        <div class="wrap-box-common pc logout-btn" style="display: none;">
                            <a href="<?php echo WP_HOME ?>/newBooking/cart" class="flexbox box-common align-items-center">
                                <p class="icon-common icon-formal-cart flexbox">
                                    <img data-src="<?= WP_HOME; ?>/images/landing-page/icon-shopping-cart-v3.svg" alt="">
                                </p>
                                <span class="name"><?php echo Yii::t('new_header_highend', 'ログアウト') ?></span>
                            </a>
                        </div>
                        <!--end wrap-favorite-->
	                    <!--<div class="wrap-cart wrap-box-common">
                            <a href="<?php echo WP_HOME ?>/newBooking/cart" class="flexbox box-common align-items-center">
                                <p class="icon-common icon-formal-cart flexbox">
                                    <img data-src="<?= WP_HOME; ?>/images/landing-page/icon-shopping-cart-v3.svg" alt="">
                                </p>
                                <span class="name">カゴの中身</span>
                            </a>
                        </div>-->
                    <?php endif; ?>

                    <?php if($isSmartPhone) : ?>
                        <div class="wrap-toggle-menu flexbox align-items-center justify-content-center">
                            <p class="wrap-icon-toggle"></p>
                            <p class="wrap-icon-toggle"></p>
                            <p class="wrap-icon-toggle"></p>
                            <p class="text-menu"><?php echo Yii::t('new_header_highend', 'Menu'); ?></p>
                        </div><!--end wrap-toggle-menu-->
                    <?php endif ?>
                </div>
            </div>
        </div><!--end bottom-header-->
    </div>
    <div class="wraper-menu-banner flexbox">
        <?php if(!$isSmartPhone) : ?>
            <div class="wrap-header-menu-formal">
                <div class="container-box">
	                <a href="/howto" class="flexbox box-common align-items-center menu-howto">
		                <p class="icon-common icon-formal-guid flexbox">
			                <img data-src="<?= WP_HOME; ?>/images/landing-page/icon-how-to-gray.svg" alt="">
		                </p>
		                <span class="name">初めての方へ</span>
	                </a>
                    <?php
//                    if($is_yukata){
//                        wp_nav_menu(array(
//                            'theme_location' => 'primary',
//                            'menu'=>'MenuNewYukata',
//                            'menu_class' => 'list-menu-formal list-menu-new-kimono flexbox',
//                            'container_id' => 'ListMenuNewYukata',
//                        ));
//                    }
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu'=>'MenuNewKimonoLandingPage',
                        'menu_class' => 'list-menu-formal list-menu-new-kimono list-menu-new-kimono-landing-page flexbox',
                        'container_id' => 'ListMenuNewKimonoLandingPage',
                    ));
                    ?>
                </div>
            </div>
        <?php endif ?>
    </div><!--end wraper-menu-banner flexbox-->
    </div><!--end header-highend-v2-->

<?php
$cs=Yii::app()->getClientScript();
ob_start();
?>
<script>
    $(document).ready(function () {
        var numHeight = $(".num-height").outerHeight();
        var langT = (curLang == "ja") ? '' : '/' + curLang;
        var wrapToggleLeftSidebar = $(".wrap-toggle-left-sidebar");

        $(document).click(function(e) {
            if(!$(e.target).closest('.dropdown-lang').length) {
                $('.wrap-list-lang').slideUp();
            }
        });

        /* Begin: dropdown-lang */
        $(".dropdown-lang").click(function () {
            $(".wrap-list-lang").slideToggle();
        });
        $(".unit-lang").text("<?php echo $language; ?>");
        /* End: dropdown-lang */

        /* Begin: Fixed header */
        var numHeader = $(".top-header").outerHeight();
        $(window).on("scroll", function(){

            <?php if ($isSmartPhone) { ?>
                if($(this).scrollTop() > numHeader){
                    $(".bottom-header").addClass("fixed-header");
                    //$(".wrap-top-header").hide();
                    $(".wrap-languages").hide();
                }else{
                    $(".bottom-header").removeClass("fixed-header");
                    //$(".wrap-top-header").show();
                    $(".wrap-languages").show();
                }

                wrapToggleLeftSidebar.css("top", + numHeight);
            <?php } else{ ?>
                if($(this).scrollTop() > numHeader){
                    $(".bottom-header").addClass("fixed-header");
                    $(".wrap-header-menu-formal").addClass("fixed-menu");
                }else{
                    $(".bottom-header").removeClass("fixed-header");
                    $(".wrap-header-menu-formal").removeClass("fixed-menu");
                }
            <?php } ?>

        });
        /* End: fixed header */

        <?php if ($isSmartPhone) : ?>
            $(".list-menu-formal .item-menu-formal a").on('click', function(){
                $(this).parent().toggleClass('menu-active')
            });

            /* Begin: toggle left sidebar */
            $(".wrap-toggle-menu").click(function() {
                var apiUrl = baseUrl + langT + '/api/booking/GetSidebarKimonoTop';
                <?php if ($isTopPageYukata) : ?>
                apiUrl = baseUrl + langT + '/api/booking/GetSidebarKimonoTop?page=yukata';
                <?php endif; ?>

                if (wrapToggleLeftSidebar.is(':empty')) {
                    // Call ajax show content sidebar left for SmartPhone
                    $.ajax({
                        url: apiUrl,
                        dataType: "html",
                        success: function (data) {
                            wrapToggleLeftSidebar.html(data);
                            wrapToggleLeftSidebar.css("top", +numHeight).addClass("active");
                            $('.wrap-overlay').addClass('overlay-toggle');
                            $('body, html').addClass('fixed-body');
                            $('.close-sidebar .closed').addClass('show');
                        }
                    });
                } else {
                    wrapToggleLeftSidebar.css("top", +numHeight).addClass("active");
                    $('.wrap-overlay').addClass('overlay-toggle');
                    $('body, html').addClass('fixed-body');
                    $('.close-sidebar .closed').addClass('show');
                }
            });

            function closeSidebar(el){
            $('.wrap-overlay').removeClass('overlay-toggle');
            $('.wrap-toggle-left-sidebar').removeClass('active');
            $('.close-sidebar .closed').removeClass('show');
            $('body, html').removeClass('fixed-body');
        }

            $('.close-sidebar').on('click', function(){
            closeSidebar();
        });

	        $(document).on('click', function(e){
                if(!$(e.target).closest('.wrap-toggle-left-sidebar, .wrap-toggle-menu').length) {
                    closeSidebar();
                }
            });
            /* End: toggle left sidebar */

        <?php endif; ?>

    });
</script>
<?php
$js = ob_get_contents();
$js = str_replace('<script>','',$js);
$js = str_replace('</script>','',$js);
ob_end_clean();
$cs->registerScript('header_template_new_kimono_landing',$js, CClientScript::POS_END);
?>

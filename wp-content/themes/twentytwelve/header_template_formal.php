 <?php
/**
 * Header template
 * Author: Loi Dang
 * Date: 10/5/2015
 * Time: 4:58 PM
 */

global $isSmartPhone, $language,$is_yukata, $post;
remove_filter( 'the_content', 'wpautop' );
 $postName = $post->post_name;
 $post_parent = get_post($post->post_parent)->post_name;
 $post_parent = isset( $post_parent ) ? $post_parent : '';

 wp_enqueue_script('jquery-lazy', WP_HOME . '/js/jquery.lazy.min.js');
?>
 <style type="text/css">
     .wrap-ad-campaign{
         background-color: #a82127;
     }
     .wrap-ad-campaign img{
         position: relative;
         z-index: 9;
     }
 </style>
<?php if($isSmartPhone):?>
 <div class="wrap-overlay">
     <div class="wrap-relative-toggle">
         <div class="wrap-toggle-left-sidebar">
             <div class="box-left-toggle-sidebar">
                 <div class="toggle-left-sidebar"></div>
             </div>
         </div>
         <div class="close-sidebar sp"><span class="closed"></span></div>
     </div>
 </div>
<?php endif?>
<div class="header-highend-v2">
    <div class="num-height">
		<div class="top-header">
			<div class="container-box">
                <?php if(!is_page('formal')) :?>
					<div class="top-header">
						<div class="container-box">
							<p class="title-header-top">冠婚葬祭の着物レンタルは「きものレンタルwargo」<br class="sp"/>人気観光地や駅近くに安心の全13店舗！</p>
						</div>
					</div>
                <?php else: ?>
					<div class="top-header">
						<div class="container-box">
							<h1 class="title-header-top">冠婚葬祭の着物レンタルは「きものレンタルwargo」<br class="sp"/>人気観光地や駅近くに安心の全13店舗！</h1>
						</div>
					</div>
                <?php endif; ?>
			</div>
		</div>
		<div class="banner-plane">
			<img src="<?= WP_HOME; ?>/images/banner-goto-<?= $isSmartPhone ? 'sp' : 'pc'; ?>.jpg" alt="祝「GO TO キャンペーン」再開記念 wargoグループ全店で利用できる10％OFFチケット配布中!!">
		</div>

		<!--        <div class="top-header">-->
<!--            <div class="container-box">-->
<!--                <div class="box-header flexbox">-->
<!--					--><?php //if(!$isSmartPhone):?>
<!--						<div class="wrap-logo">-->
<!--								<a href="--><?php //echo esc_url( home_url( '/formal' ) ); ?><!--" title="--><?php //echo Yii::t('wp_theme', 'フォーマル着物レンタルなら、きものレンタルwargo');?><!--" rel="home">-->
<!--									<img src="--><?php //echo WP_HOME; ?><!--/images/formal-rental/logo-pc.png" alt="--><?php //echo Yii::t('wp_theme', 'フォーマル着物レンタルなら、きものレンタルwargo');?><!--" />-->
<!--								</a>-->
<!--						</div>-->
<!--					--><?php //endif; ?>
<!--                    <div class="wrap-top-header">-->
<!--                        <div class="wrap-info flexbox">-->
<!---->
<!--                            <div class="wrap-congress-store">-->
<!--                                <div class="top-text-cg-store">--><?php //echo Yii::t('new_header_highend', '日本最大級!'); ?><!--</div>-->
<!--                                <div class="number-store flexbox">--><?php //echo Yii::t('new_header_highend', '<p class="flexbox nation"><span>全</span><span>国</span></p><p class="num">13<var>店舗</var></p>'); ?><!--</div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="visitor flexbox align-items-center">-->
<!--                                <div class="left-vst flexbox">-->
<!--                                    <span class="year-vst">--><?php //echo Yii::t('new_header_highend', '2017年レンタル実績'); ?><!--</span>-->
<!--                                    <div class="box-vst flexbox align-items-center">-->
<!--                                        <span class="icon-crown"><img src="--><?php //echo WP_HOME; ?><!--/images/formal-rental/icon-crown.svg" alt="" /></span>-->
<!--                                        <span class="text-vst">--><?php //echo Yii::t('new_header_highend', '祝'); ?><!--</span>-->
<!--                                        <span class="num-vst">--><?php //echo Yii::t('new_header_highend', '150,162'); ?><!--<var>--><?php //echo Yii::t('new_header_highend', '人!!'); ?><!--</var></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            --><?php //if(!$isSmartPhone) : ?>
<!--                                <div class="option-check flexbox align-items-center justify-content-center md-sp">-->
<!--                                    <ul class="list-opt-check flexbox">-->
<!--                                        <li class="item-opt-check flexbox align-items-center">-->
<!--                                            <span class="icon icon-formal-checked"></span>-->
<!--                                            <span class="text-opt-check">--><?php //echo Yii::t('new_header_highend', '手ぶらでOK!!'); ?><!--</span>-->
<!--                                        </li>-->
<!--                                        <li class="item-opt-check flexbox align-items-center">-->
<!--                                            <span class="icon icon-formal-checked"></span>-->
<!--                                            <span class="text-opt-check">--><?php //echo Yii::t('new_header_highend', '着付け無料!!'); ?><!--</span>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            --><?php //endif; ?>
<!--                            <div class="xs-hidden">&nbsp;</div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="bottom-header">
            <div class="container-box">
                <div class="box-bt-header flexbox">
                    <?php if(!$isSmartPhone) : ?>
                        <div class="wrap-lang-social flexbox">
                            <div class="wrap-social flexbox">
                                <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img src="<?php echo WP_HOME; ?>/images/icons/icon-twitter-new.svg" style="border-radius:5px;" alt="" /></a></span>
                                <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img src="<?php echo WP_HOME; ?>/images/icons/icon-facebook-new.svg" alt="" /></a></span>
                                <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img src="<?php echo WP_HOME; ?>/images/icons/icon-instagram-new.svg" alt="" /></a></span>
                            </div>
                        </div>
                    <?php endif; ?>
					<div class="wrap-logo">
						<a href="<?php echo esc_url( home_url( '/formal' ) ); ?>" title="<?php echo Yii::t('wp_theme', 'フォーマル着物レンタルなら、きものレンタルwargo');?>" rel="home">
							<img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-sp.png" alt="<?php echo Yii::t('wp_theme', 'フォーマル着物レンタルなら、きものレンタルwargo');?>" />
						</a>
					</div>
                    <?php if(!$isSmartPhone) : ?>
						<div class="wrap-box-common ">
							<a href="<?php echo WP_HOME ?>/formalfaq" class="flexbox box-common align-items-center">
								<span class="icon-common icon-formal-qa flexbox">
									<img src="<?= WP_HOME; ?>/images/landing-page/icon-faq-v3.svg" alt="">
								</span>
								<span class="name">Q & A</span>
							</a>
						</div>
						<div class="wrap-box-common ">
							<a href="<?php echo WP_HOME ?>/common/register" class="flexbox box-common align-items-center">
								<span class="icon-common icon-formal-cm-add flexbox"></span>
								<span class="name">新規会員登録</span>
							</a>
						</div>
						<div class="wrap-box-common ">
							<a href="<?php echo WP_HOME ?>/common/login" class="flexbox box-common align-items-center">
								<span class="icon-common icon-formal-cm-login flexbox"></span>
								<span class="name"><?php echo Yii::t('new_header_highend', 'ログイン') ?></span>
							</a>
						</div>
                    <?php endif; ?>
<!--                    <div class="wrap-box-common pc">-->
<!--                        <a href="--><?php //echo WP_HOME ?><!--/formalfaq" class="flexbox box-common align-items-center">-->
<!--                            <p class="icon-common icon-formal-qa flexbox">-->
<!--                                <img style="width: 50px; height: 22px" src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-faq-v3.svg?ver=20200305" alt="">-->
<!--                            </p>-->
<!--                            <span class="name new">Q & A</span>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="wrap-box-common pc">-->
<!--                        <a href="--><?php //echo WP_HOME ?><!--/faq/contactwp" class="flexbox box-common align-items-center">-->
<!--                            <p class="icon-common lg icon-formal-contact flexbox">-->
<!--                                <img style="width: 50px; height: 22px" src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-contact-v3.svg?ver=20200305" alt="">-->
<!--                            </p>-->
<!--                            <span class="name new">--><?//= Yii::t('access-v2', 'お問い合わせ')?><!--</span>-->
<!--                        </a>-->
<!--                    </div>-->
                    <?php if($isSmartPhone) : ?>
                    <div class="wrap-toggle-menu flexbox align-items-center justify-content-center">
                        <p class="wrap-icon-toggle">
                            <span class="icon-toggle icon-formal-menu-toggle-open flexbox"></span>
                        </p>
                        <p class="text-menu">Menu</p>
                    </div>
                    <?php endif; ?>
<!--                    <div class="wrap-box-common pc register-btn" style="display: none;">-->
<!--                        <a href="--><?php //echo WP_HOME ?><!--/common/register" class="flexbox box-common align-items-center">-->
<!--                            <span class="icon-common icon-formal-cm-add flexbox"></span>-->
<!--                            <span class="name">--><?php //echo Yii::t('new_header_highend', '新規会員登録') ?><!--</span>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="wrap-box-common pc login-btn" style="display: none;">-->
<!--                        <a href="--><?php //echo WP_HOME ?><!--/common/login" class="flexbox box-common align-items-center">-->
<!--                            <span class="icon-common icon-formal-cm-login flexbox"></span>-->
<!--                            <span class="name">--><?php //echo Yii::t('new_header_highend', 'ログイン') ?><!--</span>-->
<!--                        </a>-->
<!--                    </div>-->
					<!--end wrap-favorite-->
                    <div class="wrap-box-common pc common-btn" style="display: none;">
                        <a href="<?php echo WP_HOME ?>/common" class="flexbox box-common align-items-center">
                            <span class="icon-common icon-formal-mypage flexbox"></span>
                            <span class="name"><?php echo Yii::t('new_header_highend', 'マイページ') ?></span>
                        </a>
                    </div>
                    <div class="wrap-box-common pc logout-btn" style="display: none;">
                        <a href="<?php echo WP_HOME ?>/common/do#/logout" class="flexbox box-common align-items-center">
                            <span class="icon-common icon-formal-logout flexbox"></span>
                            <span class="name"><?php echo Yii::t('new_header_highend', 'ログアウト') ?></span>
                        </a>
                    </div>
                    <!--<div class="wrap-cart-favorite wrap-favorite">
                        <span class="icon-choosed icon-formal-heart-3 flexbox">
                            <span class="add-num-cart flexbox align-items-center justify-content-center">0</span>
                            <span class="name pc"><?php echo Yii::t('new_header_highend', 'お気に入り') ?></span>
                        </span>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <?php
        $today = intval(date("Ymd"));
        if($today <= 20211101){
            if($post->post_name == "formal"){
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
    <div class="wraper-menu-banner flexbox">
        <?php if(isset($post) && ($post->post_name == "formal")): ?>
            <div class="banner-top-highend-v2">
                <div class="container-box">
                    <div class="slider-banner slider-formal">
                        <div id="sliderNewHighend" class="flexslider slider-new-highend">
                            <ul class="list-slider-banner slides">
                                <?php // Begin: For Main Banner ?>
                                    <?php if ( $isSmartPhone && get_field('main_banner_kimono_sp') ) : ?>
                                        <?php echo php_set_base_url(get_field('main_banner_kimono_sp')); ?>
                                    <?php endif; ?>
                                    <?php if ( !$isSmartPhone && get_field('main_banner_kimono_pc') ) : ?>
                                        <?php echo php_set_base_url(get_field('main_banner_kimono_pc')); ?>
                                    <?php endif; ?>
<!--                                    --><?php //if ( !$isSmartPhone && has_post_thumbnail() ) : ?>
<!--                                        <li class="item-slider-banner">-->
<!--                                            <a href="#">-->
<!--                                                --><?php //the_post_thumbnail('full'); ?>
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    --><?php //endif; ?>
                                <?php // End: For Main Banner ?>

                                <?php // Begin: For Sub Banners ?>
                                <?php if ( $isSmartPhone && get_field('sub_banners_kimono_sp') ) : ?>
                                    <?php echo php_set_base_url(get_field('sub_banners_kimono_sp')); ?>
                                <?php endif; ?>
                                <?php if ( !$isSmartPhone && get_field('sub_banners_kimono_pc') ) : ?>
                                    <?php echo php_set_base_url(get_field('sub_banners_kimono_pc')); ?>
                                <?php endif; ?>
                                <?php // End: For Sub Banners ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                        if (is_page('formal')) {
                            echo do_shortcode('[searchBoxTopPageFormal]');
                        }
                    ?>
                </div>
            </div>
            <?php if($isSmartPhone) : ?>
                <div class="wrap-fm-howto flexbox justify-content-center">
                    <a href="/formal/howto">
                        <div class="box-fm-howto flexbox">
                            <div class="howto-textleft">
                                <?php echo Yii::t('new-formal', '簡単、安心♪');?>
                            </div>
                            <div class="howto-textright">
                                <?php echo Yii::t('new-formal', '上級着物レンタルの流れ');?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <div class="wrap-header-menu-formal">
                <div class="container-box">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu'=>'MenuFormal',
                        'menu_class' => 'list-menu-formal flexbox',
                        'container_id' => 'ListMenuFormal',
                    ));
                    ?>
                </div>
            </div>
        <?php else: ?>
            <div class="wrap-header-menu-formal header-menu-formal-other">
                <div class="container-box">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu'=>'MenuFormal',
                        'menu_class' => 'list-menu-formal flexbox',
                        'container_id' => 'ListMenuFormal',
                    ));
                    ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        //Handle click outside
        $(document).click(function(e) {
            if(!$(e.target).closest('.dropdown-lang').length) {
                $('.wrap-list-lang').slideUp();
            }
        });

        //Dropdown language
        $(".dropdown-lang").click(function () {
            $(".wrap-list-lang").slideToggle();
        });
        $(".unit-lang").text("<?php echo $language; ?>");


        if(isSmartPhone()){
            //Fixed header
            var numHeader = $(".top-header").outerHeight();
            $(window).on("scroll", function(){
                if($(this).scrollTop() > numHeader){
                    $(".bottom-header").addClass("fixed-header");
                    $(".wrap-languages").hide();
                }else{
                    $(".bottom-header").removeClass("fixed-header");
                    $(".wrap-languages").show();
                }
            });

            <?php if($isSmartPhone) : ?>
            //Toogle left sidebar
            var numHeight = $(".num-height").outerHeight();
            $(".wrap-toggle-menu").on("click", function(e){
                e.preventDefault();
                if ($(".toggle-left-sidebar").is(":empty")) {
                    jQuery.ajax({
                        type: 'GET',
                        url: '/api/booking/getSidebar?is_sp=<?=$isSmartPhone ? 'true' : 'false'?>&post_name=<?=$postName?>&post_parent=<?=$post_parent?>',
                        success: function (data) {
                            if (data != null && data != "") {
                                $(".toggle-left-sidebar").html(data);
                                $('.toggle-left-sidebar img').lazy({
                                    appendScroll: $(".wrap-toggle-left-sidebar")
                                });
                                $(".wrap-toggle-left-sidebar").addClass("active").css("top", +numHeight);
                                $(".wrap-overlay").addClass("fixed-scroll overlay-toggle");
                                $(".closed").addClass("icon-formal-menu-toggle-close");
                            }
                        }
                    });
                } else {
                    $(".wrap-toggle-left-sidebar").addClass("active").css("top", + numHeight);
                    $(".wrap-overlay").addClass("fixed-scroll overlay-toggle");
                    $(".closed").addClass("icon-formal-menu-toggle-close");
                }
            });
            $(".close-sidebar .closed").on("click", function(){
                $(".wrap-toggle-left-sidebar, body, .wrap-overlay, .closed").removeClass("active fixed-scroll overlay-toggle icon-formal-menu-toggle-close");
            });
            $(".list-menu-formal .item-menu-formal a").on('click', function(){
                $(this).parent().toggleClass('menu-active')
            });
            <?php endif; ?>
        }
    })
</script>

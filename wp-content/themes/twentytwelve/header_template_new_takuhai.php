<?php
/**
 * Header template
 * Author: Loi Dang
 * Date: 10/5/2015
 * Time: 4:58 PM
 */
    wp_enqueue_script('new-formal-rental-script-slick', WP_HOME . '/js/slick.min.js');
    wp_register_style('new-formal-rental-style-slick', WP_HOME . '/css/slick.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-rental-style-slick');
    wp_register_style('new-formal-rental-style-slick-theme', WP_HOME . '/css/slick-theme.css', array('twentytwelve-style'));
    wp_enqueue_style('new-formal-rental-style-slick-theme');

global $isSmartPhone, $language,$is_yukata, $post;
?>
<?php if($isSmartPhone):?>
    <div class="wrap-overlay">
        <div class="wrap-relative-toggle">
            <div class="wrap-toggle-left-sidebar">
                <div class="box-left-toggle-sidebar">
                    <div class="toggle-left-sidebar sp">
                        <?php echo do_shortcode('[FormalSidebarLeft]'); ?>
                        <?php echo do_shortcode('[NewFormalBannerTopic menu-top-mobile="true"]'); ?>
                        <?php echo do_shortcode('[NewFormalBannerTopic device="mobile"]'); ?>
                    </div>
                </div>
            </div>
            <div class="close-sidebar sp"><span class="closed"></span></div>
        </div>
    </div>
<?php endif?>
<style type="text/css">
    .wrap-ad-campaign{
        background-color: #a82127;
    }
    .wrap-ad-campaign img{
        position: relative;
        z-index: 9;
    }
</style>
<div class="header-highend-v2">
    <div class="num-height">
		<?php
			$showTopHeader = false;
		?>
        <?php if($showTopHeader) :?>
			<div class="top-header">
				<div class="container-box">
					<div class="box-header flexbox">
                        <?php if($post->post_name == "takuhai"): ?>
							<div class="wrap-logo pc">
								<h1 class="logo-formal">
									<a href="<?php echo esc_url( home_url( '/formal' ) ); ?>" title="<?php echo Yii::t('wp_theme', '京都上級着物レンタルwargo');?>" rel="home">
										<img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-pc.png" alt="<?php echo Yii::t('wp_theme', '京都上級着物レンタルwargo');?>" />
									</a>
								</h1>
							</div><!--end wrap-logo-->
                        <?php else: ?>
							<div class="wrap-logo pc">
								<a href="<?php echo esc_url( home_url( '/formal' ) ); ?>" title="<?php echo Yii::t('wp_theme', '京都上級着物レンタルwargo');?>" rel="home">
									<img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-pc.png" alt="<?php echo Yii::t('wp_theme', '京都上級着物レンタルwargo');?>" />
								</a>
							</div><!--end wrap-logo-->
                        <?php endif; ?>
						<div class="wrap-top-header">
							<div class="wrap-info flexbox">

								<div class="wrap-congress-store">
									<div class="top-text-cg-store"><?php echo Yii::t('new_header_highend', '日本最大級!'); ?></div>
									<div class="number-store flexbox"><?php echo Yii::t('new_header_highend', '<p class="flexbox nation"><span>全</span><span>国</span></p><p class="num">13<var>店舗</var></p>'); ?></div>
								</div><!--end wrap-congress-store-->

								<div class="visitor flexbox align-items-center">
									<div class="left-vst flexbox">
										<span class="year-vst"><?php echo Yii::t('new_header_highend', '2017年レンタル実績'); ?></span>
										<div class="box-vst flexbox align-items-center">
											<span class="icon-crown"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-crown.svg" alt="" /></span>
											<span class="text-vst"><?php echo Yii::t('new_header_highend', '祝'); ?></span>
											<span class="num-vst"><?php echo Yii::t('new_header_highend', '150,162'); ?><var><?php echo Yii::t('new_header_highend', '人!!'); ?></var></span>
										</div>
									</div>
								</div><!--end visitor-->

								<div class="option-check flexbox align-items-center justify-content-center pc md-sp">
									<ul class="list-opt-check flexbox">
										<li class="item-opt-check flexbox align-items-center">
											<span class="icon icon-formal-checked"></span>
											<div class="wrap-text-opt-chk-tkh">
												<span class="text-opt-check"><?php echo Yii::t('new_header_takuhai', '<p>全国どこでも</p><p>【送料無料】!!</p>'); ?></span>
											</div>
										</li>
									</ul>
								</div><!--end option check-->
								<div class="xs-hidden">&nbsp;</div>
							</div><!--end wrap-info-->
						</div><!--end wrap-top-header-->
					</div>
				</div>
			</div>
			<!--end top-header-->
        <?php endif; ?>
		<div class="top-header">
			<div class="container-box">
				<h1 class="title-header-top">着物の宅配レンタルは「きものレンタルwargo」<br class="sp"/>全国47都道府県に美しい着物を安くお届け！</h1>
			</div>
		</div>
		<div class="banner-plane">
			<img src="<?= WP_HOME; ?>/images/banner-goto-<?= $isSmartPhone ? 'sp' : 'pc'; ?>.jpg" alt="祝「GO TO キャンペーン」再開記念 wargoグループ全店で利用できる10％OFFチケット配布中!!">
		</div>
		<div class="bottom-header">
            <div class="container-box">
                <div class="box-bt-header flexbox">
                    <?php if(!$isSmartPhone):?>
                        <div class="wrap-lang-social flexbox pc">
                            <div class="wrap-social flexbox">
								<span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img src="<?php echo WP_HOME; ?>/images/icons/icon-twitter-new.svg" style="border-radius:5px;" alt="" /></a></span>
								<span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img src="<?php echo WP_HOME; ?>/images/icons/icon-facebook-new.svg" alt="" /></a></span>
								<span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img src="<?php echo WP_HOME; ?>/images/icons/icon-instagram-new.svg" alt="" /></a></span>
                            </div><!--end wrap social-->
                        </div><!--end wrap-lang-social-->
                    <?php endif?>
<!--                        <div class="text-lang">--><?php //echo Yii::t('new_header_highend', 'Languages'); ?><!--</div>-->
<!--                        <div class="dropdown-lang flexbox align-items-center justify-content-between">-->
<!--                            <span class="icon icon-formal-globe"></span>-->
<!--                            <span class="unit-lang">--><?php //echo Yii::t('new_header_highend', 'JP'); ?><!--</span>-->
<!--                            <span class="arrow-down-lang"></span>-->
<!--                        </div>-->
<!--                        <div class="wrap-list-lang">-->
<!--                            {{language_item_menu}}-->
<!--                        </div>-->
<!--                    </div>-->
					<!--end wrap languages-->
                    <?php if($post->post_name == "takuhai"): ?>
                        <?php if($isSmartPhone):?>
                            <div class="wrap-logo">
                                <h2>
                                    <a href="<?php echo esc_url( home_url( '/takuhai' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                        <img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-takuhai.png" alt="京都きものレンタル" />
                                    </a>
                                </h2>
                            </div><!--end wrap-logo-->
                        <?php else: ?>
                            <div class="wrap-logo">
                                <a href="<?php echo esc_url( home_url( '/takuhai' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                    <img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-takuhai.png" alt="京都きものレンタル" />
                                </a>
                            </div><!--end wrap-logo-->
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="wrap-logo">
                            <a href="<?php echo esc_url( home_url( '/takuhai' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-takuhai.png" alt="京都きものレンタル" />
                            </a>
                        </div><!--end wrap-logo-->
                    <?php endif; ?>
                    <?php if($isSmartPhone):?>
                        <div class="wrap-toggle-menu flexbox align-items-center justify-content-center sp">
                            <p class="wrap-icon-toggle">
                                <span class="icon-toggle icon-formal-menu-toggle-open flexbox"></span>
                            </p>
                            <p class="text-menu">Menu</p>
                        </div><!--end wrap-toggle-menu-->
                    <?php endif?>
						<div class="wrap-box-common pc register-btn">
							<a href="<?php echo WP_HOME ?>/formalfaq" class="flexbox box-common align-items-center">
								<p class="icon-common icon-formal-qa flexbox">
									<img style="height: 25px;" src="<?= WP_HOME; ?>/images/landing-page/icon-faq-v3.svg" alt="">
								</p>
								<span class="name">Q & A</span>
							</a>
						</div>
                        <div class="wrap-box-common pc register-btn" style="display: none;">
                            <a href="<?php echo WP_HOME ?>/common/register" class="flexbox box-common align-items-center">
                                <span class="icon-common icon-formal-cm-add flexbox"></span>
                                <span class="name"><?php echo Yii::t('new_header_highend', '新規会員登録') ?></span>
                            </a>
                        </div>
                        <div class="wrap-box-common pc login-btn" style="display: none;">
                            <a href="<?php echo WP_HOME ?>/common/login" class="flexbox box-common align-items-center">
                                <span class="icon-common icon-formal-cm-login flexbox"></span>
                                <span class="name"><?php echo Yii::t('new_header_highend', 'ログイン') ?></span>
                            </a>
                        </div>
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

                    <!-- <div class="wrap-cart-favorite wrap-favorite">
                        <span class="icon-choosed icon-formal-heart-3 flexbox">
                            <span class="add-num-cart flexbox align-items-center justify-content-center">0</span>
                        </span>
                    </div> -->
                </div>
            </div>
        </div><!--end bottom-header-->
    </div>
    <div class="wraper-menu-banner flexbox">
        <?php if($post->post_name == "takuhai" || $post->post_name == "list" || $post->post_name == "howto"): ?>
        <div class="banner-top-highend-v2">
            <div class="container-box">
                <div class="slider-banner">
                    <div id="sliderNewHighend" class="flexslider slider-new-highend">
                        <ul class="list-slider-banner slides">
                            <?php // Begin: For Main Banner ?>
                            <?php if ( $isSmartPhone && get_field('main_banner_kimono_sp') ) : ?>
                                <?php echo php_set_base_url(get_field('main_banner_kimono_sp')); ?>
                            <?php endif; ?>
                            <?php if ( !$isSmartPhone && has_post_thumbnail() ) : ?>
                                <li class="item-slider-banner">
                                    <?php the_post_thumbnail('full'); ?>
                                </li>
                            <?php endif; ?>
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
                    echo do_shortcode('[searchBoxTopPageFormal]');
                ?><!--end wrap-form--top-->
            </div>
        </div><!--end banner-top-highend-v2-->
            <div class="wrap-fm-howto flexbox justify-content-center sp">
                <a href="/takuhai/howto">
                    <div class="box-fm-howto flexbox">
                        <div class="howto-textleft"><?php echo Yii::t('new-formal','簡単、安心♪') ?></div>
                        <div class="howto-textright"><?php echo Yii::t('new-formal','ネット宅配着物レンタルの流れ') ?></div>
                    </div>
                </a>
            </div>
			<div class="wrap-header-menu-formal">
				<div class="container-box">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'menu'=>'MenuTakuhai',
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
    </div><!--end wraper-menu-banner flexbox-->
</div><!--end header-highend-v2-->

<script type="text/javascript">
    $(document).ready(function () {
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

        if(isSmartPhone()){
            /* Begin: Fixed header */
            var numHeader = $(".top-header").outerHeight();
            $(window).on("scroll", function(){
                if($(this).scrollTop() > numHeader){
                    $(".bottom-header").addClass("fixed-header");
//                   $(".wrap-top-header").hide();
                    $(".wrap-languages").hide();
                }else{
                    $(".bottom-header").removeClass("fixed-header");
//                   $(".wrap-top-header").show();
                    $(".wrap-languages").show();
                }
            });
            /* End: fixed header */

            /* Begin: toggle left sidebar */
            var numHeight = $(".num-height").outerHeight();
            $(".wrap-toggle-menu").on("click", function(){
//            $('.wrap-toggle-menu .icon-toggle').toggleClass("icon-formal-menu-toggle-open icon-formal-menu-toggle-close");
//            $(".wrap-toggle-left-sidebar").addClass("active");
                $(".wrap-toggle-left-sidebar").addClass("active").css("top", + numHeight);
                $("body, .wrap-overlay").addClass("fixed-scroll overlay-toggle");
                $(".closed").addClass("icon-formal-menu-toggle-close");
            });
            $(".close-sidebar .closed").on("click", function(){
                $(".wrap-toggle-left-sidebar, body, .wrap-overlay, .closed").removeClass("active fixed-scroll overlay-toggle icon-formal-menu-toggle-close");
            });
            /* End: toggle left sidebar */
            $(".list-menu-formal .item-menu-formal a").on('click', function(){
                $(this).parent().toggleClass('menu-active')
            });
        }
    })
</script>

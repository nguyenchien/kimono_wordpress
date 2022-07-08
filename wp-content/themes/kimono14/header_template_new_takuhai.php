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
<div class="wrap-toggle-left-sidebar">
    <div class="box-left-toggle-sidebar flexbox">
        <div class="close-sidebar sp"><span class="closed">&times;</span></div>
        <div class="toggle-left-sidebar sp">
            <?php echo do_shortcode('[FormalSidebarLeft]'); ?>
        </div>
    </div>
</div>
<?php endif?>
<div class="header-highend-v2">
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
    </div><!--end top-header-->
    <div class="bottom-header">
        <div class="container-box">
            <div class="box-bt-header flexbox">
                <div class="wrap-toggle-menu flexbox align-items-center justify-content-center sp">
                    <p class="wrap-icon-toggle">
                        <span class="icon-toggle icon-formal-menu-toggle-open flexbox"></span>
                    </p>
                    <p class="text-menu">Menu</p>
                </div><!--end wrap-toggle-menu-->

                <?php if($post->post_name == "takuhai"): ?>
                    <?php if($isSmartPhone):?>
                    <div class="wrap-logo">
                        <h1>
                            <a href="<?php echo esc_url( home_url( '/takuhai' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-takuhai.png" alt="京都きものレンタル" />
                            </a>
                        </h1>
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
                <div class="wrap-languages">
                    <div class="text-lang"><?php echo Yii::t('new_header_highend', 'Languages'); ?></div>
                    <div class="dropdown-lang flexbox align-items-center justify-content-between">
                        <span class="icon icon-formal-globe"></span>
                        <span class="unit-lang"><?php echo Yii::t('new_header_highend', 'JP'); ?></span>
                        <span class="arrow-down-lang"></span>
                    </div>
                    <div class="wrap-list-lang">
                        {{language_item_menu}}
                    </div>
                </div><!--end wrap languages-->

                <div class="wrap-lang-social flexbox pc">
                    <div class="wrap-social flexbox">
                        <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-twitter.svg" alt="" /></a></span>
                        <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-facebook.svg" alt="" /></a></span>
                        <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-instagram.svg" alt="" /></a></span>
                    </div><!--end wrap social-->
                </div><!--end wrap-lang-social-->

                <?php
                Yii::app()->controller->widget('application.components.widgets.formal.FormalMiniCart', array(
                    'id' => 'wrap-shopping-cart'
                ));
                ?>
            </div>
        </div>
    </div><!--end bottom-header-->
    <div class="wraper-menu-banner flexbox">
        <?php if($post->post_name == "takuhai" || $post->post_name == "list" || $post->post_name == "howto"): ?>
        <div class="banner-top-highend-v2">
            <div class="container-box">
                <div class="slider-banner">
                    <div id="sliderNewHighend" class="flexslider slider-new-highend">
                        <ul class="list-slider-banner slides">
                            <li class="item-slider-banner">
                                <a href="#">
                                    <img class="pc" src="<?php echo WP_HOME; ?>/images/formal-rental/new-takuhai-banner-pc.jpg" alt=""/>
                                    <img class="sp" src="<?php echo WP_HOME; ?>/images/formal-rental/new-takuhai-banner-sp.jpg" alt=""/>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                if (is_page('takuhai')) {
                    echo do_shortcode('[searchBoxTopPageFormal]');
                }
                ?><!--end wrap-form--top-->
            </div>
        </div><!--end banner-top-highend-v2-->
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
        <?php
            if($isSmartPhone):
        ?>
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
        $(".wrap-toggle-menu").on("click", function(){
//          $('.wrap-toggle-menu .icon-toggle').toggleClass("icon-formal-menu-toggle-open icon-formal-menu-toggle-close");
            $(".wrap-toggle-left-sidebar").addClass("active");
            $("body").addClass("fixed-scroll");
        });
        $(".close-sidebar .closed").on("click", function(){
            $(".wrap-toggle-left-sidebar").removeClass("active");
            $("body").removeClass("fixed-scroll");
        });
        /* End: toggle left sidebar */
        <?php endif?>

        if(isSmartPhone()){
            $(".list-menu-formal .item-menu-formal a").on('click', function(){
                $(this).parent().toggleClass('menu-active')
            });
        }
    })
</script>
 <?php
/**
 * Header template
 * Author: Loi Dang
 * Date: 10/5/2015
 * Time: 4:58 PM
 */
//wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'));
//wp_enqueue_style('new-formal-rental-style');

global $isSmartPhone, $language,$is_yukata, $post;

 $pathUrl = WP_HOME . ((Yii::app()->language != 'ja')? '/'.Yii::app()->language:'');

 $postName = $post->post_name;
 $pages_has_new_style = array('homongi', 'ubugi');
 $is_title_new_style = in_array($postName, $pages_has_new_style);
 $page_template_current = get_page_template();
 $page_template_name = basename($page_template_current, '.php');
 $templates_has_new_style = array('new-formal-product-list', 'formal-new-access-child-page-v2');
 $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
 <style>
     .fixed-header {
         position: fixed;
         background-color: #fff;
         z-index: 999;
         top: 0;
         width: 100%;
         border-bottom: 2px solid #e9e1d1;
     }
 </style>
<?php if($isSmartPhone):?>
    <div class="wrap-overlay"></div>
    <div class="wrap-relative-toggle">
        <div class="wrap-toggle-left-sidebar sb-left-fm">
            <div class="box-left-toggle-sidebar">
                <div class="toggle-left-sidebar"></div>
            </div>
        </div>
        <div class="close-sidebar"><span class="closed"></span></div>
    </div>
<?php endif?>

<div class="header-highend-v2 header-formal">
    <div class="num-height">
        <?php
			$arrHeader = array (
				'homongi' => '訪問着レンタル | 結婚式・入学式・卒業式・お宮参り・七五三・お茶会・パーティーに安心のフルセット!',
				'brand' => 'お宮参りに高級感のあるブランド産着（祝着・祝い着）レンタル｜きものレンタルwargo',
				'ginza-honten' => '銀座で着物レンタルなら「きものレンタルwargo」',
				'sendai-parco2' => '仙台で着物レンタルなら「きものレンタルwargo」',
				'sapporo-susukinostation' => '札幌で着物レンタルなら、「きものレンタル wargo」',
				'sendagaya' => '原宿・千駄ヶ谷で着物レンタルなら「きものレンタルwargo」',
				'hakata' => '博多で着物レンタルなら「きものレンタルwargo」'
			);

			$arrExistedHeader = array ('irotomesode', 'kurotomesode', 'ubugi');
        ?>

		<?php if(array_key_exists($post->post_name, $arrHeader)) :?>
			<div class="top-header">
				<div class="container-box">
					<h1 class="title-header-top">
						<?php
                        	echo $arrHeader[$post->post_name];
                        ?>
					</h1>
				</div>
			</div>
		<?php else: ?>
			<div class="top-header">
				<div class="container-box">
                    <?php if(strpos($currentUrl, 'formal/access')):?>
						<h1 class="title-header-top">組定で基物レンタルなら「きものレンタルwargo」</h1>
                    <?php else: ?>
						<div class="top-header">
							<div class="container-box">
								<p class="title-header-top">冠婚葬祭の着物レンタルは「きものレンタルwargo」<br class="sp"/>人気観光地や駅近くに安心の全13店舗！</p>
							</div>
						</div>
                    <?php endif?>
				</div>
			</div>
		<?php endif; ?>

		<div class="banner-plane">
			<img src="<?= WP_HOME; ?>/images/banner-goto-<?= $isSmartPhone ? 'sp' : 'pc'; ?>.jpg" alt="祝「GO TO キャンペーン」再開記念 wargoグループ全店で利用できる10％OFFチケット配布中!!">
		</div>

<!--        <div class="top-header">-->
<!--            <div class="container-box">-->
<!--                <div class="box-header flexbox">-->
<!--                    <div class="wrap-top-header flexbox">-->
<!--                        <div class="wrap-info flexbox">-->
<!---->
<!--                            <div class="wrap-congress-store">-->
<!--                                <div class="top-text-cg-store">--><?php //echo Yii::t('new_header_highend', '日本最大級!'); ?><!--</div>-->
<!--                                <div class="number-store flexbox">--><?php //echo Yii::t('new_header_highend', '<p class="flexbox nation"><span>全</span><span>国</span></p><p class="num">20<var>店舗</var></p>'); ?><!--</div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="visitor flexbox align-items-center">-->
<!--                                --><?php //if($isSmartPhone):?>
<!--                                    <span class="year-vst">--><?php //echo Yii::t('new_header_highend', '2017年レンタル実績'); ?><!--</span>-->
<!--                                --><?php //endif ?>
<!--                                <div class="left-vst flexbox">-->
<!--                                    <div class="box-vst flexbox align-items-center">-->
<!--                                        <span class="icon-crown">-->
<!--                                            <span class="icon-crown"><img src="--><?php //echo WP_HOME; ?><!--/images/formal-rental/icon-crown-formal.svg" alt="" /></span>-->
<!--                                        </span>-->
<!--                                        <span class="text-vst">--><?php //echo Yii::t('new_header_highend', '祝'); ?><!--</span>-->
<!--                                        <div class="flexbox group-year-num">-->
<!--                                            --><?php //if(!$isSmartPhone):?>
<!--                                                <span class="year-vst">--><?php //echo Yii::t('new_header_highend', '2017年レンタル実績'); ?><!--</span>-->
<!--                                            --><?php //endif ?>
<!--                                            <span class="num-vst">--><?php //echo Yii::t('new_header_highend', '150,162'); ?><!--<var>--><?php //echo Yii::t('new_header_highend', '人!!'); ?><!--</var></span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="option-check flexbox align-items-center justify-content-center md-sp">-->
<!--                                <ul class="list-opt-check flexbox">-->
<!--                                    <li class="item-opt-check flexbox align-items-center">-->
<!--                                        <span class="icon icon-formal-checked-1"></span>-->
<!--                                        <span class="text-opt-check">--><?php //echo Yii::t('new_header_highend', '手ぶらでOK!!'); ?><!--</span>-->
<!--                                    </li>-->
<!--                                    <li class="item-opt-check flexbox align-items-center">-->
<!--                                        <span class="icon icon-formal-checked-1"></span>-->
<!--                                        <span class="text-opt-check">--><?php //echo Yii::t('new_header_highend', '着付け無料!!'); ?><!--</span>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        --><?php //if(!$isSmartPhone):?>
<!--                        <div class="bottom-header">-->
<!--                            <div class="wrap-lang-social flexbox pc">-->
<!--                                <div class="wrap-social flexbox">-->
<!--                                    <span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img src="--><?php //echo WP_HOME; ?><!--/images/formal-rental/icon-instagram.svg" alt="" /></a></span>-->
<!--                                    --><?php //if($language == 'ja'): ?>
<!--                                        <span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img src="--><?php //echo WP_HOME; ?><!--/images/formal-rental/icon-twitter.svg" alt="" /></a></span>-->
<!--                                        <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img src="--><?php //echo WP_HOME; ?><!--/images/formal-rental/icon-facebook.svg" alt="" /></a></span>-->
<!--                                    --><?php //else: ?>
<!--                                        --><?php //if($language == 'th'): ?>
<!--                                            <span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorentalth/"><img src="--><?php //echo WP_HOME; ?><!--/images/formal-rental/icon-facebook.svg" alt="" /></a></span>-->
<!--                                        --><?php //else: ?>
<!--                                            <span class="social twitter"><a target="_blank" href="https://twitter.com/kimono_wargo/"><img src="--><?php //echo WP_HOME; ?><!--/images/formal-rental/icon-twitter.svg" alt="" /></a></span>-->
<!--                                            <span class="social facebook"><a target="_blank" href="https://www.facebook.com/KyotoKimonoRentalWargo/"><img src="--><?php //echo WP_HOME; ?><!--/images/formal-rental/icon-facebook.svg" alt="" /></a></span>-->
<!--                                        --><?php //endif; ?>
<!--                                    --><?php //endif; ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        --><?php //endif; ?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="bottom-header">
            <div class="container-box">
                <div class="box-bt-header flexbox">
					<div class="wrap-lang-social flexbox pc">
						<div class="wrap-social flexbox">
                            <?php if($language == 'ja'): ?>
								<span class="social twitter"><a target="_blank" href="https://twitter.com/kyotokimonorent"><img src="<?php echo WP_HOME; ?>/images/icons/icon-twitter-new.svg" style="border-radius:5px;" alt="" /></a></span>
								<span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorental"><img src="<?php echo WP_HOME; ?>/images/icons/icon-facebook-new.svg" alt="" /></a></span>
                            <?php else: ?>
                                <?php if($language == 'th'): ?>
									<span class="social facebook"><a target="_blank" href="https://www.facebook.com/kyotokimonorentalth/"><img src="<?php echo WP_HOME; ?>/images/icons/icon-facebook-new.svg" alt="" /></a></span>
                                <?php else: ?>
									<span class="social twitter"><a target="_blank" href="https://twitter.com/kimono_wargo/"><img src="<?php echo WP_HOME; ?>/images/icons/icon-twitter-new.svg" style="border-radius:5px;" alt="" /></a></span>
									<span class="social facebook"><a target="_blank" href="https://www.facebook.com/KyotoKimonoRentalWargo/"><img src="<?php echo WP_HOME; ?>/images/icons/icon-facebook-new.svg" alt="" /></a></span>
                                <?php endif; ?>
                            <?php endif; ?>
							<span class="social instagram"><a target="_blank" href="https://www.instagram.com/kyotokimonorental.wargo"><img src="<?php echo WP_HOME; ?>/images/icons/icon-instagram-new.svg" alt="" /></a></span>
						</div>
					</div>

                    <?php if($isSmartPhone):?>
                        <div class="wrap-logo flexbox">
                            <a href="<?php echo esc_url( home_url( '/formal' ) ); ?>" title="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-sp.png" alt="<?php echo $isTopPageYukata ? Yii::t('new-kimono-header', '京都浴衣レンタルwargo | 人気観光地近くに安心の13店舗!') : Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                            </a>
                            <?php $isAreaPage = is_page_template('page-templates/new-top-page-kimono.php') && !($isFrontPage || $isTopPageYukata) ? true : false; ?>

                        </div><!--end wrap-logo-->
                    <?php else: ?>
                        <div class="wrap-logo flexbox">
                            <a href="<?php echo esc_url( home_url( '/formal' ) ); ?>" title="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" rel="home">
                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/logo-sp.png" alt="<?php echo Yii::t('new-kimono-header', '京都着物レンタルwargo');?>" />
                            </a>
                        </div><!--end wrap-logo-->
                    <?php endif; ?>
					<div class="wrap-box-common wrap-box-content-left flexbox">
                        <?php if($isSmartPhone):?>
<!--							<a href="/howto" class="flexbox box-common align-items-center">-->
<!--								<p class="icon-common icon-formal-guid flexbox">-->
<!--									<img src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-how-to-v3.svg" alt="">-->
<!--								</p>-->
<!--								<span class="name">初めての方へ</span>-->
<!--							</a>-->
<!--							<a href="--><?php //echo WP_HOME ?><!--/newBooking/cart" class="flexbox box-common align-items-center">-->
<!--								<p class="icon-common icon-formal-cart flexbox">-->
<!--									<img src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-shopping-cart-v3.svg" alt="">-->
<!--								</p>-->
<!--								<span class="name">カゴの中身</span>-->
<!--							</a>-->
                        <?php else: ?>
<!--							<a href="--><?php //echo WP_HOME ?><!--/howto" class="flexbox box-common align-items-center">-->
<!--								<p class="icon-common icon-formal-guid flexbox">-->
<!--									<img src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-how-to-v3.svg" alt="">-->
<!--								</p>-->
<!--								<span class="name">初めての方へ</span>-->
<!--							</a>-->
							<a href="<?php echo WP_HOME ?>/formalfaq" class="flexbox box-common align-items-center">
								<p class="icon-common icon-formal-qa flexbox">
									<img src="<?= WP_HOME; ?>/images/landing-page/icon-faq-v3.svg" alt="">
								</p>
								<span class="name">Q & A</span>
							</a>
							<a href="<?php echo WP_HOME ?>/common/register" class="flexbox box-common align-items-center">
								<p class="icon-common icon-formal-cm-add flexbox"></p>
								<span class="name">会員登録</span>
							</a>
							<a href="<?php echo WP_HOME ?>/common/login" class="flexbox box-common align-items-center">
								<p class="icon-common icon-formal-cm-login flexbox"></p>
								<span class="name"><?php echo Yii::t('new_header_highend', 'ログイン') ?></span>
							</a>
							<!--                            <a href="--><?php //echo WP_HOME ?><!--/faq/contactwp" class="flexbox box-common align-items-center">-->
							<!--                                <p class="icon-common icon-formal-contact flexbox">-->
							<!--                                    <img src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-contact-v3.svg" alt="">-->
							<!--                                </p>-->
							<!--                                <span class="name">お問い合わせ</span>-->
							<!--                            </a>-->
                        <?php endif; ?>
					</div>

<!--                    <div class="wrap-box-common pc register-btn" style="display: none;">-->
<!--                        <a href="--><?php //echo WP_HOME ?><!--/common/register" class="flexbox box-common align-items-center">-->
<!--                            <p class="icon-common icon-formal-member flexbox">-->
<!--                                <img src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-register-v3.svg" alt="">-->
<!--                            </p>-->
<!--                            <span class="name">会員登録</span>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="wrap-box-common pc login-btn" style="display: none;">-->
<!--                        <a href="--><?php //echo WP_HOME ?><!--/common/login" class="flexbox box-common align-items-center">-->
<!--                            <p class="icon-common icon-formal-login flexbox">-->
<!--                                <img src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-login-v3.svg" alt="">-->
<!--                            </p>-->
<!--                            <span class="name">--><?php //echo Yii::t('new_header_highend', 'ログイン') ?><!--</span>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="wrap-box-common pc common-btn" style="display: none;">-->
<!--                        <a href="--><?php //echo WP_HOME ?><!--/common" class="flexbox box-common align-items-center">-->
<!--                            <p class="icon-common icon-formal-login flexbox">-->
<!--                                <img src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-login-v3.svg" alt="">-->
<!--                            </p>-->
<!--                            <span class="name">--><?php //echo Yii::t('new_header_highend', 'マイページ') ?><!--</span>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="wrap-box-common pc logout-btn" style="display: none;">-->
<!--                        <a href="--><?php //echo WP_HOME ?><!--/newBooking/cart" class="flexbox box-common align-items-center">-->
<!--                            <p class="icon-common icon-formal-cart flexbox">-->
<!--                                <img src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-shopping-cart-v3.svg" alt="">-->
<!--                            </p>-->
<!--                            <span class="name">--><?php //echo Yii::t('new_header_highend', 'ログアウト') ?><!--</span>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="wrap-cart wrap-box-common">-->
<!--                        <a href="--><?php //echo WP_HOME ?><!--/newBooking/cart" class="flexbox box-common align-items-center">-->
<!--                            <p class="icon-common icon-formal-cart flexbox">-->
<!--                                <img src="--><?//= WP_HOME; ?><!--/images/landing-page/icon-shopping-cart-v3.svg" alt="">-->
<!--                            </p>-->
<!--                            <span class="name">カゴの中身</span>-->
<!--                        </a>-->
<!--                    </div>-->

                    <?php if($isSmartPhone) : ?>
                        <div class="wrap-toggle-menu flexbox align-items-center justify-content-center sp">
                            <p class="wrap-icon-toggle"></p>
                            <p class="wrap-icon-toggle"></p>
                            <p class="wrap-icon-toggle"></p>
                            <p class="text-menu"><?php echo Yii::t('new_header_highend', 'Menu'); ?></p>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="wraper-menu-banner flexbox">
        <?php if(!$isSmartPhone):?>
            <?php if($post->post_name == "formal" || $post->post_name == "list"): ?>
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
        <?php endif?>
    </div>
</div>

 <?php
 $cs=Yii::app()->getClientScript();
 ob_start();
 ?>
 <script>
     $(document).ready(function () {
     	// Add fixed header
         var numHeader = $(".top-header").outerHeight();
		 $(window).on("scroll", function(){

			 <?php if($$isSmartPhone){ ?>
				 if($(this).scrollTop() > numHeader){
					 $(".bottom-header").addClass("fixed-header");
					 //$(".wrap-top-header").hide();
					 $(".wrap-languages").hide();
				 }else{
					 $(".bottom-header").removeClass("fixed-header");
					 //$(".wrap-top-header").show();
					 $(".wrap-languages").show();
				 }
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


         <?php if($isSmartPhone){ ?>
             //Fixed header
             var numHeight = $('.num-height').outerHeight();
             console.log(numHeader);
             $(window).on('scroll', function(){
                 if($(this).scrollTop() > numHeight){
                     $('.bottom-header').addClass('fixed-header');
                     $('.wrap-languages').hide();
                 }else{
                     $('.bottom-header').removeClass('fixed-header');
                     $('.wrap-languages').show();
                 }
             });

             //Toogle left sidebar
             $('.wrap-toggle-menu').on('click', function(){
				 $('.wrap-overlay').addClass('overlay-toggle');
				 $('.sb-left-fm ').addClass('active').css('top', + numHeight);
                 $('.close-sidebar .closed').addClass('show');
                 $('html').addClass('fixed-body');

             });

             function closeSidebar(el){
				 $('.wrap-overlay').removeClass('overlay-toggle');
				 $('.sb-left-fm ').removeClass('active');
                 $('.close-sidebar .closed').removeClass('show');
                 $('html').removeClass('fixed-body');
             }
             $('.close-sidebar').on('click', function(){
				 closeSidebar();
             });
             $(document).on('click', function(e){
				 if(!$(e.target).closest('.sb-left-fm, .wrap-toggle-menu').length) {
					 closeSidebar();
				 }
             });
             $(".list-menu-formal .item-menu-formal a").on('click', function(){
                 $(this).parent().toggleClass('menu-active')
             });
         <?php } ?>
     })
 </script>
 <?php
 $js = ob_get_contents();
 $js = str_replace('<script>','',$js);
 $js = str_replace('</script>','',$js);
 ob_end_clean();
 $cs->registerScript('header-template-formal-v2',$js, CClientScript::POS_END);
 ?>

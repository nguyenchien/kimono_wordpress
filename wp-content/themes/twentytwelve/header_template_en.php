<?php
/**
 * New Header template for EN FR languages
 * Author: Hà Lan
 * Date: 22/09/2017
 * Time: 1:00 PM
 */
global $isSmartPhone, $language,$is_yukata;
?>
<header id="masthead" class="site-header" role="banner">
	<div class="container container-new container-new-header clearfix">
		<div class="left-header-column left-new-header">
			<div class="logo">
				{{before_logo}}
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo WP_HOME; ?>/images/logo-kimono-rental-ja.png" alt="<?php echo Yii::t('wp_theme', '京都で着物レンタル・浴衣レンタルするなら、京都No.1のwargoで！');?>" />
				</a>
				{{after_logo}}
			</div>
			<!--/logo-->
			<?php if($language == 'id') { ?>
				<div class="pink">
					<?php echo Yii::t('header', '京都タワーに') ?>
				</div><!--/pink-->
				<div class="option-reserve">
					<ul>
						<li><span class="icon-icon-checked"></span><span class="name"><?php echo Yii::t('header', '手ぶらでOK!!'); ?></span></li>
						<li><span class="icon-icon-checked"></span><span class="name"><?php echo Yii::t('header', '着付け無料'); ?></span></li>
					</ul>
				</div><!--/option-reserve-->
			<?php } ?>
			<!--/link facebook-->
			<?php $facebook_id = array(
				'en'=>'KyotoKimonoRentalWargo',
				'id'=>'kimonowargo',
				'fr'=>'kyotokimonorentalwargofr',
				'th'=>'kyotokimonorentalth',
			)
			?>
			<!--/link twitter-->
			<?php
			$twitter_id = 'kimono_wargo';
			?>
			<!--/link instagram-->
			<?php
			$instagram_id = 'kyotokimonorental.wargo';
			?>
			<!--/link pinterest-->
			<?php
			$pinterest_id = 'kyotokimonorentalwargo';
			?>
			<!--/link youtube-->
			<?php
			$youtube_id = 'UCaim7joNBo4GTdSvS4ydZXQ';
			?>
			<!--/link line-->
			<?php
			$line_id = '%40lvv9152n';
			?>
			<div class="icon-social-network social-network-pc">
				<?php if($language =='th') :?>
					<a class="icon-social icon-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/<?php echo $facebook_id[$language]?>/"></a>
					<a class="icon-social icon-instagram" title="Instagram" target="_blank" href="https://www.instagram.com/<?php echo $instagram_id; ?>/"></a>
				<?php else: ?>
					<a class="icon-social icon-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/<?php echo $facebook_id[$language]?>/"></a>
					<a class="icon-social icon-twitter" title="Twitter" target="_blank" href="https://twitter.com/<?php echo $twitter_id?>/"></a>
					<a class="icon-social icon-pinterest" title="Pinterest" target="_blank" href="https://www.pinterest.jp/<?php echo $pinterest_id?>/"></a>
					<a class="icon-social icon-instagram" title="Instagram" target="_blank" href="https://www.instagram.com/<?php echo $instagram_id; ?>/"></a>
					<a class="icon-social icon-youtube" title="Youtube" target="_blank" href="https://www.youtube.com/channel/<?php echo $youtube_id; ?>/"></a>
					<?php if($language =='id') {?>
						<a class="icon-social icon-line" title="Line" target="_blank" href="https://line.me/R/ti/p/<?php echo $line_id; ?>/"></a>
					<?php } ?>
				<?php endif; ?>
			</div>
		</div>
		<!--/left-header-column-->
		<div class="right-new-header-en-fr">
			<div class="icon-social-network social-network-sp">
				<?php if($language =='th') :?>
					<a class="icon-social icon-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/<?php echo $facebook_id[$language]?>/"></a>
					<a class="icon-social icon-instagram" title="Instagram" target="_blank" href="https://www.instagram.com/<?php echo $instagram_id; ?>/"></a>
				<?php else: ?>
					<a class="icon-social icon-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/<?php echo $facebook_id[$language]?>/"></a>
					<a class="icon-social icon-twitter" title="Twitter" target="_blank" href="https://twitter.com/<?php echo $twitter_id?>/"></a>
					<a class="icon-social icon-pinterest" title="Pinterest" target="_blank" href="https://www.pinterest.jp/<?php echo $pinterest_id?>/"></a>
					<a class="icon-social icon-instagram" title="Instagram" target="_blank" href="https://www.instagram.com/<?php echo $instagram_id; ?>/"></a>
					<a class="icon-social icon-youtube" title="Youtube" target="_blank" href="https://www.youtube.com/channel/<?php echo $youtube_id; ?>/"></a>
					<?php if($language =='id') {?>
						<a class="icon-social icon-line" title="Line" target="_blank" href="https://line.me/R/ti/p/<?php echo $line_id; ?>/"></a>
					<?php } ?>
				<?php endif; ?>
			</div>
			<div class="wrap-right-header-column-sp">
				<?php
				$lang_en_vi = 'wrap-languages-menu-new-'.$language;
				?>
				<div class="wrap-languages-menu-new <?php echo $lang_en_vi; ?>">
					<div class="new-header-lang">
						<ul class="menu-lang-right menu-new-header-lang-right">
							<li class="li-item-mn">
								<a href="javascript:void(0);">
									<?php
									$img_lang = 'lang-pic-'.$language;
									?>
									<p class="icon <?php echo $img_lang; ?>">
										<?php if($language =='th') :?>
											<img class="pc" src="<?php echo WP_HOME; ?>/images/sp/icon-language-th.png" alt="" />
										<?php else: ?>
										<img class="pc" src="<?php echo WP_HOME; ?>/images/sp/icon-languages.png" alt="" />
										<?php endif; ?>
									</p>
									<p class="text"><span><?php echo Yii::t('languages', '言語'); ?></span><span class="icon-drop-down-arrow"></span> </p>
								</a>
								{{language_item_menu}}
						</ul>
						</li>
						</ul>
					</div>
					<!--/new-header-lang-->
					<div class="menu-sp-new open-left">
						<p class="icon"><img src="<?php echo WP_HOME; ?>/images/sp/icon-mn-top-dropdown-1.png" alt="" /></p>
						<p class="text"><span class="span_menu"><?php echo Yii::t('menu new', 'メニュー')?></span></p>
					</div>
					<!--/menu-sp-new-->
				</div>
				<!--/wrap-languages-menu-new-->
			</div>
			<!--/wrap-right-header-column-sp-->
			<?php
			$classeen_vi = "";
			if($language === 'vi' || $language === 'en')
				$classeen_vi = 'lang-en';
			?>
			<div class="box-reserve-header-470x69 one-third column <?php echo $classeen_vi; ?>">
			</div>
			<!-- end box-languages -->
		</div>
		<!--end right-new-header-en-fr-->
	</div>
	<!-- container -->
</header>
<!-- #masthead -->
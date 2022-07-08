<?php
/**
 * Header template
 * Author: Loi Dang
 * Date: 10/5/2015
 * Time: 4:58 PM
 */
	global $isSmartPhone, $language;
?>
	<header id="masthead" class="site-header" role="banner">
		<div class="container container-new clearfix">

			<div class="left-header-column">
				<div class="addmore-200text addmore-200text-<?php echo $language; ?>">
					<img src="<?php echo WP_HOME. '/images/icons/{{addmoreen}}.png'?>"/>
				</div>
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo WP_HOME; ?>/images/logo-kimono-rental-ja.png" alt="京都きものレンタル" />
					</a>
				</div><!--/logo-->

				<div class="pink">
					<?php echo Yii::t('header', '京都タワーに') ?>
				</div><!--/pink-->

				<div class="option-reserve">
					<ul>
						<li><span class="icon-icon-checked"></span><span class="name"><?php echo Yii::t('header', '手ぶらでOK!!'); ?></span></li>
						<li><span class="icon-icon-checked"></span><span class="name"><?php echo Yii::t('header', '着付け無料'); ?></span></li>
					</ul>
				</div><!--/option-reserve-->

			</div><!--/left-header-column-->

			<div class="right-header-column">

				<div class="wrap-right-header-column-sp">
					<div class="addmore-200text addmore-200text-<?php echo $language; ?>">
						<img src="<?php echo WP_HOME. '/images/icons/{{addmoreen}}.png'?>"/>
					</div>
					<?php
						$lang_en_vi = 'wrap-languages-menu-new-'.$language;
					?>
					<div class="wrap-languages-menu-new <?php echo $lang_en_vi; ?>">

						<div class="languages-new">
							<ul class="menu-lang-right">
								<li class="li-item-mn">
									<a href="javascript:void(0);">
										<?php
											$img_lang = 'lang-pic-'.$language;
										?>
										<p class="icon <?php echo $img_lang; ?>"><img src="<?php echo WP_HOME; ?>/images/sp/icon-languages.png" alt="" /></p>
											<?php //echo Yii::app()->params['translatedLanguages'][$language]?>
										<p class="text"><span><?php echo Yii::t('languages', '言語'); ?></span><span class="icon-drop-down-arrow"></span> </p>
									</a>
									{{language_item_menu}}
									</ul>
								</li>
							</ul>
						</div><!--/languages-new-->

						<div class="menu-sp-new open-left">
							<p class="icon"><img src="<?php echo WP_HOME; ?>/images/sp/icon-mn-top-dropdown-1.png" alt="" /></p>
							<p class="text"><span class="span_menu"><?php echo Yii::t('menu new', 'メニュー')?></span></p>
						</div><!--/menu-sp-new-->

					</div><!--/wrapp-languages-menu-new-->

				</div><!--/wrap-right-header-column-sp-->

				<?php
				$classeen_vi = "";
				if($language === 'vi' || $language === 'en')
					$classeen_vi = 'lang-en';
				?>
				<div class="box-reserve-header-470x69 one-third column <?php echo $classeen_vi; ?>">
					{{language_item_menu}}
				</div><!-- end box-languages -->

			</div><!--end right-header-column-->
</div><!-- container -->
</header><!-- #masthead -->
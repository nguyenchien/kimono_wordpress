<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];?>
<?php
	if(strpos($url,'kamakura-area') == true){?>
		<div class="wrap-topics-banner-widget wrap-kimono-content-sidebar-widget pc">
			<h2 class="title-general text-center flexbox margin-bt10 justify-content-between"><?= Yii::t('new_kimono_sidebar_right', 'new-kimono-title-contents')?><span class="toggle-icon-arrow "></span></h2>
			<div class="wrap-list-banner">
				<ul class="list-banner flexbox">
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-staff-blog flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title new-kimono-option-text-1"><?= Yii::t('new_kimono_sidebar_right', 'スタッフブログ')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"> <a href="<?= home_url(); ?>/simplified-chinese-blog"><?= Yii::t('new_kimono_sidebar_right', 'きものレンタルwargo全店舗から、<br>お知らせや店舗の様子をお届けいたします')?></a> </p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-knowledge flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', '着物の豆知識')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"> <a href="<?= home_url(); ?>/column"><?= Yii::t('new_kimono_sidebar_right', '着物に関する知識のほか、着物をお洒落に<br>着こなすためのアドバイスなどを多数掲載！')?></a></p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-howto flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', '観光散策着物')?></p>
								<p class="text-new-formal-2 text-new-kimono-option-title-2 new-kimono-option-text-3-under"><?= Yii::t('new_kimono_sidebar_right', 'レンタルの流れ')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"><a href="<?= home_url(); ?>/howto"><?= Yii::t('new_kimono_sidebar_right', '初めての方でもご安心♪ご予約から当日の<br>レンタルまでの流れをご説明いたします。')?></a></p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-faqs-2 flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', 'よくあるご質問')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"><a href="<?= home_url(); ?>/faq"><?= Yii::t('new_kimono_sidebar_right', '皆様からの疑問・ご質問をまとめました。<br>ご不明な点があれば、お気軽にお問合せください')?></a></p>
					</li>
				</ul>
			</div>
		</div>
	<?php }
	else if(strpos($url,'osaka-area') == true){?>
		<div class="wrap-topics-banner-widget wrap-kimono-content-sidebar-widget pc">
			<h2 class="title-general text-center flexbox margin-bt10 justify-content-between"><?= Yii::t('new_kimono_sidebar_right', 'new-kimono-title-contents')?><span class="toggle-icon-arrow "></span></h2>
			<div class="wrap-list-banner">
				<ul class="list-banner flexbox">
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-staff-blog flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title new-kimono-option-text-1"><?= Yii::t('new_kimono_sidebar_right', 'スタッフブログ')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"> <a href="<?= home_url(); ?>/simplified-chinese-blog"><?= Yii::t('new_kimono_sidebar_right', 'きものレンタルwargo全店舗から、<br>お知らせや店舗の様子をお届けいたします')?></a> </p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-knowledge flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', '着物の豆知識')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"> <a href="<?= home_url(); ?>/column"><?= Yii::t('new_kimono_sidebar_right', '着物に関する知識のほか、着物をお洒落に<br>着こなすためのアドバイスなどを多数掲載！')?></a></p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-howto flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', '観光散策着物')?></p>
								<p class="text-new-formal-2 text-new-kimono-option-title-2 new-kimono-option-text-3-under"><?= Yii::t('new_kimono_sidebar_right', 'レンタルの流れ')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"><a href="<?= home_url(); ?>/howto"><?= Yii::t('new_kimono_sidebar_right', '初めての方でもご安心♪ご予約から当日の<br>レンタルまでの流れをご説明いたします。')?></a></p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-faqs-2 flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', 'よくあるご質問')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"><a href="<?= home_url(); ?>/faq"><?= Yii::t('new_kimono_sidebar_right', '皆様からの疑問・ご質問をまとめました。<br>ご不明な点があれば、お気軽にお問合せください')?></a></p>
					</li>
				</ul>
			</div>
		</div>
	<?php }
	else if(strpos($url,'kanazawa-area') == true){?>
		<div class="wrap-topics-banner-widget wrap-kimono-content-sidebar-widget pc">
			<h2 class="title-general text-center flexbox margin-bt10 justify-content-between"><?= Yii::t('new_kimono_sidebar_right', 'new-kimono-title-contents')?><span class="toggle-icon-arrow "></span></h2>
			<div class="wrap-list-banner">
				<ul class="list-banner flexbox">
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-staff-blog flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title new-kimono-option-text-1"><?= Yii::t('new_kimono_sidebar_right', 'スタッフブログ')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"> <a href="<?= home_url(); ?>/simplified-chinese-blog"><?= Yii::t('new_kimono_sidebar_right', 'きものレンタルwargo全店舗から、<br>お知らせや店舗の様子をお届けいたします')?></a> </p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-knowledge flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', '着物の豆知識')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"> <a href="<?= home_url(); ?>/column"><?= Yii::t('new_kimono_sidebar_right', '着物に関する知識のほか、着物をお洒落に<br>着こなすためのアドバイスなどを多数掲載！')?></a></p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-howto flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', '観光散策着物')?></p>
								<p class="text-new-formal-2 text-new-kimono-option-title-2 new-kimono-option-text-3-under"><?= Yii::t('new_kimono_sidebar_right', 'レンタルの流れ')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"><a href="<?= home_url(); ?>/howto"><?= Yii::t('new_kimono_sidebar_right', '初めての方でもご安心♪ご予約から当日の<br>レンタルまでの流れをご説明いたします。')?></a></p>
					</li>
					<li class="item-banner new-formal-widget-right">
						<div class="wrap-new-formal-widget-right">
							<div class="box-icon-new-formal"><span class="icon icon-formal-faqs-2 flexbox"></span></div>
							<div class="wrap-text-new-formal">
								<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', 'よくあるご質問')?></p>
							</div>
						</div>
						<p class="text-banner text-banner-right"><a href="<?= home_url(); ?>/faq"><?= Yii::t('new_kimono_sidebar_right', '皆様からの疑問・ご質問をまとめました。<br>ご不明な点があれば、お気軽にお問合せください')?></a></p>
					</li>
				</ul>
			</div>
		</div>
	<?php }
else{?>
	<div class="wrap-topics-banner-widget wrap-kimono-content-sidebar-widget pc">
		<h2 class="title-general text-center flexbox margin-bt10 justify-content-between"><?= Yii::t('new_kimono_sidebar_right', 'new-kimono-title-contents')?><span class="toggle-icon-arrow "></span></h2>
		<div class="wrap-list-banner">
			<ul class="list-banner flexbox">
				<li class="item-banner new-formal-widget-right">
					<div class="wrap-new-formal-widget-right">
						<div class="box-icon-new-formal"><span class="icon icon-formal-staff-blog flexbox"></span></div>
						<div class="wrap-text-new-formal">
							<p class="text-new-formal-1 text-new-kimono-option-title new-kimono-option-text-1"><?= Yii::t('new_kimono_sidebar_right', 'スタッフブログ')?></p>
						</div>
					</div>
					<p class="text-banner text-banner-right"> <a href="<?= home_url(); ?>/simplified-chinese-blog"><?= Yii::t('new_kimono_sidebar_right', 'きものレンタルwargo全店舗から、<br>お知らせや店舗の様子をお届けいたします')?></a> </p>
				</li>
				<li class="item-banner new-formal-widget-right">
					<div class="wrap-new-formal-widget-right">
						<div class="box-icon-new-formal"><span class="icon icon-formal-knowledge flexbox"></span></div>
						<div class="wrap-text-new-formal">
							<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', '着物の豆知識')?></p>
						</div>
					</div>
					<p class="text-banner text-banner-right"> <a href="<?= home_url(); ?>/column"><?= Yii::t('new_kimono_sidebar_right', '着物に関する知識のほか、着物をお洒落に<br>着こなすためのアドバイスなどを多数掲載！')?></a></p>
				</li>
				<li class="item-banner new-formal-widget-right">
					<div class="wrap-new-formal-widget-right">
						<div class="box-icon-new-formal"><span class="icon icon-formal-howto flexbox"></span></div>
						<div class="wrap-text-new-formal">
							<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', '観光散策着物')?></p>
							<p class="text-new-formal-2 text-new-kimono-option-title-2 new-kimono-option-text-3-under"><?= Yii::t('new_kimono_sidebar_right', 'レンタルの流れ')?></p>
						</div>
					</div>
					<p class="text-banner text-banner-right"><a href="<?= home_url(); ?>/howto"><?= Yii::t('new_kimono_sidebar_right', '初めての方でもご安心♪ご予約から当日の<br>レンタルまでの流れをご説明いたします。')?></a></p>
				</li>
				<li class="item-banner new-formal-widget-right">
					<div class="wrap-new-formal-widget-right">
						<div class="box-icon-new-formal"><span class="icon icon-formal-faqs-2 flexbox"></span></div>
						<div class="wrap-text-new-formal">
							<p class="text-new-formal-1 text-new-kimono-option-title"><?= Yii::t('new_kimono_sidebar_right', 'よくあるご質問')?></p>
						</div>
					</div>
					<p class="text-banner text-banner-right"><a href="<?= home_url(); ?>/faq"><?= Yii::t('new_kimono_sidebar_right', '皆様からの疑問・ご質問をまとめました。<br>ご不明な点があれば、お気軽にお問合せください')?></a></p>
				</li>
			</ul>
		</div>
	</div>
<?php } ?>

<?php
$lang = Yii::app()->language;
?>
<div class="wrap-category options wrap-new-kimono-sidebar-left">
    <?php if($lang == 'ja'): ?>
        <div class="title-general text-center"><span class="text-title-general">Options</span><p class="sub-text-title sub-text-title-new">着物レンタルの</br>人気オプションを見る</p></div>
    <?php else:?>
        <h3 class="title-general text-center"><?= Yii::t ('new_kimono_sidebar_left','new-kimono-title-options')?></h3>
    <?php endif;?>
	<div class="box-category">
		<ul class="list-box-category">
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/hairset"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','ヘアセット')?></span></a></div>
			</li>
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/option"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','小物レンタル')?></span></a></div>
			</li>
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/photo-session"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','カメラマン同行オプション')?></span></a></div>
			</li>
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono/photo-studio"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','写真スタジオ')?></span></a></div>
			</li>
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/kimono/tenimotsu"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','荷物預かり')?></span></a></div>
			</li>
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/group"><span class="text-category"><?= Yii::t('new_kimono_sidebar_left','団体着物レンタル')?></span></a></div>
			</li>
            <li class="item-banner">
                <div class="wrap-text-banner-araibar">
                    <a class="link-top-araibar"  target="_blank" href="https://araiba.net/cleaning">
                        <img data-src="<?= WP_HOME ?>/images/new-kimono-v3/araibabanner-kimono-min.jpg?ver=20200305" alt="着物クリーニング＆保管サービス「アライバ」OPEN!">
                        <p class="text-araibar">着物クリーニング＆保管サービス「アライバ」OPEN!</p>
                    </a>
                </div>
            </li>
		</ul>
	</div>
</div>
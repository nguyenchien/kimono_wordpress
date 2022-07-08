<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$lang = Yii::app()->language;
global $post;
$is_formal = strpos($url, "formal") !== false;
$is_takuhai_yukata = is_page('takuhai/yukata');
$is_top_page = is_front_page();
$pageYukataContest2019 = is_page('yukata-girl-contest2019');
$pageCoronavirus = is_page('cancelpolicy_of_coronavirus');
$pageOnlineLesson = is_page('online_lesson');
$cssClass = '';
if ($pageYukataContest2019) {
    $cssClass = 'kimono yukata-contest';
}
;?>
<style>
	@media (min-width: 1200px){
		.title-general-new-style .text-title-general{
			font-size: 15px;
		}
	}
</style>
<?php if($is_formal) : ?>
	<div class="wrap-shoplist shoplist-01 wrap-category wrap-new-kimono-sidebar-left">
        <?php if($lang == 'ja'): ?>
			<div class="title-general text-center title-general-new-style <?= $is_top_page ? 'kimono' : ''; ?> <?= $cssClass; ?>" data-collapse-cate=".collapse-cate">
				<div class="wrap-title-text flexbox">
					<span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
					<span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', 'フォーマル着物レンタル店舗'); ?></span>
				</div>
				<span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
			</div>
        <?php else:?>
			<h2 class="title-general text-center active"><?= Yii::t ('new_kimono_sidebar_left','new-kimono-title-shop-list')?></h2>
        <?php endif;?>
		<div class="box-category collapse-cate">
			<ul class="list-box-category">
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-first flexbox">
					<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/osaka-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','大阪エリア')?></a><span class="price-sidebar-left"></span></div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-28 text-category">
								<div class="bg-shop-list">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/osaka-area/osaka-shinsaibashi-opa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-osaka-shinsaibashi-opa')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
					<div class="title-category title-category-single flexbox align-items-center">
                        <?php if($lang == 'ja'): ?>
							<a href="<?php echo WP_HOME; ?>/formal/access/tokyo-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','東京')?></a>
                        <?php else: ?>
							<a href="<?php echo home_url(); ?>/access/tokyo-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','東京')?></a>
                        <?php endif; ?>
						<span class="price-sidebar-left"></span></div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-10 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
                                        <?php if($lang == 'ja'): ?>
											<a class="linkto-shop flexbox" href="<?php echo WP_HOME ?>/formal/access/tokyo-area/ginza-honten">
                                                <?= Yii::t('new_kimono_sidebar_left', 'title-des-ginza-honten')?>
											</a>
                                        <?php else: ?>
											<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/tokyo-area/ginza-honten">
                                                <?= Yii::t('new_kimono_sidebar_left', 'title-des-ginza-honten')?>
											</a>
                                        <?php endif; ?>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<li class="item-shop-list shop-list-10 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo WP_HOME ?>/formal/access/tokyo-area/sendagaya">
                                            <?= Yii::t('new_kimono_sidebar_left', 'title-des-sendagaya')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
<!--				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-nd flexbox">-->
<!--					<div class="title-category title-category-single flexbox align-items-center">-->
<!--						<a href="--><?php //echo home_url()?><!--/access/shizuoka-area" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','静岡')?><!--</a>-->
<!--						<span class="price-sidebar-left"></span></div>-->
<!--					<div class="box-shoplist">-->
<!--						<ul class="list-shop-list">-->
<!--							<li class="item-shop-list text-category">-->
<!--								<div class="bg-shop-list">-->
<!--									<div class="tt-shop-list flexbox align-items-center">-->
<!--										<a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/shizuoka-area/ito">-->
<!--                                            --><?//= Yii::t('new_kimono_sidebar_left','title-des-ito')?>
<!--										</a>-->
<!--										<div class="icon-arrow "><span class="arrow"></span></div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</div>-->
<!--				</li>-->
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-nd flexbox">
					<div class="title-category title-category-single flexbox align-items-center">
						<a href="<?php echo home_url()?>/access/kanazawa-area" class="text-category"><?= Yii::t('new_kimono_sidebar_left','石川')?></a>
						<span class="price-sidebar-left"></span></div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list text-category">
								<div class="bg-shop-list">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kanazawa-area/kanazawa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kanazawa')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<!--<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-nd flexbox">
					<div class="title-category title-category-single flexbox align-items-center">
						<a href="<?php echo home_url()?>/formal/access/tokyo-area" class="text-category">
                            <?php echo Yii::t('new_kimono_sidebar_left', '福岡')?></a>
						<span class="price-sidebar-left"></span>
					</div>
					<div class="box-shoplist ">
						<ul class="list-shop-list">
							<li class="item-shop-list text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/formal/access/tokyo-area/hakata">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-hakata')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>-->
			</ul>
		</div>
	</div>
	<div class="wrap-shoplist shoplist-02 wrap-category wrap-new-kimono-sidebar-left">
        <?php if($lang == 'ja'): ?>
			<div class="title-general text-center title-general-new-style <?= $is_top_page ? 'kimono' : ''; ?> <?= $cssClass; ?>" data-collapse-cate=".collapse-cate">
				<div class="wrap-title-text flexbox">
					<span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
					<span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '観光着物レンタル店舗'); ?></span>
				</div>
				<span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
			</div>
        <?php else:?>
			<h2 class="title-general text-center active"><?= Yii::t ('new_kimono_sidebar_left','new-kimono-title-shop-list')?></h2>
        <?php endif;?>
		<div class="box-category collapse-cate">
			<ul class="list-box-category">
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-first flexbox">
					<div class="title-category title-category-single flexbox align-items-center">
						<a href="<?php echo home_url()?>/access/kyoto-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','京都')?></a>
						<span class="price-sidebar-left"></span>
					</div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/station-area/kyotostation">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kyoto-station')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<li class="item-shop-list text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/gion-area/gion-nishiki">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-gion-nishiki')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
<!--							<li class="item-shop-list text-category border-bottom">-->
<!--								<div class="bg-shop-list ">-->
<!--									<div class="tt-shop-list flexbox align-items-center">-->
<!--										<a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/kiyomizu-area/ninenzaka">-->
<!--                                            --><?//= Yii::t('new_kimono_sidebar_left','title-des-ninenzaka')?>
<!--										</a>-->
<!--										<div class="icon-arrow "><span class="arrow"></span></div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</li>-->
						</ul>
					</div>
				</li>
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
					<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/osaka-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','大阪エリア')?></a><span class="price-sidebar-left"></span></div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-28 text-category">
								<div class="bg-shop-list">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/osaka-area/osaka-shinsaibashi-opa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-osaka-shinsaibashi-opa')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-nd flexbox">
					<div class="title-category title-category-single flexbox align-items-center">
						<a href="<?php echo home_url()?>/access/asakusa-area" class="text-category"><?= Yii::t('new_kimono_sidebar_left','東京')?></a>
						<span class="price-sidebar-left"></span>
					</div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list text-category">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/asakusa-area/asakusa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-asakusa')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
<!--				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-nd flexbox">-->
<!--					<div class="title-category title-category-single flexbox align-items-center">-->
<!--						<a href="--><?php //echo home_url()?><!--/access/shizuoka-area" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','静岡')?><!--</a>-->
<!--						<span class="price-sidebar-left"></span></div>-->
<!--					<div class="box-shoplist">-->
<!--						<ul class="list-shop-list">-->
<!--							<li class="item-shop-list text-category">-->
<!--								<div class="bg-shop-list">-->
<!--									<div class="tt-shop-list flexbox align-items-center">-->
<!--										<a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/shizuoka-area/ito">-->
<!--                                            --><?//= Yii::t('new_kimono_sidebar_left','title-des-ito')?>
<!--										</a>-->
<!--										<div class="icon-arrow "><span class="arrow"></span></div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</div>-->
<!--				</li>-->
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
					<div class="title-category title-category-single flexbox align-items-center">
						<a href="<?php echo home_url()?>/access/kanazawa-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','石川')?></a>
						<span class="price-sidebar-left"></span>
					</div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-15 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kanazawa-area/kanazawa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kanazawa')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<li class="item-shop-list shop-list-27 text-category">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kanazawa-area/kanazawa-kenrokuen">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kanazawa-kenrokuen')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
<!--				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-first flexbox">-->
<!--					<div class="title-category title-category-single flexbox align-items-center">-->
<!--						<a href="--><?php //echo home_url()?><!--/access/kyoto-area/kiyomizu-area" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','休業中')?><!--</a>-->
<!--						<span class="price-sidebar-left"></span>-->
<!--					</div>-->
<!--					<div class="box-shoplist">-->
<!--						<ul class="list-shop-list">-->
<!--							<li class="item-shop-list shop-list-06 text-category border-bottom">-->
<!--								<div class="bg-shop-list ">-->
<!--									<div class="tt-shop-list flexbox align-items-center">-->
<!--										<a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/kiyomizu-area/kiyomizuzaka">-->
<!--                                            --><?//= Yii::t('new_kimono_sidebar_left','title-des-kiyomizuzaka')?>
<!--										</a>-->
<!--										<div class="icon-arrow "><span class="arrow"></span></div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</div>-->
<!--				</li>-->
			</ul>
		</div>
	</div>
<?php else: ?>
	<div class="wrap-shoplist wrap-category wrap-new-kimono-sidebar-left">
        <?php if($lang == 'ja'): ?>
            <?php if ( $is_formal || $is_takuhai_yukata || $is_top_page || $pageYukataContest2019 || $pageCoronavirus || $pageOnlineLesson ) : ?>
				<div class="title-general text-center title-general-new-style active <?= $is_top_page ? 'kimono' : ''; ?> <?= $cssClass; ?>" data-collapse-cate=".collapse-cate">
					<div class="wrap-title-text flexbox">
						<span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
						<span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '店舗'); ?></span>
						<span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'から探す'); ?></span>
					</div>
					<span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
				</div>
            <?php else: ?>
				<div class="title-general title-general-new text-center justify-content-between"><span class="text-title-general">Shop List</span>
					<p class="sub-text-title sub-text-title-new shoplist-tt"><?php echo Yii::t('new-sidebar-left-v2', '着物レンタルを店舗から探す'); ?></p>
					<span class="toggle-icon-arrow "></span>
				</div>
            <?php endif; ?>
        <?php else:?>
			<h2 class="title-general text-center active"><?= Yii::t ('new_kimono_sidebar_left','new-kimono-title-shop-list')?></h2>
        <?php endif;?>
		<div class="box-category collapse-cate">
			<ul class="list-box-category">
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-first flexbox">
					<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/kyoto-area/" class="text-category"><?php echo Yii::t('new_kimono_sidebar_left', '京都エリア')?></a><span class="price-sidebar-left"></span></div>
					<div class="box-shoplist ">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-01 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/station-area/kyotostation">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kyoto-station')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<!--                        <li class="item-shop-list shop-list-02 border-bottom">-->
							<!--                            <div class="bg-shop-list">-->
							<!--                                <div class="tt-shop-list flexbox align-items-center">-->
							<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/station-area/petitkyotostation">-->
							<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-petitkyotostation')?>
							<!--                                    </a>-->
							<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
							<!--                                </div>-->
							<!--                            </div>-->
							<!--                        </li>-->
							<li class="item-shop-list shop-list-03 border-bottom">
								<div class="bg-shop-list">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/station-area/formal-kyototower">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-formal-kyototower')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<li class="item-shop-list shop-list-04 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/gion-area/gion-nishiki">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-gion-shijo')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<!--                        <li class="item-shop-list shop-list-05 border-bottom">-->
							<!--                            <div class="bg-shop-list">-->
							<!--                                <div class="tt-shop-list flexbox align-items-center">-->
							<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/gion-area/petitgionshijo">-->
							<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-petitgionshijo')?>
							<!--                                    </a>-->
							<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
							<!--                                </div>-->
							<!--                            </div>-->
							<!--                        </li>-->
							<li class="item-shop-list shop-list-06 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kyoto-area/kiyomizu-area/kiyomizuzaka">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kiyomizuzaka')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<!--            <li class="item-shop-list shop-list-26 text-category border-bottom">-->
							<!--                            <div class="bg-shop-list ">-->
							<!--                                <div class="tt-shop-list flexbox align-items-center">-->
							<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">-->
							<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-chawanzaka')?>
							<!--                                    </a>-->
							<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
							<!--                                </div>-->
							<!--                            </div>-->
							<!--                        </li>-->
							<!--            <li class="item-shop-list shop-list-26 text-category border-bottom">-->
							<!--                            <div class="bg-shop-list ">-->
							<!--                                <div class="tt-shop-list flexbox align-items-center">-->
							<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/kiyomizu-area/chawanzaka">-->
							<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-chawanzaka')?>
							<!--                                    </a>-->
							<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
							<!--                                </div>-->
							<!--                            </div>-->
							<!--                        </li>-->
							<!--                        <li class="item-shop-list shop-list-07 border-bottom">-->
							<!--                            <div class="bg-shop-list ">-->
							<!--                                <div class="tt-shop-list flexbox align-items-center">-->
							<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/arashiyama-area/arashiyama">-->
							<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-arashiyama')?>
							<!--                                    </a>-->
							<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
							<!--                                </div>-->
							<!--                            </div>-->
							<!--                        </li>-->
							<!--                        <li class="item-shop-list shop-list-08">-->
							<!--                            <div class="bg-shop-list">-->
							<!--                                <div class="tt-shop-list flexbox align-items-center">-->
							<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/kyoto-area/arashiyama-area/arashiyama-togetsukyo">-->
							<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-arashiyama-togetsukyo')?>
							<!--                                    </a>-->
							<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
							<!--                                </div>-->
							<!--                            </div>-->
							<!--                        </li>-->
						</ul>
					</div>
				</li>
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
					<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/osaka-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','大阪エリア')?></a><span class="price-sidebar-left"></span></div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-28 text-category">
								<div class="bg-shop-list">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/osaka-area/osaka-shinsaibashi-opa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-osaka-shinsaibashi-opa')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<!--            <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">-->
				<!--                <div class="title-category title-category-single flexbox align-items-center"><a href="--><?php //echo home_url()?><!--/access/okinawa-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','沖縄エリア')?><!--</a><span class="price-sidebar-left"></span></div>-->
				<!--                <div class="box-shoplist">-->
				<!--                    <ul class="list-shop-list">-->
				<!--                        <li class="item-shop-list shop-list-29 text-category">-->
				<!--                            <div class="bg-shop-list">-->
				<!--                                <div class="tt-shop-list flexbox align-items-center">-->
				<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/okinawa-area/okinawa-naha">-->
				<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-okinawa-naha')?>
				<!--                                    </a>-->
				<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
				<!--                                </div>-->
				<!--                            </div>-->
				<!--                        </li>-->
				<!--                    </ul>-->
				<!--                </div>-->
				<!--            </li>-->
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
					<div class="title-category title-category-single flexbox align-items-center">
                        <?php if($lang == 'ja'): ?>
							<a href="<?php echo WP_HOME; ?>/formal/access/tokyo-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','東京')?></a>
                        <?php else: ?>
							<a href="<?php echo home_url(); ?>/access/tokyo-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','東京')?></a>
                        <?php endif; ?>
						<span class="price-sidebar-left"></span></div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-10 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
                                        <?php if($lang == 'ja'): ?>
											<a class="linkto-shop flexbox" href="<?php echo WP_HOME ?>/formal/access/tokyo-area/ginza-honten">
                                                <?= Yii::t('new_kimono_sidebar_left', 'title-des-ginza-honten')?>
											</a>
                                        <?php else: ?>
											<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/tokyo-area/ginza-honten">
                                                <?= Yii::t('new_kimono_sidebar_left', 'title-des-ginza-honten')?>
											</a>
                                        <?php endif; ?>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<li class="item-shop-list shop-list-11 text-category border-bottom">
								<div class="bg-shop-list">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/tokyo-area/shinjuku-area/shinjuku-station">
                                            <?= Yii::t('new_kimono_sidebar_left', 'title-des-shinjuku')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<li class="item-shop-list shop-list-12 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/asakusa-area/asakusa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-asakusa')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<li class="item-shop-list shop-list-13 text-category">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/asakusa-area/tokyoskytree">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-tokyoskytree')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
					<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/kamakura-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','神奈川')?></a><span class="price-sidebar-left"></span></div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-14 text-category">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kamakura-area/kamakura">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kamakura')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
					<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/kanazawa-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','石川')?></a><span class="price-sidebar-left"></span></div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-15 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kanazawa-area/kanazawa">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kanazawa')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<li class="item-shop-list shop-list-27 text-category">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/kanazawa-area/kanazawa-kenrokuen">
                                            <?= Yii::t('new_kimono_sidebar_left','title-des-kanazawa-kenrokuen')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<!--            <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">-->
				<!--                <div class="title-category title-category-single flexbox align-items-center"><a href="--><?php //echo home_url()?><!--/access/okayama-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','岡山')?><!--</a><span class="price-sidebar-left"></span></div>-->
				<!--                <div class="box-shoplist">-->
				<!--                    <ul class="list-shop-list">-->
				<!--                        <li class="item-shop-list shop-list-16 text-category">-->
				<!--                            <div class="bg-shop-list ">-->
				<!--                                <div class="tt-shop-list flexbox align-items-center">-->
				<!--                                    <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/okayama-area/kurashiki">-->
				<!--                                        --><?//= Yii::t('new_kimono_sidebar_left','title-des-kurashiki')?>
				<!--                                    </a>-->
				<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
				<!--                                </div>-->
				<!--                            </div>-->
				<!--                        </li>-->
				<!--                    </ul>-->
				<!--                </div>-->
				<!--            </li>-->
				<li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
					<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo home_url()?>/access/fukuoka-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','福岡')?></a><span class="price-sidebar-left"></span></div>
					<div class="box-shoplist">
						<ul class="list-shop-list">
							<li class="item-shop-list shop-list-17 text-category border-bottom">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/fukuoka-area/dazaifu">
                                            <?= Yii::t('new_kimono_sidebar_left', 'title-des-dazaifu')?>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
							<li class="item-shop-list shop-list-17 text-category">
								<div class="bg-shop-list ">
									<div class="tt-shop-list flexbox align-items-center">
										<a class="linkto-shop flexbox" href="<?php echo home_url()?>/formal/access/tokyo-area/hakata">
											<div class="lg-text">福岡博多店</div>
											<div class="sm-text">キャナルシティオーパ内<br>センターウォーク南側2F</div>
										</a>
										<div class="icon-arrow "><span class="arrow"></span></div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<!--            <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">-->
				<!--                <div class="title-category title-category-single flexbox align-items-center">-->
				<!--                    --><?php //if($lang == 'ja'): ?>
				<!--                        <a href="--><?php //echo home_url()?><!--/formal/access/sapporo-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','札幌')?><!--</a>-->
				<!--                    --><?php //else: ?>
				<!--                        <a href="--><?php //echo home_url()?><!--/access/sapporo-area/" class="text-category">--><?//= Yii::t('new_kimono_sidebar_left','札幌')?><!--</a>-->
				<!--                    --><?php //endif; ?>
				<!--                    <span class="price-sidebar-left"></span></div>-->
				<!--                <div class="box-shoplist">-->
				<!--                    <ul class="list-shop-list">-->
				<!--                        <li class="item-shop-list shop-list-20 text-category">-->
				<!--                            <div class="bg-shop-list ">-->
				<!--                                <div class="tt-shop-list flexbox align-items-center">-->
				<!--                                    --><?php //if($lang == 'ja'): ?>
				<!--                                        <a class="linkto-shop flexbox" href="--><?php //echo WP_HOME ?><!--/formal/access/sapporo-area/sapporo-susukinostation">-->
				<!--                                            --><?//= Yii::t('new_kimono_sidebar_left', 'title-des-sapporo-susukinostation')?>
				<!--                                        </a>-->
				<!--                                    --><?php //else: ?>
				<!--                                        <a class="linkto-shop flexbox" href="--><?php //echo home_url()?><!--/access/sapporo-area/sapporo-susukinostation">-->
				<!--                                            --><?//= Yii::t('new_kimono_sidebar_left', 'title-des-sapporo-susukinostation')?>
				<!--                                        </a>-->
				<!--                                    --><?php //endif; ?>
				<!--                                    <div class="icon-arrow "><span class="arrow"></span></div>-->
				<!--                                </div>-->
				<!--                            </div>-->
				<!--                        </li>-->
				<!--                    </ul>-->
				<!--                </div>-->
				<!--            </li>-->
				<!--
            <li class="item-box-category text-shoplist-category-kimono text-shoplist-category-second flexbox">
                <div class="title-category title-category-single flexbox align-items-center">
                    <?php if($lang == 'ja'): ?>
                        <a href="<?php echo home_url()?>/formal/access/tohoku-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','宮城')?></a>
                    <?php else: ?>
                        <a href="<?php echo home_url()?>/access/tohoku-area/" class="text-category"><?= Yii::t('new_kimono_sidebar_left','宮城')?></a>
                    <?php endif; ?>
                    <span class="price-sidebar-left"></span></div>
                <div class="box-shoplist">
                    <ul class="list-shop-list">
                        <li class="item-shop-list shop-list-21 text-category border-bottom">
                            <div class="bg-shop-list ">
                                <div class="tt-shop-list flexbox align-items-center">
                                    <?php if($lang == 'ja'): ?>
                                        <a class="linkto-shop flexbox" href="<?php echo WP_HOME ?>/formal/access/tohoku-area/sendai-parco2">
                                            <?= Yii::t('new_kimono_sidebar_left', 'title-des-sendai-parco2')?>
                                        </a>
                                    <?php else: ?>
                                        <a class="linkto-shop flexbox" href="<?php echo home_url()?>/access/tohoku-area/sendai-parco2">
                                            <?= Yii::t('new_kimono_sidebar_left', 'title-des-sendai-parco2')?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="icon-arrow "><span class="arrow"></span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            -->
			</ul>
		</div>
	</div>
<?php endif ?>

<?php
global $post, $wp, $language;
$current_url = home_url( $wp->request );
$is_spot = strrpos($current_url, "spot");
if (!$is_spot) {
	return;
}
$main_url = strrpos($current_url, "-area") > 0 ? substr($current_url, 0, strrpos($current_url, "-area")+5)."/" : "";
?>
<div class="wrap-group-cate-for-post">
	<?php if ($main_url) : ?>
    <div class="blog_links blog_links-popular">
        <h2 class="title-right-sidebar flexbox align-items-center"><span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><a href="<?=$main_url?>placesights" style="font-size: 16px;border: none;margin: 0px;padding: 0;"><span>四季の観光名所</span></a></h2>
        <div class="blog_links blog_links-popular">
            <a class="blog_link_item" href="<?=$main_url?>placesights/spring">春</a>
            <a class="blog_link_item" href="<?=$main_url?>placesights/summer">夏</a>
            <a class="blog_link_item" href="<?=$main_url?>placesights/autumn">秋</a>
            <a class="blog_link_item" href="<?=$main_url?>placesights/winter">冬</a>
            <a class="blog_link_item" href="<?=$main_url?>placesights/well-kept-secret">穴場</a>
        </div>
    </div>

    <div class="blog_links blog_links-popular">
        <h2 class="title-right-sidebar flexbox align-items-center"><span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><a href="<?=$main_url?>course" style="font-size: 16px;border: none;margin: 0px;padding: 0;"><span>オススメ観光コース</span></a></h2>
        <div class="blog_links blog_links-popular">
            <a class="blog_link_item" href="<?=$main_url?>course/kids">子供</a>
            <a class="blog_link_item" href="<?=$main_url?>course/girls-group">女子</a>
            <a class="blog_link_item" href="<?=$main_url?>course/couple">カップル</a>
            <a class="blog_link_item" href="<?=$main_url?>course/rainy-day">雨の日</a>
        </div>
    </div>

    <div class="blog_links blog_links-popular">
        <h2 class="title-right-sidebar flexbox align-items-center"><span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><a href="<?=$main_url?>event" style="font-size: 16px;border: none;margin: 0px;padding: 0;"><span>イベント</span></a></h2>
        <div class="blog_links blog_links-popular">
            <a class="blog_link_item" href="<?=$main_url?>event/jan">１月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/feb">2月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/mar">3月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/apr">4月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/may">5月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/jun">6月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/jul">7月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/aug">8月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/sep">9月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/oct">10月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/nov">11月</a>
            <a class="blog_link_item" href="<?=$main_url?>event/dec">12月</a>
        </div>
    </div>

    <div class="blog_links blog_links-popular">
        <h2 class="title-right-sidebar flexbox align-items-center"><span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><a href="<?=$main_url?>gourmet" style="font-size: 16px;border: none;margin: 0px;padding: 0;"><span>グルメ</span></a></h2>
        <div class="blog_links blog_links-popular">
            <a class="blog_link_item" href="<?=$main_url?>gourmet/specialty">名物</a>
            <a class="blog_link_item" href="<?=$main_url?>gourmet/lunch">ランチ</a>
            <a class="blog_link_item" href="<?=$main_url?>gourmet/café">カフェ</a>
        </div>
    </div>
	<?php endif; ?>
    <?php if ($language == 'ja') : ?>
    <div class="right-sidebar-category archive">
        <h2 class="title-right-sidebar flexbox align-items-center"><span class="icon-prize"><img src="<?php echo WP_HOME; ?>/images/formal-rental/icon-prize.svg"></span><span><?php echo $main_url ? Yii::t('wp_theme', '他エリアの観光情報') : Yii::t('wp_theme', 'エリアごとの観光情報') ?></span></h2>
        <div class="container-rsb">
            <ul class="archive-list">
                <li class="archive-list-item dropdown active">
                    <span class="title-dropdown">関西地区</span>
                    <ul class="archive-sub-list" style="display: block;">
                        <li><a href="<?php echo home_url();?>/spot/kyoto-area">・京都エリア</a></li>
                        <li>
                            <ul class="archive-child-list">
                                <li><a href="<?php echo home_url();?>/spot/kyoto-area/station-area">京都駅エリア</a></li>
                                <li><a href="<?php echo home_url();?>/spot/kyoto-area/gion-area">祇園エリア</a></li>
                                <li><a href="<?php echo home_url();?>/spot/kyoto-area/kiyomizu-area">東山・清水エリア</a></li>
                                <li><a href="<?php echo home_url();?>/spot/kyoto-area/arashiyama-area">嵐山エリア</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo home_url();?>/spot/osaka-area">・大阪エリア</a></li>
                    </ul>
                </li>
                <li class="archive-list-item dropdown active">
                    <span class="title-dropdown">関東地区</span>
                    <ul class="archive-sub-list" style="display: block;">
                        <li><a href="<?php echo home_url();?>/spot/tokyo-area">・東京エリア</a></li>
                        <li>
                            <ul class="archive-child-list">
                                <li><a href="<?php echo home_url();?>/spot/tokyo-area/asakusa-area">浅草エリア</a></li>
                                <li><a href="<?php echo home_url();?>/spot/tokyo-area/ginza-area">銀座エリア</a></li>
                                <li><a href="<?php echo home_url();?>/spot/tokyo-area/shinjuku-area">新宿エリア</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo home_url();?>/spot/kanagawa-area">・神奈川エリア</a></li>
                        <ul class="archive-child-list">
                            <li><a href="<?php echo home_url();?>/spot/kanagawa-area/kamakura-area">鎌倉エリア</a></li>
                        </ul>
                    </ul>
                </li>
                <li class="archive-list-item dropdown active">
                    <span class="title-dropdown">北海道・東北地区</span>
                    <ul class="archive-sub-list" style="display: block;">
                        <li><a href="<?php echo home_url();?>/spot/sapporo-area">・札幌エリア</a></li>
                        <li><a href="<?php echo home_url();?>/spot/sendai-area">・仙台エリア</a></li>
                    </ul>
                </li>
                <li class="archive-list-item dropdown active">
                    <span class="title-dropdown">中部地方</span>
                    <ul class="archive-sub-list" style="display: block;">
                        <li><a href="<?php echo home_url();?>/spot/shizuoka-area">・静岡エリア</a></li>
                    </ul>
                </li>
                <li class="archive-list-item dropdown active">
                    <span class="title-dropdown">北陸地区</span>
                    <ul class="archive-sub-list" style="display: block;">
                        <li><a href="<?php echo home_url();?>/spot/kanazawa-area">・金沢エリア</a></li>
                    </ul>
                </li>
                <li class="archive-list-item dropdown active">
                    <span class="title-dropdown">中国地区</span>
                    <ul class="archive-sub-list" style="display: block;">
                        <li><a href="<?php echo home_url();?>/spot/kurashiki-area">・倉敷エリア</a></li>
                    </ul>
                </li>
                <li class="archive-list-item dropdown active">
                    <span class="title-dropdown">九州地区</span>
                    <ul class="archive-sub-list" style="display: block;">
                        <li><a href="<?php echo home_url();?>/spot/fukuoka-area">・福岡エリア</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <?php endif; ?>
</div>

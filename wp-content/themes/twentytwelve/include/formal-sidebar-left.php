<?php
$pageList = get_page_by_path('formal/list');
$permalink = $pageList ? get_permalink($pageList) : '';
global $post,$isSmartPhone;
$post_name = isset($post->post_name) ? $post->post_name: '';
$post_parent = get_post($post->post_parent)->post_name;
$post_parent = isset( $post_parent ) ? $post_parent : '';
?>
<?php if($isSmartPhone) : ?>
<div class="wrap-menu-common sp">
    <ul class="list-mene-common flexbox">
        <li class="item register-btn">
            <a href="<?php echo WP_HOME ?>/common/register" class="flexbox align-items-center">
                <span class="icon-common icon-formal-cm-add flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', '新規会員登録') ?></span>
            </a>
        </li>
        <li class="item login-btn">
            <a href="<?php echo WP_HOME ?>/common/login" class="flexbox align-items-center">
                <span class="icon-common icon-formal-cm-login flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'ログイン') ?></span>
            </a>
        </li>
        <li class="item common-btn">
            <a href="<?php echo WP_HOME ?>/common" class="flexbox align-items-center">
                <span class="icon-common icon-formal-mypage flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'マイページ') ?></span>
            </a>
        </li>
        <li class="item logout-btn">
            <a href="<?php echo WP_HOME ?>/common/do#/logout" class="flexbox align-items-center">
                <span class="icon-common icon-formal-logout flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'Log out') ?></span>
            </a>
        </li>
        <li class="item">
            <a href="<?php echo WP_HOME ?>/formal/cart" class="flexbox align-items-center linkto-cart-sidebar">
                <span class="icon-common icon-shopping-cart icon-formal-shopping-cart-2 flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'カート') ?></span>
                <span class="add-num-cart flexbox align-items-center justify-content-center">0</span>
            </a>
        </li>
        <li class="item">
            <a href="#" class="flexbox align-items-center">
                <span class="icon-common icon-formal-heart-3 flexbox"></span>
                <span class="name"><?php echo Yii::t('new_header_highend', 'お気に入り') ?></span>
                <span class="add-num-cart flexbox align-items-center justify-content-center">0</span>
            </a>
        </li>
    </ul>
</div>
<?php endif ?>
<?php if ($isPlanList) : ?>
    <div class="wrap-list-banner">
        <ul class="list-banner flexbox">
            <li class="item-banner">
                <div class="image-banner">
                    <a href="/formal/preview"><img src="<?php echo WP_HOME; ?>/images/formal-rental/banner_left_preview.jpg?ver=20211008" alt="<?= Yii::t('formal-sidebar-left','下見30分無料！着物レンタルの下見予約') ?>"></a>
                </div>
            </li>
        </ul>
    </div>
<?php endif ?>
<div class="wrap-category plan">
    <div class="title-general text-center"><span class="text-title-general">Plan</span><span class="sub-text-title sub-text-title-new">着物レンタルプランで探す</span></div>
    <div class="box-category">
        <ul class="list-box-category">
			<li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/homongi"><span class="text-category">訪問着<var>プラン</var></span></a><span class="arrow"></span></div>
			</li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a style="font-size:15px;" href="<?php echo WP_HOME; ?>/formal/irotomesode"><span class="text-category">留袖（黒留袖・色留袖）<var>プラン</var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/furisode"><span class="text-category">振袖<var>プラン</var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/hakama"><span class="text-category">卒業式袴・二尺袖<var>プラン</var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category flexbox align-items-center">
                    <a href="<?php echo WP_HOME; ?>/formal/shichigosan"><span class="text-category">七五三<var>プラン</var></span></a>
                    <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                </div>
                <ul class="sub-cates">
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/shichigosan/shichigosan3years"><span class="text-category">七五三（三歳）</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/shichigosan/shichigosan5years"><span class="text-category">七五三（五歳）</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center last"><a href="<?php echo WP_HOME; ?>/formal/shichigosan/shichigosan7years"><span class="text-category">七五三（七歳）</span></a><span class="arrow"></span></div>
                    </li>
                </ul>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category flexbox align-items-center">
                    <a href="<?php echo WP_HOME; ?>/formal/ubugi"><span class="text-category">産着（初着）<var>プラン</var></span></a>
                    <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                </div>
                <ul class="sub-cates">
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/ubugi/boy"><span class="text-category">男の子</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/ubugi/girl"><span class="text-category">女の子</span></a><span class="arrow"></span></div>
                    </li>
                </ul>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/iromuji"><span class="text-category">色無地<var>プラン</var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/mofuku"><span class="text-category">喪服・礼服<var>プラン</var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/monpuku"><span class="text-category">紋付き袴<var>プラン</var></span></a><span class="arrow"></span></div>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/kids-hakama"><span class="text-category">小学生卒業袴<var>プラン</var></span></a><span class="arrow"></span></div>
            </li>
            <!--            <li class="item-box-category flexbox">-->
            <!--                <div class="title-category title-category-single flexbox align-items-center"><a href="--><?php //echo WP_HOME; ?><!--/formal/shiromuku"><span class="text-category">白無垢・色打掛<var>プラン</var></span></a><span class="arrow"></span></div>-->
            <!--            </li>-->
            <!--            <li class="item-box-category flexbox">-->
            <!--                <div class="title-category title-category-single flexbox align-items-center"><a href="--><?php //echo WP_HOME; ?><!--/formal/sharegi"><span class="text-category">洒落着<var>プラン</var></span></a><span class="arrow"></span></div>-->
            <!--            </li>-->
            <li class="item-box-category flexbox">
                <div class="title-category flexbox align-items-center">
                    <a href="<?= WP_HOME ?>/takuhai/yukata"><span class="text-category">浴衣<var>プラン</var></span></a>
                    <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                </div>
                <ul class="sub-cates">
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?= WP_HOME ?>/takuhai/yukata/women"><span class="text-category">女性</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?= WP_HOME ?>/takuhai/yukata/men"><span class="text-category">男性</span></a><span class="arrow"></span></div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<?php include 'shop-list-new-kimono.php'; ?>
<div class="wrap-category scene">
    <div class="title-general text-center"><span class="text-title-general">Scene</span><span class="sub-text-title sub-text-title-new">シーンで探す</span></div>
    <div class="box-category">
        <ul class="list-box-category">
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="/kimono"><span class="text-category">観光・お散歩</span></a><span class="arrow"></span></div>
            </li>
            <li id="party" class="item-box-category flexbox">
                <div class="title-category flexbox align-items-center">
                    <a href="<?php echo WP_HOME; ?>/formal/party"><span class="text-category">パーティー</span></a>
                    <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                </div>
                <ul class="sub-cates">
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/party/formalparty"><span class="text-category">格式の高いパーティ</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/party/casualparty"><span class="text-category">気軽なパーティ</span></a><span class="arrow"></span></div>
                    </li>
                </ul>
            </li>
            <li id="wedding" class="item-box-category flexbox">
                <div class="title-category flexbox align-items-center">
                    <a href="<?php echo WP_HOME; ?>/formal/wedding"><span class="text-category">結婚式</span></a>
                    <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                </div>
                <ul class="sub-cates">
					<li>
						<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/wedding/groom"><span class="text-category">ご本人（花婿）</span></a><span class="arrow"></span></div>
					</li>
<!--                    <li>-->
<!--                        <div class="title-category title-category-single flexbox align-items-center"><a href="--><?php //echo WP_HOME; ?><!--/formal/wedding/bridge"><span class="text-category">ご本人（花嫁）</span></a><span class="arrow"></span></div>-->
<!--                    </li>-->
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/wedding/relativemarried"><span class="text-category">ご親族（既婚）</span></a><span class="arrow"></span></div>
                    </li>
					<li>
						<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/wedding/relativeunmarried"><span class="text-category">ご親族（未婚）</span></a><span class="arrow"></span></div>
					</li>
<!--                    <li>-->
<!--                        <div class="title-category title-category-single flexbox align-items-center"><a href="--><?php //echo WP_HOME; ?><!--/formal/wedding/friendmarried"><span class="text-category">ご友人（既婚）</span></a><span class="arrow"></span></div>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <div class="title-category title-category-single flexbox align-items-center"><a href="--><?php //echo WP_HOME; ?><!--/formal/wedding/friendunmarried"><span class="text-category">ご友人（未婚）</span></a><span class="arrow"></span></div>-->
<!--                    </li>-->
					<li>
						<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/wedding/friend"><span class="text-category">ご友人</span></a><span class="arrow"></span></div>
					</li>
                </ul>
            </li>
            <li id="sotsugyoushiki" class="item-box-category flexbox">
                <div class="title-category flexbox align-items-center">
                    <a href="<?php echo WP_HOME; ?>/formal/sotsugyoushiki"><span class="text-category">卒業式</span></a>
                    <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                </div>
                <ul class="sub-cates">
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/sotsugyoushiki/personalstudent"><span class="text-category">ご本人（大学生）</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/sotsugyoushiki/personalpupil"><span class="text-category">ご本人（小学生）</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/sotsugyoushiki/mother"><span class="text-category">母親</span></a><span class="arrow"></span></div>
                    </li>
                </ul>
            </li>
            <li id="seijinshiki" class="item-box-category flexbox">
                <div class="title-category flexbox align-items-center">
                    <a href="<?php echo WP_HOME; ?>/formal/seijinshiki"><span class="text-category">成人式</span></a>
                    <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                </div>
                <ul class="sub-cates">
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/seijinshiki/female"><span class="text-category">ご本人（女性）</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/seijinshiki/mother"><span class="text-category">母親</span></a><span class="arrow"></span></div>
                    </li>
                </ul>
            </li>
            <li id="shichigosan-scene" class="item-box-category flexbox">
                <div class="title-category flexbox align-items-center">
                    <a href="<?php echo WP_HOME; ?>/formal/shichigosanscene "><span class="text-category">七五三</span></a>
                    <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                </div>
                <ul class="sub-cates">
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/shichigosanscene/shichigosan3years"><span class="text-category">七五三（三歳）</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/shichigosanscene/shichigosan5years"><span class="text-category">七五三（五歳）</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/shichigosanscene/shichigosan7years"><span class="text-category">七五三（七歳）</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/shichigosanscene/mother"><span class="text-category">母親</span></a><span class="arrow"></span></div>
                    </li>
                </ul>
            </li>
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="/formal/nyugakushiki"><span class="text-category">入学式</span></a><span class="arrow"></span></div>
            </li>
            <li id="omiyamairi" class="item-box-category flexbox">
                <div class="title-category flexbox align-items-center">
                    <a href="<?php echo WP_HOME; ?>/formal/omiyamairi"><span class="text-category">お宮参り</span></a>
                    <p class="wrap-arrow" data-sub-cates=".sub-cates"><span class="arrow"></span></p>
                </div>
                <ul class="sub-cates">
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/omiyamairi/baby"><span class="text-category">赤ちゃん</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/omiyamairi/mother"><span class="text-category">母親</span></a><span class="arrow"></span></div>
                    </li>
                    <li>
                        <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/omiyamairi/grandmother"><span class="text-category">祖母</span></a><span class="arrow"></span></div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<?php if (!is_page('takuhai')) : ?>
<div class="wrap-category preview" >
	<?php defined('ENABLE_FORMAL_PREVIEW_POPUP') or define('ENABLE_FORMAL_PREVIEW_POPUP', true);?>
    <div class="title-general text-center"><span class="text-title-general">Preview</span><span class="sub-text-title sub-text-title-new">下見で探す</span></div>
	<div class="box-category">
		<ul class="list-box-category">
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center box-category-preview"><a href="<?=WP_HOME?>/formal/preview"><span class="text-category">下見<small>で探す</small></span></a><span class="arrow"></span></div>
			</li>
		</ul>
	</div>
</div>
<?php endif; ?>
<?php if (!$isPlanList) : ?>
    <div class="wrap-category conditions">
        <?php
        //Get array mapping color category
        $arr_color_mapping  = MasterValues::$arr_color_highend_mapping;

            //Get color category for highend
    //        $highend_cate_color = MasterValues::listItemByCode('product_color');
            $pClassCate = new PclassCate();
            $highend_cate_color = $pClassCate->getListColor();

        $list_cate_color = "";

        if(!empty($highend_cate_color)){
            $list_cate_color .= '<ul class="list-random-color-sidebar sub-list-category active">';
            foreach ($highend_cate_color as $index => $cate_name){
                $slug_name = $arr_color_mapping[$index-33];
                if(!empty($slug_name)){
                    $active_class = $slug_name == $post_name ? "active" :'';
                    $list_cate_color .= '<li class="sub-item item-random-color '.$active_class.'">';
                    $list_cate_color .= '<a class="link-rankdom-color" href="'.WP_HOME.'/formal/color/'.$slug_name.'">';
                    $list_cate_color .= '<span class="random-color-sidebar random-color-'.$slug_name.'"></var></span>';
                    $list_cate_color .= '</a>';
                    $list_cate_color .= '</li>';
                }
            }
            $list_cate_color .= '</ul>';
        }
        ?>
        <div class="title-general text-center"><span class="text-title-general">Conditions</span><span class="sub-text-title sub-text-title-new">その他で探す</span></div>
        <div class="box-category">
            <ul class="list-box-category">
                <li class="item-box-category flexbox">
                    <div class="title-category flexbox align-items-center" data-collapse-cate=".sub-list-category"></span><span class="text-category">色<var>から探す</var></span><span class="arrow"></span></div>
                    <?php echo $list_cate_color; ?>
                </li>
                <li class="item-box-category flexbox">
                    <div class="title-category flexbox align-items-center" data-collapse-cate=".price-slider-wrapper"><span class="text-category">価格帯<var>から探す</var></span><span class="arrow"></span></div>
                    <?php
                    $minKey = 0;
                    $minPrice = MasterValues::$FORMAL_PRICE_FILTER_RANGE[0];
                    $maxKey = count(MasterValues::$FORMAL_PRICE_FILTER_RANGE) - 1;
                    $maxPrice = MasterValues::$FORMAL_PRICE_FILTER_RANGE[$maxKey];
                    $priceKeys = array($minKey, $maxKey);
                    ?>
                    <div class="price-slider-wrapper">
                        <div class="price-slider-values">
                            <span class="price-display" id="from-price-display-sidebar"><?php echo Yii::app()->format->formatNumber($minPrice);?></span>
                            <span class="price-display" id="to-price-display-sidebar"><?php echo Yii::app()->format->formatNumber($maxPrice);?></span>
                        </div>
                        <?php
                        Yii::app()->controller->widget('application.components.widgets.JuiSlider',array(
                            'id' => 'price_slider_sidebar',
                            'options'=>array(
                                'range' => true,
                                'step' => 1,
                                'min'=> 0,
                                'max'=> count(MasterValues::$FORMAL_PRICE_FILTER_RANGE),
                                'values' => $priceKeys,
                                'slide' => new CJavaScriptExpression('function(event, ui){
                                    var  priceValues = '.json_encode(MasterValues::$FORMAL_PRICE_FILTER_RANGE).';
                                    var fromPrice = typeof priceValues[ui.values[0]] != "undefined" ? priceValues[ui.values[0]] : priceValues[0];
                                    var toPrice = typeof priceValues[ui.values[1]] != "undefined" ? priceValues[ui.values[1]] : priceValues[priceValues.length - 1];
                                    if(typeof accounting != "undefined"){
                                        fromPriceDisplay = accounting.formatNumber(fromPrice);
                                        toPriceDisplay = accounting.formatNumber(toPrice);
                                    }else{
                                        fromPriceDisplay = fromPrice;
                                        toPriceDisplay = toPrice;
                                    }
                                    $("#from-price-display-sidebar").text(fromPriceDisplay);
                                    $("#to-price-display-sidebar").text(toPriceDisplay);
                                    $("#from_price_sidebar").val(fromPrice);
                                    $("#to_price_sidebar").val(toPrice);
                                }')
                            ),
                            'htmlOptions'=>array(
                                'style'=>'height:2px;',
                            ),
                        ));
                        ?>
                        <div class="wrap-icon-search">
                            <button class="icon-search-condition" onclick="$('#search_datetime_general_sb').submit()"><i class="icon icon-formal-search"></i></button>
                        </div>
                    </div>
                </li>
	            <li class="item-box-category flexbox">
		            <div class="title-category flexbox align-items-center" data-collapse-cate=".height-slider-wrapper"><span class="text-category">身長<var>から探す</var></span><span class="arrow"></span></div>
<!--                    --><?php
//                    $fromKey = 0;
//                    $fromHeight = MasterValues::$FORMAL_HEIGHT_FILTER_RANGE[0];
//                    $toKey = count(MasterValues::$FORMAL_HEIGHT_FILTER_RANGE) - 1;
//                    $toHeight = MasterValues::$FORMAL_HEIGHT_FILTER_RANGE[$toKey];
//                    $heightKeys = array($fromKey, $toKey);
//                    ?>
		            <div class="height-slider-wrapper">
			            <div class="height-slider-values">
<!--                            <span class="height-display" id="from-height-display-sidebar">--><?php //echo Yii::app()->format->formatNumber($fromHeight);?><!--</span>-->
<!--                            <span class="height-display" id="to-height-display-sidebar">--><?php //echo Yii::app()->format->formatNumber($toHeight);?><!--</span>-->
				            <div class="wrap-input-search-formal flexbox">
                                <input type="number" class="product-height-sidebar input-search-formal" value="">
                                <span class="search-unit">cm</span>
                            </div>
			            </div>
			            <?php
			            /*
						Yii::app()->controller->widget('application.components.widgets.JuiSlider',array(
							'id' => 'height_slider_sidebar',
							'options'=>array(
								'range' => true,
								'step' => 1,
								'min'=> 0,
								'max'=> count(MasterValues::$FORMAL_HEIGHT_FILTER_RANGE),
								'values' => $heightKeys,
								'slide' => new CJavaScriptExpression('function(event, ui){
									var heightValues = '.json_encode(MasterValues::$FORMAL_HEIGHT_FILTER_RANGE).';
									var fromHeight = typeof heightValues[ui.values[0]] != "undefined" ? heightValues[ui.values[0]] : heightValues[0];
									var toHeight = typeof heightValues[ui.values[1]] != "undefined" ? heightValues[ui.values[1]] : heightValues[heightValues.length - 1];

									$("#from-height-display-sidebar").text(fromHeight);
									$("#to-height-display-sidebar").text(toHeight);
									$("#from_height_sidebar").val(fromHeight);
									$("#to_height_sidebar").val(toHeight);
								}')
							),
							'htmlOptions'=>array(
								'style'=>'height:2px;',
							),
						));
						*/
			            ?>
			            <div class="wrap-icon-search">
				            <button class="icon-search-condition" onclick="$('#search_datetime_general_sb').submit()"><i class="icon icon-formal-search"></i></button>
			            </div>
		            </div>
	            </li>

	            <li class="item-box-category flexbox">
		            <div class="title-category flexbox align-items-center" data-collapse-cate=".product-code-wrapper"><span class="text-category">型番<var>から探す</var></span><span class="arrow"></span></div>
		            <div class="product-code-wrapper">
			            <div class="product-code-values">
				            <div class="wrap-input-search-formal flexbox">
					            <input class="product-code-sidebar input-search-formal" value="">
				            </div>
			            </div>
			            <div class="wrap-icon-search">
				            <button class="icon-search-condition" onclick="$('#search_datetime_general_sb').submit()"><i class="icon icon-formal-search"></i></button>
			            </div>
		            </div>
	            </li>

	            <li class="item-box-category flexbox">
		            <div class="title-category flexbox align-items-center" data-collapse-cate=".shop-wrapper"><span class="text-category">店舗の在庫<var>から探す</var></span><span class="arrow"></span></div>
		            <div class="shop-wrapper">
			            <div class="shop-values">
				            <div class="wrap-input-search-formal flexbox">
					            <select name="shop_id" class="shop-id-sidebar">
						            <option value="0"><?= Yii::t("new-kimono-pl",'全店舗') ?></option>
						            <?php foreach (MasterValues::highendShopList() as $shopId => $nameShop) { ?>
							            <option value="<?=$shopId?>"><?= Yii::t("new-kimono-pl",$nameShop) ?></option>
						            <?php } ?>
					            </select>
				            </div>
			            </div>
			            <div class="wrap-icon-search">
				            <button class="icon-search-condition" onclick="$('#search_datetime_general_sb').submit()"><i class="icon icon-formal-search"></i></button>
			            </div>
		            </div>
	            </li>

                <li class="item-box-category flexbox">
                    <div class="title-category flexbox align-items-center formal-calendar-cate" data-collapse-cate=".sub-list-category"><span class="text-category">日付<var>から探す</var></span><span class="arrow"></span></div>

                    <div class="suggest_datepicker" class="arrow-down" style="z-index: 9999; position: relative;">
                        <?php
                        $useDate = null;
                        if(!empty($_GET['use_date'])){
                            try{
                                $useDateObj = DateTime::createFromFormat(DateTimeUtils::DEV_DATE_FORMAT, $_GET['use_date']);
                                $useDate = $useDateObj->format(DateTimeUtils::getPhpDateFormat());
                            }catch (Exception $e){
                                $useDate = null;
                            }
                        }
                        $minimumDate = new DateTime();
                        $minimumDate->modify('+'.MasterValues::DEFAULT_LOCK_DAYS_FOR_SHOP.' days');
                        $maximumDate = new DateTime('2099/12/31');
                        $arg = array(
                            'htmlOptions' => array(
                                'id' => 'date_picker_sidebar',
                            ),
                            'name' => 'date_picker_sidebar',
                            'language' =>  Yii::app()->language,
                            'value' => $useDate,
                            'flat' => true,
                            'options' => array(
                                'altFormat' => 'yymmdd',
                                'dateFormat' => DateTimeUtils::getJuiDateFormat(),
                                'showAnim' => 'slideDown',
                                'changeYear'=>true,
                                'changeMonth'=>true,
                                'yearRange'=>'2000:2099',
                                'minDate' => $minimumDate->format(DateTimeUtils::getPhpDateFormat()),
                                'maxDate' => $maximumDate->format(DateTimeUtils::getPhpDateFormat()),
                                'dayNamesMin' => Yii::app()->locale->getWeekDayNames('narrow'),
                                'monthNamesShort' => ["1","2","3","4","5","6","7","8","9","10","11","12"],
                                'showMonthAfterYear' => true,
                                'yearSuffix' => Yii::t('formal_booking', ' 年'),
                                'monthSuffix' => Yii::t('formal_booking', ' 月'),
                                'onSelect' => 'js:function(e){
                                    var dateSelected = $("#date_picker_sidebar").val();
                                    $("#use_date_cate").val(dateSelected);
                                    $("#search_datetime_general_sb").submit();
                                }'
                            ),
                        );

                        Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', $arg);
                        ?>
                    </div>
                </li>
                <li class="item-box-category item-box-category-search flexbox" style="display: none;">
                    <div class="box-search-condition flexbox align-items-center justify-content-between">
                        <form action="<?php echo $permalink?>" id="search_datetime_general_sb" method="get">
                            <input type="text" id="search" name="keyword" placeholder="Search..."/>
                            <input type="hidden" id="use_date_cate" name="use_date"/>
                            <input type="hidden" readonly  name="from_price" id="from_price_sidebar">
                            <input type="hidden" readonly name="to_price" id="to_price_sidebar">
	                        <input type="hidden" readonly  name="from_height" id="from_height_sidebar">
	                        <input type="hidden" readonly name="to_height" id="to_height_sidebar">
	                        <input type="hidden" readonly name="product_code" id="product_code">
	                        <input type="hidden" readonly name="shop_id" id="shop_id">
                            <button class="icon-search-condition"><i class="icon icon-formal-search"></i></button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--    /--><?php
    //    if($post->post_name == 'takuhai' && !($isSmartPhone)){
    //        echo do_shortcode('[TakuhaiBannerTopic]');
//			echo do_shortcode('[FormalBannerTopic direction="right"]');
    //    }
    //    if($post->post_name == 'formal'){
			//echo do_shortcode('[NewFormalBannerTopic direction="left"]');
		//}
//    ?>
<?php endif; ?>

<script>
    $(document).ready(function () {
        <?php if($post):?>
        //Active for page detail active
        var cate_list_plan     = $(".sub-list-category-plan li");
        var cate_list_scene    = $(".wrap-category.scene").find(".item-box-category");
        var sub_item_condition = $(".wrap-category.conditions").find(".sub-item");
        var cate_name_slug     = '<?php echo $post_name; ?>';

        //List category plan
        if($(cate_list_plan).length > 0){
            $(cate_list_plan).each(function (index, el) {
                var id_cate = $(el).attr("id");
                if(cate_name_slug === id_cate){
                    $(el).addClass("active");
                }
            });
        }
        //List category scene
        if($(cate_list_scene).length > 0){
            $(cate_list_scene).each(function (index, el) {
                var id_cate = $(el).attr("id");
                if(cate_name_slug === id_cate){
                    $(el).addClass("active");
                }
            });
        }
        //List category color
        if($(sub_item_condition).length > 0){
            $(sub_item_condition).each(function (index, el) {
                if($(el).hasClass('active')){
                    $(this).parents('.item-box-category').addClass('active');
                    $(this).parent('.sub-list-category').show();
                }
            });
        }
	    // Product height
	    $('.product-height-sidebar').on('change', function () {
		    var productHeightVal = $(this).val();
		    if(productHeightVal.length > 0){
			    $("#from_height_sidebar").val(productHeightVal);
			    $("#to_height_sidebar").val(productHeightVal);
		    }
	    });
        <?php endif?>
        $('.linkto-cart-sidebar').attr('href',$('.linkto-cart:first').attr('href'));

	    // Product code
	    $('.product-code-sidebar').on('change', function () {
		    var productCodeVal = $(this).val();
		    if(productCodeVal.length > 0){
			    $("#product_code").val(productCodeVal);
		    }
	    });

	    // Shop id
	    $('.shop-id-sidebar').on('change', function () {
		    var shopIdVal = $(this).val();
		    if(shopIdVal.length > 0){
			    $("#shop_id").val(shopIdVal);
		    }
	    });


        // Highlight specific category plan
        var meta_link = $(".wrap-category.plan .title-category a, .wrap-category.scene .title-category a");
        var post_name = '<?php echo $post_name; ?>';
        var post_parent = '<?php echo $post_parent; ?>';
        var slug = '';
        var parentSlug = '';
        $(meta_link).each(function (key, val) {
            var pageHref = $(val).attr('href').split('/');
            slug = pageHref[pageHref.length - 1];
            parentSlug = pageHref[pageHref.length - 2];
            if (post_name === slug && post_parent === parentSlug) {
                var parent = $(this).parent();
                $(parent).addClass('active-url');
                var hasLength = $(val).parents('.sub-cates').length;
                if (hasLength > 0){
                    $(val).parents('.sub-cates').css('display', 'block');
                }
            }
        })

    });
</script>

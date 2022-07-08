<?php
$pageList = get_page_by_path('formal/list');
$permalink = $pageList ? get_permalink($pageList) : '';
global $post;
$post_name = $post->post_name;
?>
<div class="wrap-category plan">
    <h2 class="title-general text-center"><span class="text-title-general">Plan</span><span class="sub-text-title">プランで探す</span></h2>
    <div class="box-category">
        <ul class="list-box-category">
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/homongi"><span class="text-category">訪問着<var>プラン</var></span></a><span class="arrow"></span></div>
			</li>
            <li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/kurotomesode"><span class="text-category">黒留袖<var>プラン</var></span></a><span class="arrow"></span></div>
            </li>
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/irotomesode"><span class="text-category">色留袖<var>プラン</var></span></a><span class="arrow"></span></div>
			</li>
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/furisode"><span class="text-category">振袖<var>プラン</var></span></a><span class="arrow"></span></div>
			</li>
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/hakama"><span class="text-category">袴・二尺袖<var>プラン</var></span></a><span class="arrow"></span></div>
			</li>
			<li class="item-box-category flexbox">
				<div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/shichigosan"><span class="text-category">七五三<var>プラン</var></span></a><span class="arrow"></span></div>
			</li>
        </ul>
    </div>
</div>
<div class="wrap-category scene">
    <h2 class="title-general text-center"><span class="text-title-general">Scene</span><span class="sub-text-title">シーンで探す</span></h2>
    <div class="box-category">
        <ul class="list-box-category">
            <li class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="/kimono"><span class="text-category">観光・お散歩</span></a><span class="arrow"></span></div>
            </li>
            <li id="party" class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/party"><span class="text-category">パーティー</span></a><span class="arrow"></span></div>
            </li>
            <li id="wedding" class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/wedding"><span class="text-category">結婚式</span></a><span class="arrow"></span></div>
            </li>
            <li id="sotsugyoushiki" class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/sotsugyoushiki"><span class="text-category">卒業式</span></a><span class="arrow"></span></div>
            </li>
            <li id="seijinshiki" class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/seijinshiki"><span class="text-category">成人式</span></a><span class="arrow"></span></div>
            </li>
            <li id="shichigosan" class="item-box-category flexbox">
                <div class="title-category title-category-single flexbox align-items-center"><a href="<?php echo WP_HOME; ?>/formal/shichigosan "><span class="text-category">七五三</span></a><span class="arrow"></span></div>
            </li>
        </ul>
    </div>
</div>
<?php if (!$isPlanList) : ?>
    <div class="wrap-category conditions">
        <?php
            //Get array mapping color category
            $arr_color_mapping  = MasterValues::$arr_color_highend_mapping;

            //Get color category for highend
            $highend_cate_color = MasterValues::listItemByCode('product_color');

            $list_cate_color = "";

            if(!empty($highend_cate_color)){
                $list_cate_color .= '<ul class="list-random-color-sidebar sub-list-category active">';
                foreach ($highend_cate_color as $index => $cate_name){
                    $slug_name = $arr_color_mapping[$index];
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
        <h2 class="title-general text-center"><span class="text-title-general">Conditions</span><span class="sub-text-title">その他で探す</span></h2>
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
                                    $("#to_price_sidebarr").val(toPrice);
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
                            <button class="icon-search-condition"><i class="icon icon-formal-search"></i></button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <?php
        if($post->post_name == 'takuhai'){
            echo do_shortcode('[TakuhaiBannerTopic]');
			echo do_shortcode('[FormalBannerTopic direction="right"]');
        }
        if($post->post_name == 'formal'){
			echo do_shortcode('[FormalBannerTopic direction="left"]');
		}
    ?>
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
        <?php endif?>
    });
</script>
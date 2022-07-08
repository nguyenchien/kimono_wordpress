<?php
global $post, $isSmartPhone;
$pageList = get_page_by_path('formal/list');
$permalink = $pageList ? get_permalink($pageList) : '';
$post_name = isset($post->post_name) ? $post->post_name: '';
$post_parent = get_post($post->post_parent)->post_name;
$post_parent = isset( $post_parent ) ? $post_parent : '';
$groupTravels = array(
    MasterValues::MV_GROUP_HOMONGI => Yii::t('new-sidebar-left-v2', '訪問着'),
    MasterValues::MV_GROUP_KUROTOMESODE => Yii::t('new-sidebar-left-v2', '黒留袖'),
    MasterValues::MV_GROUP_IROTOMESODE => Yii::t('new-sidebar-left-v2', '色留袖'),
    MasterValues::MV_GROUP_SEIJIN => Yii::t('new-sidebar-left-v2', '振袖'),
    MasterValues::MV_GROUP_SOTSUGYOU_SIMPLE => Yii::t('new-sidebar-left-v2', '二尺袖(単品)'),
    MasterValues::MV_GROUP_SHICHIGOSAN => Yii::t('new-sidebar-left-v2', '七五三'),
    MasterValues::MV_GROUP_WOMEN_HAKAMA => Yii::t('new-sidebar-left-v2', '袴(単品)'),
    MasterValues::MV_GROUP_UBUGI => Yii::t('new-sidebar-left-v2', '産着'),
    //MasterValues::MV_GROUP_YUKATA => Yii::t('new-sidebar-left-v2', '浴衣'),
    MasterValues::MV_GROUP_MOFUKU => Yii::t('new-sidebar-left-v2', '喪服'),
);
$colorSlug = array(
    1 => 'white',
    2 => 'cream',
    3 => 'red',
    4 => 'pink',
    5 => 'purple',
    6 => 'gray',
    7 => 'black',
    8 => 'green',
    9 => 'blue',
    10 => 'light-blue',
    11 => 'yellow',
    12 => 'tea',
    13 => 'orange',
    14 => 'gold',
    15 => 'silver'
);
$colors = MasterValues::listItemByCode('product_color');
$pClassCate= new PclassCate();
$productColors = $pClassCate->getListColor();
$productColors['others'] = yii::t('formal', 'Others');
?>

<div class="wrap-category conditions conditions-filter wrap-filter-new-style">
    <?php
    //Get array mapping color category
    $arr_color_mapping  = MasterValues::$arr_color_highend_mapping;

    //Get color category for highend
    //$highend_cate_color = MasterValues::listItemByCode('product_color');
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
<style>
.wrap-search-product-v3 .wrap-input-price{
	margin-bottom: 20px;
}
.left-column .conditions #price_slider_sidebar{
	    height: 5px!important;
    margin-bottom: 25px;
}
.ui-slider-horizontal .ui-slider-range{
    background: #979797;
}
.ui-state-default,.conditions .ui-widget-content .ui-state-default{
	left: 100%;
    top: -14px;
    /*border-radius: 50%!important;*/
    width: 30px!important;
    height: 30px;
    outline: 0;
    /*border: 1px solid #bebdbd!important;*/
    background: #fff!important;
}
input[type=number]{
   font-size: 15px;
   text-align: center;
}
.wrap-search-product-v3 .wrap-input{
   text-align-last: center;
}
</style>
    <div class="box-category box-category collapse-cate wrap-filter-new-style">
        <ul class="list-box-category">
            <li class="item-box-category flexbox item-box-category-main">
                <div class="title-general text-center title-general-new-style kimono-blur yukata-contest" data-collapse-cate=".collapse-cate">
                    <div class="wrap-title-text flexbox">
                        <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                        <span class="text-title-general"><?php echo Yii::t('new-sidebar-left-v2', '条件'); ?></span>
                        <span class="sub-text-title sub-text-title-new"><?php echo Yii::t('new-sidebar-left-v2', 'で探す'); ?></span>
                    </div>
                    <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
                </div>
                <form action="<?php echo $permalink?>" id="search_product_multiple" class="collapse-cate" method="get">
                    <ul class="collapse-cate">
                        <li class="item-box-category flexbox">
                            <div class="title-sub-list-category"><?php echo Yii::t('new-sidebar-left-v2', 'お着物の種類'); ?></div>
                            <ul class='sub-list-category group-plan-type' style='display: flex;flex-wrap:wrap'>
                                <?php foreach ($groupTravels as $groupId => $groupName):
                                    ?>
                                    <li class='sub-item'>
                                        <label class='flexbox align-items-center'>
                                            <input type='checkbox' name='plan_group[]' value='<?= $groupId?>' class="search-on-change"/>
                                            <span class='cat-name'><?php echo $groupName?></span>
                                        </label>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <li class="item-box-category flexbox">
                            <div class="title-sub-list-category"><?php echo Yii::t('new-sidebar-left-v2', '着る方'); ?></div>
                            <ul class='sub-list-category group-plan-type' style='display: flex;flex-wrap:wrap'>
                                <li class='sub-item'>
                                    <label class='flexbox align-items-center'>
                                        <input type='checkbox' name='for_sex[]' value='1' class="search-on-change"/>
                                        <span class='cat-name'>女性</span>
                                    </label>
                                </li>
                                <li class='sub-item'>
                                    <label class='flexbox align-items-center'>
                                        <input type='checkbox' name='for_sex[]' value='2' class="search-on-change"/>
                                        <span class='cat-name'>男性</span>
                                    </label>
                                </li>
                                <li class='sub-item'>
                                    <label class='flexbox align-items-center'>
                                        <input type='checkbox' name='for_sex[]' value='3' class="search-on-change"/>
                                        <span class='cat-name'>女の子</span>
                                    </label>
                                </li>
                                <li class='sub-item'>
                                    <label class='flexbox align-items-center'>
                                        <input type='checkbox' name='for_sex[]' value='4' class="search-on-change"/>
                                        <span class='cat-name'>男の子</span>
                                    </label>
                                </li>
                            </ul>
                        </li>
                        <li class="item-box-category flexbox item-box-category-color-rectangle">
                            <div class="title-sub-list-category"><?php echo Yii::t('new-sidebar-left-v2', '色'); ?></div>
                            <ul class='sub-list-category color-cate' style='display: flex;flex-wrap:wrap'>
                                <?php foreach ($productColors as $colorVal => $colorName) : ?>
                                    <li class='sub-item sub-color-<?= $colorVal?>' data-id='<?= $colorVal?>'>
                                        <label class='flexbox align-items-center'>
                                            <input type='checkbox' name='color[]' value='<?php echo $colorVal?>' class="search-on-change"/>
                                            <?php if(isset($colorSlug[$colorVal - 33])):?>
                                                <span class='cat-name random-color-sidebar random-color-<?php echo $colorSlug[$colorVal-33]?>'></span><span class="count-item"></span>
                                            <?php else:?>
                                                <span class='cat-name random-color-sidebar random-color-others'><?php echo Yii::t('formal','Other colors')?></span><span class="count-item"></span>
                                            <?php endif?>
                                        </label>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <li class="item-box-category flexbox">
                            <div class="title-sub-list-category"><?php echo Yii::t('new-sidebar-left-v2', '価格帯（円）'); ?></div>
			   <?php
                            $minKey = 0;
                            $minPrice = MasterValues::$FORMAL_PRICE_FILTER_RANGE[0];
                            $maxKey = count(MasterValues::$FORMAL_PRICE_FILTER_RANGE) - 1;
                            $maxPrice = MasterValues::$FORMAL_PRICE_FILTER_RANGE[$maxKey];
                            $priceKeys = array($minKey, $maxKey);
                            ?>
				 <div class="wrap-input wrap-input-price price-slider-values flexbox">
				<input class="price-ip" type="number" name="from_price" id="from_price_sidebar" value="" placeholder="<?php echo Yii::app()->format->formatNumber($minPrice);?>" />
                                <span class="symbol">～</span>
                                <input class="price-ip" type="number" name="to_price" id="to_price_sidebar" value="" placeholder="<?php echo Yii::app()->format->formatNumber($maxPrice);?>" />
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
                        </li>
                        <li class="item-box-category flexbox">
                            <div class="title-sub-list-category"><?php echo Yii::t('new-sidebar-left-v2', '身長'); ?></div>
                            <div class="wrap-input wrap-input-size flexbox">
                                <input type="number" class="product-height-sidebar input-search-formal" value="">
                                <span class="search-unit">cm</span>
                            </div>
                        </li>
                        <li class="item-box-category flexbox">
                            <div class="title-sub-list-category"><?php echo Yii::t('new-sidebar-left-v2', '日付'); ?></div>
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
                                                //$("#search_datetime_general_sb").submit();
                                            }'
                                    ),
                                );
                                Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', $arg);
                                ?>
                            </div>
                            <div class="wrap-buttons-filter-calendar">
                                <button class="btn-filter-conditions search kimono yukata-contest" onclick="ajaxSearch('search_product_multiple');return false;"><?php echo Yii::t('new-sidebar-left-v2', '上記の条件で検索'); ?></button>
                                <button class="btn-filter-conditions cancel" onclick="$('#search_product_multiple').trigger('reset');return false;"><?php echo Yii::t('new-sidebar-left-v2', '条件をリセット'); ?></button>
                            </div>
                        </li>
                    </ul>
                    <input type="hidden" id="use_date_cate" name="use_date" />
                    <input type="hidden" readonly  name="from_height" id="from_height_sidebar" />
                    <input type="hidden" readonly name="to_height" id="to_height_sidebar" />
                </form>
            </li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function () {
        <?php if ( $post ) : ?>
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

    });

    function resetSearchForm() {
        var $slider = $("#price_slider_sidebar");
        $slider.slider("values", 0, 0);
        $slider.slider("values", 1, 99000);
        $("#from-price-display-sidebar").text(0);
        $("#to-price-display-sidebar").text(99000);

        $('#date_picker_sidebar_container').datepicker("setDate", new Date() );

        $('.toggle-left-sidebar').find('input:checkbox').removeAttr('checked');
        $('.toggle-left-sidebar').find("input").val("");
    }
    function ajaxSearch(formId) {
        var data = $("#"+formId).serialize();
        var param = decodeURIComponent(data);
        window.location.href = "<?php echo $permalink?>"+"?"+param;
    }
</script>

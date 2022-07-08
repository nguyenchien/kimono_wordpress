<?php
    global $post, $isSmartPhone;
    $pageList = get_page_by_path('formal/list');
    $permalink = $pageList ? get_permalink($pageList) : '';
    $post_name = isset($post->post_name) ? $post->post_name: '';
    $post_parent = get_post($post->post_parent)->post_name;
    $post_parent = isset( $post_parent ) ? $post_parent : '';
    $groupTravels = array(
        MasterValues::MV_GROUP_HOMONGI => '訪問着',
        MasterValues::MV_GROUP_KUROTOMESODE => '黒留袖',
        MasterValues::MV_GROUP_IROTOMESODE => '色留袖',
        MasterValues::MV_GROUP_SEIJIN => '振袖',
        MasterValues::MV_GROUP_SHICHIGOSAN => '七五三',
        MasterValues::MV_GROUP_SOTSUGYOU_SIMPLE => '二尺袖(単品)',
        MasterValues::MV_GROUP_WOMEN_HAKAMA => '袴(単品)',
        MasterValues::MV_GROUP_UBUGI => '産着',
        MasterValues::MV_GROUP_YUKATA => '浴衣',
        MasterValues::MV_GROUP_MOFUKU => '喪服',
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
    <div class="box-category box-category collapse-cate wrap-filter-new-style">
        <ul class="list-box-category">
            <li class="item-box-category flexbox item-box-category-main">
                <div class="title-general text-center title-general-new-style kimono-blur yukata-contest" data-collapse-cate=".collapse-cate">
                    <div class="wrap-title-text flexbox">
                        <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                        <span class="text-title-general">条件</span>
                        <span class="sub-text-title sub-text-title-new">で探す</span>
                    </div>
                    <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
                </div>
                <form action="<?php echo $permalink?>" id="search_product_multiple" class="collapse-cate" method="get">
                    <ul class="collapse-cate">
                        <li class="item-box-category flexbox">
                            <div class="title-sub-list-category">お着物の種類</div>
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
                            <div class="title-sub-list-category">性別</div>
                            <ul class='sub-list-category group-plan-type' style='display: flex;flex-wrap:wrap'>
                                <li class='sub-item'>
                                    <label class='flexbox align-items-center'>
                                        <input type='checkbox' name='for_sex[]' value='2' class="search-on-change"/>
                                        <span class='cat-name'>女性物</span>
                                    </label>
                                </li>
                                <li class='sub-item'>
                                    <label class='flexbox align-items-center'>
                                        <input type='checkbox' name='for_sex[]' value='1' class="search-on-change"/>
                                        <span class='cat-name'>男性物</span>
                                    </label>
                                </li>
                            </ul>
                        </li>
                        <li class="item-box-category flexbox item-box-category-color-rectangle">
                            <div class="title-sub-list-category">色</div>
                            <ul class='123 sub-list-category color-cate' style='display: flex;flex-wrap:wrap'>
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
                            <div class="title-sub-list-category">価格帯</div>
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
                            </div>
                        </li>
                        <li class="item-box-category flexbox">
                            <div class="title-sub-list-category">身長</div>
                            <div class="height-slider-wrapper">
                                <div class="height-slider-values">
                                    <div class="wrap-input-search-formal flexbox">
                                        <input type="number" class="product-height-sidebar input-search-formal" value="">
                                        <span class="search-unit">cm</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item-box-category flexbox">
                            <div class="title-sub-list-category">日付</div>
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
                                <button class="btn-filter-conditions search kimono yukata-contest" onclick="ajaxSearch('search_product_multiple');return false;">上記の条件で検索</button>
                                <button class="btn-filter-conditions cancel" onclick="$('#search_product_multiple').trigger('reset');return false;">条件をリセット</button>
                            </div>
                            <a class="link-top-araibar" target="_blank" href="https://araiba.net/cleaning">
                                <div class="wrap-text-banner-araibar">
                                    <img data-src="<?= WP_HOME; ?>/images/new-kimono-v3/araibabanner-kimono-min.jpg?ver=20200305" alt="着物クリーニング＆保管サービス「アライバ」OPEN!">
                                    <p class="text-araibar">着物クリーニング＆保管サービス「アライバ」OPEN!</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <input type="hidden" id="use_date_cate" name="use_date" />
                    <input type="hidden" readonly  name="from_price" id="from_price_sidebar" />
                    <input type="hidden" readonly name="to_price" id="to_price_sidebar" />
                    <input type="hidden" readonly  name="from_height" id="from_height_sidebar" />
                    <input type="hidden" readonly name="to_height" id="to_height_sidebar" />
                </form>
            </li>

            <li class="item-box-category flexbox">
                <div class="title-general text-center title-general-new-style kimono-blur yukata-contest" data-collapse-cate=".product-code-wrapper">
                    <div class="wrap-title-text flexbox">
                        <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                        <span class="text-title-general">型番</span>
                        <span class="sub-text-title sub-text-title-new">から探す</span>
                    </div>
                    <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
                </div>
                <div class="product-code-wrapper">
                    <div class="product-code-values">
                        <div class="wrap-input-search-formal flexbox">
                            <input class="product-code-sidebar input-search-formal" value="">
                        </div>
                    </div>
                    <div class="wrap-icon-search">
                        <button class="icon-search-condition kimono yukata-contest" onclick="$('#search_datetime_general_sb').submit()">検索</button>
                    </div>
                </div>
            </li>

            <li class="item-box-category flexbox">
                <div class="title-general text-center title-general-new-style kimono-blur yukata-contest" data-collapse-cate=".shop-wrapper">
                    <div class="wrap-title-text flexbox">
                        <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                        <span class="text-title-general">店舗の在庫</span>
                        <span class="sub-text-title sub-text-title-new">から探す</span>
                    </div>
                    <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
                </div>
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
                        <button class="icon-search-condition kimono yukata-contest" onclick="$('#search_datetime_general_sb').submit()">検索</button>
                    </div>
                </div>
            </li>

            <li class="item-box-category item-box-category-search flexbox" style="display: none;">
                <div class="box-search-condition flexbox align-items-center justify-content-between">
                    <form action="<?php echo $permalink?>" id="search_datetime_general_sb" method="get">
                        <input type="text" id="search" name="keyword" placeholder="Search..."/>

                        <input type="hidden" readonly name="product_code" id="product_code">
                        <input type="hidden" readonly name="shop_id" id="shop_id">
                        <button class="icon-search-condition kimono yukata-contest"><i class="icon icon-formal-search"></i></button>
                    </form>
                </div>
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

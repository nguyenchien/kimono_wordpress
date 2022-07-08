<?php
$cs=Yii::app()->getClientScript();
$baseUrl = Yii::app()->baseUrl;
//$cs->registerCssFile($baseUrl.'/css/jquery.we.datepicker.css');
//$cs->registerCssFile($baseUrl.'/css/formal-calendar.css');
//$cs->registerScriptFile($baseUrl.'/js/mustache.js', CClientScript::POS_HEAD);
$cs->registerScriptFile($baseUrl.'/js/jquery.we.datepicker.js',CClientScript::POS_HEAD);

$phpDateFormat = DateTimeUtils::getPhpDateFormat('', 'month_year');
$dateTimeCurrent = new DateTime();
$yearMonthList = array();
for ($month = 1; $month <= 13; $month++) {
    $value = $dateTimeCurrent->format($phpDateFormat);
    $key = $dateTimeCurrent->format('Y-m');
    $yearMonthList[$key] = $value;
    $dateTimeCurrent->modify('last day of next month');
}

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
    MasterValues::MV_GROUP_SOTSUGYOU => Yii::t('new-sidebar-left-v2', '袴・二尺袖'),
    MasterValues::MV_GROUP_SHICHIGOSAN => Yii::t('new-sidebar-left-v2', '七五三'),
    MasterValues::MV_GROUP_SOTSUGYOU_SIMPLE => Yii::t('new-sidebar-left-v2', '二尺袖(単品)'),
    MasterValues::MV_GROUP_WOMEN_HAKAMA => Yii::t('new-sidebar-left-v2', '袴(単品)'),
    MasterValues::MV_GROUP_UBUGI => Yii::t('new-sidebar-left-v2', '産着'),
    MasterValues::MV_GROUP_YUKATA => Yii::t('new-sidebar-left-v2', '浴衣'),
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

<div class="wrap-conditions-landing-page">
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
    <form action="<?php echo $permalink?>" id="search_product_multiple" method="get">
        <ul class="list-conditions-landing-page">
            <li class="item item-other-flex flexbox">
                <p class="title">性別を選択</p>
                <ul class='wrap-content flexbox'>
                    <li class='sub-item'>
                        <label class='flexbox align-items-center'>
                            <input type='checkbox' name='for_sex[]' value='2' class="search-on-change"/>
                            <span class='cat-name'><?php echo Yii::t('new-sidebar-left-v2', '女性物'); ?></span>
                        </label>
                    </li>
                    <li class='sub-item'>
                        <label class='flexbox align-items-center'>
                            <input type='checkbox' name='for_sex[]' value='1' class="search-on-change"/>
                            <span class='cat-name'><?php echo Yii::t('new-sidebar-left-v2', '男性物'); ?></span>
                        </label>
                    </li>
                </ul>
            </li>
            <li class="item item-size flexbox">
                <div class="wrap-item flexbox">
                    <p class="title"><?php echo Yii::t('new-sidebar-left-v2', '身長'); ?></p>
                    <div class="wrap-content other flexbox">
                        <input type="number" class="product-height-sidebar input-search-formal" placeholder="cm" value="">
                    </div>
                </div>
                <div class="wrap-item price-range flexbox">
                    <p class="title"><?php echo Yii::t('new-sidebar-left-v2', '価格帯'); ?></p>
                    <div class="wrap-content other">
                        <input type="number" class="input-search-formal" name="from_price" value="" placeholder="円" />
                        <span class="space">～</span>
                        <input type="number" class="input-search-formal" name="to_price" value="" placeholder="円" />
                    </div>
                </div>
            </li>
            <li class="item flexbox">
                <p class="title">着物の種類を選択</p>
                <ul class='wrap-content wrap-content-other flexbox'>
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
            <li class="item flexbox">
                <p class="title">お好みの色を選択</p>
                <ul class='wrap-content wrap-content-other flexbox'>
                    <?php foreach ($productColors as $colorVal => $colorName) : ?>
                        <li class='sub-item sub-color-<?= $colorVal?>' data-id='<?= $colorVal?>'>
                            <label class='flexbox align-items-center'>
                                <input type='checkbox' name='color[]' value='<?php echo $colorVal?>' class="search-on-change"/>
                                <?php if(isset($colorSlug[$colorVal - 33])):?>
                                    <span class='cat-name random-color-sidebar random-color-<?php echo $colorSlug[$colorVal-33]?>'></span><span class="count-item"><?php echo $colorName; ?></span>
                                <?php else:?>
                                    <span class='cat-name random-color-sidebar random-color-others'><?php echo Yii::t('formal','Other colors')?></span><span class="count-item"></span>
                                <?php endif?>
                            </label>
                        </li>
                    <?php endforeach;?>
                </ul>
            </li>
            
            <li class="item item-calendar-filter">
                <p class="title">レンタル希望日を選択</p>
                <div class="wrap-content wrap-content-colum flexbox">
                    <div class="box-calendar">
                        <div id="use_date_picker" class="formal-datepicker"></div>
                    </div>
                    <div class="box-choose-date">
                        <div class="content-box-choose">
                            <div class="info-calendar">
                                <p class="text-info">◯…予約可能　△…残りわずか　×…ご成約済み</p>
                                <p class="text-info">日付をクリックすると、空席状況の詳細をご確認いただけます。</p>
                            </div>
                            <div class="choose-date">
                                <select class="year-month-list" data-target="#use_date_picker">
                                    <?php
                                    foreach ($yearMonthList as $key => $value) { ?>
                                        <option value="<?php echo $key?>"><?php echo $value;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="wrap-buttons-search">
                            <button class="button-search search" onclick="ajaxSearch('search_product_multiple');return false;"><?php echo Yii::t('new-sidebar-left-v2', '上記の条件で検索'); ?></button>
                            <button class="button-search cancel" onclick="$('#search_product_multiple').trigger('reset');return false;"><?php echo Yii::t('new-sidebar-left-v2', '条件をリセット'); ?></button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <input type="hidden" id="use_date_cate" name="use_date" />
        <input type="hidden" readonly  name="from_height" id="from_height_sidebar" />
        <input type="hidden" readonly name="to_height" id="to_height_sidebar" />
    </form>
</div>

<script>
    var cellTemplate = '<div class="cell-wrapper {{classes}}"><div class="cell-title">{{date}}</div><div class="cell-status"><span>{{cellStatus}}</span><span class="cell-fee">{{feeChangeProduct}}</span></div><span class="icon-time pc"><img src="/images/formal-rental/icon-time.svg" alt="icon-time"></span></div>';
    $(document).ready(function () {
        // Product height
        $('.product-height-sidebar').on('change', function () {
            var productHeightVal = $(this).val();
            if(productHeightVal.length > 0){
                $("#from_height_sidebar").val(productHeightVal);
                $("#to_height_sidebar").val(productHeightVal);
            }
        });

        $('#use_date_picker').WeDatePicker({
            mode: 'single',
            inline: true,
            calendars: 1,
            locale: <?php echo json_encode(array(
            'daysMin'=> array_values(Yii::app()->locale->getWeekDayNames('abbreviated')),
            'months'=> array_values(Yii::app()->locale->getMonthNames('wide')),
            'monthsShort'=> array_values(Yii::app()->locale->getMonthNames('abbreviated'))
        ))?>,
            viewDaysHeading: function (date) {
                return Mustache.render('<?php echo Yii::t('formal', '<span class="year">{{year}}年</span><span class="month">{{month}}</span>')?>', {year: date.getFullYear(), month: this.locale.months[date.getMonth()]});
            },
            minDate: new Date(),
            date: null,
            current: null,
            onBeforeFill: function(start, end){
                //$("#use_date_picker").addClass('datepicker-loading');
                var now = new Date();
                now.setHours(0, 0, 0, 0);
                if(end < now){
                    return;
                }
                if(start < now){
                    start = now;
                }
                var fromDate = start.getFullYear();
                fromDate = (start.getMonth() < 9) ? fromDate + '0' + (start.getMonth() + 1) : fromDate + '' + (start.getMonth() + 1);
                fromDate = (start.getDate() < 10) ? fromDate + '0' + start.getDate() : fromDate + '' + start.getDate();

                var toDate = end.getFullYear();
                toDate = (end.getMonth() < 9) ? toDate + '0' + (end.getMonth() + 1) : toDate + '' + (end.getMonth() + 1);
                toDate = (end.getDate() < 10) ? toDate + '0' + end.getDate() : toDate + '' + end.getDate();
                getVacancyInfoTakuhai(fromDate, toDate);
            },
            onChange: function (date, el) {
                console.log("onchange");
                useDate = new Date(date);
                var useDateStr = useDate.dateFormat("Ymd");
                $("input[name='use_date']").val(useDateStr);
                return true;
            },
            onRenderCell: function (el, date) {
                return {
                    content: Mustache.render(cellTemplate, {date: date.getDate(), cellStatus: '-'}),
                }
            },
        });

        $('.year-month-list').on('change', function () {
            var target = $(this).data('target');
            if(!target || !$(target).length){
                return false;
            }
            try{
                if (typeof $.fn.WeDatePickerSetCurrent !== 'undefined') {
                    $(target).WeDatePickerSetCurrent(new Date($(this).val()));
                }
            }catch (error) {
                console.warn(error);
            }
        });

        // Active item search
        $('.list-conditions-landing-page .sub-item').click(function () {
            if ( $(this).find('input[type="checkbox"]').is(":checked") ){
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
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
    function getVacancyInfoTakuhai(fromDate, toDate, extraRequestData, callback){
        var self = this;
        var requestData = {fromDate: fromDate, toDate: toDate};
        requestData.currentProductId = '<?php echo $productModel->product_id ?>';
        var langT = (curLang == "ja") ? '' : '/' + curLang;
        $.ajax({
            dataType: "json",
            url: baseUrl + langT  + '/ajax/getVacationDataForTakuhai',
            data: requestData,
            success: function (data) {
                var disableDates = data.disableDates;
                var changeProduct = data.changeProduct;
                fillVacancyToDatePickerTakuhai(fromDate, toDate, disableDates);
                console.log(data);
                if(typeof callback == 'function'){
                    callback();
                }
            }
        });
    }
    function fillVacancyToDatePickerTakuhai(fromDate, toDate, disableDates) {
        var self = this;
        var runDate = fromDate;
        var runDateObj = new Date( runDate.replace( /(\d{4})(\d{2})(\d{2})/, "$1-$2-$3") );
        while (runDate <= toDate){
            var $cell = $("#use_date_picker").find('.weDatePickerCell[data-date="'+runDateObj.getDate()+'"][data-month="'+runDateObj.getMonth()+'"][data-year="'+runDateObj.getFullYear()+'"]');
            var isDisabled = disableDates.indexOf(runDateObj.dateFormat('Y-m-d')) >= 0;
            $cell.each(function () {
                $(this).html(Mustache.render(self.cellTemplate, {date: runDateObj.getDate(), cellStatus: isDisabled ? '×' : '◯'}));
                if(isDisabled){
                    $(this).addClass('weDatePickerDisabled');
                }else{
                    $(this).removeClass('weDatePickerDisabled');
                }
            });
            runDateObj.setDate(runDateObj.getDate() + 1);
            runDate = runDateObj.dateFormat('Ymd');
        }
        //$("#use_date_picker").removeClass('datepicker-loading');
    }
</script>

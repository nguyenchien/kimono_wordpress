<?php
global $isSmartPhone;
$pageList = get_page_by_path('formal/list');
$useDate = null;
$useDateObj = null;
$useDateDisplay = Yii::t('formal','ご利用日');
if(!empty($_GET['use_date'])){
    try{
        $useDateObj = DateTime::createFromFormat(DateTimeUtils::DEV_DATE_FORMAT, $_GET['use_date']);
        $useDate = $useDateObj->format(DateTimeUtils::getPhpDateFormat());
        $useDateDisplay = $useDateObj->format(DateTimeUtils::getDateFormat('php', '', 'month_current'));
    }catch (Exception $e){
        $useDate = null;
    }
}
?>

<div class="wrap-form-search-top">
	<form action="<?php echo $pageList ? get_permalink($pageList) : ''?>" method="get" id="search_box_top_formal" class="form-search-top-formal">
		<div class="flexbox">
			<div class="group-form-search">
				<div id="use_date_container" class="wrap-choose-calendar flexbox justify-content-between align-items-center dropdown-search">
					<span class="text-date-calendar"><?php echo $useDateDisplay?></span>
					<span class="icon icon-formal-calendar arrow-down flexbox"></span>
				</div><!--end wrap-choose-calendar-->

				<div class="wrap-dropdown-search">
					<select name="plan_group" id="search_box_top_plan_group">
						<option value="">ご利用プラン</option>
						<?php foreach (MasterValues::$MV_GROUP_TRAVEL as $group):?>
							<option value="<?php echo $group?>" <?php echo isset($_GET['plan_group']) && $_GET['plan_group'] == $group ? 'selected':''?>><?php echo Yii::t('formal','plan-group-'.$group)?></option>
						<?php endforeach;?>
					</select>
				</div><!--end wrap-dropdown-search-->
			</div><!--end group-form-search-->
			<button type="submit" class="btn-top-search"><span class="icon icon-formal-search"></span></button>
		</div>

		<?php if(!$isSmartPhone) { ?>
		<div id="search_box_top_date_picker_wrapper" class="search_box_top_date_picker_wrapper">
			<?php
			$minimumDate = new DateTime();
			$minimumDate->modify('+'.MasterValues::DEFAULT_LOCK_DAYS_FOR_SHOP.' days');
			$maximumDate = new DateTime('2099/12/31');
			$arg = array(
				'htmlOptions' => array(
					'id' => 'search_box_top_date_picker',
					'name' => 'use_date'
				),
				'language' =>  Yii::app()->language,
				'value' => $useDate,
				'flat' => true,
				'options' => array(
					'numberOfMonths' => 2,
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
					'monthNames' => ["1","2","3","4","5","6","7","8","9","10","11","12"],
					'showMonthAfterYear' => true,
					'yearSuffix' => Yii::t('formal_booking', ' 年'),
					'monthSuffix' => Yii::t('formal_booking', ' 月'),
					'onSelect' => 'js:function(value){
                        $("#search_box_top_date_picker_wrapper").toggleClass("top-date-active");
                        $("#search_box_top_formal .text-date-calendar").text($.datepicker.formatDate( "'.DateTimeUtils::getDateFormat('jui', '', 'month_current').'", $(this).datepicker("getDate")))
                    }'
				),
			);
			Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', $arg);
			?>
		</div>
		<?php } else{?>
            <input type="hidden" name="use_date">
        <?php }?>
	</form>
    <?php
    if($isSmartPhone){
        Yii::app()->controller->widget('application.components.widgets.AnyPicker', array(
            'id' => 'use_date_picker',
            'name' => 'use_date_picker',
            'htmlOptions' => array(
                'style' => 'visibility: hidden;'
            ),
            'options' => array(
                'selectedDate' => $useDateObj ? $useDateObj->format(DateTimeUtils::DB_DATE_FORMAT) : null,
                'onInit' => new CJavaScriptExpression('function(){
                    console.log(this);
                    oAP2 = this;
                    var starDate = new Date();
                    var endDate = new Date();
                    endDate.setYear('.(date('Y') + 10).');
                    oAP2.setMinimumDate(starDate);
                    $(this.elem).data("anypicker",this);
                }'),
                'onShowPicker' => new CJavaScriptExpression('function(){
                    console.log(this,$("input[name=use_date][type=hidden]").data("selectedDate"));
                    if($("input[name=use_date][type=hidden]").data("selectedDate")){
                        this.setSelectedDate($("input[name=use_date][type=hidden]").data("selectedDate"));
                    }
                    
                }'),
                'rowView' => new CJavaScriptExpression('function(componentNumber, rowNumber, dataSourceRecord){
                    if(componentNumber == 0){
                        dataSourceRecord.label += "年";
                    }else if(componentNumber == 1){
                        dataSourceRecord.label += "月"
                    }else if(componentNumber == 2){
                        dataSourceRecord.label += "日"
                    }
                    return dataSourceRecord.label;
                }'),
                'onChange' => new CJavaScriptExpression('function(iRow, iComp, oArrSelectedValues){
                    console.log(this);
                }'),
                'buttonClicked' => new CJavaScriptExpression('function(buttonType){
                    console.log(buttonType, this);
                    if(buttonType == "set"){
                        var selectedDate = this.tmp.selectedDate;
                        $("input[name=use_date][type=hidden]").val(selectedDate.dateFormat("'.DateTimeUtils::DEV_DATE_FORMAT.'"));
                        $("input[name=use_date][type=hidden]").data("selectedDate",new Date(selectedDate));
                        $("#search_box_top_formal .text-date-calendar").text(selectedDate.dateFormat("'.DateTimeUtils::getDateFormat('php','','month_current').'"));
                    }
                }'),
                'i18n' => array(
                    'headerTitle' => ' ',
                    'cancelButton' => '×',
                    'setButton' => '決定',
                    'shortMonths' => array_values(Yii::app()->locale->getMonthNames()),
                    'fullMonths' =>array_values(Yii::app()->locale->getMonthNames('wide')),
                ),
                'rowsNavigation' => 'scroller',
                'visibleRows' => 7,
                'theme' => 'iOS',
                'mode' => 'datetime',
                'dateTimeFormat' => 'yyyy-MM-dd',
                'layout' => 'fixed'
            )
        ));
    }
    ?>
</div><!--end wrap-form--top-->

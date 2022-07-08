<div class="suggest_datepicker" class="arrow-down" style="display:none; z-index: 9999; position: relative;">
	<?php
	$nowDate = new DateTime();
	$autoFilter = $attrShortcode['auto_filter'];
	
	$datePickerId = !empty($attrShortcode['date_picker_id']) ? $attrShortcode['date_picker_id'] : 'date_picker_c';
	$useDate = $nowDate->format(DateTimeUtils::getPhpDateFormat());
	if(!empty($attrShortcode['use_date'])){
		$useDateObj = new DateTime($attrShortcode['use_date']);
		$useDate = $useDateObj->format(DateTimeUtils::getPhpDateFormat());
	}

	$minimumDate = new DateTime('2000/01/01');
	$maximumDate = new DateTime('2099/12/31');
	$arg = array(
		'htmlOptions' => array(
			'id' => $datePickerId,
		),
		'name' => $datePickerId,
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
			'onChangeMonthYear' =>  'js:function(){
					$("#'.$datePickerId.'").trigger("change");
				}',
			'onSelect' => 'js:function(e){
							var dateSelected = $("#'.$datePickerId.'").val();
							if('.$autoFilter.' != 1){
								$("#use_date_container").text(dateSelected);
							}else{
								var dateSelected = $("#'.$datePickerId.'").val().replace(/\//gi, "");
								$("#use_date_cate").val(dateSelected);
								$("#search_datetime_general_sb").submit();
							}
							
							$("#'.$datePickerId.'").trigger("change");
							$(".suggest_datepicker").slideToggle();	
				}'
		),
	);

	Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', $arg);
	?>
</div>

<script>
	$(document).ready(function () {
		$("#<?php echo $datePickerId?>").on('change', function () {
			setTimeout(function () {
				$('body').find('#<?php echo $datePickerId?>_container .ui-datepicker select.ui-datepicker-month').after(' 月');
			},10);
		});

		$('body').find('#<?php echo $datePickerId?>_container .ui-datepicker select.ui-datepicker-month').after(' 月');
	})
</script>





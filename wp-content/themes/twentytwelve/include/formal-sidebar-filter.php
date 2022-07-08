<?php
$groupTravels = array(
	    MasterValues::MV_GROUP_HOMONGI => '訪問着',
	        MasterValues::MV_GROUP_KUROTOMESODE => '黒留袖',
		    MasterValues::MV_GROUP_IROTOMESODE => '色留袖',
		        MasterValues::MV_GROUP_SEIJIN => '振袖',
			    MasterValues::MV_GROUP_SOTSUGYOU => '袴・二尺袖 ',
			        MasterValues::MV_GROUP_SHICHIGOSAN => '七五三',
				    MasterValues::MV_GROUP_SOTSUGYOU_SIMPLE => '二尺袖(単品)',
				        MasterValues::MV_GROUP_WOMEN_HAKAMA => '袴(単品)',
					    MasterValues::MV_GROUP_UBUGI => '産着',
					        MasterValues::MV_GROUP_HIGHEND_YUKATA => '浴衣',
						    MasterValues::MV_GROUP_MOFUKU => '喪服',
					    );
$pClassCate= new PclassCate();
$productColors = $pClassCate->getListColor();
$productColors['others'] = yii::t('formal', 'Others');
$colorSlug = MasterValues::$arr_color_highend_mapping;
$isPlanPrice = false;
$formId = 'formal-sidebar-filter';
$id = 'formal_search_form';
if(!empty($request['from_price'])){
	    $fromPrice = (int) $request['from_price'];
} else {
	    $fromPrice = 0;
}
if(!empty($request['to_price'])){
	    $toPrice = (int) $request['to_price'];
} else {
	    $toPrice = 99000;
}
if(!empty($request['from_height'])){
	    $fromHeight = (float) $request['from_height'];
}
if(!empty($request['shop_id'])){
	    $shopId = (int) $request['shop_id'];
}
if(!empty($request['plan_group']) || !empty($request['plan_group%5B%5D'])) {
	    $planGroup = $request['plan_group'];
}
if(!empty($request['for_sex'])){
	    $forSex = $request['for_sex'];
}
?>
<div class="wrap-category conditions conditions-filter wrap-filter-new-style">
    
<!--    <h2 class="title-general text-center"><span class="text-title-general">Conditions</span></h2>-->
    <div class="box-category collapse-cate">
        <ul class="list-box-category">
            <li class="item-box-category flexbox item-box-category-main">
                <div class="title-general text-center title-general-new-style" data-collapse-cate=".collapse-cate">
                    <div class="wrap-title-text flexbox">
                        <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                        <span class="text-title-general">条件</span>
                        <span class="sub-text-title sub-text-title-new">で探す</span>
                    </div>
                    <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
                </div>
                <ul class="collapse-cate">
                    <li class="item-box-category flexbox">
                        <div class="title-sub-list-category">お着物の種類</div>
                        <ul class='sub-list-category group-plan-type' style='display: flex;flex-wrap:wrap'>
                            <?php foreach ($groupTravels as $groupId => $groupName):
                                ?>
                                <li class='sub-item'>
                                    <label class='flexbox align-items-center'>
                                        <input type='checkbox' name='plan_group[]' value='<?= $groupId?>' class="search-on-change" <?php echo !empty($planGroup) && in_array($groupId, $planGroup) ? 'checked' : ''?>/>
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
                                    <input type='checkbox' name='for_sex[]' value='2' class="search-on-change" <?php echo !empty($forSex) && in_array(2, $forSex) ? 'checked' : ''?>/>
                                    <span class='cat-name'>女性物</span>
                                </label>
                            </li>
                            <li class='sub-item'>
                                <label class='flexbox align-items-center'>
                                    <input type='checkbox' name='for_sex[]' value='1' class="search-on-change" <?php echo !empty($forSex) && in_array(1, $forSex) ? 'checked' : ''?>/>
                                    <span class='cat-name'>男性物</span>
                                </label>
                            </li>
                        </ul>
                    </li>
                    <li class="item-box-category flexbox item-box-category-color-rectangle">
                        <div class="title-sub-list-category">色</div>
                        <ul class='sub-list-category color-cate' style='display: flex;flex-wrap:wrap'>
                            <?php foreach ($productColors as $colorVal => $colorName): ?>
                                <li class='sub-item sub-color-<?= $colorVal?>' data-id='<?= $colorVal?>'>
                                    <label class='flexbox align-items-center'>
                                        <input type='checkbox' name='color[]' value='<?php echo $colorVal?>' class="search-on-change" <?php echo !empty($color) &&  in_array($colorVal, $color) ? 'checked':''?>/>
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

                    <?php if (!$isPlanPrice) : ?>
                        <li class="item-box-category flexbox" >
                            <div class="title-sub-list-category">価格帯</div>
                            <?php
                            if(!empty($fromPrice) && $key = array_search ($fromPrice, MasterValues::$FORMAL_PRICE_FILTER_RANGE)){
                                $minKey = $key;
                                $minPrice = $fromPrice;
                                $minPriceHidden = $fromPrice;
                            }else{
                                $minKey = 0;
                                $minPrice = MasterValues::$FORMAL_PRICE_FILTER_RANGE[0];
                                $minPriceHidden = NULL;
                            }
                            if(!empty($toPrice) && $key = array_search ($toPrice, MasterValues::$FORMAL_PRICE_FILTER_RANGE)){
                                $maxKey = $key;
                                $maxPrice = $toPrice;
                                $maxPriceHidden = $toPrice;
                            }else{
                                $maxKey = count(MasterValues::$FORMAL_PRICE_FILTER_RANGE) - 1;
                                $maxPrice = MasterValues::$FORMAL_PRICE_FILTER_RANGE[$maxKey];
                                $maxPriceHidden = NULL;
                            }
                            $priceKeys = !empty($priceKeys) ? $priceKeys : array($minKey, $maxKey);
                            ?>
                            <div class="price-slider-wrapper">
                                <div class="price-slider-values">
                                    <span class="price-display" id="from-price-display"><?php echo Yii::app()->format->formatNumber($minPrice);?></span>
                                    <span class="price-display" id="to-price-display"><?php echo $maxPrice;?></span>
                                    <input type="hidden" readonly  name="from_price" id="from_price" value="<?php echo $minPriceHidden?>">
                                    <input type="hidden" readonly name="to_price" id="to_price" value="<?php echo $maxPriceHidden?>">
                                </div>
<?php
                                /*Yii::app()->controller->widget('application.components.widgets.JuiSlider',array(
                                    'id' => 'price_slider_search_form',
                                    'options'=>array(
                                        'range' => true,
                                        'step' => 1,
                                        'min'=> 0,
                                        'max'=> count(MasterValues::$FORMAL_PRICE_FILTER_RANGE),
                                        'values' => $priceKeys,
                                        'slide' => new CJavaScriptExpression('function(event, ui){
                            var $form = "#'. $formId .'";
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
                            $("#from-price-display").text(fromPriceDisplay);
                            $("#to-price-display").text(toPriceDisplay);
                            $("#from_price").val(fromPrice);
                            $("#to_price").val(toPrice);
                        }')
                                    ),
                                    'htmlOptions'=>array(
                                        'style'=>'height:2px;',
                                    ),
			    ));*/
                                ?>
                            </div>
                        </li>
                    <?php endif; ?>

				                    <li class="item-box-category flexbox" >
							                            <div class="title-sub-list-category">身長</div>
										                            <?php
                        $fromHeightHidden = !empty($fromHeight) ? $fromHeight : NULL;
                        ?>
                        <div class="height-slider-wrapper">
                            <div class="height-slider-values">
                                <input type="hidden" readonly  name="from_height" id="from_height" value="<?php echo $fromHeightHidden?>">
                                <input type="hidden" readonly name="to_height" id="to_height" value="<?php echo $fromHeightHidden?>">
                                <div class="wrap-input-search-formal flexbox">
                                    <input type="number" class="product-height-form input-search-formal" value="<?php echo $fromHeightHidden?>">
                                    <span class="search-unit">cm</span>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="item-box-category flexbox">
                        <div class="title-sub-list-category">ご利用日</div>
                        <div class="suggest_datepicker" class="arrow-down" style="z-index: 9999; position: relative;">
                            <?php
                            $minimumDate = new DateTime();
                            $minimumDate->modify('+'.MasterValues::DEFAULT_LOCK_DAYS_FOR_SHOP.' days');
                            $maximumDate = new DateTime('2099/12/31');

			                                $useDate = null;
			                                if(!empty($useDate)){
								                                try{
													                                    $useDateObj = new DateTime($useDate);
																	                                        $useDate = $useDateObj->format(DateTimeUtils::getPhpDateFormat());
																	                                    }catch (Exception $e){
																						                                        $useDate = null;
																											                                }
												                            }

							                            $datePickerId = 'date_picker_'.$id;
							                            $arg = array(
											                                    'htmlOptions' => array(
																                                        'id' => $datePickerId,
																					                                    'name' => 'use_date',
																									                                        'class' => 'search-on-change'
																														                                ),
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
																																																																																																													                                    ),
																																																																																																																	                                );

										                                Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', $arg);
										                                ?>
                        </div>
                        <div class="wrap-buttons-filter-calendar">
                            <button class="btn-filter-conditions search" onclick="ajaxSearch($('#<?php echo $formId?>'));">上記の条件で検索</button>
                            <button class="btn-filter-conditions cancel pc">条件をリセット</button>
                        </div>
                    </li>
                </ul>
            </li>

            <li class="item-box-category flexbox ">
                <div class="title-general text-center title-general-new-style" data-collapse-cate=".product-code-wrapper">
                    <div class="wrap-title-text flexbox">
                        <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                        <span class="text-title-general">型番</span>
                        <span class="sub-text-title sub-text-title-new">から探す</span>
                    </div>
                    <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
                </div>
                <?php
                $productCode = !empty($productCode) ? $productCode : NULL;
                ?>
                <div class="product-code-wrapper">
                    <div class="product-code-values">
                        <div class="wrap-input-search-formal flexbox">
                            <input class="product-code-form input-search-formal" name="product_code" value="<?php echo $productCode?>">
                        </div>
                    </div>
                    <div class="wrap-icon-search">
                        <button type="button" class="icon-search-condition" onclick="ajaxSearch($('#<?php echo $formId?>'));">検索</button>
                    </div>
                </div>
            </li>

            <li class="item-box-category flexbox">
                <div class="title-general text-center title-general-new-style" data-collapse-cate=".shop-wrapper">
                    <div class="wrap-title-text flexbox">
                        <span class="icon-filter"><img src="<?= WP_HOME; ?>/images/icon-filter.svg" alt=""></span>
                        <span class="text-title-general">店舗の在庫</span>
                        <span class="sub-text-title sub-text-title-new">から探す</span>
                    </div>
                    <span class="toggle-icon-arrow toggle-icon-arrow-02"></span>
                </div>
                <?php
                $shopIdSess = !empty($shopId) ? $shopId : NULL;
                ?>
                <div class="shop-wrapper">
                    <div class="shop-values">
                        <div class="wrap-input-search-formal flexbox">
                            <select name="shop_id">
                                <option value="0"><?= Yii::t("new-kimono-pl",'全店舗') ?></option>
                                <?php foreach (MasterValues::highendShopList() as $shopId => $nameShop) { ?>
                                    <option value="<?=$shopId?>" <?= $shopId == $shopIdSess ? "selected" : "" ?>><?= Yii::t("new-kimono-pl",$nameShop) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="wrap-icon-search">
                        <button type="button" class="icon-search-condition" onclick="ajaxSearch($('#<?php echo $formId?>'));">検索</i></button>
                    </div>
                </div>
            </li>

            <li class="item-box-category item-box-category-search item-box-category-shortcode flexbox">
                <?php echo do_shortcode('[FormalBannerTopic direction="left" custom=true]'); ?>
            </li>
        </ul>
        <input type="hidden" name="sort_type" id="sort_hidden" value="">
        <input type="hidden" name="page_size" id="page_size_hidden" value="">
    </div>
</div>




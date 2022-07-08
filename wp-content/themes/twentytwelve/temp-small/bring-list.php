<?php
global $language;
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();

/* Get meta Plans from database - start */
$modelMetaPlans = PlanType::getMetaPlans();
$groupedMetaPlans = array();
$YUKATA_GROUP_MERGE = MasterValues::$YUKATA_GROUP_MERGE;
$KIMONO_GROUP_MERGE = MasterValues::$KIMONO_GROUP_MERGE;
foreach ($modelMetaPlans as $metaPlan) {
    //remove
    if($metaPlan->plan_type_id == MasterValues::PLAN_PETIT_LADIES_ASSOCIATION_KIMONO_ID || $metaPlan->plan_type_id == MasterValues::PLAN_NEW_PETIT_LADIES_ASSOCIATION_KIMONO_ID){
        continue;
    }
    //Soften plan price via pattern
    PricePattern::planPriceViaPattern('B', $metaPlan);

    //prepare plan price for couple
    $metaPlan->preparePriceForCouple();

    // if plan exist in merge meta
    if( array_key_exists($metaPlan->plan_type_id, $YUKATA_GROUP_MERGE) || array_key_exists($metaPlan->plan_type_id, $KIMONO_GROUP_MERGE) ){
        $mergintoId = array_key_exists($metaPlan->plan_type_id, $YUKATA_GROUP_MERGE) ? $YUKATA_GROUP_MERGE[$metaPlan->plan_type_id] : $KIMONO_GROUP_MERGE[$metaPlan->plan_type_id];
        // check if merged id had add into groupedMeta
        if(isset($groupedMetaPlans[$metaPlan->for_group][$mergintoId])){
            // append groupMergeIds
            $groupedMetaPlans[$metaPlan->for_group][$mergintoId]->groupMergeIds[$metaPlan->plan_type_id] = $metaPlan;
        }else {
            $metaPlan->groupMergeIds[$metaPlan->plan_type_id] = $metaPlan;
            $metaPlan->plan_type_id = $mergintoId;
            $groupedMetaPlans[$metaPlan->for_group][$mergintoId] = $metaPlan;
        }
    }else{
        $groupedMetaPlans[$metaPlan->for_group][$metaPlan->plan_type_id] = $metaPlan;
    }
}
//var_dump($groupedMetaPlans[MasterValues::MV_GROUP_KIMONO]);

$planTypeBringMap = array(
    27 => Yii::t('new-kimono-bring','浴衣 ［ゆかた］'),
    28 => Yii::t('new-kimono-bring','夏着物 [なつきもの]・小紋[こもん]'),
    29 => Yii::t('new-kimono-bring','紬 ［つむぎ］'),
    30 => Yii::t('new-kimono-bring','色無地 ［いろむじ］'),
    31 => Yii::t('new-kimono-bring','訪問着 ［ほうもんぎ］'),
    32 => Yii::t('new-kimono-bring','附下［つけさげ］'),
    33 => Yii::t('new-kimono-bring','留袖［とめそで］'),
    96 => Yii::t('new-kimono-bring','振袖 ［ふりそで］'),
    34 => Yii::t('new-kimono-bring','メンズ着物-長着 ［ながぎ］'),
    97 => Yii::t('new-kimono-bring','メンズ浴衣 [ゆかた]'),
    266 => Yii::t('new-kimono-bring','二尺袖＋袴'),
    105 => Yii::t('new-kimono-bring','七五三着物 [しちごさん]'),
);
$groupedMetaBringPlans = $groupedMetaPlans[MasterValues::MV_GROUP_BRING];

if ($groupedMetaBringPlans) {
    foreach ($planTypeBringMap as $planTypeId=>$plan_type_name) {
        $modelPlanType = PlanType::getPlanByPk($planTypeId);
	if(empty($modelPlanType)){
            continue;
        }

        $metaPlan = $groupedMetaBringPlans[$planTypeId];
        $femaleAllow = (int)($metaPlan->female_allow);
        $maleAllow = (int)($metaPlan->male_allow);
        $forAge = (int)($metaPlan->for_ages);
        $planPrice = $metaPlan->getPrice();
        $planPriceWithoutFormat = $metaPlan->getPrice();
	$currencyFormat = DateTimeUtils::getCurrencyFormat();
	        $numberFormatter = Yii::app()->numberFormatter;
	        $currencySymbol = Yii::app()->locale->getCurrencySymbol('JPY');
		        foreach ($planPrice as &$price) {
				            $price = $numberFormatter->format($currencyFormat, $price, 'JPY');
					            }

        $sexAgeT = $sexAgeType['women'];
        if($forAge == 1 && $maleAllow && !$femaleAllow){
            $sexAgeT = $sexAgeType['men'];
        }elseif ($forAge == 2){
            $sexAgeT = $sexAgeType['kids'];
        }
        ?>
<style>
    .wg-webpirce-box .box-price .lg-pirce .sm-sub-price{
        font-weight: 600 !important;
        color: #909090;
        padding-left: 10px;
    }
    .wg-webpirce-box .box-price .lg-pirce{
        font-family: serif;
    }
    .furisode-noted-sp{
        color: red;
        margin-top: 3px;
    }
    .furisode-noted-pc{
        color: red;
        margin: 3px 0 0 120px;
        font-size: 17px;
    }
    @media (max-width: 767px){
        .wg-webpirce-box .box-webprice{
            display: flex;
            flex-direction: column;
            align-self: end;
        }
        .wg-webpirce-box .box-price .lg-pirce .sm-sub-price {
            position: relative;
            top: -12px;
        }
    }
    @media (min-width: 750px){
        .wg-webpirce-box .box-price .lg-pirce{
            font-size: 45px !important;
        }
    }
</style>
        <?php if($planTypeId != 97): ?>
            <div id="box-bring-<?=$planTypeId?>" class="wrap-list-plan-wg  <?= $planTypeId != 27 ? " list-plan-filter" : "yukata-plan"?> wrap-list-plan-wg-<?=$planTypeId?>" data-plan-id="<?=$planTypeId?>" data-sex-age="<?= $sexAgeT ?>"  data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
                <div class="title-general title-list text-center flexbox margin-bt20">
                    <span class="icon-title-general icon icon-prize"> <img src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt=""> </span>
                    <h2 class="sub-title-list" id="<?= $plan_type_name; ?>"><span class="text-title-general"><?php echo $plan_type_name; ?></span></h2>
                </div>

                <div class='wrapper-content-plan <?= $planTypeId == 27 ? " list-plan-filter" : ""?>' data-sex-age="<?= $planTypeId == 27 ? $sexAgeT : "" ?>">
                    <div class='wrap-col-gallery-col-info row flexbox'>
                        <?php if($planTypeId != 105):?>
                            <div class="col-gallery">
                                <img src="<?= WP_HOME?>/images/pic-avarta-bring-<?= $planTypeId; ?>.png" alt="" />
                            </div>
                        <?php else: ?>
                            <div class="col-gallery pc">
                                <img src="<?= WP_HOME?>/images/pic-avarta-bring-<?= $planTypeId; ?>.png" alt="" />
                            </div>
                        <?php endif; ?>
                        <div class="col-info-plan-list">
                            <?php if($planTypeId != 105): ?> <!-- Plan for women and men -->
                                <?php if($planTypeId == 27): ?>
                                    <h3 class="wrap-title-bring-common wrap-title-bring-plan"><?= Yii::t('new-kimono-pl-bring', 'レディース浴衣[ゆかた]'); ?></h3>
                                <?php else: ?>
                                    <h3 class="wrap-title-bring-common wrap-title-bring-plan sp"><?php echo $plan_type_name; ?></h3>
                                <?php endif; ?>
                                <div class="wrap-web-price-info flexbox">
                                    <div class="wg-webpirce-box flexbox">
                                        <?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
                                        <div class="box-price">
<!--                                            <p class="sm-price">--><?php //echo $planPrice['rental_price'] ?><!--- ↓</p>-->
                                            <p class="lg-pirce"><?php echo $planPrice['rental_price_reduced'] ?>-<span class="sm-sub-price"><?= '(税込 '. Yii::app()->numberFormatter->format($currencyFormat,(Utils::getTax($planPriceWithoutFormat['rental_price_reduced']) + $planPriceWithoutFormat['rental_price_reduced']), 'JPY') . ')'; ?></span></p>
                                        </div>
                                    </div>
                                </div>
                                <?php if(!$isSmartPhone): ?>
                                    <div class="wrap-col-info-bring-plan pc">
                                        <div class="wrap-des-wg-pl wrap-des-wg-pl-new-bring">
                                            <p class="new-bring-excerpt-plan">
                                                <?= Yii::t('new-kimono-bring', "new-kimono-bring-excerpt-plan-".$planTypeId); ?>
                                            </p>
                                        </div>
                                        <div class="wrap-option-des-bring">
                                            <?= Yii::t('new-kimono-bring', "new-bring-option-plan-".$planTypeId); ?>
                                        </div>
                                        <div class="wrap-choose-sl-wg flexbox">
                                            <p class="label-choose-sl-wg"><?= Yii::t('new-kimono-pl-bring', 'ご利用人数'); ?></p>
                                            <?php if($planTypeId == MasterValues::PLAN_TYPE_ID_KIMONO_FOR_CHILDREN){ ?>
                                                <div class="wraper-sl wraper-sl-g-b flexbox">
                                                    <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                        <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_".$planTypeId) ?></div>
                                                        <div class="wraper-sl-choose-pepple flexbox">
                                                            <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>">
                                                                <?php
                                                                for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                    $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                    ?>
                                                                    <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                <?php }?>
                                                            </select>
                                                            <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl', '名'); ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                        <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_83") ?></div>
                                                        <div class="wraper-sl-choose-pepple flexbox">
                                                            <select name="" class="sl-choose-people list_plans" data-plan_type_id="83" data-female-allow="0" data-male-allow="1">
                                                                <?php
                                                                for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                    $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                    ?>
                                                                    <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                <?php }?>
                                                            </select>
                                                            <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl', '名'); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="wraper-sl flexbox">
                                                    <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                        <div class="wraper-sl-choose-pepple flexbox">
                                                            <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>" data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
                                                                <?php
                                                                for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                    $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                    ?>
                                                                    <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                <?php }?>
                                                            </select>
                                                            <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl', '名'); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                                        </div>
                                        <?php if($planTypeId == 96) { ?>
                                            <p class="furisode-noted-pc"> 繫忙期につき1月ご利用で持込振袖をご予約頂く場合、料金が変更になります。</p>
                                        <?php } ?>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?> <!-- Plan children -->
                                <!--  Begin bring plan 105-->
                                <?php $modelPlanType105 = PlanType::getPlanByPk(105);?>
                                <div class="section-plan-shichigo section-plan-shichigo-105">
                                    <div class="wrap-bring-plan-shichigo flexbox">
                                        <div class="image-plan-shichigo sp">
                                            <img src="<?= WP_HOME?>/images/pic-avarta-bring-<?= $planTypeId; ?>.png" alt="" />
                                        </div>
                                        <div class="info-plan-shichigo">
                                            <h3 class="wrap-title-bring-common title-bring-plan"><?= Yii::t('new-kimono-pl-bring', '袴（5歳）'); ?></h3>
                                            <div class="wrap-web-price-info flexbox">
                                                <div class="wg-webpirce-box flexbox">
                                                    <?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
                                                    <div class="box-price">
                                                        <p class="lg-pirce"><?php echo $numberFormatter->format($currencyFormat, $modelPlanType105->male_price_reduced, 'JPY'); ?>-<span class="sm-sub-price"><?= '(税込 '. $numberFormatter->format($currencyFormat, (Utils::getTax($modelPlanType105->male_price_reduced) + $modelPlanType105->male_price_reduced), 'JPY') . ')'; ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-choose-sl-wg wrap-web-price-info flexbox pc">
                                                <div class="wrap-sl-btn-reserve flexbox">
                                                    <p class="label-choose-sl-wg"><?= Yii::t('new-kimono-pl-bring', 'ご利用人数'); ?></p>
                                                    <div class="wraper-sl flexbox">
                                                        <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                            <div class="wraper-sl-choose-pepple flexbox">
                                                                <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>"  data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
                                                                    <?php
                                                                    for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                        $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                        ?>
                                                                        <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                    <?php }?>
                                                                </select>
                                                                <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-choose-sl-wg wrap-web-price-info flexbox sp">
                                        <div class="wrap-sl-btn-reserve flexbox">
                                            <div class="wraper-sl flexbox">
                                                <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                    <div class="wraper-sl-choose-pepple flexbox">
                                                        <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>"  data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
                                                            <?php
                                                            for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                ?>
                                                                <option value="<?=$iloop?>"><?= $iloop?></option>
                                                            <?php }?>
                                                        </select>
                                                        <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                                        </div>
                                    </div>
                                </div>
                                <!--  End bring plan 105-->
                                <!--  Begin bring plan 106-->
                                <?php $modelPlanType106 = PlanType::getPlanByPk(106);?>
                                <div class="section-plan-shichigo section-plan-shichigo-106">
                                    <div class="wrap-bring-plan-shichigo flexbox">
                                        <div class="image-plan-shichigo no-image-plan-shichigo sp">&nbsp;</div>
                                        <div class="info-plan-shichigo">
                                            <h3 class="wrap-title-bring-common title-bring-plan"><?= Yii::t('new-kimono-pl-bring','四つ身（7歳）'); ?></h3>
                                            <div class="wrap-web-price-info flexbox">
                                                <div class="wg-webpirce-box flexbox">
                                                    <?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
                                                    <div class="box-price">
                                                        <p class="lg-pirce"><?php echo $numberFormatter->format($currencyFormat, $modelPlanType106->female_price_reduced, 'JPY'); ?>-<span class="sm-sub-price"><?= '(税込 '. $numberFormatter->format($currencyFormat, (Utils::getTax($modelPlanType106->female_price_reduced) + $modelPlanType106->female_price_reduced), 'JPY') . ')'; ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-choose-sl-wg wrap-web-price-info flexbox pc">
                                                <div class="wrap-sl-btn-reserve flexbox">
                                                    <p class="label-choose-sl-wg"><?= Yii::t('new-kimono-pl-bring', 'ご利用人数'); ?></p>
                                                    <div class="wraper-sl flexbox">
                                                        <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                            <div class="wraper-sl-choose-pepple flexbox">
                                                                <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?php echo $modelPlanType106->plan_type_id?>" data-female-allow="<?php echo $modelPlanType106->female_allow?>" data-male-allow="<?php echo $modelPlanType106->male_allow?>"  data-plan-name="<?php echo $modelPlanType106->plan_type_name?>">
                                                                    <?php
                                                                    for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                        $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                        ?>
                                                                        <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                    <?php }?>
                                                                </select>
                                                                <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-choose-sl-wg wrap-web-price-info flexbox sp">
                                        <div class="wrap-sl-btn-reserve flexbox">
                                            <div class="wraper-sl flexbox">
                                                <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                    <div class="wraper-sl-choose-pepple flexbox">
                                                        <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?php echo $modelPlanType106->plan_type_id?>" data-female-allow="<?php echo $modelPlanType106->female_allow?>" data-male-allow="<?php echo $modelPlanType106->male_allow?>"  data-plan-name="<?php echo $modelPlanType106->plan_type_name?>">
                                                            <?php
                                                            for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                ?>
                                                                <option value="<?=$iloop?>"><?= $iloop?></option>
                                                            <?php }?>
                                                        </select>
                                                        <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                                        </div>
                                    </div>
                                </div>
                                <!--  End bring plan 106-->
                                <!--  Begin bring plan 107-->
                                <?php $modelPlanType107 = PlanType::getPlanByPk(107);?>
                                <div class="section-plan-shichigo section-plan-shichigo-107">
                                    <div class="wrap-bring-plan-shichigo flexbox">
                                        <div class="image-plan-shichigo  no-image-plan-shichigo sp">&nbsp;</div>
                                        <div class="info-plan-shichigo">
                                            <h3 class="wrap-title-bring-common title-bring-plan" style=""><?= Yii::t('new-kimono-pl-bring','被布（3歳）'); ?></h3>
                                            <div class="wrap-web-price-info flexbox">
                                                <div class="wg-webpirce-box flexbox">
                                                    <?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
                                                    <div class="box-price">
                                                        <p class="lg-pirce"><?php echo $numberFormatter->format($currencyFormat, $modelPlanType107->female_price_reduced, 'JPY'); ?>-<span class="sm-sub-price"><?= '(税込 '. $numberFormatter->format($currencyFormat, (Utils::getTax($modelPlanType107->female_price_reduced) + $modelPlanType107->female_price_reduced), 'JPY') . ')'; ?></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-choose-sl-wg wrap-web-price-info flexbox pc">
                                                <div class="wrap-sl-btn-reserve flexbox">
                                                    <p class="label-choose-sl-wg"><?= Yii::t('new-kimono-pl-bring', 'ご利用人数'); ?></p>
                                                    <div class="wraper-sl flexbox">
                                                        <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                            <div class="wraper-sl-choose-pepple flexbox">
                                                                <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?php echo $modelPlanType107->plan_type_id?>" data-female-allow="<?php echo $modelPlanType107->female_allow?>" data-male-allow="<?php echo $modelPlanType107->male_allow?>"  data-plan-name="<?php echo $modelPlanType107->plan_type_name?>">
                                                                    <?php
                                                                    for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                        $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                        ?>
                                                                        <option value="<?=$iloop?>"><?= $iloop?></option>
                                                                    <?php }?>
                                                                </select>
                                                                <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-choose-sl-wg wrap-web-price-info flexbox sp">
                                        <div class="wrap-sl-btn-reserve flexbox">
                                            <div class="wraper-sl flexbox">
                                                <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                    <div class="wraper-sl-choose-pepple flexbox">
                                                        <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?php echo $modelPlanType107->plan_type_id?>" data-female-allow="<?php echo $modelPlanType107->female_allow?>" data-male-allow="<?php echo $modelPlanType107->male_allow?>"  data-plan-name="<?php echo $modelPlanType107->plan_type_name?>">
                                                            <?php
                                                            for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                                $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                                ?>
                                                                <option value="<?=$iloop?>"><?= $iloop?></option>
                                                            <?php }?>
                                                        </select>
                                                        <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                                        </div>
                                    </div>
                                </div>
                                <!--  End bring plan 107-->
                                <!--  Begin bring plan 108-->
                                <?php $modelPlanType108 = PlanType::getPlanByPk(108);?>
<!--                                <div class="section-plan-shichigo section-plan-shichigo-108">-->
<!--                                    <div class="wrap-bring-plan-shichigo flexbox">-->
<!--                                        <div class="image-plan-shichigo no-image-plan-shichigo sp">&nbsp;</div>-->
<!--                                        <div class="info-plan-shichigo">-->
<!--                                            <h3 class="wrap-title-bring-common title-bring-plan" style="">--><?//= Yii::t('new-kimono-pl-bring','初着（1歳）'); ?><!--</h3>-->
<!--                                            <div class="wrap-web-price-info flexbox">-->
<!--                                                <div class="wg-webpirce-box flexbox">-->
<!--                                                    --><?//= Yii::t('new-kimono-pl', 'box-webprice'); ?>
<!--                                                    <div class="box-price">-->
<!--                                                        <p class="sm-price">￥2,980- ↓</p>-->
<!--                                                        <p class="lg-pirce">￥1,980-<span class="sm-sub-price">--><?//= Yii::t('new-kimono-pl', '税抜'); ?><!--</span></p>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="wrap-choose-sl-wg wrap-web-price-info flexbox pc">-->
<!--                                                <div class="wrap-sl-btn-reserve flexbox">-->
<!--                                                    <p class="label-choose-sl-wg">--><?//= Yii::t('new-kimono-pl-bring', 'ご利用人数'); ?><!--</p>-->
<!--                                                    <div class="wraper-sl flexbox">-->
<!--                                                        <div class="box-sl-choose-people box-sl-choose-g-b flexbox">-->
<!--                                                            <div class="wraper-sl-choose-pepple flexbox">-->
<!--                                                                <select name="" class="sl-choose-people list_plans" data-plan_type_id="--><?php //echo $modelPlanType108->plan_type_id?><!--" data-female-allow="--><?php //echo $modelPlanType108->female_allow?><!--" data-male-allow="--><?php //echo $modelPlanType108->male_allow?><!--"  data-plan-name="--><?php //echo $modelPlanType108->plan_type_name?><!--">-->
<!--                                                                    --><?php
//                                                                    for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
//                                                                        $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
//                                                                        ?>
<!--                                                                        <option value="--><?//=$iloop?><!--">--><?//= $iloop?><!--</option>-->
<!--                                                                    --><?php //}?>
<!--                                                                </select>-->
<!--                                                                <div class="name-sl-people flexbox align-self-end"> --><?//= Yii::t('new-kimono-pl','名'); ?><!--</div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink">--><?//= Yii::t('new-kimono-btn-reserve','予約に進む'); ?><!--</button></div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="wrap-choose-sl-wg wrap-web-price-info flexbox sp">-->
<!--                                        <div class="wrap-sl-btn-reserve flexbox">-->
<!--                                            <div class="wraper-sl flexbox">-->
<!--                                                <div class="box-sl-choose-people box-sl-choose-g-b flexbox">-->
<!--                                                    <div class="wraper-sl-choose-pepple flexbox">-->
<!--                                                        <select name="" class="sl-choose-people list_plans" data-plan_type_id="--><?php //echo $modelPlanType108->plan_type_id?><!--" data-female-allow="--><?php //echo $modelPlanType108->female_allow?><!--" data-male-allow="--><?php //echo $modelPlanType108->male_allow?><!--"  data-plan-name="--><?php //echo $modelPlanType108->plan_type_name?><!--">-->
<!--                                                            --><?php
//                                                            for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
//                                                                $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
//                                                                ?>
<!--                                                                <option value="--><?//=$iloop?><!--">--><?//= $iloop?><!--</option>-->
<!--                                                            --><?php //}?>
<!--                                                        </select>-->
<!--                                                        <div class="name-sl-people flexbox align-self-end"> --><?//= Yii::t('new-kimono-pl','名'); ?><!--</div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink">--><?//= Yii::t('new-kimono-btn-reserve','予約に進む'); ?><!--</button></div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <!--  End bring plan 108-->
                                <div class="wrap-des-wg-pl wrap-des-wg-pl-new-bring">
                                    <p class="new-bring-excerpt-plan">
                                        <?= Yii::t('new-kimono-bring', "new-kimono-bring-excerpt-plan-".$planTypeId); ?>
                                    </p>
                                </div>
                                <div class="wrap-option-des-bring">
                                    <?= Yii::t('new-kimono-bring', "new-bring-option-plan-".$planTypeId); ?>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php if($planTypeId != 105): ?>
                        <?php if($isSmartPhone): ?> <!-- For Mobile -->
                            <div class="wrap-col-info-bring-plan sp">
                                <div class="wrap-des-wg-pl wrap-des-wg-pl-new-bring">
                                    <p class="new-bring-excerpt-plan">
                                        <?= Yii::t('new-kimono-bring', "new-kimono-bring-excerpt-plan-".$planTypeId); ?>
                                    </p>
                                </div>
                                <div class="wrap-option-des-bring">
                                    <?= Yii::t('new-kimono-bring', "new-bring-option-plan-".$planTypeId); ?>
                                </div>
                                <div class="wrap-choose-sl-wg flexbox">
                                    <p class="label-choose-sl-wg pc"><?= Yii::t('new-kimono-bring', 'ご利用人数'); ?></p>
                                    <?php if($planTypeId == MasterValues::PLAN_TYPE_ID_KIMONO_FOR_CHILDREN){ ?>
                                        <div class="wraper-sl wraper-sl-g-b flexbox">
                                            <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_".$planTypeId) ?></div>
                                                <div class="wraper-sl-choose-pepple flexbox">
                                                    <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>">
                                                        <?php
                                                        for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                            $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                            ?>
                                                            <option value="<?=$iloop?>"><?= $iloop?></option>
                                                        <?php }?>
                                                    </select>
                                                    <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl', '名'); ?></div>
                                                </div>
                                            </div>
                                            <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_83") ?></div>
                                                <div class="wraper-sl-choose-pepple flexbox">
                                                    <select name="" class="sl-choose-people list_plans" data-plan_type_id="83" data-female-allow="0" data-male-allow="1">
                                                        <?php
                                                        for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                            $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                            ?>
                                                            <option value="<?=$iloop?>"><?= $iloop?></option>
                                                        <?php }?>
                                                    </select>
                                                    <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl', '名'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="wraper-sl flexbox">
                                            <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                <div class="wraper-sl-choose-pepple flexbox">
                                                    <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>" data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
                                                        <?php
                                                        for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                            $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                            ?>
                                                            <option value="<?=$iloop?>"><?= $iloop?></option>
                                                        <?php }?>
                                                    </select>
                                                    <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl', '名'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                                </div>
                                <?php if($planTypeId == 96){ ?>
                                    <p class="furisode-noted-sp"> 繫忙期につき1月ご利用で持込振袖をご予約頂く場合、料金が変更になります。</p>
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <?php if($planTypeId == 27 ): ?><!-- Gọp content plan_men_97 vào plan_women_27  -->
                <div class="wrapper-content-plan list-plan-filter" data-sex-age='<?= $sexAgeType["men"] ?>'>
                    <?php $modelPlanType97 = PlanType::getPlanByPk(97);?>
                    <div class="wrap-col-gallery-col-info wrap-col-gallery-col-info-97 row flexbox">
                        <div class="col-gallery">
                            <img src="<?= WP_HOME; ?>/images/pic-avarta-bring-97.png" alt="">
                        </div>
                        <div class="col-info-plan-list">
                            <h3 class="wrap-title-bring-common wrap-title-bring-plan"><?= Yii::t('new-kimono-pl-bring','メンズ浴衣[ゆかた]'); ?></h3>
                            <div class="wrap-web-price-info flexbox">
                                <div class="wg-webpirce-box flexbox">
                                    <?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
                                    <div class="box-price">
                                        <p class="lg-pirce"><?php echo $numberFormatter->format($currencyFormat, $modelPlanType97->male_price_reduced, 'JPY'); ?>-<span class="sm-sub-price"><?= '(税込 '. $numberFormatter->format($currencyFormat, (Utils::getTax($modelPlanType97->male_price_reduced) + $modelPlanType97->male_price_reduced), 'JPY') . ')'; ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <?php if(!$isSmartPhone): ?>
                                <div class="wrap-col-info-bring-plan pc">
                                    <div class="wrap-des-wg-pl wrap-des-wg-pl-new-bring">
                                        <?= Yii::t('new-kimono-bring', "new-kimono-bring-excerpt-plan-97"); ?>
                                    </div>
                                    <div class="wrap-option-des-bring">
                                        <?= Yii::t('new-kimono-bring', "new-bring-option-plan-97"); ?>
                                    </div>
                                    <div class="wrap-choose-sl-wg flexbox">
                                        <p class="label-choose-sl-wg"><?= Yii::t('new-kimono-pl-bring','ご利用人数'); ?></p>
                                        <div class="wraper-sl flexbox">
                                            <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                                <div class="wraper-sl-choose-pepple flexbox">
                                                    <select name="" class="sl-choose-people list_plans" data-plan_type_id="97" data-female-allow="<?php echo $modelPlanType97->female_allow?>" data-male-allow="<?php echo $modelPlanType97->male_allow?>" data-plan-name="<?php echo $modelPlanType97->plan_type_name?>">
                                                        <?php
                                                        for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                            $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                            ?>
                                                            <option value="<?=$iloop?>"><?= $iloop?></option>
                                                        <?php }?>
                                                    </select>
                                                    <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl', '名'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve', "予約に進む"); ?></button></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($isSmartPhone): ?>
                        <div class="wrap-col-info-bring-plan wrap-col-info-bring-plan-97 sp">
                            <div class="wrap-des-wg-pl wrap-des-wg-pl-new-bring">
                                <p class="new-bring-excerpt-plan"><?= Yii::t('new-kimono-bring', "new-kimono-bring-excerpt-plan-97"); ?></p>
                            </div>
                            <div class="wrap-option-des-bring">
                                <?= Yii::t('new-kimono-bring', "new-bring-option-plan-97"); ?>
                            </div>
                            <div class="wrap-choose-sl-wg flexbox">
                                <p class="label-choose-sl-wg pc"><?= Yii::t('new-kimono-pl-bring','ご利用人数'); ?></p>
                                <div class="wraper-sl flexbox">
                                    <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                        <div class="wraper-sl-choose-pepple flexbox">
                                            <select name="" class="sl-choose-people list_plans" data-plan_type_id="97" data-female-allow="<?php echo $modelPlanType97->female_allow?>" data-male-allow="<?php echo $modelPlanType97->male_allow?>" data-plan-name="<?php echo $modelPlanType97->plan_type_name?>">
                                                <?php
                                                for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']; $iloop++) {
                                                    $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                    ?>
                                                    <option value="<?=$iloop?>"><?= $iloop?></option>
                                                <?php }?>
                                            </select>
                                            <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl','名'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <?php
    }
    wp_reset_postdata();
}
?>

<div class="wrap-widget-banner wrap-banner-bt-pl">
    <ul class="list-banner-bt-pl flexbox">
        <?php if($language == 'ja'): ?>
            <li class="item-banner-bt-pl"><a href="/kimono#Standard-Kimono"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-01.png" alt="かんざし・ヘアセットも付いて"></a></li>
<!--            <li class="item-banner-bt-pl"><a href="/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01.png" alt="かんざし・ヘアセットも付いて"></a></li>-->
            <!--<li class="item-banner-bt-pl"><a href="/vip"><img src="<?/*= WP_HOME; */?>/images/new-kimono/banner-pl-other-02.png" alt="かんざし・ヘアセットも付いて"></a></li>-->
            <li class="item-banner-bt-pl"><a href="/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03.png" alt="かんざし・ヘアセットも付いて"></a></li>
        <?php else: ?>
            <li class="item-banner-bt-pl"><a href="<?php echo home_url();?>/kimono#Standard-Kimono"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-01-<?= $language; ?>.png" alt="かんざし・ヘアセットも付いて"></a></li>
<!--            <li class="item-banner-bt-pl"><a href="--><?php //echo home_url();?><!--/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01---><?//= $language; ?><!--.png" alt="かんざし・ヘアセットも付いて"></a></li>-->
            <!--<li class="item-banner-bt-pl"><a href="<?php /*echo home_url();*/?>/vip"><img src="<?/*= WP_HOME; */?>/images/new-kimono/banner-pl-other-02-<?/*= $language; */?>.png" alt="かんざし・ヘアセットも付いて"></a></li>-->
            <li class="item-banner-bt-pl"><a href="<?php echo home_url();?>/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03-<?= $language; ?>.png" alt="かんざし・ヘアセットも付いて"></a></li>
        <?php endif; ?>
    </ul>
</div>
<div class="intro-top-general pc">
    <h3 class="title-intro-top"><?= Yii::t('new-kimono-pl-bring', 'キモノで観光 きものレンタルwargoのご紹介'); ?></h3>
    <div class="content-intro-top">
        <p class="intro-text"><?= Yii::t('new-kimono-pl-bring', '金沢兼六園すぐの香林坊東急スクエアGF、せせらぎ通り沿いにあるレンタル着物・レンタル浴衣のお店『きものレンタルwargo』金沢香林坊店の、着付け師とスタッフが綴る着物と京都のブログ。金沢市日本三大名園の一つ、金沢の観光名所の代表である兼六園の桜・紅葉・雪景色・ライトアップなど兼六園の季節ごとの景色など、金沢に暮らしているローカルならではの旬でミクロな金沢便りをお届けします。'); ?></p>
    </div>
</div>

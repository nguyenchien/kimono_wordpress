<?php
$planTypeKimonoVipMap = array(
	'single' => 'スタンダード着物', //standard-kimono
	'couple' => 'カップル着物' //couple-standard-kimono
);

global $post;
// show single plans by order
$args = array(
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_type' => 'page', //selects pages
    'post_parent' => $post->ID,
    'post_status' => 'publish',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'is_plan_page',
            'value' => 1,
        ),
    ),
    'posts_per_page' => 12,
);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
        $the_query->the_post();
        $planTypeId = get_field('plan_type_id');
        //Get plan name form ACF
        $arr_plan_type_names = get_field_object('plan_type_id');
        $plan_type_name = str_replace(" ","-",$arr_plan_type_names['choices'][$planTypeId]);

	    $allPlanShopList = MasterValues::planShopList();
	    $shopList = $allPlanShopList[$planTypeId];

	    $galleryVipLink = get_field('couple') ? "couple-standard-kimono" : "standard-kimono";

        if (get_field('is_plan_page') === true) {
            $modelPlanType = PlanType::getPlanByPk($planTypeId);
	        if(empty($modelPlanType)){
		        continue;
	        }
            ?>
            <div class="wrap-list-plan-wg list-plan-filter wrap-list-plan-wg-vip <?php echo ($planTypeId == 88) ? 'wrap-list-plan-wg-vip-children':''; ?>" data-plan-id="<?=$planTypeId?>" data-plan-name="<?php echo $modelPlanType->plan_type_name?>">

                <div class="title-general title-list title-list-vip text-center flexbox margin-bt20">
                    <span class="icon-title-general icon icon-prize"> <img src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt=""> </span>
                    <h2 class="sub-title-list"><span class="text-title-general">
						<?php
                        if (get_field('page_h1') == '') {
                            the_title();
                        } else {
                            the_field('page_h1');
                        }
                        ?>
					</span>
                    </h2>
                </div>

                <div class="wrap-col-gallery-col-info row flexbox">
                    <div class="col-gallery">
                        <?php
                        if(get_field('couple')){
	                        $planType = $planTypeKimonoMap['couple'];
                        }else{
	                        $planType = $planTypeKimonoMap['single'];
                        }
                        echo do_shortcode('[gallery_for_plan_kimono plan_type="'.$planType.'" plan_type_id="'.$planTypeId.'"]');
                        ?>
                        <div class="wrap-link-to-gallery flexbox justify-content-end">
                            <a class="linkto-gallery" href="<?php echo esc_attr(home_url('gallery/' . $galleryVipLink)); ?>"><?php echo Yii::t('new-kimono-pl','このプランでお客様ギャラリー画面へ');  ?></a>
                        </div>
                    </div>
                    <div class="col-info-plan-list">
                        <div class="wrap-web-price-info flexbox">
                            <div class="wg-webpirce-box wg-webpirce-box-vip flexbox">
                                <?= Yii::t('new-kimono-pl-vip', 'box-webprice-vip'); ?>
                                <div class="box-price">
                                    <?php if (get_field('webprice') != '') { ?>
                                        <p class="lg-pirce"><?php the_field('webprice') ?><var class="line-price">-</var><span class="sm-sub-price"><?= Yii::t('new-kimono-pl', '税抜'); ?></span></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="sub-des"><?= Yii::t('new-kimono-pl','すべてセッ ト追加料金一切不要。<br/>着付け代・小物代を含みます。'); ?></div>
                        </div>
                        <div class="wrap-des-wg-pl">
                            <?php if (!empty($post->post_excerpt)): ?>
                                <?php the_excerpt(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="wrap-corresponding-store-wg">
                            <h3 class="title-corresponding-store"><?= Yii::t('new-kimono-pl','対応店舗'); ?></h3>
                            <div class="info-corresponding-store">
	                            <?php foreach ($shopList as $shopId):?>
		                            <?php
		                            $modelShop = Shop::getShopById($shopId);
		                            if(empty($modelShop))
			                            continue;
		                            ?>
		                            <span class="shop-item" id="shop-item-<?php echo $shopId?>"><?php echo $modelShop->shop_name?></span>
	                            <?php endforeach?>
                            </div>
                        </div>
                        <div class="text-des-list-vip pc"><?= Yii::t('new-kimono-pl-vip', '*お一人様でのみのご利用の場合、ホテル返却サービスは別途￥2,000の料金が発生いたします。'); ?></div>
                        <div class="wrap-choose-sl-wg flexbox">
                            <?php
                            $plan = PlanType::getPlanByPk(intval($planTypeId));
                            if($planTypeId == MasterValues::PLAN_VIP_GIRL_ID){
	                            ?>
                                <div class="wraper-sl wraper-sl-g-b flexbox">
                                    <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                        <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_".$planTypeId) ?></div>
                                        <div class="wraper-sl-choose-pepple flexbox">
                                            <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="1" data-male-allow="0">
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
                                    <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                        <div class="lbl-name-sl"><?= Yii::t("booking","merge_sex_".MasterValues::PLAN_VIP_BOY_ID) ?></div>
                                        <div class="wraper-sl-choose-pepple flexbox">
                                            <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?= MasterValues::PLAN_VIP_BOY_ID?>" data-female-allow="0" data-male-allow="1">
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
                            <?php } else {
	                            $endLoopPerson = Yii::app()->params['maxPersonInABook'];
	                            $textPerson = Yii::t('new-kimono-pl','名');
	                            if($plan->female_allow && $plan->male_allow){
		                            $endLoopPerson = Yii::app()->params['maxPersonInABook'] / 2;
		                            $textPerson = Yii::t('new-kimono-pl-vip','組');
	                            }
	                            ?>
                                <div class="wraper-sl flexbox">
                                    <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                        <div class="wraper-sl-choose-pepple flexbox">
                                            <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>">
                                                <?php
                                                for ($iloop = 0; $iloop <= $endLoopPerson; $iloop++) {
                                                    $textSex = $iloop > 1 ? Yii::t('booking','alone(s)') : Yii::t('booking','alone')
                                                    ?>
                                                    <option value="<?=$iloop?>"><?= $iloop?></option>
                                                <?php }?>
                                            </select>
                                            <div class="name-sl-people flexbox align-self-end"> <?= $textPerson?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-btn-reserve','予約に進む'); ?></button></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php

        }
    }
    wp_reset_postdata();
}
/* END show single plans */
?>


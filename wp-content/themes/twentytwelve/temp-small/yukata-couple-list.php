<?php
global $language;
global $post;
$yukata_plan = get_page_by_path('yukata/plan');
$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$planCoupleGallery = 'couple-standard-yukata' ;
if ($isSmartPhone) {
    wp_register_style('yukata-list-sp-style', get_template_directory_uri() . '/css/yukata-list-sp.css', array('twentytwelve-style'));
    wp_enqueue_style('yukata-list-sp-style');
}else{
    wp_register_style('yukata-list-pc-style', get_template_directory_uri() . '/css/yukata-list-pc.css', array('twentytwelve-style'));
    wp_enqueue_style('yukata-list-pc-style');
}
$args=array(
    'orderby'   => 'menu_order',
    'order'    => 'ASC',
    'post_type'     => 'page', //selects pages
    'post_parent'   => $yukata_plan->ID,//6457
    'post_status'   => 'publish',
    'meta_key'      => 'couple',
    'meta_value'    => 1,
    'posts_per_page'=> 10,
);?>
<?php $the_query  = new WP_Query($args);
if ( $the_query->have_posts() ) { ?>

    <div class="wrap-list-plan-wg couple">
        <div class="title-general title-list text-center flexbox margin-bt20">
            <span class="icon-title-general icon icon-prize"> <img src="<?php echo WP_HOME; ?>/images/new-kimono/icon-prize.svg" alt=""> </span>
            <h2 class="sub-title-list"><span class="text-title-general"><?= Yii::t('new-kimono-pl', 'カップル浴衣プラン'); ?></span></h2>
        </div>

        <?php
        $i = 0;
        while ( $the_query->have_posts() ) {
            $i++;
            $the_query->the_post();
            $planTypeId = get_field('plan_type_id');
            $modelPlanType = PlanType::getPlanByPk($planTypeId);
            if(empty($modelPlanType)){
                continue;
            }
            //Get plan name form ACF
            $arr_plan_type_names = get_field_object('plan_type_id');
            $plan_type_name = str_replace(" ","-",$arr_plan_type_names['choices'][$planTypeId]);

            $shopsOfRegion = array();
            foreach (MasterValues::$SHOPS_OF_REGION as $regionId => $shopIds){
                if(!empty($shopIds)){
                    foreach ($planShopList[$planTypeId] as $shopId){
                        if(in_array($shopId,$shopIds)){
                            $shopsOfRegion[$regionId][] = $shopId;
                        }
                    }
                }
            }

            if(get_field('is_plan_page') === true){
                ?>
                <?php if($i==1) { ?>
                    <div class="box-banner-top-pl"> <img src="<?php echo WP_HOME; ?>/images/new-kimono/banner-pl-<?= $planTypeId < 10 ? '0'.$planTypeId : $planTypeId?>.png" alt="<?= Yii::t('kimono-plan', 'kimono-plan-'.$planTypeId) ?>"></div>
                <?php } ?>
                <div class="list-plan-filter list-plan-filter-couple" data-plan-id="<?=$planTypeId?>" data-sex-age="<?= $sexAgeType['couple']?>" data-list-shop="<?= implode(",",$planShopList[$planTypeId])?>" data-plan-name="<?php echo $modelPlanType->plan_type_name?>">
                    <?php if($isSmartPhone): ?>
                        <div class="row sub-multi-title-pl">
                            <div class="wrap-sub-title-pl">
                                <div class="sub-title-pl" id="<?= $plan_type_name; ?>"><?php the_title(); ?></div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="wrap-col-gallery-col-info row flexbox">
                        <div class="col-gallery">

                            <div class="wrap-slider-gallery-pl kimono-plan-gallery-slider flexslider">
                                <?php if($planTypeId != ""): ?>
                                    <ul class="list-slide-gallery-pl slides">
                                        <?php for($i=1; $i<=4 ; $i++): ?>
                                            <li class="item-gallery-pl">
                                                <div class="pic-info-slide 123">
                                                    <img data-src="<?= WP_HOME; ?>/images/gallery_kimono/gallery_<?= $planTypeId; ?>_<?= $i; ?>.jpg" id="<?= $plan_type_name;?>" alt="<?= the_title_attribute(false).'のお客様'.$i;?>" />
                                                </div>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                <?php else: ?>
                                    <p><?= Yii::t('wp_theme','申し訳ありません、現在準備中です');?></p>
                                <?php endif; ?>
                            </div>
                            <div class="wrap-link-to-gallery flexbox justify-content-end">
                                <a class="linkto-gallery" href="<?php echo esc_attr(home_url('gallery/'.$planCoupleGallery)); ?>"><?= Yii::t('new-kimono-pl', 'こちらのプランをご利用のお客様を見る>'); ?></a>
                            </div>
                        </div>
                        <div class="col-info-plan-list">
                            <?php if(!$isSmartPhone): ?>
                                <div class="row sub-multi-title-pl">
                                    <div class="wrap-sub-title-pl">
                                        <div class="sub-title-pl" id="<?= $plan_type_name; ?>"><?php the_title(); ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="wrap-web-price-info flexbox">
                                <div class="wg-webpirce-box flexbox">
                                    <?= Yii::t('new-kimono-pl', 'box-webprice'); ?>
                                    <div class="box-price">
                                        <?php if(get_field('price') != ''){ ?>
                                            <p class="sm-price"><?php the_field('price')?>- ↓</p>
                                        <?php } ?>
                                        <?php if(get_field('webprice') != ''){ ?>
                                            <p class="lg-pirce"><?php the_field('webprice')?>-<span class="sm-sub-price"><?= Yii::t('new-kimono-pl', '税抜'); ?></span></p>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="sub-des"><?= Yii::t('new-kimono-pl', 'すべてセット追加料金一切不要。<br/>着付け代・小物代を含みます。'); ?></div>
                            </div>
                            <div class="wrap-des-wg-pl">
                                <?php echo get_plan_description(get_field('plan_description')); ?>
                            </div>
                            <div class="wrap-corresponding-store-wg">
                                <div class="wrap-link-more-wg"> <a href="#" class="btn-link-more" data-shop-region='<?= json_encode($shopsOfRegion); ?>'><?= Yii::t('new-kimono-pl', '詳細店舗はこちら'); ?></a></div>
                            </div>
                            <div class="wrap-choose-sl-wg flexbox">
                                <div class="wraper-sl flexbox">
                                    <div class="box-sl-choose-people box-sl-choose-g-b flexbox">
                                        <div class="wraper-sl-choose-pepple flexbox">
                                            <select name="" class="sl-choose-people list_plans" data-plan_type_id="<?=$planTypeId?>" data-female-allow="<?php echo $modelPlanType->female_allow?>" data-male-allow="<?php echo $modelPlanType->male_allow?>">
                                                <?php
                                                for ($iloop = 0; $iloop <= Yii::app()->params['maxPersonInABook']/2; $iloop++) {
                                                    $textSex = $iloop > 1 ? Yii::t('booking', 'couple(s)') : Yii::t('booking', 'couple')
                                                    ?>
                                                    <option value="<?=$iloop?>"><?= $iloop?></option>
                                                <?php }?>
                                            </select>
                                            <div class="name-sl-people flexbox align-self-end"> <?= Yii::t('new-kimono-pl', '組'); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wraper-bnt-reserve flexbox align-items-center"> <button class="btn-formal btn-reserve btn-color-pink"><?= Yii::t('new-kimono-pl', '予約に進む'); ?></button></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } ?>
    </div>
    <?php
}
wp_reset_postdata();

?>

<?php
    if ($language == 'ja') {
        do_shortcode('[new_access_page_yukata]');
    }
?>

<?php if ($language == 'ja') { ?>
<div class="wrap-topics-knowledge">
    <div class="title-general title-list text-center flexbox margin-bt20">
        <span class="icon-title-general icon icon-prize">
            <img src="<?= WP_HOME ;?>/images/new-kimono/icon-prize.svg" alt="">
        </span>
        <h2 class="sub-title-list">
            <span class="text-title-general">京都きものレンタルwargoのおすめコラム</span>
        </h2>
    </div>
    <?php echo do_shortcode('[list_product_formal_from_column category=yukata]'); ?>
    <div class="wrap-btn-v2 flexbox">
        <div class="btn-v2 btn-v2-01 bg-ginza-yukata bg-tkh-yukata">
            <a href="/column/yukata" class="btn-v2-reserve">
                <div class="pattern tkh-yukata"></div>
                <div class="text">
                    <span class="text-link">その他の浴衣コラムを見る</span>
                    <span class="icon-arrow-r-link"></span>
                </div>
                <div class="pattern tkh-yukata last"></div>
            </a>
        </div>
    </div><!--end wrap-btn-v2-->
</div><!--end wrap-topics-knowledge-->
<?php } ?>

<div class="wrap-banner-bt-pl">
    <ul class="list-banner-bt-pl flexbox">
        <?php if($language == 'ja'): ?>
<!--            <li class="item-banner-bt-pl"><a href="/yukata/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01.png" alt="女子会割引・学割ありのプチ着物レンタルプラン"></a></li>-->
            <li class="item-banner-bt-pl"><a href="/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03.png" alt="フォーマル・冠婚葬祭用 着物レンタルプラン"></a></li>
        <?php else: ?>
<!--            <li class="item-banner-bt-pl"><a href="--><?php //echo home_url(); ?><!--/yukata/petit"><img src="--><?//= WP_HOME; ?><!--/images/new-kimono/banner-pl-other-01---><?//= $language; ?><!--.png" alt=""></a></li>-->
            <li class="item-banner-bt-pl"><a href="/formal"><img src="<?= WP_HOME; ?>/images/new-kimono/banner-pl-other-03-<?= $language; ?>.png" alt=""></a></li>
        <?php endif; ?>
    </ul>
</div>

<?php if(is_page('children')): ?>
    <div class="intro-top-general pc">
        <h3 class="title-intro-top">キモノで観光　きものレンタルwargo子供浴衣プランのご紹介</h3>
        <div class="content-intro-top">
            <p class="intro-text">
                京都･大阪･東京浅草･鎌倉･金沢の計8店舗でお取り扱い【数量限定】子供浴衣プランのご紹介。七五三はもちろん小学校の卒業式袴や十三参りの小振袖など、最近はお子さまが着られるお祝い着物が増え、夏休み･お盆休み・花火大会や連休のおでかけでも、ご家族みんなで浴衣でを楽しむお客様が増えています！浴衣のレンタルが安い「きものレンタルwargo」でも子供浴衣プランも大人気！男の子も女の子も3歳から10歳（身長90-130cm）くらいまでのお子さま向けに、浴衣をレンタルしていただけます。
            </p>
        </div>
    </div>
<?php endif; ?>


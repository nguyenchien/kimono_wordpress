<?php
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
//        array(
//            'key' => 'is_plan_not_couple',
//            'value' => 1,
//        ),
    ),
    'posts_per_page' => 12,
);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) {
    ?>
    <div class="general_title_box general_title_box-petit">
        <img src="<?php echo WP_HOME; ?>/images/icons/icon-kimono.png" alt="<?php echo Yii::t('wp_theme', 'プチプラン価格一覧'); ?>" />
        <h2 class="title-plan-<?php echo Yii::app()->language; ?>"><?php echo Yii::t('wp_theme', 'プチプラン価格一覧'); ?></h2>
    </div>
    <?php
    while ($the_query->have_posts()) {
        $the_query->the_post();
        $planTypeId = get_field('plan_type_id');
        if (get_field('is_plan_page') === true) {
            ?>
            <section class="section_general section-kimono plan-list-kimono plan-list-petit">
                <div class="kimono-couple-page kimono-petit-page">
                    <div class="box-general-kimono-couple-page kimono-list clearfix">
                        <div class="image image-kimono image-pc forpc">
                            <?php swe_the_post_thumbnail($post,'full',array('alt'=>strip_tags(get_the_title()))); ?>
                        </div><!-- end image -->
                        <div class="info info-kimono <?php echo !is_page('couple') ? 'plan-page' : 'couple'; ?> info-<?php echo Yii::app()->language; ?>">
                            <?php if (is_page('couple')): //couple detail ?>
                                <div class="wrap couple">
                                    <?php echo '<h3>' . get_the_title() . '</h3>'; ?>
                                    <?php if (!empty($post->post_excerpt)): ?>
                                        <?php the_excerpt(); ?>
                                    <?php endif; ?>
                                    <div class="image image-kimono forsp">
                                        <?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
                                    </div><!-- end image -->
                                </div><!-- end wrap -->
                                <?php //option for couple ?>
                                <div class="option-kimono-couple">
                                    <?php getTemplatePart('include/plan-option-petit', null, array('plantype' => $planTypeId)); ?>
                                </div><!-- end div.option-kimono-couple -->
                            <?php else:  ?>
                                <div class="title">
                                    <h3 class="clearfix">
                                        <?php
                                        if (get_field('page_h1') == '') {
                                            the_title();
                                        } else {
                                            the_field('page_h1');
                                        }
                                        ?>
                                    </h3>
                                </div><!-- end title -->

                                <div class="prices clearfix">
                                    <div class="p-left">
                                        <ul class="price clearfix">
                                            <li>
                                                <?php if (get_field('price') != '') { ?>
                                                    <p class="bg_red"><?php echo Yii::t('wp_theme', 'Web決済で'); ?></p>
                                                    <p class="price_small"><?php the_field('price') ?></p>
                                                <?php } ?>
                                            </li>
                                            <li class="price_large">
                                                <?php if (get_field('webprice') != '') { ?>
                                                    <p><?php the_field('webprice') ?></p>
                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div><!-- end p-left -->
		                            <div class="p-right">
										<a href="#booking-petit" class="go-to-booking"><?php echo Yii::t('booking','Add Selected'); ?></a>
		                            </div>
                                </div><!-- end prices -->

                                <div class="excerpt excerpt-list-kimono">
                                    <?php if (!empty($post->post_excerpt)): ?>
                                        <?php the_excerpt(); ?>
                                    <?php endif; ?>

                                    <div class="image image-sp forsp">
                                        <?php swe_the_post_thumbnail($post,'full', array('alt'=>strip_tags(get_the_title()))); ?>
                                    </div><!-- end image -->

                                </div><!-- end excerpt -->

                                <div class="option-kimono-couple">
                                    <?php
                                    $kimonoSetThings = get_field('kimono_set_things');
                                    if(!empty($kimonoSetThings)){
                                        echo htmlspecialchars_decode($kimonoSetThings);
                                    }else{
                                        getTemplatePart('include/plan-option-petit', null, array('plantype' => $planTypeId));
                                    }?>
                                </div><!-- end option-kimono-couple -->
                            <?php endif; ?>

                        </div><!-- end info -->
                    </div><!-- end box-overview-kimono-page -->
                </div><!--end kimono-couple-page-->
            </section><!-- end section.section_general -->
            <div id="link_gotopage" class="link_gotopage-petit-page">
                <a href="<?php the_permalink() ?>"><?php echo '<span>'.Yii::t('wp_theme', 'ご予約はこちらから').'</span>'; ?></a>
            </div>
            <?php
        }
    }
    wp_reset_postdata();
}



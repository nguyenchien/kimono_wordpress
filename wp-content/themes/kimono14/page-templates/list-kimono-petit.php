<?php
/**
 * Template Name: List Kimono Petit page
 * Links: /kimono-petit, /kimono-petit/girl-petit, /kimono-petit/men-petit, /kimono-petit/couple-petit
 */
global $post;
global $is_yukata;

get_header();
wp_register_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css', array('twentytwelve-style'));
wp_enqueue_style('font-icon-shop');
wp_register_style('kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('kimono');

wp_register_style('kimono-petit', get_template_directory_uri() . '/css/kimono-petit.css', array('twentytwelve-style'));
wp_enqueue_style('kimono-petit');

?>
    <div class="container kimono-couple-page clearfix">

        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
        }
        ?>

        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="box-overview-kimono-page clearfix">
                    <?php the_content(); ?>
                    <div class="section-top section-top-list-petit">
                        <!--<?php //the_post_thumbnail('full', array('alt'=>  strip_tags(get_the_title()))); ?>-->
                        <h1>
                            <?php
                            if (wp_nonce_field('page_h1')) {
                                the_title();
                            } else {
                                the_field('page_h1');
                            }
                            ?>
                        </h1>
                        <?php
                        if (get_field('sub-title-page') && get_field('sub-title-page') != 'null') {
                            echo '<h2>' . get_field('sub-title-page') . '</h2>';
                        }
                        ?>
                        <?php if (!empty($post->post_excerpt)): ?>
                            <?php the_excerpt(); ?>
                        <?php endif; ?>
                    </div>
                </div><!-- end box-overview-kimono-page -->

                <?php
                $current_page = $post->post_name;
                $parent_page = !empty($post->post_parent) ? get_page($post->post_parent)->post_name : 0;
                $language = Yii::app()->language;
                 ?>
                    <div class="box-banner-graphic"><img src="<?php echo WP_HOME; ?>/images/banner-graphic-kimono-petit-<?php echo $language; ?>.png" alt="<?php echo Yii::t('wp_theme','??????????????????!???????????????'); ?>" /></div>
                <div class="box-content-page box-content-petit-page <?php echo $post->post_name; ?> clearfix content-couple">
                    <div class="cont-page-left clearfix">
                        <?php
                        get_template_part('temp-small/petit-list');
                        if (get_field('is_plan_page') === true) :
                            // plan pages
                            Yii::app()->controller->widget('application.components.widgets.ListKimono', array('plan_type_id' => get_field('plan_type_id')));
                        endif;
                        ?>
                    </div>
                    <!-- end cont-page-left -->

                    <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
                </div>
                <!-- .box-content-petit-page -->
                <div class="entry-meta sixteen columns">
                    <?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
                </div>
                <!-- .entry-meta -->

            </article><!-- #post -->

        <?php endwhile; // end of the loop.  ?>
        <div class="general_title_box general_title_box-petit">
            <img src="<?php echo WP_HOME; ?>/images/icons/icon-kimono.png" alt="<?php echo Yii::t('wp_theme', '??????????????????????????????'); ?>" />
            <h2 class="title-plan-<?php echo Yii::app()->language; ?>"><?php echo Yii::t('wp_theme', '??????????????????????????????'); ?></h2>
        </div>
	<div class="petit_notify"><?php echo Yii::t('wp_theme', 'petit_notify'); ?></div>
        <div class="change-shop-tab shop-tab-choose peptit-add-plan-container">
            <h2 class="title"><?php echo Yii::t('booking', '???????????????');?></h2>
            <p class="note"><span class="text-color-other"><?php echo Yii::t('wp_them', '???????????????????????????????????????????????????????????????????????????????????????');?></span><span class="choose-shop-note"></span></p>
            <div class="wrap-tabs-petit">
                <label class="shop-14" for="id-14-down" onclick="changeShop(14)">
                    <div class="shop-icon">
                        <span class="fa-shop icon-fa-shop-14"></span>
                    </div>
                    <div class="text-shop-icon"><?php echo Yii::t('wp_theme', 'Petit Gionshijo Select button'); ?></div>
                    <span class="right-icon">&#9654;</span>
                </label>

                <label class="shop-15" for="id-15-down" onclick="changeShop(15)">
                    <div class="shop-icon">
                        <span class="fa-shop icon-fa-shop-15"></span>
                    </div>
                    <div class="text-shop-icon"><?php echo Yii::t('wp_theme', 'Petit Kyotostation Select button'); ?></div>
                    <span class="right-icon">&#9654;</span>
                </label>
            </div>
        </div>
        <?php Yii::app()->controller->widget('application.components.widgets.petitAddPlan.PetitAddPlan', array('isCouple' => get_field('couple')));?>
        <!--
		<div class="change-shop-tab peptit-add-plan-container" style="margin-bottom: 20px;">
            <h2 class="title"><?php //echo Yii::t('wp_theme', '??????????????????????????????'); ?></h2>
        </div>
        -->
<!--        <div class="box-content-page box-content-petit-page content---><?php //echo $post->post_name; ?><!-- clearfix">-->
<!---->
<!--            <div class="cont-page-left clearfix">-->
<!--                --><?php
//                Yii::app()->controller->widget('application.components.widgets.ListKimono', array('plan_type_id' => MasterValues::PLAN_PETIT_GIRL_ID, 'back_link' => NULL));
//                ?>
<!--            </div><!-- end cont-page-left -->
<!--            --><?php //wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
<!--        </div>-->
            <div class="cont-page-left clearfix">
                <?php
                //                    if (is_page('couple')) :
                //                        getTemplatePart('temp-small/kimono-couple-list', null, array('plantype' => $planTypeId));
                //                    endif;
                if (get_field('is_plan_page') === true) :
                    // plan pages
                    Yii::app()->controller->widget('application.components.widgets.ListKimono', array('plan_type_id' => get_field('plan_type_id'), 'back_link' => get_permalink( $post->post_parent )));
                endif;
                ?>
            </div><!-- end cont-page-left -->
            <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
        </div><!-- .box-content-page -->
<?php get_footer(); ?>

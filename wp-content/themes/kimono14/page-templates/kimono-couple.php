<?php
/**
 * Template Name: Kimono couple
 * links: /kimono/{plan}, /kimono/couple, /yukata/plan/{plan}, /yukata/plan/couple
 */
global $post;
global $is_yukata, $isSmartPhone;
get_header();
wp_register_style('font-icon-shop', get_template_directory_uri() . '/css/font-icon-shop.css', array('twentytwelve-style'));
wp_enqueue_style('font-icon-shop');
wp_register_style('kimono', get_template_directory_uri() . '/css/kimono.css', array('twentytwelve-style'));
wp_enqueue_style('kimono');

$planCoupleGallery = $is_yukata ? 'couple-standard-yukata' : 'couple-standard-kimono';

if ($is_yukata) {
    wp_register_style('yukata_plan', get_template_directory_uri() . '/css/yukata_plan.css', array('twentytwelve-style'));
    wp_enqueue_style('yukata_plan');
}
?>

<div class="container kimono-couple-page clearfix">

    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
    }
    ?>

    <?php while (have_posts()) : the_post(); ?>
        <?php
	    $planTypeId = get_field('plan_type_id');
	    //Get plan name form ACF
	    $arr_plan_type_names = get_field_object('plan_type_id');
	    $plan_type_name = str_replace(" ","-",$arr_plan_type_names['choices'][$planTypeId]);
	    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	        <?php if(!$isSmartPhone){?>
            <div class="plan-couple-detail-page plan-pc">
                <div class="couple-page-detail image-thumb">
                    <div class="image">
                        <?php get_image_plan_by_order($post, 2, $size = array(274, 496), true); ?>
                    </div><!-- end image -->
                </div>
                <div class="plan-couple-content">
                    <div class="box-general-kimono-couple-page clearfix">
                        <div class="info <?php echo !is_page('couple') ? 'plan-page' : 'couple'; ?>">
                            <?php if (is_page('couple')): ?>
                                <div class="wrap couple">
                                    <?php
                                    echo '<h1>' . get_the_title() . '</h1>';
                                    ?>
                                    <div class="excerpt_couple clearfix">
                                        <?php if (!empty($post->post_excerpt)): ?>
                                            <?php the_excerpt(); ?>
                                        <?php endif; ?>
                                    </div>
	                                <div class="detail-kimono-reserve-link">
		                                <a href="<?php echo esc_attr(home_url('reserve'))?>#<?= $plan_type_name?>"><?= Yii::t('wp_theme','予約する')?></a>
	                                </div>
	                                <div id="link_gotopage" class="custom-gallery-link">
		                                <a href="<?php echo esc_attr(home_url('gallery/'.$planCoupleGallery)); ?>"><?php echo "<span>".Yii::t('wp_theme','このプランでお客様ギャラリー画面へ')."</span>"; ?></a>
	                                </div>
                                </div><!-- end wrap -->

                                <?php //option for couple  ?>
                            <?php else: //couple plan detail  ?>
                                <div class="title">
                                    <h1 class="title-plan title-plan-detail clearfix">
                                        <?php
                                        if (get_field('page_h1') == '') {
                                            the_title();
                                        } else {
                                            the_field('page_h1');
                                        }
                                        ?>
                                    </h1>
                                    <?php
                                        if(get_field('page_h1_bubble')){
                                            the_field('page_h1_bubble');
                                        }
                                    ?>
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
                                </div><!-- end prices -->

                                <div class="excerpt">
                                    <?php if (!empty($post->post_excerpt)): ?>
                                        <?php the_excerpt(); ?>
                                    <?php endif; ?>
                                </div><!-- end excerpt -->

	                            <div class="detail-kimono-reserve-link">
		                            <a href="<?php echo esc_attr(home_url('reserve'))?>#<?= $plan_type_name?>"><?= Yii::t('wp_theme','予約する')?></a>
	                            </div>

	                            <div id="link_gotopage" class="custom-gallery-link">
		                            <a href="<?php echo esc_attr(home_url('gallery/' . strtolower($plan_type_name))); ?>"><?php echo "<span>".Yii::t('wp_theme','このプランでお客様ギャラリー画面へ')."</span>"; ?></a>
	                            </div>

                            <?php endif; ?>

                        </div><!-- end info -->
                    </div>
                </div>
                <div class="plan-couple-adv">
                    <?php
                    global $language;
                    $image = '';
                    if ($is_yukata) {
                        if ($post->post_name == 'men-yukata') {
                            $alt = Yii::t('wp_theme', 'Yukata Rental for Men');
                            $image = 'adv-yukata-men-' . $language . '.png';
                        } else {
                            $alt = Yii::t('wp_theme', 'Yukata Rental for Women');
                            $image = 'adv-yukata-girl-' . $language . '.png';
                        }
                    } else {
                        if ($post->post_name == 'men-kimono') {
                            $alt = Yii::t('wp_theme', 'Kimono Rental for Men');
                            $image = 'adv-kimono-men-' . $language . '.png';
                        } else {
                            $alt = Yii::t('wp_theme', 'Kimono Rental for Women');
                            $image = 'adv-kimono-girl-' . $language . '.png';
                        }
                    }
                    ?>
                    <img src="<?php echo WP_HOME; ?>/images/<?php echo $image; ?>" alt="<?php echo $alt; ?>">
                </div>
            </div>
			<?php } else { ?>
            <div class="box-general-kimono-couple-page clearfix plan-sp">
                <div class="info <?php echo !is_page('couple') ? 'plan-page' : 'couple'; ?>">
                    <?php if (is_page('couple')): ?>
                        <div class="wrap couple">
                            <?php
                            echo '<h1>' . get_the_title() . '</h1>';
                            ?>
                            <div class="excerpt_couple clearfix">
                                <?php if (!empty($post->post_excerpt)): ?>
                                    <?php the_excerpt(); ?>
                                <?php endif; ?>
                                <div class="image forsp">
                                    <?php swe_the_post_thumbnail($post,'full', array('alt' => strip_tags(get_the_title()))); ?>
                                </div><!-- end image -->
                            </div>
                        </div><!-- end wrap -->

                        <?php //option for couple  ?>
                        <div class="option-kimono-couple">
                            <?php getTemplatePart('include/plan_options_list', null, array('plantype' => $planTypeId)); ?>
                        </div><!-- end div.option-kimono-couple -->
                    <?php else: //couple plan detail ?>
                        <div class="title">
                            <h1 class="title-plan title-plan-detail clearfix">
                                <?php
                                if (get_field('page_h1') == '') {
                                    the_title();
                                } else {
                                    the_field('page_h1');
                                }
                                ?>
                            </h1>
                            <?php
                            if(get_field('page_h1_bubble')){
                                the_field('page_h1_bubble');
                            }
                            ?>
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

                        </div><!-- end prices -->

                        <div class="excerpt">
                            <?php if (!empty($post->post_excerpt)): ?>
                                <?php the_excerpt(); ?>
                            <?php endif; ?>
                            <div class="image forsp">
                                <?php get_image_plan_by_order($post, 1, 'full', true); ?>
                            </div><!-- end image -->
                        </div><!-- end excerpt -->

                        <div class="option-kimono-couple">
                            <?php getTemplatePart('include/plan_options_list', null, array('plantype' => $planTypeId)); ?>
                        </div><!-- end option-kimono-couple -->
                    <?php endif; ?>

                </div><!-- end info -->
            </div><!-- end box-overview-kimono-page -->

	        <div class="detail-kimono-reserve-link">
		        <a href="<?php echo esc_attr(home_url('reserve'))?>#<?= $plan_type_name?>"><?= Yii::t('wp_theme','予約する')?></a>
	        </div>

	        <?php if (is_page('couple')) { ?>
		        <div id="link_gotopage" class="custom-gallery-link">
			        <a href="<?php echo esc_attr(home_url('gallery/'.$planCoupleGallery)); ?>"><?php echo "<span>".Yii::t('wp_theme','このプランでお客様ギャラリー画面へ')."</span>"; ?></a>
		        </div>
	        <?php }else{?>
		        <div id="link_gotopage" class="custom-gallery-link">
			        <a href="<?php echo esc_attr(home_url('gallery/' . strtolower($plan_type_name))); ?>"><?php echo "<span>".Yii::t('wp_theme','このプランでお客様ギャラリー画面へ')."</span>"; ?></a>
		        </div>
	        <?php } ?>

			<?php } ?>
	        
            <?php
            /*
             * BEGIN - Render kimono plan note with all kimono plan page except couple page.
             */
            if (!$isSmartPhone && !is_page('couple')) :
                ?>
                <p class="note"><?php echo Yii::t('kimono', '※現在、着物大量入荷中にて更新が間に合っておりません。店舗にはさらに沢山の着物をご用意。ご来店時に選んで頂くことも可能です。是非店頭へお越しください！！'); ?></p>
                <?php
            endif;
            /*
             * END - Render kimono plan note
             */
            ?>

            <div class="box-content-page content-<?php echo $post->post_name; ?> clearfix">
                <div class="cont-page-left clearfix">
                    <?php
                    if (is_page('couple')) :
                        getTemplatePart('temp-small/kimono-couple-list', null, array('plantype' => $planTypeId));
                    endif;
                    if (get_field('is_plan_page') === true) :
                        // plan pages
                        Yii::app()->controller->widget('application.components.widgets.ListKimono', array('plan_type_id' => get_field('plan_type_id')));
                    else:
                        echo strip_shortcodes(get_the_content());
                    endif;
                    ?>
                </div><!-- end cont-page-left -->
                <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'twentytwelve'), 'after' => '</div>')); ?>
            </div><!-- .box-content-page -->

            <div class="entry-meta sixteen columns">
                <?php edit_post_link(__('Edit', 'twentytwelve'), '<span class="edit-link">', '</span>'); ?>
            </div><!-- .entry-meta -->

	        <div class="plan_banner detail">
		        <div class="banner banner-left">
			        <a href="<?php echo esc_attr(home_url('petit'))?>">
				        <img src="<?php echo Yii::t('wp_theme', 'banner-petit-src') ?>"
				             alt="<?php echo Yii::t('wp_theme', 'banner-petit-alt') ?>"/>
			        </a>
		        </div>
		        <div class="banner banner-right">
			        <a href="<?php echo esc_attr(home_url('vip'))?>">
				        <img src="<?php echo Yii::t('wp_theme', 'banner-vip-src') ?>"
				             alt="<?php echo Yii::t('wp_theme', 'banner-vip-alt') ?>"/>
			        </a>
		        </div>
	        </div>

        </article><!-- #post -->

    <?php endwhile; // end of the loop.  ?>

</div><!-- end container -->
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function ($) {
        //$('.plan-couple-content .name').insertAfter('.plan-couple-content .bubble');
    });
</script>

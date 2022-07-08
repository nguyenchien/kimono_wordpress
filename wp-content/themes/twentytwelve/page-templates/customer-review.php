<?php
/**
 * Template Name: Customer's Review
 */
global $post, $language;
$language = Yii::app()->language;
$lang = Yii::app()->language;

get_header('new-kimono');
wp_enqueue_script('new-customer-review-script', get_template_directory_uri() . '/js/customer-review.js');
wp_register_style('style-customer-review', get_template_directory_uri() . '/css/customer-review.css', array('twentytwelve-style'));
wp_enqueue_style('style-customer-review');

// Get title post parent
$parent_id = wp_get_post_parent_id($post->ID);
$parent_title = get_the_title($parent_id);

// Get slug parent
$slug_parent = get_post_field( 'post_name', $parent_id );

?>

<div class="container-box clearfix">
    <div class="wrap-highend-v2">
        <div class="wrap-content-v2">
            <div class="container-box">
                <div class="wrap-column-content flexbox">
                    <div class="left-column-content">
                        <div class="wrap-boths-column flexbox">
                            <div class="right-column">
                                <div class="wrap-customer-review">
                                    <?php
                                    if (function_exists('yoast_breadcrumb')) {
                                        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
                                    }
                                    ?>
                                    <div class="banner-customer-review">
                                        <div class="row">
                                            <div class="banner-ctm-review">
                                                <img class="pc" src="<?php echo WP_HOME; ?>/images/customer-review/banner-top-review-pc<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt="<?php echo strip_tags(get_the_title()); ?>" />
                                                <img class="sp" src="<?php echo WP_HOME; ?>/images/customer-review/banner-top-review-sp<?php echo ($lang == 'ja') ? "" : "-$lang"?>.png" alt="<?php echo strip_tags(get_the_title()); ?>" />
                                                <p class="name-shop-ctm-review name-shop-ctm-review-<?= $slug_parent ?>"><?=$parent_title?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="toggle-ctm-review sp">
                                        <div class="wrap-padding">
                                            <span id="toggle-sidebar" class="icon icon-formal-menu-toggle-open icon-tg-stm-review"></span>
                                        </div>
                                    </div>
                                    <div class="wrap-customer-review-content flexbox">
                                        <?php  echo do_shortcode('[customer_review_content]'); ?>
                                        <?php  echo do_shortcode('[sidebar_right_customer_voice]'); ?>
                                    </div><!--end wrap-customer-review-content-->
                                </div><!--end wrap-customer-review-->
                            </div> <!--end right-column-->
                        </div><!--end wrap-boths-column-->
                    </div><!--end left-column-content-->
                </div><!--end wrap-column-content-->
            </div>
        </div><!--end content-v2-->
    </div><!--end wrap-highend-v2-->
</div>
<?php if($language == 'ja'): ?>
    <?php get_footer('new-kimono-landing-page'); ?>
<?php else: ?>
    <?php get_footer('new-kimono'); ?>
<?php endif; ?>

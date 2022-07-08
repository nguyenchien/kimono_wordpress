<?php
/**
 * Template Name: Customer's Review Scene
 */
global $post, $language;
$language = Yii::app()->language;
get_header('new-kimono');
wp_enqueue_script('new-customer-review-script', get_template_directory_uri() . '/js/customer-review.js');
wp_register_style('style-customer-review', get_template_directory_uri() . '/css/customer-review.css', array('twentytwelve-style'));
wp_enqueue_style('style-customer-review');


// Get title post parent
$parent_id = wp_get_post_parent_id($post->ID);
$parent_title = get_the_title($parent_id);

//Get post parent from slug
$post_data = get_post($post->post_parent);
$parent_slug_name = $post_data->post_name;

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
                                            <div class="banner-ctm-review banner-ctm-review-scene">
                                                <img src="<?php echo WP_HOME; ?>/images/formal-rental/main-banner-fm-scene-<?= $parent_slug_name; ?>.jpg" alt="<?php echo strip_tags(get_the_title()); ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-customer-review-content flexbox">
                                        <?php  echo do_shortcode('[customer_review_content_scene]'); ?>
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

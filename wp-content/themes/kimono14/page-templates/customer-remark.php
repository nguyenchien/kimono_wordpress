<?php
/**
 * Template Name: Customer Remark
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_enqueue_script('new-formal-rental-script-flexslider', WP_HOME . '/js/jquery.flexslider.js');
wp_register_style('new-formal-rental-style-flexslider', WP_HOME . '/css/flexslider.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-rental-style-flexslider');
wp_enqueue_script('customer-remark-script', get_template_directory_uri() . '/js/customer-remark.js');
wp_register_style('new-formal-font-icon', get_template_directory_uri() . '/css/icon-formal-rental.css', array('twentytwelve-style'));
wp_enqueue_style('new-formal-font-icon');
wp_register_style('new-formal-rental-style', get_template_directory_uri() . '/css/new-formal-rental.css', array('twentytwelve-style'), '201802021658');
wp_enqueue_style('new-formal-rental-style');
wp_register_style('customer-remark-style', get_template_directory_uri() . '/css/customer-remark.css', array('twentytwelve-style'), '201802021121');
wp_enqueue_style('customer-remark-style');
get_header('formal');

$isSmartPhone = Yii::app()->mobileDetect->isSmartPhone();
$baseUrl = Yii::app()->baseUrl;
global $post;
$postName = $post->post_name;

$formalPlanSlugs = array(
    'homongi',
    'kurotomesode',
    'irotomesode',
    'seijin',
    'sotsugyou',
    'shichigosan'
);
?>
    <div class="container clearfix">

        <div class="wrap-highend-v2">
            <?php if (!empty($postName) && in_array($postName, $formalPlanSlugs)): ?>
                <div class="banner-top-highend-v2">
                    <div class="container-box">
                        <?php
                        echo swe_wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array('alt' => strip_tags(get_the_title())));
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="wrap-content-v2">
                <div class="container-box">
                    <div class="wrap-column-content flexbox">
                        <div class="left-column-content">
                            <div class="wrap-boths-column flexbox">
                                <div class="right-column right-column-list">
                                    <div class="wrap-customer-remark">
                                        <?php
                                        if (function_exists('yoast_breadcrumb')) {
                                            yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
                                        }
                                        ?>
                                        <?php
                                        while (have_posts()) : the_post();
                                            the_content();
                                        endwhile;
                                        ?>
                                    </div>

                                </div><!--end right-column-->


                            </div><!--end wrap-boths-column-->

                        </div><!--end left-column-content-->


                    </div><!--end wrap-column-content-->
                </div>

            </div><!--end content-v2-->
        </div><!--end wrap-highend-v2-->

    </div><!-- end container -->
<?php get_footer(); ?>